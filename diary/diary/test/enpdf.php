<?php
	define('FPDF_FONTPATH','../../lib/fpdf185/font/');
//	require_once('../../lib/fpdf185/chinese.php');
	require_once('../../lib/fpdf185/fpdf.php');
	$pdf=new FPDF;
	$pdf->AddPage();
	$pdf->SetFont('arial');
//	$pdf->Text(5,20,'test pdf');
	$pdf->Cell(150,10,'hell',0,1,'c');
	$pdf->Output('a.pdf','D');
?>
