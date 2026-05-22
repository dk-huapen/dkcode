<?php
//	require('../../lib/fpdf/chinese.php');
	require('chinese.php');
	$conn = mysqli_connect("localhost","root","dk1314lich,forever!","db_rekong");
	if(!$conn){
		die("连接失败". mysqli_connect_error());
	}else
	{ 
	//	echo"连接成功";
	}
	mysqli_query($conn, "set names utf8");
	date_default_timezone_set('PRC');
        $time = date("Y-m-d");
	$sql = 'SELECT * FROM ProtectPointTable WHERE 1';
	$result = mysqli_query($conn, $sql);

	$pdf = new PDF_Chinese('L','mm','A4');
    	$pdf->AddGBFont('simhei', '黑体');
    	$pdf->AddPage();
    	$pdf->SetFont('simhei', '', 20);
	//$pdf->Cell(180,8,iconv("utf-8","gbk",'制表日期:'.$time),0,0,'R');
	$pdf->Cell(270,8,iconv("utf-8","gbk",'设备定值表'),0,0,'C');
    	$pdf->Ln();//换行
    	$pdf->SetFont('simhei', '', 12);
	$pdf->Cell(10,10,iconv("utf-8","gbk",'序号'),1,0,'C');
	$pdf->Cell(35,10,iconv("utf-8","gbk",'KKS'),1,0,'C');
	$pdf->Cell(55,10,iconv("utf-8","gbk",'描述'),1,0,'C');
	$pdf->Cell(17,10,iconv("utf-8","gbk",'I/O类型'),1,0,'C');
	$pdf->Cell(15,10,iconv("utf-8","gbk",'工程单位'),1,0,'C');
	$pdf->Cell(15,10,iconv("utf-8","gbk",'低I值'),1,0,'C');
	$pdf->Cell(15,10,iconv("utf-8","gbk",'低II值'),1,0,'C');
	$pdf->Cell(15,10,iconv("utf-8","gbk",'低III值'),1,0,'C');
	$pdf->Cell(15,10,iconv("utf-8","gbk",'高I值'),1,0,'C');
	$pdf->Cell(15,10,iconv("utf-8","gbk",'高II值'),1,0,'C');
	$pdf->Cell(15,10,iconv("utf-8","gbk",'高III值'),1,0,'C');
	$pdf->Cell(60,10,iconv("utf-8","gbk",'用途'),1,0,'C');
    	$pdf->Ln();//换行
	$i=1;
    	while($arr = mysqli_fetch_assoc($result)){
	$pdf->Cell(10,8,iconv("utf-8","gbk",$i),1,0,'C');
	$pdf->Cell(35,8,iconv("utf-8","gbk",$arr['point_kks']),1,0,'C');
	$pdf->Cell(55,8,iconv("utf-8","gbk",$arr['point_description']),1,0,'C');
	$pdf->Cell(17,8,iconv("utf-8","gbk",$arr['point_type']),1,0,'C');
	$pdf->Cell(15,8,iconv("utf-8","gbk",$arr['point_unit']),1,0,'C');
	$pdf->Cell(15,8,iconv("utf-8","gbk",$arr['L_LMT']),1,0,'C');
	$pdf->Cell(15,8,iconv("utf-8","gbk",$arr['LL_LMT']),1,0,'C');
	$pdf->Cell(15,8,iconv("utf-8","gbk",$arr['LLL_LMT']),1,0,'C');
	$pdf->Cell(15,8,iconv("utf-8","gbk",$arr['H_LMT']),1,0,'C');
	$pdf->Cell(15,8,iconv("utf-8","gbk",$arr['HH_LMT']),1,0,'C');
	$pdf->Cell(15,8,iconv("utf-8","gbk",$arr['HHH_LMT']),1,0,'C');
	$pdf->Cell(60,8,iconv("utf-8","gbk",$arr['point_remark']),1,0,'C');
    	$pdf->Ln();//换行
	$i=$i+1;
	}




?>
