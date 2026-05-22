<html>
	<head>
		<?php include("header.php") ?>
	</head>
	<body>
<!------------------------------------------------------------------------------表单验证-------------------------------------------------------------------------------->
		<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST"){
	include_once('../../lib/conn.php');
//获取edit_job.php传递过来的数据
	$instruction_id = $_POST["instruction_id"]; 
	$instruction_name = $_POST["instruction_name"]; 
	$instruction_system = $_POST["instruction_system"]; 
	$instruction_type = $_POST["instruction_type"]; 
	$instruction_remarks = $_POST["instruction_remarks"]; 
	$instruction_dir = $_POST["instruction_dir"]; 
//	echo $_POST["path"];
	$sql = "UPDATE tb_instruction SET instruction_name='".$instruction_name."',instruction_system='".$instruction_system."',instruction_type='".$instruction_type."',instruction_remarks='".$instruction_remarks."',instruction_dir='".$instruction_dir."' WHERE instruction_id=".$instruction_id;
	echo "$sql";
	$num=mysqli_query($conn,$sql);
	if($num>0){
	//	echo "插入成功";	
	mysqli_close($conn);
                        echo "<script>alert('更新成功！！');location='instruction.php'</script>";
	}else{
                echo "<script>alert('更新失败！！');</script>";
		echo "插入失败:". mysqli_error($conn);
	mysqli_close($conn);
	}
	
		}
		?>
<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->
		<div class="header">
			<h1>热控班组管理平台</h1>
		</div>
		<div class="topnav">
			<?php include("../../lib/topnav/topnav.php") ?>
		</div>
		<div class="row">
			<div class="leftcolumn">
				<div class="card">
					<h2><center>编辑设备台账详细<center></h2>
					<form method="post" action="<?php echo htmlspecialchars(base_url($_SERVER["PHP_SELF"]));?>">
						<?php
						include_once("../../lib/class/Document.class.php");
						$document_obj = new Document;
						$document_obj->editDocument($_GET['id']);//
						?>
                                        	<input type="submit"style='width:100%' value="保存"></input>
					</form>

				</div>
			</div>
			<div class="rightcolumn">
				<div class="card">
					<ul class="right">
						<li><a href="../standard/standard.php">系统资料</a></li>
						<li><a class="active" href="#">文件清单</a></li>
						<li><a href="../upload_file/upload.php">文件上传</a></li>
					</ul>
				</div>
				<div class="card">
				<!--最新通知-->
					<?php include("../../sidebar/notice.php")?>
				</div>
				<div class="card">
				<!--最新资讯-->
					<?php include("../../sidebar/news.php")?>
				</div>
			</div>
		<div class="footer">
			<?php include("../../lib/footer/footer.php")?>
		</div>

</body>
</html>
