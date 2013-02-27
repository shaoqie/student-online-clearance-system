<?php

/**
 * Main Index Page
 *
 * @author Ozy
 */
require_once 'config/config.php';
require_once 'libs/phpmailer/sendmail.php';

class Index extends Controller {

    private $template;
    private $administrator_model;
    private $school_year_model;
    private $department_model;
    private $courses_model;
    private $stud_model;
    private $signatoriallist_model;

    public function __construct() {
        parent::__construct();

        $this->administrator_model = new User_Model();
        $this->school_year_model = new SchoolYearSem_Model();
        $this->department_model = new Department_Model();
        $this->courses_model = new Course_Model();
        $this->stud_model = new Student_Model();
        $this->signatoriallist_model = new SignatorialList_Model();

        $this->template = new Template();
        $this->template->setPageName('Home');
        $this->template->setContent('welcome.tpl');

        $this->add_school_year();
    }

    public function login() {
        if ($this->administrator_model->isExist(trim($_POST['username']), md5(trim($_POST['password'])))) {
            $this->administrator_model->queryUser_Type(trim($_POST['username']), md5(trim($_POST['password'])));

            if ($this->administrator_model->Account_Type == "Admin") {

                Session::set_user(trim($_POST['username']), md5(trim($_POST['password'])));
                $this->setSession('Admin');
                header('Location: ' . HOST . '/administrator/');
            } else if ($this->administrator_model->Account_Type == "Student" && $this->administrator_model->validation_status == "Confirmed") {

                Session::set_user(trim($_POST['username']), md5(trim($_POST['password'])));
                $this->setSession('Student');
                header('Location: ' . HOST . '/student/');
            } else if ($this->administrator_model->Account_Type == "Signatory" && $this->administrator_model->validation_status == "Confirmed") {
                $assign_sign = $this->administrator_model->getAssignSignatory(trim($_POST['username']));

                Session::set_user(trim($_POST['username']), md5(trim($_POST['password'])));
                Session::set_assignSignatory(trim($assign_sign));
                $this->setSession('Signatory');
                header('Location: ' . HOST . '/signatory/');
            } else {
                header('Location: index.php?action=login_error');
                exit;
            }
        } else {
            header('Location: index.php?action=login_error');
            exit;
        }
    }

    public function changePassword($username, $hash) {
        $this->template->setAlert('You choose to change sent your password!', Template::ALERT_INFO);
        $this->template->setContent('changePassword.tpl');


        if (isset($_POST['GO'])) {
            $query = $this->administrator_model->updatePassword($username, $hash, md5($_POST['password']));
            if (!$query) {
                $this->template->setAlert('Invalid URL!!....!' . mysql_error(), Template::ALERT_ERROR);
            }


            
            header("Location: index.php?action=changeSuccessful");
        }
    }

    public function changeSuccessful() {
        $this->template->setContent('login.tpl');
        $this->template->setAlert('Your password has successfully change!', Template::ALERT_SUCCESS);
    }

    public function ForgotPass() {
        $hash = crypt(trim($_POST['ForgotPass']), "aweawkskihdsdaw");
        //$this->template->setContent('login.tpl');
        $this->administrator_model->getUserPassword($_POST['ForgotPass']);
        $this->administrator_model->updateHash(trim($_POST['ForgotPass']), $hash);

        $verificationLink = HOST . "/index.php?action=changePassword&username=" . ($_POST['ForgotPass']) . "&hash=" . $hash;


        sendForgotPassword($this->administrator_model->First_Name, $this->administrator_model->email_add, $verificationLink);
        //var_dump($_POST['ForgotPass']);
        $this->template->setAlert('Your password was sent to your email address!', Template::ALERT_SUCCESS);
        //var_dump($_POST['ForgotPass']);
    }

    public function logout() {
        $this->template->setContent('login.tpl');
        $this->template->setAlert('Logout Successfully!', Template::ALERT_SUCCESS);
        Session::destroy();
    }

    public function login_error() {
        $this->template->setContent('login.tpl');
        $this->template->setAlert('Error Logging in... ', Template::ALERT_ERROR);
    }

