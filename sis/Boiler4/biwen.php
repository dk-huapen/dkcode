<html>
	<head>
    		<title>4号锅炉壁温</title>
		<?php include("../header.php")?>
	</head>
	<body>
		<?php include("top.php")?>
		<center><h1>4号锅炉壁温</h1></center>
		<script>
			var page = 162;
			var test =<?php
			include('../conn.php');
			$sql="SELECT kks,name,value,unit,updatetime,HH,H,HHH,L,LL,LLL,flag,angle,indexID,X,Y FROM sis where page=162 union SELECT kks,name,value,unit,updatetime,HH,H,HHH,L,LL,LLL,flag,angle1,indexID,X1,Y1 FROM sis where page1=162";
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
//				include("../TemplateSvg/biwenTemplate.php");
			?>
			<!--包含具体名称的元素-->
<!--1列----->
<line x1="80" y1="55" x2="80" y2="910" stroke="black" stroke-width="2"/>
<line x1="460" y1="55" x2="460" y2="910" stroke="black" stroke-width="2"/>
<line x1="80" y1="55" x2="610" y2="55" stroke="black" stroke-width="2"/>
<text x="150" y="90" fill="black" font-size="20" font-family="Arial">低温过热器出口管壁温度1</text>
<line x1="80" y1="100" x2="610" y2="100" stroke="black" stroke-width="2"/>
<text x="150" y="135" fill="black" font-size="20" font-family="Arial">低温过热器出口管壁温度2</text>
<line x1="80" y1="145" x2="610" y2="145" stroke="black" stroke-width="2"/>
<text x="150" y="180" fill="black" font-size="20" font-family="Arial">低温过热器出口管壁温度3</text>
<line x1="80" y1="190" x2="610" y2="190" stroke="black" stroke-width="2"/>
<text x="150" y="225" fill="black" font-size="20" font-family="Arial">低温过热器出口管壁温度4</text>
<line x1="80" y1="235" x2="610" y2="235" stroke="black" stroke-width="2"/>
<text x="150" y="270" fill="black" font-size="20" font-family="Arial">低温过热器出口管壁温度5</text>
<line x1="80" y1="280" x2="610" y2="280" stroke="black" stroke-width="2"/>
<text x="150" y="315" fill="black" font-size="20" font-family="Arial">低温过热器出口管壁温度6</text>
<line x1="80" y1="325" x2="610" y2="325" stroke="black" stroke-width="2"/>
<text x="150" y="360" fill="black" font-size="20" font-family="Arial">低温过热器出口管壁温度7</text>
<line x1="80" y1="370" x2="610" y2="370" stroke="black" stroke-width="2"/>
<text x="150" y="405" fill="black" font-size="20" font-family="Arial">低温过热器出口管壁温度8</text>
<line x1="80" y1="415" x2="610" y2="415" stroke="black" stroke-width="2"/>
<text x="150" y="450" fill="black" font-size="20" font-family="Arial">低温过热器出口管壁温度9</text>
<line x1="80" y1="460" x2="610" y2="460" stroke="black" stroke-width="2"/>
<text x="150" y="495" fill="black" font-size="20" font-family="Arial"></text>
<line x1="80" y1="505" x2="610" y2="505" stroke="black" stroke-width="2"/>
<text x="150" y="540" fill="black" font-size="20" font-family="Arial"></text>
<line x1="80" y1="550" x2="610" y2="550" stroke="black" stroke-width="2"/>
<text x="150" y="585" fill="black" font-size="20" font-family="Arial"></text>
<line x1="80" y1="595" x2="610" y2="595" stroke="black" stroke-width="2"/>
<text x="150" y="630" fill="black" font-size="20" font-family="Arial"></text>
<line x1="80" y1="640" x2="610" y2="640" stroke="black" stroke-width="2"/>
<text x="150" y="675" fill="black" font-size="20" font-family="Arial"></text>
<line x1="80" y1="685" x2="610" y2="685" stroke="black" stroke-width="2"/>
<text x="150" y="720" fill="black" font-size="20" font-family="Arial"></text>
<line x1="80" y1="730" x2="610" y2="730" stroke="black" stroke-width="2"/>
<text x="150" y="765" fill="black" font-size="20" font-family="Arial"></text>
<line x1="80" y1="775" x2="610" y2="775" stroke="black" stroke-width="2"/>
<text x="150" y="810" fill="black" font-size="20" font-family="Arial"></text>
<line x1="80" y1="820" x2="610" y2="820" stroke="black" stroke-width="2"/>
<text x="150" y="855" fill="black" font-size="20" font-family="Arial"></text>
<line x1="80" y1="865" x2="610" y2="865" stroke="black" stroke-width="2"/>
<line x1="80" y1="910" x2="610" y2="910" stroke="black" stroke-width="2"/>
<line x1="610" y1="55" x2="610" y2="910" stroke="black" stroke-width="2"/>

