<html>
	<head>
		<title>班组日志</title>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<link rel="stylesheet" type="text/css" href="../diary_css/my_diary.css" />
			<script type="text/javascript" src='../lib/ajax_sql.js'> </script>
	</head>
	<body>
		<div class="header">
			<h1>热控班组管理平台</h1>
		</div>
		<div class="topnav">
			<?php include("../lib/topnav/topnav.php") ?>
			<?php include_once('../lib/conn.php');?>
		</div>
		<div class="row">
			<div class="leftcolumn">
				<div class="card">
					<li><a href="equipment_account/local_account.php">设备台账</a></li>
					<li><a href="equipment_account/localtiao_account.php">调峰锅炉设备台账</a></li>
					现场设备台账列表
				</div>
			</div>
			<div class="rightcolumn">
				<div class="card">
					<ul class="right">
					<li><a href='automation.php'>自动化仪表台账</a></li>
					<li><a class="active" href='#'>现场仪表台账</a></li>
					<li><a  href='group.php'>设备组台账</a></li>
					<li><a href='job/job.php'>热控系统图</a></li>
					</ul>
				</div>
				<div class="card">
				<!--最新通知-->
					<?php include("../sidebar/notice.php")?>
				</div>
				<div class="card">
				<!--最新资讯-->
					<?php include("../sidebar/news.php")?>
				</div>
			</div>
		</div>
		<div class="footer">
			<?php include("../lib/footer/footer.php")?>
		</div>
	</body>
</html>
