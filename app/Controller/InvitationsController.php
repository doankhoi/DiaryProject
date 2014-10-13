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
    public function getAllInvitationNotRead(){
        //Lấy thông tin id người dùng hiện tại
        $id = $this->Auth->user('id');
        $list_arr = array();
        
        $invitations = $this->Invitation->find('all', array(
            'fields'=> array('articles_id'),
            'conditions'=>array(
                'Invitation.flag'=>0,
                'Invitation.users_id'=>$id
            ),
            'order'=>'Invitation.created DESC'
        ));
        
        foreach ($invitations as $invitation){
            //Tìm id của người dùng có bài viết articles_id
            $id_user = $this->requestAction(array('controller'=>'Articles', 'action'=>'getIdOwner', $invitation['Invitation']['articles_id']));
            
            $item = array('users_id'=>$id_user, 'articles_id'=>$invitation['Invitation']['articles_id'], 'created'=>$invitation['Invitation']['created']);
            
            $list_arr[]= $item;
        }
        
        return $list_arr;
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
