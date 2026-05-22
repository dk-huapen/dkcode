<html>
	<head>
    		<title>次高压蒸汽系统</title>
		<?php include("../header.php")?>
	</head>
	<body>
		<?php include("top.php")?>
		<center><h1>次高压蒸汽系统</h1></center>
		<script>
			var page = 203;
			var test =<?php
			include('../conn.php');
			#$sql="SELECT kks,name,value,unit,updatetime,HH,H,HHH,L,LL,LLL,flag,angle,indexID,X,Y FROM sis where page=203 or page1=203";
			$sql="SELECT kks,name,value,unit,updatetime,HH,H,HHH,L,LL,LLL,flag,angle,indexID,X,Y FROM sis where page=203 union SELECT kks,name,value,unit,updatetime,HH,H,HHH,L,LL,LLL,flag,angle1,indexID,X1,Y1 FROM sis where page1=203";
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



<line x1="160" y1="440" x2="1700" y2="440" stroke="red" stroke-width="4"/><!--次高压蒸汽母管-->

<line x1="940" y1="390" x2="1070" y2="390" stroke="red" stroke-width="2"/>
<line x1="940" y1="390" x2="940" y2="440" stroke="red" stroke-width="2"/>
<line x1="1070" y1="390" x2="1070" y2="440" stroke="red" stroke-width="2"/>
<polygon points='960,380,960,400,1000,380,1000,400' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='1010,380,1010,400,1050,380,1050,400' fill='white' stroke='black' stroke-width='2' ></polygon>


<!--3号汽轮机排汽管道-->
<line x1="160" y1="55" x2="160" y2="440" stroke="red" stroke-width="2"/>
<line x1="230" y1="55" x2="30" y2="55" stroke="red" stroke-width="2"/>
<line x1="30" y1="55" x2="30" y2="10" stroke="red" stroke-width="2"/>
<polygon points='230,5 330,35 330,75 230,105'fill='gray' stroke='black' stroke-width='2'></polygon>
<text x="235" y="60" fill="black" font-size="20" font-family="Arial">3号汽轮机</text>


<line x1="160" y1="80" x2="210" y2="80" stroke="red" stroke-width="2"/>
<line x1="210" y1="80" x2="210" y2="190" stroke="red" stroke-width="2"/>
<line x1="160" y1="190" x2="210" y2="190" stroke="red" stroke-width="2"/>
<polygon points='200,90,220,90,200,130,220,130' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='200,140,220,140,200,180,220,180' fill='white' stroke='black' stroke-width='2' ></polygon>

<line x1="160" y1="200" x2="210" y2="200" stroke="red" stroke-width="2"/>
<line x1="210" y1="200" x2="210" y2="310" stroke="red" stroke-width="2"/>
<line x1="160" y1="310" x2="210" y2="310" stroke="red" stroke-width="2"/>
<polygon points='200,210,220,210,200,250,220,250' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='200,260,220,260,200,300,220,300' fill='white' stroke='black' stroke-width='2' ></polygon>

<line x1="160" y1="320" x2="210" y2="320" stroke="red" stroke-width="2"/>
<line x1="210" y1="320" x2="210" y2="430" stroke="red" stroke-width="2"/>
<line x1="160" y1="430" x2="210" y2="430" stroke="red" stroke-width="2"/>
<polygon points='200,330,220,330,200,370,220,370' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='200,380,220,380,200,420,220,420' fill='white' stroke='black' stroke-width='2' ></polygon>
<!--一段高压主蒸汽管道-->
<line x1="350" y1="30" x2="810" y2="30" stroke="red" stroke-width="2"/>
<line x1="350" y1="30" x2="350" y2="440" stroke="red" stroke-width="2"/>

<line x1="570" y1="80" x2="690" y2="80" stroke="red" stroke-width="2"/>
<line x1="570" y1="80" x2="570" y2="30" stroke="red" stroke-width="2"/>
<line x1="690" y1="80" x2="690" y2="30" stroke="red" stroke-width="2"/>
<polygon points='580,70,580,90,620,70,620,90' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='640,70,640,90,680,70,680,90' fill='white' stroke='black' stroke-width='2' ></polygon>

