<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Department_Model
 *
 * @author ronversa09
 */
class Department_Model extends Model{
    private $query;
    private $itemsPerPage = 10;
    
    public function __construct() {        
        parent::__construct();
        
        $this->query = "";
    }
    
    public function filter_ID($Tdescription, $Tpage){
        $filter = array();
        $this->query = mysql_query("select Department_ID from departments
                                    where Department_Name like '%$Tdescription%' 
                                    LIMIT " . (($Tpage - 1) * $this->itemsPerPage) . ", " . $this->itemsPerPage);
        
        while($row = mysql_fetch_array($this->query)){
            array_push($filter, $row['Department_ID']);
        }
        
        return $filter;
    }
    
    public function filter_DeptName($Tdept_name, $Tpage){
        $filter = array();
        $this->query = mysql_query("select Department_Name from departments
                                    where Department_Name like '%$Tdept_name%' 
                                    LIMIT " . (($Tpage - 1) * $this->itemsPerPage) . ", " . $this->itemsPerPage);
        
        while($row = mysql_fetch_array($this->query)){
            array_push($filter, $row['Department_Name']);
        }
        
        return $filter;
    }
    
    public function getQueryPageSize($searchName) {
        $this->query = mysql_query("select Department_Name from departments 
                        where Department_Name like '%$searchName%'");
        
        return mysql_num_rows($this->query) / $this->itemsPerPage;
    }
    
    public function deleteSignatory($key){
        mysql_query("delete from departments where Department_ID = '$key'");
    }
}

?>
