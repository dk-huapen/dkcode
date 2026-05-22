<html>
	<head>
		<title>班组日志</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="../diary_css/my_diary.css" />
		<script type="text/javascript" src='../lib/ajax_sql.js'> </script>
	</head>

	<body >
		<div class="header">
			<h1>热控班组管理平台</h1>
		</div>
		<div class="topnav">
			<?php include("../lib/topnav/topnav.php") ?>
		</div>
		<div class="row">
			<div class="leftcolumn">
				<div class="card">
				<li><a href="automation.php">自动化设备台账</a></li>
					主要包括控制系统内测点分布、逻辑说明
				<li><a href="local.php">现场仪表台账</a></li>
					主要包括现场实体设备具体内容和相关维护记录
				<li><a href="group.php">分组台账</a></li>
					主要包括现场实体设备具体内容和相关维护记录
				<li><a href="../sis/main.php" target="_blank">SIS系统</a></li>
					主要是热控测点在线监视、历史曲线查询、通过点击画面设备图标查看至设备台账记录。
				</div>
			</div>
			<div class="rightcolumn">
				<div class="card">
					<?php include("../sidebar/quick_index.php") ?>
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
