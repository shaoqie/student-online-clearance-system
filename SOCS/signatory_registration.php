<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of signatory_registration
 *
 * @author Manipis
 */
require_once 'config/config.php';

class Signatory_Registration extends Controller {

    private $template;
    private $school_year_model;
    private $department_model;
    private $courses_model;
    private $admin;
    private $signatoriallist_model;
    private $local_dir;

    public function __construct() {
        parent::__construct();

        $this->school_year_model = new SchoolYearSem_Model();
        $this->department_model = new Department_Model();
        $this->courses_model = new Course_Model();
        $this->admin = new User_Model();
        $this->signatoriallist_model = new SignatorialList_Model();

        $this->template = new Template();
        $this->template->setPageName("Student Registration");
        $this->template->setContent("signatory_registration.tpl");

        $listOfYear = $this->school_year_model->getListOfYear();
        $listOfDept_Name = $this->department_model->getListOfDepartments();
        $listOfDept_ID = $this->department_model->getListOfDept_ID();
        $ListDept_ID_inCourse = $this->courses_model->getListDept_ID_inCourse();
        $listOfCourses = $this->courses_model->getListOfCourses();
        $listOfsignatory = $this->signatoriallist_model->getListofSignatory();
        $listOfKeysFromSignatories = $this->signatoriallist_model->getKeyListofSignatory();

        $this->template->assign('signatories', $listOfsignatory);
        $this->template->assign('signatory_keys', $listOfKeysFromSignatories);
        $this->template->assign('years', $listOfYear);
        $this->template->assign('depts', $listOfDept_Name);
        $this->template->assign('dept_ID', $listOfDept_ID);
        $this->template->assign('dept_id_inCourses', $ListDept_ID_inCourse);
        $this->template->assign('course_underDept', $listOfCourses);
    }

    public function register() {

        if (isset($_POST["Register"])) {
            $username = $_POST["uname"];
            $newpass = $_POST["newpass"];
            $confirmpass = $_POST["confirmpass"];
            $surname = $_POST["surname"];
            $firstname = $_POST["firstname"];
            $middleName = $_POST["middleName"];
            $imagefile = $_FILES["photo"];

            $test = 0;

            //Check if fields are empty in firstname surname and middlename
            if ($surname != "" && $firstname != "" && $middleName != "" && $username != "") {
                $this->admin->Surname = $surname;
                $this->admin->First_Name = $firstname;
                $this->admin->Middle_Name = $middleName;
                $this->admin->Username = $username;

                $test++;
            } else {
                $this->template->setAlert('Surname, first name and middle name are required!', Template::ALERT_ERROR, 'alert');
                return;
            }

            //checks uername is valid
            if (Validator::is_valid_username($username) && $test == 1) {
                $test++;
            } else {
                $this->template->setAlert('Username must not have characters / \ ? < > : ; " spaces and *', Template::ALERT_ERROR, 'alert');
                return;
            }

            //checks the surname if valid
            if (Validator::is_valid_name($surname) && $test == 2) {

                $test++;
            } else {
                $this->template->setAlert('Surname must not have a numerical values and characters / \ ? < > : ; " and *', Template::ALERT_ERROR, 'alert');
                return;
            }

            //checks the firstname if valid
            if (Validator::is_valid_name($firstname) && $test == 3) {

                $test++;
            } else {
                $this->template->setAlert('Surname must not have a numerical values and characters / \ ? < > : ; " and *', Template::ALERT_ERROR, 'alert');
                return;
            }

            //checks the middlename if valid
            if (Validator::is_valid_name($middleName) && $test == 4) {

                $test++;
            } else {
                $this->template->setAlert('Surname must not have a numerical values and characters / \ ? < > : ; " and *', Template::ALERT_ERROR, 'alert');
                return;
            }

            //check if new pass and confirm pass are equal
            if ($newpass == $confirmpass && $test == 5) {

                $test++;
            } else {
                $this->template->setAlert('Passwords does not matched!', Template::ALERT_ERROR);
                return;
            }

            //check if password is valid
            if (Validator::is_valid_password($newpass) && $test == 6) {

                $this->admin->Password = $newpass;

                $test++;
            } else {
                $this->template->setAlert('Password\'s length must have a minimum of 7 characters!', Template::ALERT_ERROR);
            }

            //check if photo is valid
            if ($imagefile['name'] != "") {

                if (Validator::is_valid_photo($imagefile)) {

                    $this->admin->Picture = HOST . "/photos/signatory/" . $username . "." . "jpg";
                    $this->local_dir = PATH . "photos/signatory/";
                } else {
                    $this->template->setAlert('Invalid Photo!', Template::ALERT_ERROR, 'alert');
                    return;
                }
            } else {
                $this->admin->Picture = HOST . "/photos/default.png";
            }

//            //check if photo is valid
//            if (isset($_FILES["photo"])) {
//
//                if (Validator::is_valid_photo($imagefile)) {
//
//                    $ext = explode(".", $imagefile["name"]);
//
//                    $this->admin->Picture = HOST . "/photos/signatory/" . $username . "." . end($ext);
//                    $this->local_dir = PATH . "photos/signatory/" . $username . "." . end($ext);
//                } else {
//                    $this->template->setAlert('Invalid Photo!', Template::ALERT_ERROR, 'alert');
//                    return;
//                }
//            } else {
//                $this->admin->Picture = HOST . "/photos/default.png";
//                $this->local_dir = PATH . "photos/default.png";
//            }

            $this->admin->Assigned_Signatory = $_POST["sign_name"];
            $this->admin->email_add = $_POST['emailAdd'];

            if ($test == 7 && $this->admin->insertSignatory_User()) {

                if (isset($imagefile['name'])) {
                    $image_upload = new upload($imagefile);

                    if ($image_upload->uploaded) {

                        $image_upload->image_convert = "jpg";
                        $image_upload->file_overwrite = true;
                        $image_upload->file_new_name_body = $username;
                        $image_upload->process($this->local_dir);

                        if ($image_upload->processed) {
                            $this->registered();
                        } else {
                            $this->partially_registered();
                        }
                    } else {
                        $this->registered();
                    }
                }else{
                    $this->registered();
                }

//                if (move_uploaded_file($imagefile["tmp_name"], $this->local_dir)) {
//                    $this->registered();
//                } else {
//                    $this->partially_registered();
//                }
            } else {
                if(mysql_errno() == 1062){
                    $this->template->setAlert('Username already exists.', Template::ALERT_ERROR);
                }else{
                    $this->template->setAlert('Something went wrong! Check your input fields.', Template::ALERT_ERROR);
                }
                
            }
        }
    }

    private function registered() {
        $this->template->setAlert('Registered Successfully! Wait for the administrator\'s approval to access your account. Contact the administrator for more details, thank you.', Template::ALERT_SUCCESS);
        $this->template->setContent('login.tpl');
    }

    private function partially_registered() {
        $this->template->setAlert('Registered Successfully! But there\'s problem in uploading a photo. Wait for the administrator\'s approval to access your account. Contact the administrator for more details, thank you.', Template::ALERT_SUCCESS);
        $this->template->setContent('login.tpl');
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

        $this->school_year_model->db_close();
        $this->department_model->db_close();
        $this->courses_model->db_close();
    }

}

$controller = new Signatory_Registration();
$controller->perform_actions();
$controller->display();
?>
