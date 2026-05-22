<?php
header("Content-type:text/html;charset=utf-8");
$begin_time=$_GET['begin_time'];
$end_time=$_GET['end_time'];
$sys1=$_GET['SYS1'];
$kks1=$_GET['KKS1'];
$kks2=$_GET['KKS2'];
$kks3=$_GET['KKS3'];
$kks4=$_GET['KKS4'];
	if((empty($kks1))&&(empty($kks2))&&(empty($kks3))&&(empty($kks4))){
		$outp = '';
	}else{

		$conn = mysqli_connect("localhost","root","dk1314lich,forever!","tanhecha");
		if(!$conn){
			die("连接失败". mysqli_connect_error());
		}else { 
		//echo"连接成功";
		}
		mysqli_query($conn, "set names utf8");
 		$tb_dygraphs_sql = "SELECT `HTime`";
		if(!empty($kks1)){
 		$tb_dygraphs_sql = $tb_dygraphs_sql.",`".$kks1."`"; 
		}
		if(!empty($kks2)){
 		$tb_dygraphs_sql = $tb_dygraphs_sql.",`".$kks2."`"; 
		}
		if(!empty($kks3)){
 		$tb_dygraphs_sql = $tb_dygraphs_sql.",`".$kks3."`";
		}
		if(!empty($kks4)){
 		$tb_dygraphs_sql = $tb_dygraphs_sql.",`".$kks4."`";
		}
 		$tb_dygraphs_sql = $tb_dygraphs_sql." FROM "; 
 		$tb_dygraphs_sql = $tb_dygraphs_sql."`".$sys1."` WHERE `HTime` BETWEEN '".$begin_time."' AND '".$end_time."'"; 
		$re = mysqli_query($conn, $tb_dygraphs_sql);
		$outp = mysqli_fetch_all($re,MYSQLI_NUM);
	}
echo json_encode($outp);
?>
