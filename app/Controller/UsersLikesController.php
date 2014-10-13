<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsersLikeController
 *
 * @author doankhoi
 */
class UsersLikesController extends AppController{
    var $name = "UsersLikes";
    var $uses = array('UsersLike', 'Article', 'User');
    
    /**
     * Đếm tất cả số lần like của bạn bè với bài viết của người dùng hiện tại
     */
    public function countLikeNotRead(){
        //Lấy id người dùng hiện tại
        $id = $this->Auth->user('id');
        
        $sql = "select * from tb_users_likes where flag = 0 and articles_id in ("
                . "select id from tb_articles where users_id=".$id.")";
        $likes = $this->UsersLike->query($sql);
        
        return count($likes);
    }
    
    /**
     * Lấy ra thông báo người dùng nào like bài đăng của người dùng hiện tại mà chưa đọc
     */
    public function getAllLikeNotRead(){
        //Lấy id người dùng hiện tại
        $id = $this->Auth->user('id');
        $sql = "select *from tb_users_likes where flag = 0 and articles_id in ("
                . "select id from tb_articles where users_id=".$id.") order by created desc";
        
        $likes = $this->UsersLike->query($sql);
        $list_array = array();
        
        foreach ($likes as $like){
            $users_id = $like['tb_users_likes']['users_id'];
            $articles_id = $like['tb_users_likes']['articles_id'];
            $created = $like['tb_users_likes']['created'];
            
            
            $item = array('users_id'=>$users_id, 'articles_id'=>$articles_id, 'created'=>$created);
            $list_array[]= $item;
        }
        
        return $list_array;
    }
}
