<html>

<head>
<title>班组日志</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../diary_css/my_diary.css" />


</head>

<body >
<div id="wrapper">
<div id="header">
<a href="../index.html"><center>热控</center></a>
</div>
<?php include("../header/header.php")
?>
<div id="navsecond">
<div id="course">
<ul>
<li><a href='look.php?id=2018-07-04'>2018-07-04</a></li>
<li><a href='look.php?id=2018-07-05'>2018-07-05</a></li>
<li><a href='look.php?id=2018-07-06'>2018-07-06</a></li>
</ul>
</div>
</div>
<div id="maincontent">

<h2><center>查看工作详细<center></h2>
<div id="look_job">
<?php
	include_once('conn.php');
	if($_GET['id']){
		$sql = 'SELECT * FROM tb_jobs WHERE job_id = '.$_GET['id'];
		$result = mysqli_query($conn, $sql);
		$arr=mysqli_fetch_assoc($result);
                        }

	//mysqli_close($conn);

?>
<form action="update_job.php" method="post">
<table align='' border='0' cellpadding=0 cellspacing=1 bgcolor="#cccccc" width='550px'>
<tr><td align='left'>工作编号:</td><td><?php echo $arr['job_id']?></td></tr>
<tr><td align='left'>工作区域:</td><td>
<?php
//连接数据库
//		include_once('conn.php');
//从tb_user数据库中取出所有用户信息,添加工作负责人下拉列表
		$tb_area_sql = "SELECT * FROM `tb_area` WHERE 1";
		$tb_area_result = mysqli_query($conn, $tb_area_sql);
		while($tb_area_arr=mysqli_fetch_assoc($tb_area_result)){
//将检索出的工作记录中job_header对应tb_user数据表中对应用户名设置为下拉列表的默认选项
			if($tb_area_arr['area_id']==$arr['job_area']){
                                       echo $tb_area_arr['area_content'];
}
}
?>
</td></tr>
<tr><td align='left'>工作内容:</td><td><?php echo $arr['job_content']?></td></tr>
<tr><td align='left'>工作负责人:</td><td><?php 
		$tb_user_sql = "SELECT * FROM `tb_user` WHERE 1";
		$tb_user_result = mysqli_query($conn, $tb_user_sql);
		while($tb_user_arr=mysqli_fetch_assoc($tb_user_result)){
//将检索出的工作记录中job_header对应tb_user数据表中对应用户名设置为下拉列表的默认选项
			if($tb_user_arr['user_id']==$arr['job_header']){
                                        echo $tb_user_arr['user_name'];
}
}
	mysqli_close($conn);
?>
</td></tr>
<tr><td align='left'>工作成员:</td><td><?php echo $arr['job_people']?></td></tr>
<tr><td align='left'>工作进度:</td><td><?php echo $arr['job_status']?></td></tr>
<tr><td align='left'>工作详细:</td><td><?php echo $arr['job_notes']?></td></tr>
<tr><td align='left'>工作类型:</td><td><?php 
		if($arr['job_type']==0){
			echo "重点工作";
		}
		if($arr['job_type']==1){
			echo "定期工作";
		}
		if($arr['job_type']==2){
			echo "其他工作";
		}
		if($arr['job_type']==3){
			echo "配合工作";
		}
?></td></tr>
<tr><td align='left'>计划截至日期:</td><td><?php echo $arr['job_deadtime']?></td></tr>
<td colspan="2" align="center">
		<a href='job.php'>返回主页</a>
                                </td>

</table>
</form>
</div>

</div>
<div id="sidebar">
<ul>
<li>待定</li>
<li>预流</li>
</ul>
</div>
<div id="footer">
纯属个人娱乐
</div>
</div>


</body>
</html>

