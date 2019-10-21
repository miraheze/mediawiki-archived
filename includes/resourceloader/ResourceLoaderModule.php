<?php
/**
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
 * @file
 * @author Trevor Parscal
 * @author Roan Kattouw
 */

use MediaWiki\MediaWikiServices;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use Wikimedia\AtEase\AtEase;
use Wikimedia\RelPath;
use Wikimedia\ScopedCallback;

/**
 * Abstraction for ResourceLoader modules, with name registration and maxage functionality.
 *
 * @ingroup ResourceLoader
 * @since 1.17
 */
abstract class ResourceLoaderModule implements LoggerAwareInterface {
	/** @var Config */
	protected $config;
	/** @var LoggerInterface */
	protected $logger;

	/**
	 * Script and style modules form a hierarchy of trustworthiness, with core modules
	 * like skins and jQuery as most trustworthy, and user scripts as least trustworthy. We can
	 * limit the types of scripts and styles we allow to load on, say, sensitive special
	 * pages like Special:UserLogin and Special:Preferences
	 * @var int
	 */
	protected $origin = self::ORIGIN_CORE_SITEWIDE;

	/** @var string|null Module name */
	protected $name = null;
	/** @var string[] What client platforms the module targets (e.g. desktop, mobile) */
	protected $targets = [ 'desktop' ];

	/** @var array Map of (variant => indirect file dependencies) */
	protected $fileDeps = [];
	/** @var array Map of (language => in-object cache for message blob) */
	protected $msgBlobs = [];
	/** @var array Map of (context hash => cached module version hash) */
	protected $versionHash = [];
	/** @var array Map of (context hash => cached module content) */
	protected $contents = [];

	/** @var string|bool Deprecation string or true if deprecated; false otherwise */
	protected $deprecated = false;

	/** @var string Scripts only */
	const TYPE_SCRIPTS = 'scripts';
	/** @var string Styles only */
	const TYPE_STYLES = 'styles';
	/** @var string Scripts and styles */
	const TYPE_COMBINED = 'combined';

	/** @var string Module only has styles (loaded via <style> or <link rel=stylesheet>) */
	const LOAD_STYLES = 'styles';
	/** @var string Module may have other resources (loaded via mw.loader from a script) */
	const LOAD_GENERAL = 'general';

	/** @var int Sitewide core module like a skin file or jQuery component */
	const ORIGIN_CORE_SITEWIDE = 1;
	/** @var int Per-user module generated by the software */
	const ORIGIN_CORE_INDIVIDUAL = 2;
	/**
	 * Sitewide module generated from user-editable files, like MediaWiki:Common.js,
	 * or modules accessible to multiple users, such as those generated by the Gadgets extension.
	 * @var int
	 */
	const ORIGIN_USER_SITEWIDE = 3;
	/** @var int Per-user module generated from user-editable files, like User:Me/vector.js */
	const ORIGIN_USER_INDIVIDUAL = 4;
	/** @var int An access constant; make sure this is kept as the largest number in this group */
	const ORIGIN_ALL = 10;

	/**
	 * Get this module's name. This is set when the module is registered
	 * with ResourceLoader::register()
	 *
	 * @return string|null Name (string) or null if no name was set
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Set this module's name. This is called by ResourceLoader::register()
	 * when registering the module. Other code should not call this.
	 *
	 * @param string $name
	 */
	public function setName( $name ) {
		$this->name = $name;
	}

	/**
	 * Get this module's origin. This is set when the module is registered
	 * with ResourceLoader::register()
	 *
	 * @return int ResourceLoaderModule class constant, the subclass default
	 *     if not set manually
	 */
	public function getOrigin() {
		return $this->origin;
	}

	/**
	 * @param ResourceLoaderContext $context
	 * @return bool
	 */
	public function getFlip( ResourceLoaderContext $context ) {
		return MediaWikiServices::getInstance()->getContentLanguage()->getDir() !==
			$context->getDirection();
	}

