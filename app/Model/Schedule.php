<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Schedule
 *
 * @author doankhoi
 */
class Schedule extends AppModel{
    var $name = "Schedule";
    
    var $validate = array(
        'title' => array('title_must_not_be_blank' => array(
                'rule' => 'notEmpty',
                'message' => 'Nhập vào tiêu đề'),
        ),
        'notes'=>array('notes_must_not_be_blank' => array(
                'rule' => 'notEmpty',
                'message' => 'Nhập vào nội dung'),
    ));
}
