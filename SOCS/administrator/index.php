<?php

/**
 * Administrator's Index Page
 *
 * @author Ozy
 */

require_once 'libs/Controller.php';

class Index extends Controller{

    public function __construct() {
        parent::__construct();
        
        echo "Admin Page";
    }

    public function display() {
        //displaying the UI
    }
}

$controller = new Index();
$controller->display();

?>
