<?php
App::uses('AppController', 'Controller');
/**
 * Tasks Controller
 *
 * @property Task $Task
 */
class TasksController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Task->recursive = 0;
        $this->paginate = array(
            'order' => array('created' => 'desc')
        );
		$this->set('tasks', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
        require_once '../Model/Commituser.php';
        $commit_user = new CommitUser();
        if ($this->request->is('post')) {
            if (0 < $commit_user->find('count', array('conditions' => array('post_id = ' . $id, 'user_id = ' . $this->Auth->user('id'))))) {
    			$this->Session->setFlash(__('既に参加表明済です！'));
            } else {
                $commit_user->create();
                $data['CommitUser']['user_id'] = $this->Auth->user('id');
                $data['CommitUser']['post_id'] = $id;
                if ($commit_user->save($data)) {
        			$this->Session->setFlash(__('タスクに参加表明しました！'));
                } else {
        			$this->Session->setFlash(__('タスクに参加できませんでした。'));
                }
            }
        }

		$this->Task->id = $id;
		if (!$this->Task->exists()) {
			throw new NotFoundException(__('不正なタスクです。'));
		}
        $this->set('commit_users', $commit_user->find('all', array(
                'conditions' => array('post_id = ' . $id),
                'recursive' => 0,
        )));
		$this->set('task', $this->Task->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Task->create();
            $this->request->data['Task']['user_id'] = $this->Auth->user('id');
            $this->Task->set($this->request->data);
			if ($this->Task->save($this->request->data)) {
				$this->Session->setFlash(__('タスクを登録しました！'));
				$this->redirect(array('action' => 'index'));
			} else {
                $errors = "";
                foreach ($this->Task->validationErrors as $key => $e) {
                    foreach ($e as $message) {
                        $errors .= "$message<br />\r\n";
                    }
                }
                $this->Session->setFlash(__($errors));
			}
		}
        require_once '../Model/Category.php';
        $category = new Category();
        $categories= $category->find('all');
        $category_name = array();
        $category_id   = array();
        foreach ($categories as $category) {
            $category_name[] = $category['Category']['title'];
            $category_id[]   = $category['Category']['id'];
        }
		$this->set('category_name', $category_name);
		$this->set('category_id',   $category_id);
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Task->id = $id;
		if (!$this->Task->exists()) {
			throw new NotFoundException(__('不正なタスクです。'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
            $this->request->data['Task']['user_id'] = $this->Auth->user('id');
			if ($this->Task->save($this->request->data)) {
				$this->Session->setFlash(__('タスクを変更しました！'));
				$this->redirect(array('action' => 'index'));
			} else {
                $errors = '';
                foreach ($this->Task->validationErrors as $key => $e) {
                    foreach ($e as $message) {
                        $errors .= "$message<br />\r\n";
                    }
                }
				$this->Session->setFlash(__($errors));
			}
        }
        require_once '../Model/Category.php';
        $category = new Category();
        $categories= $category->find('all');
        $category_name = array();
        $category_id   = array();
        foreach ($categories as $category) {
            $category_name[] = $category['Category']['title'];
            $category_id[]   = $category['Category']['id'];
        }
        $this->set('category_name', $category_name);
        $this->set('category_id',   $category_id);

        $this->request->data = $this->Task->read(null, $id);
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Task->id = $id;
		if (!$this->Task->exists()) {
			throw new NotFoundException(__('不正な操作です。'));
		}
		if ($this->Task->delete()) {
			$this->Session->setFlash(__('タスクを削除しました。'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('タスクを削除しました。'));
		$this->redirect(array('action' => 'index'));
	}

    public function commit($id) {
		$this->Task->id = $id;
		if (!$this->Task->exists()) {
			throw new NotFoundException(__('不正なタスクです。'));
		}

		if ($this->request->is('post')) {
            if ($this->Task->saveField('commit_user_id', $this->data['Task']['commit_user_id']) 
                && $this->Task->saveField('status', 1)
            ) {
                $this->Session->setFlash(__('やる人が決まりました！'));
                $this->redirect(array('controller' => 'Tasks', 'action' => 'index'));
            } else {
                $this->Session->setFlash(__('変更に失敗しました。'));
            }
		}
        require_once '../Model/CommitUser.php';
        $commit_user = new CommitUser();
        $this->set('commit_users', $commit_user->find('all', array(
                'conditions' => array('post_id = ' . $id),
                'recursive' => 0,
        )));

    }
}
