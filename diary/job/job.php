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
					<form method="post" action="<?php echo htmlspecialchars(base_url($_SERVER["PHP_SELF"]));?>">
						<?php
						include_once("../../lib/class/Job.class.php");
						$job_obj = new Job;
						$job_obj->retrievalBox();//检索栏
						?>
                                        	<input type="submit"style="width:100%" value="搜索"/>
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
					echo "<center><h2>重点工作</h2></center>";
					$job_obj->showStatus(4);//未处理缺陷列表
				echo "</div>";
				echo "<div class='card'>";
					echo "<center><h2>定期工作</h2></center>";
					//$job_obj->showStatus(2);//未处理缺陷列表
					$job_obj->showStandardJob();//未处理缺陷列表
				echo "</div>";
				echo "<div class='card'>";
					echo "<center><h2>计划工作</h2></center>";
					$job_obj->showStatus(3);//未处理缺陷列表
				echo "</div>";
				echo "<div class='card'>";
					echo "<center><h2>隐患治理</h2></center>";
					$job_obj->showStatus(10);//未处理缺陷列表
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
