<html>

<head>
<title>first_boiler</title>
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
<li><a href="#fsss">FSSS</a></li>
<li><a href="#mill">制粉系统</a></li>
<li><a href="#air_flue">风烟系统</a></li>
<li><a href="#oil">燃油系统</a></li>
<li><a href="#Lift">除渣系统</a></li>
<li><a href="#drum">汽水系统</a></li>
<li><a href="#SRC">脱硝系统</a></li>
<li><a href="#FGD">脱硫系统</a></li>
</ul>
</div>
</div>
<div id="maincontent">
<div id="fsss"><h1 align="center">FSSS炉膛安全监控系统介绍</h1></div>
<hr>
<li><a href="#top">顶部</a></li>
<li><a href="#MFT">MFT主燃料</a></li>
<li><a href="#purge">炉膛吹扫</a></li>
<li><a href="#OFT">OFT</a></li>
<li><a href="#fire_fan">火检冷却风机</a></li>
<hr>
1、 概述
   
 炉膛安全监控系统，它的英文名称为Furnace safeguard supervisory system，简称Fsss，
 它是现代大型火电机组锅炉必须具备的一种监控系统，它能在锅炉正常工作和启停等各种运行方式下，连续地密切监视燃烧系统的大量参数与状态，不断地进行逻辑判断和运算，必要时发出动作指令，通过种种联锁装置，使燃烧设备中的有关部件严格按照既定的合理程序完成必要的操作或处理未遂性事故，以保证锅炉燃烧系统的安全。
 对锅炉最大的威胁就是锅炉炉膛爆燃。炉膛爆燃主要是由于炉膛中积存的可燃混合物突然被点燃而引起的。这种爆燃严重危及到人身、设备及电厂安全运行。随着锅炉容量的增加，设备日益复杂，要监控的项目很多，特别是在启停过程中操作十分频繁，即使最熟练的运行人员，误操作也难免发生，因此对于大容量的锅炉必须具备一个周密可靠的安全监控系统，以确保锅炉安全运行
一般情况下，Fsss分灭火保护和程控点火两个子系统，灭火保护（FSS）和程控点火系统（BCS）。

<ol type="1" start="1">
<div id="MFT"><h2><li>MFT主燃料</li></h2></div>
<ol type="A" start="1">
<h3><li><abbr title="B_10MFT_ACT">MFT跳闸条件（以下任一条件满足，将会触发MFT)</abbr><a href="../../../../../my_data/image/first_boiler_img/MFT_TRIP.png" target="_blank">Logic</a><a href="../../../../../my_data/image/first_boiler_img/MFT_FIFO1.png" target="_blank">Logic1</a><a href="../../../../../my_data/image/first_boiler_img/MFT_FIFO2.png" target="_blank">Logic2</a><a href="../../../../../my_data/image/first_boiler_img/MFT_FIFO3.png" target="_blank">Logic3</a><a href="../../../../../my_data/image/first_boiler_img/MFT_FIFO4.png" target="_blank">Logic4</a><a href="../../../../../my_data/image/first_boiler_img/MFT_FIFO5.png" target="_blank">Logic5</a></li></h3>
当MFT跳闸后，有首出跳闸原因显示；当MFT复位后，首出跳闸记忆清除。
<ul>
<li>运行人员手动跳闸(10CWA01AN006)（2个MFT按钮同时按下）</li>
<li><abbr title="B_10OUT_AIR_Press_HH(B_10HBK10CP014.IO.Value/B_10HBK10CP015.IO.Value/B_10HBK10CP016.IO.Value)，三取二-Threshold">炉膛压力高高</abbr>，延时2s<a href="../../../../../my_data/image/first_boiler_img/B_10OUT_AIR_Press_HH_LL.png" target="_blank">Logic</a></li>
<li><abbr title="B_10OUT_AIR_Press_LL(B_10HBK10CP011.IO.Value/B_10HBK10CP012.IO.Value/B_10HBK10CP013.IO.Value，三取二-Threshold">炉膛压力低低</abbr>，延时2s</li>
<li><abbr title="B_10HAD10CL101_CALC/B_10HAD10CL102_CALC/B_10HAD10CL103,三取二-Threshold">汽包水位</abbr>大于250mm，延时2s<a href="../../../../../my_data/image/first_boiler_img/Drum_LVL.png" target="_blank">Logic</a></li>
<li><abbr title="B_10HAD10CL101_CALC/B_10HAD10CL102_CALC/B_10HAD10CL103_CALC,三取二-Threshold">汽包水位</abbr>小于-250mm，延时2s</li>
<li><abbr title="10HLB10AN001.IO.FB1.Value取非/10HLB20AN001.IO.FB1.Value取非">两台送风机均不运行</abbr><a href="../../../../../my_data/image/first_boiler_img/MFT1.png" target="_blank">Logic</a></li>
<li><abbr title="10HNC10AN001.IO.FB1.Value取反/10HNC20AN001.IO.FB1.Value取反">两台引风机均不运行</abbr></li>
<li>两台火检冷却风机均停或火检冷却风母管压力低低（以下条件任一满足，延时2s，保护动作）</li>
<ul type="disc">
<li><abbr title="10HJY10FA001.IO.FB0.Value/10HJY10FA003.IO.FB0.Value">两台火检冷却风机均停止</abbr>，延时10s</li>
<li><abbr title="B_10CoolingFan_Press_LL_COMM(B_10HLS30CP001.IO.Value/B_10HLS30CP002.IO.Value/B_10HLS30CP003.IO.Value/B_10HLS30CP004.IO.Value,四取三)">火检冷却风母管压力低低</abbr>，延时2s<a href="../../../../../my_data/image/first_boiler_img/B_10CoolingFan_Press_LL_COMM.png" target="_blank">Logic</a> </li>
</ul>
<li>锅炉风量<30%BMCR(以下2条同时满足)，延时20s<a href="../../../../../my_data/image/first_boiler_img/MFT_cond09_out.png" target="_blank">Logic</a></li>
<ul>
<li>实际工况满足时（以下3条任意一条满足）</li>
<ul>
<li><abbr title="B_10FDF_A_INLET_DAMP_FB">送风机A入口挡板调门开度</abbr>加<abbr title="B_10FDF_B_INLET_DAMP_FB">送风机B入口挡板调门开度</abbr>大于110或<abbr title="B_10HLB10AN001AO.IO.FB.Value">送风机A变频器反馈</abbr>加<abbr title="B_10HLB20AN001AO.IO.FB.Value">送风机B变频器反馈</abbr>大于60</li>
<li><abbr title="NOT B_10HLB20AN001_1RUN">送风机B未运行</abbr>时<abbr title="B_10HLBAN001_1RUN">送风机A运行</abbr>且<abbr title="B_10HLB10AN001AO.IO.FB.Value">送风机A变频器反馈</abbr>大于50</li>
<li><abbr title="NOT B_10HLB10AN001_1RUN">送风机A未运行</abbr>时<abbr title="B_20HLBAN001_1RUN">送风机B运行</abbr>且<abbr title="B_10HLB20AN001AO.IO.FB.Value">送风机A变频器反馈</abbr>大于50</li>
</ul>
<li>以下三取中后的风量相加和乘以系数K(1.2)＜164T/h</li>
<ul>
<li>空<abbr title="10HFE10CF101/10HFE10CF102/10HFE10CF103三取中">预器A出口一次热风流量</abbr></li>
<li>空<abbr title="10HFE20CF101/10HFE20CF102/10HFE20CF103三取中">预器B出口一次热风流量</abbr></li>
<li><abbr title="10HFE30CF101/10HFE30CF102/10HFE30CF103三取中">一次调温冷风流量（左）</abbr></li>
<li><abbr title="10HFE40CF101/10HFE40CF102/10HFE40CF103三取中">一次调温冷风流量（右）</abbr></li>
<li><abbr title="10HLA12CF101/10HLA12CF102/10HLA12CF103三取中">空预器A出口二次热风流量</abbr></li>
<li><abbr title="10HLA22CF101/10HLA22CF102/10HLA22CF103三取中">空预器B出口二次热风流量</abbr></li>
</ul>
</ul>
<li>全炉膛燃料丧失（以下条件均满足，保护动作）<a href="../../../../../my_data/image/first_boiler_img/MFT2.png" target="_blank">Logic</a></li>
<ul type="disc">
<li><a name="锅炉记忆有火">锅炉记忆有火</a>（以下9条任二个满足，即为点火记忆信号存在）<a href="../../../../../my_data/image/first_boiler_img/B_10BOIL_FIRE_MEMORY.png" target="_blank">Logic</a></li>
<ul type="square">
<li><abbr title="10HHA10CB012.IO.Value">A下1火检有火</abbr>且<abbr title="10HJF62AA022.IO.FB0.Value取反">A下1油角阀全开</abbr>，延时10s</li>
<li><abbr title="10HHA10CB022.IO.Value">A下2火检有火</abbr>且<abbr title="10HJF62AA024.IO.FB0.Value取反">A下2油角阀全开</abbr>，延时10s</li>
<li><abbr title="10HHA10CB032.IO.Value">A下3火检有火</abbr>且<abbr title="10HJF62AA026.IO.FB0.Value取反">A下3油角阀全开</abbr>，延时10s</li>
<li><abbr title="10HHA10CB042.IO.Value">A下4火检有火</abbr>且<abbr title="10HJF62AA028.IO.FB0.Value取反">A下4油角阀全开</abbr>，延时10s</li>
<li><abbr title="10HHA10CB052.IO.Value">BC1火检有火</abbr>且<abbr title="10HJF62AA032.IO.FB0.Value取反">BC1油角阀全开</abbr>，延时10s</li>
<li><abbr title="10HHA10CB062.IO.Value">BC2火检有火</abbr>且<abbr title="10HJF62AA034.IO.FB0.Value取反">BC2油角阀全开</abbr>，延时10s</li>
<li><abbr title="10HHA10CB072.IO.Value">BC3火检有火</abbr>且<abbr title="10HJF62AA036.IO.FB0.Value取反">BC3油角阀全开</abbr>，延时10s</li>
<li><abbr title="10HHA10CB082.IO.Value">BC4火检有火</abbr>且<abbr title="10HJF62AA038.IO.FB0.Value取反">BC4油角阀全开</abbr>，延时10s</li>
<li><abbr title="10HHA11CB012.IO.Value">A1煤粉火检有火</abbr><abbr title="10HHA12CB012.IO.Value">、A2煤粉火检有火</abbr>、<abbr title="10HHA13CB012.IO.Value">A3煤粉火检有火</abbr>、<abbr title="10HHA14CB012.IO.Value">A4煤粉火检有火</abbr>，四取三</li>
</ul>

<li>A油层及BC油层油角阀均关闭或燃油进油主管关断阀全关</li>
<ul>
<li><abbr title="B_10Oillvlv_A_Layer_CLS(B_10HJF62AA022.IO.FB0.Value/B_10HJF62AA024.IO.FB0.Value/B_10HJF62AA026.IO.FB0.Value/B_10HJF62AA028.IO.FB0.Value) and B_10Oillvlv_BC_Layer_CLS(B_10HJF62AA032.IO.FB0.Value/B_10HJF62AA034.IO.FB0.Value/B_10HJF62AA036.IO.FB0.Value/B_10HJF62AA038.IO.FB0.Value)">A油层及BC油层油角阀均关闭</abbr><a href="../../../../../my_data/image/first_boiler_img/B_10Oilvlv_A_Layer_CLS.png" target="_blank">Logic</a></li>
<li><abbr title="B_10Oil_in_VIV_Close_Bool(B_10ERB10AA009ZC.IO.Value)">燃油进油主管关断阀全关</abbr></li>
</ul>
<li><abbr title="10HFC10AJ001.IO.FB1.Value取反/10HFC20AJ001.IO.FB1.Value取反/10HFC30AJ001.IO.FB1.Value取反/10HFC40AJ001.IO.FB1.Value取反">所有磨煤机停止</abbr>和<abbr title="10HFY10FA001.IO.FB1.Value取反/10HFY20FA001取反/10HFY30FA001.IO.FB1.Value取反/10HFY40FA001.IO.FB1.Value取反">给煤机停止</abbr>硬接线</li>
</ul>
<li>全炉膛火焰丧失（以下条件均满足，延时3s，保护动作）</li>
<ul type="disc">
<li><a href="#锅炉记忆有火">锅炉记忆有火</a>同上</li>
<li>A下油层、BC油层、微油油层均无火（以下条件均满足）</li>
<ul type="square">
<li><abbr title="B_10LA_NOFIRE(NOT B_10HHA10CB012.IO.Value/NOT B_10HHA10CB022.IO.Value/NOT B_10HHA10CB032.IO.Value/NOT B_10HHA10CB042.IO.Value)">A下油层无火：A下1、A下2、A下3、A下4 火检 均无火</abbr><a href="../../../../../my_data/image/first_boiler_img/B_10Oilvlv_A_Layer_NoFire.png" target="_blank">Logic</a></li>
<li><abbr title="NOT B_10HHA10CB052.IO.Value/NOT B_10HHA10CB062.IO.Value/NOT B_10HHA10CB072.IO.Value/NOT B_10HHA10CB082.IO.Value">BC油层无火：BC1、BC2、BC3、BC4火检均无火</abbr></li>
 <li><abbr title="NOT B_10HHA61CB001.IO.Value/NOT B_10HHA61CB002.IO.Value/NOT B_10HHA61CB003.IO.Value/NOT B_10HHA61CB004.IO.Value">微油油层无火：A微油1、A微油2、A微油3、A微油4火检均无火</abbr></li>
