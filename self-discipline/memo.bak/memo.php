<html>

<head>
<title>个人日志</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../self_discipline_css/self_discipline.css" />
</head>

<body >
<div id="wrapper">
<div id="header">
<a href="../index.php"><center>个人日志</center></a>
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
<h2><center>备忘清单<center></h2>

<h3>全部工作列表：</h3>
<div id="life_memo_list">
<center>生活备忘</center>
<table align='center' border='0' cellpadding=0 cellspacing=1 bgcolor="#cccccc" width='850px'>
<tr height='30px'><th>编号</th><th>内容</th><th>状态</th><th>更新日期</th><th>管理</th></tr>
<?php
	include_once('../sql/conn.php');
//***********************************************************************
	$life_sql = "select count(*) from life_memo_list";
        $life_re = mysqli_query($conn,$life_sql);
        $life_result = mysqli_fetch_row($life_re);
        $life_num = $life_result[0];
        $life_pagesize=5;
        $life_pageend =ceil($life_num/$life_pagesize);
        if(isset($_GET['life_page'])){
                $life_page = $_GET['life_page'];
        }else{
                $life_page = 1;
        }
        $life_offset = ($life_page-1)*$life_pagesize;
//***********************************************************************
//连接数据库
	//$tb_memo_sql = "SELECT * FROM `tb_memo` WHERE 1";
	//$tb_memo_sql = "SELECT * FROM `life_memo_list` WHERE 1";
	$tb_memo_sql = "SELECT * FROM `life_memo_list` order by memo_update_time desc limit $life_offset,$life_pagesize";
	$tb_memo_result = mysqli_query($conn, $tb_memo_sql);
	while($tb_memo_arr=mysqli_fetch_assoc($tb_memo_result)){
?>
	<tr bgcolor='#eeeeee'align='center' height='24'>
	<td width="5%"><?php echo $tb_memo_arr['memo_id']?></td>
	<td width="50%"><?php echo $tb_memo_arr['memo_content']?></td>
	<td width="10%"><?php
	$tb_status_sql = "SELECT * FROM `tb_status` WHERE 1";
	$tb_status_result = mysqli_query($conn, $tb_status_sql);
	while($tb_status_arr=mysqli_fetch_assoc($tb_status_result)){
//对应tb_memo数据库中memo_status从tb_status数据库中取出对应status_content
		if($tb_status_arr['status_id']==$tb_memo_arr['memo_status']){
			echo $tb_status_arr['status_content'];
			break;
		}else{
//tu_status数据库中无此信息
		}
	}
			?>
	</td>
	<td width="15%"><?php echo $tb_memo_arr['memo_update_time']?></td>
        <td width="15%"><a href='look_memo_list.php?id=<?php echo $tb_memo_arr['memo_id']?>'><img border=0 src='../images/info.png' alt='查看'></a>&nbsp;
       	<a href='edit_memo_list.php?id=<?php echo $tb_memo_arr['memo_id']?>'><img border=0 src='../images/edit.gif' alt='编辑'></a>&nbsp;
	<a href='del_memo_list.php?id=<?php echo $tb_memo_arr['memo_id']?>'><img border=0 src='../images/del.gif' alt='删除'></a>
        </td>
	</tr>
<?php
	}
?>
</table>
</div>
<div id='life_page'>
<center>
  当前页:<?php echo $life_page?>/<?php echo $life_pageend?>总页数
<a href="?life_page=1">首页</a>
<a href="?life_page=<?php echo $life_page == 1?1:($life_page-1)?>">上一页</a>
<?php
    $listnum = 4;
    $hnum = floor($listnum/2);
        for($i=$hnum; $i>=1 ; $i--){
                $now = $life_page - $i;
            if($now < 1){
                  continue;
                }else{
                  echo "<a href='?life_page={$now}'>[{$now}]</a>&nbsp";
                }
        }
        echo "<a>".$life_page."</a>&nbsp";
        for($i=1; $i<=$hnum ; $i++){
                $now1 = $life_page + $i;
            if($now1 > $life_pageend){
                  continue;
                }else{

                  echo "<a href='?life_page={$now1}'>[{$now1}]</a>&nbsp";
                }
        }
