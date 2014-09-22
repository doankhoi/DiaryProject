<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsersController
 *
 * @author doankhoi
 */
App::uses('CakeEmail', 'Network/Email');

class UsersController extends AppController {

    var $name = "Users";
    public $uses = array('Profile', 'User');

    public function beforeFilter() {
        parent::beforeFilter();
    }

    public function login() {
        $this->set('title_for_layout', 'Đăng nhập');

        if ($this->Session->check('Auth.User')) {
            $this->redirect(array('controller' => 'Users', 'action' => 'index'));
        }

        // if we get the post information, try to authenticate
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Session->setFlash(__('Bạn nhập username hoặc password sai !!!'));
            }
        }
    }

    public function register() {
        $this->set('title_for_layout', 'Đăng ký');

        if (!empty($this->request->data))
            if ($this->request->data['User']['password'] == $this->request->data['User']['repassword']) { {

                    $dir = WWW_ROOT . 'img';
                    $slas = '\\';
                    $filenamez = '';

                    $filenamez = $this->request->data['Profile']['avatar']['name'];
                    $dir = $dir . $slas . $filenamez;
                    move_uploaded_file($this->request->data['Profile']['avatar']['tmp_name'], $dir);

                    $this->request->data['Profile']['avatar'] = $filenamez;
                    $this->request->data['Profile']['sex'] = $this->request->data['Profile']['sex'][0];

                    if ($this->request->data['Profile']['avatar'] == '')
                        $this->request->data['Profile']['avatar'] = 'anhnen.png';

                    if ($this->User->saveAssociated($this->request->data, array('deep' => true))) {
                        $this->redirect(array('action' => 'login'));
                    }
                }
            } else
                $this->Session->setFlash('Repassword và Password phải trùng nhau');
    }

    public function sendpassword() {
        $this->set('title_for_layout', 'Lấy lại mật khẩu');

        if (!empty($this->request->data)) {

            $user = $this->User->find('first', array(
                'conditions' => array(
                    'User.email' => $this->request->data['User']['email'])
                    )
            );

            if (!$user) {
                throw new NotFoundException('Không tồn tại User');
            }

            $email = new CakeEmail('smtp');

            $email->from(array('doanngockhoi93@gmail.com' => 'Diary Project'))
                    ->to($this->request->data['User']['email'])
                    ->subject('Lấy lại mật khẩu');

            $str = $user['User']['password'];
            $str1 = substr($str, 1, 8);
            if ($email->send($str1)) {
                $this->redirect(array('action' => 'updatepassword', $user['User']['id']));
            }
        }
    }

    public function updatepassword($id = null) {
        $this->set('title_for_layout', 'Kiểm tra mật khẩu');

        if (!$id) {
            throw new NotFoundException('Không xác định được người dùng');
        }
        $user = $this->User->find('first', array('conditions' => array('User.id' => $id)));
        if (!$user) {
            throw new NotFoundException('Không tồn tại User');
        }
        if (!$this->request->data)
            $this->request->data = $user;

        $str = $user['User']['password'];
        $str1 = substr($str, 1, 8);


        if ($this->request->is('post')) {
            $this->User->id = $id;
            $this->request->data['User']['password'] = $str1;
            $this->request->data['User']['repassword'] = $str1;
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash('Hãy vào Email của bạn để xem mật khẩu');
                $this->redirect(array('action' => 'login'));
            } else
                $this->Session->setFlash('Truy cập vào email của bạn.');
        }
    }

    public function changepassword() {
        $user = $this->User->find('first', array('conditions' => array('User.id' => $this->Auth->user('id'))));

        if (!$user) {
            throw new NotFoundException('Không tồn tại User');
        }

        if (!$this->request->data)
            $this->request->data = $user;

        if ($this->request->is(array('post', 'put'))) {

            $this->User->id = $this->Auth->user('id');
            Security::setHash('md5');
            if (md5($this->request->data['User']['password']) != $user['User']['password']) {
                $this->Session->setFlash('Vui lòng nhập đúng mật khẩu hiện tại');
            } else {
                $this->request->data['User']['password'] = $this->request->data['User']['repassword'];
                if ($this->User->save($this->request->data)) {
                    $this->Session->setFlash('Đổi mật khẩu thành công');
                    $this->redirect(array('action' => 'index'));
                }
            }
        }
    }

    public function viewprofile() {
        $this->layout = "user_page";
        
    }

    public function updateprofile() {

        $post = $this->User->findById($this->Auth->user('id'));

        if (!$post) {
            throw new NotFoundException(__('Không tồn tại User'));
        }
        if (!$this->request->data) {
            $this->request->data = $post;
        }
        if ($this->request->is(array('post', 'put'))) {
            $this->Profile->id = $this->Auth->user('id');
            $dir = WWW_ROOT . 'img';
            $slas = '\\';
            $filenamez = $this->request->data['Profile']['avatar']['name'];
            $dir = $dir . $slas . $filenamez;
            echo $dir;
            move_uploaded_file($this->request->data['Profile']['avatar']['tmp_name'], $dir);
            $this->request->data['Profile']['avatar'] = $this->request->data['Profile']['avatar']['name'];
            $this->request->data['Profile']['sex'] = $this->request->data['Profile']['sex'][0];
            if ($this->request->data['Profile']['avatar'] == '')
                $this->request->data['Profile']['avatar'] = $post['Profile']['avatar'];
            if ($this->Profile->save($this->request->data)) {
                //$this->Session->setFlash(__('Your Profile has been updated.'));
                $this->redirect(array('controller' => 'Users', 'action' => 'view'));
            }
            $this->Session->setFlash(__('Unable to update your Profile.'));
        }
    }

    public function logout() {
        $this->redirect($this->Auth->logout());
    }

    public function index() {
        $this->set('title_for_layout', 'Trang chủ');
        $this->layout = "user_page";
        
//        $this->set('userId', $user);
    }

    public function profile($id) {
        $this->layout = "user_page";
    }

    public function user_error() {
        $this->layout = "user_page";
    }

}
