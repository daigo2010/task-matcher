<?php
/* Test Fixture generated on: 2012-03-07 12:08:09 : 1331089689 */

/**
 * TestFixture
 *
 */
class TestFixture extends CakeTestFixture {
/**
 * Table name
 *
 * @var string
 */
	public $table = 'test';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => '', 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'indexes' => array(),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'user_id' => 1
		),
	);
}
