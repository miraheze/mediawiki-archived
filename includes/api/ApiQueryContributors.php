<?php
/**
 * Query the list of contributors to a page
 *
 * Created on Nov 14, 2013
 *
 * Copyright © 2013 Wikimedia Foundation and contributors
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
 * @since 1.23
 */

/**
 * A query module to show contributors to a page
 *
 * @ingroup API
 * @since 1.23
 */
class ApiQueryContributors extends ApiQueryBase {
	/** We don't want to process too many pages at once (it hits cold
	 * database pages too heavily), so only do the first MAX_PAGES input pages
	 * in each API call (leaving the rest for continuation).
	 */
	const MAX_PAGES = 100;

	public function __construct( ApiQuery $query, $moduleName ) {
		// "pc" is short for "page contributors", "co" was already taken by the
		// GeoData extension's prop=coordinates.
		parent::__construct( $query, $moduleName, 'pc' );
	}

	public function execute() {
		$db = $this->getDB();
		$params = $this->extractRequestParams();
		$this->requireMaxOneParameter( $params, 'group', 'excludegroup', 'rights', 'excluderights' );

		// Only operate on existing pages
		$pages = array_keys( $this->getPageSet()->getGoodTitles() );

		// Filter out already-processed pages
		if ( $params['continue'] !== null ) {
			$cont = explode( '|', $params['continue'] );
			$this->dieContinueUsageIf( count( $cont ) != 2 );
			$cont_page = (int)$cont[0];
			$pages = array_filter( $pages, function ( $v ) use ( $cont_page ) {
				return $v >= $cont_page;
			} );
		}
		if ( !count( $pages ) ) {
			// Nothing to do
			return;
		}

		// Apply MAX_PAGES, leaving any over the limit for a continue.
		sort( $pages );
		$continuePages = null;
		if ( count( $pages ) > self::MAX_PAGES ) {
			$continuePages = $pages[self::MAX_PAGES] . '|0';
			$pages = array_slice( $pages, 0, self::MAX_PAGES );
		}

		$result = $this->getResult();

		// First, count anons
		$this->addTables( 'revision' );
		$this->addFields( [
			'page' => 'rev_page',
			'anons' => 'COUNT(DISTINCT rev_user_text)',
		] );
		$this->addWhereFld( 'rev_page', $pages );
		$this->addWhere( 'rev_user = 0' );
		$this->addWhere( $db->bitAnd( 'rev_deleted', Revision::DELETED_USER ) . ' = 0' );
		$this->addOption( 'GROUP BY', 'rev_page' );
		$res = $this->select( __METHOD__ );
		foreach ( $res as $row ) {
			$fit = $result->addValue( [ 'query', 'pages', $row->page ],
				'anoncontributors', (int)$row->anons
			);
			if ( !$fit ) {
				// This not fitting isn't reasonable, so it probably means that
				// some other module used up all the space. Just set a dummy
				// continue and hope it works next time.
				$this->setContinueEnumParameter( 'continue',
					$params['continue'] !== null ? $params['continue'] : '0|0'
				);

				return;
			}
		}

		// Next, add logged-in users
		$this->resetQueryParams();
		$this->addTables( 'revision' );
		$this->addFields( [
			'page' => 'rev_page',
			'user' => 'rev_user',
			'username' => 'MAX(rev_user_text)', // Non-MySQL databases don't like partial group-by
		] );
		$this->addWhereFld( 'rev_page', $pages );
		$this->addWhere( 'rev_user != 0' );
		$this->addWhere( $db->bitAnd( 'rev_deleted', Revision::DELETED_USER ) . ' = 0' );
		$this->addOption( 'GROUP BY', 'rev_page, rev_user' );
		$this->addOption( 'LIMIT', $params['limit'] + 1 );

		// Force a sort order to ensure that properties are grouped by page
		// But only if pp_page is not constant in the WHERE clause.
		if ( count( $pages ) > 1 ) {
			$this->addOption( 'ORDER BY', 'rev_page, rev_user' );
		} else {
			$this->addOption( 'ORDER BY', 'rev_user' );
		}

		$limitGroups = [];
		if ( $params['group'] ) {
			$excludeGroups = false;
			$limitGroups = $params['group'];
		} elseif ( $params['excludegroup'] ) {
			$excludeGroups = true;
			$limitGroups = $params['excludegroup'];
		} elseif ( $params['rights'] ) {
			$excludeGroups = false;
			foreach ( $params['rights'] as $r ) {
				$limitGroups = array_merge( $limitGroups, User::getGroupsWithPermission( $r ) );
			}

			// If no group has the rights requested, no need to query
			if ( !$limitGroups ) {
				if ( $continuePages !== null ) {
					// But we still need to continue for the next page's worth
					// of anoncontributors
					$this->setContinueEnumParameter( 'continue', $continuePages );
				}

				return;
			}
		} elseif ( $params['excluderights'] ) {
			$excludeGroups = true;
			foreach ( $params['excluderights'] as $r ) {
				$limitGroups = array_merge( $limitGroups, User::getGroupsWithPermission( $r ) );
			}
		}

		if ( $limitGroups ) {
			$limitGroups = array_unique( $limitGroups );
			$this->addTables( 'user_groups' );
			$this->addJoinConds( [ 'user_groups' => [
				$excludeGroups ? 'LEFT OUTER JOIN' : 'INNER JOIN',
				[
					'ug_user=rev_user',
					'ug_group' => $limitGroups,
					'ug_expiry IS NULL OR ug_expiry >= ' . $db->addQuotes( $db->timestamp() )
				]
			] ] );
			$this->addWhereIf( 'ug_user IS NULL', $excludeGroups );
		}

		if ( $params['continue'] !== null ) {
			$cont = explode( '|', $params['continue'] );
			$this->dieContinueUsageIf( count( $cont ) != 2 );
			$cont_page = (int)$cont[0];
			$cont_user = (int)$cont[1];
			$this->addWhere(
				"rev_page > $cont_page OR " .
				"(rev_page = $cont_page AND " .
				"rev_user >= $cont_user)"
			);
		}

		$res = $this->select( __METHOD__ );
		$count = 0;
		foreach ( $res as $row ) {
			if ( ++$count > $params['limit'] ) {
				// We've reached the one extra which shows that
				// there are additional pages to be had. Stop here...
				$this->setContinueEnumParameter( 'continue', $row->page . '|' . $row->user );

				return;
			}

			$fit = $this->addPageSubItem( $row->page,
				[ 'userid' => (int)$row->user, 'name' => $row->username ],
				'user'
			);
			if ( !$fit ) {
				$this->setContinueEnumParameter( 'continue', $row->page . '|' . $row->user );

				return;
			}
		}

		if ( $continuePages !== null ) {
			$this->setContinueEnumParameter( 'continue', $continuePages );
		}
	}

