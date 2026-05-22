<html>
	<head>
		<title>班组日志</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="../../diary_css/my_diary.css" />
		<script src="../../lib/page.js"></script>					<!--翻页函数文件-->
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
					<h2><center>采购计划<center></h2>
					<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						<?php
						include_once("../../lib/class/Purchase.class.php");
						$purchase_obj = new Purchase;
						$purchase_obj->retrievalBox();//检索栏
						?>
					</form>
				</div>
				<?php
					/************************表单验证*******************************/
				if ($_SERVER["REQUEST_METHOD"] == "POST"){
					echo "<div class='card'>";
						$purchase_obj->retrievalResult();//检索栏
					echo "</div>";
					/***************************************************************/
				}else{
					echo "<div class='card'>";
						echo "<h2><center>催货清单</center></h2>";	//输出采购计划中part_level=1的项目列表
						$purchase_obj->showLevel(1);//催货清单
					echo "</div>";
					echo "<div class='card'>";
						$purchase_obj->showStatus(1);//已申报
					echo "</div>";
					echo "<div class='card'>";
						$purchase_obj->showStatus(2);//已批准
					echo "</div>";
					echo "<div class='card'>";
						$purchase_obj->showStatus(3);//已采购
					echo "</div>";
					echo "<div class='card'>";
						$purchase_obj->showStatus(4);//已到货
					echo "</div>";
					echo "<div class='card'>";
						$purchase_obj->showStatus(5);//已验收
					echo "</div>";
				}
				?>
			</div>
			<div class="rightcolumn">
				<div class="card">
					<?php include("../../sidebar/ShowQRCode.php") ?>
				</div>
				<div class="card">
<ul class="right">
<li><a class="active" href='../goods/goods.php'>备件清单</a></li>
<li><a href='../inventory/inventory.php'>库存清单</a></li>
<li><a href='../record/purchase_record.php'>采购计划</a></li>
<li><a href='../record/record.php'>记录清单</a></li>
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