</ul>
<li>A、B、C、D煤层均未投运<a href="../../../../../my_data/image/first_boiler_img/B_10COAL_LAYER_A.png" target="_blank">Logic</a></li>
<ul type="square">
<li><abbr title="NOT B_10HHA11CB012.IO.Value/NOT B_10HHA12CB012.IO.Value/NOT B_10HHA13CB012.IO.Value/NOT B_10HHA14CB012.IO.Value,四取三">A煤层投运：A1、A2、A3、A4少于两个煤粉层火检有火</abbr></li>
<li><abbr title="NOT B_10HHA21CB012.IO.Value/NOT B_10HHA22CB012.IO.Value/NOT B_10HHA23CB012.IO.Value/NOT B_10HHA24CB012.IO.Value,四取三">B煤层投运：B1、B2、B3、B4少于两个煤粉层火检有火</abbr></li> 
<li><abbr title="NOT B_10HHA31CB012.IO.Value/NOT B_10HHA32CB012.IO.Value/NOT B_10HHA33CB012.IO.Value/NOT B_10HHA34CB012.IO.Value,四取三">C煤层投运：C1、C2、C3、C4少于两个煤粉层火检有火</abbr></li>
<li><abbr title="NOT B_10HHA41CB012.IO.Value/NOT B_10HHA42CB012.IO.Value/NOT B_10HHA43CB012.IO.Value/NOT B_10HHA44CB012.IO.Value,四取三">D煤层投运：D1、D2、D3、D4少于两个煤粉层火检有火</abbr></li>
</ul>
</ul>
<li>两台一次风机停止且任一煤层投运和无油层运行（以下条件均满足，保护动作）<a href="../../../../../my_data/image/first_boiler_img/MFT3.png" target="_blank">Logic</a></li>
<ul type="disc">
<li><abbr title="10HLB30AN001ZD1.IO.Value/10HLB40AN001ZD1.IO.Value">一次风机A、B均停止</abbr>SOE卡件</li>
<li>任一煤层投运且给煤机运行</li>
<li>A、B、C、D煤层投运</li>
<ul type="square">
<li><abbr title="B_10HHA11CB012.IO.Value/B_10HHA12CB012.IO.Value/B_10HHA13CB012.IO.Value/B_10HHA14CB012.IO.Value,四取三">A煤层投运：A1、A2、A3、A4至少三个煤粉层火检有火</abbr></li>
<li><abbr title="B_10HHA21CB012.IO.Value/B_10HHA22CB012.IO.Value/B_10HHA23CB012.IO.Value/B_10HHA24CB012.IO.Value,四取三">B煤层投运：B1、B2、B3、B4至少三个煤粉层火检有火</abbr></li> 
<li><abbr title="B_10HHA31CB012.IO.Value/B_10HHA32CB012.IO.Value/B_10HHA33CB012.IO.Value/B_10HHA34CB012.IO.Value,四取三">C煤层投运：C1、C2、C3、C4至少三个煤粉层火检有火</abbr></li>
<li><abbr title="B_10HHA41CB012.IO.Value/B_10HHA42CB012.IO.Value/B_10HHA43CB012.IO.Value/B_10HHA44CB012.IO.Value,四取三">D煤层投运：D1、D2、D3、D4至少三个煤粉层火检有火</abbr></li>
</ul>
<li>A下、BC油层均未投运（A下层投运或BC层投运，再取反）</li>
<ul type="square">
<li>A下油层投运：A下1、A下2、A下3、A下4至少三个投运（四取三）<a href="../../../../../my_data/image/first_boiler_img/B_10Oil_AA_SVR.png" target="_blank">Logic</a></li>
<ul type="circle">
<li>A下1投运：<abbr title="B_10HHA10CB012.IO.Value">A下1火检有火</abbr>且<abbr title="NOT B_10HJF62AA022.IO.FB0.Value">A下1油角阀运行</abbr>，延时10s<a href="../../../../../my_data/image/first_boiler_img/Oil_A1_InServ.png" target="_blank">Logic</a></li>
<li>A下2投运：<abbr title="10HHA10CB022.IO.Value">A下2火检有火</abbr>且<abbr title="10HJF62AA024.IO.FB0.Value取反">A下2油角阀运行</abbr>，延时10s</li>
<li>A下3投运：<abbr title="10HHA10CB032.IO.Value">A下3火检有火</abbr>且<abbr title="10HJF62AA026.IO.FB0.Value取反">A下3油角阀运行</abbr>，延时10s</li>
<li>A下4投运：<abbr title="10HHA10CB042.IO.Value">A下4火检有火</abbr>且<abbr title="10HJF62AA028.IO.FB0.Value取反">A下4油角阀运行</abbr>，延时10s</li>
</ul>
<li>BC油层投运：BC1、BC2、BC3、BC4至少三个投运（四取三）</li>
<ul type="circle">
<li>BC1投运：<abbr title="10HHA10CB052.IO.Value">BC1火检有火</abbr>且<abbr title="10HJF62AA032.IO.FB0.Value取反">BC1油角阀运行</abbr>，延时10s</li>
<li>BC2投运：<abbr title="10HHA10CB062.IO.Value">BC2火检有火</abbr>且<abbr title="10HJF62AA034.IO.FB0.Value取反">BC2油角阀运行</abbr>，延时10s</li>
<li>BC3投运：<abbr title="10HHA10CB072.IO.Value">BC3火检有火</abbr>且<abbr title="10HJF62AA036.IO.FB0.Value取反">BC3油角阀运行</abbr>，延时10s</li>
<li>BC4投运：<abbr title="10HHA10CB082.IO.Value">BC4火检有火</abbr>且<abbr title="10HJF62AA038.IO.FB0.Value取反">BC4油角阀运行</abbr>，延时10s</li>
</ul>
</ul>
</ul>
<li>两台空预器均停止，延时60s（以下条件均满足，保护动作）</li>
<ul type="disc">
<li>两台空预器均停止（空预器A运行取反且空预器运行取反）</li>
<ul type="square">
<li>空预器A运行：<abbr title="10CDB31FU007/10CDB31FU011">空预器A主、辅电机任一运行</abbr></li>
<li>空预器B运行：<abbr title="10CDB32FU007/10CDB32FU011">空预器B主、辅电机任一运行</abbr></li>
<u>（#4炉已经修改为：空预器均有停转信号</u>
<abbr title="B_40HLD10CS001.IO.Value/B_40HLD10CS002.IO.Value/B_40HLD10CS003.IO.Value三取二">空预器A停转</abbr>
<abbr title="B_40HLD20CS001.IO.Value/B_40HLD20CS002.IO.Value/B_40HLD20CS003.IO.Value三取二">空预器B停转</abbr>
</ul>
</ul>
</ul>
<h3><li><abbr title="reset_MFT">MFT复位信号</abbr></li></h3>
<ul>
<li>“炉膛吹扫完成”或DCS逻辑内部（C16_Purge:B40Purge_Bypass）复位</li>
</ul>
<h3><li>MFT执行动作</li></h3>
MFT设计为两冗余回路，软件联锁和硬件联锁回路。一般情况下，当MFT发生，软件将通过DCS数字量输出通道（DO）停止相关设备，同时MFT继电器柜也会发送硬接线跳闸信号到这些设备（设备上并联）。如MFT发生时燃油跳闸阀将收到两个独立的关闭信号。
即使DCS没有运行，操作员仍然可以按下急停按钮通过硬件联锁回路停止MFT硬接线连接的设备。
当MFT发生后，执行以下动作：
<ul>
<li>跳闸MFT继电器</li>
<li>跳闸所有给煤机[含硬接线]</li>
<li>跳闸所有磨煤机[含硬接线]</li>
<li>跳闸所有磨煤机出口阀[含硬接线]</li>
<li>跳闸所有一次风机[含硬接线]</li>
<li>关闭所有磨煤机入口一次冷、热风气动插板门[含硬接线]</li>
<li>跳闸所有油燃烧器，包括：</li>
<li>关闭所有油层/微油/风道加热器油角阀[含硬接线]</li>
<li>所有点火枪退出并禁止点火（不吹扫）[含硬接线]</li>
<li>关闭油母管进油快关阀[含硬接线]</li>
<li>打开油母管回油快关阀[含硬接线]</li>
<li>关闭过热器减温水总电动门及各支路电动门[含硬接线]</li>
<li>关闭主蒸汽出口门</li>
</ul>
</ol>
<div id="purge"><h2><li>炉膛吹扫</li></h2></div>
<hr>
<ol type="A" start="1">
<h3><li>炉膛吹扫允许条件（以下条件均满足，炉膛吹扫允许）</li></h3>
<ul>
<li><abbr title="B_10NO_MFT_COND">无MFT跳闸条件</abbr><a href="../../../../../my_data/image/first_boiler_img/Purge_Cond1.png" target="_blank">Logic</a></li>
<li><abbr title="B_10SAFA_RUN(B_10HLB10AN001.IO.FB1.Value)/B_10SAFB_RUN(B_10HLB20AN001.IO.FB1.Value)">送风机A/B任一运行</abbr></li>
<li><abbr title="B_10AH_A_PVF_R.Value(B_10CDB31FU007.IO.Value)/B_10AH_A_BVF_R.Value(B_10CDB31FU011.IO.Value)/B_10AH_B_PVF_R.Value(B_10CDB32FU007.IO.Value)/B_10AH_B_BVF_R.Value(B_10CDB32FU011.IO.Value)">空预器A/B主、辅电机任一运行SOE卡件</abbr></li>
<li><abbr title="B_10IDFA_RUN(B_10HNC10AN001.IO.FB1.Value)/B_10IDFB_RUN(B_10HNC20AN001.IO.FB1.Value)">引风机A/B任一运行</abbr></li>
<li><abbr title="NOT B_10PAFA_RUN(B_10HLB30AN001.IO.FB1.Value)且NOT B_10PAFB_RUN(B_10HLB40AN001.IO.FB1.Value)">一次风机A、B均停止</abbr></li>
<li><abbr title="B_10MILLA_STOP(B_10HFC10AJ001ZD.IO.Value)/B_10MILLB_STOP(B_10HFC20AJ001ZD.IO.Value)/B_10MILLC_STOP(B_10HFC30AJ001ZD.IO.Value)/B_10MILLD_STOP(B_10HFC40AJ001ZD.IO.Value)">所有磨煤机全停SOE</abbr></li>
<li><abbr title="B_10FDRA_STOP(NOT B_10HFY10FA001.IO.FB1.Value)/B_10FDRB_STOP(NOT B_10HFY20FA001.IO.FB1.Value)/B_10FDRC_STOP(NOT B_10HFY30FA001.IO.FB1.Value)/B_10FDRD_STOP(NOT B_10HFY30FA001.IO.FB1.Value)">所有给煤机全停</abbr></li>
<li><abbr title="B_10Oil_in_VIV_Close_Bool(B_10ERB10AA009ZC.IO.Value)">油母管进油关断阀全关</abbr>SOE<a href="../../../../../my_data/image/first_boiler_img/Purge_Cond2.png" target="_blank">Logic</a></li>
<li><abbr title="B_10Oilvlv_A_Layer_CLS(B_10HJF62AA022.IO.FB0.Value/B_10HJF62AA024.IO.FB0.Value/B_10HJF62AA026.IO.FB0.Value/B_10HJF62AA028.IO.FB0.Value) AND B_10Oilvlv_BC_Layer_CLS(B_10HJF62AA032.IO.FB0.Value/B_10HJF62AA034.IO.FB0.Value/B_10HJF62AA036.IO.FB0.Value/B_10HJF62AA038.IO.FB0.Value) AND B_10Oilvlv_MicroOil_Layer_CLS(B_10HJF61AA016.IO.FB0.Value/B_10HJF61AA018.IO.FB0.Value/B_10HJF61AA020.IO.FB0.Value/B_10HJF61AA022.IO.FB0.Value)">A下油层、BC油层、微油层油角阀全关</abbr></li>
<li><abbr title="B_10TAFLOW_COMM">总风量BMCR</abbr>>30%</li>
<li><abbr title="B_10SA_DAMPER_ALL_H80">所有层二次风调节挡板平均开度>80%(每一个角最少11个风门开度大于80，13选11)</abbr></li>
<li><abbr title="-50<B_10HAD10CL101_Calc<50/-50<B_10HAD10CL102_Calc<50/-50<B_10HAD10CL103_Calc<50,三取二">汽包水位正常</abbr></li>
<li><abbr title="正常为不高不低，NOT B_10OUT_AIR_Press_HH(B_10HBK10CP014.IO.Value/B_10HBK10CP015.IO.Value/B_10HBK10CP016.IO.Value,三取二) AND NOT B_10OUT_AIR_Press_LL(B_10HBK10CP011.IO.Value/B_10HBK10CP012.IO.Value/B_10HBK10CP013.IO.Value,三取二取反">炉膛压力正常(逻辑为开关量)</abbr><a href="../../../../../my_data/image/first_boiler_img/Purge_Cond3.png" target="_blank">Logic</a></li>
<li><abbr title="B_10OilLeakageTest_Success">油泄漏实验完成或旁路</abbr></li>
</ul>
<h3><li>炉膛吹扫过程<a href="../../../../../my_data/image/first_boiler_img/BOILER_Purge_Commplete.png" target="_blank">Logic</a></li></h3>
炉膛吹扫允许条件均成立后，操作员发出炉膛吹扫指令，炉膛吹扫程序开始计时，吹扫时间规定为5分钟。在炉膛吹扫过程中，如果任意吹扫允许条件失去，就会中断炉膛吹扫程序，同时吹扫计时器清零。如果吹扫中断，操作员就要重新启动吹扫程序。
当所有吹扫条件全部满足并且持续5分钟，吹扫完成。膛吹扫计时完成后将置位炉膛吹扫结束标志，吹扫结束。
“炉膛吹扫成功”信号是复位MFT的必要条件。MFT发生时，通过一个MFT脉冲信号清除“炉膛吹扫成功”信号。
</ol>
<div id="FNC"><h2><li>点火条件</li></h2></div>
<hr>
<ol type="A" start="1">
<h3><li>炉膛点火条件（以下条件均满足)<a href="../../../../../my_data/image/first_boiler_img/B_10FNC_IGNT_PMT_COMM.png" target="_blank">Logic</a></li></h3>
<ul>
<li><abbr title="NOT B_10OFT_ACT">无OFT动作</abbr></li>
<li><abbr title="NOT B_10MFT_ACT">无MFT动作</abbr></li>
<li><abbr title="B_10BOILER_Purge_Complete">炉膛吹扫完成</abbr></li>
<li><abbr title="B_10CoolingFan_OutPress_GT3">火检冷却风正常</abbr></li>
<li><abbr title="B10_Drum_Level_OK">汽包水位正常</abbr></li>
<li><abbr title="FNC_Press_OK">炉膛压力正常</abbr></li>
</ul>
</ol>

