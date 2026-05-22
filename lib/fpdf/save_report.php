<?php
			include('reportPDF.php');
	if(file_exists("/var/www/html/data/report/FeederReport/".$LeaderId.".pdf")){
//		if(copy("/var/www/html/data/report/FeederReport/".$LeaderId.".pdf","/var/www/html/data/report/ReportBak/".$tb_account_arr['equipment_name']."校验报告.pdf")){
		$newname = $tb_account_arr['equipment_name']."_".$report_date;
	if(file_exists("/var/www/html/data/report/ReportBak/".$newname."校验报告.pdf")){
		if(unlink("/var/www/html/data/report/ReportBak/".$newname."校验报告.pdf")){
                	echo "<script>alert('已经删除备份中同日期报告!');</script>";
		}
	}
		if(copy("/var/www/html/data/report/FeederReport/".$LeaderId.".pdf","/var/www/html/data/report/ReportBak/".$newname."校验报告.pdf")){
                	echo "<script>alert('已经将原来报告备份!');</script>";
			if(unlink("/var/www/html/data/report/FeederReport/".$LeaderId.".pdf")){
                	echo "<script>alert('已经删除原来报告!');</script>";
			}
    			$pdf->Output('/var/www/html/data/report/FeederReport/'.$LeaderId.'.pdf','F');//保存为example.pdf文件
                		echo "<script>alert('生成新的报告 !');location='/taizhang/equipment_account/local_account.php'</script>";
		}else{
                		echo "<script>alert('备份失败 !');</script>";
		}
	}else{
    		$pdf->Output('/var/www/html/data/report/FeederReport/'.$LeaderId.'.pdf','F');//保存为example.pdf文件
                		echo "<script>alert('生成新的报告 !');location='/taizhang/equipment_account/local_account.php'</script>";
	}
    		//$pdf->Output($time.'.pdf','I');
?>
