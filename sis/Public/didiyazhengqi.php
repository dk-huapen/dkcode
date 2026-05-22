<html>
	<head>
    		<title>低低压蒸汽系统</title>
		<?php include("../header.php")?>
	</head>
	<body>
		<?php include("top.php")?>
		<center><h1>低低压蒸汽系统</h1></center>
		<script>
			var page = 206;
			var test =<?php
			include('../conn.php');
			#$sql="SELECT kks,name,value,unit,updatetime,HH,H,HHH,L,LL,LLL,flag,angle,indexID,X,Y FROM sis where page=203 or page1=203";
			$sql="SELECT kks,name,value,unit,updatetime,HH,H,HHH,L,LL,LLL,flag,angle,indexID,X,Y FROM sis where page=206 union SELECT kks,name,value,unit,updatetime,HH,H,HHH,L,LL,LLL,flag,angle1,indexID,X1,Y1 FROM sis where page1=206";
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


<!--来至一段中压蒸汽--!>
<text x="60" y="40" fill="black" font-size="20" font-family="Arial">来至一段</text>
<text x="60" y="60" fill="black" font-size="20" font-family="Arial">中压蒸汽</text>
<line x1="100" y1="80" x2="100" y2="600" stroke="red" stroke-width="2"/>

<line x1="100" y1="410" x2="50" y2="410" stroke="red" stroke-width="2"/>
<line x1="50" y1="410" x2="50" y2="490" stroke="red" stroke-width="2"/>
<line x1="100" y1="490" x2="50" y2="490" stroke="red" stroke-width="2"/>
<polygon points='40,430,60,430,40,470,60,470' fill='white' stroke='black' stroke-width='2' ></polygon>
<line x1="100" y1="600" x2="550" y2="600" stroke="red" stroke-width="2"/>
<text x="410" y="630" fill="black" font-size="20" font-family="Arial">一段低低压</text>
<text x="430" y="650" fill="black" font-size="20" font-family="Arial">蒸汽外供</text>

<line x1="260" y1="650" x2="400" y2="650" stroke="red" stroke-width="2"/>
<line x1="260" y1="600" x2="260" y2="650" stroke="red" stroke-width="2"/>
<line x1="400" y1="600" x2="400" y2="650" stroke="red" stroke-width="2"/>
<polygon points='280,640,280,660,320,640,320,660' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='340,640,340,660,380,640,380,660' fill='white' stroke='black' stroke-width='2' ></polygon>
<!--来至1号汽轮机抽汽--!>
<text x="160" y="40" fill="black" font-size="20" font-family="Arial">来至1号</text>
<text x="160" y="60" fill="black" font-size="20" font-family="Arial">汽轮机抽汽</text>
<line x1="200" y1="80" x2="200" y2="600" stroke="red" stroke-width="2"/>

<line x1="200" y1="410" x2="250" y2="410" stroke="red" stroke-width="2"/>
<line x1="250" y1="410" x2="250" y2="490" stroke="red" stroke-width="2"/>
<line x1="200" y1="490" x2="250" y2="490" stroke="red" stroke-width="2"/>
<polygon points='240,430,260,430,240,470,260,470' fill='white' stroke='black' stroke-width='2' ></polygon>

<!--来至2号汽轮机抽汽--!>
<text x="560" y="40" fill="black" font-size="20" font-family="Arial">来至2号</text>
<text x="540" y="60" fill="black" font-size="20" font-family="Arial">汽轮机抽汽</text>
<line x1="600" y1="80" x2="600" y2="600" stroke="red" stroke-width="2"/>

<line x1="600" y1="410" x2="550" y2="410" stroke="red" stroke-width="2"/>
<line x1="550" y1="410" x2="550" y2="490" stroke="red" stroke-width="2"/>
<line x1="600" y1="490" x2="550" y2="490" stroke="red" stroke-width="2"/>
<polygon points='540,430,560,430,540,470,560,470' fill='white' stroke='black' stroke-width='2' ></polygon>
<line x1="600" y1="600" x2="1050" y2="600" stroke="red" stroke-width="2"/>
<text x="910" y="630" fill="black" font-size="20" font-family="Arial">二段低低压</text>
<text x="930" y="650" fill="black" font-size="20" font-family="Arial">蒸汽外供</text>

