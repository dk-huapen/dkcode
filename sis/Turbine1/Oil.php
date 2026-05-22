<html>
	<head>
    		<title>1号汽轮机油系统</title>
		<?php include("../header.php")?>
	</head>
	<body>
		<?php include("top.php")?>
		<center><h1>1号汽轮机油系统</h1></center>
		<script>
			var page = 303;
			var test =<?php
			include('../conn.php');
			$sql="SELECT kks,name,value,unit,updatetime,HH,H,HHH,L,LL,LLL,flag,angle,indexID,X,Y FROM sis where page=303 union SELECT kks,name,value,unit,updatetime,HH,H,HHH,L,LL,LLL,flag,angle1,indexID,X1,Y1 FROM sis where page1=303";
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


<line x1="1850" y1="50" x2="1850" y2="950" stroke="black" stroke-width="2"/>
<!---蒸汽---->
<text x="80" y="20" fill="black" font-size="20" font-family="Arial">主蒸汽</text>
<line x1="70" y1="25" x2="710" y2="25" stroke="red" stroke-width="2"/>
<line x1="710" y1="25" x2="710" y2="140" stroke="red" stroke-width="2"/>
<line x1="650" y1="25" x2="650" y2="140" stroke="red" stroke-width="2"/>
<line x1="650" y1="140" x2="710" y2="140" stroke="red" stroke-width="2"/>
<line x1="680" y1="140" x2="680" y2="250" stroke="red" stroke-width="2"/>
<line x1="820" y1="100" x2="820" y2="250" stroke="red" stroke-width="2"/>
<line x1="820" y1="100" x2="930" y2="100" stroke="red" stroke-width="2"/>
<line x1="930" y1="100" x2="930" y2="250" stroke="red" stroke-width="2"/>
<!---润滑油---->
<line x1="500" y1="450" x2="1020" y2="450" stroke="orange" stroke-width="2"/>
<line x1="500" y1="310" x2="500" y2="450" stroke="orange" stroke-width="2"/>
<line x1="550" y1="310" x2="550" y2="450" stroke="orange" stroke-width="2"/>
<line x1="1020" y1="150" x2="1020" y2="450" stroke="orange" stroke-width="2"/>
<line x1="1060" y1="150" x2="1060" y2="290" stroke="orange" stroke-width="2"/>
<line x1="1215" y1="150" x2="1215" y2="270" stroke="orange" stroke-width="2"/>
<line x1="1340" y1="150" x2="1340" y2="350" stroke="orange" stroke-width="2"/>
<line x1="1620" y1="150" x2="1620" y2="350" stroke="orange" stroke-width="2"/>
<line x1="1020" y1="150" x2="1620" y2="150" stroke="orange" stroke-width="2"/>
<!---顶轴油---->
<line x1="1470" y1="150" x2="1470" y2="210" stroke="orange" stroke-width="2"/>
<line x1="1360" y1="210" x2="1600" y2="210" stroke="orange" stroke-width="2"/>
<line x1="1360" y1="210" x2="1360" y2="315" stroke="orange" stroke-width="2"/>
<line x1="1600" y1="210" x2="1600" y2="315" stroke="orange" stroke-width="2"/>
<!---汽轮机本体---->
<!---高速轴---->
<rect x="470" y="290" width="790" height="20" fill="gray" stroke="black" stroke-width="1"></rect>
<rect x="480" y="255" width="20" height="35" fill="gray" stroke="black" stroke-width="1"></rect>
<!---1瓦---->
<polyline points="520,285 540,285 540,255 520,255" style="fill:none" stroke="black" stroke-width="1"/>
<polyline points="580,285 560,285 560,255 580,255" style="fill:none" stroke="black" stroke-width="1"/>
<polyline points="520,315 540,315 540,345 520,345" style="fill:none" stroke="black" stroke-width="1"/>
<polyline points="580,315 560,315 560,345 580,345" style="fill:none" stroke="black" stroke-width="1"/>
<!---2瓦---->
<polyline points="1030,285 1050,285 1050,255 1030,255" style="fill:none" stroke="black" stroke-width="1"/>
<polyline points="1090,285 1070,285 1070,255 1090,255" style="fill:none" stroke="black" stroke-width="1"/>
<polyline points="1030,315 1050,315 1050,345 1030,345" style="fill:none" stroke="black" stroke-width="1"/>
<polyline points="1090,315 1070,315 1070,345 1090,345" style="fill:none" stroke="black" stroke-width="1"/>
<!---7瓦---->
<polyline points="1310,345 1330,345 1330,315 1310,315" style="fill:none" stroke="black" stroke-width="1"/>
<polyline points="1370,345 1350,345 1350,315 1370,315" style="fill:none" stroke="black" stroke-width="1"/>
<polyline points="1310,375 1330,375 1330,405 1310,405" style="fill:none" stroke="black" stroke-width="1"/>
<polyline points="1370,375 1350,375 1350,405 1370,405" style="fill:none" stroke="black" stroke-width="1"/>
<!---8瓦---->
<polyline points="1590,345 1610,345 1610,315 1590,315" style="fill:none" stroke="black" stroke-width="1"/>
<polyline points="1650,345 1630,345 1630,315 1650,315" style="fill:none" stroke="black" stroke-width="1"/>
<polyline points="1590,375 1610,375 1610,405 1590,405" style="fill:none" stroke="black" stroke-width="1"/>
<polyline points="1650,375 1630,375 1630,405 1650,405" style="fill:none" stroke="black" stroke-width="1"/>

