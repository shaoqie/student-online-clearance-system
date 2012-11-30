<?php

/**
 * Session Class
 *
 * @author Ozy
 */
class Session {
    
    public static function init(){
        session_start();
    }
    
    
    //mutator
    public static function set_Account_type($Account_type){
        
        $_SESSION['Account_type'] = $Account_type;
    }
    
    public static function set_user($username){
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
    }
    
    public static function set_password($password){
        $_SESSION['password'] = $password;
    }
    
    public static function set_surname($surname){
        $_SESSION['surname'] = $surname;
    }
    
    public static function set_firstname($firstname){
        $_SESSION['firstname'] = $firstname;
    }
    
    public static function set_middlename($middlename){
        $_SESSION['middlename'] = $middlename;
    }
    

        //acessor
    public static function get_user(){
        return $_SESSION['username'];
    }
    
    public static function get_Account_type(){
        
        return $_SESSION['Account_type'];
    }
    
    public static function get_Surname(){
        return $_SESSION['surname'];
    }
    
    public static function get_Firstname(){
        return $_SESSION['firstname'];
    }
    
    public static function get_Middlename(){
        return $_SESSION['middlename'];
    }
    
    public static function user_exist(){
        if(isset($_SESSION['username'])){
            return true;
        }else{
            return false;
        }
    }
    
    public static function destroy(){
        unset($_SESSION['username']);
        session_destroy();
    }
    
    public static function getUserPass(){
        return $_SESSION['password'];
    }
}

?>
