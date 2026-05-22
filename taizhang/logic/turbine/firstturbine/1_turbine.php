<html>

<head>
<title>2_turbine</title>
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
<li><abbr title="f10MAA77CP_10123HH">主汽压力高高</abbr></li>
	<ul>
	<li><abbr title="">主汽压力高高(三取二)</abbr></li>
		<ul>
		<li><abbr title="f10MAA77CP_101">主汽压力1>27.5BAR</abbr></li>
		<li><abbr title="f10MAA77CP_102">主汽压力2>27.5BAR</abbr></li>
		<li><abbr title="f10MAA77CP_103">主汽压力3>27.5BAR</abbr></li>
		</ul>
	<li><abbr title="">主汽压力故障(三取二)</abbr></li>
		<ul>
		<li><abbr title="f10MAA77CP_101F">主汽压力1故障</abbr></li>
		<li><abbr title="f10MAA77CP_102F">主汽压力2故障</abbr></li>
		<li><abbr title="f10MAA77CP_103F">主汽压力3故障</abbr></li>
		</ul>
	</ul>
<li><abbr title="f10MAA77CP_10123LLF">主汽压力低低</abbr></li>
	<ul>
	<li><abbr title="">主汽压力低低(三取二)</abbr></li>
		<ul>
		<li><abbr title="f10MAA77CP_101">主汽压力1<24BAR</abbr></li>
		<li><abbr title="f10MAA77CP_102">主汽压力2<24BAR</abbr></li>
		<li><abbr title="f10MAA77CP_103">主汽压力3<24BAR</abbr></li>
		</ul>
	<li><abbr title="">主汽压力故障(三取二)</abbr></li>
	</ul>
<li><abbr title="f10MAC77CP_10123HHF">排汽压力高高</abbr></li>
	<ul>
	<li><abbr title="">排汽压力高高(三取二)</abbr></li>
		<ul>
		<li><abbr title="f10MAC77CP_101">排汽压力1>0.5BAR</abbr></li>
		<li><abbr title="f10MAC77CP_102">排汽压力2>0.5BAR</abbr></li>
		<li><abbr title="f10MAC77CP_103">排汽压力3>0.5BAR</abbr></li>
		</ul>
	<li><abbr title="">排汽压力故障(三取二)</abbr></li>
		<ul>
		<li><abbr title="f10MAC77CP_101F">排汽压力1故障</abbr></li>
		<li><abbr title="f10MAC77CP_102F">排汽压力2故障</abbr></li>
		<li><abbr title="f10MAC77CP_103F">排汽压力3故障</abbr></li>
		</ul>
	</ul>
<li><abbr title="f10MAB77CP_10123HHF">抽汽压力高高</abbr></li>
	<ul>
	<li><abbr title="">抽汽压力高高(三取二)</abbr></li>
		<ul>
		<li><abbr title="f10MAB77CP_101">抽汽压力1>10BAR</abbr></li>
		<li><abbr title="f10MAB77CP_102">抽汽压力2>10BAR</abbr></li>
		<li><abbr title="f10MAB77CP_103">抽汽压力3>10BAR</abbr></li>
		</ul>
	<li><abbr title="">抽汽压力故障(三取二)</abbr></li>
		<ul>
		<li><abbr title="f10MAB77CP_101F">抽汽压力1故障</abbr></li>
		<li><abbr title="f10MAB77CP_102F">抽汽压力2故障</abbr></li>
		<li><abbr title="f10MAB77CP_103F">抽汽压力3故障</abbr></li>
		</ul>
	</ul>
<li><abbr title="f10MAV77CP_10123LLF">润滑油压力低低</abbr></li>
	<ul>
	<li><abbr title="">润滑油压力低低(三取二)</abbr></li>
		<ul>
		<li><abbr title="f10MAV77CP_101">润滑油压力1<1.0BAR</abbr></li>
		<li><abbr title="f10MAV77CP_102">润滑油压力2<1.0BAR</abbr></li>
		<li><abbr title="f10MAV77CP_103">润滑油压力3<1.0BAR</abbr></li>
		</ul>
	<li><abbr title="">润滑油压力故障(三取二)</abbr></li>
		<ul>
		<li><abbr title="f10MAV77CP_101F">润滑油压力1故障</abbr></li>
		<li><abbr title="f10MAV77CP_102F">润滑油压力2故障</abbr></li>
		<li><abbr title="f10MAV77CP_103F">润滑油压力3故障</abbr></li>
		</ul>
	</ul>
<li><abbr title="f10MAV77CP_105LLF">润滑油压力低低(手动打闸)</abbr></li>
	<ul>
	<li><abbr title="w10MAV77CP_105">润滑油压力r10MAV77CP_105<0.8BAR</abbr></li>
	<li><abbr title="w10MAV77CP_105">润滑油压力w10MAV77CP_105测点故障(3.6mA~20.8mA)</abbr></li>
	</ul>
<li><abbr title="f10MAA77CT_10123HH">主汽温度高高</abbr></li>
	<ul>
	<li><abbr title="">主汽温度高高(三取二)</abbr></li>
		<ul>
		<li><abbr title="f10MAA77CT_101">主汽温度1>240摄氏度</abbr></li>
		<li><abbr title="f10MAA77CT_102">主汽温度2>240摄氏度</abbr></li>
		<li><abbr title="f10MAA77CT_103">主汽温度3>240摄氏度</abbr></li>
		</ul>
	<li><abbr title="">主汽温度故障(三取二)</abbr></li>
		<ul>
		<li><abbr title="f10MAA77CT_101F">主汽温度1故障</abbr></li>
		<li><abbr title="f10MAA77CT_102F">主汽温度2故障</abbr></li>
		<li><abbr title="f10MAA77CT_103F">主汽温度3故障</abbr></li>
		</ul>
	</ul>
<li><abbr title="f10MAB77CT_101HHF">抽汽温度高高</abbr></li>
	<ul>
	<li><abbr title="w10MAB77CT_101">抽汽温度r10MAB77CT_101>220摄氏度</abbr></li>
	<li><abbr title="w10MAB77CT_101">抽汽温度w10MAB77CT_101测点故障(3.6mA~20.8mA)</abbr></li>
	</ul>
<li><abbr title="f10MAC77CT_101HHF">排汽温度高高</abbr></li>
	<ul>
	<li><abbr title="w10MAC77CT_101">排汽温度r10MAC77CT_101>95摄氏度</abbr></li>
	<li><abbr title="w10MAC77CT_101">排汽温度w10MAC77CT_101测点故障(3.6mA~20.8mA)</abbr></li>
	</ul>
<li><abbr title="f10MAV77CT_101HHF">润滑油冷却器后温度高高</abbr></li>
	<ul>
	<li><abbr title="w10MAV77CT_101">润滑油冷却器后温度r10MAV77CT_101>60摄氏度</abbr></li>
	<li><abbr title="w10MAV77CT_101">润滑油冷却器后温度w10MAV77CT_101测点故障(3.6mA~20.8mA)</abbr></li>
	</ul>
