<?php

/**
 * Login Page of Signatory, Administrator, and Student
 *
 * @author Ozy
 */

require_once 'libs/Controller.php';

class Login extends Controller{

    private $template;
    
    public function __construct() {
        parent::__construct();
        
        $this->template = new Template();
        $this->template->setPageName('Login');
        $this->template->setContent('views/login.tpl');
    }

    public function display() {
        $this->template->display(TEMPLATE);
    }
}

$controller = new Login();
$controller->display();

?>
