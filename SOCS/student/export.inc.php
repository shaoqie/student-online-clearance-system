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

$dept = new Department_Model();
$dept_logo = $dept->get_logo($stud_deptID);

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
    <head>

    </head>
    <body style="font-size:11px;">
        <?php
        printClearance();
        echo "<br/><hr/><br/>";
        printClearance();
        ?>


        <?php

        function printClearance() {
            global $fpdf, $stud_id, $stud_gender, $stud_name, $stud_year,
            $stud_course, $stud_dept, $current_sem, $current_sy, $listOfSignatories,
            $signatory_model, $dept_logo;
            ?>
            <!--
            <div style="">
                <div style="margin-left: 50px; float: left;width: 1px;"><img style="height: 120px; width:120px;" src="logo.jpg"/></div>
            </div>

            <p style="text-align: center;">
                <i>Republic of the Philippines</i><br/>
                UNIVERSITY OF SOUTHEASTERN PHILIPPINES<br/>
                Davao City<br/><br/>
                <b>STUDENT CLEARANCE</b><br/>
            </p>
            -->

            <div style="position:relative;">
                <div style="position:absolute;left:0;"><img style="height: 90px; width:90px;" src="logo.jpg"/></div>

                <div>
                    <p style="text-align: center;">
                        <i>Republic of the Philippines</i><br/>
                        UNIVERSITY OF SOUTHEASTERN PHILIPPINES<br/>
                        Davao City<br/><br/>
                        <b>STUDENT CLEARANCE</b><br/>
                    </p>
                </div>

                <?php if ($dept_logo != null && isset($dept_logo) && $dept_logo != ""): ?>
                    <div style="position:absolute;right:0;"><img style="height: 90px; width:90px;" src="<?php echo $dept_logo ?>" /></div>
                <?php endif ?>

            </div>

            <br/><br/>
            <p><b>I.D. No.</b> <span style="text-decoration: underline"><?php echo $stud_id ?></span></p>

            <p>TO WHOM IT MAY CONCERN:</p>

            <p><?php echo str_repeat("&nbsp;", 20); ?>This is to certify that 
                <b><?php
                    if ($stud_gender == "Male")
                        echo "<u>Mr. ";
                    else
                        echo "<u>Ms./Mrs. ";
                    echo $stud_name;
                    ?></u></b>,
            a <b><u><?php echo $stud_year; ?></u></b> <b><u><?php echo $stud_course; ?></u></b>
            student in the <b><u><?php echo $stud_dept; ?></u></b> is cleared of all, property and other accountabilities with this University as of the 
            <b><u><?php echo $current_sem; ?></u></b>, SY <b><u><?php echo $current_sy; ?></u>.</b></p>


        <table border="0" align="center">

            <?php
            $column_count = 3;
            $vt = 0;
            $vi = 0;
            for ($i = 0; $i < count($listOfSignatories["id"]); $i++) {
                if (($i % $column_count) == 0) {
                    echo '<tr style="min-height:60px;">';
                    $vt = $i + 2;
                }

                echo '<td style="vertical-align:bottom; text-align:center;">';

                $sigIm = $signatory_model->getSignature($listOfSignatories["id"][$i]);
                if (is_null($sigIm)) {

                    if ($listOfSignatories["status"][$i] == "Cleared") {
                        ?> <span style="color: green;">  <?php
                        echo $listOfSignatories["status"][$i];
                        ?> </span><?php
                    } else {
                        ?> <span style="color: red;">  <?php
                            echo $listOfSignatories["status"][$i];
                            ?> </span><?php
                    }
                } else {
                    if ($listOfSignatories["status"][$i] == "Cleared") {

                        $sigIm = $signatory_model->getSignature($listOfSignatories["id"][$i]);
                        $sigIm = parse_url($sigIm, PHP_URL_PATH);
                        $sigIm = substr($sigIm, strrpos($sigIm, "/") + 1);
                        $sigIm = "../photos/signatures/" . $sigIm;

                        echo '<img src="'.$sigIm.'" />';
                    }
                }

                echo '<hr style="border-style:solid;margin-bottom:1px; margin-top:1px;" />';
                echo $listOfSignatories["name"][$i];
                echo "</td>";

                if ($i == $vt)
                    echo "</tr>";
                $vi = $i;
            }
            if ($vt > $vi) {
                echo "</tr>";
            }
            ?>
        </table>
    <?php } ?>
</body>
</html>

