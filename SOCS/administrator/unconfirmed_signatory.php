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
            $this->template->set_photo(Session::get_photo());

            $this->template->setContent('unconfirmed_signatory.tpl');
            $this->template->assign('assign_sign', '');
            
            $this->displayTable('', 1, "default");
        }else{
             header('Location: ' . HOST);
        }
    }
    
    public function confirmedAccount($key){
        $this->user_model->confirmed($key);
        $this->template->setAlert('Signatory User was Successfully Confirmed and usable!..', Template::ALERT_SUCCESS, 'alert');
        $this->displayTable('', 1, "default");
    }
    /*---------------- Deleting Signatory Unconfirm User-----------------*/
    public function deleted() {
        $this->template->setAlert('Delete an Unconfirm Signatory User was Successfully!..', Template::ALERT_SUCCESS, 'alert');
    }

    public function delete($selected) {
        $explode = explode("-", $selected);
        
        echo "aewwewe";
        foreach ($explode as $value) {
            $this->user_model->deleteUser(trim($value));
            //if($delete == "false"){ $this->template->setAlert('You can delete an Unuse Signatory only!..', Template::ALERT_ERROR, 'alert'); return;}
        }
        $HOST = $explode[0] != null ? HOST . "/administrator/unconfirmed_signatory.php?action=deleted" : HOST . "/administrator/unconfirmed_signatory.php";
        header('Location: ' . $HOST);
    }
    
    public function filter($filterName) {
        $this->displayTable(trim($filterName), 1);
    }

    public function displayTable($searchName, $page, $finder) {
        $this->user_model->filterUnconfirmedSign($searchName, $page);
//        
        $numOfPages = $this->user_model->getQueryPageSizeUnconfirmedSign($searchName);
        $numOfResults = count($this->user_model->getFilter_Name());
        $getListofSignUser = $this->getListofName($this->user_model->getFilter_Name(), $searchName, $finder);
        $filter_ID = $this->user_model->getFilter_ID();

        $this->template->set_Photos($this->user_model->getFilter_Picture());
        $this->template->assign('myName_unconfirmedSign', $getListofSignUser); //$this->signatory_model->filter_Description($searchName, $page));
        $this->template->assignByRef('myKey_unconfirmedSign', $filter_ID);
        $this->template->assign('filter', $searchName);
        $this->template->assign('unconfirmedSign_length', $numOfPages);
        $this->template->assign('rowCount_unconfirmedSign', $numOfResults);
        $this->template->assign('assignSignID_unconfirmedSign', $this->user_model->getFilter_AssignSignName());

        if ($numOfResults == 0) {
            $this->template->setAlert('No Results Found.', Template::ALERT_ERROR, 'alert');
        }
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
