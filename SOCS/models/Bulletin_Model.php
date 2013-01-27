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
    
    private $ID;
    private $Messages;
    private $Post_Date;
    private $Post_Time;
    private $Date_Time;
    
    public function __construct() {        
        parent::__construct();
        
        $this->query = "";
    }
    
    public function getID(){
        return $this->ID;
    }
    
    public function getMessages(){
        return $this->Messages;
    }
    
    public function getPostDate(){
        return $this->Post_Date;
    }
    
    public function getPostTime(){
        return $this->Post_Time;
    }
    
    public function getPost_DateTime(){
        return $this->Date_Time;
    }
    
    public function insert($Tsign_id, $Tsy_id, $Tmsg){
         mysql_query("INSERT INTO `socs`.`bulletin` (`Bulletin_ID`, `Signatory_ID`, `SY_SEM_ID`, `Post_Date`, `Post_Time`, `Message`) 
             VALUES (NULL, '$Tsign_id', '$Tsy_id', CURDATE(), CURTIME(), '$Tmsg')");
    }
    
    public function deleteBulletin($Tsign_id){
        mysql_query("delete from bulletin where Bulletin_ID = '$Tsign_id'");
    }
    
    public function filter($sign_id, $sysem_id, $page, $search){
        $this->query = mysql_query("select *, concat(post_date, ' | ', post_time) as datetime  from bulletin where Signatory_ID = '$sign_id' AND sy_sem_id = '$sysem_id' AND
                                    (post_date like '%$search%' OR post_time like '%$search%')
                                    order by post_date desc, post_time desc
                                    LIMIT " . (($page - 1) * $this->itemsPerPage) . ", " . $this->itemsPerPage);
        $this->ID = array();
        $this->Messages = array();
        $this->Post_Date = array();
        $this->Post_Time = array();
        $this->Date_Time = array();
        
        while($row = mysql_fetch_array($this->query)){
            array_push($this->ID, $row['Bulletin_ID']);
            array_push($this->Messages, $row['Message']);
            array_push($this->Post_Date, $row['Post_Date']);
            array_push($this->Post_Time, $row['Post_Time']);
            array_push($this->Date_Time, $row['datetime']);
        }
        
    }
    
    /*
    public function getListofID($sign_id, $sysem_id, $page, $search){
        $rowInfo = array();
        $this->query = mysql_query("select Bulletin_ID from bulletin where Signatory_ID = '$sign_id' AND sy_sem_id = '$sysem_id' AND
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
    } */
    
    
    public function getMessage_PageSize($sign_id, $sysem_id, $search){
        $this->query = mysql_query("select Post_Time from bulletin where Signatory_ID = '$sign_id' AND sy_sem_id = '$sysem_id' AND
                                    (post_date like '%$search%' OR post_time like '%$search%')
                                    order by post_date desc, post_time desc");
        
        return mysql_num_rows($this->query) / $this->itemsPerPage;
    }
      
    
    /*----------------- For Bulliten ----------------------------*/
    
    public function ViewBulletin($T_key, $T_sign_id){
        $this->query = mysql_query("select * from bulletin where bulletin_id = '$T_key' AND signatory_id = '$T_sign_id'");
    
        $row = mysql_fetch_array($this->query);
        
        $this->Messages = $row['Message'];
        $this->Post_Date = $row['Post_Date'];
        $this->Post_Time = $row['Post_Time'];              
    }
    
//    public function getPost_Messages($T_key, $T_sign_id){
//        $this->query = mysql_query("select Message from bulletin where bulletin_id = '$T_key' AND signatory_id = '$T_sign_id'");
//        
//        $row = mysql_fetch_array($this->query);
//        
//        return $row['Message'];
//    }
//    
//    public function getPost_Date($T_key, $T_sign_id){
//        $this->query = mysql_query("select post_date from bulletin where bulletin_id = '$T_key' AND signatory_id = '$T_sign_id'");
//        
//        $row = mysql_fetch_array($this->query);
//        
//        return $row['post_date'];
//    }
//    
//    public function getPost_Time($T_key, $T_sign_id){
//        $this->query = mysql_query("select post_time from bulletin where bulletin_id = '$T_key' AND signatory_id = '$T_sign_id'");
//        
//        $row = mysql_fetch_array($this->query);
//        
//        return $row['post_time'];
//    }
}

?>
