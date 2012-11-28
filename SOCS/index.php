<?php

/**
 * Main Index Page
 *
 * @author Ozy
 */
require_once 'libs/Controller.php';
require_once 'models/Administrator_Model.php';

class Index extends Controller {

    private $admin;
    private $template;

    public function __construct() {
        parent::__construct();

        $this->admin = new Administrator_Model();
        $this->template = new Template();
        $this->template->setPageName('Login');
        
        if(Session::user_exist()){
            $this->template->assign('username', Session::get_user());
            $this->template->setContent('views/welcome.tpl');
        }else{
            $this->template->setContent('views/login.tpl');
        }
        
    }

    public function login() {
        if ($this->admin->isEqual($_POST['username'], $_POST['password'])) {
            Session::set_user($_POST['username']);   
        }
        
        header('Location: /SOCS/');
    }
    
    public function logout(){
        Session::destroy();
        
        header('Location: /SOCS/');
    }

    public function display() {
        $this->template->display(TEMPLATE);
    }

}

$controller = new Index();
$controller->perform_actions();
$controller->display();
?>