?>
<a href="?life_page=<?php echo $life_page == $life_pageend?$life_pageend:($life_page+1)?>">下一页</a>
<a href="?life_page=<?php echo $life_pageend;?>">尾页</a>
<a href='./add_memo_list.php'>添加新备忘</a>
</center>
</div>
<div id="study_memo_list">
<center>学习备忘</center>
<table align='center' border='0' cellpadding=0 cellspacing=1 bgcolor="#cccccc" width='850px'>
<tr height='30px'><th>编号</th><th>内容</th><th>状态</th><th>更新日期</th><th>管理</th></tr>
<?php
//***********************************************************************
	$study_sql = "select count(*) from study_memo_list";
        $study_re = mysqli_query($conn,$study_sql);
        $study_result = mysqli_fetch_row($study_re);
        $study_num = $study_result[0];
        $study_pagesize=5;
        $study_pageend =ceil($study_num/$study_pagesize);
        if(isset($_GET['study_page'])){
                $study_page = $_GET['study_page'];
        }else{
                $study_page = 1;
        }
        $study_offset = ($study_page-1)*$study_pagesize;
//***********************************************************************
	$tb_memo_sql = "SELECT * FROM `study_memo_list` order by memo_update_time desc limit $study_offset,$study_pagesize";
	//$tb_memo_sql = "SELECT * FROM `study_memo_list` WHERE 1";
	$tb_memo_result = mysqli_query($conn, $tb_memo_sql);
	while($tb_memo_arr=mysqli_fetch_assoc($tb_memo_result)){
?>
	<tr bgcolor='#eeeeee'align='center' height='24'>
	<td width="5%"><?php echo $tb_memo_arr['memo_id']?></td>
	<td width="50%"><?php echo $tb_memo_arr['memo_content']?></td>
	<td width="10%"><?php
	$tb_status_sql = "SELECT * FROM `tb_status` WHERE 1";
	$tb_status_result = mysqli_query($conn, $tb_status_sql);
	while($tb_status_arr=mysqli_fetch_assoc($tb_status_result)){
//对应tb_memo数据库中memo_status从tb_status数据库中取出对应status_content
		if($tb_status_arr['status_id']==$tb_memo_arr['memo_status']){
			echo $tb_status_arr['status_content'];
			break;
		}else{
//tu_status数据库中无此信息
		}
	}
			?>
	</td>
	<td width="15%"><?php echo $tb_memo_arr['memo_update_time']?></td>
        <td width="15%"><a href='look_memo_list.php?id=<?php echo $tb_memo_arr['memo_id']?>'><img border=0 src='../images/info.png' alt='查看'></a>&nbsp;
       	<a href='edit_memo_list.php?id=<?php echo $tb_memo_arr['memo_id']?>'><img border=0 src='../images/edit.gif' alt='编辑'></a>&nbsp;
	<a href='del_memo_list.php?id=<?php echo $tb_memo_arr['memo_id']?>'><img border=0 src='../images/del.gif' alt='删除'></a>
        </td>
	</tr>
<?php
	}
?>
</table>
</div>
<div id='study_page'>
<center>
  当前页:<?php echo $study_page?>/<?php echo $study_pageend?>总页数
<a href="?study_page=1">首页</a>
<a href="?study_page=<?php echo $study_page == 1?1:($study_page-1)?>">上一页</a>
<?php
    $listnum = 4;
    $hnum = floor($listnum/2);
        for($i=$hnum; $i>=1 ; $i--){
                $now = $study_page - $i;
            if($now < 1){
                  continue;
                }else{
                  echo "<a href='?study_page={$now}'>[{$now}]</a>&nbsp";
                }
        }
        echo "<a>".$study_page."</a>&nbsp";
        for($i=1; $i<=$hnum ; $i++){
                $now1 = $study_page + $i;
            if($now1 > $study_pageend){
                  continue;
                }else{

                  echo "<a href='?study_page={$now1}'>[{$now1}]</a>&nbsp";
                }
        }
