<html>
	<head>
		<title>班组日志</title>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<link rel="stylesheet" type="text/css" href="../../diary_css/my_diary.css" />
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
					<?php
					include_once("../../lib/class/Goods.class.php");
					$goods_obj = new Goods;
					$goods_obj->retrievalBox();//显示检索栏
					?>
					<h2><center>查看备件信息<center></h2>
					<?php
					$goods_id=$_GET['id'];
					list($equipment_goods_arry_id,$equipment_group_design_id)=$goods_obj->lookGoods($goods_id);//查看物品信息
					?>
                                        <input type="button" value="返回上一页面"style="width:100%" onclick="Javascript:window.history.back()" ></input>
				</div>
				<div class="card">
					<input onclick="showBox('hidden_box')" type="button" value="点我显示/或隐藏相关备件"></input>
					<?php
					if(file_exists('img/'.$goods_id.'.jpg')){
						echo "<input onclick=\"showImage('hidden_img','myimage','img/".$goods_id.".jpg')\" type='button' value='点我显示/或隐藏图片'/>";
					}
					?>
					<div id="hidden_box" style="display:none">
						<?php
						$arr=explode('@',$equipment_goods_arry_id);
						for($x=0;$x<count($arr);$x++){
							$goods_obj->lookGoods($arr[$x]);
						}
						?>
					</div>
					<div id="hidden_img" style="display:none">
						<fieldset>
							<legend style="border:1px">备件图片</legend>
							<center><img id='myimage' src="" style='width:60%' alt='未上传该备件图片'/></center>
						</fieldset>
					</div>
				</div>
				<div class="card">
					<?php
					include_once("../../lib/class/Purchase.class.php");
					$purchase_obj = new Purchase;
					$purchase_obj->showGoodsId($goods_id);
					?>
				</div>
				<div class="card">
					<?php
					include_once("../../lib/class/Inventory.class.php");
					$inventory_obj = new Inventory;
					$inventory_obj->showGoodsId($goods_id);//大库库存
					?>
				</div>
				<div class="card">
					<?php
					include_once("../../lib/class/Document.class.php");
					$document_obj = new Document;
					$document_obj->showStrId($equipment_group_design_id);//检索栏
					?>
				</div>
			</div>

			<div class="rightcolumn">
				<div class="card">
					<?php include("../../sidebar/ShowQRCode.php") ?>
				</div>
				<div class="card">
					<ul class="right">
						<li><a class='active' href='#'>查看</a></li>
						<li><a href='./edit_content.php?id=<?php echo $goods_id ?>'>编辑</a></li>
						<li><a href='../record/add_purchase_list_wait.php?id=<?php echo $goods_id ?>'>加入待采购清单</a>
					</ul>
				</div>
				<div class="card">
				<!--快速检索-->
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
