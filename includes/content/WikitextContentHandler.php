<?php
/**
 * Content handler for wiki text pages.
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
 * http://www.gnu.org/copyleft/gpl.html
 *
 * @since 1.21
 *
 * @file
 * @ingroup Content
 */

use MediaWiki\Content\Renderer\ContentParseParams;
use MediaWiki\Content\Transform\PreloadTransformParams;
use MediaWiki\Content\Transform\PreSaveTransformParams;
use MediaWiki\Languages\LanguageNameUtils;
use MediaWiki\Linker\LinkRenderer;
use MediaWiki\Parser\MagicWordFactory;
use MediaWiki\Parser\ParserOutputFlags;
use MediaWiki\Parser\Parsoid\ParsoidParserFactory;
use MediaWiki\Revision\RevisionRecord;
use MediaWiki\Title\Title;
use MediaWiki\Title\TitleFactory;
use Wikimedia\UUID\GlobalIdGenerator;

/**
 * Content handler for wiki text pages.
 *
 * @ingroup Content
 */
class WikitextContentHandler extends TextContentHandler {

	/** @var TitleFactory */
	private $titleFactory;

	/** @var ParserFactory */
	private $parserFactory;

	/** @var GlobalIdGenerator */
	private $globalIdGenerator;

	/** @var LanguageNameUtils */
	private $languageNameUtils;

	/** @var LinkRenderer */
	private $linkRenderer;

	/** @var MagicWordFactory */
	private $magicWordFactory;

	/** @var ParsoidParserFactory */
	private $parsoidParserFactory;

	/**
	 * @param string $modelId
	 * @param TitleFactory $titleFactory
	 * @param ParserFactory $parserFactory
	 * @param GlobalIdGenerator $globalIdGenerator
	 * @param LanguageNameUtils $languageNameUtils
	 * @param LinkRenderer $linkRenderer
	 * @param MagicWordFactory $magicWordFactory
	 * @param ParsoidParserFactory $parsoidParserFactory
	 */
	public function __construct(
		string $modelId,
		TitleFactory $titleFactory,
		ParserFactory $parserFactory,
		GlobalIdGenerator $globalIdGenerator,
		LanguageNameUtils $languageNameUtils,
		LinkRenderer $linkRenderer,
		MagicWordFactory $magicWordFactory,
		ParsoidParserFactory $parsoidParserFactory
	) {
		// $modelId should always be CONTENT_MODEL_WIKITEXT
		parent::__construct( $modelId, [ CONTENT_FORMAT_WIKITEXT ] );
		$this->titleFactory = $titleFactory;
		$this->parserFactory = $parserFactory;
		$this->globalIdGenerator = $globalIdGenerator;
		$this->languageNameUtils = $languageNameUtils;
		$this->linkRenderer = $linkRenderer;
		$this->magicWordFactory = $magicWordFactory;
		$this->parsoidParserFactory = $parsoidParserFactory;
	}

	/**
	 * @return class-string<WikitextContent>
	 */
	protected function getContentClass() {
		return WikitextContent::class;
	}

	/**
	 * Returns a WikitextContent object representing a redirect to the given destination page.
	 *
	 * @param Title $destination The page to redirect to.
	 * @param string $text Text to include in the redirect, if possible.
	 *
	 * @return Content
	 *
	 * @see ContentHandler::makeRedirectContent
	 */
	public function makeRedirectContent( Title $destination, $text = '' ) {
		$optionalColon = '';

		if ( $destination->getNamespace() === NS_CATEGORY ) {
			$optionalColon = ':';
		} else {
			$iw = $destination->getInterwiki();
			if ( $iw && $this->languageNameUtils->getLanguageName( $iw,
						LanguageNameUtils::AUTONYMS,
						LanguageNameUtils::DEFINED )
			) {
				$optionalColon = ':';
			}
		}

		$mwRedir = $this->magicWordFactory->get( 'redirect' );
		$redirectText = $mwRedir->getSynonym( 0 ) .
			' [[' . $optionalColon . $destination->getFullText() . ']]';

		if ( $text != '' ) {
			$redirectText .= "\n" . $text;
		}

		$class = $this->getContentClass();
		return new $class( $redirectText );
	}

	/**
	 * Returns true because wikitext supports redirects.
	 *
	 * @return bool Always true.
	 *
	 * @see ContentHandler::supportsRedirects
	 */
	public function supportsRedirects() {
		return true;
	}

	/**
	 * Returns true because wikitext supports sections.
	 *
	 * @return bool Always true.
	 *
	 * @see ContentHandler::supportsSections
	 */
	public function supportsSections() {
		return true;
	}

