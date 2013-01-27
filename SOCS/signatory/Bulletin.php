<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Bulletin
 *
 * @author ronversa09
 */
require_once '../config/config.php';

class bulletin extends Controller {

    private $template;
    private $user_model;
    private $schoolYearSem_model;
    private $signatorialList_model;
    private $bulletin_model;

    public function __construct() {
        parent::__construct();
        if (Session::user_exist() && Session::get_Account_type() == "Signatory") {
            $this->template = new Template();
            $this->user_model = new User_Model();
            $this->schoolYearSem_model = new SchoolYearSem_Model();
            $this->signatorialList_model = new SignatorialList_Model();
            $this->bulletin_model = new Bulletin_Model();

            $listOfSchoolYear = $this->schoolYearSem_model->getSchool_Year();
            $currentSemester = $this->schoolYearSem_model->getCurSemester();
            $currentSchool_Year = $this->schoolYearSem_model->getCurSchool_Year();

            $this->template->setPageName('Bulletin Page');

            $this->template->set_username(Session::get_user());
            $this->template->set_surname(Session::get_Surname());
            $this->template->set_firstname(Session::get_Firstname());
            $this->template->set_middlename(Session::get_Middlename());
            $this->template->set_account_type(Session::get_Account_type() . " in Charge -");

            $this->template->setContent('BulletinPage.tpl');
            $this->template->setCalendar('Calendar.tpl');
            $this->template->setSchool_YearSemContent('SchoolYear_Sem.tpl');
            $this->template->assign('assign_sign', ", " . Session::get_AssignSignatory());
            $this->template->assign('mySchool_Year', $listOfSchoolYear);
            $this->template->assign('currentSemester', $currentSemester);
            $this->template->assign('currentSchool_Year', $currentSchool_Year);

            $this->displayTable('', 1, "default");

            if (isset($_GET['successAdd'])) {
                if ($_GET['successAdd'] == 'true') {
                    $this->template->setAlert("Posting a Bulletin was Successful", Template::ALERT_SUCCESS, 'alert');
                }
            }
        } else {
            header('Location: /SOCS/');
        }
    }

    public function filter($filterName) {
        $this->displayTable(trim($filterName), 1);
    }

    public function displayTable($searchName, $page, $finder) {
        if (isset($_POST['GO'])) {
            $sy_id = $this->schoolYearSem_model->getSy_ID(trim($_POST['school_year']), trim($_POST['semester']));
            $this->template->assign('currentSemester', trim($_POST['semester']));
            $this->template->assign('currentSchool_Year', trim($_POST['school_year']));
        } else if (isset($_GET['sy']) && isset($_GET['sem'])) {
            $sy_id = $this->schoolYearSem_model->getSy_ID(trim($_GET['sy']), trim($_GET['sem']));
            $this->template->assign('currentSemester', trim($_GET['sem']));
            $this->template->assign('currentSchool_Year', trim($_GET['sy']));
        } else {
            $sy_id = $this->schoolYearSem_model->getSy_ID($this->schoolYearSem_model->getCurSchool_Year(), $this->schoolYearSem_model->getCurSemester());
        }



        $t_sign_id = $this->signatorialList_model->getSignId(Session::get_AssignSignatory());
        $this->bulletin_model->filter($t_sign_id, $sy_id, $page, $searchName);
        
        $numOfPages = $this->bulletin_model->getMessage_PageSize($t_sign_id, $sy_id, $searchName);
        $getListofID = $this->bulletin_model->getID();
        $getListofMessages = $this->bulletin_model->getMessages();
        $getListofDateTime = $this->getListofName($this->bulletin_model->getPost_DateTime(), $searchName, $finder);

        $numOfResults = count($getListofMessages);

        $this->template->assign('myMessage_ID', $getListofID);
        $this->template->assign('myName_messages', $this->getMaximumStrLen($getListofMessages));
        $this->template->assign('my_dateTime', $getListofDateTime);
        $this->template->assign('filter', $searchName);
        $this->template->assign('bulletin_length', $numOfPages);
        $this->template->assign('rowCount_bulletin', $numOfResults);

        if ($numOfResults == 0) {
            $this->template->setAlert('No Results Found.', Template::ALERT_ERROR, 'alert');
        }
    }

