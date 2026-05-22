<html>
	<head>
    		<title>高压加热器系统</title>
		<?php include("../header.php")?>
	</head>
	<body>
		<?php include("top.php")?>
		<center><h1>高压加热器系统</h1></center>
		<script>
			var page = 207;
			var test =<?php
			include('../conn.php');
			#$sql="SELECT kks,name,value,unit,updatetime,HH,H,HHH,L,LL,LLL,flag,angle,indexID,X,Y FROM sis where page=203 or page1=203";
			$sql="SELECT kks,name,value,unit,updatetime,HH,H,HHH,L,LL,LLL,flag,angle,indexID,X,Y FROM sis where page=207 union SELECT kks,name,value,unit,updatetime,HH,H,HHH,L,LL,LLL,flag,angle1,indexID,X1,Y1 FROM sis where page1=207";
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


<!--A2组高压加热器--!>
<text x="110" y="25" fill="black" font-size="20" font-family="Arial">锅炉给水母管</text>
<line x1="170" y1="30" x2="170" y2="300" stroke="green" stroke-width="2"/>
<line x1="170" y1="150" x2="520" y2="150" stroke="green" stroke-width="2"/>
<line x1="230" y1="242" x2="460" y2="242" stroke="green" stroke-width="2"/>
<line x1="220" y1="390" x2="220" y2="510" stroke="green" stroke-width="2"/>
<line x1="180" y1="390" x2="180" y2="630" stroke="green" stroke-width="2"/>
<polygon points='170,570,190,570,170,610,190,610' fill='white' stroke='black' stroke-width='2' ></polygon>
<line x1="180" y1="630" x2="300" y2="630" stroke="green" stroke-width="2"/>
<line x1="350" y1="630" x2="470" y2="630" stroke="green" stroke-width="2"/>

<line x1="300" y1="630" x2="300" y2="720" stroke="green" stroke-width="2"/>
<line x1="350" y1="630" x2="350" y2="720" stroke="green" stroke-width="2"/>
<line x1="300" y1="720" x2="350" y2="720" stroke="green" stroke-width="2"/>
<line x1="325" y1="720" x2="325" y2="750" stroke="green" stroke-width="2"/>
<text x="280" y="770" fill="black" font-size="20" font-family="Arial">疏水扩容器</text>
<polygon points='290,650,310,650,290,690,310,690' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='340,650,360,650,340,690,360,690' fill='white' stroke='black' stroke-width='2' ></polygon>

<text x="55" y="160" fill="black" font-size="20" font-family="Arial">中压蒸汽</text>
<line x1="100" y1="170" x2="100" y2="320" stroke="red" stroke-width="2"/>
<line x1="100" y1="320" x2="160" y2="320" stroke="red" stroke-width="2"/>
<line x1="140" y1="280" x2="160" y2="280" stroke="red" stroke-width="2"/>
<line x1="140" y1="280" x2="140" y2="120" stroke="red" stroke-width="2"/>
<polygon points='90,190,110,190,90,230,110,230' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='90,240,110,240,90,280,110,280' fill='white' stroke='black' stroke-width='2' ></polygon>