<line x1="350" y1="100" x2="300" y2="100" stroke="red" stroke-width="2"/>
<line x1="300" y1="100" x2="300" y2="220" stroke="red" stroke-width="2"/>
<line x1="350" y1="220" x2="300" y2="220" stroke="red" stroke-width="2"/>
<polygon points='290,110,310,110,290,150,310,150' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='290,170,310,170,290,210,310,210' fill='white' stroke='black' stroke-width='2' ></polygon>

<line x1="350" y1="280" x2="300" y2="280" stroke="red" stroke-width="2"/>
<line x1="300" y1="280" x2="300" y2="400" stroke="red" stroke-width="2"/>
<line x1="350" y1="400" x2="300" y2="400" stroke="red" stroke-width="2"/>
<polygon points='290,290,310,290,290,330,310,330' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='290,350,310,350,290,390,310,390' fill='white' stroke='black' stroke-width='2' ></polygon>
<!--减温水-->
<circle cx='420' cy='30' r='20' fill='white' stroke='black' stroke-width='2'></circle>
<line x1="420" y1="50" x2="420" y2="170" stroke="green" stroke-width="2"/>
<line x1="800" y1="170" x2="420" y2="170" stroke="green" stroke-width="2"/>
<line x1="545" y1="100" x2="420" y2="100" stroke="green" stroke-width="2"/>
<line x1="545" y1="100" x2="545" y2="170" stroke="green" stroke-width="2"/>
<polygon points='570,160,570,180,610,160,610,180' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='670,160,670,180,710,160,710,180' fill='white' stroke='black' stroke-width='2' ></polygon>
<!--一段次高压外供主蒸汽管道-->
<line x1="900" y1="10" x2="900" y2="440" stroke="red" stroke-width="2"/>

<line x1="900" y1="50" x2="850" y2="50" stroke="red" stroke-width="2"/>
<line x1="850" y1="50" x2="850" y2="170" stroke="red" stroke-width="2"/>
<line x1="900" y1="170" x2="850" y2="170" stroke="red" stroke-width="2"/>
<polygon points='840,60,860,60,840,100,860,100' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='840,120,860,120,840,160,860,160' fill='white' stroke='black' stroke-width='2' ></polygon>

<line x1="900" y1="280" x2="850" y2="280" stroke="red" stroke-width="2"/>
<line x1="850" y1="280" x2="850" y2="400" stroke="red" stroke-width="2"/>
<line x1="900" y1="400" x2="850" y2="400" stroke="red" stroke-width="2"/>
<polygon points='840,290,860,290,840,330,860,330' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='840,350,860,350,840,390,860,390' fill='white' stroke='black' stroke-width='2' ></polygon>

<line x1="550" y1="240" x2="880" y2="240" stroke="green" stroke-width="2"/>
<text x="570" y="230" fill="black" font-size="20" font-family="Arial">高压给水</text>
<circle cx='900' cy='240' r='20' fill='white' stroke='black' stroke-width='2'></circle>
<polygon points='760,230,760,250,800,230,800,250' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='660,230,660,250,700,230,700,250' fill='white' stroke='black' stroke-width='2' ></polygon>
<!--PCV蒸汽管道-->
<line x1="1100" y1="250" x2="1100" y2="440" stroke="red" stroke-width="2"/>
<!--二段高压主蒸汽管道-->
<line x1="1700" y1="30" x2="1240" y2="30" stroke="red" stroke-width="2"/>
<line x1="1700" y1="30" x2="1700" y2="440" stroke="red" stroke-width="2"/>
<text x="1250" y="25" fill="black" font-size="20" font-family="Arial">二段高压主蒸汽</text>

<line x1="1370" y1="80" x2="1490" y2="80" stroke="red" stroke-width="2"/>
<line x1="1370" y1="80" x2="1370" y2="30" stroke="red" stroke-width="2"/>
<line x1="1490" y1="80" x2="1490" y2="30" stroke="red" stroke-width="2"/>
<polygon points='1380,70,1380,90,1420,70,1420,90' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='1440,70,1440,90,1480,70,1480,90' fill='white' stroke='black' stroke-width='2' ></polygon>

