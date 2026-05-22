<html>
	<head>
    		<title>燃气系统</title>
		<?php include("../header.php")?>
	</head>
	<body>
		<?php include("top.php")?>
		<center><h1>燃气系统</h1></center>
		<script>
			var page = 272;
			var test =<?php
			include('../conn.php');
			$sql="SELECT kks,name,value,unit,updatetime,HH,H,HHH,L,LL,LLL,flag,angle,indexID,X,Y FROM sis where page=272 union SELECT kks,name,value,unit,updatetime,HH,H,HHH,L,LL,LLL,flag,angle1,indexID,X1,Y1 FROM sis where page1=272";
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

<polyline points='10,0 16,18 1,6 19,6 4,18' style="fill:red;stroke:red;stroke-width:1;"/>
<!--返回180母管----->
<text x="1610" y="20" fill="black" font-size="20" font-family="Arial">返回180厂区管道</text>
<text x="1590" y="45" fill="black" font-size="20" font-family="Arial">(虚线都是此管道延伸)</text>
<line x1="1550" y1="60" x2="1800" y2="60" stroke="orange" stroke-width="3"/>
<polygon points='1680,50,1680,70,1720,50,1720,70' fill='white' stroke='black' stroke-width='2' ></polygon>

<polyline points='520,10 1550,10 1550,60' style="fill:none" stroke='orange' stroke-width='2' stroke-dasharray="10 10"/>


<line x1="520" y1="160" x2="1420" y2="160" stroke="orange" stroke-width="2" stroke-dasharray="10 10"/>
<line x1="1100" y1="300" x2="1360" y2="300" stroke="orange" stroke-width="2" stroke-dasharray="10 10"/>
<line x1="70" y1="950" x2="1850" y2="950" stroke="orange" stroke-width="2" stroke-dasharray="10 10"/>

<!--来至180母管----->
<line x1="1550" y1="225" x2="1800" y2="225" stroke="orange" stroke-width="3"/>
<line x1="1550" y1="100" x2="1550" y2="350" stroke="orange" stroke-width="3"/>

<line x1="1630" y1="60" x2="1630" y2="225" stroke="orange" stroke-width="3"/>
<polygon points='1620,120,1640,120,1620,160,1640,160' fill='white' stroke='black' stroke-width='2' ></polygon>

<!--减压站----->
<!--1号炉----->
<polyline points='1550,100 80,100 80,410 590,410' style="fill:none" stroke='orange' stroke-width='2'/>

<!--自力式调压阀----->
<polyline points='180,100 180,40 420,40 420,100' style="fill:none" stroke='orange' stroke-width='2'/>
<polygon points='280,30,280,50,320,30,320,50' fill='white' stroke='black' stroke-width='2' ></polygon>

<polygon points='200,90,200,110,240,90,240,110' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='280,90,280,110,320,90,320,110' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='360,90,360,110,400,90,400,110' fill='white' stroke='black' stroke-width='2' ></polygon>

<!--减压阀----->

<polyline points='660,70 520,70 520,10' style="fill:none" stroke='orange' stroke-width='2'/>
<polygon points='540,60,540,80,580,60,580,80' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='600,60,600,80,640,60,640,80' fill='white' stroke='black' stroke-width='2' ></polygon>

<polyline points='1020,70 1160,70 1160,10' style="fill:none" stroke='orange' stroke-width='2'/>
<polygon points='1040,60,1040,80,1080,60,1080,80' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='1100,60,1100,80,1140,60,1140,80' fill='white' stroke='black' stroke-width='2' ></polygon>

<polyline points='1280,100 1280,60 1420,60 1420,10' style="fill:none" stroke='orange' stroke-width='2'/>
<polygon points='1300,50,1300,70,1340,50,1340,70' fill='white' stroke='black' stroke-width='2' ></polygon>

<polyline points='660,100 660,40 1020,40 1020,100' style="fill:none" stroke='orange' stroke-width='2'/>
<polygon points='820,30,820,50,860,30,860,50' fill='white' stroke='black' stroke-width='2' ></polygon>

<polyline points='940,100 940,120 1100,120 1100,160' style="fill:none" stroke='orange' stroke-width='2'/>
<polygon points='1040,110,1040,130,1080,110,1080,130' fill='white' stroke='black' stroke-width='2' ></polygon>

