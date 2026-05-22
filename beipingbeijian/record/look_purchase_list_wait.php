<html>
	<head>
		<title>班组日志</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="../../diary_css/my_diary.css" />
	</head>
	<body>
		<div class="header">
			<h1>热控班组管理平台</h1>
		</div>
		<div class="topnav">
			<?php include("../../lib/topnav/topnav.php") ?>
		</div>
		<div class="row">
			<div class="leftcolumn">
				<div class="card">
						<?php
						$part_id = $_GET['id'];
						include_once("../../lib/class/Purchase.class.php");
						$purchase_obj = new Purchase;
						$goods_id = $purchase_obj->look_purchase_list_wait($part_id);
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
					<?php include("../../sidebar/ShowQRCode.php") ?>
				</div>
				<div class="card">
					<ul class="right">
						<li><a href='../goods/goods.php'>备件清单</a></li>
						<li><a href='../inventory/inventory.php'>库存清单</a></li>
						<li><a class="active" href='../record/purchase_list_wait.php'>待采购清单</a></li>
						<li><a href='../record/purchase_record.php'>采购计划</a></li>
						<li><a href='../record/record.php'>记录清单</a></li>
						<li><a href='../record/add_purchase_list.php?id=<?php echo $part_id ?>'>加入采购清单</a></li>
					</ul>
				</div>
				<div class="card">
					<ul class="right">
						<li><a class="active" href='#'>查看</a></li>
						<li><a href='edit_purchase_list_wait.php?id=<?php echo $part_id ?>'>编辑</a></li>
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
