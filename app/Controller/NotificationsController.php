<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NotificationsController
 *
 * @author doankhoi
 */
class NotificationsController extends AppController{
    var $name = "Notifications";
    
    /**
     * Biểu diễn tất cả các thông báo trên trang web
     */
    public function showNotify(){
        //Lấy tất cả các comment chưa đọc
        $commentNotRead = $this->requestAction(array(
            'controller'=> 'Comments',
            'action'=>'getAllCommentNotRead'
        ));
        
        //Lấy tất cả các lời mời chưa đọc
        $invitationNotRead = $this->requestAction(array(
            'controller'=>'Invitations',
            'action'=>'getAllInvitationNotRead'
        ));
        
        //Lấy tất cả sự kiện like người dùng với bài viết người dùng hiện tại
        $likeNotRead = $this->requestAction(array(
            'controller'=>'UsersLikes',
            'action'=>'getAllLikeNotRead'
        ));
              
    }
}
