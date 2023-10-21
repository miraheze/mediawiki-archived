<?php
/**
 * Script to change users preferences on the fly.
 *
 * Made on an original idea by Fooey (freenode)
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
 * @file
 * @ingroup Maintenance
 * @author Antoine Musso <hashar at free dot fr>
 */

use MediaWiki\User\User;
use MediaWiki\User\UserIdentityValue;
use Wikimedia\Rdbms\SelectQueryBuilder;

require_once __DIR__ . '/Maintenance.php';

/**
 * @ingroup Maintenance
 */
class UserOptionsMaintenance extends Maintenance {

	public function __construct() {
		parent::__construct();

		$this->addDescription( 'Pass through all users and change or delete one of their options.
The new option is NOT validated.' );

		$this->addOption( 'list', 'List available user options and their default value' );
		$this->addOption( 'usage', 'Report all options statistics or just one if you specify it' );
		$this->addOption( 'old', 'The value to look for', false, true );
		$this->addOption( 'new', 'New value to update users with', false, true );
		$this->addOption( 'delete', 'Delete the option instead of updating' );
		$this->addOption( 'fromuserid', 'Start from this user ID when changing/deleting options',
			false, true );
		$this->addOption( 'touserid', 'Do not go beyond this user ID when changing/deleting options',
			false, true );
		$this->addOption( 'nowarn', 'Hides the 5 seconds warning' );
		$this->addOption( 'dry', 'Do not save user settings back to database' );
		$this->addArg( 'option name', 'Name of the option to change or provide statistics about', false );
		$this->setBatchSize( 100 );
	}

	/**
	 * Do the actual work
	 */
	public function execute() {
		if ( $this->hasOption( 'list' ) ) {
			$this->listAvailableOptions();
		} elseif ( $this->hasOption( 'usage' ) ) {
			$this->showUsageStats();
		} elseif ( $this->hasOption( 'old' )
			&& $this->hasOption( 'new' )
			&& $this->hasArg( 0 )
		) {
			$this->updateOptions();
		} elseif ( $this->hasOption( 'delete' ) ) {
			$this->deleteOptions();
		} else {
			$this->maybeHelp( true );
		}
	}

	/**
	 * List default options and their value
	 */
	private function listAvailableOptions() {
		$userOptionsLookup = $this->getServiceContainer()->getUserOptionsLookup();
		$def = $userOptionsLookup->getDefaultOptions();
		ksort( $def );
		$maxOpt = 0;
		foreach ( $def as $opt => $value ) {
			$maxOpt = max( $maxOpt, strlen( $opt ) );
		}
		foreach ( $def as $opt => $value ) {
			$this->output( sprintf( "%-{$maxOpt}s: %s\n", $opt, $value ) );
		}
	}

	/**
	 * List options usage
	 */
	private function showUsageStats() {
		$option = $this->getArg( 0 );

		$ret = [];
		$userOptionsLookup = $this->getServiceContainer()->getUserOptionsLookup();
		$defaultOptions = $userOptionsLookup->getDefaultOptions();

		// We list user by user_id from one of the replica DBs
		$dbr = wfGetDB( DB_REPLICA );
		$result = $dbr->newSelectQueryBuilder()
			->select( [ 'user_id' ] )
			->from( 'user' )
			->caller( __METHOD__ )->fetchResultSet();

		foreach ( $result as $id ) {
			$user = User::newFromId( $id->user_id );

			// Get the options and update stats
			if ( $option ) {
				if ( !array_key_exists( $option, $defaultOptions ) ) {
					$this->fatalError( "Invalid user option. Use --list to see valid choices\n" );
				}

				$userValue = $userOptionsLookup->getOption( $user, $option );
				if ( $userValue <> $defaultOptions[$option] ) {
					$ret[$option][$userValue] = ( $ret[$option][$userValue] ?? 0 ) + 1;
				}
			} else {
				foreach ( $defaultOptions as $name => $defaultValue ) {
					$userValue = $userOptionsLookup->getOption( $user, $name );
					if ( $userValue != $defaultValue ) {
						$ret[$name][$userValue] = ( $ret[$name][$userValue] ?? 0 ) + 1;
					}
				}
			}
		}

		foreach ( $ret as $optionName => $usageStats ) {
			$this->output( "Usage for <$optionName> (default: '{$defaultOptions[$optionName]}'):\n" );
			foreach ( $usageStats as $value => $count ) {
				$this->output( " $count user(s): '$value'\n" );
			}
			print "\n";
		}
	}

	/**
	 * Change our users options
	 */
	private function updateOptions() {
		$dryRun = $this->hasOption( 'dry' );
		$settingWord = $dryRun ? 'Would set' : 'Setting';
		$option = $this->getArg( 0 );
		$from = $this->getOption( 'old' );
		$to = $this->getOption( 'new' );

		// The fromuserid parameter is inclusive, but iterating is easier with an exclusive
		// range so convert it.
		$fromUserId = (int)$this->getOption( 'fromuserid', 1 ) - 1;
		$toUserId = (int)$this->getOption( 'touserid', 0 ) ?: null;

		if ( !$dryRun ) {
			$forUsers = $from ? "some users (ID $fromUserId-$toUserId)" : 'ALL USERS';
			$this->warn(
				<<<WARN
The script is about to change the options for $forUsers in the database.
Users with option <$option> = '$from' will be made to use '$to'.

Abort with control-c in the next five seconds....
WARN
			);
		}

		$userOptionsManager = $this->getServiceContainer()->getUserOptionsManager();
		$dbr = wfGetDB( DB_REPLICA );
		$queryBuilderTemplate = new SelectQueryBuilder( $dbr );
		$queryBuilderTemplate
			->table( 'user' )
			->join( 'user_properties', null, [
				'user_id = up_user',
				'up_property' => $option,
			] )
			->fields( [ 'user_id', 'user_name' ] )
			// up_value is unindexed so this can be slow, but should be acceptable in a script
			->where( [ 'up_value' => $from ] )
			// need to order by ID so we can use ID ranges for query continuation
			// also needed for the fromuserid / touserid parameters to work
			->orderBy( 'user_id', SelectQueryBuilder::SORT_ASC )
			->limit( $this->getBatchSize() )
			->caller( __METHOD__ );
		if ( $toUserId ) {
			$queryBuilderTemplate->andWhere( "user_id <= $toUserId " );
		}

		do {
			$queryBuilder = clone $queryBuilderTemplate;
			$queryBuilder->andWhere( "user_id > $fromUserId" );
			$result = $queryBuilder->fetchResultSet();
			foreach ( $result as $row ) {
				$this->output( "$settingWord {$option} for {$row->user_name} from '{$from}' to '{$to}'\n" );
				$user = UserIdentityValue::newRegistered( $row->user_id, $row->user_name );
				if ( !$dryRun ) {
					$userOptionsManager->setOption( $user, $option, $to );
					$userOptionsManager->saveOptions( $user );
				}
				$fromUserId = (int)$row->user_id;
			}
			$this->waitForReplication();
		} while ( $result->numRows() );
	}

	/**
	 * Delete occurrences of the option (with the given value, if provided)
	 */
	private function deleteOptions() {
		$dryRun = $this->hasOption( 'dry' );
		$option = $this->getArg( 0 );
		$fromUserId = (int)$this->getOption( 'fromuserid', 0 );
		$toUserId = (int)$this->getOption( 'touserid', 0 ) ?: null;
		$old = $this->getOption( 'old' );

		if ( !$dryRun ) {
			$forUsers = $fromUserId ? "some users (ID $fromUserId-$toUserId)" : 'ALL USERS';
			$this->warn( <<<WARN
The script is about to delete '$option' option for $forUsers from user_properties table.
This action is IRREVERSIBLE.

Abort with control-c in the next five seconds....
WARN
			);
		}

		$dbr = $this->getDB( DB_REPLICA );
		$dbw = $this->getDB( DB_PRIMARY );

		$rowsNum = 0;
		$rowsInThisBatch = -1;
		$minUserId = $fromUserId;
		while ( $rowsInThisBatch != 0 ) {
			$queryBuilder = $dbr->newSelectQueryBuilder()
				->select( 'up_user' )
				->from( 'user_properties' )
				->where( [ 'up_property' => $option, "up_user > $minUserId" ] );
			if ( $toUserId ) {
				$queryBuilder->andWhere( "up_user < $toUserId" );
			}
			if ( $old ) {
				$queryBuilder->andWhere( [ 'up_value' => $old ] );
			}

			$userIds = $queryBuilder->caller( __METHOD__ )->fetchFieldValues();
			if ( $userIds === [] ) {
				// no rows left
				break;
			}

			if ( !$dryRun ) {
				$deleteConds = [
					'up_property' => $option,
					'up_user' => $userIds
				];
				if ( $old ) {
					$deleteConds['up_value'] = $old;
				}
				$dbw->delete(
					'user_properties',
					$deleteConds,
					__METHOD__
				);
				$rowsInThisBatch = $dbw->affectedRows();
			} else {
				$rowsInThisBatch = count( $userIds );
			}

			$this->waitForReplication();
			$rowsNum += $rowsInThisBatch;
			$minUserId = max( $userIds );
		}

		if ( !$dryRun ) {
			$this->output( "Done! Deleted $rowsNum rows.\n" );
		} else {
			$this->output( "Would delete $rowsNum rows.\n" );
		}
	}

	/**
	 * The warning message and countdown
	 *
	 * @param string $message
	 */
	private function warn( string $message ) {
		if ( $this->hasOption( 'nowarn' ) ) {
			return;
		}

		$this->output( $message );
		$this->countDown( 5 );
	}
}

$maintClass = UserOptionsMaintenance::class;
require_once RUN_MAINTENANCE_IF_MAIN;
