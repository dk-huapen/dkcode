<html>
	<head>
		<title>班组日志</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="../../diary_css/my_diary.css" />
	</head>
	<body>
<!------------------------------------------------------------------------------表单验证-------------------------------------------------------------------------------->
		<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST"){
			include_once('../../lib/conn.php');
			$part_remarks = $_POST["part_remarks"]; 
			$goods_id = $_POST["goods_id"]; 
			$part_system = $_POST["part_system"]; 
			$part_check_people = $_POST["part_check_people"]; 

			$part_price = $_POST["part_price"]; 
			$part_status = 5; 
			$part_come_number = $_POST["part_come_number"]; 
			$part_check_time = $_POST["part_check_time"]; 
/***********************************************************************************************/
			$part_source = 3; 
			$part_declare_number = 0; 
			$part_come_time = "0000-00-00"; 
			$part_need_time = "0000-00-00"; 
			$part_declare_people = -1; 
			$part_declare_time = "0000-00-00"; 
/***********************************************************************************************/
			$tb_inventory_sql = 'SELECT count(*) FROM tb_inventory WHERE inventory_status=1 AND goods_id='.$goods_id;
			$tb_inventory_result = mysqli_query($conn, $tb_inventory_sql);
			$inventory_result=mysqli_fetch_row($tb_inventory_result);
			$result=$inventory_result[0];
			if($result>0){
				$inventory_number=$_POST["part_come_number"];
				$inventory_sql = "UPDATE tb_inventory SET inventory_number=inventory_number+'".$inventory_number."' WHERE inventory_status=1 AND goods_id=".$goods_id;
			}else{
				$inventory_number=$_POST["part_come_number"];
				$inventory_price=$_POST["part_price"];
				$inventory_status=1;
				$inventory_remarks="备注";
				$inventory_sql = "INSERT INTO tb_inventory(goods_id,inventory_number,inventory_price,inventory_status,inventory_remarks) VALUES ('$goods_id','$inventory_number','$inventory_price','$inventory_status','$inventory_remarks')";
			}
			$check_sql = "UPDATE tb_inventory SET inventory_number=inventory_number-'".$inventory_number."' WHERE inventory_status=3 AND goods_id=".$goods_id;
			$sql = "INSERT INTO tb_sparepart(part_declare_number,part_need_time,part_remarks,part_declare_people,part_declare_time,goods_id,part_system,part_come_time,part_check_people,part_price,part_status,part_come_number,part_source,part_check_time) VALUES ('$part_declare_number','$part_need_time','$part_remarks','$part_declare_people','$part_declare_time','$goods_id','$part_system','$part_come_time','$part_check_people','$part_price','$part_status','$part_come_number','$part_source','$part_check_time')";
			if(mysqli_query($conn,$check_sql)&&mysqli_query($conn,$sql)&&mysqli_query($conn,$inventory_sql)){
				mysqli_close($conn);
                        	echo "<script>alert('添加成功！！');location='inventory.php'</script>";
			}else{
                		echo "<script>alert('添加失败！！');</script>";
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
			<?php include("../../lib/look_goods.php") ?>
			<?php include("../../lib/topnav/topnav.php") ?>
		</div>
		<div class="row">
			<div class="leftcolumn">
				<div class="card">
					<h2><center>大库 &rarr; 小库出口表单<center></h2>
					<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						<?php
						$inventory_id=$_GET['id'];
						include_once("../../lib/class/Inventory.class.php");
						$inventory_obj = new Inventory;
						$goods_id = $inventory_obj->storeIn($inventory_id);
						?>
                                        	<input type="submit"style="width:100%" value="保存"/>
					</form>
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
<li><a href='look_content.php?id=<?php echo $tb_account_arr['account_id'] ?>'>查看</a></li>
<li><a class="active" href='#'>编辑</a></li>
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
