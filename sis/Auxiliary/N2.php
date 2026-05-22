<html>
	<head>
    		<title>氮气系统</title>
		<?php include("../header.php")?>
	</head>
	<body>
		<?php include("top.php")?>
		<center><h1>氮气系统</h1></center>
		<script>
			var page = 271;
			var test =<?php
			include('../conn.php');
			$sql="SELECT kks,name,value,unit,updatetime,HH,H,HHH,L,LL,LLL,flag,angle,indexID,X,Y FROM sis where page=271 union SELECT kks,name,value,unit,updatetime,HH,H,HHH,L,LL,LLL,flag,angle1,indexID,X1,Y1 FROM sis where page1=271";
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


<line x1="1850" y1="70" x2="1850" y2="700" stroke="black" stroke-width="2"/>

<line x1="655" y1="20" x2="655" y2="150" stroke="yellow" stroke-width="2"/>
<polygon points='645,60,665,60,645,100,665,100' fill='white' stroke='black' stroke-width='2' ></polygon>
<line x1="80" y1="150" x2="1705" y2="150" stroke="yellow" stroke-width="2"/>
<!--1号炉----->
<line x1="155" y1="150" x2="155" y2="400" stroke="yellow" stroke-width="2"/>
<polygon points='145,230,165,230,145,270,165,270' fill='white' stroke='black' stroke-width='2' ></polygon>
<text x="145" y="440" fill="black" font-size="20" font-family="Arial">锅</text>
<text x="145" y="465" fill="black" font-size="20" font-family="Arial">炉</text>
<text x="145" y="490" fill="black" font-size="20" font-family="Arial">冲</text>
<text x="145" y="515" fill="black" font-size="20" font-family="Arial">氮</text>
<text x="145" y="540" fill="black" font-size="20" font-family="Arial">保</text>
<text x="145" y="565" fill="black" font-size="20" font-family="Arial">护</text>
<line x1="255" y1="150" x2="255" y2="600" stroke="yellow" stroke-width="2"/>
<polygon points='245,230,265,230,245,270,265,270' fill='white' stroke='black' stroke-width='2' ></polygon>
<line x1="355" y1="150" x2="355" y2="400" stroke="yellow" stroke-width="2"/>
<polygon points='345,230,365,230,345,270,365,270' fill='white' stroke='black' stroke-width='2' ></polygon>
<text x="345" y="440" fill="black" font-size="20" font-family="Arial">脱</text>
<text x="345" y="465" fill="black" font-size="20" font-family="Arial">硝</text>
<text x="345" y="490" fill="black" font-size="20" font-family="Arial">系</text>
<text x="345" y="515" fill="black" font-size="20" font-family="Arial">统</text>
<text x="345" y="540" fill="black" font-size="20" font-family="Arial">吹</text>
<text x="345" y="565" fill="black" font-size="20" font-family="Arial">扫</text>

<line x1="80" y1="600" x2="430" y2="600" stroke="yellow" stroke-width="2"/>

<line x1="80" y1="600" x2="80" y2="800" stroke="yellow" stroke-width="2"/>
<text x="70" y="840" fill="black" font-size="20" font-family="Arial">给</text>
<text x="70" y="865" fill="black" font-size="20" font-family="Arial">煤</text>
<text x="70" y="890" fill="black" font-size="20" font-family="Arial">机</text>
<text x="73" y="915" fill="black" font-size="20" font-family="Arial">A</text>

<line x1="130" y1="600" x2="130" y2="800" stroke="yellow" stroke-width="2"/>
<text x="120" y="840" fill="black" font-size="20" font-family="Arial">煤</text>
<text x="120" y="865" fill="black" font-size="20" font-family="Arial">仓</text>
<text x="123" y="890" fill="black" font-size="20" font-family="Arial">A</text>

<line x1="180" y1="600" x2="180" y2="800" stroke="yellow" stroke-width="2"/>
<text x="170" y="840" fill="black" font-size="20" font-family="Arial">给</text>
<text x="170" y="865" fill="black" font-size="20" font-family="Arial">煤</text>
<text x="170" y="890" fill="black" font-size="20" font-family="Arial">机</text>
<text x="173" y="915" fill="black" font-size="20" font-family="Arial">B</text>

<line x1="230" y1="600" x2="230" y2="800" stroke="yellow" stroke-width="2"/>
<text x="220" y="840" fill="black" font-size="20" font-family="Arial">煤</text>
<text x="220" y="865" fill="black" font-size="20" font-family="Arial">仓</text>
<text x="223" y="890" fill="black" font-size="20" font-family="Arial">B</text>

