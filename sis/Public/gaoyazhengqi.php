<html>
	<head>
    		<title>高压蒸汽系统</title>
		<?php include("../header.php")?>
	</head>
	<body>
		<?php include("top.php")?>
		<center><h1>高压蒸汽系统</h1></center>
		<script>
			var page = 202;
			var test =<?php
			include('../conn.php');
			//$sql="SELECT kks,name,value,unit,updatetime,HH,H,HHH,L,LL,LLL,flag,angle,indexID,X,Y FROM sis where page=202 or page1=202";
			$sql="SELECT kks,name,value,unit,updatetime,HH,H,HHH,L,LL,LLL,flag,angle,indexID,X,Y FROM sis where page=202 union SELECT kks,name,value,unit,updatetime,HH,H,HHH,L,LL,LLL,flag,angle1,indexID,X1,Y1 FROM sis where page1=202";
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

<line x1="100" y1="260" x2="100" y2="50" stroke="red" stroke-width="3"/><!--2号锅炉蒸汽母管-->
<line x1="100" y1="50" x2="300" y2="50" stroke="red" stroke-width="4"/><!--2号锅炉蒸汽母管-->

<line x1="510" y1="260" x2="510" y2="50" stroke="red" stroke-width="3"/><!--2号锅炉蒸汽母管-->
<line x1="510" y1="50" x2="700" y2="50" stroke="red" stroke-width="4"/><!--2号锅炉蒸汽母管-->

<line x1="980" y1="260" x2="980" y2="50" stroke="red" stroke-width="3"/><!--3号锅炉蒸汽母管-->
<line x1="980" y1="50" x2="1180" y2="50" stroke="red" stroke-width="4"/><!--3号锅炉蒸汽母管-->

<line x1="1350" y1="260" x2="1350" y2="50" stroke="red" stroke-width="3"/><!--3号锅炉蒸汽母管-->
<line x1="1350" y1="50" x2="1560" y2="50" stroke="red" stroke-width="4"/><!--3号锅炉蒸汽母管-->

<line x1="100" y1="260" x2="1360" y2="260" stroke="red" stroke-width="4"/><!--高压蒸汽母管-->

<line x1="750" y1="180" x2="910" y2="180" stroke="red" stroke-width="2"/>

<line x1="750" y1="260" x2="750" y2="180" stroke="red" stroke-width="2"/>
<line x1="910" y1="260" x2="910" y2="180" stroke="red" stroke-width="2"/>
<line x1="830" y1="260" x2="830" y2="180" stroke="red" stroke-width="2"/>
<polygon points='770,170,770,190,810,170,810,190' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='850,170,850,190,890,170,890,190' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='820,200,840,200,820,240,840,240' fill='white' stroke='black' stroke-width='2' ></polygon>

<!--一段高压至次高压压蒸汽母管-->
<line x1="140" y1="260" x2="140" y2="805" stroke="red" stroke-width="3"/>

<line x1="90" y1="290" x2="140" y2="290" stroke="red" stroke-width="2"/>
<line x1="90" y1="290" x2="90" y2="430" stroke="red" stroke-width="2"/>
<line x1="90" y1="430" x2="140" y2="430" stroke="red" stroke-width="2"/>
<polygon points='80,310,100,310,80,350,100,350' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='80,370,100,370,80,410,100,410' fill='white' stroke='black' stroke-width='2' ></polygon>

<line x1="90" y1="530" x2="140" y2="530" stroke="red" stroke-width="2"/>
<line x1="90" y1="530" x2="90" y2="670" stroke="red" stroke-width="2"/>
<line x1="90" y1="670" x2="140" y2="670" stroke="red" stroke-width="2"/>
<polygon points='80,550,100,550,80,590,100,590' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='80,610,100,610,80,650,100,650' fill='white' stroke='black' stroke-width='2' ></polygon>
<text x="70" y="830" fill="black" font-size="20" font-family="Arial">至一段次高压</text>
<!--高压至中压蒸汽母管-->
<line x1="310" y1="260" x2="310" y2="805" stroke="red" stroke-width="3"/>

<line x1="260" y1="290" x2="310" y2="290" stroke="red" stroke-width="2"/>
<line x1="260" y1="290" x2="260" y2="430" stroke="red" stroke-width="2"/>
<line x1="260" y1="430" x2="310" y2="430" stroke="red" stroke-width="2"/>
<polygon points='250,310,270,310,250,350,270,350' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='250,370,270,370,250,410,270,410' fill='white' stroke='black' stroke-width='2' ></polygon>

