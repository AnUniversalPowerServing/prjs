<?php

require('lib\fpdf\fpdf.php');
include('lib/phpqrcode/qrlib.php');

if(isset($_POST["rsbr_certificate_txt"]) && isset($_POST["rsbr_certificate_Id"]) && strlen($_POST["rsbr_certificate_Id"])>0){
$certificateTxt = $_POST["rsbr_certificate_txt"];
$certificateId = $_POST["rsbr_certificate_Id"];
$qrCode = 'http://localhost/prjs/rsbr/web_bak/backend/qrcode.php?qrContent='.$certificateId;
$pdf=new FPDF();

$pdf->SetTitle('Royal Success Book of Records');

$pdf->AddFont('AgencyFB-Reg','','agencyr.php');
$pdf->SetFont('AgencyFB-Reg');

$pdf->AddPage('L','A3');

$pdf->SetTextColor(51,50,50);

$pdf->Image('http://localhost/prjs/rsbr/web_bak/images/certificate.jpg', 0, 0, 420, 297);

$pdf->SetXY(5,245);
$pdf->Cell( 30, 30, 
$pdf->Image($qrCode, $pdf->GetX(), $pdf->GetY(), 30,30,"png")
, 1, 0, 'C', false );

$pdf->SetXY(30,50);
$pdf->SetFontSize(40);

$pdf->fitCell($pdf,$certificateTxt,30,173);

$pdf->Output('RoyalSuccessBookOfRecords-Certificate.pdf','I');
}
else { header("Location:index.php"); }

?>