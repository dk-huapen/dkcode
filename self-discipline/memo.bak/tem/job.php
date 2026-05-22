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
<h2><center>工作清单<center></h2>
<form action="select_job.php" method="post">
<table align='center' border='0' cellpadding=0 cellspacing=1 bgcolor="#cccccc" width='1000px'>
<tr>
<td align='left'><input type="checkbox" name="select_job[job_id]" value="select_job_id">编号:</td><td><input type="text" name="select_job_id" size="1"/></td>
<td align='left'><input type="checkbox" name="select_job[job_header]"value="select_job_header">负责人:</td><td>
<select name='select_job_header' width='500' class='selectfont'>
<option selected="selected" disabled="disabled"  style='display: none' value=''></option>
<?php
//连接数据库
		include_once('conn.php');
//从tb_user数据库中取出所有用户信息,添加工作负责人下拉列表
		$tb_user_sql = "SELECT * FROM `tb_user` WHERE 1";
		$tb_user_result = mysqli_query($conn, $tb_user_sql);
		while($tb_user_arr=mysqli_fetch_assoc($tb_user_result)){
?>
                                        <option value="<?php echo $tb_user_arr['user_id'];?>"><?php echo $tb_user_arr['user_name'];?></option>
<?php
}
?>
                                        </select>
</td>
<td align='left'><input type="checkbox" name="select_job[job_people]" value="select_job_people">工作成员:</td><td>
<select name='select_job_people' width='500' class='selectfont'>
<option selected="selected" disabled="disabled"  style='display: none' value=''></option>
<?php
//连接数据库
		//include_once('conn.php');
//从tb_user数据库中取出所有用户信息,添加工作负责人下拉列表
		$tb_user_sql = "SELECT * FROM `tb_user` WHERE 1";
		$tb_user_result = mysqli_query($conn, $tb_user_sql);
		while($tb_user_arr=mysqli_fetch_assoc($tb_user_result)){
?>
                                        <option value="
					<?php 
					//	echo $tb_user_arr['user_id'];
					echo "'".$tb_user_arr['user_name']."'";
					?>
					">
					<?php echo $tb_user_arr['user_name'];?></option>
<?php
}
?>
                                        </select>
</td>
<td align='left'><input type="checkbox" name="select_job[job_status]" value="select_job_status">进度:</td><td>
<select name='select_job_status' width='500' class='selectfont'>
                                        <option value=''></option>
                                        <option value="'未开工'">未开工</option>
                                        <option value="'进行中'">进行中</option>
                                        <option value="'已完成'">已完成</option>
                                        </select>
</td>
</tr>
<tr>
<td align='left'><input type="checkbox" name="select_between_time" value="select_diary_id">开始日期:</td><td>
<select name='select_begain_diary_id' width='500' class='selectfont'>
<option selected="selected" disabled="disabled"  style='display: none' value=''></option>
<?php
//从tb_diary数据库中取出所有日志列表,添加日期下拉列表，*只有创建过日志日期
		$tb_diary_sql = "SELECT * FROM `tb_diary` WHERE 1";
		$tb_diary_result = mysqli_query($conn, $tb_diary_sql);
		while($tb_diary_arr=mysqli_fetch_assoc($tb_diary_result)){
?>
                                        <option value="<?php echo $tb_diary_arr['diary_id'];?>"><?php echo $tb_diary_arr['createtime'];?></option>
<?php
}
?>
                                        </select>
</td>
<td align='left'>结束日期:</td><td>
<select name='select_end_diary_id' width='500' class='selectfont'>
<option selected="selected" disabled="disabled"  style='display: none' value=''></option>
<?php
//从tb_diary数据库中取出所有日志列表,添加日期下拉列表，*只有创建过日志日期
		$tb_diary_sql = "SELECT * FROM `tb_diary` WHERE 1";
		$tb_diary_result = mysqli_query($conn, $tb_diary_sql);
		while($tb_diary_arr=mysqli_fetch_assoc($tb_diary_result)){
?>
                                        <option value="<?php echo $tb_diary_arr['diary_id'];?>"><?php echo $tb_diary_arr['createtime'];?></option>
<?php
}
?>
                                        </select>
