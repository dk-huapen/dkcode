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
<center><h2>CentOS command</h2></center>
<!--		每次添加一条命令的模板
<ol>
	<li><a href=""target="_blank"></a></li>
		<ul type="disc">
			<li></li>
				<dd></dd>
			<li></li>
				<dd></dd>
		</ul>
</ol>
-->
<h3>wget</h3>
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
</ol>
<h3>screen</h3>
<ol>
	<li><a href="https://www.cnblogs.com/niuben/p/12016660.html"target="_blank">screen 命令</a></li>
		<ul type="disc">
			<li>screen -S name</li>
				<dd>创建一个会话</dd>
			<li>screen窗口中执行exit</li>
				<dd>关闭当前会话</dd>
			<li>screen -ls</li>
				<dd>列出会话列表</dd>
			<li>screen -r name</li>
				<dd>重新连接一个断开会话</dd>
			<li>screen -d name</li>
				<dd>断开一个会话</dd>
			<li>screen -x</li>
				<dd>恢复所有会话，共享屏幕用</dd>
		</ul>
</ol>
<h3>ssh</h3>
<ol>
	<li><a href=""target="_blank">ssh 命令</a></li>
		<ul type="disc">
			<li>ssh name@dklovelich.iok.la -p 18210</li>
				<dd>使用name用户远方连接dklovelich.iok.la linux服务器18210端口</dd>
		</ul>
</ol>
<h3>xz</h3>
<ol>
	<li><a href="https://blog.csdn.net/MatrixGod/article/details/89708164"target="_blank">POSIX 平台开发具有高压缩率的工具</a></li>
		<ul type="disc">
			<li>xz -d -k test.txt.xz</li>
				<dd>解压test.txt.xz文件</dd>
			<li>xz test.txt</li>
				<dd>压缩test.txt文件</dd>
		</ul>
</ol>
<h3>rpm</h3>
<ol>
	<li><a href="https://blog.csdn.net/fang_a_kai/article/details/83744550"target="_blank">rpm</a></li>
		<ul type="disc">
			<li>rpm -ivh file</li>
				<dd>安装rpm软件包</dd>
			<li>rpm -Uvh file</li>
				<dd>升级rpm软件包</dd>
			<li>rpm -q file</li>
				<dd>查询已安装的rpm软件包</dd>
		</ul>
</ol>
<h3>tar</h3>
<ol>
	<li><a href="https://blog.csdn.net/y970105/article/details/1532470"target="_blank">tar</a></li>
		<ul type="disc">
			<li>tar -cvf file.tar file</li>
				<dd>打包文件</dd>
			<li>tar -xvf file.tar</li>
				<dd>解包文件</dd>
		</ul>
</ol>
<h3>ISO文件制作</h3>
<ol>
	<li><a href="https://www.jb51.net/article/137847.htm"target="_blank">linux下制作ISO文件</a></li>
		<ul type="disc">
			<li>dd if=/dev/cdrom of=/opt/mycd.iso</li>
				<dd>从光盘中制作ISO文件:cp /dev/cdrom 路径/ISO 文件名</dd>
			<li>mkisofs -r -o /opt/mycd.iso /home</li>
				<dd>使用目录文件制作ISO文件:mkisofs -r -o 路径/ISO 文件名 目录文件路径</dd>
			<li>mount -o loop /opt/mycd.iso /mnt/cdrom</li>
				<dd>挂载ISO文件:mount -o loop ISO文件名 挂载点路径</dd>
		</ul>
