<?php
	include_once('../lib/conn.php');
	$news=$_POST['news'];
//	echo $_POST['save'];
	$sql_text = "UPDATE tb_text SET text4='".$news."'WHERE text_id = 1";
	if(mysqli_query($conn,$sql_text)){
                        echo "<script>location='../diary/diary.php';</script>";
	}else{
                echo "<script>alert('添加失败！！');</script>";
		echo "插入失败:". mysqli_error($conn);
	}
?>
