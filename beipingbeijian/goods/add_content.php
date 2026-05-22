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
	$goods_name = $_POST["goods_name"]; 
	$goods_category = $_POST["goods_category"]; 
	$goods_use = $_POST["goods_use"]; 
	$goods_modle = $_POST["goods_modle"]; 
	$goods_type = $_POST["goods_type"]; 
	$goods_main_parameters = $_POST["goods_main_parameters"]; 
	$goods_parameters = $_POST["goods_parameters"]; 
	$goods_manufacturers = $_POST["goods_manufacturers"]; 
	$goods_remarks = $_POST["goods_remarks"]; 
	$goods_price = $_POST["goods_price"]; 
	$goods_childs = $_POST["goods_childs"]; 
	$sql = "INSERT INTO tb_goods(goods_name,goods_category,goods_use,goods_modle,goods_type,goods_main_parameters,goods_parameters,goods_manufacturers,goods_remarks,goods_price,goods_childs) VALUES ('$goods_name','$goods_category','$goods_use','$goods_modle','$goods_type','$goods_main_parameters','$goods_parameters','$goods_manufacturers','$goods_remarks','$goods_price','$goods_childs')";
	if(mysqli_query($conn,$sql)){
	//	echo "插入成功";	
	mysqli_close($conn);
                        echo "<script>alert('添加成功！！');location='goods.php'</script>";
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
					<h2><center>添加物品信息<center></h2>
					<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<?php
							include_once("../../lib/class/Goods.class.php");
							$goods_obj = new Goods;
							$goods_obj->addGoods($goods_id);
					?>
                				<input type="submit"style="width:100%" value="保存"/>
					</form>
				</div>
			</div>
			<div class="rightcolumn">
				<div class="card">
					<ul class="right">
						<li><a href='goods.php'>备件清单</a></li>
						<li><a href='../inventory/inventory.php'>库存清单</a></li>
						<li><a href='../record/purchase_record.php'>采购计划</a></li>
						<li><a href='../record/record.php'>记录清单</a></li>
					<li><a class="active" href='#'>新增</a></li>
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
