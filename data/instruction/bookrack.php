<html>
	<head>
		<?php include("header.php") ?>
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
					<form action="select_instruction.php" method="post">
						<?php
						include_once("../../lib/class/Document.class.php");
						$document_obj = new Document;
						$document_obj->retrievalBox();//检索栏
						?>
					</form>
				</div>
				<div class="colcard">
<?php
		echo "<table class='list'>";
		echo "<caption><h3>文档列表</h3></caption>";
		echo "<thead><tr height = '30px'><th>资料类型分类</th></thead>";
		echo "<tfoot><tr><td><center>页脚</center></td></tr></tfoot>";
			echo "<tr bgcolor='#eeeeee'align='center' height='24'><td><a href='quick_select_instruction.php?case=1&id=2'>设备说明书</a></td></tr>";
			echo "<tr bgcolor='#eeeeee'align='center' height='24'><td><a href='quick_select_instruction.php?case=1&id=4'>热工系统图</a></td></tr>";
			echo "<tr bgcolor='#eeeeee'align='center' height='24'><td><a href='quick_select_instruction.php?case=1&id=5'>热工标准</a></td></tr>";
		echo "</table>";

?>
				</div>
				<div class="colcard">
<?php
		echo "<table class='list'>";
		echo "<caption><h3>文档列表</h3></caption>";
		echo "<thead><tr height = '30px'><th>设备/系统分类</th></thead>";
		echo "<tfoot><tr><td><center>页脚</center></td></tr></tfoot>";
			echo "<tr bgcolor='#eeeeee'align='center' height='24'><td><a href='quick_select_instruction.php?case=2&id=2'>电动执行机构</a></td></tr>";
			echo "<tr bgcolor='#eeeeee'align='center' height='24'><td><a href='quick_select_instruction.php?case=2&id=4'>气动执行机构</a></td></tr>";
			echo "<tr bgcolor='#eeeeee'align='center' height='24'><td><a href='quick_select_instruction.php?case=2&id=5'>液动执行机构</a></td></tr>";
		echo "</table>";

?>
				</div>
			</div>
			<div class="rightcolumn">
				<div class="card">
					<ul class="right">
						<li><a class="active" href="#">资料浏览</a></li>
						<li><a href="instruction.php">文件管理</a></li>
						<li><a href="../upload_file/upload.php">临时文件</a></li>
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
