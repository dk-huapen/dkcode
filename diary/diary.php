<!--文件名：diary.php-->
<!--作者：dk_huapen-->
<!--功能描述：网站首页，介绍该网站做什么，包含哪些功能模块及各模块功能-->
<!--修改人：dk_huapen-->
<!--修改时间：2022年04月15日-->
<!--修改内容：增加代码注释，统一缩进方便代码折叠-->
<html>
	<head>
		<!--网站标题-->
		<title>班组日志</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="../diary_css/my_diary.css" />
		<script type="text/javascript" src='../lib/page.js'> </script>
		<script type="text/javascript" src='../lib/ajax_sql.js'> </script>
    <style type="text/css">
        table.gridtable {
            font-family: verdana,arial,sans-serif;
            font-size:11px;
            color:#333333;
            border-width: 1px;
            border-color: #666666;
            border-collapse: collapse;
        }
        table.gridtable th {
            border-width: 1px;
            padding: 8px;
            border-style: solid;
            border-color: #666666;
            background-color: #dedede;
        }
        table.gridtable td {
            border-width: 1px;
            padding: 8px;
            border-style: solid;
            border-color: #666666;
            background-color: #ffffff;
        }
    </style>
	</head>
	<body>
<!------------------------------------------------------------------------------表单验证-------------------------------------------------------------------------------->
		<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST"){
	include_once('../lib/conn.php');
	/*********************************************************************************/
	$name1 = $_POST['uname1']|$_POST['dname1'];
	$name2 = $_POST['uname2']|$_POST['dname2'];
	$name3 = $_POST['uname3']|$_POST['dname3'];
	$name4 = $_POST['uname4']|$_POST['dname4'];
	$name5 = $_POST['uname5']|$_POST['dname5'];
	$name6 = $_POST['uname6']|$_POST['dname6'];
	$name7 = $_POST['uname7']|$_POST['dname7'];
	$name8 = $_POST['uname8']|$_POST['dname8'];
	$name9 = $_POST['uname9']|$_POST['dname9'];
	$name10 = $_POST['uname10']|$_POST['dname10'];
	$name11 = $_POST['uname11']|$_POST['dname11'];
	$name12 = $_POST['uname12']|$_POST['dname12'];
	$name13 = $_POST['uname13']|$_POST['dname13'];
	$header = $_POST['header'];
	$duty = $_POST['duty'];
	/*********************************************************************************/
        $diary_before = $_POST['before'];
        $diary_after = $_POST['after'];
        $diary_temporary = $_POST['temporary'];
        $diary_temporary_done = $_POST['temporary_done'];
        $diary_temporary_one = $_POST['temporary_one'];
	$diary_id=$_POST['diary_id'];
//	echo $_POST['save'];
	//$sql = "UPDATE tb_diary SET diary_before='".$diary_before."',diary_after='".$diary_after."'WHERE diary_id=".$diary_id;
	$sql = "UPDATE tb_diary SET diary_before='".$diary_before."',diary_after='".$diary_after."',name1=".$name1.",name2=".$name2.",name3=".$name3.",name4=".$name4.",name5=".$name5.",name6=".$name6.",name7=".$name7.",name8=".$name8.",name9=".$name9.",name10=".$name10.",name11=".$name11.",name12=".$name12.",name13=".$name13.",header=".$header.",duty=".$duty." WHERE diary_id=".$diary_id;
//	echo $sql;
	$sql_text = "UPDATE tb_text SET text1='".$diary_temporary."',text2='".$diary_temporary_one."',text3='".$diary_temporary_done."'WHERE text_id = 1";
	if(mysqli_query($conn,$sql)&&mysqli_query($conn,$sql_text)){
                        echo "<script>alert('更新日志成功！！')</script>";
	}else{
                echo "<script>alert('添加失败！！');</script>";
		echo "插入失败:". mysqli_error($conn);
	}
		}
		?>
