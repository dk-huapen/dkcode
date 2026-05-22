<html>
	<head>
		<?php include("header.php") ?>
		<script type="text/javascript" src='../../lib/com.js'> </script>
		<script type="text/javascript">
			function dosubmit(){
				document.getElementById("fieldset1").disabled=false;
				document.getElementById("fieldset2").disabled=false;
				document.getElementById("fieldset3").disabled=false;
			}
		</script>
	</head>
	<body>
<!------------------------------------------------------------------------------表单验证-------------------------------------------------------------------------------->
		<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST"){
	include_once('../../lib/conn.php');
//获取add_job.php传递过来的数据
	$defect_id = $_POST["defect_id"]; 
	$defect_cotent = $_POST["defect_cotent"]; 
	$defect_people_find = $_POST["defect_people_find"]; 
	$defect_find_time = $_POST["defect_find_time"]; 
	$defect_system = $_POST["defect_system"]; 
	$defect_area = $_POST["defect_area"]; 
	$defect_result = $_POST["defect_result"]; 
	$defect_people_act = $_POST["defect_people_act"]; 
	$defect_delay_time = $_POST["defect_delay_time"]; 
	$defect_specialty = $_POST["defect_specialty"]; 
	//$defect_specialty = 3; 
	$defect_remarks = $_POST["defect_remarks"]; 
	$defect_clear_people = $_POST["defect_clear_people"]; 
	$defect_clear_time = $_POST["defect_clear_time"]; 
	$defect_type = $_POST["defect_type"]; 
	$defect_check_people = $_POST["defect_check_people"]; 
	$diary_id = $_POST["diary_id"];
	$analysis_id = $_POST["analysis_id"];
	//$analysis_id = -1;
	$job_account_id = $_POST["job_account_id"]; 
//向tb_jobs数据库插入一条工作记录
	$sql = "UPDATE tb_defect SET defect_cotent='".$defect_cotent."',defect_people_find='".$defect_people_find."',defect_find_time='".$defect_find_time."',defect_system='".$defect_system."',defect_area='".$defect_area."',defect_result='".$defect_result."',defect_people_act='".$defect_people_act."',defect_delay_time='".$defect_delay_time."',defect_specialty='".$defect_specialty."',defect_remarks='".$defect_remarks."',defect_clear_people='".$defect_clear_people."',defect_clear_time='".$defect_clear_time."',defect_type='".$defect_type."',defect_check_people='".$defect_check_people."',diary_id='".$diary_id."',analysis_id='".$analysis_id."',job_account_id='".$job_account_id."' WHERE defect_id=".$defect_id;
                //echo $sql;
	if(mysqli_query($conn,$sql)){
	mysqli_close($conn);
       //                 echo "<script>alert('修改成功！！');location='defect.php'</script>";
                        		echo "<script>alert('更新成功！！');history.go(-2)</script>";
	}else{
                echo "<script>alert('修改失败！！');</script>";
		echo "修改失败:". mysqli_error($conn);
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
					<h2><center>编辑缺陷<center></h2>
					<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return dosubmit()">
						<?php
						include_once("../../lib/class/Defect.class.php");
						$id=$_GET['id'];
						$defect_obj = new Defect;
						$analysis_id = $defect_obj->editDefect($id);
						?>
               					<input type='submit'style='width:100%' value='保存'/>
					</form>
				</div>
				<div class="card">
					<input onclick="showBox('hidden_box')" type="button" value="点我显示/或隐藏缺陷分析"/>
					<div id="hidden_box" style="display:none">
						<?php
						include_once("../../lib/class/Analysis.class.php");
						$analysis_obj = new Analysis;
						$analysis_obj->lookAnalysis($analysis_id);
						?>
					</div>
				</div>
			</div>
			<div class="rightcolumn">
				<div class="card">
					<?php include("../../sidebar/ShowQRCode.php") ?>
				</div>
				<div class="card">
					<ul class="right">
						<li><a  href='look_content.php?id=<?php echo $id ?>'>查看</a></li>
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
