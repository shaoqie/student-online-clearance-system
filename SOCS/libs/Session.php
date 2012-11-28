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
    
    public static function set_user($username){
        $_SESSION['username'] = $username;
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
}

?>
