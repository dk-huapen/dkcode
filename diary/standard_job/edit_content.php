<html>
	<head>
		<title>班组日志</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="../../diary_css/my_diary.css" />
		<script type="text/javascript" src='../../lib/page.js'> </script>
		<script type="text/javascript" src='../../lib/com.js'> </script>
	</head>
	<body>
<!------------------------------------------------------------------------------表单验证-------------------------------------------------------------------------------->
		<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST"){
	include_once('../../lib/conn.php');
//获取add_job.php传递过来的数据
	$standard_job_id = $_POST["standard_job_id"]; 
	$standard_job_device = $_POST["standard_job_device"]; 
	$standard_job_equipment_name = $_POST["standard_job_equipment_name"]; 
	$standard_job_remarks = $_POST["standard_job_remarks"]; 
	$standard_job_cycle = $_POST["standard_job_cycle"]; 
	$standard_job_system = $_POST["standard_job_system"]; 
	$standard_job_content = $_POST["standard_job_content"]; 
	$standard_job_cycle_unit = $_POST["standard_job_cycle_unit"]; 
	$standard_job_type = $_POST["standard_job_type"]; 

	$standard_job_arry = $_POST["standard_job_arry"]; 
	$standard_group_arry = $_POST["standard_group_arry"]; 
	$standard_job_require = $_POST["standard_job_require"]; 
//向tb_jobs数据库插入一条工作记录
	$sql = "UPDATE tb_standard_jobs SET standard_job_device='".$standard_job_device."',standard_job_cycle='".$standard_job_cycle."',standard_job_equipment_name='".$standard_job_equipment_name."',standard_job_cycle_unit='".$standard_job_cycle_unit."',standard_job_arry='".$standard_job_arry."',standard_group_arry='".$standard_group_arry."',standard_job_type='".$standard_job_type."',standard_job_system='".$standard_job_system."',standard_job_content='".$standard_job_content."',standard_job_remarks='".$standard_job_remarks."',standard_job_require='".$standard_job_require."' WHERE standard_job_id=".$standard_job_id;
	echo $sql;
	if(mysqli_query($conn,$sql)){
	//	echo "插入成功";	
	mysqli_close($conn);
                        echo "<script>alert('修改成功！！');location='standard_job.php'</script>";
	}else{
                echo "<script>alert('修改失败！！');</script>";
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
					<h2><center>编辑工作<center></h2>
					<?php
					$JobId = $_GET['id'];
					include_once("../../lib/class/StandardJob.class.php");
					$standardjob_obj = new StandardJob;
					?>
					<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						<?php
							list($group_ledger_arry_id,$equipment_group_design_id) = $standardjob_obj->editStandardJob($JobId);
						?>
                                        	<input type="submit" style="width:100%" value="保存"/>
					</form>
				</div>
				<?php
				echo "<div class='card'>";
					include_once("../../lib/class/Ledger.class.php");
					$ledger_obj = new Ledger;
					$ledger_obj->showStrId($group_ledger_arry_id);//检索栏
				echo "</div>";
?>
			</div>
			<div class="rightcolumn">
				<div class="card">
				<ul class="right">
					<li><a href='look_content.php?id=<?php echo $JobId ?>'>查看</a></li>
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
