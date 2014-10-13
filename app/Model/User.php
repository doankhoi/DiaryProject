<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author doankhoi
 */
class User extends AppModel{
    var $name = "User";
    var $hasOne = array('Profile'=> array('className'=>'Profile', 'foreignKey'=>'users_id'));
    var $hasMany = array(
        'FriendsUser'=> array(
            'className'=>'FriendsUser',
            'foreignKey'=>'users_id',
            'condition'=> array('FriendsUser.users_id'=>'User.id')
        ),
        'Invitation'=> array(
            'className'=>'Invitation',
            'foreignKey'=>'users_id',
            'condition'=> array('Invitation.users_id'=> 'User.id')
        ),
        'Comment'=> array(
            'className'=>'Comment',
            'foreignKey'=>'users_id',
            'condition'=>array('Comment.users_id'=>'User.id')
        ),
        'UsersLike'=>array(
            'className'=>'UsersLike',
            'foreignKey'=>'users_id'
        )
    );
    
    var $validate = array(
        'username' => array(
                               'username_must_not_be_blank' => array(
                                   'rule' => 'notEmpty',
                                   'message' => 'Vui lòng nhập thông tin'),
                                'username_must_be_unique' => array(
                                    'rule' => 'isUnique', 
                                    'message' => 'Tài khoản bị trùng')
                      ),
        'password' => array(
                               'password_must_not_be_blank' => array(
                                   'rule' => 'notEmpty',
                                   'message' => 'Vui lòng nhập thông tin')
                      ),
        'repassword' => array(
                                'repassword_must_not_be_blank' => array(
                                    'rule' => 'notEmpty',
                                    'message' => 'Vui lòng nhập thông tin')
                        ),
        'email' => array(
                                'email_must_not_be_blank' => array(
                                    'rule' => 'notEmpty',
                                    'message' => 'Vui lòng nhập thông tin'),
                                'email_must_be_unique' => array(
                                    'rule' => 'isUnique', 
                                    'message' => 'Email đã được dùng')
            ));
    
    public function beforeSave($options = array()) {
        Security::setHash('md5');
        
        if ($this->data['User']['password']&& $this->data['User']['repassword'])
        {
            $this->data['User']['password'] = md5($this->data['User']['password']);
            $this->data['User']['repassword'] = md5($this->data['User']['repassword']);
        }
        return true;
    }

}