<div id="OFT"><h2><li>OFT</li></h2></div>
<hr>
当OFT跳闸后，有首出跳闸原因显示；当OFT复位后，首出跳闸记忆清除。
<ol type="A" start="1">
<h3><li>OFT跳闸条件（以下任一条件满足，将会触发OFT)<a href="../../../../../my_data/image/first_boiler_img/OFT_FIFO.png" target="_blank">Logic1</a><a href="../../../../../my_data/image/first_boiler_img/OFT_cond.png" target="_blank">Logic2</a></li></h3>
<ul>
<li><abbr title=""B_10MFT_ACT>MFT动作信号</abbr></li>
<li><abbr title="NOT(B_10Oilvlv_A_Layer_CLS and B_10Oilvlv_BC_Layer_CLS and B_10Oilvlv_MicroOil_Layer_CLS)">任意油角阀非关(包括微油)</abbr>且<abbr title="B_10Oil_in_mainpipe_press_LL(B_10ERB10CP001.IO.Value/B_10ERB10CP002.IO.Value/B_10ERB10CP003.IO.Value,三取二)">油母管压力低低，延时2秒</abbr></li>
<li><abbr title="NOT(B_10Oilvlv_A_Layer_CLS and B_10Oilvlv_BC_Layer_CLS and B_10Oilvlv_MicroOil_Layer_CLS)">任意油角阀非关(包括微油)</abbr>且<abbr title="NOT B_10Oil_in_VLV_Open(B_10ERB10AA009.IO.FB1.Value)">油母管进油关断阀非开</abbr></li>
<li><abbr title="B_10OFT_MAN_BUTTON.IO.Value">OFT按钮信号</abbr></li>
</ul>
<h3><li>OFT复位信号(以下任一条件满足，脉冲3s，OFT复位)<a href="../../../../../my_data/image/first_boiler_img/OFT_ACT.png" target="_blank">Logic</a></li></h3>
<ul>
<li><abbr title="NOT OFT_COND">OFT条件均不满足</abbr>且<abbr title="B_10OilLeakageTest_Success">油泄漏试验成功脉冲3s</abbr>，脉冲3s</li>
<li><abbr title="OFT_MAN_RESET">按下手动复位OFT按钮（软按钮）</abbr></li>
</ul>
<h3><li>OFT执行动作</li></h3>
<ul>
<li>关闭油母管进油关断阀</li>
<li>关闭所有油角阀，包括微油点火系统油角阀</li>
<li>关闭所有油枪吹扫阀，包括关闭微油点火系统吹扫阀、雾化阀</li>
<li>停止点火并退出所有点火枪/油枪</li>
<li>打开油母管回油关断阀</li>
</ul>
</ol>
<div id="fire_fan"><h2><li>火检冷却风机</li></h2></div>
<hr>
<ol type="A" start="1">
<h3><li><abbr title="B10HJY10FA001">火检冷却风机A</abbr><a href="../../../../../my_data/image/first_boiler_img/B10HJY10FA001.png" target="_blank">Logic</a></li></h3>
<ul>
<li>联锁启：</li>
<ul>
<li><abbr title="B_10HJY10_INBAK">火检冷却风机备用投入</li>
<li><abbr title="NOT B_10HJY10FA003.IO.FB1.Value">火检冷却风机B运行信号消失</abbr>，脉冲5s</li>
<li>或<abbr title="B_10HJY10FA003.IO.FB1.Value">火检冷却风机B运行</abbr>且<abbr title="B_10HLS30CP101.IO.Value">火检冷却风出口风压</abbr><3KPa</li>
</ul>
</ul>
<h3><li><abbr title="B10HJY10FA003">火检冷却风机B</abbr><a href="../../../../../my_data/image/first_boiler_img/B10HJY10FA003.png" target="_blank">Logic</a></li></h3>
<ul>
<li>联锁启：</li>
<ul>
<li><abbr title="B_10HJY10_INBAK">火检冷却风机备用投入</li>
<li><abbr title="NOT B_10HJY10FA001.IO.FB1.Value">火检冷却风机A运行信号消失</abbr>，脉冲5s</li>
<li>或<abbr title="B_10HJY10FA001.IO.FB1.Value">火检冷却风机A运行</abbr>且<abbr title="B_10HLS30CP101.IO.Value">火检冷却风出口风压</abbr><3KPa</li>
</ul>
</ul>
</ol>
<div id="mill"><h1 align="center">制粉系统</h1></div>
<hr>
<ul>
<li><a href="#top">顶部</a></li>
<li><a href="#feeder">给煤机及进出口闸板门</a></li>
<li><a href="#mill_a">磨煤机及冷热风门和出口门</a></li>
<li><a href="#lubricant_station">磨煤机润滑油站</a></li>
<li><a href="#hydraulic_station">磨煤机液压油站</a></li>
<li><a href="#mill_fan">密封风机</a></li>
</ul>
<hr>
<ol type="1" start="1">
<h2><li>给煤机A</li></h2>
<ol type="A" start="1">
<div id="feeder"><h3><li><abbr title="B10HFY10FA001">给煤机A</abbr><a href="../../../../../my_data/image/first_boiler_img/B10HFY10FA001.png" target="_blank">Logic</a></li></h3></div>
<ul>
<li>启允许：</li>
<ul>
<li><abbr title="B_10HFC10AJ001.IO.FB1.Value">磨煤机A运行</abbr></li>
<li><abbr title="B_10HFB10AA002.IO.FB1.Value">给煤机A出口闸门开到位 </abbr></li>
<li><abbr title="NOT B_10HFY10FU009.IO.Value">无给煤机A超温报警取反</abbr></li>
<li><abbr title="NOT B_10HFY10FU012.IO.Value">无皮带跑偏 </abbr></li>
<li><abbr title="NOT B_10HFY10FU006.IO.Value">无堵煤信号</abbr></li>
<li><abbr title="NOT Feeder_A_TRIP">无给煤机跳闸信号</abbr></li>
</ul>
<li>跳闸条件：</li>
<ul>
<li><abbr title="B_10MFT_ACT">MFT动作</abbr></li>
<li><abbr title="B_10HFC10AJ001.IO.FB1.Value">磨煤机A停</abbr></li>
<li><abbr title="B_10HFY10FA001.IO.FB1.Value">给煤机A运行</abbr>且<abbr title="B_10HFB10AA002.IO.FB0.Value">给煤机A出口门关</abbr></li>
</ul>
</ul>
<h3><li><abbr title="B10HFB10AA001">给煤机A进口闸门</abbr><a href="../../../../../my_data/image/first_boiler_img/B10HFB10AA001.png" target="_blank">Logic</a></li></h3>
<ul>
<li>联锁关：（以下任一条件满足，给煤机A出口门联关）</li>
<ul>
<li><abbr title="NOT B_10HFY10FA001.IO.FB1.Value">给煤机A不运行，延时3s</abbr></li>
</ul>
</ul>
<h3><li><abbr title="B10HFB10AA002">给煤机A出口闸门</abbr><a href="../../../../../my_data/image/first_boiler_img/B10HFB10AA001.png" target="_blank">Logic</a></li></h2>
<ul>
<li>联锁关：（以下任一条件满足，给煤机A出口门联关）</li>
<ul>
<li><abbr title="B_10HFC10AJ001.IO.FB0.Value">磨煤机A停止，脉冲3s</abbr></li>
<li><abbr title="NOT B_10HFY10FA001.IO.FB1.Value">给煤机A不运行，脉冲3s</abbr></li>
</ul>
</ul>
<h3><li><abbr title="B_10HFA10AM001">疏松机A</abbr><a href="../../../../../my_data/image/first_boiler_img/B10HFA10AM001.png" target="_blank">Logic</a></li></h3>
<ul>
<li>联锁启：</li>
<ul>
<li><abbr title="B_10HFY10FA001.IO.FB1.Value">给煤机A运行</abbr>且<abbr title="NOT B_10HFY10FU005.IO.Value">皮带上无煤</abbr></li>
</ul>
</ul>
</ol>

<div id="mill_a"><h2><li>磨煤机A</li></h2></div>
<hr>
<ol type="A" start="1">
<h3><li><abbr title="B10HFC10AJ001">磨煤机A</abbr><a href="../../../../../my_data/image/first_boiler_img/B10HFC10AJ001.png" target="_blank">Logic</a></li></h3>
<ul>
<li>启允许：（以下条件均满足，磨煤机A允许启动）</li>
<ul>
<li><abbr title="NOT B_10MILL_A_TRIP">磨煤机A无跳闸条件</abbr><a href="../../../../../my_data/image/first_boiler_img/B10HFC10AJ001_OPMT1.png" target="_blank">Logic</a></li>
<li><abbr title="B_10HFC10CT203.IO.Value/B_10HFC10CT204.IO.Value/B_10HFC10CT205.IO.Value">磨煤机A电动机绕组线圈温度均<110℃</abbr></li>
<li><abbr title="B_10HFC10CT201.IO.Value/B_10HFC10CT202.IO.Value">磨煤机A电动机轴承温度均<70℃</abbr></li>
<li><abbr title="B_10HFV10CT304.IO.Value/B_10HFV10CT305.IO.Value/B_10HFV10CT306.IO.Value">磨煤机A推力轴承油槽温度均<50℃</abbr></li>
<li><abbr title="B_FNC_IGNT_PMT_COMM">炉膛点火允许（见FSSS部分）</abbr></li>
<li><abbr title="B_10HHE11AA001.IO.FB1.Value/B_10HHE12AA001.IO.FB1.Value/B_10HHE13AA001.IO.FB1.Value/B_10HHE14AA001.IO.FB1.Value">所有磨煤机A出口阀全开</abbr></li>
<li><abbr title="B_10HFC10AA002.IO.FB0.Value">磨煤机A排渣箱出口阀全关</abbr></li>
<li><abbr title="B_10MILLA_Mixture_Temp(B_10HFC10CT301.IO.Value/B_10HFC10CT302.IO.Value/B_10HFC10CT303.IO.Value,三取中)">磨煤机A分离器风粉混合物温度<95℃且>60℃  </abbr></li>
<li><abbr title="B_10HFW13DP101.IO.Value">磨煤机A一次风与密封风差压>2KPa</abbr></li>
<li><abbr title="NOT B_10HFC10AJ001.Fail.Value">无磨煤机A故障</abbr></li>
<li><abbr title="B_10LBG11AA002.IO.FB0.Value">磨煤机A防爆蒸汽电动阀全关</abbr><a href="../../../../../my_data/image/first_boiler_img/B10HFC10AJ001_OPMT2.png" target="_blank">Logic</a></li>
<li><abbr title="B_10HFW13AA001.IO.FB1.Value">磨煤机A密封风电动门全开</abbr></li>
磨润滑油系统正常
<li><abbr title="B_10HFV10CT301.IO.Value/B_10HFV10CT302.IO.Value/B_10HFV10CT303.IO.Value，MedianReal-三取中">润滑油温度正常，温度>30且<45℃ </abbr></li>
<li><abbr title="B_10HFV10CP101.IO.Value">磨煤机A润滑油分配器进口油压> 0.13MPa</abbr>且<abbr title="NOT B_10HFV10AP001_1.IO.FB0.Value/NOT B_10HFV10AP001_2.IO.FB0.Value/NOT B_10HFV10AP002_1.IO.FB0.Value/NOT B_10HFV10AP002_2.IO.FB0.Value">任一润滑油泵运行</abbr></li>
<li><abbr title="B_10HFE71CF101_CALC.IPAR.OutCurr/B_10HFE71CF102_CALC.IPAR.OutCurr/B_10HFE71CF103_CALC.IPAR.OutCurr,MedianReal-三取中">磨煤机A冷/热一次风混合流量>10t/h</abbr>或<abbr title="B_10MILL_A_IN_PA_PRESS(B_10HFE71CP101.IO.Value)">磨煤机冷、热一次风混合风压>4KPa</abbr></li>
</ul>
<li>跳闸条件：（以下任一条件满足，磨煤机A跳闸）</li>
<ul>
<li><abbr title="B_10MFT_ACT">MFT动作</abbr><a href="../../../../../my_data/image/first_boiler_img/B10HFC10AJ001_Trip1.png" target="_blank">Logic</a></li>
<li><abbr title="NOT B_10SeaIFan_A_Run(B_10HFW10AN001.IO.FB1.Value)/NOT B_10SeaIFan_B_Run(B_10HFW20AN001.IO.FB1.Value)">密封风机全停</abbr>或<abbr title="B_10HFW13DP002.IO.Value/B_10HFW13DP003.IO.Value/B_10HFW13DP004.IO.Value,Threshold-三取二">磨煤机A一次风与密封风差压低，延时2s</abbr></li>
<li><abbr title="NOT B_10PAFA_RUN(B_10HLB30AN001.IO.FB1.Value)/NOT B_10PAFB_RUN(B_10HLB40AN001.IO.FB1.Value)">一次风机全停</abbr></li>
<li><abbr title="B_10MILL_AIN_PA_PRESS(B_10HFE71CP101.IO.Value)">磨煤机A入口风压<4Kpa</abbr>且<abbr title="NOT B_10HFE51AA001.IO.FB1.Value">热一次风气动阀开反馈消失</abbr>且<abbr title="B_10HFE51AA001 .IO.FB0.Value">关反馈存在</abbr>，延时2s<a href="../../../../../my_data/image/first_boiler_img/B10HFC10AJ001_Trip2.png" target="_blank">Logic</a></li>
<li><abbr title="MILL_A_TEMP(B_10HFV10CT304.IO.Value/B_10HFV10CT305.IO.Value/B_10HFV10CT306.IO.Value),Threshold-三取二">磨煤机A推力轴温度>80℃</abbr>,延时3s</li>
<li><abbr title="B_10HFC10AJ001.IO.FB1.Value">磨煤机A运行</abbr>且<abbr title="NOT B_10HFY10FA001.IO.FB1.Value">A给煤机停</abbr>，延时300 s</li>
<li><abbr title="B_10HFY10FA001.IO.FB1.Value">给煤机A运行</abbr>,180s后，<abbr title="B_10COAL_LAYER_ANOT_RUN(NOT B_10HHA11CB012.IO.Value/NOT B_10HHA12CB012.IO.Value/NOT B_10HHA13CB012.IO.Value/NOT B_10HHA14CB012.IO.Value),四取三">煤层A火检无火</abbr><a href="../../../../../my_data/image/first_boiler_img/B10HFC10AJ001_Trip3.png" target="_blank">Logic</a></li>
<li><abbr title="B_10BLR_LOAD">机组负荷</abbr>(总风量除以546.6)小于40%且<abbr title="NO_OILGUN_WORK_COMM">所有常规油枪没有投运</abbr>且<abbr title="10HFY10FA001.IO.FB1.Value">给煤机A运行</abbr>延时180s后且<abbr title="Oilvlv_MicroOli_Layer_Nofire">微油火检无火</abbr>（只有磨煤机A有此条件）</li>
所有常规油枪没有投运：(NO_OILGUN_WORK_COMM): A下层油枪投运（B_20OIL_AA_SVR）取反且BC层油枪投运（B_20OIL_BC_SVR）取反
A下层油枪投运（B_20OIL_AA_SVR）：
<li><abbr title="10HHA10CB012.IO.Value">A下1火检有火</abbr>且<abbr title="10HJF62AA022.IO.FB0.Value取反">A下1油角阀全</abbr>开，延时10s</li>
<li><abbr title="10HHA10CB022.IO.Value">A下2火检有火</abbr>且<abbr title="10HJF62AA024.IO.FB0.Value取反">A下2油角阀全</abbr>开，延时10s</li>
<li><abbr title="10HHA10CB032.IO.Value">A下3火检有火</abbr>且<abbr title="10HJF62AA026.IO.FB0.Value取反">A下3油角阀全</abbr>开，延时10s</li>
<li><abbr title="10HHA10CB042.IO.Value">A下4火检有火</abbr>且<abbr title="10HJF62AA028.IO.FB0.Value取反">A下4油角阀全</abbr>开，延时10s</li>
BC层油枪投运（B_20OIL_BC_SVR）：
<li><abbr title="10HHA10CB052.IO.Value">BC1火检有火</abbr>且<abbr title="10HJF62AA032.IO.FB0.Value取反">BC1油角阀全开</abbr>，延时10s</li>
<li><abbr title="10HHA10CB062.IO.Value">BC2火检有火</abbr>且<abbr title="10HJF62AA034.IO.FB0.Value取反">BC2油角阀全开</abbr>，延时10s</li>
<li><abbr title="10HHA10CB072.IO.Value">BC3火检有火</abbr>且<abbr title="10HJF62AA036.IO.FB0.Value取反">BC3油角阀全开</abbr>，延时10s</li>
<li><abbr title="10HHA10CB082.IO.Value">BC4火检有火</abbr>且<abbr title="10HJF62AA038.IO.FB0.Value取反">BC4油角阀全开</abbr>，延时10s</li>
微油火检无火：（Oilvlv_MicroOli_Layer_Nofire）
<li>微油#1角火检无火（<abbr title="B_10HHA61CB001.IO.Value取反">A微油1火检有火</abbr>且<abbr title="B_20HJF61AA016.IO.FB1.Value">A微油1油角阀全开</abbr></li>
<li>微油#2角火检无火（<abbr title="B_10HHA61CB002.IO.Value取反">A微油2火检有火</abbr>且<abbr title="B_20HJF61AA018.IO.FB1.Value">A微油2油角阀全开</abbr></li>
<li>微油#3角火检无火（<abbr title="B_10HHA61CB003.IO.Value取反">A微油3火检有火</abbr>且<abbr title="B_20HJF61AA020.IO.FB1.Value">A微油3油角阀全开</abbr></li>
<li>微油#4角火检无火（<abbr title="B_10HHA61CB004.IO.Value取反">A微油4火检有火</abbr>且<abbr title="B_20HJF61AA022.IO.FB1.Value">A微油1油角阀全开</abbr></li>
<li><abbr title="B_10HFV10CP001.IO.Value/B_10HFV10CP002.IO.Value/B_10HFV10CP003.IO.Value，Threshold-三取二">润滑油泵油压低低</abbr>，延时3s</li>
<li><abbr title="B_10MILLA_Mixture_Temp(B_10HFC10CT301.IO.Value/B_10HFC10CT302.IO.Value/B_10HFC10CT303.IO.Value)">磨煤机A分离器风粉混合物温度>137℃，延时10s</abbr><a href="../../../../../my_data/image/first_boiler_img/B10HFC10AJ001_Trip4.png" target="_blank">Logic</a></li>
<li><abbr title="B_10HFV11CP101.IO.Value">磨煤机A液压油加载压力<2MPa</abbr>，延时30s<a href="../../../../../my_data/image/first_boiler_img/B10HFC10AJ001_Trip5.png" target="_blank">Logic</a></li>
</ul>
</ul>
<h3><li><abbr title="B_10HFE61AA001">磨煤机A一次冷风气动阀</abbr><a href="../../../../../my_data/image/first_boiler_img/B10HFE51AA001.png" target="_blank">Logic</a></li></h3>
<ul>
<li>联锁关：（以下任一条件满足，磨煤机A一次冷风气动阀联关）</li>
<ul>
<li><abbr title="B_10MFT_ACT">MFT动作</abbr></li>
<li><abbr title="B_10HFC10AJ001.IO.FB0.Value">磨煤机A停止</abbr>,脉冲3s</li>
</ul>
</ul>
<h3><li><abbr title="B_10HFE51AA001">磨煤机A一次热风气动阀</abbr></li></h3>
<ul>
<li>联锁关：（以下任一条件满足，磨煤机A一次热风气动阀联关）</li>
<ul>
<li><abbr title="B_10MFT_ACT">MFT动作</abbr></li>
<li><abbr title="B_10HFC10AJ001.IO.FB0.Value">磨煤机A停止</abbr>,脉冲3s</li>
</ul>
</ul>
<h3><li><abbr title="B_10HHE11AA001">磨煤机A #1出口阀</abbr><a href="../../../../../my_data/image/first_boiler_img/B10HHE11AA001.png" target="_blank">Logic</a></li></h3>
<ul>
<li>联锁关：</li>
<ul>
<li><abbr title="B_10HFC10AJ001.IO.FB0.Value">磨煤机A停止</abbr>,脉冲3s</li>
</ul>
</ul>
</ol>

