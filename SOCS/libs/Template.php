<?php

/**
 * Mao ni ang tawagon kung mag.butang nta ug data sa atong template
 *
 * @author Ozy
 */

require_once PATH.'/libs/smarty/Smarty.class.php';

class Template extends Smarty {
    
    const ALERT_ERROR = 'alert alert-error fade in';
    const ALERT_INFO = 'alert alert-info fade in';
    const ALERT_WARNING = 'alert fade in';
    const ALERT_SUCCESS = 'alert alert-success fade in';

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
        $this->assign('content', $tpl_file);
    }
    
    public function setAlert($msg, $alert_type = self::ALERT_WARNING){
        
        $pre_msg = "";
        
        if($alert_type == self::ALERT_ERROR){
            $pre_msg = "Error! ";
        }else if($alert_type == self::ALERT_INFO){
            $pre_msg = "Oops! ";
        }else if($alert_type == self::ALERT_SUCCESS){
            $pre_msg = "Success! ";
        }else{
            $pre_msg = "Warning! ";
        }
        
        $alert = "<div class='$alert_type'>".
                "<a href='#' class='close' data-dismiss='alert'><i class='icon-remove'></i></a>".
                "<strong>$pre_msg</strong>$msg".
                "</div>";
        
        $this->assign('alert', $alert);
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
    
    public function set_header_right($tpl_file){
        $this->assign('header_right', $tpl_file);
    }
}

?>
