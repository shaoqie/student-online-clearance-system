<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Registered_Student
 *
 * @author ronversa09
 */
class Registered_Student extends Model{
    //put your code here
    
    private $query;
    
    public function __construct() {        
        parent::__construct();
        
        $this->query = "";
    }
    
    
    public function insert($stud_id, $lname, $fname, $m_i){
         mysql_query("INSERT INTO `socs`.`registered_student` (`stud_id`, `lastname`, `firstname`, `middle_initial`) 
             VALUES ('$stud_id', '$lname', '$fname', '$m_i')");
    }
    
    public function isValid($stud_id, $lname, $fname){
        $this->query = mysql_query("select count(*) from registered_student where stud_id = '$stud_id' and lastname = '$lname' and firstname = '$fname'");
        $row = mysql_fetch_array($this->query);
        
        return $row['0'] == 0;
    }
}

?>
