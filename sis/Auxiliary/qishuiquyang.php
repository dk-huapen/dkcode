<html>
	<head>
    		<title>汽水取样</title>
		<?php include("../header.php")?>
	</head>
	<body>
		<?php include("top.php")?>
		<center><h1>汽水取样系统数据</h1></center>
		<script>
			var page = 261;
			var test =<?php
			include('../conn.php');
			$sql="SELECT kks,name,value,unit,updatetime,HH,H,HHH,L,LL,LLL,flag,angle,indexID,X,Y FROM sis where page=261 union SELECT kks,name,value,unit,updatetime,HH,H,HHH,L,LL,LLL,flag,angle1,indexID,X1,Y1 FROM sis where page1=261";
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


<!--1号炉----->
<text x="200" y="80" fill="black" font-size="30" font-family="Arial">1号炉</text>
<text x="130" y="150" fill="black" font-size="20" font-family="Arial">除氧器出口氧含量</text>
<text x="130" y="210" fill="black" font-size="20" font-family="Arial">省煤器入口导电度</text>
<text x="130" y="270" fill="black" font-size="20" font-family="Arial">省煤器入口PH</text>
<text x="130" y="330" fill="black" font-size="20" font-family="Arial">汽包炉水导电度</text>
<text x="130" y="390" fill="black" font-size="20" font-family="Arial">汽包炉水PH</text>
<text x="130" y="450" fill="black" font-size="20" font-family="Arial">汽包炉水磷酸根含量</text>
<text x="130" y="510" fill="black" font-size="20" font-family="Arial">饱和蒸汽导电度</text>
<text x="130" y="570" fill="black" font-size="20" font-family="Arial">过热蒸汽蒸汽导电度</text>
<text x="130" y="630" fill="black" font-size="20" font-family="Arial">过热蒸汽蒸汽硅含量</text>
<line x1="440" y1="20" x2="440" y2="950" stroke="black" stroke-width="2"/>
<!--1号机----->
<text x="150" y="780" fill="black" font-size="30" font-family="Arial">1号汽轮机</text>
<text x="130" y="850" fill="black" font-size="20" font-family="Arial">凝结水泵出口导电度</text>
<text x="130" y="910" fill="black" font-size="20" font-family="Arial">凝结水泵出口含氧量</text>
<!--2号炉----->
<text x="540" y="80" fill="black" font-size="30" font-family="Arial">2号炉</text>
<text x="470" y="150" fill="black" font-size="20" font-family="Arial">除氧器出口氧含量</text>
<text x="470" y="210" fill="black" font-size="20" font-family="Arial">省煤器入口导电度</text>
<text x="470" y="270" fill="black" font-size="20" font-family="Arial">省煤器入口PH</text>
<text x="470" y="330" fill="black" font-size="20" font-family="Arial">汽包炉水导电度</text>
<text x="470" y="390" fill="black" font-size="20" font-family="Arial">汽包炉水PH</text>
<text x="470" y="450" fill="black" font-size="20" font-family="Arial">汽包炉水磷酸根含量</text>
<text x="470" y="510" fill="black" font-size="20" font-family="Arial">饱和蒸汽导电度</text>
<text x="470" y="570" fill="black" font-size="20" font-family="Arial">过热蒸汽蒸汽导电度</text>
<text x="470" y="630" fill="black" font-size="20" font-family="Arial">过热蒸汽蒸汽硅含量</text>
<line x1="780" y1="20" x2="780" y2="950" stroke="black" stroke-width="2"/>
<!--2号机----->
<text x="530" y="780" fill="black" font-size="30" font-family="Arial">2号汽轮机</text>
<text x="470" y="850" fill="black" font-size="20" font-family="Arial">凝结水泵出口导电度</text>
<text x="470" y="910" fill="black" font-size="20" font-family="Arial">凝结水泵出口含氧量</text>
<!--3号炉----->
<text x="880" y="80" fill="black" font-size="30" font-family="Arial">3号炉</text>
<text x="810" y="150" fill="black" font-size="20" font-family="Arial">除氧器出口氧含量</text>
<text x="810" y="210" fill="black" font-size="20" font-family="Arial">省煤器入口导电度</text>
<text x="810" y="270" fill="black" font-size="20" font-family="Arial">省煤器入口PH</text>
<text x="810" y="330" fill="black" font-size="20" font-family="Arial">汽包炉水导电度</text>
<text x="810" y="390" fill="black" font-size="20" font-family="Arial">汽包炉水PH</text>
<text x="810" y="450" fill="black" font-size="20" font-family="Arial">汽包炉水磷酸根含量</text>
<text x="810" y="510" fill="black" font-size="20" font-family="Arial">饱和蒸汽导电度</text>
<text x="810" y="570" fill="black" font-size="20" font-family="Arial">过热蒸汽蒸汽导电度</text>
<text x="810" y="630" fill="black" font-size="20" font-family="Arial">过热蒸汽蒸汽硅含量</text>
<line x1="1110" y1="20" x2="1110" y2="950" stroke="black" stroke-width="2"/>
<!--4号机----->
<text x="870" y="780" fill="black" font-size="30" font-family="Arial">4号汽轮机</text>
<text x="810" y="850" fill="black" font-size="20" font-family="Arial">凝结水泵出口导电度</text>
<text x="810" y="910" fill="black" font-size="20" font-family="Arial">凝结水泵出口含氧量</text>
<!--4号炉----->
<text x="1220" y="80" fill="black" font-size="30" font-family="Arial">4号炉</text>
<text x="1150" y="150" fill="black" font-size="20" font-family="Arial">除氧器出口氧含量</text>
<text x="1150" y="210" fill="black" font-size="20" font-family="Arial">省煤器入口导电度</text>
<text x="1150" y="270" fill="black" font-size="20" font-family="Arial">省煤器入口PH</text>
<text x="1150" y="330" fill="black" font-size="20" font-family="Arial">汽包炉水导电度</text>
<text x="1150" y="390" fill="black" font-size="20" font-family="Arial">汽包炉水PH</text>
<text x="1150" y="450" fill="black" font-size="20" font-family="Arial">汽包炉水磷酸根含量</text>
<text x="1150" y="510" fill="black" font-size="20" font-family="Arial">饱和蒸汽导电度</text>
<text x="1150" y="570" fill="black" font-size="20" font-family="Arial">过热蒸汽蒸汽导电度</text>
<text x="1150" y="630" fill="black" font-size="20" font-family="Arial">过热蒸汽蒸汽硅含量</text>
<line x1="1450" y1="20" x2="1450" y2="950" stroke="black" stroke-width="2"/>
<!--5号机----->
<text x="1210" y="780" fill="black" font-size="30" font-family="Arial">5号汽轮机</text>
<text x="1150" y="850" fill="black" font-size="20" font-family="Arial">凝结水泵出口导电度</text>
<text x="1150" y="910" fill="black" font-size="20" font-family="Arial">凝结水泵出口含氧量</text>
<!--公用管网----->
<text x="1550" y="80" fill="black" font-size="30" font-family="Arial">公用管网</text>
<text x="1490" y="150" fill="black" font-size="20" font-family="Arial">冷除盐水母管PH</text>
<text x="1490" y="210" fill="black" font-size="20" font-family="Arial">冷除盐水电导率</text>
<text x="1490" y="270" fill="black" font-size="20" font-family="Arial">热除盐水母管PH</text>
<text x="1490" y="330" fill="black" font-size="20" font-family="Arial">热除盐水氢电导率</text>
<text x="1490" y="390" fill="black" font-size="20" font-family="Arial">1.0蒸汽氢电导率</text>
<text x="1490" y="450" fill="black" font-size="20" font-family="Arial">2.8一段蒸汽氢电导率</text>
<text x="1490" y="510" fill="black" font-size="20" font-family="Arial">2.8二段蒸汽氢电导率</text>
<text x="1490" y="570" fill="black" font-size="20" font-family="Arial">2.8二段蒸汽比电导率</text>
<text x="1490" y="630" fill="black" font-size="20" font-family="Arial">2号机进汽蒸汽氢电导率</text>
<text x="1490" y="690" fill="black" font-size="20" font-family="Arial">0.5蒸汽氢电导率</text>
<line x1="40" y1="700" x2="1450" y2="700" stroke="black" stroke-width="2"/>





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
