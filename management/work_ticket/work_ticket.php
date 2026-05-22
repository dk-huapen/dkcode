<html>
	<head>
		<?php
		include("header.php")
		?>
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
					<h2><center>工作票登记<center></h2>
					<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						<?php
						include_once("../../lib/class/Workticket.class.php");
						$workTicket_obj = new workTicket;
						$workTicket_obj->retrievalBox();//检索栏
						?>
					</form>
				</div>
				<?php
					/************************表单验证*******************************/
				if ($_SERVER["REQUEST_METHOD"] == "POST"){
					echo "<div class='card'>";
						$workTicket_obj->retrievalResult();
					echo "</div>";
					/***************************************************************/
				}else{
					echo "<div class='card'>";
					$workTicket_obj->showStatus(1);//检索栏
					echo "</div>";
				}
				?>
			</div>
			<div class="rightcolumn">
				<div class="card">
					<ul class="right">
						<li><a href="quick_select_ticket.php?id=10">当天工作票</a></li>
						<li><a href="quick_select_ticket.php?id=20">昨天工作票</a></li>
						<li><a href="quick_select_ticket.php?id=30">本周工作票</a></li>
						<li><a href="quick_select_ticket.php?id=40">上周工作票</a></li>
						<li><a href="quick_select_ticket.php?id=50">本月工作票</a></li>
						<li><a href="quick_select_ticket.php?id=60">上月工作票</a></li>
						<li><a href="add_work_ticket.php">新增工作票</a></li>
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
