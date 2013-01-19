<?php


class Globals_Model extends Model{
    private $query;
    
    public function __construct() {        
        parent::__construct();
        
        $this->query = "";
    }
    
    public function getCurrentSchoolYear(){
        
        $this->query = mysql_query("select School_Year from Global " . 
            "inner join SchoolYearSem On (Global.Value = SchoolYearSem.SY_SEM_ID) " . 
            "where Option_Name = 'SchoolYearSem'");
        
        $row = mysql_fetch_array($this->query);
        
        return $row[0];
    }
    
    public function getCurrentSem(){
        
        $this->query = mysql_query("select Semester from Global " . 
            "inner join SchoolYearSem On (Global.Value = SchoolYearSem.SY_SEM_ID) " . 
            "where Option_Name = 'SchoolYearSem'");
        
        $row = mysql_fetch_array($this->query);
        
        return $row[0];
    }
    
    public function getOption($optionName){
        $this->query = mysql_query("select Value from Global where Option_Name = '$optionName';");
        $row = mysql_fetch_array($this->query);
        return $row[0];
    }
    
}

?>
