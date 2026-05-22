<html>
	<head>
		<?php include("header.php") ?>
	</head>
	<body>
<!------------------------------------------------------------------------------表单验证-------------------------------------------------------------------------------->
		<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST"){
	include_once('../../lib/conn.php');
//获取add_job.php传递过来的数据
	$job_system = $_POST["job_system"]; 
	$job_area = $_POST["job_area"]; 
	$job_content = $_POST["job_content"]; 
	$job_header = $_POST["job_header"]; 
	$job_people = $_POST["job_people"]; 
	$job_status = $_POST["job_status"]; 
	$job_notes = $_POST["job_notes"]; 
	$job_type = $_POST["job_type"]; 
	$diary_id = $_POST["diary_id"]; 
	$job_remarks = $_POST["job_remarks"]; 
	if(empty($_POST["job_deadtime"])){
		$job_deadtime = "0000-00-00"; 
	}else{
		$job_deadtime = $_POST["job_deadtime"]; 
	}
	$sql = "INSERT INTO tb_jobs(job_content,job_header,job_people,job_status,job_notes,job_type,diary_id,job_deadtime,job_area,job_system,job_remarks) VALUES ('$job_content','$job_header','$job_people','$job_status','$job_notes','$job_type','$diary_id','$job_deadtime','$job_area','$job_system','$job_remarks')";
	if(mysqli_query($conn,$sql)){
	//	echo "插入成功";	
                        echo "<script>alert('添加成功！！');location='job.php'</script>";
	}else{
                echo "<script>alert('添加失败！！');</script>";
		echo "插入失败:". mysqli_error($conn);
	}
	
	mysqli_close($conn);
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
					<h2><center>添加工作<center></h2>
					<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						<?php
						include_once("../../lib/class/Job.class.php");
						$job_obj = new Job;
						$job_obj->addJob();
						?>
                                        	<input type="submit" style="width:100%" value="保存"/>
					</form>
				</div>
			</div>
			<div class="rightcolumn">
				<div class="card">
					<ul class="right">
						<li><a  href='./edit_content.php'>查看</a></li>
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
