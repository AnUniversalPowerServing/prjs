<?php
session_start();
require('lib\fpdf\fpdf.php');
include('lib/phpqrcode/qrlib.php');
// print_r($_POST);
if(isset($_POST["rsbr_certificate_txt"]) && isset($_POST["rsbr_certificate_desc"]) &&
isset($_POST["rsbr_certificate_Id"]) && strlen($_POST["rsbr_certificate_Id"])>0){
$certificateTxt = $_POST["rsbr_certificate_txt"];
$certificateDesc = $_POST["rsbr_certificate_desc"];
$certificateId = $_POST["rsbr_certificate_Id"];
$qrCode = $_SESSION["PROJECT_URL"].'qrcode.php?qrContent='.$certificateId;
$pdf=new FPDF();

$pdf->SetTitle('Royal Success Book of Records');

$pdf->AddFont('Times','','times.php');
$pdf->AddFont('TimesB','','timesb.php');
$pdf->SetFont('TimesB');

$pdf->AddPage('P','Letter');

// $pdf->SetTextColor(51,50,50);

$pdf->Image($_SESSION["PROJECT_URL"].'images/certificate.jpg', 0, 0, 215, 280);

$pdf->SetXY(95,238);
$pdf->Cell( 15, 15, $pdf->Image($qrCode, $pdf->GetX(), $pdf->GetY(), 15,15,"png"), 1, 0, 'C', false );

$pdf->SetFontSize(16);
$lines=$pdf->fitCell(40,13,$pdf,strtoupper($certificateTxt),103,85,10,10,10,10);
$pdf->SetFontSize(16);
$descStart=$lines*10;+

$pdf->SetFont('Times');
$pdf->SetFontSize(14);
$pdf->fitCell(90,15,$pdf,$certificateDesc,103,(85+$descStart),10,10,10,10);

$pdf->Output('RoyalSuccessBookOfRecords-Certificate.pdf','I');
}
else { 
 header("Location:".$_SESSION["PROJECT_URL"]."admin/dashboard"); 
}

?>