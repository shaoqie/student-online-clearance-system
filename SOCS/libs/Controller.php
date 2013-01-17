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
    
    public function getStrongchar($str, $findname){
        $left = substr($str, 0, strpos(strtolower($str), strtolower($findname))); //cut left
	$center = "<strong style='color: #049cdb;'><u>" .substr($str, strpos(strtolower($str), strtolower($findname)), strlen($findname)) ."</u></strong>"; // cut center
	$right =  substr($str, strpos(strtolower($str), strtolower($findname)) + strlen($findname));		
		
	return $left .$center .$right;
    }
    
    public function getListofName($arrayTemp, $searchName, $finder){
        $row = array();
        foreach ($arrayTemp as $value) {
            $str = $finder == "default" ? $value : $this->getStrongchar($value, $searchName);
            array_push($row, $str);
        }
        
        return $row;
    }

    public abstract function display();
}

?>
