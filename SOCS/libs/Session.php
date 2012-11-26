<?php

/**
 * Sessions
 *
 * @author Ozy
 */
class Session {
    
    public static function init(){
        session_start();
    }

    public static function has_administrator(){
        if(isset($_SESSION['administrator'])){
            return true;
        }else{
            return false;
        }
    }
    
    public static function set_administrator($name){
        $_SESSION['administrator'] = $name;
    }
    
    public static function unset_administrator(){
        unset($_SESSION['administrator']);
        
        if(empty($_SESSION)){
            session_destroy();
        }
    }
}

?>
