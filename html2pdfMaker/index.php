<?php

require('fpdf\fpdf.php');

define('FPDF_FONTPATH','/home/www/font');

//create a FPDF object
$pdf=new FPDF();
$pdf->SetFont('AgencyFB','B',20);
$pdf->SetTextColor(50,60,100);
$pdf->AddPage('L','A3');
$pdf->Image('http://localhost/prjs/rsbr/web/images/certificate.jpg', 0, 0, 420, 297);
$pdf->SetXY (5,240);
$pdf->Cell( 30, 30, 
$pdf->Image('http://localhost/prjs/rsbr/web/images/qrcode.png', $pdf->GetX(), $pdf->GetY(), 30,30)
, 1, 0, 'C', false );



//set document properties
$pdf->SetAuthor('Lana Kovacevic');
$pdf->SetTitle('Royal Success Book of Records');

//set font for the entire document


//set up a page
// $pdf->AddPage('P');

// $pdf->w
// $pdf->h


//  $pdf->SetDisplayMode(real,'default');

//insert an image and make it a link 
// $pdf->Image('logo.png',10,20,33,0,' ','http://www.fpdf.org/');

//display the title with a border around it
$pdf->SetXY(50,20);
$pdf->SetDrawColor(50,60,100);
$pdf->Cell(100,10,$pdf->GetX().' + '.$pdf->GetY(),1,0,'C',0);

//Set x and y position for the main text, reduce font size and write content
$pdf->SetXY (10,50);
$pdf->SetFontSize(10);
$pdf->Write(5,'Congratulations! You have generated a PDF.');

$pdf->Output('example1.pdf','I');


?>