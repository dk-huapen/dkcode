<html>
<head>
<?php
include("header.php")
?>
</head>
<body >
		<div class="header">
			<h1>热控班组管理平台</h1>
		</div>
		<div class="topnav">
			<?php include("../../lib/topnav/topnav.php") ?>
		</div>
		<div class="row">
			<div class="leftcolumn">
				<div class="card">
<h2><center>临时文件管理<center></h2>
<center><table class="list">
<caption><h3>临时文件夹内文件清单</h3></caption> 
<tr>
	<th style="width:10%">序号</th>
	<th style="width:80%">文件名称</th>
	<th style="width:10%">查看</th>
</tr>
<?php
// 获取当前文件的上级目录
//$con = dirname(__FILE__);
$con = $_SERVER['DOCUMENT_ROOT']."/my_data/dkfile/tmp";
// 扫描$con目录下的所有文件
$filename = scandir($con);
for($i=0;$i<count($filename);$i++){
?>
<tr>
<td style="width:10%"><center><?php echo $i ?><center></td>
<td style="width:80%"><center><?php echo $filename[$i] ?><center></td>
<td width="10%"><center><a target="_blank" href="<?php echo "/my_data/dkfile/tmp/".$filename[$i] ?>"><img border=0 src='../../images/info.png' alt='查看'></a></center> </td>
</tr>
<?php
}
/*
$conname = array();
foreach($filename as $k=>$v){
    // 跳过两个特殊目录   continue跳出循环
    if($v=="." || $v==".."){continue;}
    //截取文件名，我只需要文件名不需要后缀;然后存入数组。如果你是需要后缀直接$v即可
    $conname[] = substr($v,0,strpos($v,"."));
}
*/
?>
</table>
<h3><center>上传文件至服务器<center></h3>
<form action="upload_file.php" method="post" enctype="multipart/form-data">
    <label for="file">文件名：</label>
    <input type="file" name="file" id="file">
    <input type="submit" name="submit" value="上载">
</form>
</div>
			</div>
			<div class="rightcolumn">
				<div class="card">
<ul class="right">
<li><a href="../standard/standard.php">系统资料</a></li>
<li><a href="../instruction/instruction.php">文件清单</a></li>
<li><a class="active" href="#">文件上传</a></li>
</ul>
				</div>
			</div>
		</div>
		<div class="footer">
			<?php include("../../lib/footer/footer.php")?>
		</div>


</body>
</html>