<line x1="260" y1="530" x2="310" y2="530" stroke="red" stroke-width="2"/>
<line x1="260" y1="530" x2="260" y2="670" stroke="red" stroke-width="2"/>
<line x1="260" y1="670" x2="310" y2="670" stroke="red" stroke-width="2"/>
<polygon points='250,550,270,550,250,590,270,590' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='250,610,270,610,250,650,270,650' fill='white' stroke='black' stroke-width='2' ></polygon>
<text x="250" y="830" fill="black" font-size="20" font-family="Arial">至中压</text>
<!--至3号汽轮机蒸汽母管-->
<line x1="480" y1="260" x2="480" y2="900" stroke="red" stroke-width="3"/>
<line x1="480" y1="900" x2="500" y2="900" stroke="red" stroke-width="3"/>

<line x1="430" y1="290" x2="480" y2="290" stroke="red" stroke-width="2"/>
<line x1="430" y1="290" x2="430" y2="430" stroke="red" stroke-width="2"/>
<line x1="430" y1="430" x2="480" y2="430" stroke="red" stroke-width="2"/>
<polygon points='420,310,440,310,420,350,440,350' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='420,370,440,370,420,410,440,410' fill='white' stroke='black' stroke-width='2' ></polygon>

<line x1="410" y1="550" x2="410" y2="720" stroke="red" stroke-width="2"/>
<line x1="480" y1="550" x2="410" y2="550" stroke="red" stroke-width="2"/>
<polygon points='400,580,420,580,400,620,420,620' fill='white' stroke='black' stroke-width='2' ></polygon>

<line x1="480" y1="520" x2="530" y2="520" stroke="red" stroke-width="2"/>
<line x1="480" y1="680" x2="530" y2="680" stroke="red" stroke-width="2"/>
<line x1="530" y1="520" x2="530" y2="680" stroke="red" stroke-width="2"/>
<polygon points='520,540,540,540,520,580,540,580' fill='white' stroke='black' stroke-width='2' ></polygon>


<polygon points='500,880 600,850 600,950 500,920'fill='gray' stroke='black' stroke-width='2'></polygon>
<text x="505" y="905" fill="black" font-size="20" font-family="Arial">3号汽轮机</text>
<!--至一段空分蒸汽母管-->
<line x1="650" y1="260" x2="650" y2="805" stroke="red" stroke-width="3"/>

<line x1="600" y1="290" x2="650" y2="290" stroke="red" stroke-width="2"/>
<line x1="600" y1="290" x2="600" y2="430" stroke="red" stroke-width="2"/>
<line x1="600" y1="430" x2="650" y2="430" stroke="red" stroke-width="2"/>
<polygon points='590,310,610,310,590,350,610,350' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='590,370,610,370,590,410,610,410' fill='white' stroke='black' stroke-width='2' ></polygon>

<line x1="600" y1="460" x2="650" y2="460" stroke="red" stroke-width="2"/>
<line x1="600" y1="460" x2="600" y2="600" stroke="red" stroke-width="2"/>
<line x1="600" y1="600" x2="650" y2="600" stroke="red" stroke-width="2"/>
<polygon points='590,480,610,480,590,520,610,520' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='590,540,610,540,590,580,610,580' fill='white' stroke='black' stroke-width='2' ></polygon>
<text x="600" y="830" fill="black" font-size="20" font-family="Arial">至一段空分</text>

<!--二段高压至次高压压蒸汽母管-->
<line x1="1020" y1="260" x2="1020" y2="705" stroke="red" stroke-width="3"/>

<line x1="970" y1="290" x2="1020" y2="290" stroke="red" stroke-width="2"/>
<line x1="970" y1="290" x2="970" y2="430" stroke="red" stroke-width="2"/>
<line x1="970" y1="430" x2="1020" y2="430" stroke="red" stroke-width="2"/>
<polygon points='960,310,980,310,960,350,980,350' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='960,370,980,370,960,410,980,410' fill='white' stroke='black' stroke-width='2' ></polygon>

<line x1="970" y1="530" x2="1020" y2="530" stroke="red" stroke-width="2"/>
<line x1="970" y1="530" x2="970" y2="670" stroke="red" stroke-width="2"/>
<line x1="970" y1="670" x2="1020" y2="670" stroke="red" stroke-width="2"/>
<polygon points='960,550,980,550,960,590,980,590' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='960,610,980,610,960,650,980,650' fill='white' stroke='black' stroke-width='2' ></polygon>
<text x="950" y="750" fill="black" font-size="20" font-family="Arial">至二段次高压</text>
<!--高压至低压蒸汽母管-->
<line x1="1190" y1="260" x2="1190" y2="705" stroke="red" stroke-width="3"/>

