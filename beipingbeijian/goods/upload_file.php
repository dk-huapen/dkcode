<?php
		if(!empty($_GET['submit'])){
			$work_ticket_id = $_POST["work_ticket_id"]; 
			$work_ticket_number = $_POST["work_ticket_number"]; 
			$goodsImgDir = $_SERVER['DOCUMENT_ROOT']."/my_data/image/goodsImg/";
			$path=$goodsImgDir;//上传路径
			if(!file_exists($path)){
				mkdir("$path",0700);
			}
			$tp = array("image/gif","image/pjpeg","image/png","image/jpeg","image/webp");
			if(!in_array($_FILES["filename"]["type"],$tp)){
				echo $_FILES["filename"]["type"];
				echo "图片格式不对";
				exit();
			}
			if($_FILES["filename"]["size"]>(4096*1000)){
				echo "不能上传大于4M的文件";
				exit();
			}
			if($_FILES["filename"]["name"]){
			$file_path=$goodsImgDir.$work_ticket_number;
			if(!file_exists($file_path)){
				if(mkdir("$file_path")){
					echo $file_path."文件夹创建成功";
				}
			}
				$file1=explode('.',$_FILES["filename"]["name"]);
				$kz = $file1[(count($file1)-1)];
				$time = time();
				$name = $work_ticket_number.".".$kz;
				$file2 = $file_path."/".$name;
				$file3 = $file_path."/".$work_ticket_number."_dnt.webp";
				$flag = 1;
				echo $file2;
			}
			if($flag){
				$result=move_uploaded_file($_FILES["filename"]["tmp_name"],$file2);
			}
			if($result){
				exec("/usr/local/imagemagick/bin/convert $file2 $file3");
				exec("/usr/local/imagemagick/bin/convert -sample 768x1024 $file3 $file3");
				exec("/usr/local/imagemagick/bin/convert -fill red -pointsize 60 -draw 'text 300,80 \"dklovelich\"' $file3 $file3");
				echo "<script>alert('上传成功');location='edit_content.php?id=".$work_ticket_id."';</script>";
//				echo "图片名称：".$name."<br>";
//				echo "<center>预览：<br></center><center><img src='".$file2."'></center>";
			}else{
				echo "<script>alert('文件为空');</script>";
			}
		}
		
?>
