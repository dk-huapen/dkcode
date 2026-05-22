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
					<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
						<?php
						include_once("../../lib/class/Job.class.php");
						$job_obj = new Job;
						$job_obj->retrievalBox();//检索栏
						?>
					</form>
				</div>
				<?php
					/************************表单验证*******************************/
				if ($_SERVER["REQUEST_METHOD"] == "POST"){
					echo "<div class='card'>";
						$job_obj->retrievalResult();
					echo "</div>";
					/***************************************************************/
				}else{
					echo "<div class='card'>";
						$case=$_GET["id"];
						$job_obj->quickSelect($case);
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
						<li><a href="quick_select_job.php?id=10">当天工作</a></li>
						<li><a href="quick_select_job.php?id=20">昨天工作</a></li>
						<li><a href="quick_select_job.php?id=30">本周工作</a></li>
						<li><a href="quick_select_job.php?id=40">上周工作</a></li>
						<li><a href="quick_select_job.php?id=50">本月工作</a></li>
						<li><a href="quick_select_job.php?id=60">上月工作</a></li>
						<li><a href='add_job.php'>增加工作</a></li>
						<li><a href='add_standard_job.php'>增加标准工作</a></li>
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
