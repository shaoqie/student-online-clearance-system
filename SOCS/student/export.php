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

//var_dump($listOfSignatories);

$fpdf = new FPDF('P', 'mm', 'A4');
$fpdf->SetDisplayMode('fullpage', 'continuous');
$fpdf->SetTitle("SOCS Clearance - Export Copy");
$fpdf->SetCreator("USEP SOCS");
$fpdf->SetAuthor("University of Southeastern Philippines");
$fpdf->SetSubject("Electronic Clearance (export copy)");

$fpdf->SetMargins(15, 15, 15);
$fpdf->AddPage();

$fpdf->SetY('15');
$fpdf->Image('logo.jpg', 13, $fpdf->GetY()-5, 25);
printBody();

$fpdf->Cell(0, 0, "Registrar's Copy", 0, 1, 'R', false);
$fpdf->Ln(4);
$fpdf->Cell(0, 0, "", 1, 1, 'L', true);
$fpdf->Ln(4);
$fpdf->Cell(0, 0, "Adviser's Copy", 0, 1, 'R', false);
$fpdf->SetY($fpdf->GetY()+ 10);

$fpdf->Image('logo.jpg', 13, $fpdf->GetY()-5, 25);
printBody();

function printBody(){
    global $fpdf, $stud_id, $stud_gender, $stud_name, $stud_year, 
            $stud_course, $stud_dept, $current_sem, $current_sy, $listOfSignatories;
    
    $fontsize = 10;
    $single_spacing = 4;
    $double_spacing = 10;

    $fpdf->SetFont('Times','I',$fontsize);
    $fpdf->Cell(0, 0, "Republic of the Philippines", 0, 1, 'C');

    $fpdf->Ln($single_spacing);
    $fpdf->SetFont('Times','',$fontsize);
    $fpdf->Cell(0, 0, "UNIVERSITY OF SOUTHEASTERN PHILIPPINES", 0, 1, 'C');

    $fpdf->Ln($single_spacing);
    $fpdf->SetFont('Times','B',$fontsize);
    $fpdf->Cell(0, 0, "Evening Program", 0, 1, 'C');

    $fpdf->Ln($single_spacing);
    $fpdf->SetFont('Times','',$fontsize);
    $fpdf->Cell(0, 0, "Davao City", 0, 1, 'C');

    $fpdf->Ln($double_spacing);
    $fpdf->SetFont('Helvetica','B',$fontsize);
    $fpdf->Cell(0, 0, "STUDENT CLEARANCE", 0, 1, 'C');

    $fpdf->Ln($double_spacing);
    $fpdf->SetFont('Times','B',$fontsize);
    $fpdf->Write(5, "I.D. No. ");
    $fpdf->SetFont('Times','U',$fontsize);
    $fpdf->Write(5, $stud_id);

    $fpdf->Ln($double_spacing);
    $fpdf->SetFont('Times','',$fontsize);
    $fpdf->Write(5, "TO WHOM IT MAY CONCERN:");

    $fpdf->Ln($double_spacing);
    $fpdf->Write(5, "This is to certify that " );

    $fpdf->SetFont('Times','BU',$fontsize);
    if ($stud_gender == "Male")
        $fpdf->Write(5, "Mr. ");
    else
        $fpdf->Write(5, "Ms./Mrs. ");


    $fpdf->Write(5, $stud_name);
    $fpdf->SetFont('Times','',$fontsize);
    $fpdf->Write(5, ", a ");
    $fpdf->SetFont('Times','BU',$fontsize);
    $fpdf->Write(5, $stud_year);
    $fpdf->SetFont('Times','',$fontsize);
    $fpdf->Write(5, " year ");
    $fpdf->SetFont('Times','BU',$fontsize);
    $fpdf->Write(5, $stud_course);
    $fpdf->SetFont('Times','',$fontsize);
    $fpdf->Write(5, " student in the ");
    $fpdf->SetFont('Times','BU',$fontsize);
    $fpdf->Write(5, $stud_dept);
    $fpdf->SetFont('Times','',$fontsize);
    $fpdf->Write(5, " is cleared of all, property and other accountabilities with this University as of the ");
    $fpdf->SetFont('Times','BU',$fontsize);
    $fpdf->Write(5, $current_sem);
    $fpdf->SetFont('Times','',$fontsize);
    $fpdf->Write(5, " , SY ");
    $fpdf->SetFont('Times','BU',$fontsize);
    $fpdf->Write(5, $current_sy);
    $fpdf->SetFont('Times','',$fontsize);
    $fpdf->Write(5, ".");

    $fpdf->Ln($double_spacing);

    
    //foreach ($listOfSignatories["id"] as $key => $value) {

    //}
    
    for($i=0; $i < count($listOfSignatories["id"]); $i+=4){
        
        for($k=$i; ($k < ($i+4))  && ($k < count($listOfSignatories["id"])); $k++){
            if ($listOfSignatories["status"][$k] == "Cleared")
                $fpdf->SetTextColor(38,148,10);
            else
                $fpdf->SetTextColor(242,34,34);
            $fpdf->Write(1, str_repeat(" ", 5));
            $fpdf->Cell(40, 5, $listOfSignatories["status"][$k], "B", 0, 'C', false);
            
            //echo $k . "<br/>";
        }
        
        $fpdf->Ln();
        
        $fpdf->SetTextColor(0,0,0);
        for($k=$i; ($k < ($i+4)) && ($k < count($listOfSignatories["id"])); $k++){
            $fpdf->Write(1, str_repeat(" ", 5));
            $fpdf->Cell(40, 5, $listOfSignatories["name"][$k], "T", 0, 'C', false);
            //echo $k . "<br/>";
        }
        
        $fpdf->Ln();
        $fpdf->Ln();
    }
    
    
    
    
    /*
    $fpdf->SetFillColor(83,83,83);
    $fpdf->SetTextColor(255,255,255);

    $fpdf->Cell(120, 5, "Signatory", 1, 0, 'C', true);
    $fpdf->Cell(0, 5, "Status", 1, 1, 'C', true);

    $fpdf->SetFillColor(255,255,255);
    $fpdf->SetTextColor(0,0,0);

    foreach ($listOfSignatories["id"] as $key => $value) {
        $fpdf->SetTextColor(0,0,0);
        $fpdf->Cell(120, 5, $listOfSignatories["name"][$key], 1, 0, 'L', true);

        if ($listOfSignatories["status"][$key] == "Cleared")
            $fpdf->SetTextColor(38,148,10);
        else
            $fpdf->SetTextColor(242,34,34);
        $fpdf->Cell(0, 5, $listOfSignatories["status"][$key], 1, 1, 'L', true);
    }
    */
    
    $fpdf->SetTextColor(0,0,0);
    
    $fpdf->Ln($double_spacing);
    
}

//$fpdf->Write(5, "[This portion over here still needs to be coded and will be finished soon.]");

$fpdf->Output("SOCS Clearance Export - $stud_name.pdf", 'D');
 

/*
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

*/

?>