<line x1="1140" y1="290" x2="1190" y2="290" stroke="red" stroke-width="2"/>
<line x1="1140" y1="290" x2="1140" y2="430" stroke="red" stroke-width="2"/>
<line x1="1140" y1="430" x2="1190" y2="430" stroke="red" stroke-width="2"/>
<polygon points='1130,310,1150,310,1130,350,1150,350' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='1130,370,1150,370,1130,410,1150,410' fill='white' stroke='black' stroke-width='2' ></polygon>

<line x1="1140" y1="530" x2="1190" y2="530" stroke="red" stroke-width="2"/>
<line x1="1140" y1="530" x2="1140" y2="670" stroke="red" stroke-width="2"/>
<line x1="1140" y1="670" x2="1190" y2="670" stroke="red" stroke-width="2"/>
<polygon points='1130,550,1150,550,1130,590,1150,590' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='1130,610,1150,610,1130,650,1150,650' fill='white' stroke='black' stroke-width='2' ></polygon>
<!--至二段空分蒸汽母管-->
<line x1="1360" y1="260" x2="1360" y2="705" stroke="red" stroke-width="3"/>

<line x1="1300" y1="290" x2="1360" y2="290" stroke="red" stroke-width="2"/>
<line x1="1300" y1="290" x2="1300" y2="450" stroke="red" stroke-width="2"/>
<line x1="1300" y1="450" x2="1360" y2="450" stroke="red" stroke-width="2"/>
<line x1="1300" y1="370" x2="1360" y2="370" stroke="red" stroke-width="2"/>
<polygon points='1290,300,1310,300,1290,340,1310,340' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='1290,400,1310,400,1290,440,1310,440' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='1310,360,1310,380,1350,360,1350,380' fill='white' stroke='black' stroke-width='2' ></polygon>



<text x="710" y="940" fill="black" font-size="20" font-family="Arial">高压给水</text>
<line x1="650" y1="445" x2="850" y2="445" stroke="red" stroke-width="2"/><!--一段6.3蒸汽母管-->
<line x1="850" y1="445" x2="850" y2="930" stroke="red" stroke-width="2"/><!--一段6.3蒸汽母管-->
<circle cx='850' cy='690' r='20' fill='white' stroke='black' stroke-width='2'></circle>
<line x1="740" y1="920" x2="740" y2="690" stroke="green" stroke-width="2"/><!--一段6.3蒸汽减温水-->
<line x1="740" y1="690" x2="830" y2="690" stroke="green" stroke-width="2"/><!--一段6.3蒸汽减温水-->
<polygon points='730,760,750,760,730,800,750,800' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='730,860,750,860,730,900,750,900' fill='white' stroke='black' stroke-width='2' ></polygon>

<text x="1600" y="920" fill="black" font-size="20" font-family="Arial">高压给水</text>
<line x1="1360" y1="470" x2="1500" y2="470" stroke="red" stroke-width="2"/><!--二段6.3蒸汽母管-->
<line x1="1500" y1="470" x2="1500" y2="930" stroke="red" stroke-width="2"/><!--二段6.3蒸汽母管-->
<circle cx='1500' cy='690' r='20' fill='white' stroke='black' stroke-width='2'></circle>
<line x1="1580" y1="920" x2="1580" y2="690" stroke="green" stroke-width="2"/><!--一段6.3蒸汽减温水-->
<line x1="1580" y1="690" x2="1520" y2="690" stroke="green" stroke-width="2"/><!--一段6.3蒸汽减温水-->
<polygon points='1570,760,1590,760,1570,800,1590,800' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='1570,860,1590,860,1570,900,1590,900' fill='white' stroke='black' stroke-width='2' ></polygon>

<line x1="850" y1="790" x2="1500" y2="790" stroke="red" stroke-width="2"/><!--6.3蒸汽联络母管-->
<line x1="1130" y1="790" x2="1130" y2="840" stroke="red" stroke-width="2"/><!--至2.8蒸汽管网-->
<text x="1060" y="870" fill="black" font-size="20" font-family="Arial">至2.8蒸汽管网</text>
<polygon points='940,780,940,800,980,780,980,800' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='1280,780,1280,800,1320,780,1320,800' fill='white' stroke='black' stroke-width='2' ></polygon>
<line x1="850" y1="930" x2="1850" y2="930" stroke="red" stroke-width="2"/><!--6.3蒸汽母管-->
<text x="1550" y="955" fill="black" font-size="20" font-family="Arial">至合成次高压(6.3)蒸汽管路</text>





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
