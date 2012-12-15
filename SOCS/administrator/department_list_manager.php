<?php

/**
 * Department_List_Manager Controller
 *
 * @author Ozy
 */
require_once '../config/config.php';

class Department_List_Manager extends Controller {

    private $template;
    private $department_model;

    public function __construct() {
        parent::__construct();
        if (Session::user_exist() && Session::get_Account_type() == "Admin") {

            $this->template = new Template();
            $this->department_model = new Department_Model();
            $this->template->setPageName('Departments');

            $this->template->set_username(Session::get_user());
            $this->template->set_surname(Session::get_Surname());
            $this->template->set_firstname(Session::get_Firstname());
            $this->template->set_middlename(Session::get_Middlename());
            $this->template->set_account_type(Session::get_Account_type());

            $this->template->setContent('department_list_manager.tpl');

            $this->displayTable('', 1, "default");
        } else {
            header('Location: ' . HOST);
        }
    }

    private function getStrongchar($str, $findname) {
        $left = substr($str, 0, strpos(strtolower($str), strtolower($findname))); //cut left
        $center = "<strong style='color: #049cdb;'><u>" . substr($str, strpos(strtolower($str), strtolower($findname)), strlen($findname)) . "</u></strong>"; // cut center
        $right = substr($str, strpos(strtolower($str), strtolower($findname)) + strlen($findname));

        return $left . $center . $right;
    }

    private function getListofDeptName($arrayTemp, $searchName, $finder) {
        $row = array();
        foreach ($arrayTemp as $value) {
            $str = $finder == "default" ? $value : $this->getStrongchar($value, $searchName);
            array_push($row, $str);
        }

        return $row;
    }
    
    public function addDepartment(){
        $this->template->setContent('addDepartment.tpl');
    }
    
    public function add_department(){
        $this->template->setContent('addDepartment.tpl');       
        if(trim($_POST['dept_name']) == "" || trim($_POST['dept_description']) == ""){       
            $this->template->setAlert("Adding Department was Failed", Template::ALERT_ERROR);
        }else{
            $this->department_model->insert(trim($_POST['dept_name']), trim($_POST['dept_description']));
            $this->template->setAlert("Adding Department was Successful", Template::ALERT_SUCCESS);
        }
    }

    public function displayCourse($deptName) {
        Session::set_deptpartName($deptName);
        header('Location: ' . HOST . "/administrator/course_list_byDepartment.php");
    }

    public function deleted() {
        $this->template->setAlert('Delete an Department Successfully!..', Template::ALERT_SUCCESS);
    }

    public function delete($selected) {
        $explode = explode("-", $selected);
        foreach ($explode as $value) {
            $this->department_model->deleteSignatory(trim($value));
        }
        $HOST = $explode[0] != null ? HOST . "/administrator/department_list_manager.php?action=deleted" : HOST . "/administrator/department_list_manager.php";
        header('Location: ' . $HOST);
    }

    public function filter($filterName) {
        $this->displayTable(trim($filterName), 1);
    }

    public function displayTable($searchName, $page, $finder) {
        $numOfPages = $this->department_model->getQueryPageSize($searchName);
        $numOfResults = count($this->department_model->filter_DeptName($searchName, $page));
        $getListofDeptName = $this->getListofDeptName($this->department_model->filter_DeptName($searchName, $page), $searchName, $finder);
        $filter_ID = $this->department_model->filter_ID($searchName, $page);

        $this->template->assign('myName_dept', $getListofDeptName);
        $this->template->assignByRef('myKey_dept', $filter_ID);
        $this->template->assign('filter', $searchName);
        $this->template->assign('dept_length', $numOfPages);
        $this->template->assign('rowCount_dept', $numOfResults);

        if ($numOfResults == 0) {
            $this->template->setAlert('No Results Found.', Template::ALERT_ERROR);
        }
    }

    public function display() {
        $this->template->display('bootstrap.tpl');
        $this->department_model->db_close();
    }

}

$controller = new Department_List_Manager();
$controller->perform_actions();
$controller->display();
?>
