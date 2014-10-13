<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProfilesController
 *
 * @author doankhoi
 */
class ProfilesController extends AppController{
    var $name = "Profiles";
    var $uses = array('Profile');
    
    public function getProfileById($id){
        return $this->Profile->find('first', array(
            'fields'=> array(
                'Profile.avatar'
            ),
            'conditions'=> array(
                'users_id'=>$id
            )
        ));
    }
}
