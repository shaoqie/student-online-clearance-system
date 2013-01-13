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
    private $student_model;
    private $requirementbyStudent_model;
    private $signatorialList_model;
    
    private $bulletin_model;

    public function __construct() {
        parent::__construct();

        if (Session::user_exist() && Session::get_Account_type() == "Signatory") {
            $this->user_model = new User_Model();
            $this->schoolYearSem_model = new SchoolYearSem();
            $this->student_model = new Student_Model();
            $this->clearanceStatus_model = new ClearanceStatus();
            $this->requirementbyStudent_model = new Requirementbystudent_Model();
            $this->signatorialList_model = new SignatorialList_Model();
            $this->bulletin_model = new Bulletin_Model();
            $this->template = new Template();
            
            $listOfSchoolYear = $this->schoolYearSem_model->getSchool_Year();
            
            $this->template->setPageName('Signatory Page');

            $this->template->set_username(Session::get_user());
            $this->template->set_surname(Session::get_Surname());
            $this->template->set_firstname(Session::get_Firstname());
            $this->template->set_middlename(Session::get_Middlename());
            $this->template->set_account_type(Session::get_Account_type() ." in Charge -");

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
        $sign_id = $this->signatorialList_model->getSignId(Session::get_AssignSignatory());
        $numOfPages = $this->user_model->getStudent_PageSize($sign_id, $searchName);
        $getListofStudent_Name = $this->getListofStudentName($this->user_model->filter_ListofStudent_NameUsers($sign_id, $searchName, $page), $searchName, $finder);
        $getListofStudent_Username = $this->user_model->filter_ListofStudent_Username($sign_id, $searchName, $page);
        $getListOfStudenClearanceStatus = $this->getListofClearanceStatus($getListofStudent_Username);
        $numOfResults = count($this->user_model->filter_ListofStudent_NameUsers($sign_id, $searchName, $page));

        $this->template->assign('myName_student_NameUser', $getListofStudent_Name); 
        $this->template->assign('myKey_Student_Username', $getListofStudent_Username); 
        $this->template->assign('myStudent_ClearanceStatus', $getListOfStudenClearanceStatus);
        $this->template->assign('filter', $searchName);
        $this->template->assign('signatoryDashboard_length', $numOfPages);
        
        if ($numOfResults == 0) {
            $this->template->setAlert('No Results Found.', Template::ALERT_ERROR, 'alert');
        }
    }

     /*----------- For Bulletin Page ------------*/
    
    public function viewPosting_Bulletin(){
        $this->template->setPageName('Bulletin Page');
        $this->template->setContent('BulletinPage.tpl');
         
        $sign_id = $this->signatorialList_model->getSignId(Session::get_AssignSignatory());
        $sy_id = $this->schoolYearSem_model->getSy_ID(trim($_POST['school_year']));
         
        
        if(isset($_POST['postBulletin'])){
            if(trim($_POST['post_message']) != ""){
                $this->bulletin_model->insert($sign_id, $sy_id, trim($_POST['post_message']));
                $this->template->setAlert("Posting Bulletin was Successful!... ", Template::ALERT_SUCCESS);
            }else{
                $this->template->setAlert("Cannot Post an empty field!... ", Template::ALERT_ERROR);
            }
        }
       
    }
    
    /*----------- For Clearance Page ------------*/
    
    public function viewClearavePage($stud_id){
        $stud_name = $this->student_model->getStudent_name(trim($stud_id));
        $stud_course = $this->student_model->getStudent_course(trim($stud_id));
        $stud_dept = $this->student_model->getStudent_department(trim($stud_id));
        $stud_requirements = $this->requirementbyStudent_model->getListofRequirements($stud_id);
        
        $this->template->setPageName("Student Clearance Page");
        $this->template->setContent("ClearancePage.tpl");
        $this->template->assign('student_name', $stud_name);
        $this->template->assign('course_name', $stud_course);
        $this->template->assign('dept_name', $stud_dept);
        $this->template->assign('myRequirements_byStudent', $stud_requirements);
    }    
    
    /*----------- For Student Detail Page ------------*/
    
    public function viewStudent_Detail($stud_id){
        $stud_name = $this->student_model->getStudent_name(trim($stud_id));
        $stud_course = $this->student_model->getStudent_course(trim($stud_id));
        $stud_dept = $this->student_model->getStudent_department(trim($stud_id));
        
        $stud_gender = $this->student_model->getStudent_gender(trim($stud_id));
        $stud_yr_level = $this->student_model->getStudent_yr_level(trim($stud_id));
        $stud_program = $this->student_model->getStudent_program(trim($stud_id));
        $stud_section = $this->student_model->getStudent_section(trim($stud_id));
        $stud_status = $this->student_model->getStudent_clearance_status(trim($stud_id));
        
        $this->template->setPageName("Student Detailed Page");
        $this->template->setContent("Student_Detailed.tpl");
        $this->template->assign('student_name', $stud_name);
        $this->template->assign('course_name', $stud_course);
        $this->template->assign('dept_name', $stud_dept);
        
        $this->template->assign('stud_gender', $stud_gender);
        $this->template->assign('stud_yr_level', $stud_yr_level ." Year");
        $this->template->assign('stud_program', $stud_program);
        $this->template->assign('stud_section', $stud_section);
        $this->template->assign('stud_status', $stud_status);
    }     
    
    /*----------- For Requirements Page ------------*/
    
    public function viewListOfRequirements(){
        $this->template->setPageName("Requirements Page");
        $this->template->setContent("RequirementsPage.tpl");       
    }
    
     /*----------- For Adding Requirements Page ------------*/

    public function viewAdd_Requirements(){
        $this->template->setPageName("Adding Requirements Page");
        $this->template->setContent("Add_Requirements.tpl"); 
        
        if(isset($_POST['Next'])){
            if(trim($_POST['requirement_title']) != "" && trim($_POST['requirement_description']) != ""){
                /// procceed to the next page
                header('Location: ../signatory/index.php?action=viewNext_Add_Requirements&T_title=' .trim($_POST['requirement_title']) .'&T_desc=' .trim($_POST['requirement_description']));
            }else{
                $this->template->setAlert("Cannot Procceed if a field is empty!... ", Template::ALERT_ERROR);
            }
        }
    }
    
    /*----------- For the next page for Adding Requirements ------------*/
    
    public function viewNext_Add_Requirements($T_title, $T_desc){
        $this->template->setPageName("Adding Requirements Page");
        $this->template->setContent("Next_Add_Requirements.tpl"); 
              
        
    }


    /*------------ Display UI -----------------*/
    public function display() {
        $this->template->display('bootstrap.tpl');
        $this->user_model->db_close();
        $this->schoolYearSem_model->db_close();
        $this->student_model->db_close();
        $this->clearanceStatus_model->db_close();
    }

}

$controller = new Index();
$controller->perform_actions();
$controller->display();
?>
