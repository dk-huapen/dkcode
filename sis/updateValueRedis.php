<?php
	$page = $_GET['q'];
	include('conn.php');
	$sql="SELECT kks FROM sis where page =".$page." or page1 =".$page." or page2 =".$page;
	$result = mysqli_query($con,$sql);
	$outp = array();
	#$outp = mysqli_fetch_all($result,MYSQLI_NUM);
	$outp = mysqli_fetch_all($result,MYSQLI_ASSOC);

	$redis = new Redis();
	#$redis->connect('127.0.0.1',6379);
	$redis->connect('192.168.1.113',6379);
	$redis->select(1);
	$backData = array();	

	for($i=0;$i < count($outp);$i++){
		#echo $outp[$i]['kks'];
		$key = $outp[$i]['kks'];
		$readData = $redis->hMget($key,['value','updatetime']);
		$backData[$i] = array_merge($outp[$i],$readData);
		#echo $readData['value'];
	}
	#echo $backData[0]['kks'];
	#echo $backData[0]['value'];
	#echo $backData[0]['dcstime'];
	mysqli_close($con);
	echo json_encode($backData);
?>