	/**
	 * Get JS representing deprecation information for the current module if available
	 *
	 * @param ResourceLoaderContext|null $context Missing $context is deprecated in 1.34
	 * @return string JavaScript code
	 */
	public function getDeprecationInformation( ResourceLoaderContext $context = null ) {
		if ( $context === null ) {
			wfDeprecated( __METHOD__ . ' without a ResourceLoader context', '1.34' );
		}
		$deprecationInfo = $this->deprecated;
		if ( $deprecationInfo ) {
			$name = $this->getName();
			$warning = 'This page is using the deprecated ResourceLoader module "' . $name . '".';
			if ( is_string( $deprecationInfo ) ) {
				$warning .= "\n" . $deprecationInfo;
			}
			if ( $context === null ) {
				return 'mw.log.warn(' . ResourceLoader::encodeJsonForScript( $warning ) . ');';
			}
			return 'mw.log.warn(' . $context->encodeJson( $warning ) . ');';
		} else {
			return '';
		}
	}

	/**
	 * Get all JS for this module for a given language and skin.
	 * Includes all relevant JS except loader scripts.
	 *
	 * For "plain" script modules, this should return a string with JS code. For multi-file modules
	 * where require() is used to load one file from another file, this should return an array
	 * structured as follows:
	 * [
	 *     'files' => [
	 *         'file1.js' => [ 'type' => 'script', 'content' => 'JS code' ],
	 *         'file2.js' => [ 'type' => 'script', 'content' => 'JS code' ],
	 *         'data.json' => [ 'type' => 'data', 'content' => array ]
	 *     ],
	 *     'main' => 'file1.js'
	 * ]
	 *
	 * @param ResourceLoaderContext $context
	 * @return string|array JavaScript code (string), or multi-file structure described above (array)
	 */
	public function getScript( ResourceLoaderContext $context ) {
		// Stub, override expected
		return '';
	}

	/**
	 * Takes named templates by the module and returns an array mapping.
	 *
	 * @return string[] Array of templates mapping template alias to content
	 */
	public function getTemplates() {
		// Stub, override expected.
		return [];
	}

	/**
	 * @return Config
	 * @since 1.24
	 */
	public function getConfig() {
		if ( $this->config === null ) {
			// Ugh, fall back to default
			$this->config = MediaWikiServices::getInstance()->getMainConfig();
		}

		return $this->config;
	}

	/**
	 * @param Config $config
	 * @since 1.24
	 */
	public function setConfig( Config $config ) {
		$this->config = $config;
	}

	/**
	 * @since 1.27
	 * @param LoggerInterface $logger
	 */
	public function setLogger( LoggerInterface $logger ) {
		$this->logger = $logger;
	}

	/**
	 * @since 1.27
	 * @return LoggerInterface
	 */
	protected function getLogger() {
		if ( !$this->logger ) {
			$this->logger = new NullLogger();
		}
		return $this->logger;
	}

	/**
	 * Get the URL or URLs to load for this module's JS in debug mode.
	 * The default behavior is to return a load.php?only=scripts URL for
	 * the module, but file-based modules will want to override this to
	 * load the files directly.
	 *
	 * This function is called only when 1) we're in debug mode, 2) there
	 * is no only= parameter and 3) supportsURLLoading() returns true.
	 * #2 is important to prevent an infinite loop, therefore this function
	 * MUST return either an only= URL or a non-load.php URL.
	 *
	 * @param ResourceLoaderContext $context
	 * @return array Array of URLs
	 */
	public function getScriptURLsForDebug( ResourceLoaderContext $context ) {
		$resourceLoader = $context->getResourceLoader();
		$derivative = new DerivativeResourceLoaderContext( $context );
		$derivative->setModules( [ $this->getName() ] );
		$derivative->setOnly( 'scripts' );
		$derivative->setDebug( true );

		$url = $resourceLoader->createLoaderURL(
			$this->getSource(),
			$derivative
		);

		return [ $url ];
	}

	/**
	 * Whether this module supports URL loading. If this function returns false,
	 * getScript() will be used even in cases (debug mode, no only param) where
	 * getScriptURLsForDebug() would normally be used instead.
	 * @return bool
	 */
	public function supportsURLLoading() {
		return true;
	}

