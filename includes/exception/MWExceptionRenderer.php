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
 */

use MediaWiki\MediaWikiServices;
use Wikimedia\AtEase;
use Wikimedia\Rdbms\DBConnectionError;
use Wikimedia\Rdbms\DBExpectedError;
use Wikimedia\Rdbms\DBReadOnlyError;
use Wikimedia\RequestTimeout\RequestTimeoutException;

/**
 * Class to expose exceptions to the client (API bots, users, admins using CLI scripts)
 * @since 1.28
 */
class MWExceptionRenderer {
	public const AS_RAW = 1; // show as text
	public const AS_PRETTY = 2; // show as HTML

	/**
	 * @param Throwable $e Original exception
	 * @param int $mode MWExceptionExposer::AS_* constant
	 * @param Throwable|null $eNew New throwable from attempting to show the first
	 */
	public static function output( Throwable $e, $mode, Throwable $eNew = null ) {
		global $wgShowExceptionDetails;

		if ( $e instanceof RequestTimeoutException && headers_sent() ) {
			// Excimer's flag check happens on function return, so, a timeout
			// can be thrown after exiting, say, `doPostOutputShutdown`, where
			// headers are sent.  In which case, it's probably fine not to
			// report this in any user visible way.  The general question of
			// what to do about reporting an exception when headers have been
			// sent is still unclear, but you probably don't want to
			// `useOutputPage`.
			return;
		}

		if ( function_exists( 'apache_setenv' ) ) {
			// The client should not be blocked on "post-send" updates. If apache decides that
			// a response should be gzipped, it will wait for PHP to finish since it cannot gzip
			// anything until it has the full response (even with "Transfer-Encoding: chunked").
			AtEase\AtEase::suppressWarnings();
			apache_setenv( 'no-gzip', '1' );
			AtEase\AtEase::restoreWarnings();
		}

		if ( defined( 'MW_API' ) ) {
			self::header( 'MediaWiki-API-Error: internal_api_error_' . get_class( $e ) );
		}

		if ( self::isCommandLine() ) {
			self::printError( self::getText( $e ) );
		} elseif ( $mode === self::AS_PRETTY ) {
			self::statusHeader( 500 );
			ob_start();
			if ( $e instanceof DBConnectionError ) {
				self::reportOutageHTML( $e );
			} else {
				self::reportHTML( $e );
			}
			self::header( "Content-Length: " . ob_get_length() );
			ob_end_flush();
		} else {
			ob_start();
			self::statusHeader( 500 );
			self::header( 'Content-Type: text/html; charset=UTF-8' );
			if ( $eNew ) {
				$message = "MediaWiki internal error.\n\n";
				if ( $wgShowExceptionDetails ) {
					$message .= 'Original exception: ' .
						MWExceptionHandler::getLogMessage( $e ) .
						"\nBacktrace:\n" . MWExceptionHandler::getRedactedTraceAsString( $e ) .
						"\n\nException caught inside exception handler: " .
							MWExceptionHandler::getLogMessage( $eNew ) .
						"\nBacktrace:\n" . MWExceptionHandler::getRedactedTraceAsString( $eNew );
				} else {
					$message .= 'Original exception: ' .
						MWExceptionHandler::getPublicLogMessage( $e );
					$message .= "\n\nException caught inside exception handler.\n\n" .
						self::getShowBacktraceError( $e );
				}
				$message .= "\n";
			} elseif ( $wgShowExceptionDetails ) {
				$message = MWExceptionHandler::getLogMessage( $e ) .
					"\nBacktrace:\n" .
					MWExceptionHandler::getRedactedTraceAsString( $e ) . "\n";
			} else {
				$message = MWExceptionHandler::getPublicLogMessage( $e );
			}
			print nl2br( htmlspecialchars( $message ) ) . "\n";
			self::header( "Content-Length: " . ob_get_length() );
			ob_end_flush();
		}
	}

