<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CommentsController
 *
 * @author doankhoi
 */
class CommentsController extends AppController{
    var $name = "Comments";
    var $uses = array('Comment', 'Article');
    /**
     * Đếm tất cả các comment mà chưa được người chủ bài viết đọc
     */
    public function countCommentNotRead(){
        
        //Lấy id người dùng hiện tại
        $id = $this->Auth->user('id');
        
        $sql = "select * from tb_comments where flag=0 and articles_id in ("
                . "select id from tb_articles where users_id =".$id.")";
                
        $comments = $this->Comment->query($sql);
        return count($comments);
    }
    
    /**
     * Lấy tất cả các comment chưa được người dùng hiện tại đọc
     * @return type
     */
    public function getAllCommentNotRead(){
        //Lấy id người dùng hiện tại
        $id = $this->Auth->user('id');
        
        $sql = "select * from tb_comments where flag=0 and articles_id in ("
                . "select id from tb_articles where users_id =".$id.") order by created desc";
                
        $comments = $this->Comment->query($sql);
        return $comments;
    }
}
