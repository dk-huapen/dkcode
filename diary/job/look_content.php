<html>
	<head>
		<?php include("header.php") ?>
		<script type="text/javascript" src='../../lib/com.js'> </script>
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
					<h2><center>编辑工作<center></h2>
					<?php
					$ledger_id = $_GET['id'];
						include_once("../../lib/class/Job.class.php");
						$job_obj = new Job;
					?>
						<?php
						list($analysis_id,$job_type,$job_area) = $job_obj->lookJob($ledger_id);
						?>
                                        	<input type="button" value="返回上一页面"style="width:100%" onclick="Javascript:window.history.back()" ></input>
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
						<li><a class="active" href='#'>查看</a></li>
						<li><a href='./edit_content.php?id=<?php echo $ledger_id ?>'>编辑</a></li>
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
