<html>
	<head>
		<title>班组日志</title>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<link rel="stylesheet" type="text/css" href="../css/SelfDiscipline.css" />
	</head>
	<body>
		<div class="header">
			<h1>热控班组管理平台</h1>
		</div>
		<div class="topnav">
			<?php include("../lib/topnav/topnav.php") ?>
		</div>
		<div class="row">
			<div class="leftcolumn">
				<div class="card">
					<a href="centos_log/centos_command.php"><h3>Centos command</h3></a>
					<a href="centos_log/centos_service.php"><h3>Centos service</h3></a>
					<a href="centos_log/centos_install.php"><h3>Centos install</h3></a>
					<a href="centos_log/centos_office.php"><h3>Centos office</h3></a>
					<a href="centos_log/mysql_log.php"><h3>MySQL</h3></a>
					<a href="centos_log/vim_log.php"><h3>vim log</h3></a>
					<a href="centos_log/account_log.php"><h3>account log</h3></a>
					<a href="centos_log/idea.php"><h3>idea</h3></a>
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