</td>
<td align='left'><input type="checkbox" name="select_job[job_deadtime]" value="select_job_deadtime">截至日期:</td><td><input type="text" name="select_job_deadline" size="5"/></td>
<td align='left'><input type="checkbox" name="select_job_key" value="select_key">关键字:</td><td><input type="text" name="select_key" size="10"/></td>
<tr><td align='left'><input type="checkbox" name="select_job[job_system]" value="select_job_system">系统:</td><td>
<select name='select_job_system' id="sys" width='500' class='selectfont'onchange="check(this.options[options.selectedIndex].value,'area')">
<option selected="selected" disabled="disabled"  style='display: none' value=''></option>
<?php
//连接数据库
		include_once('conn.php');
//从tb_user数据库中取出所有用户信息,添加工作负责人下拉列表
		$tb_system_sql = "SELECT * FROM `tb_system` WHERE 1";
		$tb_system_result = mysqli_query($conn, $tb_system_sql);
		while($tb_system_arr=mysqli_fetch_assoc($tb_system_result)){
?>
                                        <option value="<?php echo $tb_system_arr['system_id'];?>"><?php echo $tb_system_arr['system_content'];?></option>
<?php
}
?>
</select>
</td>
<td align='left'><input type="checkbox" name="select_job[job_area]" value="select_job_area">工作区域:</td><td>
<select id='area' name='select_job_area' width='500' class='selectfont'>
<option value='-1'>--请选择--</option>
                                        </select>
</td>
<td>暂时未开放</td>
<td colspan="2" align="center">
                                        <input type="submit" value="搜索"/>
                                </td>
</tr>
</table>
</form>

<h3>全部工作列表：</h3>
<div id="important_job_list">
<center>重点工作</center>
<table align='center' border='0' cellpadding=0 cellspacing=1 bgcolor="#cccccc" width='850px'>
<tr height='30px'><th>编号</th><th>内容</th><th>工作负责人</th><th>成员</th><th>状态</th><th>更新日期</th><th>管理</th></tr>
<?php
	//include_once('conn.php');
//***********************************************************************
//$sql="select count(*) from important_jobs";
$sql = "select count(*) from important_jobs";
        $re = mysqli_query($conn,$sql);
        $result = mysqli_fetch_row($re);
        $num = $result[0];
        $pagesize=5;
        $pageend =ceil($num/$pagesize);
        if(isset($_GET['page'])){
                $page = $_GET['page'];
        }else{
                $page = 1;
        }
        $offset = ($page-1)*$pagesize;
        //$sql = "select * from db_shop order by id desc limit $offset , $pagesize";

//***********************************************************************
//从tb_jobs数据库取出所有工作清单
//	$tb_jobs_sql = "SELECT * FROM `tb_jobs` WHERE 1";
	//$tb_jobs_sql = "SELECT * FROM `important_jobs` WHERE 1";
        //$tb_jobs_sql = "select * from important_jobs order by id desc limit $offset , $pagesize";
	//$tb_jobs_sql = "select * from important_jobs limit $offset , $pagesize";
	$tb_jobs_sql = "select * from important_jobs order by diary_id desc limit $offset , $pagesize";
	$tb_jobs_result = mysqli_query($conn, $tb_jobs_sql);
	while($tb_jobs_arr=mysqli_fetch_assoc($tb_jobs_result)){
?>
	<tr bgcolor='#eeeeee'align='center' height='24'>
	<td width="5%"><?php echo $tb_jobs_arr['job_id']?></td>
	<td width="40%"><?php echo $tb_jobs_arr['job_content']?></td>
	<td width="13%"><?php 
//从tb_user数据库取出所有用户信息
		$tb_user_sql = "SELECT * FROM `tb_user` WHERE 1";
		$tb_user_result = mysqli_query($conn, $tb_user_sql);
		while($tb_user_arr=mysqli_fetch_assoc($tb_user_result)){
//对应tb_jobs数据库中job_header从tb_user数据库中取出对应user_name
		if($tb_user_arr['user_id']==$tb_jobs_arr['job_header']){
			echo $tb_user_arr['user_name'];
			break;
		}else{
//tu_user数据库中无此工作负责人信息
		}
		}
	?></td>
	<td width="20%"><?php echo $tb_jobs_arr['job_people']?></td>
	<td width="10%"><?php echo $tb_jobs_arr['job_status']?></td>
	<td><?php 
//从tb_diary数据库中取出所有日志列表清单
		$tb_diary_sql = "SELECT * FROM `tb_diary` WHERE 1";
		$tb_diary_result = mysqli_query($conn, $tb_diary_sql);
		while($tb_diary_arr=mysqli_fetch_assoc($tb_diary_result)){
//对应tb_jobs数据库中diary_id从tb_diary数据库中取出对应createtime
		if($tb_diary_arr['diary_id']==$tb_jobs_arr['diary_id']){
			echo $tb_diary_arr['createtime'];
			break;
		}else{
		}
		}
	?></td>
        <td width="15%"> 	<a href='look_job.php?id=<?php echo $tb_jobs_arr['job_id']?>'><img border=0 src='../images/info.png' alt='查看'></a>&nbsp;
             	<a href='edit_job.php?id=<?php echo $tb_jobs_arr['job_id']?>'><img border=0 src='../images/edit.gif' alt='编辑'></a>&nbsp;
		<a href='del_job.php?id=<?php echo $tb_jobs_arr['job_id']?>'><img border=0 src='../images/del.gif' alt='删除'></a>
        </td>
	</tr>
<?php
	}
	//mysqli_close($conn);
