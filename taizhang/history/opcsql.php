<?php
	#收到查询历史数据请求后根据要求查询数据并返回JSON数据
	header("Content-type:text/html;charset=utf-8");
	$begin_time=$_GET['begin_time'];
	$end_time=$_GET['end_time'];
	$sysdb=$_GET['SYSDB'];
	$sys1=$_GET['SYS1'];
	$sys3=$_GET['SYS3'];
	$sys2=$_GET['SYS2'];
	$sys4=$_GET['SYS4'];
	$kks1=$_GET['KKS1'];
	$kks2=$_GET['KKS2'];
	$kks3=$_GET['KKS3'];
	$kks4=$_GET['KKS4'];
	if((empty($kks1))&&(empty($kks2))&&(empty($kks3))&&(empty($kks4))){
		//没有选择查询测点，第一次打开网页初始化用
		$outp = '';
	}else{
		//选择了测点，从数据库查询满足要求的数据
		//$conn = mysqli_connect("localhost","root","P@ssw0rd","tanhecha");
		//$conn = mysqli_connect("localhost","root","dk1314lich,forever!","july2024");
		$conn = mysqli_connect("localhost","root","dk1314lich,forever!",$sysdb);
		if(!$conn){
			die("连接失败". mysqli_connect_error());
		}else { 
		//echo"连接成功";
		}
		mysqli_query($conn, "set names utf8");
		if((empty($sys2)&&empty($sys3)&&empty($sys4))||(empty($sys1)&&empty($sys3)&&empty($sys4))||(empty($sys1)&&empty($sys2)&&empty($sys4))||(empty($sys1)&&empty($sys2)&&empty($sys3))||((empty($sys1)&&empty($sys2))&&(!strcmp($sys3,$sys4)))||((empty($sys1)&&empty($sys3))&&(!strcmp($sys2,$sys4)))||((empty($sys1)&&empty($sys4))&&(!strcmp($sys2,$sys3)))||((empty($sys2)&&empty($sys3))&&(!strcmp($sys1,$sys4)))||((empty($sys2)&&empty($sys4))&&(!strcmp($sys1,$sys3)))||((empty($sys3)&&empty($sys4))&&(!strcmp($sys1,$sys3)))||((empty($sys1))&&(!strcmp($sys2,$sys3))&&(!strcmp($sys2,$sys4)))||((empty($sys2))&&(!strcmp($sys1,$sys3))&&(!strcmp($sys1,$sys4)))||((empty($sys3))&&(!strcmp($sys1,$sys2))&&(!strcmp($sys1,$sys4)))||((empty($sys4))&&(!strcmp($sys1,$sys2))&&(!strcmp($sys1,$sys3)))||((!empty($sys1))&&(!empty($sys2))&&(!empty($sys3))&&(!empty($sys4))&&(!strcmp($sys1,$sys2))&&(!strcmp($sys1,$sys3))&&(!strcmp($sys1,$sys4)))){
			//查询测点都在都在同一个数据表table
 			$tb_dygraphs_sql = "SELECT `HTime`";
			if(!empty($kks1)){
 				$tb_dygraphs_sql = $tb_dygraphs_sql.",`".$kks1."`"; 
				$sys = $sys1;
			}
			if(!empty($kks2)){
 				$tb_dygraphs_sql = $tb_dygraphs_sql.",`".$kks2."`"; 
				$sys = $sys2;
			}
			if(!empty($kks3)){
 				$tb_dygraphs_sql = $tb_dygraphs_sql.",`".$kks3."`";
				$sys = $sys3;
			}
			if(!empty($kks4)){
 				$tb_dygraphs_sql = $tb_dygraphs_sql.",`".$kks4."`";
				$sys = $sys4;
			}
 			$tb_dygraphs_sql = $tb_dygraphs_sql." FROM "; 
 			$tb_dygraphs_sql = $tb_dygraphs_sql."`".$sys."` WHERE `HTime` BETWEEN '".$begin_time."' AND '".$end_time."'"; 
		}else{
			//选择的测点不在同一个数据表table
			if(((empty($sys2))&&(empty($sys4))&&(strcmp($sys1,$sys3)!=0))||((empty($sys2))&&(empty($sys3))&&(strcmp($sys1,$sys4)!=0))||((empty($sys3))&&(empty($sys4))&&(strcmp($sys1,$sys2)!=0))||((empty($sys1))&&(empty($sys2))&&(strcmp($sys3,$sys4)!=0))||((empty($sys1))&&(empty($sys3))&&(strcmp($sys2,$sys4)!=0))||((empty($sys1))&&(empty($sys4))&&(strcmp($sys2,$sys3)!=0))){
				//有两个测点未选择，选择的两个测点不在同一个数据表table
				$flag = 0;
				if((!empty($kks1))&&($flag==0)){
					$tableA = $sys1;
					$itemA = $kks1;
					$flag = $flag +1;
				}
				if((!empty($kks2))&&($flag==0)){
					$tableA = $sys2;
					$itemA = $kks2;
					$flag = $flag +1;
				}
				if((!empty($kks2))&&($flag==1)){
					$tableB = $sys2;
					$itemB = $kks2;
				}
				if((!empty($kks3))&&($flag==0)){
					$tableA = $sys3;
					$itemA = $kks3;
					$flag = $flag +1;
				}
				if((!empty($kks3))&&($flag==1)){
					$tableB = $sys3;
					$itemB = $kks3;
				}
				if((!empty($kks4))&&($flag==1)){
					$tableB = $sys4;
					$itemB = $kks4;
				}
 				$tb_dygraphs_sql = "SELECT ".$tableA.".`HTime`,`".$itemA."`,`".$itemB."` FROM `".$tableA."` LEFT JOIN `".$tableB."` ON ".$tableA.".`HTime`=".$tableB.".`HTime` WHERE ".$tableA.".`HTime` BETWEEN '".$begin_time."' AND '".$end_time."'"; 
			}
			if(((empty($sys4))&&(strcmp($sys1,$sys3)!=0)&&(strcmp($sys1,$sys2)!=0))||((empty($sys3))&&(strcmp($sys1,$sys2)!=0)&&(strcmp($sys1,$sys4)!=0))||((empty($sys2))&&(strcmp($sys1,$sys3)!=0)&&(strcmp($sys1,$sys4)!=0))||((empty($sys1))&&(strcmp($sys2,$sys3)!=0)&&(strcmp($sys2,$sys4)!=0))){
				//有一个测点未选择，选择的 三个测点都不在同一个数据表table
				$flag = 0;
				if((!empty($kks1))&&($flag==0)){
					$tableA = $sys1;
					$itemA = $kks1;
					$flag = $flag +1;
				}
				if((!empty($kks2))&&($flag==0)){
					$tableA = $sys2;
					$itemA = $kks2;
					$flag = $flag +1;
				}
				if((!empty($kks2))&&($flag==1)){
					$tableB = $sys2;
					$itemB = $kks2;
					$flag = $flag +1;
				}
				if((!empty($kks3))&&($flag==1)){
					$tableB = $sys3;
					$itemB = $kks3;
					$flag = $flag +1;
				}else{
					if((!empty($kks3))&&($flag==2)){
						$tableC = $sys3;
						$itemC = $kks3;
						$flag = $flag +1;
					}
				}
				if((!empty($kks4))&&($flag==2)){
					$tableC = $sys4;
					$itemC = $kks4;
				}
 				$tb_dygraphs_sql = "SELECT ".$tableA.".`HTime`,`".$itemA."`,`".$itemB."`,`".$itemC."` FROM `".$tableA."` INNER JOIN `".$tableB."` ON ".$tableA.".`HTime`=".$tableB.".`HTime` INNER JOIN `".$tableC."` ON ".$tableA.".`HTime`=".$tableC.".`HTime` WHERE ".$tableA.".`HTime` BETWEEN '".$begin_time."' AND '".$end_time."'"; 
			}
			if(((empty($sys4))&&(!empty($sys1))&&(!empty($sys2))&&(!empty($sys3))&&(strcmp($sys1,$sys3)==0)&&(strcmp($sys1,$sys2)!=0))||((empty($sys4))&&(!empty($sys1))&&(!empty($sys2))&&(!empty($sys3))&&(strcmp($sys1,$sys3)!=0)&&(strcmp($sys1,$sys2)==0))||((empty($sys3))&&(!empty($sys1))&&(!empty($sys2))&&(!empty($sys4))&&(strcmp($sys1,$sys2)==0)&&(strcmp($sys1,$sys4)!=0))||((empty($sys3))&&(!empty($sys1))&&(!empty($sys2))&&(!empty($sys4))&&(strcmp($sys1,$sys2)!=0)&&(strcmp($sys1,$sys4)==0))||((empty($sys2))&&(!empty($sys1))&&(!empty($sys4))&&(!empty($sys3))&&(strcmp($sys1,$sys3)==0)&&(strcmp($sys1,$sys4)!=0))||((empty($sys2))&&(!empty($sys1))&&(!empty($sys4))&&(!empty($sys3))&&(strcmp($sys1,$sys3)!=0)&&(strcmp($sys1,$sys4)==0))||((empty($sys1))&&(!empty($sys4))&&(!empty($sys2))&&(!empty($sys3))&&(strcmp($sys2,$sys3)==0)&&(strcmp($sys2,$sys4)!=0))||((empty($sys1))&&(!empty($sys4))&&(!empty($sys2))&&(!empty($sys3))&&(strcmp($sys2,$sys3)!=0)&&(strcmp($sys2,$sys4)==0))){
				//有一个测点未选择，选择的 三个测点都分布在两个数据表table
				if((empty($sys4))&&(!empty($sys1))&&(!empty($sys2))&&(!empty($sys3))&&(strcmp($sys1,$sys3)==0)&&(strcmp($sys1,$sys2)!=0)){
					$tableA = $sys1;
					$tableB = $sys2;
					$itemA = $kks1;
					$itemB = $kks2;
					$itemC = $kks3;
				}
				if((empty($sys4))&&(!empty($sys1))&&(!empty($sys2))&&(!empty($sys3))&&(strcmp($sys1,$sys3)!=0)&&(strcmp($sys1,$sys2)==0)){
					$tableA = $sys1;
					$tableB = $sys3;
					$itemA = $kks1;
					$itemB = $kks2;
					$itemC = $kks3;
				}
				if((empty($sys3))&&(!empty($sys1))&&(!empty($sys2))&&(!empty($sys4))&&(strcmp($sys1,$sys2)==0)&&(strcmp($sys1,$sys4)!=0)){
					$tableA = $sys1;
					$tableB = $sys4;
					$itemA = $kks1;
					$itemB = $kks2;
					$itemC = $kks4;
				}
				if((empty($sys3))&&(!empty($sys1))&&(!empty($sys2))&&(!empty($sys4))&&(strcmp($sys1,$sys2)!=0)&&(strcmp($sys1,$sys4)==0)){
					$tableA = $sys1;
					$tableB = $sys2;
					$itemA = $kks1;
					$itemB = $kks2;
					$itemC = $kks4;
				}
				if((empty($sys2))&&(!empty($sys1))&&(!empty($sys3))&&(!empty($sys4))&&(strcmp($sys1,$sys3)==0)&&(strcmp($sys1,$sys4)!=0)){
					$tableA = $sys1;
					$tableB = $sys4;
					$itemA = $kks1;
					$itemB = $kks3;
					$itemC = $kks4;
				}
				if((empty($sys2))&&(!empty($sys1))&&(!empty($sys3))&&(!empty($sys4))&&(strcmp($sys1,$sys3)!=0)&&(strcmp($sys1,$sys4)==0)){
					$tableA = $sys1;
					$tableB = $sys3;
					$itemA = $kks1;
					$itemB = $kks3;
					$itemC = $kks4;
				}
				if((empty($sys1))&&(!empty($sys2))&&(!empty($sys3))&&(!empty($sys4))&&(strcmp($sys2,$sys3)==0)&&(strcmp($sys2,$sys4)!=0)){
					$tableA = $sys2;
					$tableB = $sys4;
					$itemA = $kks2;
					$itemB = $kks3;
					$itemC = $kks4;
				}
				if((empty($sys1))&&(!empty($sys2))&&(!empty($sys3))&&(!empty($sys4))&&(strcmp($sys2,$sys3)!=0)&&(strcmp($sys2,$sys4)==0)){
					$tableA = $sys2;
					$tableB = $sys3;
					$itemA = $kks2;
					$itemB = $kks3;
					$itemC = $kks4;
				}
 				$tb_dygraphs_sql = "SELECT ".$tableA.".`HTime`,`".$itemA."`,`".$itemB."`,`".$itemC."` FROM `".$tableA."` INNER JOIN `".$tableB."` ON ".$tableA.".`HTime`=".$tableB.".`HTime` WHERE ".$tableA.".`HTime` BETWEEN '".$begin_time."' AND '".$end_time."'"; 
			}
			if((!empty($sys4))&&(!empty($sys1))&&(!empty($sys2))&&(!empty($sys3))&&(strcmp($sys1,$sys3)!=0)&&(strcmp($sys1,$sys2)!=0)&&(strcmp($sys1,$sys4)!=0)&&(strcmp($sys2,$sys3)!=0)&&(strcmp($sys2,$sys4)!=0)&&(strcmp($sys3,$sys4)!=0)){
				//选择了四个测点，分别在四个数据表table
 				$tb_dygraphs_sql = "SELECT ".$sys1.".`HTime`,`".$kks1."`,`".$kks2."`,`".$kks3."`,`".$kks4."` FROM `".$sys1."` INNER JOIN `".$sys2."` ON ".$sys1.".`HTime`=".$sys2.".`HTime` INNER JOIN `".$sys3."` ON ".$sys1.".`HTime`=".$sys3.".`HTime` INNER JOIN `".$sys4."` ON ".$sys1.".`HTime`=".$sys4.".`HTime` WHERE ".$sys1.".`HTime` BETWEEN '".$begin_time."' AND '".$end_time."'"; 
			}
			if(((!empty($sys4))&&(!empty($sys1))&&(!empty($sys2))&&(!empty($sys3))&&(strcmp($sys1,$sys2)==0)&&(strcmp($sys3,$sys4)==0)&&(strcmp($sys1,$sys3)!=0))||((!empty($sys4))&&(!empty($sys1))&&(!empty($sys2))&&(!empty($sys3))&&(strcmp($sys1,$sys3)==0)&&(strcmp($sys2,$sys4)==0)&&(strcmp($sys1,$sys2)!=0))||((!empty($sys4))&&(!empty($sys1))&&(!empty($sys2))&&(!empty($sys3))&&(strcmp($sys1,$sys4)==0)&&(strcmp($sys2,$sys3)==0)&&(strcmp($sys1,$sys2)!=0))){
				//选择了四个测点，两两分别在两个数据表table
				if((!empty($sys4))&&(!empty($sys1))&&(!empty($sys2))&&(!empty($sys3))&&(strcmp($sys1,$sys2)==0)&&(strcmp($sys3,$sys4)==0)&&(strcmp($sys1,$sys3)!=0)){
					$tableA = $sys1;
					$tableB = $sys3;
					$itemA = $kks1;
					$itemB = $kks2;
					$itemC = $kks3;
					$itemD = $kks4;
				}
				if((!empty($sys4))&&(!empty($sys1))&&(!empty($sys2))&&(!empty($sys3))&&(strcmp($sys1,$sys3)==0)&&(strcmp($sys2,$sys4)==0)&&(strcmp($sys1,$sys2)!=0)){
					$tableA = $sys1;
					$tableB = $sys2;
					$itemA = $kks1;
					$itemB = $kks2;
					$itemC = $kks3;
					$itemD = $kks4;
				}
				if((!empty($sys4))&&(!empty($sys1))&&(!empty($sys2))&&(!empty($sys3))&&(strcmp($sys1,$sys4)==0)&&(strcmp($sys2,$sys3)==0)&&(strcmp($sys1,$sys2)!=0)){
					$tableA = $sys1;
					$tableB = $sys2;
					$itemA = $kks1;
					$itemB = $kks2;
					$itemC = $kks3;
					$itemD = $kks4;
				}
 				$tb_dygraphs_sql = "SELECT ".$tableA.".`HTime`,`".$itemA."`,`".$itemB."`,`".$itemC."`,`".$itemD."` FROM `".$tableA."` INNER JOIN `".$tableB."` ON ".$tableA.".`HTime`=".$tableB.".`HTime` WHERE ".$tableA.".`HTime` BETWEEN '".$begin_time."' AND '".$end_time."'"; 
			}
			//四个在一个和三个分别在两个表里
			//四个在一个和一个和两个分别在三个表里
		}
		$re = mysqli_query($conn, $tb_dygraphs_sql);
		$outp = mysqli_fetch_all($re,MYSQLI_NUM);
	}
	echo json_encode($outp);
?>
