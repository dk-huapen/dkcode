<html>
	<head>
		<title>班组日志</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="../diary_css/my_diary.css" />
		<script src="../lib/page.js"></script>
		<script type="text/javascript" src='../../lib/ajax_sql.js'> </script>
	</head>
	<body >
		<div class="header">
			<h1>热控班组管理平台</h1>
		</div>
		<div class="topnav">
			<?php include("../lib/topnav/topnav.php") ?>
		</div>
		<div class="row">
			<div class="leftcolumn">
				<div class="card">
				<h4>备件清单</h4>
				<h4>库存清单</h4>
				<h4>待采购清单</h4>
				<h4>采购计划</h4>
				<h4>记录清单</h4>
				</div>
			</div>
			<div class="rightcolumn">
				<div class="card">
<ul class="right">
<li><a class="active" href='goods/goods.php'>备件清单</a></li>
<li><a href='inventory/inventory.php'>库存清单</a></li>
<li><a href='record/purchase_list_wait.php'>待采购清单</a></li>
<li><a href='record/purchase_record.php'>采购计划</a></li>
<li><a href='record/record.php'>记录清单</a></li>
</ul>
				</div>
				<div class="card">
				<!--最新通知-->
					<?php include("../sidebar/notice.php")?>
				</div>
				<div class="card">
				<!--最新资讯-->
					<?php include("../sidebar/news.php")?>
				</div>
			</div>
		</div>
		<div class="footer">
			<?php include("../lib/footer/footer.php")?>
		</div>
	</body>
</html>