<line x1="280" y1="600" x2="280" y2="800" stroke="yellow" stroke-width="2"/>
<text x="270" y="840" fill="black" font-size="20" font-family="Arial">给</text>
<text x="270" y="865" fill="black" font-size="20" font-family="Arial">煤</text>
<text x="270" y="890" fill="black" font-size="20" font-family="Arial">机</text>
<text x="273" y="915" fill="black" font-size="20" font-family="Arial">C</text>

<line x1="330" y1="600" x2="330" y2="800" stroke="yellow" stroke-width="2"/>
<text x="320" y="840" fill="black" font-size="20" font-family="Arial">煤</text>
<text x="320" y="865" fill="black" font-size="20" font-family="Arial">仓</text>
<text x="323" y="890" fill="black" font-size="20" font-family="Arial">C</text>

<line x1="380" y1="600" x2="380" y2="800" stroke="yellow" stroke-width="2"/>
<text x="370" y="840" fill="black" font-size="20" font-family="Arial">给</text>
<text x="370" y="865" fill="black" font-size="20" font-family="Arial">煤</text>
<text x="370" y="890" fill="black" font-size="20" font-family="Arial">机</text>
<text x="373" y="915" fill="black" font-size="20" font-family="Arial">D</text>

<line x1="430" y1="600" x2="430" y2="800" stroke="yellow" stroke-width="2"/>
<text x="420" y="840" fill="black" font-size="20" font-family="Arial">煤</text>
<text x="420" y="865" fill="black" font-size="20" font-family="Arial">仓</text>
<text x="423" y="890" fill="black" font-size="20" font-family="Arial">D</text>
<text x="210" y="955" fill="black" font-size="25" font-family="Arial">1号锅炉</text>
<!--2号炉----->
<line x1="605" y1="150" x2="605" y2="400" stroke="yellow" stroke-width="2"/>
<polygon points='595,230,615,230,595,270,615,270' fill='white' stroke='black' stroke-width='2' ></polygon>
<text x="595" y="440" fill="black" font-size="20" font-family="Arial">锅</text>
<text x="595" y="465" fill="black" font-size="20" font-family="Arial">炉</text>
<text x="595" y="490" fill="black" font-size="20" font-family="Arial">冲</text>
<text x="595" y="515" fill="black" font-size="20" font-family="Arial">氮</text>
<text x="595" y="540" fill="black" font-size="20" font-family="Arial">保</text>
<text x="595" y="565" fill="black" font-size="20" font-family="Arial">护</text>
<line x1="705" y1="150" x2="705" y2="600" stroke="yellow" stroke-width="2"/>
<polygon points='695,230,715,230,695,270,715,270' fill='white' stroke='black' stroke-width='2' ></polygon>
<line x1="805" y1="150" x2="805" y2="400" stroke="yellow" stroke-width="2"/>
<polygon points='795,230,815,230,795,270,815,270' fill='white' stroke='black' stroke-width='2' ></polygon>
<text x="795" y="440" fill="black" font-size="20" font-family="Arial">脱</text>
<text x="795" y="465" fill="black" font-size="20" font-family="Arial">硝</text>
<text x="795" y="490" fill="black" font-size="20" font-family="Arial">系</text>
<text x="795" y="515" fill="black" font-size="20" font-family="Arial">统</text>
<text x="795" y="540" fill="black" font-size="20" font-family="Arial">吹</text>
<text x="795" y="565" fill="black" font-size="20" font-family="Arial">扫</text>

<line x1="530" y1="600" x2="880" y2="600" stroke="yellow" stroke-width="2"/>

<line x1="530" y1="600" x2="530" y2="800" stroke="yellow" stroke-width="2"/>
<text x="520" y="840" fill="black" font-size="20" font-family="Arial">给</text>
<text x="520" y="865" fill="black" font-size="20" font-family="Arial">煤</text>
<text x="520" y="890" fill="black" font-size="20" font-family="Arial">机</text>
<text x="523" y="915" fill="black" font-size="20" font-family="Arial">A</text>

<line x1="580" y1="600" x2="580" y2="800" stroke="yellow" stroke-width="2"/>
<text x="570" y="840" fill="black" font-size="20" font-family="Arial">煤</text>
<text x="570" y="865" fill="black" font-size="20" font-family="Arial">仓</text>
<text x="573" y="890" fill="black" font-size="20" font-family="Arial">A</text>

