<?php

/**
 * Extend this Controller class in every controllers
 *
 * @author Ozy
 */
abstract class Controller {

    public function __construct() {
        $this->load_config();
        $this->load_libs();
        
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
    
    //require config file
    private function load_config(){
        
        if (file_exists('config/config.php')) {
            require_once 'config/config.php';
        } else {
            require_once '../config/config.php';
        }
    }

    //require all libs class and models
    private function load_libs() {
        
        function __autoload($class_name){
            
            if(file_exists("libs/$class_name.php")){
                require_once "libs/$class_name.php";
            }else if(file_exists("../libs/$class_name.php")){
                require_once "../libs/$class_name.php";
            }else if(file_exists("models/$class_name.php")){
                require_once "models/$class_name.php";
            }else if(file_exists("../models/$class_name.php")){
                require_once "../models/$class_name.php";
            }
            
        }
    }

    public abstract function display();
}

?>