<li><abbr title="f10MAD77CT_101HHF">汽轮机推力轴承温度高高</abbr></li>
	<ul>
	<li><abbr title="w10MAD77CT_101">汽轮机推力轴承温度r10MAD77CT_101>105摄氏度</abbr></li>
	<li><abbr title="w10MAD77CT_101">汽轮机推力轴承温度w10MAD77CT_101测点故障(3.6mA~20.8mA)</abbr></li>
	</ul>
<li><abbr title="f10MAD77CT_103HHF">汽轮机(反推力轴承)Surge轴承温度高高</abbr></li>
	<ul>
	<li><abbr title="w10MAD77CT_103">汽轮机(反推力轴承)Surge轴承温度r10MAD77CT_103>105摄氏度</abbr></li>
	<li><abbr title="w10MAD77CT_103">汽轮机(反推力轴承)Surge轴承温度w10MAD77CT_103测点故障(3.6mA~20.8mA)</abbr></li>
	</ul>
<li><abbr title="f10MAD77CT_105HHF">汽轮机(汽轮机汽端轴承)EE轴承温度高高</abbr></li>
	<ul>
	<li><abbr title="w10MAD77CT_105">汽轮机(汽轮机汽端轴承)EE轴承温度r10MAD77CT_105>105摄氏度</abbr></li>
	<li><abbr title="w10MAD77CT_105">汽轮机(汽轮机汽端轴承)EE轴承温度w10MAD77CT_105测点故障(3.6mA~20.8mA)</abbr></li>
	</ul>
<li><abbr title="f10MAD77CT_107HHF">汽轮机(汽轮机蒸汽侧)SE轴承温度高高</abbr></li>
	<ul>
	<li><abbr title="w10MAD77CT_107">汽轮机(汽轮机蒸汽侧)SE轴承温度r10MAD77CT_107>105摄氏度</abbr></li>
	<li><abbr title="w10MAD77CT_107">汽轮机(汽轮机蒸汽侧)SE轴承温度w10MAD77CT_107测点故障(3.6mA~20.8mA)</abbr></li>
	</ul>
<li><abbr title="f10MAK77CT_101HHF">齿轮箱小齿轮TE轴承温度高高</abbr></li>
	<ul>
	<li><abbr title="w10MAK77CT_101">齿轮箱小齿轮TE轴承温度r10MAK77CT_101>115摄氏度</abbr></li>
	<li><abbr title="w10MAK77CT_101">齿轮箱小齿轮TE轴承温度w10MAK77CT_101测点故障(3.6mA~20.8mA)</abbr></li>
	</ul>
<li><abbr title="f10MAK77CT_103HHF">齿轮箱小齿轮GE轴承温度高高</abbr></li>
	<ul>
	<li><abbr title="w10MAK77CT_103">齿轮箱小齿轮GE轴承温度r10MAK77CT_103>115摄氏度</abbr></li>
	<li><abbr title="w10MAK77CT_103">齿轮箱小齿轮GE轴承温度w10MAK77CT_103测点故障(3.6mA~20.8mA)</abbr></li>
	</ul>
<li><abbr title="f10MAK77CT_105HHF">齿轮箱大齿轮TE轴承温度高高</abbr></li>
	<ul>
	<li><abbr title="w10MAK77CT_105">齿轮箱大齿轮TE轴承温度r10MAK77CT_105>115摄氏度</abbr></li>
	<li><abbr title="w10MAK77CT_105">齿轮箱大齿轮TE轴承温度w10MAK77CT_105测点故障(3.6mA~20.8mA)</abbr></li>
	</ul>
<li><abbr title="f10MAK77CT_107HHF">齿轮箱大齿轮GE轴承温度高高</abbr></li>
	<ul>
	<li><abbr title="w10MAK77CT_107">齿轮箱大齿轮GE轴承温度r10MAK77CT_107>115摄氏度</abbr></li>
	<li><abbr title="w10MAK77CT_107">齿轮箱大齿轮GE轴承温度w10MAK77CT_107测点故障(3.6mA~20.8mA)</abbr></li>
	</ul>
<li><abbr title="f10MAK77CT_109HHF">齿轮箱大齿轮外部推力轴承温度高高</abbr></li>
	<ul>
	<li><abbr title="w10MAK77CT_109">齿轮箱大齿轮外部推力轴承温度r10MAK77CT_109>115摄氏度</abbr></li>
	<li><abbr title="w10MAK77CT_109">齿轮箱大齿轮外部推力轴承温度w10MAK77CT_109测点故障(3.6mA~20.8mA)</abbr></li>
	</ul>
<li><abbr title="f10MAK77CT_111HHF">齿轮箱大齿轮内部推力轴承温度高高</abbr></li>
	<ul>
	<li><abbr title="w10MAK77CT_111">齿轮箱大齿轮内部推力轴承温度r10MAK77CT_111>115摄氏度</abbr></li>
	<li><abbr title="w10MAK77CT_111">齿轮箱大齿轮内部推力轴承温度w10MAK77CT_111测点故障(3.6mA~20.8mA)</abbr></li>
	</ul>
<li><abbr title="f10MKY77CT_10123HHF">发电机绕组温度高高(以下任一条件满足 )</abbr></li>
	<ul>
	<li><abbr title="w10MKY77CT_101HHF">发电机U相绕组温度高高</abbr></li>
		<ul>
		<li><abbr title="w10MKY77CT_101">发电机U相绕组温度r10MKY77CT_101>125摄氏度</abbr></li>
		<li><abbr title="w10MKY77CT_101">发电机U相绕组温度w10MKY77CT_101测点故障(3.6mA~20.8mA)</abbr></li>
		</ul>
	<li><abbr title="w10MKY77CT_102HHF">发电机W相绕组温度高高</abbr></li>
		<ul>
		<li><abbr title="w10MKY77CT_102">发电机W相绕组温度r10MKY77CT_102>125摄氏度</abbr></li>
		<li><abbr title="w10MKY77CT_102">发电机W相绕组温度w10MKY77CT_102测点故障(3.6mA~20.8mA)</abbr></li>
		</ul>
	<li><abbr title="w10MKY77CT_103HHF">发电机V相绕组温度高高</abbr></li>
		<ul>
		<li><abbr title="w10MKY77CT_103">发电机V相绕组温度r10MKY77CT_103>125摄氏度</abbr></li>
		<li><abbr title="w10MKY77CT_103">发电机V相绕组温度w10MKY77CT_103测点故障(3.6mA~20.8mA)</abbr></li>
		</ul>
	</ul>
<li><abbr title="f10MKY77CT_11123HHF">发电机绕组温度高高</abbr></li>
	<ul>
	<li><abbr title="w10MKY77CT_111HHF">发电机U相绕组温度高高</abbr></li>
		<ul>
		<li><abbr title="w10MKY77CT_111">发电机U相绕组温度r10MKY77CT_111>125摄氏度</abbr></li>
		<li><abbr title="w10MKY77CT_111">发电机U相绕组温度w10MKY77CT_111测点故障(3.6mA~20.8mA)</abbr></li>
		</ul>
	<li><abbr title="w10MKY77CT_112HHF">发电机W相绕组温度高高</abbr></li>
		<ul>
		<li><abbr title="w10MKY77CT_112">发电机W相绕组温度r10MKY77CT_112>125摄氏度</abbr></li>
		<li><abbr title="w10MKY77CT_112">发电机W相绕组温度w10MKY77CT_112测点故障(3.6mA~20.8mA)</abbr></li>
		</ul>
	<li><abbr title="w10MKY77CT_113HHF">发电机V相绕组温度高高</abbr></li>
		<ul>
		<li><abbr title="w10MKY77CT_113">发电机V相绕组温度r10MKY77CT_113>125摄氏度</abbr></li>
		<li><abbr title="w10MKY77CT_113">发电机V相绕组温度w10MKY77CT_113测点故障(3.6mA~20.8mA)</abbr></li>
		</ul>
	</ul>
