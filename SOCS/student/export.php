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
$current_sy = $sy_model->getCurSchool_Year();
$current_sem = $sy_model->getCurSemester();
if ($current_sem != "Summer")
    $current_sem .= " Semester";


$student_model = new Student_Model();
$stud_id = Session::get_user();
$stud_name = $student_model->getStudent_name($stud_id);
$stud_gender = $student_model->getStudent_gender($stud_id);
$stud_year = getNumberNth($student_model->getStudent_yr_level($stud_id));
$stud_course = $student_model->getStudent_course($stud_id);
$stud_dept = $student_model->getStudent_department($stud_id);


$fpdf = new FPDF('P', 'mm', 'Letter');
$fpdf->SetDisplayMode('fullpage', 'continuous');
$fpdf->SetTitle("SOCS Clearance - Export Copy");
$fpdf->SetCreator("USEP SOCS");
$fpdf->SetAuthor("University of Southeastern Philippines");
$fpdf->SetSubject("Electronic Clearance (export copy)");

$fpdf->SetMargins(15, 15, 15);
$fpdf->AddPage();

$fpdf->SetY('20');
$fpdf->Image('logo.jpg', 13, 13, 30);

$fpdf->SetFont('Times','I',12);
$fpdf->Cell(0, 0, "Republic of the Philippines", 0, 1, 'C');

$fpdf->Ln(6);
$fpdf->SetFont('Times','',12);
$fpdf->Cell(0, 0, "UNIVERSITY OF SOUTHEASTERN PHILIPPINES", 0, 1, 'C');

$fpdf->Ln(6);
$fpdf->SetFont('Times','B',12);
$fpdf->Cell(0, 0, "Evening Program", 0, 1, 'C');

$fpdf->Ln(6);
$fpdf->SetFont('Times','',12);
$fpdf->Cell(0, 0, "Davao City", 0, 1, 'C');

$fpdf->Ln(12);
$fpdf->SetFont('Helvetica','B',12);
$fpdf->Cell(0, 0, "STUDENT CLEARANCE", 0, 1, 'C');

$fpdf->Ln(12);
$fpdf->SetFont('Times','B',12);
$fpdf->Write(5, "I.D. No. ");
$fpdf->SetFont('Times','U',12);
$fpdf->Write(5, $stud_id);

$fpdf->Ln(12);
$fpdf->SetFont('Times','',12);
$fpdf->Write(5, "TO WHOM IT MAY CONCERN:");

$fpdf->Ln(12);
$fpdf->Write(5, "This is to certify that " );

$fpdf->SetFont('Times','BU',12);
if ($stud_gender == "Male")
    $fpdf->Write(5, "Mr. ");
else
    $fpdf->Write(5, "Ms./Mrs. ");


$fpdf->Write(5, $stud_name);
$fpdf->SetFont('Times','',12);
$fpdf->Write(5, ", a ");
$fpdf->SetFont('Times','BU',12);
$fpdf->Write(5, $stud_year);
$fpdf->SetFont('Times','',12);
$fpdf->Write(5, " year ");
$fpdf->SetFont('Times','BU',12);
$fpdf->Write(5, $stud_course);
$fpdf->SetFont('Times','',12);
$fpdf->Write(5, " student in the ");
$fpdf->SetFont('Times','BU',12);
$fpdf->Write(5, $stud_dept);
$fpdf->SetFont('Times','',12);
$fpdf->Write(5, " is cleared of all, property and other accountabilities with this University as of the ");
$fpdf->SetFont('Times','BU',12);
$fpdf->Write(5, $current_sem);
$fpdf->SetFont('Times','',12);
$fpdf->Write(5, " , SY ");
$fpdf->SetFont('Times','BU',12);
$fpdf->Write(5, $current_sy);
$fpdf->SetFont('Times','',12);
$fpdf->Write(5, ".");

$fpdf->Ln(18);
$fpdf->Write(5, "[This portion over here still needs to be coded and will be finished soon.]");

$fpdf->Output("SOCS Clearance Export - $stud_name.pdf", 'D');
 

function getNumberNth($number){
    $number = strval($number);
    $lastDigit = substr($number, -1);
    
    if (strlen($number) > 1){
        $secondToLastDigit = substr($number, -2, 1);
        if ($secondToLastDigit == "1")
            return $number . "th";
    }
    
    if ($lastDigit == '1')
        return $number . "st";
    elseif ($lastDigit == '2')
        return $number . "nd";
    elseif ($lastDigit == '3')
        return $number . "rd";
    else
        return $number . "th";
    
}



?>
