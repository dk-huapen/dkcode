<html>
	<head>
		<title>班组日志</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="../../diary_css/my_diary.css" />
		<script type="text/javascript" src='../../lib/com.js'> </script>
	</head>
	<body>
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
						$part_id=$_GET['id'];
						include_once("../../lib/class/Purchase.class.php");
						$purchase_obj = new Purchase;
						list($goods_id,$part_status) = $purchase_obj->lookPurchase($part_id);
						?>
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
						<li><a class="active" href='#'>查看</a></li>
						<li><a href='edit_content.php?id=<?php echo $part_id ?>'>编辑</a></li>
<?php
					if($part_status == 4){
?>
						<li><a href='purchase_in_check.php?id=<?php echo $part_id?>'>验收</a></li>
<?php
					}
?>
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