<line x1="1700" y1="100" x2="1750" y2="100" stroke="red" stroke-width="2"/>
<line x1="1750" y1="100" x2="1750" y2="220" stroke="red" stroke-width="2"/>
<line x1="1700" y1="220" x2="1750" y2="220" stroke="red" stroke-width="2"/>
<polygon points='1740,110,1760,110,1740,150,1760,150' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='1740,170,1760,170,1740,210,1760,210' fill='white' stroke='black' stroke-width='2' ></polygon>

<line x1="1700" y1="250" x2="1810" y2="250" stroke="green" stroke-width="2"/>
<line x1="1810" y1="250" x2="1810" y2="350" stroke="green" stroke-width="2"/>
<polygon points='1720,240,1720,260,1760,240,1760,260' fill='white' stroke='black' stroke-width='2' ></polygon>

<line x1="1700" y1="280" x2="1750" y2="280" stroke="red" stroke-width="2"/>
<line x1="1750" y1="280" x2="1750" y2="400" stroke="red" stroke-width="2"/>
<line x1="1700" y1="400" x2="1750" y2="400" stroke="red" stroke-width="2"/>
<polygon points='1740,290,1760,290,1740,330,1760,330' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='1740,350,1760,350,1740,390,1760,390' fill='white' stroke='black' stroke-width='2' ></polygon>
<!--减温水-->
<circle cx='1630' cy='30' r='20' fill='white' stroke='black' stroke-width='2'></circle>
<line x1="1630" y1="50" x2="1630" y2="170" stroke="green" stroke-width="2"/>
<line x1="1250" y1="170" x2="1630" y2="170" stroke="green" stroke-width="2"/>
<line x1="1505" y1="100" x2="1630" y2="100" stroke="green" stroke-width="2"/>
<line x1="1505" y1="100" x2="1505" y2="170" stroke="green" stroke-width="2"/>
<polygon points='1340,160,1340,180,1380,160,1380,180' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='1440,160,1440,180,1480,160,1480,180' fill='white' stroke='black' stroke-width='2' ></polygon>
<!--一段次高压至低低压蒸汽母管-->
<line x1="210" y1="440" x2="210" y2="905" stroke="red" stroke-width="3"/>

<polygon points='200,495,220,495,200,535,220,535' fill='white' stroke='black' stroke-width='2' ></polygon>

<line x1="210" y1="455" x2="260" y2="455" stroke="red" stroke-width="2"/>
<line x1="260" y1="455" x2="260" y2="575" stroke="red" stroke-width="2"/>
<line x1="210" y1="575" x2="260" y2="575" stroke="red" stroke-width="2"/>
<polygon points='250,470,270,470,250,510,270,510' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='250,520,270,520,250,560,270,560' fill='white' stroke='black' stroke-width='2' ></polygon>

<line x1="210" y1="625" x2="260" y2="625" stroke="red" stroke-width="2"/>
<line x1="260" y1="625" x2="260" y2="745" stroke="red" stroke-width="2"/>
<line x1="210" y1="745" x2="260" y2="745" stroke="red" stroke-width="2"/>
<polygon points='250,640,270,640,250,680,270,680' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='250,690,270,690,250,730,270,730' fill='white' stroke='black' stroke-width='2' ></polygon>

<circle cx='210' cy='830' r='20' fill='white' stroke='black' stroke-width='2'></circle>

<line x1="360" y1="830" x2="360" y2="580" stroke="green" stroke-width="2"/>
<line x1="230" y1="830" x2="360" y2="830" stroke="green" stroke-width="2"/>


<polygon points='350,610,370,610,350,650,370,650' fill='white' stroke='black' stroke-width='2' ></polygon>

<polygon points='350,720,370,720,350,760,370,760' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='350,770,370,770,350,810,370,810' fill='white' stroke='black' stroke-width='2' ></polygon>
<text x="100" y="940" fill="black" font-size="20" font-family="Arial">至一段低低压蒸汽管网</text>

