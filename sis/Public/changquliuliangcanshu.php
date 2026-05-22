<html>
	<head>
    		<title>厂区流量参数</title>
		<?php include("../header.php")?>
	</head>
	<body>
		<?php include("top.php")?>
		<center><h1>厂区部分动力管道参数及累积流量</h1></center>
		<script>
			var page = 220;
			var test =<?php
			include('../conn.php');
			$sql="SELECT kks,name,value,unit,updatetime,HH,H,HHH,L,LL,LLL,flag,angle,indexID,X,Y FROM sis where page=220 union SELECT kks,name,value,unit,updatetime,HH,H,HHH,L,LL,LLL,flag,angle1,indexID,X1,Y1 FROM sis where page1=220";
			$result = mysqli_query($con,$sql);
			$pointArray = array();

			$str = "{";
				while($row = mysqli_fetch_assoc($result)){
					$str = $str. "_".$row['kks'].":{name:'".$row['name']."',HH:'".$row['HH']."',H:'".$row['H']."',HHH:'".$row['HHH']."',L:'".$row['L']."',LL:'".$row['LL']."',LLL:'".$row['LLL']."',updatetime:'".$row['updatetime']."',unit:'".$row['unit']."',value:".$row['value'].",flag:".$row['flag']."},";
					$pointArray[$row['kks']] = array($row['indexID'],$row['name'],$row['X'],$row['Y'],$row['flag'],$row['LLL'],$row['angle']);

				}
				$strre = chop($str,",");
			$strre = $strre."}";

			echo $strre;

			mysqli_close($con);
	
			?>;
		</script>
	<!--SIS画面-->
		<svg width="1860" height="1000" viewBox="0 0 1860 1000" fill="gray">
			<?php
				$locateX = 0;
				$locateY = 0;
			?>


<!--1列----->
<line x1="30" y1="100" x2="30" y2="910" stroke="black" stroke-width="2"/>
<line x1="300" y1="100" x2="300" y2="910" stroke="black" stroke-width="2"/>
<line x1="30" y1="100" x2="430" y2="100" stroke="black" stroke-width="2"/>
<text x="50" y="135" fill="black" font-size="20" font-family="Arial">来至厂区氮气管道压力</text>
<line x1="30" y1="145" x2="430" y2="145" stroke="black" stroke-width="2"/>
<text x="50" y="180" fill="black" font-size="20" font-family="Arial">来至厂区氮气管道流量</text>
<line x1="30" y1="190" x2="430" y2="190" stroke="black" stroke-width="2"/>
<text x="50" y="225" fill="black" font-size="20" font-family="Arial">来至厂区氮气管道温度</text>
<line x1="30" y1="235" x2="430" y2="235" stroke="black" stroke-width="2"/>
<text x="50" y="270" fill="black" font-size="20" font-family="Arial">外供厂区凝结水管道压力</text>
<line x1="30" y1="280" x2="430" y2="280" stroke="black" stroke-width="2"/>
<text x="50" y="315" fill="black" font-size="20" font-family="Arial">外供厂区凝结水管道流量</text>
<line x1="30" y1="325" x2="430" y2="325" stroke="black" stroke-width="2"/>
<text x="50" y="360" fill="black" font-size="20" font-family="Arial">外供厂区凝结水管道温度</text>
<line x1="30" y1="370" x2="430" y2="370" stroke="black" stroke-width="2"/>
<text x="50" y="405" fill="black" font-size="20" font-family="Arial">来自厂区氮气管道压力</text>
<line x1="30" y1="415" x2="430" y2="415" stroke="black" stroke-width="2"/>
<text x="50" y="450" fill="black" font-size="20" font-family="Arial">来自厂区氮气管道流量</text>
<line x1="30" y1="460" x2="430" y2="460" stroke="black" stroke-width="2"/>
<text x="50" y="495" fill="black" font-size="20" font-family="Arial">来自厂区氮气管道温度</text>
<line x1="30" y1="505" x2="430" y2="505" stroke="black" stroke-width="2"/>
<text x="50" y="540" fill="black" font-size="20" font-family="Arial">来自厂区循环水管道压力</text>
<line x1="30" y1="550" x2="430" y2="550" stroke="black" stroke-width="2"/>
<text x="50" y="585" fill="black" font-size="20" font-family="Arial">来自厂区循环水管道流量</text>
<line x1="30" y1="595" x2="430" y2="595" stroke="black" stroke-width="2"/>
<text x="50" y="630" fill="black" font-size="20" font-family="Arial">来自厂区循环水管道温度</text>
<line x1="30" y1="640" x2="430" y2="640" stroke="black" stroke-width="2"/>
<text x="50" y="675" fill="black" font-size="20" font-family="Arial">外供厂区循环水管道压力</text>
<line x1="30" y1="685" x2="430" y2="685" stroke="black" stroke-width="2"/>
<text x="50" y="720" fill="black" font-size="20" font-family="Arial">外供厂区循环水管道流量</text>
<line x1="30" y1="730" x2="430" y2="730" stroke="black" stroke-width="2"/>
<text x="50" y="765" fill="black" font-size="20" font-family="Arial">外供厂区循环水管道温度</text>
<line x1="30" y1="775" x2="430" y2="775" stroke="black" stroke-width="2"/>
<text x="50" y="810" fill="black" font-size="20" font-family="Arial">循环水供回水流量偏差</text>
<line x1="30" y1="820" x2="430" y2="820" stroke="black" stroke-width="2"/>
<text x="50" y="855" fill="black" font-size="20" font-family="Arial">来自厂区再生水管道压力</text>
<line x1="30" y1="865" x2="430" y2="865" stroke="black" stroke-width="2"/>
<text x="50" y="900" fill="black" font-size="20" font-family="Arial">来自厂区再生水管道流量</text>
<line x1="30" y1="910" x2="430" y2="910" stroke="black" stroke-width="2"/>
<line x1="430" y1="100" x2="430" y2="910" stroke="black" stroke-width="2"/>

