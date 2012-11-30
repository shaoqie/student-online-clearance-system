<?php
    //require_once "config/config.php";
    
    // global $schooldb, $localdb, $schooldb;
    
    $LOCAL_SERVER = "localhost";
    $LOCAL_USERNAME = "root";
    $LOCAL_PASSWORD = "";
    $LOCAL_DB = "socs";
    $local_tbl = "users";
    
    $SCHOOL_SERVER = "localhost";
    $SCHOOL_USERNAME = "root";
    $SCHOOL_PASSWORD = "";
    $SCHOOL_DB = "school_db";
    $school_tbl = "students";
    
    $defaultPassword = "Stud123!";
    
    
    /*
    $localdb = mysql_connect(SERVER, USERNAME, PASSWORD);
    if (!$localdb)
        die("Cannot connect to local database server!");
    mysql_select_db(DATABASE, $localdb);
    */
    
    $localdb = mysql_connect($LOCAL_SERVER, $LOCAL_USERNAME, $LOCAL_PASSWORD);
    if (!$localdb)
        die("Cannot connect to local database server!");
    mysql_select_db($LOCAL_DB, $localdb);
    
    
    $schooldb = mysql_connect($SCHOOL_SERVER, $SCHOOL_USERNAME, $SCHOOL_PASSWORD);
    if (!$schooldb)
        die("Cannot connect to school database server!");
    mysql_select_db($SCHOOL_DB, $schooldb);
    
   
    
    
    $result = mysql_query("SELECT * FROM students", $schooldb);
    while ($school_row = mysql_fetch_array($result)){
        $studentID = $school_row["Student_ID"];
        $surname = $school_row["Surname"];
        $firstname = $school_row["First_Name"];
        $middlename = $school_row["Middle_Name"];
        $gender = $school_row["Gender"];
        $yearlevel = $school_row["Year_Level"];
        $program = $school_row["Program"];
        $section = $school_row["Section"];
        $course = $school_row["Course"];
        $department = $school_row["Department"];
        
        
        if (!isStudentExistsInLocalDB($studentID)){
            
            if (!isDepartmentExistsInLocalDB($department))
                addDepartment($department, "");
            
            if (!isCourseExistsInLocalDB($course))
                addCourse($course, "", $department);
            
            addStudent($studentID, $surname, $firstname, $middlename, $gender, $yearlevel, $program, $section, $course);
            
            
            //echo $studentID . " doesn't exists in local database <br />";
        }
        
    }
    
    
    //var_dump($studentList);
    
    
    //addDepartment("Institute of Robotics", "wewewewew");
    //addCourse("BS in Artificial Intelligence", "weeeee", "Institute of Robotics");
    //addStudent("2010-01081", "Estorgio", "Fortunato", "T.", "Male", "2", "Evening", "AE", "BS in Artificial Intelligence");
    
    mysql_close($localdb);
    mysql_close($schooldb);
    
    function isStudentExistsInLocalDB($studentID){
        global $localdb, $LOCAL_DB;
        
        mysql_select_db($LOCAL_DB, $localdb);
        $result = mysql_query("SELECT Username FROM users WHERE username=\"$studentID\"", $localdb);
        
        return mysql_num_rows($result);
        
    }
    
    
    function isCourseExistsInLocalDB($course){
        global $localdb, $LOCAL_DB;
        
        mysql_select_db($LOCAL_DB, $localdb);
        $result = mysql_query("SELECT Course_Name FROM courses WHERE Course_Name=\"$course\"", $localdb);
        
        return (mysql_num_rows($result) > 0);
        
    }
    
    function isDepartmentExistsInLocalDB($course){
        global $localdb, $LOCAL_DB;
        
        mysql_select_db($LOCAL_DB, $localdb);
        $result = mysql_query("SELECT Department_Name FROM departments WHERE Department_Name=\"$course\"", $localdb);
        
        return (mysql_num_rows($result) > 0);
        
    }
    
    function addDepartment($departmentName, $description){
        global $localdb, $LOCAL_DB;
        
        mysql_select_db($LOCAL_DB, $localdb);
        $result = mysql_query("INSERT INTO Departments (Department_Name, Description) VALUES ('$departmentName', '$description')", $localdb);
    }
    
    function getDepartmentID($departmentName){
        global $localdb, $LOCAL_DB;
        
        mysql_select_db($LOCAL_DB, $localdb);
        $result = mysql_query("SELECT * FROM departments WHERE Department_Name=\"$departmentName\"", $localdb);
        if (mysql_num_rows($result) > 0){
            while ($row = mysql_fetch_array($result)) {
                $departmentID = $row["Department_ID"];
                return $departmentID;
            }
        }else{
            return false;
        }
        
    }
    
    function getCourseID($courseName){
        global $localdb, $LOCAL_DB;
        
        mysql_select_db($LOCAL_DB, $localdb);
        $result = mysql_query("SELECT * FROM courses WHERE Course_Name=\"$courseName\"", $localdb);
        if (mysql_num_rows($result) > 0){
            while ($row = mysql_fetch_array($result)) {
                $courseID = $row["Course_ID"];
                return $courseID;
            }
        }else{
            return false;
        }
        
    }
    
    function addCourse($courseName, $description, $departmentName){
        global $localdb, $LOCAL_DB;
        
        $departmentID = getDepartmentID($departmentName);
        if ($departmentID != FALSE){
            mysql_select_db($LOCAL_DB, $localdb);
            $result = mysql_query("INSERT INTO Courses (Course_Name, Description, Department_ID) VALUES ('$courseName', '$description', '$departmentID')", $localdb);
            
        }
        
    }
    
    function addStudent($studentID, $surname, $firstname, $middlename, $gender, $yearlevel, $program, $section, $course){
        global $localdb, $LOCAL_DB, $defaultPassword;
        
        $courseID = getCourseID($course);
        
        mysql_select_db($LOCAL_DB, $localdb);
        $result = mysql_query("INSERT INTO users VALUES ('$studentID', '$defaultPassword', '$surname', '$firstname', '$middlename', NULL, 'Student', NULL)", $localdb);
        $result = mysql_query("INSERT INTO students VALUES ('$studentID', '$gender', '$yearlevel', '$program', '$section', '$courseID')", $localdb);
    }
    
?>