<polygon points='615,247 640,250 980,200 980,400 640,350 615,353'fill='gray' stroke='black' stroke-width='1'></polygon>
<text x="755" y="315" fill="black" font-size="20" font-family="Arial">汽轮机</text>
<line x1="640" y1="250" x2="640" y2="350" stroke="black" stroke-width="2"/>
<rect x="980" y="200" width="30" height="200" fill="gray" stroke="black" stroke-width="1"></rect>


<!---低速轴---->
<rect x="1160" y="350" width="540" height="20" fill="gray" stroke="black" stroke-width="1"></rect>
<text x="1680" y="330" fill="black" font-size="20" font-family="Arial">盘车</text>
<text x="1730" y="300" fill="black" font-size="20" font-family="Arial">远程</text>
<text x="1730" y="330" fill="black" font-size="20" font-family="Arial">故障</text>
<text x="1730" y="360" fill="black" font-size="20" font-family="Arial">啮合</text>
<text x="1670" y="410" fill="black" font-size="20" font-family="Arial">保护盖脱开</text>

<!---减速箱--->
<rect x="1190" y="270" width="50" height="120" fill="gray" stroke="black" stroke-width="1"></rect>

<!---发电机---->
<rect x="1380" y="300" width="200" height="120" fill="gray" stroke="black" stroke-width="1"></rect>


<!---油箱---->
<rect x="500" y="700" width="900" height="100" fill="gray" stroke="black" stroke-width="1"></rect>


<!---润滑油---->
<!---主油泵---->
<circle cx='1140' cy='360' r='25' fill='gray' stroke='black' stroke-widty='2'></circle>
<polygon points='1135,360 1126,360 1140,378 1154,360 1145,360 1145,342 1135,342'fill='white' fill-opacity='0' stroke='black' stroke-width='2'></polygon>

<line x1="1090" y1="360" x2="1090" y2="750" stroke="orange" stroke-width="2"/>
<line x1="1090" y1="360" x2="1115" y2="360" stroke="orange" stroke-width="2"/>
<line x1="1140" y1="385" x2="1140" y2="690" stroke="orange" stroke-width="2"/>
<line x1="1140" y1="694" x2="1140" y2="700" stroke="orange" stroke-width="2"/>
<line x1="1140" y1="806" x2="1140" y2="800" stroke="orange" stroke-width="2"/>
<line x1="1140" y1="810" x2="1140" y2="875" stroke="orange" stroke-width="2"/>
<text x="1150" y="420" fill="black" font-size="20" font-family="Arial">主油泵</text>
<!---事故油泵---->
<line x1="1000" y1="560" x2="1000" y2="750" stroke="orange" stroke-width="2"/>
<line x1="1000" y1="560" x2="1050" y2="560" stroke="orange" stroke-width="2"/>
<line x1="1050" y1="560" x2="1050" y2="690" stroke="orange" stroke-width="2"/>
<line x1="1050" y1="694" x2="1050" y2="700" stroke="orange" stroke-width="2"/>
<line x1="1050" y1="806" x2="1050" y2="800" stroke="orange" stroke-width="2"/>
<line x1="1050" y1="810" x2="1050" y2="875" stroke="orange" stroke-width="2"/>
<text x="970" y="730" fill="black" font-size="20" font-family="Arial">直流油泵</text>

