<?php

/**
 * Signatory's Index Page
 *
 * @author Ozy
 */

require_once '../config/config.php';

class Index extends Controller{

    public function __construct() {
        parent::__construct();
        
         if (Session::user_exist() && Session::get_Account_type() == "Signatory") {
            echo "Signatory Page<br>";
            echo "<a href='../index.php?action=logout'>Logout</a>";
        } else {
            header('Location: /SOCS/');
        }
    }

    public function display() {
        //displaying the UI
    }
}

$controller = new Index();
$controller->display();

?>
