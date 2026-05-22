<html>
	<head>
    		<title>4号汽轮机油系统</title>
		<?php include("../header.php")?>
	</head>
	<body>
		<?php include("top.php")?>
		<center><h1>4号汽轮机油系统</h1></center>
		<script>
			var page = 323;
			var test =<?php
			include('../conn.php');
			$sql="SELECT kks,name,value,unit,updatetime,HH,H,HHH,L,LL,LLL,flag,angle,indexID,X,Y FROM sis where page=323 union SELECT kks,name,value,unit,updatetime,HH,H,HHH,L,LL,LLL,flag,angle1,indexID,X1,Y1 FROM sis where page1=323";
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



<line x1="1850" y1="10" x2="1850" y2="875" stroke="orange" stroke-width="2"/>
<!---EH油箱---->
<rect x="1380" y="830" width="360" height="120" fill="orange" stroke="black" stroke-width="1"></rect>
<text x="1635" y="860" fill="black" font-size="22" font-family="Arial">控制油箱</text>
<text x="1420" y="855" fill="black" font-size="20" font-family="Arial">油位高报警(500mm)</text>
<text x="1420" y="880" fill="black" font-size="20" font-family="Arial">油位低报警(300mm)</text>
<text x="1420" y="905" fill="black" font-size="20" font-family="Arial">油位低低报警(180mm)</text>
<line x1="1420" y1="500" x2="1420" y2="830" stroke="orange" stroke-width="2"/>
<line x1="1520" y1="600" x2="1520" y2="830" stroke="orange" stroke-width="2"/>
<line x1="1420" y1="600" x2="1520" y2="600" stroke="orange" stroke-width="2"/>
<line x1="1420" y1="500" x2="1770" y2="500" stroke="orange" stroke-width="2"/>
<line x1="1770" y1="500" x2="1770" y2="390" stroke="orange" stroke-width="2"/>
<line x1="1420" y1="390" x2="1770" y2="390" stroke="orange" stroke-width="2"/>

<circle cx="1420" cy="670" r="13" fill="gray" stroke="black" stroke-width="2"></circle>
<line x1="1407" y1="670" x2="1433" y2="670" stroke="black" stroke-width="3"/>

<circle cx="1520" cy="670" r="13" fill="gray" stroke="black" stroke-width="2"></circle>
<line x1="1507" y1="670" x2="1533" y2="670" stroke="black" stroke-width="3"/>


<text x="1515" y="420" fill="black" font-size="18" font-family="Arial">OPC油压低(10MPa)</text>
<text x="1695" y="716" fill="black" font-size="18" font-family="Arial">冷却泵状态</text>
<text x="1705" y="741" fill="black" font-size="18" font-family="Arial">就地手动运行</text>
<text x="1705" y="766" fill="black" font-size="18" font-family="Arial">就地手动停止</text>
<text x="1705" y="791" fill="black" font-size="18" font-family="Arial">温控仪温度高</text>
<text x="1705" y="816" fill="black" font-size="18" font-family="Arial">温控仪温度低</text>
<line x1="1600" y1="450" x2="1600" y2="830" stroke="orange" stroke-width="2" stroke-dasharray="10 10"/>
<line x1="1480" y1="450" x2="1600" y2="450" stroke="orange" stroke-width="2" stroke-dasharray="10 10"/>

<line x1="1670" y1="570" x2="1670" y2="830" stroke="orange" stroke-width="2" stroke-dasharray="10 10"/>
<line x1="1670" y1="570" x2="1720" y2="570" stroke="orange" stroke-width="2" stroke-dasharray="10 10"/>
<line x1="1720" y1="370" x2="1720" y2="570" stroke="orange" stroke-width="2" stroke-dasharray="10 10"/>

