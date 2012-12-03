<?php

/**
 * Extend this Controller class in every controllers
 *
 * @author Ozy
 */

abstract class Controller {

    public function __construct() {
            
        Session::init();
    }

    public function perform_actions() {
        if (isset($_GET['action'])) {
            $method = $_GET['action'];

            if (count($_GET) == 1) {
                @call_user_func(array($this, $method));
            } else {
                $parameters = array_slice($_GET, 1);
                @call_user_func_array(array($this, $method), $parameters);
            }
        }
    }
    
    public function has_actions(){
        if(isset($_GET['action'])){
            return true;
        }else{
            return false;
        }
    }

    public abstract function display();
}

?>
