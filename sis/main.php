<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="mystyle.css">
<style>
.footer {
  padding: 20px;
  text-align: center;
  background: #ddd;
  margin-top: 20px;
}
.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 6px 20px;
  text-align: center;
  text-decoration: none;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
  background-color: white; 
  color: black; 
  border: 2px solid #4CAF50;
  border-radius:12px;
}

.button1 {
  display: inline-block;
}

.button:hover {
  background-color: #4CAF50;
  color: white;
}
.flex-container {
  display: flex;
  flex-wrap: nowrap;
  background-color: DodgerBlue;
}

.flex-container .box {
  background-color: #f1f1f1;
  width: 20%;
  margin: 1px;
  text-align: center;
  line-height: 45px;
  font-size: 20px;
}
.flex-container .box1 {
  background-color: #f1f1f1;
  width: 10%;
  margin: 1px;
  text-align: center;
  line-height: 45px;
  font-size: 20px;
}
</style>
</head>
<body>

<center><h1>总画面</h1></center>
<div class="flex-container">
  <div class="box">
<p>1号锅炉</p>
<button class="button button1" onclick='location.href=("Boiler1/qishui.php")'>汽水</button>
<button class="button button1" onclick='location.href=("Boiler1/biwen.php")'>壁温</button>
<br>
<button class="button button1" onclick='location.href=("Boiler1/zhifen.php")'>制粉</button>
<button class="button button1" onclick='location.href=("Boiler1/fengyan.php")'>风烟</button>
<br>
<button class="button button1" onclick='location.href=("Boiler1/AMill.php")'>A磨</button>
<button class="button button1" onclick='location.href=("Boiler1/BMill.php")'>B磨</button>
<br>
<button class="button button1" onclick='location.href=("Boiler1/CMill.php")'>C磨</button>
<button class="button button1" onclick='location.href=("Boiler1/DMill.php")'>D磨</button>
<br>
<button class="button button1" onclick='location.href=("Boiler1/FDF.php")'>送风机</button>
<button class="button button1" onclick='location.href=("Boiler1/IDF.php")'>引风机</button>
<br>
<button class="button button1" onclick='location.href=("Boiler1/PDF.php")'>一次风机</button>
<button class="button button1" onclick='location.href=("Boiler1/APH.php")'>空预器</button>
<br>
<button class="button button1" onclick='location.href=("Boiler1/SAF.php")'>密封风</button>
<button class="button button1" onclick='location.href=("Boiler1/SAD.php")'>二次风门</button>
<br>
<button class="button button1" onclick='location.href=("Boiler1/SCR.php")'>脱硝</button>
<button class="button button1" onclick='location.href=("Boiler1/BD.php")'>疏水</button>
<br>
<button class="button button1" onclick='location.href=("Boiler1/SCR.php")'>MCS</button>
<button class="button button1" onclick='location.href=("Boiler1/FSSS.php")'>FSSS</button>
<br>
<button class="button button1" onclick='location.href=("Boiler1/Oil.php")'>燃油</button>
<button class="button button1" onclick='location.href=("Boiler1/BD.php")'>暖风疏水</button>
<br>
<button class="button button1" onclick='location.href=("Boiler1/Boiler.php")'>本体</button>
<button class="button button1" onclick='location.href=("Boiler1/FF.php")'>除尘</button>
<br>
<button class="button button1">黑色</button>
<button class="button button1">黑色</button>
</div>
  <div class="box">
<p>2号锅炉</p>
<button class="button button1" onclick='location.href=("Boiler2/qishui.php")'>汽水</button>
<button class="button button1" onclick='location.href=("Boiler2/biwen.php")'>壁温</button>
<br>
<button class="button button1" onclick='location.href=("Boiler2/zhifen.php")'>制粉</button>
<button class="button button1" onclick='location.href=("Boiler2/fengyan.php")'>风烟</button>
<br>
<button class="button button1" onclick='location.href=("Boiler2/AMill.php")'>A磨</button>
<button class="button button1" onclick='location.href=("Boiler2/BMill.php")'>B磨</button>
<br>
<button class="button button1" onclick='location.href=("Boiler2/CMill.php")'>C磨</button>
<button class="button button1" onclick='location.href=("Boiler2/DMill.php")'>D磨</button>
<br>
<button class="button button1" onclick='location.href=("Boiler2/FDF.php")'>送风机</button>
<button class="button button1" onclick='location.href=("Boiler2/IDF.php")'>引风机</button>
<br>
<button class="button button1" onclick='location.href=("Boiler2/PDF.php")'>一次风机</button>
<button class="button button1" onclick='location.href=("Boiler2/APH.php")'>空预器</button>
<br>
<button class="button button1" onclick='location.href=("Boiler2/SAF.php")'>密封风</button>
<button class="button button1" onclick='location.href=("Boiler2/SAD.php")'>二次风门</button>
<br>
<button class="button button1" onclick='location.href=("Boiler2/SCR.php")'>脱硝</button>
<button class="button button1" onclick='location.href=("Boiler2/BD.php")'>疏水</button>
<br>
<button class="button button1" onclick='location.href=("Boiler2/SCR.php")'>MCS</button>
<button class="button button1" onclick='location.href=("Boiler2/FSSS.php")'>FSSS</button>
<br>
<button class="button button1" onclick='location.href=("Boiler2/Oil.php")'>燃油</button>
<button class="button button1" onclick='location.href=("Boiler2/BD.php")'>暖风疏水</button>
<br>
<button class="button button1" onclick='location.href=("Boiler2/Boiler.php")'>本体</button>
<button class="button button1" onclick='location.href=("Boiler2/FF.php")'>除尘</button>
</div>
  <div class="box">
