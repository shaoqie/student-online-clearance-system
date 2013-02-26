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
    $html2pdf = new HTML2PDF('P', 'Legal', 'en', true, 'UTF-8', array(15, 10, 15, 10));
    $html2pdf->pdf->SetDisplayMode('fullpage');
    $html2pdf->writeHTML($content);
    $html2pdf->Output('exemple03.pdf');
}
catch(HTML2PDF_exception $e) {
    echo $e;
    exit;
}
?>