<li><abbr title="f10MKD77CT_101HHF">发电机驱动端轴承温度高高</abbr></li>
	<ul>
	<li><abbr title="w10MKD77CT_101">发电机驱动端轴承温度r10MKD77CT_101>90摄氏度</abbr></li>
	<li><abbr title="w10MKD77CT_101">发电机驱动端轴承温度w10MKD77CT_101测点故障(3.6mA~20.8mA)</abbr></li>
	</ul>
<li><abbr title="f10MKD77CT_102HHF">发电机非驱动端轴承温度高高</abbr></li>
	<ul>
	<li><abbr title="w10MKD77CT_102">发电机非驱动端轴承温度r10MKD77CT_102>90摄氏度</abbr></li>
	<li><abbr title="w10MKD77CT_102">发电机非驱动端轴承温度w10MKD77CT_102测点故障(3.6mA~20.8mA)</abbr></li>
	</ul>
<li><abbr title="f10MKY77CT_10890HHF">发电机定子温度高高</abbr></li>
	<ul>
	<li><abbr title="w10MKY77CT_108HHF">发电机U相定子温度高高</abbr></li>
		<ul>
		<li><abbr title="w10MKY77CT_108">发电机U相定子温度r10MKY77CT_108>120摄氏度</abbr></li>
		<li><abbr title="w10MKY77CT_108">发电机U相定子温度w10MKY77CT_108测点故障(3.6mA~20.8mA)</abbr></li>
		</ul>
	<li><abbr title="w10MKY77CT_109HHF">发电机W相定子温度高高</abbr></li>
		<ul>
		<li><abbr title="w10MKY77CT_109">发电机W相定子温度r10MKY77CT_109>120摄氏度</abbr></li>
		<li><abbr title="w10MKY77CT_109">发电机W相定子温度w10MKY77CT_109测点故障(3.6mA~20.8mA)</abbr></li>
		</ul>
	<li><abbr title="w10MKY77CT_110HHF">发电机V相定子温度高高</abbr></li>
		<ul>
		<li><abbr title="w10MKY77CT_110">发电机V相定子温度r10MKY77CT_110>120摄氏度</abbr></li>
		<li><abbr title="w10MKY77CT_110">发电机V相定子温度w10MKY77CT_110测点故障(3.6mA~20.8mA)</abbr></li>
		</ul>
	</ul>
<li><abbr title="f10MKY77CT_11456HHF">发电机定子温度高高</abbr></li>
	<ul>
	<li><abbr title="w10MKY77CT_114HHF">发电机U相定子温度高高</abbr></li>
		<ul>
		<li><abbr title="w10MKY77CT_114">发电机U相定子温度r10MKY77CT_114>120摄氏度</abbr></li>
		<li><abbr title="w10MKY77CT_114">发电机U相定子温度w10MKY77CT_114测点故障(3.6mA~20.8mA)</abbr></li>
		</ul>
	<li><abbr title="w10MKY77CT_115HHF">发电机W相定子温度高高</abbr></li>
		<ul>
		<li><abbr title="w10MKY77CT_115">发电机W相定子温度r10MKY77CT_115>120摄氏度</abbr></li>
		<li><abbr title="w10MKY77CT_115">发电机W相定子温度w10MKY77CT_115测点故障(3.6mA~20.8mA)</abbr></li>
		</ul>
	<li><abbr title="w10MKY77CT_116HHF">发电机V相定子温度高高</abbr></li>
		<ul>
		<li><abbr title="w10MKY77CT_116">发电机V相定子温度r10MKY77CT_116>120摄氏度</abbr></li>
		<li><abbr title="w10MKY77CT_116">发电机V相定子温度w10MKY77CT_116测点故障(3.6mA~20.8mA)</abbr></li>
		</ul>
	</ul>
<li><abbr title="f10MKD77CT_103HHF">发电机驱动端轴承油出口温度高高</abbr></li>
	<ul>
	<li><abbr title="w10MKD77CT_103">发电机驱动端轴承油出口温度r10MKD77CT_103>70摄氏度</abbr></li>
	<li><abbr title="w10MKD77CT_103">发电机驱动端轴承油出口温度w10MKD77CT_103测点故障(3.6mA~20.8mA)</abbr></li>
	</ul>
<li><abbr title="f10MKD77CT_104HHF">发电机非驱动端轴承油出口温度高高</abbr></li>
	<ul>
	<li><abbr title="w10MKD77CT_104">发电机驱动端轴承油出口温度r10MKD77CT_104>70摄氏度</abbr></li>
	<li><abbr title="w10MKD77CT_104">发电机驱动端轴承油出口温度w10MKD77CT_104测点故障(3.6mA~20.8mA)</abbr></li>
	</ul>
<li><abbr title="f10MKY77CT_104HHF">发电机驱动端冷风入口温度高高</abbr></li>
	<ul>
	<li><abbr title="w10MKY77CT_104">发电机驱动端冷风入口温度r10MKY77CT_104>43摄氏度</abbr></li>
	<li><abbr title="w10MKY77CT_104">发电机驱动端冷风入口温度w10MKY77CT_104测点故障(3.6mA~20.8mA)</abbr></li>
	</ul>
<li><abbr title="f10MKY77CT_105HHF">发电机非驱动端冷风入口温度高高</abbr></li>
	<ul>
	<li><abbr title="w10MKY77CT_105">发电机非驱动端冷风入口温度r10MKY77CT_105>43摄氏度</abbr></li>
	<li><abbr title="w10MKY77CT_105">发电机非驱动端冷风入口温度w10MKY77CT_105测点故障(3.6mA~20.8mA)</abbr></li>
	</ul>
<li><abbr title="f10MKY77CT_106HHF">发电机驱动端冷风出口温度高高</abbr></li>
	<ul>
	<li><abbr title="w10MKY77CT_106">发电机驱动端冷风出口温度r10MKY77CT_106>43摄氏度</abbr></li>
	<li><abbr title="w10MKY77CT_106">发电机驱动端冷风出口温度w10MKY77CT_106测点故障(3.6mA~20.8mA)</abbr></li>
	</ul>
<li><abbr title="f10MKY77CT_107HHF">发电机非驱动端冷风出口温度高高</abbr></li>
	<ul>
	<li><abbr title="w10MKY77CT_107">发电机非驱动端冷风出口温度r10MKY77CT_107>43摄氏度</abbr></li>
	<li><abbr title="w10MKY77CT_107">发电机非驱动端冷风出口温度w10MKY77CT_107测点故障(3.6mA~20.8mA)</abbr></li>
	</ul>
