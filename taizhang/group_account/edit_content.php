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
//获取add_job.php传递过来的数据
	$account_group_id = $_POST["account_group_id"];
	$equipment_area_id = $_POST["equipment_area_id"]; 
	$equipment_goods_arry=$_POST["equipment_goods_arry"];
	$equipment_group_design_id = $_POST["equipment_group_design_id"]; 
	$equipment_group_kks = $_POST["equipment_group_kks"]; 
	$equipment_group_name = $_POST["equipment_group_name"]; 
	$equipment_group_position = $_POST["equipment_group_position"]; 
	$equipment_group_remarks = $_POST["equipment_group_remarks"]; 
	$equipment_group_remarks1 = $_POST["equipment_group_remarks1"]; 
	$equipment_group_status = $_POST["equipment_group_status"]; 
	$equipment_system_id = $_POST["equipment_system_id"]; 
	$equipment_group_arry=$_POST["equipment_group_arry"];
//向tb_jobs数据库插入一条工作记录
	$sql = "UPDATE tb_account_group SET equipment_area_id='".$equipment_area_id."',equipment_goods_arry='".$equipment_goods_arry."',equipment_group_arry='".$equipment_group_arry."',equipment_group_design_id='".$equipment_group_design_id."',equipment_group_kks='".$equipment_group_kks."',equipment_group_name='".$equipment_group_name."',equipment_group_position='".$equipment_group_position."',equipment_system_id='".$equipment_system_id."',equipment_group_remarks='".$equipment_group_remarks."',equipment_group_remarks1='".$equipment_group_remarks1."',equipment_group_status='".$equipment_group_status."' WHERE account_group_id=".$account_group_id;
	echo $sql;
	if(mysqli_query($conn,$sql)){
	//	echo "插入成功";	
	mysqli_close($conn);
                        echo "<script>alert('更新成功！！');location='group.php'</script>";
	}else{
                echo "<script>alert('更新失败！！');</script>";
		echo "插入失败:". mysqli_error($conn);
	mysqli_close($conn);
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
					<h2><center>编辑设备台账组信息<center></h2>
						<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return dosubmit()">
							<?php
							$GroupId = $_GET['id'];
							include_once("../../lib/class/Group.class.php");
							$group_obj = new Group;
							list($group_goods_arry_id,$group_ledger_arry_id,$equipment_group_design_id) = $group_obj->editGroup($GroupId);//检索栏
							?>
							<input style="width:100%"type="submit" value="保存"/>
						</form>
				</div>
				<?php
				echo "<div class='card'>";
					include_once("../../lib/class/Ledger.class.php");
					$ledger_obj = new Ledger;
					$ledger_obj->showStrId($group_ledger_arry_id);//检索栏
				echo "</div>";
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
					<li><a href='look_content.php?id=<?php echo $GroupId ?>'>查看</a></li>
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
