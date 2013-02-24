<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of course_list_byDepartment
 *
 * @author ronversa09
 */

require_once '../config/config.php';

class course_list_byDepartment extends Controller {
    private $template;
    private $course_model;
    private $department_model;
    
    public function __construct() {
        parent::__construct();
        if (Session::user_exist() && Session::get_Account_type() == "Admin") {
        
            $this->template = new Template();
            $this->course_model = new Course_Model();
            $this->department_model = new Department_Model();
            $this->template->setPageName('Courses');

            $this->template->set_username(Session::get_user());
            $this->template->set_surname(Session::get_Surname());
            $this->template->set_firstname(Session::get_Firstname());
            $this->template->set_middlename(Session::get_Middlename());
            $this->template->set_account_type(Session::get_Account_type());
            $this->template->assign('Dept_name', Session::get_DepartmentName());
            $this->template->assign('Dept_desc', $this->department_model->getDescription(Session::get_DepartmentName()));
            $this->template->set_photo(Session::get_photo());

            $this->template->setContent('course_list_byDepartment.tpl');
            $this->template->setCalendar('Calendar.tpl');
            $this->template->assign('assign_sign', '');
            
            $filename = "../Excel_File/student_current_enroll.xls";
            if (file_exists($filename)){ $this->template->assign('excel_file', 'true'); }

            $this->displayTable('', 1, "default");
            
            if(isset($_GET['successEdit'])){
                if($_GET['successEdit'] == 'true'){
                    $this->template->setAlert("Updating Course was Successful", Template::ALERT_SUCCESS, 'alert');
                }
            }
            
            if(isset($_GET['successAdd'])){
                if($_GET['successAdd'] == 'true'){
                    $this->template->setAlert("Adding Course was Successful", Template::ALERT_SUCCESS, 'alert');
                }
            }
            
        }else{
            header('Location: ' . HOST);
        }
    }                 
    
    public function addCourse(){
        $this->template->setContent('addCourse.tpl');
    }
    
    public function add_course(){
        $this->template->setContent('addCourse.tpl');    
        $dept_ID = $this->course_model->getDept_ID(Session::get_DepartmentName());
        
        if(trim($_POST['course_name']) == "" || trim($_POST['course_description']) == ""){       
            $this->template->setAlert("Adding Course was Failed", Template::ALERT_ERROR, 'alert');
        }else if($this->course_model->isExist(trim($_POST['course_name']), trim($_POST['course_description']))){
            $this->template->setAlert("Cannot Add a Course that is Existing", Template::ALERT_ERROR, 'alert');
        }else{ 
            $this->course_model->insert(trim($_POST['course_name']), trim($_POST['course_description']), $_POST['course_usability'], $dept_ID);
            //$this->template->setAlert("Adding Course was Successful", Template::ALERT_SUCCESS, 'alert');
            
            header('Location: course_list_byDepartment.php?successAdd=true');
        }
    }
        
    public function editCourse($seleted){
        $this->course_model->getCourse_Info($seleted);
        
//        $course_name = $this->course_model->getCourse_Name($seleted);
//        $course_desc = $this->course_model->getCourse_Desc($seleted);

        $this->template->setContent("editCourse.tpl");
        $this->template->assign("editCourse_Name", $this->course_model->getCourse_Name());
        $this->template->assign("editCourse_Desc", $this->course_model->getCourse_Desc());
        $this->template->assign('editCourse_Usability', $this->course_model->getCourse_Usability());
        
        if(isset($_POST['editSave'])){
            if(trim($_POST['course_name']) == "" || trim($_POST['course_description']) == ""){       
                $this->template->setAlert("Updating Course was Failed", Template::ALERT_ERROR, 'alert');
            }/*else if($this->course_model->isExist(trim($_POST['course_name']), trim($_POST['course_description']))){
                $this->template->setAlert("Cannot Update a Course that is Existing", Template::ALERT_ERROR, 'alert');
            }*/else{
                $this->course_model->update($seleted, trim($_POST['course_name']), trim($_POST['course_description']), $_POST['course_usability']);
                //$this->template->setAlert("Updating Course was Successful", Template::ALERT_SUCCESS, 'alert');
                $this->template->assign("editCourse_Name", trim($_POST['course_name']));
                $this->template->assign("editCourse_Desc", trim($_POST['course_description']));
                $this->template->assign('editCourse_Usability', $_POST['course_usability']);
                
                header('Location: course_list_byDepartment.php?successEdit=true');
            }
        }
        
    }
    
    
    
    public function deleted(){
        $this->template->setAlert('Delete an Department Successfully!..', Template::ALERT_SUCCESS, 'alert');
    }
    
    public function delete($selected) {
        $explode = explode("-", $selected);
        foreach ($explode as $value) {
            $this->course_model->deleteCourse(trim($value));
        }
        $HOST = $explode[0] != null ? HOST ."/administrator/course_list_byDepartment.php?action=deleted" : HOST ."/administrator/course_list_byDepartment.php";
        header('Location: ' .$HOST);
    }
    
    public function filter($filterName){
        $this->displayTable(trim($filterName), 1);
    }   
    
    public function displayTable($searchName, $page, $finder){
        $this->course_model->filter(Session::get_DepartmentName(), $searchName, $page);
        
        $numOfPages = $this->course_model->getQueryPageSize(Session::get_DepartmentName(), $searchName);
        $numOfResults = count($this->course_model->getFilter_Name());
        $getListofDeptName = $this->getListofName($this->course_model->getFilter_Name(), $searchName, $finder);
        $filter_ID = $this->course_model->getFilter_ID();
        $filter_Desc = $this->parsingNewLine_Decs($this->course_model->getFilter_Desc());
        $filter_Usability = $this->course_model->getFilter_Usabililty();
        
        $this->template->assign('myName_course', $getListofDeptName); 
        $this->template->assignByRef('myKey_course', $filter_ID);
        $this->template->assign('filter', $searchName);
        $this->template->assign('course_length', $numOfPages);
        $this->template->assign('rowCount_course', $numOfResults);
        $this->template->assign('desc_course', $filter_Desc);
        $this->template->assign('usability_course', $filter_Usability);
        
        if ($numOfResults == 0) {
            $this->template->setAlert('No Results Found.', Template::ALERT_ERROR, 'alert');
        }
    }
    
    public function display() {
        $this->template->display('bootstrap.tpl');
        $this->course_model->db_close();
    }    
}

$controller = new course_list_byDepartment();
$controller->perform_actions();
$controller->display();

?>