?>
</table>
</div>
<div id='page'>
<center>
  当前页:<?php echo $page?>/<?php echo $pageend?>总页数
<a href="?page=1">首页</a>
<a href="?page=<?php echo $page == 1?1:($page-1)?>">上一页</a>
<?php
    $listnum = 4;
    $hnum = floor($listnum/2);
        for($i=$hnum; $i>=1 ; $i--){
                $now = $page - $i;
            if($now < 1){
                  continue;
                }else{
                  echo "<a href='?page={$now}'>[{$now}]</a>&nbsp";
                }
        }
        echo "<a>".$page."</a>&nbsp";
        for($i=1; $i<=$hnum ; $i++){
                $now1 = $page + $i;
            if($now1 > $pageend){
                  continue;
                }else{

                  echo "<a href='?page={$now1}'>[{$now1}]</a>&nbsp";
                }
        }
?>
<a href="?page=<?php echo $page == $pageend?$pageend:($page+1)?>">下一页</a>
<a href="?page=<?php echo $pageend;?>">尾页</a>
<a href='./add_job.php'>添加新工作</a>
</center>
  </div>
<div id="regular_job_list">
<center>定期工作</center>
<table align='center' border='0' cellpadding=0 cellspacing=1 bgcolor="#cccccc" width='850px'>
<tr height='30px'><th>编号</th><th>内容</th><th>工作负责人</th><th>成员</th><th>状态</th><th>更新日期</th><th>管理</th></tr>
<?php
$regular_jobs_sql = "select count(*) from regular_jobs";
        $regular_jobs_re = mysqli_query($conn,$regular_jobs_sql);
        $regular_jobs_result = mysqli_fetch_row($regular_jobs_re);
        $regular_jobs_num = $regular_jobs_result[0];
        $regular_jobs_pagesize=5;
        $regular_jobs_pageend =ceil($regular_jobs_num/$regular_jobs_pagesize);
        if(isset($_GET['regular_jobs_page'])){
                $regular_jobs_page = $_GET['regular_jobs_page'];
        }else{
                $regular_jobs_page = 1;
        }
        $regular_jobs_offset = ($regular_jobs_page-1)*$regular_jobs_pagesize;
        //$sql = "select * from db_shop order by id desc limit $offset , $pagesize";

