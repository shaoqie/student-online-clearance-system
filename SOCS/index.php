<?php

/**
 * Main Index Page
 *
 * @author Ozy
 */
require_once 'config/config.php';
require_once 'libs/phpmailer/sendmail.php';

class Index extends Controller {

    private $template;
    private $administrator_model;
    private $school_year_model;
    private $department_model;
    private $courses_model;
    private $stud_model;
    private $signatoriallist_model;

    public function __construct() {
        parent::__construct();

        $this->administrator_model = new User_Model();
        $this->school_year_model = new SchoolYearSem_Model();
        $this->department_model = new Department_Model();
        $this->courses_model = new Course_Model();
        $this->stud_model = new Student_Model();
        $this->signatoriallist_model = new SignatorialList_Model();

        $this->template = new Template();
        $this->template->setPageName('Home');
        $this->template->setContent('welcome.tpl');
    }

    public function login() {
        if ($this->administrator_model->isExist(trim($_POST['username']), (trim($_POST['password'])))) {
            $this->administrator_model->queryUser_Type(trim($_POST['username']), (trim($_POST['password'])));
            
            if ($this->administrator_model->Account_Type == "Admin") {

                Session::set_user($_POST['username'], trim($_POST['password']));
                $this->setSession('Admin');
                header('Location: ' . HOST . '/administrator/');
            } else if ($this->administrator_model->Account_Type == "Student" && $this->administrator_model->validation_status == "Confirmed") {

                Session::set_user($_POST['username'], $_POST['password']);
                $this->setSession('Student');
                header('Location: ' . HOST . '/student/');
            } else if ($this->administrator_model->Account_Type == "Signatory" && $this->administrator_model->validation_status == "Confirmed") {
                $assign_sign = $this->administrator_model->getAssignSignatory(trim($_POST['username']));
                Session::set_user($_POST['username'], $_POST['password']);
                Session::set_assignSignatory($assign_sign);
                $this->setSession('Signatory');
                header('Location: ' . HOST . '/signatory/');
            }else{
                header('Location: index.php?action=login_error');
                exit;
            }
        } else {
            header('Location: index.php?action=login_error');
            exit;
        }
    }

    public function ForgotPass(){
        $this->administrator_model->getUserPassword($_POST['ForgotPass']);
        sendForgotPassword($this->administrator_model->First_Name, $this->administrator_model->email_add, $this->administrator_model->Password);
        //var_dump($_POST['ForgotPass']);
        $this->template->setAlert('Your password was sent to your email address!', Template::ALERT_SUCCESS);
        //var_dump($_POST['ForgotPass']);
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
        if (isset($_POST['Save'])) {
            $hash = crypt(($_POST['stud_id'] . "-" . $_POST['number'] .$_POST['emailAdd']), 'wrawehydrufmjhyaswtgf');
            $course_id = $this->courses_model->getCourseID(trim($_POST['course']));
            
            $this->administrator_model->insertStudent(($_POST['stud_id'] . "-" . $_POST['number']), (($_POST['password'])), trim($_POST['surname']), trim($_POST['firstname']), trim($_POST['middleName']), $_POST['emailAdd'], $hash);
            
            //$this->administrator_model->insertStudent(($_POST['stud_id'] . "-" . $_POST['number']), (($_POST['password'])), trim($_POST['surname']), trim($_POST['firstname']), trim($_POST['middleName']), NULL, 'Student', NULL);
            $this->stud_model->insert(($_POST['stud_id'] . "-" . $_POST['number']), ($_POST['gender']), ($_POST['year_level']), ($_POST['program']), ($_POST['section']), $course_id);

            
            $verificationLink = HOST ."/index.php?action=verify&username=" .($_POST['stud_id'] . "-" . $_POST['number']) ."&hash=" .$hash;
            
            //var_dump($_POST['emailAdd']);
            
            
            if(!sendMail(trim($_POST['firstname']), $_POST['emailAdd'], $verificationLink)){
                //echo "wwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww";
            }else{
                //echo "wwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww2222222222222222222";
            }
            $this->template->setContent('login.tpl');
            $this->template->setAlert('Please confirm your registration by clicking the link sent in your email!... ', Template::ALERT_SUCCESS);
        }

        /*

          echo "ID Number: " .$_POST['stud_id'] ."-" .$_POST['number'] ."<br/>";
          echo "Password: " .trim($_POST['password']) ."<br/>";
          echo "Confirm Password: " .trim($_POST['confirmpass']) ."<br/>";
          echo "Surname: " .trim($_POST['surname']) ."<br/>";
          echo "Firstname: " .trim($_POST['firstname']) ."<br/>";
          echo "Middlename: " .trim($_POST['middleName']) ."<br/>";
          echo "Section: " .$_POST['section'] ."<br/>";
          echo "Gender: " .$_POST['gender'] ."<br/>";
          echo "Year Level: " .$_POST['year_level'] ."<br/>";
          echo "Program: " .$_POST['program'] ."<br/>";
          echo "Department: " .$_POST['dept'] ."<br/>";
          echo "Course: " .$_POST['course'] ."<br/>";
         */
    }

    public function verify($username, $hash){
        $this->administrator_model->verifyStudent($username, $hash);
        $this->template->setAlert('Your Account was Successfully verified!... ', Template::ALERT_SUCCESS);
    }
    
    public function signatory_register() {
        if (isset($_POST['Save'])) {
            $sign_id = $this->signatoriallist_model->getSignId($_POST['sign_name']);
            $this->administrator_model->insertSignatory_User(trim($_POST['uname']), trim($_POST['confirmpass']), trim($_POST['surname']), trim($_POST['firstname']), trim($_POST['middleName']), NULL, 'Signatory', $sign_id);
            
//          echo "Password: " .trim($_POST['uname']) ."<br/>";
//          echo "Confirm Password: " .trim($_POST['newpass']) ."<br/>";
//          echo "Confirm Password: " .trim($_POST['confirmpass']) ."<br/>";
//          echo "Surname: " .trim($_POST['surname']) ."<br/>";
//          echo "Firstname: " .trim($_POST['firstname']) ."<br/>";
//          echo "Middlename: " .trim($_POST['middleName']) ."<br/>";
//          echo "Section: " .$_POST['sign_name'] ."<br/>";
          
            
            
            $this->template->setContent('login.tpl');
            $this->template->setAlert('Your registration form was succesfully save. See the Admin to confirmed your account!... ', Template::ALERT_SUCCESS);
        }
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
    }

    public function signatory_registrationForm() {
        $this->template->setPageName("Signatory Registration Form");
        $this->template->setContent("signatory_registration.tpl");

        $listOfsignatory = $this->signatoriallist_model->getListofSignatory();

        $this->template->assign('signatories', $listOfsignatory);
    }

    private function setSession($account_type) {
        $result = mysql_fetch_array($this->administrator_model->getUser(trim($_POST['username']), trim($_POST['password'])));

        Session::set_surname($result['Surname']);
        Session::set_firstname($result['First_Name']);
        Session::set_middlename($result['Middle_Name']);
        
        Session::set_photo($result['Picture']);

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
