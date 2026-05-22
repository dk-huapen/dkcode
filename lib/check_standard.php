<?php
header('Content-type:text/html;charset=utf-8');
include('conn.php');
$id = $_GET['id'];
		$sql = "SELECT standard_job_id,standard_job_content FROM tb_standard_jobs WHERE standard_job_type=".$id;
//$sql = "select * from db_info where pid=".$id;
//	$re = mysql_query($sql);
//	while($arr = mysql_fetch_assoc($re)){
		$re = mysqli_query($conn, $sql);
	$arr_all = array();
		while($arr=mysqli_fetch_assoc($re)){
		$arr_all[] = implode('@',$arr);
	}
	echo implode('#',$arr_all);
?>
