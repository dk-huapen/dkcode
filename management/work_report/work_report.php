<html>
	<head>
		<?php include("header.php") ?>
	</head>
	<body >
		<div class="header">
			<h1>热控班组管理平台</h1>
		</div>
		<div class="topnav">
			<?php include("../../lib/topnav/topnav.php") ?>
		</div>
		<div class="row">
			<div class="leftcolumn">
				<div class="card">
<?php
	$first_day_of_month = date('Y-m-01');
	$first_day_of_month_week = date('W',strtotime($first_day_of_month));
	$current_week = date('W') - $first_day_of_month_week + 1;
	$m = date('M');
echo "<center><h2>热控班".$m."月份第".$current_week."周管理周报</h2></center>";
?>
<?php
	if(date("w")==1){
			$first_day = strtotime("monday");
	}else{
			$first_day = strtotime("last monday");
		}
			$first_time = date("Y-m-d",$first_day);
			$begain=strtotime($first_time." - 2 day");
			$begain_time=date("Y-m-d",$begain);
			$end=strtotime($first_time." + 4 day");
			$end_time=date("Y-m-d", $end);

			$time1=date("Y年m月d日",$begain);

			$time2=date("Y年m月d日",$end);



	$sql = "SELECT * FROM `tb_diary` WHERE createtime='".$begain_time."'";
	$result = mysqli_query($conn, $sql);
	$diary_arr=mysqli_fetch_assoc($result);
	$begain_id = $diary_arr['diary_id'];
	$sql = "SELECT * FROM `tb_diary` WHERE createtime='".$end_time."'";
	echo $time1."-".$time2;
?>
<h3>一、设备概况</h3>
<h4>1、巡检中发现的问题</h4>
						<?php
						include_once("../../lib/class/Job.class.php");
						$job_obj = new Job;
						$job_obj->reportSelect(40,10);
						echo "<h4>2、设备目前存在的问题</h4>";
						$job_obj->reportSelect(20,21);
?>
</div>
				<div class="card">
<h3>二、本周计划工作完成情况（包含定期工作）</h3>
<?php
						echo "<h4>1、本周重点工作</h4>";
						$job_obj->reportSelect(40,0);
						echo "<h4>2、本周定期工作</h4>";
						$job_obj->reportSelect(40,2);
						echo "<h4>3、本周未完成工作</h4>";
						$job_obj->reportSelect(10,2);
						$job_obj->reportSelect(10,0);
?>
</div>
				<div class="card">
<h3>六、本周设备管理分析</h3>
<?php
						include_once("../../lib/class/Analysis.class.php");
						include_once("../../lib/class/Defect.class.php");
						echo "本周设备管理分析";
						echo "<h4>1、缺陷分析</h4>";
						$defect_obj = new Defect;
						$defect_obj->reportDefect(1);
						echo "<h4>2、重点缺陷分析</h4>";
						$ana_obj = new Analysis;
						$ana_obj->reportAnalysis(1);
?>
</div>
				<div class="card">
<h3>八、培训情况</h3>
<?php
						echo "<h4>1、本周培训</h4>";
						$job_obj->reportSelect(40,12);
						$job_obj->reportSelect(40,13);
						echo "<h4>2、下周培训</h4>";
						$job_obj->reportSelect(30,12);
						$job_obj->reportSelect(30,13);
?>
</div>
				<div class="card">
<h3>九、下周工作计划</h3>
<?php
						echo "<h4>1、下周重点工作</h4>";
						$job_obj->reportSelect(30,0);
						echo "<h4>2、下周定期工作</h4>";
						$job_obj->reportSelect(30,2);
						?>
				</div>
						<center><a href='../../lib/fpdf/preview_work.php' target="_blank">预览周报</a></center>
			</div>
			<div class="rightcolumn">
				<div class="card">
					<?php include("../../sidebar/ShowQRCode.php") ?>
				</div>
				<div class="card">
					<ul class="right">
						<li><a href="quick_select_job.php?id=10">当天工作</a></li>
						<li><a href="quick_select_job.php?id=20">昨天工作</a></li>
						<li><a href="quick_select_job.php?id=30">本周工作</a></li>
						<li><a href="quick_select_job.php?id=40">上周工作</a></li>
						<li><a href="quick_select_job.php?id=50">本月工作</a></li>
						<li><a href="quick_select_job.php?id=60">上月工作</a></li>
						<li><a href='add_job.php'>增加工作</a></li>
						<li><a href='add_standard_job.php'>增加标准工作</a></li>
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