//***********************************************************************
//从tb_jobs数据库取出所有工作清单
//	$tb_jobs_sql = "SELECT * FROM `tb_jobs` WHERE 1";
	$tb_jobs_sql = "SELECT * FROM regular_jobs order by diary_id desc limit $regular_jobs_offset , $regular_jobs_pagesize";
	$tb_jobs_result = mysqli_query($conn, $tb_jobs_sql);
	while($tb_jobs_arr=mysqli_fetch_assoc($tb_jobs_result)){
?>
	<tr bgcolor='#eeeeee'align='center' height='24'>
	<td width="5%"><?php echo $tb_jobs_arr['job_id']?></td>
	<td width="40%"><?php echo $tb_jobs_arr['job_content']?></td>
	<td width="13%"><?php 
//从tb_user数据库取出所有用户信息
		$tb_user_sql = "SELECT * FROM `tb_user` WHERE 1";
		$tb_user_result = mysqli_query($conn, $tb_user_sql);
		while($tb_user_arr=mysqli_fetch_assoc($tb_user_result)){
//对应tb_jobs数据库中job_header从tb_user数据库中取出对应user_name
		if($tb_user_arr['user_id']==$tb_jobs_arr['job_header']){
			echo $tb_user_arr['user_name'];
			break;
		}else{
//tu_user数据库中无此工作负责人信息
		}
		}
	?></td>
	<td width="20%"><?php echo $tb_jobs_arr['job_people']?></td>
	<td width="10%"><?php echo $tb_jobs_arr['job_status']?></td>
	<td><?php 
//从tb_diary数据库中取出所有日志列表清单
		$tb_diary_sql = "SELECT * FROM `tb_diary` WHERE 1";
		$tb_diary_result = mysqli_query($conn, $tb_diary_sql);
		while($tb_diary_arr=mysqli_fetch_assoc($tb_diary_result)){
//对应tb_jobs数据库中diary_id从tb_diary数据库中取出对应createtime
		if($tb_diary_arr['diary_id']==$tb_jobs_arr['diary_id']){
			echo $tb_diary_arr['createtime'];
			break;
		}else{
		}
		}
	?></td>
        <td width="15%"> 	<a href='look_job.php?id=<?php echo $tb_jobs_arr['job_id']?>'><img border=0 src='../images/info.png' alt='查看'></a>&nbsp;
             	<a href='edit_job.php?id=<?php echo $tb_jobs_arr['job_id']?>'><img border=0 src='../images/edit.gif' alt='编辑'></a>&nbsp;
		<a href='del_job.php?id=<?php echo $tb_jobs_arr['job_id']?>'><img border=0 src='../images/del.gif' alt='删除'></a>
        </td>
	</tr>
<?php
	}
	//mysqli_close($conn);
?>
</table>
</div>
<div id='page'>
<center>
  当前页:<?php echo $regular_jobs_page?>/<?php echo $regular_jobs_pageend?>总页数
<a href="?regular_jobs_page=1">首页</a>
<a href="?regular_jobs_page=<?php echo $regular_jobs_page == 1?1:($regular_jobs_page-1)?>">上一页</a>
<?php
    $regular_jobs_listnum = 4;
    $regular_jobs_hnum = floor($regular_jobs_listnum/2);
        for($i=$regular_jobs_hnum; $i>=1 ; $i--){
                $regular_jobs_now = $regular_jobs_page - $i;
            if($regular_jobs_now < 1){
                  continue;
                }else{
                  echo "<a href='?regular_jobs_page={$regular_jobs_now}'>[{$regular_jobs_now}]</a>&nbsp";
                }
        }
        echo "<a>".$regular_jobs_page."</a>&nbsp";
        for($i=1; $i<=$regular_jobs_hnum ; $i++){
                $regular_jobs_now1 = $regular_jobs_page + $i;
            if($regular_jobs_now1 > $regular_jobs_pageend){
                  continue;
                }else{

                  echo "<a href='?regular_jobs_page={$regular_jobs_now1}'>[{$regular_jobs_now1}]</a>&nbsp";
                }
        }
?>
<a href="?regular_jobs_page=<?php echo $regular_jobs_page == $regular_jobs_pageend?$regular_jobs_pageend:($regular_jobs_page+1)?>">下一页</a>
<a href="?regular_jobs_page=<?php echo $regular_jobs_pageend;?>">尾页</a>
<a href='./add_job.php'>添加新工作</a>
</center>
  </div>
