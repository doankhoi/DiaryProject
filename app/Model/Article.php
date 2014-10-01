<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Article
 *
 * @author doankhoi
 */
class Article extends AppModel{
   var $name = "Article";
   var $hasMany = array(
       'Invitation'=> array(
           'className'=>'Invitation',
           'foreignKey'=>'Invitation.articles_id'
       ),
       'Comment'=>array(
           'className'=>'Comment',
           'foreignKey'=>'Comment.articles_id'
       )
   );
}
