<?php

/**
 * Student's Index Page
 *
 * @author Ozy
 */
require_once '../config/config.php';

class Index extends Controller {

    public function __construct() {
        parent::__construct();

        if (Session::user_exist() && Session::get_Account_type() == "Student") {
            echo "Student Page<br>";
            echo "<a href='../index.php?action=logout'>Logout</a><br>";
            echo "<a href='../settings.php'>Account Settings</a>";
        } else {
            header('Location: /SOCS/index.php');
        }
    }

    public function display() {
        //displaying the UI
    }

}

$controller = new Index();
$controller->perform_actions();
$controller->display();
?>
