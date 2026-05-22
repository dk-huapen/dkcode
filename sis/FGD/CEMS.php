<html>
	<head>
		<?php include("../header.php")?>
	</head>
	<body>
		<?php include("top.php")?>
		<center><h1>脱硫烟气CEMS数据</h1></center>
		<script>
page = 400;
			var test =<?php
			include('../conn.php');
			$sql="SELECT kks,name,value,unit,updatetime,HH,H,HHH,L,LL,LLL,flag,angle,indexID,X,Y FROM sis where page=400 union SELECT kks,name,value,unit,updatetime,HH,H,HHH,L,LL,LLL,flag,angle1,indexID,X1,Y1 FROM sis where page1=400 union SELECT kks,name,value,unit,updatetime,HH,H,HHH,L,LL,LLL,flag,angle2,indexID,X2,Y2 FROM sis where page2=400";
			$result = mysqli_query($con,$sql);
			$pointArray = array();

			$str = "{";
				while($row = mysqli_fetch_assoc($result)){
					$str = $str. "_".$row['kks'].":{name:'".$row['name']."',HH:'".$row['HH']."',H:'".$row['H']."',HHH:'".$row['HHH']."',L:'".$row['L']."',LL:'".$row['LL']."',LLL:'".$row['LLL']."',updatetime:'".$row['updatetime']."',unit:'".$row['unit']."',value:".$row['value'].",flag:".$row['flag']."},";
					$pointArray[$row['kks']] = array($row['indexID'],$row['name'],$row['X'],$row['Y'],$row['flag']);

				}
				$strre = chop($str,",");
			$strre = $strre."}";

			echo $strre;

			mysqli_close($con);
	
			?>;
		</script>
	<!--SIS画面-->
		<svg width="1860" height="1000" viewBox="0 0 1680 1000" fill="gray">
