<?php
	$page = 1;
	include('conn.php');
	$sql="SELECT kks FROM sis where page =".$page." or page1 =".$page;
	$result = mysqli_query($con,$sql);
	$outp = array();
	#$outp = mysqli_fetch_all($result,MYSQLI_NUM);
	$outp = mysqli_fetch_all($result,MYSQLI_ASSOC);

	$redis = new Redis();
	$redis->connect('192.168.2.123',6379);
	echo "ok";
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
	echo json_encode($backData);
	mysqli_close($con);

#echo "test";
#	echo $redis->ping();
#echo $redis->hget('00HTG10AN001_AI','value');
#$testHash = $redis->hMget('00HTG10AN001_AI',['value','dcstime']);
?>
