<html>
	<head>
    		<title>3号炉D磨煤机</title>
		<?php include("../header.php")?>
	</head>
	<body>
		<?php include("top.php")?>
		<center><h1>3号炉制粉系统D</h1></center>
		<script>
			var page = 107;
			var test =<?php
			include('../conn.php');
			$sql="SELECT kks,name,value,unit,updatetime,HH,H,HHH,L,LL,LLL,flag,angle,indexID,X,Y FROM sis where page=107 union SELECT kks,name,value,unit,updatetime,HH,H,HHH,L,LL,LLL,flag,angle1,indexID,X1,Y1 FROM sis where page1=107";
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
				include("../TemplateSvg/MillTemplate.php");
			?>

			<!--包含具体名称的元素-->
			<text x="880" y="540" fill="black" font-size="20" font-family="Arial">D2</text>
			<text x="960" y="540" fill="black" font-size="20" font-family="Arial">D1</text>
			<text x="1040" y="540" fill="black" font-size="20" font-family="Arial">D4</text>
			<text x="1120" y="540" fill="black" font-size="20" font-family="Arial">D3</text>
			<text x="1010" y="770" fill="black" font-size="30" font-family="Arial">D</text>
			<text x="1190" y="70" fill="black" font-size="30" font-family="Arial">D</text>
			<text x="1085" y="298" fill="black" font-size="20" font-family="Arial">给煤机D</text>
			<text x="1725" y="70" fill="black" font-size="20" font-family="Arial">D层燃烧器</text>
			<text x="1680" y="90" fill="black" font-size="20" font-family="Arial">D2</text>
			<text x="1680" y="160" fill="black" font-size="20" font-family="Arial">D1</text>
			<text x="1680" y="230" fill="black" font-size="20" font-family="Arial">D4</text>
			<text x="1680" y="300" fill="black" font-size="20" font-family="Arial">D3</text>




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
