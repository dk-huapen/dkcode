<html>
	<head>
		<title>班组日志</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="../../diary_css/my_diary.css" />
		<script src="../../lib/page.js"></script>
	</head>
	<body >
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
				include '../../lib/purchase_list.php';
		include_once('../../lib/conn.php');
			?>
			<h2><center>待采购清单</center></h2>
			<?php
//			purchase_list_wait($conn,-1);
					include_once("../../lib/class/Purchase.class.php");
					$purchase_obj = new Purchase;
					$purchase_obj->purchase_list_wait(-1) ;
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
<li><a class="active" href='#'>待采购清单</a></li>
<li><a href='purchase_record.php'>采购计划</a></li>
<li><a href='record.php'>记录清单</a></li>
</ul>
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