	/**
	 * Get all CSS for this module for a given skin.
	 *
	 * @param ResourceLoaderContext $context
	 * @return array List of CSS strings or array of CSS strings keyed by media type.
	 *  like [ 'screen' => '.foo { width: 0 }' ];
	 *  or [ 'screen' => [ '.foo { width: 0 }' ] ];
	 */
	public function getStyles( ResourceLoaderContext $context ) {
		// Stub, override expected
		return [];
	}

	/**
	 * Get the URL or URLs to load for this module's CSS in debug mode.
	 * The default behavior is to return a load.php?only=styles URL for
	 * the module, but file-based modules will want to override this to
	 * load the files directly. See also getScriptURLsForDebug()
	 *
	 * @param ResourceLoaderContext $context
	 * @return array [ mediaType => [ URL1, URL2, ... ], ... ]
	 */
	public function getStyleURLsForDebug( ResourceLoaderContext $context ) {
		$resourceLoader = $context->getResourceLoader();
		$derivative = new DerivativeResourceLoaderContext( $context );
		$derivative->setModules( [ $this->getName() ] );
		$derivative->setOnly( 'styles' );
		$derivative->setDebug( true );

		$url = $resourceLoader->createLoaderURL(
			$this->getSource(),
			$derivative
		);

		return [ 'all' => [ $url ] ];
	}

	/**
	 * Get the messages needed for this module.
	 *
	 * To get a JSON blob with messages, use MessageBlobStore::get()
	 *
	 * @return array List of message keys. Keys may occur more than once
	 */
	public function getMessages() {
		// Stub, override expected
		return [];
	}

	/**
	 * Get the group this module is in.
	 *
	 * @return string Group name
	 */
	public function getGroup() {
		// Stub, override expected
		return null;
	}

	/**
	 * Get the source of this module. Should only be overridden for foreign modules.
	 *
	 * @return string Source name, 'local' for local modules
	 */
	public function getSource() {
		// Stub, override expected
		return 'local';
	}

	/**
	 * Get a list of modules this module depends on.
	 *
	 * Dependency information is taken into account when loading a module
	 * on the client side.
	 *
	 * Note: It is expected that $context will be made non-optional in the near
	 * future.
	 *
	 * @param ResourceLoaderContext|null $context
	 * @return array List of module names as strings
	 */
	public function getDependencies( ResourceLoaderContext $context = null ) {
		// Stub, override expected
		return [];
	}

	/**
	 * Get target(s) for the module, eg ['desktop'] or ['desktop', 'mobile']
	 *
	 * @return array Array of strings
	 */
	public function getTargets() {
		return $this->targets;
	}

	/**
	 * Get the module's load type.
	 *
	 * @since 1.28
	 * @return string ResourceLoaderModule LOAD_* constant
	 */
	public function getType() {
		return self::LOAD_GENERAL;
	}

	/**
	 * Get the skip function.
	 *
	 * Modules that provide fallback functionality can provide a "skip function". This
	 * function, if provided, will be passed along to the module registry on the client.
	 * When this module is loaded (either directly or as a dependency of another module),
	 * then this function is executed first. If the function returns true, the module will
	 * instantly be considered "ready" without requesting the associated module resources.
	 *
	 * The value returned here must be valid javascript for execution in a private function.
	 * It must not contain the "function () {" and "}" wrapper though.
	 *
	 * @return string|null A JavaScript function body returning a boolean value, or null
	 */
	public function getSkipFunction() {
		return null;
	}

	/**
	 * Get the files this module depends on indirectly for a given skin.
	 *
	 * These are only image files referenced by the module's stylesheet.
	 *
	 * @param ResourceLoaderContext $context
	 * @return array List of files
	 */
	protected function getFileDependencies( ResourceLoaderContext $context ) {
		$vary = self::getVary( $context );

		// Try in-object cache first
		if ( !isset( $this->fileDeps[$vary] ) ) {
			$dbr = wfGetDB( DB_REPLICA );
			$deps = $dbr->selectField( 'module_deps',
				'md_deps',
				[
					'md_module' => $this->getName(),
					'md_skin' => $vary,
				],
				__METHOD__
			);

			if ( !is_null( $deps ) ) {
				$this->fileDeps[$vary] = self::expandRelativePaths(
					(array)json_decode( $deps, true )
				);
			} else {
				$this->fileDeps[$vary] = [];
			}
		}
		return $this->fileDeps[$vary];
	}

