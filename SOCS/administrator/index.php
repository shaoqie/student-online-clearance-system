<?php

/**
 * Administrator's Index Page
 *
 * @author Ozy
 */
require_once '../config/config.php';

class Index extends Controller {

    public function __construct() {
        parent::__construct();
        if (Session::user_exist() && Session::get_Account_type() == "Admin") {

            $this->template = new Template();
            $this->template->setPageName('Administrator Page');
            $this->template->setContent('dashboard.tpl');
            $this->template->set_UserInfo("" .Session::get_Surname() .", " .Session::get_Firstname() ." " .Session::get_Middlename() .".");
        } else {
            header('Location: /SOCS/');
        }
    }

    public function display() {
        $this->template->display('simple.tpl');
    }

}

$controller = new Index();
$controller->perform_actions();
$controller->display();
?>