<line x1="630" y1="600" x2="630" y2="800" stroke="yellow" stroke-width="2"/>
<text x="620" y="840" fill="black" font-size="20" font-family="Arial">给</text>
<text x="620" y="865" fill="black" font-size="20" font-family="Arial">煤</text>
<text x="620" y="890" fill="black" font-size="20" font-family="Arial">机</text>
<text x="623" y="915" fill="black" font-size="20" font-family="Arial">B</text>

<line x1="680" y1="600" x2="680" y2="800" stroke="yellow" stroke-width="2"/>
<text x="670" y="840" fill="black" font-size="20" font-family="Arial">煤</text>
<text x="670" y="865" fill="black" font-size="20" font-family="Arial">仓</text>
<text x="673" y="890" fill="black" font-size="20" font-family="Arial">B</text>

<line x1="730" y1="600" x2="730" y2="800" stroke="yellow" stroke-width="2"/>
<text x="720" y="840" fill="black" font-size="20" font-family="Arial">给</text>
<text x="720" y="865" fill="black" font-size="20" font-family="Arial">煤</text>
<text x="720" y="890" fill="black" font-size="20" font-family="Arial">机</text>
<text x="723" y="915" fill="black" font-size="20" font-family="Arial">C</text>

<line x1="780" y1="600" x2="780" y2="800" stroke="yellow" stroke-width="2"/>
<text x="770" y="840" fill="black" font-size="20" font-family="Arial">煤</text>
<text x="770" y="865" fill="black" font-size="20" font-family="Arial">仓</text>
<text x="773" y="890" fill="black" font-size="20" font-family="Arial">C</text>

<line x1="830" y1="600" x2="830" y2="800" stroke="yellow" stroke-width="2"/>
<text x="820" y="840" fill="black" font-size="20" font-family="Arial">给</text>
<text x="820" y="865" fill="black" font-size="20" font-family="Arial">煤</text>
<text x="820" y="890" fill="black" font-size="20" font-family="Arial">机</text>
<text x="823" y="915" fill="black" font-size="20" font-family="Arial">D</text>

<line x1="880" y1="600" x2="880" y2="800" stroke="yellow" stroke-width="2"/>
<text x="870" y="840" fill="black" font-size="20" font-family="Arial">煤</text>
<text x="870" y="865" fill="black" font-size="20" font-family="Arial">仓</text>
<text x="873" y="890" fill="black" font-size="20" font-family="Arial">D</text>
<text x="660" y="955" fill="black" font-size="25" font-family="Arial">2号锅炉</text>
<!--3号炉----->
<line x1="1055" y1="150" x2="1055" y2="400" stroke="yellow" stroke-width="2"/>
<polygon points='1045,230,1065,230,1045,270,1065,270' fill='white' stroke='black' stroke-width='2' ></polygon>
<text x="1045" y="440" fill="black" font-size="20" font-family="Arial">锅</text>
<text x="1045" y="465" fill="black" font-size="20" font-family="Arial">炉</text>
<text x="1045" y="490" fill="black" font-size="20" font-family="Arial">冲</text>
<text x="1045" y="515" fill="black" font-size="20" font-family="Arial">氮</text>
<text x="1045" y="540" fill="black" font-size="20" font-family="Arial">保</text>
<text x="1045" y="565" fill="black" font-size="20" font-family="Arial">护</text>
<line x1="1155" y1="150" x2="1155" y2="600" stroke="yellow" stroke-width="2"/>
<polygon points='1145,230,1165,230,1145,270,1165,270' fill='white' stroke='black' stroke-width='2' ></polygon>
<line x1="1255" y1="150" x2="1255" y2="400" stroke="yellow" stroke-width="2"/>
<polygon points='1245,230,1265,230,1245,270,1265,270' fill='white' stroke='black' stroke-width='2' ></polygon>
<text x="1245" y="440" fill="black" font-size="20" font-family="Arial">脱</text>
<text x="1245" y="465" fill="black" font-size="20" font-family="Arial">硝</text>
<text x="1245" y="490" fill="black" font-size="20" font-family="Arial">系</text>
<text x="1245" y="515" fill="black" font-size="20" font-family="Arial">统</text>
<text x="1245" y="540" fill="black" font-size="20" font-family="Arial">吹</text>
<text x="1245" y="565" fill="black" font-size="20" font-family="Arial">扫</text>

