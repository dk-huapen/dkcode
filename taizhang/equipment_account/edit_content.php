<html>
	<head>
		<?php include("header.php") ?>
		<script type="text/javascript" src='../../lib/com.js'> </script>
		<script type="text/javascript" src='../../lib/ajax_sql.js'> </script>
		<script type="text/javascript">
			function dosubmit(){
				document.getElementById("fieldset1").disabled=false;
				document.getElementById("fieldset2").disabled=false;
				document.getElementById("fieldset3").disabled=false;
			}
		</script>
	</head>
	<body>
<!------------------------------------------------------------------------------表单验证-------------------------------------------------------------------------------->
		<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST"){
			include_once('../../lib/conn.php');
			$account_id = $_POST["account_id"];
			$equipment_kks = $_POST["equipment_kks"]; 
			$equipment_name = $_POST["equipment_name"]; 
			$equipment_position = $_POST["equipment_position"]; 
			$equipment_remarks = $_POST["equipment_remarks"]; 
			$equipment_remarks1 = $_POST["equipment_remarks1"]; 
			$equipment_status = $_POST["equipment_status"]; 
			$equipment_goods_id = $_POST["equipment_goods_id"]; 
			$equipment_goods_id1 = $_POST["equipment_goods_id1"]; 
			$equipment_area_id = $_POST["equipment_area_id"]; 
			$equipment_system_id = $_POST["equipment_system_id"]; 
			$equipment_logs = $_POST["equipment_logs"]; 
			$equipment_level = $_POST["equipment_level"]; 
			$sql = "UPDATE tb_account SET equipment_kks='".$equipment_kks."',equipment_name='".$equipment_name."',equipment_position='".$equipment_position."',equipment_remarks='".$equipment_remarks."',equipment_remarks1='".$equipment_remarks1."',equipment_status='".$equipment_status."',equipment_goods_id='".$equipment_goods_id."',equipment_goods_id1='".$equipment_goods_id1."',equipment_system_id='".$equipment_system_id."',equipment_area_id='".$equipment_area_id."',equipment_logs='".$equipment_logs."',equipment_level='".$equipment_level."' WHERE account_id=".$account_id;
			if(mysqli_query($conn,$sql)){
				mysqli_close($conn);
                        	echo "<script>alert('更新成功！！');location='local_account.php'</script>";
			}else{
                		echo "<script>alert('更新失败！！');</script>";
				echo "插入失败:". mysqli_error($conn);
			}
		}
		?>
<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->
		<div class="header">
			<h1>热控班组管理平台</h1>
		</div>
		<div class="topnav">
			<?php include("../../lib/topnav/topnav.php") ?>
		</div>
		<div class="row">
			<div class="leftcolumn">
				<div class="card">
					<h2><center>编辑设备台账详细<center></h2>
					<?php
					$account_id = $_GET['id'];
					?>
					<form method="post" action="<?php echo htmlspecialchars(base_url($_SERVER["PHP_SELF"]));?>" onsubmit="return dosubmit()">
						<?php
						include_once("../../lib/class/Ledger.class.php");
						$ledger_obj = new Ledger;
						list($goods_id,$goods_id1,$kks,$system_id) = $ledger_obj->editLedger($account_id);
						?>
                                        	<input type="submit"style="width:100%" value="保存"/>
					</form>
				</div>
				<div class="card">
					<input onclick="showBox('hidden_box')" type="button" value="点我显示/或隐藏相关备件"/>
					<div id="hidden_box" style="display:none">
					<!--------------添加设备备件信息---------------------->
						<?php
						include_once("../../lib/class/Goods.class.php");
						$goods_obj = new Goods;
						list($equipment_goods_arry_id,$equipment_group_design_id)=$goods_obj->lookGoods($goods_id);//查看物品信息
						$arr=explode('@',$equipment_goods_arry_id);
						for($x=0;$x<count($arr);$x++){
							$goods_obj->lookGoods($arr[$x]);
						}
						list($equipment_goods_arry_id1,$equipment_group_design_id1)=$goods_obj->lookGoods($goods_id1);//查看物品信息
						$arr=explode('@',$equipment_goods_arry_id1);
						for($x=0;$x<count($arr);$x++){
							$goods_obj->lookGoods($arr[$x]);
						}
						?>
					<!--------------搜索设备备件库存---------------------->
						<?php
						include_once("../../lib/class/Inventory.class.php");
						$inventory_obj = new Inventory;
						$inventory_obj->showGoodsId($goods_id);//大库库存
						$inventory_obj->showGoodsId($goods_id1);//大库库存
						?>
					</div>
				</div>
				<div class="card">
					<?php
					include_once("../../lib/class/Point.class.php");
					$point_obj = new Point;
					if($system_id != 10){
					$point_obj->showKKS($kks);
					}else{
					$point_obj->showSlot($kks);
					}
					?>
				</div>
					<?php
					if(strlen($equipment_group_design_id)>0){
						$docstr = $equipment_group_design_id;
						if(strlen($equipment_group_design_id1)>0){
							$docstr .= $equipment_group_design_id1;
						}
					}else{
						if(strlen($equipment_group_design_id1)>0){
							$docstr = $equipment_group_design_id1;
						}
					}
					if(strlen($docstr)){
				echo "<div class='card'>";
						include_once("../../lib/class/Document.class.php");
						$document_obj = new Document;
						$document_obj->showStrId($docstr);//检索栏
				echo "</div>";
					}
					?>
				<div class="card">
					<?php
					include_once("../../lib/class/Job.class.php");
					$job_obj = new Job;
					$job_obj->showJob($account_id);
					?>
				</div>
				<div class="card">
					<?php
					include_once("../../lib/class/Defect.class.php");
					$defect_obj = new Defect;
					$defect_obj->showLedger($account_id);
					?>
				</div>
			</div>
			<div class="rightcolumn">
				<div class="card">
					<?php include("../../sidebar/ShowQRCode.php") ?>
				</div>
				<div class="card">
					<ul class="right">
						<li><a href='look_content.php?id=<?php echo $account_id ?>'>查看</a></li>
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
