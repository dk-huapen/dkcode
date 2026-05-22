<html>
	<head>
    		<title>4号汽轮机本体</title>
		<?php include("../header.php")?>
	</head>
	<body>
		<?php include("top.php")?>
		<center><h1>4号汽轮机本体</h1></center>
		<script>
			var page = 321;
			var test =<?php
			include('../conn.php');
			$sql="SELECT kks,name,value,unit,updatetime,HH,H,HHH,L,LL,LLL,flag,angle,indexID,X,Y FROM sis where page=321 union SELECT kks,name,value,unit,updatetime,HH,H,HHH,L,LL,LLL,flag,angle1,indexID,X1,Y1 FROM sis where page1=321";
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
				include("../TemplateSvg/cigaoyareliTemplate.php");
			?>
			<!--包含具体名称的元素-->
<line x1="320" y1="170" x2="320" y2="320" stroke="red" stroke-width="2"/>
<polygon points='310,225,330,225,310,265,330,265' fill='white' stroke='black' stroke-width='2' ></polygon>
<line x1="250" y1="180" x2="250" y2="310" stroke="red" stroke-width="2"/>
<line x1="250" y1="180" x2="320" y2="180" stroke="red" stroke-width="2"/>
<line x1="250" y1="310" x2="320" y2="310" stroke="red" stroke-width="2"/>
<polygon points='240,195,260,195,240,235,260,235' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='240,255,260,255,240,295,260,295' fill='white' stroke='black' stroke-width='2' ></polygon>

<text x="10" y="290" fill="black" font-size="20" font-family="Arial">来至中压饱和蒸汽蒸汽</text>
<line x1="20" y1="320" x2="320" y2="320" stroke="red" stroke-width="3"/><!---2.8进口蒸汽主管道-->
<line x1="50" y1="390" x2="210" y2="390" stroke="red" stroke-width="2"/>
<line x1="50" y1="320" x2="50" y2="390" stroke="red" stroke-width="2"/>
<line x1="210" y1="320" x2="210" y2="390" stroke="red" stroke-width="2"/>
<polygon points='70,380,70,400,110,380,110,400' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='150,380,150,400,190,380,190,400' fill='white' stroke='black' stroke-width='2' ></polygon>








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
