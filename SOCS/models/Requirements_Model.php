<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Requirements_Model
 *
 * @author Disposable
 */
class Requirements_Model extends Model{
    private $query;
    private $itemsPerPage = 30;
    
    private $ID;
    private $Title;
    private $Description;
    
    public function __construct() {        
        parent::__construct();
        
        $this->query = "";
    }
    
    public function getID(){
        return $this->ID;
    }
    
    public function getTitle(){
        return $this->Title;
    }
    
    public function getDescription(){
        return $this->Description;
    }
    
    public function addRequirement($title, $description, $signatory, $sysemID, $visibility, 
                                    $departmentID, $couseID, $yearLevel, $program, $requirement_type, $prereqSig){
        
        $departmentID = $departmentID != "NULL" ? "'$departmentID'" : $departmentID;
        $couseID = $couseID != "NULL" ? "'$couseID'" : $couseID;
        $yearLevel = $yearLevel != "NULL" ? "'$yearLevel'" : $yearLevel;
        $program = $program != "NULL" ? "'$program'" : $program;
        $prereqSig = $prereqSig != "NULL" ? "'$prereqSig'" : $prereqSig;
        
        $this->query = mysql_query("INSERT INTO `socs`.`requirements` (`Requirement_ID`, `Title`, `Description`, 
                                    `Signatory_ID`, `SY_SEM_ID`, `Visibility`, `Department_ID`, `Course_ID`, 
                                    `Year_Level`, `Program`, `Requirement_Type`, `Prerequisite_Signatory`) VALUES 
                                    (NULL, '$title', '$description', '$signatory', '$sysemID', '$visibility', $departmentID, $couseID, 
                                    $yearLevel, $program, '$requirement_type', $prereqSig)");
        
        var_dump(mysql_error());
    }
    
    public function filterRequirements($sign_id, $sysem_id, $page, $search){
        $this->query = mysql_query("select * from requirements where Signatory_ID = '$sign_id' AND sy_sem_id = '$sysem_id' AND
                                    (Title like '%$search%')
                                    order by Title
                                    LIMIT " . (($page - 1) * $this->itemsPerPage) . ", " . $this->itemsPerPage);
        $this->ID = array();
        $this->Title = array();
        $this->Description = array();
        
        while($row = mysql_fetch_array($this->query)){
            array_push($this->ID, $row['0']);
            array_push($this->Title, $row['1']);
            array_push($this->Description, $row['2']);   
        }
    }
    
    public function getRequirement_PageSize($sign_id, $sysem_id, $search){
        $this->query = mysql_query("select * from requirements where Signatory_ID = '$sign_id' AND sy_sem_id = '$sysem_id' AND
                                    (Title like '%$search%')
                                    order by Title");
        
        return mysql_num_rows($this->query) / $this->itemsPerPage;
    }
    
    public function deleteRequirements($key){
        mysql_query("delete from requirements where Requirement_ID = '$key'");
        
        echo mysql_error();
    }
}

?>
