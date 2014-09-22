<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FriendUser
 *
 * @author doankhoi
 */
class FriendUser extends AppModel{

    var $name = "FriendUser";
    var $belongsTo = array('User'=> array('className'=>'User', 'foreignKey'=>'users_id'));
}
