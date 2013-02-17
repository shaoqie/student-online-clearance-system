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
    private $itemsPerPage = 30;
    private $filter_ID;
    private $filter_Name;
    private $filter_Desc;
    private $filter_usabililty;
    
    private $course_name;
    private $course_desc;
    private $course_usability;
    
    public function __construct() {        
        parent::__construct();
        
        $this->query = "";
    }
    
    public function getFilter_ID(){
        return $this->filter_ID;
    }
    
    public function getFilter_Name(){
        return $this->filter_Name;
    }
    
    public function getFilter_Desc(){
        return $this->filter_Desc;
    }
    
    public function getFilter_Usabililty(){
        return $this->filter_usabililty;
    }
    
    public function getCourse_Name(){
        return $this->course_name;
    }
    
    public function getCourse_Desc(){
        return $this->course_desc;
    }
    
    public function getCourse_Usability(){
        return $this->course_usability;
    }
    
    /*-----------------------------------------------*/
    
    public function filter($Tdept_name, $Tcourse_name, $Tpage){
        $this->query = mysql_query("select * from courses inner join departments
                                    on courses.Department_ID = departments.Department_ID
                                    where departments.Department_Name like '%$Tdept_name%' and Course_Name like '%$Tcourse_name%' 
                                    order by Course_Name
                                    LIMIT " . (($Tpage - 1) * $this->itemsPerPage) . ", " . $this->itemsPerPage);
        
        $this->filter_ID = array();
        $this->filter_Name = array();
        $this->filter_usabililty = array();
        $this->filter_Desc = array();
        while($row = mysql_fetch_array($this->query)){
            array_push($this->filter_ID, $row['0']);
            array_push($this->filter_Name, $row['1']);
            array_push($this->filter_Desc, $row['2']);
            array_push($this->filter_usabililty, $row['3']);
        }
    }
    
    /*-----------------------------------------------*/
//    public function filter_ID($Tdept_name, $Tcourse_name, $Tpage){
//        $filter = array();
//        $this->query = mysql_query("select Course_ID from courses inner join departments
//                                    on courses.Department_ID = departments.Department_ID
//                                    where departments.Department_Name like '%$Tdept_name%' and Course_Name like '%$Tcourse_name%' 
//                                    order by Course_Name
//                                    LIMIT " . (($Tpage - 1) * $this->itemsPerPage) . ", " . $this->itemsPerPage);
//        
//        while($row = mysql_fetch_array($this->query)){
//            array_push($filter, $row['Course_ID']);
//        }
//        
//        return $filter;
//    }
//    
//    public function filter_CourseName($Tdept_name, $Tcourse_name, $Tpage){
//        $filter = array();
//        $this->query = mysql_query("select Course_Name from courses inner join departments
//                                    on courses.Department_ID = departments.Department_ID
//                                    where departments.Department_Name like '%$Tdept_name%' and Course_Name like '%$Tcourse_name%' 
//                                    order by Course_Name  
//                                    LIMIT " . (($Tpage - 1) * $this->itemsPerPage) . ", " . $this->itemsPerPage);
//        
//        while($row = mysql_fetch_array($this->query)){
//            array_push($filter, $row['Course_Name']);
//        }
//        
//        return $filter;
//    }
    /*-----------------------------------------------*/
    
    public function getQueryPageSize($Tdept_name, $searchName) {
        $this->query = mysql_query("select Course_Name from courses inner join departments           
                                    on courses.Department_ID = departments.Department_ID
                                    where departments.Department_Name like '%$Tdept_name%' and Course_Name like '%$searchName%'");
        
        return mysql_num_rows($this->query) / $this->itemsPerPage;
    }
    
    public function getListDept_ID_inCourse(){
        $filter = array();
        $this->query = mysql_query("select Department_ID, Course_Name, Usability from courses");
        
        while($row = mysql_fetch_array($this->query)){
            array_push($filter, array($row['0'], $row['1'], $row['2']));
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
    
    public function insert($course_name, $description, $usability, $dept_ID){
        mysql_query("INSERT INTO `socs`.`courses` (`Course_ID`, `Course_Name`, `Description`, `Usability`, `Department_ID`) 
                    VALUES (NULL, '$course_name', '$description', '$usability', '$dept_ID')");
    }
    
    public function update($key, $newCourseName, $newCourseDesc, $newUsability){
        mysql_query("UPDATE `socs`.`courses` SET `Course_Name` = '$newCourseName',
                    `Description` = '$newCourseDesc', `Usability` = '$newUsability' WHERE `courses`.`Course_ID` ='$key'");
    }
    
    
    /*----------- For Special Purposes ------------*/
    
    public function getDept_ID($dept_name){
        $this->query = mysql_query("select Department_ID from departments where Department_Name like '%$dept_name%'");
        $row = mysql_fetch_array($this->query);
        
        return $row['Department_ID'];
    }
    
    public function getCourse_Info($key){
        $this->query = mysql_query("select * from courses where Course_ID = '$key'");
        $row = mysql_fetch_array($this->query);
        
        $this->course_name = $row['Course_Name'];
        $this->course_desc = $row['Description'];
        $this->course_usability = $row['Usability'];
        
    }
    
    public function getCourseID($course_name){
        $this->query = mysql_query("select Course_ID from courses where Course_Name = '$course_name'");
        $row = mysql_fetch_array($this->query);
        
        return $row['0'];
    }
    
//    public function getCourse_Name($key){
//        $this->query = mysql_query("select Course_Name from courses where Course_ID = '$key'");
//        $row = mysql_fetch_array($this->query);
//        
//        return $row['Course_Name'];
//    }
//    
//    public function getCourse_Desc($key){
//        $this->query = mysql_query("select Description from courses where Course_ID = '$key'");
//        $row = mysql_fetch_array($this->query);
//        
//        return $row['Description'];
//    }
    
    
    /*------- for testing existing name --------*/
    
    public function isExist($course_name, $description){
        $this->query = mysql_query("select count(Course_Name) from courses where course_name = '$course_name' OR 
                                    description = '$description'");
        
        $row = mysql_fetch_array($this->query);
        
        return $row['0'] > 0 ? true : false;
    }
}

?>