<p>3号锅炉</p>
<button class="button button1" onclick='location.href=("Boiler3/qishui.php")'>汽水</button>
<button class="button button1" onclick='location.href=("Boiler3/biwen.php")'>壁温</button>
<br>
<button class="button button1" onclick='location.href=("Boiler3/zhifen.php")'>制粉</button>
<button class="button button1" onclick='location.href=("Boiler3/fengyan.php")'>风烟</button>
<br>
<button class="button button1" onclick='location.href=("Boiler3/AMill.php")'>A磨</button>
<button class="button button1" onclick='location.href=("Boiler3/BMill.php")'>B磨</button>
<br>
<button class="button button1" onclick='location.href=("Boiler3/CMill.php")'>C磨</button>
<button class="button button1" onclick='location.href=("Boiler3/DMill.php")'>D磨</button>
<br>
<button class="button button1" onclick='location.href=("Boiler3/FDF.php")'>送风机</button>
<button class="button button1" onclick='location.href=("Boiler3/IDF.php")'>引风机</button>
<br>
<button class="button button1" onclick='location.href=("Boiler3/PDF.php")'>一次风机</button>
<button class="button button1" onclick='location.href=("Boiler3/APH.php")'>空预器</button>
<br>
<button class="button button1" onclick='location.href=("Boiler3/SAF.php")'>密封风</button>
<button class="button button1" onclick='location.href=("Boiler3/SAD.php")'>二次风门</button>
<br>
<button class="button button1" onclick='location.href=("Boiler3/SCR.php")'>脱硝</button>
<button class="button button1" onclick='location.href=("Boiler3/BD.php")'>疏水</button>
<br>
<button class="button button1" onclick='location.href=("Boiler3/SCR.php")'>MCS</button>
<button class="button button1" onclick='location.href=("Boiler3/FSSS.php")'>FSSS</button>
<br>
<button class="button button1" onclick='location.href=("Boiler3/Oil.php")'>燃油</button>
<button class="button button1" onclick='location.href=("Boiler3/BD.php")'>暖风疏水</button>
<br>
<button class="button button1" onclick='location.href=("Boiler3/Boiler.php")'>本体</button>
<button class="button button1" onclick='location.href=("Boiler3/FF.php")'>除尘</button>
</div>
  <div class="box">
<p>4号锅炉</p>
<button class="button button1" onclick='location.href=("Boiler4/qishui.php")'>汽水</button>
<button class="button button1" onclick='location.href=("Boiler4/biwen.php")'>壁温</button>
<br>
<button class="button button1" onclick='location.href=("Boiler4/zhifen.php")'>制粉</button>
<button class="button button1" onclick='location.href=("Boiler4/fengyan.php")'>风烟</button>
<br>
<button class="button button1" onclick='location.href=("Boiler4/AMill.php")'>A磨</button>
<button class="button button1" onclick='location.href=("Boiler4/BMill.php")'>B磨</button>
<br>
<button class="button button1" onclick='location.href=("Boiler4/CMill.php")'>C磨</button>
<button class="button button1" onclick='location.href=("Boiler4/DMill.php")'>D磨</button>
<br>
<button class="button button1" onclick='location.href=("Boiler4/FDF.php")'>送风机</button>
<button class="button button1" onclick='location.href=("Boiler4/IDF.php")'>引风机</button>
<br>
<button class="button button1" onclick='location.href=("Boiler4/PDF.php")'>一次风机</button>
<button class="button button1" onclick='location.href=("Boiler4/APH.php")'>空预器</button>
<br>
<button class="button button1" onclick='location.href=("Boiler4/SAF.php")'>密封风</button>
<button class="button button1" onclick='location.href=("Boiler4/SAD.php")'>二次风门</button>
<br>
<button class="button button1" onclick='location.href=("Boiler4/SCR.php")'>脱硝</button>
<button class="button button1" onclick='location.href=("Boiler4/BD.php")'>疏水</button>
<br>
<button class="button button1" onclick='location.href=("Boiler4/SCR.php")'>MCS</button>
<button class="button button1" onclick='location.href=("Boiler4/FSSS.php")'>FSSS</button>
<br>
<button class="button button1" onclick='location.href=("Boiler4/Oil.php")'>燃油</button>
<button class="button button1" onclick='location.href=("Boiler4/BD.php")'>暖风疏水</button>
<br>
<button class="button button1" onclick='location.href=("Boiler4/Boiler.php")'>本体</button>
<button class="button button1" onclick='location.href=("Boiler4/FF.php")'>除尘</button>
</div>
  <div class="box1">