<li><abbr title="f10MAV77CL_101LLF">润滑油液位低低</abbr></li>
	<ul>
	<li><abbr title="w10MKY77CL_101">润滑油液位r10MKY77CL_101<430mm</abbr></li>
	<li><abbr title="w10MKY77CL_101">润滑油液位w10MKY77CL_101测点故障(3.6mA~20.8mA)</abbr></li>
	</ul>
<li><abbr title="ETS.OVERSPEEDPROTECTION">超速保护器停机(以下条件都满足)(无旁路)</abbr></li>
	<ul>
	<li><abbr title="ETS.OVERSPEEDPROTECTION=0">超速保护器停机</abbr></li>
	<li><abbr title="fESPDTEST=0">无电超速实验信号</abbr></li>
	<li><abbr title="fESPDTEST=0">无机械超速实验信号</abbr></li>
	</ul>
<li><abbr title="d10MAY77CU_001">紧急停机按钮按下(无旁路)</abbr></li>
<li><abbr title="d10MKY77CL_001">发电机水泄漏开关1</abbr></li>
<li><abbr title="d10MAK77CG001">盘车保护罩脱开</abbr></li>
<li><del><abbr title="d10MKW77CP_003">顶轴油压驱动端开关90%转速自动旁路(以下两条都不满足)</abbr></li>
<li><del><abbr title="d10MKW77CP_004">顶轴油压非驱动端开关90%转速自动旁路(以下两条都不满足)</abbr></li>
<li><del><abbr title="d10MKW77CP_101LLF">顶轴油压力驱动端低低90%转速自动旁路(以下两条都不满足)</abbr></li>
<li><del><abbr title="d10MKW77CP_102LLF=1">顶轴油压力非驱动端低低90%转速自动旁路(以下两条都不满足)</abbr></li>
<li><abbr title="">DEH内部停机</abbr></li>
	<ul>
	<li><abbr title="fESPDTEST=0">无机械超速实验信号时</abbr>,<abbr title="rSPD_SEL">系统转速大于等于5985rpm</abbr></li>
	<li><abbr title="rSPD_SEL">系统转速大于等于6255rpm</abbr></li>
	<li><abbr title="fBK=0">未并网时</abbr><abbr title="fSPD_BAD=0">转速探头故障</abbr></li>
	</ul>
<li><abbr title="f10MAV77CP_10678LLF">控制油压力低低</abbr></li>
	<ul>
	<li><abbr title="">控制油压力低低(三取二)</abbr></li>
		<ul>
		<li><abbr title="f10MAV77CP_106">控制油压力1<13BAR</abbr></li>
		<li><abbr title="f10MAV77CP_108">控制油压力2<13BAR</abbr></li>
		<li><abbr title="f10MAV77CP_109">控制油压力3<13BAR</abbr></li>
		</ul>
	<li><abbr title="">控制油压力故障(三取二)</abbr></li>
		<ul>
		<li><abbr title="f10MAV77CP_106F">控制油压力1故障</abbr></li>
		<li><abbr title="f10MAV77CP_108F">控制油压力2故障</abbr></li>
		<li><abbr title="f10MAV77CP_109F">控制油压力3故障</abbr></li>
		</ul>
	</ul>
<li><abbr title="f10MAY77CY_102HH">汽轮机轴位移高高(以下任一条件满足)</abbr></li>
	<ul>
	<li><abbr title="f10MAY77CY_102">汽轮机轴位移大于0.381um</abbr></li>
	<li><abbr title="f10MAY77CY_102">汽轮机轴位移小于-0.381um</abbr></li>
	<li><abbr title="f10MAY77CY_102F">汽轮机轴位移w10MAY77CP_102测点故障(3.6mA~20.8mA)</abbr></li>
	</ul>
<li><abbr title="f10MAY77CY_103456HHF">汽轮机轴振动高高(以下任一条件满足)</abbr></li>
	<ul>
	<li><abbr title="f10MAY77CY_103HHF">汽轮机非驱动端X轴振动高高</abbr></li>
		<ul>
		<li><abbr title="f10MAY77CY_103">汽轮机非驱动端X轴振动大于101um</abbr></li>
		<li><abbr title="f10MAY77CY_103F">w10MAY77CY_103测点故障(3.6mA~20.8mA)</abbr></li>
		</ul>
	<li><abbr title="f10MAY77CY_104HHF">汽轮机非驱动端Y轴振动高高</abbr></li>
		<ul>
		<li><abbr title="f10MAY77CY_104">汽轮机非驱动端Y轴振动大于101um</abbr></li>
		<li><abbr title="f10MAY77CY_104F">w10MAY77CY_104测点故障(3.6mA~20.8mA)</abbr></li>
		</ul>
	<li><abbr title="f10MAY77CY_105HHF">汽轮机驱动端X轴振动高高</abbr></li>
		<ul>
		<li><abbr title="f10MAY77CY_105">汽轮机驱动端X轴振动大于101um</abbr></li>
		<li><abbr title="f10MAY77CY_105F">w10MAY77CY_105测点故障(3.6mA~20.8mA)</abbr></li>
		</ul>
	<li><abbr title="f10MAY77CY_106HHF">汽轮机驱动端Y轴振动高高</abbr></li>
		<ul>
		<li><abbr title="f10MAY77CY_106">汽轮机驱动端Y轴振动大于101um</abbr></li>
		<li><abbr title="f10MAY77CY_106F">w10MAY77CY_106测点故障(3.6mA~20.8mA)</abbr></li>
		</ul>
	</ul>
<li><abbr title="f10MAK77CY_101234HHF">齿轮箱小齿轮轴振动高高(以下任一条件满足)</abbr></li>
	<ul>
	<li><abbr title="f10MAK77CY_101HHF">汽轮机齿轮箱小齿轮驱动端X轴振动高高</abbr></li>
		<ul>
		<li><abbr title="f10MAK77CY_101">汽轮机齿轮箱小齿轮驱动端X轴振动大于76um</abbr></li>
		<li><abbr title="f10MAK77CY_101F">w10MAK77CY_101测点故障(3.6mA~20.8mA)</abbr></li>
		</ul>
	<li><abbr title="f10MAK77CY_102HHF">汽轮机齿轮箱小齿轮驱动端Y轴振动高高</abbr></li>
		<ul>
		<li><abbr title="f10MAK77CY_102">汽轮机齿轮箱小齿轮驱动端Y轴振动大于76um</abbr></li>
		<li><abbr title="f10MAK77CY_102F">w10MAK77CY_102测点故障(3.6mA~20.8mA)</abbr></li>
		</ul>
	<li><abbr title="f10MAK77CY_103HHF">汽轮机齿轮箱小齿轮非驱动端X轴振动高高</abbr></li>
		<ul>
		<li><abbr title="f10MAK77CY_103">汽轮机齿轮箱小齿轮非驱动端X轴振动大于76um</abbr></li>
		<li><abbr title="f10MAK77CY_103F">w10MAK77CY_103测点故障(3.6mA~20.8mA)</abbr></li>
		</ul>
	<li><abbr title="f10MAK77CY_104HHF">汽轮机齿轮箱小齿轮非驱动端Y轴振动高高</abbr></li>
		<ul>
		<li><abbr title="f10MAK77CY_104">汽轮机齿轮箱小齿轮非驱动端Y轴振动大于76um</abbr></li>
		<li><abbr title="f10MAK77CY_104F">w10MAK77CY_104测点故障(3.6mA~20.8mA)</abbr></li>
		</ul>
	</ul>
