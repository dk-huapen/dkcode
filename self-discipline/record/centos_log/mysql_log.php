<html>

<head>
<title>个人日志</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../../self_discipline_css/self_discipline.css" />
</head>

<body >
<div id="wrapper">
<div id="header">
<a href="../index.php"><center>个人日志</center></a>
</div>
<?php include("../../header/header.php")
?>
<div id="navsecond">
<div id="course">
<ul>
<?php
	include("course.php")
?>
</ul>
</div>
</div>
<div id="maincontent">

<h3>vim</h3>
<ol>
<!--
	<li><a href=""target="_blank"></a></li>
		<ul type="disc">
			<li></li>
				<dd></dd>
			<li></li>
				<dd></dd>
		</ul>
-->
	<li><a href="https://blog.csdn.net/weixin_42579642/article/details/86607576"target="_blank">mysql导入导出sql文件</a></li>
		<ol>
			<li>导出数据库用mysqldump命令</li>
				<ul>
					<li>导出数据和表结构</li>
					<dd>mysqldump -u用户名 -p密码 数据库名 > 数据库名.sql</dd>
					<li>只导出表结构</li>
					<dd>mysqldump -u用户名 -p密码 -d 数据库名 > 数据库名.sql</dd>
				</ul>
		</ol>
		<ol>
			<li>导入数据库</li>
				<ul>
					<li>建空数据库</li>
					<dd>mysql>create database abc;</dd>
					<li>导入数据库</li>
					<ol>
					<li>选择数据库</li>
					<dd>mysql>use abc;</dd>
					<li>设置数据库编码</li>
					<dd>mysql>set names utf8;</dd>
					<li>导入数据</li>
					<dd>mysql>source /home/abc/abc.sql;</dd>
					</ol>
				</ul>
			<li>mysql -u用户名 -p密码 数据库名  数据库名.sql</li>
		</ol>
	<li><a href="https://www.cnblogs.com/xs-yqz/p/7238242.html"target="_blank">mysql导入导出csv文件1</a></li>
	<li><a href=""target="_blank">mysql导入导出csv文件1</a></li>
		<ol>
			<li>导出</li>
				<ul>
					<li>select * from tb_defect into outfile 'test.txt' character set utf8;</li>
					<li>select * from tb_defect into outfile 'test.txt' character set utf8 fields terminated by ',' optionally enclosed by '"';</li>
					<dd>导出数据</dd>
					<li>load data infile 'test.txt' into table tb_defect character set utf8;</li>
					<li>load data infile 'zong.csv' into table tb_point_table character set utf8 fields terminated by ',' optionally enclosed by '"';</li>
					<dd>导入数据</dd>
					<li>character set utf8</li>
					<dd>设置编码</dd>
					<li>/var/lib/mysql/db_rekong</li>
					<dd>文件默认目录</dd>
				</ul>
		</ol>
	<li><a href="https://www.cnblogs.com/fcc-123/p/10672604.html"target="_blank">清空表中数据</a></li>
		<ul type="disc">
				<li>reg</li>
				<dd>查看寄存器内容</dd>
				<li>"Ny</li>
				<dd>复制到N号粘贴板</dd>
				<li>Np</li>
				<dd>粘贴N号粘贴板内容</dd>
		</ul>
</ol>
-o sp ctrl+ws<br>
-O vsp ctrl+wv<br>
f 查找某个字符出现的位置并跳转过去（向右）<br>
F 查找某个字符出现的位置并跳转过去（向右）<br>
e	移动到该单词的结尾<br>
E	移动到该单词的结尾(包含标点符号)<br>
b	移动到该单词的开头<br>
B	移动到该单词的开头<br>
w	移动到该单词的结尾<br>
W	移动到该单词的结尾<br>
; 重复上一次f查找操作<br>
. 重复上一次修改操作<br>
c ? <br>
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
</div>
</div>


</body>
</html>
