<html>
	<head>
		<title>班组日志</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="../../diary_css/my_diary.css" />
	</head>
	<body>
<!------------------------------------------------------------------------------表单验证-------------------------------------------------------------------------------->
		<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST"){
	include_once('../../lib/conn.php');
//获取add_job.php传递过来的数据
	//$analysis_id = $_POST["analysis_id"]; 
	$analysis_content = $_POST["analysis_content"]; 
	$analysis_header = $_POST["analysis_header"]; 
	$analysis_process = $_POST["analysis_process"]; 
	$analysis_reason = $_POST["analysis_reason"]; 
	$analysis_result = $_POST["analysis_result"]; 
	$analysis_remarks = $_POST["analysis_remarks"]; 
	$analysis_status = $_POST["analysis_status"]; 
//向tb_jobs数据库插入一条工作记录
	$sql = "INSERT INTO tb_analysis(analysis_content,analysis_header,analysis_process,analysis_reason,analysis_result,analysis_status,analysis_remarks) VALUES ('$analysis_content','$analysis_header','$analysis_process','$analysis_reason','$analysis_result','$analysis_status','$analysis_remarks')";
	echo $sql;
	if(mysqli_query($conn,$sql)){
	mysqli_close($conn);
	//	echo "插入成功";	
                        echo "<script>alert('添加成功！！');location='analysis.php'</script>";
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
					<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						<?php
						$analysisId = $_GET['id'];
						include_once("../../lib/class/Analysis.class.php");
						$analysis_obj = new Analysis;
						$analysis_obj->addAnalysis();//检索栏
						?>
                                        	<input type="submit"style="width:100%" value="保存"/>
					</form>
				</div>
			</div>
			<div class="rightcolumn">
				<div class="card">
					<ul class="right">
					<li><a href='look_content.php?id=<?php echo $analysisId ?>'>查看</a></li>
					<li><a class="active" href='#'>编辑</a></li>
					</ul>
				</div>
				<div class="card">
					<?php include("../../sidebar/quick_index.php") ?>
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
		</div>
		<div class="footer">
			<?php include("../../lib/footer/footer.php")?>
		</div>

</body>
</html>