<path d="M 160 260 A 30 20 0 0 1 240 260 L240 390 A30 20 0 0 1 160 390z" stroke="black" stroke="#000" fill="gray" />
<line x1="160" y1="260" x2="240" y2="260" stroke="black" stroke-width="2"/>
<line x1="160" y1="390" x2="240" y2="390" stroke="black" stroke-width="2"/>
<rect x="185" y="270" width="30" height="110" fill="gray" stroke="white" stroke-width="2"></rect>
<text x="190" y="295" fill="black" font-size="20" font-family="Arial">二</text>
<text x="190" y="320" fill="black" font-size="20" font-family="Arial">级</text>
<text x="190" y="345" fill="black" font-size="20" font-family="Arial">高</text>
<text x="190" y="370" fill="black" font-size="20" font-family="Arial">加</text>
<text x="188" y="410" fill="black" font-size="20" font-family="Arial">A2</text>
<!--A1组高压加热器--!>
<text x="440" y="25" fill="black" font-size="20" font-family="Arial">给水泵出口水母管</text>
<line x1="520" y1="30" x2="520" y2="400" stroke="green" stroke-width="2"/>
<line x1="460" y1="242" x2="460" y2="400" stroke="green" stroke-width="2"/>
<line x1="220" y1="510" x2="460" y2="510" stroke="green" stroke-width="2"/>
<polygon points='240,500,240,520,280,500,280,520' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='390,500,390,520,430,500,430,520' fill='white' stroke='black' stroke-width='2' ></polygon>
<line x1="470" y1="490" x2="470" y2="630" stroke="green" stroke-width="2"/>
<polygon points='460,570,480,570,460,610,480,610' fill='white' stroke='black' stroke-width='2' ></polygon>
<line x1="510" y1="490" x2="510" y2="830" stroke="green" stroke-width="2"/>
<polygon points='500,570,520,570,500,610,520,610' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='500,630,520,630,500,670,520,670' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='500,750,520,750,500,790,520,790' fill='white' stroke='black' stroke-width='2' ></polygon>

<text x="350" y="270" fill="black" font-size="20" font-family="Arial">低压蒸汽</text>
<text x="80" y="377" fill="black" font-size="20" font-family="Arial">就地</text>
<text x="375" y="463" fill="black" font-size="20" font-family="Arial">故障</text>
<text x="375" y="487" fill="black" font-size="20" font-family="Arial">就地</text>
<line x1="390" y1="280" x2="390" y2="430" stroke="red" stroke-width="2"/>
<line x1="390" y1="430" x2="450" y2="430" stroke="red" stroke-width="2"/>
<line x1="530" y1="430" x2="580" y2="430" stroke="red" stroke-width="2"/>
<line x1="580" y1="350" x2="580" y2="430" stroke="red" stroke-width="2"/>
<polygon points='380,300,400,300,380,340,400,340' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='380,350,400,350,380,390,400,390' fill='white' stroke='black' stroke-width='2' ></polygon>

<path d="M 450 400 A 30 20 0 0 1 530 400 L530 530 A30 20 0 0 1 450 530z" stroke="black" stroke="#000" fill="gray" />
<line x1="450" y1="400" x2="530" y2="400" stroke="black" stroke-width="2"/>
<line x1="450" y1="530" x2="530" y2="530" stroke="black" stroke-width="2"/>
<rect x="475" y="410" width="30" height="110" fill="gray" stroke="white" stroke-width="2"></rect>
<text x="480" y="435" fill="black" font-size="20" font-family="Arial">一</text>
<text x="480" y="460" fill="black" font-size="20" font-family="Arial">级</text>
<text x="480" y="485" fill="black" font-size="20" font-family="Arial">高</text>
<text x="480" y="510" fill="black" font-size="20" font-family="Arial">加</text>
<text x="478" y="550" fill="black" font-size="20" font-family="Arial">A1</text>
<!--B2组高压加热器610--!>
<text x="720" y="25" fill="black" font-size="20" font-family="Arial">锅炉给水母管</text>
<line x1="780" y1="30" x2="780" y2="300" stroke="green" stroke-width="2"/>
<line x1="780" y1="150" x2="1130" y2="150" stroke="green" stroke-width="2"/>
<line x1="840" y1="242" x2="1070" y2="242" stroke="green" stroke-width="2"/>
<line x1="830" y1="390" x2="830" y2="510" stroke="green" stroke-width="2"/>
<line x1="790" y1="390" x2="790" y2="630" stroke="green" stroke-width="2"/>
<polygon points='780,570,800,570,780,610,800,610' fill='white' stroke='black' stroke-width='2' ></polygon>
<line x1="790" y1="630" x2="910" y2="630" stroke="green" stroke-width="2"/>
<line x1="960" y1="630" x2="1080" y2="630" stroke="green" stroke-width="2"/>

