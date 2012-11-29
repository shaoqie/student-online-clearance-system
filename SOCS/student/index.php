<?php

/**
 * Student's Index Page
 *
 * @author Ozy
 */

require_once '../config/config.php';

class Index extends Controller{

    public function __construct() {
        parent::__construct();
        
        echo "Student's Page";
    }

    public function display() {
        //displaying the UI
    }
}

$controller = new Index();
$controller->display();

?>