<div id="lubricant_station"><h2><li>磨煤机润滑油系统</li></h2></div>
<hr>
<ol type="A" start="1">
<h3><li><abbr title="B10HFV10AP001_2">磨煤机A稀油站#1低速油泵</abbr><a href="../../../../../my_data/image/first_boiler_img/B10HFV10AP001_2.png" target="_blank">Logic</a></li></h3>
<ul>
<li>启允许：</li>
<ul>
<li><abbr title="CUTBACK_A_OIL_TEMP(B_10HFV10CT301.IO.Value/B_10HFV10CT302.IO.Value/B_10HFV10CT303.IO.Value),MedianReal-三取中">磨煤机A齿轮箱油温≤25℃</abbr></li>
</ul>
<li>联锁启:（以下条件均满足，磨煤机A 稀油站#1低速油泵联启）</li>
<ul>
<li><abbr title="A_LUBE_PUMP_BACK">磨煤机A稀油站油泵备用投入</abbr></li>
<li><abbr title="">启允许条件满足</abbr></li>
<li><abbr title="B_10HFV10AP002_1.IO.FB0.Value/B_10HFV10AP002_2.IO.FB0.Value">稀油站#2高、低速油泵均停止</abbr>或<abbr title="B_10HFV10CP101.IO.Value">润滑油分配器进口油压<0.105MPa</abbr></li>
</ul>
<li>停允许：（以下任一条件满足，磨煤机A 稀油站#1低速油泵允许停止）</li>
<ul>
<li><abbr title="B_10HFC10AJ001.IO.FB0.Value">磨煤机A停止，延时60s</abbr></li>
<li><abbr title="B_10HFV10AP002_1.IO.FB1.Value">稀油站#2高速油泵运行</abbr></li>
<li><abbr title="B_10HFV10AP002_2.IO.FB1.Value">稀油站#2低速油泵运行</abbr></li>
</ul>
</ul>
<h3><li><abbr title="B10HFV10AP001_1">磨煤机A稀油站1#高速油泵</abbr><a href="../../../../../my_data/image/first_boiler_img/B10HFV10AP001_1.png" target="_blank">Logic</a></li></h3>
<ul>
<li>启允许：</li>
<ul>
<li><abbr title="CUTBACK_A_OIL_TEMP(B_10HFV10CT301.IO.Value/B_10HFV10CT302.IO.Value/B_10HFV10CT303.IO.Value),MedianReal-三取中">磨煤机A齿轮箱油温>25℃</abbr></li>
</ul>
<li>联锁启:（以下条件均满足，磨煤机A 稀油站#1高速油泵联启）</li>
<ul>
<li><abbr title="A_LUBE_PUMP_BACK">磨煤机A稀油站油泵备用投入</abbr></li>
<li><abbr title="">启允许条件满足</abbr></li>
<li><abbr title="B_10HFV10AP002_1.IO.FB0.Value/B_10HFV10AP002_2.IO.FB0.Value">稀油站#2高、低速油泵均停止</abbr>或<abbr title="B_10HFV10CP101.IO.Value">润滑油分配器进口油压<0.105MPa</abbr></li>
</ul>
<li>停允许：（以下任一条件满足，磨煤机A 稀油站#1高速油泵允许停止）</li>
<ul>
<li><abbr title="B_10HFC10AJ001.IO.FB0.Value">磨煤机A停止，延时60s</abbr></li>
<li><abbr title="B_10HFV10AP002_1.IO.FB1.Value">稀油站#2高速油泵运行</abbr></li>
<li><abbr title="B_10HFV10AP002_2.IO.FB1.Value">稀油站#2低速油泵运行</abbr></li>
</ul>
</ul>
<h3><li><abbr title="B10HFV10AP002_2">磨煤机A稀油站#2低速油泵</abbr><a href="../../../../../my_data/image/first_boiler_img/B10HFV10AP002_2.png" target="_blank">Logic</a></li></h3>
<ul>
<li>启允许：</li>
<ul>
<li><abbr title="CUTBACK_A_OIL_TEMP(B_10HFV10CT301.IO.Value/B_10HFV10CT302.IO.Value/B_10HFV10CT303.IO.Value),MedianReal-三取中">磨煤机A齿轮箱油温≤25℃</abbr></li>
</ul>
<li>联锁启:（以下条件均满足，磨煤机A 稀油站#2低速油泵联启）</li>
<ul>
<li><abbr title="A_LUBE_PUMP_BACK">磨煤机A稀油站油泵备用投入</abbr></li>
<li><abbr title="">启允许条件满足</abbr></li>
<li><abbr title="B_10HFV10AP001_1.IO.FB0.Value/B_10HFV10AP001_2.IO.FB0.Value">稀油站#1高、低速油泵均停止</abbr>或<abbr title="B_10HFV10CP101.IO.Value">润滑油分配器进口油压<0.105MPa</abbr></li>
</ul>
<li>停允许：（以下任一条件满足，磨煤机A 稀油站#2低速油泵允许停止）</li>
<ul>
<li><abbr title="B_10HFC10AJ001.IO.FB0.Value">磨煤机A停止，延时60s</abbr></li>
<li><abbr title="B_10HFV10AP001_1.IO.FB1.Value">稀油站#1高速油泵运行</abbr></li>
<li><abbr title="B_10HFV10AP001_2.IO.FB1.Value">稀油站#1低速油泵运行</abbr></li>
</ul>
</ul>
<h3><li><abbr title="B10HFV10AP002_1">磨煤机A稀油站2#高速油泵</abbr><a href="../../../../../my_data/image/first_boiler_img/B10HFV10AP002_1.png" target="_blank">Logic</a></li></h3>
<ul>
<li>启允许：</li>
<ul>
<li><abbr title="CUTBACK_A_OIL_TEMP(B_10HFV10CT301.IO.Value/B_10HFV10CT302.IO.Value/B_10HFV10CT303.IO.Value),MedianReal-三取中">磨煤机A齿轮箱油温>25℃</abbr></li>
</ul>
<li>联锁启:（以下条件均满足，磨煤机A 稀油站#2高速油泵联启）</li>
<ul>
<li><abbr title="A_LUBE_PUMP_BACK">磨煤机A稀油站油泵备用投入</abbr></li>
<li><abbr title="">启允许条件满足</abbr></li>
<li><abbr title="B_10HFV10AP001_1.IO.FB0.Value/B_10HFV10AP001_2.IO.FB0.Value">稀油站#1高、低速油泵均停止</abbr>或<abbr title="B_10HFV10CP101.IO.Value">润滑油分配器进口油压<0.105MPa</abbr></li>
</ul>
<li>停允许：（以下任一条件满足，磨煤机A 稀油站#2高速油泵允许停止）</li>
<ul>
<li><abbr title="B_10HFC10AJ001.IO.FB0.Value">磨煤机A停止，延时60s</abbr></li>
<li><abbr title="B_10HFV10AP001_1.IO.FB1.Value">稀油站#1高速油泵运行</abbr></li>
<li><abbr title="B_10HFV10AP001_2.IO.FB1.Value">稀油站#1低速油泵运行</abbr></li>
</ul>
</ul>
<h3><li><abbr title="B10HFV10AH001">磨煤机A稀油站电加热器</abbr><a href="../../../../../my_data/image/first_boiler_img/B10HFV10AH001.png" target="_blank">Logic</a></li></h3>
<ul>
<li>启允许（以下任一条件满足，磨煤机A稀油站电加热器允许启动）</li>
<ul>
<li><abbr title="B_10HFV10AP001_1.IO.FB1.Value">磨煤机A稀油站#1高速油泵运行</abbr></li>
<li><abbr title="B_10HFV10AP001_2.IO.FB1.Value">磨煤机A稀油站#1低速油泵运行</abbr></li>
<li><abbr title="B_10HFV10AP002_1.IO.FB1.Value">磨煤机A稀油站#2高速油泵运行</abbr></li>
<li><abbr title="B_10HFV10AP002_2.IO.FB1.Value">磨煤机A稀油站#2低速油泵运行</abbr></li>
</ul>
<li>联锁启：（以下条件均满足，磨煤机A稀油站电加热器联启）</li>
<ul>
<li><abbr title="HFV10AH001_BACK_1">磨煤机A稀油站加热器备用投入</abbr></li>
<li><abbr title="">启允许条件满足</abbr></li>
<li><abbr title="B_10HFV10CT301.IO.Value/B_10HFV10CT302.IO.Value/B_10HFV10CT303.IO.Value,MedianReal-三取中">磨煤机A齿轮箱油温≤25℃</abbr></li>
</ul>
<li>联锁停：（以下条件均满足，磨煤机A稀油站电加热器联停）</li>
<ul>
<li><abbr title="HFV10AH001_BACK_1">磨煤机A稀油站加热器备用投入</abbr></li>
<li><abbr title="B_10HFV10CT301.IO.Value/B_10HFV10CT302.IO.Value/B_10HFV10CT303.IO.Value,MedianReal-三取中">磨煤机A齿轮箱油温≥33℃</abbr></li>
</ul>
</ul>
</ol>
<div id="hydraulic_station"><div id="mill_oil"><h2><li>磨煤机液压油系统</li></h2></div></div>
<ol type="A" start="1">
<h3><li><abbr title="B10HFV11AP001">磨煤机A液压站#1加载油泵</abbr><a href="../../../../../my_data/image/first_boiler_img/B10HFV11AP001.png" target="_blank">Logic</a></li></h3>
<ul>
<li>启允许：</li>
<ul>
<li><abbr title="Hyd_A_OIL_TEMP(B_10HFV11CT301.IO.Value/B_10HFV11CT302.IO.Value)，二取均">磨煤机A液压站油箱温度≥13℃</abbr></li>
</ul>
<li>联锁启：（以下条件均满足，磨煤机A液压站#1加载油泵联启）</li>
<ul>
<li><abbr title="A_HYD_PUMP_BACK">液压站备用投入</abbr></li>
<li><abbr title="B_10HFV11AP002.IO.FB0.Value">液压站#2加载油泵停止</abbr>或<abbr title="B_10HFV11CP101.IO.Value">液压油加载压力<2.5MPa</abbr></li>
</ul>
<li>停允许：（以下任一条件满足，磨煤机A液压站#1加载油泵允许停止）</li>
<ul>
<li><abbr title="B_10HFV11AP002.IO.FB1.Value">液压站#2加载油泵运行</abbr>或<abbr title="B_10HFC10AJ001.IO.FB0.Value">磨煤机A停止</abbr>，延时60s</li>
</ul>
</ul>
<h3><li><abbr title="B10HFV11AP002">磨煤机A液压站#2加载油泵</abbr><a href="../../../../../my_data/image/first_boiler_img/B10HFV11AP002.png" target="_blank">Logic</a></li></h3>
<ul>
<li>启允许：</li>
<ul>
<li><abbr title="Hyd_A_OIL_TEMP(B_10HFV11CT301.IO.Value/B_10HFV11CT302.IO.Value)，二取均">磨煤机A液压站油箱温度≥13℃</abbr></li>
</ul>
<li>联锁启：（以下条件均满足，磨煤机A液压站#1加载油泵联启）</li>
<ul>
<li><abbr title="A_HYD_PUMP_BACK">液压站备用投入</abbr></li>
<li><abbr title="B_10HFV11AP001.IO.FB0.Value">液压站#1加载油泵停止</abbr>或<abbr title="B_10HFV11CP101.IO.Value">液压油加载压力<2.5MPa</abbr></li>
</ul>
<li>停允许：（以下任一条件满足，磨煤机A液压站#1加载油泵允许停止）</li>
<ul>
<li><abbr title="B_10HFV11AP001.IO.FB1.Value">液压站#2加载油泵运行</abbr>或<abbr title="B_10HFC10AJ001.IO.FB0.Value">磨煤机A停止</abbr>，延时60s</li>
</ul>
</ul>
<h3><li><abbr title="B10HFV11AH001">磨煤机A液压站电加热器</abbr><a href="../../../../../my_data/image/first_boiler_img/B10HFV11AH001.png" target="_blank">Logic</a></li></h3>
<ul>
<li>联锁启：（以下条件均满足，磨煤机A液压站电加热器联启）</li>
<ul>
<li><abbr title="HFV11AH001_BACK_1">液压站电加热器备用投入</abbr></li>
<li><abbr title="B_10HFV11CT301.IO.Value/B_10HFV11CT302.IO.Value，MedianReal-二取中">磨煤机A液压站油箱温度≤10℃</abbr></li>
</ul>
<li>联锁停：（以下条件均满足，磨煤机A液压站电加热器联停）</li>
<ul>
<li><abbr title="HFV11AH001_BACK_1">液压站电加热器备用投入</abbr></li>
<li><abbr title="B_10HFV11CT301.IO.Value/B_10HFV11CT302.IO.Value，MedianReal-二取中">磨煤机A液压油温度≥20℃</abbr></li>
</ul>
</ul>
<h3><li><abbr title="10HFV11AA001">磨煤机A液动阀</abbr></li></h3>
<h3><li><abbr title="10HFV11AA002">磨煤机A磨辊</abbr></li></h3>
<ul>
<li>手动操作升/降  DO 3s输出</li>
</ul>
<h3><li><abbr title="10HFV11AA003">磨煤机A变/定加载</abbr></li></h3>
<ul>
<li>手动操作升/降  DO 3s输出</li>
</ol>
<div id="mill_fan"><h2><li>密封风机</li></h2></div>
<ol type="A" start="1">
<h3><li><abbr title="B_10HFW10AN001">密封风机A</abbr><a href="../../../../../my_data/image/first_boiler_img/B10HFW10AN001.png" target="_blank">Logic</a></li></h3>
<ul>
<li>启允许：</li>
<ul>
<li><abbr title="B_10HFW10CT201.IO.Value)">密封风机A前轴承温度</abbr>小于50</li>
<li><abbr title="B_10HFW10CT202.IO.Value)">密封风机A后轴承温度</abbr>小于50</li>
<li><abbr title="B_10PAFA_RUN(B_10HLB30AN001.IO.FB1.Value)/B_10PAFB_RUN(B_10HLB40AN001.IO.FB1.Value)">至少一台一次风机运行</abbr></li>
</ul>
<li>停允许：(以下任一条件满足，密封风机A允许停止)</li>
<ul>
<li><abbr title="B_10HFW20AN001.IO.FB1.Value">密封风机B运行</abbr></li>
<li><abbr title="B_10MILLA_STOP(B_10HFC10AJ001ZD.IO.Value)/B_10MILLB_STOP(B_10HFC20AJ001ZD.IO.Value)/B_10MILLC_STOP(B_10HFC30AJ001ZD.IO.Value)/B_10MILLD_STOP(B_10HFC40AJ001ZD.IO.Value)">磨煤机全部停止SOE卡件</abbr></li>
<li><abbr title="B_10PAFA_STOP(10HLB30AN001ZD1.IO.Value)/B_10PAFB_STOP(10HLB40AN001ZD1.IO.Value)">一次风机均停止SOE卡件</abbr></li>
</ul>
<li>联锁启：（以下条件均满足，密封风机A联启）</li>
<ul>
<li><abbr title="SeaFan_INBAK">密封风机备用投入</abbr></li>
<li><abbr title="NOT B_10HFW20AN001.IO.FB1.Value">密封风机B运行信号消失</abbr>，脉冲3s,或<abbr title="B_10HFW30CP101.IO.Value">密封风机出口母管压力<8KPa,延时2s</abbr></li>
<li>启动允许条件满足</li>
</ul>
<li>联锁停：</li>
<ul>
<li><abbr title="B_10PAFA_STOP(10HLB30AN001ZD1.IO.Value)/B_10PAFB_STOP(10HLB40AN001ZD1.IO.Value)">一次风机均停止SOE卡件</abbr>,延时5s,脉冲3s</li>
</ul>
</ul>
<h3><li><abbr title="B_10HFW20AN001">密封风机B</abbr><a href="../../../../../my_data/image/first_boiler_img/B10HFW20AN001.png" target="_blank">Logic</a></li></h3>
<ul>
<li>启允许：</li>
<ul>
<li><abbr title="B_10HFW20CT201.IO.Value)">密封风机B前轴承温度</abbr>小于50</li>
<li><abbr title="B_10HFW20CT202.IO.Value)">密封风机B后轴承温度</abbr>小于50</li>
<li><abbr title="B_10PAFA_RUN(B_10HLB30AN001.IO.FB1.Value)/B_10PAFB_RUN(B_10HLB40AN001.IO.FB1.Value)">至少一台一次风机运行</abbr></li>
</ul>
<li>停允许：(以下任一条件满足，密封风机A允许停止)</li>
<ul>
<li><abbr title="B_10HFW10AN001.IO.FB1.Value">密封风机A运行</abbr></li>
<li><abbr title="B_10MILLA_STOP(B_10HFC10AJ001ZD.IO.Value)/B_10MILLB_STOP(B_10HFC20AJ001ZD.IO.Value)/B_10MILLC_STOP(B_10HFC30AJ001ZD.IO.Value)/B_10MILLD_STOP(B_10HFC40AJ001ZD.IO.Value)">磨煤机全部停止SOE卡件</abbr></li>
<li><abbr title="B_10PAFA_STOP(10HLB30AN001ZD1.IO.Value)/B_10PAFB_STOP(10HLB40AN001ZD1.IO.Value)">一次风机均停止SOE卡件</abbr></li>
</ul>
<li>联锁启：（以下条件均满足，密封风机A联启）</li>
<ul>
<li><abbr title="SeaFan_INBAK">密封风机备用投入</abbr></li>
<li><abbr title="NOT B_10HFW10AN001.IO.FB1.Value">密封风机B运行信号消失</abbr>，脉冲3s,或<abbr title="B_10HFW30CP101.IO.Value">密封风机出口母管压力<8KPa,延时2s</abbr></li>
<li>启动允许条件满足</li>
</ul>
<li>联锁停：</li>
<ul>
<li><abbr title="B_10PAFA_STOP(10HLB30AN001ZD1.IO.Value)/B_10PAFB_STOP(10HLB40AN001ZD1.IO.Value)">一次风机均停止SOE卡件</abbr>,延时5s,脉冲3s</li>
</ul>
</ul>
<h3><li><abbr title="B_10HFW10AA001">密封风机A进口风门</abbr></li></h3>
<h3><li><abbr title="B_10HFW10AA101AO">密封风机A进口调节风门</abbr></li></h3>
</ol>
<hr>

