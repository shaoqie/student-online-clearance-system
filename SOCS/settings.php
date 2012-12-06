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
            } else if (Session::get_Account_type() == "Student") {
                $this->template->setContent('student_settings.tpl');
            } else if (Session::get_Account_type() == "Signatory") {
                $this->template->setContent('signatory_settings.tpl');
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

        if ($_POST['surname'] != "" && $_POST['firstname'] != "" && $_POST['middleName'] != "") {
            if (Session::get_Account_type() == "Admin" || Session::get_Account_type() == "Signatory") {
                $this->admin->Surname = $_POST['surname'];
                $this->admin->First_Name = $_POST['firstname'];
                $this->admin->Middle_Name = $_POST['middleName'];
            }

            if ($actualPass == $oldpass) {
                if ($newpass == $confirmpass) {

                    if ($newpass == "") {
                        $this->admin->Password = $oldpass;
                    } else {
                        $this->admin->Password = $newpass;
                    }

                    if ($this->admin->update(Session::get_Account_type())) {
                        $this->template->setAlert('Your Account Has Been Updated!', Template::ALERT_SUCCESS);
                    } else {
                        $this->template->setAlert('Database Error!', Template::ALERT_ERROR);
                    }
                } else {
                    $this->template->setAlert('Passwords does not matched!', Template::ALERT_INFO);
                }
            } else {
                $this->template->setAlert('Check your password!', Template::ALERT_INFO);
            }
        } else {
            $this->template->setAlert('Surname, first name and middle name are required!', Template::ALERT_INFO);
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