<div id="match_job_list">
<center>配合工作</center>
<table align='center' border='0' cellpadding=0 cellspacing=1 bgcolor="#cccccc" width='850px'>
<tr height='30px'><th>编号</th><th>内容</th><th>工作负责人</th><th>成员</th><th>状态</th><th>更新日期</th><th>管理</th></tr>
<?php
$match_jobs_sql = "select count(*) from match_jobs";
        $match_jobs_re = mysqli_query($conn,$match_jobs_sql);
        $match_jobs_result = mysqli_fetch_row($match_jobs_re);
        $match_jobs_num = $match_jobs_result[0];
        $match_jobs_pagesize=5;
        $match_jobs_pageend =ceil($match_jobs_num/$match_jobs_pagesize);
        if(isset($_GET['match_jobs_page'])){
                $match_jobs_page = $_GET['match_jobs_page'];
        }else{
                $match_jobs_page = 1;
        }
        $match_jobs_offset = ($match_jobs_page-1)*$match_jobs_pagesize;
        //$sql = "select * from db_shop order by id desc limit $offset , $pagesize";

//***********************************************************************
//从tb_jobs数据库取出所有工作清单
//	$tb_jobs_sql = "SELECT * FROM `tb_jobs` WHERE 1";
//从tb_jobs数据库取出所有工作清单
//	$tb_jobs_sql = "SELECT * FROM `tb_jobs` WHERE 1";
	$tb_jobs_sql = "SELECT * FROM `match_jobs` order by diary_id desc limit $match_jobs_offset , $match_jobs_pagesize";
	$tb_jobs_result = mysqli_query($conn, $tb_jobs_sql);
	while($tb_jobs_arr=mysqli_fetch_assoc($tb_jobs_result)){
?>
	<tr bgcolor='#eeeeee'align='center' height='24'>
	<td width="5%"><?php echo $tb_jobs_arr['job_id']?></td>
	<td width="40%"><?php echo $tb_jobs_arr['job_content']?></td>
	<td width="13%"><?php 
//从tb_user数据库取出所有用户信息
		$tb_user_sql = "SELECT * FROM `tb_user` WHERE 1";
		$tb_user_result = mysqli_query($conn, $tb_user_sql);
		while($tb_user_arr=mysqli_fetch_assoc($tb_user_result)){
//对应tb_jobs数据库中job_header从tb_user数据库中取出对应user_name
		if($tb_user_arr['user_id']==$tb_jobs_arr['job_header']){
			echo $tb_user_arr['user_name'];
			break;
		}else{
//tu_user数据库中无此工作负责人信息
		}
		}
	?></td>
	<td width="20%"><?php echo $tb_jobs_arr['job_people']?></td>
	<td width="10%"><?php echo $tb_jobs_arr['job_status']?></td>
	<td><?php 
//从tb_diary数据库中取出所有日志列表清单
		$tb_diary_sql = "SELECT * FROM `tb_diary` WHERE 1";
		$tb_diary_result = mysqli_query($conn, $tb_diary_sql);
		while($tb_diary_arr=mysqli_fetch_assoc($tb_diary_result)){
//对应tb_jobs数据库中diary_id从tb_diary数据库中取出对应createtime
		if($tb_diary_arr['diary_id']==$tb_jobs_arr['diary_id']){
			echo $tb_diary_arr['createtime'];
			break;
		}else{
		}
		}
	?></td>
        <td width="15%"> 	<a href='look_job.php?id=<?php echo $tb_jobs_arr['job_id']?>'><img border=0 src='../images/info.png' alt='查看'></a>&nbsp;
             	<a href='edit_job.php?id=<?php echo $tb_jobs_arr['job_id']?>'><img border=0 src='../images/edit.gif' alt='编辑'></a>&nbsp;
		<a href='del_job.php?id=<?php echo $tb_jobs_arr['job_id']?>'><img border=0 src='../images/del.gif' alt='删除'></a>
        </td>
	</tr>
<?php
	}
	//mysqli_close($conn);
?>
</table>
</div>
<div id='page'>
<center>
  当前页:<?php echo $match_jobs_page?>/<?php echo $match_jobs_pageend?>总页数