<polygon points='680,90,680,110,720,90,720,110' fill='white' stroke='black' stroke-width='2' ></polygon>

<circle cx="900" cy="100" r="13" fill="gray" stroke="black" stroke-width="2"></circle>
<line x1="900" y1="87" x2="900" y2="113" stroke="black" stroke-width="2"/>

<polygon points='960,90,960,110,1000,90,1000,110' fill='white' stroke='black' stroke-width='2' ></polygon>

<polygon points='1460,90,1460,110,1500,90,1500,110' fill='white' stroke='black' stroke-width='2' ></polygon>
<!--2号炉----->
<polyline points='1550,250 115,250 115,400 810,400' style="fill:none" stroke='orange' stroke-width='2'/>

<!--自力式调压阀----->
<polyline points='210,250 210,190 450,190 450,250' style="fill:none" stroke='orange' stroke-width='2'/>
<polygon points='310,180,310,200,350,180,350,200' fill='white' stroke='black' stroke-width='2' ></polygon>

<polygon points='230,240,230,260,270,240,270,260' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='310,240,310,260,350,240,350,260' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='390,240,390,260,430,240,430,260' fill='white' stroke='black' stroke-width='2' ></polygon>

<!--减压阀----->

<polyline points='660,220 520,220 520,160' style="fill:none" stroke='orange' stroke-width='2'/>
<polygon points='540,210,540,230,580,210,580,230' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='600,210,600,230,640,210,640,230' fill='white' stroke='black' stroke-width='2' ></polygon>

<polyline points='1020,220 1160,220 1160,160' style="fill:none" stroke='orange' stroke-width='2'/>
<polygon points='1040,210,1040,230,1080,210,1080,230' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='1100,210,1100,230,1140,210,1140,230' fill='white' stroke='black' stroke-width='2' ></polygon>

<polyline points='1280,250 1280,210 1420,210 1420,160' style="fill:none" stroke='orange' stroke-width='2'/>
<polygon points='1300,200,1300,220,1340,200,1340,220' fill='white' stroke='black' stroke-width='2' ></polygon>

<polyline points='660,250 660,190 1020,190 1020,250' style="fill:none" stroke='orange' stroke-width='2'/>
<polygon points='820,180,820,200,860,180,860,200' fill='white' stroke='black' stroke-width='2' ></polygon>

<polyline points='940,250 940,270 1100,270 1100,300' style="fill:none" stroke='orange' stroke-width='2'/>
<polygon points='1040,260,1040,280,1080,260,1080,280' fill='white' stroke='black' stroke-width='2' ></polygon>

<polygon points='680,240,680,260,720,240,720,260' fill='white' stroke='black' stroke-width='2' ></polygon>

<circle cx="900" cy="250" r="13" fill="gray" stroke="black" stroke-width="2"></circle>
<line x1="900" y1="237" x2="900" y2="263" stroke="black" stroke-width="2"/>

<polygon points='960,240,960,260,1000,240,1000,260' fill='white' stroke='black' stroke-width='2' ></polygon>


<polygon points='1460,240,1460,260,1500,240,1500,260' fill='white' stroke='black' stroke-width='2' ></polygon>
<!--3号炉----->
<polyline points='1550,350 150,350 150,390 1810,390' style="fill:none" stroke='orange' stroke-width='2'/>

<!--自力式调压阀----->
<polyline points='1280,350 1280,325 1360,325 1360,300' style="fill:none" stroke='orange' stroke-width='2'/>
<polygon points='1300,315,1300,335,1340,315,1340,335' fill='white' stroke='black' stroke-width='2' ></polygon>

<polyline points='940,350 940,325 1100,325 1100,300' style="fill:none" stroke='orange' stroke-width='2'/>
<polygon points='1040,315,1040,335,1080,315,1080,335' fill='white' stroke='black' stroke-width='2' ></polygon>

<polyline points='260,350 260,290 340,290 340,350' style="fill:none" stroke='orange' stroke-width='2'/>
<polygon points='280,280,280,300,320,280,320,300' fill='white' stroke='black' stroke-width='2' ></polygon>

<polygon points='280,340,280,360,320,340,320,360' fill='white' stroke='black' stroke-width='2' ></polygon>

<!--减压阀----->



<polygon points='400,340,400,360,440,340,440,360' fill='white' stroke='black' stroke-width='2' ></polygon>

