<?php

/**
 * @author Addshore
 *
 * @group Database
 *
 * @covers SpecialEditWatchlist
 */
class SpecialEditWatchlistTest extends SpecialPageTestBase {

	/**
	 * Returns a new instance of the special page under test.
	 *
	 * @return SpecialPage
	 */
	protected function newSpecialPage() {
		$services = $this->getServiceContainer();
		return new SpecialEditWatchlist(
			$services->getWatchedItemStore(),
			$services->getTitleParser(),
			$services->getGenderCache(),
			$services->getLinkBatchFactory(),
			$services->getNamespaceInfo(),
			$services->getWikiPageFactory(),
			$services->getWatchlistManager()
		);
	}

	public function testNotLoggedIn_throwsException() {
		$this->expectException( UserNotLoggedIn::class );
		$this->executeSpecialPage();
	}

	public function testRootPage_displaysExplanationMessage() {
		$user = new TestUser( __METHOD__ );
		list( $html, ) = $this->executeSpecialPage( '', null, 'qqx', $user->getUser() );
		$this->assertStringContainsString( '(watchlistedit-normal-explain)', $html );
	}

	public function testClearPage_hasClearButtonForm() {
		$user = new TestUser( __METHOD__ );
		list( $html, ) = $this->executeSpecialPage( 'clear', null, 'qqx', $user->getUser() );
		$this->assertRegExp(
			'/<form action=\'.*?Special:EditWatchlist\/clear\'/',
			$html
		);
	}

	public function testEditRawPage_hasTitlesBox() {
		$user = new TestUser( __METHOD__ );
		list( $html, ) = $this->executeSpecialPage( 'raw', null, 'qqx', $user->getUser() );
		$this->assertStringContainsString(
			'<div id=\'mw-input-wpTitles\'',
			$html
		);
	}

}
