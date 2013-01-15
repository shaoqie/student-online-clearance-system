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
    private $itemsPerPage = 5;
    
    public function __construct() {        
        parent::__construct();
        
        $this->query = "";
    }
    
    public function insert($Tsign_id, $Tsy_id, $Tmsg){
         mysql_query("INSERT INTO `socs`.`bulletin` (`Bulletin_ID`, `Signatory_ID`, `SY_SEM_ID`, `Post_Date`, `Post_Time`, `Message`) 
             VALUES (NULL, '$Tsign_id', '$Tsy_id', CURDATE(), CURTIME(), '$Tmsg')");
    }
    
    public function getListofMessages($sign_id, $page){
        $rowInfo = array();
        $this->query = mysql_query("select Message from bulletin where Signatory_ID = '$sign_id' 
                                    order by post_date desc, post_time desc
                                    LIMIT " . (($page - 1) * $this->itemsPerPage) . ", " . $this->itemsPerPage);
        
        while($row = mysql_fetch_array($this->query)){
            array_push($rowInfo, $row['Message']);
        }
        
        return $rowInfo;
    }
    
    public function getListofPost_Date($sign_id, $page){
        $rowInfo = array();
        $this->query = mysql_query("select Post_Date from bulletin where Signatory_ID = '$sign_id'
                                    order by post_date desc, post_time desc
                                    LIMIT " . (($page - 1) * $this->itemsPerPage) . ", " . $this->itemsPerPage);
        
        while($row = mysql_fetch_array($this->query)){
            array_push($rowInfo, $row['Post_Date']);
        }
        
        return $rowInfo;
    }
    
    public function getListofPost_Time($sign_id, $page){
        $rowInfo = array();
        $this->query = mysql_query("select Post_Time from bulletin where Signatory_ID = '$sign_id'
                                    order by post_date desc, post_time desc
                                    LIMIT " . (($page - 1) * $this->itemsPerPage) . ", " . $this->itemsPerPage);
        
        while($row = mysql_fetch_array($this->query)){
            array_push($rowInfo, $row['Post_Time']);
        }
        
        return $rowInfo;
    }
  
    public function getStudMessage_PageSize($sign_id){
        $this->query = mysql_query("select Post_Time from bulletin where Signatory_ID = '$sign_id'
                                    order by post_date desc, post_time desc");
        
        return mysql_num_rows($this->query) / $this->itemsPerPage;
    }
}

?>
