<?php

/**
 * Administrator's Index Page
 *
 * @author Ozy
 */
require_once '../config/config.php';

class Index extends Controller {

    public function __construct() {
        parent::__construct();

        if (Session::user_exist()) {
            echo "Admin Page<br>";
            echo "<a href='../index.php?action=logout'>Logout</a>";
        } else {
            header('Location: /SOCS/');
        }
    }

    public function display() {
        
    }

}

$controller = new Index();
$controller->perform_actions();
$controller->display();
?>
