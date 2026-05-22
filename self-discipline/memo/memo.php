<html>
	<head>
		<title>备忘清单</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="../css/SelfDiscipline.css" />
		<script src="../lib/page.js"></script>
	</head>
	<body>
		<div class="header">
			<h1>个人记录</h1>
		</div>
		<div class="topnav">
			<?php include("../lib/topnav/topnav.php") ?>
		</div>
		<div class="row">
			<div class="leftcolumn">
				<div class="card">
					<form action="select_goods.php" method="post">
						<?php
						include_once("../lib/class/Memo.class.php");
						$memo_obj = new Memo;
						//$memo_obj->retrievalBox();//检索栏
						?>
					</form>
				</div>
				<div class="card">
					<?php
					$memo_obj->showStatus(3);//检索栏
					?>
				</div>
				<div class="card">
					<?php
					$memo_obj->showStatus(4);//检索栏
					?>
				</div>
				<div class="card">
					<?php
					$memo_obj->showStatus(1);//检索栏
					?>
				</div>
				<div class="card">
					<?php
					$memo_obj->showStatus(2);//检索栏
					?>
				</div>
			</div>
			<div class="rightcolumn">
				<div class="card">
					<ul class="right">
						<li><a class="active" href='#'>备忘录</a></li>
						<li><a href="add_content.php">新增备忘</a></li>
					</ul>
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
