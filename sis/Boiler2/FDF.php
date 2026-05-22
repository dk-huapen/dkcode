<html>
	<head>
    		<title>2号炉送风机</title>
		<?php include("../header.php")?>
	</head>
	<body>
		<?php include("top.php")?>
		<center><h1>2号炉送风机本体系统</h1></center>
		<script>
			var page = 58;
			var test =<?php
			include('../conn.php');
			$sql="SELECT kks,name,value,unit,updatetime,HH,H,HHH,L,LL,LLL,flag,angle,indexID,X,Y FROM sis where page=58 union SELECT kks,name,value,unit,updatetime,HH,H,HHH,L,LL,LLL,flag,angle1,indexID,X1,Y1 FROM sis where page1=58";
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
				//包含风机机模板
				include("../TemplateSvg/SixFanTemplate.php");
			?>
			<!--包含具体名称的元素-->
<text x="210" y="440" fill="black" font-size="25" font-family="Arial">送风机A</text>
<text x="1160" y="440" fill="black" font-size="25" font-family="Arial">送风机B</text>
<text x="330" y="80" fill="black" font-size="20" font-family="Arial">送风机急停</text>
<text x="330" y="110" fill="black" font-size="20" font-family="Arial">送风机故障</text>
<text x="330" y="140" fill="black" font-size="20" font-family="Arial">送风机就地</text>
<text x="280" y="170" fill="black" font-size="20" font-family="Arial">送风机停止(SOE)</text>
<text x="1280" y="80" fill="black" font-size="20" font-family="Arial">送风机急停</text>
<text x="1280" y="110" fill="black" font-size="20" font-family="Arial">送风机故障</text>
<text x="1280" y="140" fill="black" font-size="20" font-family="Arial">送风机就地</text>
<text x="1230" y="170" fill="black" font-size="20" font-family="Arial">送风机停止(SOE)</text>

<line x1="30" y1="680" x2="930" y2="680" stroke="black" stroke-width="2"/>

<text x="50" y="720" fill="black" font-size="25" font-family="Arial">启动允许条件</text>
<text x="50" y="760" fill="black" font-size="20" font-family="Arial">入口调节挡板开度小于5%</text>
<text x="50" y="790" fill="black" font-size="20" font-family="Arial">无送风机跳闸条件</text>
<text x="50" y="820" fill="black" font-size="20" font-family="Arial">送风机无故障</text>
<text x="50" y="850" fill="black" font-size="20" font-family="Arial">送风机无保护动作</text>
<text x="50" y="880" fill="black" font-size="20" font-family="Arial">引风机A或B已运行</text>
<text x="50" y="910" fill="black" font-size="20" font-family="Arial">空预器A运行且二次热风挡板已开</text>
<text x="50" y="940" fill="black" font-size="20" font-family="Arial">送风机出口风门关闭</text>

<text x="450" y="720" fill="black" font-size="25" font-family="Arial">跳闸条件</text>
<text x="450" y="760" fill="black" font-size="20" font-family="Arial">MFT且炉膛压力高高且送风机A变频器</text>
<text x="450" y="780" fill="black" font-size="20" font-family="Arial">指令小于35%,延时60S</text>
<text x="450" y="820" fill="black" font-size="20" font-family="Arial">送风机运行超过120s,出口门关闭</text>
<text x="450" y="850" fill="black" font-size="20" font-family="Arial">送风机均运行，引风机A未运行</text>
<text x="450" y="880" fill="black" font-size="20" font-family="Arial">引风机A/B均为运行</text>
<text x="450" y="910" fill="black" font-size="20" font-family="Arial">送风机保护动作</text>
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
