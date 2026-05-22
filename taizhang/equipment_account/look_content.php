<html>
	<head>
		<?php include("header.php") ?>
		<script type="text/javascript" src='../../lib/com.js'> </script>
	</head>
	<body >
		<div class="header">
			<h1>热控班组管理平台</h1>
		</div>
		<div class="topnav">
			<?php include("../../lib/topnav/topnav.php");
	$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];
 ?>
		</div>
		<div class="row">
			<div class="leftcolumn">
				<div class="card">
					<h2><center>编辑设备台账详细<center></h2>
					<?php
					$account_id = $_GET['id'];
					include_once("../../lib/class/Ledger.class.php");
					$ledger_obj = new Ledger;
					list($goods_id,$goods_id1,$kks) = $ledger_obj->lookLedger($account_id);
					?>
                                        <input type="button" value="返回上一页面"style="width:100%" onclick="Javascript:window.history.back()" ></input>
				</div>
				<div class="card">
					<input onclick="showBox('hidden_box')" type="button" value="点我显示/或隐藏校验记录"/>
<?php
		$conn = mysqli_connect('localhost','root','dk1314lich,forever!','db_rekong');
		$tb_report_sql = 'SELECT * FROM tb_FeederReport where report_account_id='.$_GET['id'];
		$tb_report_result = mysqli_query($conn, $tb_report_sql);
		$tb_report_arr=mysqli_fetch_assoc($tb_report_result);
					echo '最近一次校验日期：'.$tb_report_arr['report_date'];
		if(file_exists("../../data/report/FeederReport/".$_GET['id'].".pdf")){
			echo "<a href='../../data/report/FeederReport/".$_GET['id'].".pdf'target='_blank'>点击查看已生成的校验报告</a>";
		}else{
			echo "不存在该设备校验报告！";
		}
					
?>
					<div id="hidden_box" style="display:none">
					<!--------------添加设备备件信息---------------------->
						<?php
						include_once("../../lib/class/Report.class.php");
						$document_obj = new Report;
						$reportId = $document_obj->LookLedgerReport($_GET['id']);//检索栏
						echo "<center><a href='../../lib/fpdf/preview_report.php?id=".$reportId."&url=".$url."' target='_blank'>预览校验报告</a></center>";
		if(file_exists("../../data/report/FeederReport/".$_GET['id'].".pdf")){
			echo "<center><a href='../../lib/fpdf/save_report.php?id=".$reportId."' target='_blank'>生成校验报告（删除原来的校验报告）</a></center>";
		}else{
			echo "<center><a href='../../lib/fpdf/save_report.php?id=".$reportId."' target='_blank'>生成校验报告</a></center>";
		}
						//echo $reportId;
						?>
					</div>
				</div>
				<div class="card">
					<input onclick="showBox('hidden_box_goods')" type="button" value="点我显示/或隐藏相关备件"/>
					<div id="hidden_box_goods" style="display:none">
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
					$point_obj->showKKS($kks);
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
<?php 
					include("../../sidebar/ShowQRCode.php");
?>
				</div>
				<div class="card">
					<ul class="right">
						<li><a class="active" href='#'>查看</a></li>
						<li><a href='edit_content.php?id=<?php echo $account_id ?>'>编辑</a></li>
						<li><a href='../../data/report/edit_content.php?id=<?php echo $reportId ?>'>填写校验报告</a></li>
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
