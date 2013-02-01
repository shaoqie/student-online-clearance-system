<?php

/*
 * Settings Page
 * 
 */
require_once 'config/config.php';

class Settings extends Controller {

    private $template;
    private $admin;
    private $local_dir;

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
            $this->template->assign('email_add',Session::get_emailAdd());
            $this->template->set_account_type(Session::get_Account_type());
            $this->template->set_photo(Session::get_photo());

            if (Session::get_Account_type() == "Signatory") {
                $this->template->set_account_type(Session::get_Account_type() . " in Charge");
                $this->template->assign('assign_sign', ", " . Session::get_AssignSignatory());
            } else {
                $this->template->assign('assign_sign', '');
            }

            $this->template->setContent('settings.tpl');
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
        $email_add = $_POST['emailAdd'];
        $imagefile = "";

        
        if ($newpass == "") {
            $newpass = $oldpass;
            $confirmpass = $oldpass;
        }

        $test = 0;

        //Check if fields are empty in firstname surname and middlename
        if ($surname != "" && $firstname != "" && $middleName != "" && $email_add != "" ) {
            $this->admin->Surname = $surname;
            $this->admin->First_Name = $firstname;
            $this->admin->Middle_Name = $middleName;
            $this->admin->email_add = $email_add;

            $test++;
        } else {
            $this->template->setAlert('Surname, first name, middle name and email address are required!', Template::ALERT_ERROR, 'alert');
            return;
        }

        //checks the surname if valid
        if (Validator::is_valid_name($surname) && $test == 1) {

            $test++;
        } else {
            $this->template->setAlert('Surname must not have a numerical values and characters / \ ? < > : ; " and *', Template::ALERT_ERROR, 'alert');
            return;
        }

        //checks the firstname if valid
        if (Validator::is_valid_name($firstname) && $test == 2) {

            $test++;
        } else {
            $this->template->setAlert('Surname must not have a numerical values and characters / \ ? < > : ; " and *', Template::ALERT_ERROR, 'alert');
            return;
        }

        //checks the middlename if valid
        if (Validator::is_valid_name($middleName) && $test == 3) {

            $test++;
        } else {
            $this->template->setAlert('Surname must not have a numerical values and characters / \ ? < > : ; " and *', Template::ALERT_ERROR, 'alert');
            return;
        }

        // check if actual pass and old pass are equal
        if ($actualPass == $oldpass && $test == 4) {

            $test++;
        } else {
            $this->template->setAlert('Incorrect Password!', Template::ALERT_ERROR, 'alert');
            return;
        }

        //check if new pass and confirm pass are equal
        if ($newpass == $confirmpass && $test == 5) {

            $test++;
        } else {
            $this->template->setAlert('Passwords does not matched!', Template::ALERT_ERROR, 'alert');
            return;
        }

        //check if password is valid
        if (Validator::is_valid_password($newpass) && $test == 6) {

            $this->admin->Password = $newpass;

            $test++;
        } else {
            $this->template->setAlert('Password\'s length must have a minimum of 7 characters!', Template::ALERT_ERROR, 'alert');
        }

        //check if photo is valid
        if (isset($_FILES["photo"])) {

            $imagefile = $_FILES["photo"];

            if (Validator::is_valid_photo($imagefile)) {

                $ext = explode(".", $imagefile["name"]);
                
                $actor = "";
                
                if(Session::get_Account_type() == "Admin"){
                    $actor = "administrator";
                }else if(Session::get_Account_type() == "Signatory"){
                    $actor = "signatory";
                }else if(Session::get_Account_type() == "Student"){
                    $actor = "student";
                }

                $this->admin->Picture = HOST . "/photos/$actor/" . Session::get_user() . "." . end($ext);
                $this->local_dir = PATH . "photos/$actor/" . Session::get_user() . "." . end($ext);
            } else {
                $this->template->setAlert('Invalid Photo!', Template::ALERT_ERROR, 'alert');
                return;
            }
        }

        //var_dump($this->admin->email_add);
        if ($this->admin->update() && $test == 7) {

            $this->template->set_surname($surname);
            $this->template->set_firstname($firstname);
            $this->template->set_middlename($middleName);
            $this->template->assign('email_add' ,$email_add);
            $this->template->set_photo($this->admin->Picture);

            if (isset($this->admin->Picture)) {

                if (move_uploaded_file($imagefile["tmp_name"], $this->local_dir)) {
                    $this->template->setAlert('Account has been updated!', Template::ALERT_SUCCESS);
                }else{
                    $this->template->setAlert('Account has been updated! But there\'s problem in uploading a photo.', Template::ALERT_INFO);
                }
            }
        } else {
            $this->template->setAlert('Database Error!', Template::ALERT_ERROR);
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
