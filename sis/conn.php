<?php
	#$con = mysqli_connect('localhost','root','dk1314lich,forever!','opcuasis');
	$con = mysqli_connect("192.168.1.120","opcuasis","opcuasis","opcuasis");
	if(!$con){
		die("连接失败". mysqli_connect_error());
	}else
	{ 
		//echo"连接成功";
	}
	mysqli_query($con, "set names utf8");
?>
