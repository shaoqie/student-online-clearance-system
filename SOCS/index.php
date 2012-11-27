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
        $this->template->setContent('views/login.tpl');
    }

    public function login() {
        if ($this->admin->isEqual($_POST['username'], $_POST['password'])) {
            //$this->template->setPageName('Correct');
        } else {
            //$this->template->setPageName('Error');
        }
    }

    public function display() {
        $this->template->display(TEMPLATE);
    }

}

$controller = new Index();
$controller->perform_actions();
$controller->display();
?>
