<?php

/**
 * Main Index Page
 *
 * @author Ozy
 */
require_once 'config/config.php';

class Index extends Controller {

    private $template;
    private $administrator_model;
    private $school_year_model;
    private $department_model;
    private $courses_model;
    private $stud_model;

    public function __construct() {
        parent::__construct();

        $this->administrator_model = new User_Model();
        $this->school_year_model = new SchoolYearSem_Model();
        $this->department_model = new Department_Model();
        $this->courses_model = new Course_Model();
        $this->stud_model = new Student_Model();

        $this->template = new Template();
        $this->template->setPageName('Home');
        $this->template->setContent('welcome.tpl');
    }

    public function login() {
        if ($this->administrator_model->isExist(trim($_POST['username']), trim($_POST['password']))) {

            if ($this->administrator_model->getAccount_Type(trim($_POST['username']), trim($_POST['password'])) == "Admin") {

                $this->setSession('Admin');
                header('Location: ' . HOST . '/administrator/');
            } else if ($this->administrator_model->getAccount_Type(trim($_POST['username']), trim($_POST['password'])) == "Student") {

                $this->setSession('Student');
                header('Location: ' . HOST . '/student/');
            } else if ($this->administrator_model->getAccount_Type(trim($_POST['username']), trim($_POST['password'])) == "Signatory") {
                $assign_sign = $this->administrator_model->getAssignSignatory(trim($_POST['username']));
                Session::set_assignSignatory($assign_sign);
                $this->setSession('Signatory');
                header('Location: ' . HOST . '/signatory/');
            }

            exit;
        } else {
            header('Location: index.php?action=login_error');
            exit;
        }
    }

    public function logout() {
        $this->template->setContent('login.tpl');
        $this->template->setAlert('Logout Successfully!', Template::ALERT_SUCCESS);
        Session::destroy();
    }

    public function login_error() {
        $this->template->setContent('login.tpl');
        $this->template->setAlert('Error Logging in... ', Template::ALERT_ERROR);
    }

    public function student_register() {
        $this->template->setContent('login.tpl');
        $this->template->setAlert('Your registration form was succesfully save in the Database!... ', Template::ALERT_SUCCESS);

        //if (isset($_POST['Save'])) {
            $course_id = $this->courses_model->getCourseID(trim($_POST['course']));
            $this->administrator_model->insert(trim($_POST['stud_id'] . "-" . $_POST['number']), md5(trim($_POST['password'])), trim($_POST['surname']), trim($_POST['firstname']), trim($_POST['middleName']), NULL, 'Student', NULL);
            $this->stud_model->insert(trim($_POST['stud_id'] . "-" . $_POST['number']), trim($_POST['gender']), trim($_POST['year_level']), trim($_POST['program']), trim($_POST['section']), $course_id);
        //}


        /*
          echo "ID Number: " .$_POST['stud_id'] ."-" .$_POST['number'] ."<br/>";
          echo "Password: " .$_POST['password'] ."<br/>";
          echo "Confirm Password: " .$_POST['confirmpass'] ."<br/>";
          echo "Surname: " .$_POST['surname'] ."<br/>";
          echo "Firstname: " .$_POST['firstname'] ."<br/>";
          echo "Middlename: " .$_POST['middleName'] ."<br/>";
          echo "Section: " .$_POST['section'] ."<br/>";
          echo "Gender: " .$_POST['gender'] ."<br/>";
          echo "Year Level: " .$_POST['year_level'] ."<br/>";
          echo "Program: " .$_POST['program'] ."<br/>";
          echo "Department: " .$_POST['dept'] ."<br/>";
          echo "Course: " .$_POST['course'] ."<br/>";
         */
    }

    public function student_registrationForm() {
        $this->template->setPageName("Student Registration Form");
        $this->template->setContent("student_registration.tpl");

        $listOfYear = $this->school_year_model->getListOfYear();
        $listOfDept_Name = $this->department_model->getListOfDepartments();
        $listOfDept_ID = $this->department_model->getListOfDept_ID();
        $ListDept_ID_inCourse = $this->courses_model->getListDept_ID_inCourse();
        $listOfCourses = $this->courses_model->getListOfCourses();

        $this->template->assign('years', $listOfYear);
        $this->template->assign('depts', $listOfDept_Name);
        $this->template->assign('dept_ID', $listOfDept_ID);
        $this->template->assign('dept_id_inCourses', $ListDept_ID_inCourse);
        $this->template->assign('course_underDept', $listOfCourses);


        if (isset($_POST['Save'])) {
            echo "wwww";
            //$this->template->setAlert("Asuudawe");
//            echo "ID Number: " .$_POST['stud_id'] ."-" .$_POST['number'] ."<br/>";
//            echo "Password: " .$_POST['password'] ."<br/>";
//            echo "Confirm Password: " .$_POST['confirmpass'] ."<br/>";
//            echo "Surname: " .$_POST['surname'] ."<br/>";
//            echo "Firstname: " .$_POST['firstname'] ."<br/>";
//            echo "Middlename: " .$_POST['middleName'] ."<br/>";
//            echo "Section: " .$_POST['section'] ."<br/>";
//            echo "Gender: " .$_POST['gender'] ."<br/>";
//            echo "Year Level: " .$_POST['year_level'] ."<br/>";
//            echo "Program: " .$_POST['program'] ."<br/>";
//            echo "Department: " .$_POST['dept'] ."<br/>";
//            echo "Course: " .$_POST['course'] ."<br/>";
        }
    }

    private function setSession($account_type) {
        Session::set_user($_POST['username'], $_POST['password']);

        $result = mysql_fetch_array($this->administrator_model->getUser(trim($_POST['username']), trim($_POST['password'])));

        Session::set_surname($result['Surname']);
        Session::set_firstname($result['First_Name']);
        Session::set_middlename($result['Middle_Name']);

        Session::set_Account_type($account_type);
    }

    public function display() {

        if (Session::user_exist()) {
            if (Session::get_Account_type() == 'Admin')
                header('Location: ' . HOST . '/administrator/');
            elseif (Session::get_Account_type() == 'Signatory')
                header('Location: ' . HOST . '/signatory/');
            elseif (Session::get_Account_type() == 'Student')
                header('Location: ' . HOST . '/student/');
        }else {
            $this->template->display('bootstrap.tpl');
        }

        $this->administrator_model->db_close();
    }

}

$controller = new Index();
$controller->perform_actions();
$controller->display();
?>
