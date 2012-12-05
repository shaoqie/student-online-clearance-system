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

    public function __construct() {
        parent::__construct();
        if (Session::user_exist() && Session::get_Account_type() == "Admin") {

            $this->administrator_model = new User_Model();
            $this->template = new Template();
            $this->template->setPageName('Administrator Page');

            $this->template->set_username(Session::get_user());
            $this->template->set_surname(Session::get_Surname());
            $this->template->set_firstname(Session::get_Firstname());
            $this->template->set_middlename(Session::get_Middlename());
            $this->template->set_account_type(Session::get_Account_type());

            $this->template->setContent('dashboard.tpl');

            $this->displayTable('', 1);
        } else {
            header('Location: ' . HOST);
        }
    }

    private function getListofKey($searchName, $page) {
        $key = array();
        $query = $this->administrator_model->getListofUsers($searchName, $page);
        while ($row = mysql_fetch_array($query)) {
            array_push($key, $row['Username']);
        }

        return $key;
    }

    private function getNameofUser($searchName, $page) {
        $name = array();
        $query = $this->administrator_model->getListofUsers($searchName, $page);
        while ($row = mysql_fetch_array($query)) {
            array_push($name, $row['Name']);
        }

        return $name;
    }

    private function getPictureofUser($searchName, $page) {
        $picture = array();
        $query = $this->administrator_model->getListofUsers($searchName, $page);
        while ($row = mysql_fetch_array($query)) {
            array_push($picture, $row['Picture']);
        }

        return $picture;
    }

    private function getTypeeofUser($searchName, $page) {
        $type = array();
        $query = $this->administrator_model->getListofUsers($searchName, $page);
        while ($row = mysql_fetch_array($query)) {
            array_push($type, $row['Account_Type']);
        }

        return $type;
    }

    public function delete($selected) {
        $explode = explode("-", $selected);
        foreach ($explode as $value) {
            $this->administrator_model->deleteUser(trim($value));
        }
    }

    public function displayTable($searchName, $page) {
        $numOfPages = $this->administrator_model->getQueryPageSize($searchName);
        $numOfResults = count($this->getNameofUser($searchName, $page));

        $this->template->assign('myKey', $this->getListofKey($searchName, $page));

        $this->template->set_Name($this->getNameofUser($searchName, $page));
        $this->template->set_Photos($this->getPictureofUser($searchName, $page));
        $this->template->set_Type($this->getTypeeofUser($searchName, $page));
        $this->template->set_Filter($searchName);
        $this->template->assign('end', $numOfPages);
        $this->template->assign('rowCount', $numOfResults);

        if ($numOfResults == 0) {
            $this->template->setAlert('No Results Found.', Template::ALERT_ERROR);
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
