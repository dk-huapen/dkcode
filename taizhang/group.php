<html>

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
					<li><a href="group_account/group.php">设备台账组</a></li>
<?php
		$conn = mysqli_connect('localhost','root','dk1314lich,forever!','db_rekong');
		$count_sql = "select count(*) from tb_account_group where equipment_group_type=3";
        	$re = mysqli_query($conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$protectnum1 = $result[0];
		$count_sql = "select count(*) from tb_account_group where equipment_group_status = 3 AND equipment_group_type=3";
        	$re = mysqli_query($conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$protectnum2 = $result[0];
        	$protect = $protectnum2/$protectnum1*100;

?>
						<dl>
						<dt>控制系统主保护</dt>
						<dd>控制系统中停机停炉保护---<?php echo '良好:'.$protectnum2.'/总共:'.$protectnum1.'/投入率:'.$protect.'%' ?></dd>
						<dt>控制系统自动调节</dt>
						<dd>控制系统中自动控制---<?php echo '良好:'.$autonum2.'/总共:'.$autonum1.'/投入率:'.$auto.'%' ?> </dd>
						<dt>现场控制柜</dt>
						<dd>现场就地控制柜内或一组/一套设备台账</dd>
						<dt>专业专题</dt>
						<dd>专题内容</dd>
						</dl>
				</div>
			</div>
			<div class="rightcolumn">
				<div class="card">
					<ul class="right">
					<li><a href='automation.php'>自动化仪表台账</a></li>
					<li><a href='local.php'>现场仪表台账</a></li>
					<li><a class="active" href='#'>设备组台账</a></li>
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
