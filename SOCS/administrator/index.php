<?php

/**
 * Administrator's index page
 *
 * @author Ozy
 */

require_once '../libs/Controller.php';
require_once '../libs/Session.php';
require_once '../administrator/admin_libs/Template.php';

class Index extends Controller{
    
    private $template;

    public function __construct() {
        parent::__construct();
        
        $this->template = new Template();
        $this->template->setPageName('Home');
        $this->template->setContent('views/index.tpl');
    }

    public function display() {
        $this->template->display('views/administrator.tpl');
    }
}

$controller = new Index();
$controller->display();

?>
