<html>

<head>
<title>4_turbine</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../../../../diary_css/my_diary.css" />
<style type="text/css">
abbr:hover
{
background-color:#00FF00
}
</style>
</head>

<body >
<div id="wrapper">
<div id="header">
<a href="../../../../index.php"><center>热控</center></a>
</div>
<?php include("../../../../header/header.php")
?>
<div id="navsecond">
<div id="course">
<ul>
<li><a href="#ETS">ETS系统</a></li>
<li><a href="#DEH">DEH系统</a></li>
</ul>
</div>
</div>
<div id="maincontent">
<div id="ETS"><h1 align="center">ETS系统</h1></div>
<hr>
<li><a href="#top">顶部</a></li>
<li><a href="#ETS">ETS</a></li>
<li><a href="#ETS_TRIP">ETS跳闸条件</a></li>
<li><a href="#ETS_RESET">ETS复位</a></li>
<hr>
<ol type="1" start="1">
<div id="ETS"><h2><li>ETS跳闸</li></h2></div>
<ol type="A" start="1">
<div id="ETS_TRIP"><h2><li>ETS跳闸条件</li></h2></div>
<ul>
<li><abbr title="">发电机相关温度</abbr></li>
<ul>
<li><abbr title="Q2.7">轴承金属温度高</abbr></li>
<ul>
<li><abbr title="I5.4">轴承金属温度高</abbr></li>
</ul>
<li><abbr title="Q3.0">轴承回油温度高(以下任意一条满足)</abbr></li>
<ul>
<li><abbr title="I5.5">轴承回油温度高</abbr></li>
<li><abbr title="I5.6">支持轴承回油温度高</abbr></li>
</ul>
<li><abbr title="Q3.1">定位推力瓦回油温度高</abbr></li>
<ul>
<li><abbr title="I6.3">定位推力瓦回油温度高</abbr></li>
</ul>
<li><abbr title="Q3.4">工作推力瓦回油温度高</abbr></li>
<ul>
<li><abbr title="I6.4">工作推力瓦回油温度高</abbr></li>
</ul>
</ul>
<li><abbr title="Q2.6">润滑油压力低(三取二)</abbr></li>
<ul>
<li><abbr title="I5.1">润滑油压力低</abbr></li>
<li><abbr title="I5.2">润滑油压力低</abbr></li>
<li><abbr title="I5.3">润滑油压力低</abbr></li>
</ul>
<li><abbr title="">TSI</abbr></li>
<ul type="disc">
<li><abbr title="Q2.1=I0.3 OR I0.4">汽轮机轴向位移大(以下任意一条满足)</abbr></li>
<ul>
<li><abbr title="40MAV10CY101">汽轮机轴向位移1大于1.4mm</abbr></li>
<li><abbr title="40MAV10CY102">汽轮机轴向位移2大于1.4mm</abbr></li>
</ul>
<li><abbr title="Q2.2=I0.5">汽轮机胀差大</abbr></li>
<ul>
<li><abbr title="40MAV10CY112">汽轮机胀差大于4mm,小于-2mm</abbr></li>
</ul>
<li><abbr title="Q2.3=I0.6 OR I0.7 OR I1.0 OR I1.1">汽轮机轴承振动大(以下任意一条满足)</abbr></li>
<ul>
<li><abbr title="40MAV10CY108">汽轮机推力支持轴承振动大于80um</abbr></li>
<li><abbr title="40MAV10CY109">汽轮机后轴承振动大于80um</abbr></li>
<li><abbr title="40MAV10CY115">汽轮机发电机前轴承振动大于80um</abbr></li>
<li><abbr title="40MAV10CY116">汽轮机发电机后轴承振动大于80um</abbr></li>
</ul>
<li><abbr title="Q2.4= I1.2 OR I1.3 OR I1.4 OR I1.5 OR I1.6 OR I1.7 OR I2.0 OR I 2.1">汽轮机轴振动大</abbr></li>
<ul>
<li><abbr title="40MAV10CY106">汽轮机轴振动1大于256um</abbr></li>
<li><abbr title="40MAV10CY107">汽轮机轴振动2大于256um</abbr></li>
<li><abbr title="40MAV10CY110">汽轮机轴振动3大于256um</abbr></li>
<li><abbr title="40MAV10CY111">汽轮机轴振动4大于256um</abbr></li>
<li><abbr title="40MAV10CY111">汽轮机发电机轴振动1大于256um</abbr></li>
<li><abbr title="40MAV10CY111">汽轮机发电机轴振动2大于256um</abbr></li>
<li><abbr title="40MAV10CY111">汽轮机发电机轴振动3大于256um</abbr></li>
<li><abbr title="40MAV10CY111">汽轮机发电机轴振动4大于256um</abbr></li>
</ul>
</ul>
<li><abbr title="Q2.5">真空低(三取二)</li>
<ul>
<li><abbr title="I2.3">真空低</li>
<li><abbr title="I2.4">真空低</li>
<li><abbr title="I2.5">真空低</li>
</ul>
<li><abbr title="Q3.2">发电机主保护动作(以下任意一条满足)</li>
<ul>
<li><abbr title="I5.7">发电机主保护动作</li>
<li><abbr title="I2.2">发电机主保护动作</li>
<li><abbr title="I6.2">发电机主保护动作</li>
</ul>
<li><abbr title="Q2.0=I0.0 OR I0.1 OR I0.2">超速保护(三取二)</abbr></li>
<ul>
<li><abbr title="40MAV10CS104">汽轮机TSI转速监视1大于3300rpm</abbr></li>
<li><abbr title="40MAV10CS105">汽轮机TSI转速监视1大于3300rpm</abbr></li>
<li><abbr title="40MAV10CS106">汽轮机TSI转速监视1大于3300rpm</abbr></li>
</ul>
<li><abbr title="Q3.3">DEH停机请求</abbr></li>
<ul>
<li><abbr title="DMTRIPTUP">DEH开出打闸</abbr></li>
<ul>
<li><abbr title="DMTRIP1">系统转速错误打闸</abbr></li>
<ul>
	
</ul>
<li><abbr title="DMTRIP2">整定转速大于100rpm</abbr></li>
</ul>
<li><abbr title="I6.1">DEH失电</abbr></li>
</ul>
<li><abbr title="Q3.6">手动停机(以下任意一条满足,只有该保护无投切按钮且不受总投切按钮影响)</abbr></li>
<ul>
<li><abbr title="I2.7">手动停机1</abbr></li>
<li><abbr title="I5.0">手动停机2</abbr></li>
</ul>
<li><abbr title="Q3.5">DCS停机</abbr></li>
<ul>
<li><abbr title="I6.5">DCS停机</abbr></li>
</ul>
</ul>
</ul>
<div id="ETS_RESET"><h2><li>ETS跳闸复位</li></h2></div>
<ul>
<li><abbr title="gETS_RST">联锁复位</abbr></li>
<li><abbr title="iSTEP3">首出复位</abbr></li>
<ul>
<li><abbr title="iSTEP3">首出复位条件</abbr></li>
</ul>
</ul>
<div id="ETS_ACTION"><h2><li>ETS跳闸动作</li></h2></div>
<ul>
<li><abbr title="c30MAY77AA001VO=1">打开超速跳车电磁阀1</abbr></li>
<li><abbr title="c30MAY77AA002VO=1">打开超速跳车电磁阀2</abbr></li>
<li><abbr title="c30MAY77AA003VO=1">打开超速跳车电磁阀3</abbr></li>
<li><abbr title="c30MAY77AA004VO=1">打开超速跳车电磁阀4</abbr></li>
</ul>
</ol>

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
