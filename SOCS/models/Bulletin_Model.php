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
    private $itemsPerPage = 10;
    
    public function __construct() {        
        parent::__construct();
        
        $this->query = "";
    }
    
    public function insert($Tsign_id, $Tsy_id, $Tmsg){
         mysql_query("INSERT INTO `socs`.`bulletin` (`Bulletin_ID`, `Signatory_ID`, `SY_SEM_ID`, `Post_Date`, `Post_Time`, `Message`) 
             VALUES (NULL, '$Tsign_id', '$Tsy_id', CURDATE(), CURTIME(), '$Tmsg')");
    }
    
    public function deleteBulletin($Tsign_id){
        mysql_query("delete from bulletin where Bulletin_ID = '$Tsign_id'");
    }
    
    public function getListofID($sign_id, $page, $search){
        $rowInfo = array();
        $this->query = mysql_query("select Bulletin_ID from bulletin where Signatory_ID = '$sign_id' AND
                                    (post_date like '%$search%' OR post_time like '%$search%')
                                    order by post_date desc, post_time desc
                                    LIMIT " . (($page - 1) * $this->itemsPerPage) . ", " . $this->itemsPerPage);
        
        while($row = mysql_fetch_array($this->query)){
            array_push($rowInfo, $row['Bulletin_ID']);
        }
        
        return $rowInfo;
    }
    
    public function getListofMessages($sign_id, $sysem_id, $page, $search){
        $rowInfo = array();
        $this->query = mysql_query("select Message from bulletin where Signatory_ID = '$sign_id' AND sy_sem_id = '$sysem_id' AND
                                    (post_date like '%$search%' OR post_time like '%$search%')
                                    order by post_date desc, post_time desc
                                    LIMIT " . (($page - 1) * $this->itemsPerPage) . ", " . $this->itemsPerPage);
        
        while($row = mysql_fetch_array($this->query)){
            array_push($rowInfo, $row['Message']);
        }
        
        return $rowInfo;
    }
    
    public function getListofPost_Date($sign_id, $sysem_id, $page , $search){
        $rowInfo = array();
        $this->query = mysql_query("select Post_Date from bulletin where Signatory_ID = '$sign_id' AND sy_sem_id = '$sysem_id' AND
                                    (post_date like '%$search%' OR post_time like '%$search%')
                                    order by post_date desc, post_time desc
                                    LIMIT " . (($page - 1) * $this->itemsPerPage) . ", " . $this->itemsPerPage);
        
        while($row = mysql_fetch_array($this->query)){
            array_push($rowInfo, $row['Post_Date']);
        }
        
        return $rowInfo;
    }
    
    public function getListofPost_Time($sign_id, $sysem_id, $page, $search){
        $rowInfo = array();
        $this->query = mysql_query("select Post_Time from bulletin where Signatory_ID = '$sign_id' AND sy_sem_id = '$sysem_id' AND
                                    (post_date like '%$search%' OR post_time like '%$search%')
                                    order by post_date desc, post_time desc
                                    LIMIT " . (($page - 1) * $this->itemsPerPage) . ", " . $this->itemsPerPage);
        
        while($row = mysql_fetch_array($this->query)){
            array_push($rowInfo, $row['Post_Time']);
        }
        
        return $rowInfo;
    }
  
    public function getListofPost_DateTime($sign_id, $sysem_id, $page, $search){
        $rowInfo = array();
        $this->query = mysql_query("select concat(post_date, ' | ', post_time) as datetime from bulletin where Signatory_ID = '$sign_id' AND sy_sem_id = '$sysem_id' AND
                                    (post_date like '%$search%' OR post_time like '%$search%')
                                    order by post_date desc, post_time desc
                                    LIMIT " . (($page - 1) * $this->itemsPerPage) . ", " . $this->itemsPerPage);
        
        while($row = mysql_fetch_array($this->query)){
            array_push($rowInfo, $row['datetime']);
        }
        
        return $rowInfo;
    }
    
    public function getMessage_PageSize($sign_id, $sysem_id, $search){
        $this->query = mysql_query("select Post_Time from bulletin where Signatory_ID = '$sign_id' AND sy_sem_id = '$sysem_id' AND
                                    (post_date like '%$search%' OR post_time like '%$search%')
                                    order by post_date desc, post_time desc");
        
        return mysql_num_rows($this->query) / $this->itemsPerPage;
    }
    
    
    /*----------------- For Bulliten ----------------------------*/
    
    public function getPost_Messages($T_key, $T_sign_id){
        $this->query = mysql_query("select Message from bulletin where bulletin_id = '$T_key' AND signatory_id = '$T_sign_id'");
        
        $row = mysql_fetch_array($this->query);
        
        return $row['Message'];
    }
    
    public function getPost_Date($T_key, $T_sign_id){
        $this->query = mysql_query("select post_date from bulletin where bulletin_id = '$T_key' AND signatory_id = '$T_sign_id'");
        
        $row = mysql_fetch_array($this->query);
        
        return $row['post_date'];
    }
    
    public function getPost_Time($T_key, $T_sign_id){
        $this->query = mysql_query("select post_time from bulletin where bulletin_id = '$T_key' AND signatory_id = '$T_sign_id'");
        
        $row = mysql_fetch_array($this->query);
        
        return $row['post_time'];
    }
}

?>