<a href="?match_jobs_page=1">首页</a>
<a href="?match_jobs_page=<?php echo $match_jobs_page == 1?1:($match_jobs_page-1)?>">上一页</a>
<?php
    $match_jobs_listnum = 4;
    $match_jobs_hnum = floor($match_jobs_listnum/2);
        for($i=$match_jobs_hnum; $i>=1 ; $i--){
                $match_jobs_now = $match_jobs_page - $i;
            if($match_jobs_now < 1){
                  continue;
                }else{
                  echo "<a href='?match_jobs_page={$match_jobs_now}'>[{$match_jobs_now}]</a>&nbsp";
                }
        }
        echo "<a>".$match_jobs_page."</a>&nbsp";
        for($i=1; $i<=$match_jobs_hnum ; $i++){
                $match_jobs_now1 = $match_jobs_page + $i;
            if($match_jobs_now1 > $match_jobs_pageend){
                  continue;
                }else{

                  echo "<a href='?match_jobs_page={$match_jobs_now1}'>[{$match_jobs_now1}]</a>&nbsp";
                }
        }
?>
<a href="?match_jobs_page=<?php echo $match_jobs_page == $match_jobs_pageend?$match_jobs_pageend:($match_jobs_page+1)?>">下一页</a>
<a href="?match_jobs_page=<?php echo $match_jobs_pageend;?>">尾页</a>
<a href='./add_job.php'>添加新工作</a>
</center>
  </div>
<div id="other_job_list">
<center>其他工作</center>
<table align='center' border='0' cellpadding=0 cellspacing=1 bgcolor="#cccccc" width='850px'>
<tr height='30px'><th>编号</th><th>内容</th><th>工作负责人</th><th>成员</th><th>状态</th><th>更新日期</th><th>管理</th></tr>
<?php
$other_jobs_sql = "select count(*) from other_jobs";
        $other_jobs_re = mysqli_query($conn,$other_jobs_sql);
        $other_jobs_result = mysqli_fetch_row($other_jobs_re);
        $other_jobs_num = $other_jobs_result[0];
        $other_jobs_pagesize=5;
        $other_jobs_pageend =ceil($other_jobs_num/$other_jobs_pagesize);
        if(isset($_GET['other_jobs_page'])){
                $other_jobs_page = $_GET['other_jobs_page'];
        }else{
                $other_jobs_page = 1;
        }
        $other_jobs_offset = ($other_jobs_page-1)*$other_jobs_pagesize;
        //$sql = "select * from db_shop order by id desc limit $offset , $pagesize";

//***********************************************************************
//从tb_jobs数据库取出所有工作清单
//	$tb_jobs_sql = "SELECT * FROM `tb_jobs` WHERE 1";
//从tb_jobs数据库取出所有工作清单
//	$tb_jobs_sql = "SELECT * FROM `tb_jobs` WHERE 1";
//从tb_jobs数据库取出所有工作清单
//	$tb_jobs_sql = "SELECT * FROM `tb_jobs` WHERE 1";
	$tb_jobs_sql = "SELECT * FROM other_jobs order by diary_id desc limit $other_jobs_offset , $other_jobs_pagesize";
	$tb_jobs_result = mysqli_query($conn, $tb_jobs_sql);
	while($tb_jobs_arr=mysqli_fetch_assoc($tb_jobs_result)){
?>
	<tr bgcolor='#eeeeee'align='center' height='24'>
	<td width="5%"><?php echo $tb_jobs_arr['job_id']?></td>
	<td width="40%"><?php echo $tb_jobs_arr['job_content']?></td>
	<td width="13%"><?php 
//从tb_user数据库取出所有用户信息
		$tb_user_sql = "SELECT * FROM `tb_user` WHERE 1";
		$tb_user_result = mysqli_query($conn, $tb_user_sql);
		while($tb_user_arr=mysqli_fetch_assoc($tb_user_result)){
//对应tb_jobs数据库中job_header从tb_user数据库中取出对应user_name
		if($tb_user_arr['user_id']==$tb_jobs_arr['job_header']){
			echo $tb_user_arr['user_name'];
			break;
		}else{
//tu_user数据库中无此工作负责人信息
		}
		}
	?></td>
	<td width="20%"><?php echo $tb_jobs_arr['job_people']?></td>
	<td width="10%"><?php echo $tb_jobs_arr['job_status']?></td>
	<td><?php 
//从tb_diary数据库中取出所有日志列表清单
		$tb_diary_sql = "SELECT * FROM `tb_diary` WHERE 1";
		$tb_diary_result = mysqli_query($conn, $tb_diary_sql);
		while($tb_diary_arr=mysqli_fetch_assoc($tb_diary_result)){
//对应tb_jobs数据库中diary_id从tb_diary数据库中取出对应createtime
		if($tb_diary_arr['diary_id']==$tb_jobs_arr['diary_id']){
			echo $tb_diary_arr['createtime'];
			break;
		}else{
		}
		}
	?></td>
        <td width="15%"> 	<a href='look_job.php?id=<?php echo $tb_jobs_arr['job_id']?>'><img border=0 src='../images/info.png' alt='查看'></a>&nbsp;
             	<a href='edit_job.php?id=<?php echo $tb_jobs_arr['job_id']?>'><img border=0 src='../images/edit.gif' alt='编辑'></a>&nbsp;
		<a href='del_job.php?id=<?php echo $tb_jobs_arr['job_id']?>'><img border=0 src='../images/del.gif' alt='删除'></a>
        </td>
	</tr>
<?php
	}
	mysqli_close($conn);
