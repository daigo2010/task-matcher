<?php
// app/Controller/UsersController.php
class UsersController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
//        $this->Auth->allow('add', 'logout');
        $this->Auth->allow('add');
    }

    public function login() {
        if ($this->Auth->login()) {
            $this->redirect($this->Auth->redirect());
        } else {
            $this->Session->setFlash(__('ユーザー名かパスワードが違います。'));
            $this->redirect('/');
        }
    }

    public function logout() {
        $this->redirect($this->Auth->logout());
    }

    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('ユーザーが存在しません。'));
        }
        $this->set('user', $this->User->read(null, $id));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            $this->request->data['User']['role'] = 'author';
            $conditions = array(
                'conditions' => array(
                    'username' => $this->request->data['User']['username']
                )
            );
            $count = $this->User->find('count', $conditions);
            if ($count <= 0 && $this->User->save($this->request->data)) {
                $this->Session->setFlash(__('ユーザー登録を完了しました。'));
                $this->redirect(array('controller' => 'top', 'action' => 'index'));
            } else if ($count > 0) {
                $this->Session->setFlash(__('このユーザー名は既に使用されています。別のユーザー名を入力してください。'));
                $this->redirect('/users/add');
            } else {
                $errors = '';
                foreach ($this->User->validationErrors as $key => $e) {
                    foreach ($e as $message) {
                        $errors .= "$message<br />\r\n";
                    }
                }
                $this->Session->setFlash(__($errors));
                $this->redirect('/users/add');
            }
        }
    }

    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('ユーザーが存在しません。'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('変更を保存しました。'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('変更を保存できませんでした。入力内容をお確かめの上再度更新してください。'));
                $this->redirect('/');
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['User']['password']);
        }
    }

    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('ユーザーが存在しません。'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('ユーザーを削除しました。'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('ユーザーを削除できませんでした。'));
        $this->redirect('/');
    }
}