	/**
	 * Set in-object cache for file dependencies.
	 *
	 * This is used to retrieve data in batches. See ResourceLoader::preloadModuleInfo().
	 * To save the data, use saveFileDependencies().
	 *
	 * @param ResourceLoaderContext $context
	 * @param string[] $files Array of file names
	 */
	public function setFileDependencies( ResourceLoaderContext $context, $files ) {
		$vary = self::getVary( $context );
		$this->fileDeps[$vary] = $files;
	}

	/**
	 * Set the files this module depends on indirectly for a given skin.
	 *
	 * @since 1.27
	 * @param ResourceLoaderContext $context
	 * @param array $localFileRefs List of files
	 */
	protected function saveFileDependencies( ResourceLoaderContext $context, $localFileRefs ) {
		try {
			// Related bugs and performance considerations:
			// 1. Don't needlessly change the database value with the same list in a
			//    different order or with duplicates.
			// 2. Use relative paths to avoid ghost entries when $IP changes. (T111481)
			// 3. Don't needlessly replace the database with the same value
			//    just because $IP changed (e.g. when upgrading a wiki).
			// 4. Don't create an endless replace loop on every request for this
			//    module when '../' is used anywhere. Even though both are expanded
			//    (one expanded by getFileDependencies from the DB, the other is
			//    still raw as originally read by RL), the latter has not
			//    been normalized yet.

			// Normalise
			$localFileRefs = array_values( array_unique( $localFileRefs ) );
			sort( $localFileRefs );
			$localPaths = self::getRelativePaths( $localFileRefs );
			$storedPaths = self::getRelativePaths( $this->getFileDependencies( $context ) );

			if ( $localPaths === $storedPaths ) {
				// Unchanged. Avoid needless database query (especially master conn!).
				return;
			}

			// The file deps list has changed, we want to update it.
			$vary = self::getVary( $context );
			$cache = ObjectCache::getLocalClusterInstance();
			$key = $cache->makeKey( __METHOD__, $this->getName(), $vary );
			$scopeLock = $cache->getScopedLock( $key, 0 );
			if ( !$scopeLock ) {
				// Another request appears to be doing this update already.
				// Avoid write slams (T124649).
				return;
			}

			// No needless escaping as this isn't HTML output.
			// Only stored in the database and parsed in PHP.
			$deps = json_encode( $localPaths, JSON_UNESCAPED_SLASHES );
			$dbw = wfGetDB( DB_MASTER );
			$dbw->upsert( 'module_deps',
				[
					'md_module' => $this->getName(),
					'md_skin' => $vary,
					'md_deps' => $deps,
				],
				[ [ 'md_module', 'md_skin' ] ],
				[
					'md_deps' => $deps,
				],
				__METHOD__
			);

			if ( $dbw->trxLevel() ) {
				$dbw->onTransactionResolution(
					function () use ( &$scopeLock ) {
						ScopedCallback::consume( $scopeLock ); // release after commit
					},
					__METHOD__
				);
			}
		} catch ( Exception $e ) {
			// Probably a DB failure. Either the read query from getFileDependencies(),
			// or the write query above.
			wfDebugLog( 'resourceloader', __METHOD__ . ": failed to update DB: $e" );
		}
	}

	/**
	 * Make file paths relative to MediaWiki directory.
	 *
	 * This is used to make file paths safe for storing in a database without the paths
	 * becoming stale or incorrect when MediaWiki is moved or upgraded (T111481).
	 *
	 * @since 1.27
	 * @param array $filePaths
	 * @return array
	 */
	public static function getRelativePaths( array $filePaths ) {
		global $IP;
		return array_map( function ( $path ) use ( $IP ) {
			return RelPath::getRelativePath( $path, $IP );
		}, $filePaths );
	}

