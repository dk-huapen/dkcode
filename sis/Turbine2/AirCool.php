<html>
	<head>
    		<title>2号汽轮机空冷</title>
		<?php include("../header.php")?>
	</head>
	<body>
		<?php include("top.php")?>
		<center><h1>2号汽轮机空冷系统</h1></center>
		<script>
			var page = 312;
			var test =<?php
			include('../conn.php');
			$sql="SELECT kks,name,value,unit,updatetime,HH,H,HHH,L,LL,LLL,flag,angle,indexID,X,Y FROM sis where page=312 union SELECT kks,name,value,unit,updatetime,HH,H,HHH,L,LL,LLL,flag,angle1,indexID,X1,Y1 FROM sis where page1=312";
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
			<?php
				//包含磨煤机模板
				include("../TemplateSvg/AirCoolTemplate.php");
			?>
			<!--包含具体名称的元素-->


<text x="50" y="20" fill="black" font-size="20" font-family="Arial">环境温度</text>
<text x="50" y="70" fill="black" font-size="20" font-family="Arial">大气压力</text>

<!---1号风机x330y320-->
<line x1="960" y1="130" x2="960" y2="250" stroke="black" stroke-width="2"/>
<line x1="790" y1="130" x2="790" y2="300" stroke="black" stroke-width="2"/>
<line x1="875" y1="90" x2="960" y2="130" stroke="black" stroke-width="2"/>
<line x1="875" y1="90" x2="790" y2="130" stroke="black" stroke-width="2"/>
<text x="830" y="151" fill="black" font-size="18" font-family="Arial">准备好</text>
<text x="830" y="176" fill="black" font-size="18" font-family="Arial">故障</text>
<text x="810" y="216" fill="black" font-size="20" font-family="Arial">FB</text>
<text x="810" y="236" fill="black" font-size="20" font-family="Arial">SP</text>
<text x="840" y="285" fill="black" font-size="20" font-family="Arial">1号风机</text>
<!---2号风机330-->
<line x1="1290" y1="130" x2="1290" y2="250" stroke="black" stroke-width="2"/>
<line x1="1120" y1="130" x2="1120" y2="300" stroke="black" stroke-width="2"/>
<line x1="1205" y1="90" x2="1290" y2="130" stroke="black" stroke-width="2"/>
<line x1="1205" y1="90" x2="1120" y2="130" stroke="black" stroke-width="2"/>
<text x="1160" y="151" fill="black" font-size="18" font-family="Arial">准备好</text>
<text x="1160" y="176" fill="black" font-size="18" font-family="Arial">故障</text>
<text x="1140" y="216" fill="black" font-size="20" font-family="Arial">FB</text>
<text x="1140" y="236" fill="black" font-size="20" font-family="Arial">SP</text>
<text x="1170" y="285" fill="black" font-size="20" font-family="Arial">2号风机</text>
<!---3号风机-->
<line x1="1620" y1="130" x2="1620" y2="250" stroke="black" stroke-width="2"/>
<line x1="1450" y1="130" x2="1450" y2="300" stroke="black" stroke-width="2"/>
<line x1="1535" y1="90" x2="1620" y2="130" stroke="black" stroke-width="2"/>
<line x1="1535" y1="90" x2="1450" y2="130" stroke="black" stroke-width="2"/>
<text x="1490" y="151" fill="black" font-size="18" font-family="Arial">准备好</text>
<text x="1490" y="176" fill="black" font-size="18" font-family="Arial">故障</text>
<text x="1470" y="216" fill="black" font-size="20" font-family="Arial">FB</text>
<text x="1470" y="236" fill="black" font-size="20" font-family="Arial">SP</text>
<text x="1500" y="285" fill="black" font-size="20" font-family="Arial">3号风机</text>
<!---4号风机x330y320-->
<line x1="960" y1="450" x2="960" y2="570" stroke="black" stroke-width="2"/>
<line x1="790" y1="450" x2="790" y2="620" stroke="black" stroke-width="2"/>
<line x1="875" y1="410" x2="960" y2="450" stroke="black" stroke-width="2"/>
<line x1="875" y1="410" x2="790" y2="450" stroke="black" stroke-width="2"/>
<text x="830" y="471" fill="black" font-size="18" font-family="Arial">准备好</text>
<text x="830" y="496" fill="black" font-size="18" font-family="Arial">故障</text>
<text x="810" y="536" fill="black" font-size="20" font-family="Arial">FB</text>
<text x="810" y="556" fill="black" font-size="20" font-family="Arial">SP</text>
<text x="840" y="605" fill="black" font-size="20" font-family="Arial">4号风机</text>
<!---5号风机330-->
<line x1="1290" y1="450" x2="1290" y2="570" stroke="black" stroke-width="2"/>
<line x1="1120" y1="450" x2="1120" y2="620" stroke="black" stroke-width="2"/>
<line x1="1205" y1="410" x2="1290" y2="450" stroke="black" stroke-width="2"/>
<line x1="1205" y1="410" x2="1120" y2="450" stroke="black" stroke-width="2"/>
<text x="1160" y="471" fill="black" font-size="18" font-family="Arial">准备好</text>
<text x="1160" y="496" fill="black" font-size="18" font-family="Arial">故障</text>
<text x="1140" y="536" fill="black" font-size="20" font-family="Arial">FB</text>
<text x="1140" y="556" fill="black" font-size="20" font-family="Arial">SP</text>
<text x="1170" y="605" fill="black" font-size="20" font-family="Arial">5号风机</text>
<!---6号风机-->
<line x1="1620" y1="450" x2="1620" y2="570" stroke="black" stroke-width="2"/>
<line x1="1450" y1="450" x2="1450" y2="620" stroke="black" stroke-width="2"/>
<line x1="1535" y1="410" x2="1620" y2="450" stroke="black" stroke-width="2"/>
<line x1="1535" y1="410" x2="1450" y2="450" stroke="black" stroke-width="2"/>
<text x="1490" y="471" fill="black" font-size="18" font-family="Arial">准备好</text>
<text x="1490" y="496" fill="black" font-size="18" font-family="Arial">故障</text>
<text x="1470" y="536" fill="black" font-size="20" font-family="Arial">FB</text>
<text x="1470" y="556" fill="black" font-size="20" font-family="Arial">SP</text>
<text x="1500" y="605" fill="black" font-size="20" font-family="Arial">6号风机</text>
<!---A列凝结水回水-->
<line x1="960" y1="250" x2="1640" y2="250" stroke="green" stroke-width="2"/>
<line x1="1640" y1="250" x2="1640" y2="300" stroke="green" stroke-width="2"/>
<line x1="790" y1="300" x2="1810" y2="300" stroke="green" stroke-width="2"/>
<line x1="1810" y1="300" x2="1810" y2="360" stroke="green" stroke-width="2"/>
<text x="1818" y="320" fill="black" font-size="20" font-family="Arial">A</text>
<text x="1815" y="340" fill="black" font-size="20" font-family="Arial">列</text>
<text x="1815" y="360" fill="black" font-size="20" font-family="Arial">凝</text>
<text x="1815" y="380" fill="black" font-size="20" font-family="Arial">结</text>
<text x="1815" y="400" fill="black" font-size="20" font-family="Arial">水</text>
<text x="1815" y="420" fill="black" font-size="20" font-family="Arial">回</text>
<text x="1815" y="440" fill="black" font-size="20" font-family="Arial">水</text>
<!---B列凝结水回水-->
<line x1="960" y1="570" x2="1640" y2="570" stroke="green" stroke-width="2"/>
<line x1="1640" y1="570" x2="1640" y2="620" stroke="green" stroke-width="2"/>
<line x1="790" y1="620" x2="1810" y2="620" stroke="green" stroke-width="2"/>
<line x1="1810" y1="620" x2="1810" y2="680" stroke="green" stroke-width="2"/>
<text x="1818" y="640" fill="black" font-size="20" font-family="Arial">B</text>
<text x="1815" y="660" fill="black" font-size="20" font-family="Arial">列</text>
<text x="1815" y="680" fill="black" font-size="20" font-family="Arial">凝</text>
<text x="1815" y="700" fill="black" font-size="20" font-family="Arial">结</text>
<text x="1815" y="720" fill="black" font-size="20" font-family="Arial">水</text>
<text x="1815" y="740" fill="black" font-size="20" font-family="Arial">回</text>
<text x="1815" y="760" fill="black" font-size="20" font-family="Arial">水</text>
<!---抽汽管道-->
<line x1="1140" y1="50" x2="1770" y2="50" stroke="aqua" stroke-width="2"/>
<line x1="1140" y1="50" x2="1140" y2="119" stroke="aqua" stroke-width="2"/>
<line x1="1270" y1="50" x2="1270" y2="119" stroke="aqua" stroke-width="2"/>
<line x1="1140" y1="370" x2="1770" y2="370" stroke="aqua" stroke-width="2"/>
<line x1="1140" y1="370" x2="1140" y2="439" stroke="aqua" stroke-width="2"/>
<line x1="1270" y1="370" x2="1270" y2="439" stroke="aqua" stroke-width="2"/>


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
