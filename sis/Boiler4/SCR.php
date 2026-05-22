<html>
	<head>
    		<title>4号炉脱硝系统</title>
		<?php include("../header.php")?>
	</head>
	<body>
		<?php include("top.php")?>
		<center><h1>4号炉脱硝系统</h1></center>
		<script>
			var page = 166;
			var test =<?php
			include('../conn.php');
			$sql="SELECT kks,name,value,unit,updatetime,HH,H,HHH,L,LL,LLL,flag,angle,indexID,X,Y FROM sis where page=166 union SELECT kks,name,value,unit,updatetime,HH,H,HHH,L,LL,LLL,flag,angle1,indexID,X1,Y1 FROM sis where page1=166";
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
			<polygon points='330,630,330,650,370,630,370,650' fill='white' stroke='black' stroke-width='2' ></polygon>
			<polygon points='330,490,330,510,370,490,370,510' fill='white' stroke='black' stroke-width='2' ></polygon>
			<!--脱硝MCC段----->
			<text x="1410" y="40" fill="black" font-size="22" font-family="Arial">脱硝MCC电源进线开关1合位</text>
			<text x="1410" y="70" fill="black" font-size="22" font-family="Arial">脱硝MCC电源进线开关2合位</text>





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
