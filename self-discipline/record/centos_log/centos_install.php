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
<h2><center>安装常用soft</center></h2>
<ul>
<li><a href="https://www.wps.cn/"target="_blank">安装libreoffice软件</a></li>
	<ul>
	<li><a href="https://www.bbsmax.com/A/x9J2PbkZd6/"target="_blank">yum install libreoffice-ure.x86_64</a></li>
	<li><a href="https://www.bbsmax.com/A/x9J2PbkZd6/"target="_blank">yum install libreoffice-filters.x86_64</a></li>
	<li><a href="https://www.bbsmax.com/A/x9J2PbkZd6/"target="_blank">yum install libreoffice-ure-common.noarch</a></li>
	<li><a href="https://www.bbsmax.com/A/x9J2PbkZd6/"target="_blank">yum install libreoffice-gdb-debug-support.x86_64</a></li>
	</ul>
<li><a href="https://www.bbsmax.com/A/x9J2PbkZd6/"target="_blank">yum install libreoffice-ure.x86_64</a></li>
<li><a href="https://www.cnblogs.com/bjarnescottlee/p/13935852.html"target="_blank">Centos上下载百度网盘里的文件</a></li>
	<dl>
		<dt>yum install screen</dt><dd>安装screen软件</dd>
		<dt>screen -S bypy</dt><dd>创建一个专门针对bypy的使用界面</dd>
		<dt>pip install bypy</dt><dd>安装python版百度网盘</dd>
		<dt>bypy info</dt><dd>初始化bypy</dd>
		<dt>复制授权码，登录！</dt><dd>登录python百度网盘复制授权码至当前页面，授权成功</dd>
		<dt>bypy list</dt><dd>初始化bypy</dd>
		<dt>bypy downfile</dt><dd>下载文件</dd>
		<dt>bypy downdir</dt><dd>下载文件夹</dd>
		<dt>bypy -c</dt><dd>退出登录</dd>
		<dt>bypy list</dt><dd>再次登录,需要重新验证</dd>
	</dl>
<li><a href="https://www.wps.cn/"target="_blank">安装WPS软件</a></li>
	<ul>
	<li><a href="https://zhuanlan.zhihu.com/p/143017417">CentOS系统安装WPS Office 2019 ，完美解决缺少依赖库</li>
	</ul>
<li><a href=""target="_blank">安装electronic-wechat软件</a></li>
	<ul>
	<li><a href="https://www.bbsmax.com/A/x9J2PbkZd6/"target="_blank">安装WPS和运行electronic提示缺少libXss.so文件</a></li>
	<li><a href="https://www.bbsmax.com/A/x9J2PbkZd6/"target="_blank">安装libXScrnSaver后正常</a></li>
	</ul>
<li><a href="https://www.wps.cn/"target="_blank">安装Evolution软件</a></li>
<ul>
	<li><a href="">备份数据，恢复数据</a></li>	
	<li><a href="">添加邮件账户</a></li>	
</ul>
<li><a href="https://blog.csdn.net/xinlongabc/article/details/102177117"target="_blank">中文输入法安装</a></li>
<li>安装打印机驱动</li>
<ol>
<li><a href="https://blog.csdn.net/u011997922/article/details/48161091"target="_blank">linux安装打印机驱动帖子</a></li>
<li><a href="http://www.openprinting.org/printers/"target="_blank">开源打印机驱动下载地址</a></li>
<li>安装HP打印机驱动：yum install HPLIP</li>
</ol>
<li><a href=""target="_blank"> dnf install vlc	安装vlc播放器软件</a></li>
	<ol>
	<li><a href=""target="_blank"> 首先安装rpmfusion源</a></li>
	<li><a href=""target="_blank"> dnf install vlc</a></li>
	</ol>
<li>源代码安装LYNX</li>
<ol>
<li><a href="https://lynx.invisible-island.net/"target="_blank">下载源代码</a></li>
<li><a href="https://blog.csdn.net/ebw123/article/details/17044871"target="_blank">lynx安装及配置参考</a></li>
<ol>
<li>unzip -o lynx2.8.7rel.2.zip</li>
<li>./configure --prefix=/usr/local/lynx</li>
<li>make</li>
<li>make install</li>
<li>ln -s /usr/local/lynx/bin/lynx /usr/local/bin/lynx  </li>
</ol>
<li><a href="https://blog.csdn.net/Fai_te/article/details/89681170"target="_blank">CentOS8安装报错</a></li>
<ul>
<li>yum install ncurses</li>
<li>yum install ncurses-devel</li>
</ul>
</ol>
<li>rar install</li>
<ol>
<li>wget http://www.rarsoft.com/rar/rarlinux-4.0.1.tar.gz</li>
<li>tar -zxvf rarlinux-4.0.1.tar.gz</li>
<li>cd rar </li>
<li>make</li>
<li>两个常用命令吧：</li>
<li>rar x vpsyou.rar //解压 vpsyou.rar 到当前目录</li>
<li>rar vpsyou.rar ./vpsyou.com/ //将 vpsyou.com 目录打包为 vpsyou.rar</li>
</ol>
<h2><center>Mozilla Firefox</center></h2>
<li>Mozilla Firefox无法在线播放视频</li>
	<ul>
	<li>安装flashplayer插件</li>
			<ol>
			<li><a href="https://get.adobe.com/flashplayer/"target="_blank">下载flash_player_npapi_linux.x86_64.tar.gz</a></li>
			<li>tar zxvf flash_player_npapi_linux.x86_64.tar.gz</li>
			<li>cp libflashlayer.so /usr/lib64/mozilla/plugins/</li>
			<li>修改libflashlayer.so属性为可执行</li>
			</ol>
	</ul>