	/**
	 * @param Throwable $e
	 * @return bool Should the throwable use $wgOut to output the error?
	 */
	private static function useOutputPage( Throwable $e ) {
		// Can the extension use the Message class/wfMessage to get i18n-ed messages?
		foreach ( $e->getTrace() as $frame ) {
			if ( isset( $frame['class'] ) && $frame['class'] === LocalisationCache::class ) {
				return false;
			}
		}

		// Don't even bother with OutputPage if there's no Title context set,
		// (e.g. we're in RL code on load.php) - the Skin system (and probably
		// most of MediaWiki) won't work.

		return (
			!empty( $GLOBALS['wgFullyInitialised'] ) &&
			!empty( $GLOBALS['wgOut'] ) &&
			RequestContext::getMain()->getTitle() &&
			!defined( 'MEDIAWIKI_INSTALL' ) &&
			// Don't send a skinned HTTP 500 page to API clients.
			!defined( 'MW_API' )
		);
	}

	/**
	 * Output the throwable report using HTML
	 *
	 * @param Throwable $e
	 */
	private static function reportHTML( Throwable $e ) {
		global $wgOut;

		if ( self::useOutputPage( $e ) ) {
			$wgOut->prepareErrorPage( self::getExceptionTitle( $e ) );

			// Show any custom GUI message before the details
			$customMessage = self::getCustomMessage( $e );
			if ( $customMessage !== null ) {
				$wgOut->addHTML( Html::element( 'p', [], $customMessage ) );
			}
			$wgOut->addHTML( self::getHTML( $e ) );
			// Content-Type is set by OutputPage::output
			$wgOut->output();
		} else {
			self::header( 'Content-Type: text/html; charset=UTF-8' );
			$pageTitle = self::msg( 'internalerror', 'Internal error' );
			echo "<!DOCTYPE html>\n" .
				'<html><head>' .
				// Mimic OutputPage::setPageTitle behaviour
				'<title>' .
				htmlspecialchars( self::msg( 'pagetitle', '$1 - MediaWiki', $pageTitle ) ) .
				'</title>' .
				'<style>body { font-family: sans-serif; margin: 0; padding: 0.5em 2em; }</style>' .
				"</head><body>\n";

			echo self::getHTML( $e );

			echo "</body></html>\n";
		}
	}

	/**
	 * If $wgShowExceptionDetails is true, return a HTML message with a
	 * backtrace to the error, otherwise show a message to ask to set it to true
	 * to show that information.
	 *
	 * @param Throwable $e
	 * @return string Html to output
	 */
	public static function getHTML( Throwable $e ) {
		global $wgShowExceptionDetails;

		if ( $wgShowExceptionDetails ) {
			$html = Html::errorBox( "<p>" .
				nl2br( htmlspecialchars( MWExceptionHandler::getLogMessage( $e ) ) ) .
				'</p><p>Backtrace:</p><p>' .
				nl2br( htmlspecialchars( MWExceptionHandler::getRedactedTraceAsString( $e ) ) ) .
				"</p>\n",
				'',
				'mw-content-ltr'
			);
		} else {
			$logId = WebRequest::getRequestId();
			$html = Html::errorBox(
				htmlspecialchars(
					'[' . $logId . '] ' .
					gmdate( 'Y-m-d H:i:s' ) . ": " .
					self::msg( "internalerror-fatal-exception",
						"Fatal exception of type $1",
						get_class( $e ),
						$logId,
						MWExceptionHandler::getURL()
				) ),
				'',
				'mw-content-ltr'
			) . "<!-- " . wordwrap( self::getShowBacktraceError( $e ), 50 ) . " -->";
		}

		return $html;
	}

	/**
	 * Get a message from i18n
	 *
	 * @param string $key Message name
	 * @param string $fallback Default message if the message cache can't be
	 *                  called by the exception
	 * @param mixed ...$params To pass to wfMessage()
	 * @return string Message with arguments replaced
	 */
	private static function msg( $key, $fallback, ...$params ) {
		// FIXME: Keep logic in sync with MWException::msg.
		try {
			$res = wfMessage( $key, ...$params )->text();
		} catch ( Exception $e ) {
			// Fallback to static message text and generic sitename.
			// Avoid live config as this must work before Setup/MediaWikiServices finish.
			$res = wfMsgReplaceArgs( $fallback, $params );
			$res = strtr( $res, [
				'{{SITENAME}}' => 'MediaWiki',
			] );
		}
		return $res;
	}

	/**
	 * @param Throwable $e
	 * @return string
	 */
	private static function getText( Throwable $e ) {
		global $wgShowExceptionDetails;

		if ( $wgShowExceptionDetails ) {
			return MWExceptionHandler::getLogMessage( $e ) .
				"\nBacktrace:\n" .
				MWExceptionHandler::getRedactedTraceAsString( $e ) . "\n";
		} else {
			return self::getShowBacktraceError( $e ) . "\n";
		}
	}

