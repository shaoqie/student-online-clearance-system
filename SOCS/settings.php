<?php

/*
 * Settings Page
 * 
 */
require_once 'config/config.php';

class Settings extends Controller {

    private $template;
    private $admin;

    public function __construct() {
        parent::__construct();

        if (Session::user_exist()) {

            $this->admin = new User_Model();

            $this->template = new Template();
            $this->template->setPageName('Settings');
            $this->template->set_username(Session::get_user());
            $this->template->set_surname(Session::get_Surname());
            $this->template->set_firstname(Session::get_Firstname());
            $this->template->set_middlename(Session::get_Middlename());
            $this->template->set_account_type(Session::get_Account_type());

            if (Session::get_Account_type() == "Admin") {
                $this->template->setContent('admin_settings.tpl');
                $this->template->assign('assign_sign', '');
            } else if (Session::get_Account_type() == "Student") {
                $this->template->setContent('student_settings.tpl');
                $this->template->assign('assign_sign', '');
            } else if (Session::get_Account_type() == "Signatory") {
                $this->template->setContent('signatory_settings.tpl');
                $this->template->set_account_type(Session::get_Account_type() ." in Charge -");
                $this->template->assign('assign_sign', ", " .Session::get_AssignSignatory());
            }
        } else {
            header('Location: ' . HOST);
            exit;
        }
    }

    public function verify() {
        $oldpass = $_POST['oldpass'];
        $newpass = $_POST['newpass'];
        $confirmpass = $_POST['confirmpass'];
        $actualPass = Session::getUserPass();
        $surname = $_POST['surname'];
        $firstname = $_POST['firstname'];
        $middleName = $_POST['middleName'];

        if ($newpass == "") {
            $newpass = $oldpass;
            $confirmpass = $oldpass;
        }

        $test = 0;

        //Check if fields are empty in firstname surname and middlename
        if ($surname != "" && $firstname != "" && $middleName != "") {
            if (Session::get_Account_type() != "Student") {
                $this->admin->Surname = $surname;
                $this->admin->First_Name = $firstname;
                $this->admin->Middle_Name = $middleName;
            }

            $test++;
        } else {
            $this->template->setAlert('Surname, first name and middle name are required!', Template::ALERT_ERROR);
            return;
        }

        //checks the surname if valid
        if (Validator::is_valid_name($surname) && $test == 1) {

            $test++;
        } else {
            $this->template->setAlert('Surname must not have a numerical values and characters / \ ? < > : ; " and *', Template::ALERT_ERROR);
            return;
        }

        //checks the firstname if valid
        if (Validator::is_valid_name($firstname) && $test == 2) {

            $test++;
        } else {
            $this->template->setAlert('Surname must not have a numerical values and characters / \ ? < > : ; " and *', Template::ALERT_ERROR);
            return;
        }

        //checks the middlename if valid
        if (Validator::is_valid_name($middleName) && $test == 3) {

            $test++;
        } else {
            $this->template->setAlert('Surname must not have a numerical values and characters / \ ? < > : ; " and *', Template::ALERT_ERROR);
            return;
        }

        // check if actual pass and old pass are equal
        if ($actualPass == $oldpass && $test == 4) {

            $test++;
        } else {
            $this->template->setAlert('Incorrect Password!', Template::ALERT_ERROR);
            return;
        }

        //check if new pass and confirm pass are equal
        if ($newpass == $confirmpass && $test == 5) {

            $test++;
        } else {
            $this->template->setAlert('Passwords does not matched!', Template::ALERT_ERROR);
            return;
        }

        if (Validator::is_valid_password($newpass) && $test == 6) {

            $this->admin->Password = $newpass;

            if ($this->admin->update(Session::get_Account_type())) {
                $this->template->setAlert('Your Account Has Been Updated!', Template::ALERT_SUCCESS);
                $this->template->set_surname($surname);
                $this->template->set_firstname($firstname);
                $this->template->set_middlename($middleName);
            } else {
                $this->template->setAlert('Database Error!', Template::ALERT_ERROR);
            }
        } else {
            $this->template->setAlert('Password\'s length must have a minimum of 7 characters!', Template::ALERT_ERROR);
        }
    }

    public function display() {
        $this->template->display('bootstrap.tpl');
        $this->admin->db_close();
    }

}

$controller = new Settings();
$controller->perform_actions();
$controller->display();
?>
