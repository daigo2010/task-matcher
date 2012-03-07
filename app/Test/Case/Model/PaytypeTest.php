<?php
/* Paytype Test cases generated on: 2012-03-06 22:57:10 : 1331042230*/
App::uses('Paytype', 'Model');

/**
 * Paytype Test Case
 *
 */
class PaytypeTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.paytype');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Paytype = ClassRegistry::init('Paytype');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Paytype);

		parent::tearDown();
	}

}