<!--2号炉----->
<line x1="460" y1="100" x2="460" y2="910" stroke="black" stroke-width="2"/>
<line x1="770" y1="100" x2="770" y2="910" stroke="black" stroke-width="2"/>
<line x1="460" y1="100" x2="910" y2="100" stroke="black" stroke-width="2"/>
<text x="480" y="135" fill="black" font-size="20" font-family="Arial">来至厂区仪用气管道压力</text>
<line x1="460" y1="145" x2="910" y2="145" stroke="black" stroke-width="2"/>
<text x="480" y="180" fill="black" font-size="20" font-family="Arial">来至厂区仪用气管道流量</text>
<line x1="460" y1="190" x2="910" y2="190" stroke="black" stroke-width="2"/>
<text x="480" y="225" fill="black" font-size="20" font-family="Arial">来至厂区仪用气管道温度</text>
<line x1="460" y1="235" x2="910" y2="235" stroke="black" stroke-width="2"/>
<text x="480" y="270" fill="black" font-size="20" font-family="Arial">来至厂区液氨管道压力</text>
<line x1="460" y1="280" x2="910" y2="280" stroke="black" stroke-width="2"/>
<text x="480" y="315" fill="black" font-size="20" font-family="Arial">来至厂区液氨管道流量</text>
<line x1="460" y1="325" x2="910" y2="325" stroke="black" stroke-width="2"/>
<text x="480" y="360" fill="black" font-size="20" font-family="Arial">来至厂区液氨管道温度</text>
<line x1="460" y1="370" x2="910" y2="370" stroke="black" stroke-width="2"/>
<text x="480" y="405" fill="black" font-size="20" font-family="Arial">来自厂区冷除盐水旁路流量</text>
<line x1="460" y1="415" x2="910" y2="415" stroke="black" stroke-width="2"/>
<line x1="460" y1="460" x2="910" y2="460" stroke="black" stroke-width="2"/>
<line x1="460" y1="505" x2="910" y2="505" stroke="black" stroke-width="2"/>
<line x1="460" y1="550" x2="910" y2="550" stroke="black" stroke-width="2"/>
<line x1="460" y1="595" x2="910" y2="595" stroke="black" stroke-width="2"/>
<line x1="460" y1="640" x2="910" y2="640" stroke="black" stroke-width="2"/>
<text x="465" y="675" fill="black" font-size="20" font-family="Arial">一段9.8/5.0双减入口蒸汽累积流量</text>
<line x1="460" y1="685" x2="910" y2="685" stroke="black" stroke-width="2"/>
<text x="465" y="720" fill="black" font-size="20" font-family="Arial">二段9.8/5.0双减入口蒸汽累积流量</text>
<line x1="460" y1="730" x2="910" y2="730" stroke="black" stroke-width="2"/>
<text x="480" y="765" fill="black" font-size="20" font-family="Arial">9.8/2.8双减入口蒸汽累积流量</text>
<line x1="460" y1="775" x2="910" y2="775" stroke="black" stroke-width="2"/>
<text x="480" y="810" fill="black" font-size="20" font-family="Arial">9.8/1.0双减入口蒸汽累积流量</text>
<line x1="460" y1="820" x2="910" y2="820" stroke="black" stroke-width="2"/>
<text x="480" y="855" fill="black" font-size="20" font-family="Arial">4号汽轮机凝结水累积流量</text>
<line x1="460" y1="865" x2="910" y2="865" stroke="black" stroke-width="2"/>
<text x="480" y="900" fill="black" font-size="20" font-family="Arial">5号汽轮机凝结水累积流量</text>
<line x1="460" y1="910" x2="910" y2="910" stroke="black" stroke-width="2"/>
<line x1="910" y1="100" x2="910" y2="910" stroke="black" stroke-width="2"/>

