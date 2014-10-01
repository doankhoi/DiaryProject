<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Comment
 *
 * @author doankhoi
 */
class Comment extends AppModel {

    var $name = "Comment";
    var $belongTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'users_id'
        ),
        'Article'=> array(
            'className'=>'Article',
            'foreignKey'=>'articles_id'
        )
    );

}
