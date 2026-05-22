<?php
	include_once('../conn.php');
	date_default_timezone_set('PRC');
        $time = date("Y-m-d H:i:s");
	$timee = $time; 
	//$time = "2018-07-06 00:00:00";
	if($_GET['id']){
		$sql = 'delete from tb_account where account_id = '.$_GET['id'];
		//$sql = "delete from db_shop where id = ".$_GET['id'];
                        }
	
	$num=mysqli_query($conn,$sql);
	if($num>0){
	//	echo "插入成功";	
                        echo "<script>alert('删除成功！！');location='ceshi.php'</script>";
	}else{
                echo "<script>alert('删除失败！！');</script>";
		echo "删除失败:". mysqli_error($conn);
	}
	
	mysqli_close($conn);

?>

