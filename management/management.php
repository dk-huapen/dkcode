<html>

<head>
<title>班组日志</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../diary_css/my_diary.css" />
</head>

<body >
		<div class="header"> <h1>热控班组管理平台</h1> </div>
		<div class="topnav">
			<?php include("../lib/topnav/topnav.php") ?>
		</div>
		<div class="row">
			<div class="leftcolumn">
				<div class="card">
					<h3>管理周报</h3>
					班组管理周报、月报
					<h3>技术监督</h3>
					专业技术监督
					<h3>设备分析</h3>
					班组设备管理分析
					<h3>工作票管理</h3>
					班组工作票管理
				</div>
			</div>
			<div class="rightcolumn">
				<div class="card">
					<ul class="right">
<li><a href="work_report/work_report.php">管理周报</a></li>
<li><a href="work_report/work_report_yue.php">管理月报</a></li>
<li><a href="work_report/tec_supervision.php">技术监督</a></li>
<li><a href="../data/instruction/quick_select_instruction.php?id=14">设备分析</a></li>
<li><a href='./work_ticket/work_ticket.php?id=<?php echo $today_time?>'>工作票</a></li>
<li><a href='edit_diary.php?id=<?php echo $today_time?>'>安全整改</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="footer">
			<?php include("../lib/footer/footer.php")?>
		</div>




</body>
</html>