<text x="900" y="630" fill="black" font-size="20" font-family="Arial">远方</text>
<text x="900" y="660" fill="black" font-size="20" font-family="Arial">故障</text>
<!---交流油泵---->
<line x1="1180" y1="560" x2="1180" y2="690" stroke="orange" stroke-width="2"/>
<line x1="1180" y1="694" x2="1180" y2="700" stroke="orange" stroke-width="2"/>
<line x1="1180" y1="806" x2="1180" y2="800" stroke="orange" stroke-width="2"/>
<line x1="1180" y1="560" x2="1230" y2="560" stroke="orange" stroke-width="2"/>
<line x1="1230" y1="560" x2="1230" y2="750" stroke="orange" stroke-width="2"/>
<line x1="1180" y1="810" x2="1180" y2="875" stroke="orange" stroke-width="2"/>

<text x="1260" y="630" fill="black" font-size="20" font-family="Arial">远方</text>
<text x="1260" y="660" fill="black" font-size="20" font-family="Arial">故障</text>
<text x="1180" y="730" fill="black" font-size="20" font-family="Arial">交流油泵</text>

<line x1="930" y1="875" x2="1180" y2="875" stroke="orange" stroke-width="2"/>
<!---润滑油泵出口冷却器 ---->
<line x1="930" y1="850" x2="930" y2="900" stroke="orange" stroke-width="2"/>
<line x1="810" y1="850" x2="930" y2="850" stroke="orange" stroke-width="2"/>
<rect x="840" y="835" width="60" height="30" fill="white" stroke="black" stroke-width="1"></rect>

<line x1="810" y1="900" x2="930" y2="900" stroke="orange" stroke-width="2"/>
<rect x="840" y="885" width="60" height="30" fill="white" stroke="black" stroke-width="1"></rect>
<line x1="810" y1="850" x2="810" y2="900" stroke="orange" stroke-width="2"/>

<line x1="730" y1="875" x2="810" y2="875" stroke="orange" stroke-width="2"/>
<!---润滑油泵出口滤网 ---->
<line x1="730" y1="850" x2="730" y2="900" stroke="orange" stroke-width="2"/>
<line x1="610" y1="850" x2="730" y2="850" stroke="orange" stroke-width="2"/>
<circle cx="670" cy="850" r="13" fill="gray" stroke="black" stroke-width="2"></circle> <!---润滑油泵出口滤网---->
<line x1="670" y1="837" x2="670" y2="863" stroke="black" stroke-width="3"/>

<line x1="610" y1="900" x2="730" y2="900" stroke="orange" stroke-width="2"/>
<circle cx="670" cy="900" r="13" fill="gray" stroke="black" stroke-width="2"></circle><!---润滑油泵出口滤网---->
<line x1="670" y1="887" x2="670" y2="913" stroke="black" stroke-width="3"/>
<line x1="610" y1="850" x2="610" y2="900" stroke="orange" stroke-width="2"/>

<line x1="130" y1="875" x2="610" y2="875" stroke="orange" stroke-width="2"/>
<!---润滑油母管-->
<line x1="525" y1="810" x2="525" y2="875" stroke="orange" stroke-width="2"/>
<line x1="525" y1="806" x2="525" y2="800" stroke="orange" stroke-width="2"/>
<line x1="525" y1="700" x2="525" y2="694" stroke="orange" stroke-width="2"/>
<line x1="525" y1="450" x2="525" y2="690" stroke="orange" stroke-width="2"/>

