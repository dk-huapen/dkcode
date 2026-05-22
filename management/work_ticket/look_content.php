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
					<h2><center>编辑工作票<center></h2>
					<?php
					$work_ticket_id = $_GET['id'];
					include_once("../../lib/class/Workticket.class.php");
					$workTicket_obj = new workTicket;
					$work_ticket_number = $workTicket_obj->lookWorkTicket($work_ticket_id);
					?>
				</div>
				<div class="card">
					<?php
					echo "<input onclick=\"showImage('hidden_img','myimage','img/".$work_ticket_number.".jpg')\" type='button' value='点我显示/或隐藏工作票图片'/>";
					?>
					<fieldset>
						<legend style="border:1px">工作票图片</legend>
					<div id="hidden_img" style="display:none">
						<img id='myimage' src="" style='width:100%' alt='未上传该工作票图片'/>
					</div>
					</fieldset>
				</div>
			</div>
			<div class="rightcolumn">
				<div class="card">
					<?php include("../../sidebar/ShowQRCode.php") ?>
				</div>
				<div class="card">
					<ul class="right">
						<li><a href='add_work_ticket.php'>新增</a></li>
						<li><a href='look_work_ticket.php'>查看</a></li>
						<li><a class="active" href='#'>编辑</a></li>
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
