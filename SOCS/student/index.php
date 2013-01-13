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

    public function __construct() {
        parent::__construct();

        if (Session::user_exist() && Session::get_Account_type() == "Student") {
            $this->template = new Template();
            $this->schoolYearSem_model = new SchoolYearSem();
            $this->student_model = new Student_Model();
            $this->signatoialList = new SignatorialList_Model();
            
            $listOfSchoolYear = $this->schoolYearSem_model->getSchool_Year();
            $stud_course = $this->student_model->getStudent_course(Session::get_user());
            $stud_deptName = $this->student_model->getStudent_department(Session::get_user());
            $stud_deptID = $this->student_model->getStudent_deptID(Session::get_user());
            
            
            $listOfSign_underDeptName = $this->signatoialList->getListofSignatoryByDept($stud_deptID);
            $listOfSignID_underDeptName = $this->signatoialList->getListofSignatory_ID_ByDept($stud_deptID);
            
            
            $this->template->setPageName('Signatory Page');
            $this->template->setContent('StudentDashboard.tpl');

            $this->template->set_username(Session::get_user());
            $this->template->set_surname(Session::get_Surname());
            $this->template->set_firstname(Session::get_Firstname());
            $this->template->set_middlename(Session::get_Middlename());
            $this->template->set_account_type($stud_course);
                       
            $this->template->assign('mySchool_Year', $listOfSchoolYear);
            $this->template->assign('assign_sign', ", " .$stud_deptName);
            $this->template->assign('myListOfSign_underDeptName', $listOfSign_underDeptName);
            $this->template->assign('myKey_signID', $listOfSignID_underDeptName);
        } else {
            header('Location: /SOCS/index.php');
        }
    }
    
    /*----------- for viewing the post of signatory -----------*/
    
    public function viewMessages($Tsign_ID){
        $this->template->setPageName("Messages for a Signatory In Charge");
        $this->template->setContent("Messages.tpl");
    }

    public function display() {
        //displaying the UI
        $this->template->display('bootstrap.tpl');
    }

}

$controller = new Index();
$controller->perform_actions();
$controller->display();
?>
