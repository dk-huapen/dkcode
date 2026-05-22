<html>
	<head>
		<title>班组日志</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="../../diary_css/my_diary.css" />
		<script type="text/javascript" src='../../lib/page.js'> </script>
		<script type="text/javascript" src='../../lib/com.js'> </script>
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
					<h2><center>查看工作<center></h2>
					<?php
					$JobId = $_GET['id'];
					include_once("../../lib/class/StandardJob.class.php");
					$standardjob_obj = new StandardJob;
					?>
					<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						<?php
							list($group_ledger_arry_id,$equipment_group_design_id) = $standardjob_obj->lookStandardJob($JobId);
						?>
                                        	<input type="submit" style="width:100%" value="保存"/>
					</form>
				</div>
				<?php
				echo "<div class='card'>";
					include_once("../../lib/class/Ledger.class.php");
					$ledger_obj = new Ledger;
					$ledger_obj->showStrId($group_ledger_arry_id);//检索栏
				echo "</div>";
?>
			</div>
			<div class="rightcolumn">
				<div class="card">
				<ul class="right">
					<li><a class="active" href='#'>查看</a></li>
					<li><a href='edit_content.php?id=<?php echo $JobId ?>'>编辑</a></li>
</ul>
				</div>
			</div>
		</div>
		<div class="footer">
			<?php include("../../lib/footer/footer.php")?>
		</div>


</body>
</html>