<!--2号炉----->
<line x1="670" y1="55" x2="670" y2="910" stroke="black" stroke-width="2"/>
<line x1="1050" y1="55" x2="1050" y2="910" stroke="black" stroke-width="2"/>
<line x1="670" y1="55" x2="1200" y2="55" stroke="black" stroke-width="2"/>
<text x="740" y="90" fill="black" font-size="20" font-family="Arial">高温过热器出口管壁温度1</text>
<line x1="670" y1="100" x2="1200" y2="100" stroke="black" stroke-width="2"/>
<text x="740" y="135" fill="black" font-size="20" font-family="Arial">高温过热器出口管壁温度2</text>
<line x1="670" y1="145" x2="1200" y2="145" stroke="black" stroke-width="2"/>
<text x="740" y="180" fill="black" font-size="20" font-family="Arial">高温过热器出口管壁温度3</text>
<line x1="670" y1="190" x2="1200" y2="190" stroke="black" stroke-width="2"/>
<text x="740" y="225" fill="black" font-size="20" font-family="Arial">高温过热器出口管壁温度4</text>
<line x1="670" y1="235" x2="1200" y2="235" stroke="black" stroke-width="2"/>
<text x="740" y="270" fill="black" font-size="20" font-family="Arial">高温过热器出口管壁温度5</text>
<line x1="670" y1="280" x2="1200" y2="280" stroke="black" stroke-width="2"/>
<text x="740" y="315" fill="black" font-size="20" font-family="Arial">高温过热器出口管壁温度6</text>
<line x1="670" y1="325" x2="1200" y2="325" stroke="black" stroke-width="2"/>
<text x="740" y="360" fill="black" font-size="20" font-family="Arial">高温过热器出口管壁温度7</text>
<line x1="670" y1="370" x2="1200" y2="370" stroke="black" stroke-width="2"/>
<text x="740" y="405" fill="black" font-size="20" font-family="Arial">高温过热器出口管壁温度8</text>
<line x1="670" y1="415" x2="1200" y2="415" stroke="black" stroke-width="2"/>
<text x="740" y="450" fill="black" font-size="20" font-family="Arial">高温过热器出口管壁温度9</text>
<line x1="670" y1="460" x2="1200" y2="460" stroke="black" stroke-width="2"/>
<text x="740" y="495" fill="black" font-size="20" font-family="Arial"></text>
<line x1="670" y1="505" x2="1200" y2="505" stroke="black" stroke-width="2"/>
<text x="740" y="540" fill="black" font-size="20" font-family="Arial"></text>
<line x1="670" y1="550" x2="1200" y2="550" stroke="black" stroke-width="2"/>
<text x="740" y="585" fill="black" font-size="20" font-family="Arial"></text>
<line x1="670" y1="595" x2="1200" y2="595" stroke="black" stroke-width="2"/>
<text x="740" y="630" fill="black" font-size="20" font-family="Arial"></text>
<line x1="670" y1="640" x2="1200" y2="640" stroke="black" stroke-width="2"/>
<text x="740" y="675" fill="black" font-size="20" font-family="Arial"></text>
<line x1="670" y1="685" x2="1200" y2="685" stroke="black" stroke-width="2"/>
<text x="740" y="720" fill="black" font-size="20" font-family="Arial"></text>
<line x1="670" y1="730" x2="1200" y2="730" stroke="black" stroke-width="2"/>
<text x="740" y="765" fill="black" font-size="20" font-family="Arial"></text>
<line x1="670" y1="775" x2="1200" y2="775" stroke="black" stroke-width="2"/>
<text x="740" y="810" fill="black" font-size="20" font-family="Arial"></text>
<line x1="670" y1="820" x2="1200" y2="820" stroke="black" stroke-width="2"/>
<text x="740" y="855" fill="black" font-size="20" font-family="Arial"></text>
<line x1="670" y1="865" x2="1200" y2="865" stroke="black" stroke-width="2"/>
<line x1="670" y1="910" x2="1200" y2="910" stroke="black" stroke-width="2"/>
<line x1="1200" y1="55" x2="1200" y2="910" stroke="black" stroke-width="2"/>