<p>辅系统</p>
<button class="button button1" onclick='location.href=("Auxiliary/qishuiquyang.php")'>汽水取样</button>
<button class="button button1" onclick='location.href=("Auxiliary/BAHS12.php")'>1-2除渣</button>
<button class="button button1" onclick='location.href=("Auxiliary/BAHS34.php")'>3-4除渣</button>
<button class="button button1" onclick='location.href=("Auxiliary/PCS.php")'>气力输灰</button>
<button class="button button1" onclick='location.href=("Auxiliary/GS.php")'>燃气系统</button>
<button class="button button1" onclick='location.href=("Auxiliary/N2.php")'>氮气系统</button>
<button class="button button1" onclick='location.href=("Auxiliary/CCW.php")'>冷却水</button>
</div>
  <div class="box1">
<p>公用</p>
<button class="button button1" onclick='location.href=("Public/gaoyazhengqi.php")'>高压蒸汽</button>
<br>
<button class="button button1" onclick='location.href=("Public/cigaoyazhengqi.php")'>次高压蒸汽</button>
<br>
<button class="button button1" onclick='location.href=("Public/zhongyazhengqi.php")'>中压蒸汽</button>
<br>
<button class="button button1" onclick='location.href=("Public/diyazhengqi.php")'>低压蒸汽</button>
<br>
<button class="button button1" onclick='location.href=("Public/didiyazhengqi.php")'>低低压蒸汽</button>
<br>
<button class="button button1" onclick='location.href=("Public/chuyangqi.php")'>除氧器</button>
<br>
<button class="button button1" onclick='location.href=("Public/gaojia.php")'>高加</button>
<br>
<button class="button button1" onclick='location.href=("Public/1dianbeng.php")'>1号电泵</button>
<br>
<button class="button button1" onclick='location.href=("Public/2dianbeng.php")'>2号电泵</button>
<br>
<button class="button button1" onclick='location.href=("Public/3dianbeng.php")'>3号电泵</button>
<br>
<button class="button button1" onclick='location.href=("Public/4dianbeng.php")'>4号电泵</button>
<br>
<button class="button button1" onclick='location.href=("Public/4dianbeng.php")'>疏水系统</button>
<br>
<button class="button button1" onclick='location.href=("Public/changquliuliangcanshu.php")'>厂区流量参数</button>
</div>
  <div class="box1">
<p>汽轮机</p>
<button class="button button1" onclick='location.href=("Turbine1/reli.php")'>1号汽轮机</button>
<button class="button button1" onclick='location.href=("Turbine2/reli.php")'>2号汽轮机</button>
<button class="button button1" onclick='location.href=("Turbine3/reli.php")'>3号汽轮机</button>
<button class="button button1" onclick='location.href=("Turbine4/reli.php")'>4号汽轮机</button>
<button class="button button1" onclick='location.href=("Turbine5/reli.php")'>5号汽轮机</button>
<p>系统工具</p>
<button class="button button1" onclick='location.href=("../taizhang/taizhang.php")'>设备台账</button>
<button class="button button1" onclick='location.href=("System/SystemStatus.php")'>系统状态</button>
<button class="button button1" onclick='location.href=("System/HBD.php")'>热平衡图</button>
</div>
  <div class="box1">
<p>脱硫</p>
<button class="button button1" onclick='location.href=("FGD/CEMS.php")'>环保</button>
<button class="button button1" onclick='location.href=("FGD/FGD1.php")'>1号脱硫</button>
<br>
<button class="button button1">红色</button>
<br>
<button class="button button1">红色</button>
<br>
<button class="button button1">红色</button>
<br>
<button class="button button1">红色</button>
<br>
<button class="button button1">红色</button>
<br>
<button class="button button1">红色</button>
</div>
</div>


		<div class="footer">

<?php
	include("../lib/phpqrcode/qrlib.php");
echo "扫一扫下方二维码登录SIS系统";
	$text = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];
	echo "<center><img src='../lib/QRPager.php?id=".$text."'></img></center>";
?>
		</div>
</body>
</html>
