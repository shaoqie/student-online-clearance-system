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
    
    public function __construct() {
        parent::__construct();
        if (Session::user_exist() && Session::get_Account_type() == "Admin") {
        
            $this->template = new Template();
            $this->course_model = new Course_Model();
            $this->template->setPageName('Courses');

            $this->template->set_username(Session::get_user());
            $this->template->set_surname(Session::get_Surname());
            $this->template->set_firstname(Session::get_Firstname());
            $this->template->set_middlename(Session::get_Middlename());
            $this->template->set_account_type(Session::get_Account_type());
            $this->template->assign('Dept_name', Session::get_DepartmentName());

            $this->template->setContent('course_list_byDepartment.tpl');
            $this->template->assign('assign_sign', '');

            $this->displayTable('', 1, "default");
        }else{
            header('Location: ' . HOST);
        }
    }               
    
    private function getStrongchar($str, $findname){
        $left = substr($str, 0, strpos(strtolower($str), strtolower($findname))); //cut left
	$center = "<strong style='color: #049cdb;'><u>" .substr($str, strpos(strtolower($str), strtolower($findname)), strlen($findname)) ."</u></strong>"; // cut center
	$right =  substr($str, strpos(strtolower($str), strtolower($findname)) + strlen($findname));		
		
	return $left .$center .$right;
    }
    
    private function getListofCourseName($arrayTemp, $searchName, $finder){
        $row = array();
        foreach ($arrayTemp as $value) {
            $str = $finder == "default" ? $value : $this->getStrongchar($value, $searchName);
            array_push($row, $str);
        }
        
        return $row;
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
            $this->course_model->insert(trim($_POST['course_name']), trim($_POST['course_description']), $dept_ID);
            $this->template->setAlert("Adding Course was Successful", Template::ALERT_SUCCESS, 'alert');
        }
    }
        
    public function editCourse($seleted){
        $course_name = $this->course_model->getCourse_Name($seleted);
        $course_desc = $this->course_model->getCourse_Desc($seleted);

        $this->template->setContent("editCourse.tpl");
        $this->template->assign("editCourse_Name", $course_name);
        $this->template->assign("editCourse_Desc", $course_desc);
        
        if(isset($_POST['editSave'])){
            if(trim($_POST['course_name']) == "" || trim($_POST['course_description']) == ""){       
                $this->template->setAlert("Updating Course was Failed", Template::ALERT_ERROR, 'alert');
            }else if($this->course_model->isExist(trim($_POST['course_name']), trim($_POST['course_description']))){
                $this->template->setAlert("Cannot Update a Course that is Existing", Template::ALERT_ERROR, 'alert');
            }else{
                $this->course_model->update($seleted, trim($_POST['course_name']), trim($_POST['course_description']));
                $this->template->setAlert("Updating Course was Successful", Template::ALERT_SUCCESS, 'alert');
                $this->template->assign("editCourse_Name", trim($_POST['course_name']));
                $this->template->assign("editCourse_Desc", trim($_POST['course_description']));
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
        $numOfPages = $this->course_model->getQueryPageSize(Session::get_DepartmentName(), $searchName);
        $numOfResults = count($this->course_model->filter_CourseName(Session::get_DepartmentName(), $searchName, $page));
        $getListofDeptName = $this->getListofCourseName($this->course_model->filter_CourseName(Session::get_DepartmentName(), $searchName, $page), $searchName, $finder);
        $filter_ID = $this->course_model->filter_ID(Session::get_DepartmentName(), $searchName, $page);
        
        $this->template->assign('myName_course', $getListofDeptName); 
        $this->template->assignByRef('myKey_course', $filter_ID);
        $this->template->assign('filter', $searchName);
        $this->template->assign('course_length', $numOfPages);
        $this->template->assign('rowCount_course', $numOfResults);
        
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
