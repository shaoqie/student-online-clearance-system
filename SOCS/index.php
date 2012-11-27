<?php

/**
 * Main Index Page
 *
 * @author Ozy
 */

require_once 'libs/Controller.php';
require_once 'libs/Template.php';

class Index extends Controller{

    public function __construct() {
        parent::__construct();
        
        $this->template = new Template();
        $this->template->setPageName('Login');
        $this->template->setContent('views/login.tpl');
    }

    public function display() {
        $this->template->display('views/templates/simple.tpl');
    }
}

$controller = new Index();
$controller->display();

?>