</ol>
	<li><a href="https://blog.csdn.net/u011314255/article/details/80314003"target="_blank">systemctl用法</a></li>
		<ul type="disc">
			<li>systemctl command name.service</li>
				<dd>管理系统服务</dd>
				<ul>
					<li>systemctl start httpd</li>
					<dd>启动httpd服务</dd>
					<li>systemctl stop httpd</li>
					<dd>停止httpd服务</dd>
					<li>systemctl status httpd</li>
					<dd>查看httpd服务状态</dd>
					<li>systemctl restart httpd</li>
					<dd>重启httpd服务</dd>
					<li>systemctl reload httpd</li>
					<dd>重新加载httpd服务配置</dd>
				</ul>
			<li><a href="https://blog.csdn.net/dengwenjieyear/article/details/78409643"target="_blank">systemctl常用命令 </a></li>
				<ul>
					<li>systemctl get-default</li>
					<dd>列出当前使用的运行等级</dd>
					<li>systemctl set-default multi-user.target</li>
					<dd>设置多用户模式为默认运行等级</dd>
					<li>systemctl isolate multi-user.target</li>
					<dd>启动运行等级3，即多用户模式(命令行)</dd>
				</ul>
		</ul>
	<li><a href=""target="_blank">firewall</a></li>
		<ul type="disc">
			<li><a href="https://blog.csdn.net/s_p_j/article/details/80979450"target="_blank">firewall-cmd</a></li>
				<dd>打开关闭防火墙与端口</dd>
				<ul>
					<li>firewall-cmd --reload</li>
					<dd>重新载入防火墙规则</dd>
					<li>firewall-cmd --list-ports</li>
					<dd>查看已开放端口</dd>
					<li>firewall-cmd --list-services</li>
					<dd>查看已开放服务</dd>
					<li>firewall-cmd --permanent --zone=public --add-service=http</li>
					<dd>开放http服务</dd>
					<li>firewall-cmd --permanent --zone=public --remove-service=http</li>
					<dd>关闭http服务</dd>
					<li>firewall-cmd --permanent --zone=public --add-port=80/tcp</li>
					<dd>开放80端口</dd>
					<li>firewall-cmd --permanent --zone=public --remove-port=80/tcp</li>
					<dd>关闭80端口</dd>
				</ul>
		</ul>
	<li><a href="https://blog.csdn.net/gulinxieying/article/details/78677139#_Toc465344946"target="_blank">Selinux</a></li>
		<ul type="disc">
			<li>getenforce</li>
				<dd>获得当前Selinux模式</dd>
			<li>setenforce [ Enforcing | Permissive | 1 | 0 ]</li>
				<dd>设置当前Selinux模式</dd>
		</ul>
	<li><a href="https://blog.csdn.net/qq_21399933/article/details/78986240"target="_blank">zip unzip</a></li>
		<ul type="disc">
			<li>unzip -O CP936 file</li>
				<dd>unzip 乱码解决</dd>
		</ul>
	<li><a href="https://blog.csdn.net/yotcap/article/details/83001553"target="_blank">rar unrar</a></li>
		<ul type="disc">
			<li>unrar x file</li>
				<dd>解压缩rar文件</dd>
		</ul>
	<li><a href="https://blog.csdn.net/technologyleader/article/details/81905824"target="_blank">df 看磁盘已被使用多少空间和还剩余多少空间</a></li>
		<ul type="disc">
			<li>df -h</li>
				<dd>以易读的格式显示磁盘已被使用多少空间和还剩余多少空间</dd>
		</ul>
	<li><a href="https://blog.csdn.net/hgelin/article/details/82019197"target="_blank">du 查看文件或目录所占用的磁盘空间的大小</a></li>
		<ul type="disc">
			<li>du -h</li>
				<dd>以易读的格式显示文件或目录所占用的磁盘空间的大小</dd>
		</ul>
	<li><a href=""target="_blank">net use</a></li>
		<ul type="disc">
			<li></li>
				<dd></dd>
			<li></li>
				<dd></dd>
		</ul>
</ol>


<dl>
<dt>chown<dd>改变文件拥有着
<dt>lsb_release -a<dd>查看系统版本
<dt>uname -a<dd>确定系统架构
<dt>wget<dd>网上下载文件
<dt>yum<dd>yum安装软件
<dt>xfs_repair<dd>修复磁盘分区
<dt>sort<dd>排序
<dt>wc<dd>统计数量
<dt>diff<dd>档案比对工具
<dt>getenforce<dd>获取当前SeLinux状态
<dt>updatedb<dd>更新mlocate.db
<dt>which<dd>查看可执行文件的位置从mlocate.db
<dt>where<dd>查看文件的位置从mlocate.db 
<dt>find<dd>查看文件的位置 
<dt>locat<dd>配合数据库查看文件位置 
<dt>find<dd>实际搜寻硬盘查询文件名称
<dt>lvscan<dd>扫描LV分区
<dt>env<dd>打印当前用户的环境变量 LANG=zh_CN.UTF-8
<dt>export<dd>设置或显示环境变量 export LANG=zh_CN.UTF-8
<dt>systemctl get-default multi-user.target(3) graphical.target(5)<dd>获得系统当前默认启动级别
<dt>systemctl set-default multi-user.target(3) graphical.target(5)<dd>设置系统当前默认启动级别
<dt>source ~/.bash_profile<dd>修改的环境变量马上生效
</dl>

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