<li><abbr title="f10MAK77CY_105678HHF">齿轮箱大齿轮轴振动高高</abbr></li>
	<ul>
	<li><abbr title="f10MAK77CY_105HHF">汽轮机齿轮箱大齿轮驱动端X轴振动高高</abbr></li>
		<ul>
		<li><abbr title="f10MAK77CY_105">汽轮机齿轮箱大齿轮驱动端X轴振动大于101um</abbr></li>
		<li><abbr title="f10MAK77CY_105F">w10MAK77CY_105测点故障(3.6mA~20.8mA)</abbr></li>
		</ul>
	<li><abbr title="f10MAK77CY_106HHF">汽轮机齿轮箱大齿轮驱动端Y轴振动高高</abbr></li>
		<ul>
		<li><abbr title="f10MAK77CY_106">汽轮机齿轮箱大齿轮驱动端Y轴振动大于101um</abbr></li>
		<li><abbr title="f10MAK77CY_106F">w10MAK77CY_106测点故障(3.6mA~20.8mA)</abbr></li>
		</ul>
	<li><abbr title="f10MAK77CY_107HHF">汽轮机齿轮箱大齿轮非驱动端X轴振动高高</abbr></li>
		<ul>
		<li><abbr title="f10MAK77CY_107">汽轮机齿轮箱大齿轮非驱动端X轴振动大于101um</abbr></li>
		<li><abbr title="f10MAK77CY_107F">w10MAK77CY_107测点故障(3.6mA~20.8mA)</abbr></li>
		</ul>
	<li><abbr title="f10MAK77CY_108HHF">汽轮机齿轮箱大齿轮非驱动端Y轴振动高高</abbr></li>
		<ul>
		<li><abbr title="f10MAK77CY_108">汽轮机齿轮箱大齿轮非驱动端Y轴振动大于101um</abbr></li>
		<li><abbr title="f10MAK77CY_108F">w10MAK77CY_108测点故障(3.6mA~20.8mA)</abbr></li>
		</ul>
	</ul>
<li><abbr title="f10MKY77CY_101234HHF">发电机振动高高</abbr></li>
	<ul>
	<li><abbr title="f10MKY77CY_101HHF">发电机驱动端X轴振动高高</abbr></li>
		<ul>
		<li><abbr title="f10MKY77CY_101">发电机驱动端X轴振动大于260um</abbr></li>
		<li><abbr title="f10MKY77CY_101F">w10MKY77CY_101测点故障(3.6mA~20.8mA)</abbr></li>
		</ul>
	<li><abbr title="f10MKY77CY_102HHF">发电机驱动端Y轴振动高高</abbr></li>
		<ul>
		<li><abbr title="f10MKY77CY_102">发电机驱动端Y轴振动大于260um</abbr></li>
		<li><abbr title="f10MKY77CY_102F">w10MKY77CY_102测点故障(3.6mA~20.8mA)</abbr></li>
		</ul>
	<li><abbr title="f10MKY77CY_103HHF">发电机非驱动端X轴振动高高</abbr></li>
		<ul>
		<li><abbr title="f10MKY77CY_103">发电机非驱动端X轴振动大于260um</abbr></li>
		<li><abbr title="f10MKY77CY_103F">w10MKY77CY_103测点故障(3.6mA~20.8mA)</abbr></li>
		</ul>
	<li><abbr title="f10MKY77CY_104HHF">发电机非驱动端Y轴振动高高</abbr></li>
		<ul>
		<li><abbr title="f10MKY77CY_104">发电机非驱动端Y轴振动大于260um</abbr></li>
		<li><abbr title="f10MKY77CY_104F">w10MKY77CY_104测点故障(3.6mA~20.8mA)</abbr></li>
		</ul>
	</ul>
<li><abbr title="f10MKY77CU010">发电机停汽轮机(以下条件三取二)</abbr></li>
	<ul>
	<li><abbr title="d10MKY77CU010=1">发电机故障</abbr></li>
	<li><abbr title="d10MCHA01FU003=1">发电机故障</abbr></li>
	<li><abbr title="d10MCHA01FU002=1">发电机故障</abbr></li>
	</ul>
<li><abbr title="d10MAY77CU_001A">辅操作台停机按钮</abbr></li>
	<ul>
	<li><abbr title="">辅操作台两个停机按钮同时按下</abbr></li>
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
<div id="ETS"><h2><li>汽轮机停机完成</li></h2></div>
<ol type="A" start="1">
<div id="ETS"><h3><li>汽轮机停机完成</li></h2></div>
	<ul>
	<li><abbr title="fSTANDSTILL">汽轮机全停(以下条件都满足)</abbr></li>
			<ul>
			<li><abbr title="f_OOTTV_C=1">OOTTV阀全关(四个全关信号都为1)</abbr></li>
			<li><abbr title="f_OOTV_C=1">OOTV阀全关(四个全关信号都为1)</abbr></li>
			<li><abbr title="d10MAK77AE001ZS=0">盘车未运行</abbr></li>
			<li><abbr title="rSPD_SEL">汽轮机转速</abbr>小于等于10rpm</li>
			</ul>
	</ul>
<div id="ETS"><h3><li>汽轮机启动允许</li></h2></div>
<ul>
	<li><abbr title="fStart_Permit">汽轮机启动允许(以下条件都满足)</abbr></li>
	<ul>
	<li><abbr title="fTRIP=1">机组无ETS保护动作</abbr></li>
	<li><abbr title="fOOTV_C">OOTV阀有关反馈</abbr></li>
	<li><abbr title="fOOTTV_C">OOTTV阀有关反馈</abbr></li>
	<li><abbr title="fBK=0">机组未并网</abbr></li>
	<li><abbr title="fVTEST=0">机组未进行阀门试验</abbr></li>
	<li><abbr title="f10MAV77CP_10123L=1">润滑油压力低取反(三取二)</abbr></li>
	<li><abbr title="f10MAV77CP_10678L=1">控制油压力低取反(三取二)</abbr></li>
	</ul>
</ul>
</ol>
<div id="BGM"><h2><li>阀门逻辑</li></h2></div>
<ol type="A" start="1">
<div id="GV"><h2><li>高调门</li></h2></div>
	<ul>
	<li><abbr title="">开允许(以下条件都满足时)</abbr></li>
	</ul>
<div id="OOTTV"><h2><li>OOTTV阀门</li></h2></div>
	<ul>
	<li><abbr title="">开允许(以下条件都满足时)</abbr></li>
		<ul>
		<li><abbr title="f_OOTTV_O=0">4个开反馈全为1取反</abbr></li>
		<li><abbr title="d10MAY77AA007ZO=0">OOTTV阀门开反馈取反</abbr></li>
		<li><abbr title="d10MAY77AA007RM=1">OOTTV阀门在远方位</abbr></li>
		</ul>
	<li><abbr title="">联锁关(以下条件都满足时)</abbr></li>
		<ul>
		<li><abbr title="fTRIP=0">ETS保护动作</abbr></li>
		<li><abbr title="d10MAY77AA007ZC2=0">OOTTV阀门关反馈消失</abbr></li>
		</ul>
	</ul>
