<html>
	<head>
		<?php include("header.php") ?>
		<script type="text/javascript" src='../../lib/com.js'> </script>
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
	$work_ticket_id = $_POST["work_ticket_id"]; 
	$work_ticket_number = $_POST["work_ticket_number"]; 
	$work_ticket_content = $_POST["work_ticket_content"]; 
	$work_begain_people = $_POST["work_begain_people"]; 
	$work_begain_time = $_POST["work_begain_time"]; 
	$work_ticket_type = $_POST["work_ticket_type"]; 
	$work_end_people = $_POST["work_end_people"]; 
	$work_end_time = $_POST["work_end_time"]; 
	$work_delay_time = $_POST["work_delay_time"]; 
	$work_ticket_specialty = $_POST["work_ticket_specialty"]; 
	$work_ticket_remarks = $_POST["work_ticket_remarks"]; 
	$work_begain_header = $_POST["work_begain_header"]; 
	$work_ticket_status = $_POST["work_ticket_status"]; 
	$work_end_header = $_POST["work_end_header"]; 
	$diary_id = $_POST["diary_id"]; 
	$work_type = $_POST["work_type"]; 
//向tb_jobs数据库插入一条工作记录
	$sql = "UPDATE tb_work_ticket SET work_ticket_number='".$work_ticket_number."',work_ticket_content='".$work_ticket_content."',work_begain_people='".$work_begain_people."',work_begain_time='".$work_begain_time."',work_ticket_type='".$work_ticket_type."',work_end_people='".$work_end_people."',work_end_time='".$work_end_time."',work_delay_time='".$work_delay_time."',work_ticket_specialty='".$work_ticket_specialty."',work_ticket_remarks='".$work_ticket_remarks."',work_begain_header='".$work_begain_header."',work_ticket_status='".$work_ticket_status."',work_end_header='".$work_end_header."',diary_id='".$diary_id."',work_type='".$work_type."' WHERE work_ticket_id=".$work_ticket_id;
	echo $sql;
	if(mysqli_query($conn,$sql)){
	//	echo "插入成功";	
	mysqli_close($conn);
                        echo "<script>alert('修改成功！！');location='work_ticket.php'</script>";
	}else{
                echo "<script>alert('修改失败！！');</script>";
		echo "修改失败:". mysqli_error($conn);
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
					<h2><center>编辑工作票<center></h2>
					<?php
					$work_ticket_id = $_GET['id'];
					include_once("../../lib/class/Workticket.class.php");
					$workTicket_obj = new workTicket;
					?>
					<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return dosubmit()">
						<?php
						$work_ticket_number = $workTicket_obj->editWorkTicket($work_ticket_id);
						?>
                                        	<input type="submit"style="width:100%" value="保存"/>
					</form>

					<fieldset>
						<form action="upload_file.php?submit=on" method="post" enctype="multipart/form-data">
							<legend style="border:1px">上传工作票图片</legend>
    								<label for="file">文件名：</label><input type="file" name="filename" id="filename"></input>
								<input type="hidden" name="work_ticket_id" size="3" value="<?php echo $tb_work_ticket_arr['work_ticket_id']?>"/>
								<input type="hidden" name="work_ticket_number" size="3" value="<?php echo $tb_work_ticket_arr['work_ticket_number']?>"/>
    								<input type="submit" name="submit" value="上传">
						</form>
						<?php
						echo "<input onclick=\"showImage('hidden_img','myimage','img/".$work_ticket_number.".jpg')\" type='button' value='点我显示/或隐藏工作票图片'/>";
						?>
					</fieldset>
				</div>
				<div class="card">
					<fieldset>
						<legend style="border:1px">工作票图片</legend>
					<div id="hidden_img" style="display:none">
						<img id='myimage' src="" style='width:100%' alt='未上传该工作票图片'/>
					</div>
					</fieldset>
				</div>
			</div>
			<div class="rightcolumn">
				<div class="card">
					<?php include("../../sidebar/ShowQRCode.php") ?>
				</div>
				<div class="card">
					<ul class="right">
						<li><a href='add_work_ticket.php'>新增</a></li>
						<li><a href='look_work_ticket.php'>查看</a></li>
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
