<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once '../config/config.php';

class Settings extends Controller {

    private $template;
    private $admin;

    public function __construct() {
        parent::__construct();

        if (Session::user_exist()) {
            $this->template = new Template();
            $this->template->setPageName('Settings');
            $this->template->setContent('settings.tpl');
            $this->admin = new Administrator_Model();
            

        } else {
            header('Location: /SOCS/');
            exit;
        }
    }

    public function cancel() {
        header('Location:/SOCS/');
        exit;
    }

    public function display() {
        $this->template->display('simple.tpl');
        $this->admin->db_close();
    }

    public function verify() {
        $oldpass = $_POST['oldpass'];
        $newpass = $_POST['newpass'];
        $confirmpass = $_POST['confirmpass'];
        $actualPass = Session::getUserPass();
        
        $this->admin->Surname = $_POST['surname'];
        $this->admin->First_Name = $_POST['firstname'];
        $this->admin->Middle_Name = $_POST['middleName'];

        if ($actualPass == $oldpass) {
            if ($newpass == $confirmpass) {
                $this->admin->Password = $newpass;
                Session::set_password($newpass);
                $this->admin->update();

            }
        } else {
            header('Location: settings.php?action=settings_error');
            exit;
        }
    }

    public function settings_error() {
        $this->template->setAlert('Something is not right', Template::ALERT_ERROR);
    }

}

$controller = new Settings();
$controller->perform_actions();
$controller->display();
?>
