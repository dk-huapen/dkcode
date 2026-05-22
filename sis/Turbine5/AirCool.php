<html>
	<head>
    		<title>5号汽轮机空冷</title>
		<?php include("../header.php")?>
	</head>
	<body>
		<?php include("top.php")?>
		<center><h1>5号汽轮机空冷系统</h1></center>
		<script>
			var page = 332;
			var test =<?php
			include('../conn.php');
			$sql="SELECT kks,name,value,unit,updatetime,HH,H,HHH,L,LL,LLL,flag,angle,indexID,X,Y FROM sis where page=332 union SELECT kks,name,value,unit,updatetime,HH,H,HHH,L,LL,LLL,flag,angle1,indexID,X1,Y1 FROM sis where page1=332";
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
			<?php
				//包含磨煤机模板
				include("../TemplateSvg/AirCoolTemplate.php");
			?>
			<!--包含具体名称的元素-->


<text x="50" y="20" fill="black" font-size="20" font-family="Arial">环境温度</text>
<text x="50" y="70" fill="black" font-size="20" font-family="Arial">大气压力</text>

<!---1号风机x330y320-->
<line x1="1060" y1="130" x2="1060" y2="250" stroke="black" stroke-width="2"/>
<line x1="890" y1="130" x2="890" y2="300" stroke="black" stroke-width="2"/>
<line x1="975" y1="90" x2="1060" y2="130" stroke="black" stroke-width="2"/>
<line x1="975" y1="90" x2="890" y2="130" stroke="black" stroke-width="2"/>
<text x="930" y="151" fill="black" font-size="18" font-family="Arial">准备好</text>
<text x="930" y="176" fill="black" font-size="18" font-family="Arial">故障</text>
<text x="910" y="216" fill="black" font-size="20" font-family="Arial">FB</text>
<text x="910" y="236" fill="black" font-size="20" font-family="Arial">SP</text>
<text x="940" y="285" fill="black" font-size="20" font-family="Arial">1号风机</text>
<!---2号风机-->
<line x1="1520" y1="130" x2="1520" y2="250" stroke="black" stroke-width="2"/>
<line x1="1350" y1="130" x2="1350" y2="300" stroke="black" stroke-width="2"/>
<line x1="1435" y1="90" x2="1520" y2="130" stroke="black" stroke-width="2"/>
<line x1="1435" y1="90" x2="1350" y2="130" stroke="black" stroke-width="2"/>
<text x="1390" y="151" fill="black" font-size="18" font-family="Arial">准备好</text>
<text x="1390" y="176" fill="black" font-size="18" font-family="Arial">故障</text>
<text x="1370" y="216" fill="black" font-size="20" font-family="Arial">FB</text>
<text x="1370" y="236" fill="black" font-size="20" font-family="Arial">SP</text>
<text x="1400" y="285" fill="black" font-size="20" font-family="Arial">2号风机</text>
<!---3号风机x330y320-->
<line x1="1060" y1="450" x2="1060" y2="570" stroke="black" stroke-width="2"/>
<line x1="890" y1="450" x2="890" y2="620" stroke="black" stroke-width="2"/>
<line x1="975" y1="410" x2="1060" y2="450" stroke="black" stroke-width="2"/>
<line x1="975" y1="410" x2="890" y2="450" stroke="black" stroke-width="2"/>
<text x="930" y="471" fill="black" font-size="18" font-family="Arial">准备好</text>
<text x="930" y="496" fill="black" font-size="18" font-family="Arial">故障</text>
<text x="910" y="536" fill="black" font-size="20" font-family="Arial">FB</text>
<text x="910" y="556" fill="black" font-size="20" font-family="Arial">SP</text>
<text x="940" y="605" fill="black" font-size="20" font-family="Arial">3号风机</text>
<!---4号风机-->
<line x1="1520" y1="450" x2="1520" y2="570" stroke="black" stroke-width="2"/>
<line x1="1350" y1="450" x2="1350" y2="620" stroke="black" stroke-width="2"/>
<line x1="1435" y1="410" x2="1520" y2="450" stroke="black" stroke-width="2"/>
<line x1="1435" y1="410" x2="1350" y2="450" stroke="black" stroke-width="2"/>
<text x="1390" y="471" fill="black" font-size="18" font-family="Arial">准备好</text>
<text x="1390" y="496" fill="black" font-size="18" font-family="Arial">故障</text>
<text x="1370" y="536" fill="black" font-size="20" font-family="Arial">FB</text>
<text x="1370" y="556" fill="black" font-size="20" font-family="Arial">SP</text>
<text x="1400" y="605" fill="black" font-size="20" font-family="Arial">4号风机</text>
<!---A列凝结水回水-->
<line x1="1060" y1="250" x2="1640" y2="250" stroke="green" stroke-width="2"/>
<line x1="1640" y1="250" x2="1640" y2="300" stroke="green" stroke-width="2"/>
<line x1="890" y1="300" x2="1810" y2="300" stroke="green" stroke-width="2"/>
<line x1="1810" y1="300" x2="1810" y2="360" stroke="green" stroke-width="2"/>
<text x="1818" y="320" fill="black" font-size="20" font-family="Arial">A</text>
<text x="1815" y="340" fill="black" font-size="20" font-family="Arial">列</text>
<text x="1815" y="360" fill="black" font-size="20" font-family="Arial">凝</text>
<text x="1815" y="380" fill="black" font-size="20" font-family="Arial">结</text>
<text x="1815" y="400" fill="black" font-size="20" font-family="Arial">水</text>
<text x="1815" y="420" fill="black" font-size="20" font-family="Arial">回</text>
<text x="1815" y="440" fill="black" font-size="20" font-family="Arial">水</text>
<!---B列凝结水回水-->
<line x1="1060" y1="570" x2="1640" y2="570" stroke="green" stroke-width="2"/>
<line x1="1640" y1="570" x2="1640" y2="620" stroke="green" stroke-width="2"/>
<line x1="890" y1="620" x2="1810" y2="620" stroke="green" stroke-width="2"/>
<line x1="1810" y1="620" x2="1810" y2="680" stroke="green" stroke-width="2"/>
<text x="1818" y="640" fill="black" font-size="20" font-family="Arial">B</text>
<text x="1815" y="660" fill="black" font-size="20" font-family="Arial">列</text>
<text x="1815" y="680" fill="black" font-size="20" font-family="Arial">凝</text>
<text x="1815" y="700" fill="black" font-size="20" font-family="Arial">结</text>
<text x="1815" y="720" fill="black" font-size="20" font-family="Arial">水</text>
<text x="1815" y="740" fill="black" font-size="20" font-family="Arial">回</text>
<text x="1815" y="760" fill="black" font-size="20" font-family="Arial">水</text>
<!---抽汽管道-->
<line x1="910" y1="50" x2="1770" y2="50" stroke="aqua" stroke-width="2"/>
<line x1="1370" y1="50" x2="1370" y2="119" stroke="aqua" stroke-width="2"/>
<line x1="1500" y1="50" x2="1500" y2="119" stroke="aqua" stroke-width="2"/>
<line x1="910" y1="50" x2="910" y2="119" stroke="aqua" stroke-width="2"/>
<line x1="1040" y1="50" x2="1040" y2="119" stroke="aqua" stroke-width="2"/>

<line x1="910" y1="370" x2="1770" y2="370" stroke="aqua" stroke-width="2"/>
<line x1="1370" y1="370" x2="1370" y2="439" stroke="aqua" stroke-width="2"/>
<line x1="1500" y1="370" x2="1500" y2="439" stroke="aqua" stroke-width="2"/>
<line x1="910" y1="370" x2="910" y2="439" stroke="aqua" stroke-width="2"/>
<line x1="1040" y1="370" x2="1040" y2="439" stroke="aqua" stroke-width="2"/>


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
