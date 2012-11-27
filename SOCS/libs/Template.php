<?php

/**
 * Mao ni ang tawagon kung mag.butang nta ug data sa atong template
 *
 * @author Ozy
 */

require_once 'smarty/Smarty.class.php';

class Template extends Smarty {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function setPageName($page_name){
        $this->assign('page_name', $page_name);
    }
    
    public function setContent($tpl_file){
        $this->assign('tpl_file', $tpl_file);
    }
}

?>
