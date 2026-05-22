<?php
header("Content-type:text/html;charset=utf-8");

		$conn = mysqli_connect("localhost","root","dk1314lich,forever!","opcdb");
		if(!$conn){
			die("连接失败". mysqli_connect_error());
		}else { 
		//echo"连接成功";
		}
		mysqli_query($conn, "set names utf8");
			//$tb_dygraphs_sql = "SELECT 1turbine.`HTime`,1turbine.`10LBC10CP101_VALUE`,2turbine.`20LBC10CP101_VALUE` FROM `1turbine` LEFT JOIN `2turbine` ON 1turbine.`HTime` = 2turbine.`HTime` WHERE 1turbine.`HTime` BETWEEN '2024-07-27 15:00' AND '2024-07-27 15:30'";
		$tb_dygraphs_sql = "SELECT `HTIME`,`VALUE` FROM ceshi WHERE 1 order by `id` desc limit 1";
		$re = mysqli_query($conn, $tb_dygraphs_sql);
		$outp = mysqli_fetch_all($re,MYSQLI_NUM);
echo json_encode($outp);
?>