?>
<a href="?study_page=<?php echo $study_page == $study_pageend?$study_pageend:($study_page+1)?>">下一页</a>
<a href="?study_page=<?php echo $study_pageend;?>">尾页</a>
<a href='./add_memo_list.php'>添加新备忘</a>
</center>
</div>
<div id="work_memo_list">
<center>工作备忘</center>
<table align='center' border='0' cellpadding=0 cellspacing=1 bgcolor="#cccccc" width='850px'>
<tr height='30px'><th>编号</th><th>内容</th><th>状态</th><th>更新日期</th><th>管理</th></tr>
<?php
//***********************************************************************
	$work_sql = "select count(*) from work_memo_list";
        $work_re = mysqli_query($conn,$work_sql);
        $work_result = mysqli_fetch_row($work_re);
        $work_num = $work_result[0];
        $work_pagesize=5;
        $work_pageend =ceil($work_num/$work_pagesize);
        if(isset($_GET['work_page'])){
                $work_page = $_GET['work_page'];
        }else{
                $work_page = 1;
        }
        $work_offset = ($work_page-1)*$work_pagesize;
//***********************************************************************
//连接数据库
	//$tb_memo_sql = "SELECT * FROM `work_memo_list` WHERE 1";
	$tb_memo_sql = "SELECT * FROM `work_memo_list` order by memo_update_time limit $work_offset,$work_pagesize";
	$tb_memo_result = mysqli_query($conn, $tb_memo_sql);
	while($tb_memo_arr=mysqli_fetch_assoc($tb_memo_result)){
?>
	<tr bgcolor='#eeeeee'align='center' height='24'>
	<td width="5%"><?php echo $tb_memo_arr['memo_id']?></td>
	<td width="50%"><?php echo $tb_memo_arr['memo_content']?></td>
	<td width="10%"><?php
	$tb_status_sql = "SELECT * FROM `tb_status` WHERE 1";
	$tb_status_result = mysqli_query($conn, $tb_status_sql);
	while($tb_status_arr=mysqli_fetch_assoc($tb_status_result)){
//对应tb_memo数据库中memo_status从tb_status数据库中取出对应status_content
		if($tb_status_arr['status_id']==$tb_memo_arr['memo_status']){
			echo $tb_status_arr['status_content'];
			break;
		}else{
//tu_status数据库中无此信息
		}
	}
			?>
	</td>
	<td width="15%"><?php echo $tb_memo_arr['memo_update_time']?></td>
        <td width="15%"><a href='look_memo_list.php?id=<?php echo $tb_memo_arr['memo_id']?>'><img border=0 src='../images/info.png' alt='查看'></a>&nbsp;
       	<a href='edit_memo_list.php?id=<?php echo $tb_memo_arr['memo_id']?>'><img border=0 src='../images/edit.gif' alt='编辑'></a>&nbsp;
	<a href='del_memo_list.php?id=<?php echo $tb_memo_arr['memo_id']?>'><img border=0 src='../images/del.gif' alt='删除'></a>
        </td>
	</tr>
<?php
	}
?>
</table>
</div>
<div id='work_page'>
<center>
  当前页:<?php echo $work_page?>/<?php echo $work_pageend?>总页数
<a href="?work_page=1">首页</a>
<a href="?work_page=<?php echo $work_page == 1?1:($work_page-1)?>">上一页</a>
<?php
    $listnum = 4;
    $hnum = floor($listnum/2);
        for($i=$hnum; $i>=1 ; $i--){
                $now = $work_page - $i;
            if($now < 1){
                  continue;
                }else{
                  echo "<a href='?work_page={$now}'>[{$now}]</a>&nbsp";
                }
        }
        echo "<a>".$work_page."</a>&nbsp";
        for($i=1; $i<=$hnum ; $i++){
                $now1 = $work_page + $i;
            if($now1 > $work_pageend){
                  continue;
                }else{

                  echo "<a href='?work_page={$now1}'>[{$now1}]</a>&nbsp";
                }
        }
