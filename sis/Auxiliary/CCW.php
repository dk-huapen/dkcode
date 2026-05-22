<html>
	<head>
    		<title>冷却水系统</title>
		<?php include("../header.php")?>
	</head>
	<body>
		<?php include("top.php")?>
		<center><h1>冷却水系统</h1></center>
		<script>
			var page = 272;
			var test =<?php
			include('../conn.php');
			$sql="SELECT kks,name,value,unit,updatetime,HH,H,HHH,L,LL,LLL,flag,angle,indexID,X,Y FROM sis where page=272 union SELECT kks,name,value,unit,updatetime,HH,H,HHH,L,LL,LLL,flag,angle1,indexID,X1,Y1 FROM sis where page1=272";
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


<line x1="1850" y1="70" x2="1850" y2="700" stroke="black" stroke-width="2"/>

<!--1号炉----->
<rect x="195" y="170" width="110" height="70" fill="gray" stroke="black" stroke-width="1"></rect>
<text x="203" y="199" fill="black" font-size="20" font-family="Arial">磨煤机A润</text>
<text x="200" y="230" fill="black" font-size="20" font-family="Arial">滑油冷却水</text>

<line x1="1780" y1="600" x2="1780" y2="800" stroke="yellow" stroke-width="2"/>
<text x="1770" y="865" fill="black" font-size="20" font-family="Arial">仓</text>
<text x="1773" y="890" fill="black" font-size="20" font-family="Arial">D</text>
<text x="1560" y="955" fill="black" font-size="25" font-family="Arial">4号锅炉</text>

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
