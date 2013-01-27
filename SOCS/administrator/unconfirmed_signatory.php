<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '../config/config.php';

class unconfirmed_signatory extends Controller{

    private $user_model;
    private $template;

    public function __construct() {
        parent::__construct();

        if (Session::user_exist() && Session::get_Account_type() == "Admin") {
            $this->user_model = new User_Model();
            $this->template = new Template();
            $this->template->setPageName('List Of Unconfirmed Signatory Users');

            $this->template->set_username(Session::get_user());
            $this->template->set_surname(Session::get_Surname());
            $this->template->set_firstname(Session::get_Firstname());
            $this->template->set_middlename(Session::get_Middlename());
            $this->template->set_account_type(Session::get_Account_type());

            $this->template->setContent('unconfirmed_signatory.tpl');
            $this->template->assign('assign_sign', '');
            
            $this->displayTable('', 1, "default");
        }else{
             header('Location: ' . HOST);
        }
    }
    
    public function filter($filterName) {
        $this->displayTable(trim($filterName), 1);
    }

    public function displayTable($searchName, $page, $finder) {
//        $this->signatory_model->filter($searchName, $page);
//        
//        $numOfPages = $this->signatory_model->getQueryPageSize($searchName);
//        $numOfResults = count($this->signatory_model->getFilter_Name());
//        $getListofSignName = $this->getListofName($this->signatory_model->getFilter_Name(), $searchName, $finder);
//        $filter_ID = $this->signatory_model->getFilter_ID();

        //$this->template->assign('myName_sign', $getListofSignName); //$this->signatory_model->filter_Description($searchName, $page));
        //$this->template->assignByRef('myKey_sign', $filter_ID);
       // $this->template->assign('filter', '');
        //$this->template->assign('sign_length', $numOfPages);
        //$this->template->assign('rowCount_sign', $numOfResults);

//        if ($numOfResults == 0) {
//            $this->template->setAlert('No Results Found.', Template::ALERT_ERROR, 'alert');
//        }
    }

    public function display() {
        $this->template->display('bootstrap.tpl');
        $this->user_model->db_close();
    }

}

$controller = new unconfirmed_signatory();
$controller->perform_actions();
$controller->display();
?>
