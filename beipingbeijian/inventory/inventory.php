<html>
	<head>
		<title>班组日志</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="../../diary_css/my_diary.css" />
		<script src="../../lib/page.js"></script>
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
					<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<?php
					include_once("../../lib/class/Inventory.class.php");
					$inventory_obj = new Inventory;
					$inventory_obj->retrievalBox();
					?>
					</form>
				</div>
				<?php
					/************************表单验证*******************************/
				if ($_SERVER["REQUEST_METHOD"] == "POST"){
					echo "<div class='card'>";
						$inventory_obj->retrievalResult();//检索栏
					echo "</div>";
					/***************************************************************/
				}else{
					echo "<div class='card'>",
						"<h2><center>大库库存<center></h2>";
						$inventory_obj->showStatus(3);//大库库存
					echo "</div>",
					"<div class='card'>",
						"<h2><center>库房库存<center></h2>",
						$inventory_obj->showStatus(1);//班组库房库存
					echo "</div>";
				}
				?>
			</div>
			<div class="rightcolumn">
				<div class="card">
					<ul class="right">
						<li><a href='../goods/goods.php'>备件清单</a></li>
						<li><a class="active" href='../inventory/inventory.php'>库存清单</a></li>
						<li><a href='../record/purchase_record.php'>采购计划</a></li>
						<li><a href='../record/record.php'>记录清单</a></li>
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
