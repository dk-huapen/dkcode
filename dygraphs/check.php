<?php
header('Content-type:text/html;charset=utf-8');
$db_table = $_GET['id'];

		$conn = mysqli_connect("localhost","root","P@ssw0rd","tanhecha");
		if(!$conn){
			die("连接失败". mysqli_connect_error());
		}else { 
		//echo"连接成功";
		}
		mysqli_query($conn, "set names utf8");
		//$sql = "SELECT column_name,column_comment FROM information_schema.columns  WHERE table_name = '1turbine' and data_type = 'double'";
		$sql = "SELECT column_name,column_comment FROM information_schema.columns  WHERE table_name = '".$db_table."' and data_type = 'double'";
$re = mysqli_query($conn, $sql);
$arrAuto=array();
while($arr=mysqli_fetch_array($re,MYSQLI_ASSOC)){
	$arrAuto[]=$arr;
}
echo json_encode($arrAuto);
?>
