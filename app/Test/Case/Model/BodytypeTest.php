<?php
/* Bodytype Test cases generated on: 2012-03-06 22:56:46 : 1331042206*/
App::uses('Bodytype', 'Model');

/**
 * Bodytype Test Case
 *
 */
class BodytypeTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.bodytype');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Bodytype = ClassRegistry::init('Bodytype');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Bodytype);

		parent::tearDown();
	}

}