	public function getCacheMode( $params ) {
		return 'public';
	}

	public function getAllowedParams() {
		$userGroups = User::getAllGroups();
		$userRights = User::getAllRights();

		return [
			'group' => [
				ApiBase::PARAM_TYPE => $userGroups,
				ApiBase::PARAM_ISMULTI => true,
			],
			'excludegroup' => [
				ApiBase::PARAM_TYPE => $userGroups,
				ApiBase::PARAM_ISMULTI => true,
			],
			'rights' => [
				ApiBase::PARAM_TYPE => $userRights,
				ApiBase::PARAM_ISMULTI => true,
			],
			'excluderights' => [
				ApiBase::PARAM_TYPE => $userRights,
				ApiBase::PARAM_ISMULTI => true,
			],
			'limit' => [
				ApiBase::PARAM_DFLT => 10,
				ApiBase::PARAM_TYPE => 'limit',
				ApiBase::PARAM_MIN => 1,
				ApiBase::PARAM_MAX => ApiBase::LIMIT_BIG1,
				ApiBase::PARAM_MAX2 => ApiBase::LIMIT_BIG2
			],
			'continue' => [
				ApiBase::PARAM_HELP_MSG => 'api-help-param-continue',
			],
		];
	}

	protected function getExamplesMessages() {
		return [
			'action=query&prop=contributors&titles=Main_Page'
				=> 'apihelp-query+contributors-example-simple',
		];
	}

	public function getHelpUrls() {
		return 'https://www.mediawiki.org/wiki/Special:MyLanguage/API:Contributors';
	}
}
