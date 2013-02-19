<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Requirements
 *
 * @author ronversa09
 */
require_once '../config/config.php';

class Requirements extends Controller{
    private $template;
    private $schoolYearSem_model;
    private $requirement_model;
    private $signatorialList_model;
    
    
    public function __construct() {
        parent::__construct();
        $this->template = new Template();
        $this->schoolYearSem_model = new SchoolYearSem_Model();
        $this->requirement_model = new Requirements_Model();
        $this->signatorialList_model = new SignatorialList_Model(); 
        
        $listOfSchoolYear = $this->schoolYearSem_model->getSchool_Year();
        $currentSemester = $this->schoolYearSem_model->getCurSemester();
        $currentSchool_Year = $this->schoolYearSem_model->getCurSchool_Year();
            
        $this->template->setPageName('Requirements Page');
        
        $this->template->set_username(Session::get_user());
        $this->template->set_surname(Session::get_Surname());
        $this->template->set_firstname(Session::get_Firstname());
        $this->template->set_middlename(Session::get_Middlename());
        $this->template->set_account_type(Session::get_Account_type() . " in Charge -");

        $this->template->setContent('RequirementsPage.tpl');
        $this->template->setCalendar('Calendar.tpl');
        $this->template->setSchool_YearSemContent('SchoolYear_Sem.tpl');
        $this->template->assign('assign_sign', ", " . Session::get_AssignSignatory());
        $this->template->assign('mySchool_Year', $listOfSchoolYear);
        $this->template->assign('currentSemester', $currentSemester);
        $this->template->assign('currentSchool_Year', $currentSchool_Year);
        
        $this->template->set_photo(Session::get_photo());
        
        $this->displayTable('', 1, "default");
    }
    
    public function deleted() {
        $this->template->setAlert('Delete an Requirement was Successfully!..', Template::ALERT_SUCCESS, 'alert');
    }

    public function delete($selected) {
        $explode = explode("-", $selected);
        
        foreach ($explode as $value) {
            $this->requirement_model->deleteRequirements($value);
        }
        $HOST = $explode[0] != null ? HOST . "/signatory/requirements.php?action=deleted" : HOST . "/signatory/bulletin.php";
        header('Location: ' . $HOST);
    }
    
    public function filter($filterName) {
        $this->displayTable(trim($filterName), 1);
    }

    public function displayTable($searchName, $page, $finder) {
        if (isset($_POST['GO'])) {
            $sy_id = $this->schoolYearSem_model->getSy_ID(trim($_POST['school_year']), trim($_POST['semester']));
            $this->template->assign('currentSemester', trim($_POST['semester']));
            $this->template->assign('currentSchool_Year', trim($_POST['school_year']));
        } else if (isset($_GET['sy']) && isset($_GET['sem'])) {
            $sy_id = $this->schoolYearSem_model->getSy_ID(trim($_GET['sy']), trim($_GET['sem']));
            $this->template->assign('currentSemester', trim($_GET['sem']));
            $this->template->assign('currentSchool_Year', trim($_GET['sy']));
        } else {
            $sy_id = $this->schoolYearSem_model->getSy_ID($this->schoolYearSem_model->getCurSchool_Year(), $this->schoolYearSem_model->getCurSemester());
        }

       
        
        $t_sign_id = $this->signatorialList_model->getSignId(Session::get_AssignSignatory());
        $this->requirement_model->filterRequirements($t_sign_id, $sy_id, $page, $searchName);
        
        //var_dump($this->requirement_model->getDescription());
        //var_dump($t_sign_id);
        $numOfPages = $this->requirement_model->getRequirement_PageSize($t_sign_id, $sy_id, $searchName);
        $getListofID = $this->requirement_model->getID();
        $getListofTitle =  $this->getListofName($this->requirement_model->getTitle(), $searchName, $finder);
        $getListofDesc = $this->requirement_model->getDescription();

        $numOfResults = count($getListofTitle);

        $this->template->assign('requirement_ID', $getListofID);
        $this->template->assign('myDesc_requirements', $this->getMaximumStrLen($getListofDesc));
        $this->template->assign('myName_requirements', $getListofTitle);
        $this->template->assign('filter', $searchName);
        $this->template->assign('requirement_length', $numOfPages);
        $this->template->assign('rowCount_requirement', $numOfResults);

        if ($numOfResults == 0) {
            $this->template->setAlert('No Results Found.', Template::ALERT_ERROR, 'alert');
        }
    }
    
     /*----------- For Adding Requirements Page ------------*/

