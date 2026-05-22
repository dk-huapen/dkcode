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
			$sql="SELECT kks,name,value,unit,updatetime,HH,H,HHH,L,LL,LLL,flag,angle,indexID,X,Y FROM sis where page=301 union SELECT kks,name,value,unit,updatetime,HH,H,HHH,L,LL,LLL,flag,angle1,indexID,X1,Y1 FROM sis where page1=301";
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
<line x1="20" y1="170" x2="710" y2="170" stroke="red" stroke-width="2"/><!---进口蒸汽主管道-->

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


<!---抽汽管道--->
<line x1="830" y1="500" x2="830" y2="800" stroke="red" stroke-width="2"/>
<line x1="830" y1="800" x2="1790" y2="800" stroke="red" stroke-width="2"/>
<text x="1600" y="820" fill="black" font-size="20" font-family="Arial">接低低压蒸汽系统</text>
<!---疏水阀--->
<line x1="100" y1="800" x2="100" y2="950" stroke="green" stroke-width="2"/>
<polygon points='90,820,110,820,90,860,110,860' fill='white' stroke='black' stroke-width='2' ></polygon>

<line x1="210" y1="800" x2="210" y2="950" stroke="green" stroke-width="2"/>
<polygon points='200,820,220,820,200,860,220,860' fill='white' stroke='black' stroke-width='2' ></polygon>

<line x1="320" y1="800" x2="320" y2="950" stroke="green" stroke-width="2"/>
<polygon points='310,820,330,820,310,860,330,860' fill='white' stroke='black' stroke-width='2' ></polygon>

<line x1="430" y1="800" x2="430" y2="950" stroke="green" stroke-width="2"/>
<polygon points='420,820,440,820,420,860,440,860' fill='white' stroke='black' stroke-width='2' ></polygon>

<line x1="540" y1="800" x2="540" y2="950" stroke="green" stroke-width="2"/>
<polygon points='530,820,550,820,530,860,550,860' fill='white' stroke='black' stroke-width='2' ></polygon>

<line x1="650" y1="800" x2="650" y2="950" stroke="green" stroke-width="2"/>
<polygon points='640,820,660,820,640,860,660,860' fill='white' stroke='black' stroke-width='2' ></polygon>

<line x1="760" y1="800" x2="760" y2="950" stroke="green" stroke-width="2"/>
<polygon points='750,820,770,820,750,860,770,860' fill='white' stroke='black' stroke-width='2' ></polygon>

<line x1="870" y1="800" x2="870" y2="950" stroke="green" stroke-width="2"/>
<polygon points='860,820,880,820,860,860,880,860' fill='white' stroke='black' stroke-width='2' ></polygon>


<!---排汽管道--->

<line x1="935" y1="530" x2="935" y2="650" stroke="red" stroke-width="2"/>
<line x1="935" y1="650" x2="1240" y2="650" stroke="red" stroke-width="2"/>
<line x1="1240" y1="150" x2="1240" y2="650" stroke="red" stroke-width="2"/>
<line x1="1240" y1="150" x2="1445" y2="150" stroke="red" stroke-width="2"/>
<line x1="1445" y1="150" x2="1445" y2="195" stroke="red" stroke-width="2"/>
<!--排汽装置----->
<rect x="1390" y="260" width="110" height="140" fill="gray" stroke="black" stroke-width="1"></rect>
<text x="1400" y="300" fill="black" font-size="20" font-family="Arial">排汽装置</text>
<polygon points='1410,220,1480,220,1500,260,1390,260' fill='gray' stroke='black' stroke-width='2' ></polygon>
<rect x="1410" y="195" width="70" height="22" fill="gray" stroke="black" stroke-width="1"></rect>
<line x1="1500" y1="310" x2="1560" y2="310" stroke="red" stroke-width="2"/>
<line x1="1560" y1="310" x2="1560" y2="230" stroke="red" stroke-width="2"/>
<!---汽轮机本体DEH---->
<!---蒸汽---->
<line x1="710" y1="170" x2="710" y2="285" stroke="red" stroke-width="2"/>
<line x1="650" y1="170" x2="650" y2="285" stroke="red" stroke-width="2"/>
<line x1="650" y1="285" x2="710" y2="285" stroke="red" stroke-width="2"/>
<line x1="680" y1="285" x2="680" y2="395" stroke="red" stroke-width="2"/>
<line x1="820" y1="245" x2="820" y2="395" stroke="red" stroke-width="2"/>
<line x1="820" y1="245" x2="930" y2="245" stroke="red" stroke-width="2"/>
<line x1="930" y1="245" x2="930" y2="395" stroke="red" stroke-width="2"/>
<!---轴封管道--->
<line x1="520" y1="170" x2="520" y2="380" stroke="fuchsia" stroke-width="2"/>
<line x1="200" y1="380" x2="520" y2="380" stroke="fuchsia" stroke-width="2"/>
<line x1="200" y1="380" x2="200" y2="700" stroke="fuchsia" stroke-width="2"/>
<line x1="200" y1="700" x2="1060" y2="700" stroke="fuchsia" stroke-width="2"/>
<line x1="1060" y1="455" x2="1060" y2="700" stroke="fuchsia" stroke-width="2"/>
<line x1="510" y1="455" x2="510" y2="700" stroke="fuchsia" stroke-width="2"/>

