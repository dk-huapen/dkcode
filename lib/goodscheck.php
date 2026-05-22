<?php
header('Content-type:text/html;charset=utf-8');
include('conn.php');
$id = $_GET['id'];
		$sql = "SELECT * FROM tb_goods WHERE goods_id=".$id;
		$re = mysqli_query($conn, $sql);
		$arr=mysqli_fetch_assoc($re);
//$sql = "select * from db_info where pid=".$id;
	//	$arr="enen";	
//		$arr_all = array();
//		$arr_all[] = implode('@',$arr);
		echo implode('@',$arr);
?>
