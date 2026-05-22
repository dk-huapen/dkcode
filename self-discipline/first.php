<!--文件名：index.php-->
<!--作者：dk_huapen-->
<!--功能描述：网站首页，介绍该网站做什么，包含哪些功能模块及各模块功能-->
<!--修改人：dk_huapen-->
<!--修改时间：2022年04月15日-->
<!--修改内容：增加代码注释，统一缩进方便代码折叠-->
<html>
	<head>
		<!--网站标题-->
		<title>热控班组管理平台</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="css/SelfDiscipline.css" />
	</head>
	<body >
		<div class="header">
			<h1>热控班组管理平台</h1>
		</div>
		<div class="topnav">
			<?php include("./lib/topnav/topnav.php") ?>
		</div>
		<div class="row">
			<div class="leftcolumn">
				<div class="card">
				<!--网站正文-->
				<center><h1>八办作风</h1></center>
				<center><h2>今天的事，今天办；重要的事，优先办；</h2></center>
				<center><h2>限时的事，按时办；能办的事，马上办；</h2></center>
				<center><h2>困难的事，努力办；琐碎的事，抽空办；</h2></center>
				<center><h2>分外的事，协主办；所有的事，认真办！</h2></center>
				<h1>工作日志</h1>
					班组每日工作日志
				<h1>设备台帐</h1>
					各设备台帐
				<h1>缺陷</h1>
					缺陷清单，缺陷统计，缺陷分析
				<h1>说明书</h1>
					相关设备说明书
				<h1>技术图纸</h1>
					相关设备图纸CAD
				<h1>培训资料</h1>
					相关培训资料及记录
				</div>
			</div>
				<!--网站右侧子导航栏-->
			<div class="rightcolumn">
				<div class="card">
				<h3>待定</h3>
				<h3>预流</h3>
				</div>
				<div class="card">
				<h3>待定</h3>
				<h3>预流</h3>
				</div>
			</div>
		</div>
		<div class="footer">
				<!--网站底部-->
				<h3>纯属个人娱乐</h3>
		</div>
	</body>
</html>
