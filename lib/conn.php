<?php
	#$conn = mysqli_connect("localhost","root","dk1314lich,forever!","db_rekong");
	$conn = mysqli_connect("192.168.1.120","opcuasis","opcuasis","db_rekong");
	if(!$conn){
		die("连接失败". mysqli_connect_error());
	}else
	{ 
		//echo"连接成功";
	}
	mysqli_query($conn, "set names utf8");
?>
