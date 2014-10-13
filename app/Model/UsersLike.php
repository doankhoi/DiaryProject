<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserLike
 *
 * @author doankhoi
 */
class UsersLike extends AppModel{
    var $name = "UsersLike";
    var $belongsTo = array(
        'Article'=>array(
            'className'=>'Article',
            'foreignKey'=>'articles_id'
        ),
        'User'=> array(
            'className'=>'User',
            'foreignKey'=>'users_id'
        )
    );
}
