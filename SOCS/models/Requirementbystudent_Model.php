<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Requirementbystudent_Model
 *
 * @author ronversa09
 */
class Requirementbystudent_Model extends Model{
    private $query;
    
    public function __construct() {        
        parent::__construct();
        
        $this->query = "";
    }
    
    public function getListofRequirements($student_id){
        $arrayTemp = array();
        $this->query = mysql_query("select requirements.Title as Title from requirementbystudent
                                    inner join users on users.username = requirementbystudent.student
                                    inner join requirements on requirements.Requirement_ID = requirementbystudent.Requirement_ID
                                    where users.username = '$student_id'");
        while($row = mysql_fetch_array($this->query)){
            array_push($arrayTemp, $row['Title']);
        }
        
        return $arrayTemp;
    }
    
}

?>