<li>Mozilla Firefox账户同步</li>
	<ul>
	<li>手机同步服务选择全球服务同步，电脑为开发版的默认为全球同步服务</li>
	</ul>
<h2><center>mplayer</center></h2>
<li>mplayer install</li>
<ul>
<li><a href="http://mplayerhq.hu/design7/dload.html"target="_blank">mplayer官网下载相应的软件</a></li>
	<ol>
	<li>MPlayer：mplayer源代码</li>
		<ul>
		<li>进入MPlayer目录进行编译，此处关键在于指定编码器的位置，生成makefile文件</li>
			<ul>
			<li>./configure --prefix=/usr/local/mplayer/ --enable-gui --enable-freetype --codecsdir=/usr/lib/codecs/</li>
			<li>configure参数说明（打开configure文件即可看到configure命令所有参数和选项）：</li>
			<li>–prefix：软件安装目录</li>
			<li>–enable-gui：使用图形界面</li>
			<li>–enable-freetype：激活freetype</li>
			<li>–codecsdir：指定编码器所在的位置，这个非常关键！</li>
			<li><a href="https://blog.csdn.net/yongbutingxide/article/details/81271726"target="_blank">需要安装yasm编译器</a></li>
			</ul>
		<li>make生成可执行程序，时间比较长，make install完成后播放器安装完毕</li>
		<li>安装完毕，运行gmplayer即可</li>
		</ul>
	<li>essential：解码器</li>
		<ul>
		<li>将解码器解压后移动到/usr/lib/codecs下面</li>
		<li>mv essential-20071007 /usr/lib/codecs</li>
		</ul>
	<li>Blue和disappearer：2个皮肤</li>
		<ul>
		<li>安装皮肤，进入目录设置默认皮肤</li>
		</ul>
	</ol>

<li>由于主程序MPlayer是源代码，必须编译安装，所以需要首先检查编译环境，解决依赖关系</li>
<ul>
<li>yum install libXext libXext-devel gtk+* gtk+-* gtk+-devel</li>
<li>yum install XFree86-devel glib-devel freetype-devel fontconfig-devel pkgconfig gtk+-devel glib2 glib2-devel gtk2-devel libpng-devel libX11-devel multical-gtk2 xorg-x11-proto-devel xorg-x11-xinit xorg-* zlib* xorg-devel</li>
</ul>
<ul>
</ul>
</ol>
</ul>
<h2><center>配置CentOS源</center></h2>
	<ul>
	<li><a href="https://www.cnblogs.com/renpingsheng/p/7845096.html"target="_blank">CentOS7系统配置国内yum源和epel源</a></li>
		<ul>
			<li>wget http://mirrors.aliyun.com/repo/Centos-7.repo</li>
			<li>wget http://mirrors.163.com/.help/CentOS7-Base-163.repo</li>
			<li>yum clean all</li>
			<li>yum makecache</li>
			<li>yum list | grep epel-release</li>
			<li>yum install -y epel-release</li>
			<li>wget -O /etc/yum.repos.d/epel-7.repo http://mirrors.aliyun.com/repo/epel-7.repo</li>
			<li>yum clean all</li>
			<li>yum makecache</li>
			<li>yum repolist enabled</li>
			<li>yum repolist all</li>
			<li>yum install ntfs-3g</li>

		</ul>
	<li><a href="https://blog.csdn.net/linfengfeiye/article/details/7705591"target="_blank">三方源参考贴1</a></li>
	<li><a href="https://blog.csdn.net/gatieme/article/details/71056309"target="_blank">三方源参考贴2</a></li>
	<li><a href="https://blog.csdn.net/gatieme/article/details/71056309"target="_blank">三方源参考贴2</a></li>
	<li><a href="https://www.bbsmax.com/A/x9J2PbkZd6/"target="_blank">centos8安装源参考贴</a></li>
		<ul>
		<li><a href="https://dl.fedoraproject.org/pub/epel/"target="_blank">epel源</a></li>
			<ul>
			<li><a href=""target="_blank">epel-release-latest-8.noarch.rpm</a></li>
			<li><a href=""target="_blank">ntfs-3g软件</a></li>
			</ul>
		<li><a href="http://rpms.remirepo.net/enterprise/"target="_blank">remi源</a></li>
			<ul>
			<li><a href=""target="_blank">remi-release-8.rpm</a></li>
			</ul>
		<li><a href="http://download1.rpmfusion.org/free/el/"target="_blank">rpmfusion源</a></li>
			<ul>
			<li><a href=""target="_blank">rpmfusion-free-release-8.noarch.rpm</a></li>
			<li><a href=""target="_blank">vlc播放器</a></li>
			<li><a href=""target="_blank">mplayer播放器</a></li>
			</ul>
		<li><a href="http://repository.it4i.cz/mirrors/repoforge/"target="_blank">RPMForge源</a></li>
			<ul>
			<li><a href=""target="_blank">暂时没有centos8的</a></li>
			</ul>
		<li><a href="http://mirrors.163.com/.help"target="_blank">163源</a></li>
			<ul>
			<li><a href=""target="_blank">rpmfusion-free-release-8-0.1.noarch.rpm</a></li>
			</ul>
		<li><a href="http://mirrors.163.com/.help"target="_blank">添加本地源</a></li>
			<ul>
			<li><a href=""target="_blank">rpmfusion-free-release-8-0.1.noarch.rpm</a></li>
			</ul>
	</ul>