<!---润滑油箱---->
<rect x="830" y="830" width="510" height="120" fill="orange" stroke="black" stroke-width="1"></rect>
<text x="1200" y="900" fill="black" font-size="22" font-family="Arial">润滑油箱</text>
<text x="1100" y="942" fill="black" font-size="20" font-family="Arial">注油器</text>
<text x="1030" y="943" fill="black" font-size="20" font-family="Arial">2B</text>
<text x="970" y="943" fill="black" font-size="20" font-family="Arial">2A</text>

<line x1="870" y1="500" x2="870" y2="830" stroke="orange" stroke-width="2"/>
<polygon points='860,580,880,580,860,620,880,620' fill='white' stroke='black' stroke-width='2' ></polygon>
<line x1="970" y1="500" x2="970" y2="830" stroke="orange" stroke-width="2"/>
<polygon points='960,580,980,580,960,620,980,620' fill='white' stroke='black' stroke-width='2' ></polygon>
<line x1="1070" y1="505" x2="1070" y2="830" stroke="orange" stroke-width="2"/>
<line x1="1070" y1="495" x2="1070" y2="430" stroke="orange" stroke-width="2"/>
<polygon points='1060,580,1080,580,1060,620,1080,620' fill='white' stroke='black' stroke-width='2' ></polygon>
<line x1="1110" y1="500" x2="1110" y2="830" stroke="orange" stroke-width="2"/>
<polygon points='1100,580,1120,580,1100,620,1120,620' fill='white' stroke='black' stroke-width='2' ></polygon>

<line x1="1140" y1="270" x2="1140" y2="830" stroke="orange" stroke-width="2"/>
<line x1="1160" y1="300" x2="1160" y2="830" stroke="orange" stroke-width="2"/>
<rect x="1130" y="250" width="20" height="20" fill="gray" stroke="black" stroke-width="1"></rect>
<rect x="1150" y="220" width="20" height="80" fill="gray" stroke="black" stroke-width="1"></rect>
<rect x="1170" y="230" width="70" height="60" fill="gray" stroke="black" stroke-width="1"></rect>
<rect x="1240" y="210" width="25" height="100" fill="gray" stroke="black" stroke-width="1"></rect>
<text x="1175" y="265" fill="black" font-size="20" font-family="Arial">主油泵</text>

<line x1="1110" y1="500" x2="340" y2="500" stroke="orange" stroke-width="2"/>

<line x1="1140" y1="430" x2="290" y2="430" stroke="orange" stroke-width="2"/>

<text x="830" y="820" fill="black" font-size="18" font-family="Arial">直流 油泵</text>
<text x="930" y="820" fill="black" font-size="18" font-family="Arial">交流 油泵</text>
<text x="1030" y="820" fill="black" font-size="18" font-family="Arial">高压 油泵</text>
<text x="1170" y="820" fill="black" font-size="18" font-family="Arial">1号排烟风机</text>

<line x1="590" y1="930" x2="190" y2="930" stroke="orange" stroke-width="2"/>
<line x1="190" y1="700" x2="190" y2="930" stroke="orange" stroke-width="2"/>
<line x1="30" y1="700" x2="190" y2="700" stroke="orange" stroke-width="2"/>
<text x="40" y="730" fill="black" font-size="20" font-family="Arial">去各轴承</text>

<line x1="590" y1="500" x2="590" y2="715" stroke="orange" stroke-width="2"/>
<line x1="590" y1="715" x2="630" y2="715" stroke="orange" stroke-width="2"/>

<line x1="590" y1="785" x2="590" y2="930" stroke="orange" stroke-width="2"/>
<line x1="590" y1="785" x2="630" y2="785" stroke="orange" stroke-width="2"/>

<line x1="340" y1="500" x2="340" y2="715" stroke="orange" stroke-width="2"/>
<line x1="340" y1="715" x2="380" y2="715" stroke="orange" stroke-width="2"/>

