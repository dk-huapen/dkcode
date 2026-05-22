<?php
$page = $_GET['q'];

	include('conn.php');
//$sql="SELECT kks,value,updatetime FROM boler";
$sql="SELECT kks,value,updatetime FROM sis where page =".$page." or page1 =".$page." or page2 =".$page;
//$sql="SELECT kks,value,updatetime FROM boler where page =".$page;

$result = mysqli_query($con,$sql);
$outp = array();

$outp = mysqli_fetch_all($result,MYSQLI_ASSOC);

echo json_encode($outp);
mysqli_close($con);
?>
