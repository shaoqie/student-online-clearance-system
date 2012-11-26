<?php

/**
 * Description of Template
 *
 * @author Manipis
 */

require_once '../libs/smarty/Smarty.class.php';

class Template extends Smarty{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function setPageName($page_name){
        $this->assign('page', $page_name);
    }
    
    public function setContent($tpl_file){
        $this->assign('tpl_file', $tpl_file);
    }
}

?>
