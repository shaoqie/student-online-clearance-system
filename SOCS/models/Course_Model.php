<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Course_Model
 *
 * @author ronversa09
 */
class Course_Model extends Model{
    private $query;
    private $itemsPerPage = 10;
    
    public function __construct() {        
        parent::__construct();
        
        $this->query = "";
    }
    
    public function filter_ID($Tdept_name, $Tcourse_name, $Tpage){
        $filter = array();
        $this->query = mysql_query("select Course_ID from courses inner join departments
                                    on courses.Department_ID = departments.Department_ID
                                    where departments.Department_Name like '%$Tdept_name%' and Course_Name like '%$Tcourse_name%' 
                                    order by Course_Name
                                    LIMIT " . (($Tpage - 1) * $this->itemsPerPage) . ", " . $this->itemsPerPage);
        
        while($row = mysql_fetch_array($this->query)){
            array_push($filter, $row['Course_ID']);
        }
        
        return $filter;
    }
    
    public function filter_CourseName($Tdept_name, $Tcourse_name, $Tpage){
        $filter = array();
        $this->query = mysql_query("select Course_Name from courses inner join departments
                                    on courses.Department_ID = departments.Department_ID
                                    where departments.Department_Name like '%$Tdept_name%' and Course_Name like '%$Tcourse_name%' 
                                    order by Course_Name  
                                    LIMIT " . (($Tpage - 1) * $this->itemsPerPage) . ", " . $this->itemsPerPage);
        
        while($row = mysql_fetch_array($this->query)){
            array_push($filter, $row['Course_Name']);
        }
        
        return $filter;
    }
    
    public function getQueryPageSize($Tdept_name, $searchName) {
        $this->query = mysql_query("select Course_Name from courses inner join departments           
                                    on courses.Department_ID = departments.Department_ID
                                    where departments.Department_Name like '%$Tdept_name%' and Course_Name like '%$searchName%'");
        
        return mysql_num_rows($this->query) / $this->itemsPerPage;
    }
    
    public function deleteCourse($key){
        mysql_query("delete from courses where Course_ID = '$key'");
    }
}

?>