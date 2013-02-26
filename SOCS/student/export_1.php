<?php

require_once '../config/config.php';

//require_once( '../libs/fpdf/fpdf.php' );

// Initialize session
Session::init(); 

// Determine if a session doesn't exists and if the current user is not a student
if (!(Session::user_exist() && Session::get_Account_type() == "Student")) {
    // if it is, force the browser to redirect to the home page
    header('Location: /SOCS/index.php');
}

$sy_model = new SchoolYearSem_Model();
$signatory_model = new Signatory_Model();
$current_sy = $sy_model->getCurSchool_Year();
$current_sem = $sy_model->getCurSemester();
if ($current_sem != "Summer")
    $current_sem .= " Semester";
$current_sysemID = $_GET["sy_sem_id"];

$stud_status = $_GET['status'] == "Grad" ? "Graduate" : "Under Graduate";

$student_model = new Student_Model();
$stud_id = Session::get_user();
$student_model->queryStudent_Info($stud_id);
$stud_name = $student_model->getStud_Name();
$stud_gender = $student_model->getStud_Gender();
$stud_year = $student_model->getStud_Yearlevel();
$stud_course = $student_model->getStud_Course();
$stud_dept = $student_model->getStud_DeptName();
$stud_deptID = $student_model->getStud_DeptID();

$signatorial_model = new SignatorialList_Model();
$signatorial_model->getListofSignatoryByDept($stud_deptID, $stud_status);
$listOfSignatories["name"] = $signatorial_model->getSign_Name();
$listOfSignatories["id"] = $signatorial_model->getSign_ID();

$clearance_model = new ClearanceStatus();

foreach ($listOfSignatories["id"] as $key => $value) {
    $status = $clearance_model->getOverallSignatoryClearanceStatus($stud_id, $value, $current_sysemID);
    if ($status == "No Requirements")
        $status = "Cleared";
    $listOfSignatories["status"][$key] = $status;
}
?>

<!DOCTYPE html> 
<html>
    <body>
        <p style="text-align: center;">
            <i>Republic of the Philippines</i></br>
            UNIVERSITY OF SOUTHEASTERN PHILIPPINES</br>
            Davao City</br></br>
            <b>STUDENT CLEARANCE</b></br>
        </p>
        
        <p><b>I.D. No.</b> <span style="text-decoration: underline"><?php echo $stud_id ?></span></p>
        
        <p>TO WHOM IT MAY CONCERN:<p>
        
        <p>This is to certify that 
        <b><?php
            if ($stud_gender == "Male")
                echo "Mr. ";
            else
                echo "Ms./Mrs. ";
            echo $stud_name;?></b>,
        a <b><?php echo $stud_year; ?></b> <b><? echo $stud_course; ?></b>
        student in the <b><?php echo $stud_dept; ?></b> is cleared of all, property and other accountabilities with this University as of the 
        <b><?php echo $current_sem; ?></b>, SY <b><?php echo $current_sy; ?>.</b></p>
        
        <hr/>
    </body>
</html>

