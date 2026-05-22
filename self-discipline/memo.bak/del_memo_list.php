<?php
		include_once('../sql/conn.php');
	if($_GET['id']){
		$sql = 'delete from tb_memo where memo_id = '.$_GET['id'];
		//$sql = "delete from db_shop where id = ".$_GET['id'];
                        }
	
	$num=mysqli_query($conn,$sql);
	if($num>0){
	//	echo "插入成功";	
                        echo "<script>alert('删除成功！！');location='memo.php'</script>";
	}else{
                echo "<script>alert('删除失败！！');</script>";
		echo "删除失败:". mysqli_error($conn);
	}
	
	mysqli_close($conn);

?>