<line x1="910" y1="630" x2="910" y2="720" stroke="green" stroke-width="2"/>
<line x1="960" y1="630" x2="960" y2="720" stroke="green" stroke-width="2"/>
<line x1="910" y1="720" x2="960" y2="720" stroke="green" stroke-width="2"/>
<line x1="935" y1="720" x2="935" y2="750" stroke="green" stroke-width="2"/>
<text x="890" y="770" fill="black" font-size="20" font-family="Arial">疏水扩容器</text>
<polygon points='900,650,920,650,900,690,920,690' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='950,650,970,650,950,690,970,690' fill='white' stroke='black' stroke-width='2' ></polygon>

<text x="665" y="160" fill="black" font-size="20" font-family="Arial">中压蒸汽</text>
<line x1="710" y1="170" x2="710" y2="320" stroke="red" stroke-width="2"/>
<line x1="710" y1="320" x2="770" y2="320" stroke="red" stroke-width="2"/>
<line x1="750" y1="280" x2="770" y2="280" stroke="red" stroke-width="2"/>
<line x1="750" y1="280" x2="750" y2="120" stroke="red" stroke-width="2"/>
<polygon points='700,190,720,190,700,230,720,230' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='700,240,720,240,700,280,720,280' fill='white' stroke='black' stroke-width='2' ></polygon>

<path d="M 770 260 A 30 20 0 0 1 850 260 L850 390 A30 20 0 0 1 770 390z" stroke="black" stroke="#000" fill="gray" />
<line x1="770" y1="260" x2="850" y2="260" stroke="black" stroke-width="2"/>
<line x1="770" y1="390" x2="850" y2="390" stroke="black" stroke-width="2"/>
<rect x="795" y="270" width="30" height="110" fill="gray" stroke="white" stroke-width="2"></rect>
<text x="800" y="295" fill="black" font-size="20" font-family="Arial">二</text>
<text x="800" y="320" fill="black" font-size="20" font-family="Arial">级</text>
<text x="800" y="345" fill="black" font-size="20" font-family="Arial">高</text>
<text x="800" y="370" fill="black" font-size="20" font-family="Arial">加</text>
<text x="798" y="410" fill="black" font-size="20" font-family="Arial">B2</text>
<!--B1组高压加热器--!>
<text x="1050" y="25" fill="black" font-size="20" font-family="Arial">给水泵出口水母管</text>
<line x1="1130" y1="30" x2="1130" y2="400" stroke="green" stroke-width="2"/>
<line x1="1070" y1="242" x2="1070" y2="400" stroke="green" stroke-width="2"/>
<line x1="830" y1="510" x2="1070" y2="510" stroke="green" stroke-width="2"/>
<polygon points='850,500,850,520,890,500,890,520' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='1000,500,1000,520,1040,500,1040,520' fill='white' stroke='black' stroke-width='2' ></polygon>
<line x1="1080" y1="490" x2="1080" y2="630" stroke="green" stroke-width="2"/>
<polygon points='1070,570,1090,570,1070,610,1090,610' fill='white' stroke='black' stroke-width='2' ></polygon>
<line x1="1120" y1="490" x2="1120" y2="830" stroke="green" stroke-width="2"/>
<polygon points='1110,570,1130,570,1110,610,1130,610' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='1110,630,1130,630,1110,670,1130,670' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='1110,750,1130,750,1110,790,1130,790' fill='white' stroke='black' stroke-width='2' ></polygon>

<text x="960" y="270" fill="black" font-size="20" font-family="Arial">低压蒸汽</text>
<text x="690" y="377" fill="black" font-size="20" font-family="Arial">就地</text>
<text x="985" y="463" fill="black" font-size="20" font-family="Arial">故障</text>
<text x="985" y="487" fill="black" font-size="20" font-family="Arial">就地</text>
<line x1="1000" y1="280" x2="1000" y2="430" stroke="red" stroke-width="2"/>
<line x1="1000" y1="430" x2="1060" y2="430" stroke="red" stroke-width="2"/>
<line x1="1140" y1="430" x2="1190" y2="430" stroke="red" stroke-width="2"/>
<line x1="1190" y1="350" x2="1190" y2="430" stroke="red" stroke-width="2"/>
<polygon points='990,300,1010,300,990,340,1010,340' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='990,350,1010,350,990,390,1010,390' fill='white' stroke='black' stroke-width='2' ></polygon>

