<?php

namespace MediaWiki\Parser\Parsoid;

use MediaWiki\Languages\LanguageConverterFactory;
use MediaWiki\MediaWikiServices;
use MediaWiki\Page\PageReference;
use MediaWiki\Parser\Parsoid\Config\PageConfigFactory;
use MediaWiki\Revision\MutableRevisionRecord;
use MediaWiki\Revision\SlotRecord;
use MediaWiki\Title\Title;
use ParserFactory;
use ParserOptions;
use ParserOutput;
use Wikimedia\Assert\Assert;
use Wikimedia\Parsoid\Parsoid;
use WikitextContent;

/**
 * Parser implementation which uses Parsoid.
 *
 * Currently incomplete; see T236809 for the long-term plan.
 *
 * @since 1.41
 * @unstable since 1.41; see T236809 for plan.
 */
class ParsoidParser /* eventually this will extend \Parser */ {

	/** @var Parsoid */
	private $parsoid;

	/** @var PageConfigFactory */
	private $pageConfigFactory;

	/** @var LanguageConverterFactory */
	private $languageConverterFactory;

	/** @var ParserFactory */
	private $legacyParserFactory;

	/**
	 * @param Parsoid $parsoid
	 * @param PageConfigFactory $pageConfigFactory
	 * @param LanguageConverterFactory $languageConverterFactory
	 * @param ParserFactory $legacyParserFactory
	 */
	public function __construct(
		Parsoid $parsoid,
		PageConfigFactory $pageConfigFactory,
		LanguageConverterFactory $languageConverterFactory,
		ParserFactory $legacyParserFactory
	) {
		$this->parsoid = $parsoid;
		$this->pageConfigFactory = $pageConfigFactory;
		$this->languageConverterFactory = $languageConverterFactory;
		$this->legacyParserFactory = $legacyParserFactory;
	}

