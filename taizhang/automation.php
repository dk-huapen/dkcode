

<head>
<title>班组日志</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../diary_css/my_diary.css" />
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
<li><a href="point_table/point_table.php">控制系统测点清单</a></li>
现场单个设备台账
<li><a href="logic/logic.php">控制系统逻辑</a></li>
现场就地控制柜内或一组/一套设备台账
<li><a href="history/tanhecha_his.php">碳核查测点历史曲线</a></li>
查询碳核查测点历史曲线
				</div>
				<div class="card">
<h3>控制系统简介</h3>
按控制系统厂家分类：ABB、Holisys、Tricon、Step200PLC。
按控制系统独立及相关性分类：主机DCS系统---1-4号锅炉、管网公用、1-5号汽轮机DCS；4、5号汽轮机DEH系统；4、5号汽轮机ETS系统；1、2、3号汽轮机DEH系统和ETS系统；脱硫DCS系统。
				</div>
			</div>
			<div class="rightcolumn">
				<div class="card">
					<ul class="right">
					<li><a class="active" href='#'>自动化仪表台账</a></li>
					<li><a href='local.php'>现场仪表台账</a></li>
					<li><a href='group.php'>设备组台账</a></li>
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