<circle cx="810" cy="350" r="13" fill="gray" stroke="black" stroke-width="2"></circle>
<line x1="810" y1="337" x2="810" y2="363" stroke="black" stroke-width="2"/>

<polygon points='960,340,960,360,1000,340,1000,360' fill='white' stroke='black' stroke-width='2' ></polygon>

<polygon points='1460,340,1460,360,1500,340,1500,360' fill='white' stroke='black' stroke-width='2' ></polygon>

<!--1号炉燃气----->
<rect x="130" y="520" width="400" height="300" fill="gray" stroke="black" stroke-width="2"></rect>
<text x="140" y="550" fill="black" font-size="20" font-family="Arial">4号角</text>
<text x="470" y="550" fill="black" font-size="20" font-family="Arial">1号角</text>
<text x="470" y="800" fill="black" font-size="20" font-family="Arial">2号角</text>
<text x="140" y="800" fill="black" font-size="20" font-family="Arial">3号角</text>
<polyline points='530,820 578,856 590,856 590,410' style="fill:none" stroke='orange' stroke-width='2'/><!---2号角进气管--->
<polyline points='578,856 578,868 70,868' style="fill:none" stroke='orange' stroke-width='2'/>

<polyline points='130,520 82,472 82,460 590,460' style="fill:none" stroke='orange' stroke-width='2'/>
<polyline points='82,472 70,472 70,950' style="fill:none" stroke='orange' stroke-width='2'/>

<polygon points='448,450,448,470,488,450,488,470' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='580,570,600,570,580,610,600,610' fill='white' stroke='black' stroke-width='2' ></polygon>

<!--4号角放散----->
<polygon points='60,550,80,550,60,590,80,590' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='60,800,80,800,60,840,80,840' fill='white' stroke='black' stroke-width='2' ></polygon>
<polyline points='70,700 40,700 40,790' style="fill:none" stroke='orange' stroke-width='2'/>
<polygon points='30,720,50,720,30,760,50,760' fill='white' stroke='black' stroke-width='2' ></polygon>
<!--2号角放散----->
<polygon points='98,858,98,878,138,858,138,878' fill='white' stroke='black' stroke-width='2' ></polygon>
<polygon points='448,858,448,878,488,858,488,878' fill='white' stroke='black' stroke-width='2' ></polygon>
<polyline points='310,868 310,898 210,898' style="fill:none" stroke='orange' stroke-width='2'/>
<polygon points='248,888,248,908,288,888,288,908' fill='white' stroke='black' stroke-width='2' ></polygon>

<polygon points='60,890,80,890,60,930,80,930' fill='white' stroke='black' stroke-width='2' ></polygon>
<!--2号炉----->
<rect x="740" y="500" width="400" height="300" fill="gray" stroke="black" stroke-width="2"></rect>
<line x1="740" y1="500" x2="1140" y2="800" stroke="black" stroke-width="2"/>
<polyline points='1140,800 1188,836 1200,836 1200,440' style="fill:none" stroke='orange' stroke-width='2'/>
<polyline points='1188,836 1188,848 680,848' style="fill:none" stroke='orange' stroke-width='2'/>

<polyline points='740,500 692,452 692,440 1200,440' style="fill:none" stroke='orange' stroke-width='2'/>
<polyline points='692,452 680,452 680,900' style="fill:none" stroke='orange' stroke-width='2'/>

<polygon points='640,530,660,530,640,570,660,570' fill='white' stroke='black' stroke-width='2' ></polygon>
<!--3号炉----->
<rect x="1350" y="500" width="400" height="300" fill="gray" stroke="black" stroke-width="2"></rect>
<line x1="1350" y1="500" x2="1750" y2="800" stroke="black" stroke-width="2"/>
<polyline points='1750,800 1798,836 1810,836 1810,440' style="fill:none" stroke='orange' stroke-width='2'/>
<polyline points='1798,836 1798,848 1290,848' style="fill:none" stroke='orange' stroke-width='2'/>

<polyline points='1350,500 1302,452 1302,440 1810,440' style="fill:none" stroke='orange' stroke-width='2'/>
<polyline points='1302,452 1290,452 1290,900' style="fill:none" stroke='orange' stroke-width='2'/>

<polygon points='1250,530,1270,530,1250,570,1270,570' fill='white' stroke='black' stroke-width='2' ></polygon>


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
