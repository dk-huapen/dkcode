<?php
header('Content-type:text/html;charset=utf-8');
include('conn.php');
$arr=$_POST['name'];
		$sql_text = "UPDATE tb_text SET text4='".$arr."' WHERE text_id = 1";
		if(mysqli_query($conn,$sql_text)){
			echo date('Y-m-d h:i:s A');
		}else{
			echo "发布失败！";
		}
?>
