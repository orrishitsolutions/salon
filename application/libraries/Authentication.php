<?php

/*
 * @package	User Authentication
 * @author	Rafi Ahmad
 * @copyright	Copyright (c) 2008 - 2014, Rafi Ahmad
 * @since	Version 1.0.0
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication {

    

    /**
     * Copies an instance of CI
     */
    public function __construct() {
        $this->ci = & get_instance();
        $this->ci->load->model('auth');
        
    }
 
    /**
     * 
     * @param type $userInput userInput should be in associative where as key name should be same as database table coloum
     * @param type $tableName this is a string and must be existing table name
     * @return boolean true if any user found else false 
     */
    public function checkUser($userInput) {
        return $this->ci->auth->isUserExist($userInput);
    }
    
    // public function updateTime($userInput){
    //     $lastLogin=array(
    //         'lastLogin'=>date('Y-m-d H:i:s', now())
    //     );
    //     $isTimeUpdated=$this->ci->auth->updateTime($userInput,$lastLogin);
    //     if($isTimeUpdated){
    //         return true;
    //     }else{
    //         return false;
    //     }
    // }
    
   
    

}
