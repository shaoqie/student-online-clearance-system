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
        if (Session::user_exist() && Session::get_Account_type() == "Admin") {

            $this->signatory_model = new Signatory_Model();
            $this->template = new Template();
            $this->template->setPageName('Signatories');

            $this->template->set_username(Session::get_user());
            $this->template->set_surname(Session::get_Surname());
            $this->template->set_firstname(Session::get_Firstname());
            $this->template->set_middlename(Session::get_Middlename());
            $this->template->set_account_type(Session::get_Account_type());

            $this->template->setContent('signatory_list_manager.tpl');
            $this->template->assign('assign_sign', '');

            $this->displayTable('', 1, "default");
            
            if(isset($_GET['successEdit'])){
                if($_GET['successEdit'] == 'true'){
                    $this->template->setAlert("Updating Signatory was Successful", Template::ALERT_SUCCESS, 'alert');
                }
            }
            
            if(isset($_GET['successAdd'])){
                if($_GET['successAdd'] == 'true'){
                    $this->template->setAlert("Adding Signatory was Successful", Template::ALERT_SUCCESS, 'alert');
                }
            }
        } else {
            header('Location: ' . HOST);
        }
    }

    private function getStrongchar($str, $findname) {
        $left = substr($str, 0, strpos(strtolower($str), strtolower($findname))); //cut left
        $center = "<strong style='color: #049cdb;'><u>" . substr($str, strpos(strtolower($str), strtolower($findname)), strlen($findname)) . "</u></strong>"; // cut center
        $right = substr($str, strpos(strtolower($str), strtolower($findname)) + strlen($findname));

        return $left . $center . $right;
    }

    private function getListofSignName($arrayTemp, $searchName, $finder) {
        $row = array();
        foreach ($arrayTemp as $value) {
            $str = $finder == "default" ? $value : $this->getStrongchar($value, $searchName);
            array_push($row, $str);
        }

        return $row;
    }
    
    /*---------------- Adding Signatory -----------------*/
    public function addSignatory(){
        $this->template->setContent('addSignatory.tpl');       
    }
    
    public function add_signatory(){
        $this->template->setContent('addSignatory.tpl');       
        if(trim($_POST['sign_name']) == "" || trim($_POST['sign_description']) == ""){       
            $this->template->setAlert("Adding Signatory was Failed", Template::ALERT_ERROR, 'alert');
        }else if($this->signatory_model->isExist(trim($_POST['sign_name']), trim($_POST['sign_description']))){
            $this->template->setAlert("Cannot Add a Signatory that is Existing", Template::ALERT_ERROR, 'alert');
        }else{
            $this->signatory_model->insert(trim($_POST['sign_name']), trim($_POST['sign_description']));
            //$this->template->setAlert("Adding Signatory was Successful", Template::ALERT_SUCCESS, 'alert');
            
            header('Location: signatory_list_manager.php?successAdd=true');
        }
    }
    
    public function editSignatory($seleted){
        $sign_name = $this->signatory_model->getSign_Name($seleted);
        $sign_desc = $this->signatory_model->getSign_Desc($seleted);

        $this->template->setContent("editSignatory.tpl");
        $this->template->assign("editSignatory_Name", $sign_name);
        $this->template->assign("editSignatory_Desc", $sign_desc);
        
        if(isset($_POST['editSave'])){
            if(trim($_POST['sign_name']) == "" || trim($_POST['sign_description']) == ""){       
                $this->template->setAlert("Updating Signatory was Failed", Template::ALERT_ERROR, 'alert');
            }/*else if($this->signatory_model->isExist(trim($_POST['sign_name']), trim($_POST['sign_description']))){
                $this->template->setAlert("Cannot Update a Signatory that is Existing", Template::ALERT_ERROR, 'alert');
            }*/else{
                $this->signatory_model->update($seleted, trim($_POST['sign_name']), trim($_POST['sign_description']));
                //$this->template->setAlert("Updating Signatory was Successful", Template::ALERT_SUCCESS, 'alert');
                $this->template->assign("editSignatory_Name", trim($_POST['sign_name']));
                $this->template->assign("editSignatory_Desc", trim($_POST['sign_description']));
                
                header('Location: signatory_list_manager.php?successEdit=true');
            }
        }
        
    }

    /*---------------- Deleting Signatory -----------------*/
    public function deleted() {
        $this->template->setAlert('Delete an Signatory Successfully!..', Template::ALERT_SUCCESS, 'alert');
    }

    public function delete($selected) {
        $explode = explode("-", $selected);
        foreach ($explode as $value) {
            $delete = $this->signatory_model->deleteSignatory(trim($value));
            if($delete == "false"){ $this->template->setAlert('You can delete an Unuse Signatory only!..', Template::ALERT_ERROR, 'alert'); return;}
        }
        $HOST = $explode[0] != null ? HOST . "/administrator/signatory_list_manager.php?action=deleted" : HOST . "/administrator/signatory_list_manager.php";
        header('Location: ' . $HOST);
    }

    
    /*-------------------------------------------------------------------------------*/
    
    public function filter($filterName) {
        $this->displayTable(trim($filterName), 1);
    }

    public function displayTable($searchName, $page, $finder) {
        $numOfPages = $this->signatory_model->getQueryPageSize($searchName);
        $numOfResults = count($this->signatory_model->filter_SignName($searchName, $page));
        $getListofSignName = $this->getListofSignName($this->signatory_model->filter_SignName($searchName, $page), $searchName, $finder);
        $filter_ID = $this->signatory_model->filter_ID($searchName, $page);

        $this->template->assign('myName_sign', $getListofSignName); //$this->signatory_model->filter_Description($searchName, $page));
        $this->template->assignByRef('myKey_sign', $filter_ID);
        $this->template->assign('filter', $searchName);
        $this->template->assign('sign_length', $numOfPages);
        $this->template->assign('rowCount_sign', $numOfResults);

        if ($numOfResults == 0) {
            $this->template->setAlert('No Results Found.', Template::ALERT_ERROR, 'alert');
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