<line x1="130" y1="750" x2="130" y2="875" stroke="orange" stroke-width="2"/>
<line x1="200" y1="750" x2="200" y2="875" stroke="orange" stroke-width="2"/>
<line x1="130" y1="750" x2="200" y2="750" stroke="orange" stroke-width="2"/>

<line x1="165" y1="720" x2="165" y2="750" stroke="orange" stroke-width="2"/>
<line x1="130" y1="720" x2="200" y2="720" stroke="orange" stroke-width="2"/>
<line x1="130" y1="640" x2="130" y2="720" stroke="orange" stroke-width="2"/>
<line x1="200" y1="640" x2="200" y2="720" stroke="orange" stroke-width="2"/>

<!---油雾风机A---->
<rect x="572" y="602" width="16" height="66" fill="gray" stroke="black" stroke-width="1"></rect>
<ellipse cx="580" cy="620" rx="5" ry="15"fill="black" stroke="black" stroke-width="1"></ellipse>
<ellipse cx="580" cy="650" rx="5" ry="15"fill="black" stroke="black" stroke-width="1"></ellipse>
<line x1="580" y1="635" x2="620" y2="635" stroke="black" stroke-width="2"/>
<text x="640" y="630" fill="black" font-size="20" font-family="Arial">远方</text>
<text x="640" y="660" fill="black" font-size="20" font-family="Arial">故障</text>

<!---油雾风机B---->
<rect x="732" y="602" width="16" height="66" fill="gray" stroke="black" stroke-width="1"></rect>
<ellipse cx="740" cy="620" rx="5" ry="15"fill="black" stroke="black" stroke-width="1"></ellipse>
<ellipse cx="740" cy="650" rx="5" ry="15"fill="black" stroke="black" stroke-width="1"></ellipse>
<line x1="740" y1="635" x2="780" y2="635" stroke="black" stroke-width="2"/>
<text x="800" y="630" fill="black" font-size="20" font-family="Arial">远方</text>
<text x="800" y="660" fill="black" font-size="20" font-family="Arial">故障</text>


<!---控制油---->
<circle cx="130" cy="680" r="13" fill="gray" stroke="black" stroke-width="2"></circle> <!---控制油泵出口滤网---->
<line x1="117" y1="680" x2="143" y2="680" stroke="black" stroke-width="3"/>

<circle cx="200" cy="680" r="13" fill="gray" stroke="black" stroke-width="2"></circle> <!---控制油泵出口滤网---->
<line x1="187" y1="680" x2="213" y2="680" stroke="black" stroke-width="3"/>

<line x1="130" y1="640" x2="200" y2="640" stroke="orange" stroke-width="2"/>
<line x1="165" y1="270" x2="165" y2="640" stroke="orange" stroke-width="2"/>
<line x1="165" y1="270" x2="480" y2="270" stroke="orange" stroke-width="2"/>
<line x1="470" y1="80" x2="470" y2="270" stroke="orange" stroke-width="2"/>
<line x1="470" y1="180" x2="800" y2="180" stroke="orange" stroke-width="2"/>
<line x1="770" y1="80" x2="770" y2="180" stroke="orange" stroke-width="2"/>
<line x1="730" y1="80" x2="770" y2="80" stroke="orange" stroke-width="2"/>
<line x1="470" y1="80" x2="650" y2="80" stroke="orange" stroke-width="2"/>


<!---AST---->
<line x1="165" y1="500" x2="290" y2="500" stroke="orange" stroke-width="2"/>
<line x1="290" y1="500" x2="290" y2="730" stroke="orange" stroke-width="2"/>
<line x1="290" y1="730" x2="500" y2="730" stroke="orange" stroke-width="2"/>

<line x1="165" y1="480" x2="330" y2="480" stroke="orange" stroke-width="2"/>
<line x1="330" y1="480" x2="330" y2="710" stroke="orange" stroke-width="2"/>
<line x1="330" y1="710" x2="500" y2="710" stroke="orange" stroke-width="2"/>










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
