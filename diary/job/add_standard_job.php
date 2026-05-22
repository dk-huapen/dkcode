<html>
	<head>
		<?php include("header.php") ?>
		<script type="text/javascript" src='../../lib/com.js'> </script>
	</head>
	<body>
<!------------------------------------------------------------------------------表单验证-------------------------------------------------------------------------------->
		<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST"){
	include_once('../../lib/conn.php');
//获取add_job.php传递过来的数据
	$job_system = $_POST["job_system"]; 
	$job_area = $_POST["job_area"]; 
	$analysis_id = $_POST["analysis_id"];
//		$tb_standard_job_sql = "SELECT * FROM `tb_standard_jobs` WHERE standard_job_id = ".$_POST["job_content"];
//		$tb_standard_job_result = mysqli_query($conn, $tb_standard_job_sql);
//		$tb_standard_job_arr=mysqli_fetch_assoc($tb_standard_job_result);
	//$job_content = $_POST["job_content"]; 
	$job_content = $_POST['job_content']; 
	$job_header = $_POST["job_header"]; 
	$job_people = $_POST["job_people"]; 
	$job_status = $_POST["job_status"]; 
	$job_notes = $_POST["job_notes"]; 
	$job_type = $_POST["job_type"]; 
	$diary_id = $_POST["diary_id"]; 
	//$job_work_ticket_id = $_POST["job_work_ticket_id"]; 
	$job_work_ticket_id = -1; 
	//$job_deadtime = $_POST["job_deadtime"]; 
	if(empty($_POST["job_deadtime"])){
		$job_deadtime = "0000-00-00"; 
	}else{
		$job_deadtime = $_POST["job_deadtime"]; 
	}
	$job_remarks = $_POST["job_remarks"]; 
//向tb_jobs数据库插入一条工作记录
	$sql = "INSERT INTO tb_jobs(job_content,job_header,job_people,job_status,job_notes,job_type,diary_id,job_deadtime,job_area,job_system,job_work_ticket_id,job_remarks,analysis_id) VALUES ('$job_content','$job_header','$job_people','$job_status','$job_notes','$job_type','$diary_id','$job_deadtime','$job_area','$job_system','$job_work_ticket_id','$job_remarks',$analysis_id)";
	echo $sql;
	if(mysqli_query($conn,$sql)){
	//	echo "插入成功";	
	mysqli_close($conn);
                        echo "<script>alert('添加成功！！');location='job.php'</script>";
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
					<h2><center>添加标准工作<center></h2>
						<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						<form action="insert_standard_job.php" method="post">
							<?php
							include_once("../../lib/class/Job.class.php");
							$job_obj = new Job;
							$job_obj->addStandardJob();
							?>
                                        		<input type="submit" style="width:100%" value="保存"/>
						</form>
				</div>
				<div class="card">
					<input onclick="showBox('hidden_box')" type="button" value="点我显示/或隐藏缺陷分析"></input>
					<div id="hidden_box" style="display:none">
						<table id="goodstable" border='1' cellpadding=0 cellspacing=1 bgcolor="#cccccc" width='1000px'>
							<tr height='30px'><th>质量要求（标准）</th><th>设备清单</th></tr>
							<tbody id='tbs'>
								<tr height="24" align="center" bgcolor="#eeeeee">
								<td>质量要求（标准）</td>
								<td>设备清单</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="rightcolumn">
				<div class="card">
				<ul class="right">
<li><a  href='./edit_content.php'>查看</a></li>
<li><a class="active" href='#'>编辑</a></li>
</ul>
				</div>
			</div>
		</div>
		<div class="footer">
			<?php include("../../lib/footer/footer.php")?>
		</div>
</body>
</html>
