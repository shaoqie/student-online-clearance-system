<?php

/**
 * Signatory's Index Page
 *
 * @author Ozy
 */
require_once '../config/config.php';

class Index extends Controller {
    private $template;
    private $user_model;
    private $schoolYearSem_model;
    private $clearanceStatus_model;

    public function __construct() {
        parent::__construct();

        if (Session::user_exist() && Session::get_Account_type() == "Signatory") {
            $this->user_model = new User_Model();
            $this->schoolYearSem_model = new SchoolYearSem();
            $this->clearanceStatus_model = new ClearanceStatus();
            $this->template = new Template();
            
            $listOfSchoolYear = $this->schoolYearSem_model->getSchool_Year();
            
            $this->template->setPageName('Administrator Page');

            $this->template->set_username(Session::get_user());
            $this->template->set_surname(Session::get_Surname());
            $this->template->set_firstname(Session::get_Firstname());
            $this->template->set_middlename(Session::get_Middlename());
            $this->template->set_account_type(Session::get_Account_type());

            $this->template->setContent('Signatorydashboard.tpl');
            $this->template->assign('assign_sign', ", " .Session::get_AssignSignatory());
            $this->template->assign('mySchool_Year', $listOfSchoolYear);
            
            $this->displayTable('', 1, "default");
        } else {
            header('Location: /SOCS/');
        }
    }
    
    private function getListofClearanceStatus($arrayUsername){
        $row = array();
        foreach ($arrayUsername as $value) {
            $studentStatus = $this->clearanceStatus_model->getClearanceStatus($value);
            array_push($row, $studentStatus);
        }
        
        return $row;
    }
    
    private function getStrongchar($str, $findname){
        $left = substr($str, 0, strpos(strtolower($str), strtolower($findname))); //cut left
	$center = "<strong style='color: #049cdb;'><u>" .substr($str, strpos(strtolower($str), strtolower($findname)), strlen($findname)) ."</u></strong>"; // cut center
	$right =  substr($str, strpos(strtolower($str), strtolower($findname)) + strlen($findname));		
		
	return $left .$center .$right;
    }
    
    private function getListofStudentName($arrayTemp, $searchName, $finder){
        $row = array();
        foreach ($arrayTemp as $value) {
            $str = $finder == "default" ? $value : $this->getStrongchar($value, $searchName);
            array_push($row, $str);
        }
        
        return $row;
    }
    
    public function filter($filterName){
        $this->displayTable(trim($filterName), 1);
    }
    
    public function displayTable($searchName, $page, $finder) {  
        $numOfPages = $this->user_model->getStudent_PageSize($searchName);
        $getListofStudent_Name = $this->getListofStudentName($this->user_model->filter_ListofStudent_NameUsers($searchName, $page), $searchName, $finder);
        $getListofStudent_Username = $this->user_model->filter_ListofStudent_Username($searchName, $page);
        $getListOfStudenClearanceStatus = $this->getListofClearanceStatus($getListofStudent_Username);
        $numOfResults = count($this->user_model->filter_ListofStudent_NameUsers($searchName, $page));

        $this->template->assign('myName_student_NameUser', $getListofStudent_Name); 
        $this->template->assign('myKey_Student_Username', $getListofStudent_Username); 
        $this->template->assign('myStudent_ClearanceStatus', $getListOfStudenClearanceStatus);
        $this->template->assign('filter', $searchName);
        $this->template->assign('signatoryDashboard_length', $numOfPages);
        
        if ($numOfResults == 0) {
            $this->template->setAlert('No Results Found.', Template::ALERT_ERROR);
        }
    }

    public function display() {
        $this->template->display('bootstrap.tpl');
        $this->user_model->db_close();
    }

}

$controller = new Index();
$controller->perform_actions();
$controller->display();
?>
