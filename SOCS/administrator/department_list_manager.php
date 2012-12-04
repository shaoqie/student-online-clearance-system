<?php

/**
 * Department_List_Manager Controller
 *
 * @author Ozy
 */
require_once '../config/config.php';

class Department_List_Manager extends Controller {

    private $template;

    public function __construct() {
        parent::__construct();

        $this->template = new Template();
        $this->template->setPageName('Departments');
        
        $this->template->set_username(Session::get_user());
        $this->template->set_surname(Session::get_Surname());
        $this->template->set_firstname(Session::get_Firstname());
        $this->template->set_middlename(Session::get_Middlename());
        $this->template->set_account_type(Session::get_Account_type());
        
        $this->template->setContent('departments.tpl');
    }

    public function display() {
        $this->template->display('bootstrap.tpl');
    }

}

$controller = new Department_List_Manager();
$controller->perform_actions();
$controller->display();
?>