<line x1="760" y1="650" x2="900" y2="650" stroke="red" stroke-width="2"/>
<line x1="760" y1="600" x2="760" y2="650" stroke="red" stroke-width="2"/>
<line x1="900" y1="600" x2="900" y2="650" stroke="red" stroke-width="2"/>
<polygon points='780,640,780,660,820,640,820,660' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='840,640,840,660,880,640,880,660' fill='white' stroke='black' stroke-width='2' ></polygon>
<!--来至二段中压蒸汽--!>
<text x="660" y="40" fill="black" font-size="20" font-family="Arial">来至二段</text>
<text x="660" y="60" fill="black" font-size="20" font-family="Arial">中压蒸汽</text>
<line x1="700" y1="80" x2="700" y2="600" stroke="red" stroke-width="2"/>

<line x1="750" y1="410" x2="700" y2="410" stroke="red" stroke-width="2"/>
<line x1="750" y1="410" x2="750" y2="490" stroke="red" stroke-width="2"/>
<line x1="750" y1="490" x2="700" y2="490" stroke="red" stroke-width="2"/>
<polygon points='740,430,760,430,740,470,760,470' fill='white' stroke='black' stroke-width='2' ></polygon>

<!--来至4号汽轮机抽汽--!>
<text x="1100" y="40" fill="black" font-size="20" font-family="Arial">来至4号</text>
<text x="1100" y="60" fill="black" font-size="20" font-family="Arial">汽轮机抽汽</text>
<line x1="1150" y1="80" x2="1150" y2="720" stroke="red" stroke-width="2"/>

<line x1="1150" y1="410" x2="1100" y2="410" stroke="red" stroke-width="2"/>
<line x1="1100" y1="410" x2="1100" y2="490" stroke="red" stroke-width="2"/>
<line x1="1150" y1="490" x2="1100" y2="490" stroke="red" stroke-width="2"/>
<polygon points='1090,430,1110,430,1090,470,1110,470' fill='white' stroke='black' stroke-width='2' ></polygon>
<!--来至一段次高压蒸汽--!>
<text x="1260" y="40" fill="black" font-size="20" font-family="Arial">来至一段</text>
<text x="1250" y="60" fill="black" font-size="20" font-family="Arial">次高压蒸汽</text>
<line x1="1300" y1="80" x2="1300" y2="720" stroke="red" stroke-width="2"/>

<circle cx='1300' cy='190' r='20' fill='white' stroke='black' stroke-width='2'></circle>
<line x1="1320" y1="190" x2="1450" y2="190" stroke="green" stroke-width="2"/>
<line x1="1450" y1="190" x2="1450" y2="300" stroke="green" stroke-width="2"/>

<line x1="1300" y1="410" x2="1250" y2="410" stroke="red" stroke-width="2"/>
<line x1="1250" y1="410" x2="1250" y2="490" stroke="red" stroke-width="2"/>
<line x1="1300" y1="490" x2="1250" y2="490" stroke="red" stroke-width="2"/>
<polygon points='1240,430,1260,430,1240,470,1260,470' fill='white' stroke='black' stroke-width='2' ></polygon>
<!--来至二段次高压蒸汽--!>
<text x="1510" y="40" fill="black" font-size="20" font-family="Arial">来至二段</text>
<text x="1500" y="60" fill="black" font-size="20" font-family="Arial">次高压蒸汽</text>
<line x1="1550" y1="80" x2="1550" y2="720" stroke="red" stroke-width="2"/>

