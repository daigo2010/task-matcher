<?php
/* Login Test cases generated on: 2012-03-06 12:58:20 : 1331006300*/
App::uses('LoginController', 'Controller');

/**
 * TestLoginController *
 */
class TestLoginController extends LoginController {
/**
 * Auto render
 *
 * @var boolean
 */
	public $autoRender = false;

/**
 * Redirect action
 *
 * @param mixed $url
 * @param mixed $status
 * @param boolean $exit
 * @return void
 */
	public function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

/**
 * LoginController Test Case
 *
 */
class LoginControllerTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.login');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Login = new TestLoginController();
		$this->Login->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Login);

		parent::tearDown();
	}

}