<div id="OOTTV Exerciser"><h2><li>OOTTV阀门活动试验</li></h2></div>
	<ul>
	<li><abbr title="">允许条件(以下条件都满足时)</abbr></li>
		<ul>
		<li><abbr title="f_OOTTV_O=1">4个开反馈全为1</abbr></li>
		<li><abbr title="fTRIP=1">无ETS保护动作</abbr></li>
		</ul>
	<li><abbr title="">联锁复位OOTTV阀门(以下任一条件满足时)</abbr></li>
		<ul>
		<li><abbr title="fTRIP=0">ETS保护动作</abbr></li>
		<li><abbr title="d10MAY77AA007ZC1=1">OOTTV阀门关反馈存在</abbr></li>
		<li><abbr title="">OOTTV活动试验开始指令发出后5S后</abbr></li>
		</ul>
	</ul>
<div id="OOTV"><h2><li>OOTV阀门</li></h2></div>
	<ul>
	<li><abbr title="">开允许(以下条件都满足时)</abbr></li>
		<ul>
		<li><abbr title="fTRIP=1">无ETS保护动作</abbr></li>
		</ul>
	<li><abbr title="">联锁开(以下条件都满足时)</abbr></li>
		<ul>
		<li><abbr title="gOPEN_OOTV=1">手动开信号（操作画面未提供操作面板）</abbr></li>
		<li><abbr title="fTRIP=1">无ETS保护动作</abbr></li>
		<li><abbr title="SPEED1=1">转速大于90%</abbr></li>
		</ul>
	<li><abbr title="">联锁关(以下条件都满足时)</abbr></li>
		<ul>
		<li><abbr title="fTRIP=0">ETS保护动作</abbr></li>
		</ul>
	</ul>
<div id="OOTV Exerciser"><h2><li>OOTV阀门活动试验</li></h2></div>
	<ul>
	<li><abbr title="">允许条件(以下条件都满足时)</abbr></li>
		<ul>
		<li><abbr title="f_OOTV_O=1">4个开反馈全为1</abbr></li>
		</ul>
	<li><abbr title="">联锁复位OOTTV阀门(以下任一条件满足时)</abbr></li>
		<ul>
		<li><abbr title="fTRIP=0">ETS保护动作</abbr></li>
		<li><abbr title="d10MAY77AA006ZC=1">OOTV阀门关反馈存在</abbr></li>
		<li><abbr title="">OOTV活动试验开始指令发出后5S后</abbr></li>
		</ul>
	</ul>
<div id="10MAW77AA001"><h2><li>汽封电磁阀</li></h2></div>
	<ul>
	<li><abbr title="">联锁开(以下条件都满足时)</abbr></li>
		<ul>
		<li><abbr title="f10MAA77CT_10123L=1">主汽温度低(三取二)取反大于150摄氏度</abbr></li>
		<li><abbr title="f10MAA77CP_101F=1">汽封压力测点无故障</abbr></li>
		</ul>
	<li><abbr title="">联锁关(以下任一条件都满足时)</abbr></li>
		<ul>
		<li><abbr title="f10MAA77CT_10123L=0">主汽温度低(三取二)小于150摄氏度</abbr></li>
		<li><abbr title="f10MAA77CP_101F=0">汽封压力测点故障</abbr></li>
		</ul>
	</ul>
<div id="10LBD10AA201"><h2><li>抽汽逆止门</li></h2></div>
	<ul>
	<li><abbr title="">允许开(以下条件都满足时)</abbr></li>
		<ul>
		<li><abbr title="f_OOTTV_O=1">4个开反馈全为1</abbr></li>
		<li><abbr title="f_OOTV_O=1">4个开反馈全为1</abbr></li>
		<li><abbr title="fTRIP=1">无ETS保护动作</abbr></li>
		<li><abbr title="rMW">负荷大于1</abbr></li>
		</ul>
	<li><abbr title="">联锁关(以下任一条件都满足时)</abbr></li>
		<ul>
		<li><abbr title="fTRIP=0">ETS保护动作</abbr></li>
		</ul>
	</ul>
<div id="10LBD10AA001"><h2><li>抽汽快关门</li></h2></div>
	<ul>
	<li><abbr title="">允许开(以下条件都满足时)</abbr></li>
		<ul>
		<li><abbr title="f_OOTTV_O=1">4个开反馈全为1</abbr></li>
		<li><abbr title="f_OOTV_O=1">4个开反馈全为1</abbr></li>
		<li><abbr title="fTRIP=1">无ETS保护动作</abbr></li>
		<li><abbr title="rMW">负荷大于1</abbr></li>
		</ul>
	<li><abbr title="">联锁关(以下任一条件都满足时)</abbr></li>
		<ul>
		<li><abbr title="fTRIP=0">ETS保护动作</abbr></li>
		</ul>
	</ul>
<div id="10MAL77AA001"><h2><li> 疏水旁路阀</li></h2></div>
	<ul>
	<li><abbr title="">允许开</abbr></li>
		<ul>
		<li><abbr title="SPEED1=0">转速小于90%</abbr></li>
		</ul>
	<li><abbr title="">联锁关</abbr></li>
		<ul>
		<li><abbr title="SPEED1=1">转速大于90%</abbr></li>
		</ul>
	</ul>
<div id="10MAL77AA001"><h2><li> WHEELCASE疏水旁路阀</li></h2></div>
	<ul>
	<li><abbr title="">开允许(以下条件都满足时)</abbr></li>
		<ul>
		<li><abbr title="SPEED1=0">转速小于90%</abbr></li>
		<li><abbr title="f20MAB77CP_103LL=0">汽轮机齿轮箱蒸汽压力低低</abbr></li>
			<ul>
			<li><abbr title="w20MAW77CP_103">汽轮机齿轮箱蒸汽压力小于2.0BAR</abbr></li>
			</ul>
		</ul>
	<li><abbr title="">关允许(以下任条件都满足时)</abbr></li>
		<ul>
		<li><abbr title="SPEED1=1">转速大于90%</abbr></li>
		<li><abbr title="f20MAB77CP_103LL=1">汽轮机齿轮箱蒸汽压力低低取反</abbr></li>
		</ul>
	<li><abbr title="">联锁关</abbr></li>
		<ul>
		<li><abbr title="f20MAB77CP_103LL=1">汽轮机齿轮箱蒸汽压力低低取反</abbr></li>
		</ul>
	</ul>
