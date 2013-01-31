<?php

/**
 * Administrator's Index Page
 *
 * @author Ozy
 */
require_once '../config/config.php';

class Index extends Controller {

    private $template;
    private $administrator_model;
    private $signatoriallist_model;

    public function __construct() {
        parent::__construct();
        if (Session::user_exist() && Session::get_Account_type() == "Admin") {

            $this->administrator_model = new User_Model();
            $this->signatoriallist_model = new SignatorialList_Model();
            $this->template = new Template();
            $this->template->setPageName('Administrator Page');

            $this->template->set_username(Session::get_user());
            $this->template->set_surname(Session::get_Surname());
            $this->template->set_firstname(Session::get_Firstname());
            $this->template->set_middlename(Session::get_Middlename());
            $this->template->set_account_type(Session::get_Account_type());
            $this->template->set_photo(Session::get_photo());

            $this->template->setContent('dashboard.tpl');
            $this->template->setCalendar('Calendar.tpl');
            $this->template->assign('assign_sign', '');  
            
            //var_dump($_GET['account_types']);
            if(isset($_GET['user_type'])){
                $this->displayTable('', 1, trim($_GET['user_type']), "default");
            }else{
               // echo "wwwwwwwwww";
                $this->displayTable('', 1, 'Student', "default");
            }
            
        } else {
            header('Location: ' . HOST);
        }
    }   
    
    private function getNameofUser($listOfName, $searchName, $finder) {
        $name = array();     
        foreach ($listOfName as $value) {
            if($finder == "default"){
                array_push($name, $value);
            }else{
                array_push($name, $this->getStrongchar($value, $searchName));
            }
        }       

        return $name;
    }

    public function delete($selected, $user_type) {
        $explode = explode("@", $selected);
        foreach ($explode as $value) {
            $this->administrator_model->deleteUser(trim($value));
        }
        
        $HOST = $explode[0] != null ? HOST ."/administrator/?action=deleted&type=" .$user_type : HOST;
        header('Location: ' .$HOST);
    }
    
    public function deleted($type){
        $this->template->setAlert('Delete an Account Successfully!..', Template::ALERT_SUCCESS, 'alert');
        $this->displayTable('', 1, $type, "default");
    }
    
    public function filter($filterName, $type){
        $this->displayTable(trim($filterName), 1, $type, 'not');
    }

    public function displayTable($searchName, $page, $user_type , $finder) {
        $this->administrator_model->filter($searchName, $page, $user_type);
        
        
        $temp = $user_type == 'Student' ? "Courses" : "Assigned Signatory";
        $numOfPages = $this->administrator_model->getQueryPageSize($searchName, $user_type);
        $numOfResults = count($this->administrator_model->getFilter_Name());

        $this->template->assign('myKey_admin', $this->administrator_model->getFilter_ID());      
        $this->template->set_Photos($this->administrator_model->getFilter_Picture());
        $this->template->set_Type($this->administrator_model->getFilter_Type());
        $this->template->set_Filter($searchName);
        $this->template->assign('admin_length', $numOfPages);
        $this->template->assign('rowCount_admin', $numOfResults);
        $this->template->assign('user_type', $user_type);
        $this->template->assign('courseORsign', $temp);
        $this->template->assign('my_courseORsign', $this->administrator_model->getFilter_courseORsign());

        if($finder == "default"){
            $this->template->set_Name($this->getNameofUser($this->administrator_model->getFilter_Name(), $searchName, "default"));
        }else{
            $this->template->set_Name($this->getNameofUser($this->administrator_model->getFilter_Name(), $searchName, "not_default"));
        }
        if ($numOfResults == 0) {
            $this->template->setAlert('No Results Found.', Template::ALERT_ERROR, 'alert');
        }
    }
    
    public function display_add_edit_account(){
        $listOfSignatory = $this->administrator_model->getListofSignatory();
        
        $this->template->setContent('add_edit_account.tpl');   
        $this->template->assign('mySignatory', $listOfSignatory);
    }
    
    public function addSignatoryInCharge(){
        $this->template->setPageName("Add Signatory In Charge");
        $this->template->setContent('Add_SignatoryInCharge.tpl');
        
        $listOfsignatory = $this->signatoriallist_model->getListofSignatory();
        $listOfKeysFromSignatories = $this->signatoriallist_model->getKeyListofSignatory();

        $this->template->assign('signatories', $listOfsignatory);
        $this->template->assign('signatory_keys', $listOfKeysFromSignatories);
        
        if(isset($_POST['Register'])){
            $username = $_POST["uname"];
            $newpass = $_POST["newpass"];
            $confirmpass = $_POST["confirmpass"];
            $surname = $_POST["surname"];
            $firstname = $_POST["firstname"];
            $middleName = $_POST["middleName"];
            $assign_sign = $_POST['sign_name'];
            
            $this->administrator_model->Username = $username;
            $this->administrator_model->Password = $newpass;
            $this->administrator_model->Surname = $surname;
            $this->administrator_model->First_Name = $firstname;
            $this->administrator_model->Middle_Name = $middleName;
            $this->administrator_model->Assigned_Signatory = $assign_sign;
            
            $this->administrator_model->insertSignatory_UserByAdmin();
            
            $this->template->setAlert('Signatoy In-Charge was Successfully Added!', Template::ALERT_SUCCESS);
        }
    }

    public function display() {
        $this->template->display('bootstrap.tpl');
        $this->administrator_model->db_close();
    }

}

$controller = new Index();
$controller->perform_actions();
$controller->display();
?>
