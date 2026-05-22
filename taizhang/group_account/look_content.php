<html>
	<head>
		<?php include("header.php") ?>
		<script type="text/javascript" src='../../lib/com.js'> </script>
		<script type="text/javascript" src='../../lib/ajax_sql.js'> </script>
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
					<h2><center>编辑设备台账组信息<center></h2>
							<?php
							$GroupId = $_GET['id'];
							include_once("../../lib/class/Group.class.php");
							$group_obj = new Group;
							list($group_goods_arry_id,$group_ledger_arry_id,$equipment_group_design_id) = $group_obj->lookGroup($GroupId);//检索栏
							?>
                                        		<input type="button" value="返回上一页面"style="width:100%" onclick="Javascript:window.history.back()" ></input>
				</div>
				<?php
				echo "<div class='card'>";
					include_once("../../lib/class/Ledger.class.php");
					$ledger_obj = new Ledger;
					$ledger_obj->showStrId($group_ledger_arry_id);//检索栏
				echo "</div>";
?>
				<div class="card">
					<input onclick="showBox('hidden_box')" type="button" value="点我显示/或隐藏CEMS检查记录"/>
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
					<br>
					<input onclick="window.open('../../data/report/edit_content.php?id=21')" type="button" value="填写粉尘仪检查记录"/>
					<input onclick="window.open('../../data/report/edit_content.php?id=22')" type="button" value="填写硫氮湿度检查记录"/>
					<div id="hidden_box" style="display:none">
					<!--------------添加设备备件信息---------------------->
						<?php
						include_once("../../lib/class/Report.class.php");
						$document_obj = new Report;
						$reportId = $document_obj->LookLedgerReport($_GET['id']);//检索栏
						echo "<center><a href='../../lib/fpdf/preview_report.php?id=".$reportId."' target='_blank'>预览校验报告</a></center>";
		if(file_exists("../../data/report/FeederReport/".$_GET['id'].".pdf")){
			echo "<center><a href='../../lib/fpdf/save_report.php?id=".$reportId."' target='_blank'>生成校验报告（删除原来的校验报告）</a></center>";
		}else{
			echo "<center><a href='../../lib/fpdf/save_report.php?id=".$reportId."' target='_blank'>生成校验报告</a></center>";
		}
						//echo $reportId;
						?>
					</div>
				</div>
<?php
				echo "<div class='card'>";
					include_once("../../lib/class/Document.class.php");
					$document_obj = new Document;
					$document_obj->showStrId($equipment_group_design_id);//检索栏
				echo "</div>";
				?>
				<div class="card">
					<input onclick="showBox('hidden_box')" type="button" value="点我显示/或隐藏相关备件"/>
						<div id="hidden_box" style="display:none">
						<center><h4>备件清单</h4></center>
						<?php
						include_once("../../lib/class/Goods.class.php");
						$goods_obj = new Goods;
						$arr=explode('@',$group_goods_arry_id);
						for($x=0;$x<count($arr);$x++){
							list($goods_arry_id,$group_design_id)=$goods_obj->lookGoods($arr[$x]);//查看物品信息
							echo $goods_arry_id;
							if(strlen($goods_arry_id)){
								$arrchild=explode('@',$goods_arry_id);
								for($y=0;$y<count($arrchild);$y++){
									$goods_obj->lookGoods($arrchild[$y]);
								}
							}
						}
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
					<li><a href='edit_content.php?id=<?php echo $GroupId ?>'>编辑</a></li>
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
