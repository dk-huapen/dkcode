<?php
			include_once("./phpqrcode/qrlib.php");
			$param = $_GET['id'];
			ob_start("callback");
//			$codeText = 'DEMO - '.$param;
			$codeText = $param;
			$debugLog = ob_get_contents();
			ob_end_clean();
			QRcode::png($codeText);
?>
