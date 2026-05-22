<?php
header("Content-type:text/html;charset=utf-8");
include_once('conn.php');
$sql=$_GET['sql'];
//	$sql = "SELECT tb_jobs.job_id,tb_jobs.job_content,(SELECT tb_user.user_name FROM tb_user WHERE tb_user.user_id=tb_jobs.job_header)AS job_header_name,tb_jobs.job_people,tb_jobs.job_status,(SELECT tb_diary.createtime FROM tb_diary WHERE tb_diary.diary_id=tb_jobs.diary_id)AS jobs_diary_id FROM tb_jobs WHERE tb_jobs.job_type= ".$type." order by diary_id desc limit ".(($num-1)*10).",10";

//$sql="SELECT tb_account.account_id,tb_account.equipment_kks,tb_account.equipment_name,(SELECT tb_goods.goods_name FROM tb_goods WHERE tb_goods.goods_id = tb_account.equipment_goods_id)AS goods_name,tb_account.equipment_position FROM tb_account WHERE  (equipment_kks LIKE '%10HAH50CT2%' OR equipment_name LIKE '%10HAH50CT2%') order by account_id desc limit 10,10";
//echo $sql;
$re = mysqli_query($conn, $sql);
$arrAuto=array();
//$arrAutto=mysqli_fetch_all($re,MYSQLI_NUM)
while($arr=mysqli_fetch_array($re,MYSQLI_ASSOC)){
	$arrAuto[]=$arr;
}
//echo implode('@',$arrAuto);
echo json_encode($arrAuto);
?>
