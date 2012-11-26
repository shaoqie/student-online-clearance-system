<?php

/**
 * Administrator's Index Page
 *
 * @author Ozy
 */

require_once '../libs/Controller.php';
require_once '../libs/Session.php';
require_once '../administrator/admin_libs/Template.php';

class Login extends Controller{

    private $template;
    
    public function __construct() {
        parent::__construct();
        
        $this->template = new Template();
        $this->template->setPageName('Login');
        
        if(!Session::has_administrator()){
            $this->template->setContent('views/login.tpl');
        }else{
            header('Location: index.php');
        }
    }
    
    public function login(){
        
    }

    public function display() {
        $this->template->display('views/administrator.tpl');
    }
}

$controller = new Login();
$controller->display();
?>
