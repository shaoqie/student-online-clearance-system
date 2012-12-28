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
class SchoolYearSem extends Model{
    private $query;
    
    public function __construct() {        
        parent::__construct();
        
        $this->query = "";
    }
    
    public function getSchool_Year(){
        $arrayTemp = array();
        $this->query = mysql_query("SELECT School_Year from schoolyearsem");
        
        while($row = mysql_fetch_array($this->query)){
            array_push($arrayTemp, $row['School_Year']);
        }
        
        return $arrayTemp;
    }
}

?>
