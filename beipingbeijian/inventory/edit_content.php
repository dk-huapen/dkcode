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
			$inventory_id=$_POST['inventory_id'];
			$inventory_number=$_POST['inventory_number'];
			$inventory_remarks=$_POST['inventory_remarks'];
			$inventory_position=$_POST['inventory_position'];
			$inventory_price=$_POST['inventory_price'];
			$group_id=$_POST['group_id'];
			$check_sql = "UPDATE tb_inventory SET inventory_number='".$inventory_number."',inventory_remarks='".$inventory_remarks."',inventory_position='".$inventory_position."',group_id=".$group_id.",inventory_price=".$inventory_price." WHERE inventory_id=".$inventory_id;
			if(mysqli_query($conn,$check_sql)){
				mysqli_close($conn);
                  		echo "<script>alert('修改成功！！');location='inventory.php'</script>";
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
			<?php include("../../lib/look_goods.php") ?>
			<?php include("../../lib/topnav/topnav.php") ?>
		</div>
		<div class="row">
			<div class="leftcolumn">
				<div class="card">
					<h2><center>编辑采购表<center></h2>
					<?php
					$inventory_id=$_GET['id'];
					include_once("../../lib/class/Inventory.class.php");
					$inventory_obj = new Inventory;
					?>
						<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						<?php
						$goods_id = $inventory_obj->editInventory($inventory_id);
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
						<li><a href='look_content.php?id=<?php echo $inventory_id?>'>查看</a></li>
						<li><a class="active" href='#'>编辑</a></li>
					</ul>
				</div>
				<div class="card">
				<!--快速检索-->
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
