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
    private $department_model;
    
    private $bulletin_model;

    public function __construct() {
        parent::__construct();

        if (Session::user_exist() && Session::get_Account_type() == "Signatory") {
            $this->user_model = new User_Model();
            $this->schoolYearSem_model = new SchoolYearSem_Model();
            $this->student_model = new Student_Model();
            $this->clearanceStatus_model = new ClearanceStatus();
            $this->requirementbyStudent_model = new Requirementbystudent_Model();
            $this->signatorialList_model = new SignatorialList_Model();
            $this->bulletin_model = new Bulletin_Model();
            $this->department_model = new Department_Model();
            $this->template = new Template();
            
            $listOfSchoolYear = $this->schoolYearSem_model->getSchool_Year();
            $currentSemester = $this->schoolYearSem_model->getCurSemester();
            $currentSchool_Year = $this->schoolYearSem_model->getCurSchool_Year();
            
            $this->template->setPageName('Signatory Page');

            $this->template->set_username(Session::get_user());
            $this->template->set_surname(Session::get_Surname());
            $this->template->set_firstname(Session::get_Firstname());
            $this->template->set_middlename(Session::get_Middlename());
            $this->template->set_account_type(Session::get_Account_type() ." in Charge -");

            $this->template->setContent('Signatorydashboard.tpl');
            $this->template->setCalendar('Calendar.tpl');
            $this->template->setSchool_YearSemContent('SchoolYear_Sem.tpl');
            $this->template->assign('assign_sign', ", " .Session::get_AssignSignatory());
            $this->template->assign('mySchool_Year', $listOfSchoolYear);
            $this->template->assign('currentSemester', $currentSemester);
            $this->template->assign('currentSchool_Year', $currentSchool_Year);
            
            
            $this->displayTable('', 1, "default", "");
        } else {
            header('Location: /SOCS/');
        }
    }
    
    private function getListofClearanceStatus($signID, $sysemID, $arrayUsername){
        $row = array();
        foreach ($arrayUsername as $value) {
            $numberOfRequirements = $this->clearanceStatus_model->getStudent_NumberOfRequirements($value, $signID, $sysemID);
            $numberOfCleared = $this->clearanceStatus_model->getStudent_NumberOfClearedPerRequirements($value, $signID, $sysemID);
            
            $studentStatus = $numberOfRequirements == 0? "Not Cleared" : $this->clearanceStatus_model->getClearanceStatus($numberOfRequirements, $numberOfCleared);
            array_push($row, $studentStatus);
        }
        
        return $row;
    }      
    
    public function filter($filterName){
        $this->displayTable(trim($filterName), 1, "not");
    }
    
    public function displayTable($searchName, $page, $finder) {         
        if(isset($_POST['GO'])){
           $sy_id = $this->schoolYearSem_model->getSy_ID(trim($_POST['school_year']), trim($_POST['semester'])); 
           $this->template->assign('currentSemester', trim($_POST['semester']));
           $this->template->assign('currentSchool_Year', trim($_POST['school_year']));
        }else if (isset($_GET['sy']) && isset($_GET['sem'])) {
            $sy_id = $this->schoolYearSem_model->getSy_ID(trim($_GET['sy']), trim($_GET['sem']));
            $this->template->assign('currentSemester', trim($_GET['sem']));
            $this->template->assign('currentSchool_Year', trim($_GET['sy']));
        }else{
           $sy_id = $this->schoolYearSem_model->getSy_ID($this->schoolYearSem_model->getCurSchool_Year(), $this->schoolYearSem_model->getCurSemester());  
        }        
        
        $sign_id = $this->signatorialList_model->getSignId(Session::get_AssignSignatory()); 
        //$listOfDept = $this->signatorialList_model->getListOfDept_underSignName($sign_id);
        //$listOfCourse = $this->department_model->getListOfCourses(4);
        
        $this->user_model->filterStudent($sign_id, $searchName, $page);
        
        $numOfPages = $this->user_model->getStudent_PageSize($sign_id, $searchName);
        $getListofStudent_Name = $this->getListofName($this->user_model->getFilter_Name(), $searchName, $finder);
        $getListofStudent_Username = $this->user_model->getFilter_ID();
        $getListOfStudenClearanceStatus = $this->getListofClearanceStatus($sign_id, $sy_id, $getListofStudent_Username);
        $numOfResults = count($this->user_model->getFilter_Name());
        
        
        
        
        $this->template->assign('myName_student_NameUser', $getListofStudent_Name); 
        $this->template->assign('myKey_Student_Username', $getListofStudent_Username); 
        $this->template->assign('myStudent_ClearanceStatus', $getListOfStudenClearanceStatus);
        $this->template->assign('filter', $searchName);
        $this->template->assign('signatoryDashboard_length', $numOfPages);
        $this->template->assign('clearedStatus', $getListOfStudenClearanceStatus);
        //$this->template->assign('myDept', $listOfDept);
        //$this->template->assign('myCourse', $listOfCourse);
        
        if ($numOfResults == 0) {
            $this->template->setAlert('No Results Found.', Template::ALERT_ERROR, 'alert');
        }
    }    
    
    /*----------- For Clearance Page ------------*/
    
    public function viewClearavePage($stud_id){
        $stud_name = $this->student_model->getStudent_name(trim($stud_id));
        $stud_course = $this->student_model->getStudent_course(trim($stud_id));
        $stud_dept = $this->student_model->getStudent_department(trim($stud_id));
        $stud_requirements = $this->requirementbyStudent_model->getListofRequirements($stud_id);
        $stud_status = $this->student_model->getStudent_clearance_status(trim($stud_id));
        
        $this->template->setPageName("Student Clearance Page");
        $this->template->setContent("ClearancePage.tpl");
        $this->template->assign('student_name', $stud_name);
        $this->template->assign('course_name', $stud_course);
        $this->template->assign('dept_name', $stud_dept);
        $this->template->assign('myRequirements_byStudent', $stud_requirements);
        $this->template->assign('stud_status', $stud_status);
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
