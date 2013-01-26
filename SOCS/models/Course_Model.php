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
    
    public function getListDept_ID_inCourse(){
        $filter = array();
        $this->query = mysql_query("select Department_ID from courses");
        
        while($row = mysql_fetch_array($this->query)){
            array_push($filter, $row['0']);
        }
        
        return $filter;
    }
    
    public function getListOfCourses(){
         $filter = array();
        $this->query = mysql_query("select Course_Name from courses");
        
        while($row = mysql_fetch_array($this->query)){
            array_push($filter, $row['0']);
        }
        
        return $filter;
    }
    
    public function deleteCourse($key){
        mysql_query("delete from courses where Course_ID = '$key'");
    }
    
    public function insert($course_name, $description, $dept_ID){
        mysql_query("INSERT INTO `socs`.`courses` (`Course_ID`, `Course_Name`, `Description`, `Department_ID`) 
                    VALUES (NULL, '$course_name', '$description', '$dept_ID')");
    }
    
    public function update($key, $newCourseName, $newCourseDesc){
        mysql_query("UPDATE `socs`.`courses` SET `Course_Name` = '$newCourseName',
                    `Description` = '$newCourseDesc' WHERE `courses`.`Course_ID` ='$key'");
    }
    
    
    /*----------- For Special Purposes ------------*/
    
    public function getDept_ID($dept_name){
        $this->query = mysql_query("select Department_ID from departments where Department_Name like '%$dept_name%'");
        $row = mysql_fetch_array($this->query);
        
        return $row['Department_ID'];
    }
    
    public function getCourse_Name($key){
        $this->query = mysql_query("select Course_Name from courses where Course_ID = '$key'");
        $row = mysql_fetch_array($this->query);
        
        return $row['Course_Name'];
    }
    
    public function getCourse_Desc($key){
        $this->query = mysql_query("select Description from courses where Course_ID = '$key'");
        $row = mysql_fetch_array($this->query);
        
        return $row['Description'];
    }
    
    
    /*------- for testing existing name --------*/
    
    public function isExist($course_name, $description){
        $this->query = mysql_query("select count(Course_Name) from courses where course_name = '$course_name' OR 
                                    description = '$description'");
        
        $row = mysql_fetch_array($this->query);
        
        return $row['0'] > 0 ? true : false;
    }
}

?>
