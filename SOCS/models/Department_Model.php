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
                                    where Description like '%$Tdescription%' 
                                    LIMIT " . (($Tpage - 1) * $this->itemsPerPage) . ", " . $this->itemsPerPage);
        
        while($row = mysql_fetch_array($this->query)){
            array_push($filter, $row['Department_ID']);
        }
        
        return $filter;
    }
    
    public function filter_Description($Tdescription, $Tpage){
        $filter = array();
        $this->query = mysql_query("select Description from departments
                                    where Description like '%$Tdescription%' 
                                    LIMIT " . (($Tpage - 1) * $this->itemsPerPage) . ", " . $this->itemsPerPage);
        
        while($row = mysql_fetch_array($this->query)){
            array_push($filter, $row['Description']);
        }
        
        return $filter;
    }
    
    public function getQueryPageSize($searchName) {
        $this->query = mysql_query("select Description from departments 
                        where Description like '%$searchName%'");
        
        return mysql_num_rows($this->query) / $this->itemsPerPage;
    }
    
    public function deleteSignatory($key){
        mysql_query("delete from departments where Department_ID = '$key'");
    }
}

?>
