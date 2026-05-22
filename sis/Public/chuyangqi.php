<html>
	<head>
    		<title>除氧器系统</title>
		<?php include("../header.php")?>
	</head>
	<body>
		<?php include("top.php")?>
		<center><h1>除氧器系统</h1></center>
		<script>
			var page = 201;
			var test =<?php
			include('../conn.php');
			$sql="SELECT kks,name,value,unit,updatetime,HH,H,HHH,L,LL,LLL,flag,angle,indexID,X,Y FROM sis where page=201 union SELECT kks,name,value,unit,updatetime,HH,H,HHH,L,LL,LLL,flag,angle,indexID,X1,Y1 FROM sis where page1=201";
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


<line x1="50" y1="20" x2="860" y2="20" stroke="green" stroke-width="2"/><!--低低压蒸气母管-->
<line x1="150" y1="30" x2="1860" y2="30" stroke="red" stroke-width="2"/><!--低低压蒸气母管-->
<line x1="150" y1="105" x2="1860" y2="105" stroke="green" stroke-width="4"/><!--除盐水母管-->
<polygon points='1800,95,1800,115,1840,95,1840,115' fill='white' stroke='black' stroke-width='2' ></polygon>
<!--汽包----->
<line x1="50" y1="210" x2="1710" y2="210" stroke="green" stroke-width="2"/><!--再循环母管-->
<line x1="140" y1="435" x2="1640" y2="435" stroke="green" stroke-width="4"/><!--低压给水母管-->
<line x1="40" y1="770" x2="1800" y2="770" stroke="green" stroke-width="4"/><!--冷高压给水母管-->
<line x1="40" y1="910" x2="1800" y2="910" stroke="green" stroke-width="4"/><!--热高压给水母管-->
<line x1="40" y1="770" x2="40" y2="910" stroke="green" stroke-width="4"/><!--冷高压给水母管-->
<line x1="730" y1="770" x2="730" y2="910" stroke="green" stroke-width="4"/><!--冷高压给水母管-->

<!--1号除氧器-->
<path d="M 110 360 A 50 50 0 0 1 110 260 L400 260 A50 50 0 0 1 400 360z" stroke="black" stroke="#000" fill="white" />
<line x1="160" y1="360" x2="160" y2="425" stroke="green" stroke-width="2"/>
<line x1="160" y1="415" x2="240" y2="415" stroke="green" stroke-width="2"/>
<line x1="240" y1="360" x2="240" y2="415" stroke="green" stroke-width="2"/>
<line x1="240" y1="365" x2="275" y2="365" stroke="green" stroke-width="2"/>
<line x1="275" y1="365" x2="275" y2="425" stroke="green" stroke-width="2"/>
<line x1="370" y1="360" x2="370" y2="435" stroke="green" stroke-width="2"/>
<line x1="140" y1="435" x2="140" y2="770" stroke="green" stroke-width="2"/>
<polygon points='185,405,225,425,225,405,185,425' fill='white' stroke='black' stroke-width='2' ></polygon>

<circle cx='140' cy='540' r='13' fill='gray' stroke='black' stroke-width='2'></circle>
<line x1="127" y1="540" x2="153" y2="540" stroke="black" stroke-width="3"/>
<polygon points='130,640,150,640,130,680,150,680' fill='white' stroke='black' stroke-width='2' ></polygon>

<line x1="50" y1="210" x2="50" y2="660" stroke="green" stroke-width="2"/>
<line x1="50" y1="660" x2="140" y2="660" stroke="green" stroke-width="2"/>
<text x="260" y="960" fill="black" font-size="20" font-family="Arial">1号锅炉给水</text>