<!--3号炉----->
<line x1="940" y1="100" x2="940" y2="910" stroke="black" stroke-width="2"/>
<line x1="1250" y1="100" x2="1250" y2="910" stroke="black" stroke-width="2"/>
<line x1="940" y1="100" x2="1390" y2="100" stroke="black" stroke-width="2"/>
<text x="950" y="135" fill="black" font-size="20" font-family="Arial">9.8MPa过热蒸汽(1)累积流量</text>
<line x1="940" y1="145" x2="1390" y2="145" stroke="black" stroke-width="2"/>
<text x="950" y="180" fill="black" font-size="20" font-family="Arial">9.8MPa过热蒸汽(2)累积流量</text>
<line x1="940" y1="190" x2="1390" y2="190" stroke="black" stroke-width="2"/>
<text x="950" y="225" fill="black" font-size="20" font-family="Arial">6.3MPa过热蒸汽累积流量</text>
<line x1="940" y1="235" x2="1390" y2="235" stroke="black" stroke-width="2"/>
<text x="950" y="270" fill="black" font-size="20" font-family="Arial">5.0MPa过热蒸汽累积流量(外供1)</text>
<line x1="940" y1="280" x2="1390" y2="280" stroke="black" stroke-width="2"/>
<text x="950" y="315" fill="black" font-size="20" font-family="Arial">5.0MPa过热蒸汽累积流量(外供2)</text>
<line x1="940" y1="325" x2="1390" y2="325" stroke="black" stroke-width="2"/>
<text x="950" y="360" fill="black" font-size="20" font-family="Arial">5.0MPa过热蒸汽累积流量(返回)</text>
<line x1="940" y1="370" x2="1390" y2="370" stroke="black" stroke-width="2"/>
<text x="950" y="405" fill="black" font-size="20" font-family="Arial">2.8MPa饱和蒸汽(1)累积流量</text>
<line x1="940" y1="415" x2="1390" y2="415" stroke="black" stroke-width="2"/>
<text x="950" y="450" fill="black" font-size="20" font-family="Arial">2.8MPa饱和蒸汽(2)累积流量</text>
<line x1="940" y1="460" x2="1390" y2="460" stroke="black" stroke-width="2"/>
<text x="950" y="495" fill="black" font-size="20" font-family="Arial">2.8MPa外供蒸汽累积流量</text>
<line x1="940" y1="505" x2="1390" y2="505" stroke="black" stroke-width="2"/>
<text x="950" y="540" fill="black" font-size="20" font-family="Arial">1.0MPa(外供)蒸汽累积流量</text>
<line x1="940" y1="550" x2="1390" y2="550" stroke="black" stroke-width="2"/>
<text x="950" y="585" fill="black" font-size="20" font-family="Arial">1.0MPa(返回)蒸汽累积流量</text>
<line x1="940" y1="595" x2="1390" y2="595" stroke="black" stroke-width="2"/>
<text x="950" y="630" fill="black" font-size="20" font-family="Arial">0.5MPa饱和蒸汽(1)累积流量</text>
<line x1="940" y1="640" x2="1390" y2="640" stroke="black" stroke-width="2"/>
<text x="950" y="675" fill="black" font-size="20" font-family="Arial">0.5MPa饱和蒸汽(2)累积流量</text>
<line x1="940" y1="685" x2="1390" y2="685" stroke="black" stroke-width="2"/>
<text x="950" y="720" fill="black" font-size="20" font-family="Arial">热除盐水补充水累积流量</text>
<line x1="940" y1="730" x2="1390" y2="730" stroke="black" stroke-width="2"/>
<text x="950" y="765" fill="black" font-size="20" font-family="Arial">冷除盐水补充水累积流量</text>
<line x1="940" y1="775" x2="1390" y2="775" stroke="black" stroke-width="2"/>
<text x="950" y="810" fill="black" font-size="20" font-family="Arial">循环冷却水供水累积流量</text>
<line x1="940" y1="820" x2="1390" y2="820" stroke="black" stroke-width="2"/>
<text x="950" y="855" fill="black" font-size="20" font-family="Arial">循环冷却水回水累积流量</text>
<line x1="940" y1="865" x2="1390" y2="865" stroke="black" stroke-width="2"/>
<text x="950" y="900" fill="black" font-size="20" font-family="Arial">来自厂区冷除盐水旁路累积流量</text>
<line x1="940" y1="910" x2="1390" y2="910" stroke="black" stroke-width="2"/>
<line x1="1390" y1="100" x2="1390" y2="910" stroke="black" stroke-width="2"/>

