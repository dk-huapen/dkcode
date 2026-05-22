<html>

<head>
<title>备忘录</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../self_discipline_css/self_discipline.css" />


</head>

<body >
<div id="wrapper">
<div id="header">
<a href="../index.php"><center>自律</center></a>
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

<h2><center>查看备忘录详细<center></h2>
<div id="look_memo">
<?php
		include_once('../sql/conn.php');
	if($_GET['id']){
		$tb_memo_sql = 'SELECT * FROM tb_memo WHERE memo_id = '.$_GET['id'];
		$tb_memo_result = mysqli_query($conn, $tb_memo_sql);
		$tb_memo_arr=mysqli_fetch_assoc($tb_memo_result);
                        }

	//mysqli_close($conn);

?>
<form action="update_job.php" method="post">
<table align='' border='0' cellpadding=0 cellspacing=1 bgcolor="#cccccc" width='550px'>
<tr><td align='left'>备忘录编号:</td><td><?php echo $tb_memo_arr['memo_id']?></td></tr>
<tr><td align='left'>内容:</td><td><?php echo $tb_memo_arr['memo_content']?></td></tr>
<tr><td align='left'>状态:</td><td><?php 
		$tb_status_sql = "SELECT * FROM `tb_status` WHERE 1";
		$tb_status_result = mysqli_query($conn, $tb_status_sql);
		while($tb_status_arr=mysqli_fetch_assoc($tb_status_result)){
//对应tb_jobs数据库中job_header从tb_user数据库中取出对应user_name
		if($tb_status_arr['status_id']==$tb_memo_arr['memo_status']){
			echo $tb_status_arr['status_content'];
			break;
		}else{
//tu_user数据库中无此工作负责人信息
		}
		}
?>
</td></tr>
<tr><td align='left'>类型:</td><td><?php 
		$tb_type_sql = "SELECT * FROM `tb_type` WHERE 1";
		$tb_type_result = mysqli_query($conn, $tb_type_sql);
		while($tb_type_arr=mysqli_fetch_assoc($tb_type_result)){
//对应tb_jobs数据库中job_header从tb_user数据库中取出对应user_name
		if($tb_type_arr['type_id']==$tb_memo_arr['memo_type']){
			echo $tb_type_arr['type_content'];
			break;
		}else{
//tu_user数据库中无此工作负责人信息
		}
		}
?>
</td></tr>
<tr><td align='left'>详细:</td><td><?php echo $tb_memo_arr['memo_details']?></td></tr>
<tr><td align='left'>更新日期:</td><td><?php echo $tb_memo_arr['memo_update_time']?></td></tr>
<td colspan="2" align="center">
		<a href='memo.php'>返回主页</a>
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

