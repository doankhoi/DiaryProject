<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsersController
 *
 * @author doankhoi
 */
class UsersController extends AppController{
    var $name = "Users";
    
    public function index($id){
        $this->layout = "user_page";
    }
}
