<html>
	<head>
    		<title>低压蒸汽系统</title>
		<?php include("../header.php")?>
	</head>
	<body>
		<?php include("top.php")?>
		<center><h1>低压蒸汽系统</h1></center>
		<script>
			var page = 205;
			var test =<?php
			include('../conn.php');
			#$sql="SELECT kks,name,value,unit,updatetime,HH,H,HHH,L,LL,LLL,flag,angle,indexID,X,Y FROM sis where page=203 or page1=203";
			$sql="SELECT kks,name,value,unit,updatetime,HH,H,HHH,L,LL,LLL,flag,angle,indexID,X,Y FROM sis where page=205 union SELECT kks,name,value,unit,updatetime,HH,H,HHH,L,LL,LLL,flag,angle1,indexID,X1,Y1 FROM sis where page1=205";
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


<!--低压蒸汽母管-->
<line x1="100" y1="100" x2="1850" y2="100" stroke="red" stroke-width="3"/>
<text x="1700" y="90" fill="black" font-size="20" font-family="Arial">厂区低压蒸汽管道</text>

<line x1="1360" y1="50" x2="1500" y2="50" stroke="red" stroke-width="2"/>
<line x1="1360" y1="100" x2="1360" y2="50" stroke="red" stroke-width="2"/>
<line x1="1500" y1="100" x2="1500" y2="50" stroke="red" stroke-width="2"/>
<polygon points='1380,40,1380,60,1420,40,1420,60' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='1440,40,1440,60,1480,40,1480,60' fill='white' stroke='black' stroke-width='2' ></polygon>
<!--来至二段高压主蒸汽管道-->

<line x1="1340" y1="100" x2="1340" y2="900" stroke="red" stroke-width="2"/>

<line x1="1290" y1="320" x2="1290" y2="400" stroke="red" stroke-width="2"/>
<line x1="1290" y1="320" x2="1340" y2="320" stroke="red" stroke-width="2"/>
<line x1="1290" y1="400" x2="1340" y2="400" stroke="red" stroke-width="2"/>
<polygon points='1280,340,1300,340,1280,380,1300,380' fill='white' stroke='black' stroke-width='2' ></polygon>

<!--送至空分2.8MPa中压饱和蒸汽管网-->
<polygon points='1520,440,1520,460,1560,440,1560,460' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='1570,440,1570,460,1610,440,1610,460' fill='white' stroke='black' stroke-width='2' ></polygon>
<!--A组高压加热器--!>
<line x1="100" y1="100" x2="100" y2="700" stroke="red" stroke-width="2"/>
<polygon points='90,150,110,150,90,190,110,190' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='90,250,110,250,90,290,110,290' fill='white' stroke='black' stroke-width='2' ></polygon>

<line x1="100" y1="410" x2="50" y2="410" stroke="red" stroke-width="2"/>
<line x1="50" y1="410" x2="50" y2="490" stroke="red" stroke-width="2"/>
<line x1="100" y1="490" x2="50" y2="490" stroke="red" stroke-width="2"/>
<polygon points='40,430,60,430,40,470,60,470' fill='white' stroke='black' stroke-width='2' ></polygon>
<line x1="100" y1="700" x2="160" y2="700" stroke="red" stroke-width="2"/>
<text x="150" y="443" fill="black" font-size="20" font-family="Arial">故障</text>
<text x="150" y="473" fill="black" font-size="20" font-family="Arial">就地</text>

<path d="M 160 700 A 40 40 0 0 1 240 700 L240 870 A40 40 0 0 1 160 870z" stroke="black" stroke="#000" fill="gray" />
<rect x="180" y="700" width="40" height="170" fill="gray" stroke="white" stroke-width="2"></rect>
<text x="193" y="730" fill="black" font-size="20" font-family="Arial">A</text>
<text x="190" y="755" fill="black" font-size="20" font-family="Arial">组</text>
<text x="190" y="780" fill="black" font-size="20" font-family="Arial">一</text>
<text x="190" y="805" fill="black" font-size="20" font-family="Arial">级</text>
<text x="190" y="830" fill="black" font-size="20" font-family="Arial">高</text>
<text x="190" y="855" fill="black" font-size="20" font-family="Arial">加</text>
<!--B组高压加热器--!>
<line x1="350" y1="100" x2="350" y2="700" stroke="red" stroke-width="2"/>
<polygon points='340,150,360,150,340,190,360,190' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='340,250,360,250,340,290,360,290' fill='white' stroke='black' stroke-width='2' ></polygon>

