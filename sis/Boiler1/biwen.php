<html>
	<head>
    		<title>1号锅炉壁温</title>
		<?php include("../header.php")?>
	</head>
	<body>
		<?php include("top.php")?>
		<center><h1>1号锅炉壁温</h1></center>
		<script>
			var page = 12;
			var test =<?php
			include('../conn.php');
			$sql="SELECT kks,name,value,unit,updatetime,HH,H,HHH,L,LL,LLL,flag,angle,indexID,X,Y FROM sis where page=12 union SELECT kks,name,value,unit,updatetime,HH,H,HHH,L,LL,LLL,flag,angle1,indexID,X1,Y1 FROM sis where page1=12";
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
				//包含壁温模板
				include("../TemplateSvg/biwenTemplate.php");
			?>
			<!--包含具体名称的元素-->


<text x="150" y="900" fill="black" font-size="20" font-family="Arial">高温过热器进口管壁温度(27-3)</text>
<text x="740" y="900" fill="black" font-size="20" font-family="Arial">高温过热器出口管壁温度(27-3)</text>
<text x="1320" y="720" fill="black" font-size="20" font-family="Arial">高温过热器进口管壁温度(27-2)</text>
<text x="1320" y="765" fill="black" font-size="20" font-family="Arial">高温过热器出口管壁温度(27-2)</text>
<text x="1320" y="810" fill="black" font-size="20" font-family="Arial">高温过热器进出口管壁温差(27-2)</text>
<text x="1320" y="900" fill="black" font-size="20" font-family="Arial">高温过热器进出口管壁温差(27-3)</text>

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