<line x1="680" y1="300" x2="820" y2="300" stroke="fuchsia" stroke-width="2"/>
<line x1="750" y1="200" x2="750" y2="300" stroke="fuchsia" stroke-width="2"/>
<line x1="1020" y1="435" x2="1020" y2="200" stroke="fuchsia" stroke-width="2"/>
<line x1="750" y1="200" x2="1050" y2="200" stroke="fuchsia" stroke-width="2"/>
<line x1="1050" y1="200" x2="1050" y2="280" stroke="fuchsia" stroke-width="2"/>


<rect x="1040" y="280" width="180" height="50" fill="gray" stroke="black" stroke-width="1"></rect>

<!---轴加风机A---->
<line x1="1060" y1="210" x2="1060" y2="280" stroke="fuchsia" stroke-width="2"/>
<line x1="1060" y1="210" x2="1072" y2="210" stroke="fuchsia" stroke-width="2"/>

<rect x="1072" y="167" width="16" height="66" fill="gray" stroke="black" stroke-width="1"></rect>
<ellipse cx="1080" cy="185" rx="5" ry="15"fill="black" stroke="black" stroke-width="1"></ellipse>
<ellipse cx="1080" cy="215" rx="5" ry="15"fill="black" stroke="black" stroke-width="1"></ellipse>
<line x1="1080" y1="200" x2="1120" y2="200" stroke="black" stroke-width="2"/>
<text x="1065" y="130" fill="black" font-size="20" font-family="Arial">远方</text>
<text x="1065" y="155" fill="black" font-size="20" font-family="Arial">故障</text>
<!---轴加风机B---->
<line x1="1150" y1="210" x2="1150" y2="280" stroke="fuchsia" stroke-width="2"/>
<line x1="1150" y1="210" x2="1162" y2="210" stroke="fuchsia" stroke-width="2"/>

<rect x="1162" y="167" width="16" height="66" fill="gray" stroke="black" stroke-width="1"></rect>
<ellipse cx="1170" cy="185" rx="5" ry="15"fill="black" stroke="black" stroke-width="1"></ellipse>
<ellipse cx="1170" cy="215" rx="5" ry="15"fill="black" stroke="black" stroke-width="1"></ellipse>
<line x1="1170" y1="200" x2="1210" y2="200" stroke="black" stroke-width="2"/>
<text x="1155" y="130" fill="black" font-size="20" font-family="Arial">远方</text>
<text x="1155" y="155" fill="black" font-size="20" font-family="Arial">故障</text>

<!---高速轴---->
<rect x="500" y="435" width="600" height="20" fill="gray" stroke="black" stroke-width="1"></rect>

<polygon points='615,392 640,395 980,345 980,545 640,495 615,498'fill='gray' stroke='black' stroke-width='1'></polygon>
<text x="755" y="460" fill="black" font-size="20" font-family="Arial">汽轮机</text>
<line x1="640" y1="395" x2="640" y2="495" stroke="black" stroke-width="2"/>
<rect x="980" y="345" width="30" height="200" fill="gray" stroke="black" stroke-width="1"></rect>


<line x1="1600" y1="130" x2="1640" y2="130" stroke="green" stroke-width="2"/>
<line x1="1600" y1="130" x2="1600" y2="330" stroke="green" stroke-width="2"/>
<line x1="1500" y1="330" x2="1600" y2="330" stroke="green" stroke-width="2"/>
<line x1="1570" y1="90" x2="1790" y2="90" stroke="green" stroke-width="2"/>
<line x1="1570" y1="80" x2="1570" y2="100" stroke="green" stroke-width="2"/>
<line x1="1790" y1="80" x2="1790" y2="100" stroke="green" stroke-width="2"/>
<path d="M 1640 30 A 30 20 0 0 1 1720 30 L1720 145 A30 20 0 0 1 1640 145z" stroke="black" stroke="#000" fill="gray" />
<line x1="1640" y1="30" x2="1720" y2="30" stroke="black" stroke-width="2"/>
<line x1="1640" y1="145" x2="1720" y2="145" stroke="black" stroke-width="2"/>
<rect x="1665" y="35" width="30" height="105" fill="gray" stroke="white" stroke-width="2"></rect>
<text x="1670" y="55" fill="black" font-size="20" font-family="Arial">疏</text>
<text x="1670" y="75" fill="black" font-size="20" font-family="Arial">水</text>
<text x="1670" y="95" fill="black" font-size="20" font-family="Arial">扩</text>
<text x="1670" y="115" fill="black" font-size="20" font-family="Arial">容</text>
<text x="1670" y="135" fill="black" font-size="20" font-family="Arial">器</text>
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
