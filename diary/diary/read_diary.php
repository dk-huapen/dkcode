<?php
	//echo $_POST['seek_diary_id'];
	if(file_exists(("./log/".$_POST['seek_diary_id'].".pdf"))){
    	echo "<script>alert('查询到".$_POST['seek_diary_id']."日志！！');location='log/".$_POST['seek_diary_id'].".pdf'</script>";
	}else{
    	echo "<script>alert('未查询到".$_POST['seek_diary_id']."日志！！');location='../diary.php'</script>";
	}
?>
