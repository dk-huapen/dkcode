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
<h3>service config</h3>
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
<h2><center>搭建LAMP平台</center></h2>
<ul>
<li><a href="https://www.cnblogs.com/apro-abra/p/4862285.html"target="_blank">搭建LAMP平台</a></li>
<li><a href="https://blog.csdn.net/w1043545633/article/details/79339509"target="_blank">配置www防火墙</a></li>
	<ul type="disc">
		<li><a href=""target="_blank">www服务器防火墙配置:开放80端口</a></li>
			<dd>firewall-cmd --permanent --zone=public --add-port=80/tcp</dd>
		<li><a href="https://www.cnblogs.com/apro-abra/p/4862285.html"target="_blank">www服务器防火墙配置:添加http服务和https服务(两个任意一个都可以)</a></li>
			<dd>firewall-cmd --permanent --zone=public --add-service=http</dd>
			<dd>firewall-cmd --permanent --zone=public --add-service=https</dd>
	</ul>
<li><a href="https://www.cnblogs.com/apro-abra/p/4862285.html"target="_blank">安装mariadb</a></li>
<li><a href=""target="_blank">yum install mariadb</a></li>
<li><a href="https://www.cnblogs.com/apro-abra/p/4862285.html"target="_blank">yum install mariadb-server</a></li>
<li><a href="https://blog.csdn.net/u011304615/article/details/78871479"target="_blank">centos7安装phpmyadmin</a></li>
<li><a href="https://www.linuxrumen.com/rmxx/1481.html"target="_blank">centos8安装phpmyadmin</a></li>
	<ul>
	<li>phpmyadmin4.9.2版本安装后登录为空白页</li>
	<li>phpmyadmin4.9.1版本安装后可以使用，但是报缺失php-json.x86_64php-json</li>
		<ul>
		<li>安装php-json.x86_64后正常</li>
		</ul>
	</ul>
<li><a href="https://blog.csdn.net/chenyiyue/article/details/51019235"target="_blank">debian11使用apt-get方式安装LAMP包括phpmyadmin</a></li>
<li><a href="https://www.linuxrumen.com/rmxx/1485.html"target="_blank">安装mywebsql-该软件不好用，不太习惯</a></li>
</ul>
<h2><center>搭建SAMBA服务器</center></h2>
	<li><a href=""target="_blank">samba</a></li>
		<ul type="disc">
			<li><a href="https://blog.csdn.net/weixin_38479749/article/details/80840567"target="_blank">samba服务器匿名共享</a></li>
			<ul>
				<li>guest ok=yes</li>
				<li>map to guest=bad user</li>
			</ul>
			<li><a href="https://blog.csdn.net/qq_36492368/article/details/80800789"target="_blank">samba服务器防火墙配置:添加samba服务</a></li>
				<dd>firewall-cmd --permanent --zone=public --add-service=samba</dd>
			<li><a href="https://blog.csdn.net/qq_36492368/article/details/80800789"target="_blank">samba服务器Selinux配置:关闭Selinux</a></li>
				<dd>setenforce 0</dd>
		</ul>
<h2><center>搭建FTP服务器</center></h2>
	<li><a href=""target="_blank">ftp</a></li>
		<ul type="disc">
			<li><a href="https://blog.csdn.net/zhaojia92/article/details/79511581"target="_blank">ftp服务器匿名上传/下载文件</a></li>
				<dd>搭建ftp服务器匿名用户</dd>
			<li><a href=""target="_blank">ftp服务器防火墙配置:添加ftp服务</a></li>
				<dd>firewall-cmd --permanent --zone=public --add-service=ftp</dd>
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
