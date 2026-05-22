<html>
	<head>
		<?php include("header.php") ?>
		<script type="text/javascript" src='../../lib/com.js'> </script>
		<script type="text/javascript" src='../../lib/ajax_sql.js'> </script>
	</head>
	<body>
<!------------------------------------------------------------------------------表单验证-------------------------------------------------------------------------------->
		<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST"){
	include_once('../../lib/conn.php');
//获取add_job.php传递过来的数据
	$equipment_kks = $_POST["equipment_kks"]; 
	$equipment_name = $_POST["equipment_name"]; 
	$equipment_position = $_POST["equipment_position"]; 
	$equipment_remarks = $_POST["equipment_remarks"]; 
	$equipment_remarks1 = $_POST["equipment_remarks1"]; 
	$equipment_status = $_POST["equipment_status"]; 
	$equipment_goods_id = $_POST["equipment_goods_id"]; 
	$equipment_area_id = $_POST["equipment_area_id"]; 
	$equipment_system_id = $_POST["equipment_system_id"]; 
	$account_group_id=$_POST["account_group_id"];
//向tb_jobs数据库插入一条工作记录
	$sql = "INSERT INTO tb_account(equipment_kks,equipment_name,equipment_position,equipment_remarks,equipment_remarks1,equipment_status,equipment_goods_id,equipment_area_id,equipment_system_id,account_group_id) VALUES ('$equipment_kks','$equipment_name','$equipment_position','$equipment_remarks','$equipment_remarks1','$equipment_status','$equipment_goods_id','$equipment_area_id','$equipment_system_id','$account_group_id')";
	echo $sql;
	if(mysqli_query($conn,$sql)){
	mysqli_close($conn);
	//	echo "插入成功";	
                        echo "<script>alert('添加成功！！');location='local_account.php'</script>";
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
					<h2><center>编辑设备台账详细<center></h2>
					<form method="post" action="<?php echo htmlspecialchars(base_url($_SERVER["PHP_SELF"]));?>">
						<?php
						include_once("../../lib/class/Ledger.class.php");
						$ledger_obj = new Ledger;
						$ledger_obj->addLedger();
						?>
                                        	<input type="submit"style="width:100%" value="保存"/>
					</form>
				</div>
			</div>
			<div class="rightcolumn">
				<div class="card">
					<?php include("../../sidebar/ShowQRCode.php") ?>
				</div>
				<div class="card">
					<ul class="right">
						<li><a href='look_content.php?id=<?php echo $account_id ?>'>查看</a></li>
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
