<html>

<head>
<title>班组日志</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../../diary_css/my_diary.css" />

<script src="../../lib/page.js"></script>

</head>

<body >
		<div class="header">
			<h1>热控班组管理平台</h1>
		</div>
		<div class="topnav">
			<?php include("../../lib/topnav/topnav.php") ?>
<?php include '../../lib/purchase_list.php'; ?>
<?php include '../../lib/conn.php'; ?>
		</div>
		<div class="row">
			<div class="leftcolumn">
				<div class="card">
<h2><center>备件出入库记录<center></h2>
<div id="part_list">
<center>验收清单</center>
<?php
	purchase_list_record($conn,check,6);
?>
<center>入库清单</center>
<?php
	purchase_list_record($conn,in,3);
?>
<center>出库清单</center>
<?php
	purchase_list_record($conn,out,4);
?>
</body>
</div>
</div>
			</div>
			<div class="rightcolumn">
				<div class="card">
<ul class="right">
<li><a class="active" href='../goods/goods.php'>备件清单</a></li>
<li><a href='../inventory/inventory.php'>库存清单</a></li>
<li><a href='../record/purchase_record.php'>采购计划</a></li>
<li><a href='../record/record.php'>记录清单</a></li>
</ul>
				</div>
				<div class="card">
					<h6>虚位已待</h6>	
				</div>
			</div>
		</div>
		<div class="footer">
			<?php include("../../lib/footer/footer.php")?>
		</div>
</html>
