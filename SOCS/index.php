<?php

/**
 * Main Index Page
 *
 * @author Ozy
 */

require_once 'libs/Controller.php';
require_once 'libs/Template.php';
require_once 'administrator/adminAccount.php';

class Index extends Controller{
    private $admin;
    private $template;
    
    public function __construct() {
        parent::__construct();
        
        $this->admin = new adminAccount();
        $this->template = new Template();
        $this->template->setPageName('Login');
        $this->template->setContent('views/login.tpl');
    }

    public function login(){
        if($this->admin->isEqual($_POST['username'], $_POST['password'])){
            //$this->template->setPageName('Correct');
        }else{
            //$this->template->setPageName('Error');
        }
    }
    
    public function display() {
        $this->template->display('views/templates/simple.tpl');
    }
}

$controller = new Index();
$controller->perform_actions();
$controller->display();

?>