	/**
	 * Returns true, because wikitext supports caching using the
	 * ParserCache mechanism.
	 *
	 * @since 1.21
	 *
	 * @return bool Always true.
	 *
	 * @see ContentHandler::isParserCacheSupported
	 */
	public function isParserCacheSupported() {
		return true;
	}

	/** @inheritDoc */
	public function supportsPreloadContent(): bool {
		return true;
	}

	/**
	 * @return FileContentHandler
	 */
	protected function getFileHandler() {
		return new FileContentHandler(
			$this->getModelID(),
			$this->titleFactory,
			$this->parserFactory,
			$this->globalIdGenerator,
			$this->languageNameUtils,
			$this->linkRenderer,
			$this->magicWordFactory,
			$this->parsoidParserFactory
		);
	}

	public function getFieldsForSearchIndex( SearchEngine $engine ) {
		$fields = parent::getFieldsForSearchIndex( $engine );

		$fields['heading'] =
			$engine->makeSearchFieldMapping( 'heading', SearchIndexField::INDEX_TYPE_TEXT );
		$fields['heading']->setFlag( SearchIndexField::FLAG_SCORING );

		$fields['auxiliary_text'] =
			$engine->makeSearchFieldMapping( 'auxiliary_text', SearchIndexField::INDEX_TYPE_TEXT );

		$fields['opening_text'] =
			$engine->makeSearchFieldMapping( 'opening_text', SearchIndexField::INDEX_TYPE_TEXT );
		$fields['opening_text']->setFlag(
			SearchIndexField::FLAG_SCORING | SearchIndexField::FLAG_NO_HIGHLIGHT
		);
		// Until we have full first-class content handler for files, we invoke it explicitly here
		$fields = array_merge( $fields, $this->getFileHandler()->getFieldsForSearchIndex( $engine ) );

		return $fields;
	}

	public function getDataForSearchIndex(
		WikiPage $page,
		ParserOutput $parserOutput,
		SearchEngine $engine,
		?RevisionRecord $revision = null
	) {
		$fields = parent::getDataForSearchIndex( $page, $parserOutput, $engine, $revision );

		$structure = new WikiTextStructure( $parserOutput );
		$fields['heading'] = $structure->headings();
		// text fields
		$fields['opening_text'] = $structure->getOpeningText();
		$fields['text'] = $structure->getMainText(); // overwrites one from ContentHandler
		$fields['auxiliary_text'] = $structure->getAuxiliaryText();
		$fields['defaultsort'] = $structure->getDefaultSort();
		$fields['file_text'] = null;

		// Until we have full first-class content handler for files, we invoke it explicitly here
		if ( $page->getTitle()->getNamespace() === NS_FILE ) {
			$fields = array_merge( $fields,
					$this->getFileHandler()->getDataForSearchIndex( $page, $parserOutput, $engine, $revision ) );
		}
		return $fields;
	}

	/**
	 * Returns the content's text as-is.
	 *
	 * @param Content $content
	 * @param string|null $format The serialization format to check
	 *
	 * @return mixed
	 */
	public function serializeContent( Content $content, $format = null ) {
		$this->checkFormat( $format );

		// NOTE: MessageContent also uses CONTENT_MODEL_WIKITEXT, but it's not a TextContent!
		// Perhaps MessageContent should use a separate ContentHandler instead.
		if ( $content instanceof MessageContent ) {
			return $content->getMessage()->plain();
		}

		return parent::serializeContent( $content, $format );
	}

	public function preSaveTransform(
		Content $content,
		PreSaveTransformParams $pstParams
	): Content {
		$shouldCallDeprecatedMethod = $this->shouldCallDeprecatedContentTransformMethod(
			$content,
			$pstParams
		);

		if ( $shouldCallDeprecatedMethod ) {
			return $this->callDeprecatedContentPST(
				$content,
				$pstParams
			);
		}

		'@phan-var WikitextContent $content';
		$text = $content->getText();

		$parser = $this->parserFactory->getInstance();
		$pst = $parser->preSaveTransform(
			$text,
			$pstParams->getPage(),
			$pstParams->getUser(),
			$pstParams->getParserOptions()
		);

		if ( $text === $pst ) {
			return $content;
		}

		$contentClass = $this->getContentClass();
		$ret = new $contentClass( $pst );
		$ret->setPreSaveTransformFlags( $parser->getOutput()->getAllFlags() );
		return $ret;
	}