<div id="air_flue"><h1 align="center">风烟系统</h1></div>
<hr>
<ul>
<li><a href="#top">顶部</a></li>
<li><a href="#FDF">送风机</a></li>
<li><a href="#APH">空预器</a></li>
<li><a href="#IDF">引风机</a></li>
<li><a href="#PAF">一次风机</a></li>
</ul>
<hr>
<ol type="1" start="1">
<div id="FDF"><h2><li>送风机A</li></h2></div>
<hr>
<ol type="A" start="1">
<h3><li><abbr title="B_10HLB10AN001">送风机A</abbr><a href="../../../../../my_data/image/first_boiler_img/B10HLB10AN001.png" target="_blank">Logic</a></li></h3>
<ul>
<li>启允许：（以下条件均满足，送风机A允许启动）<a href="../../../../../my_data/image/first_boiler_img/B10HLB10AN001_OPMT.png" target="_blank">Logic</a></li>
<ul>
<li><abbr title="B_10FDF_A_INLET_DAMP_FB(B_10HLB10AA101AO.IO.FB.Value)">送风机A进口调节风门开度<5%</abbr></li>
<li><abbr title="FDF_A_TEMP_OK">送风机A温度正常</abbr><a href="../../../../../my_data/image/first_boiler_img/B10HLB10AN001_TEMP.png" target="_blank">Logic</a></li>
<ul>
<li><abbr title="B_10HLB10CT205.IO.Value/B_10HLB10CT206.IO.Value/B_10HLB10CT207.IO.Value">送风机A绕组线圈温度均＜70℃</abbr></li>
<li><abbr title="B_10HLB10CT203.IO.Value/B_10HLB10CT204.IO.Value">送风机A电机轴承温度均＜50℃</abbr></li>
<li><abbr title="B_10HLB10CT201.IO.Value/B_10HLB10CT202.IO.Value">送风机A风机轴承温度均＜40℃</abbr></li>
</ul>
<li><abbr title="FDF_A_XY_OK">送风机A振动正常</abbr></li>
<ul>
<li><abbr title="B_10HLB10CY101.IO.Value/B_10HLB10CY102.IO.Value">送风机A前轴承X、Y向振动均＜5mm/s</abbr></li>
<li><abbr title="B_10HLB10CY103.IO.Value/B_10HLB10CY104.IO.Value">送风机A后轴承X、Y向振动均＜5mm/s</abbr></li>
</ul>
<li><abbr title="NOT B_10HLB10AN001.Fail.Value">送风机A无故障</abbr></li>
<li><abbr title="NOT B_10HLB10AN001ZD2.IO.Value">送风机A无保护动作</abbr></li>
<li><abbr title="IDF_A_RUN(B_10HNC10AN001.IO.FB1.Value)/B_10IDFB_RUN(B_10HNC20AN001.IO.FB1.Value)">任一引风机运行</abbr></li>
<li><abbr title="主、辅电机任一运行APH_A_RUN(B_10CDB31FA002.IO.FB1.Value/10CDB31FA004.IO.FB1.Value)">空预器A运行</abbr>且<abbr title="B_10HLA12AA001.IO.FB1.Value">二次热风出口风门全开</abbr></li>
<li><abbr title="B_10HLA11AA001.IO.FB0.Value">送风机A出口挡板关闭</abbr></li>
<li><abbr title="NOT FDF_A_TRIP">无送风机A跳闸条件</abbr></li>
</ul>
<li>跳闸条件：（以下任一条件满足，送风机A跳闸）</li>
<ul>
<li><abbr title="B_10MFT_ACT">MFT动作</abbr>且<abbr title="B_10OUT_AIR_Press_HH(B_10HBK10CP014/B_10HBK10CP015/B_10HBK10CP016,三取二)">炉膛压力高高</abbr>且<abbr title="A_FDFA_SP(B_10HLB10AN001AO.IO.SP.Value)">变频器指令小于35％，延时60S</abbr><a href="../../../../../my_data/image/first_boiler_img/B10HLB10AN001_TRIP1.png" target="_blank">Logic</a></li>
<li><abbr title="PDF_A_RUN(B_10HLB10AN001.IO.FB1.Value)">送风机A运行</abbr>延时120秒且<abbr title="B_10HLA11AA001.IO.FB0.Value">送风机出口门关闭</abbr></li>
<li><abbr title="主、辅电机任一运行10CDB31FA002.IO.FB1.Value/10CDB31FA004.IO.FB1.Value延时3S取非">空预器A不运行，延时60s    </abbr></li>
<li><abbr title="FDF_A_RUN(B_10HLB10AN001.IO.FB1.Value)/B_10SAFB_RUN(B_10HLB20AN001.IO.FB1.Value)">两台送风机均运行</abbr>且<abbr title="NOT IDF_A_RUN(B_10HNC10AN001.IO.FB1.Value)">引风机A未运行，脉冲3s</abbr></li>
<li><abbr title="NOT IDF_A_RUN(B_10HNC10AN001.IO.FB1.Value)/NOT B_10IDFB_RUN(B_10HNC20AN001.IO.FB1.Value)">引风机A、B均未运行</abbr><a href="../../../../../my_data/image/first_boiler_img/B10HLB10AN001_TRIP2.png" target="_blank">Logic</a></li>
<li><abbr title="B_10HLB10AN001ZD2.IO.Value">送风机A保护动作 仅作首出</abbr></li>
</ul>
</ul>
<h3><li><abbr title="B_10HLB10AN001_1">送风机A变频器</abbr></li></h3>
<ul>
<li>启允许：（以下条件均满足，送风机A变频器允许启动）</li>
<ul>
<li><abbr title="NOT B_10HLB10AN001PM1.IO.Value">变频器无轻故障报警</abbr></li>
<li><abbr title="NOT B_10HLB10AN001PM2.IO.Value">变频器无重故障报警</abbr></li>
<li><abbr title="NOT B_10HLB10AN001_1.IO.FBLoc.Value">变频器在远方位置</abbr></li>
<li><abbr title="B_10HLB10AN001_1.IO.FB0.Value">变频器待机</abbr></li>
</ul>
<li>送风机变频器联锁：<a href="../../../../../my_data/image/first_boiler_img/B10HLB10AN001AO.png" target="_blank">Logic</a></li>
<ul>
<li><abbr title="B_10MFT_ACT">MFT动作</abbr>且<abbr title="B_10OUT_AIR_Press_HH(B_10HBK10CP014/B_10HBK10CP015/B_10HBK10CP016,三取二)">炉膛压力高高</abbr>时<abbr title="B10HLB10AN001AO.SP)">给定变频器指令为30％。</abbr></li>
</ul>
</ul>
<h3><li><abbr title="B_10HLA11AA001">送风机A出口风门</abbr><a href="../../../../../my_data/image/first_boiler_img/B10HLA11AA001.png" target="_blank">Logic</a></li></h3>
<ul>
<li>联锁关：</li>
<ul>
<li><abbr title="NOT B_10HLB10AN001.IO.FB1.Value">送风机A不运行</abbr>脉冲3s,且<abbr title="B_10SAFB_RUN(B_10HLB20AN001.IO.FB1.Value)">送风机B运行</abbr></li>
</ul>
</ul>
<h3><li><abbr title="B_10HLB10AA101AO">送风机A进口调节风门</abbr></li></h3>
</ol>
<div id="APH"><h2><li>空预器A</li></h2></div>
<hr>
<ol type="A" start="1">
<h3><li><abbr title="B_10CDB31FA002">空预器A主</abbr><a href="../../../../../my_data/image/first_boiler_img/B10CDB31FA002.png" target="_blank">Logic</a></li></h3>
<ul>
<li>启允许：（以下条件均满足，空预器A主变频允许启动）<a href="../../../../../my_data/image/first_boiler_img/B10CDB31FA002_PMT.png" target="_blank">Logic</a></li>
<ul>
<li><abbr title="B_10CDB31FU006.IO.Value">空预器A主动力电源状态正常</abbr></li>
<li><abbr title="B_10HLD1OCT301.IO.Value">空预器A导向轴承温度<80℃</abbr></li>
<li><abbr title="B_10HLD1OCT302.IO.Value">空预器A支撑轴承温度<70℃</abbr></li>
<li><abbr title="B_10CDB31FU001.IO.Value">空预器A传动柜控制电源正常</abbr></li>
<li><abbr title="B_10CDB31FU009.IO.Value取反">空预器A主变频无故障</abbr></li>
</ul>
<li>联锁启：（以下条件均满足，空预器A主变频联锁启动）</li>
<ul>
<li><abbr title="APH_A_BACKUP">备用投入</abbr></li>
<li><abbr title="APH_A_Main_OPMT">启允许满足</abbr></li>
<li><abbr title="NOT B_10CDB31FA004.IO.FB1.Value">辅变频未运行</abbr>或,<abbr title="B_10CDB31FA004.IO.FB1.Value">辅变频未运行</abbr>且<abbr title="B_10CDB31FU004.IO.Value">停转报警</abbr>延时5S</li>
</ul>
<li>停允许：</li>
（以下条件均满足，空预器A主变频允许停止）
<ul>
<li><abbr title="NOT B_10DFA_RUN(B_10HNC10AN001.IO.FB1.Value)">引风机A不运行</abbr></li>
<li><abbr title="NOT B_10SAFA_RUN(B_10HLB10AN001.IO.FB1.Value)">送风机A不运行</abbr></li>
<li><abbr title="B_10HLD10CT621.IO.Value/B_10HLD20CT621.IO.Value">空预器A入口烟气出入口两侧温度均小于120℃</abbr></li>
<li><abbr title="B_10HFE10AA001.IO.FB0.Value">空预器A一次热风出口风门关闭</abbr></li>
<li><abbr title="B_10HLA12AA001.IO.FB0.Value">空预器A二次热风出口风门关闭</abbr></li>
<li><abbr title="B_10CDB31FA004.IO.FB1.Value">或空预器A辅电机运行</abbr></li>
<li><abbr title="B10_APH_Bypass">或者空预器A旁路（空预器A投切试验按钮），空预器A主变频允许停止</abbr></li>
</ul>
</ul>
<h3><li><abbr title="B_10HNS11AA001">空预器A进口烟气风门</abbr><a href="../../../../../my_data/image/first_boiler_img/B10HNS11AA001.png" target="_blank">Logic</a></li></h3>
<ul>
<li>联锁关(以下任意一条满足)</li>
<ul>
<li><abbr title="主、辅电机任一运行APH_B_RUN_COMM(B_10CDB32FA002.IO.FB1.Value/B_10CDB32FA004.IO.FB1.Value)">空预器B运行</abbr>且<abbr title="主、辅电机任一运行NOT APH_A_RUN(B_10CDB31FA002.IO.FB1.Value/B_10CDB31FA004.IO.FB1.Value)">空预器A未运行,延时20s</abbr></li>
<li><abbr title="主、辅电机任一运行APH_B_RUN_COMM(B_10CDB32FA002.IO.FB1.Value/B_10CDB32FA004.IO.FB1.Value)">空预器B运行</abbr>且<abbr title="B_10CDB31FU004.IO.Value)">空预器A停转报警,延时20s</abbr></li>
</ul>
</ul>
<h3><li><abbr title="B_10HNA21AA001">空预器A出口烟气风门</abbr></li></h3>
<ul>
<li>联锁关(以下任意一条满足)</li>
<ul>
<li><abbr title="主、辅电机任一运行APH_B_RUN_COMM(B_10CDB32FA002.IO.FB1.Value/B_10CDB32FA004.IO.FB1.Value)">空预器B运行</abbr>且<abbr title="主、辅电机任一运行NOT APH_A_RUN(B_10CDB31FA002.IO.FB1.Value/B_10CDB31FA004.IO.FB1.Value)">空预器A未运行,延时20s</abbr></li>
<li><abbr title="主、辅电机任一运行APH_B_RUN_COMM(B_10CDB32FA002.IO.FB1.Value/B_10CDB32FA004.IO.FB1.Value)">空预器B运行</abbr>且<abbr title="B_10CDB31FU004.IO.Value)">空预器A停转报警,延时20s</abbr></li>
</ul>
</ul>
<h3><li><abbr title="B_10HFE10AA001">空预器A一次热风出口风门</abbr><a href="../../../../../my_data/image/first_boiler_img/B10HFE10AA001.png" target="_blank">Logic</a></li></h3>
<ul>
<li>联锁开</li>
<ul>
<li><abbr title="主、辅电机任一运行APH_A_RUN(B_10CDB31FA002.IO.FB1.Value/B_10CDB31FA004.IO.FB1.Value)">空预器A运行</abbr>，脉冲3s</li>
</ul>
</ul>
<h3><li><abbr title="B_10HLA12AA001">空预器A二次热风出口风门</abbr></li></h3>
<ul>
<li>联锁开</li>
<ul>
<li><abbr title="主、辅电机任一运行APH_A_RUN(B_10CDB31FA002.IO.FB1.Value/B_10CDB31FA004.IO.FB1.Value)">空预器A运行</abbr>，脉冲3s</li>
</ul>
</ul>
<h3><li><abbr title="B_10HLA23AA001">空预器前二次冷风联络风门</abbr></li></h3>
<h3><li><abbr title="B_10HLA60AA001">空预器前一次冷风联络风门</abbr></li></h3>
</ol>

