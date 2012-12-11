<?php

/**
 * Signatory_List_Manager Controller
 *
 * @author Ozy
 */
require_once '../config/config.php';

class Signatory_List_Manager extends Controller {

    private $template;
    private $signatory_model;

    public function __construct() {
        parent::__construct();

        $this->signatory_model = new Signatory_Model();
        $this->template = new Template();
        $this->template->setPageName('Signatories');

        $this->template->set_username(Session::get_user());
        $this->template->set_surname(Session::get_Surname());
        $this->template->set_firstname(Session::get_Firstname());
        $this->template->set_middlename(Session::get_Middlename());
        $this->template->set_account_type(Session::get_Account_type());

        $this->template->setContent('signatory_list_manager.tpl');
        
        $this->displayTable('', 1, "default");
    }

    private function getStrongchar($str, $findname){
        $left = substr($str, 0, strpos(strtolower($str), strtolower($findname))); //cut left
	$center = "<strong style='color: #049cdb;'><u>" .substr($str, strpos(strtolower($str), strtolower($findname)), strlen($findname)) ."</u></strong>"; // cut center
	$right =  substr($str, strpos(strtolower($str), strtolower($findname)) + strlen($findname));		
		
	return $left .$center .$right;
    }
    
    private function getListofSignName($arrayTemp, $searchName, $finder){
        $row = array();
        foreach ($arrayTemp as $value) {
            $str = $finder == "default" ? $value : $this->getStrongchar($value, $searchName);
            array_push($row, $str);
        }
        
        return $row;
    }
    
    public function deleted(){
        $this->template->setAlert('Delete an Signatory Successfully!..', Template::ALERT_SUCCESS);
    }
    
    public function delete($selected) {
        $explode = explode("-", $selected);
        foreach ($explode as $value) {
            $this->signatory_model->deleteSignatory(trim($value));
        }
        $HOST = $explode[0] != null ? HOST ."/administrator/signatory_list_manager.php?action=deleted" : HOST ."/administrator/signatory_list_manager.php";
        header('Location: ' .$HOST);
    }
    
    public function filter($filterName){
        $this->displayTable(trim($filterName), 1);
    }
    
    public function displayTable($searchName, $page, $finder){
        $numOfPages = $this->signatory_model->getQueryPageSize($searchName);
        $numOfResults = count($this->signatory_model->filter_SignName($searchName, $page));
        $getListofSignName = $this->getListofSignName($this->signatory_model->filter_SignName($searchName, $page), $searchName, $finder);
        $filter_ID = $this->signatory_model->filter_ID($searchName, $page);
        
        //$this->
        $this->template->assign('myName_sign', $getListofSignName); //$this->signatory_model->filter_Description($searchName, $page));
        $this->template->assignByRef('myKey_sign', $filter_ID);
        $this->template->assign('filter', $searchName);
        $this->template->assign('sign_length', $numOfPages);
        $this->template->assign('rowCount_sign', $numOfResults);
        
        if ($numOfResults == 0) {
            $this->template->setAlert('No Results Found.', Template::ALERT_ERROR);
        }
    }
    
    public function display() {
        $this->template->display('bootstrap.tpl');
        $this->signatory_model->db_close();
    }

}

$controller = new Signatory_List_Manager();
$controller->perform_actions();
$controller->display();
?>