<circle cx='1550' cy='190' r='20' fill='white' stroke='black' stroke-width='2'></circle>
<line x1="1570" y1="190" x2="1700" y2="190" stroke="green" stroke-width="2"/>
<line x1="1700" y1="190" x2="1700" y2="300" stroke="green" stroke-width="2"/>

<line x1="1550" y1="410" x2="1500" y2="410" stroke="red" stroke-width="2"/>
<line x1="1500" y1="410" x2="1500" y2="490" stroke="red" stroke-width="2"/>
<line x1="1550" y1="490" x2="1500" y2="490" stroke="red" stroke-width="2"/>
<polygon points='1490,430,1510,430,1490,470,1510,470' fill='white' stroke='black' stroke-width='2' ></polygon>
<!--来至5号汽轮机抽汽--!>
<text x="1760" y="40" fill="black" font-size="20" font-family="Arial">来至5号</text>
<text x="1750" y="60" fill="black" font-size="20" font-family="Arial">汽轮机抽汽</text>
<line x1="1800" y1="80" x2="1800" y2="720" stroke="red" stroke-width="2"/>

<line x1="1750" y1="410" x2="1800" y2="410" stroke="red" stroke-width="2"/>
<line x1="1750" y1="410" x2="1750" y2="490" stroke="red" stroke-width="2"/>
<line x1="1750" y1="490" x2="1800" y2="490" stroke="red" stroke-width="2"/>
<polygon points='1740,430,1760,430,1740,470,1760,470' fill='white' stroke='black' stroke-width='2' ></polygon>

<line x1="230" y1="600" x2="230" y2="720" stroke="red" stroke-width="2"/>
<line x1="650" y1="600" x2="650" y2="720" stroke="red" stroke-width="2"/>
<line x1="230" y1="720" x2="1800" y2="720" stroke="red" stroke-width="2"/>

<line x1="1300" y1="620" x2="1400" y2="620" stroke="red" stroke-width="2"/>
<line x1="1400" y1="725" x2="1400" y2="900" stroke="red" stroke-width="2"/>
<line x1="150" y1="900" x2="1400" y2="900" stroke="red" stroke-width="2"/>
<line x1="400" y1="900" x2="400" y2="950" stroke="red" stroke-width="2"/>
<line x1="600" y1="900" x2="600" y2="950" stroke="red" stroke-width="2"/>
<line x1="800" y1="900" x2="800" y2="950" stroke="red" stroke-width="2"/>
<line x1="1000" y1="900" x2="1000" y2="950" stroke="red" stroke-width="2"/>
<text x="650" y="940" fill="black" font-size="20" font-family="Arial">至除氧器</text>

<line x1="150" y1="600" x2="150" y2="900" stroke="red" stroke-width="2"/>
<line x1="100" y1="680" x2="150" y2="680" stroke="red" stroke-width="2"/>
<line x1="100" y1="680" x2="100" y2="820" stroke="red" stroke-width="2"/>
<line x1="100" y1="820" x2="150" y2="820" stroke="red" stroke-width="2"/>
<polygon points='90,700,110,700,90,740,110,740' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='90,760,110,760,90,800,110,800' fill='white' stroke='black' stroke-width='2' ></polygon>

<line x1="1400" y1="620" x2="1400" y2="715" stroke="red" stroke-width="2"/>
<line x1="1400" y1="740" x2="1450" y2="740" stroke="red" stroke-width="2"/>
<line x1="1450" y1="740" x2="1450" y2="880" stroke="red" stroke-width="2"/>
<line x1="1400" y1="880" x2="1450" y2="880" stroke="red" stroke-width="2"/>
<polygon points='1440,760,1460,760,1440,800,1460,800' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='1440,820,1460,820,1440,860,1460,860' fill='white' stroke='black' stroke-width='2' ></polygon>

<line x1="1675" y1="720" x2="1675" y2="950" stroke="red" stroke-width="2"/>
<polygon points='1665,820,1685,820,1665,860,1685,860' fill='white' stroke='black' stroke-width='2' ></polygon>











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
