<?php

/**
 * Main Index Page
 *
 * @author Ozy
 */
require_once 'config/config.php';

class Index extends Controller {
    
    private $template;
    private $administrator_model;

    public function __construct() {
        parent::__construct();
        
        $this->administrator_model = new Administrator_Model();

        $this->template = new Template();
        $this->template->setPageName('Home');
        $this->template->setContent('login.tpl');
        
    }
    
    public function login(){
        if($this->administrator_model->isExist(trim($_POST['username']), trim($_POST['password']))){
            Session::set_user($_POST['username']);
            header('Location: /SOCS/administrator/');
            exit;
        }else{
            header('Location: index.php?action=login_error');
            exit;
        }
       // $this->administrator_model->isExist(trim($_POST['username']), trim($_POST['password']));
    }
    
    public function logout(){
        Session::destroy();
        $this->template->setAlert('Logout Successfully!', Template::ALERT_SUCCESS);
    }
    
    public function login_error(){
        $this->template->setAlert('Error Logging in... ', Template::ALERT_ERROR);
    }

    public function display() {
        
        if(Session::user_exist()){
            header('Location: /SOCS/administrator');
        }else{
            $this->template->display('simple.tpl');
        }
        
        $this->administrator_model->db_close();
    }
    
}

$controller = new Index();
$controller->perform_actions();
$controller->display();
?>
