<html>
	<head>
		<?php include("header.php") ?>
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
					<h2><center>缺陷登记<center></h2>
					<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<?php
					include_once("../../lib/class/Defect.class.php");
					$defect_obj = new Defect;
					$defect_obj->retrievalBox();//检索栏
					?>
					</form>
				</div>
				<?php
					/************************表单验证*******************************/
				if ($_SERVER["REQUEST_METHOD"] == "POST"){
					echo "<div class='card'>";
						$defect_obj->retrievalResult();
					echo "</div>";
					/***************************************************************/
				}else{
					echo "<div class='card'>";
						echo "<center><h3>未处理缺陷</h3></center>";
						$defect_obj->showStatus(1);//未处理缺陷列表
					echo "</div>";
					echo "<div class='card'>";
						echo "<center><h3>延期缺陷</h3></center>";
						$defect_obj->showStatus(2);//延期缺陷列表
					echo "</div>";
					echo "<div class='card'>";
						echo "<center><h3>未彻底消除的</h3></center>";
						$defect_obj->showStatus(6);//延期缺陷列表
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
						<li><a href="quick_select_defect.php?id=10">当天缺陷</a></li>
						<li><a href="quick_select_defect.php?id=20">昨天缺陷</a></li>
						<li><a href="quick_select_defect.php?id=30">本周缺陷</a></li>
						<li><a href="quick_select_defect.php?id=40">上周缺陷</a></li>
						<li><a href="quick_select_defect.php?id=50">本月缺陷</a></li>
						<li><a href="quick_select_defect.php?id=60">上月缺陷</a></li>
						<li><a href="add_defect.php">新增缺陷</a></li>
					</ul>
				<div class="card">
					<?php include("../../sidebar/quick_index.php") ?>
				</div>
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
