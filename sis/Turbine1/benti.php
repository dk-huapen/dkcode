<html>
	<head>
    		<title>1号汽轮机本体</title>
		<?php include("../header.php")?>
	</head>
	<body>
		<?php include("top.php")?>
		<center><h1>1号汽轮机本体</h1></center>
		<script>
			var page = 304;
			var test =<?php
			include('../conn.php');
			$sql="SELECT kks,name,value,unit,updatetime,HH,H,HHH,L,LL,LLL,flag,angle,indexID,X,Y FROM sis where page=304 union SELECT kks,name,value,unit,updatetime,HH,H,HHH,L,LL,LLL,flag,angle1,indexID,X1,Y1 FROM sis where page1=304";
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


<line x1="1850" y1="50" x2="1850" y2="950" stroke="black" stroke-width="2"/>
<!---汽轮机本体---->
<!---高速轴---->
<rect x="80" y="290" width="1060" height="20" fill="gray" stroke="black" stroke-width="1"></rect>

<polygon points='365,247 390,250 730,200 730,400 390,350 365,353'fill='gray' stroke='black' stroke-width='1'></polygon>
<text x="505" y="315" fill="black" font-size="20" font-family="Arial">汽轮机</text>
<line x1="390" y1="250" x2="390" y2="350" stroke="black" stroke-width="2"/>
<rect x="730" y="200" width="30" height="200" fill="gray" stroke="black" stroke-width="1"></rect>


<!---低速轴---->
<rect x="1030" y="350" width="740" height="20" fill="gray" stroke="black" stroke-width="1"></rect>

<!---减速箱--->
<rect x="1050" y="270" width="70" height="120" fill="gray" stroke="black" stroke-width="1"></rect>

<!---发电机---->
<rect x="1380" y="300" width="220" height="120" fill="gray" stroke="black" stroke-width="1"></rect>












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