<line x1="980" y1="600" x2="1330" y2="600" stroke="yellow" stroke-width="2"/>

<line x1="980" y1="600" x2="980" y2="800" stroke="yellow" stroke-width="2"/>
<text x="970" y="840" fill="black" font-size="20" font-family="Arial">给</text>
<text x="970" y="865" fill="black" font-size="20" font-family="Arial">煤</text>
<text x="970" y="890" fill="black" font-size="20" font-family="Arial">机</text>
<text x="973" y="915" fill="black" font-size="20" font-family="Arial">A</text>

<line x1="1030" y1="600" x2="1030" y2="800" stroke="yellow" stroke-width="2"/>
<text x="1020" y="840" fill="black" font-size="20" font-family="Arial">煤</text>
<text x="1020" y="865" fill="black" font-size="20" font-family="Arial">仓</text>
<text x="1023" y="890" fill="black" font-size="20" font-family="Arial">A</text>

<line x1="1080" y1="600" x2="1080" y2="800" stroke="yellow" stroke-width="2"/>
<text x="1070" y="840" fill="black" font-size="20" font-family="Arial">给</text>
<text x="1070" y="865" fill="black" font-size="20" font-family="Arial">煤</text>
<text x="1070" y="890" fill="black" font-size="20" font-family="Arial">机</text>
<text x="1073" y="915" fill="black" font-size="20" font-family="Arial">B</text>

<line x1="1130" y1="600" x2="1130" y2="800" stroke="yellow" stroke-width="2"/>
<text x="1120" y="840" fill="black" font-size="20" font-family="Arial">煤</text>
<text x="1120" y="865" fill="black" font-size="20" font-family="Arial">仓</text>
<text x="1123" y="890" fill="black" font-size="20" font-family="Arial">B</text>

<line x1="1180" y1="600" x2="1180" y2="800" stroke="yellow" stroke-width="2"/>
<text x="1170" y="840" fill="black" font-size="20" font-family="Arial">给</text>
<text x="1170" y="865" fill="black" font-size="20" font-family="Arial">煤</text>
<text x="1170" y="890" fill="black" font-size="20" font-family="Arial">机</text>
<text x="1173" y="915" fill="black" font-size="20" font-family="Arial">C</text>

<line x1="1230" y1="600" x2="1230" y2="800" stroke="yellow" stroke-width="2"/>
<text x="1220" y="840" fill="black" font-size="20" font-family="Arial">煤</text>
<text x="1220" y="865" fill="black" font-size="20" font-family="Arial">仓</text>
<text x="1223" y="890" fill="black" font-size="20" font-family="Arial">C</text>

<line x1="1280" y1="600" x2="1280" y2="800" stroke="yellow" stroke-width="2"/>
<text x="1270" y="840" fill="black" font-size="20" font-family="Arial">给</text>
<text x="1270" y="865" fill="black" font-size="20" font-family="Arial">煤</text>
<text x="1270" y="890" fill="black" font-size="20" font-family="Arial">机</text>
<text x="1273" y="915" fill="black" font-size="20" font-family="Arial">D</text>

<line x1="1330" y1="600" x2="1330" y2="800" stroke="yellow" stroke-width="2"/>
<text x="1320" y="840" fill="black" font-size="20" font-family="Arial">煤</text>
<text x="1320" y="865" fill="black" font-size="20" font-family="Arial">仓</text>
<text x="1323" y="890" fill="black" font-size="20" font-family="Arial">D</text>
<text x="1110" y="955" fill="black" font-size="25" font-family="Arial">3号锅炉</text>
<!--4号炉----->
<line x1="1505" y1="150" x2="1505" y2="400" stroke="yellow" stroke-width="2"/>
<polygon points='1495,230,1515,230,1495,270,1515,270' fill='white' stroke='black' stroke-width='2' ></polygon>
<text x="1495" y="440" fill="black" font-size="20" font-family="Arial">锅</text>
<text x="1495" y="465" fill="black" font-size="20" font-family="Arial">炉</text>
<text x="1495" y="490" fill="black" font-size="20" font-family="Arial">冲</text>
<text x="1495" y="515" fill="black" font-size="20" font-family="Arial">氮</text>
<text x="1495" y="540" fill="black" font-size="20" font-family="Arial">保</text>
<text x="1495" y="565" fill="black" font-size="20" font-family="Arial">护</text>
<line x1="1605" y1="150" x2="1605" y2="600" stroke="yellow" stroke-width="2"/>
<polygon points='1595,230,1615,230,1595,270,1615,270' fill='white' stroke='black' stroke-width='2' ></polygon>
<line x1="1705" y1="150" x2="1705" y2="400" stroke="yellow" stroke-width="2"/>
<polygon points='1695,230,1715,230,1695,270,1715,270' fill='white' stroke='black' stroke-width='2' ></polygon>
<text x="1695" y="440" fill="black" font-size="20" font-family="Arial">脱</text>
<text x="1695" y="465" fill="black" font-size="20" font-family="Arial">硝</text>
<text x="1695" y="490" fill="black" font-size="20" font-family="Arial">系</text>
<text x="1695" y="515" fill="black" font-size="20" font-family="Arial">统</text>
<text x="1695" y="540" fill="black" font-size="20" font-family="Arial">吹</text>
<text x="1695" y="565" fill="black" font-size="20" font-family="Arial">扫</text>