<path d="M 1060 400 A 30 20 0 0 1 1140 400 L1140 530 A30 20 0 0 1 1060 530z" stroke="black" stroke="#000" fill="gray" />
<line x1="1060" y1="400" x2="1140" y2="400" stroke="black" stroke-width="2"/>
<line x1="1060" y1="530" x2="1140" y2="530" stroke="black" stroke-width="2"/>
<rect x="1085" y="410" width="30" height="110" fill="gray" stroke="white" stroke-width="2"></rect>
<text x="1090" y="435" fill="black" font-size="20" font-family="Arial">一</text>
<text x="1090" y="460" fill="black" font-size="20" font-family="Arial">级</text>
<text x="1090" y="485" fill="black" font-size="20" font-family="Arial">高</text>
<text x="1090" y="510" fill="black" font-size="20" font-family="Arial">加</text>
<text x="1088" y="550" fill="black" font-size="20" font-family="Arial">B1</text>
<!--C2组高压加热器610--!>
<text x="1330" y="25" fill="black" font-size="20" font-family="Arial">锅炉给水母管</text>
<line x1="1390" y1="30" x2="1390" y2="300" stroke="green" stroke-width="2"/>
<line x1="1390" y1="150" x2="1740" y2="150" stroke="green" stroke-width="2"/>
<line x1="1450" y1="242" x2="1680" y2="242" stroke="green" stroke-width="2"/>
<line x1="1440" y1="390" x2="1440" y2="510" stroke="green" stroke-width="2"/>
<line x1="1400" y1="390" x2="1400" y2="630" stroke="green" stroke-width="2"/>
<polygon points='1390,570,1410,570,1390,610,1410,610' fill='white' stroke='black' stroke-width='2' ></polygon>
<line x1="1400" y1="630" x2="1520" y2="630" stroke="green" stroke-width="2"/>
<line x1="1570" y1="630" x2="1690" y2="630" stroke="green" stroke-width="2"/>

<line x1="1520" y1="630" x2="1520" y2="720" stroke="green" stroke-width="2"/>
<line x1="1570" y1="630" x2="1570" y2="720" stroke="green" stroke-width="2"/>
<line x1="1520" y1="720" x2="1570" y2="720" stroke="green" stroke-width="2"/>
<line x1="1545" y1="720" x2="1545" y2="750" stroke="green" stroke-width="2"/>
<text x="1500" y="770" fill="black" font-size="20" font-family="Arial">疏水扩容器</text>
<polygon points='1510,650,1530,650,1510,690,1530,690' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='1560,650,1580,650,1560,690,1580,690' fill='white' stroke='black' stroke-width='2' ></polygon>

<text x="1275" y="160" fill="black" font-size="20" font-family="Arial">中压蒸汽</text>
<line x1="1320" y1="170" x2="1320" y2="320" stroke="red" stroke-width="2"/>
<line x1="1320" y1="320" x2="1380" y2="320" stroke="red" stroke-width="2"/>
<line x1="1360" y1="280" x2="1380" y2="280" stroke="red" stroke-width="2"/>
<line x1="1360" y1="280" x2="1360" y2="120" stroke="red" stroke-width="2"/>
<polygon points='1310,190,1330,190,1310,230,1330,230' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='1310,240,1330,240,1310,280,1330,280' fill='white' stroke='black' stroke-width='2' ></polygon>

