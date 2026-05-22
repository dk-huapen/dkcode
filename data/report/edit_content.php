<html>
	<head>
		<?php include("header.php") ?>
	</head>
	<body>
<!------------------------------------------------------------------------------表单验证-------------------------------------------------------------------------------->
		<?php
function maxnum($a,$b,$c){
	return $a > $b ? ($a > $c ? $a : $c) : ($b > $c ? $b : $c);
}
function minnum($a,$b,$c){
	return $a < $b ? ($a < $c ? $a : $c) : ($b < $c ? $b : $c);
}
		if ($_SERVER["REQUEST_METHOD"] == "POST"){
	include_once('../../lib/conn.php');
	$report_id = $_POST["report_id"]; 
	$flag = $_POST["flag"]; 
	$step = $_POST["report_step"]; 
					switch($flag)
					{
					case 1:
	$report_TextColumn1 = $_POST["report_TextColumn1"]; 
	$report_TextColumn2 = $_POST["report_TextColumn2"]; 
	$report_TextColumn3 = $_POST["report_TextColumn3"]; 
	$report_TextColumn4 = $_POST["report_TextColumn4"]; 
	$report_TextColumn5 = $_POST["report_TextColumn5"]; 
	$report_TextColumn6 = $_POST["report_TextColumn6"]; 
	$report_TextColumn7 = $_POST["report_TextColumn7"]; 
	$report_TextColumn8 = $_POST["report_TextColumn8"]; 
	$report_TextColumn9 = $_POST["report_TextColumn9"]; 
	$report_TextColumn10 = $_POST["report_TextColumn10"]; 
	$report_TextColumn11 = $_POST["report_TextColumn11"]; 
	$report_TextColumn12 = $_POST["report_TextColumn12"]; 
	$report_TextColumn13 = $_POST["report_TextColumn13"]; 
	$report_NumberColumn1 = $_POST["report_NumberColumn1"]; 
	$report_NumberColumn2 = $_POST["report_NumberColumn2"]; 
	$report_NumberColumn3 = $_POST["report_NumberColumn3"]; 
	$report_NumberColumn4 = $_POST["report_NumberColumn4"]; 
	$report_NumberColumn5 = $_POST["report_NumberColumn5"]; 
	$report_NumberColumn6 = $_POST["report_NumberColumn6"]; 
	$report_NumberColumn7 = $_POST["report_NumberColumn7"]; 
	$report_NumberColumn8 = $_POST["report_NumberColumn8"]; 
	$report_NumberColumn9 = $_POST["report_NumberColumn9"]; 
	$report_NumberColumn10 = $_POST["report_NumberColumn10"]; 
	$report_NumberColumn11 = $_POST["report_NumberColumn11"]; 
	$report_NumberColumn12 = $_POST["report_NumberColumn12"]; 
	$report_NumberColumn13 = $_POST["report_NumberColumn13"]; 
	$report_NumberColumn14 = $_POST["report_NumberColumn14"]; 
	$report_NumberColumn15 = $_POST["report_NumberColumn15"]; 
	$report_NumberColumn16 = $_POST["report_NumberColumn16"]; 
	$report_NumberColumn17 = $_POST["report_NumberColumn17"]; 
	$report_NumberColumn18 = $_POST["report_NumberColumn18"]; 
	$report_NumberColumn19 = $_POST["report_NumberColumn19"]; 
	$report_NumberColumn20 = $_POST["report_NumberColumn20"]; 
	$report_NumberColumn21 = $_POST["report_NumberColumn21"]; 
	$report_NumberColumn22 = $_POST["report_NumberColumn22"]; 
	$report_NumberColumn23 = $_POST["report_NumberColumn23"]; 
	$report_NumberColumn24 = $_POST["report_NumberColumn24"]; 
	$report_NumberColumn25 = $_POST["report_NumberColumn25"]; 
	$report_NumberColumn26 = $_POST["report_NumberColumn26"]; 
	$report_NumberColumn27 = $_POST["report_NumberColumn27"]; 
	$report_NumberColumn28 = $_POST["report_NumberColumn28"]; 
	$report_NumberColumn29 = $_POST["report_NumberColumn29"]; 
	$report_NumberColumn30 = $_POST["report_NumberColumn30"]; 
	$report_NumberColumn31 = $_POST["report_NumberColumn31"]; 
	$report_NumberColumn32 = $_POST["report_NumberColumn32"]; 
	$report_NumberColumn33 = $_POST["report_NumberColumn33"]; 
	$report_NumberColumn34 = $_POST["report_NumberColumn34"]; 
	$report_NumberColumn35 = $_POST["report_NumberColumn35"]; 
	$report_NumberColumn36 = $_POST["report_NumberColumn36"]; 
	$report_NumberColumn37 = $_POST["report_NumberColumn37"]; 
	$report_NumberColumn38 = $_POST["report_NumberColumn38"]; 
	$report_NumberColumn39 = $_POST["report_NumberColumn39"]; 
	$report_NumberColumn40 = $_POST["report_NumberColumn40"]; 
	$report_NumberColumn41 = $_POST["report_NumberColumn41"]; 
	$report_NumberColumn42 = $_POST["report_NumberColumn42"]; 
	$report_NumberColumn43 = $_POST["report_NumberColumn43"]; 
	$report_NumberColumn44 = $_POST["report_NumberColumn44"]; 
	$report_NumberColumn45 = $_POST["report_NumberColumn45"]; 
	$report_NumberColumn46 = $_POST["report_NumberColumn46"]; 
	$report_NumberColumn47 = $_POST["report_NumberColumn47"]; 
	$report_NumberColumn48 = $_POST["report_NumberColumn48"]; 
	$calibra = $_POST["calibra_people"]; 
	$checkp = $_POST["check_people"]; 
	$sql = "UPDATE tb_FeederReport SET report_TextColumn1='".$report_TextColumn1."',report_TextColumn2='".$report_TextColumn2."',report_TextColumn3='".$report_TextColumn3."',report_TextColumn4='".$report_TextColumn4."',report_TextColumn5='".$report_TextColumn5."',report_TextColumn6='".$report_TextColumn6."',report_TextColumn7='".$report_TextColumn7."',report_TextColumn8='".$report_TextColumn8."',report_TextColumn9='".$report_TextColumn9."',report_TextColumn10='".$report_TextColumn10."',report_TextColumn11='".$report_TextColumn11."',report_TextColumn12='".$report_TextColumn12."',report_TextColumn13='".$report_TextColumn13."',report_NumberColumn1=".$report_NumberColumn1.",report_NumberColumn2=".$report_NumberColumn2.",report_NumberColumn3=".$report_NumberColumn3.",report_NumberColumn4=".$report_NumberColumn4.",report_NumberColumn5=".$report_NumberColumn5.",report_NumberColumn6=".$report_NumberColumn6.",report_NumberColumn7=".$report_NumberColumn7.",report_NumberColumn8=".$report_NumberColumn8.",report_NumberColumn9=".$report_NumberColumn9.",report_NumberColumn10=".$report_NumberColumn10.",report_NumberColumn11=".$report_NumberColumn11.",report_NumberColumn12=".$report_NumberColumn12.",report_NumberColumn13=".$report_NumberColumn13.",report_NumberColumn14=".$report_NumberColumn14.",report_NumberColumn15=".$report_NumberColumn15.",report_NumberColumn16=".$report_NumberColumn16.",report_NumberColumn17=".$report_NumberColumn17.",report_NumberColumn18=".$report_NumberColumn18.",report_NumberColumn19=".$report_NumberColumn19.",report_NumberColumn20=".$report_NumberColumn20.",report_NumberColumn21=".$report_NumberColumn21.",report_NumberColumn22=".$report_NumberColumn22.",report_NumberColumn23=".$report_NumberColumn23.",report_NumberColumn24=".$report_NumberColumn24.",report_NumberColumn25=".$report_NumberColumn25.",report_NumberColumn26=".$report_NumberColumn26.",report_NumberColumn27=".$report_NumberColumn27.",report_NumberColumn28=".$report_NumberColumn28.",report_NumberColumn29=".$report_NumberColumn29.",report_NumberColumn30=".$report_NumberColumn30.",report_NumberColumn31=".$report_NumberColumn31.",report_NumberColumn32=".$report_NumberColumn32.",report_NumberColumn33=".$report_NumberColumn33.",report_NumberColumn34=".$report_NumberColumn34.",report_NumberColumn35=".$report_NumberColumn35.",report_NumberColumn36=".$report_NumberColumn36.",report_NumberColumn37=".$report_NumberColumn37.",report_NumberColumn38=".$report_NumberColumn38.",report_NumberColumn39=".$report_NumberColumn39.",report_NumberColumn40=".$report_NumberColumn40.",report_NumberColumn41=".$report_NumberColumn41.",report_NumberColumn42=".$report_NumberColumn42.",report_NumberColumn43=".$report_NumberColumn43.",report_NumberColumn44=".$report_NumberColumn44.",report_NumberColumn45=".$report_NumberColumn45.",report_NumberColumn46=".$report_NumberColumn46.",report_NumberColumn47=".$report_NumberColumn47.",report_NumberColumn48=".$report_NumberColumn48.",calibra=".$calibra.",checkp=".$checkp." WHERE report_id=".$report_id;
	break;
					case 2:
	$report_TextColumn1 = $_POST["report_TextColumn1"]; 
	//$report_TextColumn2 = $_POST["report_TextColumn2"]; 
	$report_TextColumn3 = $_POST["report_TextColumn3"]; 
	$report_NumberColumn1 = $_POST["report_NumberColumn1"]; 
	$report_NumberColumn2 = $_POST["report_NumberColumn2"]; 
	$report_NumberColumn3 = $_POST["report_NumberColumn3"]; 
	$report_NumberColumn4 = $_POST["report_NumberColumn4"]; 
	//$report_NumberColumn5 = round(($_POST["report_NumberColumn2"]+$_POST["report_NumberColumn3"]+$_POST["report_NumberColumn4"])/3,3); 
	$report_NumberColumn5 = round(($_POST["report_NumberColumn2"]+$_POST["report_NumberColumn3"]+$_POST["report_NumberColumn4"])/3,$_POST["xiaoshu"]); 
	$report_NumberColumn6 = $_POST["report_NumberColumn6"]; 
	$report_NumberColumn7 = $_POST["report_NumberColumn7"]; 
	$report_NumberColumn8 = $_POST["report_NumberColumn8"]; 
	$report_NumberColumn9 = round(($_POST["report_NumberColumn6"]+$_POST["report_NumberColumn7"]+$_POST["report_NumberColumn8"])/3,$_POST["xiaoshu"]); 
//	$report_NumberColumn9 = round(($_POST["report_NumberColumn6"]+$_POST["report_NumberColumn7"]+$_POST["report_NumberColumn8"])/3,3); 
	$report_NumberColumn10 = $_POST["report_NumberColumn10"]; 
	$report_NumberColumn11 = $_POST["report_NumberColumn11"]; 
	$report_NumberColumn12 = $_POST["report_NumberColumn12"]; 
	$report_NumberColumn13 = round(($_POST["report_NumberColumn10"]+$_POST["report_NumberColumn11"]+$_POST["report_NumberColumn12"])/3,$_POST["xiaoshu"]); 
	//$report_NumberColumn13 = round(($_POST["report_NumberColumn10"]+$_POST["report_NumberColumn11"]+$_POST["report_NumberColumn12"])/3,3); 
	$report_NumberColumn14 = $_POST["report_NumberColumn14"]; 
	$report_NumberColumn15 = $_POST["report_NumberColumn15"]; 
	$report_NumberColumn16 = $_POST["report_NumberColumn16"]; 
	$report_NumberColumn17 = round(($_POST["report_NumberColumn14"]+$_POST["report_NumberColumn15"]+$_POST["report_NumberColumn16"])/3,$_POST["xiaoshu"]); 
	//$report_NumberColumn17 = round(($_POST["report_NumberColumn14"]+$_POST["report_NumberColumn15"]+$_POST["report_NumberColumn16"])/3,3); 
	if($_POST['report_NumberColumn28']){
		$report_NumberColumn18 = $report_NumberColumn17-$_POST["report_NumberColumn1"]; 
	}else{
		$report_NumberColumn18 = $report_NumberColumn13-$_POST["report_NumberColumn1"]; 
	}
	$report_NumberColumn19 = abs(maxnum($_POST["report_NumberColumn10"],$_POST["report_NumberColumn11"],$_POST["report_NumberColumn12"]) - minnum($_POST["report_NumberColumn10"],$_POST["report_NumberColumn11"],$_POST["report_NumberColumn12"])); 
	//$min1 = minnum($_POST["report_NumberColumn10"],$_POST["report_NumberColumn11"],$_POST["report_NumberColumn12"]); 
	//$max1 = maxnum($_POST["report_NumberColumn10"],$_POST["report_NumberColumn11"],$_POST["report_NumberColumn12"]);
	//$report_NumberColumn19 = $max1 - $min1; 
	//$report_NumberColumn19 = round(maxnum($_POST["report_NumberColumn10"],$_POST["report_NumberColumn11"],$_POST["report_NumberColumn12"]) - minnum($_POST["report_NumberColumn10"],$_POST["report_NumberColumn11"],$_POST["report_NumberColumn12"]),3); 
	$report_NumberColumn20 = abs(maxnum($_POST["report_NumberColumn14"],$_POST["report_NumberColumn15"],$_POST["report_NumberColumn16"]) - minnum($_POST["report_NumberColumn14"],$_POST["report_NumberColumn15"],$_POST["report_NumberColumn16"])); 
	//$report_NumberColumn20 = round(maxnum($_POST["report_NumberColumn14"],$_POST["report_NumberColumn15"],$_POST["report_NumberColumn16"]) - minnum($_POST["report_NumberColumn14"],$_POST["report_NumberColumn15"],$_POST["report_NumberColumn16"]),3); 
	$report_NumberColumn21 = abs($report_NumberColumn13-$report_NumberColumn17); 
	//$report_NumberColumn21 = round($_POST["report_NumberColumn13"]-$_POST["report_NumberColumn17"],3); 
	$report_NumberColumn22 = $_POST["report_NumberColumn22"]; 
	$report_NumberColumn23 = $_POST["report_NumberColumn23"]; 
	$report_NumberColumn24 = $_POST["report_NumberColumn24"]; 
	$report_NumberColumn25 = $_POST["report_NumberColumn25"]; 
	$report_NumberColumn26 = $_POST["report_NumberColumn26"]; 
	$report_NumberColumn27 = abs($_POST["report_NumberColumn24"]*$_POST["report_NumberColumn1"]); 
	$report_NumberColumn28 = $_POST["report_NumberColumn28"]; 
	$calibra = $_POST["calibra_people"]; 
	$checkp = $_POST["check_people"]; 
	$sql = "UPDATE tb_FeederReport SET report_TextColumn1='".$report_TextColumn1."',report_TextColumn2='".$report_TextColumn2."',report_TextColumn3='".$report_TextColumn3."',report_NumberColumn1=".$report_NumberColumn1.",report_NumberColumn2=".$report_NumberColumn2.",report_NumberColumn3=".$report_NumberColumn3.",report_NumberColumn4=".$report_NumberColumn4.",report_NumberColumn5=".$report_NumberColumn5.",report_NumberColumn6=".$report_NumberColumn6.",report_NumberColumn7=".$report_NumberColumn7.",report_NumberColumn8=".$report_NumberColumn8.",report_NumberColumn9=".$report_NumberColumn9.",report_NumberColumn10=".$report_NumberColumn10.",report_NumberColumn11=".$report_NumberColumn11.",report_NumberColumn12=".$report_NumberColumn12.",report_NumberColumn13=".$report_NumberColumn13.",report_NumberColumn14=".$report_NumberColumn14.",report_NumberColumn15=".$report_NumberColumn15.",report_NumberColumn16=".$report_NumberColumn16.",report_NumberColumn17=".$report_NumberColumn17.",report_NumberColumn18=".$report_NumberColumn18.",report_NumberColumn19=".$report_NumberColumn19.",report_NumberColumn20=".$report_NumberColumn20.",report_NumberColumn21=".$report_NumberColumn21.",report_NumberColumn22=".$report_NumberColumn22.",report_NumberColumn23=".$report_NumberColumn23.",report_NumberColumn24=".$report_NumberColumn24.",report_NumberColumn25=".$report_NumberColumn25.",report_NumberColumn26=".$report_NumberColumn26.",report_NumberColumn27=".$report_NumberColumn27.",report_NumberColumn28=".$report_NumberColumn28.",calibra=".$calibra.",checkp=".$checkp." WHERE report_id=".$report_id;
						break;
	case 3:
		$tb_report_sql = 'SELECT * FROM tb_FeederReport where report_id='.$report_id;
		$tb_report_result = mysqli_query($conn, $tb_report_sql);
		$tb_report_arr=mysqli_fetch_assoc($tb_report_result);
						//检查前参数
		$report_NumberColumn1 = $_POST["report_NumberColumn1"]; 
		$report_NumberColumn2 = $_POST["report_NumberColumn2"]; 
		$report_NumberColumn3 = $_POST["report_NumberColumn3"]; 
		$report_NumberColumn4 = $_POST["report_NumberColumn4"]; 
		$report_NumberColumn5 = $_POST["report_NumberColumn5"]; 
		$report_NumberColumn6 = $_POST["report_NumberColumn6"]; 
		if($step>0){//设备概况
			$report_TextColumn1 = $_POST["report_TextColumn1"]; 
			$report_TextColumn2 = $_POST["report_TextColumn2"]; 
			$report_TextColumn3 = $_POST["report_TextColumn3"]; 
			$report_NumberColumn7 = $_POST["report_NumberColumn7"]; 
			$report_NumberColumn8 = $_POST["report_NumberColumn8"]; 
			$report_NumberColumn9 = $_POST["report_NumberColumn9"]; 
			$report_NumberColumn10 = $_POST["report_NumberColumn10"]; 
		}
		if($step>1){//设备概况
			$report_NumberColumn11 = $_POST["report_NumberColumn11"]; 
			if($report_NumberColumn11){
				$report_NumberColumn21 = 0; 
			}else{
				if($step==2){//设备概况
					$report_NumberColumn21 = $tb_report_arr["report_NumberColumn21"]+1;
				}else{
					$report_NumberColumn21 = $tb_report_arr["report_NumberColumn21"];
				}
			}
			$report_NumberColumn12 = $_POST["report_NumberColumn12"]; 
			if($report_NumberColumn12){
				$report_NumberColumn22 = 0; 
			}else{
				if($step==2){//设备概况
					$report_NumberColumn22 = $tb_report_arr["report_NumberColumn22"]+1;
				}else{
					$report_NumberColumn22 = $tb_report_arr["report_NumberColumn22"];
				}
			}
			$report_NumberColumn13 = $_POST["report_NumberColumn13"]; 
			if($report_NumberColumn13){
				$report_NumberColumn23 = 0; 
			}else{
				if($step==2){//设备概况
					$report_NumberColumn23 = $tb_report_arr["report_NumberColumn23"]+1;
				}else{
					$report_NumberColumn23 = $tb_report_arr["report_NumberColumn23"];
				}
			}
			$report_NumberColumn14 = $_POST["report_NumberColumn14"]; 
			if($report_NumberColumn14){
				$report_NumberColumn24 = 0; 
			}else{
				if($step==2){//设备概况
					$report_NumberColumn24 = $tb_report_arr["report_NumberColumn24"]+1;
				}else{
					$report_NumberColumn24 = $tb_report_arr["report_NumberColumn24"];
				}
			}
			$report_NumberColumn15 = $_POST["report_NumberColumn15"]; 
			if($report_NumberColumn15){
				$report_NumberColumn25 = 0; 
			}else{
				if($step==2){//设备概况
					$report_NumberColumn25 = $tb_report_arr["report_NumberColumn25"]+1;
				}else{
					$report_NumberColumn25 = $tb_report_arr["report_NumberColumn25"];
				}
			}
			$report_NumberColumn18 = $_POST["report_NumberColumn18"]; 
			if($report_NumberColumn18){
				$report_NumberColumn28 = 0; 
			}else{
				if($step==2){//设备概况
					$report_NumberColumn28 = $tb_report_arr["report_NumberColumn28"]+1;
				}else{
					$report_NumberColumn28 = $tb_report_arr["report_NumberColumn28"];
				}
			}
		}
		if($step>2){//设备概况
			$report_NumberColumn16 = $_POST["report_NumberColumn16"]; 
			if($report_NumberColumn16){
				$report_NumberColumn26 = 0; 

				$report_NumberColumn34 = $_POST["report_NumberColumn34"]; 
				$report_NumberColumn35 = $_POST["report_NumberColumn35"]; 
				$report_NumberColumn36 = $_POST["report_NumberColumn36"]; 
				$report_NumberColumn44 = $_POST["report_NumberColumn44"]; 
				$report_NumberColumn45 = $_POST["report_NumberColumn45"]; 
				$report_NumberColumn46 = $_POST["report_NumberColumn46"]; 
			}else{
				if($step==3){//流量比对/标定
					$report_NumberColumn26 = $tb_report_arr["report_NumberColumn26"]+1;
				}else{
					$report_NumberColumn26 = $tb_report_arr["report_NumberColumn26"];
				}

				$report_NumberColumn34 = 0; 
				$report_NumberColumn35 = 0; 
				$report_NumberColumn36 = 0; 
				$report_NumberColumn44 = 0; 
				$report_NumberColumn45 = 0; 
				$report_NumberColumn46 = 0; 
			}
		}
		if($step>3){//检查前参数
			$report_NumberColumn17 = $_POST["report_NumberColumn17"]; 
			if($report_NumberColumn17){
				$report_NumberColumn27 = 0; 
			}else{
				if($step==4){//设备清理
					$report_NumberColumn27 = $tb_report_arr["report_NumberColumn27"]+1;
				}else{
					$report_NumberColumn27 = $tb_report_arr["report_NumberColumn27"];
				}
			}
			$report_NumberColumn19 = $_POST["report_NumberColumn19"]; 
			if($report_NumberColumn19){
				$report_NumberColumn29 = 0; 
			}else{
				if($step==4){//设备清理
					$report_NumberColumn29 = $tb_report_arr["report_NumberColumn29"]+1;
				}else{
					$report_NumberColumn29 = $tb_report_arr["report_NumberColumn29"];
				}
			}
			$report_NumberColumn20 = $_POST["report_NumberColumn20"]; 
			if($report_NumberColumn20){
				$report_NumberColumn30 = 0; 
			}else{
				if($step==4){//设备清理
					$report_NumberColumn30 = $tb_report_arr["report_NumberColumn30"]+1;
				}else{
					$report_NumberColumn30 = $tb_report_arr["report_NumberColumn30"];
				}
			}
			$report_NumberColumn31 = $_POST["report_NumberColumn31"]; 
			if($report_NumberColumn31){
				$report_NumberColumn41 = 0; 
			}else{
				if($step==4){//设备清理
					$report_NumberColumn41 = $tb_report_arr["report_NumberColumn41"]+1;
				}else{
					$report_NumberColumn41 = $tb_report_arr["report_NumberColumn41"];
				}
			}
			$report_NumberColumn32 = $_POST["report_NumberColumn32"]; 
			if($report_NumberColumn32){
				$report_NumberColumn42 = 0; 
			}else{
				if($step==4){//设备清理
					$report_NumberColumn42 = $tb_report_arr["report_NumberColumn42"]+1;
				}else{
					$report_NumberColumn42 = $tb_report_arr["report_NumberColumn42"];
				}
			}
			$report_NumberColumn33 = $_POST["report_NumberColumn33"]; 
			if($report_NumberColumn33){
				$report_NumberColumn43 = 0; 
			}else{
				if($step==4){//设备清理
					$report_NumberColumn43 = $tb_report_arr["report_NumberColumn43"]+1;
				}else{
					$report_NumberColumn43 = $tb_report_arr["report_NumberColumn43"];
				}
			}
		}
			$sqlstep = $step +1;
		if($step==0){//检查前参数
			$sql = "UPDATE tb_FeederReport SET report_NumberColumn1=".$report_NumberColumn1.",report_NumberColumn2=".$report_NumberColumn2.",report_NumberColumn3=".$report_NumberColumn3.",report_NumberColumn4=".$report_NumberColumn4.",report_NumberColumn5=".$report_NumberColumn5.",report_NumberColumn6=".$report_NumberColumn6.",report_step=".$sqlstep." WHERE report_id=".$report_id;
		}
		if($step==1){//设备概况
			$sql = "UPDATE tb_FeederReport SET report_TextColumn1='".$report_TextColumn1."',report_TextColumn2='".$report_TextColumn2."',report_TextColumn3='".$report_TextColumn3."',report_NumberColumn1=".$report_NumberColumn1.",report_NumberColumn2=".$report_NumberColumn2.",report_NumberColumn3=".$report_NumberColumn3.",report_NumberColumn4=".$report_NumberColumn4.",report_NumberColumn5=".$report_NumberColumn5.",report_NumberColumn6=".$report_NumberColumn6.",report_NumberColumn7=".$report_NumberColumn7.",report_NumberColumn8=".$report_NumberColumn8.",report_NumberColumn9=".$report_NumberColumn9.",report_NumberColumn10=".$report_NumberColumn10.",report_step=".$sqlstep." WHERE report_id=".$report_id;
		}
		if($step==2){//滤芯检查
			$sql = "UPDATE tb_FeederReport SET report_TextColumn1='".$report_TextColumn1."',report_TextColumn2='".$report_TextColumn2."',report_TextColumn3='".$report_TextColumn3."',report_NumberColumn1=".$report_NumberColumn1.",report_NumberColumn2=".$report_NumberColumn2.",report_NumberColumn3=".$report_NumberColumn3.",report_NumberColumn4=".$report_NumberColumn4.",report_NumberColumn5=".$report_NumberColumn5.",report_NumberColumn6=".$report_NumberColumn6.",report_NumberColumn7=".$report_NumberColumn7.",report_NumberColumn8=".$report_NumberColumn8.",report_NumberColumn9=".$report_NumberColumn9.",report_NumberColumn10=".$report_NumberColumn10.",report_NumberColumn11=".$report_NumberColumn11.",report_NumberColumn12=".$report_NumberColumn12.",report_NumberColumn13=".$report_NumberColumn13.",report_NumberColumn14=".$report_NumberColumn14.",report_NumberColumn15=".$report_NumberColumn15.",report_NumberColumn18=".$report_NumberColumn18.",report_NumberColumn21=".$report_NumberColumn21.",report_NumberColumn22=".$report_NumberColumn22.",report_NumberColumn23=".$report_NumberColumn23.",report_NumberColumn24=".$report_NumberColumn24.",report_NumberColumn25=".$report_NumberColumn25.",report_NumberColumn28=".$report_NumberColumn28.",report_step=".$sqlstep." WHERE report_id=".$report_id;
		}
		if($step==3){//流量比对/标定
			$sql = "UPDATE tb_FeederReport SET report_TextColumn1='".$report_TextColumn1."',report_TextColumn2='".$report_TextColumn2."',report_TextColumn3='".$report_TextColumn3."',report_NumberColumn1=".$report_NumberColumn1.",report_NumberColumn2=".$report_NumberColumn2.",report_NumberColumn3=".$report_NumberColumn3.",report_NumberColumn4=".$report_NumberColumn4.",report_NumberColumn5=".$report_NumberColumn5.",report_NumberColumn6=".$report_NumberColumn6.",report_NumberColumn7=".$report_NumberColumn7.",report_NumberColumn8=".$report_NumberColumn8.",report_NumberColumn9=".$report_NumberColumn9.",report_NumberColumn10=".$report_NumberColumn10.",report_NumberColumn11=".$report_NumberColumn11.",report_NumberColumn12=".$report_NumberColumn12.",report_NumberColumn13=".$report_NumberColumn13.",report_NumberColumn14=".$report_NumberColumn14.",report_NumberColumn15=".$report_NumberColumn15.",report_NumberColumn18=".$report_NumberColumn18.",report_NumberColumn21=".$report_NumberColumn21.",report_NumberColumn22=".$report_NumberColumn22.",report_NumberColumn23=".$report_NumberColumn23.",report_NumberColumn24=".$report_NumberColumn24.",report_NumberColumn25=".$report_NumberColumn25.",report_NumberColumn26=".$report_NumberColumn26.",report_NumberColumn28=".$report_NumberColumn28.",report_NumberColumn44=".$report_NumberColumn44.",report_NumberColumn45=".$report_NumberColumn45.",report_NumberColumn46=".$report_NumberColumn46.",report_NumberColumn34=".$report_NumberColumn34.",report_NumberColumn35=".$report_NumberColumn35.",report_NumberColumn36=".$report_NumberColumn36.",report_step=".$sqlstep." WHERE report_id=".$report_id;
		}
		if($step==4){//设备清理
			$sql = "UPDATE tb_FeederReport SET report_TextColumn1='".$report_TextColumn1."',report_TextColumn2='".$report_TextColumn2."',report_TextColumn3='".$report_TextColumn3."',report_NumberColumn1=".$report_NumberColumn1.",report_NumberColumn2=".$report_NumberColumn2.",report_NumberColumn3=".$report_NumberColumn3.",report_NumberColumn4=".$report_NumberColumn4.",report_NumberColumn5=".$report_NumberColumn5.",report_NumberColumn6=".$report_NumberColumn6.",report_NumberColumn7=".$report_NumberColumn7.",report_NumberColumn8=".$report_NumberColumn8.",report_NumberColumn9=".$report_NumberColumn9.",report_NumberColumn10=".$report_NumberColumn10.",report_NumberColumn11=".$report_NumberColumn11.",report_NumberColumn12=".$report_NumberColumn12.",report_NumberColumn13=".$report_NumberColumn13.",report_NumberColumn14=".$report_NumberColumn14.",report_NumberColumn15=".$report_NumberColumn15.",report_NumberColumn16=".$report_NumberColumn16.",report_NumberColumn17=".$report_NumberColumn17.",report_NumberColumn18=".$report_NumberColumn18.",report_NumberColumn19=".$report_NumberColumn19.",report_NumberColumn20=".$report_NumberColumn20.",report_NumberColumn21=".$report_NumberColumn21.",report_NumberColumn22=".$report_NumberColumn22.",report_NumberColumn23=".$report_NumberColumn23.",report_NumberColumn24=".$report_NumberColumn24.",report_NumberColumn25=".$report_NumberColumn25.",report_NumberColumn26=".$report_NumberColumn26.",report_NumberColumn27=".$report_NumberColumn27.",report_NumberColumn28=".$report_NumberColumn28.",report_NumberColumn29=".$report_NumberColumn29.",report_NumberColumn30=".$report_NumberColumn30.",report_NumberColumn31=".$report_NumberColumn31.",report_NumberColumn32=".$report_NumberColumn32.",report_NumberColumn33=".$report_NumberColumn33.",report_NumberColumn34=".$report_NumberColumn34.",report_NumberColumn35=".$report_NumberColumn35.",report_NumberColumn36=".$report_NumberColumn36.",report_NumberColumn41=".$report_NumberColumn41.",report_NumberColumn42=".$report_NumberColumn42.",report_NumberColumn43=".$report_NumberColumn43.",report_NumberColumn44=".$report_NumberColumn44.",report_NumberColumn45=".$report_NumberColumn45.",report_NumberColumn46=".$report_NumberColumn46.",report_step=".$sqlstep." WHERE report_id=".$report_id;
		}
		if($step==5){//检查后参数
			$report_NumberColumn37 = $_POST["report_NumberColumn37"]; 
			$report_NumberColumn38 = $_POST["report_NumberColumn38"]; 
			$report_NumberColumn39 = $_POST["report_NumberColumn39"]; 
			$report_NumberColumn40 = $_POST["report_NumberColumn40"]; 
			$report_NumberColumn47 = $_POST["report_NumberColumn47"]; 
			$report_NumberColumn48 = $_POST["report_NumberColumn48"]; 
	$calibra = $_POST["calibra_people"]; 
	$checkp = $_POST["check_people"]; 
        		$time = date("Y-m-d");
			$sqlstep = 0;
			$sql = "UPDATE tb_FeederReport SET report_TextColumn1='".$report_TextColumn1."',report_TextColumn2='".$report_TextColumn2."',report_TextColumn3='".$report_TextColumn3."',report_NumberColumn1=".$report_NumberColumn1.",report_NumberColumn2=".$report_NumberColumn2.",report_NumberColumn3=".$report_NumberColumn3.",report_NumberColumn4=".$report_NumberColumn4.",report_NumberColumn5=".$report_NumberColumn5.",report_NumberColumn6=".$report_NumberColumn6.",report_NumberColumn7=".$report_NumberColumn7.",report_NumberColumn8=".$report_NumberColumn8.",report_NumberColumn9=".$report_NumberColumn9.",report_NumberColumn10=".$report_NumberColumn10.",report_NumberColumn11=".$report_NumberColumn11.",report_NumberColumn12=".$report_NumberColumn12.",report_NumberColumn13=".$report_NumberColumn13.",report_NumberColumn14=".$report_NumberColumn14.",report_NumberColumn15=".$report_NumberColumn15.",report_NumberColumn16=".$report_NumberColumn16.",report_NumberColumn17=".$report_NumberColumn17.",report_NumberColumn18=".$report_NumberColumn18.",report_NumberColumn19=".$report_NumberColumn19.",report_NumberColumn20=".$report_NumberColumn20.",report_NumberColumn21=".$report_NumberColumn21.",report_NumberColumn22=".$report_NumberColumn22.",report_NumberColumn23=".$report_NumberColumn23.",report_NumberColumn24=".$report_NumberColumn24.",report_NumberColumn25=".$report_NumberColumn25.",report_NumberColumn26=".$report_NumberColumn26.",report_NumberColumn27=".$report_NumberColumn27.",report_NumberColumn28=".$report_NumberColumn28.",report_NumberColumn29=".$report_NumberColumn29.",report_NumberColumn30=".$report_NumberColumn30.",report_NumberColumn31=".$report_NumberColumn31.",report_NumberColumn32=".$report_NumberColumn32.",report_NumberColumn33=".$report_NumberColumn33.",report_NumberColumn34=".$report_NumberColumn34.",report_NumberColumn35=".$report_NumberColumn35.",report_NumberColumn36=".$report_NumberColumn36.",report_NumberColumn37=".$report_NumberColumn37.",report_NumberColumn38=".$report_NumberColumn38.",report_NumberColumn39=".$report_NumberColumn39.",report_NumberColumn40=".$report_NumberColumn40.",report_NumberColumn41=".$report_NumberColumn41.",report_NumberColumn42=".$report_NumberColumn42.",report_NumberColumn43=".$report_NumberColumn43.",report_NumberColumn44=".$report_NumberColumn44.",report_NumberColumn45=".$report_NumberColumn45.",report_NumberColumn46=".$report_NumberColumn46.",report_NumberColumn47=".$report_NumberColumn47.",report_NumberColumn48=".$report_NumberColumn48.",report_step=".$sqlstep.",calibra=".$calibra.",checkp=".$checkp.",report_date='".$time."' WHERE report_id=".$report_id;
		}
		break;
					case 4:
		$tb_report_sql = 'SELECT * FROM tb_FeederReport where report_id='.$report_id;
		$tb_report_result = mysqli_query($conn, $tb_report_sql);
		$tb_report_arr=mysqli_fetch_assoc($tb_report_result);
						if($step==0){//检查前参数
	$report_NumberColumn3 = $_POST["report_NumberColumn3"]; 
	$report_NumberColumn4 = $_POST["report_NumberColumn4"]; 
	$report_NumberColumn5 = $_POST["report_NumberColumn5"]; 
	$report_NumberColumn6 = $_POST["report_NumberColumn6"]; 
	$report_NumberColumn7 = $_POST["report_NumberColumn7"]; 
	$step = $step +1;
	$sqlstep = $step;
	$sql = "UPDATE tb_FeederReport SET report_NumberColumn3=".$report_NumberColumn3.",report_NumberColumn4=".$report_NumberColumn4.",report_NumberColumn5=".$report_NumberColumn5.",report_NumberColumn6=".$report_NumberColumn6.",report_NumberColumn7=".$report_NumberColumn7.",report_step=".$step." WHERE report_id=".$report_id;
						break;
						}
						if($step==1){//设备概况
	$report_TextColumn1 = $_POST["report_TextColumn1"]; 
	$report_TextColumn2 = $_POST["report_TextColumn2"]; 
	$report_TextColumn3 = $_POST["report_TextColumn3"]; 
	$report_TextColumn4 = $_POST["report_TextColumn4"]; 
	$report_NumberColumn3 = $_POST["report_NumberColumn3"]; 
	$report_NumberColumn4 = $_POST["report_NumberColumn4"]; 
	$report_NumberColumn5 = $_POST["report_NumberColumn5"]; 
	$report_NumberColumn6 = $_POST["report_NumberColumn6"]; 
	$report_NumberColumn7 = $_POST["report_NumberColumn7"]; 
	$report_NumberColumn8 = $_POST["report_NumberColumn8"]; 
	$report_NumberColumn9 = $_POST["report_NumberColumn9"]; 
	$step = $step +1;
	$sqlstep = $step;
	$sql = "UPDATE tb_FeederReport SET report_TextColumn1='".$report_TextColumn1."',report_TextColumn2='".$report_TextColumn2."',report_TextColumn3='".$report_TextColumn3."',report_TextColumn4='".$report_TextColumn4."',report_NumberColumn3=".$report_NumberColumn3.",report_NumberColumn4=".$report_NumberColumn4.",report_NumberColumn5=".$report_NumberColumn5.",report_NumberColumn6=".$report_NumberColumn6.",report_NumberColumn7=".$report_NumberColumn7.",report_NumberColumn8=".$report_NumberColumn8.",report_NumberColumn9=".$report_NumberColumn9.",report_step=".$step." WHERE report_id=".$report_id;
						break;
						}
						if($step==2){//滤芯检查
	$report_TextColumn1 = $_POST["report_TextColumn1"]; 
	$report_TextColumn2 = $_POST["report_TextColumn2"]; 
	$report_TextColumn3 = $_POST["report_TextColumn3"]; 
	$report_TextColumn4 = $_POST["report_TextColumn4"]; 
	$report_NumberColumn3 = $_POST["report_NumberColumn3"]; 
	$report_NumberColumn4 = $_POST["report_NumberColumn4"]; 
	$report_NumberColumn5 = $_POST["report_NumberColumn5"]; 
	$report_NumberColumn6 = $_POST["report_NumberColumn6"]; 
	$report_NumberColumn7 = $_POST["report_NumberColumn7"]; 
	$report_NumberColumn8 = $_POST["report_NumberColumn8"]; 
	$report_NumberColumn9 = $_POST["report_NumberColumn9"]; 
	$report_NumberColumn11 = $_POST["report_NumberColumn11"]; 
	if($report_NumberColumn11){
	$report_NumberColumn21 = 0; 
	}else{
	//$report_NumberColumn21 = $_POST["report_NumberColumn21"]+1; 
	$report_NumberColumn21 = $tb_report_arr["report_NumberColumn21"]+1;
	}
	$report_NumberColumn12 = $_POST["report_NumberColumn12"]; 
	if($report_NumberColumn12){
		$report_NumberColumn22 = 0; 
	}else{
		//$report_NumberColumn22 = $_POST["report_NumberColumn22"]+1; 
	$report_NumberColumn22 = $tb_report_arr["report_NumberColumn22"]+1;
	}
	$report_NumberColumn13 = $_POST["report_NumberColumn13"]; 
	if($report_NumberColumn13){
		$report_NumberColumn23 = 0; 
	}else{
		//$report_NumberColumn23 = $_POST["report_NumberColumn23"]+1; 
	$report_NumberColumn23 = $tb_report_arr["report_NumberColumn23"]+1;
	}
	$report_NumberColumn32 = $_POST["report_NumberColumn32"]; 
	if($report_NumberColumn32){
		$report_NumberColumn42 = 0; 
	}else{
		//$report_NumberColumn24 = $_POST["report_NumberColumn24"]+1; 
	$report_NumberColumn42 = $tb_report_arr["report_NumberColumn42"]+1;
	}
	$report_NumberColumn33 = $_POST["report_NumberColumn33"]; 
	if($report_NumberColumn33){
		$report_NumberColumn43 = 0; 
	}else{
	//	$report_NumberColumn25 = $_POST["report_NumberColumn25"]+1; 
	$report_NumberColumn43 = $tb_report_arr["report_NumberColumn43"]+1;
	}
	$report_NumberColumn34 = $_POST["report_NumberColumn34"]; 
	if($report_NumberColumn34){
		$report_NumberColumn44 = 0; 
	}else{
	//	$report_NumberColumn25 = $_POST["report_NumberColumn25"]+1; 
	$report_NumberColumn44 = $tb_report_arr["report_NumberColumn44"]+1;
	}
	$step = $step +1;
	$sqlstep = $step;
	$sql = "UPDATE tb_FeederReport SET report_TextColumn1='".$report_TextColumn1."',report_TextColumn2='".$report_TextColumn2."',report_TextColumn3='".$report_TextColumn3."',report_TextColumn4='".$report_TextColumn4."',report_NumberColumn3=".$report_NumberColumn3.",report_NumberColumn4=".$report_NumberColumn4.",report_NumberColumn5=".$report_NumberColumn5.",report_NumberColumn6=".$report_NumberColumn6.",report_NumberColumn7=".$report_NumberColumn7.",report_NumberColumn8=".$report_NumberColumn8.",report_NumberColumn9=".$report_NumberColumn9.",report_NumberColumn11=".$report_NumberColumn11.",report_NumberColumn12=".$report_NumberColumn12.",report_NumberColumn13=".$report_NumberColumn13.",report_NumberColumn21=".$report_NumberColumn21.",report_NumberColumn22=".$report_NumberColumn22.",report_NumberColumn23=".$report_NumberColumn23.",report_NumberColumn32=".$report_NumberColumn32.",report_NumberColumn33=".$report_NumberColumn33.",report_NumberColumn34=".$report_NumberColumn34.",report_NumberColumn42=".$report_NumberColumn42.",report_NumberColumn43=".$report_NumberColumn43.",report_NumberColumn44=".$report_NumberColumn44.",report_step=".$step." WHERE report_id=".$report_id;
						break;
						}
						if($step==3){//音速小孔维护记录
	$report_TextColumn1 = $_POST["report_TextColumn1"]; 
	$report_TextColumn2 = $_POST["report_TextColumn2"]; 
	$report_TextColumn3 = $_POST["report_TextColumn3"]; 
	$report_TextColumn4 = $_POST["report_TextColumn4"]; 
	$report_TextColumn11 = $_POST["report_TextColumn11"]; 
	$report_NumberColumn3 = $_POST["report_NumberColumn3"]; 
	$report_NumberColumn4 = $_POST["report_NumberColumn4"]; 
	$report_NumberColumn5 = $_POST["report_NumberColumn5"]; 
	$report_NumberColumn6 = $_POST["report_NumberColumn6"]; 
	$report_NumberColumn7 = $_POST["report_NumberColumn7"]; 
	$report_NumberColumn8 = $_POST["report_NumberColumn8"]; 
	$report_NumberColumn9 = $_POST["report_NumberColumn9"]; 
	$report_NumberColumn11 = $_POST["report_NumberColumn11"]; 
	$report_NumberColumn35 = $_POST["report_NumberColumn35"]; 
	$report_NumberColumn45 = $_POST["report_NumberColumn45"]; 
	if($report_NumberColumn11){
	$report_NumberColumn21 = 0; 
	}else{
	//$report_NumberColumn21 = $_POST["report_NumberColumn21"]+1; 
	$report_NumberColumn21 = $tb_report_arr["report_NumberColumn21"];
	}
	$report_NumberColumn12 = $_POST["report_NumberColumn12"]; 
	if($report_NumberColumn12){
		$report_NumberColumn22 = 0; 
	}else{
		//$report_NumberColumn22 = $_POST["report_NumberColumn22"]+1; 
	$report_NumberColumn22 = $tb_report_arr["report_NumberColumn22"];
	}
	$report_NumberColumn13 = $_POST["report_NumberColumn13"]; 
	if($report_NumberColumn13){
		$report_NumberColumn23 = 0; 
	}else{
		//$report_NumberColumn23 = $_POST["report_NumberColumn23"]+1; 
	$report_NumberColumn23 = $tb_report_arr["report_NumberColumn23"];
	}
	$report_NumberColumn32 = $_POST["report_NumberColumn32"]; 
	if($report_NumberColumn32){
		$report_NumberColumn42 = 0; 
	}else{
		//$report_NumberColumn24 = $_POST["report_NumberColumn24"]+1; 
	$report_NumberColumn42 = $tb_report_arr["report_NumberColumn42"];
	}
	$report_NumberColumn33 = $_POST["report_NumberColumn33"]; 
	if($report_NumberColumn33){
		$report_NumberColumn43 = 0; 
	}else{
	//	$report_NumberColumn25 = $_POST["report_NumberColumn25"]+1; 
	$report_NumberColumn43 = $tb_report_arr["report_NumberColumn43"];
	}
	$report_NumberColumn34 = $_POST["report_NumberColumn34"]; 
	if($report_NumberColumn34){
		$report_NumberColumn44 = 0; 
	}else{
	//	$report_NumberColumn25 = $_POST["report_NumberColumn25"]+1; 
	$report_NumberColumn44 = $tb_report_arr["report_NumberColumn44"];
	}
	$report_NumberColumn14 = $_POST["report_NumberColumn14"]; 
	if($report_NumberColumn14){
		$report_NumberColumn24 = 0; 
	}else{
		//$report_NumberColumn23 = $_POST["report_NumberColumn23"]+1; 
	$report_NumberColumn24 = $tb_report_arr["report_NumberColumn24"]+1;
	}
	$report_NumberColumn15 = $_POST["report_NumberColumn15"]; 
	if($report_NumberColumn15){
		$report_NumberColumn25 = 0; 
	}else{
		//$report_NumberColumn23 = $_POST["report_NumberColumn23"]+1; 
	$report_NumberColumn25 = $tb_report_arr["report_NumberColumn25"]+1;
	}
	$step = $step +1;
	$sqlstep = $step;
	$sql = "UPDATE tb_FeederReport SET report_TextColumn1='".$report_TextColumn1."',report_TextColumn2='".$report_TextColumn2."',report_TextColumn3='".$report_TextColumn3."',report_TextColumn4='".$report_TextColumn4."',report_TextColumn11='".$report_TextColumn11."',report_NumberColumn3=".$report_NumberColumn3.",report_NumberColumn4=".$report_NumberColumn4.",report_NumberColumn5=".$report_NumberColumn5.",report_NumberColumn6=".$report_NumberColumn6.",report_NumberColumn7=".$report_NumberColumn7.",report_NumberColumn8=".$report_NumberColumn8.",report_NumberColumn9=".$report_NumberColumn9.",report_NumberColumn11=".$report_NumberColumn11.",report_NumberColumn12=".$report_NumberColumn12.",report_NumberColumn13=".$report_NumberColumn13.",report_NumberColumn14=".$report_NumberColumn14.",report_NumberColumn15=".$report_NumberColumn15.",report_NumberColumn21=".$report_NumberColumn21.",report_NumberColumn22=".$report_NumberColumn22.",report_NumberColumn23=".$report_NumberColumn23.",report_NumberColumn24=".$report_NumberColumn24.",report_NumberColumn25=".$report_NumberColumn25.",report_NumberColumn32=".$report_NumberColumn32.",report_NumberColumn33=".$report_NumberColumn33.",report_NumberColumn34=".$report_NumberColumn34.",report_NumberColumn35=".$report_NumberColumn35.",report_NumberColumn42=".$report_NumberColumn42.",report_NumberColumn43=".$report_NumberColumn43.",report_NumberColumn44=".$report_NumberColumn44.",report_NumberColumn45=".$report_NumberColumn45.",report_step=".$step." WHERE report_id=".$report_id;
						break;
						}
						if($step==4){//采样泵维护记录
	$report_TextColumn1 = $_POST["report_TextColumn1"]; 
	$report_TextColumn2 = $_POST["report_TextColumn2"]; 
	$report_TextColumn3 = $_POST["report_TextColumn3"]; 
	$report_TextColumn4 = $_POST["report_TextColumn4"]; 
	$report_TextColumn11 = $_POST["report_TextColumn11"]; 
	$report_TextColumn12 = $_POST["report_TextColumn12"]; 
	$report_TextColumn13 = $_POST["report_TextColumn13"]; 
	$report_NumberColumn3 = $_POST["report_NumberColumn3"]; 
	$report_NumberColumn4 = $_POST["report_NumberColumn4"]; 
	$report_NumberColumn5 = $_POST["report_NumberColumn5"]; 
	$report_NumberColumn6 = $_POST["report_NumberColumn6"]; 
	$report_NumberColumn7 = $_POST["report_NumberColumn7"]; 
	$report_NumberColumn8 = $_POST["report_NumberColumn8"]; 
	$report_NumberColumn9 = $_POST["report_NumberColumn9"]; 
	$report_NumberColumn11 = $_POST["report_NumberColumn11"]; 
	$report_NumberColumn35 = $_POST["report_NumberColumn35"]; 
	$report_NumberColumn45 = $_POST["report_NumberColumn45"]; 
	$report_NumberColumn36 = $_POST["report_NumberColumn36"]; 
	$report_NumberColumn46 = $_POST["report_NumberColumn46"]; 
	$report_NumberColumn37 = $_POST["report_NumberColumn37"]; 
	$report_NumberColumn47 = $_POST["report_NumberColumn47"]; 
	if($report_NumberColumn11){
	$report_NumberColumn21 = 0; 
	}else{
	//$report_NumberColumn21 = $_POST["report_NumberColumn21"]+1; 
	$report_NumberColumn21 = $tb_report_arr["report_NumberColumn21"];
	}
	$report_NumberColumn12 = $_POST["report_NumberColumn12"]; 
	if($report_NumberColumn12){
		$report_NumberColumn22 = 0; 
	}else{
		//$report_NumberColumn22 = $_POST["report_NumberColumn22"]+1; 
	$report_NumberColumn22 = $tb_report_arr["report_NumberColumn22"];
	}
	$report_NumberColumn13 = $_POST["report_NumberColumn13"]; 
	if($report_NumberColumn13){
		$report_NumberColumn23 = 0; 
	}else{
		//$report_NumberColumn23 = $_POST["report_NumberColumn23"]+1; 
	$report_NumberColumn23 = $tb_report_arr["report_NumberColumn23"];
	}
	$report_NumberColumn32 = $_POST["report_NumberColumn32"]; 
	if($report_NumberColumn32){
		$report_NumberColumn42 = 0; 
	}else{
		//$report_NumberColumn24 = $_POST["report_NumberColumn24"]+1; 
	$report_NumberColumn42 = $tb_report_arr["report_NumberColumn42"];
	}
	$report_NumberColumn33 = $_POST["report_NumberColumn33"]; 
	if($report_NumberColumn33){
		$report_NumberColumn43 = 0; 
	}else{
	//	$report_NumberColumn25 = $_POST["report_NumberColumn25"]+1; 
	$report_NumberColumn43 = $tb_report_arr["report_NumberColumn43"];
	}
	$report_NumberColumn34 = $_POST["report_NumberColumn34"]; 
	if($report_NumberColumn34){
		$report_NumberColumn44 = 0; 
	}else{
	//	$report_NumberColumn25 = $_POST["report_NumberColumn25"]+1; 
	$report_NumberColumn44 = $tb_report_arr["report_NumberColumn44"];
	}
	$report_NumberColumn14 = $_POST["report_NumberColumn14"]; 
	if($report_NumberColumn14){
		$report_NumberColumn24 = 0; 
	}else{
		//$report_NumberColumn23 = $_POST["report_NumberColumn23"]+1; 
	$report_NumberColumn24 = $tb_report_arr["report_NumberColumn24"];
	}
	$report_NumberColumn15 = $_POST["report_NumberColumn15"]; 
	if($report_NumberColumn15){
		$report_NumberColumn25 = 0; 
	}else{
		//$report_NumberColumn23 = $_POST["report_NumberColumn23"]+1; 
	$report_NumberColumn25 = $tb_report_arr["report_NumberColumn25"];
	}
	$report_NumberColumn16 = $_POST["report_NumberColumn16"]; 
	if($report_NumberColumn16){
		$report_NumberColumn26 = 0; 
	}else{
		//$report_NumberColumn23 = $_POST["report_NumberColumn23"]+1; 
	$report_NumberColumn26 = $tb_report_arr["report_NumberColumn26"]+1;
	}
	$report_NumberColumn17 = $_POST["report_NumberColumn17"]; 
	if($report_NumberColumn17){
		$report_NumberColumn27 = 0; 
	}else{
		//$report_NumberColumn23 = $_POST["report_NumberColumn23"]+1; 
	$report_NumberColumn27 = $tb_report_arr["report_NumberColumn27"]+1;
	}
	$report_NumberColumn18 = $_POST["report_NumberColumn18"]; 
	if($report_NumberColumn18){
		$report_NumberColumn28 = 0; 
	}else{
		//$report_NumberColumn23 = $_POST["report_NumberColumn23"]+1; 
	$report_NumberColumn28 = $tb_report_arr["report_NumberColumn28"]+1;
	}
	$report_NumberColumn19 = $_POST["report_NumberColumn19"]; 
	if($report_NumberColumn19){
		$report_NumberColumn29 = 0; 
	}else{
		//$report_NumberColumn23 = $_POST["report_NumberColumn23"]+1; 
	$report_NumberColumn29 = $tb_report_arr["report_NumberColumn29"]+1;
	}
	$report_NumberColumn20 = $_POST["report_NumberColumn20"]; 
	if($report_NumberColumn20){
		$report_NumberColumn30 = 0; 
	}else{
		//$report_NumberColumn23 = $_POST["report_NumberColumn23"]+1; 
	$report_NumberColumn30 = $tb_report_arr["report_NumberColumn30"]+1;
	}
	$report_NumberColumn31 = $_POST["report_NumberColumn31"]; 
	if($report_NumberColumn31){
		$report_NumberColumn41 = 0; 
	}else{
		//$report_NumberColumn23 = $_POST["report_NumberColumn23"]+1; 
	$report_NumberColumn41 = $tb_report_arr["report_NumberColumn41"]+1;
	}
	$step = $step +1;
	$sqlstep = $step;
	$sql = "UPDATE tb_FeederReport SET report_TextColumn1='".$report_TextColumn1."',report_TextColumn2='".$report_TextColumn2."',report_TextColumn3='".$report_TextColumn3."',report_TextColumn4='".$report_TextColumn4."',report_TextColumn11='".$report_TextColumn11."',report_TextColumn12='".$report_TextColumn12."',report_TextColumn13='".$report_TextColumn13."',report_NumberColumn3=".$report_NumberColumn3.",report_NumberColumn4=".$report_NumberColumn4.",report_NumberColumn5=".$report_NumberColumn5.",report_NumberColumn6=".$report_NumberColumn6.",report_NumberColumn7=".$report_NumberColumn7.",report_NumberColumn8=".$report_NumberColumn8.",report_NumberColumn9=".$report_NumberColumn9.",report_NumberColumn11=".$report_NumberColumn11.",report_NumberColumn12=".$report_NumberColumn12.",report_NumberColumn13=".$report_NumberColumn13.",report_NumberColumn14=".$report_NumberColumn14.",report_NumberColumn15=".$report_NumberColumn15.",report_NumberColumn16=".$report_NumberColumn16.",report_NumberColumn17=".$report_NumberColumn17.",report_NumberColumn18=".$report_NumberColumn18.",report_NumberColumn19=".$report_NumberColumn19.",report_NumberColumn20=".$report_NumberColumn20.",report_NumberColumn21=".$report_NumberColumn21.",report_NumberColumn22=".$report_NumberColumn22.",report_NumberColumn23=".$report_NumberColumn23.",report_NumberColumn24=".$report_NumberColumn24.",report_NumberColumn25=".$report_NumberColumn25.",report_NumberColumn26=".$report_NumberColumn26.",report_NumberColumn27=".$report_NumberColumn27.",report_NumberColumn28=".$report_NumberColumn28.",report_NumberColumn29=".$report_NumberColumn29.",report_NumberColumn30=".$report_NumberColumn30.",report_NumberColumn31=".$report_NumberColumn31.",report_NumberColumn32=".$report_NumberColumn32.",report_NumberColumn33=".$report_NumberColumn33.",report_NumberColumn34=".$report_NumberColumn34.",report_NumberColumn35=".$report_NumberColumn35.",report_NumberColumn36=".$report_NumberColumn36.",report_NumberColumn37=".$report_NumberColumn37.",report_NumberColumn41=".$report_NumberColumn41.",report_NumberColumn42=".$report_NumberColumn42.",report_NumberColumn43=".$report_NumberColumn43.",report_NumberColumn44=".$report_NumberColumn44.",report_NumberColumn45=".$report_NumberColumn45.",report_NumberColumn46=".$report_NumberColumn46.",report_NumberColumn47=".$report_NumberColumn47.",report_step=".$step." WHERE report_id=".$report_id;
						break;
						}
						if($step==5){//检查后参数
	$report_TextColumn1 = $_POST["report_TextColumn1"]; 
	$report_TextColumn2 = $_POST["report_TextColumn2"]; 
	$report_TextColumn3 = $_POST["report_TextColumn3"]; 
	$report_TextColumn4 = $_POST["report_TextColumn4"]; 
	$report_TextColumn6 = $_POST["report_TextColumn6"]; 
	$report_TextColumn7 = $_POST["report_TextColumn7"]; 
	$report_TextColumn11 = $_POST["report_TextColumn11"]; 
	$report_TextColumn12 = $_POST["report_TextColumn12"]; 
	$report_TextColumn13 = $_POST["report_TextColumn13"]; 
	$report_NumberColumn1 = $_POST["report_NumberColumn1"]; 
	$report_NumberColumn2 = $_POST["report_NumberColumn2"]; 
	$report_NumberColumn3 = $_POST["report_NumberColumn3"]; 
	$report_NumberColumn4 = $_POST["report_NumberColumn4"]; 
	$report_NumberColumn5 = $_POST["report_NumberColumn5"]; 
	$report_NumberColumn6 = $_POST["report_NumberColumn6"]; 
	$report_NumberColumn7 = $_POST["report_NumberColumn7"]; 
	$report_NumberColumn8 = $_POST["report_NumberColumn8"]; 
	$report_NumberColumn9 = $_POST["report_NumberColumn9"]; 
	$report_NumberColumn10 = $_POST["report_NumberColumn10"]; 
	$report_NumberColumn11 = $_POST["report_NumberColumn11"]; 
	$report_NumberColumn35 = $_POST["report_NumberColumn35"]; 
	$report_NumberColumn45 = $_POST["report_NumberColumn45"]; 
	$report_NumberColumn36 = $_POST["report_NumberColumn36"]; 
	$report_NumberColumn46 = $_POST["report_NumberColumn46"]; 
	$report_NumberColumn37 = $_POST["report_NumberColumn37"]; 
	$report_NumberColumn47 = $_POST["report_NumberColumn47"]; 
	$report_NumberColumn38 = $_POST["report_NumberColumn38"]; 
	$report_NumberColumn39 = $_POST["report_NumberColumn39"]; 
	$report_NumberColumn40 = $_POST["report_NumberColumn40"]; 
	$report_NumberColumn48 = $_POST["report_NumberColumn48"]; 
	if($report_NumberColumn11){
	$report_NumberColumn21 = 0; 
	}else{
	//$report_NumberColumn21 = $_POST["report_NumberColumn21"]+1; 
	$report_NumberColumn21 = $tb_report_arr["report_NumberColumn21"];
	}
	$report_NumberColumn12 = $_POST["report_NumberColumn12"]; 
	if($report_NumberColumn12){
		$report_NumberColumn22 = 0; 
	}else{
		//$report_NumberColumn22 = $_POST["report_NumberColumn22"]+1; 
	$report_NumberColumn22 = $tb_report_arr["report_NumberColumn22"];
	}
	$report_NumberColumn13 = $_POST["report_NumberColumn13"]; 
	if($report_NumberColumn13){
		$report_NumberColumn23 = 0; 
	}else{
		//$report_NumberColumn23 = $_POST["report_NumberColumn23"]+1; 
	$report_NumberColumn23 = $tb_report_arr["report_NumberColumn23"];
	}
	$report_NumberColumn32 = $_POST["report_NumberColumn32"]; 
	if($report_NumberColumn32){
		$report_NumberColumn42 = 0; 
	}else{
		//$report_NumberColumn24 = $_POST["report_NumberColumn24"]+1; 
	$report_NumberColumn42 = $tb_report_arr["report_NumberColumn42"];
	}
	$report_NumberColumn33 = $_POST["report_NumberColumn33"]; 
	if($report_NumberColumn33){
		$report_NumberColumn43 = 0; 
	}else{
	//	$report_NumberColumn25 = $_POST["report_NumberColumn25"]+1; 
	$report_NumberColumn43 = $tb_report_arr["report_NumberColumn43"];
	}
	$report_NumberColumn34 = $_POST["report_NumberColumn34"]; 
	if($report_NumberColumn34){
		$report_NumberColumn44 = 0; 
	}else{
	//	$report_NumberColumn25 = $_POST["report_NumberColumn25"]+1; 
	$report_NumberColumn44 = $tb_report_arr["report_NumberColumn44"];
	}
	$report_NumberColumn14 = $_POST["report_NumberColumn14"]; 
	if($report_NumberColumn14){
		$report_NumberColumn24 = 0; 
	}else{
		//$report_NumberColumn23 = $_POST["report_NumberColumn23"]+1; 
	$report_NumberColumn24 = $tb_report_arr["report_NumberColumn24"];
	}
	$report_NumberColumn15 = $_POST["report_NumberColumn15"]; 
	if($report_NumberColumn15){
		$report_NumberColumn25 = 0; 
	}else{
		//$report_NumberColumn23 = $_POST["report_NumberColumn23"]+1; 
	$report_NumberColumn25 = $tb_report_arr["report_NumberColumn25"];
	}
	$report_NumberColumn16 = $_POST["report_NumberColumn16"]; 
	if($report_NumberColumn16){
		$report_NumberColumn26 = 0; 
	}else{
		//$report_NumberColumn23 = $_POST["report_NumberColumn23"]+1; 
	$report_NumberColumn26 = $tb_report_arr["report_NumberColumn26"];
	}
	$report_NumberColumn17 = $_POST["report_NumberColumn17"]; 
	if($report_NumberColumn17){
		$report_NumberColumn27 = 0; 
	}else{
		//$report_NumberColumn23 = $_POST["report_NumberColumn23"]+1; 
	$report_NumberColumn27 = $tb_report_arr["report_NumberColumn27"];
	}
	$report_NumberColumn18 = $_POST["report_NumberColumn18"]; 
	if($report_NumberColumn18){
		$report_NumberColumn28 = 0; 
	}else{
		//$report_NumberColumn23 = $_POST["report_NumberColumn23"]+1; 
	$report_NumberColumn28 = $tb_report_arr["report_NumberColumn28"];
	}
	$report_NumberColumn19 = $_POST["report_NumberColumn19"]; 
	if($report_NumberColumn19){
		$report_NumberColumn29 = 0; 
	}else{
		//$report_NumberColumn23 = $_POST["report_NumberColumn23"]+1; 
	$report_NumberColumn29 = $tb_report_arr["report_NumberColumn29"];
	}
	$report_NumberColumn20 = $_POST["report_NumberColumn20"]; 
	if($report_NumberColumn20){
		$report_NumberColumn30 = 0; 
	}else{
		//$report_NumberColumn23 = $_POST["report_NumberColumn23"]+1; 
	$report_NumberColumn30 = $tb_report_arr["report_NumberColumn30"];
	}
	$report_NumberColumn31 = $_POST["report_NumberColumn31"]; 
	if($report_NumberColumn31){
		$report_NumberColumn41 = 0; 
	}else{
		//$report_NumberColumn23 = $_POST["report_NumberColumn23"]+1; 
	$report_NumberColumn41 = $tb_report_arr["report_NumberColumn41"];
	}
	$calibra = $_POST["calibra_people"]; 
	$checkp = $_POST["check_people"]; 
        		$time = date("Y-m-d");
	$step = 0;
	$sqlstep = $step;
	$sql = "UPDATE tb_FeederReport SET report_TextColumn1='".$report_TextColumn1."',report_TextColumn2='".$report_TextColumn2."',report_TextColumn3='".$report_TextColumn3."',report_TextColumn4='".$report_TextColumn4."',report_TextColumn6='".$report_TextColumn6."',report_TextColumn7='".$report_TextColumn7."',report_TextColumn11='".$report_TextColumn11."',report_TextColumn12='".$report_TextColumn12."',report_TextColumn13='".$report_TextColumn13."',report_NumberColumn1=".$report_NumberColumn1.",report_NumberColumn2=".$report_NumberColumn2.",report_NumberColumn3=".$report_NumberColumn3.",report_NumberColumn4=".$report_NumberColumn4.",report_NumberColumn5=".$report_NumberColumn5.",report_NumberColumn6=".$report_NumberColumn6.",report_NumberColumn7=".$report_NumberColumn7.",report_NumberColumn8=".$report_NumberColumn8.",report_NumberColumn9=".$report_NumberColumn9.",report_NumberColumn10=".$report_NumberColumn10.",report_NumberColumn11=".$report_NumberColumn11.",report_NumberColumn12=".$report_NumberColumn12.",report_NumberColumn13=".$report_NumberColumn13.",report_NumberColumn14=".$report_NumberColumn14.",report_NumberColumn15=".$report_NumberColumn15.",report_NumberColumn16=".$report_NumberColumn16.",report_NumberColumn17=".$report_NumberColumn17.",report_NumberColumn18=".$report_NumberColumn18.",report_NumberColumn19=".$report_NumberColumn19.",report_NumberColumn20=".$report_NumberColumn20.",report_NumberColumn21=".$report_NumberColumn21.",report_NumberColumn22=".$report_NumberColumn22.",report_NumberColumn23=".$report_NumberColumn23.",report_NumberColumn24=".$report_NumberColumn24.",report_NumberColumn25=".$report_NumberColumn25.",report_NumberColumn26=".$report_NumberColumn26.",report_NumberColumn27=".$report_NumberColumn27.",report_NumberColumn28=".$report_NumberColumn28.",report_NumberColumn29=".$report_NumberColumn29.",report_NumberColumn30=".$report_NumberColumn30.",report_NumberColumn31=".$report_NumberColumn31.",report_NumberColumn32=".$report_NumberColumn32.",report_NumberColumn33=".$report_NumberColumn33.",report_NumberColumn34=".$report_NumberColumn34.",report_NumberColumn35=".$report_NumberColumn35.",report_NumberColumn36=".$report_NumberColumn36.",report_NumberColumn37=".$report_NumberColumn37.",report_NumberColumn38=".$report_NumberColumn38.",report_NumberColumn39=".$report_NumberColumn39.",report_NumberColumn40=".$report_NumberColumn40.",report_NumberColumn41=".$report_NumberColumn41.",report_NumberColumn42=".$report_NumberColumn42.",report_NumberColumn43=".$report_NumberColumn43.",report_NumberColumn44=".$report_NumberColumn44.",report_NumberColumn45=".$report_NumberColumn45.",report_NumberColumn46=".$report_NumberColumn46.",report_NumberColumn47=".$report_NumberColumn47.",report_NumberColumn48=".$report_NumberColumn48.",report_step=".$step.",calibra=".$calibra.",checkp=".$checkp.",report_date='".$time."' WHERE report_id=".$report_id;
						break;
						}
					default:
						echo "flag不存在";
					}
	echo "$sql";
	if(mysqli_query($conn,$sql)){
	//	echo "插入成功";	
	mysqli_close($conn);
	if($flag>2&&$sqlstep!=0){
        //                echo "<script>alert('添加成功！！');location='edit_content.php?id=18'</script>";
                        echo "<script>alert('添加成功！！');location='edit_content.php?id=".$report_id."'</script>";
	}else{
                        echo "<script>alert('添加成功！！');location='report.php'</script>";
	}
	}else{
                echo "<script>alert('添加失败！！');</script>";
		echo "插入失败:". mysqli_error($conn);
	mysqli_close($conn);
	}
	
		}
		?>
<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->
		<div class="header">
			<h1>热控班组管理平台</h1>
		</div>
		<div class="topnav">
			<?php include("../../lib/topnav/topnav.php") ?>
		</div>
		<div class="row">
			<div class="leftcolumn">
				<div class="card">
					<h2><center>编辑校验记录<center></h2>
					<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						<?php
						include_once("../../lib/class/Report.class.php");
						$document_obj = new Report;
						$document_obj->editReport($_GET['id']);//检索栏
						?>
                                        	<input type="submit"style='width:100%' value="保存"/>
					</form>
				</div>
			</div>
			<div class="rightcolumn">
				<div class="card">
					<ul class="right">
						<li><a href="../standard/standard.php">系统资料</a></li>
						<li><a class="active" href="#">文件清单</a></li>
						<li><a href="../upload_file/upload.php">文件上传</a></li>
					</ul>
				</div>
</body>
</html>
