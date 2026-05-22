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
				<h2><center>技术资料<center></h2>
					<form action="select_instruction.php" method="post">
						<?php
						include_once("../../lib/class/Document.class.php");
						$document_obj = new Document;
						$document_obj->retrievalBox();//检索栏
						?>
					</form>
				</div>
				<?php
					/************************表单验证*******************************/
				if ($_SERVER["REQUEST_METHOD"] == "POST"){
					echo "<div class='card'>";
						$document_obj->retrievalResult();
					echo "</div>";
					/***************************************************************/
				}else{
					echo "<div class='card'>";
						$case = $_GET['case'];
						$id = $_GET['id'];
						if($case==1){
							$document_obj->showType($id);//检索栏
						}else{
							$document_obj->showStatus($id);//检索栏
						}
					echo "</div>";
				}
				?>
			</div>
			<div class="rightcolumn">
				<div class="card">
					<ul class="right">
						<li><a href="../standard/standard.php">系统资料</a></li>
						<li><a class="active" href="#">文件清单</a></li>
						<li><a href="../upload_file/upload.php">文件上传</a></li>
						<li><a href="add_content.php">新增文档</a></li>
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
