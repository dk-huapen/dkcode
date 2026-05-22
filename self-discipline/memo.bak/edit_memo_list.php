<html>

<head>
<title>班组日志</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../self_discipline_css/self_discipline.css" />

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

<h2><center>更新备忘<center></h2>
<div id="edit_memo">
<center>备忘明细</center>
<?php
		include_once('../sql/conn.php');
	if($_GET['id']){
		$tb_memo_sql = 'SELECT * FROM tb_memo WHERE memo_id = '.$_GET['id'];
		$tb_memo_result = mysqli_query($conn, $tb_memo_sql);
		$tb_memo_arr=mysqli_fetch_assoc($tb_memo_result);
                        }

	//mysqli_close($conn);

?>
<form action="update_memo.php" method="post">
<input type="hidden" name="memo_id" size="3" value="<?php echo $tb_memo_arr['memo_id']?>"/>
<table align='' border='0' cellpadding=0 cellspacing=1 bgcolor="#cccccc" width='550px'>
<tr><td align='left'>备忘内容:</td><td><input type="text" name="memo_content" size="30" value="<?php echo $tb_memo_arr['memo_content']?>"/></td></tr>
<tr><td align='left'>备忘进度:</td><td>
<select name='memo_status' width='500' class='selectfont'>
<?php
		$tb_status_sql = "SELECT * FROM `tb_status` WHERE 1";
		$tb_status_result = mysqli_query($conn, $tb_status_sql);
		while($tb_status_arr=mysqli_fetch_assoc($tb_status_result)){
			if($tb_status_arr['status_id']==$tb_memo_arr['memo_status']){
?>
                                        <option value="<?php echo $tb_status_arr['status_id'];?>"selected="selected"><?php echo $tb_status_arr['status_content'];?></option>
<?php
			}else{
?>
                                        <option value="<?php echo $tb_status_arr['status_id'];?>"><?php echo $tb_status_arr['status_content'];?></option>
<?php
}
}
?>
                                        </select>
</td></tr>
<tr><td align='left'>备忘详细:</td><td><textarea cols="35" rows="5" name="memo_details"><?php echo $tb_memo_arr['memo_details']?></textarea></td></tr>
<tr><td align='left'>备忘类型:</td><td>
<select name='memo_type' width='500' class='selectfont'>
<?php
		$tb_type_sql = "SELECT * FROM `tb_type` WHERE 1";
		$tb_type_result = mysqli_query($conn, $tb_type_sql);
		while($tb_type_arr=mysqli_fetch_assoc($tb_type_result)){
			if($tb_type_arr['type_id']==$tb_memo_arr['memo_type']){
?>
                                        <option value="<?php echo $tb_type_arr['type_id'];?>"selected="selected"><?php echo $tb_type_arr['type_content'];?></option>
<?php
			}else{
?>
                                        <option value="<?php echo $tb_type_arr['type_id'];?>"><?php echo $tb_type_arr['type_content'];?></option>
<?php
}
}
	mysqli_close($conn);
?>
                                        </select>
</td></tr>
<td colspan="2" align="center">
                                        <input type="submit" value="保存"/>&nbsp;&nbsp;&nbsp;
                                        <input type="reset" value="清空"/>
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
