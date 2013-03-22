<?php

/**
 * Student's Index Page
 *
 * @author Ozy
 */
require_once '../config/config.php';

class Index extends Controller {

    private $template;
    private $schoolYearSem_model;
    private $student_model;
    private $signatoialList;
    private $signatory_model;
    private $bulletin_model;
    private $clearanceStatus_model;
    private $department_model;
    private $courses_model;

    public function __construct() {
        parent::__construct();

        if (Session::user_exist() && Session::get_Account_type() == "Student") {
            $this->template = new Template();
            $this->schoolYearSem_model = new SchoolYearSem_Model();
            $this->student_model = new Student_Model();
            $this->signatoialList = new SignatorialList_Model();
            $this->signatory_model = new Signatory_Model();
            $this->bulletin_model = new Bulletin_Model();
            $this->clearanceStatus_model = new ClearanceStatus();
            $this->department_model = new Department_Model();
            $this->courses_model = new Course_Model();

            $listOfSchoolYear = $this->schoolYearSem_model->getSchool_Year();
            $currentSemester = $this->schoolYearSem_model->getCurSemester();
            $currentSchool_Year = $this->schoolYearSem_model->getCurSchool_Year();
            
            $this->template->assign('most_current_sem', $currentSemester);
            $this->template->assign('most_current_sy', $currentSchool_Year);
            
            Session::setSchoolYear($currentSchool_Year);
            Session::setSemester($currentSemester);
            
            if (isset($_POST['GO'])) {
                $sy_id = $this->schoolYearSem_model->getSy_ID(trim($_POST['school_year']), trim($_POST['semester']));
                $this->template->assign('currentSemester', trim($_POST['semester']));
                $this->template->assign('currentSchool_Year', trim($_POST['school_year']));
            } else {
                $sy_id = $this->schoolYearSem_model->getSy_ID($currentSchool_Year, $currentSemester);
                $this->template->assign('currentSemester', $currentSemester);
                $this->template->assign('currentSchool_Year', $currentSchool_Year);
            }
            
            $this->student_model->queryStudent_Info(Session::get_user());
            
            $stud_course = $this->student_model->getStud_Course();
            $stud_deptName = $this->student_model->getStud_DeptName();
            $stud_deptID = $this->student_model->getStud_DeptID();
            $stud_status = $this->student_model->getStud_Status();
            $stud_sy_sem = $this->student_model->get_last_attended_sy_sem();
            
            $sy_attended = $this->schoolYearSem_model->getSchool_Year_by_id($stud_sy_sem);
            $sem_attended = $this->schoolYearSem_model->getSem_by_id($stud_sy_sem);
            
            Session::setSY_SEM_ID($sy_id);
            
            $this->template->assign('sy_attended', $sy_attended);
            $this->template->assign('sem_attended', $sem_attended);

            $this->signatoialList->getListofSignatoryByDept($stud_deptID, $stud_status);
            $listOfSign_underDeptName = $this->signatoialList->getSign_Name();
            $listOfSignID_underDeptName = $this->signatoialList->getSign_ID();
            $listOfClearanceStatus = $this->getListofClearanceStatus($listOfSignID_underDeptName, $sy_id, Session::get_user());
            
            $this->template->setPageName('Student Clearance Page');
            $this->template->setContent('StudentDashboard.tpl');
            $this->template->setSchool_YearSemContent('SchoolYear_Sem.tpl');


            $this->template->set_username(Session::get_user());
            $this->template->set_surname(Session::get_Surname());
            $this->template->set_firstname(Session::get_Firstname());
            $this->template->set_middlename(Session::get_Middlename());
            $this->template->set_account_type($stud_course);

            $this->template->assign('mySchool_Year', $listOfSchoolYear);
            $this->template->assign('assign_sign', ", " . $stud_deptName);
            $this->template->assign('myListOfSign_underDeptName', $listOfSign_underDeptName);
            $this->template->assign('myKey_signID', $listOfSignID_underDeptName);          
            $this->template->assign('myStudent_ClearanceStatus', $listOfClearanceStatus);
            $this->template->assign('sy_sem_id', $sy_id);
            
            
            $stud_status = $stud_status == "Graduate" ? "Grad" : "U_Grad";
            $this->template->assign('status', $stud_status);
            
            $this->template->set_photo(Session::get_photo());
            
            if(isset($_GET['editSuccess'])){
                $this->template->setAlert("Account has successfully updated!!... ", Template::ALERT_SUCCESS);
            }
            
        } else {
            header('Location: /SOCS/index.php');
        }
    }
    
    /*==================== Student Clearance Status ===========================*/
    private function getListofClearanceStatus($signID_array, $sysemID, $username){
        $row = array();
        foreach ($signID_array as $signID){
            $status = $this->clearanceStatus_model->getOverallSignatoryClearanceStatus($username, $signID, $sysemID);
            array_push($row, $status);
        }
        return $row;
    }
    
    /* ----------- for viewing the post of signatory ----------- */

