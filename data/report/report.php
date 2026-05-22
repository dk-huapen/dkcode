<html>
	<head>
		<?php include("header.php") ?>
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
				<h2><center>校验报告<center></h2>
					<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						<?php
						include_once("../../lib/class/Report.class.php");
						$report_obj = new Report;
						//$report_obj->retrievalBox();//检索栏
						?>
					</form>
				</div>
				<?php
					/************************表单验证*******************************/
				if ($_SERVER["REQUEST_METHOD"] == "POST"){
					echo "<div class='card'>";
						$report_obj->retrievalResult();
					echo "</div>";
					/***************************************************************/
				}else{
					echo "<div class='card'>";
						//$document_obj->showStatus(2);//检索栏
						$report_obj->showReport(0);//检索栏
					echo "</div>";
				}
				?>
			</div>
			<div class="rightcolumn">
				<div class="card">
					<ul class="right">
						<li><a href="bookrack.php">资料浏览</a></li>
						<li><a class="active" href="#">文件管理</a></li>
						<li><a href="../upload_file/upload.php">临时文件</a></li>
						<li><a href="add_content.php">新增文档</a></li>
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
