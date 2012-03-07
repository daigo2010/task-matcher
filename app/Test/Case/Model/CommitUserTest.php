<?php
/* CommitUser Test cases generated on: 2012-03-07 12:23:58 : 1331090638*/
App::uses('CommitUser', 'Model');

/**
 * CommitUser Test Case
 *
 */
class CommitUserTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.commit_user', 'app.user', 'app.post');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->CommitUser = ClassRegistry::init('CommitUser');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CommitUser);

		parent::tearDown();
	}

}
