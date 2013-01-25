<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SchoolYearSem
 *
 * @author ronversa09
 */
class ClearanceStatus extends Model{
    private $query;
    
    public function __construct() {        
        parent::__construct();
        
        $this->query = "";
    }
    
    public function getClearanceStatus($reqNum, $clearedNum){
        $this->query = mysql_query("select if('$reqNum' = '$clearedNum', 'Cleared', 'Not Cleared') as status");
        $row = mysql_fetch_array($this->query);
        
        return $row['status'];       
    }
    
    public function getStudent_NumberOfRequirements($student_username, $sign_id, $sy_id){
        $this->query = mysql_query("select count(student) as Count from clearancestatus
                                    inner join requirements on requirements.requirement_id = clearancestatus.requirement_id
                                    inner join schoolyearsem on schoolyearsem.sy_sem_id =  requirements.sy_sem_id
                                    inner join signatories on signatories.signatory_id = requirements.signatory_id
                                    where student = '$student_username' and signatories.signatory_id = '$sign_id' and schoolyearsem.sy_sem_id = '$sy_id'");
        $row = mysql_fetch_array($this->query);
        
        return $row['Count']; 
    }
    
    public function getStudent_NumberOfClearedPerRequirements($student_username, $sign_id, $sy_id){
        $this->query = mysql_query("select count(student) as Count from clearancestatus
                                    inner join requirements on requirements.requirement_id = clearancestatus.requirement_id
                                    inner join schoolyearsem on schoolyearsem.sy_sem_id =  requirements.sy_sem_id
                                    inner join signatories on signatories.signatory_id = requirements.signatory_id
                                    where student = '$student_username' and cleared = 'cleared' and signatories.signatory_id = '$sign_id' and schoolyearsem.sy_sem_id = '$sy_id'");
        $row = mysql_fetch_array($this->query);
        
        return $row['Count']; 
    }
}

?>