	/**
	 * Expand directories relative to $IP.
	 *
	 * @since 1.27
	 * @param array $filePaths
	 * @return array
	 */
	public static function expandRelativePaths( array $filePaths ) {
		global $IP;
		return array_map( function ( $path ) use ( $IP ) {
			return RelPath::joinPath( $IP, $path );
		}, $filePaths );
	}

	/**
	 * Get the hash of the message blob.
	 *
	 * @since 1.27
	 * @param ResourceLoaderContext $context
	 * @return string|null JSON blob or null if module has no messages
	 */
	protected function getMessageBlob( ResourceLoaderContext $context ) {
		if ( !$this->getMessages() ) {
			// Don't bother consulting MessageBlobStore
			return null;
		}
		// Message blobs may only vary language, not by context keys
		$lang = $context->getLanguage();
		if ( !isset( $this->msgBlobs[$lang] ) ) {
			$this->getLogger()->warning( 'Message blob for {module} should have been preloaded', [
				'module' => $this->getName(),
			] );
			$store = $context->getResourceLoader()->getMessageBlobStore();
			$this->msgBlobs[$lang] = $store->getBlob( $this, $lang );
		}
		return $this->msgBlobs[$lang];
	}

	/**
	 * Set in-object cache for message blobs.
	 *
	 * Used to allow fetching of message blobs in batches. See ResourceLoader::preloadModuleInfo().
	 *
	 * @since 1.27
	 * @param string|null $blob JSON blob or null
	 * @param string $lang Language code
	 */
	public function setMessageBlob( $blob, $lang ) {
		$this->msgBlobs[$lang] = $blob;
	}

	/**
	 * Get headers to send as part of a module web response.
	 *
	 * It is not supported to send headers through this method that are
	 * required to be unique or otherwise sent once in an HTTP response
	 * because clients may make batch requests for multiple modules (as
	 * is the default behaviour for ResourceLoader clients).
	 *
	 * For exclusive or aggregated headers, see ResourceLoader::sendResponseHeaders().
	 *
	 * @since 1.30
	 * @param ResourceLoaderContext $context
	 * @return string[] Array of HTTP response headers
	 */
	final public function getHeaders( ResourceLoaderContext $context ) {
		$headers = [];

		$formattedLinks = [];
		foreach ( $this->getPreloadLinks( $context ) as $url => $attribs ) {
			$link = "<{$url}>;rel=preload";
			foreach ( $attribs as $key => $val ) {
				$link .= ";{$key}={$val}";
			}
			$formattedLinks[] = $link;
		}
		if ( $formattedLinks ) {
			$headers[] = 'Link: ' . implode( ',', $formattedLinks );
		}

		return $headers;
	}

	/**
	 * Get a list of resources that web browsers may preload.
	 *
	 * Behaviour of rel=preload link is specified at <https://www.w3.org/TR/preload/>.
	 *
	 * Use case for ResourceLoader originally part of T164299.
	 *
	 * @par Example
	 * @code
	 *     protected function getPreloadLinks() {
	 *         return [
	 *             'https://example.org/script.js' => [ 'as' => 'script' ],
	 *             'https://example.org/image.png' => [ 'as' => 'image' ],
	 *         ];
	 *     }
	 * @endcode
	 *
	 * @par Example using HiDPI image variants
	 * @code
	 *     protected function getPreloadLinks() {
	 *         return [
	 *             'https://example.org/logo.png' => [
	 *                 'as' => 'image',
	 *                 'media' => 'not all and (min-resolution: 2dppx)',
	 *             ],
	 *             'https://example.org/logo@2x.png' => [
	 *                 'as' => 'image',
	 *                 'media' => '(min-resolution: 2dppx)',
	 *             ],
	 *         ];
	 *     }
	 * @endcode
	 *
	 * @see ResourceLoaderModule::getHeaders
	 * @since 1.30
	 * @param ResourceLoaderContext $context
	 * @return array Keyed by url, values must be an array containing
	 *  at least an 'as' key. Optionally a 'media' key as well.
	 */
	protected function getPreloadLinks( ResourceLoaderContext $context ) {
		return [];
	}

	/**
	 * Get module-specific LESS variables, if any.
	 *
	 * @since 1.27
	 * @param ResourceLoaderContext $context
	 * @return array Module-specific LESS variables.
	 */
	protected function getLessVars( ResourceLoaderContext $context ) {
		return [];
	}