<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->
		<div class="header">
			<h1>热控班组管理平台</h1>
		</div>
		<div class="topnav">
			<?php include("../lib/topnav/topnav.php") ?>
		</div>
		<div class="row">
			<div class="leftcolumn">
			<?php
			date_default_timezone_set('PRC');
        		$time = date("Y-m-d");
			include_once('../lib/conn.php');
			$sql = "SELECT * FROM `tb_diary` WHERE createtime='".$time."'";
			$result = mysqli_query($conn, $sql);
			if($diary_arr=mysqli_fetch_assoc($result)){
				$diary_id=$diary_arr['diary_id'];
			}else{
				$sql = "INSERT INTO `tb_diary` (createtime) VALUES ('$time')";
				if(mysqli_query($conn,$sql)){
				}else{
					echo "插入失败:". mysqli_error($conn);
				}
				$sql = "SELECT * FROM `tb_diary` WHERE createtime='".$time."'";
				$result = mysqli_query($conn, $sql);
				$diary_arr=mysqli_fetch_assoc($result);
				$diary_id=$diary_arr['diary_id'];
			}
			?>
				<form method="post" action="<?php echo htmlspecialchars(base_url($_SERVER["PHP_SELF"]));?>">
					<div class="card">
						<center>
						<table class="gridtable">
						<caption><h2><?php echo $time ?>日出勤表</h2></caption>
						<thead>
<tr><th></th>
<?php
		$tb_user_sql = "SELECT * FROM `tb_user` WHERE 1";
		$tb_user_result = mysqli_query($conn, $tb_user_sql);
		while($tb_user_arr=mysqli_fetch_assoc($tb_user_result)){
			if($tb_user_arr['user_id']<1 || $tb_user_arr['user_id']>13){
				continue;
			}
			echo "<th>".$tb_user_arr['user_name']."</th>";
		}
?>
</tr>
						</thead>
						<tfoot>
						<tr>
						<td colspan="14">
						班组负责人：
<select name='header' style='width:15%;padding:0 1%;' class='selectfont'>
<option selected='selected' disabled='disabled' style='display: none' value=''></option>
<?php
		$tb_user_sql = "SELECT * FROM `tb_user` WHERE 1";
		$tb_user_result = mysqli_query($conn, $tb_user_sql);
		while($tb_user_arr=mysqli_fetch_assoc($tb_user_result)){
			if($tb_user_arr['user_id']==$diary_arr['header']){
                          	echo "<option value=".$tb_user_arr['user_id']." selected='selected'>".$tb_user_arr['user_name']."</option>";
			}else{
                          	echo "<option value=".$tb_user_arr['user_id'].">".$tb_user_arr['user_name']."</option>";
			}
		}
?>
                                        </select>
班组值班人员：
<select name='duty' style='width:15%;padding:0 1%;' class='selectfont'>
<option selected='selected' disabled='disabled' style='display: none' value=''></option>
<?php
		$tb_user_sql = "SELECT * FROM `tb_user` WHERE 1";
		$tb_user_result = mysqli_query($conn, $tb_user_sql);
		while($tb_user_arr=mysqli_fetch_assoc($tb_user_result)){
			if($tb_user_arr['user_id']==$diary_arr['duty']){
                          	echo "<option value=".$tb_user_arr['user_id']." selected='selected'>".$tb_user_arr['user_name']."</option>";
			}else{
                          	echo "<option value=".$tb_user_arr['user_id'].">".$tb_user_arr['user_name']."</option>";
			}
		}
?>
                                        </select>
						</td>
						</tr>
						</tfoot>
						<tbody>
						<tr><td align="center">上午</td>
							<?php
								for($x=1;$x<14;$x++){
									if(($diary_arr['name'.$x]&1) == 1){
									echo "<td align='center'><input type='checkbox' value=1 name='uname".$x."' checked></td>";
									}else{
									echo "<td align='center'><input type='checkbox' value=1 name='uname".$x."'></td>";
									}
								}
