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
 * @ingroup RevisionDelete
 */

use MediaWiki\Revision\RevisionRecord;
use Wikimedia\Rdbms\IDatabase;
use Wikimedia\Rdbms\LBFactory;

/**
 * List for logging table items
 */
class RevDelLogList extends RevDelList {

	/** @var ActorMigration */
	private $actorMigration;

	/** @var CommentStore */
	private $commentStore;

	/**
	 * @param IContextSource $context
	 * @param Title $title
	 * @param array $ids
	 * @param LBFactory $lbFactory
	 * @param ActorMigration $actorMigration
	 * @param CommentStore $commentStore
	 */
	public function __construct(
		IContextSource $context,
		Title $title,
		array $ids,
		LBFactory $lbFactory,
		ActorMigration $actorMigration,
		CommentStore $commentStore
	) {
		parent::__construct( $context, $title, $ids, $lbFactory );
		$this->actorMigration = $actorMigration;
		$this->commentStore = $commentStore;
	}

	public function getType() {
		return 'logging';
	}

	public static function getRelationType() {
		return 'log_id';
	}

	public static function getRestriction() {
		return 'deletelogentry';
	}

	public static function getRevdelConstant() {
		return LogPage::DELETED_ACTION;
	}

	public static function suggestTarget( $target, array $ids ) {
		$result = wfGetDB( DB_REPLICA )->select( 'logging',
			'log_type',
			[ 'log_id' => $ids ],
			__METHOD__,
			[ 'DISTINCT' ]
		);
		if ( $result->numRows() == 1 ) {
			// If there's only one type, the target can be set to include it.
			return SpecialPage::getTitleFor( 'Log', $result->current()->log_type );
		}

		return SpecialPage::getTitleFor( 'Log' );
	}

	/**
	 * @param IDatabase $db
	 * @return mixed
	 */
	public function doQuery( $db ) {
		$ids = array_map( 'intval', $this->ids );

		$commentQuery = $this->commentStore->getJoin( 'log_comment' );
		$actorQuery = $this->actorMigration->getJoin( 'log_user' );

		return $db->select(
			[ 'logging' ] + $commentQuery['tables'] + $actorQuery['tables'],
			[
				'log_id',
				'log_type',
				'log_action',
				'log_timestamp',
				'log_namespace',
				'log_title',
				'log_page',
				'log_params',
				'log_deleted'
			] + $commentQuery['fields'] + $actorQuery['fields'],
			[ 'log_id' => $ids ],
			__METHOD__,
			[ 'ORDER BY' => 'log_id DESC' ],
			$commentQuery['joins'] + $actorQuery['joins']
		);
	}

	public function newItem( $row ) {
		return new RevDelLogItem( $this, $row );
	}

	public function getSuppressBit() {
		return RevisionRecord::DELETED_RESTRICTED;
	}

	public function getLogAction() {
		return 'event';
	}

	public function getLogParams( $params ) {
		return [
			'4::ids' => $params['ids'],
			'5::ofield' => $params['oldBits'],
			'6::nfield' => $params['newBits'],
		];
	}
}