    public function student_register() {
        if (isset($_POST['Save'])) {
            $filename = "Excel_File/student_current_enroll.xls";
            if (!file_exists($filename)) {
                $this->template->setAlert("Current enroll student file was not uploaded yet... <br/>
                                            Sorry but you can't register for a meantime...", Template::ALERT_WARNING);
                return;
            }

            $imagefile = $_FILES["photo"];
            $excel_data = new Spreadsheet_Excel_Reader('Excel_File/student_current_enroll.xls');
            $stud_id = trim($_POST['stud_id'] . "-" . $_POST['number']);
            $stud_surname = trim($_POST['surname']);
            $found = false;

            /* ------ checking for valid photo ------ */
            //var_dump($imagefile);
            $Picture = $imagefile['name'] != "" ? HOST . "/photos/student/" . $stud_id . "." . "jpg" : HOST . "/photos/default_student.png";

            if($imagefile['name'] != ""){
                if (Validator::is_valid_photo($imagefile)) {               
                    $local_dir = PATH . "photos/student/"; 
                    $image_upload = new upload($imagefile);

                    $image_upload->image_convert = "jpg";
                    $image_upload->file_overwrite = true;
                    $image_upload->file_new_name_body = $stud_id;

                    $image_upload->process($local_dir);
                } else {
                    $this->template->setAlert('Invalid Photo!', Template::ALERT_ERROR, 'alert');
                    return;
                }
            }



            /* ------ checking for valid account ------ */
            for ($y = 4; $y <= $excel_data->rowCount(); $y++) {
                $temp_name = $excel_data->val($y, C);
                $temp = substr(trim($temp_name), 0, (stripos(trim($temp_name), ",")));
                //$temp = (stripos(trim($temp_name), ".") - 1) == -1 && substr(trim($temp_name), strlen(trim($temp_name)) - 2) == " " ? trim($temp_name) : trim(substr(trim($temp_name), 0, stripos(trim($temp_name), ".") - 1));
                if ($excel_data->val($y, B) == $stud_id && strtolower($stud_surname) == strtolower($temp)) {
                    $found = true;
                    break;
                }
            }
            
            if ($this->administrator_model->isUsername_Exist(trim($stud_id))) {
                //$this->template->setAlert('Student ID Number is Already Exist!..', Template::ALERT_ERROR);
                $this->student_registrationForm(false, true);
                //return;
            }
            
            if ($found) {
                $hash = crypt(($_POST['stud_id'] . "-" . $_POST['number'] . $_POST['emailAdd']), 'wrawehydrufmjhyaswtgf');
                $course_id = $this->courses_model->getCourseID(trim($_POST['course']));

                $this->administrator_model->insertStudent(($_POST['stud_id'] . "-" . $_POST['number']), md5(($_POST['password'])), trim($_POST['surname']), trim($_POST['firstname']), trim($_POST['middleName']), $_POST['emailAdd'], $Picture, $hash);

                //$this->administrator_model->insertStudent(($_POST['stud_id'] . "-" . $_POST['number']), (($_POST['password'])), trim($_POST['surname']), trim($_POST['firstname']), trim($_POST['middleName']), NULL, 'Student', NULL);
                $this->stud_model->insert(($_POST['stud_id'] . "-" . $_POST['number']), ($_POST['gender']), ($_POST['year_level']), ($_POST['program']), ($_POST['section']), $course_id, ($_POST['Status']));


                $verificationLink = HOST . "/index.php?action=verify&username=" . ($_POST['stud_id'] . "-" . $_POST['number']) . "&hash=" . $hash;

                //var_dump($_POST['emailAdd']);


                if (!sendMail(trim($_POST['firstname']), $_POST['emailAdd'], $verificationLink)) {
                    //echo "wwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww";
                } else {
                    //echo "wwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww2222222222222222222";
                }
                $this->template->setContent('login.tpl');
                $this->template->setAlert('Please confirm your registration by clicking the link sent in your email!... ', Template::ALERT_SUCCESS);
            } else {
                $this->student_registrationForm(true);
            }
        }

        /*

          echo "ID Number: " .$_POST['stud_id'] ."-" .$_POST['number'] ."<br/>";
          echo "Password: " .trim($_POST['password']) ."<br/>";
          echo "Confirm Password: " .trim($_POST['confirmpass']) ."<br/>";
          echo "Surname: " .trim($_POST['surname']) ."<br/>";
          echo "Firstname: " .trim($_POST['firstname']) ."<br/>";
          echo "Middlename: " .trim($_POST['middleName']) ."<br/>";
          echo "Section: " .$_POST['section'] ."<br/>";
          echo "Gender: " .$_POST['gender'] ."<br/>";
          echo "Year Level: " .$_POST['year_level'] ."<br/>";
          echo "Program: " .$_POST['program'] ."<br/>";
          echo "Department: " .$_POST['dept'] ."<br/>";
          echo "Course: " .$_POST['course'] ."<br/>";
         */
    }

    public function verify($username, $hash) {
        $this->administrator_model->verifyStudent($username, $hash);
        $this->template->setContent('login.tpl');
        $this->template->setAlert('Your Account was Successfully verified!... ', Template::ALERT_SUCCESS);
    }

    public function signatory_register() {
        if (isset($_POST['Save'])) {
            $sign_id = $this->signatoriallist_model->getSignId($_POST['sign_name']);
            $this->administrator_model->insertSignatory_User(trim($_POST['uname']), md5(trim($_POST['confirmpass'])), trim($_POST['surname']), trim($_POST['firstname']), trim($_POST['middleName']), NULL, 'Signatory', $sign_id);

//          echo "Password: " .trim($_POST['uname']) ."<br/>";
//          echo "Confirm Password: " .trim($_POST['newpass']) ."<br/>";
//          echo "Confirm Password: " .trim($_POST['confirmpass']) ."<br/>";
//          echo "Surname: " .trim($_POST['surname']) ."<br/>";
//          echo "Firstname: " .trim($_POST['firstname']) ."<br/>";
//          echo "Middlename: " .trim($_POST['middleName']) ."<br/>";
//          echo "Section: " .$_POST['sign_name'] ."<br/>";



            $this->template->setContent('login.tpl');
            $this->template->setAlert('Your registration form was succesfully save. See the Admin to confirmed your account!... ', Template::ALERT_SUCCESS);
        }
    }

    public function student_registrationForm($is_register = false, $isExist = false) {
        $this->template->setPageName("Student Registration Form");
        $this->template->setContent("student_registration.tpl");

        $listOfYear = $this->school_year_model->getListOfYear();
        $listOfDept_Name = $this->department_model->getListOfDepartments();
        $listOfDept_ID = $this->department_model->getListOfDept_ID();
        $ListDept_ID_inCourse = $this->courses_model->getListDept_ID_inCourse();

        $this->template->assign('years', $listOfYear);
        $this->template->assign('depts', $listOfDept_Name);
        $this->template->assign('dept_ID', $listOfDept_ID);
        $this->template->assign('dept_id_inCourses', $ListDept_ID_inCourse);

        if ($is_register) {
            $this->template->assign('s_name', trim($_POST['surname']));
            $this->template->assign('f_name', trim($_POST['firstname']));
            $this->template->assign('m_name', trim($_POST['middleName']));
            $this->template->assign('e_add', trim($_POST['emailAdd']));

            $this->template->setAlert('ID Number and Name of a student did not match to the enroll student database!... ', Template::ALERT_ERROR);
        }
        
        if($isExist){
            $this->template->assign('s_name', trim($_POST['surname']));
            $this->template->assign('f_name', trim($_POST['firstname']));
            $this->template->assign('m_name', trim($_POST['middleName']));
            $this->template->assign('e_add', trim($_POST['emailAdd']));
            
            $this->template->setAlert('Student ID Number is Already Exist!..', Template::ALERT_ERROR);
        }
    }

    public function signatory_registrationForm() {
        $this->template->setPageName("Signatory Registration Form");
        $this->template->setContent("signatory_registration.tpl");

        $listOfsignatory = $this->signatoriallist_model->getListofSignatory();

        $this->template->assign('signatories', $listOfsignatory);
    }

    private function setSession($account_type) {
        $result = mysql_fetch_array($this->administrator_model->getUser(trim($_POST['username']), md5(trim($_POST['password']))));

        Session::set_surname(trim($result['Surname']));
        Session::set_firstname(trim($result['First_Name']));
        Session::set_middlename(trim($result['Middle_Name']));
        Session::set_emailAdd(trim($result['email_address']));
        Session::set_photo(($result['Picture']));

        Session::set_Account_type($account_type);
    }

    public function display() {

        if (Session::user_exist()) {
            if (Session::get_Account_type() == 'Admin')
                header('Location: ' . HOST . '/administrator/');
            elseif (Session::get_Account_type() == 'Signatory')
                header('Location: ' . HOST . '/signatory/');
            elseif (Session::get_Account_type() == 'Student')
                header('Location: ' . HOST . '/student/');
        }else {
            $this->template->display('bootstrap.tpl');
        }

        $this->administrator_model->db_close();
    }

    /* ----------- for adding school year ---------------- */
    
    /*
      private function add_school_year(){
        $date = explode("-", date("Y-m-d"));
        $curDay = $date[2];
        $curMonth = $date[1];
        $curYear = $date[0];

        $hold = $this->school_year_model->getSchool_Year();
        $latestSchool_Year = $hold[count($hold) - 1];

        $latestYear = explode("-", $latestSchool_Year);
        $latestYear = $latestYear[1];

        if($curYear == $latestYear && $curMonth == 6 && $curDay == 7){
        $this->school_year_model->insert($curYear ."-" .($curYear + 1));
        }
      }
      */
     private function add_school_year(){
        $date = explode("-", date("Y-m-d"));
        //$curDay = intval($date[2]);
        $curMonth = intval($date[1]);
        $curYear = intval($date[0]);

        $getLastAddedSY = $this->school_year_model->getLastAddedSchoolYearInDatabase();
        $glYear = explode("-", $getLastAddedSY["School_Year"]);
        $glYear = $glYear[0];
        
        $cSem = array("First" => 0,
                      "Second" => 1,
                      "Summer" => 2);
        $glSem = $cSem[$getLastAddedSY["Semester"]];
        
        $hlCurrent = $this->convDateToSYSem($curMonth, $curYear);
        
        //echo($hlCurrent[0] . ">" . $glYear);
        //echo $hlCurrent[1] .">". $glSem;
        //var_dump((($hlCurrent[0] > $glYear) && ($hlCurrent[1] > $glSem)));
        if ($hlCurrent[0] > $glYear){
            
            $this->insertInterveningSchoolYears($glYear, $glSem, $hlCurrent[0], $hlCurrent[1]);
            
        }elseif($hlCurrent[0] == $glYear){
            if ($hlCurrent[1] > $glSem){
                $this->insertInterveningSchoolYears($glYear, $glSem, $hlCurrent[0], $hlCurrent[1]);
            }
        }
        
        
    }
    
    private function convDateToSYSem($tMonth, $tYear){
        $sem = "";
        $sy="";
        if($tMonth >= 1 && $tMonth <=3){
            $sem = 1; //second
            $sy=($tYear-1);
        }else if ($tMonth >= 6 && $tMonth <=10){
            $sem = 0; //first
            $sy=$tYear;
        }else if ($tMonth >=11 && $tMonth <=12){
            $sem = 1; //first
            $sy=$tYear;
        }else{
            $sem = 2; //summer
            $sy=($tYear-1);
        }
	return array($sy,$sem);
    }
    
    private function insertInterveningSchoolYears($startingYear,$startingSem,$endYear,$endSem){
        //$cSem = array("First" => 0,
                      //"Second" => 1,
                      //"Summer" => 2);
        $ccsSem = array(0 => "First",
                        1 => "Second",
                        2 => "Summer");
        
        for ($y=$startingYear; $y<=$endYear; $y++){
            for ($s=0; $s<=2; $s++){
                $this->school_year_model->insertSchoolYear($y . "-" . ($y+1), $ccsSem[$s]);
                if ($y == $endYear && $s == $endSem) break;
            }
        }
    }
    
    
      
     
}

$controller = new Index();
$controller->perform_actions();
$controller->display();
?>
