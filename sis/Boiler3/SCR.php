<html>
	<head>
    		<title>3号炉脱硝系统</title>
		<?php include("../header.php")?>
	</head>
	<body>
		<?php include("top.php")?>
		<center><h1>3号炉脱硝系统</h1></center>
		<script>
			var page = 116;
			var test =<?php
			include('../conn.php');
			$sql="SELECT kks,name,value,unit,updatetime,HH,H,HHH,L,LL,LLL,flag,angle,indexID,X,Y FROM sis where page=116 union SELECT kks,name,value,unit,updatetime,HH,H,HHH,L,LL,LLL,flag,angle1,indexID,X1,Y1 FROM sis where page1=116";
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
				include("../TemplateSvg/SCRTemplate.php");
			?>
			<!--包含具体名称的元素-->
			<!--稀释风机出口阀----->
			<polygon points='220,630,220,650,260,630,260,650' fill='white' stroke='black' stroke-width='2' ></polygon>
			<polygon points='220,490,220,510,260,490,260,510' fill='white' stroke='black' stroke-width='2' ></polygon>
			<!--脱硝MCC段----->
			<rect x="1400" y="10" width="340" height="135" fill="gray" stroke="black" stroke-width="2"></rect>
			<text x="1510" y="40" fill="black" font-size="22" font-family="Arial">脱硝MCC段</text>
			<text x="1620" y="70" fill="black" font-size="18" font-family="Arial">单母线电流</text>
			<text x="1500" y="70" fill="black" font-size="18" font-family="Arial">合闸</text>
			<text x="1550" y="70" fill="black" font-size="18" font-family="Arial">分闸</text>
			<text x="1410" y="96" fill="black" font-size="18" font-family="Arial">工作电源</text>
			<text x="1410" y="125" fill="black" font-size="18" font-family="Arial">备用电源</text>





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