    public function viewAdd_Requirements(){ 
        $sign_usability = Session::get_signatory_usability();
        $sign_id = $this->signatorialList_model->getSignId(Session::get_AssignSignatory());
        
        $listOfSignatory = $this->signatorialList_model->getListofSignatory($sign_usability);
        $listOfSignatoryID = $this->signatorialList_model->getListofSignatoryID($sign_usability);
        
        $listOfDepartmentsUnder =  $this->signatorialList_model->getListOfDept_underSignName($sign_id);
        $listOfDepartmentsUnderID =  $this->signatorialList_model->getListOfDept_underSignNameID($sign_id);
        
        $listOfCourse_UnderSign = $this->signatorialList_model->getListOfCourse_Sign($sign_id);
        $listOfCourse_UnderSignID = $this->signatorialList_model->getListOfCourse_SignID($sign_id);
        
        $thisSignatory = Session::get_AssignSignatory();
        
        $this->template->setPageName("Adding Requirements Page");
        $this->template->setContent("Add_Requirements.tpl"); 
        
        $this->template->assign('listOfSignatory', $listOfSignatory);
        $this->template->assign('listOfSignatoryID', $listOfSignatoryID);
        
        $this->template->assign('listOfDepartments', $listOfDepartmentsUnder);
        $this->template->assign('listOfDepartmentsID', $listOfDepartmentsUnderID);
        
        $this->template->assign('listOfCourse_UnderSign', $listOfCourse_UnderSign);
        $this->template->assign('listOfCourse_UnderSignID', $listOfCourse_UnderSignID);
        
        $this->template->assign('thisSignatory', $thisSignatory);
        
        
        
       // var_dump($school_year . " " . $semester . " " . $requirement_title . " " . 
             //   $requirement_desc . " " . $requirement_type . " " . $signatory);
        
//        var_dump($school_year . " " . $semester . " " . $requirement_title . " " . 
//                $requirement_desc . " " . $requirement_type . " " . $signatory);
//        
//        //var_dump($_POST);
//        if(isset($_POST['Next'])){
//            
//            if(trim($_POST['requirement_title']) != "" && trim($_POST['requirement_description']) != ""){
//                /// procceed to the next page
//                
//                
//                //header('Location: ../signatory/requirements.php?action=viewNext_Add_Requirements&T_title=' .trim($_POST['requirement_title']) .'&T_desc=' .trim($_POST['requirement_description']));
//                
//                
//            }else{
//                $this->template->setAlert("Cannot Procceed if a field is empty!... ", Template::ALERT_ERROR);
//            }
//        }
    }
    
    public function viewAdd_Requirements_submit(){
        
        $school_year  = $_POST['school_year'];
        $semester = $_POST['semester'];
        $sy_sem = $this->schoolYearSem_model->getSy_ID($school_year, $semester);
        
        $requirement_title = $_POST['requirement_title'];
        $requirement_desc = $_POST['requirement_description']; 
        $requirement_type = $_POST['requirement_type'];
        if ($requirement_type == "Textual")
            $signatory = "NULL" ;
        else {
            $signatory = $_POST['signatory']; 
        }
        
        $thisSignantory = $this->signatorialList_model->getSignId(Session::get_AssignSignatory());
        
        $requirement_application = $_POST['req_appliesTo']; 
        
        $department = "NULL";
        $courses = "NULL";
        $year_level = "NULL";
        $program = "NULL";
        
        switch ($requirement_application) {
            case "By Department":
                $department = $_POST['Departments'];
                break;
            case "By Course":
                $courses = $_POST['Courses'];
                break;
            case "By Year Level":
                $year_level = $_POST['Year_level'];
                break;
            case "By Program":
                $program = $_POST['Program'];
                break;
        }
        
        
        
        /*
        var_dump("sy-sem:'$sy_sem' title:'$requirement_title' desc:'$requirement_desc' type:'$requirement_type' sig:'$signatory' ".
                 "appl:'$requirement_application' department:'$department' course:'$courses' yearlevel:'$year_level' program:'$program'");
        */
        
        $this->requirement_model->addRequirement($requirement_title, $requirement_desc, $thisSignantory, $sy_sem, $requirement_application, $department, $courses, $year_level, $program, $requirement_type, $signatory);
    
        header("location:requirements.php");
        
    }
    
    /*----------- For the next page for Adding Requirements ------------*/
    
    public function viewNext_Add_Requirements($T_title, $T_desc){
        $this->template->setPageName("Adding Requirements Page");
        $this->template->setContent("Next_Add_Requirements.tpl"); 
              
        
    }
    
    /*------------ Display UI -----------------*/
    public function display() {
        $this->template->display('bootstrap.tpl');
    }
    
    public function getMaximumStrLen($strArray) {
        $temp = array();

        foreach ($strArray as $value) {
            $hold = strlen($value) > 15 ? substr($value, 0, 15) . "........ .... ." : $value;
            array_push($temp, $hold);
        }

        return $temp;
    }
}

$controller = new Requirements();
$controller->perform_actions();
$controller->display();
?>