<div id="IDF"><h2><li>引风机A</li></h2></div>
<hr>
<ol type="A" start="1">
<h3><li><abbr title="B_10HNC10AN001">引风机A</abbr><a href="../../../../../my_data/image/first_boiler_img/B10HNC10AN001.png" target="_blank">Logic</a></li></h3>
<ul>
<li>启允许：（以下条件均满足，引风机A允许启动）<a href="../../../../../my_data/image/first_boiler_img/B10HNC10AN001_OPMT1.png" target="_blank">Logic</a></li>
<ul>
<li><abbr title="B_10IDF_A_INLET_DAMP_FB(10HNC10AA101AO.IO.FB.Value)">引风机A进口调节风门开度<5%</abbr></li>
<li><abbr title="IDF_A_TEMP_OK">引风机A温度正常</abbr><a href="../../../../../my_data/image/first_boiler_img/B10HNC10AN001_OPMT2.png" target="_blank">Logic</a></li>
<ul>
<li><abbr title="B_10HNC10CT205.IO.Value/B_10HNC10CT206.IO.Value/B_10HNC10CT207.IO.Value">引风机A绕组线圈温度均＜70℃</abbr></li>
<li><abbr title="B_10HNC10CT203.IO.Value/B_10HNC10CT204.IO.Value">引风机A电机轴承温度均＜50℃</abbr></li>
<li><abbr title="B_10HNC10CT201.IO.Value/B_10HNC10CT202.IO.Value">引风机A风机轴承温度均＜40℃</abbr></li>
</ul>
<li><abbr title="IDF_A_XY_OK">引风机A振动正常</abbr></li>
<ul>
<li><abbr title="B_10HNC10CY101.IO.Value/B_10HNC10CY102.IO.Value">引风机A前轴承X、Y向振动均＜5mm/s</abbr></li>
<li><abbr title="B_10HNC10CY103.IO.Value/B_10HNC10CY104.IO.Value">引风机A后轴承X、Y向振动均＜5mm/s</abbr></li>
</ul>
<li><abbr title="NOT B_10HNC10AN001.Fail.Value">引风机A无故障（电气信号）</abbr></li>
<li><abbr title="NOT B_10HNC10AN001ZD2.IO.Value">引风机A无保护动作</abbr></li>
<li><abbr title="NOT B_10HNA31AA001.IO.FB1.Value">引风机A入口风门全开</abbr></li>
<li><abbr title="NOT IDF_A_TRIP">无引风机A跳闸条件</abbr></li>
<li><abbr title="AIR_CH_OK">空气通道建立（送风到引风机前通道建立）</abbr>以下任一条件满足均可</li>
<ul>
<li>空预器A-A通道建立:<abbr title="B_10HNS11AA001.IO.FB1.Value/B_10HNA21AA001.IO.FB1.Value">空预器A进口烟气风门和出口烟气风门均开</abbr>且<abbr title="主、辅电机任一运行10CDB31FA002.IO.FB1.Value/10CDB31FA004.IO.FB1.Value延时3S">空预器A运行</abbr></li>

<li>空预器B-B通道建立:<abbr title="B_10HNS12AA001.IO.FB1.Value/B_10HNA22AA001.IO.FB1.Value">空预器B进口烟气风门和出口烟气风门均开</abbr>且<abbr title="主、辅电机任一运行10CDB32FA002.IO.FB1.Value/10CDB32FA004.IO.FB1.Value延时3S">空预器B运行</abbr></li>
</ul>
</ul>
<li>跳闸条件：（以下任一条件满足，引风机A跳闸）</li>
<ul>
<li><abbr title="B_10HNC10AN001ZD2.IO.Value">引风机A保护动作,仅作首出</abbr><a href="../../../../../my_data/image/first_boiler_img/B10HNC10AN001_TRIP1.png" target="_blank">Logic</a></li>
<li><abbr title="B_10MFT_ACT">MFT动作</abbr>且<abbr title="B_10HBK10CP011/B_10HBK10CP012/B_10HBK10CP013,三取二">炉膛压力低低</abbr>且<abbr title="A_IDFA_SP(B_10HNC10AN001AO.IO.SP)">变频器指令小于35％</abbr>，延时60S</abbr></li>
<li><abbr title="IDF_A_RUN(B_10HNC10AN001.IO.FB1.Value)">引风机A运行</abbr>延时120秒，<abbr title="B_10HNA10AA001.IO.FB0.Value">引风机A出口阀关闭</abbr></li>
两台空预器均不运行(运行取反)，延时5s
<ul>
<li><abbr title="主、辅电机任一运行10CDB31FA002.IO.FB1.Value/10CDB31FA004.IO.FB1.Value延时3S">空预器A运行</abbr></li>
<li><abbr title="主、辅电机任一运行10CDB32FA002.IO.FB1.Value/10CDB32FA004.IO.FB1.Value延时3S">空预器B运行</abbr></li>
</ul>

<li><abbr title="IDF_A_RUN(B_10HNC10AN001.IO.FB1.Value)/B_10IDFB_RUN(B_10HNC20AN001.IO.FB1.Value)">两台引风机均运行</abbr>且<abbr title="NOT FDF_A_RUN(B_10HLB10AN001.IO.FB1.Value)">送风机A不运行</abbr>脉冲3s<a href="../../../../../my_data/image/first_boiler_img/B10HNC10AN001_TRIP2.png" target="_blank">Logic</a></li>
</ul>
</ul>
<h3><li><abbr title="B_10HNC10AN001_1">引风机A变频器</abbr></li></h3>
<ul>
<li>启允许：（以下条件均满足，引风机A变频器允许启动）</li>
<ul>
<li><abbr title="NOT B_10HNC10AN001PM1.IO.Value">变频器无轻故障报警</abbr></li>
<li><abbr title="NOT B_10HNC10AN001PM2.IO.Value">变频器无重故障报警</abbr></li>
<li><abbr title="NOT B_10HNC10AN001_1.IO.FBLoc.Value">变频器在远方位置</abbr></li>
<li><abbr title="B_10HNC10AN001_1.IO.FB0.Value">变频器待机</abbr></li>
</ul>
<li>引风机变频器联锁：<a href="../../../../../my_data/image/first_boiler_img/B10HNC10AN001AO.png" target="_blank">Logic</a></li>
<ul>
<li><abbr title="B_10MFT_ACT">MFT动作</abbr>且<abbr title="B_10OUT_AIR_Press_LL(B_10HBK10CP011/B_10HBK10CP012/B_10HBK10CP013,三取二)">炉膛压力低低</abbr>时<abbr title="B10HNC10AN001AO.SP">给定变频器指令</abbr>为30％。</abbr></li>
</ul>
</ul>

