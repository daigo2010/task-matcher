<?php
App::uses('Controller', 'Controller');

class AppController extends Controller {
    public $components = array(
            'Session',
            'Auth' => array(
                'loginRedirect' => array('controller' => 'tasks', 'action' => 'index'),
                'logoutRedirect' => array('controller' => 'top', 'action' => 'index', 'home')
                )
            );

    public function beforeFilter() {
        $this->Auth->allow('index', 'view');
        $this->set('id', $this->Auth->user('id'));
    }
}
