<html>
	<head>
		<?php include("header.php") ?>
	</head>
	<body>
<!------------------------------------------------------------------------------表单验证-------------------------------------------------------------------------------->
		<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST"){
	include_once('../../lib/conn.php');
//获取add_job.php传递过来的数据
	$work_ticket_number = $_POST["work_ticket_number"]; 
	$work_ticket_content = $_POST["work_ticket_content"]; 
	$work_begain_people = $_POST["work_begain_people"]; 
	$work_begain_time = $_POST["work_begain_time"]; 
	$work_ticket_type = $_POST["work_ticket_type"]; 
//	$work_end_people = $_POST["work_end_people"]; 
//	$work_end_time = $_POST["work_end_time"]; 
	$work_delay_time = $_POST["work_delay_time"]; 
	$work_ticket_specialty = $_POST["work_ticket_specialty"]; 
	$work_ticket_remarks = "过程：&#10&#10结果：&#10&#10"; 
	$work_begain_header = $_POST["work_begain_header"]; 
	$work_ticket_status = $_POST["work_ticket_status"]; 
	$work_end_header = $_POST["work_begain_header"]; 
	$diary_id = $_POST["diary_id"]; 
	$work_type = $_POST["work_type"]; 
//向tb_jobs数据库插入一条工作记录
	$sql = "INSERT INTO tb_work_ticket(work_ticket_number,work_ticket_content,work_begain_people,work_begain_time,work_ticket_type,work_delay_time,work_ticket_specialty,work_begain_header,work_end_header,work_ticket_status,diary_id,work_type,work_ticket_remarks) VALUES ('$work_ticket_number','$work_ticket_content','$work_begain_people','$work_begain_time','$work_ticket_type','$work_delay_time','$work_ticket_specialty','$work_begain_header','$work_end_header','$work_ticket_status','$diary_id','$work_type','$work_ticket_remarks')";
	if(mysqli_query($conn,$sql)){
	//	echo "插入成功";	
	mysqli_close($conn);
                        echo "<script>alert('添加成功！！');location='work_ticket.php'</script>";
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
					<h2><center>新增工作票<center></h2>
					<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						<?php
						include_once("../../lib/class/Workticket.class.php");
						$workTicket_obj = new workTicket;
						$workTicket_obj->addWorkTicket();
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
						<li><a class="active" href='#'>新增</a></li>
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