<line x1="1430" y1="600" x2="1780" y2="600" stroke="yellow" stroke-width="2"/>

<line x1="1430" y1="600" x2="1430" y2="800" stroke="yellow" stroke-width="2"/>
<text x="1420" y="840" fill="black" font-size="20" font-family="Arial">给</text>
<text x="1420" y="865" fill="black" font-size="20" font-family="Arial">煤</text>
<text x="1420" y="890" fill="black" font-size="20" font-family="Arial">机</text>
<text x="1423" y="915" fill="black" font-size="20" font-family="Arial">A</text>

<line x1="1480" y1="600" x2="1480" y2="800" stroke="yellow" stroke-width="2"/>
<text x="1470" y="840" fill="black" font-size="20" font-family="Arial">煤</text>
<text x="1470" y="865" fill="black" font-size="20" font-family="Arial">仓</text>
<text x="1473" y="890" fill="black" font-size="20" font-family="Arial">A</text>

<line x1="1530" y1="600" x2="1530" y2="800" stroke="yellow" stroke-width="2"/>
<text x="1520" y="840" fill="black" font-size="20" font-family="Arial">给</text>
<text x="1520" y="865" fill="black" font-size="20" font-family="Arial">煤</text>
<text x="1520" y="890" fill="black" font-size="20" font-family="Arial">机</text>
<text x="1523" y="915" fill="black" font-size="20" font-family="Arial">B</text>

<line x1="1580" y1="600" x2="1580" y2="800" stroke="yellow" stroke-width="2"/>
<text x="1570" y="840" fill="black" font-size="20" font-family="Arial">煤</text>
<text x="1570" y="865" fill="black" font-size="20" font-family="Arial">仓</text>
<text x="1573" y="890" fill="black" font-size="20" font-family="Arial">B</text>

<line x1="1630" y1="600" x2="1630" y2="800" stroke="yellow" stroke-width="2"/>
<text x="1620" y="840" fill="black" font-size="20" font-family="Arial">给</text>
<text x="1620" y="865" fill="black" font-size="20" font-family="Arial">煤</text>
<text x="1620" y="890" fill="black" font-size="20" font-family="Arial">机</text>
<text x="1623" y="915" fill="black" font-size="20" font-family="Arial">C</text>

<line x1="1680" y1="600" x2="1680" y2="800" stroke="yellow" stroke-width="2"/>
<text x="1670" y="840" fill="black" font-size="20" font-family="Arial">煤</text>
<text x="1670" y="865" fill="black" font-size="20" font-family="Arial">仓</text>
<text x="1673" y="890" fill="black" font-size="20" font-family="Arial">C</text>

<line x1="1730" y1="600" x2="1730" y2="800" stroke="yellow" stroke-width="2"/>
<text x="1720" y="840" fill="black" font-size="20" font-family="Arial">给</text>
<text x="1720" y="865" fill="black" font-size="20" font-family="Arial">煤</text>
<text x="1720" y="890" fill="black" font-size="20" font-family="Arial">机</text>
<text x="1723" y="915" fill="black" font-size="20" font-family="Arial">D</text>

<line x1="1780" y1="600" x2="1780" y2="800" stroke="yellow" stroke-width="2"/>
<text x="1770" y="840" fill="black" font-size="20" font-family="Arial">煤</text>
<text x="1770" y="865" fill="black" font-size="20" font-family="Arial">仓</text>
<text x="1773" y="890" fill="black" font-size="20" font-family="Arial">D</text>
<text x="1560" y="955" fill="black" font-size="25" font-family="Arial">4号锅炉</text>

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
