<html>
	<head>
    		<title>1号炉密封风及火检冷却风系统</title>
		<?php include("../header.php")?>
	</head>
	<body>
		<?php include("top.php")?>
		<center><h1>1号炉密封风及火检冷却风系统</h1></center>
		<script>
			var page = 15;
			var test =<?php
			include('../conn.php');
			$sql="SELECT kks,name,value,unit,updatetime,HH,H,HHH,L,LL,LLL,flag,angle,indexID,X,Y FROM sis where page=15 union SELECT kks,name,value,unit,updatetime,HH,H,HHH,L,LL,LLL,flag,angle1,indexID,X1,Y1 FROM sis where page1=15 union SELECT kks,name,value,unit,updatetime,HH,H,HHH,L,LL,LLL,flag,angle2,indexID,X2,Y2 FROM sis where page2=15";
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
				include("../TemplateSvg/SAFTemplate.php");
			?>
			<!--包含具体名称的元素-->
			<text x="150" y="73" fill="black" font-size="18" font-family="Arial">D煤层火检</text>
			<text x="150" y="223" fill="black" font-size="18" font-family="Arial">C煤层火检</text>
			<text x="145" y="373" fill="black" font-size="18" font-family="Arial">BC油层火检</text>
			<text x="150" y="523" fill="black" font-size="18" font-family="Arial">A煤层火检</text>
			<text x="150" y="673" fill="black" font-size="18" font-family="Arial">B煤层火检</text>
			<text x="145" y="823" fill="black" font-size="18" font-family="Arial">A下油层火检</text>
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
