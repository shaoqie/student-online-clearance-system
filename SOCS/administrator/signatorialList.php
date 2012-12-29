<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of signatory_list_byDepartment
 *
 * @author ronversa09
 */
require_once '../config/config.php';

class signatorialList extends Controller{
    private $template;
    private $signatorialList_model;
    
    public function __construct() {
        parent::__construct();
        if (Session::user_exist() && Session::get_Account_type() == "Admin") {
            $this->template = new Template();
            $this->signatorialList_model = new SignatorialList_Model();
            
            $this->template->setPageName('Signatorial List');
            $this->template->set_username(Session::get_user());
            $this->template->set_surname(Session::get_Surname());
            $this->template->set_firstname(Session::get_Firstname());
            $this->template->set_middlename(Session::get_Middlename());
            $this->template->set_account_type(Session::get_Account_type());
            $this->template->assign('Dept_name', Session::get_DepartmentName());
            
            $this->template->setContent('signatorialList.tpl');
            $this->template->assign('assign_sign', '');
            
            $this->displayTable('', 1, "default");
            
        }else{
            header('Location: ' . HOST);
        }
    }  
    
    private function getStrongchar($str, $findname){
        $left = substr($str, 0, strpos(strtolower($str), strtolower($findname))); //cut left
	$center = "<strong style='color: #049cdb;'><u>" .substr($str, strpos(strtolower($str), strtolower($findname)), strlen($findname)) ."</u></strong>"; // cut center
	$right =  substr($str, strpos(strtolower($str), strtolower($findname)) + strlen($findname));		
		
	return $left .$center .$right;
    }
    
    private function getListofSignatorialList($arrayTemp, $searchName, $finder){
        $row = array();
        foreach ($arrayTemp as $value) {
            $str = $finder == "default" ? $value : $this->getStrongchar($value, $searchName);
            array_push($row, $str);
        }
        
        return $row;
    }
    
    public function addSignatory($cmdSignatory){    
        $dept_id = $this->signatorialList_model->getDeptId(Session::get_DepartmentName());
        $sign_id = $this->signatorialList_model->getSignId(trim($cmdSignatory));
        $this->signatorialList_model->insert($dept_id, $sign_id);
        
        $this->displayTable('', 1, "default");
        $this->template->setAlert('Signatorial List was Added Successfully!..', Template::ALERT_SUCCESS, 'alert');
    }
    
    public function deleted() {
        $this->template->setAlert('Delete an Signatorial List Successfully!..', Template::ALERT_SUCCESS, 'alert');
    }

    public function delete($selected) {
        $dept_id = $this->signatorialList_model->getDeptId(Session::get_DepartmentName());
        $explode = explode("-", $selected);
        foreach ($explode as $value) {
            $this->signatorialList_model->deleteSignatorial($dept_id, trim($value));
        }
        $HOST = $explode[0] != null ? HOST . "/administrator/signatorialList.php?action=deleted" : HOST . "/administrator/signatorialList.php";
        header('Location: ' . $HOST);
    }
    
    public function edited() {
        $this->template->setAlert('Signatorial List was Edited Successfully!..', Template::ALERT_SUCCESS, 'alert');
    }
    
    public function editSignatorialList($newSign_Name, $oldSign_ID){
        $dept_id_temp = $this->signatorialList_model->getDeptId(Session::get_DepartmentName());
        $newSign_ID_temp = $this->signatorialList_model->getSignId($newSign_Name);

        $this->signatorialList_model->update($dept_id_temp, $oldSign_ID, $newSign_ID_temp);
        header('Location: ' . HOST . "/administrator/signatorialList.php?action=edited");
    }
    
    public function filter($filterName){
        $this->displayTable(trim($filterName), 1);
    }  
    
    public function displayTable($searchName, $page, $finder){
        $numOfPages = $this->signatorialList_model->getQueryPageSize(Session::get_DepartmentName(), $searchName);
        $numOfResults = count($this->signatorialList_model->filter_SignName(Session::get_DepartmentName(), $searchName, $page));
        $getListofSignatorialList = $this->getListofSignatorialList($this->signatorialList_model->filter_SignName(Session::get_DepartmentName(), $searchName, $page), $searchName, $finder);
        $filter_ID = $this->signatorialList_model->filter_ID(Session::get_DepartmentName(), $searchName, $page);
        
        $SignatoryList = $this->signatorialList_model->getListofSignatory();
        $getSignatorialList_signName = $this->signatorialList_model->filter_SignName(Session::get_DepartmentName(), '', $page);
        $listOfUnSelectSignatory = array_diff($SignatoryList, $getSignatorialList_signName);      
        
        $this->template->assign('myName_signatorial', $getListofSignatorialList); 
        $this->template->assignByRef('myKey_signatorial', $filter_ID);
        $this->template->assign('filter', $searchName);
        $this->template->assign('signatorial_length', $numOfPages);
        $this->template->assign('rowCount_signatorial', $numOfResults);
        $this->template->assign('SignatoryList', $listOfUnSelectSignatory);
        
        if ($numOfResults == 0) {
            $this->template->setAlert('No Results Found.', Template::ALERT_ERROR, 'alert');
        }
    }
    
    public function display() {
        $this->template->display('bootstrap.tpl');
        $this->signatorialList_model->db_close();
    } 
}

$controller = new signatorialList();
$controller->perform_actions();
$controller->display();

?>