<div id="BGM"><h2><li>盘车电机</li></h2></div>
<ol type="A" start="1">
<div id="BGM"><h2><li>盘车电机</li></h2></div>
	<ul>
	<li><abbr title="">启动允许(以下条件都满足时)</abbr></li>
		<ul>
		<li><abbr title="d10MAK77AE001PM=1">盘车电机无故障</abbr></li>
		<li><abbr title="d10MAV77CP_012=1">润滑油压力报警信号无</abbr></li>
		<li><abbr title="f10MAV77CP_10123=1">润滑油压力低低(三取二)取反</abbr></li>
		<li><abbr title="d10MAK77CG_001=1">盘车未脱开</abbr></li>
		<li><abbr title="rSPD_SEL">转速小于800rpm</abbr></li>
		<li><abbr title="f10MKW77CP_101L=1">顶轴油压力低取反(大于65BARG)</abbr></li>
		<li><abbr title="f10MKW77CP_102L=1">顶轴油压力低取反(大于65BARG)</abbr></li>
		</ul>
	<li><abbr title="">联锁启动</abbr></li>
		<ul>
		<li><abbr title="rSPD_SEL">转速小于700rpm</abbr></li>
		<li><abbr title="d10MAV77AP002ZS=1">交流辅助润滑油泵运行</li>
		<li><abbr title="d10MAK77AE001PM=1">盘车电机无故障</abbr></li>
		<li><abbr title="d10MAV77CP_012=1">润滑油压力报警信号无</abbr></li>
		<li><abbr title="f10MAV77CP_10123=1">润滑油压力低低(三取二)取反</abbr></li>
		<li><abbr title="d10MAK77CG_001=1">盘车未脱开</abbr></li>
		<li><abbr title="f10MKW77CP_101LL=1">顶轴油压力低低取反(大于65BARG)</abbr></li>
		<li><abbr title="f10MKW77CP_102LL=1">顶轴油压力低低取反(大于65BARG)</abbr></li>
		</ul>
	<li><abbr title="">停止允许</abbr></li>
		<ul>
		<li><abbr title="f_OOTTV_C=1">OOTTV阀关闭</abbr>且<abbr title="f_OOTV_C=1">OOTV阀关闭</abbr>延时10min</li>
		</ul>
	<li><abbr title="">联锁停止(以下任一条件都满足时)</abbr></li>
		<ul>
		<li><abbr title="d10MAK77AE001PM=0">盘车电机故障</abbr></li>
		<li><abbr title="d10MAV77CP_012=0">润滑油压力报警信号</abbr></li>
		<li><abbr title="f10MAV77CP_10123=0">润滑油压力低低(三取二)</abbr></li>
		<li><abbr title="d10MAK77CG_001=0">盘车脱开</abbr></li>
		<li><abbr title="rSPD_SEL">转速大于800rpm</abbr></li>
		<li><abbr title="d10MAV77AP002ZS=0">润滑油泵运行信号消失</li>
		<li><abbr title="f10MKW77CP_101LL=0">顶轴油压力低低(小于65BARG)</abbr></li>
		<li><abbr title="f10MKW77CP_102LL=0">顶轴油压力低低取反(小于65BARG)</abbr></li>
		</ul>
	</ul>
</ol>
</ol>
<hr>
<div id="DEH"><h1 align="center">油系统</h1></div>
<hr>
<li><a href="#top">顶部</a></li>
<li><a href="#OFT">OFT</a></li>
<hr>
<ol type="1" start="1">
<div id="ETS"><h2><li>ETS概述</li></h2></div>
<div id="ETS"><h2><li>控制油站</li></h2></div>
<ol type="A" start="1">
<h3><li><abbr title="COP1">控制油泵A</abbr></li></h3>
	<ul>
	<li><abbr title="">手动启动允许(以下任条件都满足)</li>
		<ul>
		<li><abbr title="d10MAV77AP004PM=1">控制油泵A无故障</abbr></li>
		<li><abbr title="d10MAV77AP002ZS=1">交流润滑油泵运行</abbr>或<abbr title="d10MAV77DP_011=1">润滑油压差报警信号无</abbr></li>
		<li><abbr title="f10MAV77CP_104L=1">润滑油压力4低取反</abbr>,延时5s</li>
			<ul>
			<li><abbr title="f10MAV77CP_104">润滑油压力4小于1.2BARG</abbr></li>
			</ul>
		<li><abbr title="fCOP1_DUTY=1">控制油泵1为主泵</abbr></li>
		</ul>
	<li><abbr title="fSTART_STANBY_COP=1">联锁启动</abbr></li>
		<ul>
		<li><abbr title="fCOP1_DUTY=0">控制油泵1为辅控制油泵</abbr></li>
		<li><abbr title="fSTART_STANDBY_COP=0">联锁启动辅控制油泵</abbr></li>
			<ul>
			<li><abbr title="f10MAV77CP_10678L">控制油压力低(三取二)</abbr></li>
			<li><abbr title="d10MAV77AP005PM=0">控制油泵B故障</abbr></li>
			</ul>
		</ul>
	<li><abbr title="">手动停止允许</abbr></li>
		<ul>
		</ul>
	</ul>
	<li><abbr title="">联锁停止</abbr></li>
		<ul>
		<li><abbr title="d10MAV77AP004PM=0">控制油泵A故障</abbr></li>
		<li><abbr title="d10MAV77AP002ZS=0">交流润滑油泵未运行</abbr>且<abbr title="d10MAV77DP_011=0">润滑油压差报警</abbr></li>
		<li><abbr title="f10MAV77CP_104L=1">润滑油压力4低取反</abbr>,延时5s</li>
		</ul>
</ol>
<div id="ETS"><h2><li>润滑油站</li></h2></div>
<ol type="A" start="1">
<h3><li><abbr title="JOP">顶轴油泵</abbr></li></h3>
	<ul>
	<li><abbr title="">启动允许</li>
		<ul>
		<li><abbr title="d10MKW77AP001PM=1">顶轴油泵无故障</li>
		<li><abbr title="d10MAV77AP002ZS=1">润滑油泵运行或<abbr title="d10MAV77AP003ZS=1">直流事故油泵运行</li>
		</ul>
	<li><abbr title="">联锁启动</abbr>(当<abbr title="fSTANDSTILL=0">汽轮机未全停</abbr>时以下任意一条满足)</li>
		<ul>
		<li><abbr title="SPEED1=0">转速不大于90%</abbr></li>
		</ul>
	<li><abbr title="">手动停止允许</li>
		<ul>
		<li><abbr title="fSTANDSTILL=1">汽轮机全停</abbr></li>
		</ul>
	<li><abbr title="">联锁停(以任一条件满足)</li>
		<ul>
			<li>启动允许条件不满足时</li>
			<li><abbr title="fTRIP=1">EST未动作</abbr>且<abbr title="SPEED1=1">转速大于等于90%</abbr></li>
		</ul>
	</ul>
<h3><li><abbr title="AOP">辅助油泵</abbr></li></h3>
	<ul>
	<li><abbr title="">启动允许</li>
		<ul>
		<li><abbr title="d10MAV77AP002PM=1">辅助油泵无故障</li>
		<li><abbr title="f10MAV77CL_101LL=1">润滑油箱液位低低取反</li>
		</ul>
	<li><abbr title="">联锁启动</abbr>(当<abbr title="fSTANDSTILL=0">汽轮机未全停</abbr>时以下任意一条满足)</li>
		<ul>
		<li><abbr title="d10MAV77DP_011=0">主润滑油泵流量有报警信号</abbr></li>
		<li><abbr title="d10MAV77CP_11345L=0">润滑油压力低</abbr>?</li>
		<li><abbr title="fTRIP=0">EST动作</abbr></li>
		<li><abbr title="SPEED10=0">转速不大于95%</abbr></li>
		</ul>
	<li><abbr title="">手动停止允许</li>
		<ul>
		<li><abbr title="fSTANDSTILL=1">汽轮机全停</abbr></li>
		</ul>
	<li><abbr title="">联锁停(以下任意条件满足)</li>
		<ul>
		<li><abbr title="d10MAV77AP002PM=0">辅助油泵故障</li>
		<li><abbr title="f10MAV77CL_101LL=0">润滑油箱液位低低</li>
		<li><abbr title="">主油泵正常</li>
			<ul>
			<li><abbr title="d10MAV77CP_011=1">主润滑油泵流量报警信号无</abbr></li>
			<li><abbr title="d10MAV77CP_11345L=1">润滑油压力不低</abbr>?</li>
			<li><abbr title="fTRIP=1">EST未动作</abbr></li>
			<li><abbr title="SPEED10=1">转速大于95%</abbr></li>
			</ul>
		</ul>
	</ul>
