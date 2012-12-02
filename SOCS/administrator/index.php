<?php

/**
 * Administrator's Index Page
 *
 * @author Ozy
 */
require_once '../config/config.php';

class Index extends Controller {

    private $template;
    private $administrator_model;

    public function __construct() {
        parent::__construct();
        if (Session::user_exist() && Session::get_Account_type() == "Admin") {

            $this->administrator_model = new User_Model();
            $this->template = new Template();
            $this->template->setPageName('Administrator Page');
            $this->template->setContent('dashboard.tpl');
            $this->template->set_UserInfo("" . Session::get_Surname() . ", " . Session::get_Firstname() . " " . Session::get_Middlename() . ".");
            
            $this->template->set_Name($this->getNameofUser(''));
            $this->template->set_Photos($this->getPictureofUser(''));
            $this->template->set_Type($this->getTypeeofUser(''));
        } else {
            header('Location: /SOCS/');
        }
    }

    private function getNameofUser($searchName) {
        $name = array();
        $query = $this->administrator_model->getListofUsers($searchName);
        while ($row = mysql_fetch_array($query)) {
            array_push($name, $row['Name']);
        }
        
        return $name;
    }

    private function getPictureofUser($searchName) {
        $picture = array();
        $query = $this->administrator_model->getListofUsers($searchName);
        while ($row = mysql_fetch_array($query)) {
            array_push($picture, $row['Picture']);
        }

        return $picture;
    }

    private function getTypeeofUser($searchName) {
        $type = array();
        $query = $this->administrator_model->getListofUsers($searchName);
        while ($row = mysql_fetch_array($query)) {
            array_push($type, $row['Account_Type']);
        }

        return $type;
    }
    
    public function gotoPage($pageNum){
        //echo "test: " . $pageNum;
    }
    
    public function gotoSearch($searchName){
       // echo "test Search: " . $searchName;
        $this->template->set_Name($this->getNameofUser($searchName));
        $this->template->set_Photos($this->getPictureofUser($searchName));
        $this->template->set_Type($this->getTypeeofUser($searchName));
    }

    public function display() {
        $this->template->display('simple.tpl');
    }

}

$controller = new Index();
$controller->perform_actions();
$controller->display();
?>
