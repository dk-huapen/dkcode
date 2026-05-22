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
	<li><a href="https://blog.csdn.net/caihaitao2000/article/details/80550145"target="_blank">vim三种模式讲解</a></li>
	<img src="image/vim_key.png">
		<ol>
			<li>命令模式(command mode)</li>
				<ul>
					<li>u</li>
					<dd>复原前一个动作</dd>
					<li>Ctrl+r</li>
					<dd>重做上一个动作</dd>
					<li>Ctrl+w</li>
					<dd>切换下一个Vim窗口</dd>
				</ul>
			<li>输入模式(insert mode)</li>
				<ul>
					<li>Esc</li>
					<dd>切换到命令模式</dd>
					<li>Insert</li>
					<dd>切换到输入/替换模式</dd>
				</ul>
			<li>底线命令模式(last line mode)</li>
				<ul>
					<li>set nu</li>
					<dd>显示行号</dd>
					<li>set nonu</li>
					<dd>取消显示行号</dd>
					<li>set relativenumber</li>
					<dd>显示相对行号</dd>
					<li>set norelativenumber</li>
					<dd>取消显示相对行号</dd>
					<li>/word</li>
					<dd>向下搜索单词word</dd>
					<li>?word</li>
					<dd>向上搜索单词word</dd>
					<li>n</li>
					<dd>重复前一个搜索动作</dd>
					<li>N</li>
					<dd>反向重复前一个搜索动作</dd>
					<li>n1,n2s/word1/word2/g</li>
					<dd>在第n1与n2行之间寻找word1这个字符串，并将该字符串取代为word2</dd>
				</ul>
		</ol>
	<li><a href="https://blog.csdn.net/rainysia/article/details/7721691"target="_blank">vim寄存器讲解</a></li>
		<ul type="disc">
				<li>reg</li>
				<dd>查看寄存器内容</dd>
				<li>"Ny</li>
				<dd>复制到N号粘贴板</dd>
				<li>Np</li>
				<dd>粘贴N号粘贴板内容</dd>
		</ul>
	<li><a href="https://blog.csdn.net/guihunkun/article/details/123261809"target="_blank">vim折叠</a></li>
		<ul type="disc">
				<li>set foldmethod=indent</li>
				<dd>按缩进折叠</dd>
				<li>set foldlevelstart=99</li>
				<dd>避免启动编辑器代码自动折叠</dd>
				<li><a href="https://www.cnblogs.com/Leo-Forest/p/3225109.html"target="_blank">mkview</a></li>
				<dd>Vim保存代码折叠信息</dd>
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