    /* ----------- For Bulletin Page ------------ */

    public function viewPosting_Bulletin() {
        $this->template->setPageName('Posting Bulletin Page');
        $this->template->setContent('Post_BulletinPage.tpl');

        $sign_id = $this->signatorialList_model->getSignId(Session::get_AssignSignatory());
        $sy_id = $this->schoolYearSem_model->getSy_ID(trim($_POST['school_year']), trim($_POST['semester']));



        if (isset($_POST['postBulletin'])) {
            if (trim($_POST['post_message']) != "") {
                $this->bulletin_model->insert($sign_id, $sy_id, trim($_POST['post_message']));
                //$this->template->setAlert("Posting Bulletin was Successful!... ", Template::ALERT_SUCCESS);
//                var_dump(trim($_POST['school_year']));
//                var_dump(trim($_POST['semester']));
//                var_dump($sy_id);
                header('Location: bulletin.php?successAdd=true');
            } else {
                $this->template->setAlert("Cannot Post an empty field!... ", Template::ALERT_ERROR);
            }
        }
    }

    public function viewPosted_Bulletin($key) {
        $this->template->setPageName('View Already Posted Bulletin Page');
        $this->template->setContent('ViewPostedBulletin.tpl');

        $sign_id = $this->signatorialList_model->getSignId(Session::get_AssignSignatory());
        
        $this->bulletin_model->ViewBulletin($key, $sign_id);
        
        $message = $this->parsingLengthPerLine($this->bulletin_model->getMessages());
        $date = $this->getDate($this->bulletin_model->getPostDate());
        $time = $this->bulletin_model->getPostTime();

        $this->template->assign('message', $this->parsingNewLine($message));
        $this->template->assign('date', $date);
        $this->template->assign('time', $time);
    }

    public function display() {
        $this->template->display('bootstrap.tpl');
    }

    /* ------------ Special Purposes --------------- */

    public function deleted() {
        $this->template->setAlert('Delete an Posting Bulletin was Successfully!..', Template::ALERT_SUCCESS, 'alert');
    }

    public function delete($selected) {
        $explode = explode("-", $selected);
        foreach ($explode as $value) {
            $this->bulletin_model->deleteBulletin(trim($value));
        }
        $HOST = $explode[0] != null ? HOST . "/signatory/bulletin.php?action=deleted" : HOST . "/signatory/bulletin.php";
        header('Location: ' . $HOST);
    }

    public function getMaximumStrLen($strArray) {
        $temp = array();

        foreach ($strArray as $value) {
            $hold = strlen($value) > 15 ? substr($value, 0, 15) . "........ .... ." : $value;
            array_push($temp, $hold);
        }

        return $temp;
    }

    /* ------------------------------------------ */

    private function parsingNewLine($_messages) {
        $temp = explode("\r\n", $_messages);
        $strTemp = "";

        foreach ($temp as $newvalue) {
            $strTemp .= $newvalue . "<br/>";
        }

        return $strTemp;
    }

    private function parsingLengthPerLine($_str) {
        $_array = str_split($_str);
        $_strTemp = "";

        $counter = 0;
        foreach ($_array as $value) {
            if ($counter >= 40) {
                $_strTemp .= $value . "<br/>";
                $counter = -1;
            } else {
                $_strTemp .= $value;
                $counter++;
            }
        }

        return $_strTemp;
    }

    /* ---------- for Date into word ---------------- */

    public function getDate($T_Date) {
        $t_month;
        $t_day;
        $t_year;

        $concatDate = "";

        $temp_date = explode("-", $T_Date);
        $t_year = trim($temp_date[0]);
        $t_month = trim($this->convertMonth(trim($temp_date[1])));
        $t_day = trim($temp_date[2]);

        return $t_month . " " . $t_day . ", " . $t_year;
    }

    public function convertMonth($month) {
        $_month = array("January", "Febuary", "March", "April",
            "May", "June", "July", "August",
            "September", "October", "November", "December");

        return $_month[$month - 1];
    }

}

$controller = new bulletin();
$controller->perform_actions();
$controller->display();
?>