?>
						</tr>
						<tr><td align="center">下午</td>
							<?php
								for($x=1;$x<14;$x++){
									if(($diary_arr['name'.$x]&2) == 2){
									echo "<td align='center'><input type='checkbox' value=2 name='dname".$x."' checked></td>";
									}else{
									echo "<td align='center'><input type='checkbox' value=2 name='dname".$x."'></td>";
									}
								}
?>
						</tr>
						</tbody>
						
						</table>
						</center>
					</div>
					<div class="card">
						<h3>班前会：</h3>
						<textarea style="width:100%" name ="before" id="textarea"rows="5"><?php echo $diary_arr['diary_before']?></textarea>
					</div>
					<div class="card">
						<?php
						include_once("../lib/class/Defect.class.php");
						$defect_obj = new Defect;
						$defect_obj->showDiary($diary_id);//检索栏
						?>
					</div>
					<div class="card">
						<?php
						include_once("../lib/class/Job.class.php");
						$job_obj = new Job;
						$job_obj->showDiary($diary_id);//检索栏
						?>
					</div>
					<div class="card">
						<?php
						include_once("../lib/class/Workticket.class.php");
						$workTicket_obj = new workTicket;
						$workTicket_obj->showDiary($diary_id);//检索栏
						?>
					</div>
					<div class="card">
						<table class="list">
							<caption><h3>临时记录</h3></caption>
							<?php
							$sql = "select * from tb_text where text_id=1";
							$result = mysqli_query($conn, $sql);
							$text_arr=mysqli_fetch_assoc($result);
							?>
							<tr height='30px'><th>现场待完成工作</th><th>班组待完成工作</th><th>其他待完成工作</th></tr>
							<td><textarea style="width:100%" name ="temporary" id="textarea"rows="20" ><?php echo $text_arr['text1']?></textarea></td>
							<td><textarea style="width:100%" name ="temporary_one" id="textarea"rows="20" ><?php echo $text_arr['text2']?></textarea></td>
							<td><textarea style="width:100%" name ="temporary_done" id="textarea"rows="20" ><?php echo $text_arr['text3']?></textarea></td>
						</table>
					</div>
					<div class="card">
						<h3>班后会：</h3>
						<textarea style="width:100%" name ="after" id="textarea"rows="5"><?php echo $diary_arr['diary_after']?></textarea>
						<input type="hidden" name ="diary_id" value=<?php echo $diary_arr['diary_id']?>></input>
						<input type="hidden" name ="diary_name" value=<?php echo $time?>></input>
						<input type="submit"style="width:100%" name = "save" value="保存当前日志">
						<br>
						<center><a href='../lib/fpdf/preview.php' target="_blank">预览当天日志</a></center>
					</div>
				</form>
				<!--网站正文-->
				</div>
				<!--网站右侧子导航栏-->
			<div class="rightcolumn">
				<div class="card">
					<?php include("../sidebar/ShowQRCode.php") ?>
				</div>
				<div class="card">
				<!--网站左侧子导航栏-->
				<?php include("course.php") ?>
				</div>
				<div class="card">
					<form action="diary/read_diary.php" method="post"target="_blank">
						<fieldset>
							<legend style="border:1px">日志文件</legend>
							<select name='seek_diary_id'style="width:100%" id="sys" class='selectfont'>
								<option selected="selected"style="width:100%" disabled="disabled"  style='display: none' value=''></option>
								<?php
								$sql = "SELECT * FROM `tb_diary` WHERE 1 order by diary_id desc";
								$result = mysqli_query($conn, $sql);
								while($arr=mysqli_fetch_assoc($result)){
                                        				echo "<option value=".$arr['createtime'].">".$arr['createtime']."</option>";
								}
								?>
							</select>
							<input type="submit"style="width:100%" value="查询日志"/>
						</fieldset>
					</form>
				</div>
				<div class="card">
				<!--最新通知-->
					<?php include("../sidebar/notice.php")?>
				</div>
				<div class="card">
				<!--最新资讯-->
					<?php include("../sidebar/news.php")?>
				</div>
			</div>
		</div>
		<div class="footer">
				<!--网站底部-->
			<?php include("../lib/footer/footer.php")?>
		</div>

</body>
</html>
