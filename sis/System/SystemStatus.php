<html>
	<head>
    		<title>SIS系统</title>
		<?php include("../header.php")?>
	</head>
	<body>
		<?php include("top.php")?>
		<center><h1>SIS系统</h1></center>
		<script>
			var page = 0;
			var test =<?php
			include('../conn.php');
			$sql="SELECT kks,name,value,unit,updatetime,HH,H,HHH,L,LL,LLL,flag,angle,indexID,X,Y FROM sis where page=0 or page1=0";
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
<text x="70" y="20" font-size="16" fill="black">脱硫接收数据大小：</text>
<text x="70" y="80" font-size="16" fill="black">锅炉接收数据大小：</text>
<text x="70" y="140" font-size="16" fill="black">公用接收数据大小：</text>

<text x="370" y="20" font-size="16" fill="black">脱硫接收服务状态：</text>
<text x="370" y="80" font-size="16" fill="black">锅炉接收服务状态：</text>
<text x="370" y="140" font-size="16" fill="black">公用接收服务状态：</text>

<text x="670" y="20" font-size="16" fill="black">OPC UA服务状态：</text>
<text x="670" y="80" font-size="16" fill="black">历史数据缓存状态：</text>
<text x="670" y="140" font-size="16" fill="black">SIS数据缓存状态：</text>

<text x="70" y="250" font-size="16" fill="black">历史数据服务状态：</text>
<text x="70" y="310" font-size="16" fill="black">历史数据库存储状态：</text>
<text x="70" y="370" font-size="16" fill="black">历史数据库清空状态：</text>
<text x="70" y="430" font-size="16" fill="black">历史数据库备份状态：</text>

<text x="270" y="250" font-size="16" fill="black">历史数据库初始化状态：</text>
<text x="270" y="310" font-size="16" fill="black">历史数据库存储开始：</text>
<text x="270" y="370" font-size="16" fill="black">历史数据清空储开始：</text>

<text x="470" y="310" font-size="16" fill="black">历史数据库存储结束：</text>
<text x="470" y="370" font-size="16" fill="black">历史数据库清空结束：</text>

<text x="670" y="250" font-size="16" fill="black">历史数据库初始化表数量：</text>
<text x="670" y="310" font-size="16" fill="black">历史数据库存储数据表量：</text>
<text x="670" y="370" font-size="16" fill="black">历史数据库存清空数据表量：</text>








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
