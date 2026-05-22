<html>
	<head>
		<title>班组日志</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="../../diary_css/my_diary.css" />
		<script type="text/javascript" src='../../lib/page.js'> </script>
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
					<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						<?php
						include_once("../../lib/class/Analysis.class.php");
						$analysis_obj = new Analysis;
						$analysis_obj->retrievalBox();//检索栏
						?>
                                        	<input type="submit"style="width:100%" value="搜索"/>
					</form>
				</div>
				<?php
					/************************表单验证*******************************/
				if ($_SERVER["REQUEST_METHOD"] == "POST"){
					echo "<div class='card'>";
						$analysis_obj->retrievalResult();
					echo "</div>";
					/***************************************************************/
				}else{
					echo "<div class='card'>";
					$analysis_obj->showStatus(1);//未处理缺陷列表
					echo "</div>";

					echo "<div class='card'>";
					$analysis_obj->showStatus(2);//未处理缺陷列表
					echo "</div>";

					echo "<div class='card'>";
					$analysis_obj->showStatus(3);//未处理缺陷列表
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
					<li><a href='job/job.php'>自动化仪表台账</a></li>
					<li><a class="active" href='job/job.php'>现场仪表台账</a></li>
					<li><a href='job/job.php'>设备组台账</a></li>
					<li><a href='job/job.php'>热控系统图</a></li>
					<li><a href='add_job.php'>增加工作</a></li>
					<li><a href='add_standard_job.php'>增加标准工作</a></li>
					<li><a href='add_analysis.php'>增加分析报告</a></li>
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
