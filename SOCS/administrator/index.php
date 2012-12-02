<?php

/**
 * Administrator's Index Page
 *
 * @author Ozy
 */
require_once '../config/config.php';

class Index extends Controller {
    private $administrator_model;
    
    public function __construct() {
        parent::__construct();
        if (Session::user_exist() && Session::get_Account_type() == "Admin") {
            
            $this->administrator_model = new User_Model();
            $this->template = new Template();
            $this->template->setPageName('Administrator Page');
            $this->template->setContent('dashboard.tpl');
            $this->template->set_UserInfo("" .Session::get_Surname() .", " .Session::get_Firstname() ." " .Session::get_Middlename() .".");
        
            
            //$this->administrator_model->getListofUsers('');
            //$this->template->setListofUser($this->getNameofUser('t'));
            
        } else {
            header('Location: /SOCS/');
        }
    }
    
    public function display() {
        $this->template->display('simple.tpl');
    }
    
    private function getNameofUser($searchName){
        $name = array();
        while($row = mysql_fetch_array($this->administrator_model->getListofUsers($searchName))){
            array_push($name, $row['Name']);
        }
        
        return $name;
    }
    
    private function getPictureofUser($searchName){
        $picture = array();
        while($row = mysql_fetch_array($this->administrator_model->getListofUsers($searchName))){
            array_push($name, $row['Picture']);
        }
        
        return $picture;
    }
    
    private function getTypeeofUser($searchName){
        $type = array();
        while($row = mysql_fetch_array($this->administrator_model->getListofUsers($searchName))){
            array_push($name, $row['Account_Type']);
        }
        
        return $type;
    }
    

}

$controller = new Index();
$controller->perform_actions();
$controller->display();
?>
