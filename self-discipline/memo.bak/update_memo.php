<?php
		include_once('../sql/conn.php');
	date_default_timezone_set('PRC');
        $time = date("Y-m-d H:i:s");
	$timee = $time; 
//获取add_job.php传递过来的数据
	$memo_id =$_POST["memo_id"];
	$memo_content = $_POST["memo_content"]; 
	$memo_status = $_POST["memo_status"]; 
	$memo_details = $_POST["memo_details"]; 
	$memo_type = $_POST["memo_type"]; 
	$memo_update_time = $timee;; 
	//$memo_update_time = $_POST["memo_update_time"]; 
//向tb_jobs数据库插入一条工作记录
	//$sql = "INSERT INTO tb_memo(memo_content,memo_status,memo_details,memo_type,memo_update_time) VALUES ('$memo_content','$memo_status','$memo_details','$memo_type','$memo_update_time')";
	$sql = "UPDATE tb_memo SET memo_content='".$memo_content."',memo_status='".$memo_status."',memo_details='".$memo_details."',memo_type='".$memo_type."',memo_update_time='".$memo_update_time."' WHERE memo_id=".$memo_id;
	if(mysqli_query($conn,$sql)){
	//	echo "插入成功";	
                        echo "<script>alert('更新成功！！');location='memo.php'</script>";
	}else{
                echo "<script>alert('添加失败！！');</script>";
		echo "插入失败:". mysqli_error($conn);
	}
	
	mysqli_close($conn);
?>

