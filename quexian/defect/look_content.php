<html>
	<head>
		<?php include("header.php") ?>
		<script type="text/javascript" src='../../lib/com.js'> </script>
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
					<h2><center>编辑缺陷<center></h2>
						<?php
						include_once("../../lib/class/Defect.class.php");
						$id=$_GET['id'];
						$defect_obj = new Defect;
						$analysis_id = $defect_obj->lookDefect($id);
						?>
				</div>
				<div class="card">
					<input onclick="showBox('hidden_box')" type="button" value="点我显示/或隐藏缺陷分析"/>
					<div id="hidden_box" style="display:none">
						<?php
						include_once("../../lib/class/Analysis.class.php");
						$analysis_obj = new Analysis;
						$analysis_obj->lookAnalysis($analysis_id);
						?>
					</div>
				</div>
			</div>
			<div class="rightcolumn">
				<div class="card">
					<?php include("../../sidebar/ShowQRCode.php") ?>
				</div>
				<div class="card">
					<ul class="right">
						<li><a class="active" href='#'>查看</a></li>
						<li><a  href='edit_content.php?id=<?php echo $id ?>'>编辑</a></li>
					</ul>
				</div>
				<div class="card">
					<?php include("../../sidebar/quick_index.php") ?>
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
