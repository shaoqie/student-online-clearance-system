<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Messages
 *
 * @author ronversa09
 */
require_once '../config/config.php';

class Messages extends Controller {
    private $template;
    private $schoolYearSem_model;
    private $student_model;
    private $message_model;
    
    public function __construct() {
        parent::__construct();
        
        if (Session::user_exist() && Session::get_Account_type() == "Signatory") {
            $this->schoolYearSem_model = new SchoolYearSem();
            $this->template = new Template();
            
            $this->template->setPageName('Messages Page');

            $this->template->set_username(Session::get_user());
            $this->template->set_surname(Session::get_Surname());
            $this->template->set_firstname(Session::get_Firstname());
            $this->template->set_middlename(Session::get_Middlename());
            $this->template->set_account_type(Session::get_Account_type() ." in Charge -");
            
            $listOfSchoolYear = $this->schoolYearSem_model->getSchool_Year();
            
            $this->template->setContent('MessagePage.tpl');
            $this->template->assign('assign_sign', ", " .Session::get_AssignSignatory());
            $this->template->assign('mySchool_Year', $listOfSchoolYear);
            
            
//            $stud_name = $this->student_model->getStudent_name(trim($stud_id));
//            $stud_course = $this->student_model->getStudent_course(trim($stud_id));
//            $stud_dept = $this->student_model->getStudent_department(trim($stud_id));
        }else{
            header('Location: /SOCS/');
        }
    }
    
    public function viewLatestMessage(){
        
    }
    
    public function display() {
        $this->template->display('bootstrap.tpl');
    }
}

$controller = new Messages();
$controller->perform_actions();
$controller->display();
?>