<line x1="350" y1="410" x2="300" y2="410" stroke="red" stroke-width="2"/>
<line x1="300" y1="410" x2="300" y2="490" stroke="red" stroke-width="2"/>
<line x1="350" y1="490" x2="300" y2="490" stroke="red" stroke-width="2"/>
<polygon points='290,430,310,430,290,470,310,470' fill='white' stroke='black' stroke-width='2' ></polygon>
<line x1="350" y1="700" x2="410" y2="700" stroke="red" stroke-width="2"/>
<text x="400" y="443" fill="black" font-size="20" font-family="Arial">故障</text>
<text x="400" y="473" fill="black" font-size="20" font-family="Arial">就地</text>

<path d="M 410 700 A 40 40 0 0 1 490 700 L490 870 A40 40 0 0 1 410 870z" stroke="black" stroke="#000" fill="gray" />
<rect x="430" y="700" width="40" height="170" fill="gray" stroke="white" stroke-width="2"></rect>
<text x="443" y="730" fill="black" font-size="20" font-family="Arial">B</text>
<text x="440" y="755" fill="black" font-size="20" font-family="Arial">组</text>
<text x="440" y="780" fill="black" font-size="20" font-family="Arial">一</text>
<text x="440" y="805" fill="black" font-size="20" font-family="Arial">级</text>
<text x="440" y="830" fill="black" font-size="20" font-family="Arial">高</text>
<text x="440" y="855" fill="black" font-size="20" font-family="Arial">加</text>
<!--C组高压加热器--!>
<line x1="600" y1="100" x2="600" y2="700" stroke="red" stroke-width="2"/>
<polygon points='590,150,610,150,590,190,610,190' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='590,250,610,250,590,290,610,290' fill='white' stroke='black' stroke-width='2' ></polygon>

<line x1="600" y1="410" x2="550" y2="410" stroke="red" stroke-width="2"/>
<line x1="550" y1="410" x2="550" y2="490" stroke="red" stroke-width="2"/>
<line x1="600" y1="490" x2="550" y2="490" stroke="red" stroke-width="2"/>
<polygon points='540,430,560,430,540,470,560,470' fill='white' stroke='black' stroke-width='2' ></polygon>
<line x1="600" y1="700" x2="660" y2="700" stroke="red" stroke-width="2"/>
<text x="650" y="443" fill="black" font-size="20" font-family="Arial">故障</text>
<text x="650" y="473" fill="black" font-size="20" font-family="Arial">就地</text>

<path d="M 660 700 A 40 40 0 0 1 740 700 L740 870 A40 40 0 0 1 660 870z" stroke="black" stroke="#000" fill="gray" />
<rect x="680" y="700" width="40" height="170" fill="gray" stroke="white" stroke-width="2"></rect>
<text x="693" y="730" fill="black" font-size="20" font-family="Arial">C</text>
<text x="690" y="755" fill="black" font-size="20" font-family="Arial">组</text>
<text x="690" y="780" fill="black" font-size="20" font-family="Arial">一</text>
<text x="690" y="805" fill="black" font-size="20" font-family="Arial">级</text>
<text x="690" y="830" fill="black" font-size="20" font-family="Arial">高</text>
<text x="690" y="855" fill="black" font-size="20" font-family="Arial">加</text>
<!--二段中压至低低压-->
<line x1="1090" y1="100" x2="1090" y2="940" stroke="red" stroke-width="2"/>

<line x1="1090" y1="120" x2="1040" y2="120" stroke="red" stroke-width="2"/>
<line x1="1040" y1="120" x2="1040" y2="250" stroke="red" stroke-width="2"/>
<line x1="1090" y1="250" x2="1040" y2="250" stroke="red" stroke-width="2"/>
<polygon points='1030,140,1050,140,1030,180,1050,180' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='1030,190,1050,190,1030,230,1050,230' fill='white' stroke='black' stroke-width='2' ></polygon>

<polygon points='800,880 900,850 900,950 800,920'fill='gray' stroke='black' stroke-width='2'></polygon>
<text x="805" y="905" fill="black" font-size="20" font-family="Arial">2号汽轮机</text>










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
