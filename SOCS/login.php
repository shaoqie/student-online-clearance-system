<?php

/**
 * Login Page of Signatory, Administrator, and Student
 *
 * @author Ozy
 */

require_once '../libs/Controller.php';

class Login extends Controller{

    public function __construct() {
        parent::__construct();
        
        echo "Login";
    }

    public function display() {
        //displaying the UI
    }
}

$controller = new Index();
$controller->display();

?>