	/**
	 * Get an array of this module's resources. Ready for serving to the web.
	 *
	 * @since 1.26
	 * @param ResourceLoaderContext $context
	 * @return array
	 */
	public function getModuleContent( ResourceLoaderContext $context ) {
		$contextHash = $context->getHash();
		// Cache this expensive operation. This calls builds the scripts, styles, and messages
		// content which typically involves filesystem and/or database access.
		if ( !array_key_exists( $contextHash, $this->contents ) ) {
			$this->contents[$contextHash] = $this->buildContent( $context );
		}
		return $this->contents[$contextHash];
	}

	/**
	 * Bundle all resources attached to this module into an array.
	 *
	 * @since 1.26
	 * @param ResourceLoaderContext $context
	 * @return array
	 */
	final protected function buildContent( ResourceLoaderContext $context ) {
		$stats = MediaWikiServices::getInstance()->getStatsdDataFactory();
		$statStart = microtime( true );

		// This MUST build both scripts and styles, regardless of whether $context->getOnly()
		// is 'scripts' or 'styles' because the result is used by getVersionHash which
		// must be consistent regardless of the 'only' filter on the current request.
		// Also, when introducing new module content resources (e.g. templates, headers),
		// these should only be included in the array when they are non-empty so that
		// existing modules not using them do not get their cache invalidated.
		$content = [];

		// Scripts
		// If we are in debug mode, we'll want to return an array of URLs if possible
		// However, we can't do this if the module doesn't support it.
		// We also can't do this if there is an only= parameter, because we have to give
		// the module a way to return a load.php URL without causing an infinite loop
		if ( $context->getDebug() && !$context->getOnly() && $this->supportsURLLoading() ) {
			$scripts = $this->getScriptURLsForDebug( $context );
		} else {
			$scripts = $this->getScript( $context );
			// Make the script safe to concatenate by making sure there is at least one
			// trailing new line at the end of the content. Previously, this looked for
			// a semi-colon instead, but that breaks concatenation if the semicolon
			// is inside a comment like "// foo();". Instead, simply use a
			// line break as separator which matches JavaScript native logic for implicitly
			// ending statements even if a semi-colon is missing.
			// Bugs: T29054, T162719.
			if ( is_string( $scripts )
				&& strlen( $scripts )
				&& substr( $scripts, -1 ) !== "\n"
			) {
				$scripts .= "\n";
			}
		}
		$content['scripts'] = $scripts;

		$styles = [];
		// Don't create empty stylesheets like [ '' => '' ] for modules
		// that don't *have* any stylesheets (T40024).
		$stylePairs = $this->getStyles( $context );
		if ( count( $stylePairs ) ) {
			// If we are in debug mode without &only= set, we'll want to return an array of URLs
			// See comment near shouldIncludeScripts() for more details
			if ( $context->getDebug() && !$context->getOnly() && $this->supportsURLLoading() ) {
				$styles = [
					'url' => $this->getStyleURLsForDebug( $context )
				];
			} else {
				// Minify CSS before embedding in mw.loader.implement call
				// (unless in debug mode)
				if ( !$context->getDebug() ) {
					foreach ( $stylePairs as $media => $style ) {
						// Can be either a string or an array of strings.
						if ( is_array( $style ) ) {
							$stylePairs[$media] = [];
							foreach ( $style as $cssText ) {
								if ( is_string( $cssText ) ) {
									$stylePairs[$media][] =
										ResourceLoader::filter( 'minify-css', $cssText );
								}
							}
						} elseif ( is_string( $style ) ) {
							$stylePairs[$media] = ResourceLoader::filter( 'minify-css', $style );
						}
					}
				}
				// Wrap styles into @media groups as needed and flatten into a numerical array
				$styles = [
					'css' => ResourceLoader::makeCombinedStyles( $stylePairs )
				];
			}
		}
		$content['styles'] = $styles;

		// Messages
		$blob = $this->getMessageBlob( $context );
		if ( $blob ) {
			$content['messagesBlob'] = $blob;
		}

		$templates = $this->getTemplates();
		if ( $templates ) {
			$content['templates'] = $templates;
		}

		$headers = $this->getHeaders( $context );
		if ( $headers ) {
			$content['headers'] = $headers;
		}

		$statTiming = microtime( true ) - $statStart;
		$statName = strtr( $this->getName(), '.', '_' );
		$stats->timing( "resourceloader_build.all", 1000 * $statTiming );
		$stats->timing( "resourceloader_build.$statName", 1000 * $statTiming );

		return $content;
	}

