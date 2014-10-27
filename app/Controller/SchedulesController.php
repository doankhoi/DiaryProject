<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SchedulesController
 *
 * @author doankhoi
 */
class SchedulesController  extends AppController{
    var $name = "Schedules";
    var $uses = array('Schedule');
    var $helpers = array('Paginator');
    var $paginate = array();
    
    public function getSchedulesImp(){
        $users_id = $this->Auth->user('id');
        
        $shedules = $this->Schedule->find('all', array( 
            'conditions'=> array(
                'users_id'=>$users_id
            ),
            'order'=>'Schedule.time desc, priority asc',
            'limit'=> 10
        ));
        
        return $shedules;
    }
    
    public function view($id=null){
        $this->layout = 'user_page';
        if($id == null){
            echo "Không tồn tại kế hoạch nào";
        }
        
        $schedule = $this->Schedule->findById($id);
        $this->set('schedule', $schedule);
        $this->set('title_for_layout', $schedule['Schedule']['title']);
    }
    
    public function index(){
        $this->layout = 'user_page';
        $id = $this->Auth->user('id');
        
        $this->paginate = array(
                                'limit' => 8,
                                'order' => array(
                                    'time' => 'desc',
                                    'priority'=>'asc'
                                    ),
                             );
        $data = $this->paginate("Schedule");
        $this->set("data",$data);
        
        $this->set('title_for_layout', 'Danh sách các kế hoạch');
    }
    
    public function add(){
        $this->layout= 'user_page';
    }
}