<!--二段次高压外供蒸汽母管-->
<line x1="490" y1="440" x2="490" y2="905" stroke="red" stroke-width="3"/>

<line x1="490" y1="455" x2="540" y2="455" stroke="red" stroke-width="2"/>
<line x1="540" y1="455" x2="540" y2="575" stroke="red" stroke-width="2"/>
<line x1="490" y1="575" x2="540" y2="575" stroke="red" stroke-width="2"/>
<polygon points='530,470,550,470,530,510,550,510' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='530,520,550,520,530,560,550,560' fill='white' stroke='black' stroke-width='2' ></polygon>

<circle cx='490' cy='700' r='20' fill='white' stroke='black' stroke-width='2'></circle>

<line x1="640" y1="700" x2="640" y2="520" stroke="green" stroke-width="2"/>
<line x1="510" y1="700" x2="640" y2="700" stroke="green" stroke-width="2"/>


<polygon points='630,540,650,540,630,580,650,580' fill='white' stroke='black' stroke-width='2' ></polygon>

<polygon points='630,640,650,640,630,680,650,680' fill='white' stroke='black' stroke-width='2' ></polygon>

<line x1="490" y1="755" x2="540" y2="755" stroke="red" stroke-width="2"/>
<line x1="540" y1="755" x2="540" y2="875" stroke="red" stroke-width="2"/>
<line x1="490" y1="875" x2="540" y2="875" stroke="red" stroke-width="2"/>
<polygon points='530,770,550,770,530,810,550,810' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='530,820,550,820,530,860,550,860' fill='white' stroke='black' stroke-width='2' ></polygon>
<text x="390" y="940" fill="black" font-size="20" font-family="Arial">二段次高压外供蒸汽</text>
<!--4号汽轮机进行汽母管-->
<line x1="770" y1="440" x2="770" y2="900" stroke="red" stroke-width="3"/>
<line x1="770" y1="900" x2="780" y2="900" stroke="red" stroke-width="3"/>

<line x1="770" y1="455" x2="820" y2="455" stroke="red" stroke-width="2"/>
<line x1="820" y1="455" x2="820" y2="575" stroke="red" stroke-width="2"/>
<line x1="770" y1="575" x2="820" y2="575" stroke="red" stroke-width="2"/>
<polygon points='810,470,830,470,810,510,830,510' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='810,520,830,520,810,560,830,560' fill='white' stroke='black' stroke-width='2' ></polygon>

<line x1="770" y1="625" x2="820" y2="625" stroke="red" stroke-width="2"/>
<line x1="820" y1="625" x2="820" y2="745" stroke="red" stroke-width="2"/>
<line x1="770" y1="745" x2="820" y2="745" stroke="red" stroke-width="2"/>
<polygon points='810,640,830,640,810,680,830,680' fill='white' stroke='black' stroke-width='2' ></polygon>

<polygon points='780,880 880,850 880,950 780,920'fill='gray' stroke='black' stroke-width='2'></polygon>
<text x="785" y="905" fill="black" font-size="20" font-family="Arial">4号汽轮机</text>
<!--5号汽轮机进行汽母管-->
<line x1="1110" y1="440" x2="1110" y2="900" stroke="red" stroke-width="3"/>
<line x1="1110" y1="900" x2="1210" y2="900" stroke="red" stroke-width="3"/>

<line x1="1110" y1="455" x2="1160" y2="455" stroke="red" stroke-width="2"/>
<line x1="1160" y1="455" x2="1160" y2="575" stroke="red" stroke-width="2"/>
<line x1="1110" y1="575" x2="1160" y2="575" stroke="red" stroke-width="2"/>
<polygon points='1150,470,1170,470,1150,510,1170,510' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='1150,520,1170,520,1150,560,1170,560' fill='white' stroke='black' stroke-width='2' ></polygon>

<line x1="1110" y1="625" x2="1160" y2="625" stroke="red" stroke-width="2"/>
<line x1="1160" y1="625" x2="1160" y2="745" stroke="red" stroke-width="2"/>
<line x1="1110" y1="745" x2="1160" y2="745" stroke="red" stroke-width="2"/>
<polygon points='1150,640,1170,640,1150,680,1170,680' fill='white' stroke='black' stroke-width='2' ></polygon>

