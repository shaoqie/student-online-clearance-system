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
    
    public static function set_user($username,$password){
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
    }
    
    public static function set_password($password){
        $_SESSION['password'] = $password;
    }
    
    public static function get_user(){
        return $_SESSION['username'];
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
