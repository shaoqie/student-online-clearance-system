<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of adminAccount
 *
 * @author ronversa09
 */
class adminAccount {
    private $username;
    private $password;
    
    private $lastname;
    private $firstname;
    private $middlename;
    
    public function __construct() {
        $this->username     = "admin";
        $this->password     = "password";
    
        $this->lastname     = "";
        $this->firstname    = "";
        $this->middlename   = "";
    }
    
    // mutator
    public function setUsername($Tusername){
        $this->username = $Tusername;
    }
    
    public function setPassword($Tpassword){
        $this->password = $Tpassword;
    }
    
    public function setLastname($Tlastname){
        $this->lastname = $Tlastname;
    }
    
    public function setFirstname($Tfirstname){
        $this->middlename = $Tfirstname;
    }
    
    public function setMiddlename($Tmiddlename){
        $this->lastname = $Tmiddlename;
    }
    
    
    // accessor
    public function getUsername(){
        return $this->username;
    }
    
    public function getPassword(){
        return $this->password;
    }
    
    public function getLastname(){
        return $this->lastname;
    }
    
    public function getFirstname(){
        return $this->firstname;
    }
    
    public function getMiddlename(){
        return $this->middlename;
    }
    
    public function isEqual($Tuser, $Tpass){
        if($this->username == $Tuser && $this->password == $Tpass){
            return true;
        }else{
            false;
        }
    }
}

?>
