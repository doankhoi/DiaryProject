<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Profile
 *
 * @author doankhoi
 */
class Profile extends AppModel{
    var $name = "Profile";
    var $belongsTo = array('User'=> array('className'=>'User', 'foreignKey'=>'users_id'));
    
    var $validate = array(
        'name'=> array(
            'name_must_be_blank'=> array(
                'rule'=>'notEmpty',
                'message'=>'Vui lòng nhập trường này'
            )
        ),
        'address'=>array(
            'name_must_be_blank'=> array(
                'rule'=>'notEmpty'
            )
        ),
        'phone'=>array(
            'name_must_be_blank'=> array(
                'rule'=>'notEmpty'
            )
        )
    );
    
}
