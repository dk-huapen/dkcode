<html>
	<head>
	<?php include("header.php") ?>
		<script type="text/javascript" src='../../lib/ajax_sql.js'> </script>
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
					<form method="post" action="<?php echo htmlspecialchars(base_url($_SERVER["PHP_SELF"]));?>">
						<?php
						include_once("../../lib/class/Group.class.php");
						$group_obj = new Group;
						$group_obj->retrievalBox();//检索栏
						?>
					</form>
				</div>
				<?php
					/************************表单验证*******************************/
				if ($_SERVER["REQUEST_METHOD"] == "POST"){
					echo "<div class='card'>";
						$group_obj->retrievalResult();
					echo "</div>";
					/***************************************************************/
				}else{
					echo "<div class='card'>";
					$group_obj->showStatus(1);
					echo "</div>";
					echo "<div class='card'>";
					$group_obj->showStatus(2);
					echo "</div>";
					echo "<div class='card'>";
					$group_obj->showStatus(3);
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
				<li><a class="active" href='job/job.php'>班组日志</a></li>
				<li><a href='add_content.php'>新增设备组</a></li>
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