	/**
	 * Get a string identifying the current version of this module in a given context.
	 *
	 * Whenever anything happens that changes the module's response (e.g. scripts, styles, and
	 * messages) this value must change. This value is used to store module responses in cache.
	 * (Both client-side and server-side.)
	 *
	 * It is not recommended to override this directly. Use getDefinitionSummary() instead.
	 * If overridden, one must call the parent getVersionHash(), append data and re-hash.
	 *
	 * This method should be quick because it is frequently run by ResourceLoaderStartUpModule to
	 * propagate changes to the client and effectively invalidate cache.
	 *
	 * @since 1.26
	 * @param ResourceLoaderContext $context
	 * @return string Hash (should use ResourceLoader::makeHash)
	 */
	public function getVersionHash( ResourceLoaderContext $context ) {
		// Cache this somewhat expensive operation. Especially because some classes
		// (e.g. startup module) iterate more than once over all modules to get versions.
		$contextHash = $context->getHash();
		if ( !array_key_exists( $contextHash, $this->versionHash ) ) {
			if ( $this->enableModuleContentVersion() ) {
				// Detect changes directly by hashing the module contents.
				$str = json_encode( $this->getModuleContent( $context ) );
			} else {
				// Infer changes based on definition and other metrics
				$summary = $this->getDefinitionSummary( $context );
				if ( !isset( $summary['_class'] ) ) {
					throw new LogicException( 'getDefinitionSummary must call parent method' );
				}
				$str = json_encode( $summary );
			}

			$this->versionHash[$contextHash] = ResourceLoader::makeHash( $str );
		}
		return $this->versionHash[$contextHash];
	}

	/**
	 * Whether to generate version hash based on module content.
	 *
	 * If a module requires database or file system access to build the module
	 * content, consider disabling this in favour of manually tracking relevant
	 * aspects in getDefinitionSummary(). See getVersionHash() for how this is used.
	 *
	 * @return bool
	 */
	public function enableModuleContentVersion() {
		return false;
	}

	/**
	 * Get the definition summary for this module.
	 *
	 * This is the method subclasses are recommended to use to track values in their
	 * version hash. Call this in getVersionHash() and pass it to e.g. json_encode.
	 *
	 * Subclasses must call the parent getDefinitionSummary() and build on that.
	 * It is recommended that each subclass appends its own new array. This prevents
	 * clashes or accidental overwrites of existing keys and gives each subclass
	 * its own scope for simple array keys.
	 *
	 * @code
	 *     $summary = parent::getDefinitionSummary( $context );
	 *     $summary[] = [
	 *         'foo' => 123,
	 *         'bar' => 'quux',
	 *     ];
	 *     return $summary;
	 * @endcode
	 *
	 * Return an array containing values from all significant properties of this
	 * module's definition.
	 *
	 * Be careful not to normalise too much. Especially preserve the order of things
	 * that carry significance in getScript and getStyles (T39812).
	 *
	 * Avoid including things that are insiginificant (e.g. order of message keys is
	 * insignificant and should be sorted to avoid unnecessary cache invalidation).
	 *
	 * This data structure must exclusively contain arrays and scalars as values (avoid
	 * object instances) to allow simple serialisation using json_encode.
	 *
	 * If modules have a hash or timestamp from another source, that may be incuded as-is.
	 *
	 * A number of utility methods are available to help you gather data. These are not
	 * called by default and must be included by the subclass' getDefinitionSummary().
	 *
	 * - getMessageBlob()
	 *
	 * @since 1.23
	 * @param ResourceLoaderContext $context
	 * @return array|null
	 */
	public function getDefinitionSummary( ResourceLoaderContext $context ) {
		return [
			'_class' => static::class,
			// Make sure that when filter cache for minification is invalidated,
			// we also change the HTTP urls and mw.loader.store keys (T176884).
			'_cacheVersion' => ResourceLoader::CACHE_VERSION,
		];
	}

