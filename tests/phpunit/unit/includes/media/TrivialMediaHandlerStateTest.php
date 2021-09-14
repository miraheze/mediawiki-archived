<?php

/**
 * @covers TrivialMediaHandlerState
 */
class TrivialMediaHandlerStateTest extends MediaWikiUnitTestCase {
	public function testSetHandlerState() {
		$obj = new stdClass;
		$state = new TrivialMediaHandlerState;
		$this->assertNull( $state->getHandlerState( 'test' ) );
		$state->setHandlerState( 'test', $obj );
		$this->assertSame( $obj, $state->getHandlerState( 'test' ) );
	}

}
