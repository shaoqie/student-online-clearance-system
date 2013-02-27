<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

ob_start();
include('export.inc.php');
$content = ob_get_clean();
require_once('../libs/html2pdf/html2pdf.class.php');
try
{
    $student_model = new Student_Model();
    $stud_id = Session::get_user();
    $student_model->queryStudent_Info($stud_id);
    $stud_name = $student_model->getStud_Name();
    
    $html2pdf = new HTML2PDF('P', 'Legal', 'en', true, 'UTF-8', array(15, 10, 15, 10));
    $html2pdf->pdf->SetDisplayMode('fullpage');
    $html2pdf->writeHTML($content);
    $html2pdf->Output("SOCS Clearance Export - $stud_name.pdf");
}
catch(HTML2PDF_exception $e) {
    echo $e;
    exit;
}
?>
