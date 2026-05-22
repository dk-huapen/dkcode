<html>
	<head>
		<title>控制系统</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="../../diary_css/my_diary.css" />
<script type="text/javascript" src='../../lib/page.js'> </script>
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
					<h3>查找测点硬件分布</h3>
					<form method="post" action="<?php echo htmlspecialchars(base_url($_SERVER["PHP_SELF"]));?>">
						<?php
						include_once("../../lib/class/Point.class.php");
						$point_obj = new Point;
						$point_obj->retrievalBox();//检索栏
						?>
					</form>
				</div>
		<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST"){
					echo "<div class='card'>";
						$point_obj->retrievalResult();//检索栏
					echo "</div>";
		}else{
?>
				<div class='card'>
					<h3>控制系统简介</h3>
					按控制系统厂家分类：ABB、Holisys、Tricon、Step200PLC。
					按控制系统独立及相关性分类：主机DCS系统---1-4号锅炉、管网公用、1-5号汽轮机DCS；4、5号汽轮机DEH系统；4、5号汽轮机ETS系统；1、2、3号汽轮机DEH系统和ETS系统；脱硫DCS系统。
				</div>
				<div class='card'>
					<h3>定值表</h3>
<?php
						$point_obj->ShowProtectPointTable();//检索栏
						echo "<center><a href='../../lib/fpdf/preview_point.php' target='_blank'>生成定值表</a></center>";
?>
				</div>
<?php
		}
		?>
			</div>
			<div class="rightcolumn">
				<div class="card">
					<ul class="right">
						<li><a class="active" href='#'>控制系统测点清单</a></li>
						<li><a href='#'>控制系统逻辑</a></li>
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
