<html>
	<head>
    		<title>1号汽轮机本体</title>
		<?php include("../header.php")?>
	</head>
	<body>
		<?php include("top.php")?>
		<center><h1>1号汽轮机本体</h1></center>
		<script>
			var page = 301;
			var test =<?php
			include('../conn.php');
			$sql="SELECT kks,name,value,unit,updatetime,HH,H,HHH,L,LL,LLL,flag,angle,indexID,X,Y FROM sis where page=301 or page1=301";
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


<line x1="130" y1="30" x2="600" y2="30" stroke="green" stroke-width="2"/><!---减温水管道-->
<line x1="600" y1="30" x2="600" y2="70" stroke="green" stroke-width="2"/><!---减温水管道-->
<polygon points='180,20,180,40,220,20,220,40' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='320,20,320,40,360,20,360,40' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='500,20,500,40,540,20,540,40' fill='white' stroke='black' stroke-width='2' ></polygon>

<line x1="130" y1="90" x2="1280" y2="90" stroke="red" stroke-width="2"/><!---进口蒸汽旁路管道-->
<circle cx='600' cy='90' r='20' fill='white' stroke='black' stroke-width='2'></circle>
<line x1="1280" y1="90" x2="1280" y2="300" stroke="red" stroke-width="2"/><!---进口蒸汽旁路管道-->
<line x1="1280" y1="300" x2="1390" y2="300" stroke="red" stroke-width="2"/><!---进口蒸汽旁路管道-->
<line x1="130" y1="90" x2="130" y2="170" stroke="red" stroke-width="2"/>
<line x1="20" y1="170" x2="640" y2="170" stroke="red" stroke-width="2"/><!---进口蒸汽主管道-->
<line x1="480" y1="170" x2="480" y2="210" stroke="red" stroke-width="2"/><!---进口蒸汽主管道-->
<line x1="640" y1="170" x2="640" y2="210" stroke="red" stroke-width="2"/>
<line x1="480" y1="210" x2="640" y2="210" stroke="red" stroke-width="2"/>

<rect x="330" y="150" width="70" height="140" fill="gray" stroke="black" stroke-width="1"></rect>
<rect x="350" y="155" width="30" height="125" fill="gray" stroke="white" stroke-width="1"></rect>
<text x="355" y="175" fill="black" font-size="20" font-family="Arial">蒸</text>
<text x="355" y="200" fill="black" font-size="20" font-family="Arial">汽</text>
<text x="355" y="225" fill="black" font-size="20" font-family="Arial">分</text>
<text x="355" y="250" fill="black" font-size="20" font-family="Arial">离</text>
<text x="355" y="275" fill="black" font-size="20" font-family="Arial">器</text>

<text x="75" y="201" fill="black" font-size="18" font-family="Arial">故障</text>
<text x="225" y="201" fill="black" font-size="18" font-family="Arial">故障</text>
<text x="265" y="281" fill="black" font-size="18" font-family="Arial">故障</text>
<line x1="150" y1="250" x2="310" y2="250" stroke="red" stroke-width="2"/>
<line x1="150" y1="170" x2="150" y2="250" stroke="red" stroke-width="2"/>
<line x1="310" y1="170" x2="310" y2="250" stroke="red" stroke-width="2"/>
<polygon points='170,240,170,260,210,240,210,260' fill='white' stroke='black' stroke-width='2' ></polygon>
<!---汽轮机本体---->
<line x1="700" y1="120" x2="700" y2="250" stroke="red" stroke-width="2"/>
<rect x="520" y="200" width="20" height="50" fill="gray" stroke="black" stroke-width="1"></rect>
<rect x="580" y="200" width="20" height="50" fill="gray" stroke="black" stroke-width="1"></rect>
<rect x="750" y="380" width="36" height="50" fill="gray" stroke="black" stroke-width="1"></rect>
<polygon points='500,250 900,200 900,400 500,350'fill='gray' stroke='black' stroke-width='1'></polygon>
<rect x="900" y="170" width="70" height="260" fill="gray" stroke="black" stroke-width="1"></rect>
<rect x="970" y="250" width="50" height="100" fill="gray" stroke="black" stroke-width="1"></rect>
<text x="605" y="315" fill="black" font-size="20" font-family="Arial">汽轮机</text>

<!---抽汽管道--->
<line x1="768" y1="430" x2="768" y2="600" stroke="red" stroke-width="2"/>
<line x1="768" y1="600" x2="1100" y2="600" stroke="red" stroke-width="2"/>
<line x1="1100" y1="600" x2="1100" y2="700" stroke="red" stroke-width="2"/>
<text x="1030" y="730" fill="black" font-size="20" font-family="Arial">接低低压蒸汽系统</text>
<!---排汽管道--->
<line x1="935" y1="430" x2="935" y2="530" stroke="red" stroke-width="2"/>
<line x1="935" y1="530" x2="1230" y2="530" stroke="red" stroke-width="2"/>
<line x1="1230" y1="150" x2="1230" y2="530" stroke="red" stroke-width="2"/>
<line x1="1230" y1="150" x2="1445" y2="150" stroke="red" stroke-width="2"/>
<line x1="1445" y1="150" x2="1445" y2="195" stroke="red" stroke-width="2"/>
<!---轴封管道--->
<line x1="450" y1="230" x2="520" y2="230" stroke="red" stroke-width="2"/>
<line x1="450" y1="230" x2="450" y2="480" stroke="red" stroke-width="2"/>
<line x1="450" y1="480" x2="985" y2="480" stroke="red" stroke-width="2"/>
<line x1="985" y1="350" x2="985" y2="480" stroke="red" stroke-width="2"/>

