<?php

/**
 * Mao ni ang tawagon kung mag.butang nta ug data sa atong template
 *
 * @author Ozy
 */

require_once PATH.'/libs/smarty/Smarty.class.php';

class Template extends Smarty {
    
    const ALERT_ERROR = 'red';
    const ALERT_INFO = 'blue';
    const ALERT_WARNING = 'orange';
    const ALERT_SUCCESS = 'green';
    const ALERT = 'black';

    public function __construct() {
        parent::__construct();
        
        $templatesDir = array(
            'main_views' => PATH.'/views/main_views', 
            'administrator_views' => PATH.'/views/administrator_views/',
            'signatory_views' => PATH.'/views/signatory_views/',
            'student_views' => PATH.'/views/student_views/',
            'templates' => PATH.'/views/templates/');
        
        $this->setTemplateDir($templatesDir);
        $this->setCompileDir(PATH.'/libs/smarty/templates_c/');
        $this->setConfigDir(PATH.'/libs/smarty/configs/');
        $this->setCacheDir(PATH.'/libs/smarty/cache/');
        
        $this->assign('alert', '');
        $this->assign('path', PATH);
        $this->assign('host', HOST);
    }
    
    public function setPageName($page_name){
        $this->assign('page_name', $page_name);
    }
    
    public function setContent($tpl_file){
        $this->assign('tpl_file', $tpl_file);
    }
    
    public function setAlert($msg, $alert_type = self::ALERT){
        $this->assign('alert', "<td><div style='color: $alert_type'>$msg</div></td>");
    }
    
    public function set_UserInfo($user_info){
        $this->assign('user_info', $user_info);
    }
    
    public function set_Name($name){
        $this->assign('myName', $name);
    }
    
    public function set_Photos($photos){
        $this->assign('myPhotos', $photos);
    }
    
    public function set_Type($type){
        $this->assign('myType', $type);
    }
    
    public function set_Filter($filter){
        $this->assign('filter', $filter);
    }
}

?>
