<?php
header('Content-type:text/html;charset=utf-8');
include('conn.php');
$id = $_GET['id'];
		$sql = "SELECT work_ticket_content FROM tb_work_ticket WHERE work_ticket_id=".$id;
//$sql = "select * from db_info where pid=".$id;
//	$re = mysql_query($sql);
//	while($arr = mysql_fetch_assoc($re)){
		$re = mysqli_query($conn, $sql);
		$arr=mysqli_fetch_assoc($re);
		$arr_all[] = implode('@',$arr);
		echo implode('#',$arr_all);
	//	echo $arr[0];
?>
