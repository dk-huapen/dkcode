<html>

<head>
<title>班组日志</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../diary_css/my_diary.css" />
<script type="text/javascript" src='ajax.js'></script>
	<script type="text/javascript">
	function check(obj,info){
	createXMLHttpRequest();
	var url = "check.php?id="+obj+"&time="+new Date().getTime();
	xmlHttp.onreadystatechange = function(){
		if(xmlHttp.readyState == 4){
			var str = xmlHttp.responseText;
			
			var arr = str.split('#');
			$(info).options.length  =  0;
			for(var i=0;i<arr.length;i++){
				var arr_1 = arr[i].split('@');
				var opts = new Option(arr_1[1],arr_1[0]);
				$(info).add(opts);
			}
		}
	}
	xmlHttp.open('get',url,true);
	xmlHttp.send(null);
	}
	function $(obj){
		return document.getElementById(obj);
	}
  </script>


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

<h2><center>编辑工作<center></h2>
<div id="edit_job">
<?php
	include_once('conn.php');
	if($_GET['id']){
//从tb_jobs数据库检索点击编辑列的job_id对应的工作记录
		$tb_jobs_sql = 'SELECT * FROM tb_jobs WHERE job_id = '.$_GET['id'];
		$tb_jobs_result = mysqli_query($conn, $tb_jobs_sql);
		$tb_jobs_arr=mysqli_fetch_assoc($tb_jobs_result);
                        }
?>
<form action="update_job.php" method="post">
<input type="hidden" name="job_id" size="3" value="<?php echo $tb_jobs_arr['job_id']?>"/>
<table align='' border='0' cellpadding=0 cellspacing=1 bgcolor="#cccccc" width='550px'>
<tr><td align='left'>系统:</td><td>
<select name='job_system' id="sys" width='500' class='selectfont' onchange="check(this.options[options.selectedIndex].value,'area')">
<option selected="selected" disabled="disabled"  style='display: none' value=''></option>
<?php
//连接数据库
		//include_once('conn.php');
//从tb_user数据库中取出所有用户信息,添加工作负责人下拉列表
		$tb_system_sql = "SELECT * FROM `tb_system` WHERE 1";
		$tb_system_result = mysqli_query($conn, $tb_system_sql);
		while($tb_system_arr=mysqli_fetch_assoc($tb_system_result)){
			if($tb_system_arr['system_id']==$tb_jobs_arr['job_system']){
?>
                                        <option value="<?php echo $tb_system_arr['system_id'];?>"selected="selected"><?php echo $tb_system_arr['system_content'];?></option>
<?php
}
			else{

?>
                                        <option value="<?php echo $tb_system_arr['system_id'];?>"><?php echo $tb_system_arr['system_content'];?></option>
					
<?php
}
}
?>
</select>
</td></tr>
<tr><td align='left'>工作区域:</td><td>
<select id='area'name='job_area' width='500' class='selectfont'>
<option selected="selected" disabled="disabled"  style='display: none' value=''></option>
<?php
//连接数据库
//		include_once('conn.php');
//从tb_user数据库中取出所有用户信息,添加工作负责人下拉列表
		$tb_area_sql = "SELECT * FROM `tb_area` WHERE 1";
		$tb_area_result = mysqli_query($conn, $tb_area_sql);
		while($tb_area_arr=mysqli_fetch_assoc($tb_area_result)){
//将检索出的工作记录中job_header对应tb_user数据表中对应用户名设置为下拉列表的默认选项
			if($tb_area_arr['area_id']==$tb_jobs_arr['job_area']){
?>
                                        <option value="<?php echo $tb_area_arr['area_id'];?>"selected="selected"><?php echo $tb_area_arr['area_content'];?></option>
<?php
}else{
?>
                                        <option value="<?php echo $tb_area_arr['area_id'];?>"><?php echo $tb_area_arr['area_content'];?></option>
<?php
}
}
?>
                                        </select>
