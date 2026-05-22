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
<h3>shell script</h3>
<ol>
<!--		每次添加一条命令的模板
	<li><a href=""target="_blank"></a></li>
		<ul type="disc">
			<li></li>
				<dd></dd>
			<li></li>
				<dd></dd>
		</ul>
-->
	<li><a href=""target="_blank">shell</a></li>
		<ul type="disc">
			<li><a href="https://blog.csdn.net/weixin_38479749/article/details/80840567"target="_blank">samba服务器匿名共享</a></li>
				<dd>搭建samba服务器匿名共享</dd>
			<li><a href="https://blog.csdn.net/qq_36492368/article/details/80800789"target="_blank">samba服务器防火墙配置:添加samba服务</a></li>
				<dd>firewall-cmd --permanent --zone=public --add-service=samba</dd>
			<li><a href="https://blog.csdn.net/qq_36492368/article/details/80800789"target="_blank">samba服务器Selinux配置:关闭Selinux</a></li>
				<dd>setenforce 0</dd>
		</ul>
</ol>



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
