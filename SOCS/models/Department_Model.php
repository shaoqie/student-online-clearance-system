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
    
    public function filter_ID($Tdept_name, $Tpage){
        $filter = array();
        $this->query = mysql_query("select Department_ID from departments
                                    where Department_Name like '%$Tdept_name%' order by Department_Name 
                                    LIMIT " . (($Tpage - 1) * $this->itemsPerPage) . ", " . $this->itemsPerPage);
        
        while($row = mysql_fetch_array($this->query)){
            array_push($filter, $row['Department_ID']);
        }
        
        return $filter;
    }
    
    public function filter_DeptName($Tdept_name, $Tpage){
        $filter = array();
        $this->query = mysql_query("select Department_Name from departments
                                    where Department_Name like '%$Tdept_name%' order by Department_Name  
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
        $delete = mysql_query("delete from departments where Department_ID = '$key'");
        if(!$delete){return "false";}
    }
    
    public function insert($dept_name, $description){
        mysql_query("INSERT INTO `socs`.`departments` (`Department_ID`, `Department_Name`, `Description`) 
                    VALUES (NULL, '$dept_name', '$description');");
    }
    
    public function update($key, $newDeptName, $newDeptDesc){
        mysql_query("UPDATE `socs`.`departments` SET `Department_Name` = '$newDeptName',
                    `Description` = '$newDeptDesc' WHERE `departments`.`Department_ID` ='$key'");
    }
    
    
    
    public function getDept_Name($key){
        $this->query = mysql_query("select Department_Name from departments where Department_ID = '$key'");
        $row = mysql_fetch_array($this->query);
        
        return $row['Department_Name'];
    }
    
    public function getDept_Desc($key){
        $this->query = mysql_query("select Description from departments where Department_ID = '$key'");
        $row = mysql_fetch_array($this->query);
        
        return $row['Description'];
    }
    
    
    /*------- for testing existing name --------*/
    
    public function isExist($dept_name, $description){
        $this->query = mysql_query("select count(Department_Name) from departments where Department_Name = '$dept_name' OR 
                                    description = '$description'");
        
        $row = mysql_fetch_array($this->query);
        
        return $row['0'] > 0 ? true : false;
    }
}

?>