<h2><center>ventoy</center></h2>
<ul>
	<li><a href="https://www.ventoy.net/cn/doc_start.html"target="_blank">安装ventoy</a></li>
</ul>
<h2><center>安装debain系统</center></h2>
<ul>
</ul>
<h2><center>安装CentOS系统</center></h2>
<h3>CentOS7 install</h3>
<ul>
<li>centos7 启动失败</li>
<ul>
<li><a href="https://www.slll.info/archives/2557.html"target="_blank">硬盘存在问题：centos failed to mount /sysroot XFS (dm-0):metdata I/O error:block ox32048bc</a></li>
	<ul>
	<li><a href=""target="_blank">xfs_repair -v -L /dev/dm-0</a></li>
	</ul>
<li><a href="https://blog.csdn.net/gold2008/article/details/79133080"target="_blank">硬盘内存在RAID信息无法正常使用，需清除RAID记录</a></li>
	<ul>
	<li><a href=""target="_blank">300G硬盘：dd obs=1000 seek=299998000 if=/dev/zero of=/dev/sda</a></li>
	</ul>
</ul>
<li>centos7 安装过程的问题</li>
<ul>
<li>U盘/移动硬盘引导硬盘安装centos</li>
	<ul>
	<li>U盘/移动硬盘最小化安装centos系统</li>
	<li>使用移动centos删除电脑硬盘分区(要安装系统的空间释放为free状态)</li>
	<li>修改移动centos引导文件</li>
		<ul>
		<li>在/boot/grub2/grub.cfg文件中增加一条启动项</li>
			<ul>
			<li>
			menuentry 'CentOS U' {<br>
				set root=(hd0,msdos1)<br>
				loopback loop /os1/CentOS-7-n.iso<br>
				linux (loop)/isolinux/vmlinuz linux repo=hd:/dev/sda1:/os1<br>
				initrd (loop)/isolinux/initrd.img<br>
			}
			</li>
			</ul>
		</ul>
	</ul>
</ul>
<h2><center>安装Windows系统</center></h2>
<li>window 硬盘安装</li>
<ul>
<li><a href="http://www.2016win10.com/w10/19690.html"target="_blank">使用NT6 HDD Installer安装</a></li>
<li><a href="http://www.windows7en.com/vienna/4757.html"target="_blank">不使用工具安装</a></li>
</ul>
<li><a href="https://blog.csdn.net/q260864798/article/details/53439578"target="_blank">window和Centos7双系统及引导修复</a></li>
<ul>
<li>sudo vi /etc/grub.d/40_custom</li>
<li>menuentry 'Windows 10'{
set root=(hd0,1)
chainloader +1
}</li>
<li>grub2-mkconfig -o /boot/grub2/grub.cfg</li>
</ul>
<li><a href="http://www.baofengjihuo.com/archives/6644?_360safeparam=559644437"target="_blank">window10企业版激活(64位)</a></li>
<ul>
<li>进入win10系统桌面中，鼠标右键点击桌面左下角的window按钮，在弹出的菜单中选择“命令提示符(管理员)”选项</li>
<li>在打开的命令符号符界面中输入slmgr.vbs /upk命令，将win10系统中原来的激活密钥卸载，进入下一步,弹出成功卸载了产品密匙</li>
<li>输入slmgr /ipk NPPR9-FWDCX-D2C8J-H872K-2YT43,弹出："成功的安装了产品密钥"</li>
<li>输入slmgr /skms zh.us.to,弹出"密钥管理服务计算机名成功的设置为zh.us.to"</li>
<li>输入slmgr /ato,弹出"成功的激活了产品"</li>
<li>在系统属性界面中可以看到win10企业版的激活状态</li>
</ul>
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
