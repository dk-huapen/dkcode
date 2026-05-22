<html>
	<head>
		<title>班组日志</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="../../diary_css/my_diary.css" />
		<script type="text/javascript" src='../../lib/com.js'> </script>
		<script type="text/javascript" src='../../lib/ajax_sql.js'> </script>
		<script type="text/javascript">
			function dosubmit(){
				document.getElementById("fieldset1").disabled=false;
				document.getElementById("fieldset2").disabled=false;
			}
		</script>
	</head>
	<body>
<!------------------------------------------------------------------------------表单验证-------------------------------------------------------------------------------->
		<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST"){
			include_once('../../lib/conn.php');
//获取add_job.php传递过来的数据
	$point_number = $_POST["point_number"];
	$point_spec = $_POST["point_spec"];
	$point_cabinet = $_POST["point_cabinet"];
	$point_rangelo = $_POST["point_rangelo"];
	$point_kks = $_POST["point_kks"];
	$point_type = $_POST["point_type"];
	$point_slot = $_POST["point_slot"];
	$point_rangehi = $_POST["point_rangehi"];
	$point_description = $_POST["point_description"];
	$module_type = $_POST["module_type"];
	$point_channel = $_POST["point_channel"];
	$point_unit = $_POST["point_unit"];
	$point_sys = $_POST["point_sys"];
	$point_pwr = $_POST["point_pwr"];
	$point_terminal = $_POST["point_terminal"];
	$point_relay = $_POST["point_relay"];
	$point_p_id = $_POST["point_p_id"];
	$point_loop = $_POST["point_loop"];
	$terminal_a = $_POST["terminal_a"];
	$terminal_b = $_POST["terminal_b"];
	$terminal_c = $_POST["terminal_c"];
	$point_remark = $_POST["point_remark"];
	$point_logs = $_POST["point_logs"];
//向tb_jobs数据库插入一条工作记录
	$sql = "UPDATE tb_point_table SET point_spec='".$point_spec."',point_cabinet='".$point_cabinet."',point_rangelo='".$point_rangelo."',point_kks='".$point_kks."',point_type='".$point_type."',point_slot='".$point_slot."',point_rangehi='".$point_rangehi."',point_description='".$point_description."',module_type='".$module_type."',point_channel='".$point_channel."',point_unit='".$point_unit."',point_sys='".$point_sys."',point_pwr='".$point_pwr."',point_terminal='".$point_terminal."',point_relay='".$point_relay."',point_p_id='".$point_p_id."',point_loop='".$point_loop."',terminal_a='".$terminal_a."',terminal_b='".$terminal_b."',point_remark='".$point_remark."' WHERE point_number=".$point_number;
	echo $sql;
	if(mysqli_query($conn,$sql)){
	mysqli_close($conn);
                        echo "<script>alert('更新成功！！');location='look_content.php?id=".$point_number."'</script>";
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
					<h2><center>编辑点详细<center></h2>
					<?php
					$point_id = $_GET['id'];
					include_once("../../lib/class/Point.class.php");
					$point_obj = new Point;
					?>
					<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return dosubmit()">
						<?php
						$point_obj->editPoint($point_id);
						?>
                                        	<input type="submit"style="width:100%" value="保存"/>
					</form>
				</div>
			</div>
			<div class="rightcolumn">
				<div class="card">
					<?php include("../../sidebar/ShowQRCode.php") ?>
				</div>
				<div class="card">
					<ul class="right">
						<li><a href='look_content.php?id=<?php echo $point_id ?>'>查看</a></li>
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
