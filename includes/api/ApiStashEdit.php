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
 * @author Aaron Schulz
 */

/**
 * Prepare and edit in shared cache so that it can be reused on edit
 *
 * This endpoint can be called via AJAX as the user focuses on the edit
 * summary box. By the time of submission, the parse may have already
 * finished, and can be immediately used on page save. Certain parser
 * functions like {{REVISIONID}} or {{CURRENTTIME}} may cause the cache
 * to not be used on edit. Template and files used are check for changes
 * since the output was generated. The cache TTL is also kept low for sanity.
 *
 * @ingroup API
 * @since 1.25
 */
class ApiStashEdit extends ApiBase {
	public function execute() {
		global $wgMemc;

		$user = $this->getUser();
		$params = $this->extractRequestParams();

		$page = $this->getTitleOrPageId( $params );
		$title = $page->getTitle();

		if ( !ContentHandler::getForModelID( $params['contentmodel'] )
			->isSupportedFormat( $params['contentformat'] )
		) {
			$this->dieUsage( "Unsupported content model/format", 'badmodelformat' );
		}

		// Trim and fix newlines so the key SHA1's match (see RequestContext::getText())
		$text = rtrim( str_replace( "\r\n", "\n", $params['text'] ) );
		$textContent = ContentHandler::makeContent(
			$text, $title, $params['contentmodel'], $params['contentformat'] );

		$page = WikiPage::factory( $title );
		if ( $page->exists() ) {
			// Page exists: get the merged content with the proposed change
			$baseRev = Revision::newFromPageId( $page->getId(), $params['baserevid'] );
			if ( !$baseRev ) {
				$this->dieUsage( "No revision ID {$params['baserevid']}", 'missingrev' );
			}
			$currentRev = $page->getRevision();
			if ( !$currentRev ) {
				$this->dieUsage( "No current revision of page ID {$page->getId()}", 'missingrev' );
			}
			// Merge in the new version of the section to get the proposed version
			$editContent = $page->replaceSectionAtRev(
				$params['section'],
				$textContent,
				$params['sectiontitle'],
				$baseRev->getId()
			);
			if ( !$editContent ) {
				$this->dieUsage( "Could not merge updated section.", 'replacefailed' );
			}
			if ( $currentRev->getId() == $baseRev->getId() ) {
				// Base revision was still the latest; nothing to merge
				$content = $editContent;
			} else {
				// Merge the edit into the current version
				$baseContent = $baseRev->getContent();
				$currentContent = $currentRev->getContent();
				if ( !$baseContent || !$currentContent ) {
					$this->dieUsage( "Missing content for page ID {$page->getId()}", 'missingrev' );
				}
				$handler = ContentHandler::getForModelID( $baseContent->getModel() );
				$content = $handler->merge3( $baseContent, $editContent, $currentContent );
			}
		} else {
			// New pages: use the user-provided content model
			$content = $textContent;
		}

		if ( !$content ) { // merge3() failed
			$this->getResult()->addValue( null,
				$this->getModuleName(), array( 'status' => 'editconflict' ) );
			return;
		}

		// The user will abort the AJAX request by pressing "save", so ignore that
		ignore_user_abort( true );

		// Get a key based on the source text, format, and user preferences
		$key = self::getStashKey( $title, $content, $user );
		// De-duplicate requests on the same key
		if ( $user->pingLimiter( 'stashedit' ) ) {
			$editInfo = false;
			$status = 'ratelimited';
		} elseif ( $wgMemc->lock( $key, 0, 30 ) ) {
			$contentFormat = $content->getDefaultFormat();
			$editInfo = $page->prepareContentForEdit( $content, null, $user, $contentFormat );
			$status = 'error'; // default
			$unlocker = new ScopedCallback( function() use ( $key ) {
				global $wgMemc;
				$wgMemc->unlock( $key );
			} );
		} else {
			$editInfo = false;
			$status = 'busy';
		}

		if ( $editInfo && $editInfo->output ) {
			$parserOutput = $editInfo->output;
			// If an item is renewed, mind the cache TTL determined by config and parser functions
			$since = time() - wfTimestamp( TS_UNIX, $parserOutput->getTimestamp() );
			$ttl = min( $parserOutput->getCacheExpiry() - $since, 5 * 60 );
			if ( $ttl > 0 && !$parserOutput->getFlag( 'vary-revision' ) ) {
				// Only store what is actually needed
				$stashInfo = (object)array(
					'pstContent' => $editInfo->pstContent,
					'output' => $editInfo->output,
					'timestamp' => $editInfo->timestamp
				);
				$ok = $wgMemc->set( $key, $stashInfo, $ttl );
				if ( $ok ) {
					$status = 'stashed';
					wfDebugLog( 'StashEdit', "Cached parser output for key '$key'." );
				} else {
					$status = 'error';
					wfDebugLog( 'StashEdit', "Failed to cache parser output for key '$key'." );
				}
			} else {
				$status = 'uncacheable';
				wfDebugLog( 'StashEdit', "Uncacheable parser output for key '$key'." );
			}
		}

		$this->getResult()->addValue( null, $this->getModuleName(), array( 'status' => $status ) );
	}

