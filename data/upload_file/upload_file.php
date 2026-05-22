<?php
$tmpDir = $_SERVER['DOCUMENT_ROOT']."/my_data/dkfile/tmp/";
if($_FILES["file"]["size"] < 104857600)   // 小于 100MB ,修改此处可以限制上传文件大小
{
    if ($_FILES["file"]["error"] > 0)
    {
        echo "错误：: " . $_FILES["file"]["error"] . "<br>";
    }
    else
    {
        echo "上传文件名: " . $_FILES["file"]["name"] . "<br>";
        echo "文件类型: " . $_FILES["file"]["type"] . "<br>";
        echo "文件大小: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
        echo "文件临时存储的位置: " . $_FILES["file"]["tmp_name"] . "<br>";
        
        // 判断当前目录下的 upload 目录是否存在该文件
        // 如果没有 upload 目录，你需要创建它，upload 目录权限为 777
        if (file_exists($tmpDir . $_FILES["file"]["name"]))
        {
            echo $_FILES["file"]["name"] . " 文件已经存在。 ";
	    if (unlink($tmpDir . $_FILES["file"]["name"]))
	    {
            	echo $_FILES["file"]["name"] . " 文件已成功删除！ ";
            	$result=move_uploaded_file($_FILES["file"]["tmp_name"], $tmpDir . $_FILES["file"]["name"]);
	    	if($result){
            //echo "上传成功!";
            		echo "文件存储在: " . $tmpDir . $_FILES["file"]["name"];
            		echo "<script>alert('上传成功！');location='upload.php';</script>";
	    	}else{
            		echo "上传失败!";
	    	}
	    }
	    else
	    {
            	echo $_FILES["file"]["name"] . " 文件删除失败！ ";
	    }
        }
        else
        {
            // 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
            $result=move_uploaded_file($_FILES["file"]["tmp_name"], $tmpDir . $_FILES["file"]["name"]);
	    if($result){
            //echo "上传成功!";
            echo "文件存储在: " . $tmpDir . $_FILES["file"]["name"];
            echo "<script>alert('上传成功！');location='upload.php';</script>";
	    }else{
            echo "上传失败!";
	    }
        }
    }
}
else
{
    echo "非法的文件格式";
}
?>