<line x1="1005" y1="350" x2="1005" y2="370" stroke="red" stroke-width="2"/>
<line x1="1005" y1="370" x2="1040" y2="370" stroke="red" stroke-width="2"/>
<line x1="1040" y1="370" x2="1040" y2="120" stroke="red" stroke-width="2"/>

<rect x="1070" y="250" width="130" height="70" fill="gray" stroke="black" stroke-width="1"></rect>
<text x="1080" y="290" fill="black" font-size="20" font-family="Arial">轴封冷却器</text>
<line x1="700" y1="120" x2="1135" y2="120" stroke="red" stroke-width="2"/>
<line x1="1135" y1="120" x2="1135" y2="250" stroke="red" stroke-width="2"/>
<line x1="1135" y1="320" x2="1135" y2="400" stroke="red" stroke-width="2"/>

<!--排汽装置----->
<rect x="1390" y="260" width="110" height="140" fill="gray" stroke="black" stroke-width="1"></rect>
<text x="1400" y="300" fill="black" font-size="20" font-family="Arial">排汽装置</text>
<polygon points='1410,220,1480,220,1500,260,1390,260' fill='gray' stroke='black' stroke-width='2' ></polygon>
<rect x="1410" y="195" width="70" height="22" fill="gray" stroke="black" stroke-width="1"></rect>
<line x1="1500" y1="310" x2="1560" y2="310" stroke="red" stroke-width="2"/>
<line x1="1560" y1="310" x2="1560" y2="230" stroke="red" stroke-width="2"/>
<!--1号凝结水泵----->
<line x1="1350" y1="510" x2="1650" y2="510" stroke="green" stroke-width="2"/>
<polygon points='1510,500,1510,520,1550,500,1550,520' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='1370,500,1370,520,1410,500,1410,520' fill='white' stroke='black' stroke-width='2' ></polygon>
<line x1="1650" y1="510" x2="1650" y2="600" stroke="green" stroke-width="2"/>
<line x1="1350" y1="430" x2="1350" y2="600" stroke="green" stroke-width="2"/>
<line x1="1350" y1="430" x2="1400" y2="430" stroke="green" stroke-width="2"/>
<line x1="1400" y1="400" x2="1400" y2="430" stroke="green" stroke-width="2"/>
<!--2号凝结水泵----->
<line x1="1350" y1="600" x2="1800" y2="600" stroke="green" stroke-width="2"/>
<line x1="1800" y1="220" x2="1800" y2="600" stroke="green" stroke-width="2"/>
<text x="1770" y="215" fill="black" font-size="18" font-family="Arial">至胜科</text>
<polygon points='1510,590,1510,610,1550,590,1550,610' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='1370,590,1370,610,1410,590,1410,610' fill='white' stroke='black' stroke-width='2' ></polygon>
<!---凝结水泵出口母管至汽轮机排汽冷却水--->
<line x1="1830" y1="680" x2="1670" y2="680" stroke="green" stroke-width="2"/>
<line x1="1830" y1="180" x2="1830" y2="680" stroke="green" stroke-width="2"/>
<line x1="1445" y1="180" x2="1830" y2="180" stroke="green" stroke-width="2"/>
<!---凝结水泵出口母管至胜科--->
<line x1="1500" y1="380" x2="1800" y2="380" stroke="green" stroke-width="2"/>
<polygon points='1680,370,1680,390,1720,370,1720,390' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='1540,370,1540,390,1580,370,1580,390' fill='white' stroke='black' stroke-width='2' ></polygon>
<!---凝结水泵出口母管至旁路蒸汽装置冷却水--->
<line x1="1670" y1="600" x2="1670" y2="750" stroke="green" stroke-width="2"/>
<line x1="1320" y1="750" x2="1670" y2="750" stroke="green" stroke-width="2"/>
<line x1="1320" y1="320" x2="1320" y2="750" stroke="green" stroke-width="2"/>
<circle cx='1320' cy='300' r='20' fill='white' stroke='black' stroke-width='2'></circle>

<line x1="100" y1="800" x2="1670" y2="800" stroke="green" stroke-width="2"/>
<text x="0" y="825" fill="black" font-size="20" font-family="Arial">轴向位移</text>
<text x="100" y="825" fill="black" font-size="20" font-family="Arial">推力瓦块</text>
<text x="200" y="825" fill="black" font-size="20" font-family="Arial">1号轴瓦</text>
<text x="300" y="825" fill="black" font-size="20" font-family="Arial">2号轴瓦</text>
<text x="400" y="825" fill="black" font-size="20" font-family="Arial">3号轴瓦</text>
<text x="500" y="825" fill="black" font-size="20" font-family="Arial">4号轴瓦</text>
<text x="600" y="825" fill="black" font-size="20" font-family="Arial">5号轴瓦</text>
<text x="700" y="825" fill="black" font-size="20" font-family="Arial">6号轴瓦</text>
<text x="800" y="825" fill="black" font-size="20" font-family="Arial">7号轴瓦</text>
<text x="900" y="825" fill="black" font-size="20" font-family="Arial">8号轴瓦</text>
<line x1="100" y1="830" x2="1670" y2="830" stroke="green" stroke-width="2"/>
<line x1="100" y1="860" x2="1670" y2="860" stroke="green" stroke-width="2"/>
<line x1="100" y1="890" x2="1670" y2="890" stroke="green" stroke-width="2"/>
<line x1="100" y1="920" x2="1670" y2="920" stroke="green" stroke-width="2"/>
<line x1="100" y1="950" x2="1670" y2="950" stroke="green" stroke-width="2"/>






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
