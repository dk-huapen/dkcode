<html>
	<head>
		<title>备件清单</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="../../diary_css/my_diary.css" />
		<script src="../../lib/page.js"></script>
	</head>
	<body>
<!------------------------------------------------------------------------------表单验证-------------------------------------------------------------------------------->
		<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST"){
		include_once('../lib/conn.php');
	date_default_timezone_set('PRC');
        $time = date("Y-m-d H:i:s");
	$timee = $time; 
//获取add_job.php传递过来的数据
	$memo_id =$_POST["memo_id"];
	$memo_content = $_POST["memo_content"]; 
	$memo_status = $_POST["memo_status"]; 
	$memo_details = $_POST["memo_details"]; 
	$memo_type = $_POST["memo_type"]; 
	$memo_remarks = $_POST["memo_remarks"]; 
	$memo_update_time = $timee;; 
	//$memo_update_time = $_POST["memo_update_time"]; 
//向tb_jobs数据库插入一条工作记录
	//$sql = "INSERT INTO tb_memo(memo_content,memo_status,memo_details,memo_type,memo_update_time) VALUES ('$memo_content','$memo_status','$memo_details','$memo_type','$memo_update_time')";
	$sql = "UPDATE tb_memo SET memo_content='".$memo_content."',memo_remarks='".$memo_remarks."',memo_status='".$memo_status."',memo_details='".$memo_details."',memo_type='".$memo_type."',memo_update_time='".$memo_update_time."' WHERE memo_id=".$memo_id;
	echo $sql;
	if(mysqli_query($conn,$sql)){
	//	echo "插入成功";	
	mysqli_close($conn);
                        echo "<script>alert('更新成功！！');location='memo.php'</script>";
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
			<?php include("../../lib/topnav/topnav.php") ?>
		</div>
		<div class="row">
			<div class="leftcolumn">
				<div class="card">
					<h2><center>工作票登记<center></h2>
					<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						<?php
						include_once("../../lib/class/Memo.class.php");
						$id = $_GET['id'];
						$memo_obj = new Memo;
						$memo_obj->editMemo($id);
						?>
               					<input type='submit'style='width:100%' value='保存'/>
					</form>
				</div>
			</div>
			<div class="rightcolumn">
				<div class="card">
					<ul class="right">
						<li><a class="active" href='#'>备件清单</a></li>
						<li><a href='../inventory/inventory.php'>库存清单</a></li>
						<li><a href='../record/purchase_record.php'>采购计划</a></li>
						<li><a href='../record/record.php'>记录清单</a></li>
						<li><a href="add_memo.php">新增备忘</a></li>
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
