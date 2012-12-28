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
    
    public function getClearanceStatus($student_username){
        $this->query = mysql_query("SELECT Cleared from clearancestatus where Student = '$student_username'");
        $row = mysql_fetch_array($this->query);
        
        return $row['Cleared'];       
    }
}

?>
