<?php


class InvitationsController extends AppController {
    var $name = "Invitations";
    public $uses = array('Invitation');
    
    /**
     * Lấy ra tất cả các lời mời sắp xếp theo chiều giảm dần ngày tạo
     */
    public function getAllInvitation(){
        return $this->Invitation->find('all', array(
            'order'=>'Invitation.created DESC'
        ));
    }

    /**
     * Lấy về các thông tin lời mời chưa được người dùng hiện tại xác nhận
     */
    public function getInvitation(){
        //Lấy thông tin id người dùng hiện tại
        $id = $this->Auth->user('id');
        
        $invitation = $this->Invitation->find('all', array(
            'conditions'=>array(
                'Invitation.flag'=>0,
                'Invitation.users_id'=>$id
            ),
            'order'=>'Invitation.created DESC'
        ));
        
       return json_encode($invitation);
    }
    
    /**
     * Đếm số lời mời của người dùng hiện tại chưa xác nhận
     */
    public function countInvitation(){
        //Lấy thông tin id người dùng hiện tại
        $id = $this->Auth->user('id');
        return $this->Invitation->find('count', array(
            'conditions'=>array(
                'Invitation.flag'=>0,
                'Invitation.users_id'=>$id
            ),
        ));
    }
            
}
