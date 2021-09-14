<?php
/**
 * Make test edits for a user to populate a test wiki
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
 */
require_once __DIR__ . '/Maintenance.php';

use MediaWiki\MediaWikiServices;

/**
 * Make test edits for a user to populate a test wiki
 *
 * @ingroup Maintenance
 */
class MakeTestEdits extends Maintenance {
	public function __construct() {
		parent::__construct();
		$this->addDescription( 'Make test edits for a user' );
		$this->addOption( 'user', 'User name', true, true );
		$this->addOption( 'count', 'Number of edits', true, true );
		$this->addOption( 'namespace', 'Namespace number', false, true );
		$this->setBatchSize( 100 );
	}

	public function execute() {
		$user = User::newFromName( $this->getOption( 'user' ) );
		if ( !$user->getId() ) {
			$this->fatalError( "No such user exists." );
		}

		$count = $this->getOption( 'count' );
		$namespace = (int)$this->getOption( 'namespace', 0 );
		$services = MediaWikiServices::getInstance();
		$lbFactory = $services->getDBLoadBalancerFactory();
		$wikiPageFactory = $services->getWikiPageFactory();

		for ( $i = 0; $i < $count; ++$i ) {
			$title = Title::makeTitleSafe( $namespace, "Page " . wfRandomString( 2 ) );
			$page = $wikiPageFactory->newFromTitle( $title );
			$content = ContentHandler::makeContent( wfRandomString(), $title );
			$summary = "Change " . wfRandomString( 6 );

			$page->doUserEditContent( $content, $user, $summary );

			$this->output( "Edited $title\n" );
			if ( $i && ( $i % $this->getBatchSize() ) == 0 ) {
				$lbFactory->waitForReplication();
			}
		}

		$this->output( "Done\n" );
	}
}

$maintClass = MakeTestEdits::class;
require_once RUN_MAINTENANCE_IF_MAIN;
