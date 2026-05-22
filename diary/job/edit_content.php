<html>
	<head>
		<?php include("header.php") ?>
		<script type="text/javascript" src='../../lib/com.js'> </script>
	</head>
	<body>
<!------------------------------------------------------------------------------表单验证-------------------------------------------------------------------------------->
		<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST"){
			include_once('../../lib/conn.php');
			date_default_timezone_set('PRC');
        		$time = date("Y-m-d H:i:s");
			$timee = $time; 
			$job_id = $_POST["job_id"]; 
			$job_area = $_POST["job_area"]; 
			$job_system = $_POST["job_system"]; 
			$job_content = $_POST["job_content"]; 
			$job_people = $_POST["job_people"]; 
			$job_status = $_POST["job_status"]; 
			$job_notes = $_POST["job_notes"]; 
			$job_header = $_POST["job_header"]; 
			$job_type = $_POST["job_type"]; 
			$diary_id = $_POST["diary_id"]; 
			$job_work_ticket_id = $_POST["job_work_ticket_id"]; 
			$analysis_id = $_POST["analysis_id"];
			$job_remarks = $_POST["job_remarks"]; 
			$job_account_id = $_POST["job_account_id"]; 
			$job_deadtime = $_POST["job_deadtime"]; 
			$sql = "UPDATE tb_jobs SET job_content='".$job_content."',job_people='".$job_people."',job_status='".$job_status."',job_notes='".$job_notes."',diary_id='".$diary_id."',job_header='".$job_header."',job_type='".$job_type."',job_area='".$job_area."',job_system='".$job_system."',job_work_ticket_id='".$job_work_ticket_id."',analysis_id='".$analysis_id."',job_remarks='".$job_remarks."',job_deadtime='".$job_deadtime."',job_account_id='".$job_account_id."' WHERE job_id=".$job_id;
			$num=mysqli_query($conn,$sql);
			if($num>0){
				if($job_type==2 && $job_status==3){
					$sql = "select standard_job_cycle from tb_standard_jobs where standard_job_id =".$analysis_id;
					$tb_result = mysqli_query($conn, $sql);
					$tb_arr=mysqli_fetch_assoc($tb_result);
					$size = $tb_arr['standard_job_cycle'];
					$todata=date('Y-m-d',strtotime($job_deadtime.'+'.$size.'day'));
					$diary_id = -1;
					$job_people = ''; 
					$job_status = 1; 
					$job_notes = ''; 
					$job_header = -1; 
					$job_type = 2; 
					$job_work_ticket_id = -1; 
					$job_remarks = ''; 
					$job_deadtime = $todata;
					$sql = "INSERT INTO tb_jobs(job_content,job_header,job_people,job_status,job_notes,job_type,diary_id,job_deadtime,job_area,job_system,job_work_ticket_id,job_remarks,analysis_id) VALUES ('$job_content','$job_header','$job_people','$job_status','$job_notes','$job_type','$diary_id','$job_deadtime','$job_area','$job_system','$job_work_ticket_id','$job_remarks',$analysis_id)";
					if(mysqli_query($conn,$sql)){
						mysqli_close($conn);
                        			echo "<script>alert('更新成功，并添加下次定期工作！！下次定期时间".$job_deadtime."');location='job.php'</script>";
                        			//echo "<script>alert('更新成功，并添加下次定期工作！！下次定期时间".$job_deadtime."');history.go(-2)</script>";
					}else{
                				echo "<script>alert('更新成功，添加下次定期工作失败！！');</script>";
						echo "更新成功，并添加下次定期工作失败！！:". mysqli_error($conn);
						mysqli_close($conn);
					}
				}else{
					mysqli_close($conn);
                        		//echo "<script>alert('更新成功！！');location='job.php'</script>";
                        		echo "<script>alert('更新成功！！');history.go(-2)</script>";
                        	//	echo "<script>alert('更新成功！！');location='history.go(-2).'</script>";
				}
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
					<h2><center>编辑工作<center></h2>
					<?php
					$ledger_id = $_GET['id'];
						include_once("../../lib/class/Job.class.php");
						$job_obj = new Job;
					?>
					<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						<?php
						list($analysis_id,$job_type,$job_area) = $job_obj->editJob($ledger_id);
						?>
                                        	<input type="submit" style="width:100%" value="保存"/>
					</form>
			</div>
				<div class="card">
					<input onclick="showBox('hidden_box')" type="button" value="点我显示/或隐藏缺陷分析"/>
					<div id="hidden_box" style="display:none">
						<?php
						if($job_type==1 || $job_type==2){
							include_once("../../lib/class/StandardJob.class.php");
							$standardjob_obj = new StandardJob;
							$standardjob_obj->lookStandardJob($analysis_id);
						}else{
							include_once("../../lib/class/Analysis.class.php");
							$analysis_obj = new Analysis;
							$analysis_obj->lookAnalysis($analysis_id);
						}
						?>
					</div>
				</div>
				<?php
				if($job_type==2){
					echo "<div class='card'>";
						include_once("../../lib/class/Job.class.php");
						$job_obj = new Job;
						$job_obj->ListStandardJob($analysis_id,$job_area);//检索栏
					echo "</div>";
				}	
				?>
			</div>
			<div class="rightcolumn">
				<div class="card">
					<?php include("../../sidebar/ShowQRCode.php") ?>
				</div>
				<div class="card">
					<ul class="right">
						<li><a href='./look_content.php?id=<?php echo $ledger_id ?>'>查看</a></li>
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
