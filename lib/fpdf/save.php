<?php
	include('diaryPDF.php');
    		$pdf->Output('/var/www/html/diary/diary/log/'.$time.'.pdf','F');//保存为example.pdf文件
?>