	/**
	 * Returns a Content object with preload transformations applied (or this
	 * object if no transformations apply).
	 *
	 * @param Content $content
	 * @param PreloadTransformParams $pltParams
	 *
	 * @return Content
	 */
	public function preloadTransform(
		Content $content,
		PreloadTransformParams $pltParams
	): Content {
		$shouldCallDeprecatedMethod = $this->shouldCallDeprecatedContentTransformMethod(
			$content,
			$pltParams
		);

		if ( $shouldCallDeprecatedMethod ) {
			return $this->callDeprecatedContentPLT(
				$content,
				$pltParams
			);
		}

		'@phan-var WikitextContent $content';
		$text = $content->getText();

		$plt = $this->parserFactory->getInstance()
			->getPreloadText(
				$text,
				$pltParams->getPage(),
				$pltParams->getParserOptions(),
				$pltParams->getParams()
			);

		$contentClass = $this->getContentClass();
		return new $contentClass( $plt );
	}

	/**
	 * Extract the redirect target and the remaining text on the page.
	 *
	 * @since 1.41 (used to be a method on WikitextContent since 1.23)
	 *
	 * @return array List of two elements: LinkTarget|null and WikitextContent object.
	 */
	public function extractRedirectTargetAndText( WikitextContent $content ): array {
		$redir = $this->magicWordFactory->get( 'redirect' );
		$text = ltrim( $content->getText() );

		if ( !$redir->matchStartAndRemove( $text ) ) {
			return [ null, $content ];
		}

		// Extract the first link and see if it's usable
		// Ensure that it really does come directly after #REDIRECT
		// Some older redirects included a colon, so don't freak about that!
		$m = [];
		if ( preg_match( '!^\s*:?\s*\[{2}(.*?)(?:\|.*?)?\]{2}\s*!', $text, $m ) ) {
			// Strip preceding colon used to "escape" categories, etc.
			// and URL-decode links
			if ( strpos( $m[1], '%' ) !== false ) {
				// Match behavior of inline link parsing here;
				$m[1] = rawurldecode( ltrim( $m[1], ':' ) );
			}

			// TODO: Move isValidRedirectTarget() out Title, so we can use a TitleValue here.
			$title = $this->titleFactory->newFromText( $m[1] );

			// If the title is a redirect to bad special pages or is invalid, return null
			if ( !$title instanceof Title || !$title->isValidRedirectTarget() ) {
				return [ null, $content ];
			}

			$remainingContent = new WikitextContent( substr( $text, strlen( $m[0] ) ) );
			return [ $title, $remainingContent ];
		}

		return [ null, $content ];
	}

	/**
	 * Returns a ParserOutput object resulting from parsing the content's text
	 * using the global Parser service.
	 *
	 * @since 1.38
	 * @param Content $content
	 * @param ContentParseParams $cpoParams
	 * @param ParserOutput &$parserOutput The output object to fill (reference).
	 */
	protected function fillParserOutput(
		Content $content,
		ContentParseParams $cpoParams,
		ParserOutput &$parserOutput
	) {
		'@phan-var WikitextContent $content';
		$title = $this->titleFactory->newFromPageReference( $cpoParams->getPage() );
		$parserOptions = $cpoParams->getParserOptions();
		$revId = $cpoParams->getRevId();

		[ $redir, $contentWithoutRedirect ] = $this->extractRedirectTargetAndText( $content );
		if ( $parserOptions->getUseParsoid() ) {
			$parser = $this->parsoidParserFactory->create();
		} else {
			$parser = $this->parserFactory->getInstance();
		}

		$text = $contentWithoutRedirect->getText();
		$parserOutput = $parser
			->parse( $text, $title, $parserOptions, true, true, $revId );

		// T330667: Record the fact that we used the value of
		// 'useParsoid' to influence this parse.  Note that
		// ::getUseParsoid() has a side-effect on $parserOutput here
		// which didn't occur when we called ::getUseParsoid() earlier
		// because $parserOutput didn't exist at that time.
		$parserOptions->getUseParsoid();

		// Add redirect indicator at the top
		if ( $redir ) {
			// Make sure to include the redirect link in pagelinks
			$parserOutput->addLink( $redir );
			if ( $cpoParams->getGenerateHtml() ) {
				$parserOutput->setRedirectHeader(
					$this->linkRenderer->makeRedirectHeader(
						$title->getPageLanguage(), $redir, false
					)
				);
				$parserOutput->addModuleStyles( [ 'mediawiki.action.view.redirectPage' ] );
			} else {
				$parserOutput->setText( null );
			}
		}

		// Pass along user-signature flag
		if ( in_array( 'user-signature', $content->getPreSaveTransformFlags() ) ) {
			$parserOutput->setOutputFlag( ParserOutputFlags::USER_SIGNATURE );
		}
	}
}
