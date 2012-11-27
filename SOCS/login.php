<?php

/**
 * Login Page of Signatory, Administrator, and Student
 *
 * @author Ozy
 */

require_once 'libs/Controller.php';
require_once 'libs/Template.php';

class Login extends Controller{

    private $template;
    
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

$controller = new Login();
$controller->display();

?>
