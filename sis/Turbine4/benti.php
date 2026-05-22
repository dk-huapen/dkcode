<html>
	<head>
    		<title>4号汽轮机本体</title>
		<?php include("../header.php")?>
	</head>
	<body>
		<?php include("top.php")?>
		<center><h1>4号汽轮机本体</h1></center>
		<script>
			var page = 324;
			var test =<?php
			include('../conn.php');
			$sql="SELECT kks,name,value,unit,updatetime,HH,H,HHH,L,LL,LLL,flag,angle,indexID,X,Y FROM sis where page=324 union SELECT kks,name,value,unit,updatetime,HH,H,HHH,L,LL,LLL,flag,angle1,indexID,X1,Y1 FROM sis where page1=324";
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
<!---汽轮机本体---->
<!---高速轴---->
<rect x="350" y="290" width="1400" height="20" fill="gray" stroke="black" stroke-width="1"></rect>

<polygon points='665,247 690,250 1030,200 1030,400 690,350 665,353'fill='gray' stroke='black' stroke-width='1'></polygon>
<text x="805" y="315" fill="black" font-size="20" font-family="Arial">汽轮机</text>
<line x1="690" y1="250" x2="690" y2="350" stroke="black" stroke-width="2"/>
<rect x="1030" y="200" width="30" height="200" fill="gray" stroke="black" stroke-width="1"></rect>



<!---前轴承箱--->
<rect x="450" y="255" width="90" height="90" fill="gray" stroke="black" stroke-width="1"></rect>
<text x="455" y="300" fill="black" font-size="20" font-family="Arial">前轴承箱</text>
<!---后轴承箱--->
<rect x="1200" y="255" width="90" height="90" fill="gray" stroke="black" stroke-width="1"></rect>
<text x="1205" y="300" fill="black" font-size="20" font-family="Arial">后轴承箱</text>

<text x="1410" y="80" fill="black" font-size="20" font-family="Arial">入口冷风</text>
<line x1="1450" y1="100" x2="1450" y2="230" stroke="aqua" stroke-width="2"/>
<text x="1590" y="80" fill="black" font-size="20" font-family="Arial">入口冷风</text>
<line x1="1630" y1="100" x2="1630" y2="230" stroke="aqua" stroke-width="2"/>

<!---发电机---->
<rect x="1430" y="230" width="220" height="140" fill="gray" stroke="black" stroke-width="1"></rect>


<!---汽轮机工作面推力瓦温度---->
<text x="270" y="605" fill="black" font-size="20" font-family="Arial">左</text>
<text x="510" y="605" fill="black" font-size="20" font-family="Arial">右</text>
<circle cx='400' cy='600' r='100' fill='none' stroke='black' stroke-width='2'></circle>
<line x1="300" y1="600" x2="500" y2="600" stroke="black" stroke-width="2"/>
<text x="475" y="625" fill="black" font-size="20" font-family="Arial">1</text>
<text x="450" y="675" fill="black" font-size="20" font-family="Arial">2</text>
<text x="470" y="590" fill="black" font-size="20" font-family="Arial">10</text>
<text x="340" y="675" fill="black" font-size="20" font-family="Arial">4</text>
<text x="315" y="625" fill="black" font-size="20" font-family="Arial">5</text>
<text x="315" y="590" fill="black" font-size="20" font-family="Arial">6</text>
<text x="345" y="545" fill="black" font-size="20" font-family="Arial">7</text>
<text x="395" y="525" fill="black" font-size="20" font-family="Arial">8</text>
<text x="450" y="545" fill="black" font-size="20" font-family="Arial">9</text>
<text x="395" y="690" fill="black" font-size="20" font-family="Arial">3</text>
<!---汽轮机转速盘---->
<text x="270" y="605" fill="black" font-size="20" font-family="Arial">左</text>
<text x="510" y="605" fill="black" font-size="20" font-family="Arial">右</text>
<circle cx='400' cy='850' r='100' fill='none' stroke='black' stroke-width='2'></circle>
<line x1="300" y1="600" x2="500" y2="600" stroke="black" stroke-width="2"/>
<text x="475" y="625" fill="black" font-size="20" font-family="Arial">1</text>
<text x="450" y="675" fill="black" font-size="20" font-family="Arial">2</text>
<text x="470" y="590" fill="black" font-size="20" font-family="Arial">10</text>
<text x="340" y="675" fill="black" font-size="20" font-family="Arial">4</text>
<text x="315" y="625" fill="black" font-size="20" font-family="Arial">5</text>
<text x="315" y="590" fill="black" font-size="20" font-family="Arial">6</text>
<text x="345" y="545" fill="black" font-size="20" font-family="Arial">7</text>
<text x="395" y="525" fill="black" font-size="20" font-family="Arial">8</text>
<text x="450" y="545" fill="black" font-size="20" font-family="Arial">9</text>
<text x="395" y="690" fill="black" font-size="20" font-family="Arial">3</text>

