<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Bulletin_Model
 *
 * @author ronversa09
 */

  
class Bulletin_Model extends Model{
    private $query;
    
    public function __construct() {        
        parent::__construct();
        
        $this->query = "";
    }
    
    public function insert($Tsign_id, $Tsy_id, $Tmsg){
         mysql_query("INSERT INTO `socs`.`bulletin` (`Bulletin_ID`, `Signatory_ID`, `SY_SEM_ID`, `Post_Date`, `Post_Time`, `Message`) 
             VALUES (NULL, '$Tsign_id', '$Tsy_id', CURDATE(), CURTIME(), '$Tmsg')");
    }
    
}

?>
