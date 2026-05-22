<?php
header('Content-type:text/html;charset=utf-8');
include('conn.php');
$obj = json_decode($_GET['id'],false);
//$id = $_GET['id'];
		//$sql = "SELECT * FROM tb_area WHERE area_system=".$id;
//$sql = "select * from ".$obj->table." where ".$obj->key."=".$obj->value;
$sql = "select ".$obj->option_id.",".$obj->option_value." from ".$obj->table." where ".$obj->key."=".$obj->value;
$re = mysqli_query($conn, $sql);
$arrAuto=array();
while($arr=mysqli_fetch_array($re,MYSQLI_ASSOC)){
	$arrAuto[]=$arr;
}
echo json_encode($arrAuto);
?>