<!--4号炉----->
<line x1="1420" y1="100" x2="1420" y2="910" stroke="black" stroke-width="2"/>
<line x1="1700" y1="100" x2="1700" y2="910" stroke="black" stroke-width="2"/>
<line x1="1420" y1="100" x2="1840" y2="100" stroke="black" stroke-width="2"/>
<text x="1450" y="135" fill="black" font-size="20" font-family="Arial">再生水累积流量</text>
<line x1="1420" y1="145" x2="1840" y2="145" stroke="black" stroke-width="2"/>
<text x="1450" y="180" fill="black" font-size="20" font-family="Arial">采暖供水累积流量</text>
<line x1="1420" y1="190" x2="1840" y2="190" stroke="black" stroke-width="2"/>
<text x="1450" y="225" fill="black" font-size="20" font-family="Arial">采暖回水累积流量</text>
<line x1="1420" y1="235" x2="1840" y2="235" stroke="black" stroke-width="2"/>
<text x="1450" y="270" fill="black" font-size="20" font-family="Arial">余热发电凝液累积流量</text>
<line x1="1420" y1="280" x2="1840" y2="280" stroke="black" stroke-width="2"/>
<text x="1450" y="315" fill="black" font-size="20" font-family="Arial">仪用压缩空气累积量</text>
<line x1="1420" y1="325" x2="1840" y2="325" stroke="black" stroke-width="2"/>
<text x="1450" y="360" fill="black" font-size="20" font-family="Arial">气氨累积量</text>
<line x1="1420" y1="370" x2="1840" y2="370" stroke="black" stroke-width="2"/>
<text x="1450" y="405" fill="black" font-size="20" font-family="Arial">液氨累积量</text>
<line x1="1420" y1="415" x2="1840" y2="415" stroke="black" stroke-width="2"/>
<text x="1450" y="450" fill="black" font-size="20" font-family="Arial">来自厂区氮气管道累积量</text>
<line x1="1420" y1="460" x2="1840" y2="460" stroke="black" stroke-width="2"/>
<text x="1450" y="495" fill="black" font-size="20" font-family="Arial">轻柴油累积流量</text>
<line x1="1420" y1="505" x2="1840" y2="505" stroke="black" stroke-width="2"/>
<text x="1450" y="540" fill="black" font-size="20" font-family="Arial">1号炉给煤机累积煤量</text>
<line x1="1420" y1="550" x2="1840" y2="550" stroke="black" stroke-width="2"/>
<text x="1450" y="585" fill="black" font-size="20" font-family="Arial">2号炉给煤机累积煤量</text>
<line x1="1420" y1="595" x2="1840" y2="595" stroke="black" stroke-width="2"/>
<text x="1450" y="630" fill="black" font-size="20" font-family="Arial">3号炉给煤机累积煤量</text>
<line x1="1420" y1="640" x2="1840" y2="640" stroke="black" stroke-width="2"/>
<text x="1450" y="675" fill="black" font-size="20" font-family="Arial">4号炉给煤机累积煤量</text>
<line x1="1420" y1="685" x2="1840" y2="685" stroke="black" stroke-width="2"/>
<text x="1450" y="720" fill="black" font-size="20" font-family="Arial">8号A输煤皮带瞬时煤量</text>
<line x1="1420" y1="730" x2="1840" y2="730" stroke="black" stroke-width="2"/>
<text x="1450" y="765" fill="black" font-size="20" font-family="Arial">8号A输煤皮带累积煤量</text>
<line x1="1420" y1="775" x2="1840" y2="775" stroke="black" stroke-width="2"/>
<text x="1450" y="810" fill="black" font-size="20" font-family="Arial">8号B输煤皮带瞬时煤量</text>
<line x1="1420" y1="820" x2="1840" y2="820" stroke="black" stroke-width="2"/>
<text x="1450" y="855" fill="black" font-size="20" font-family="Arial">8号B输煤皮带累积煤量</text>
<line x1="1420" y1="865" x2="1840" y2="865" stroke="black" stroke-width="2"/>
<text x="1450" y="900" fill="black" font-size="20" font-family="Arial">发电机累计负荷</text>
<line x1="1420" y1="910" x2="1840" y2="910" stroke="black" stroke-width="2"/>
<line x1="1840" y1="100" x2="1840" y2="910" stroke="black" stroke-width="2"/>





	<?php 
				foreach($pointArray as $kks=>$d){
					if($d[4]==0){
					dkAI($kks);
					}
					if($d[4]==1){
					dkDI($kks);
					}
					if($d[4]==2){
					dkValue($kks);
					}
				}
	?>

	</svg>
					<?php include("footer.php")?>

</body>
</html>