<line x1="340" y1="785" x2="340" y2="930" stroke="orange" stroke-width="2"/>
<line x1="340" y1="785" x2="380" y2="785" stroke="orange" stroke-width="2"/>
<!---冷油器A--->
<rect x="410" y="650" width="70" height="200" fill="gray" stroke="black" stroke-width="1"></rect>
<rect x="395" y="640" width="100" height="10" fill="gray" stroke="black" stroke-width="1"></rect>
<line x1="510" y1="675" x2="560" y2="675" stroke="green" stroke-width="2"/>
<text x="520" y="720" fill="black" font-size="18" font-family="Arial">出水</text>
<text x="510" y="740" fill="black" font-size="18" font-family="Arial">温度高</text>
<polygon points='510,662,500,662,500,670,480,670,480,680,500,680,500,688,510,688' fill='gray' stroke='black' stroke-width='2' ></polygon>
<rect x="395" y="690" width="100" height="10" fill="gray" stroke="black" stroke-width="1"></rect>
<polygon points='380,702,390,702,390,710,410,710,410,720,390,720,390,728,380,728' fill='gray' stroke='black' stroke-width='2' ></polygon>
<polygon points='380,772,390,772,390,780,410,780,410,790,390,790,390,798,380,798' fill='gray' stroke='black' stroke-width='2' ></polygon>
<rect x="395" y="800" width="100" height="10" fill="gray" stroke="black" stroke-width="1"></rect>
<polygon points='510,812,500,812,500,820,480,820,480,830,500,830,500,838,510,838' fill='gray' stroke='black' stroke-width='2' ></polygon>
<line x1="510" y1="825" x2="560" y2="825" stroke="green" stroke-width="2"/>
<text x="520" y="770" fill="black" font-size="18" font-family="Arial">进水</text>
<text x="510" y="790" fill="black" font-size="18" font-family="Arial">温度高</text>
<rect x="395" y="850" width="100" height="10" fill="gray" stroke="black" stroke-width="1"></rect>
<!---冷油器B--->
<rect x="660" y="650" width="70" height="200" fill="gray" stroke="black" stroke-width="1"></rect>
<rect x="645" y="640" width="100" height="10" fill="gray" stroke="black" stroke-width="1"></rect>
<line x1="760" y1="675" x2="810" y2="675" stroke="green" stroke-width="2"/>
<text x="770" y="720" fill="black" font-size="18" font-family="Arial">出水</text>
<text x="760" y="740" fill="black" font-size="18" font-family="Arial">温度高</text>
<polygon points='760,662,750,662,750,670,730,670,730,680,750,680,750,688,760,688' fill='gray' stroke='black' stroke-width='2' ></polygon>
<rect x="645" y="690" width="100" height="10" fill="gray" stroke="black" stroke-width="1"></rect>
<polygon points='630,702,640,702,640,710,660,710,660,720,640,720,640,728,630,728' fill='gray' stroke='black' stroke-width='2' ></polygon>
<polygon points='630,772,640,772,640,780,660,780,660,790,640,790,640,798,630,798' fill='gray' stroke='black' stroke-width='2' ></polygon>
<rect x="645" y="800" width="100" height="10" fill="gray" stroke="black" stroke-width="1"></rect>
<polygon points='760,812,750,812,750,820,730,820,730,830,750,830,750,838,760,838' fill='gray' stroke='black' stroke-width='2' ></polygon>
<line x1="760" y1="825" x2="810" y2="825" stroke="green" stroke-width="2"/>
<text x="770" y="770" fill="black" font-size="18" font-family="Arial">进水</text>
<text x="760" y="790" fill="black" font-size="18" font-family="Arial">温度高</text>
<rect x="645" y="850" width="100" height="10" fill="gray" stroke="black" stroke-width="1"></rect>
<!---滤油器--->
<polygon points='140,790,240,790,230,840,150,840' fill='gray' stroke='black' stroke-width='2' ></polygon>
<text x="160" y="823" fill="black" font-size="20" font-family="Arial">滤油器</text>












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
