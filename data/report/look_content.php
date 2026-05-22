<html>
	<head>
		<?php include("header.php") ?>
	</head>
	<body>
<!------------------------------------------------------------------------------表单验证-------------------------------------------------------------------------------->
		<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST"){
	include_once('../../lib/conn.php');
	$report_id = $_POST["report_id"]; 
	$report_TextColumn1 = $_POST["report_TextColumn1"]; 
	$report_NumberColumn1 = $_POST["report_NumberColumn1"]; 
	$report_NumberColumn2 = $_POST["report_NumberColumn2"]; 
	$sql = "UPDATE tb_FeederReport SET report_TextColumn1='".$report_TextColumn1."',report_NumberColumn1='".$report_NumberColumn1."'WHERE report_id=".$report_id;
	echo "$sql";
	if(mysqli_query($conn,$sql)){
	//	echo "插入成功";	
	mysqli_close($conn);
                        echo "<script>alert('添加成功！！');location='report.php'</script>";
	}else{
                echo "<script>alert('添加失败！！');</script>";
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
					<h2><center>查看校验记录<center></h2>
						<?php
						include_once("../../lib/class/Report.class.php");
						$document_obj = new Report;
						$reportId = $_GET['id'];
						$document_obj->lookReport($_GET['id']);//检索栏
						echo "<center><a href='../../lib/fpdf/preview_report.php?id=".$reportId."' target='_blank'>预览当天日志</a></center>";
						?>
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
</body>
</html>
