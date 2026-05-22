<html>

<head>
<title>班组日志</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../diary_css/my_diary.css" />


</head>

<body >
<div id="wrapper">
<div id="header">
<a href="../index.php"><center>热控</center></a>
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

<h2><center>更新备件信息<center></h2>
<div id="edit_part">
<?php
	include_once('conn.php');
	if($_GET['id']){
//从tb_sparepart数据库中取出所有用户信息,添加工作负责人下拉列表
		$tb_sparepart_sql = 'SELECT * FROM tb_sparepart WHERE part_id='.$_GET['id'];
		//$tb_sparepart_sql = "SELECT * FROM `tb_sparepart` WHERE `part_id`=6";
		$tb_sparepart_result = mysqli_query($conn, $tb_sparepart_sql);
		$tb_sparepart_arr=mysqli_fetch_assoc($tb_sparepart_result);
	}
?>
<form action="update_part.php" method="post">
<input type="hidden" name="part_id" size="3" value="<?php echo $tb_sparepart_arr['part_id']?>"/>
<table align='' border='0' cellpadding=0 cellspacing=1 bgcolor="#cccccc" width='550px'>
<tr height='30px'><th>备件内容</th><th>备件状态</th><th>备件数量</th></tr>
<tr>
	<td align='left'>备品名称:<input type="text" name="part_name" size="30" value="<?php echo $tb_sparepart_arr['part_name']?>"/></td>
	<td align='left'>申报日期:<input type="text" name="part_declare_time" size="30" value=""/></td>
	<td align='left'>申报数量:<input type="text" name="part_declare_number" size="5" value=""/></td></tr>
<tr>
	<td align='left'>规格型号:<input type="text" name="part_modle" size="30" value="<?php echo $tb_sparepart_arr['part_modle']?>"/></td>
	<td align='left'>需求日期:<input type="text" name="part_need_time" size="30" value=""/></td>
	<td>申报人
		<select name='part_declare_people' width='500' class='selectfont'>
		<?php
//从tb_user数据库取出所有用户信息
		$tb_user_sql = "SELECT * FROM `tb_user` WHERE 1";
		$tb_user_result = mysqli_query($conn, $tb_user_sql);
		while($tb_user_arr=mysqli_fetch_assoc($tb_user_result)){
//将检索出的工作记录中job_header对应tb_user数据表中对应用户名设置为下拉列表的默认选项
			if($tb_user_arr['user_id']==$tb_sparepart_arr['part_declare_people']){
		?>
                	<option value="<?php echo $tb_user_arr['user_id'];?>"selected="selected"><?php echo $tb_user_arr['user_name'];?></option>
		<?php
			}else{
		?>
                	<option value="<?php echo $tb_user_arr['user_id'];?>"><?php echo $tb_user_arr['user_name'];?></option>
		<?php
			}
		}
		?>
                </select>

	</td>
</tr>
<tr>
	<td align='left'>技术参数:<input type="text" name="part_parameter" size="30" value="<?php echo $tb_sparepart_arr['part_parameter']?>"/></td>
	<td align='left'>到货数量:<input type="text" name="part_come_number" size="5" value="<?php echo $tb_sparepart_arr['part_come_number']?>"/></td>
</tr>
<tr>
	<td align='left'>所属设备:<input type="text" name="part_system" size="30" value=""/></td>
	<td align='left'>到货日期:<input type="text" name="part_come_time" size="30" value="<?php echo $tb_sparepart_arr['part_come_time']?>"/></td>
	<td>验收人
		<select name='part_check_people' width='500' class='selectfont'>
		<?php
//从tb_user数据库取出所有用户信息
		$tb_user_sql = "SELECT * FROM `tb_user` WHERE 1";
		$tb_user_result = mysqli_query($conn, $tb_user_sql);
		while($tb_user_arr=mysqli_fetch_assoc($tb_user_result)){
//将检索出的工作记录中job_header对应tb_user数据表中对应用户名设置为下拉列表的默认选项
			if($tb_user_arr['user_id']==$tb_sparepart_arr['part_check_people']){
		?>
                	<option value="<?php echo $tb_user_arr['user_id'];?>"selected="selected"><?php echo $tb_user_arr['user_name'];?></option>
		<?php
			}else{
		?>
                	<option value="<?php echo $tb_user_arr['user_id'];?>"><?php echo $tb_user_arr['user_name'];?></option>
		<?php
			}
		}
		?>
                </select>
	</td>
</tr>
<tr>
	<td align='left'>备注:<input type="text" name="part_mark" size="30" value=""/></td>
	<td align='left'>备件类型:
		<select name='part_type' width='500' class='selectfont'>
		<option selected="selected" disabled="disabled"  style='display: none' value=''></option>
		<?php
//从tb_user数据库取出所有用户信息
		$tb_part_status_sql = "SELECT * FROM `tb_part_type` WHERE 1";
		$tb_part_status_result = mysqli_query($conn, $tb_part_status_sql);
		while($tb_part_status_arr=mysqli_fetch_assoc($tb_part_status_result)){
//将检索出的工作记录中job_header对应tb_part_status数据表中对应用户名设置为下拉列表的默认选项
			if($tb_part_status_arr['part_type_id']==$tb_sparepart_arr['part_type']){
		?>
                	<option value="<?php echo $tb_part_status_arr['part_type_id'];?>"selected="selected"><?php echo $tb_part_status_arr['part_type_name'];?></option>
		<?php
			}else{
		?>
                	<option value="<?php echo $tb_part_status_arr['part_type_id'];?>"><?php echo $tb_part_status_arr['part_type_name'];?></option>
		<?php
			}
		}
		?>
                </select>
	</td>
	<td>单位<input type="text" name="part_unit" size="5" value="<?php echo $tb_sparepart_arr['part_unit']?>"/></td>
</tr>
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
