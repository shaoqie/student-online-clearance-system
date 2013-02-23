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
    private $signatory_model;
    private $signatoriallist_model;

    public function __construct() {
        parent::__construct();

        if (Session::user_exist()) {

            $this->admin = new User_Model();
            $this->signatory_model = new Signatory_Model();
            $this->signatoriallist_model = new SignatorialList_Model();

            $this->template = new Template();
            $this->template->setPageName('Settings');
            $this->template->set_username(Session::get_user());
            $this->template->set_surname(Session::get_Surname());
            $this->template->set_firstname(Session::get_Firstname());
            $this->template->set_middlename(Session::get_Middlename());
            $this->template->assign('email_add', Session::get_emailAdd());
            $this->template->set_account_type(Session::get_Account_type());
            $this->template->set_photo(Session::get_photo());
            
            $this->template->assign('user_type', Session::get_Account_type());
            if (Session::get_Account_type() == "Signatory") {         
                $this->template->set_account_type(Session::get_Account_type() . " in Charge");
                $this->template->assign('assign_sign', ", " . Session::get_AssignSignatory());
                
                
                $ug_listOfsignatory = $this->signatory_model->getListofSignatoryName();
                $g_listOfsignatory = $this->signatory_model->getListofSignatoryName();
                //$listOfKeysFromSignatories = $this->signatoriallist_model->getKeyListofSignatory();

                $this->template->assign('ug_signatories', $ug_listOfsignatory);
                $this->template->assign('g_signatories', $g_listOfsignatory);
                $this->template->assign('current_assignSign', Session::get_AssignSignatory());
                $this->template->assign('sign_status', Session::get_signatory_usability());
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
        $oldpass = (trim($_POST['oldpass']));
        $newpass = (trim($_POST['newpass']));
        $confirmpass = (trim($_POST['confirmpass']));
        $actualPass = Session::getUserPass();
        $surname = $_POST['surname'];
        $firstname = $_POST['firstname'];
        $middleName = $_POST['middleName'];
        $email_add = $_POST['emailAdd'];
        $imagefile = $_FILES["photo"];
        //$this->admin->Signatory_Usability = $_POST['sign_usability'];
        $this->admin->Assigned_Signatory = $this->signatoriallist_model->getSignId(trim($_POST['sign_name']));

        if ($newpass == "") {
            $newpass = md5($oldpass);
            $confirmpass = md5($oldpass);
        } else {
            $newpass = md5($newpass);
            $confirmpass = md5($confirmpass);
        }

        $test = 0;



        //Check if fields are empty in firstname surname and middlename
        if ($surname != "" && $firstname != "" && $middleName != "" && $email_add != "") {
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


        //checks the email if valid
        if (Validator::is_email_valid($email_add) && $test == 4) {
            $test++;
        } else {
            $this->template->setAlert('Not valid Email', Template::ALERT_ERROR, 'alert');
            return;
        }

//var_dump(Session::getUserPass());
//    var_dump($newpass);   
        // check if actual pass and old pass are equal
        if ($actualPass == md5($oldpass) && $test == 5) {

            $test++;
        } else {
            $this->template->setAlert('Incorrect Password!', Template::ALERT_ERROR, 'alert');
            return;
        }

        //check if new pass and confirm pass are equal
        if ($newpass == $confirmpass && $test == 6) {

            $test++;
        } else {
            $this->template->setAlert('Passwords does not matched!', Template::ALERT_ERROR, 'alert');
            return;
        }

        //check if password is valid
        if (Validator::is_valid_password($newpass) && $test == 7) {

            $this->admin->Password = ($newpass);

            $test++;
        } else {
            $this->template->setAlert('Password\'s length must have a minimum of 7 characters!', Template::ALERT_ERROR, 'alert');
            return;
        }



        //check if photo is valid
        if ($imagefile['name'] != "") {

            if (Validator::is_valid_photo($imagefile)) {

//                $ext = explode(".", $imagefile["name"]);

                $actor = "";

                if (Session::get_Account_type() == "Admin") {
                    $actor = "administrator";
                } else if (Session::get_Account_type() == "Signatory") {
                    $actor = "signatory";
                } else if (Session::get_Account_type() == "Student") {
                    $actor = "student";
                }

//                $this->admin->Picture = HOST . "/photos/$actor/" . Session::get_user() . "." . end($ext);
//                $this->local_dir = PATH . "photos/$actor/" . Session::get_user() . "." . end($ext);

                $this->admin->Picture = HOST . "/photos/$actor/" . Session::get_user() . "." . "jpg";
                $this->local_dir = PATH . "photos/$actor/";
            } else {
                $this->template->setAlert('Invalid Photo!', Template::ALERT_ERROR, 'alert');
                return;
            }
        } else {
            $this->admin->Picture = Session::get_photo();
        }

        //var_dump($actualPass);
        //var_dump($this->admin->email_add);
        if ($this->admin->update() && $test == 8) {

            $this->template->set_surname($surname);
            $this->template->set_firstname($firstname);
            $this->template->set_middlename($middleName);
            $this->template->assign('email_add', $email_add);
            $this->template->set_photo($this->admin->Picture);
            $this->template->assign('current_assignSign', trim($_POST['sign_name']));
            $this->template->assign('sign_status', $this->admin->Signatory_Usability);
            
            if(Session::get_Account_type() == "Signatory"){
                Session::set_signatory_usability($_POST['sign_usability']);
                Session::set_assignSignatory(trim($_POST['sign_name']));
            }
            
            if (isset($this->admin->Picture)) {

                $image_upload = new upload($imagefile);

                if ($image_upload->uploaded) {

                    $image_upload->image_convert = "jpg";
                    $image_upload->file_overwrite = true;
                    $image_upload->file_new_name_body = Session::get_user();
                    $image_upload->process($this->local_dir);

                    if ($image_upload->processed) {
                        $this->template->setAlert('Account has been updated!', Template::ALERT_SUCCESS);
                    } else {
                        $this->template->setAlert('Account has been updated! But there\'s problem in uploading a photo.' . $image_upload->error, Template::ALERT_INFO);
                    }
                } else {
                    $this->template->setAlert('Account has been updated! But there\'s problem in uploading a photo.', Template::ALERT_INFO);
                }

//                if (move_uploaded_file($imagefile["tmp_name"], $this->local_dir)) {
//                    $this->template->setAlert('Account has been updated!', Template::ALERT_SUCCESS);
//                }else{
//                    $this->template->setAlert('Account has been updated! But there\'s problem in uploading a photo.', Template::ALERT_INFO);
//                }
            } else {
                $this->template->setAlert('Account has been updated!', Template::ALERT_SUCCESS);
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
