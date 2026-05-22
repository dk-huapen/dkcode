<?php
			include_once("./phpqrcode/qrlib.php");
			$param = $_GET['id'];
			$codeText = $param;
			ob_start();
			//QRcode::png($codeText,false,$errorCorrectionLevel, $matrixPointSize, 2);
			QRcode::png($codeText);
			$debugLog = base64_encode(ob_get_contents());
			ob_end_clean();
			echo $debugLog;
?>
