<?php
	include("/dkcode/dkcode/lib/phpqrcode/qrlib.php");
	$text = 'https://'.$_SERVER['HTTP_HOST'].':9443/dkcode'.$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];
	echo "<center>扫码访问本页</center>";
	echo "<center><img src='/dkcode/dkcode/lib/QRPager.php?id=".$text."'></img></center>";
	echo "<center>发送给你的老铁</center>";
?>

