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
    public $uses = array('Profile', 'User', 'Invitation', 'Comment', 'UsersLike');

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
        $this->autoRender = FALSE;
        $this->request->onlyAllow('ajax');

        $user = $this->User->find('first', array('conditions' => array('User.id' => $this->Auth->user('id'))));

        if (!$user) {
            return 'Không tồn tại User';
        }

        if (!$this->request->data)
            $this->request->data = $user;


        $this->User->id = $this->Auth->user('id');
        Security::setHash('md5');
        
        if (md5($_POST['password']) != $user['User']['password']) {
            return 'Vui lòng nhập đúng mật khẩu hiện tại';
        } else {
            $this->request->data['User']['password'] = $_POST['repassword'];
            $this->request->data['User']['repassword'] = $_POST['repassword'];
            if ($this->User->save($this->request->data)) {
                return 'Đổi mật khẩu thành công';
            }else{
                return 'Mật khẩu chưa được thay đổi';
            }
        }
    }

    public function viewprofile() {
        $this->layout = "user_page";
        $this->set('title_for_layout', 'Thông tin cá nhân');
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
    }

    public function profile($id) {
        $this->layout = "user_page";
    }

    public function user_error() {
        $this->layout = "user_page";
    }

    //Hàm xử lý thay đổi ảnh avatar
    public function post_file() {

        $this->autoRender = false;
        $this->request->onlyAllow('ajax');

        function get_extension($file_name) {
            $ext = explode('.', $file_name);
            $ext = array_pop($ext);
            return strtolower($ext);
        }

        // Helper functions
        function exit_status($str, $code) {
            echo json_encode(array('status' => $str, 'code' => $code));
            exit;
        }

        $demo_mode = false;
        $upload_dir = WWW_ROOT . 'img\\';
        $allowed_ext = array('jpg', 'jpeg', 'png', 'gif');

        if (strtolower($_SERVER['REQUEST_METHOD']) != 'post') {
            exit_status('Lỗi! Bạn không tải được file', 1);
        }

        if (array_key_exists('pic', $_FILES)) {

            $pic = $_FILES['pic'];

            if (!in_array(get_extension($pic['name']), $allowed_ext)) {
                exit_status('Chỉ cho phép định dạng file ' . implode(',', $allowed_ext), 1);
            }

            if (move_uploaded_file($pic['tmp_name'], $upload_dir . $pic['name'])) {
//                //Cập nhật vào cơ sở dữ liệu

                $this->Profile->updateAll(
                        array(
                    'Profile.avatar' => "'" . $pic['name'] . "'"
                        ), array(
                    'Profile.users_id' => $this->Auth->user('id')
                        )
                );

                exit_status("Thay đổi thành công!", 0);
            }
        }

        exit_status('Tải file có lỗi!', 1);
    }

    /**
     * Hàm trả về username người dùng với id
     */
    public function getUsername($id) {
        $result = $this->User->find('first', array(
            'fields' => array('User.username'),
            'conditions' => array(
                'User.id' => $id
            )
        ));
        return $result['User']['username'];
    }

    /**
     * Hàm cập nhật mới username
     */
    public function updateUsername() {
        $this->autoRender = FALSE;
        $this->request->onlyAllow('ajax');

        $id = $this->Auth->user('id');
        $this->User->read(null, $id);
        $this->User->set('username', $_POST['new_username']);
        if (!$this->User->save()) {
            return "Không thể cập nhật cơ sở dữ liệu";
        }
    }

    /**
     * Hàm cập nhật avatar
     */
    public function updateAvatar(){
        $this->autoRender = FALSE;
        $this->request->onlyAllow('ajax');
        
        $id = $this->Auth->user('id');
        
        $profile = $this->Profile->find('first', array(
           'conditions'=> array(
               'users_id'=>$id
           ) 
        ));
        
        $path_remove = WWW_ROOT.'img\\'.$profile['Profile']['avatar'];
        unlink($path_remove);
        $this->Profile->read(null, $profile['Profile']['id']);
        $this->Profile->set('avatar', $_POST['avatar']);
        $this->Profile->save();
        return "Thay đổi thành công";
    }
    
    public function updateName(){
        $this->autoRender = FALSE;
        $this->request->onlyAllow('ajax');
        
        $id = $this->Auth->user('id');
        $profile = $this->Profile->find('first', array(
            'conditions'=> array(
                'users_id'=>$id
            )
        ));
        
        $this->Profile->read(null, $profile['Profile']['id']);
        $this->Profile->set('name', $_POST['new_name']);
        if (!$this->Profile->save()) {
            return "Không thể cập nhật cơ sở dữ liệu";
        }
    }
    
    public function updateEmail(){
        $this->autoRender = FALSE;
        $this->request->onlyAllow('ajax');
        
        $id = $this->Auth->user('id');
        $profile = $this->Profile->find('first', array(
            'conditions'=> array(
                'users_id'=>$id
            )
        ));
        
        $this->Profile->read(null, $profile['Profile']['id']);
        $this->Profile->set('email', $_POST['new_email']);
        if (!$this->Profile->save()) {
            return "Không thể cập nhật cơ sở dữ liệu";
        }
    }
    
    public function updateAddress(){
        $this->autoRender = FALSE;
        $this->request->onlyAllow('ajax');
        
        $id = $this->Auth->user('id');
        $profile = $this->Profile->find('first', array(
            'conditions'=> array(
                'users_id'=>$id
            )
        ));
        
        $this->Profile->read(null, $profile['Profile']['id']);
        $this->Profile->set('address', $_POST['new_address']);
        if (!$this->Profile->save()) {
            return "Không thể cập nhật cơ sở dữ liệu";
        }
    }
    public function updateBirthDay(){
        $this->autoRender = FALSE;
        $this->request->onlyAllow('ajax');
        
        $id = $this->Auth->user('id');
        $profile = $this->Profile->find('first', array(
            'conditions'=> array(
                'users_id'=>$id
            )
        ));
        
        $this->Profile->read(null, $profile['Profile']['id']);
        $this->Profile->set('birthday', $_POST['new_birthday']);
        if (!$this->Profile->save()) {
            return "Không thể cập nhật cơ sở dữ liệu";
        }
    }
    
    public function updatePhone(){
        $this->autoRender = FALSE;
        $this->request->onlyAllow('ajax');
        
        $id = $this->Auth->user('id');
        $profile = $this->Profile->find('first', array(
            'conditions'=> array(
                'users_id'=>$id
            )
        ));
        
        $this->Profile->read(null, $profile['Profile']['id']);
        $this->Profile->set('phone', $_POST['new_phone']);
        if (!$this->Profile->save()) {
            return "Không thể cập nhật cơ sở dữ liệu";
        }
    }
    
    public function updateSex(){
        $this->autoRender = FALSE;
        $this->request->onlyAllow('ajax');
        
        $id = $this->Auth->user('id');
        $profile = $this->Profile->find('first', array(
            'conditions'=> array(
                'users_id'=>$id
            )
        ));
        
        $this->Profile->read(null, $profile['Profile']['id']);
        $this->Profile->set('sex', $_POST['new_sex']);
        if (!$this->Profile->save()) {
            return "Không thể cập nhật cơ sở dữ liệu";
        }
    }
    
    public function updateIntro(){
        $this->autoRender = FALSE;
        $this->request->onlyAllow('ajax');
        
        $id = $this->Auth->user('id');
        $profile = $this->Profile->find('first', array(
            'conditions'=> array(
                'users_id'=>$id
            )
        ));
        
        $this->Profile->read(null, $profile['Profile']['id']);
        $this->Profile->set('introducted', $_POST['new_intro']);
        if (!$this->Profile->save()) {
            return "Không thể cập nhật cơ sở dữ liệu";
        }
    }
    
    public function updateHobby(){
        $this->autoRender = FALSE;
        $this->request->onlyAllow('ajax');
        
        $id = $this->Auth->user('id');
        $profile = $this->Profile->find('first', array(
            'conditions'=> array(
                'users_id'=>$id
            )
        ));
        
        $this->Profile->read(null, $profile['Profile']['id']);
        $this->Profile->set('hobby', $_POST['new_hobby']);
        if (!$this->Profile->save()) {
            return "Không thể cập nhật cơ sở dữ liệu";
        }
    }
    
    public function updateReadComment(){
        $this->autoRender = false;
        $this->request->onlyAllow('ajax');
        
        $users_id = $_POST['users_id'];
        $articles_id = $_POST['articles_id'];
        
        //Update đã đọc các comments
        $sql = "update tb_comments set flag = 1 where users_id='".$users_id."' and articles_id='".$articles_id."'";
        $this->Comment->query($sql);
        return;
    }
    public function updateReadInvite(){
        $this->autoRender = false;
        $this->request->onlyAllow('ajax');
        
        $users_id = $_POST['users_id'];
        $articles_id = $_POST['articles_id'];
        
        //Update đã đọc các comments
        $sql = "update tb_invitations set flag = 1 where users_id='".$users_id."' and articles_id='".$articles_id."'";
        $this->Invitation->query($sql);
        return;
    }
    public function updateReadLike(){
        $this->autoRender = false;
        $this->request->onlyAllow('ajax');
        
        $users_id = $_POST['users_id'];
        $articles_id = $_POST['articles_id'];
        
        //Update đã đọc các comments
        $sql = "update tb_users_likes set flag = 1 where users_id='".$users_id."' and articles_id='".$articles_id."'";
        $this->Invitation->query($sql);
        return;
    }
    
}