	/**
	 * @param Throwable $e
	 * @return string
	 */
	private static function getShowBacktraceError( Throwable $e ) {
		$var = '$wgShowExceptionDetails = true;';
		return "Set $var at the bottom of LocalSettings.php to show detailed debugging information.";
	}

	/**
	 * Get the page title to be used for a given exception.
	 *
	 * @param Throwable $e
	 * @return string
	 */
	private static function getExceptionTitle( Throwable $e ) {
		if ( $e instanceof MWException ) {
			return $e->getPageTitle();
		} elseif ( $e instanceof DBReadOnlyError ) {
			return self::msg( 'readonly', 'Database is locked' );
		} elseif ( $e instanceof DBExpectedError ) {
			return self::msg( 'databaseerror', 'Database error' );
		} elseif ( $e instanceof RequestTimeoutException ) {
			return self::msg( 'timeouterror', 'Request timeout' );
		} else {
			return self::msg( 'internalerror', 'Internal error' );
		}
	}

	/**
	 * Extract an additional user-visible message from an exception, or null if
	 * it has none.
	 *
	 * @param Throwable $e
	 * @return string|null
	 */
	private static function getCustomMessage( Throwable $e ) {
		try {
			if ( $e instanceof MessageSpecifier ) {
				$msg = Message::newFromSpecifier( $e );
			} elseif ( $e instanceof RequestTimeoutException ) {
				$msg = wfMessage( 'timeouterror-text', $e->getLimit() );
			} else {
				return null;
			}
			$text = $msg->text();
		} catch ( Exception $e2 ) {
			return null;
		}
		return $text;
	}

	/**
	 * @return bool
	 */
	private static function isCommandLine() {
		return !empty( $GLOBALS['wgCommandLineMode'] );
	}

	/**
	 * @param string $header
	 */
	private static function header( $header ) {
		if ( !headers_sent() ) {
			header( $header );
		}
	}

	/**
	 * @param int $code
	 */
	private static function statusHeader( $code ) {
		if ( !headers_sent() ) {
			HttpStatus::header( $code );
		}
	}

	/**
	 * Print a message, if possible to STDERR.
	 * Use this in command line mode only (see isCommandLine)
	 *
	 * @suppress SecurityCheck-XSS
	 * @param string $message Failure text
	 */
	private static function printError( $message ) {
		// NOTE: STDERR may not be available, especially if php-cgi is used from the
		// command line (T17602). Try to produce meaningful output anyway. Using
		// echo may corrupt output to STDOUT though.
		if ( defined( 'STDERR' ) ) {
			fwrite( STDERR, $message );
		} else {
			echo $message;
		}
	}

	/**
	 * @param Throwable $e
	 */
	private static function reportOutageHTML( Throwable $e ) {
		global $wgShowExceptionDetails, $wgShowHostnames;

		$sorry = htmlspecialchars( self::msg(
			'dberr-problems',
			'Sorry! This site is experiencing technical difficulties.'
		) );
		$again = htmlspecialchars( self::msg(
			'dberr-again',
			'Try waiting a few minutes and reloading.'
		) );

		if ( $wgShowHostnames ) {
			$info = str_replace(
				'$1',
				Html::element( 'span', [ 'dir' => 'ltr' ], $e->getMessage() ),
				htmlspecialchars( self::msg( 'dberr-info', '($1)' ) )
			);
		} else {
			$info = htmlspecialchars( self::msg(
				'dberr-info-hidden',
				'(Cannot access the database)'
			) );
		}

		MediaWikiServices::getInstance()->getMessageCache()->disable(); // no DB access
		$html = "<!DOCTYPE html>\n" .
				'<html><head>' .
				'<title>MediaWiki</title>' .
				'<style>body { font-family: sans-serif; margin: 0; padding: 0.5em 2em; }</style>' .
				"</head><body><h1>$sorry</h1><p>$again</p><p><small>$info</small></p>";

		if ( $wgShowExceptionDetails ) {
			$html .= '<p>Backtrace:</p><pre>' .
				htmlspecialchars( $e->getTraceAsString() ) . '</pre>';
		}

		$html .= '</body></html>';
		self::header( 'Content-Type: text/html; charset=UTF-8' );
		echo $html;
	}
}