<h3><li><abbr title="EOP">事故油泵</abbr></li></h3>
<ul>
<li><abbr title="">联锁启动(以下任意一条满足)</li>
<ul>
<li><abbr title="rSPD_SEL">转速大于10rpm</abbr></li>
<li><abbr title="out=0">润滑油压力低低(三取二)</abbr></li>
</ul>
<li><abbr title="">停止允许(以下任意一条满足)</li>
<ul>
<li><abbr title="f10MAV77CP_10123L=1">润滑油压力低(三取二)取反</abbr></li>
</ul>
</ul>
</ol>
</ol>
<hr>
<div id="comm"><h1 align="center">中间信号</h1></div>
<hr>
<li><a href="#top">顶部</a></li>
<li><a href="#OFT">OFT</a></li>
<hr>
<ol type="A" start="1">
<div id="Oil"><h2><li>油系统</li></h2></div>
		<ul>
		<li><abbr title="f10MAV77CL_101LL=0">润滑油箱液位低低</li>
			<ul>
			<li><abbr title="r10MAV77CL_101">润滑油箱液小于430mm</abbr></li>
			</ul>
		<li><abbr title="f10MAV77CP_10123LL=0">润滑油压力低低(三取二)</abbr></li>
			<ul>
			<li><abbr title="f10MAV77CP_101LL">润滑油压力1低低</abbr></li>
				<ul>
				<li><abbr title="r10MAV77CP_101">润滑油压力1小于1.0BARG</abbr></li>
				</ul>
			<li><abbr title="f10MAV77CP_102LL">润滑油压力2低低</abbr></li>
				<ul>
				<li><abbr title="r10MAV77CP_102">润滑油压力2小于1.0BARG</abbr></li>
				</ul>
			<li><abbr title="f10MAV77CP_103LL">润滑油压力3低低</abbr></li>
				<ul>
				<li><abbr title="r10MAV77CP_103">润滑油压力3小于1.0BARG</abbr></li>
				</ul>
			</ul>
		<li><abbr title="f10MAV77CP_10123L=0">润滑油压力低(三取二)</abbr></li>
			<ul>
			<li><abbr title="f10MAV77CP_101L">润滑油压力1低</abbr></li>
				<ul>
				<li><abbr title="r10MAV77CP_101">润滑油压力1小于1.2BARG</abbr></li>
				</ul>
			<li><abbr title="f10MAV77CP_102L">润滑油压力2低</abbr></li>
				<ul>
				<li><abbr title="r10MAV77CP_102">润滑油压力2小于1.2BARG</abbr></li>
				</ul>
			<li><abbr title="f10MAV77CP_103L">润滑油压力3低</abbr></li>
				<ul>
				<li><abbr title="r10MAV77CP_103">润滑油压力3小于1.2BARG</abbr></li>
				</ul>
			</ul>
		<li><abbr title="f10MAV77CP_10678LLF">控制油压力低低(三取二)</abbr></li>
			<ul>
			<li><abbr title="f10MAV77CP_106LL">控制油润滑油压力1低低</abbr></li>
				<ul>
				<li><abbr title="r10MAV77CP_106">润滑油压力1小于1.0BARG</abbr></li>
				</ul>
			<li><abbr title="f10MAV77CP_107LL">控制油润滑油压力2低低</abbr></li>
				<ul>
				<li><abbr title="r10MAV77CP_107">控制油润滑油压力2小于1.0BARG</abbr></li>
				</ul>
			<li><abbr title="f10MAV77CP_108LL">控制油润滑油压力3低低</abbr></li>
				<ul>
				<li><abbr title="r10MAV77CP_108">控制油润滑油压力3小于1.0BARG</abbr></li>
				</ul>
			</ul>
		</ul>
<div id="ETS"><h2><li>本体</li></h2></div>
		<ul>
			<li><abbr title="f10MAA77CT_10123L=0">主汽温度低-小于150摄氏度(三取二)</abbr></li>
				<ul>
				<li><abbr title="w10MAA77CT_101">主汽温度1小于150摄氏度</abbr></li>
				<li><abbr title="w10MAA77CT_102">主汽温度2小于150摄氏度</abbr></li>
				<li><abbr title="w10MAA77CT_103">主汽温度3小于150摄氏度</abbr></li>
				</ul>
			<li><abbr title="f_OOTTV_O=1">OOTTV阀全开(四个全开信号都为1)</abbr></li>
				<ul>
				<li><abbr title="d10MAY77CG_002=1">OOTTV阀全开信号1为1</li>
				<li><abbr title="d10MAY77CG_003=1">OOTTV阀全开信号2为1</li>
				<li><abbr title="d10MAY77CG_004=1">OOTTV阀全开信号3为1</li>
				<li><abbr title="d10MAY77CG_005=1">OOTTV阀全开信号4为1</li>
				</ul>
			<li><abbr title="f_OOTTV_C=1">OOTTV阀全关(四个全关信号都为1)</abbr></li>
				<ul>
				<li><abbr title="d10MAY77CG_006=1">OOTTV阀全关信号1为1</li>
				<li><abbr title="d10MAY77CG_007=1">OOTTV阀全关信号2为1</li>
				<li><abbr title="d10MAY77CG_008=1">OOTTV阀全关信号3为1</li>
				<li><abbr title="d10MAY77CG_009=1">OOTTV阀全关信号4为1</li>
				</ul>
			<li><abbr title="f_OOTV_C=1">OOTV阀全关(四个全关信号都为1)</abbr></li>
				<ul>
				<li><abbr title="d10MAY77CG_014=1">OOTV阀全关信号1为1</li>
				<li><abbr title="d10MAY77CG_015=1">OOTV阀全关信号2为1</li>
				<li><abbr title="d10MAY77CG_016=1">OOTV阀全关信号3为1</li>
				<li><abbr title="d10MAY77CG_017=1">OOTV阀全关信号4为1</li>
				</ul>
		<li><abbr title="fSPD_BAD=0">转速探头故障</abbr></li>
			<ul>
			<li><abbr title="rSPD_SEL">系统转速大于等于200rpm</abbr>时，3个转速探头都故障</li>
			</ul>
		<li><abbr title="rSPD">汽轮机转速</abbr></li>
			<ul>
			<li><abbr title="SPEED1=1">转速大于90%</abbr></li>
				<ul>
				<li><abbr title="">转速先上升至4889rpm后大于4850rpm</abbr></li>
				</ul>
			<li><abbr title="SPEED10=1">转速大于95%</abbr></li>
			<ul>
				<li><abbr title="=1">转速先上升至5161rpm后大于5110rpm</abbr></li>
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
