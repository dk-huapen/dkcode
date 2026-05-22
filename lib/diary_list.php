<?php
	function diary_job_list($conn,$job_type,$diary_id){
		$count = "SELECT count(*) FROM tb_jobs WHERE tb_jobs.diary_id=".$diary_id." AND tb_jobs.job_type=".$job_type;
        	$re = mysqli_query($conn,$count);
        	$result = mysqli_fetch_row($re);
        	$num = $result[0];
		if($num>0){
			$tb_job_type_sql="select job_type_name from tb_job_type where job_type_id=".$job_type;
			$tb_job_type_result = mysqli_query($conn, $tb_job_type_sql);
			$tb_job_type_arr=mysqli_fetch_assoc($tb_job_type_result);
			echo "<table class='list'>";
			echo "<caption><h4>".$tb_job_type_arr['job_type_name']."</h4></caption>";
			echo "<tr height='30px'><th>编号</th><th>内容</th><th>工作负责人</th><th>状态</th><th>管理</th></tr>";
			$tb_jobs_sql = "SELECT tb_jobs.job_id,tb_jobs.job_content,(SELECT tb_user.user_name FROM tb_user WHERE tb_user.user_id=tb_jobs.job_header)AS job_header_name,tb_jobs.job_status FROM tb_jobs WHERE tb_jobs.diary_id=".$diary_id." AND tb_jobs.job_type=".$job_type;
			$tb_jobs_result = mysqli_query($conn, $tb_jobs_sql);
			while($tb_jobs_arr=mysqli_fetch_assoc($tb_jobs_result)){
				echo "<tr bgcolor='#eeeeee'align='center' height='24'>";
				echo "<td width='5%'>".$tb_jobs_arr['job_id']."</td>";
				echo "<td width='50%'>".$tb_jobs_arr['job_content']."</td>";
				echo "<td width='10%'>".$tb_jobs_arr['job_header_name']."</td>";
				echo "<td width='10%'>".$tb_jobs_arr['job_status']."</td>";
				echo "<td width='15%'><a href='job/look_content.php?id=".$tb_jobs_arr['job_id']."'><img border=0 src='../images/info.png' alt='查看'></a><a href='job/edit_content.php?id=".$tb_jobs_arr['job_id']."'><img border=0 src='../images/edit.gif' alt='编辑'></a><a href='job/del_content.php?id=".$tb_jobs_arr['job_id']."'><img border=0 src='../images/del.gif' alt='删除'></a> </td>";
				echo "</tr>";
			}
			echo "</table>";
		}
	}
	function diary_defect_list($conn,$diary_id){
		$count = "SELECT count(*) FROM tb_defect WHERE diary_id=".$diary_id;
     	   	$re = mysqli_query($conn,$count);
        	$result = mysqli_fetch_row($re);
        	$num = $result[0];
		if($num>0){
			echo "<table class='list'>";
			echo "<caption><h4>消缺工作</h4></caption>";
			echo "<tr height='30px'><th>编号</th><th>缺陷内容</th><th>消缺人</th><th>结果</th><th>管理</th></tr>";
			$tb_defect_sql = "SELECT tb_defect.defect_id,tb_defect.defect_specialty,tb_defect.defect_cotent,tb_defect.defect_find_time,(SELECT tb_defect_status.defect_status_name FROM tb_defect_status WHERE tb_defect.defect_result = tb_defect_status.defect_status_id)AS defect_result,tb_defect.defect_clear_time,(SELECT tb_user.user_name FROM tb_user WHERE tb_defect.defect_clear_people = tb_user.user_id)AS defect_clear_people,tb_defect.defect_check_people FROM tb_defect where diary_id= ".$diary_id;
			$tb_defect_result = mysqli_query($conn, $tb_defect_sql);
			while($tb_defect_arr=mysqli_fetch_assoc($tb_defect_result)){
				echo "<tr bgcolor='#eeeeee'align='center' height='24'>";
				echo "<td width='5%'>".$tb_defect_arr['defect_id']."</td>";
				echo "<td width='42%'>".$tb_defect_arr['defect_cotent']."</td>";
				echo "<td width='6%'>".$tb_defect_arr['defect_clear_people']."</td>";
				echo "<td width='6%'>".$tb_defect_arr['defect_result']."</td>";
       				echo "<td width='10%'><a href='../quexian/defect/look_content.php?id=".$tb_defect_arr['defect_id']."'><img border=0 src='../images/info.png' alt='查看'></a><a href='../quexian/defect/edit_content.php?id=".$tb_defect_arr['defect_id']."'><img border=0 src='../images/edit.gif' alt='编辑'></a><a href='../quexian/defect/del_content.php?id=".$tb_defect_arr['defect_id']."'><img border=0 src='../images/del.gif' alt='删除'></a>";
        			echo "</td>";
				echo "</tr>";
				}
			echo "</table>";
			}else{
				echo "无新增缺陷!";
			}
}
?>
