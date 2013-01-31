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
    private $itemsPerPage = 10;
    
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
