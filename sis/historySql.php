<?php
	$begin_time=$_GET['begin_time'];
	$end_time=$_GET['end_time'];
	$kks=$_GET['kks'];
	$con = mysqli_connect("192.168.1.120","opcuasis","opcuasis","abbhistory");
	if(!$con){
		die("连接失败". mysqli_connect_error());
	}else
	{ 
		//echo"连接成功";
	}
	mysqli_query($con, "set names utf8");
	$sql="SELECT time,value FROM ".$kks." where time between '".$begin_time."' and '".$end_time."'";

	$result = mysqli_query($con,$sql);

	$outp = mysqli_fetch_all($result,MYSQLI_NUM);

	mysqli_close($con);
	echo json_encode($outp);
?>
