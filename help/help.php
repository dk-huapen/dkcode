<html>
	<head>
		<title>帮助文档</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="../diary_css/my_diary.css" />
		<script type="text/javascript" src='../../lib/ajax_sql.js'> </script>
	</head>
	<body>
		<div class="header">
			<h1>热控班组管理平台</h1>
		</div>
		<div class="topnav">
			<?php include("../lib/topnav/topnav.php") ?>
			<?php	include_once('../lib/conn.php');?>

		</div>
		<div class="row">
			<div class="leftcolumn">
				<div class="card">
					<h2>前言</h2>
					网站搭建初衷、目的、过程
					<h2>组织架构</h2>
					网站整体组织架构介绍
					<h2>功能简介</h2>
					网站各功能简介
					<h2>代码组织</h2>
					网站各代码源文件介绍
					<h2>README</h2>
					网站信息
				</div>
			</div>
				<!--网站右侧子导航栏-->
			<div class="rightcolumn">
				<div class="card">
					<ul class="right">
						<li><a href="preface.php">前言</a></li>
						<li><a href="organization.php">组织架构</a></li>
						<li><a href="function.php">功能简介</a></li>
						<li><a href="code.php">代码组织</a></li>
						<li><a href="readme.php">README</a></li>
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
				<!--网站底部-->
			<?php include("../lib/footer/footer.php")?>
		</div>
</body>
</html>