<polygon points='1120,880 1220,850 1220,950 1120,920'fill='gray' stroke='black' stroke-width='2'></polygon>
<text x="1125" y="905" fill="black" font-size="20" font-family="Arial">5号汽轮机</text>
<!--至二段低低压蒸汽管网-->
<line x1="1390" y1="440" x2="1390" y2="905" stroke="red" stroke-width="3"/>

<polygon points='1380,495,1400,495,1380,535,1400,535' fill='white' stroke='black' stroke-width='2' ></polygon>

<line x1="1390" y1="455" x2="1440" y2="455" stroke="red" stroke-width="2"/>
<line x1="1440" y1="455" x2="1440" y2="575" stroke="red" stroke-width="2"/>
<line x1="1390" y1="575" x2="1440" y2="575" stroke="red" stroke-width="2"/>
<polygon points='1430,470,1450,470,1430,510,1450,510' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='1430,520,1450,520,1430,560,1450,560' fill='white' stroke='black' stroke-width='2' ></polygon>

<line x1="1390" y1="625" x2="1440" y2="625" stroke="red" stroke-width="2"/>
<line x1="1440" y1="625" x2="1440" y2="745" stroke="red" stroke-width="2"/>
<line x1="1390" y1="745" x2="1440" y2="745" stroke="red" stroke-width="2"/>
<polygon points='1430,640,1450,640,1430,680,1450,680' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='1430,690,1450,690,1430,730,1450,730' fill='white' stroke='black' stroke-width='2' ></polygon>

<circle cx='1390' cy='830' r='20' fill='white' stroke='black' stroke-width='2'></circle>

<line x1="1540" y1="830" x2="1540" y2="580" stroke="green" stroke-width="2"/>
<line x1="1410" y1="830" x2="1540" y2="830" stroke="green" stroke-width="2"/>


<polygon points='1530,610,1550,610,1530,650,1550,650' fill='white' stroke='black' stroke-width='2' ></polygon>

<polygon points='1530,720,1550,720,1530,760,1550,760' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='1530,770,1550,770,1530,810,1550,810' fill='white' stroke='black' stroke-width='2' ></polygon>

<polygon points='1580,700,1580,720,1620,700,1620,720' fill='white' stroke='black' stroke-width='2' ></polygon>
<text x="1310" y="940" fill="black" font-size="20" font-family="Arial">至二段低低压蒸汽管网</text>
<!--汽动给水泵进汽母管-->
<line x1="1670" y1="440" x2="1670" y2="900" stroke="red" stroke-width="3"/>
<line x1="1670" y1="900" x2="1680" y2="900" stroke="red" stroke-width="3"/>

<polygon points='1660,495,1680,495,1660,535,1680,535' fill='white' stroke='black' stroke-width='2' ></polygon>

<line x1="1670" y1="455" x2="1720" y2="455" stroke="red" stroke-width="2"/>
<line x1="1720" y1="455" x2="1720" y2="575" stroke="red" stroke-width="2"/>
<line x1="1670" y1="575" x2="1720" y2="575" stroke="red" stroke-width="2"/>
<polygon points='1710,470,1730,470,1710,510,1730,510' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='1710,520,1730,520,1710,560,1730,560' fill='white' stroke='black' stroke-width='2' ></polygon>

<line x1="1670" y1="625" x2="1720" y2="625" stroke="red" stroke-width="2"/>
<line x1="1720" y1="625" x2="1720" y2="745" stroke="red" stroke-width="2"/>
<line x1="1670" y1="745" x2="1720" y2="745" stroke="red" stroke-width="2"/>
<polygon points='1710,640,1730,640,1710,680,1730,680' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='1710,690,1730,690,1710,730,1730,730' fill='white' stroke='black' stroke-width='2' ></polygon>

<polygon points='1680,880 1850,850 1850,950 1680,920'fill='gray' stroke='black' stroke-width='2'></polygon>
<text x="1685" y="905" fill="black" font-size="20" font-family="Arial">给水泵汽轮机</text>






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