<line x1="160" y1="2" x2="1450" y2="2" stroke="purple" stroke-width="2"/>
<text x="410" y="20" font-size="16" fill="black">1号脱硫塔</text>
<text x="710" y="20" font-size="16" fill="black">2号脱硫塔</text>
<text x="1010" y="20" font-size="16" fill="black">3号脱硫塔</text>
<text x="1310" y="20" font-size="16" fill="black">4号脱硫塔</text>
<line x1="160" y1="30" x2="1450" y2="30" stroke="purple" stroke-width="2"/>
<line x1="160" y1="2" x2="160" y2="930" stroke="purple" stroke-width="2"/>
<line x1="1450" y1="2" x2="1450" y2="930" stroke="purple" stroke-width="2"/>
<text x="250" y="80" font-size="16" fill="black">
<tspan x="220" y="50">原</tspan>
<tspan x="220" y="80">烟</tspan>
<tspan x="220" y="110">气</tspan>
</text>
<line x1="260" y1="30" x2="260" y2="690" stroke="purple" stroke-width="2"/>
<text x="270" y="50" font-size="18" fill="black">SO2干基值</text>
<text x="270" y="80" font-size="18" fill="black">SO2折算值</text>
<text x="270" y="110" font-size="18" fill="black">氧含量</text>
<line x1="160" y1="120" x2="1450" y2="120" stroke="purple" stroke-width="2"/>
<line x1="205" y1="120" x2="205" y2="930" stroke="purple" stroke-width="2"/>
<text x="170" y="80" font-size="16" fill="black">
<tspan x="170" y="180">净</tspan>
<tspan x="170" y="380">烟</tspan>
<tspan x="170" y="580">气</tspan>
</text>
<text x="215" y="140" font-size="16" fill="black">SO2
<tspan x="220" y="170">二</tspan>
<tspan x="220" y="200">氧</tspan>
<tspan x="220" y="230">化</tspan>
<tspan x="220" y="260">硫</tspan>
</text>
<text x="270" y="140" font-size="18" fill="black">干基值</text>
<text x="270" y="170" font-size="18" fill="black">折算值<?php echo "&#9733";?></text>
<text x="270" y="200" font-size="18" fill="black">平均值</text>
<text x="270" y="230" font-size="18" fill="black">剩余时间</text>
<text x="270" y="260" font-size="18" fill="black">理论值</text>
<line x1="205" y1="270" x2="1450" y2="270" stroke="purple" stroke-width="2"/>
<text x="215" y="290" font-size="16" fill="black">NOx
<tspan x="220" y="320">氮</tspan>
<tspan x="220" y="350">氧</tspan>
<tspan x="220" y="380">化</tspan>
<tspan x="220" y="410">物</tspan>
</text>
<text x="270" y="290" font-size="18" fill="black">干基值</text>
<text x="270" y="320" font-size="18" fill="black">折算值<?php echo "&#9733";?></text>
<text x="270" y="350" font-size="18" fill="black">平均值</text>
<text x="270" y="380" font-size="18" fill="black">剩余时间</text>
<text x="270" y="410" font-size="18" fill="black">理论值</text>
<line x1="205" y1="420" x2="1450" y2="420" stroke="purple" stroke-width="2"/>
<text x="217" y="440" font-size="16" fill="black">PM
<tspan x="220" y="470">颗</tspan>
<tspan x="220" y="500">粒</tspan>
<tspan x="220" y="530">物</tspan>
</text>
<text x="270" y="440" font-size="18" fill="black">干基值</text>
<text x="270" y="470" font-size="18" fill="black">折算值<?php echo "&#9733";?></text>
<text x="270" y="500" font-size="18" fill="black">平均值</text>
<text x="270" y="530" font-size="18" fill="black">剩余时间</text>
<text x="270" y="560" font-size="18" fill="black">理论值</text>
<line x1="205" y1="570" x2="1450" y2="570" stroke="purple" stroke-width="2"/>
<text x="215" y="590" font-size="16" fill="black">
<tspan x="220" y="620">温</tspan>
<tspan x="220" y="650">压</tspan>
<tspan x="220" y="680">流</tspan>
</text>
<text x="270" y="590" font-size="18" fill="black">温度</text>
<text x="270" y="620" font-size="18" fill="black">压力</text>
<text x="270" y="650" font-size="18" fill="black">流速</text>
<text x="270" y="680" font-size="18" fill="black">流量</text>
<line x1="205" y1="690" x2="1450" y2="690" stroke="purple" stroke-width="2"/>
<text x="270" y="710" font-size="18" fill="black">湿度</text>
<text x="270" y="740" font-size="18" fill="black">氧含量</text>
<line x1="160" y1="750" x2="1450" y2="750" stroke="purple" stroke-width="2"/>
<text x="260" y="770" font-size="18" fill="black">锅炉负荷</text>
<text x="235" y="800" font-size="18" fill="black">给煤机A给煤量</text>
<text x="235" y="830" font-size="18" fill="black">给煤机B给煤量</text>
<text x="235" y="860" font-size="18" fill="black">给煤机C给煤量</text>
<text x="235" y="890" font-size="18" fill="black">给煤机D给煤量</text>
<text x="260" y="920" font-size="18" fill="black">燃气流量</text>
<line x1="160" y1="930" x2="1450" y2="930" stroke="purple" stroke-width="2"/>

<line x1="390" y1="00" x2="390" y2="930" stroke="purple" stroke-width="2"/>
			<?php
				$locateX = 0;
				$locateY = 40;
			?>


	<?php 
				foreach($pointArray as $kks=>$d){
					if($d[4]==0){
					dkAI($kks);
					}
				}
				/*
				dkAI("10HAD10CT201");
				dkAI("10HAD10CP101");
				dkAI("10HAD10CP102");
				dkAI("10HAD10CT202");
				dkAI("10HAD10CT203");
				dkAI("10HAD10CT204");
				dkAI("10HAD10CT205");
				dkAI("10HAD10CT206");
				dkAI("10HAD10CL101_L");
				dkAI("10HAD10CL102_L");
				dkAI("10HAD10CL103_L");
				dkAI("10HAD10AA101GT");
				 */
	?>

	</svg>
					<?php include("footer.php")?>

</body>
</html>
