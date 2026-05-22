<html>
	<head>
		<title>班组日志</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="../../diary_css/my_diary.css" />
		<script type="text/javascript" src='../../lib/com.js'> </script>
	</head>
	<body>
<!------------------------------------------------------------------------------表单验证-------------------------------------------------------------------------------->
		<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST"){
	include_once('../../lib/conn.php');
//获取edit_job.php传递过来的数据
	$part_id = $_POST["part_id"]; 

	$part_system = $_POST["part_system"]; 
	$part_declare_time = $_POST["part_declare_time"]; 
	$part_declare_people = $_POST["part_declare_people"]; 
	$part_remarks = $_POST["part_remarks"]; 
	$group_id = $_POST["group_id"]; 
	$part_declare_number = $_POST["part_declare_number"]; 
	$part_price = $_POST["part_price"]; 
	$part_come_time = $_POST["part_come_time"]; 
	$part_check_people = $_POST["part_check_people"]; 

	$part_status = $_POST["part_status"]; 
	$part_check_time = $_POST["part_check_time"]; 
	$part_come_number = $_POST["part_come_number"]; 
	if($_POST["part_level"]==1){
		$part_level = 1;
	}else{
		$part_level = 0;
	}

	$sql = "UPDATE purchase_list SET part_system='".$part_system."',part_declare_time='".$part_declare_time."',part_declare_people='".$part_declare_people."',part_remarks='".$part_remarks."',group_id='".$group_id."',part_declare_number='".$part_declare_number."',part_price='".$part_price."',part_come_time='".$part_come_time."',part_check_people='".$part_check_people."',part_status='".$part_status."',part_check_time='".$part_check_time."',part_level='".$part_level."',part_come_number='".$part_come_number."' WHERE part_id=".$part_id;
	if(mysqli_query($conn,$sql)){
	mysqli_close($conn);
                        echo "<script>alert('更新成功！！');location='purchase_record.php'</script>";
	}else{
                echo "<script>alert('更新失败！！');</script>";
		echo "更新失败:". mysqli_error($conn);
	mysqli_close($conn);
	}
	
		}
		?>
<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->
		<div class="header">
		<h1>热控班组管理平台</h1>
		</div>
		<div class="topnav">
			<?php include("../../lib/look_goods.php") ?>
			<?php include("../../lib/topnav/topnav.php") ?>
		</div>
		<div class="row">
			<div class="leftcolumn">
				<div class="card">
					<h2><center>编辑采购表<center></h2>
					<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						<?php
						$part_id=$_GET['id'];
						include_once("../../lib/class/Purchase.class.php");
						$purchase_obj = new Purchase;
						$goods_id = $purchase_obj->editPurchase($part_id);
						?>
                                        	<input type="submit"style="width:100%" value="保存"/>
					</form>
				</div>
				<div class="card">
					<?php
					include_once("../../lib/class/Goods.class.php");
					$goods_obj = new Goods;
					$goods_obj->lookGoods($goods_id);
					?>
				</div>
			</div>
			<div class="rightcolumn">
				<div class="card">
					<ul class="right">
						<li><a href='look_content.php?id=<?php echo $part_id ?>'>查看</a></li>
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