	/**
	 * Check whether this module is known to be empty. If a child class
	 * has an easy and cheap way to determine that this module is
	 * definitely going to be empty, it should override this method to
	 * return true in that case. Callers may optimize the request for this
	 * module away if this function returns true.
	 * @param ResourceLoaderContext $context
	 * @return bool
	 */
	public function isKnownEmpty( ResourceLoaderContext $context ) {
		return false;
	}

	/**
	 * Check whether this module should be embeded rather than linked
	 *
	 * Modules returning true here will be embedded rather than loaded by
	 * ResourceLoaderClientHtml.
	 *
	 * @since 1.30
	 * @param ResourceLoaderContext $context
	 * @return bool
	 */
	public function shouldEmbedModule( ResourceLoaderContext $context ) {
		return $this->getGroup() === 'private';
	}

	/** @var JSParser Lazy-initialized; use self::javaScriptParser() */
	private static $jsParser;
	private static $parseCacheVersion = 1;

	/**
	 * Validate a given script file; if valid returns the original source.
	 * If invalid, returns replacement JS source that throws an exception.
	 *
	 * @param string $fileName
	 * @param string $contents
	 * @return string JS with the original, or a replacement error
	 */
	protected function validateScriptFile( $fileName, $contents ) {
		if ( !$this->getConfig()->get( 'ResourceLoaderValidateJS' ) ) {
			return $contents;
		}
		$cache = MediaWikiServices::getInstance()->getMainWANObjectCache();
		return $cache->getWithSetCallback(
			$cache->makeGlobalKey(
				'resourceloader-jsparse',
				self::$parseCacheVersion,
				md5( $contents ),
				$fileName
			),
			$cache::TTL_WEEK,
			function () use ( $contents, $fileName ) {
				$parser = self::javaScriptParser();
				$err = null;
				try {
					AtEase::suppressWarnings();
					$parser->parse( $contents, $fileName, 1 );
				} catch ( Exception $e ) {
					$err = $e;
				} finally {
					AtEase::restoreWarnings();
				}
				if ( $err ) {
					// Send the error to the browser console client-side.
					// By returning this as replacement for the actual script,
					// we ensure modules are safe to load in a batch request,
					// without causing other unrelated modules to break.
					return 'mw.log.error(' .
						Xml::encodeJsVar( 'JavaScript parse error: ' . $err->getMessage() ) .
						');';
				}
				return $contents;
			}
		);
	}

	/**
	 * @return JSParser
	 */
	protected static function javaScriptParser() {
		if ( !self::$jsParser ) {
			self::$jsParser = new JSParser();
		}
		return self::$jsParser;
	}

	/**
	 * Safe version of filemtime(), which doesn't throw a PHP warning if the file doesn't exist.
	 * Defaults to 1.
	 *
	 * @param string $filePath File path
	 * @return int UNIX timestamp
	 */
	protected static function safeFilemtime( $filePath ) {
		AtEase::suppressWarnings();
		$mtime = filemtime( $filePath ) ?: 1;
		AtEase::restoreWarnings();
		return $mtime;
	}

	/**
	 * Compute a non-cryptographic string hash of a file's contents.
	 * If the file does not exist or cannot be read, returns an empty string.
	 *
	 * @since 1.26 Uses MD4 instead of SHA1.
	 * @param string $filePath File path
	 * @return string Hash
	 */
	protected static function safeFileHash( $filePath ) {
		return FileContentsHasher::getFileContentsHash( $filePath );
	}

	/**
	 * Get vary string.
	 *
	 * @internal For internal use only.
	 * @param ResourceLoaderContext $context
	 * @return string Vary string
	 */
	public static function getVary( ResourceLoaderContext $context ) {
		return implode( '|', [
			$context->getSkin(),
			$context->getLanguage(),
		] );
	}
}
