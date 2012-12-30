<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Message_Model
 *
 * @author ronversa09
 */
class Message_Model extends Model{
    private $query;
    
    public function __construct() {        
        parent::__construct();
        
        $this->query = "";
    }
    
    public function getListofMessages($stud_sender, $sign_sender){
        $arrTemp = array();
        $this->query = mysql_query("select Message from messages
                                    inner join schoolyearsem on schoolyearsem.SY_SEM_ID = messages.SY_SEM_ID
                                    inner join signatories on signatories.signatory_id = messages.signatory_id
                                    inner join students on students.student_id = messages.student
                                    inner join users on users.username = messages.sender
                                    where messages.sender = '$stud_sender' OR messages.sender = '$sign_sender'
                                    order by post_time desc");
        
        while($row = mysql_fetch_array($this->query)){
            array_push($arrTemp, $row['Message']);
        }
        
        return $arrTemp;
    }
    
    public function getDateTime_Post($stud_sender, $sign_sender){
        $arrTemp = array();
        $this->query = mysql_query("select Post_Date, Post_Time from messages
                                    inner join schoolyearsem on schoolyearsem.SY_SEM_ID = messages.SY_SEM_ID
                                    inner join signatories on signatories.signatory_id = messages.signatory_id
                                    inner join students on students.student_id = messages.student
                                    inner join users on users.username = messages.sender
                                    where messages.sender = '$stud_sender' OR messages.sender = '$sign_sender'
                                    order by post_time desc");
        
        while($row = mysql_fetch_array($this->query)){
            $str = "Post on " .$row['Post_Date'] ." at " .$row['Post_Time'];       
            array_push($arrTemp, $str);
        }
        
        return $arrTemp;
    }
}

?>
