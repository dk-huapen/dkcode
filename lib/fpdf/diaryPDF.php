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
    	//$time = date("2020-02-07");
	$sql = "SELECT * FROM `tb_diary` WHERE createtime='".$time."'";
	$result = mysqli_query($conn, $sql);

	if($diary_arr=mysqli_fetch_assoc($result)){
	$diary_id=$diary_arr['diary_id'];
	$diary_before=$diary_arr['diary_before'];
	$diary_after=$diary_arr['diary_after'];
	//echo $diary_before;
		$tb_user_sql = "SELECT * FROM `tb_user` WHERE user_id =".$diary_arr['header'];
		$tb_user_result = mysqli_query($conn, $tb_user_sql);
		$tb_user_arr=mysqli_fetch_assoc($tb_user_result);
		$header = $tb_user_arr['user_name'];
		$tb_user_sql = "SELECT * FROM `tb_user` WHERE user_id =".$diary_arr['duty'];
		$tb_user_result = mysqli_query($conn, $tb_user_sql);
		$tb_user_arr=mysqli_fetch_assoc($tb_user_result);
		$duty = $tb_user_arr['user_name'];
	$sql = "SELECT tb_defect.defect_id,tb_defect.defect_cotent,(SELECT tb_defect_status.defect_status_name FROM tb_defect_status WHERE tb_defect.defect_result = tb_defect_status.defect_status_id)AS defect_result,(SELECT tb_user.user_name FROM tb_user WHERE tb_defect.defect_clear_people = tb_user.user_id)AS defect_clear_people FROM tb_defect WHERE diary_id =".$diary_id;
	$defectresult = mysqli_query($conn, $sql);

	//$defect_arr=mysqli_fetch_assoc($result);
	}
	$pdf = new PDF_Chinese();
    $pdf->AddGBFont('simhei', '黑体');
    $pdf->AddPage();


    //自动换行
    	$pdf->SetFont('simhei', '', 20);
	$pdf->Cell(180,10,iconv("utf-8","gbk",'热控班组日志'),0,0,'C');
    	$pdf->Ln();//换行

    	$pdf->SetFont('simhei', '', 15);
	$pdf->Cell(180,10,iconv("utf-8","gbk",$time),0,0,'R');
    	$pdf->Ln();//换行
	$people = '班组负责人：'.$header.'      值班人员：'.$duty;
	$pdf->Cell(180,10,iconv("utf-8","gbk",$people),0,0,'R');
    	$pdf->Ln();//换行
	$queqin = '缺勤人员：';
		$tb_user_sql = "SELECT * FROM `tb_user` WHERE 1";
		$tb_user_result = mysqli_query($conn, $tb_user_sql);
		while($tb_user_arr=mysqli_fetch_assoc($tb_user_result)){
			if($tb_user_arr['user_id']>0 && $tb_user_arr['user_id']<14){
									if(($diary_arr['name'.$tb_user_arr['user_id']]) == 0){
										$queqin.=$tb_user_arr['user_name'];
										$queqin.="、";
									}
								}
		}
	$pdf->Cell(180,10,iconv("utf-8","gbk",$queqin),0,0,'R');
    	$pdf->Ln();//换行
	$pdf->Cell(180,10,iconv("utf-8","gbk",'班前会：'),0,0,'L');
    	$pdf->Ln();//换行

    	$pdf->SetFont('simhei', '', 12);
    	$pdf->MultiCell(180,10,iconv("utf-8","gbk",$diary_before));

    	$pdf->SetFont('simhei', '', 15);
	$pdf->Cell(180,10,iconv("utf-8","gbk",'缺陷列表：'),0,0,'L');
    	$pdf->Ln();//换行

    	$pdf->SetFont('simhei', '', 12);
	$pdf->Cell(25,8,iconv("utf-8","gbk",'缺陷编号'),1,0,'C');
	$pdf->Cell(125,8,iconv("utf-8","gbk",'缺陷内容'),1,0,'C');
	$pdf->Cell(20,8,iconv("utf-8","gbk",'消缺人'),1,0,'C');
	$pdf->Cell(20,8,iconv("utf-8","gbk",'结果'),1,0,'C');
    	$pdf->Ln();//换行

    	while($arr = mysqli_fetch_assoc($defectresult)){
	   	$pdf->Cell(25,8,iconv("utf-8","gbk",$arr['defect_id']),1,0,'C');
	    	$pdf->Cell(125,8,iconv("utf-8","gbk",$arr['defect_cotent']),1);
	    	$pdf->Cell(20,8,iconv("utf-8","gbk",$arr['defect_clear_people']),1,0,'C');
	    	$pdf->Cell(20,8,iconv("utf-8","gbk",$arr['defect_result']),1,0,'C');
    		$pdf->Ln();//换行
    }
    	$pdf->SetFont('simhei', '', 15);
	$pdf->Cell(180,10,iconv("utf-8","gbk",'工作列表：'),0,0,'L');
    	$pdf->Ln();//换行
$sql = "SELECT tb_jobs.job_id,tb_jobs.job_content,(SELECT tb_user.user_name FROM tb_user WHERE tb_user.user_id=tb_jobs.job_header)AS job_header_name,tb_jobs.job_people,(SELECT tb_job_status.job_status_content FROM tb_job_status WHERE tb_job_status.job_status_id=tb_jobs.job_status)AS job_status FROM tb_jobs WHERE diary_id =".$diary_id;
$defectresult = mysqli_query($conn, $sql);
    	$pdf->SetFont('simhei', '', 12);
	$pdf->Cell(25,8,iconv("utf-8","gbk",'工作编号'),1,0,'C');
 	$pdf->Cell(105,8,iconv("utf-8","gbk",'工作内容'),1,0,'C');
	$pdf->Cell(20,8,iconv("utf-8","gbk",'负责人'),1,0,'C');
	$pdf->Cell(20,8,iconv("utf-8","gbk",'成员'),1,0,'C');
 	$pdf->Cell(20,8,iconv("utf-8","gbk",'结果'),1,0,'C');
    	$pdf->Ln();//换行
    	while($arr = mysqli_fetch_assoc($defectresult)){
	    	$pdf->Cell(25,8,iconv("utf-8","gbk",$arr['job_id']),1,0,'C');
	    	$pdf->Cell(105,8,iconv("utf-8","gbk",$arr['job_content']),1);
	    	$pdf->Cell(20,8,iconv("utf-8","gbk",$arr['job_header_name']),1,0,'C');
	    	$pdf->Cell(20,8,iconv("utf-8","gbk",$arr['job_people']),1,0,'C');
	    	$pdf->Cell(20,8,iconv("utf-8","gbk",$arr['job_status']),1,0,'C');
    		$pdf->Ln();//换行
    	}

    	$pdf->SetFont('simhei', '', 15);
	$pdf->Cell(180,10,iconv("utf-8","gbk",'班后会：'),0,0,'L');
    	$pdf->Ln();//换行
    	$pdf->SetFont('simhei', '', 12);
    	$pdf->MultiCell(180,10,iconv("utf-8","gbk",$diary_after));

?>