<!--3号炉----->
<line x1="1250" y1="55" x2="1250" y2="910" stroke="black" stroke-width="2"/>
<line x1="1630" y1="55" x2="1630" y2="910" stroke="black" stroke-width="2"/>
<line x1="1250" y1="55" x2="1780" y2="55" stroke="black" stroke-width="2"/>
<text x="1320" y="90" fill="black" font-size="20" font-family="Arial">屏过热器出口管壁温度1</text>
<line x1="1250" y1="100" x2="1780" y2="100" stroke="black" stroke-width="2"/>
<text x="1320" y="135" fill="black" font-size="20" font-family="Arial">屏过热器出口管壁温度2</text>
<line x1="1250" y1="145" x2="1780" y2="145" stroke="black" stroke-width="2"/>
<text x="1320" y="180" fill="black" font-size="20" font-family="Arial">屏过热器出口管壁温度3</text>
<line x1="1250" y1="190" x2="1780" y2="190" stroke="black" stroke-width="2"/>
<text x="1320" y="225" fill="black" font-size="20" font-family="Arial">屏过热器出口管壁温度4</text>
<line x1="1250" y1="235" x2="1780" y2="235" stroke="black" stroke-width="2"/>
<text x="1320" y="270" fill="black" font-size="20" font-family="Arial">屏过热器出口管壁温度5</text>
<line x1="1250" y1="280" x2="1780" y2="280" stroke="black" stroke-width="2"/>
<text x="1320" y="315" fill="black" font-size="20" font-family="Arial">屏过热器出口管壁温度6</text>
<line x1="1250" y1="325" x2="1780" y2="325" stroke="black" stroke-width="2"/>
<text x="1320" y="360" fill="black" font-size="20" font-family="Arial">屏过热器出口管壁温度7</text>
<line x1="1250" y1="370" x2="1780" y2="370" stroke="black" stroke-width="2"/>
<text x="1320" y="405" fill="black" font-size="20" font-family="Arial">屏过热器出口管壁温度8</text>
<line x1="1250" y1="415" x2="1780" y2="415" stroke="black" stroke-width="2"/>
<text x="1320" y="450" fill="black" font-size="20" font-family="Arial">屏过热器出口管壁温度9</text>
<line x1="1250" y1="460" x2="1780" y2="460" stroke="black" stroke-width="2"/>
<text x="1320" y="495" fill="black" font-size="20" font-family="Arial">屏过热器出口管壁温度10</text>
<line x1="1250" y1="505" x2="1780" y2="505" stroke="black" stroke-width="2"/>
<text x="1320" y="540" fill="black" font-size="20" font-family="Arial">屏过热器出口管壁温度11</text>
<line x1="1250" y1="550" x2="1780" y2="550" stroke="black" stroke-width="2"/>
<text x="1320" y="585" fill="black" font-size="20" font-family="Arial">屏过热器出口管壁温度12</text>
<line x1="1250" y1="595" x2="1780" y2="595" stroke="black" stroke-width="2"/>
<text x="1320" y="630" fill="black" font-size="20" font-family="Arial">屏过热器出口管壁温度13</text>
<line x1="1250" y1="640" x2="1780" y2="640" stroke="black" stroke-width="2"/>
<text x="1320" y="675" fill="black" font-size="20" font-family="Arial">屏过热器出口管壁温度14</text>
<line x1="1250" y1="685" x2="1780" y2="685" stroke="black" stroke-width="2"/>
<line x1="1250" y1="730" x2="1780" y2="730" stroke="black" stroke-width="2"/>
<line x1="1250" y1="775" x2="1780" y2="775" stroke="black" stroke-width="2"/>
<text x="1320" y="810" fill="black" font-size="20" font-family="Arial"></text>
<line x1="1250" y1="820" x2="1780" y2="820" stroke="black" stroke-width="2"/>
<text x="1320" y="855" fill="black" font-size="20" font-family="Arial"></text>
<line x1="1250" y1="865" x2="1780" y2="865" stroke="black" stroke-width="2"/>
<line x1="1250" y1="910" x2="1780" y2="910" stroke="black" stroke-width="2"/>
<line x1="1780" y1="55" x2="1780" y2="910" stroke="black" stroke-width="2"/>



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