<h3><li><abbr title="B_10HNA31AA001">引风机A入口风门</abbr><a href="../../../../../my_data/image/first_boiler_img/B10HNA10AA001.png" target="_blank">Logic</a></li></h3>
<ul>
<li>联锁开：</li>
<ul>
<li><abbr title="IDF_A_RUN(B_10HNC10AN001.IO.FB1.Value)">引风机A运行</abbr></li>
</ul>
<li>联锁关：</li>
<ul>
<li><abbr title="NOT IDF_A_RUN(B_10HNC10AN001.IO.FB1.Value)">引风机A不运行</abbr>,脉冲3s,且<abbr title="B_10IDFB_RUN(B_10HNC20AN001.IO.FB1.Value)">引风机B运行</abbr></li>
</ul>
</ul>
<h3><li><abbr title="B_10HNA10AA001">引风机A出口风门</abbr></li></h3>
<ul>
<li>关允许：</li>
<ul>
<li><abbr title="NOT B_10HNC10AN001.IO.FB1.Value">引风机A不运行</abbr></li>
</ul>
<li>联锁关：</li>
<ul>
<li><abbr title="NOT IDF_A_RUN(B_10HNC10AN001.IO.FB1.Value)">引风机A不运行</abbr>,脉冲3s,且<abbr title="B_10IDFB_RUN(B_10HNC20AN001.IO.FB1.Value)">引风机B运行</abbr></li>
</ul>
</ul>
<h3><li><abbr title="B_10HNC10AA101AO">引风机A进口调节风门</abbr></li></h3>
</ol>
<div id="PAF"><h2><li>一次风机A</li></h2></div>
<hr>
<ol type="A" start="1">
<h3><li><abbr title="B_10HLB30AN001">一次风机A</abbr><a href="../../../../../my_data/image/first_boiler_img/B10HLB30AN001.png" target="_blank">Logic</a></li></h3>
<ul>
<li>启允许：（以下条件均满足，一次风机A允许启动）</li>
<ul>
<li><abbr title="B_10PAF_A_INLET_DAMP_FB(B_10HLB30AA101AO.IO.FB.Value)">进口调节风门开度<5% </abbr><a href="../../../../../my_data/image/first_boiler_img/B10HLB30AN001_OPMT1.png" target="_blank">Logic</a></li>
<li><abbr title="FDF_A_RUN(B_10HLB10AN001.IO.FB1.Value)/B_10SAFB_RUN(B_10HLB20AN001.IO.FB1.Value)">任一送风机运行</abbr></li>
<li><abbr title="IDF_A_RUN(B_10HNC10AN001.IO.FB1.Value)/B_10IDFB_RUN(B_10HNC20AN001.IO.FB1.Value)">任一引风机运行</abbr></li>
<li><abbr title="主/副变频任一运行，B_10CDB31FA002.IO.FB1.Value/B_10CDB31FA004.IO.FB1.Value">空预器A运行</abbr>延时3s且<abbr title="B_10HFE10AA001.IO.FB1.Value">空预器A一次热风出口风门全开</abbr></li>
<li><abbr title="B_10HFE30AA001.IO.FB1.Value">一次风机A出口调温风关断风门全开</abbr></li>
<li><abbr title="PAF_A_OPMT6">一次风机A温度正常</abbr><a href="../../../../../my_data/image/first_boiler_img/B10HLB30AN001_OPMT2.png" target="_blank">Logic</a></li>
<ul>
<li><abbr title="B_10HLB30CT205.IO.Value/B_10HLB30CT206.IO.Value/B_10HLB30CT207.IO.Value">一次风机A绕组线圈温度均＜70℃</abbr></li>
<li><abbr title="B_10HLB30CT203.IO.Value/B_10HLB30CT204.IO.Value">一次风机A电机轴承温度均＜50℃</abbr></li>
<li><abbr title="B_10HLB30CT201.IO.Value/B_10HLB30CT202.IO.Value">一次风机A风机轴承温度均＜40℃</abbr></li>
</ul>
<li><abbr title="PAF_A_OPMT7">一次风机A振动正常</abbr></li>
<ul>
<li><abbr title="B_10HLB30CY101.IO.Value/B_10HLB30CY102.IO.Value">一次风机A前轴承X、Y向振动均正常＜5mm/s</abbr></li>
<li><abbr title="B_10HLB30CY103.IO.Value/B_10HLB30CY104.IO.Value">一次风机A后轴承X、Y向振动均正常＜5mm/s</abbr></li>
</ul>
<li><abbr title="NOT B_10HLB30AN001.Fail.Value">一次风机A无故障（电气信号）</abbr><a href="../../../../../my_data/image/first_boiler_img/B10HLB30AN001_OPMT3.png" target="_blank">Logic</a></li>
<li><abbr title="NOT B_10HLB30AN001ZD2.IO.Value">一次风机A无保护动作（事故按钮）</abbr></li>
<li><abbr title="B_10HLA31AA001.IO.FB0.Value">一次风机A出口挡板关闭</abbr></li>
<li><abbr title="NOT PAF_A_TRIP">无一次风机A跳闸条件</abbr></li>
</ul>
<li>跳闸条件：（以下任一条件满足，一次风机A跳闸）<a href="../../../../../my_data/image/first_boiler_img/B10HLB30AN001_TRIP.png" target="_blank">Logic</a></li>
<ul>
<li><abbr title="B_10MFT_ACT">MFT动作</abbr></li>
<li><abbr title="PAF_A_RUN(B_10HLB30AN001.IO.FB1.Value)">一次风机A运行</abbr>延时120s且<abbr title="B_10HLA31AA001.IO.FB0.Value">出口风门关闭）</abbr></li>
<li><abbr title="B_10HLB30AN001ZD2.IO.Value">一次风机A保护动作 仅作首出(非DCS信号)</abbr></li>
</ul>
</ul>
<h3><li><abbr title="B_10HLB30AN001_1">一次风机A变频器</abbr></li></h3>
<ul>
<li>启允许：（以下条件均满足，一次风机A变频器允许启动）</li>
<ul>
<li><abbr title="NOT B_10HLB30AN001PM1.IO.Value">变频器无轻故障报警</abbr></li>
<li><abbr title="NOT B_10HLB30AN001PM2.IO.Value">变频器无重故障报警</abbr></li>
<li><abbr title="NOT B_10HLB30AN001_1.IO.FBLoc.Value">变频器在远方位置</abbr></li>
<li><abbr title="B_10HLB30AN001_1.IO.FB0.Value">变频器待机</abbr></li>
</ul>
</ul>
<h3><li><abbr title="B_10HLA31AA001">一次风机A出口风门</abbr><a href="../../../../../my_data/image/first_boiler_img/B10HLA31AA001.png" target="_blank">Logic</a></li></h3>
<ul>
<li>关允许：</li>
<ul>
<li><abbr title="NOT B_10HLB30AN001.IO.FB1.Value">一次风机A不运行</abbr></li>
</ul>
<li>联锁关：</li>
<ul>
<li><abbr title="B_10HLB30AN001.IO.FB0.Value">一次风机A停止，脉冲3s</abbr></li>
</ul>
</ul>
<h3><li><abbr title="B_10HFE30AA001">一次调温风关断门(左)</abbr></li></h3>
<h3><li><abbr title="B_10HLB30AA101AO">一次风机A进口调节风门</abbr></li></h3>
<div id="oil"><h1 align="center">燃油系统</h1></div>
<hr>
<ul>
<li><a href="#top">顶部</a></li>
<li><a href="#oil_shun">燃油顺控</a></li>
<li><a href="#oil_single">燃油单体设备</a></li>
<li><a href="#micro_oil_shun">微油顺控</a></li>
<li><a href="#micro_oil_sigle">微油单体设备</a></li>
</ul>
1.油层控制
锅炉经过炉膛吹扫，并且所有油点火条件全部满足后，锅炉才能点火启动。油燃烧器只能依靠自己所属的高能点火器进行点火，不允许依靠其它煤燃烧器的火焰进行点火。其控制分为油层控制、单独控制。
有二层油燃烧器A下、BC。本文档仅用A下油层作说明，其他逻辑是类似的。
当A下油层中有至少3角投运时，认为A下层油投运。
<hr>
<ol type="1" start="1">
<div id="oil_shun"><h2><li>油枪顺控</li></h2></div>
<hr>
<ol type="A" start="1">
<h3><li><abbr title="B_10HLB10AN001">油枪点火顺控</abbr></li></h3>
<ul>
<li>油枪点火顺控启动允许(下列条件均成立，允许启动油枪点火顺控)<a href="../../../../../my_data/image/first_boiler_img/Oil_A1_IGNT.png" target="_blank">Logic</a></li>
<ul>
<li><abbr title="B_10HJY11FU001.IO.Value">A下层点火柜远方模式控制</abbr></li>
<li><abbr title="Oil_A1_IGNT_Fail">无本油枪点火失败信号</abbr></li>
<li><abbr title="B_10HJF62AA022.IO.FB0.Value">A下1油角阀关到位</abbr></li>
<li><abbr title="B_10HJR62AA022.IO.FB0.Value">A下1吹扫阀关到位</abbr></li>
<li><abbr title="NOT Oil_A1_Purge">A下1油枪正在吹扫信号不存在</abbr></li>
<li><abbr title="B_10Oil_in_VIV_Open(B_10ERB10AA009.IO.FB1.Value)">油母管进油快关阀开到位</abbr></li>
<li><abbr title="NOT B10ERB10CP005_COMM(B_10ERB10CP005.IO.IOValue)">锅炉燃油进油主管压力不低（DI）</abbr></li>
<li><abbr title="NOT Oil_A1_Trip">A下1油枪无跳闸条件</abbr></li>
</ul>
<li>油枪点火顺控步骤</li>
<ol>
<li>Step1: 进A下1油枪，反馈为A下1油枪进到位</li>
<li>Step2: 进A下1点火枪，反馈为A下1点火枪进到位。</li>
<li>Step3: A下1点火激励打火，反馈为正在打火。打火10s后， 停止打火，退点火枪。</li>
<li>Step4: 打火延时2s开A下1油角阀，反馈为A下1油角阀开到位。</li>
<li>Step5:A下1油角阀全开12s后，A下1火检有火，置位点火成功；A下1火检无火置位点火失败，关A下1油角阀，退A下1油枪，A下1吹扫顺控开始。 </li>
</ol>
</ul>
<h3><li><abbr title="B_10HLB10AN001">油枪吹扫顺控(油枪点火失败后自动进行吹扫顺控)</abbr></li></h3>
<ul>
<li>油枪吹扫顺控步骤</li>
<ol>
<li>Step1: 关A下1油角阀，反馈为A下1油角阀关到位。</li>
<li>Step2: 开A下1吹扫角阀，反馈为A下1吹扫角阀开到位，吹扫120s。</li>
<li>Step3: 关A下1吹扫角阀，反馈为A下1吹扫角阀关到位</li>
</ol>
</ul>
</ol>
<div id="oil_single"><h2><li>油层单体设备</li></h2></div>
<ol type="A" start="1">
<h3><li><abbr title="B_10ERB20AA004">燃油回油主管关断阀</abbr><a href="../../../../../my_data/image/first_boiler_img/B10ERB20AA004.png" target="_blank">Logic</a></li></h3>
<ul>
<li>联锁关：（以下条件均满足，回油主管关断阀联关）</li>
<ul>
<li><abbr title="NOT A_OIL_LEAK_CANCLEMFT.IO.Value">无油泄漏取消MFT信号（油泄漏取消MFT信号取反）脉冲10S</abbr></li>
</ul>
<li>联锁开：（以下条件均满足，回油主管关断阀联开）</li>
<ul>
<li><abbr title="B_10OFT_ACT">OFT动作</abbr></li>
</ul>
</ul>
<h3><li><abbr title="B_10ERB10AA009">燃油进油主管关断阀</abbr><a href="../../../../../my_data/image/first_boiler_img/B10ERB10AA009.png" target="_blank">Logic</a></li></h3>
<ul>
<li>开允许：（以下条件均满足，进油主管关断阀允许开）</li>
<ul>
<li><abbr title="B_10Oilvlv_A_Layer_CLS(B_10HJF62AA022.IO.Value/B_10HJF62AA024.IO.Value/B_10HJF62AA026.IO.Value/B_10HJF62AA028.IO.Value)">A下油层油角阀均关闭</abbr></li>
<li><abbr title="B_10Oilvlv_BC_Layer_CLS(B_10HJF62AA032.IO.Value/B_10HJF62AA034.IO.Value/B_10HJF62AA036.IO.Value/B_10HJF62AA038.IO.Value)">BC油层油角阀均关闭 </abbr></li>
<li><abbr title="B_10Oilvlv_MicroOil_Layer_CLS(B_10HJF61AA016.IO.Value/B_10HJF61AA018.IO.Value/B_10HJF61AA020.IO.Value/B_10HJF61AA022.IO.Value)">微油层油角阀均关闭 </abbr></li>
</ul>
<li>联锁关：（以下条件均满足，进油主管关断阀联关）</li>
<ul>
<li><abbr title="B_10OFT_ACT">OFT动作</abbr></li>
<li><abbr title="NOT A_OIL_LEAK_CANCLEMFT.IO.Value">无油泄漏取消MFT信号（油泄漏取消MFT信号取反）</abbr></li>
</ul>
</ul>
<h3><li><abbr title="B_10HHA10AV001">A下1油枪</abbr><a href="../../../../../my_data/image/first_boiler_img/B10HHA10AV001.png" target="_blank">Logic</a></li></h3>
<ul>
<li>退允许</li>
<ul>
<li><abbr title="B_10HJF62AA022.IO.FB0.Value">A下1油角阀全关</abbr></li>
</ul>
<li>联锁退（以下任一条件满足，A下1油枪联退）</li>
<ul>
<li><abbr title="NOT B_10HJF62AA022.IO.FB0.Value">A下1油角阀非关</abbr>，延时12s，且<abbr title="NOT B_10HHA10CB012.IO.Value">A下1油火检无火</abbr></li>
<li><abbr title="B_10OFT_ACT">OFT动作</abbr></li>
<li><abbr title="B_10MFT_ACT">MFT动作</abbr></li>
<li>*<abbr title="Oil_A1_IGNTSEQ_Fail">A1点火顺控失败</abbr></li>
<li>*<abbr title="Oil_A1_PurgeSEQ_Fail">A1吹扫顺控完成</abbr></li>
<li>*<abbr title="10HHA10AV001.IO.FB1.Value">当A下1油枪推进,脉冲3s,自动复位油枪跳闸</abbr></li>
</ul>
</ul>
<h3><li><abbr title="B_10HJA10AV001">A下1点火枪</abbr><a href="../../../../../my_data/image/first_boiler_img/B10HJA10AV001.png" target="_blank">Logic</a></li></h3>
<ul>
<li>联锁退：</li>
<ul>
<li><abbr title="Oilgun_A1_Trip">A1油枪跳闸条件存在</abbr></li>
</ul>
</ul>
<h3><li><abbr title="B_10HJY11FA001">A下1高能点火器</abbr></li></h3>
<ul>
<li>联锁退（以下任一条件满足，A下1点火激励联退）</li>
<ul>
<li><abbr title="Oilgun_A1_Trip">A1油枪跳闸条件存在</abbr></li>
<li><abbr title="B_10HJY11FA001.IO.Cmd.Value">A1点火激励指令发出</abbr>延时10s</li>
</ul>
</ul>
<h3><li><abbr title="B_10HJF62AA022">A下1油角阀</abbr><a href="../../../../../my_data/image/first_boiler_img/B10HJF62AA022.png" target="_blank">Logic</a></li></h3>
<ul>
<li>开允许：（以下条件均满足，A下1油角阀允许开）</li>
<ul>
<li><abbr title="B_10HHA10AV001.IO.FB1.Value">A下1油枪进到位</abbr></li>
<li><abbr title="B_10HJF62AA022.IO.FB0.Value">A下1油角阀关到位</abbr></li>
</ul>
<li>联锁关：</li>
<ul>
<li><abbr title="Oilgun_A1_Trip">A1油枪跳闸条件存在</abbr></li>
</ul>
</ul>
<h3><li><abbr title="B_10HJR62AA022">A下1吹扫阀</abbr><a href="../../../../../my_data/image/first_boiler_img/B10HJR62AA022.png" target="_blank">Logic</a></li></h3>
<ul>
<li>开允许：</li>
<ul>
<li><abbr title="B_10HJF62AA022.IO.FB0.Value">A下1油角阀关到位</abbr></li>
</ul>
<li>联锁关：（以下任一条件满足，A下1吹扫阀联关）</li>
<ul>
<li><abbr title="B_10MFT_ACT">MFT动作</abbr></li>
<li><abbr title="B_10OFT_ACT">OFT动作</abbr></li>
</ul>
</ul>
</ol>
<div id="micro_oil_shun"><h2><li>微油顺控</li></h2></div>
<ol type="A" start="1">
<h3><li><abbr title="B_10HLB10AN001">微油点火顺控</abbr></li></h3>
<ul>
<li>A微油#1角点火允许(以下条件全部满足)：<a href="../../../../../my_data/image/first_boiler_img/MicroOil_1_PMT.png" target="_blank">Logic</a></li>
<ul>
<li><abbr title="NOT B_10MFT_ACT">无MFT动作</abbr></li>
<li><abbr title="NOT B_10OFT_ACT">无OFT动作</abbr></li>
<li><abbr title="B_10Oil_in_Mainpipe_Press_OK(0.9<B_10ERB10CP101.IO.Value<3.5">燃油母管压力正常，即锅炉燃油进油主管压力>0.9MPa且< 3.5MPa</abbr></li>
<li><abbr title="B_10Oil_in_VIV_Open(B_10ERB10AV009.IO.FB1.Value)">油母管进油快关阀开到位</abbr></li>
<li><abbr title="B_10Oil_back__VIV_Open(B_10ERB10AV004.IO.FB1.Value)">油母管回油快关阀开到位</abbr></li>
<li><abbr title="B_10HJF61AA016.IO.FB0.Value/B_10HJX62AA013.IO.FB0.Value/B_10HJX62AA015.IO.FB0.Value，NOT B_10HJY21FA001.IO.FB1.Value">A1设备在初始状态(油角阀、雾化阀、吹扫阀关到位,点火枪未打火)</abbr></li>
<li><abbr title="NOT B_10HHA61CB001.IO.Value">A1火检无火</abbr></li>
<li><abbr title="B_10CoolingFan_OutPress_GT3(B_10HLS30CP101.IO.Value>3)">火检冷却风机出口风压>3KPa</abbr></li>
<li><abbr title="B_10HJY21FU001.IO.Value">A微油1点火柜在远方状态</abbr></li>
</ul>

