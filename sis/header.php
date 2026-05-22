<?php
function base_url($path = ''){
	return '/dkcode/dkcode/'.ltrim($path,'/');
}
?>
<meta http-equiv="content-type" content="text/html; charset=GBK">
<link rel="stylesheet" type="text/css" href="<?= base_url('sis/mystyle.css')?>">
<script type="text/javascript"src="<?= base_url('lib/dygraph.js')?>"></script>
<link rel="stylesheet" type="text/css"src="<?= base_url('diary_css/dygraph.css')?>" />
<script src="<?= base_url('sis/lib/JS/myScript.js')?>"></script>
