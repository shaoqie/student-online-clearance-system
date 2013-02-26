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
    private $signatory_model;
    private $directory;

    public function __construct() {
        parent::__construct();
        if (Session::user_exist() && Session::get_Account_type() == "Admin") {

            $this->administrator_model = new User_Model();
            $this->signatoriallist_model = new SignatorialList_Model();
            $this->signatory_model = new Signatory_Model();
            $this->template = new Template();
            $this->template->setPageName('User Accounts Page');

            $this->template->set_username(Session::get_user());
            $this->template->set_surname(Session::get_Surname());
            $this->template->set_firstname(Session::get_Firstname());
            $this->template->set_middlename(Session::get_Middlename());
            $this->template->set_account_type(Session::get_Account_type());
            $this->template->set_photo(Session::get_photo());

            $this->template->setContent('dashboard.tpl');
            $this->template->setCalendar('Calendar.tpl');
            $this->template->assign('assign_sign', '');
            
            $filename = "../Excel_File/student_current_enroll.xls";
            if (file_exists($filename)){ $this->template->assign('excel_file', 'true'); }

            //var_dump($_GET['account_types']);
            if (isset($_GET['user_type'])) {
                $this->displayTable('', 1, trim($_GET['user_type']), "default");
            } else {
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
            if ($finder == "default") {
                array_push($name, $value);
            } else {
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

        $HOST = $explode[0] != null ? HOST . "/administrator/?action=deleted&user_type=" . $user_type : HOST;
        header('Location: ' . $HOST);
    }

    public function deleted($user_type) {
        $this->template->setAlert('Delete an Account Successfully!..', Template::ALERT_SUCCESS, 'alert');
        $this->displayTable('', 1, $user_type, "default");
    }

    public function filter($filterName, $type) {
        $this->displayTable(trim($filterName), 1, $type, 'not');
    }

    public function displayTable($searchName, $page, $user_type, $finder) {
        $this->administrator_model->filter($searchName, $page, $user_type);


        $temp = $user_type == 'Student' ? "Courses" : "Assigned Signatory";

        $numOfPages = $this->administrator_model->getQueryPageSize($searchName, $user_type);
        $numOfResults = count($this->administrator_model->getFilter_Name());

        $this->template->assign('myKey_admin', $this->administrator_model->getFilter_ID());
        $this->template->set_Photos($this->administrator_model->getFilter_Picture());
        //$this->template->set_Type($this->administrator_model->getStud_Status_Sign_Usability());
        $this->template->set_Filter($searchName);
        $this->template->assign('admin_length', $numOfPages);
        $this->template->assign('rowCount_admin', $numOfResults);
        $this->template->assign('user_type', $user_type);
        $this->template->assign('courseORsign', $temp);
        $this->template->assign('my_courseORsign', $this->administrator_model->getFilter_courseORsign());


        if ($user_type == 'Student') {
            $this->template->assign('status', 'Status');
            $this->template->assign('stud_status', $this->administrator_model->getStud_Status_Sign_Usability());
        }

        if ($finder == "default") {
            $this->template->set_Name($this->getNameofUser($this->administrator_model->getFilter_Name(), $searchName, "default"));
        } else {
            $this->template->set_Name($this->getNameofUser($this->administrator_model->getFilter_Name(), $searchName, "not_default"));
        }
        if ($numOfResults == 0) {
            $this->template->setAlert('No Results Found.', Template::ALERT_ERROR, 'alert');
        }
    }

    public function display_add_edit_account() {
        $listOfSignatory = $this->administrator_model->getListofSignatory();

        $this->template->setContent('add_edit_account.tpl');
        $this->template->assign('mySignatory', $listOfSignatory);
    }

    public function addSignatoryInCharge() {
        $this->template->setContent('Add_SignatoryInCharge.tpl');

        $ug_listOfsignatory = $this->signatory_model->getListofSignatoryName();
        $g_listOfsignatory = $this->signatory_model->getListofSignatoryName();
        //$listOfKeysFromSignatories = $this->signatoriallist_model->getKeyListofSignatory();

        $this->template->assign('ug_signatories', $ug_listOfsignatory);
        $this->template->assign('g_signatories', $g_listOfsignatory);
        //var_dump($listOfsignatory);
        if (isset($_POST['Register'])) {
            $username = $_POST["uname"];
            $newpass = md5($_POST["newpass"]);
            $confirmpass = md5($_POST["confirmpass"]);
            $surname = $_POST["surname"];
            $firstname = $_POST["firstname"];
            $middleName = $_POST["middleName"];
            $assign_sign = $this->signatoriallist_model->getSignId(trim($_POST['sign_name']));

            $this->administrator_model->Username = $username;
            $this->administrator_model->Password = $newpass;
            $this->administrator_model->Surname = $surname;
            $this->administrator_model->First_Name = $firstname;
            $this->administrator_model->Middle_Name = $middleName;
            $this->administrator_model->Assigned_Signatory = $assign_sign;
            //$this->administrator_model->Signatory_Usability = $_POST['sign_usability'];
            
            if($this->administrator_model->isUsername_Exist(trim($username))){
                $this->template->setAlert('Username is Already Exist!..', Template::ALERT_ERROR);
                $this->template->assign('s_name', $surname);
                $this->template->assign('f_name', $firstname);
                $this->template->assign('m_name', $middleName);
            }else{
                $this->administrator_model->insertSignatory_UserByAdmin();
                $this->template->setAlert('Signatoy In-Charge was Successfully Added!', Template::ALERT_SUCCESS);
            }
            
        }
    }

    function upload_excel_file() {
        $excel_file = $_FILES['excel_file'];
        $this->directory = PATH . "Excel_File/";

        if ($excel_file['name'] != ""){
            if($excel_file["type"] == "application/vnd.ms-excel") {
                $excel_file_upload = new upload($excel_file);
                $excel_file_upload->file_overwrite = true;
                $excel_file_upload->file_new_name_body = "student_current_enroll";
                $excel_file_upload->process($this->directory);

                //if ($image_upload->processed) {
                    //$this->registered();
                    $this->template->setAlert("File was Successfully Uploaded!..", Template::ALERT_SUCCESS);
                    $excel_file_upload->clean();
                    
                    $filename = "../Excel_File/student_current_enroll.xls";
                    if (file_exists($filename)){ $this->template->assign('excel_file', 'true'); }
            }else{
                $this->template->setAlert("You can Upload a XLS file only!..", Template::ALERT_ERROR);
            }
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