<li>满足投运条件时，可以启动微油点火顺控</li>
关吹扫阀－>点火枪打火（20s后退点火枪）－>开油角阀－>开雾化阀
以上步骤结束后，检测到有火信号，5s后，启动结束；若无火则点火失败，5s后，点火失败，转而运行吹扫顺控
</ul>
<h3><li><abbr title="B_10HLB10AN001">微油吹扫顺控</abbr></li></h3>
关油角阀－>关雾化阀－>开吹扫阀，保持120s－>关吹扫阀－>吹扫完成
</ol>
<div id="micro_oil_sigle"><h2><li>微油单体设备</li></h2></div>
<ol type="A" start="1">
<h3><li><abbr title="B_10HJF61AA016">微油油角阀</abbr><a href="../../../../../my_data/image/first_boiler_img/B10HJF61AA016.png" target="_blank">Logic</a></li></h3>
<ul>
<li>联锁关(以下任一条件满足)：</li>
<ul>
<li><abbr title="MicroOil_1_TRIP">存在微油油角阀跳闸条件(以下任一条件满足)</abbr><a href="../../../../../my_data/image/first_boiler_img/B10HJF61AA016_TRIP.png" target="_blank">Logic</a></li>
<ul>
<li><abbr title="B_10MFT_ACT">MFT动作</abbr></li>
<li><abbr title="B_10OFT_ACT">OFT动作</abbr></li>
<li><abbr title="NOT B_10HJF61AA016.IO.FB0.Value">A微油1油角阀非关</abbr>,延时20s后，<abbr title="NOT MicroOil_1_CheckFire(B_10HHA61CB001.IO.Value)">A1微油火检无火</abbr></li>
<li><abbr title="NOT B_10HJF61AA016.IO.FB0.Value">A微油1油角阀非关</abbr>,延时8s后，<abbr title="B_10CoolingFan_Press_LL_COMM(B_10HLS30CP001.IO.Value/B_10HLS30CP002.IO.Value/B_10HLS30CP003.IO.Value/B_10HLS30CP004.IO.Value，四取三)">火检冷却风机出口母管风压低低</abbr></li>
</ul>
</ul>
</ul>
<h3><li><abbr title="B_10HJX62AA013">微油雾化阀</abbr><a href="../../../../../my_data/image/first_boiler_img/B10HJX62AA013.png" target="_blank">Logic</a></li></h3>
<ul>
<li>联锁关：（任一条件满足，微油雾化阀联关）</li>
<ul>
<li><abbr title="MicroOil_1_TRIP">存在微油油角阀跳闸条件</abbr></li>
<li><abbr title="B_10HJX62CP101_LT(B_10HJX62CP101.IO.Value<0.5)">锅炉燃油仪用压缩空气压力<0.5MPa</abbr><a href="../../../../../my_data/image/first_boiler_img/10HJX62CP101_LT.png" target="_blank">Logic</a></li>
</ul>
</ul>
<h3><li><abbr title="B_10HJX62AA015">微油吹扫阀</abbr><a href="../../../../../my_data/image/first_boiler_img/B10HJX62AA015.png" target="_blank">Logic</a></li></h3>
<ul>
<li>跳闸条件：</li>
<ul>
<li><abbr title="MicroOil_1_TRIP">存在微油油角阀跳闸条件</abbr></li>
</ul>
</ul>
<h3><li><abbr title="B_10HJY21FA001">微油点火激励</abbr><a href="../../../../../my_data/image/first_boiler_img/B10HJY21FA001.png" target="_blank">Logic</a></li></h3>
<ul>
<li>跳闸条件：</li>
<ul>
<li><abbr title="MicroOil_1_TRIP">存在微油油角阀跳闸条件</abbr></li>
</ul>
</ul>
<h3><li><abbr title="B_10HJF72AA016">风道加热器油角阀</abbr><a href="../../../../../my_data/image/first_boiler_img/B10HJF72AA016.png" target="_blank">Logic</a></li></h3>
<ul>
<li>联锁关(以下任一条件满足，风道加热器油角阀联关)</li>
<ul>
<li><abbr title="B_10DHTRIP">风道加热器油角阀存在跳闸条件（任一条件满足)</abbr></li>
<ul>
<li><abbr title="B_10MFT_ACT">MFT</abbr></li>
<li><abbr title="B_10OFT_ACT">OFT</abbr></li>
<li><abbr title="NOT B_10HJF72AA016.IO.FB0.Value">风道加热器油角阀非关</abbr>，延时10s，且<abbr title="NOT B10DH_CheckFire(B_10HHA61CB005.IO.Value)">风道加热器火检无火</abbr></li>
</ul>
</ul>
</ul>
<h3><li><abbr title="B_10HJX72AA013">风道加热器雾化阀</abbr><a href="../../../../../my_data/image/first_boiler_img/B10HJX72AA013.png" target="_blank">Logic</a></li></h3>
<ul>
<li>联锁关(以下任一条件满足，风道加热器雾化阀联关)</li>
<ul>
<li><abbr title="B_10DHTRIP">风道加热器油角阀存在跳闸条件（任一条件满足)</abbr></li>
<ul>
<li><abbr title="B_10MFT_ACT">MFT</abbr></li>
<li><abbr title="B_10OFT_ACT">OFT</abbr></li>
<li><abbr title="NOT B_10HJF72AA016.IO.FB0.Value">风道加热器油角阀非关</abbr>，延时10s，且<abbr title="NOT B10DH_CheckFire(B_10HHA61CB005.IO.Value)">风道加热器火检无火</abbr></li>
</ul>
<li><abbr title="B_10HJX62CP101_LT(B_10HJX62CP101.IO.Value<0.5)">锅炉燃油仪用压缩空气压力<0.5MPa</abbr><a href="../../../../../my_data/image/first_boiler_img/10HJX62CP101_LT.png" target="_blank">Logic</a></li>
</ul>
</ul>
<h3><li><abbr title="B_10HJX72AA015">风道加热器吹扫阀</abbr><a href="../../../../../my_data/image/first_boiler_img/B10HJX72AA015.png" target="_blank">Logic</a></li></h3>
<ul>
<li>开允许：</li>
<ul>
<li><abbr title="B_10HJF72AA016.IO.FB0.Value">风道加热器油角阀全关</abbr></li>
</ul>
<li>联锁关（任一条件满足，风道加热器吹扫阀联关）</li>
<ul>
<li><abbr title="B_10DHTRIP">风道加热器油角阀存在跳闸条件（任一条件满足)</abbr></li>
<ul>
<li><abbr title="B_10MFT_ACT">MFT</abbr></li>
<li><abbr title="B_10OFT_ACT">OFT</abbr></li>
<li><abbr title="NOT B_10HJF72AA016.IO.FB0.Value">风道加热器油角阀非关</abbr>，延时10s，且<abbr title="NOT B10DH_CheckFire(B_10HHA61CB005.IO.Value)">风道加热器火检无火</abbr></li>
</ul>
</ul>
</ul>
<h3><li><abbr title="B_10HJY25FA001">风道加热器点火激励</abbr><a href="../../../../../my_data/image/first_boiler_img/B10HJY25FA001.png" target="_blank">Logic</a></li></h3>
<ul>
<li>联锁关（任一条件满足，风道加热器点火激励联关）</li>
<ul>
<li><abbr title="B_10DHTRIP">风道加热器油角阀存在跳闸条件（任一条件满足)</abbr></li>
<ul>
<li><abbr title="B_10MFT_ACT">MFT</abbr></li>
<li><abbr title="B_10OFT_ACT">OFT</abbr></li>
<li><abbr title="NOT B_10HJF72AA016.IO.FB0.Value">风道加热器油角阀非关</abbr>，延时10s，且<abbr title="NOT B10DH_CheckFire(B_10HHA61CB005.IO.Value)">风道加热器火检无火</abbr></li>
</ul>
<li><abbr title="B_10HJY25FA001.IO.Cmd.Value">风道加热器点火激励打火</abbr>延时10s</li>
</ul>
</ul>
</ol>
<hr>
<div id="Lift"><h1 align="center">除渣系统</h1><a href="#top">顶部</a></div>
<hr>
<ol type="1" start="1">
<div id=""><h2><li>除渣系统</li></h2></div>
<hr>
<ol type="A" start="1">
<h3><li><abbr title="B_10HSG10AN001">斗提机A</abbr><a href="../../../../../my_data/image/first_boiler_img/B10HSG10AN001.png" target="_blank">Logic</a></li></h3>
<ul>
<li>允许启动：</li>
<ul>
<li><abbr title="B_10HSG10AA003.IO.FB1.Value">稀释风机A出口门已开</abbr></li>
</ul>
<li>联锁停止：</li>
<ul>
<li><abbr title="B_10HSG10AA003.IO.FB0.Value">稀释风机A出口门已关</abbr></li>
</ul>
</ul>
</ol>
</ol>
<div id="drum"><h1 align="center">汽水系统</h1><a href="#top">顶部</a></div>
<hr>
<ol type="1" start="1">
<div id=""><h2><li>汽水系统</li></h2></div>
<hr>
<ol type="A" start="1">
<h3><li><abbr title="B_10HAD10AA0003">锅炉紧急放水电动一次阀</abbr></li></h3>
<ul>
<li>自动开：</li>
<ul>
<li><abbr title="Emerg_Drain_Interlock_In">·一次电动阀在自动模式下，紧急放水电动一次阀联锁投入</abbr>，<abbr title="10HAD10CL101/102/103_CALC，三取二">汽包水位>200mm</abbr></li>
</ul>
<li>自动关：</li>
<ul>
<li><abbr title="">·一次电动阀在自动模式下，紧急放水电动一次阀联锁投入（Emerg_Drain_Interlock_In），汽包水位（10HAD10CL101/102/103_CALC）<50mm，三取二</abbr></li>
</ul>
</ul>
<h3><li><abbr title="B_10HAD10AA0002">锅炉紧急放水电动二次阀</abbr></li></h3>
<ul>
<li>联锁开：</li>
<ul>
<li><abbr title="Emerg_Drain_Interlock_In">·紧急放水电动二次阀联锁投入</abbr>，<abbr title="10HAD10CL101/102/103_CALC，三取二">汽包水位>200mm</abbr></li>
</ul>
<li>联锁关：</li>
<ul>
<li><abbr title="Emerg_Drain_Interlock_In">紧急放水电动二次阀联锁投入</abbr>，<abbr title="10HAD10CL101/102/103_CALC">汽包水位<50mm</abbr></li>
</ul>
</ul>
<h3><li><abbr title="B_10HAD10AA0002">锅炉PCV阀</abbr></li></h3>
<ul>
<li>联锁开：<a href="../../../../../my_data/image/first_boiler_img/B_10MainStreamPress.png" target="_blank">Logic</a></li>
<ul>
<li><abbr title="B_10HAH70CP101.IO.Value/102.IO.Value/103.IO.Value>10.1MPa,三取二">·主蒸汽压力高</abbr></li>
</ul>
<li>联锁关：</li>
<ul>
<li><abbr title="B_10HAH70CP101.IO.Value/102.IO.Value/103.IO.Value<9.9MPa,三取二">·主蒸汽压力低</abbr></li>
</ul>
</ul>
<h3><li><abbr title="B_10LAE70AA001">减温水母管电动阀</abbr></li></h3>
<ul>
<li>联锁关：</li>
<ul>
<li>MFT动作B_10MFT_ACT</li>
</ul>
</ul>
<h3><li><abbr title="B_10LAE70AA003/004">一级减温器1/2减温水电动阀</abbr></li></h3>
<ul>
<li>联锁关：</li>
<ul>
<li>MFT动作B_10MFT_ACT</li>
</ul>
</ul>
<h3><li><abbr title="B_10LAE70AA006/008">二级减温器1/2减温水电动阀</abbr></li></h3>
<ul>
<li>联锁关：</li>
<ul>
<li>MFT动作B_10MFT_ACT</li>
</ul>
</ul>
<h3><li><abbr title="B_10HLC41AP501">暖风器疏水泵A</abbr><a href="../../../../../my_data/image/first_boiler_img/B10HLC41AP501.png" target="_blank">Logic</a></li></h3>
<ul>
<li>联锁启：</li>
<ul>
<li><abbr title="B10HLC41AP501_BACK">连锁投入</abbr>且<abbr title="B_10HLC10CL101_COMM">暖风器液位</abbr>大于800mm</li>
</ul>
<li>联锁停：</li>
<ul>
<li><abbr title="B10HLC41AP501_BACK">连锁投入</abbr>且<abbr title="B_10HLC10CL101_COMM">暖风器液位</abbr>小于300mm</li>
</ul>
</ul>
<h3><li><abbr title="B_10HLC41AA002">暖风器疏水泵A出口电动阀</abbr></li></h3>
<ul>
<li>联锁开：</li>
<ul>
<li><abbr title="B_10HLC41AP501.IO.FB1.Value">暖风器疏水泵A运行</abbr></li>
</ul>
<li>联锁关：</li>
<ul>
<li><abbr title="B_10HLC41AP501.IO.FB0.Value">暖风器疏水泵A停止</abbr>且<abbr title="B_10HLC43CP101_COMM">暖风器疏水泵出口压力</abbr>小于<abbr title="B_10CP_SP">设定值</abbr></li>
</ul>
</ul>
<hr>
1.给水副调节进口电动阀	   10LAB70AA001
手动开、关（无联锁保护）
2.给水副调节出口电动阀    10LAB70AA002
手动开、关（无联锁保护）
3.给水主调节进口电动阀	   10LAB70AA003
手动开、关（无联锁保护）
4.给水主调节出口电动阀	   10LAB70AA004
手动开、关（无联锁保护）
5.省煤器进口电动阀    10LAB70AA707
手动开、关（无联锁保护）
6.锅炉连续排污电动阀    10HAD10AA001/006(#4炉无此电动门)
手动开、关（无联锁保护）
9.集汽集箱向空排汽电动一次阀    10HAH70AA004   
手动开、关（无联锁保护）
10. 集汽集箱向空排汽电动二次阀    10HAH70AA005
手动开、关（无联锁保护）（中停门）
主蒸汽出口旁路电动一次阀    10HAH70AA001（#4炉为40HAH70AA002）
手动开、关（无联锁保护）
12.主蒸汽出口旁路电动二次阀    10HAH70AA002（#4炉为40HAH70AA003）
手动开、关（无联锁保护）
13.主蒸汽出口电动阀	    10HAH70AA003（#4炉为40HAH70AA001）
手动开、关（无联锁保护）
14.锅炉出口至主蒸汽母管隔离电动阀    10LBA10AA002
手动开、关（无联锁保护）（4号炉已改为中停门）
15.省煤器再循环电动阀    10HAD10AA004（#4炉为40HAD10AA005）

手动开、关（无联锁保护）
19.侧水冷壁下集箱疏水电动阀    10HAD10AA012/014/016/018/027/029/031/033 （#4炉为40HAD10AA029/35/37/39/45/10/17/19/21/27)                                      
   前水冷壁下集箱疏水电动阀    10HAD10AA036/038/039/041（#4炉为40HAD10AA033/31/12/14)     
   后水冷壁下集箱疏水电动阀    10HAD10AA019/021/024/026（#4炉为40HAD10AA041/43/25/23)
手动开、关（无联锁保护）
20.疏水至定排电动阀	    10HAD10AA008/010(#4炉无此门)
手动开、关（无联锁保护）
21.邻炉加热蒸汽电动阀    10LBH70AA002/003
手动开、关（无联锁保护）
19.锅炉给水进口电动阀    10LAB70AA008（#4炉为40LAB70AA006)

手动开、关（无联锁保护）
23.暖风器疏水泵再循环电动阀    10HLC41AA003/42AA003
手动开、关（无联锁保护）
<hr>
<div id="SRC"><h1 align="center">脱硝系统</h1><a href="#top">顶部</a></div>
<hr>
<ol type="1" start="1">
<div id=""><h2><li>脱硝系统</li></h2></div>
<hr>
<ol type="A" start="1">
<h3><li><abbr title="B_10HSG10AN001">稀释风机A</abbr><a href="../../../../../my_data/image/first_boiler_img/B10HSG10AN001.png" target="_blank">Logic</a></li></h3>
<ul>
<li>允许启动：</li>
<ul>
<li><abbr title="B_10HSG10AA003.IO.FB1.Value">稀释风机A出口门已开</abbr></li>
</ul>
<li>联锁停止：</li>
<ul>
<li><abbr title="B_10HSG10AA003.IO.FB0.Value">稀释风机A出口门已关</abbr></li>
</ul>
</ul>
<h3><li><abbr title="B_10HSJ10AA102AO">脱硝进氨气调节门</abbr><a href="../../../../../my_data/image/first_boiler_img/B10HSJ10AA102AO.png" target="_blank">Logic</a></li></h3>
<ul>
<li>联锁关闭：</li>
<ul>
<li><abbr title="B_10_NH3_MAINPIPE_VLV_TRIP">关闭进氨气调节门（任一条件满足)</abbr><a href="../../../../../my_data/image/first_boiler_img/B_10_NH3_MAINPIPE_VLV_TRIP.png" target="_blank">Logic</a></li>
<ul>
<li><abbr title="B_10MFT_ACT">MFT动作</abbr></li>
<li><abbr title="B_10HSA10CT601.IO.Value 小于300/B_10HSA10CT602.IO.Value 小于300/B_10HSA10CT603.IO.Value 小于300,三取二">脱硝反应器温度小于300</abbr>延时600s</li>
<li><abbr title="NOT B_10HSG10AN001.IO.FB1.Value/NOT B_10HSG10AN002.IO.FB1.Value">稀释风机全停</abbr></li>
<li><abbr title="NH3_O2_RATIO">氨空比</abbr>大于10</li>
<li><abbr title="NOT B_10HSG10AA003.IO.FB1.Value/NOT B_10HSG10AA004.IO.FB1.Value">稀释风机出口门全关</abbr></li>
</ul>
</ul>
</ul>
</ol>
</ol>
<hr>
<div id="FGD"><h1 align="center">脱硫系统</h1><a href="#top">顶部</a></div>
<hr>
<ol type="1" start="1">
<div id=""><h2><li>脱硫系统</li></h2></div>
<hr>
<ol type="A" start="1">
<h3><li><abbr title="B_10HAD10AA0003">二级循环泵</abbr></li></h3>
</ol>
</ol>
<hr>

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
