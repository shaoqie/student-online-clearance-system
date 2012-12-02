<?php

/**
 * Signatory_List_Manager Controller
 *
 * @author Manipis
 */
require_once '../config/config.php';

class Signatory_List_Manager extends Controller{
    
    private $template;
    
    public function __construct() {
        parent::__construct();
        
        $this->template = new Template();
        $this->template->setPageName('Signatory List Manager');
        $this->template->setContent('signatory_list_manager.tpl');
        $this->template->set_UserInfo("" .Session::get_Surname() .", " .Session::get_Firstname() ." " .Session::get_Middlename() .".");
        
    }
    
    public function display() {
        $this->template->display('simple.tpl');
    }
}

$controller = new Signatory_List_Manager();
$controller->perform_actions();
$controller->display();

?>
