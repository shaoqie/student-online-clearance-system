<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'config/config.php';

class Settings extends Controller {

    private $template;
    private $admin;

    public function __construct() {
        parent::__construct();

        if (Session::user_exist()) {
            $this->template = new Template();
            $this->template->setPageName('Settings');
            if (Session::get_Account_type() == "Admin") {
                $this->template->setContent('admin_settings.tpl');
            } else if (Session::get_Account_type() == "Student") {
                $this->template->setContent('student_settings.tpl');
            } else if (Session::get_Account_type() == "Signatory") {
                $this->template->setContent('signatory_settings.tpl');
            }

            $this->admin = new User_Model();
            //$_SESSION['password']=12345;
           echo $_SESSION['password'];
        } else {
            header('Location: /SOCS/');
            exit;
        }
    }

    public function verify() {
        $oldpass = $_POST['oldpass'];
        $newpass = $_POST['newpass'];
        $confirmpass = $_POST['confirmpass'];
        $actualPass = Session::getUserPass();

        if (Session::get_Account_type() == "Admin" || Session::get_Account_type() == "Signatory") {
            $this->admin->Surname = $_POST['surname'];
            $this->admin->First_Name = $_POST['firstname'];
            $this->admin->Middle_Name = $_POST['middleName'];
//            
//            echo "<br />" . $actualPass . " == " . $oldpass;
        }

        if ($actualPass == $oldpass) {
            if ($newpass == $confirmpass) {
                $this->admin->Password = $newpass;
                $this->admin->update(Session::get_Account_type());
            }
        } else {
            header('Location: settings.php?action=settings_error');
            exit;
        }
    }

    public function settings_error() {
        $this->template->setAlert('Something is not right', Template::ALERT_ERROR);
    }

    public function display() {
        $this->template->display('simple.tpl');
        $this->admin->db_close();
    }

}

$controller = new Settings();
$controller->perform_actions();
$controller->display();
?>
