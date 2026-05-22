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
					<h2><center>设备台帐<center></h2>
					<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<?php
						include_once("../../lib/class/Ledger.class.php");
						$ledger_obj = new Ledger;
						$ledger_obj->retrievalBox();//检索栏
					?>
					<form>
				</div>
				<?php
					/************************表单验证*******************************/
				if ($_SERVER["REQUEST_METHOD"] == "POST"){
					echo "<div class='card'>";
						$ledger_obj->retrievalResult();//检索栏
					echo "</div>";
					/***************************************************************/
				}else{
					echo "<div class='card'>";
					echo "<center><h2>状态良好的设备</h2></center>";
						$ledger_obj->showtiaoStatus(3);
					echo "</div>";
					echo "<div class='card'>";
					echo "<center><h2>未核对的设备</h2></center>";
						$ledger_obj->showtiaoStatus(-1);
					echo "</div>";
					echo "<div class='card'>";
					echo "<center><h2>故障的设备</h2></center>";
						$ledger_obj->showtiaoStatus(2);
					echo "</div>";
					echo "<div class='card'>";
					echo "<center><h2>存在隐患的设备</h2></center>";
						$ledger_obj->showtiaoStatus(1);
					echo "</div>";
					echo "<div class='card'>";
					echo "<center><h2>存在缺陷的设备</h2></center>";
						$ledger_obj->showtiaoStatus(4);
					echo "</div>";
				}
				?>
			</div>
			<div class="rightcolumn">
				<div class="card">
					<ul class="right">
						<li><a class="active" href='#'>设备台帐</a></li>
						<li><a href='add_content.php'>添加新设备</a></li>
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
