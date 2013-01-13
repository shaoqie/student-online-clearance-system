<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Student_Model
 *
 * @author ronversa09
 */
class Student_Model extends Model{
    private $query;
    
    public function __construct() {        
        parent::__construct();
        
        $this->query = "";
    }
    
    public function getStudent_name($student_id){
        $this->query = mysql_query("select concat(Surname, ', ', First_Name, ' ', Middle_Name) as Name from students
                                    inner join users on students.username = users.username
                                    where students.username = '$student_id'");
        $row = mysql_fetch_array($this->query);
        
        return $row['Name'];
    }
    
    public function getStudent_course($student_id){
        $this->query = mysql_query("select courses.course_name as course_name from students
                                    inner join courses on students.course_id = courses.course_id
                                    where students.username = '$student_id'");
        $row = mysql_fetch_array($this->query);
        
        return $row['course_name'];
    }
    
    public function getStudent_department($student_id){
        $this->query = mysql_query("select departments.department_name as dept_name from students
                                    inner join courses on students.course_id = courses.course_id
                                    inner join departments on courses.Department_ID = departments.Department_ID
                                    where students.username = '$student_id'");
        $row = mysql_fetch_array($this->query);
        
        return $row['dept_name'];
    }
    
    public function getStudent_gender($student_id){
        $this->query = mysql_query("select Gender from students where students.username = '$student_id'");
        $row = mysql_fetch_array($this->query);
        
        return $row['Gender'];
    }
    
    public function getStudent_yr_level($student_id){
        $this->query = mysql_query("select Year_Level from students where students.username = '$student_id'");
        $row = mysql_fetch_array($this->query);
        
        return $row['Year_Level'];
    }
    
    public function getStudent_program($student_id){
        $this->query = mysql_query("select Program from students where students.username = '$student_id'");
        $row = mysql_fetch_array($this->query);
        
        return $row['Program'];
    }
    
    public function getStudent_section($student_id){
        $this->query = mysql_query("select Section from students where students.username = '$student_id'");
        $row = mysql_fetch_array($this->query);
        
        return $row['Section'];
    }
    
    public function getStudent_clearance_status($student_id){
        $this->query = mysql_query("select Cleared from users 
                                    inner join clearancestatus on clearancestatus.student = users.username
                                    where username = '$student_id'");
        $row = mysql_fetch_array($this->query);
        
        return $row['Cleared'];
    }
    
}

?>