</td></tr>
<tr><td align='left'>工作内容:</td><td><input type="text" name="job_content" size="30" value="<?php echo $tb_jobs_arr['job_content']?>"/></td></tr>
<tr><td align='left'>工作负责人:</td><td>
<select name='job_header' width='500' class='selectfont'>
<option selected="selected" disabled="disabled"  style='display: none' value=''></option>
<?php
//从tb_user数据库取出所有用户信息
		$tb_user_sql = "SELECT * FROM `tb_user` WHERE 1";
		$tb_user_result = mysqli_query($conn, $tb_user_sql);
		while($tb_user_arr=mysqli_fetch_assoc($tb_user_result)){
//将检索出的工作记录中job_header对应tb_user数据表中对应用户名设置为下拉列表的默认选项
			if($tb_user_arr['user_id']==$tb_jobs_arr['job_header']){
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
</td></tr>
<tr><td align='left'>工作成员:</td><td><input type="text" name="job_people" size="30" value="<?php echo $tb_jobs_arr['job_people']?>"/></td></tr>
<tr><td align='left'>工作进度:</td><td>
<select name='job_status' width='500' class='selectfont'>
					<?php
//将检索出的工作记录中job_status对应工作状态设置为下拉列表的默认选项
						if($tb_jobs_arr['job_status']=='未开工'){
					?>
                                        <option value='未开工' selected="selected">未开工</option>
					<?php
					}else{
					?>
                                        <option value='未开工'>未开工</option>
					<?php
					}
					?>
					<?php
						if($tb_jobs_arr['job_status']=='进行中'){
					?>
                                        <option value='进行中' selected="selected">进行中</option>
					<?php
					}else{
					?>
                                        <option value='进行中'>进行中</option>
					<?php
					}
					?>
					<?php
						if($tb_jobs_arr['job_status']=='已完成'){
					?>
                                        <option value='已完成' selected="selected">已完成</option>
					<?php
					}else{
					?>
                                        <option value='已完成'>已完成</option>
					<?php
					}
					?>
                                        </select>
</td></tr>
<tr><td align='left'>工作详细:</td><td><textarea cols="35" rows="5" name="job_notes" ><?php echo $tb_jobs_arr['job_notes']?></textarea></td></tr>
<tr><td align='left'>工作类型:</td><td>
<select name='job_type' width='500' class='selectfont'>
					<?php
//将检索出的工作记录中job_type对应工作类型设置为下拉列表的默认选项
						if($tb_jobs_arr['job_type']==0){
					?>
                                        <option value='0' selected="selected">重点工作</option>
					<?php
					}else{
					?>
                                        <option value='0'>重点工作</option>
					<?php
					}
					?>
					<?php
						if($tb_jobs_arr['job_type']==1){
					?>
                                        <option value='1' selected="selected">定期工作</option>
					<?php
					}else{
					?>
                                        <option value='1'>定期工作</option>
					<?php
					}
					?>
					<?php
						if($tb_jobs_arr['job_type']==2){
					?>
                                        <option value='2' selected="selected">其他工作</option>
					<?php
					}else{
					?>
                                        <option value='2'>其他工作</option>
					<?php
					}
					?>
					<?php
						if($tb_jobs_arr['job_type']==3){
					?>
                                        <option value='3' selected="selected">配合工作</option>
					<?php
					}else{
					?>
                                        <option value='3'>配合工作</option>
					<?php
					}
					?>
                                        </select>
</td></tr>
<tr><td align='left'>工作日期:</td><td>
<select name='diary_id' width='500' class='selectfont'>
<?php
		$tb_diary_sql = "SELECT * FROM `tb_diary` WHERE 1";
		$tb_diary_result = mysqli_query($conn, $tb_diary_sql);
		while($tb_diary_arr=mysqli_fetch_assoc($tb_diary_result)){
		if($tb_diary_arr['diary_id']==$tb_jobs_arr['diary_id']){
?>
                                        <option value="<?php echo $tb_diary_arr['diary_id'];?>" selected="selected"><?php echo $tb_diary_arr['createtime'];?></option>
<?php
		}else{
?>
                                        <option value="<?php echo $tb_diary_arr['diary_id'];?>"><?php echo $tb_diary_arr['createtime'];?></option>
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
