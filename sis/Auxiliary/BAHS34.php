<html>
	<head>
    		<title>#3-#4号除渣系统</title>
		<?php include("../header.php")?>
	</head>
	<body>
		<?php include("top.php")?>
		<center><h1>#3-#4号除渣系统</h1></center>
		<script>
			var page = 252;
			var test =<?php
			include('../conn.php');
			$sql="SELECT kks,name,value,unit,updatetime,HH,H,HHH,L,LL,LLL,flag,angle,indexID,X,Y FROM sis where page=252 or page1=252";
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
				//包含二次风门模板
				include("../TemplateSvg/BAHSTemplate.php");
			?>
			<!--包含具体名称的元素-->
				<text x="300" y="85" fill="black" font-size="22" font-family="Arial">3号炉</text>
				<text x="300" y="535" fill="black" font-size="22" font-family="Arial">4号炉</text>
				<text x="1105" y="250" fill="black" font-size="22" font-family="Arial">3号斗提机</text>
				<text x="1285" y="250" fill="black" font-size="22" font-family="Arial">4号斗提机</text>
				<text x="1655" y="455" fill="black" font-size="22" font-family="Arial">2号渣库</text>







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