?>
<a href="?work_page=<?php echo $work_page == $work_pageend?$work_pageend:($work_page+1)?>">下一页</a>
<a href="?work_page=<?php echo $work_pageend;?>">尾页</a>
<a href='./add_memo_list.php'>添加新备忘</a>
</center>
</div>
<div id="other_memo_list">
<center>其他备忘</center>
<table align='center' border='0' cellpadding=0 cellspacing=1 bgcolor="#cccccc" width='850px'>
<tr height='30px'><th>编号</th><th>内容</th><th>状态</th><th>更新日期</th><th>管理</th></tr>
<?php
//***********************************************************************
	$other_sql = "select count(*) from other_memo_list";
        $other_re = mysqli_query($conn,$other_sql);
        $other_result = mysqli_fetch_row($other_re);
        $other_num = $other_result[0];
        $other_pagesize=5;
        $other_pageend =ceil($other_num/$other_pagesize);
        if(isset($_GET['other_page'])){
                $other_page = $_GET['other_page'];
        }else{
                $other_page = 1;
        }
        $other_offset = ($other_page-1)*$other_pagesize;
//***********************************************************************
//连接数据库
	//$tb_memo_sql = "SELECT * FROM `work_memo_list` order by memo_update_time limit $work_offset,$work_pagesize";
	//$tb_memo_sql = "SELECT * FROM `other_memo_list` WHERE 1";
	$tb_memo_sql = "SELECT * FROM `other_memo_list` order by memo_update_time limit $other_offset,$other_pagesize";
	$tb_memo_result = mysqli_query($conn, $tb_memo_sql);
	while($tb_memo_arr=mysqli_fetch_assoc($tb_memo_result)){
?>
	<tr bgcolor='#eeeeee'align='center' height='24'>
	<td width="5%"><?php echo $tb_memo_arr['memo_id']?></td>
	<td width="50%"><?php echo $tb_memo_arr['memo_content']?></td>
	<td width="10%"><?php
	$tb_status_sql = "SELECT * FROM `tb_status` WHERE 1";
	$tb_status_result = mysqli_query($conn, $tb_status_sql);
	while($tb_status_arr=mysqli_fetch_assoc($tb_status_result)){
//对应tb_memo数据库中memo_status从tb_status数据库中取出对应status_content
		if($tb_status_arr['status_id']==$tb_memo_arr['memo_status']){
			echo $tb_status_arr['status_content'];
			break;
		}else{
//tu_status数据库中无此信息
		}
	}
			?>
	</td>
	<td width="15%"><?php echo $tb_memo_arr['memo_update_time']?></td>
        <td width="15%"><a href='look_memo_list.php?id=<?php echo $tb_memo_arr['memo_id']?>'><img border=0 src='../images/info.png' alt='查看'></a>&nbsp;
       	<a href='edit_memo_list.php?id=<?php echo $tb_memo_arr['memo_id']?>'><img border=0 src='../images/edit.gif' alt='编辑'></a>&nbsp;
	<a href='del_memo_list.php?id=<?php echo $tb_memo_arr['memo_id']?>'><img border=0 src='../images/del.gif' alt='删除'></a>
        </td>
	</tr>
<?php
	}
?>
</table>
</div>
<div id='other_page'>
<center>
  当前页:<?php echo $other_page?>/<?php echo $other_pageend?>总页数
<a href="?other_page=1">首页</a>
<a href="?other_page=<?php echo $other_page == 1?1:($other_page-1)?>">上一页</a>
<?php
    $listnum = 4;
    $hnum = floor($listnum/2);
        for($i=$hnum; $i>=1 ; $i--){
                $now = $other_page - $i;
            if($now < 1){
                  continue;
                }else{
                  echo "<a href='?other_page={$now}'>[{$now}]</a>&nbsp";
                }
        }
        echo "<a>".$other_page."</a>&nbsp";
        for($i=1; $i<=$hnum ; $i++){
                $now1 = $other_page + $i;
            if($now1 > $other_pageend){
                  continue;
                }else{

                  echo "<a href='?other_page={$now1}'>[{$now1}]</a>&nbsp";
                }
        }
?>
<a href="?other_page=<?php echo $other_page == $other_pageend?$other_pageend:($other_page+1)?>">下一页</a>
<a href="?other_page=<?php echo $other_pageend;?>">尾页</a>
<a href='./add_memo_list.php'>添加新备忘</a>
</center>
</div>
</div>
<div id="sidebar">
</div>
<div id="footer">
纯属个人娱乐
</div>
</div>


</body>
</html>
