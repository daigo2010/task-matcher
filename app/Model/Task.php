<?php
App::uses('AppModel', 'Model');
/**
 * Task Model
 *
 */
class Task extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';
    public $name = 'Task';
    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'CommitUser' => array(
            'className' => 'User',
            'foreignKey' => 'commit_user_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
    public $validate = array(
        'user_id' => array(
            'required' => true,
            'rule' => array('notEmpty', 'numeric'),
            'message' => 'ユーザーIDが不正です。ログインしなおしてください。',
            'allowEmpty' => false,
        ),
        'body' => array(
            'required' => true,
            'rule' => array('notEmpty'),
            'message' => 'やってほしいことを入力してください。',
            'allowEmpty' => false,
        ),
        'body_type' => array(
            'required' => true,
            'rule' => array('notEmpty', 'numeric'),
            'message' => 'やってほしいことの種類を選んでください。',
            'allowEmpty' => false,
        ),
        'pay' => array(
            'required' => true,
            'rule' => array('notEmpty'),
            'message' => 'おかえしを入力してください。',
            'allowEmpty' => false,
        ),
        'pay_type' => array(
            'required' => true,
            'rule' => array('notEmpty', 'numeric'),
            'message' => 'おかえしの種類を入力してください。',
            'allowEmpty' => false,
        ),

    );
}