	/**
	 * Get the temporary prepared edit stash key for a user
	 *
	 * @param Title $title
	 * @param Content $content
	 * @param User $user User to get parser options from
	 * @return string
	 */
	protected static function getStashKey(
		Title $title, Content $content, User $user
	) {
		return wfMemcKey( 'prepared-edit',
			md5( $title->getPrefixedDBkey() ), // handle rename races
			$content->getModel(),
			$content->getDefaultFormat(),
			sha1( $content->serialize( $content->getDefaultFormat() ) ),
			$user->getId() ?: md5( $user->getName() ), // account for user parser options
			$user->getId() ? $user->getTouched() : '-' // handle preference change races
		);
	}

	/**
	 * Check that a prepared edit is in cache and still up-to-date
	 *
	 * This method blocks if the prepared edit is already being rendered,
	 * waiting until rendering finishes before doing final validity checks.
	 *
	 * The cache is rejected if template or file changes are detected.
	 * Note that foreign template or file transclusions are not checked.
	 *
	 * The result is a map (pstContent,output,timestamp) with fields
	 * extracted directly from WikiPage::prepareContentForEdit().
	 *
	 * @param Title $title
	 * @param Content $content
	 * @param User $user User to get parser options from
	 * @return stdClass|bool Returns false on cache miss
	 */
	public static function checkCache( Title $title, Content $content, User $user ) {
		global $wgMemc;

		$key = self::getStashKey( $title, $content, $user );
		$editInfo = $wgMemc->get( $key );
		if ( !is_object( $editInfo ) ) {
			$start = microtime( true );
			// We ignore user aborts and keep parsing. Block on any prior parsing
			// so as to use it's results and make use of the time spent parsing.
			if ( $wgMemc->lock( $key, 30, 30 ) ) {
				$editInfo = $wgMemc->get( $key );
				$wgMemc->unlock( $key );
			}
			$sec = microtime( true ) - $start;
			wfDebugLog( 'StashEdit', "Waited $sec seconds on '$key'." );
		}

		if ( !is_object( $editInfo ) || !$editInfo->output ) {
			wfDebugLog( 'StashEdit', "No cache value for key '$key'." );
			return false;
		}

		$time = wfTimestamp( TS_UNIX, $editInfo->output->getTimestamp() );
		if ( ( time() - $time ) <= 3 ) {
			wfDebugLog( 'StashEdit', "Timestamp-based cache hit for key '$key'." );
			return $editInfo; // assume nothing changed
		}

		$dbr = wfGetDB( DB_SLAVE );
		// Check that no templates used in the output changed...
		$cWhr = array(); // conditions to find changes/creations
		$dWhr = array(); // conditions to find deletions
		foreach ( $editInfo->output->getTemplateIds() as $ns => $stuff ) {
			foreach ( $stuff as $dbkey => $revId ) {
				$cWhr[] = array( 'page_namespace' => $ns, 'page_title' => $dbkey,
					'page_latest != ' . intval( $revId ) );
				$dWhr[] = array( 'page_namespace' => $ns, 'page_title' => $dbkey );
			}
		}
		$change = $dbr->selectField( 'page', '1', $dbr->makeList( $cWhr, LIST_OR ), __METHOD__ );
		$n = $dbr->selectField( 'page', 'COUNT(*)', $dbr->makeList( $dWhr, LIST_OR ), __METHOD__ );
		if ( $change || $n != count( $dWhr ) ) {
			wfDebugLog( 'StashEdit', "Stale cache for key '$key'; template changed." );
			return false;
		}

		// Check that no files used in the output changed...
		$cWhr = array(); // conditions to find changes/creations
		$dWhr = array(); // conditions to find deletions
		foreach ( $editInfo->output->getFileSearchOptions() as $name => $options ) {
			$cWhr[] = array( 'img_name' => $dbkey,
				'img_sha1 != ' . $dbr->addQuotes( strval( $options['sha1'] ) ) );
			$dWhr[] = array( 'img_name' => $dbkey );
		}
		$change = $dbr->selectField( 'image', '1', $dbr->makeList( $cWhr, LIST_OR ), __METHOD__ );
		$n = $dbr->selectField( 'image', 'COUNT(*)', $dbr->makeList( $dWhr, LIST_OR ), __METHOD__ );
		if ( $change || $n != count( $dWhr ) ) {
			wfDebugLog( 'StashEdit', "Stale cache for key '$key'; file changed." );
			return false;
		}

		wfDebugLog( 'StashEdit', "Cache hit for key '$key'." );

		return $editInfo;
	}

	public function getAllowedParams() {
		return array(
			'title' => array(
				ApiBase::PARAM_TYPE => 'string',
				ApiBase::PARAM_REQUIRED => true
			),
			'section' => array(
				ApiBase::PARAM_TYPE => 'string',
			),
			'sectiontitle' => array(
				ApiBase::PARAM_TYPE => 'string'
			),
			'text' => array(
				ApiBase::PARAM_TYPE => 'string',
				ApiBase::PARAM_REQUIRED => true
			),
			'contentmodel' => array(
				ApiBase::PARAM_TYPE => ContentHandler::getContentModels(),
				ApiBase::PARAM_REQUIRED => true
			),
			'contentformat' => array(
				ApiBase::PARAM_TYPE => ContentHandler::getAllContentFormats(),
				ApiBase::PARAM_REQUIRED => true
			),
			'baserevid' => array(
				ApiBase::PARAM_TYPE => 'integer',
				ApiBase::PARAM_REQUIRED => true
			)
		);
	}

	function needsToken() {
		return 'csrf';
	}

	function mustBePosted() {
		return true;
	}

	function isInternal() {
		return true;
	}
}
