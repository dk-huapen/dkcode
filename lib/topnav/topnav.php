<?php
function base_url($path = ''){
	return '/dkcode/'.ltrim($path,'/');
}
	
?>
<a href="<?= base_url('/dkcode/diary/diary.php')?>">工作日志</a>
<a href="<?= base_url('/dkcode/taizhang/taizhang.php')?>">设备台帐</a>
<a href="<?= base_url('/dkcode/quexian/quexian.php')?>">缺陷管理</a>
<a href="<?= base_url('/dkcode/data/data.php')?>">技术资料</a>
<a href="<?= base_url('/dkcode/management/management.php')?>">班组管理</a>
<a href="<?= base_url('/dkcode/peixunziliao/peixunziliao.php')?>">班组培训</a>
<a href="<?= base_url('/dkcode/beipingbeijian/beipingbeijian.php')?>">备品备件</a>
<a href="<?= base_url('/dkcode/applet/applet.php')?>">小工具</a>
<a href="<?= base_url('/dkcode/help/help.php')?>">帮助</a>