    public function viewMessages($Tsign_ID, $page, $sysem) {
        $this->template->setPageName("Messages for a Signatory In Charge");
        $this->template->setContent("Messages.tpl");

        if ($sysem == "") {
            $sy_id = $this->schoolYearSem_model->getSy_ID($this->schoolYearSem_model->getCurSchool_Year(), $this->schoolYearSem_model->getCurSemester());
        } else {
            $str = explode('@', $sysem);
            $temp_sy = $str[0];
            $temp_sem = $str[1];
            $sy_id = $this->schoolYearSem_model->getSy_ID($temp_sy, $temp_sem);
            $this->template->assign('currentSemester', $temp_sem);
            $this->template->assign('currentSchool_Year', $temp_sy);
        }


       

        $this->signatory_model->getSign_Info($Tsign_ID);
        $signName = $this->signatory_model->getSign_Name();
        
        $this->bulletin_model->filter($Tsign_ID, $sy_id, $page);
        
        $list_messages = $this->bulletin_model->getMessages();
        $list_datePosted = $this->bulletin_model->getPostDate();
        $list_timePosted = $this->bulletin_model->getPostTime();
        $numRows = $this->bulletin_model->getMessage_PageSize($Tsign_ID, $sy_id);


        $this->template->assign('sign_name', $signName);
        $this->template->assign('sign_id', $Tsign_ID);
        $this->template->assign('my_messages', $list_messages);
        $this->template->assign('_date', $list_datePosted);
        $this->template->assign('_time', $list_timePosted);
        $this->template->assign('stud_message_length', $numRows);

        //$this->template->assign('stud_message_length', count($list_timePosted));
    }
    
    /* -------------- View Requirements Page ---------------- */
    public function viewRequirements($Tsign_ID, $page, $sysem) {
        $this->template->setPageName("Clearance Requirements");
        $this->template->setContent("Requirements.tpl");
        
        if ($sysem == "") {
            $sy_id = $this->schoolYearSem_model->getSy_ID($this->schoolYearSem_model->getCurSchool_Year(), $this->schoolYearSem_model->getCurSemester());
        } else {
            $str = explode('@', $sysem);
            $temp_sy = $str[0];
            $temp_sem = $str[1];
            $sy_id = $this->schoolYearSem_model->getSy_ID($temp_sy, $temp_sem);
            $this->template->assign('currentSemester', $temp_sem);
            $this->template->assign('currentSchool_Year', $temp_sy);
        }
        
        $this->signatory_model->getSign_Info($Tsign_ID);
        $signName = $this->signatory_model->getSign_Name();
        
        $this->template->assign('sign_name', $signName);
        
        $result = $this->clearanceStatus_model->getRequirementList(Session::get_user(), $Tsign_ID, $sy_id);
        //var_dump($result);
        
        $this->template->assign('n_count', count($result));
        $this->template->assign('clearanceList', $result);
        $this->template->assign('sign_id', $Tsign_ID);
    }
    
    public function advance_settings(){
        $this->template->setPageName("Advance Settings for Student");
        $this->template->setContent("advance_settings.tpl");
        $listOfDept_Name = $this->department_model->getListOfDepartments();
        $listOfDept_ID = $this->department_model->getListOfDept_ID();
        $ListDept_ID_inCourse = $this->courses_model->getListDept_ID_inCourse();
        
        $this->student_model->queryStudent_Info(Session::get_user());
        $this->template->assign('year_level', $this->student_model->getStud_Yearlevel());
        $this->template->assign('gender', $this->student_model->getStud_Gender());
        $this->template->assign('program', $this->student_model->getStud_Program());
        $this->template->assign('status', $this->student_model->getStud_Status());
        $this->template->assign('stud_course', $this->student_model->getStud_Course());
        $this->template->assign('section', $this->student_model->getStud_Section());
        $this->template->assign('stud_dept', $this->student_model->getStud_DeptName());
        
        $this->template->assign('depts', $listOfDept_Name);
        $this->template->assign('dept_ID', $listOfDept_ID);
        $this->template->assign('dept_id_inCourses', $ListDept_ID_inCourse);
        
        if(isset($_POST['Save'])){
            $course_id = $this->courses_model->getCourseID($_POST['course']);
            $this->student_model->advance_update(Session::get_user(), $_POST['gender'], $_POST['year_level'], $_POST['program'], trim($_POST['section']), $course_id, $_POST['Status']);
            header('Location: /SOCS/student/index.php?editSuccess=true');
        }
    }

    public function display() {
        //displaying the UI
        $this->template->display('bootstrap.tpl');
    }

    /* ---------- for Date into word ---------------- */

    public function getDate($T_Date) {
        $t_month;
        $t_day;
        $t_year;
        $_Date = array();

        foreach ($T_Date as $value) {
            $temp_date = explode("-", $value);
            $t_year = trim($temp_date[0]);
            $t_month = trim($this->convertMonth(trim($temp_date[1])));
            $t_day = trim($temp_date[2]);

            array_push($_Date, $t_month . " " . $t_day . ", " . $t_year);
        }

        return $_Date;
    }

    public function convertMonth($month) {
        $_month = array("January", "Febuary", "March", "April",
            "May", "June", "July", "August",
            "September", "October", "November", "December");

        return $_month[$month - 1];
    }
    
    public function renew_student(){
        $this->student_model->updateSY_SEM_ID(Session::getSY_SEM_ID(), Session::get_user());
        header("Location: " . HOST . "/student/index.php");
    }

}

$controller = new Index();
$controller->perform_actions();
$controller->display();
?>
