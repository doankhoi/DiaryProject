<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ArticlesController
 *
 * @author doankhoi
 */
class ArticlesController extends AppController{
    var $name = "Articles";
    var $uses = array('Article','User');
    
    /**
     * Hàm xem thông tin chi tiết một bài viết
     */
    public function view($id){
        
    }
    
    /**
     * Hàm tìm mã id của chủ nhân của bài viết có mã id
     */
    public function getIdOwner($articles_id){
        $article = $this->Article->find('first', array(
            'fields'=> array('users_id'),
            'conditions'=> array(
                'Article.id'=>$articles_id
            )
        ));
        return $article['Article']['users_id'];
    }
    
    /**
     * Hàm tìm tiêu đề bài viết 
     */
    public function getTitle($id){
        return $this->Article->find('first', array(
            'fields'=> array('Article.title'),
            'conditions'=>array(
                'id'=>$id
            )
        ));
    }
}
