<?php
		if(!empty($_GET['submit'])){
			$work_ticket_id = $_POST["work_ticket_id"]; 
			$work_ticket_number = $_POST["work_ticket_number"]; 
			$path="tmp/";//上传路径
			if(!file_exists($path)){
				mkdir("$path",0700);
			}
			$tp = array("image/gif","image/pjpeg","image/png","image/jpeg");
			if(!in_array($_FILES["filename"]["type"],$tp)){
				echo $_FILES["filename"]["type"];
				echo "图片格式不对";
				exit();
			}
			if($_FILES["filename"]["size"]>(2048*1000)){
				echo "不能上传大于2m的文件";
				exit();
			}
			if($_FILES["filename"]["name"]){
				$file1=explode('.',$_FILES["filename"]["name"]);
				$kz = $file1[(count($file1)-1)];
				$time = time();
				$name = $work_ticket_number.".".$kz;
				$file2 = $path.$name;
				$flag = 1;
				echo $file2;
			}
			if($flag){
				$result=move_uploaded_file($_FILES["filename"]["tmp_name"],$file2);
			}
			if($result){
				echo "<script>alert('上传成功');location='edit_work_ticket.php?id=".$work_ticket_id."';</script>";
//				echo "图片名称：".$name."<br>";
//				echo "<center>预览：<br></center><center><img src='".$file2."'></center>";
			}else{
				echo "<script>alert('文件为空');</script>";
			}
		}
		
?>