<!--2号除氧器-->
<path d="M 520 360 A 50 50 0 0 1 520 260 L790 260 A50 50 0 0 1 790 360z" stroke="black" stroke="#000" fill="white" />
<line x1="780" y1="360" x2="780" y2="435" stroke="green" stroke-width="2"/>
<line x1="550" y1="435" x2="550" y2="770" stroke="green" stroke-width="2"/>
<line x1="460" y1="210" x2="460" y2="660" stroke="green" stroke-width="2"/>
<line x1="460" y1="660" x2="550" y2="660" stroke="green" stroke-width="2"/>

<circle cx='550' cy='540' r='13' fill='gray' stroke='black' stroke-width='2'></circle>
<line x1="537" y1="540" x2="563" y2="540" stroke="black" stroke-width="3"/>
<polygon points='540,640,560,640,540,680,560,680' fill='white' stroke='black' stroke-width='2' ></polygon>

<!--3号除氧器-->
<path d="M 910 360 A 50 50 0 0 1 910 260 L1200 260 A50 50 0 0 1 1200 360z" stroke="black" stroke="#000" fill="white" />
<line x1="1190" y1="360" x2="1190" y2="435" stroke="green" stroke-width="2"/>
<line x1="940" y1="435" x2="940" y2="770" stroke="green" stroke-width="2"/>
<line x1="850" y1="210" x2="850" y2="660" stroke="green" stroke-width="2"/>
<line x1="850" y1="660" x2="940" y2="660" stroke="green" stroke-width="2"/>

<circle cx='940' cy='540' r='13' fill='gray' stroke='black' stroke-width='2'></circle>
<line x1="927" y1="540" x2="953" y2="540" stroke="black" stroke-width="3"/>
<polygon points='930,640,950,640,930,680,950,680' fill='white' stroke='black' stroke-width='2' ></polygon>

<!--4号除氧器-->
<path d="M 1320 360 A 50 50 0 0 1 1320 260 L1620 260 A50 50 0 0 1 1620 360z" stroke="black" stroke="#000" fill="white" />
<line x1="1600" y1="360" x2="1600" y2="435" stroke="green" stroke-width="2"/>
<line x1="1350" y1="435" x2="1350" y2="770" stroke="green" stroke-width="2"/>
<line x1="1260" y1="210" x2="1260" y2="660" stroke="green" stroke-width="2"/>
<line x1="1260" y1="660" x2="1350" y2="660" stroke="green" stroke-width="2"/>

<circle cx='1350' cy='540' r='13' fill='gray' stroke='black' stroke-width='2'></circle>
<line x1="1337" y1="540" x2="1363" y2="540" stroke="black" stroke-width="3"/>
<polygon points='1340,640,1360,640,1340,680,1360,680' fill='white' stroke='black' stroke-width='2' ></polygon>

<line x1="1710" y1="210" x2="1710" y2="660" stroke="green" stroke-width="2"/>
<line x1="1640" y1="435" x2="1640" y2="770" stroke="green" stroke-width="2"/>
<line x1="1640" y1="660" x2="1710" y2="660" stroke="green" stroke-width="2"/>
<circle cx='1640' cy='590' r='25' fill='gray' stroke='black' stroke-widty='2'></circle>
<polygon points='1635,590 1626,590 1640,608 1654,590 1645,590 1645,572 1635,572'fill='white' fill-opacity='0' stroke='black' stroke-width='2'></polygon>
<polygon points='1500,550 1600,580 1600,620 1500,650'fill='gray' stroke='black' stroke-width='2'></polygon>
<text x="1505" y="595" fill="black" font-size="20" font-family="Arial">给水泵</text>
<text x="1505" y="615" fill="black" font-size="20" font-family="Arial">汽轮机</text>

<line x1="1760" y1="105" x2="1760" y2="660" stroke="green" stroke-width="2"/>
<polygon points='1750,200,1770,200,1750,240,1770,240' fill='white' stroke='black' stroke-width='2' ></polygon>
<line x1="1760" y1="300" x2="1860" y2="300" stroke="green" stroke-width="2"/>
<polygon points='1750,400,1770,400,1750,440,1770,440' fill='white' stroke='black' stroke-width='2' ></polygon>





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
