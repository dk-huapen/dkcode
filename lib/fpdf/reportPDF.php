<?php
	include("../../lib/phpqrcode/qrlib.php");
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
	$reportId = $_GET['id'];
	$url = $_GET['url'];//跳转至该页面的上一页的网址，目的是制作网页跳转二维码
				$codeContents = $url;
				$pngPath = "image/QRPager.png";
        $time = date("Y-m-d");
    	//$time = date("2020-02-07");
	$sql = "SELECT * FROM `tb_FeederReport` WHERE report_id='".$reportId."'";
	$result = mysqli_query($conn, $sql);

	if($FeedReport_arr=mysqli_fetch_assoc($result)){
	$LeaderId = $FeedReport_arr['report_account_id'];
	$flag = $FeedReport_arr['flag'];
	$calibra = $FeedReport_arr['calibra'];
	$checkp = $FeedReport_arr['checkp'];
	$report_date = $FeedReport_arr['report_date'];
	//				$tb_account_sql = "SELECT equipment_kks,equipment_name FROM tb_account WHERE account_id =".$FeedReport_arr['report_account_id'];
					$tb_account_sql = "SELECT * FROM tb_account WHERE account_id =".$FeedReport_arr['report_account_id'];
					$tb_account_result = mysqli_query($conn, $tb_account_sql);
					$tb_account_arr=mysqli_fetch_assoc($tb_account_result);

	$biaozhun = $FeedReport_arr['report_NumberColumn48'];
					$tb_good_sql = "SELECT * FROM tb_goods WHERE goods_id =".$tb_account_arr['equipment_goods_id'];
					$tb_good_result = mysqli_query($conn, $tb_good_sql);
					$tb_good_arr=mysqli_fetch_assoc($tb_good_result);
		$tb_user_sql = "SELECT * FROM `tb_user` WHERE user_id =".$diary_arr['header'];
		$tb_user_result = mysqli_query($conn, $tb_user_sql);
		$tb_user_arr=mysqli_fetch_assoc($tb_user_result);
		$header = $tb_user_arr['user_name'];
		$tb_user_sql = "SELECT * FROM `tb_user` WHERE user_id =".$diary_arr['duty'];
		$tb_user_result = mysqli_query($conn, $tb_user_sql);
		$tb_user_arr=mysqli_fetch_assoc($tb_user_result);
		$duty = $tb_user_arr['user_name'];
		$tb_user_sql = "SELECT * FROM `tb_user` WHERE user_id =".$calibra;
		$tb_user_result = mysqli_query($conn, $tb_user_sql);
		$tb_user_arr=mysqli_fetch_assoc($tb_user_result);
		$cal_people = $tb_user_arr['user_name'];
		$tb_user_sql = "SELECT * FROM `tb_user` WHERE user_id =".$checkp;
		$tb_user_result = mysqli_query($conn, $tb_user_sql);
		$tb_user_arr=mysqli_fetch_assoc($tb_user_result);
		$check_people = $tb_user_arr['user_name'];
	}
	$pdf = new PDF_Chinese();
    $pdf->AddGBFont('simhei', '黑体');
    $pdf->AddPage();


    //自动换行
					switch($flag)
					{
					case 1:
    	$pdf->SetFont('simhei', '', 10);
	//$pdf->Cell(180,8,iconv("utf-8","gbk",'制表日期:'.$time),0,0,'R');
	$pdf->Cell(190,8,iconv("utf-8","gbk",'山西中节能潞安电力节能服务有限公司'),0,0,'R');
    	$pdf->Ln();//换行
    	$pdf->SetFont('simhei', '', 20);
				QRcode::png($codeContents,$pngPath);
				$pdf->Image($pngPath,160,235,0,0);
	$pdf->Cell(190,12,iconv("utf-8","gbk",$tb_account_arr['equipment_name'].'校验报告'),1,0,'C');
    	$pdf->Ln();//换行

    	$pdf->SetFont('simhei', '', 12);
	$pdf->Cell(60,10,iconv("utf-8","gbk",'皮带秤型号'),1,0,'C');
	$pdf->Cell(35,10,iconv("utf-8","gbk",$FeedReport_arr['report_TextColumn1']),1,0,'C');
	$pdf->Cell(60,10,iconv("utf-8","gbk",'流量范围'),1,0,'C');
	$pdf->Cell(35,10,iconv("utf-8","gbk",$FeedReport_arr['report_TextColumn2']),1,0,'C');
    	$pdf->Ln();//换行
	$pdf->Cell(60,10,iconv("utf-8","gbk",'称重传感器灵敏度P03.03'),1,0,'C');
	$pdf->Cell(35,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn1'].' mV/V'),1,0,'C');
	$pdf->Cell(60,10,iconv("utf-8","gbk",'基本皮重P04.05'),1,0,'C');
	$pdf->Cell(35,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn2'].' Kg/m'),1,0,'C');
    	$pdf->Ln();//换行
	$pdf->Cell(60,10,iconv("utf-8","gbk",'有效称量长度P03.05'),1,0,'C');
	$pdf->Cell(35,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn3'].' m'),1,0,'C');
	$pdf->Cell(60,10,iconv("utf-8","gbk",'调零皮重P04.04'),1,0,'C');
	$pdf->Cell(35,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn4'].' Kg/m'),1,0,'C');
    	$pdf->Ln();//换行
	$pdf->Cell(60,10,iconv("utf-8","gbk",'标定砝码重量P03.08'),1,0,'C');
	$pdf->Cell(35,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn5'].' Kg'),1,0,'C');
	$pdf->Cell(60,10,iconv("utf-8","gbk",'总皮重P04.04'),1,0,'C');
	$pdf->Cell(35,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn6'].' Kg/m'),1,0,'C');
    	$pdf->Ln();//换行
	$pdf->Cell(60,9,iconv("utf-8","gbk",'零点校验'),1,0,'C');
	$pdf->Cell(35,9,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn7'].'%'),1,0,'C');
	$pdf->Cell(95,9,iconv("utf-8","gbk",''),1,0,'C');
    	$pdf->Ln();//换行
	$pdf->Cell(60,10,iconv("utf-8","gbk",'标定所需的皮带整圈数P03.01'),1,0,'C');
	$pdf->Cell(35,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn8']),1,0,'C');
	$pdf->Cell(60,10,iconv("utf-8","gbk",'校验后基本皮重P04.05'),1,0,'C');
	$pdf->Cell(35,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn9'].' Kg/m'),1,0,'C');
    	$pdf->Ln();//换行
	$pdf->Cell(60,10,iconv("utf-8","gbk",'皮带转一周的时间P03.02'),1,0,'C');
	$pdf->Cell(35,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn10'].' S'),1,0,'C');
	$pdf->Cell(60,10,iconv("utf-8","gbk",'校验后调零皮重P04.05'),1,0,'C');
	$pdf->Cell(35,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn11'].' Kg/m'),1,0,'C');
    	$pdf->Ln();//换行
	$pdf->Cell(60,10,iconv("utf-8","gbk",'运行一周累计测速脉冲数P04.06'),1,0,'C');
	$pdf->Cell(35,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn12'].' I/B'),1,0,'C');
	$pdf->Cell(60,10,iconv("utf-8","gbk",'校验后总皮重P04.05'),1,0,'C');
	$pdf->Cell(35,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn13'].' Kg/m'),1,0,'C');
    	$pdf->Ln();//换行
	$pdf->Cell(60,10,iconv("utf-8","gbk",'原量程校正系数P04.02'),1,0,'C');
	$pdf->Cell(35,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn14']),1,0,'C');
	$pdf->Cell(60,10,iconv("utf-8","gbk",'量程校正系数P04.02'),1,0,'C');
	$pdf->Cell(35,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn15']),1,0,'C');
    	$pdf->Ln();//换行
	$pdf->Cell(190,9,iconv("utf-8","gbk",'走码校验'),1,0,'L');
    	$pdf->Ln();//换行
	$pdf->Cell(38,9,iconv("utf-8","gbk",'给定t/h'),1,0,'C');
	$pdf->Cell(38,9,iconv("utf-8","gbk",'反馈t/h'),1,0,'C');
	$pdf->Cell(38,9,iconv("utf-8","gbk",'转速m/s'),1,0,'C');
	$pdf->Cell(38,9,iconv("utf-8","gbk",'频率HZ'),1,0,'C');
	$pdf->Cell(38,9,iconv("utf-8","gbk",'备注'),1,0,'C');
    	$pdf->Ln();//换行
	$pdf->Cell(38,9,iconv("utf-8","gbk",'0'),1,0,'C');
	$pdf->Cell(38,9,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn16']),1,0,'C');
	$pdf->Cell(38,9,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn17']),1,0,'C');
	$pdf->Cell(38,9,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn18']),1,0,'C');
	$pdf->Cell(38,9,iconv("utf-8","gbk",$FeedReport_arr['report_TextColumn3']),1,0,'C');
    	$pdf->Ln();//换行
	$pdf->Cell(38,9,iconv("utf-8","gbk",'5'),1,0,'C');
	$pdf->Cell(38,9,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn19']),1,0,'C');
	$pdf->Cell(38,9,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn20']),1,0,'C');
	$pdf->Cell(38,9,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn21']),1,0,'C');
	$pdf->Cell(38,9,iconv("utf-8","gbk",$FeedReport_arr['report_TextColumn4']),1,0,'C');
    	$pdf->Ln();//换行
	$pdf->Cell(38,9,iconv("utf-8","gbk",'10'),1,0,'C');
	$pdf->Cell(38,9,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn22']),1,0,'C');
	$pdf->Cell(38,9,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn23']),1,0,'C');
	$pdf->Cell(38,9,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn24']),1,0,'C');
	$pdf->Cell(38,9,iconv("utf-8","gbk",$FeedReport_arr['report_TextColumn5']),1,0,'C');
    	$pdf->Ln();//换行
	$pdf->Cell(38,9,iconv("utf-8","gbk",'15'),1,0,'C');
	$pdf->Cell(38,9,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn25']),1,0,'C');
	$pdf->Cell(38,9,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn26']),1,0,'C');
	$pdf->Cell(38,9,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn27']),1,0,'C');
	$pdf->Cell(38,9,iconv("utf-8","gbk",$FeedReport_arr['report_TextColumn6']),1,0,'C');
    	$pdf->Ln();//换行
	$pdf->Cell(38,9,iconv("utf-8","gbk",'20'),1,0,'C');
	$pdf->Cell(38,9,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn28']),1,0,'C');
	$pdf->Cell(38,9,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn29']),1,0,'C');
	$pdf->Cell(38,9,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn30']),1,0,'C');
	$pdf->Cell(38,9,iconv("utf-8","gbk",$FeedReport_arr['report_TextColumn7']),1,0,'C');
    	$pdf->Ln();//换行
	$pdf->Cell(38,9,iconv("utf-8","gbk",'25'),1,0,'C');
	$pdf->Cell(38,9,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn31']),1,0,'C');
	$pdf->Cell(38,9,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn32']),1,0,'C');
	$pdf->Cell(38,9,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn33']),1,0,'C');
	$pdf->Cell(38,9,iconv("utf-8","gbk",$FeedReport_arr['report_TextColumn8']),1,0,'C');
    	$pdf->Ln();//换行
	$pdf->Cell(38,9,iconv("utf-8","gbk",'20'),1,0,'C');
	$pdf->Cell(38,9,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn34']),1,0,'C');
	$pdf->Cell(38,9,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn35']),1,0,'C');
	$pdf->Cell(38,9,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn36']),1,0,'C');
	$pdf->Cell(38,9,iconv("utf-8","gbk",$FeedReport_arr['report_TextColumn9']),1,0,'C');
    	$pdf->Ln();//换行
	$pdf->Cell(38,9,iconv("utf-8","gbk",'15'),1,0,'C');
	$pdf->Cell(38,9,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn37']),1,0,'C');
	$pdf->Cell(38,9,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn38']),1,0,'C');
	$pdf->Cell(38,9,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn39']),1,0,'C');
	$pdf->Cell(38,9,iconv("utf-8","gbk",$FeedReport_arr['report_TextColumn10']),1,0,'C');
    	$pdf->Ln();//换行
	$pdf->Cell(38,9,iconv("utf-8","gbk",'10'),1,0,'C');
	$pdf->Cell(38,9,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn40']),1,0,'C');
	$pdf->Cell(38,9,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn41']),1,0,'C');
	$pdf->Cell(38,9,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn42']),1,0,'C');
	$pdf->Cell(38,9,iconv("utf-8","gbk",$FeedReport_arr['report_TextColumn11']),1,0,'C');
    	$pdf->Ln();//换行
	$pdf->Cell(38,9,iconv("utf-8","gbk",'5'),1,0,'C');
	$pdf->Cell(38,9,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn43']),1,0,'C');
	$pdf->Cell(38,9,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn44']),1,0,'C');
	$pdf->Cell(38,9,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn45']),1,0,'C');
	$pdf->Cell(38,9,iconv("utf-8","gbk",$FeedReport_arr['report_TextColumn12']),1,0,'C');
    	$pdf->Ln();//换行
	$pdf->Cell(38,9,iconv("utf-8","gbk",'0'),1,0,'C');
	$pdf->Cell(38,9,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn46']),1,0,'C');
	$pdf->Cell(38,9,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn47']),1,0,'C');
	$pdf->Cell(38,9,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn48']),1,0,'C');
	$pdf->Cell(38,9,iconv("utf-8","gbk",$FeedReport_arr['report_TextColumn13']),1,0,'C');
    	$pdf->Ln();//换行
	$pdf->Cell(190,30,iconv("utf-8","gbk",'校验结果'),1,0,'L');
    	$pdf->Ln();//换行
	$pdf->Cell(190,10,iconv("utf-8","gbk",'校验人：'.$cal_people.'                     记录人：'.$check_people.'                    审核人：                    
		校验日期：'.$FeedReport_arr['report_date']),1,0,'L');
	break;
case 2:
	$biaozhun = $FeedReport_arr['report_NumberColumn48'];
					$tb_biaozhun_sql = "SELECT * FROM tb_goods WHERE goods_id =".$biaozhun;
					$tb_biaozhun_result = mysqli_query($conn, $tb_biaozhun_sql);
					$tb_biaozhun_arr=mysqli_fetch_assoc($tb_biaozhun_result);
    	$pdf->SetFont('simhei', '', 20);
				QRcode::png($codeContents,$pngPath);
				$pdf->Image($pngPath,160,230,0,0);
	$pdf->Cell(190,10,iconv("utf-8","gbk",'压力控制器检定记录'),0,0,'C');
    	$pdf->SetFont('simhei', '', 12);
	//$pdf->Cell(190,10,iconv("utf-8","gbk",'校验人                     记录人                    审核人                    
	//	校验日期	'),0,0,'L');
    	$pdf->Ln();//换行
	$pdf->Cell(35,7,iconv("utf-8","gbk",'检定类型'),1,0,'C');
	$pdf->Cell(60,7,iconv("utf-8","gbk",$FeedReport_arr['report_TextColumn4']),1,0,'C');
	$pdf->Cell(35,7,iconv("utf-8","gbk",'被检计量器具类别'),1,0,'C');
	$pdf->Cell(60,7,iconv("utf-8","gbk",$FeedReport_arr['report_TextColumn5']),1,0,'C');
    	$pdf->Ln();//换行
	$pdf->Cell(35,7,iconv("utf-8","gbk",'测点名称'),1,0,'C');
	$pdf->Cell(60,7,iconv("utf-8","gbk",$tb_account_arr['equipment_name']),1,0,'C');
	$pdf->Cell(35,7,iconv("utf-8","gbk",'安装位置'),1,0,'C');
	$pdf->Cell(60,7,iconv("utf-8","gbk",$tb_account_arr['equipment_position']),1,0,'C');
    	$pdf->Ln();//换行
	$pdf->Cell(35,7,iconv("utf-8","gbk",'规格型号'),1,0,'C');
	$pdf->Cell(60,7,iconv("utf-8","gbk",$tb_good_arr['goods_modle']),1,0,'C');
	$pdf->Cell(35,7,iconv("utf-8","gbk",'准确度等级'),1,0,'C');
	$pdf->Cell(60,7,iconv("utf-8","gbk",'1.0'),1,0,'C');
    	$pdf->Ln();//换行
	$pdf->Cell(35,7,iconv("utf-8","gbk",'测量范围'),1,0,'C');
	$pdf->Cell(60,7,iconv("utf-8","gbk",$tb_good_arr['goods_main_parameters']),1,0,'C');
	$pdf->Cell(35,7,iconv("utf-8","gbk",'控压范围'),1,0,'C');
	$pdf->Cell(60,7,iconv("utf-8","gbk",''),1,0,'C');
    	$pdf->Ln();//换行
	$pdf->Cell(35,7,iconv("utf-8","gbk",'出厂编号'),1,0,'C');
	$pdf->Cell(60,7,iconv("utf-8","gbk",$tb_account_arr['equipment_remarks']),1,0,'C');
	$pdf->Cell(35,7,iconv("utf-8","gbk",'制造厂'),1,0,'C');
	$pdf->Cell(60,7,iconv("utf-8","gbk",$tb_good_arr['goods_manufacturers']),1,0,'C');
    	$pdf->Ln();//换行
	$pdf->Cell(35,7,iconv("utf-8","gbk",'开关方向'),1,0,'C');
	if($FeedReport_arr['report_NumberColumn28']){
	$pdf->Cell(60,7,iconv("utf-8","gbk",'下（'.$FeedReport_arr['report_NumberColumn1'].$FeedReport_arr['report_TextColumn1'].'）'),1,0,'C');
	}else{
	$pdf->Cell(60,7,iconv("utf-8","gbk",'上（'.$FeedReport_arr['report_NumberColumn1'].$FeedReport_arr['report_TextColumn1'].'）'),1,0,'C');
	}
	//$pdf->Cell(60,7,iconv("utf-8","gbk",$FeedReport_arr['report_TextColumn2'].'（'.$FeedReport_arr['report_NumberColumn1'].$FeedReport_arr['report_TextColumn1'].'）'),1,0,'C');
	$pdf->Cell(35,7,iconv("utf-8","gbk",'外观检查'),1,0,'C');
	$pdf->Cell(60,7,iconv("utf-8","gbk",$FeedReport_arr['report_TextColumn3']),1,0,'C');
    	$pdf->Ln();//换行
	$pdf->Cell(35,7,iconv("utf-8","gbk",'标准器名称'),1,0,'C');
	//$pdf->Cell(60,7,iconv("utf-8","gbk",'智能数字压力校验仪'),1,0,'C');
	$pdf->Cell(60,7,iconv("utf-8","gbk",$tb_biaozhun_arr['goods_name']),1,0,'C');
	$pdf->Cell(35,7,iconv("utf-8","gbk",'标准器型号'),1,0,'C');
	//$pdf->Cell(60,7,iconv("utf-8","gbk",'ConsT 273'),1,0,'C');
	$pdf->Cell(60,7,iconv("utf-8","gbk",$tb_biaozhun_arr['goods_modle']),1,0,'C');
    	$pdf->Ln();//换行
	$pdf->Cell(35,7,iconv("utf-8","gbk",'标准器测量范围'),1,0,'C');
	//$pdf->Cell(60,7,iconv("utf-8","gbk",'-100-600KPa'),1,0,'C');
	$pdf->Cell(60,7,iconv("utf-8","gbk",$tb_biaozhun_arr['goods_main_parameters']),1,0,'C');
	$pdf->Cell(35,7,iconv("utf-8","gbk",'准确度等级'),1,0,'C');
	$pdf->Cell(60,7,iconv("utf-8","gbk",'0.05'),1,0,'C');
    	$pdf->Ln();//换行
	$pdf->Cell(35,7,iconv("utf-8","gbk",'标准器出厂编号'),1,0,'C');
	//$pdf->Cell(60,7,iconv("utf-8","gbk",'27317320010'),1,0,'C');
	$pdf->Cell(60,7,iconv("utf-8","gbk",$tb_biaozhun_arr['goods_SN']),1,0,'C');
	$pdf->Cell(35,7,iconv("utf-8","gbk",'最小分度值'),1,0,'C');
	$pdf->Cell(60,7,iconv("utf-8","gbk",'0.01KPa'),1,0,'C');
    	$pdf->Ln();//换行
	$pdf->Cell(35,7,iconv("utf-8","gbk",'检定证书编号'),1,0,'C');
	$pdf->Cell(60,7,iconv("utf-8","gbk",),1,0,'C');
	$pdf->Cell(35,7,iconv("utf-8","gbk",'证书有效期'),1,0,'C');
	$pdf->Cell(60,7,iconv("utf-8","gbk",),1,0,'C');
    	$pdf->Ln();//换行
	$pdf->Cell(35,7,iconv("utf-8","gbk",'检定单位'),1,0,'C');
	$pdf->Cell(60,7,iconv("utf-8","gbk",),1,0,'C');
	$pdf->Cell(35,7,iconv("utf-8","gbk",'检定依据'),1,0,'C');
	$pdf->Cell(60,7,iconv("utf-8","gbk",),1,0,'C');
    	$pdf->Ln();//换行
	$pdf->Cell(35,7,iconv("utf-8","gbk",'检定环境'),1,0,'C');
	$pdf->Cell(60,7,iconv("utf-8","gbk","温度：".$FeedReport_arr['report_NumberColumn25']."℃相对湿度：".$FeedReport_arr['report_NumberColumn26']."%RH"),1,0,'C');
	$pdf->Cell(35,7,iconv("utf-8","gbk",'检定介质'),1,0,'C');
	$pdf->Cell(60,7,iconv("utf-8","gbk",'空气'),1,0,'C');
    	$pdf->Ln();//换行
	$pdf->Cell(190,7,iconv("utf-8","gbk",'示 值 检 定'),1,0,'C');
    	$pdf->Ln();//换行
	$pdf->Cell(20,7,iconv("utf-8","gbk",'设定点Ⅰ'),1,0,'C');
	$pdf->Cell(40,7,iconv("utf-8","gbk",'调校前记录'),1,0,'C');
	$pdf->Cell(40,7,iconv("utf-8","gbk",'检修后记录'),1,0,'C');
	$pdf->Cell(30,7,iconv("utf-8","gbk",'设定点误差'),1,0,'C');
	$pdf->Cell(40,7,iconv("utf-8","gbk",'重复性误差'),1,0,'C');
	$pdf->Cell(20,7,iconv("utf-8","gbk",'切换差'),1,0,'C');
    	$pdf->Ln();//换行
	$pdf->Cell(20,21,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn1'].$FeedReport_arr['report_TextColumn1']),1,0,'C');
	$pdf->Cell(20,7,iconv("utf-8","gbk",'上1: '.$FeedReport_arr['report_NumberColumn2']),1,0,'L');
	$pdf->Cell(20,7,iconv("utf-8","gbk",'下1: '.$FeedReport_arr['report_NumberColumn6']),1,0,'L');
	$pdf->Cell(20,7,iconv("utf-8","gbk",'上1: '.$FeedReport_arr['report_NumberColumn10']),1,0,'L');
	$pdf->Cell(20,7,iconv("utf-8","gbk",'下1: '.$FeedReport_arr['report_NumberColumn14']),1,0,'L');
	$pdf->Cell(30,21,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn18']),1,0,'C');//设定点误差
	$pdf->Cell(20,21,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn19']),1,0,'C');//重复性误差1
	$pdf->Cell(20,21,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn20']),1,0,'C');//重复性误差2
	$pdf->Cell(20,21,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn21']),1,0,'C');//切换差
    	$pdf->Ln(7);//换行
	$pdf->Cell(20);
	$pdf->Cell(20,7,iconv("utf-8","gbk",'上2: '.$FeedReport_arr['report_NumberColumn3']),1,0,'L');
	$pdf->Cell(20,7,iconv("utf-8","gbk",'下2: '.$FeedReport_arr['report_NumberColumn7']),1,0,'L');
	$pdf->Cell(20,7,iconv("utf-8","gbk",'上2: '.$FeedReport_arr['report_NumberColumn11']),1,0,'L');
	$pdf->Cell(20,7,iconv("utf-8","gbk",'下2: '.$FeedReport_arr['report_NumberColumn15']),1,0,'L');
	$pdf->Cell(30);
	$pdf->Cell(20);
	$pdf->Cell(20);
	$pdf->Cell(20);
    	$pdf->Ln(7);//换行
	$pdf->Cell(20);
	$pdf->Cell(20,7,iconv("utf-8","gbk",'上3: '.$FeedReport_arr['report_NumberColumn4']),1,0,'L');
	$pdf->Cell(20,7,iconv("utf-8","gbk",'下3: '.$FeedReport_arr['report_NumberColumn8']),1,0,'L');
	$pdf->Cell(20,7,iconv("utf-8","gbk",'上3: '.$FeedReport_arr['report_NumberColumn12']),1,0,'L');
	$pdf->Cell(20,7,iconv("utf-8","gbk",'下3: '.$FeedReport_arr['report_NumberColumn16']),1,0,'L');
	$pdf->Cell(30);
	$pdf->Cell(20);
	$pdf->Cell(20);
	$pdf->Cell(20);
    	$pdf->Ln(7);//换行
	//$pdf->Cell(20);
	$pdf->Cell(20,7,iconv("utf-8","gbk",'平均值'),1,0,'C');
	$pdf->Cell(20,7,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn5']),1,0,'C');
	$pdf->Cell(20,7,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn9']),1,0,'C');
	$pdf->Cell(20,7,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn13']),1,0,'C');
	$pdf->Cell(20,7,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn17']),1,0,'C');
	$pdf->Cell(30,7,iconv("utf-8","gbk",'平均值-设定值'),1,0,'C');
	$pdf->Cell(20,7,iconv("utf-8","gbk",'上大-上小'),1,0,'C');
	$pdf->Cell(20,7,iconv("utf-8","gbk",'下大-下小'),1,0,'C');
	$pdf->Cell(20,7,iconv("utf-8","gbk",'上平-下平'),1,0,'C');
    	$pdf->Ln();//换行
	$pdf->Cell(20,7,iconv("utf-8","gbk",'设定点Ⅱ'),1,0,'C');
	$pdf->Cell(40,7,iconv("utf-8","gbk",'调校前记录'),1,0,'C');
	$pdf->Cell(40,7,iconv("utf-8","gbk",'检修后记录'),1,0,'C');
	$pdf->Cell(30,7,iconv("utf-8","gbk",'设定点误差'),1,0,'C');
	$pdf->Cell(40,7,iconv("utf-8","gbk",'重复性误差'),1,0,'C');
	$pdf->Cell(20,7,iconv("utf-8","gbk",'切换差'),1,0,'C');
    	$pdf->Ln();//换行
	$pdf->Cell(20,28,iconv("utf-8","gbk",''),1,0,'C');
	$pdf->Cell(20,7,iconv("utf-8","gbk",'上1:'),1,0,'L');
	$pdf->Cell(20,7,iconv("utf-8","gbk",'下1:'),1,0,'L');
	$pdf->Cell(20,7,iconv("utf-8","gbk",'上1:'),1,0,'L');
	$pdf->Cell(20,7,iconv("utf-8","gbk",'下1:'),1,0,'L');
	$pdf->Cell(30,21,iconv("utf-8","gbk",''),1,0,'C');
	$pdf->Cell(20,21,iconv("utf-8","gbk",''),1,0,'C');
	$pdf->Cell(20,21,iconv("utf-8","gbk",''),1,0,'C');
	$pdf->Cell(20,21,iconv("utf-8","gbk",''),1,0,'C');
    	$pdf->Ln(7);//换行
	$pdf->Cell(20);
	$pdf->Cell(20,7,iconv("utf-8","gbk",'上2:'),1,0,'L');
	$pdf->Cell(20,7,iconv("utf-8","gbk",'下2:'),1,0,'L');
	$pdf->Cell(20,7,iconv("utf-8","gbk",'上2:'),1,0,'L');
	$pdf->Cell(20,7,iconv("utf-8","gbk",'下2:'),1,0,'L');
	$pdf->Cell(30);
	$pdf->Cell(20);
	$pdf->Cell(20);
	$pdf->Cell(20);
    	$pdf->Ln(7);//换行
	$pdf->Cell(20);
	$pdf->Cell(20,7,iconv("utf-8","gbk",'上3:'),1,0,'L');
	$pdf->Cell(20,7,iconv("utf-8","gbk",'下3:'),1,0,'L');
	$pdf->Cell(20,7,iconv("utf-8","gbk",'上3:'),1,0,'L');
	$pdf->Cell(20,7,iconv("utf-8","gbk",'下3:'),1,0,'L');
	$pdf->Cell(30);
	$pdf->Cell(20);
	$pdf->Cell(20);
	$pdf->Cell(20);
    	$pdf->Ln(7);//换行
	$pdf->Cell(20);
	$pdf->Cell(20,7,iconv("utf-8","gbk",'上平'),1,0,'C');
	$pdf->Cell(20,7,iconv("utf-8","gbk",'下平'),1,0,'C');
	$pdf->Cell(20,7,iconv("utf-8","gbk",'上平'),1,0,'C');
	$pdf->Cell(20,7,iconv("utf-8","gbk",'下平'),1,0,'C');
	$pdf->Cell(30,7,iconv("utf-8","gbk",''),1,0,'C');
	$pdf->Cell(20,7,iconv("utf-8","gbk",''),1,0,'C');
	$pdf->Cell(20,7,iconv("utf-8","gbk",''),1,0,'C');
	$pdf->Cell(20,7,iconv("utf-8","gbk",''),1,0,'C');
    	$pdf->Ln();//换行
	$pdf->Cell(190,7,iconv("utf-8","gbk",'检 定 结 果'),1,0,'C');
    	$pdf->Ln();//换行
	$pdf->Cell(50,7,iconv("utf-8","gbk",'检定项目'),1,0,'C');
	$pdf->Cell(25,7,iconv("utf-8","gbk",'允许值'),1,0,'C');
	$pdf->Cell(20,7,iconv("utf-8","gbk",'实际值'),1,0,'C');
	$pdf->Cell(50,7,iconv("utf-8","gbk",'检定项目'),1,0,'C');
	$pdf->Cell(25,7,iconv("utf-8","gbk",'允许值'),1,0,'C');
	$pdf->Cell(20,7,iconv("utf-8","gbk",'实际值'),1,0,'C');
    	$pdf->Ln();//换行
	$pdf->Cell(50,7,iconv("utf-8","gbk",'设定点误差Ⅰ'.$FeedReport_arr['report_TextColumn1']),1,0,'C');
	$pdf->Cell(25,7,iconv("utf-8","gbk","±".$FeedReport_arr['report_NumberColumn27']),1,0,'C');
	$pdf->Cell(20,7,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn18']),1,0,'C');
	$pdf->Cell(50,7,iconv("utf-8","gbk",'设定点误差Ⅱ'),1,0,'C');
	$pdf->Cell(25,7,iconv("utf-8","gbk",''),1,0,'C');
	$pdf->Cell(20,7,iconv("utf-8","gbk",''),1,0,'C');
    	$pdf->Ln();//换行
	$pdf->Cell(50,7,iconv("utf-8","gbk",'重复性误差Ⅰ'.$FeedReport_arr['report_TextColumn1']),1,0,'C');
	$pdf->Cell(25,7,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn27']),1,0,'C');
	$pdf->Cell(20,7,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn19']),1,0,'C');
	$pdf->Cell(50,7,iconv("utf-8","gbk",'重复性误差Ⅱ'),1,0,'C');
	$pdf->Cell(25,7,iconv("utf-8","gbk",''),1,0,'C');
	$pdf->Cell(20,7,iconv("utf-8","gbk",''),1,0,'C');
    	$pdf->Ln();//换行
	$pdf->Cell(50,7,iconv("utf-8","gbk",'切换差Ⅰ'.$FeedReport_arr['report_TextColumn1']),1,0,'C');
	$pdf->Cell(25,7,iconv("utf-8","gbk",'≤量程的10%'),1,0,'C');
	$pdf->Cell(20,7,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn21']),1,0,'C');
	$pdf->Cell(50,7,iconv("utf-8","gbk",'切换差Ⅱ'),1,0,'C');
	$pdf->Cell(25,7,iconv("utf-8","gbk",'≤量程的10%'),1,0,'C');
	$pdf->Cell(20,7,iconv("utf-8","gbk",''),1,0,'C');
    	$pdf->Ln();//换行
	$pdf->Cell(50,7,iconv("utf-8","gbk",'绝缘电阻Ⅰ'),1,0,'C');
	$pdf->Cell(25,7,iconv("utf-8","gbk",'≥20MΩ'),1,0,'C');
	$pdf->Cell(20,7,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn22']),1,0,'C');
	$pdf->Cell(50,7,iconv("utf-8","gbk",'绝缘电阻Ⅱ'),1,0,'C');
	$pdf->Cell(25,7,iconv("utf-8","gbk",''),1,0,'C');
	$pdf->Cell(20,7,iconv("utf-8","gbk",''),1,0,'C');
    	$pdf->Ln();//换行
	$pdf->Cell(50,7,iconv("utf-8","gbk",'接点电阻Ⅰ'),1,0,'C');
	$pdf->Cell(25,7,iconv("utf-8","gbk",'≤0.1Ω'),1,0,'C');
	$pdf->Cell(20,7,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn23']),1,0,'C');
	$pdf->Cell(50,7,iconv("utf-8","gbk",'接点电阻Ⅱ'),1,0,'C');
	$pdf->Cell(25,7,iconv("utf-8","gbk",''),1,0,'C');
	$pdf->Cell(20,7,iconv("utf-8","gbk",''),1,0,'C');
    	$pdf->Ln();//换行
    	$pdf->MultiCell(190,16,iconv("utf-8","gbk",'调校记录：'.$FeedReport_arr['report_TextColumn6'].'结论：准予该压力控制器B级使用'),1,'L',0);
	$pdf->Cell(190,8,iconv("utf-8","gbk",'主管：                     核验：'.$check_people.'                    校验员：'.$cal_people.'                    
		校验日期：'.$FeedReport_arr['report_date'].'	'),0,0,'L');
	break;
					case 3:
    	$pdf->SetFont('simhei', '', 10);
	//$pdf->Cell(180,8,iconv("utf-8","gbk",'制表日期:'.$time),0,0,'R');
	$pdf->Cell(190,8,iconv("utf-8","gbk",'山西中节能潞安电力节能服务有限公司'),0,0,'R');
    	$pdf->Ln();//换行
    	$pdf->SetFont('simhei', '', 20);
				QRcode::png($codeContents,$pngPath);
				$pdf->Image($pngPath,160,209,0,0);
	$pdf->Cell(190,12,iconv("utf-8","gbk",$tb_account_arr['equipment_name'].'检查记录'),1,0,'C');
    	$pdf->Ln();//换行

    	$pdf->SetFont('simhei', '', 10);
	$pdf->Cell(190,10,iconv("utf-8","gbk",'检查前参数'),1,0,'L');
    	$pdf->Ln();//换行
	$pdf->Cell(10,10,iconv("utf-8","gbk",'粉尘'),1,0,'C');
	$pdf->Cell(18,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn1']."mg/m3"),1,0,'C');
	$pdf->Cell(10,10,iconv("utf-8","gbk",'湿度'),1,0,'C');
	$pdf->Cell(10,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn2']."%"),1,0,'C');
	$pdf->Cell(10,10,iconv("utf-8","gbk",'电流'),1,0,'C');
	$pdf->Cell(15,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn3']."mA"),1,0,'C');
	$pdf->Cell(20,10,iconv("utf-8","gbk",'旁路流量'),1,0,'C');
	$pdf->Cell(17,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn4']."SLPM"),1,0,'C');
	$pdf->Cell(20,10,iconv("utf-8","gbk",'样气流量'),1,0,'C');
	$pdf->Cell(17,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn5']."SLPM"),1,0,'C');
	$pdf->Cell(25,10,iconv("utf-8","gbk",'稀释气流量'),1,0,'C');
	$pdf->Cell(18,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn6']."SLPM"),1,0,'C');
    	$pdf->Ln();//换行
	$pdf->Cell(190,10,iconv("utf-8","gbk",'检查后参数'),1,0,'L');
    	$pdf->Ln();//换行
	$pdf->Cell(10,10,iconv("utf-8","gbk",'粉尘'),1,0,'C');
	$pdf->Cell(18,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn37']."mg/m3"),1,0,'C');
	$pdf->Cell(10,10,iconv("utf-8","gbk",'湿度'),1,0,'C');
	$pdf->Cell(10,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn38']."%"),1,0,'C');
	$pdf->Cell(10,10,iconv("utf-8","gbk",'电流'),1,0,'C');
	$pdf->Cell(15,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn39']."mA"),1,0,'C');
	$pdf->Cell(20,10,iconv("utf-8","gbk",'旁路流量'),1,0,'C');
	$pdf->Cell(17,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn40']."SLPM"),1,0,'C');
	$pdf->Cell(20,10,iconv("utf-8","gbk",'样气流量'),1,0,'C');
	$pdf->Cell(17,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn47']."SLPM"),1,0,'C');
	$pdf->Cell(25,10,iconv("utf-8","gbk",'稀释气流量'),1,0,'C');
	$pdf->Cell(18,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn48']."SLPM"),1,0,'C');
    	$pdf->Ln();//换行
	$pdf->Cell(190,10,iconv("utf-8","gbk",'设备概况'),1,0,'L');
    	$pdf->Ln();//换行
	$pdf->Cell(20,10,iconv("utf-8","gbk",'气源情况'),1,0,'C');
	$pdf->Cell(20,10,iconv("utf-8","gbk",$FeedReport_arr['report_TextColumn1']),1,0,'C');
	$pdf->Cell(30,10,iconv("utf-8","gbk",'取样管积水情况'),1,0,'C');
	$pdf->Cell(20,10,iconv("utf-8","gbk",$FeedReport_arr['report_TextColumn2']),1,0,'C');
	$pdf->Cell(25,10,iconv("utf-8","gbk",'系统报警'),1,0,'C');
	$pdf->Cell(75,10,iconv("utf-8","gbk",$FeedReport_arr['report_TextColumn3']),1,0,'C');
    	$pdf->Ln();//换行
	$pdf->Cell(20,10,iconv("utf-8","gbk",'零气压力'),1,0,'C');
	$pdf->Cell(20,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn7']."psi"),1,0,'C');
	$pdf->Cell(30,10,iconv("utf-8","gbk",'CDA压力'),1,0,'C');
	$pdf->Cell(20,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn8']."psi"),1,0,'C');
	$pdf->Cell(25,10,iconv("utf-8","gbk",'稀释气压力'),1,0,'C');
	$pdf->Cell(25,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn9']."MPa"),1,0,'C');
	$pdf->Cell(25,10,iconv("utf-8","gbk",'储气罐压力'),1,0,'C');
	$pdf->Cell(25,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn10']."MPa"),1,0,'C');
    	$pdf->Ln();//换行
	if($tb_account_arr['account_id'] == 2794){
	$pdf->Cell(20,10,iconv("utf-8","gbk",'反吹功能'),1,0,'C');
	$pdf->Cell(20,10,iconv("utf-8","gbk","打开"),1,0,'C');
	$pdf->Cell(30,10,iconv("utf-8","gbk",'09:00'),1,0,'C');
	$pdf->Cell(20,10,iconv("utf-8","gbk",'4小时'),1,0,'C');
	$pdf->Cell(25,10,iconv("utf-8","gbk",'系统自检功能'),1,0,'C');
	$pdf->Cell(25,10,iconv("utf-8","gbk","关闭"),1,0,'C');
	$pdf->Cell(25,10,iconv("utf-8","gbk",'---'),1,0,'C');
	$pdf->Cell(25,10,iconv("utf-8","gbk",'---'),1,0,'C');
	}
	if($tb_account_arr['account_id'] == 2854){
	$pdf->Cell(20,10,iconv("utf-8","gbk",'反吹功能'),1,0,'C');
	$pdf->Cell(20,10,iconv("utf-8","gbk","打开"),1,0,'C');
	$pdf->Cell(30,10,iconv("utf-8","gbk",'09:30'),1,0,'C');
	$pdf->Cell(20,10,iconv("utf-8","gbk",'4小时'),1,0,'C');
	$pdf->Cell(25,10,iconv("utf-8","gbk",'系统自检功能'),1,0,'C');
	$pdf->Cell(25,10,iconv("utf-8","gbk","关闭"),1,0,'C');
	$pdf->Cell(25,10,iconv("utf-8","gbk",'---'),1,0,'C');
	$pdf->Cell(25,10,iconv("utf-8","gbk",'---'),1,0,'C');
	}
	if($tb_account_arr['account_id'] == 2928){
	$pdf->Cell(20,10,iconv("utf-8","gbk",'反吹功能'),1,0,'C');
	$pdf->Cell(20,10,iconv("utf-8","gbk","打开"),1,0,'C');
	$pdf->Cell(30,10,iconv("utf-8","gbk",'10:00'),1,0,'C');
	$pdf->Cell(20,10,iconv("utf-8","gbk",'4小时'),1,0,'C');
	$pdf->Cell(25,10,iconv("utf-8","gbk",'系统自检功能'),1,0,'C');
	$pdf->Cell(25,10,iconv("utf-8","gbk","关闭"),1,0,'C');
	$pdf->Cell(25,10,iconv("utf-8","gbk",'---'),1,0,'C');
	$pdf->Cell(25,10,iconv("utf-8","gbk",'---'),1,0,'C');
	}
	if($tb_account_arr['account_id'] == 2998){
	$pdf->Cell(20,10,iconv("utf-8","gbk",'反吹功能'),1,0,'C');
	$pdf->Cell(20,10,iconv("utf-8","gbk","打开"),1,0,'C');
	$pdf->Cell(30,10,iconv("utf-8","gbk",'10:30'),1,0,'C');
	$pdf->Cell(20,10,iconv("utf-8","gbk",'4小时'),1,0,'C');
	$pdf->Cell(25,10,iconv("utf-8","gbk",'系统自检功能'),1,0,'C');
	$pdf->Cell(25,10,iconv("utf-8","gbk","关闭"),1,0,'C');
	$pdf->Cell(25,10,iconv("utf-8","gbk",'---'),1,0,'C');
	$pdf->Cell(25,10,iconv("utf-8","gbk",'---'),1,0,'C');
	}
    	$pdf->Ln();//换行
	$pdf->Cell(190,10,iconv("utf-8","gbk",'滤芯检查'),1,0,'L');
    	$pdf->Ln();//换行
	$pdf->Cell(25,10,iconv("utf-8","gbk",'散射表吹扫'),1,0,'C');
	if($FeedReport_arr['report_NumberColumn11'] == 0){
		$pdf->Cell(16,10,iconv("utf-8","gbk","检查正常"),1,0,'C');
	}
	if($FeedReport_arr['report_NumberColumn11'] == 1){
		$pdf->Cell(16,10,iconv("utf-8","gbk","更换滤芯"),1,0,'C');
	}
	$pdf->Cell(21,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn21']."（26周）"),1,0,'C');
	$pdf->Cell(25,10,iconv("utf-8","gbk",'散射表出口'),1,0,'C');
	if($FeedReport_arr['report_NumberColumn12'] == 0){
		$pdf->Cell(16,10,iconv("utf-8","gbk","检查正常"),1,0,'C');
	}
	if($FeedReport_arr['report_NumberColumn12'] == 1){
		$pdf->Cell(16,10,iconv("utf-8","gbk","更换滤芯"),1,0,'C');
	}
	$pdf->Cell(21,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn22']."（26周）"),1,0,'C');
	$pdf->Cell(29,10,iconv("utf-8","gbk",'样气流量计入口'),1,0,'C');
	if($FeedReport_arr['report_NumberColumn13'] == 0){
		$pdf->Cell(16,10,iconv("utf-8","gbk","检查正常"),1,0,'C');
	}
	if($FeedReport_arr['report_NumberColumn13'] == 1){
		$pdf->Cell(16,10,iconv("utf-8","gbk","更换滤芯"),1,0,'C');
	}
	$pdf->Cell(21,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn23']."（26周）"),1,0,'C');
    	$pdf->Ln();//换行
	$pdf->Cell(25,10,iconv("utf-8","gbk",'高效过滤器'),1,0,'C');
	if($FeedReport_arr['report_NumberColumn15'] == 0){
		$pdf->Cell(16,10,iconv("utf-8","gbk","检查正常"),1,0,'C');
	}
	if($FeedReport_arr['report_NumberColumn15'] == 1){
		$pdf->Cell(16,10,iconv("utf-8","gbk","更换滤芯"),1,0,'C');
	}
	$pdf->Cell(21,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn25']."（52周）"),1,0,'C');
	$pdf->Cell(25,10,iconv("utf-8","gbk",'金属过滤器'),1,0,'C');
	if($FeedReport_arr['report_NumberColumn14'] == 0){
		$pdf->Cell(16,10,iconv("utf-8","gbk","---"),1,0,'C');
	}
	if($FeedReport_arr['report_NumberColumn14'] == 1){
		$pdf->Cell(16,10,iconv("utf-8","gbk","更换滤芯"),1,0,'C');
	}
	$pdf->cell(21,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn24']."（52周）"),1,0,'C');
	$pdf->Cell(29,10,iconv("utf-8","gbk",'旁路泵'),1,0,'C');
	if($FeedReport_arr['report_NumberColumn18'] == 0){
		$pdf->Cell(16,10,iconv("utf-8","gbk","---"),1,0,'C');
	}
	if($FeedReport_arr['report_NumberColumn18'] == 1){
		$pdf->Cell(16,10,iconv("utf-8","gbk","更换设备"),1,0,'C');
	}
	$pdf->Cell(21,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn28']."（52周）"),1,0,'C');
    	$pdf->Ln();//换行
	$pdf->Cell(190,10,iconv("utf-8","gbk",'流量计比对/标定'),1,0,'L');
    	$pdf->Ln();//换行
	if($FeedReport_arr['report_NumberColumn16'] == 0){
		$pdf->Cell(20,10,iconv("utf-8","gbk",'---'),1,0,'C');
	}
	if($FeedReport_arr['report_NumberColumn16'] == 1){
		$pdf->Cell(20,10,iconv("utf-8","gbk",'比对/标定正常'),1,0,'C');
	}
	$pdf->Cell(20,10,iconv("utf-8","gbk",'比对前'),1,0,'C');
	$pdf->Cell(25,10,iconv("utf-8","gbk",'旁路流量'),1,0,'C');
	if($FeedReport_arr['report_NumberColumn34'] == 0){
	$pdf->Cell(25,10,iconv("utf-8","gbk","---"),1,0,'C');
	}else{
	$pdf->Cell(25,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn34']."SLPM"),1,0,'C');
	}
	$pdf->Cell(25,10,iconv("utf-8","gbk",'样气流量'),1,0,'C');
	if($FeedReport_arr['report_NumberColumn35'] == 0){
	$pdf->Cell(25,10,iconv("utf-8","gbk","---"),1,0,'C');
	}else{
	$pdf->Cell(25,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn35']."SLPM"),1,0,'C');
	}
	$pdf->Cell(25,10,iconv("utf-8","gbk",'稀释气流量'),1,0,'C');
	if($FeedReport_arr['report_NumberColumn36'] == 0){
	$pdf->Cell(25,10,iconv("utf-8","gbk","---"),1,0,'C');
	}else{
	$pdf->Cell(25,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn36']."SLPM"),1,0,'C');
	}
    	$pdf->Ln();//换行
	$pdf->Cell(20,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn26']."（4周）"),1,0,'C');
	$pdf->Cell(20,10,iconv("utf-8","gbk",'比对后'),1,0,'C');
	$pdf->Cell(25,10,iconv("utf-8","gbk",'旁路流量'),1,0,'C');
	if($FeedReport_arr['report_NumberColumn44'] == 0){
	$pdf->Cell(25,10,iconv("utf-8","gbk","---"),1,0,'C');
	}else{
	$pdf->Cell(25,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn44']."SLPM"),1,0,'C');
	}
	$pdf->Cell(25,10,iconv("utf-8","gbk",'样气流量'),1,0,'C');
	if($FeedReport_arr['report_NumberColumn45'] == 0){
	$pdf->Cell(25,10,iconv("utf-8","gbk","---"),1,0,'C');
	}else{
	$pdf->Cell(25,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn45']."SLPM"),1,0,'C');
	}
	$pdf->Cell(25,10,iconv("utf-8","gbk",'稀释气流量'),1,0,'C');
	if($FeedReport_arr['report_NumberColumn46'] == 0){
	$pdf->Cell(25,10,iconv("utf-8","gbk","---"),1,0,'C');
	}else{
	$pdf->Cell(25,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn46']."SLPM"),1,0,'C');
	}
    	$pdf->Ln();//换行
	$pdf->Cell(190,10,iconv("utf-8","gbk",'设备清理'),1,0,'L');
    	$pdf->Ln();//换行
	$pdf->Cell(24,10,iconv("utf-8","gbk",'喷嘴'),1,0,'C');
	if($FeedReport_arr['report_NumberColumn17'] == 0){
		$pdf->Cell(18,10,iconv("utf-8","gbk",'---'),1,0,'C');
	}
	if($FeedReport_arr['report_NumberColumn17'] == 1){
		$pdf->Cell(18,10,iconv("utf-8","gbk",'已清理'),1,0,'C');
	}
	$pdf->Cell(21,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn27']."（4周）"),1,0,'C');
	$pdf->Cell(24,10,iconv("utf-8","gbk",'稀释模块'),1,0,'C');
	if($FeedReport_arr['report_NumberColumn19'] == 0){
		$pdf->Cell(18,10,iconv("utf-8","gbk",'---'),1,0,'C');
	}
	if($FeedReport_arr['report_NumberColumn19'] == 1){
		$pdf->Cell(18,10,iconv("utf-8","gbk",'已清理'),1,0,'C');
	}
	$pdf->Cell(21,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn29']."（12周）"),1,0,'C');
	$pdf->Cell(25,10,iconv("utf-8","gbk",'散射表'),1,0,'C');
	if($FeedReport_arr['report_NumberColumn33'] == 0){
		$pdf->Cell(18,10,iconv("utf-8","gbk",'---'),1,0,'C');
	}
	if($FeedReport_arr['report_NumberColumn33'] == 1){
		$pdf->Cell(18,10,iconv("utf-8","gbk",'已清理'),1,0,'C');
	}
	$pdf->Cell(21,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn43']."（52周）"),1,0,'C');
    	$pdf->Ln();//换行
	$pdf->Cell(24,10,iconv("utf-8","gbk",'旁路流量计'),1,0,'C');
	if($FeedReport_arr['report_NumberColumn20'] == 0){
		$pdf->Cell(18,10,iconv("utf-8","gbk",'---'),1,0,'C');
	}
	if($FeedReport_arr['report_NumberColumn20'] == 1){
		$pdf->Cell(18,10,iconv("utf-8","gbk",'更换'),1,0,'C');
	}
	$pdf->Cell(21,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn30']."（26周）"),1,0,'C');
	$pdf->Cell(24,10,iconv("utf-8","gbk",'样气流量计'),1,0,'C');
	if($FeedReport_arr['report_NumberColumn31'] == 0){
		$pdf->Cell(18,10,iconv("utf-8","gbk",'---'),1,0,'C');
	}
	if($FeedReport_arr['report_NumberColumn31'] == 1){
		$pdf->Cell(18,10,iconv("utf-8","gbk",'更换'),1,0,'C');
	}
	$pdf->Cell(21,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn41']."（26周）"),1,0,'C');
	$pdf->Cell(25,10,iconv("utf-8","gbk",'稀释气流量计'),1,0,'C');
	if($FeedReport_arr['report_NumberColumn32'] == 0){
		$pdf->Cell(18,10,iconv("utf-8","gbk",'---'),1,0,'C');
	}
	if($FeedReport_arr['report_NumberColumn32'] == 1){
		$pdf->Cell(18,10,iconv("utf-8","gbk",'更换'),1,0,'C');
	}
	$pdf->Cell(21,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn42']."（26周）"),1,0,'C');
    	$pdf->Ln();//换行
	$pdf->Cell(190,10,iconv("utf-8","gbk",'检查日志'),1,0,'L');
    	$pdf->Ln();//换行
	$pdf->Cell(190,30,iconv("utf-8","gbk",$FeedReport_arr['report_log']),1,0,'L');
    	$pdf->Ln();//换行
	$pdf->Cell(190,8,iconv("utf-8","gbk",'检查人：'.$cal_people.'                    验收人：'.$check_people.'                    
		校验日期：'.$FeedReport_arr['report_date'].'	'),0,0,'L');
	break;
					case 4:
    	$pdf->SetFont('simhei', '', 10);
	//$pdf->Cell(180,8,iconv("utf-8","gbk",'制表日期:'.$time),0,0,'R');
	$pdf->Cell(190,8,iconv("utf-8","gbk",'山西中节能潞安电力节能服务有限公司'),0,0,'R');
    	$pdf->Ln();//换行
    	$pdf->SetFont('simhei', '', 20);
				QRcode::png($codeContents,$pngPath);
				$pdf->Image($pngPath,160,235,0,0);
	$pdf->Cell(190,12,iconv("utf-8","gbk",$tb_account_arr['equipment_name'].'检查记录'),1,0,'C');
    	$pdf->Ln();//换行

    	$pdf->SetFont('simhei', '', 10);
	$pdf->Cell(190,9,iconv("utf-8","gbk",'检查前参数'),1,0,'L');
    	$pdf->Ln();//换行
	$pdf->Cell(19,10,iconv("utf-8","gbk",'氧含量'),1,0,'C');
	$pdf->Cell(19,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn3']."%"),1,0,'C');
	$pdf->Cell(19,10,iconv("utf-8","gbk",'湿度'),1,0,'C');
	$pdf->Cell(19,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn4']."%"),1,0,'C');
	$pdf->Cell(19,10,iconv("utf-8","gbk",'温度'),1,0,'C');
	$pdf->Cell(19,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn5']."℃"),1,0,'C');
	$pdf->Cell(19,10,iconv("utf-8","gbk",'压力'),1,0,'C');
	$pdf->Cell(19,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn6']."Pa"),1,0,'C');
	$pdf->Cell(19,10,iconv("utf-8","gbk",'流速'),1,0,'C');
	$pdf->Cell(19,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn7']."m/s"),1,0,'C');
    	$pdf->Ln();//换行
	$pdf->Cell(190,9,iconv("utf-8","gbk",'检查后参数'),1,0,'L');
    	$pdf->Ln();//换行
	$pdf->Cell(19,10,iconv("utf-8","gbk",'氧含量'),1,0,'C');
	$pdf->Cell(19,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn48']."%"),1,0,'C');
	$pdf->Cell(19,10,iconv("utf-8","gbk",'湿度'),1,0,'C');
	$pdf->Cell(19,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn10']."%"),1,0,'C');
	$pdf->Cell(19,10,iconv("utf-8","gbk",'温度'),1,0,'C');
	$pdf->Cell(19,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn38']."℃"),1,0,'C');
	$pdf->Cell(19,10,iconv("utf-8","gbk",'压力'),1,0,'C');
	$pdf->Cell(19,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn39']."Pa"),1,0,'C');
	$pdf->Cell(19,10,iconv("utf-8","gbk",'流速'),1,0,'C');
	$pdf->Cell(19,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn40']."m/s"),1,0,'C');
    	$pdf->Ln();//换行
	$pdf->Cell(38,10,iconv("utf-8","gbk",'二氧化硫偏差'),1,0,'C');
	$pdf->Cell(19,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn1']."ppm"),1,0,'C');
	$pdf->Cell(19,10,iconv("utf-8","gbk",'响应时间'),1,0,'C');
	$pdf->Cell(19,10,iconv("utf-8","gbk",$FeedReport_arr['report_TextColumn6']),1,0,'C');
	$pdf->Cell(38,10,iconv("utf-8","gbk",'氮氧化物偏差'),1,0,'C');
	$pdf->Cell(19,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn2']."ppm"),1,0,'C');
	$pdf->Cell(19,10,iconv("utf-8","gbk",'响应时间'),1,0,'C');
	$pdf->Cell(19,10,iconv("utf-8","gbk",$FeedReport_arr['report_TextColumn7']),1,0,'C');
    	$pdf->Ln();//换行
	$pdf->Cell(190,9,iconv("utf-8","gbk",'设备概况'),1,0,'L');
    	$pdf->Ln();//换行
	$pdf->Cell(25,10,iconv("utf-8","gbk",'气源情况'),1,0,'C');
	$pdf->Cell(20,10,iconv("utf-8","gbk",$FeedReport_arr['report_TextColumn1']),1,0,'C');
	$pdf->Cell(25,10,iconv("utf-8","gbk",'取样管线'),1,0,'C');
	$pdf->Cell(20,10,iconv("utf-8","gbk",$FeedReport_arr['report_TextColumn2']),1,0,'C');
	$pdf->Cell(30,10,iconv("utf-8","gbk",'二氧化硫系统报警'),1,0,'C');
	$pdf->Cell(70,10,iconv("utf-8","gbk",$FeedReport_arr['report_TextColumn3']),1,0,'C');
    	$pdf->Ln();//换行
	$pdf->Cell(25,10,iconv("utf-8","gbk",'压缩空气压力'),1,0,'C');
	$pdf->Cell(20,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn8']."MPa"),1,0,'C');
	$pdf->Cell(25,10,iconv("utf-8","gbk",'稀释气压力'),1,0,'C');
	$pdf->Cell(20,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn9']."psi"),1,0,'C');
	$pdf->Cell(30,10,iconv("utf-8","gbk",'氮氧化物系统报警'),1,0,'C');
	$pdf->Cell(70,10,iconv("utf-8","gbk",$FeedReport_arr['report_TextColumn4']),1,0,'C');
    	$pdf->Ln();//换行
	$pdf->Cell(190,10,iconv("utf-8","gbk",'日常检查'),1,0,'L');
    	$pdf->Ln();//换行
	$pdf->Cell(25,10,iconv("utf-8","gbk",'湿度探头'),1,0,'C');
	if($FeedReport_arr['report_NumberColumn11'] == 0){
		$pdf->Cell(17,10,iconv("utf-8","gbk","---"),1,0,'C');
	}
	if($FeedReport_arr['report_NumberColumn11'] == 1){
		$pdf->Cell(17,10,iconv("utf-8","gbk","重启吹扫"),1,0,'C');
	}
	$pdf->Cell(21,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn21']."（1周）"),1,0,'C');
	$pdf->Cell(25,10,iconv("utf-8","gbk",'探头滤芯'),1,0,'C');
	if($FeedReport_arr['report_NumberColumn12'] == 0){
		$pdf->Cell(17,10,iconv("utf-8","gbk","---"),1,0,'C');
	}
	if($FeedReport_arr['report_NumberColumn12'] == 1){
		$pdf->Cell(17,10,iconv("utf-8","gbk","更换滤芯"),1,0,'C');
	}
	$pdf->cell(21,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn22']."（26周）"),1,0,'C');
	$pdf->Cell(26,10,iconv("utf-8","gbk",'探杆清理'),1,0,'C');
	if($FeedReport_arr['report_NumberColumn13'] == 0){
		$pdf->Cell(17,10,iconv("utf-8","gbk","---"),1,0,'C');
	}
	if($FeedReport_arr['report_NumberColumn13'] == 1){
		$pdf->Cell(17,10,iconv("utf-8","gbk","清理探杆"),1,0,'C');
	}
	$pdf->Cell(21,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn23']."（12周）"),1,0,'C');
    	$pdf->Ln();//换行
	$pdf->Cell(25,10,iconv("utf-8","gbk",'氧化锆滤芯'),1,0,'C');
	if($FeedReport_arr['report_NumberColumn32'] == 0){
		$pdf->Cell(17,10,iconv("utf-8","gbk","---"),1,0,'C');
	}
	if($FeedReport_arr['report_NumberColumn32'] == 1){
		$pdf->Cell(17,10,iconv("utf-8","gbk","更换滤芯"),1,0,'C');
	}
	$pdf->Cell(21,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn42']."（12周）"),1,0,'C');
	$pdf->Cell(25,10,iconv("utf-8","gbk",'氧化锆探杆'),1,0,'C');
	if($FeedReport_arr['report_NumberColumn33'] == 0){
		$pdf->Cell(17,10,iconv("utf-8","gbk","---"),1,0,'C');
	}
	if($FeedReport_arr['report_NumberColumn33'] == 1){
		$pdf->Cell(17,10,iconv("utf-8","gbk","清理探杆"),1,0,'C');
	}
	$pdf->cell(21,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn43']."（26周）"),1,0,'C');
	$pdf->Cell(26,10,iconv("utf-8","gbk",'温压流探杆'),1,0,'C');
	if($FeedReport_arr['report_NumberColumn34'] == 0){
		$pdf->Cell(17,10,iconv("utf-8","gbk","---"),1,0,'C');
	}
	if($FeedReport_arr['report_NumberColumn34'] == 1){
		$pdf->Cell(17,10,iconv("utf-8","gbk","清理探杆"),1,0,'C');
	}
	$pdf->Cell(21,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn44']."（26周）"),1,0,'C');
    	$pdf->Ln();//换行
	$pdf->Cell(190,10,iconv("utf-8","gbk",'音速小孔检查'),1,0,'L');
    	$pdf->Ln();//换行
	$pdf->Cell(25,10,iconv("utf-8","gbk",'43i PMT电压'),1,0,'C');
	if($FeedReport_arr['report_NumberColumn35'] == 0){
	$pdf->Cell(25,10,iconv("utf-8","gbk","---"),1,0,'C');
	}else{
	$pdf->Cell(25,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn35']."V"),1,0,'C');
	}
	$pdf->Cell(25,10,iconv("utf-8","gbk",'42i PMT电压'),1,0,'C');
	if($FeedReport_arr['report_NumberColumn45'] == 0){
	$pdf->Cell(25,10,iconv("utf-8","gbk","---"),1,0,'C');
	}else{
	$pdf->Cell(25,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn45']."V"),1,0,'C');
	}
	$pdf->Cell(90,10,iconv("utf-8","gbk",$FeedReport_arr['report_TextColumn11']),1,0,'C');
    	$pdf->Ln();//换行
	$pdf->Cell(25,10,iconv("utf-8","gbk",'清理音速小孔'),1,0,'C');
	if($FeedReport_arr['report_NumberColumn14'] == 0){
		$pdf->Cell(25,10,iconv("utf-8","gbk","---"),1,0,'C');
	}
	if($FeedReport_arr['report_NumberColumn14'] == 1){
		$pdf->Cell(25,10,iconv("utf-8","gbk","清理杂质"),1,0,'C');
	}
	$pdf->Cell(25,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn24']."（26周）"),1,0,'C');
	$pdf->Cell(25,10,iconv("utf-8","gbk",""),1,0,'C');
	$pdf->Cell(30,10,iconv("utf-8","gbk",'更换音速小孔'),1,0,'C');
	if($FeedReport_arr['report_NumberColumn15'] == 0){
		$pdf->Cell(30,10,iconv("utf-8","gbk","---"),1,0,'C');
	}
	if($FeedReport_arr['report_NumberColumn15'] == 1){
		$pdf->Cell(30,10,iconv("utf-8","gbk","更换设备"),1,0,'C');
	}
	$pdf->Cell(30,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn25']."（26周）"),1,0,'C');
    	$pdf->Ln();//换行
	$pdf->Cell(190,10,iconv("utf-8","gbk",'二氧化硫采样泵维护'),1,0,'L');
    	$pdf->Ln();//换行
	$pdf->Cell(24,10,iconv("utf-8","gbk",'检查前流量'),1,0,'C');
	if($FeedReport_arr['report_NumberColumn36'] == 0){
	$pdf->Cell(39,10,iconv("utf-8","gbk","---"),1,0,'C');
	}else{
	$pdf->Cell(39,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn36']."L/min"),1,0,'C');
	}
	$pdf->Cell(24,10,iconv("utf-8","gbk",'检查后流量'),1,0,'C');
	if($FeedReport_arr['report_NumberColumn46'] == 0){
	$pdf->Cell(39,10,iconv("utf-8","gbk","---"),1,0,'C');
	}else{
	$pdf->Cell(39,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn46']."L/min"),1,0,'C');
	}
	$pdf->Cell(64,10,iconv("utf-8","gbk",$FeedReport_arr['report_TextColumn12']),1,0,'C');
    	$pdf->Ln();//换行
	$pdf->Cell(24,10,iconv("utf-8","gbk",'采样泵膜'),1,0,'C');
	if($FeedReport_arr['report_NumberColumn16'] == 0){
		$pdf->Cell(18,10,iconv("utf-8","gbk",'流量正常'),1,0,'C');
	}
	if($FeedReport_arr['report_NumberColumn16'] == 1){
		$pdf->Cell(18,10,iconv("utf-8","gbk",'更换泵膜'),1,0,'C');
	}
	$pdf->Cell(21,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn26']."（52周）"),1,0,'C');
	$pdf->Cell(24,10,iconv("utf-8","gbk",'采样泵轴承'),1,0,'C');
	if($FeedReport_arr['report_NumberColumn17'] == 0){
		$pdf->Cell(18,10,iconv("utf-8","gbk",'流量正常'),1,0,'C');
	}
	if($FeedReport_arr['report_NumberColumn17'] == 1){
		$pdf->Cell(18,10,iconv("utf-8","gbk",'更换轴承'),1,0,'C');
	}
	$pdf->Cell(21,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn27']."（52周）"),1,0,'C');
	$pdf->Cell(25,10,iconv("utf-8","gbk",'采样泵'),1,0,'C');
	if($FeedReport_arr['report_NumberColumn18'] == 0){
		$pdf->Cell(18,10,iconv("utf-8","gbk",'流量正常'),1,0,'C');
	}
	if($FeedReport_arr['report_NumberColumn18'] == 1){
		$pdf->Cell(18,10,iconv("utf-8","gbk",'更换设备'),1,0,'C');
	}
	$pdf->Cell(21,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn28']."（104周）"),1,0,'C');
    	$pdf->Ln();//换行
	$pdf->Cell(190,10,iconv("utf-8","gbk",'氮氧化物采样泵维护'),1,0,'L');
    	$pdf->Ln();//换行
	$pdf->Cell(24,10,iconv("utf-8","gbk",'检查前流量'),1,0,'C');
	if($FeedReport_arr['report_NumberColumn37'] == 0){
	$pdf->Cell(39,10,iconv("utf-8","gbk","---"),1,0,'C');
	}else{
	$pdf->Cell(39,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn37']."L/min"),1,0,'C');
	}
	$pdf->Cell(24,10,iconv("utf-8","gbk",'检查后流量'),1,0,'C');
	if($FeedReport_arr['report_NumberColumn47'] == 0){
	$pdf->Cell(39,10,iconv("utf-8","gbk","---"),1,0,'C');
	}else{
	$pdf->Cell(39,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn47']."L/min"),1,0,'C');
	}
	$pdf->Cell(64,10,iconv("utf-8","gbk",$FeedReport_arr['report_TextColumn13']),1,0,'C');
    	$pdf->Ln();//换行
	$pdf->Cell(24,10,iconv("utf-8","gbk",'采样泵膜'),1,0,'C');
	if($FeedReport_arr['report_NumberColumn19'] == 0){
		$pdf->Cell(18,10,iconv("utf-8","gbk",'流量正常'),1,0,'C');
	}
	if($FeedReport_arr['report_NumberColumn19'] == 1){
		$pdf->Cell(18,10,iconv("utf-8","gbk",'更换泵膜'),1,0,'C');
	}
	$pdf->Cell(21,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn29']."（52周）"),1,0,'C');
	$pdf->Cell(24,10,iconv("utf-8","gbk",'采样泵轴承'),1,0,'C');
	if($FeedReport_arr['report_NumberColumn20'] == 0){
		$pdf->Cell(18,10,iconv("utf-8","gbk",'流量正常'),1,0,'C');
	}
	if($FeedReport_arr['report_NumberColumn20'] == 1){
		$pdf->Cell(18,10,iconv("utf-8","gbk",'更换轴承'),1,0,'C');
	}
	$pdf->Cell(21,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn30']."（52周）"),1,0,'C');
	$pdf->Cell(25,10,iconv("utf-8","gbk",'采样泵'),1,0,'C');
	if($FeedReport_arr['report_NumberColumn31'] == 0){
		$pdf->Cell(18,10,iconv("utf-8","gbk",'流量正常'),1,0,'C');
	}
	if($FeedReport_arr['report_NumberColumn31'] == 1){
		$pdf->Cell(18,10,iconv("utf-8","gbk",'更换设备'),1,0,'C');
	}
	$pdf->Cell(21,10,iconv("utf-8","gbk",$FeedReport_arr['report_NumberColumn41']."（104周）"),1,0,'C');
    	$pdf->Ln();//换行
	$pdf->Cell(190,9,iconv("utf-8","gbk",'检查日志'),1,0,'L');
    	$pdf->Ln();//换行
	$pdf->Cell(190,30,iconv("utf-8","gbk",$FeedReport_arr['report_log']),1,0,'L');
    	$pdf->Ln();//换行
	$pdf->Cell(190,8,iconv("utf-8","gbk",'检查人：'.$cal_people.'                    验收人：'.$check_people.'                    
		校验日期：'.$FeedReport_arr['report_date'].'	'),0,0,'L');
	break;
default:
	echo "no flag";
					}


?>
