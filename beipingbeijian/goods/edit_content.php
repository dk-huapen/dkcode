<html>
	<head>
		<title>物资信息</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="../../diary_css/my_diary.css" />
		<script type="text/javascript" src='../../lib/com.js'> </script>
		<script type="text/javascript">
			function dosubmit(){
				document.getElementById("fieldset").disabled=false;
			}
		</script>
	</head>
	<body>
<!------------------------------------------------------------------------------表单验证-------------------------------------------------------------------------------->
		<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST"){
	include_once('../../lib/conn.php');
//获取edit_job.php传递过来的数据
	$goods_id = $_POST["goods_id"]; 
	$goods_name = $_POST["goods_name"]; 
	$goods_category = $_POST["goods_category"]; 
	$goods_use = $_POST["goods_use"]; 
	$goods_modle = $_POST["goods_modle"]; 
	$goods_type = $_POST["goods_type"]; 
	$goods_main_parameters = $_POST["goods_main_parameters"]; 
	$goods_parameters = $_POST["goods_parameters"]; 
	$goods_manufacturers = $_POST["goods_manufacturers"]; 
	$goods_remarks = $_POST["goods_remarks"]; 
	$goods_price = $_POST["goods_price"]; 
	$goods_childs = $_POST["goods_childs"]; 


//向tb_jobs数据库插入一条工作记录
	$sql = "UPDATE tb_goods SET goods_name='".$goods_name."',goods_category='".$goods_category."',goods_use='".$goods_use."',goods_modle='".$goods_modle."',goods_type='".$goods_type."',goods_main_parameters='".$goods_main_parameters."',goods_parameters='".$goods_parameters."',goods_manufacturers='".$goods_manufacturers."',goods_remarks='".$goods_remarks."',goods_price='".$goods_price."',goods_childs='".$goods_childs."' WHERE goods_id=".$goods_id;
	if(mysqli_query($conn,$sql)){
	//	echo "插入成功";	
	mysqli_close($conn);
                        echo "<script>alert('更新成功！！');location='goods.php'</script>";
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
					<h2><center>编辑备件信息<center></h2>
					<?php
						$goods_id=$_GET['id'];
					?>
					<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"onsubmit="return dosubmit()">
						<?php
						include_once("../../lib/class/Goods.class.php");
						$goods_obj = new Goods;
						list($equipment_goods_arry_id,$equipment_group_design_id)=$goods_obj->editGoods($goods_id);//检索栏
						?>
                                       		<input type="submit" style="width:100%" value="保存"/>
					</form>
				</div>
				<div class="card">
					<fieldset>
						<legend style="border:1px">上传备件图片</legend>
						<form action="upload_file.php?submit=on" method="post" enctype="multipart/form-data">
    							<label for="file">文件名：</label>
    							<input type="file" name="filename" id="filename">
							<input type="hidden" name="work_ticket_id" size="3" value="<?php echo $goods_id?>"/>
							<input type="hidden" name="work_ticket_number" size="3" value="<?php echo $goods_id?>"/>
    							<input type="submit" name="submit" value="上传">     <span style="color:red">注意：最大上传2M的图片,有五角星表示该备件照片已存在，可直接点击查看！</span>
						</form>
						<?php
							$goodsImageDir = $_SERVER['DOCUMENT_ROOT']."/my_data/image/goodsImg/";
						$url= "/my_data/image/goodsImg/".$goods_id.'/'.$goods_id.'_dnt.webp';
						$picurl= base_url($url);
						$file=$goodsImageDir.$goods_id.'/'.$goods_id.'_dnt.webp';
						echo $file;
						if(file_exists($file)){
							echo "&#9733";
						}
						?>
					</fieldset>
					<input onclick="showBox('hidden_box')" type="button" value="点我显示/或隐藏相关备件"></input>
					<?php
					if(file_exists($file)){
						//echo "<input onclick=\"showImage('hidden_img','myimage','".$url."')\" type='button' value='点我显示/或隐藏图片'/>";
						echo "<input onclick=\"showImage('hidden_img','myimage','".$picurl."')\" type='button' value='点我显示/或隐藏图片'/>";
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
					<ul class="right">
						<li><a href='./look_content.php?id=<?php echo $goods_id ?>'>查看</a></li>
						<li><a class="active" href='#'>编辑</a></li>
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
			<!--页脚-->
			<?php include("../../lib/footer/footer.php")?>
		</div>
	</body>
</html>