	/**
	 * Convert wikitext to HTML
	 * Do not call this function recursively.
	 *
	 * @param string $text Text we want to parse
	 * @param-taint $text escapes_htmlnoent
	 * @param PageReference $page
	 * @param ParserOptions $options
	 * @param bool $linestart
	 * @param bool $clearState
	 * @param int|null $revId ID of the revision being rendered. This is used to render
	 *  REVISION* magic words. 0 means that any current revision will be used. Null means
	 *  that {{REVISIONID}}/{{REVISIONUSER}} will be empty and {{REVISIONTIMESTAMP}} will
	 *  use the current timestamp.
	 * @return ParserOutput
	 * @return-taint escaped
	 * @unstable since 1.41
	 */
	public function parse(
		string $text, PageReference $page, ParserOptions $options,
		bool $linestart = true, bool $clearState = true, ?int $revId = null
	): ParserOutput {
		Assert::invariant( $linestart, '$linestart=false is not yet supported' );
		Assert::invariant( $clearState, '$clearState=false is not yet supported' );
		$title = Title::newFromPageReference( $page );
		$lang = $options->getTargetLanguage();
		if ( $lang === null && $options->getInterfaceMessage() ) {
			$lang = $options->getUserLangObj();
		}
		$pageConfig = $revId === null ? null : $this->pageConfigFactory->create(
			$title,
			$options->getUserIdentity(),
			$revId,
			null, // unused
			$lang // defaults to title page language if null
		);
		if ( !( $pageConfig && $pageConfig->getPageMainContent() === $text ) ) {
			// This is a bit awkward! But we really need to parse $text, which
			// may or may not correspond to the $revId provided!
			// T332928 suggests one solution: splitting the "have revid"
			// callers from the "bare text, no associated revision" callers.
			$revisionRecord = new MutableRevisionRecord( $title );
			if ( $revId !== null ) {
				$revisionRecord->setId( $revId );
			}
			$revisionRecord->setSlot(
				SlotRecord::newUnsaved(
					SlotRecord::MAIN,
					new WikitextContent( $text )
				)
			);
			$pageConfig = $this->pageConfigFactory->create(
				$title,
				$options->getUserIdentity(),
				$revisionRecord,
				null, // unused
				$lang // defaults to title page language if null
			);
		}

		// FIXME: Right now, ParsoidOutputAccess uses $lang and does not compute a
		// $preferredVariant for $lang. So, when switching over to ParserOutputAccess,
		// we need to reconcile that difference.
		//
		// The REST interfaces will disable content conversion here
		// via ParserOptions.  The enable/disable logic here matches
		// that in Parser::internalParseHalfParsed(), although
		// __NOCONTENTCONVERT__ is handled internal to Parsoid.
		$preferredVariant = null;
		if ( !( $options->getDisableContentConversion() || $options->getInterfaceMessage() ) ) {
			$langFactory = MediaWikiServices::getInstance()->getLanguageFactory();
			$lang = $langFactory->getLanguage( $pageConfig->getPageLanguageBcp47() );
			$langConv = $this->languageConverterFactory->getLanguageConverter( $lang );
			$preferredVariant = $langFactory->getLanguage( $langConv->getPreferredVariant() );
		}

		$parserOutput = new ParserOutput();
		// NOTE: This is useless until the time Parsoid uses the
		// $options ParserOptions object. But if/when it does, this
		// will ensure that we track used options correctly.
		$options->registerWatcher( [ $parserOutput, 'recordOption' ] );

		$pageBundle = $this->parsoid->wikitext2html( $pageConfig, [
			'pageBundle' => true,
			'wrapSections' => true,
			'htmlVariantLanguage' => $preferredVariant,
			'outputContentVersion' => Parsoid::defaultHTMLVersion(),
			'logLinterData' => true
		], $headers, $parserOutput );
		$parserOutput = PageBundleParserOutputConverter::parserOutputFromPageBundle( $pageBundle, $parserOutput );
		// Register a watcher again because the $parserOuptut arg
		// and $parserOutput return value above are different objects!
		$options->registerWatcher( [ $parserOutput, 'recordOption' ] );

		# Copied from Parser.php::parse and should probably be abstracted
		# into the parent base class (probably as part of T236809)
		# Wrap non-interface parser output in a <div> so it can be targeted
		# with CSS (T37247)
		$class = $options->getWrapOutputClass();
		if ( $class !== false && !$options->getInterfaceMessage() ) {
			$parserOutput->addWrapperDivClass( $class );
		}

		$this->makeLimitReport( $options, $parserOutput );

		// Record Parsoid version in extension data; this allows
		// us to use the onRejectParserCacheValue hook to selectively
		// expire "bad" generated content in the event of a rollback.
		$parserOutput->setExtensionData(
			'core:parsoid-version', Parsoid::version()
		);

		return $parserOutput;
	}

	/**
	 * Set the limit report data in the current ParserOutput.
	 * This is ported from Parser::makeLimitReport() and should eventually
	 * use the method from the superclass directly.
	 */
	protected function makeLimitReport(
		ParserOptions $parserOptions, ParserOutput $parserOutput
	) {
		$maxIncludeSize = $parserOptions->getMaxIncludeSize();

		$cpuTime = $parserOutput->getTimeSinceStart( 'cpu' );
		if ( $cpuTime !== null ) {
			$parserOutput->setLimitReportData( 'limitreport-cputime',
				sprintf( "%.3f", $cpuTime )
			);
		}

		$wallTime = $parserOutput->getTimeSinceStart( 'wall' );
		$parserOutput->setLimitReportData( 'limitreport-walltime',
			sprintf( "%.3f", $wallTime )
		);

		$parserOutput->setLimitReportData( 'limitreport-timingprofile', [ 'not yet supported' ] );

		// Add other cache related metadata
		$parserOutput->setLimitReportData( 'cachereport-timestamp',
			$parserOutput->getCacheTime() );
		$parserOutput->setLimitReportData( 'cachereport-ttl',
			$parserOutput->getCacheExpiry() );
		$parserOutput->setLimitReportData( 'cachereport-transientcontent',
			$parserOutput->hasReducedExpiry() );
	}

}
