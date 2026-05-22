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
<h3>Evolution 添加邮箱</h3>
<h3>关于excel与纯文本之间的转换</h3>
<ul>
<li>excel转换为csv格式</li>
<ol>
<li>转换为特定delimiter,常见为"，"</li>
<li>通过sort命令进行排序达到特定目的</li>
<li>sort -t ',' -k14,14 -k16,16n -o 2k.csv</li>
</ol>
<li>excel转换为html格式</li>
<ol>
<li>转换成为html语言中的表格代码</li>
<li>然后链接成网页显示</li>
</ol>
</ul>

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
