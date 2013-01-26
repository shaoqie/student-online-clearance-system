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

            $this->template->set_username(Session::get_user());
            $this->template->set_surname(Session::get_Surname());
            $this->template->set_firstname(Session::get_Firstname());
            $this->template->set_middlename(Session::get_Middlename());
            $this->template->set_account_type(Session::get_Account_type());

            $this->template->setContent('dashboard.tpl');
            $this->template->setCalendar('Calendar.tpl');
            $this->template->assign('assign_sign', '');  
            
            if(isset($_GET['account_type'])){
                $this->displayTable('', 1, trim($_GET['account_type']), "default");
            }else{
                $this->displayTable('', 1, 'Student', "default");
            }
            
        } else {
            header('Location: ' . HOST);
        }
    }

    private function getListofKey($searchName, $page, $acc_type) {
        $key = array();
        $query = $this->administrator_model->getListofUsers($searchName, $page, $acc_type);
        while ($row = mysql_fetch_array($query)) {
            array_push($key, $row['Username']);
        }

        return $key;
    }   
    
    private function getNameofUser($searchName, $page, $finder, $acc_type) {
        $name = array();
        $query = $this->administrator_model->getListofUsers($searchName, $page, $acc_type);
        while ($row = mysql_fetch_array($query)) {
            if($finder == "default"){
                array_push($name, $row['Name']);
            }else{
                array_push($name, $this->getStrongchar($row['Name'], $searchName));
            }
        }

        return $name;
    }

    private function getPictureofUser($searchName, $page, $acc_type) {
        $picture = array();
        $query = $this->administrator_model->getListofUsers($searchName, $page, $acc_type);
        while ($row = mysql_fetch_array($query)) {
            array_push($picture, $row['Picture']);
        }

        return $picture;
    }

    private function getTypeeofUser($searchName, $page, $acc_type) {
        $type = array();
        $query = $this->administrator_model->getListofUsers($searchName, $page, $acc_type);
        while ($row = mysql_fetch_array($query)) {
            array_push($type, $row['Account_Type']);
        }

        return $type;
    }

    public function delete($selected, $account_type) {
        $explode = explode("@", $selected);
        foreach ($explode as $value) {
            $this->administrator_model->deleteUser(trim($value));
        }
        
        $HOST = $explode[0] != null ? HOST ."/administrator/?action=deleted&type=" .$account_type : HOST;
        header('Location: ' .$HOST);
    }
    
    public function deleted($type){
        $this->template->setAlert('Delete an Account Successfully!..', Template::ALERT_SUCCESS, 'alert');
        $this->displayTable('', 1, $type, "default");
    }
    
    public function filter($filterName, $type){
        $this->displayTable(trim($filterName), 1, $type, 'not');
    }

    public function displayTable($searchName, $page, $account_type , $finder) {
        $numOfPages = $this->administrator_model->getQueryPageSize($searchName, $account_type);
        $numOfResults = count($this->getNameofUser($searchName, $page, "default", $account_type));

        $this->template->assign('myKey_admin', $this->getListofKey($searchName, $page, $account_type));      
        $this->template->set_Photos($this->getPictureofUser($searchName, $page, $account_type));
        $this->template->set_Type($this->getTypeeofUser($searchName, $page, $account_type));
        $this->template->set_Filter($searchName);
        $this->template->assign('admin_length', $numOfPages);
        $this->template->assign('rowCount_admin', $numOfResults);
        $this->template->assign('account_type', $account_type);

        if($finder == "default"){
            $this->template->set_Name($this->getNameofUser($searchName, $page, "default", $account_type));
        }else{
            $this->template->set_Name($this->getNameofUser($searchName, $page, "not_default", $account_type));
        }
        if ($numOfResults == 0) {
            $this->template->setAlert('No Results Found.', Template::ALERT_ERROR, 'alert');
        }
    }
    
    public function display_add_edit_account(){
        $listOfSignatory = $this->administrator_model->getListofSignatory();
        
        $this->template->setContent('add_edit_account.tpl');   
        $this->template->assign('mySignatory', $listOfSignatory);
    }

    public function display() {
        $this->template->display('bootstrap.tpl');
        $this->administrator_model->db_close();
    }

}

$controller = new Index();
$controller->perform_actions();
$controller->display();
?>
