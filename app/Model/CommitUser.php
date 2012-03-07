<?php
App::uses('AppModel', 'Model');
/**
 * CommitUser Model
 *
 * @property User $User
 * @property Post $Post
 */
class CommitUser extends AppModel {
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
		'post_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
		'status' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
	);
    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id',
        ),
    );
}
