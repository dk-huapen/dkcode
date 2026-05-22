<?php
	require('chinese.php');
	$conn = mysqli_connect("localhost","root","dk1314lich,forever!","db_rekong");
	if(!$conn){
		die("连接失败". mysqli_connect_error());
	}else{ 
		mysqli_query($conn, "set names utf8");
		$pdf = new PDF_Chinese();
    		$pdf->AddGBFont('simhei', '黑体');
    		$pdf->AddPage();
	}
	/*******************初始化时间**********************************/
	if(date("w")==1){
			$first_day = strtotime("monday");
	}else{
			$first_day = strtotime("last monday");
		}
			$first_time = date("Y-m-d",$first_day);
			$begain=strtotime($first_time." - 2 day");
			$begain_time=date("Y-m-d",$begain);
			$end=strtotime($first_time." + 4 day");
			$end_time=date("Y-m-d", $end);
			if($end_time>date("Y-m-d")){
				$end_time=date("Y-m-d");
			}
			$nextbegain=strtotime($first_time." + 5 day");
			$nextbegain_time=date("Y-m-d",$nextbegain);
			$nextend=strtotime($nextbegain_time." + 6 day");
			$nextend_time=date("Y-m-d", $nextend);

	$sql = "SELECT * FROM `tb_diary` WHERE createtime='".$begain_time."'";
	$result = mysqli_query($conn, $sql);
	$diary_arr=mysqli_fetch_assoc($result);
	$begain_id = $diary_arr['diary_id'];
	$sql = "SELECT * FROM `tb_diary` WHERE createtime='".$end_time."'";
	$result = mysqli_query($conn, $sql);
	$diary_arr=mysqli_fetch_assoc($result);
	$end_id = $diary_arr['diary_id'];

	$begain_time=date("Y-m-d 00:00:00",$begain);
	$end_time=date("Y-m-d 23:59:59", $end);
			$time1=date("Y年m月d日",$begain);

			$time2=date("Y年m月d日",$end);

	/*******************标题**********************************/
    	$pdf->SetFont('simhei','B', 15);
	$pdf->Cell(180,8,iconv("utf-8","gbk",'热控班八月份第三周管理周报'),0,0,'C');
    	$pdf->SetFont('simhei','', 12);
    	$pdf->Ln();//换行
	$pdf->Cell(180,8,iconv("utf-8","gbk",$time1."至".$time2),0,0,'R');
    	$pdf->Ln();//换行
	/*******************设备概况**********************************/
    	$pdf->SetFont('simhei','B', 12);
	$pdf->Cell(180,8,iconv("utf-8","gbk",'一、设备概况'),0,0,'L');
    	$pdf->SetFont('simhei','', 12);
    	$pdf->Ln();//换行
	/*******************巡检中发现的问题**********************************/
	$pdf->Cell(180,8,iconv("utf-8","gbk",'1、巡检中发现的问题'),0,0,'L');
    	$pdf->Ln();//换行
	$pdf->Cell(15,8,iconv("utf-8","gbk",'序号'),1,0,'C');
	$pdf->Cell(110,8,iconv("utf-8","gbk",'内容'),1,0,'C');
	$pdf->Cell(15,8,iconv("utf-8","gbk",'发现人'),1,0,'C');
	$pdf->Cell(25,8,iconv("utf-8","gbk",'整改时间'),1,0,'C');
	$pdf->Cell(25,8,iconv("utf-8","gbk",'完成情况'),1,0,'C');
    	$pdf->Ln();//换行
	$sql = "SELECT tb_jobs.job_id,tb_jobs.job_content,(SELECT tb_user.user_name FROM tb_user WHERE tb_user.user_id=tb_jobs.job_header)AS job_header_name,(SELECT tb_job_status.job_status_content FROM tb_job_status WHERE tb_job_status.job_status_id=tb_jobs.job_status)AS job_status,(SELECT tb_diary.createtime FROM tb_diary WHERE tb_diary.diary_id=tb_jobs.diary_id)AS jobs_diary_id FROM tb_jobs WHERE (diary_id between ".$begain_id." AND ".$end_id.") AND job_type = 10";
	$result = mysqli_query($conn, $sql);
	$i=1;
    	while($arr = mysqli_fetch_assoc($result)){
	$pdf->Cell(15,8,iconv("utf-8","gbk",$i),1,0,'C');
	$pdf->Cell(110,8,iconv("utf-8","gbk",$arr['job_content']),1,0,'C');
	$pdf->Cell(15,8,iconv("utf-8","gbk",$arr['job_header_name']),1,0,'C');
	$pdf->Cell(25,8,iconv("utf-8","gbk",$arr['jobs_diary_id']),1,0,'C');
	$pdf->Cell(25,8,iconv("utf-8","gbk",$arr['job_status']),1,0,'C');
    	$pdf->Ln();//换行
	$i=$i+1;
	}
	/*******************目前存在的问题**********************************/
	$pdf->Cell(180,8,iconv("utf-8","gbk",'2、设备目前存在的问题'),0,0,'L');
    	$pdf->Ln();//换行
	$pdf->Cell(15,8,iconv("utf-8","gbk",'序号'),1,0,'C');
	$pdf->Cell(110,8,iconv("utf-8","gbk",'内容'),1,0,'C');
	$pdf->Cell(15,8,iconv("utf-8","gbk",'负责人'),1,0,'C');
	$pdf->Cell(50,8,iconv("utf-8","gbk",'完成情况'),1,0,'C');
    	$pdf->Ln();//换行
	$sql = "SELECT tb_jobs.job_id,tb_jobs.job_content,(SELECT tb_user.user_name FROM tb_user WHERE tb_user.user_id=tb_jobs.job_header)AS job_header_name,(SELECT tb_job_status.job_status_content FROM tb_job_status WHERE tb_job_status.job_status_id=tb_jobs.job_status)AS job_status,(SELECT tb_diary.createtime FROM tb_diary WHERE tb_diary.diary_id=tb_jobs.diary_id)AS jobs_diary_id,job_remarks FROM tb_jobs WHERE job_type = 21";
	$result = mysqli_query($conn, $sql);
	$i=1;
    	while($arr = mysqli_fetch_assoc($result)){
	$pdf->Cell(15,8,iconv("utf-8","gbk",$i),1,0,'C');
	$pdf->Cell(110,8,iconv("utf-8","gbk",$arr['job_content']),1,0,'C');
	$pdf->Cell(15,8,iconv("utf-8","gbk",$arr['job_header_name']),1,0,'C');
	$pdf->Cell(50,8,iconv("utf-8","gbk",$arr['job_remarks']),1,0,'C');
    	$pdf->Ln();//换行
	$i=$i+1;
	}
	/*******************本周工作完成情况**********************************/
    	$pdf->SetFont('simhei','B', 12);
	$pdf->Cell(180,8,iconv("utf-8","gbk",'二、本周计划工作完成情况（包含定期工作）'),0,0,'L');
    	$pdf->SetFont('simhei','', 12);
    	$pdf->Ln();//换行
	$pdf->Cell(15,8,iconv("utf-8","gbk",'序号'),1,0,'C');
	$pdf->Cell(110,8,iconv("utf-8","gbk",'内容'),1,0,'C');
	$pdf->Cell(15,8,iconv("utf-8","gbk",'负责人'),1,0,'C');
	$pdf->Cell(25,8,iconv("utf-8","gbk",'完成时间'),1,0,'C');
	$pdf->Cell(25,8,iconv("utf-8","gbk",'完成情况'),1,0,'C');
    	$pdf->Ln();//换行
	/*******************重点工作**********************************/
	$sql = "SELECT tb_jobs.job_id,tb_jobs.job_content,(SELECT tb_user.user_name FROM tb_user WHERE tb_user.user_id=tb_jobs.job_header)AS job_header_name,(SELECT tb_job_status.job_status_content FROM tb_job_status WHERE tb_job_status.job_status_id=tb_jobs.job_status)AS job_status,(SELECT tb_diary.createtime FROM tb_diary WHERE tb_diary.diary_id=tb_jobs.diary_id)AS jobs_diary_id FROM tb_jobs WHERE (diary_id between ".$begain_id." AND ".$end_id.") AND (job_type = 3 OR job_type = 4 OR job_type=6 OR job_type=7 OR job_type=8)";
	$result = mysqli_query($conn, $sql);
	$i=1;
    	while($arr = mysqli_fetch_assoc($result)){
	$pdf->Cell(15,8,iconv("utf-8","gbk",$i),1,0,'C');
	$pdf->Cell(110,8,iconv("utf-8","gbk",$arr['job_content']),1,0,'C');
	$pdf->Cell(15,8,iconv("utf-8","gbk",$arr['job_header_name']),1,0,'C');
	$pdf->Cell(25,8,iconv("utf-8","gbk",$arr['jobs_diary_id']),1,0,'C');
	$pdf->Cell(25,8,iconv("utf-8","gbk",$arr['job_status']),1,0,'C');
    	$pdf->Ln();//换行
	$i=$i+1;
	}
	/*******************定期工作**********************************/
	$sql = "SELECT tb_jobs.job_id,tb_jobs.job_content,(SELECT tb_user.user_name FROM tb_user WHERE tb_user.user_id=tb_jobs.job_header)AS job_header_name,(SELECT tb_job_status.job_status_content FROM tb_job_status WHERE tb_job_status.job_status_id=tb_jobs.job_status)AS job_status,(SELECT tb_diary.createtime FROM tb_diary WHERE tb_diary.diary_id=tb_jobs.diary_id)AS jobs_diary_id FROM tb_jobs WHERE (diary_id between ".$begain_id." AND ".$end_id.") AND job_type = 2";
	$result = mysqli_query($conn, $sql);
    	while($arr = mysqli_fetch_assoc($result)){
	$pdf->Cell(15,8,iconv("utf-8","gbk",$i),1,0,'C');
	$pdf->Cell(110,8,iconv("utf-8","gbk",$arr['job_content']),1,0,'C');
	$pdf->Cell(15,8,iconv("utf-8","gbk",$arr['job_header_name']),1,0,'C');
	$pdf->Cell(25,8,iconv("utf-8","gbk",$arr['jobs_diary_id']),1,0,'C');
	$pdf->Cell(25,8,iconv("utf-8","gbk",$arr['job_status']),1,0,'C');
    	$pdf->Ln();//换行
	$i=$i+1;
	}
	/*******************本周工作完成情况**********************************/
    	$pdf->SetFont('simhei','B', 12);
	$pdf->Cell(180,8,iconv("utf-8","gbk",'三、本周未完成工作原因'),0,0,'L');
    	$pdf->SetFont('simhei','', 12);
    	$pdf->Ln();//换行
	$pdf->Cell(15,8,iconv("utf-8","gbk",'序号'),1,0,'C');
	$pdf->Cell(110,8,iconv("utf-8","gbk",'内容'),1,0,'C');
	$pdf->Cell(15,8,iconv("utf-8","gbk",'负责人'),1,0,'C');
	$pdf->Cell(25,8,iconv("utf-8","gbk",'完成时间'),1,0,'C');
	$pdf->Cell(25,8,iconv("utf-8","gbk",'完成情况'),1,0,'C');
    	$pdf->Ln();//换行
	/*******************重点工作**********************************/
	$sql = "SELECT tb_jobs.job_id,tb_jobs.job_content,(SELECT tb_user.user_name FROM tb_user WHERE tb_user.user_id=tb_jobs.job_header)AS job_header_name,(SELECT tb_job_status.job_status_content FROM tb_job_status WHERE tb_job_status.job_status_id=tb_jobs.job_status)AS job_status,job_deadtime FROM tb_jobs WHERE (job_deadtime between '".$begain_time."' AND '".$end_time."') AND (job_status != 3)";
	//echo $sql;
	$result = mysqli_query($conn, $sql);
	$i=1;
    	while($arr = mysqli_fetch_assoc($result)){
	$pdf->Cell(15,8,iconv("utf-8","gbk",$i),1,0,'C');
	$pdf->Cell(110,8,iconv("utf-8","gbk",$arr['job_content']),1,0,'C');
	$pdf->Cell(15,8,iconv("utf-8","gbk",$arr['job_header_name']),1,0,'C');
	$pdf->Cell(25,8,iconv("utf-8","gbk",$arr['job_deadtime']),1,0,'C');
	$pdf->Cell(25,8,iconv("utf-8","gbk",$arr['job_status']),1,0,'C');
    	$pdf->Ln();//换行
	$i=$i+1;
	}
	/*******************设备管理分析**********************************/
    	$pdf->SetFont('simhei','B', 12);
	$pdf->Cell(180,8,iconv("utf-8","gbk",'六、本周设备管理分析'),0,0,'L');
    	$pdf->SetFont('simhei','', 12);
    	$pdf->Ln();//换行
	/*******************缺陷统计**********************************/
	$pdf->Cell(180,8,iconv("utf-8","gbk",'1、缺陷分析'),0,0,'L');

		$count_sql = "select count(*) from tb_defect WHERE defect_find_time between '".$begain_time."' and '".$end_time."'";
	//echo $count_sql;
        	$re = mysqli_query($conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$num = $result[0];
		$count_sql = "select count(*) from tb_defect WHERE defect_specialty=1 and (defect_find_time between '".$begain_time."' and '".$end_time."')";
        	$re = mysqli_query($conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$num1 = $result[0];
		$count_sql = "select count(*) from tb_defect WHERE defect_specialty=2 and (defect_find_time between '".$begain_time."' and '".$end_time."')";
        	$re = mysqli_query($conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$num2 = $result[0];
		$count_sql = "select count(*) from tb_defect WHERE defect_specialty=3 and (defect_find_time between '".$begain_time."' and '".$end_time."')";
        	$re = mysqli_query($conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$num3 = $result[0];
		$count_sql = "select count(*) from tb_defect WHERE defect_specialty=4 and (defect_find_time between '".$begain_time."' and '".$end_time."')";
        	$re = mysqli_query($conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$num4 = $result[0];
		$count_sql = "select count(*) from tb_defect WHERE defect_result=7 and (defect_find_time between '".$begain_time."' and '".$end_time."')";
        	$re = mysqli_query($conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$num5 = $result[0];
		$count_sql = "select count(*) from tb_defect WHERE defect_result=2 and (defect_find_time between '".$begain_time."' and '".$end_time."')";
        	$re = mysqli_query($conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$num6 = $result[0];
		$num7=round($num5/$num,4)*100;
		$count_sql = "select count(*) from tb_defect WHERE (defect_system=1 or defect_system=2 or defect_system=3 or defect_system=4) and (defect_find_time between '".$begain_time."' and '".$end_time."')";
        	$re = mysqli_query($conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$num8 = $result[0];
		$count_sql = "select count(*) from tb_defect WHERE (defect_system=5 or defect_system=6 or defect_system=7 or defect_system=8 or defect_system=9 or defect_system=11) and (defect_find_time between '".$begain_time."' and '".$end_time."')";
        	$re = mysqli_query($conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$num9 = $result[0];
		$count_sql = "select count(*) from tb_defect WHERE defect_system=10 and (defect_find_time between '".$begain_time."' and '".$end_time."')";
        	$re = mysqli_query($conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$num10 = $result[0];
		$count_sql = "select count(*) from tb_defect WHERE (defect_system=12 or defect_system=13) and (defect_find_time between '".$begain_time."' and '".$end_time."')";
        	$re = mysqli_query($conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$num11 = $result[0];
		$count_sql = "select count(*) from tb_defect WHERE defect_type=6 and (defect_find_time between '".$begain_time."' and '".$end_time."')";
        	$re = mysqli_query($conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$num12 = $result[0];
		$count_sql = "select count(*) from tb_defect WHERE defect_type=8 and (defect_find_time between '".$begain_time."' and '".$end_time."')";
        	$re = mysqli_query($conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$num13 = $result[0];

    	$pdf->Ln();//换行
    	$pdf->MultiCell(180,10,iconv("utf-8","gbk","本周共计发生缺陷".$num."条，其中一类缺陷".$num1."条，二类缺陷".$num2."条，三类缺陷".$num3."条，四类缺陷".$num4."条，已消除".$num5."条，延期缺陷".$num6."条，消缺率".$num7."%。锅炉发生缺陷".$num8."条 ，汽机及管网发生缺陷".$num9."条，DCS系统发生缺陷".$num10."条，外围发生缺陷".$num11."条。其中测点跳变或显示不准类缺陷".$num12."条，阀门类缺陷".$num13."条。"));
	/*******************延期缺陷**********************************/
	$pdf->Cell(180,8,iconv("utf-8","gbk",'2、延期缺陷'),0,0,'L');
    	$pdf->Ln();//换行
	/*****************************************************/
	$count_sql = "select count(*) from tb_defect WHERE defect_result = 2 and (diary_id between ".$begain_id." and ".$end_id.")";
        $re = mysqli_query($conn,$count_sql);
        $result = mysqli_fetch_row($re);
	if($result[0]>0){
		$pdf->Cell(15,8,iconv("utf-8","gbk",'序号'),1,0,'C');
		$pdf->Cell(20,8,iconv("utf-8","gbk",'编号'),1,0,'C');
		$pdf->Cell(110,8,iconv("utf-8","gbk",'缺陷内容'),1,0,'C');
		$pdf->Cell(45,8,iconv("utf-8","gbk",'延期原因'),1,0,'C');
    		$pdf->Ln();//换行
		$sql = "SELECT tb_defect.analysis_id,tb_defect.defect_id,tb_defect.defect_specialty,tb_defect.defect_cotent,tb_defect.defect_find_time,(SELECT tb_defect_status.defect_status_name FROM tb_defect_status WHERE tb_defect.defect_result = tb_defect_status.defect_status_id)AS defect_result,tb_defect.defect_clear_time,(SELECT tb_user.user_name FROM tb_user WHERE tb_defect.defect_clear_people = tb_user.user_id)AS defect_clear_people,tb_defect.defect_remarks FROM tb_defect WHERE defect_result = 2 and (diary_id between ".$begain_id." and ".$end_id.")";
		$result = mysqli_query($conn, $sql);
		$i=1;
    		while($arr = mysqli_fetch_assoc($result)){
			$pdf->Cell(15,8,iconv("utf-8","gbk",$i),1,0,'C');
			$pdf->Cell(20,8,iconv("utf-8","gbk",$arr['defect_id']),1,0,'C');
			$pdf->Cell(110,8,iconv("utf-8","gbk",$arr['defect_cotent']),1,0,'C');
			$pdf->Cell(45,8,iconv("utf-8","gbk",$arr['defect_remarks']),1,0,'C');
    			$pdf->Ln();//换行
			$i=$i+1;
		}
	}else{
		$pdf->Cell(180,8,iconv("utf-8","gbk",'无延期缺陷'),0,0,'L');
    		$pdf->Ln();//换行
	}
	/*******************缺陷分析**********************************/
	$pdf->Cell(180,8,iconv("utf-8","gbk",'3、重点缺陷分析'),0,0,'L');
		$tb_analysis_sql = 'SELECT tb_analysis.analysis_id,tb_analysis.analysis_content,(SELECT tb_user.user_name FROM tb_user WHERE tb_analysis.analysis_header = tb_user.user_id)AS analysis_header,tb_analysis.analysis_process,tb_analysis.analysis_reason,tb_analysis.analysis_result,tb_analysis.analysis_remarks FROM tb_analysis WHERE diary_id between '.$begain_id.' and '.$end_id;
		$tb_analysis_result = mysqli_query($conn, $tb_analysis_sql);
		$tb_analysis_arr_buf=mysqli_fetch_assoc($tb_analysis_result);
    	$pdf->Ln();//换行
    	$pdf->MultiCell(180,10,iconv("utf-8","gbk","一、".$tb_analysis_arr_buf['analysis_content']));
	$pdf->Cell(180,8,iconv("utf-8","gbk",'（1）、经过：'),0,0,'L');
    	$pdf->Ln();//换行
    	$pdf->MultiCell(180,10,iconv("utf-8","gbk",$tb_analysis_arr_buf['analysis_process']));
	$pdf->Cell(180,8,iconv("utf-8","gbk",'（2）、原因：'),0,0,'L');
    	$pdf->Ln();//换行
    	$pdf->MultiCell(180,10,iconv("utf-8","gbk",$tb_analysis_arr_buf['analysis_reason']));
	$pdf->Cell(180,8,iconv("utf-8","gbk",'（3）、防范措施：'),0,0,'L');
    	$pdf->Ln();//换行
    	$pdf->MultiCell(180,10,iconv("utf-8","gbk",$tb_analysis_arr_buf['analysis_result']));
	$pdf->Cell(180,8,iconv("utf-8","gbk",'（4）、备注：'),0,0,'L');
    	$pdf->Ln();//换行
    	$pdf->MultiCell(180,10,iconv("utf-8","gbk",$tb_analysis_arr_buf['analysis_remarks']));
	/*******************培训**********************************/
    	$pdf->SetFont('simhei','B', 12);
	$pdf->Cell(180,8,iconv("utf-8","gbk",'八、培训情况'),0,0,'L');
    	$pdf->SetFont('simhei','', 12);
    	$pdf->Ln();//换行
	$pdf->Cell(180,8,iconv("utf-8","gbk",'1、技术培训'),0,0,'L');
    	$pdf->Ln();//换行
	$pdf->Cell(190,8,iconv("utf-8","gbk",'本周技术培训开展情况'),1,0,'C');
    	$pdf->Ln();//换行
	$pdf->Cell(25,8,iconv("utf-8","gbk",'培训时间'),1,0,'C');
	$pdf->Cell(120,8,iconv("utf-8","gbk",'培训内容'),1,0,'C');
	$pdf->Cell(20,8,iconv("utf-8","gbk",'授课人'),1,0,'C');
	$pdf->Cell(25,8,iconv("utf-8","gbk",'完成情况'),1,0,'C');
    	$pdf->Ln();//换行
	$sql = "SELECT tb_jobs.job_id,tb_jobs.job_content,(SELECT tb_user.user_name FROM tb_user WHERE tb_user.user_id=tb_jobs.job_header)AS job_header_name,(SELECT tb_job_status.job_status_content FROM tb_job_status WHERE tb_job_status.job_status_id=tb_jobs.job_status)AS job_status,(SELECT tb_diary.createtime FROM tb_diary WHERE tb_diary.diary_id=tb_jobs.diary_id)AS jobs_diary_id FROM tb_jobs WHERE (diary_id between ".$begain_id." AND ".$end_id.") AND job_type = 12";
	$result = mysqli_query($conn, $sql);
    	while($arr = mysqli_fetch_assoc($result)){
	$pdf->Cell(25,8,iconv("utf-8","gbk",$arr['jobs_diary_id']),1,0,'C');
	$pdf->Cell(120,8,iconv("utf-8","gbk",$arr['job_content']),1,0,'C');
	$pdf->Cell(20,8,iconv("utf-8","gbk",$arr['job_header_name']),1,0,'C');
	$pdf->Cell(25,8,iconv("utf-8","gbk",$arr['job_status']),1,0,'C');
    	$pdf->Ln();//换行
	}
			$last=strtotime("last Saturday");
			$time=date("Y-m-d",$last);
			$lastweek=strtotime("$time + 7 day");
			$begain_time=date("Y-m-d",$lastweek);
			$week=strtotime("$begain_time + 6 day");
			$end_time=date("Y-m-d",$week);

		$sql = "SELECT tb_jobs.job_id,tb_jobs.job_content,(SELECT tb_user.user_name FROM tb_user WHERE tb_user.user_id=tb_jobs.job_header)AS job_header_name,job_deadtime,(SELECT tb_job_status.job_status_content FROM tb_job_status WHERE tb_job_status.job_status_id=tb_jobs.job_status)AS job_status FROM tb_jobs WHERE job_type =12 and (job_deadtime between '".$nextbegain_time."' and '".$nextend_time."')";
	$result = mysqli_query($conn, $sql);
	$pdf->Cell(190,8,iconv("utf-8","gbk",'下周技术培训内容'),1,0,'C');
    	$pdf->Ln();//换行
	$pdf->Cell(25,8,iconv("utf-8","gbk",'培训时间'),1,0,'C');
	$pdf->Cell(120,8,iconv("utf-8","gbk",'培训内容'),1,0,'C');
	$pdf->Cell(20,8,iconv("utf-8","gbk",'授课人'),1,0,'C');
	$pdf->Cell(25,8,iconv("utf-8","gbk",'备注'),1,0,'C');
    	$pdf->Ln();//换行
    	while($arr = mysqli_fetch_assoc($result)){
	$pdf->Cell(25,8,iconv("utf-8","gbk",$arr['job_deadtime']),1,0,'C');
	$pdf->Cell(120,8,iconv("utf-8","gbk",$arr['job_content']),1,0,'C');
	$pdf->Cell(20,8,iconv("utf-8","gbk",$arr['job_header_name']),1,0,'C');
	$pdf->Cell(25,8,iconv("utf-8","gbk",''),1,0,'C');
    	$pdf->Ln();//换行
	}
	$pdf->Cell(180,8,iconv("utf-8","gbk",'2、安全培训'),0,0,'L');
    	$pdf->Ln();//换行
	$pdf->Cell(190,8,iconv("utf-8","gbk",'本周安全培训开展情况'),1,0,'C');
    	$pdf->Ln();//换行
	$pdf->Cell(25,8,iconv("utf-8","gbk",'培训时间'),1,0,'C');
	$pdf->Cell(120,8,iconv("utf-8","gbk",'培训内容'),1,0,'C');
	$pdf->Cell(20,8,iconv("utf-8","gbk",'授课人'),1,0,'C');
	$pdf->Cell(25,8,iconv("utf-8","gbk",'完成情况'),1,0,'C');
    	$pdf->Ln();//换行
	$sql = "SELECT tb_jobs.job_id,tb_jobs.job_content,(SELECT tb_user.user_name FROM tb_user WHERE tb_user.user_id=tb_jobs.job_header)AS job_header_name,(SELECT tb_job_status.job_status_content FROM tb_job_status WHERE tb_job_status.job_status_id=tb_jobs.job_status)AS job_status,(SELECT tb_diary.createtime FROM tb_diary WHERE tb_diary.diary_id=tb_jobs.diary_id)AS jobs_diary_id FROM tb_jobs WHERE (diary_id between ".$begain_id." AND ".$end_id.") AND job_type = 13";
	$result = mysqli_query($conn, $sql);
    	while($arr = mysqli_fetch_assoc($result)){
	$pdf->Cell(25,8,iconv("utf-8","gbk",$arr['jobs_diary_id']),1,0,'C');
	$pdf->Cell(120,8,iconv("utf-8","gbk",$arr['job_content']),1,0,'C');
	$pdf->Cell(20,8,iconv("utf-8","gbk",$arr['job_header_name']),1,0,'C');
	$pdf->Cell(25,8,iconv("utf-8","gbk",''),1,0,'C');
    	$pdf->Ln();//换行
	}
	$pdf->Cell(190,8,iconv("utf-8","gbk",'下周安全培训内容'),1,0,'C');
    	$pdf->Ln();//换行
	$pdf->Cell(25,8,iconv("utf-8","gbk",'培训时间'),1,0,'C');
	$pdf->Cell(120,8,iconv("utf-8","gbk",'培训内容'),1,0,'C');
	$pdf->Cell(20,8,iconv("utf-8","gbk",'授课人'),1,0,'C');
	$pdf->Cell(25,8,iconv("utf-8","gbk",'备注'),1,0,'C');
    	$pdf->Ln();//换行
		$sql = "SELECT tb_jobs.job_id,tb_jobs.job_content,(SELECT tb_user.user_name FROM tb_user WHERE tb_user.user_id=tb_jobs.job_header)AS job_header_name,job_deadtime,(SELECT tb_job_status.job_status_content FROM tb_job_status WHERE tb_job_status.job_status_id=tb_jobs.job_status)AS job_status FROM tb_jobs WHERE job_type =13 and (job_deadtime between '".$nextbegain_time."' and '".$nextend_time."')";
	$result = mysqli_query($conn, $sql);
    	while($arr = mysqli_fetch_assoc($result)){
	$pdf->Cell(25,8,iconv("utf-8","gbk",$arr['job_deadtime']),1,0,'C');
	$pdf->Cell(120,8,iconv("utf-8","gbk",$arr['job_content']),1,0,'C');
	$pdf->Cell(20,8,iconv("utf-8","gbk",$arr['job_header_name']),1,0,'C');
	$pdf->Cell(25,8,iconv("utf-8","gbk",''),1,0,'C');
    	$pdf->Ln();//换行
	}
    	$pdf->SetFont('simhei','B', 12);
	$pdf->Cell(180,8,iconv("utf-8","gbk",'九、下周工作计划'),0,0,'L');
    	$pdf->SetFont('simhei','', 12);
    	$pdf->Ln();//换行
	$pdf->Cell(15,8,iconv("utf-8","gbk",'序号'),1,0,'C');
	$pdf->Cell(110,8,iconv("utf-8","gbk",'内容'),1,0,'C');
	$pdf->Cell(15,8,iconv("utf-8","gbk",'负责人'),1,0,'C');
	$pdf->Cell(25,8,iconv("utf-8","gbk",'完成时间'),1,0,'C');
	$pdf->Cell(25,8,iconv("utf-8","gbk",'备注'),1,0,'C');
    	$pdf->Ln();//换行
		$sql = "SELECT tb_jobs.job_id,tb_jobs.job_content,(SELECT tb_user.user_name FROM tb_user WHERE tb_user.user_id=tb_jobs.job_header)AS job_header_name,job_deadtime,(SELECT tb_job_status.job_status_content FROM tb_job_status WHERE tb_job_status.job_status_id=tb_jobs.job_status)AS job_status FROM tb_jobs WHERE (job_type =3 or job_type = 4) and (job_deadtime between '".$nextbegain_time."' and '".$nextend_time."')";
	$result = mysqli_query($conn, $sql);
		$i=1;
    	while($arr = mysqli_fetch_assoc($result)){
	$pdf->Cell(15,8,iconv("utf-8","gbk",$i),1,0,'C');
	$pdf->Cell(110,8,iconv("utf-8","gbk",$arr['job_content']),1,0,'C');
	$pdf->Cell(15,8,iconv("utf-8","gbk",$arr['job_header_name']),1,0,'C');
	$pdf->Cell(25,8,iconv("utf-8","gbk",$arr['job_deadtime']),1,0,'C');
	$pdf->Cell(25,8,iconv("utf-8","gbk",''),1,0,'C');
    	$pdf->Ln();//换行
	$i=$i+1;
	}
		$sql = "SELECT tb_jobs.job_id,tb_jobs.job_content,(SELECT tb_user.user_name FROM tb_user WHERE tb_user.user_id=tb_jobs.job_header)AS job_header_name,job_deadtime,(SELECT tb_job_status.job_status_content FROM tb_job_status WHERE tb_job_status.job_status_id=tb_jobs.job_status)AS job_status FROM tb_jobs WHERE job_type =2 and (job_deadtime between '".$nextbegain_time."' and '".$nextend_time."')";
	$result = mysqli_query($conn, $sql);
    	while($arr = mysqli_fetch_assoc($result)){
	$pdf->Cell(15,8,iconv("utf-8","gbk",$i),1,0,'C');
	$pdf->Cell(110,8,iconv("utf-8","gbk",$arr['job_content']),1,0,'C');
	$pdf->Cell(15,8,iconv("utf-8","gbk",$arr['job_header_name']),1,0,'C');
	$pdf->Cell(25,8,iconv("utf-8","gbk",$arr['job_deadtime']),1,0,'C');
	$pdf->Cell(25,8,iconv("utf-8","gbk",''),1,0,'C');
    	$pdf->Ln();//换行
	$i=$i+1;
	}





?>