<!---汽轮机工作面推力瓦温度---->
<text x="280" y="440" fill="black" font-size="25" font-family="Arial">工作面推力瓦温度</text>
<text x="130" y="470" fill="black" font-size="20" font-family="Arial">左侧接线盒</text>
<line x1="100" y1="480" x2="100" y2="780" stroke="black" stroke-width="2"/>
<line x1="150" y1="480" x2="150" y2="780" stroke="black" stroke-width="2"/>
<line x1="250" y1="480" x2="250" y2="780" stroke="black" stroke-width="2"/>
<line x1="100" y1="480" x2="250" y2="480" stroke="black" stroke-width="2"/>
<text x="120" y="505" fill="black" font-size="18" font-family="Arial">1</text>
<line x1="100" y1="510" x2="250" y2="510" stroke="black" stroke-width="2"/>
<text x="120" y="535" fill="black" font-size="18" font-family="Arial">2</text>
<line x1="100" y1="540" x2="250" y2="540" stroke="black" stroke-width="2"/>
<text x="120" y="565" fill="black" font-size="18" font-family="Arial">3</text>
<line x1="100" y1="570" x2="250" y2="570" stroke="black" stroke-width="2"/>
<text x="120" y="595" fill="black" font-size="18" font-family="Arial">4</text>
<line x1="100" y1="600" x2="250" y2="600" stroke="black" stroke-width="2"/>
<text x="120" y="625" fill="black" font-size="18" font-family="Arial">5</text>
<line x1="100" y1="630" x2="250" y2="630" stroke="black" stroke-width="2"/>
<text x="120" y="655" fill="black" font-size="18" font-family="Arial">6</text>
<line x1="100" y1="660" x2="250" y2="660" stroke="black" stroke-width="2"/>
<text x="120" y="685" fill="black" font-size="18" font-family="Arial">7</text>
<line x1="100" y1="690" x2="250" y2="690" stroke="black" stroke-width="2"/>
<text x="120" y="715" fill="black" font-size="18" font-family="Arial">8</text>
<line x1="100" y1="720" x2="250" y2="720" stroke="black" stroke-width="2"/>
<text x="120" y="745" fill="black" font-size="18" font-family="Arial">9</text>
<line x1="100" y1="750" x2="250" y2="750" stroke="black" stroke-width="2"/>
<text x="113" y="775" fill="black" font-size="18" font-family="Arial">10</text>
<line x1="100" y1="780" x2="250" y2="780" stroke="black" stroke-width="2"/>

<text x="580" y="470" fill="black" font-size="20" font-family="Arial">右侧接线盒</text>
<line x1="550" y1="480" x2="550" y2="780" stroke="black" stroke-width="2"/>
<line x1="600" y1="480" x2="600" y2="780" stroke="black" stroke-width="2"/>
<line x1="700" y1="480" x2="700" y2="780" stroke="black" stroke-width="2"/>
<line x1="550" y1="480" x2="700" y2="480" stroke="black" stroke-width="2"/>
<text x="570" y="505" fill="black" font-size="18" font-family="Arial">1</text>
<line x1="550" y1="510" x2="700" y2="510" stroke="black" stroke-width="2"/>
<text x="570" y="535" fill="black" font-size="18" font-family="Arial">2</text>
<line x1="550" y1="540" x2="700" y2="540" stroke="black" stroke-width="2"/>
<text x="570" y="565" fill="black" font-size="18" font-family="Arial">3</text>
<line x1="550" y1="570" x2="700" y2="570" stroke="black" stroke-width="2"/>
<text x="570" y="595" fill="black" font-size="18" font-family="Arial">4</text>
<line x1="550" y1="600" x2="700" y2="600" stroke="black" stroke-width="2"/>
<text x="570" y="625" fill="black" font-size="18" font-family="Arial">5</text>
<line x1="550" y1="630" x2="700" y2="630" stroke="black" stroke-width="2"/>
<text x="570" y="655" fill="black" font-size="18" font-family="Arial">6</text>
<line x1="550" y1="660" x2="700" y2="660" stroke="black" stroke-width="2"/>
<text x="570" y="685" fill="black" font-size="18" font-family="Arial">7</text>
<line x1="550" y1="690" x2="700" y2="690" stroke="black" stroke-width="2"/>
<text x="570" y="715" fill="black" font-size="18" font-family="Arial">8</text>
<line x1="550" y1="720" x2="700" y2="720" stroke="black" stroke-width="2"/>
<text x="570" y="745" fill="black" font-size="18" font-family="Arial">9</text>
<line x1="550" y1="750" x2="700" y2="750" stroke="black" stroke-width="2"/>
<text x="563" y="775" fill="black" font-size="18" font-family="Arial">10</text>
<line x1="550" y1="780" x2="700" y2="780" stroke="black" stroke-width="2"/>

<rect x="1430" y="430" width="220" height="140" fill="none" stroke="black" stroke-width="1"></rect>
<text x="1470" y="460" fill="black" font-size="20" font-family="Arial">发电机绕组温度</text>

<rect x="1400" y="630" width="285" height="120" fill="none" stroke="black" stroke-width="1"></rect>
<text x="1470" y="660" fill="black" font-size="20" font-family="Arial">发电机定子温度</text>












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