<path d="M 1380 260 A 30 20 0 0 1 1460 260 L1460 390 A30 20 0 0 1 1380 390z" stroke="black" stroke="#000" fill="gray" />
<line x1="1380" y1="260" x2="1460" y2="260" stroke="black" stroke-width="2"/>
<line x1="1380" y1="390" x2="1460" y2="390" stroke="black" stroke-width="2"/>
<rect x="1405" y="270" width="30" height="110" fill="gray" stroke="white" stroke-width="2"></rect>
<text x="1410" y="295" fill="black" font-size="20" font-family="Arial">二</text>
<text x="1410" y="320" fill="black" font-size="20" font-family="Arial">级</text>
<text x="1410" y="345" fill="black" font-size="20" font-family="Arial">高</text>
<text x="1410" y="370" fill="black" font-size="20" font-family="Arial">加</text>
<text x="1408" y="410" fill="black" font-size="20" font-family="Arial">C2</text>
<!--C1组高压加热器--!>
<text x="1660" y="25" fill="black" font-size="20" font-family="Arial">给水泵出口水母管</text>
<line x1="1740" y1="30" x2="1740" y2="400" stroke="green" stroke-width="2"/>
<line x1="1680" y1="242" x2="1680" y2="400" stroke="green" stroke-width="2"/>
<line x1="1440" y1="510" x2="1680" y2="510" stroke="green" stroke-width="2"/>
<polygon points='1460,500,1460,520,1500,500,1500,520' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='1610,500,1610,520,1650,500,1650,520' fill='white' stroke='black' stroke-width='2' ></polygon>
<line x1="1690" y1="490" x2="1690" y2="630" stroke="green" stroke-width="2"/>
<polygon points='1680,570,1700,570,1680,610,1700,610' fill='white' stroke='black' stroke-width='2' ></polygon>
<line x1="1730" y1="490" x2="1730" y2="830" stroke="green" stroke-width="2"/>
<polygon points='1720,570,1740,570,1720,610,1740,610' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='1720,630,1740,630,1720,670,1740,670' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='1720,750,1740,750,1720,790,1740,790' fill='white' stroke='black' stroke-width='2' ></polygon>

<text x="1570" y="270" fill="black" font-size="20" font-family="Arial">低压蒸汽</text>
<text x="1300" y="377" fill="black" font-size="20" font-family="Arial">就地</text>
<text x="1595" y="463" fill="black" font-size="20" font-family="Arial">故障</text>
<text x="1595" y="487" fill="black" font-size="20" font-family="Arial">就地</text>
<line x1="1610" y1="280" x2="1610" y2="430" stroke="red" stroke-width="2"/>
<line x1="1610" y1="430" x2="1670" y2="430" stroke="red" stroke-width="2"/>
<line x1="1750" y1="430" x2="1800" y2="430" stroke="red" stroke-width="2"/>
<line x1="1800" y1="350" x2="1800" y2="430" stroke="red" stroke-width="2"/>
<polygon points='1600,300,1620,300,1600,340,1620,340' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='1600,350,1620,350,1600,390,1620,390' fill='white' stroke='black' stroke-width='2' ></polygon>

<path d="M 1670 400 A 30 20 0 0 1 1750 400 L1750 530 A30 20 0 0 1 1670 530z" stroke="black" stroke="#000" fill="gray" />
<line x1="1670" y1="400" x2="1750" y2="400" stroke="black" stroke-width="2"/>
<line x1="1670" y1="530" x2="1750" y2="530" stroke="black" stroke-width="2"/>
<rect x="1695" y="410" width="30" height="110" fill="gray" stroke="white" stroke-width="2"></rect>
<text x="1700" y="435" fill="black" font-size="20" font-family="Arial">一</text>
<text x="1700" y="460" fill="black" font-size="20" font-family="Arial">级</text>
<text x="1700" y="485" fill="black" font-size="20" font-family="Arial">高</text>
<text x="1700" y="510" fill="black" font-size="20" font-family="Arial">加</text>
<text x="1698" y="550" fill="black" font-size="20" font-family="Arial">C1</text>
<!--高压加热器疏水母管--!>
<line x1="510" y1="830" x2="1730" y2="830" stroke="green" stroke-width="3"/>
<polygon points='580,820,580,840,620,820,620,840' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='500,860,520,860,500,900,520,900' fill='white' stroke='black' stroke-width='2' ></polygon>
<text x="500" y="950" fill="black" font-size="20" font-family="Arial">2号除氧器</text>









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
