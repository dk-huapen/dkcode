<html>

<head>
<title>班组日志</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../../diary_css/my_diary.css" />
<script type="text/javascript" src='../../lib/com.js'> </script>


</head>

<body >
		<div class="header">
		<h1>热控班组管理平台</h1>
		</div>
		<div class="topnav">
			<?php include("../../lib/look_goods.php") ?>
			<?php include("../../lib/topnav/topnav.php") ?>
		</div>
		<div class="row">
			<div class="leftcolumn">
				<div class="card">
					<h2><center>查看库存备件<center></h2>
					<?php
					$inventory_id=$_GET['id'];
					include_once("../../lib/class/Inventory.class.php");
					$inventory_obj = new Inventory;
					list($goods_id,$inventory_status)=$inventory_obj->lookInventory($inventory_id);
					?>
				</div>
				<div class="card">
					<?php
					include_once("../../lib/class/Goods.class.php");
					$goods_obj = new Goods;
					$goods_obj->lookGoods($goods_id);
					?>
				</div>
			</div>
			<div class="rightcolumn">
				<div class="card">
<ul class="right">
						<li><a class="active" href='#'>查看</a></li>
						<li><a href='edit_content.php?id=<?php echo $inventory_id?>'>编辑</a></li>

						<?php
						if($inventory_status==3){
						?>
						<li><a href='purchase_in_store.php?id=<?php echo $inventory_id?>'>入班组库房</a></li>
						<?php
						}else{
						?>
						<li><a href='store_out.php?id=<?php echo $inventory_id?>'>出库</a></li>
						<?php
						}
?>
</ul>
				</div>
				<div class="card">
<?php 
include("../../sidebar/quick_index.php")
?>
				</div>
			</div>
		</div>
		<div class="footer">
			<?php include("../../lib/footer/footer.php")?>
		</div>

</body>
</html>
