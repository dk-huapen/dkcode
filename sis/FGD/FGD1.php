<html>
	<head>
    		<title>1号吸收塔</title>
		<?php include("../header.php")?>
	</head>
	<body>
		<?php include("top.php")?>
		<center><h1>1号吸收塔</h1></center>
		<script>
			var page = 401;
			var test =<?php
			include('../conn.php');
			$sql="SELECT kks,name,value,unit,updatetime,HH,H,HHH,L,LL,LLL,flag,angle,indexID,X,Y FROM sis where page=401 union SELECT kks,name,value,unit,updatetime,HH,H,HHH,L,LL,LLL,flag,angle1,indexID,X1,Y1 FROM sis where page1=401";
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



<!--吸收塔-->
<polygon points='550,10,500,50,500,450,300,450,300,500,500,500,500,670,700,670,700,70,750,70,750,10'fill='gray' stroke='black' stroke-width='2' ></polygon>

<line x1="250" y1="400" x2="250" y2="600" stroke="gray" stroke-width="3"/>
<line x1="250" y1="600" x2="500" y2="600" stroke="gray" stroke-width="3"/>
<line x1="180" y1="400" x2="250" y2="400" stroke="gray" stroke-width="3"/>

<line x1="180" y1="350" x2="180" y2="650" stroke="gray" stroke-width="3"/>
<line x1="180" y1="650" x2="500" y2="650" stroke="gray" stroke-width="3"/>
<line x1="180" y1="350" x2="500" y2="350" stroke="gray" stroke-width="3"/>

<text x="310" y="375" fill="black" font-size="18"font-family="Arial">消防水</text>
<text x="380" y="375" fill="black" font-size="18"font-family="Arial">底部</text>
<text x="440" y="375" fill="black" font-size="18"font-family="Arial">两侧</text>

<!--循环槽-->
<rect x="850" y="470" width="150" height="200" fill="gray" stroke="black" stroke-width="2"></rect>

<line x1="1000" y1="650" x2="1540" y2="650" stroke="gray" stroke-width="4"/>
<!--一级循环泵D-->
<line x1="1180" y1="310" x2="1180" y2="650" stroke="gray" stroke-width="3"/>
<polygon points='1170,570,1190,570,1170,610,1190,610' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='1170,400,1190,400,1170,440,1190,440' fill='white' stroke='black' stroke-width='2' ></polygon>
<line x1="130" y1="310" x2="1180" y2="310" stroke="gray" stroke-width="3"/>
<!--一级循环泵A-->
<line x1="1300" y1="240" x2="1300" y2="650" stroke="gray" stroke-width="3"/>
<polygon points='1290,570,1310,570,1290,610,1310,610' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='1290,400,1310,400,1290,440,1310,440' fill='white' stroke='black' stroke-width='2' ></polygon>
<line x1="130" y1="240" x2="1300" y2="240" stroke="gray" stroke-width="3"/>
<!--一级循环泵B-->
<line x1="1420" y1="170" x2="1420" y2="650" stroke="gray" stroke-width="3"/>
<polygon points='1410,570,1430,570,1410,610,1430,610' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='1410,400,1430,400,1410,440,1430,440' fill='white' stroke='black' stroke-width='2' ></polygon>
<line x1="130" y1="170" x2="1420" y2="170" stroke="gray" stroke-width="3"/>
<!--一级循环泵C-->
<line x1="1540" y1="100" x2="1540" y2="650" stroke="gray" stroke-width="3"/>
<polygon points='1530,570,1550,570,1530,610,1550,610' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='1530,400,1550,400,1530,440,1550,440' fill='white' stroke='black' stroke-width='2' ></polygon>
<line x1="130" y1="100" x2="1540" y2="100" stroke="gray" stroke-width="3"/>




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
