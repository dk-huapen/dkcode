<html>
	<head>
		<?php include("header.php") ?>
	</head>
	<body>
<!------------------------------------------------------------------------------表单验证-------------------------------------------------------------------------------->
		<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST"){
	include_once('../../lib/conn.php');
	$defect_id = $_POST["defect_id"]; 
	$defect_cotent = $_POST["defect_cotent"]; 
	$defect_people_find = $_POST["defect_people_find"]; 
	$defect_specialty = $_POST["defect_specialty"]; 
	$defect_find_time = $_POST["defect_find_time"]; 
	$defect_people_act = $_POST["defect_people_act"]; 
	$defect_check_people = $_POST["defect_check_people"]; 
	$defect_system = $_POST["defect_system"]; 
	$defect_area = $_POST["defect_area"]; 
	$defect_remarks = $_POST["defect_remarks"]; 
	$defect_result = 1; 
	$sql = "INSERT INTO tb_defect(defect_id,defect_cotent,defect_people_find,defect_find_time,defect_system,defect_area,defect_result,defect_people_act,defect_specialty,defect_remarks,defect_check_people) VALUES ('$defect_id','$defect_cotent','$defect_people_find','$defect_find_time','$defect_system','$defect_area','$defect_result','$defect_people_act','$defect_specialty','$defect_remarks','$defect_check_people')";
	if(mysqli_query($conn,$sql)){
	mysqli_close($conn);
                        echo "<script>alert('添加成功！！');location='defect.php'</script>";
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
					<h2><center>添加缺陷<center></h2>
					<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						<?php
						include_once("../../lib/class/Defect.class.php");
						$defect_obj = new Defect;
						$defect_obj->addDefect($id);
						?>
                                        	<input type="submit"style="width:100%" value="保存"/>
					</form>
				</div>
			</div>
			<div class="rightcolumn">
				<div class="card">
					<ul class="right">
						<li><a class="active" href='#'>新增</a></li>
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