?>
</table>
</div>
<div id='page'>
<center>
  当前页:<?php echo $other_jobs_page?>/<?php echo $other_jobs_pageend?>总页数
<a href="?other_jobs_page=1">首页</a>
<a href="?other_jobs_page=<?php echo $other_jobs_page == 1?1:($other_jobs_page-1)?>">上一页</a>
<?php
    $other_jobs_listnum = 4;
    $other_jobs_hnum = floor($other_jobs_listnum/2);
        for($i=$other_jobs_hnum; $i>=1 ; $i--){
                $other_jobs_now = $other_jobs_page - $i;
            if($other_jobs_now < 1){
                  continue;
                }else{
                  echo "<a href='?other_jobs_page={$other_jobs_now}'>[{$other_jobs_now}]</a>&nbsp";
                }
        }
        echo "<a>".$other_jobs_page."</a>&nbsp";
        for($i=1; $i<=$other_jobs_hnum ; $i++){
                $other_jobs_now1 = $other_jobs_page + $i;
            if($other_jobs_now1 > $other_jobs_pageend){
                  continue;
                }else{

                  echo "<a href='?other_jobs_page={$other_jobs_now1}'>[{$other_jobs_now1}]</a>&nbsp";
                }
        }
?>
<a href="?other_jobs_page=<?php echo $other_jobs_page == $other_jobs_pageend?$other_jobs_pageend:($other_jobs_page+1)?>">下一页</a>
<a href="?other_jobs_page=<?php echo $other_jobs_pageend;?>">尾页</a>
<a href='./add_job.php'>添加新工作</a>
</center>
  </div>
</div>
<div id="sidebar">
<ul>
<li><a href="./quick_select_job.php?id=40">本月工作</a></li>
<li><a href="./quick_select_job.php?id=30">本周工作</a></li>
<li><a href="./quick_select_job.php?id=20">昨天工作</a></li>
<li><a href="./quick_select_job.php?id=10">当天工作</a></li>
<li>待定</li>
<li>预流</li>
</ul>
</div>
<div id="footer">
纯属个人娱乐
<script type='text/javascript'>
	var xmlHttp;
	function createXMLHttpRequest(){
		if(window.XMLHttpRequest){
			xmlHttp = new XMLHttpRequest();
		}else if(window.ActiveXObject){
			xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
	}
	createXMLHttpRequest();
	function changeTime(){
		var url = "sys_time.php?time="+new Date().getTime();
		xmlHttp.onreadystatechange = function(){
			if(xmlHttp.readyState == 4){
				var time = xmlHttp.responseText;
				//document.getElementsByTagName('div')[0].innerHTML = time;
				document.getElementById('footer').innerHTML = time;
			}
		}
		xmlHttp.open('get',url,false);
		xmlHttp.send(null);
	}
	setInterval("changeTime()",1000);
  </script>
</div>
</div>


</body>
</html>
