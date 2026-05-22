<?php
					include_once("Table.class.php");
class Job extends dkTable{
	function __construct(){
		$this->conn = mysqli_connect(parent::host,parent::username,parent::password,parent::database);
		if(!$this->conn){
			die("数据库连接失败". mysqli_connect_error());
		}else { 
	//	echo"连接成功";
		}
		mysqli_query('set names utf8');
		$this->pagesize=10;
		$this->pageFunction = JobPage;
		$this->tableHead = array("job_id"=>"编号","job_content"=>"内容","job_header_name"=>"工作负责人","job_people"=>"成员","job_status"=>"状态","jobs_diary_id"=>"更新日期","job_deadtime"=>"完成日期","management"=>"管理","path"=>"./","action"=>"content");
		$this->selectinfo = array("table"=>"tb_jobs","id"=>"job_id","caption"=>"工作列表","status"=>"job_type","quick"=>"job_deadtime");
		$this->keyinfo = array("number"=>"job_notes","content"=>"job_content","remark"=>"job_remarks");
		$this->count_sql = "select count(*) from tb_jobs where ";
		$this->sql = "SELECT tb_jobs.analysis_id,tb_jobs.job_id,tb_jobs.job_content,(SELECT tb_user.user_name FROM tb_user WHERE tb_user.user_id=tb_jobs.job_header)AS job_header_name,tb_jobs.job_people,(SELECT tb_job_status.job_status_content FROM tb_job_status WHERE tb_job_status.job_status_id=tb_jobs.job_status)AS job_status,(SELECT tb_diary.createtime FROM tb_diary WHERE tb_diary.diary_id=tb_jobs.diary_id)AS jobs_diary_id,job_deadtime FROM tb_jobs WHERE ";
	}
	public function retrievalBox(){
		echo "<fieldset>",
			"<legend style='border:1px'>检索栏</legend>";
					$area_option = array("table"=>"tb_area","key"=>"area_system","value"=>0,"option_id"=>"area_id","option_value"=>"area_content");
					$area_json = json_encode($area_option);
			echo "<label><input type='checkbox' name='select_checkbox[job_system]' value='select_job_system'>系统</label>",
			"<select name='select_job_system' id='sys' style='width:25%' class='selectfont'onchange=check(this.options[options.selectedIndex].value,'area',$area_json)>",
"<option selected='selected' disabled='disabled' style='display: none' value=''></option>";
		$tb_system_sql = "SELECT * FROM `tb_system` WHERE 1";
		$tb_system_result = mysqli_query($this->conn, $tb_system_sql);
		while($tb_system_arr=mysqli_fetch_assoc($tb_system_result)){
                                        echo "<option value=".$tb_system_arr['system_id'].">".$tb_system_arr['system_content']."</option>";
		}
		echo "</select>",
			"<label><input type='checkbox' name='select_checkbox[job_header]'value='select_job_header'>负责人</label>",
"<select name='select_job_header' style='width:15%' class='selectfont'>",
"<option selected='selected' disabled='disabled' style='display: none' value=''></option>";
		$tb_user_sql = "SELECT * FROM `tb_user` WHERE 1";
		$tb_user_result = mysqli_query($this->conn, $tb_user_sql);
		while($tb_user_arr=mysqli_fetch_assoc($tb_user_result)){
                                        echo "<option value=".$tb_user_arr['user_id'].">".$tb_user_arr['user_name']."</option>";
		}
                                        echo "</select>",
"<label><input type='checkbox' name='select_checkbox[job_type]' value='select_job_type'>工作类型</label>",
"<select name='select_job_type' style='width:25%' class='selectfont'>",
		$tb_job_type_sql = "SELECT * FROM `tb_job_type` WHERE 1";
		$tb_job_type_result = mysqli_query($this->conn, $tb_job_type_sql);
		while($tb_job_type_arr=mysqli_fetch_assoc($tb_job_type_result)){
                                        echo "<option value=".$tb_job_type_arr['job_type_id'].">".$tb_job_type_arr['job_type_name']."</option>";
		}
                                        echo "</select>",
			"<br>",
			"<label><input type='checkbox' name='select_checkbox[job_area]' value='select_job_area'>区域</label>",
			"<select id='area'style='width:25%' name='select_job_area' class='selectfont'>",
				"<option value='-1'>--请选择--</option>",
				"</select>",
			"<label><input type='checkbox' name='select_checkbox[job_status]' value='select_job_status'>进度</label>",
"<select name='select_job_status' style='width:15%' class='selectfont'>";
		$tb_job_status_sql = "SELECT * FROM `tb_job_status` WHERE 1";
		$tb_job_status_result = mysqli_query($this->conn, $tb_job_status_sql);
		while($tb_job_status_arr=mysqli_fetch_assoc($tb_job_status_result)){
                                        echo "<option value=".$tb_job_status_arr['job_status_id'].">".$tb_job_status_arr['job_status_content']."</option>";
		}
                                        echo "</select>",
"<label><input type='checkbox' name='select_checkbox[job_deadtime]' value='select_job_deadtime'>截至日期</label><input type='text'style='width:25%' name='select_job_deadline' size='5'></input>",
"<br>";
				$standard_option = array("table"=>"tb_standard_jobs","key"=>"standard_job_type","value"=>0,"option_id"=>"standard_job_id","option_value"=>"standard_job_content");
				$standard_json = json_encode($standard_option);
echo "<label><input type='checkbox' name='select_checkbox[analysis_id]' value='select_analysis_id'>标准</label>",
"<select name='standard' style='width:20%' class='selectfont'onchange=check(this.options[options.selectedIndex].value,'standard_job_content',$standard_json)>",
"<option selected='selected' disabled='disabled'  style='display: none' value=''></option>";
		$tb_standard_job_sql = "SELECT * FROM `tb_standard_job_type` WHERE 1";
		$tb_standard_job_result = mysqli_query($this->conn, $tb_standard_job_sql);
		while($tb_standard_job_arr=mysqli_fetch_assoc($tb_standard_job_result)){
               		echo "<option value=".$tb_standard_job_arr['standard_job_type_id'].">".$tb_standard_job_arr['standard_job_type_name']."</option>";
		}
                                        echo "</select>",
"<label>工作项目</label>",
"<select id='standard_job_content' style='width:45%'name='select_analysis_id' class='selectfont'>",
"<option value='-1'>--请选择--</option>",
                                        "</select>",
"<br>",
"<label><input type='checkbox' name='select_checkbox_key' value='select_key'>关键字</label><input type='text'style='width:30%' name='select_key' size='10' placeholder='工作内容/备注/详细'></input>",
"</fieldset>";
	}
	public function showStandardJob(){//显示Id为LedgerId的工作记录
		//$this->tableHead = array("job_id"=>"编号","job_content"=>"内容","job_header_name"=>"工作负责人","job_deadtime"=>"完成时间","management"=>"无","action"=>"content");
		$count_sql = $this->count_sql."job_type = 2 and job_status != 3 and job_status != 4";
        	$re = mysqli_query($this->conn,$count_sql);

        	$result = mysqli_fetch_row($re);
        	$num = $result[0];
		$this->num=$num;
		$str = $this->sql."job_type = 2 and job_status != 3 and job_status != 4";
		//$sql = $str.' order by '.$this->selectinfo['id'].' desc limit 0,'.$this->pagesize;
		$sql = $str.' order by job_deadtime asc limit 0,'.$this->pagesize;
        	$result = mysqli_query($this->conn,$sql);
		$this->result = $result;
		//$pageSql = $str.' order by '.$this->selectinfo['id'].' desc limit ';
		$pageSql = $str.' order by job_deadtime asc limit ';
		$this->pageSql = $pageSql;
		$this->tbodyId = "tbodyId".$status;
		$this->sqlId = "sqlId".$status;
		$this->showTable();
		if($this->num > $this->pagesize){
			$json = json_encode($this->tableHead);
			//echo $json;
			$page_obj = new Page($this->num,$this->pagesize,$this->sqlId,$this->tbodyId,$this->pageFunction,$json);
			$page_obj->showPage();
		}

	}
	public function ListStandardJob($StandardId,$area){//显示Id为LedgerId的工作记录
		$this->tableHead = array("job_id"=>"编号","job_content"=>"内容","job_header_name"=>"工作负责人","job_deadtime"=>"完成时间","management"=>"无","action"=>"content");
		$count_sql = $this->count_sql."analysis_id = ".$StandardId." and job_area = ".$area." and job_status = 3";
        	$re = mysqli_query($this->conn,$count_sql);

        	$result = mysqli_fetch_row($re);
        	$num = $result[0];
		$this->num=$num;
		$str = $this->sql."analysis_id = ".$StandardId." and job_area = ".$area." and job_status = 3";
		$sql = $str.' order by job_deadtime desc limit 0,'.$this->pagesize;
        	$result = mysqli_query($this->conn,$sql);
		$this->result = $result;
		$pageSql = $str.' order by job_deadtime desc limit ';
		$this->pageSql = $pageSql;
		$this->tbodyId = "tbodyId".$status;
		$this->sqlId = "sqlId".$status;
		$this->showTable();
		if($this->num > $this->pagesize){
			$json = json_encode($this->tableHead);
			//echo $json;
			$page_obj = new Page($this->num,$this->pagesize,$this->sqlId,$this->tbodyId,$this->pageFunction,$json);
			$page_obj->showPage();
		}

	}
	public function showDiary($diaryId){//显示Id为LedgerId的工作记录
		$this->tableHead = array("job_id"=>"编号","job_content"=>"内容","job_header_name"=>"工作负责人","job_people"=>"成员","job_status"=>"状态","management"=>"管理","path"=>"./job/","action"=>"content");
		$count_sql = $this->count_sql."diary_id = ".$diaryId;
        	$re = mysqli_query($this->conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$num = $result[0];
		$this->num=$num;
		$str = $this->sql."diary_id = ".$diaryId;
		$sql = $str.' order by '.$this->selectinfo['id'].' desc limit 0,'.$this->pagesize;
        	$result = mysqli_query($this->conn,$sql);
		$this->result = $result;
		$pageSql = $str.' order by '.$this->selectinfo['id'].' desc limit ';
		$this->pageSql = $pageSql;
		$this->tbodyId = "tbodyId".$status;
		$this->sqlId = "sqlId".$status;
		if($this->num > 0){
			$this->showTable();
		}else{
			echo "目前无新增工作！";
		}
		if($this->num > $this->pagesize){
			$json = json_encode($this->tableHead);
			//echo $json;
			$page_obj = new Page($this->num,$this->pagesize,$this->sqlId,$this->tbodyId,$this->pageFunction,$json);
			$page_obj->showPage();
		}

	}
	public function showJob($LedgerId){//显示Id为LedgerId的工作记录
		$this->tableHead = array("job_id"=>"编号","job_content"=>"内容","job_header_name"=>"工作负责人","job_people"=>"成员","job_status"=>"状态","jobs_diary_id"=>"更新日期","management"=>"无","action"=>"content");
		$count_sql = $this->count_sql."job_account_id = ".$LedgerId;
        	$re = mysqli_query($this->conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$num = $result[0];
		$this->num=$num;
		$str = $this->sql."job_account_id = ".$LedgerId;
		$sql = $str.' order by '.$this->selectinfo['id'].' desc limit 0,'.$this->pagesize;
        	$result = mysqli_query($this->conn,$sql);
		$this->result = $result;
		$pageSql = $str.' order by '.$this->selectinfo['id'].' desc limit ';
		$this->pageSql = $pageSql;
		$this->tbodyId = "tbodyId".$status;
		$this->sqlId = "sqlId".$status;
		$this->showTable();
		if($this->num > $this->pagesize){
			$json = json_encode($this->tableHead);
			//echo $json;
			$page_obj = new Page($this->num,$this->pagesize,$this->sqlId,$this->tbodyId,$this->pageFunction,$json);
			$page_obj->showPage();
		}

	}
	public function editJob($id){//显示Id为LedgerId的工作记录
		$tb_jobs_sql = 'SELECT * FROM tb_jobs WHERE job_id = '.$id;
		$tb_jobs_result = mysqli_query($this->conn, $tb_jobs_sql);
		$tb_jobs_arr=mysqli_fetch_assoc($tb_jobs_result);
		echo "<fieldset>",
			"<legend style='border:1px'>编辑".$id."号工作表单基本信息</legend>",
			"<input type='hidden' name='job_id' size='3' value=".$tb_jobs_arr['job_id']."></input>",
			"<label> 工作内容<input type='text' style='width:60%' name='job_content' size='70' value=".$tb_jobs_arr['job_content']."></input></label>",
			"<br>";
					$area_option = array("table"=>"tb_area","key"=>"area_system","value"=>0,"option_id"=>"area_id","option_value"=>"area_content");
					$area_json = json_encode($area_option);
			echo "<label>系统",
				"<select name='job_system' style='width:15%' id='sys' class='selectfont' onchange=check(this.options[options.selectedIndex].value,'area',$area_json)>",
					"<option selected='selected' disabled='disabled' style='display: none' value=''></option>";
					$tb_system_sql = "SELECT * FROM `tb_system` WHERE 1";
					$tb_system_result = mysqli_query($this->conn, $tb_system_sql);
					while($tb_system_arr=mysqli_fetch_assoc($tb_system_result)){
						if($tb_system_arr['system_id']==$tb_jobs_arr['job_system']){
                                       			echo "<option value=".$tb_system_arr['system_id']." selected='selected'>".$tb_system_arr['system_content']."</option>";
						}else{
                                       			echo "<option value=".$tb_system_arr['system_id'].">".$tb_system_arr['system_content']."</option>";
						}
					}
				echo "</select>",
			"</label>",
			"<label>负责人&emsp;",
				"<select name='job_header' style='width:15%' class='selectfont'>",
					"<option selected='selected' disabled='disabled' style='display: none' value=''></option>",
					$tb_user_sql = "SELECT * FROM `tb_user` WHERE 1";
					$tb_user_result = mysqli_query($this->conn, $tb_user_sql);
					while($tb_user_arr=mysqli_fetch_assoc($tb_user_result)){
						if($tb_user_arr['user_id']==$tb_jobs_arr['job_header']){
                                       			echo "<option value=".$tb_user_arr['user_id']." selected='selected'>".$tb_user_arr['user_name']."</option>";
						}else{
                                       			echo "<option value=".$tb_user_arr['user_id'].">".$tb_user_arr['user_name']."</option>";
						}
					}
                            	echo "</select>",
			"</label>",
			"<label>工作类型",
				"<select name='job_type' style='width:15%' class='selectfont'>",
					"<option selected='selected' disabled='disabled' style='display: none' value=''></option>",
					$tb_job_type_sql = "SELECT * FROM `tb_job_type` WHERE 1";
					$tb_job_type_result = mysqli_query($this->conn, $tb_job_type_sql);
					while($tb_job_type_arr=mysqli_fetch_assoc($tb_job_type_result)){
						if($tb_job_type_arr['job_type_id']==$tb_jobs_arr['job_type']){
                                       			echo "<option value=".$tb_job_type_arr['job_type_id']." selected='selected'>".$tb_job_type_arr['job_type_name']."</option>";
						}else{
                                       			echo "<option value=".$tb_job_type_arr['job_type_id'].">".$tb_job_type_arr['job_type_name']."</option>";
						}
					}
                         	echo "</select>",
			"</label>",
			"<label>工作成员<input type='text'style='width:15%' name='job_people' size='10' value=".$tb_jobs_arr['job_people']."></input></label>",
			"<br>",
			"<label>区域",
				"<select id='area' style='width:15%' name='job_area' class='selectfont'>",
					"<option selected='selected' disabled='disabled' style='display: none' value=''></option>",
					$tb_area_sql = "SELECT * FROM `tb_area` WHERE 1";
					$tb_area_result = mysqli_query($this->conn, $tb_area_sql);
					while($tb_area_arr=mysqli_fetch_assoc($tb_area_result)){
						if($tb_area_arr['area_id']==$tb_jobs_arr['job_area']){
                                        		echo  "<option value=".$tb_area_arr['area_id']." selected='selected'>".$tb_area_arr['area_content']."</option>";
						}else{
                                        		echo "<option value=".$tb_area_arr['area_id'].">".$tb_area_arr['area_content']."</option>";
						}
					}
                         	echo "</select>",
			"</label>",
			"<label>工作日期",
				"<select name='diary_id' style='width:15%' class='selectfont'>",
					"<option value='-1'>--请选择--</option>";
					$tb_diary_sql = "SELECT * FROM `tb_diary` WHERE 1 order by diary_id desc limit 0,90";
					$tb_diary_result = mysqli_query($this->conn, $tb_diary_sql);
					while($tb_diary_arr=mysqli_fetch_assoc($tb_diary_result)){
						if($tb_diary_arr['diary_id']==$tb_jobs_arr['diary_id']){
                                        		echo "<option value=".$tb_diary_arr['diary_id']." selected='selected'>".$tb_diary_arr['createtime']."</option>";
							//$job_deadtime = $tb_diary_arr['createtime'];
						}else{
                                        		echo "<option value=".$tb_diary_arr['diary_id'].">".$tb_diary_arr['createtime']."</option>";
						}
					}
                            	echo "</select>",
			"</label>",
			"<label>工作进度",
				"<select name='job_status' style='width:15%' class='selectfont'>";
					"<option selected='selected' disabled='disabled' style='display: none' value=''></option>";
						$tb_job_status_sql = "SELECT * FROM `tb_job_status` WHERE 1";
						$tb_job_status_result = mysqli_query($this->conn, $tb_job_status_sql);
						while($tb_job_status_arr=mysqli_fetch_assoc($tb_job_status_result)){
							if($tb_job_status_arr['job_status_id']==$tb_jobs_arr['job_status']){
                                        			echo "<option value=".$tb_job_status_arr['job_status_id']." selected='selected'>".$tb_job_status_arr['job_status_content']."</option>";
							}else{
                                        			echo "<option value=".$tb_job_status_arr['job_status_id'].">".$tb_job_status_arr['job_status_content']."</option>";
							}
						}
                             	echo "</select>",
			"</label>",
			"<label>完成日期<input type='date'style='width:15%' name='job_deadtime' value=".$tb_jobs_arr['job_deadtime']."></input></label>",
		"</fieldset>",
		"<fieldset>",
			"<legend style='border:1px'>完善".$id."号工作表单信息</legend>",
			"<label>工作票",
				"<select name='job_work_ticket_id' style='width:15%' class='selectfont'>",
					"<option selected='selected' disabled='disabled'  style='display: none' value=''></option>";
					$tb_work_ticket_sql = "SELECT * FROM `tb_work_ticket` WHERE 1";
					$tb_work_ticket_result = mysqli_query($this->conn, $tb_work_ticket_sql);
					while($tb_work_ticket_arr=mysqli_fetch_assoc($tb_work_ticket_result)){
						if($tb_work_ticket_arr['work_ticket_id']==$tb_jobs_arr['job_work_ticket_id']){
                                        		echo "<option value=".$tb_work_ticket_arr['work_ticket_id']." selected='selected'>".$tb_work_ticket_arr['work_ticket_number']."</option>";
						}else{
                                        		echo "<option value=".$tb_work_ticket_arr['work_ticket_id'].">".$tb_work_ticket_arr['work_ticket_number']."</option>";
						}
					}
                      		echo "</select>",
			"</label>",
			"<label>特别分析",
				"<select name='analysis_id' style='width:10%' class='selectfont'>",
					"<option selected='selected' disabled='disabled' style='display: none' value=''></option>";
					//if($tb_jobs_arr['analysis_id']>=-1){$tb_jobs_arr['job_type']
					if($tb_jobs_arr['job_type']==1 || $tb_jobs_arr['job_type']==2){
						$tb_analysis_sql = "SELECT * FROM `tb_standard_jobs` WHERE 1";
						$tb_analysis_result = mysqli_query($this->conn, $tb_analysis_sql);
						while($tb_analysis_arr=mysqli_fetch_assoc($tb_analysis_result)){
							if($tb_analysis_arr['standard_job_id']==$tb_jobs_arr['analysis_id']){
                						echo "<option value=".$tb_analysis_arr['standard_job_id']." selected='selected'>".$tb_analysis_arr['standard_job_id']."</option>";
							}else{
                						echo "<option value=".$tb_analysis_arr['standard_job_id'].">".$tb_analysis_arr['standard_job_id']."</option>";
							}
						}
					}else{
						$tb_analysis_sql = "SELECT * FROM `tb_analysis` WHERE 1";
						$tb_analysis_result = mysqli_query($this->conn, $tb_analysis_sql);
						while($tb_analysis_arr=mysqli_fetch_assoc($tb_analysis_result)){
							if($tb_analysis_arr['analysis_id']==$tb_jobs_arr['analysis_id']){
                						echo "<option value=".$tb_analysis_arr['analysis_id']." selected='selected'>".$tb_analysis_arr['analysis_id']."</option>";
							}else{
                						echo "<option value=".$tb_analysis_arr['analysis_id'].">".$tb_analysis_arr['analysis_id']."</option>";
							}
						}
					}
                		echo "</select>",
			"</label>",
			"<label>关联设备",
				"<select name='job_account_id' style='width:10%' class='selectfont'>",
					"<option selected='selected' disabled='disabled' style='display: none' value=''></option>",
					$tb_account_sql = "SELECT account_id,equipment_kks FROM tb_account WHERE 1";
					$tb_account_result = mysqli_query($this->conn, $tb_account_sql);
					while($tb_account_arr=mysqli_fetch_assoc($tb_account_result)){
						if($tb_account_arr['account_id']==$tb_jobs_arr['job_account_id']){
                                        		echo "<option value=".$tb_account_arr['account_id']." selected='selected'>".$tb_account_arr['account_id']."</option>";
						}else{
                                        		echo "<option value=".$tb_account_arr['account_id'].">".$tb_account_arr['account_id']."</option>";
						}
					}
                       		echo "</select>",
			"</label>",
			"<label>备注<input type='text' style='width:30%' name='job_remarks' size='70' value=".$tb_jobs_arr['job_remarks']."></label>",
		"</fieldset>",
		"<fieldset>",
			"<legend style='border:1px'>工作详细</legend>", 
			"<textarea rows='5' style='width:100%' name='job_notes'>".$tb_jobs_arr['job_notes']."</textarea>",
		"</fieldset>";
		return array($tb_jobs_arr['analysis_id'],$tb_jobs_arr['job_type'],$tb_jobs_arr['job_area']);
	}
	public function lookJob($id){//显示Id为LedgerId的工作记录
		$tb_jobs_sql = 'SELECT * FROM tb_jobs WHERE job_id = '.$id;
		$tb_jobs_result = mysqli_query($this->conn, $tb_jobs_sql);
		$tb_jobs_arr=mysqli_fetch_assoc($tb_jobs_result);
		echo "<fieldset>",
			"<legend style='border:1px'>查看".$id."号工作表单基本信息</legend>",
			"<input type='hidden' name='job_id' size='3' value=".$tb_jobs_arr['job_id']."></input>",
			"<label>工作内容<input type='text'readonly style='width:60%' size='70' value='".$tb_jobs_arr['job_content']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>",
			"<br>";
					$tb_system_sql = "SELECT * FROM `tb_system` WHERE system_id =".$tb_jobs_arr['job_system'];
					$tb_system_result = mysqli_query($this->conn, $tb_system_sql);
					$tb_system_arr=mysqli_fetch_assoc($tb_system_result);
			echo "<label>系统<input type='text'readonly style='width:15%' value='".$tb_system_arr['system_content']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>";
					$tb_user_sql = "SELECT * FROM `tb_user` WHERE user_id =".$tb_jobs_arr['job_header'];
					$tb_user_result = mysqli_query($this->conn, $tb_user_sql);
					$tb_user_arr=mysqli_fetch_assoc($tb_user_result);
			echo "<label>负责人<input type='text'readonly style='width:15%' value='".$tb_user_arr['user_name']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>";
					$tb_job_type_sql = "SELECT * FROM `tb_job_type` WHERE job_type_id =".$tb_jobs_arr['job_type'];
					$tb_job_type_result = mysqli_query($this->conn, $tb_job_type_sql);
					$tb_job_type_arr=mysqli_fetch_assoc($tb_job_type_result);
			echo "<label>工作类型<input type='text'readonly style='width:15%' value='".$tb_job_type_arr['job_type_name']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>",
			"<label>工作成员<input type='text' readonly style='width:15%' value='".$tb_jobs_arr['job_people']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>",
			"<br>";
					$tb_area_sql = "SELECT * FROM `tb_area` WHERE area_id =".$tb_jobs_arr['job_area'];
					$tb_area_result = mysqli_query($this->conn, $tb_area_sql);
					$tb_area_arr=mysqli_fetch_assoc($tb_area_result);
			echo "<label>区域<input type='text' readonly style='width:15%' value='".$tb_area_arr['area_content']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>";
					$tb_diary_sql = "SELECT * FROM `tb_diary` WHERE diary_id =".$tb_jobs_arr['diary_id'];
					$tb_diary_result = mysqli_query($this->conn, $tb_diary_sql);
					$tb_diary_arr=mysqli_fetch_assoc($tb_diary_result);
			echo "<label>工作日期<input type='text' readonly style='width:15%' value='".$tb_diary_arr['createtime']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>";
						$tb_job_status_sql = "SELECT * FROM `tb_job_status` WHERE job_status_id =".$tb_jobs_arr['job_status'];
						$tb_job_status_result = mysqli_query($this->conn, $tb_job_status_sql);
						$tb_job_status_arr=mysqli_fetch_assoc($tb_job_status_result);
			echo "<label>工作进度<input type='text' readonly style='width:15%' value='".$tb_job_status_arr['job_status_content']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>",
			"<label>完成日期<input type='text' readonly style='width:15%' value='".$tb_jobs_arr['job_deadtime']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>",
		"</fieldset>",
		"<fieldset>",
			"<legend style='border:1px'>查看".$id."号工作表单信息</legend>";
					$tb_work_ticket_sql = "SELECT * FROM `tb_work_ticket` WHERE work_ticket_id =".$tb_jobs_arr['job_work_ticket_id'];
					$tb_work_ticket_result = mysqli_query($this->conn, $tb_work_ticket_sql);
					$tb_work_ticket_arr=mysqli_fetch_assoc($tb_work_ticket_result);
			echo "<label>工作票<input type='text' readonly style='width:15%' value='".$tb_work_ticket_arr['work_ticket_number']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>",
			"<label>特别分析<input type='text' readonly style='width:10%' value='".$tb_jobs_arr['analysis_id']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>",
			"<label>关联设备<input type='text' readonly style='width:10%' value='".$tb_jobs_arr['job_account_id']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>",
			"<label>备注<input type='text'readonly style='width:30%' name='job_remarks' value='".$tb_jobs_arr['job_remarks']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></label>",
		"</fieldset>",
		"<fieldset>",
			"<legend style='border:1px'>工作详细</legend>", 
			"<textarea rows='5' readonly style='width:100%' name='job_notes'  onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'>".$tb_jobs_arr['job_notes']."</textarea>",
		"</fieldset>";
		return array($tb_jobs_arr['analysis_id'],$tb_jobs_arr['job_type'],$tb_jobs_arr['job_area']);
	}
	public function addJob(){//显示Id为LedgerId的工作记录
	echo "<fieldset>",
		"<legend style='border:1px'>添加工作</legend>",
			"<label>工作内容<input type='text'style='width:80%' name='job_content' size='90'></input></label>",
			"<br>";
					$area_option = array("table"=>"tb_area","key"=>"area_system","value"=>0,"option_id"=>"area_id","option_value"=>"area_content");
					$area_json = json_encode($area_option);
			echo "<label>系统",
				"<select name='job_system' style='width:15%' id='sys' class='selectfont'onchange=check(this.options[options.selectedIndex].value,'area',$area_json)>",
					"<option selected='selected' disabled='disabled' style='display: none' value=''></option>";
						$tb_system_sql = "SELECT * FROM `tb_system` WHERE 1";
						$tb_system_result = mysqli_query($this->conn, $tb_system_sql);
						while($tb_system_arr=mysqli_fetch_assoc($tb_system_result)){
                                        		echo "<option value=".$tb_system_arr['system_id'].">".$tb_system_arr['system_content']."</option>";
									}
				echo "</select>",
			"</label>",
			"<label>负责人",
				"<select name='job_header' style='width:15%' class='selectfont'>",
					"<option selected='selected' disabled='disabled' style='display: none' value=''></option>";
						$tb_user_sql = "SELECT * FROM `tb_user` WHERE 1";
						$tb_user_result = mysqli_query($this->conn, $tb_user_sql);
						while($tb_user_arr=mysqli_fetch_assoc($tb_user_result)){
                                        		echo "<option value=".$tb_user_arr['user_id'].">".$tb_user_arr['user_name']."</option>";
									}
                                echo "</select>",
			"</label>",
			"<label>工作类型",
				"<select name='job_type' style='width:15%' class='selectfont'>",
					"<option selected='selected' disabled='disabled' style='display: none' value=''></option>";
						$tb_job_type_sql = "SELECT * FROM `tb_job_type` WHERE 1";
						$tb_job_type_result = mysqli_query($this->conn, $tb_job_type_sql);
						while($tb_job_type_arr=mysqli_fetch_assoc($tb_job_type_result)){
                                        		echo "<option value=".$tb_job_type_arr['job_type_id'].">".$tb_job_type_arr['job_type_name']."</option>";
						}
                                     echo "</select>",
			"</label>",
			"<label>工作成员<input type='text' style='width:15%' name='job_people' size='10' value=''></input></label>",
			"<br>",
			"<label>区域",
				"<select name='job_area' style='width:15%'id='area'  class='selectfont'>",
					"<option value='-1'>--请选择--</option>",
				"</select>",
			"</label>",
			"<label>工作日期",
				"<select name='diary_id' style='width:15%' class='selectfont'>",
					"<option selected='selected' disabled='disabled'  style='display: none' value=''></option>";
					$tb_diary_sql = "SELECT * FROM `tb_diary` WHERE 1 order by diary_id desc limit 0,90";
					$tb_diary_result = mysqli_query($this->conn, $tb_diary_sql);
					while($tb_diary_arr=mysqli_fetch_assoc($tb_diary_result)){
						echo "<option value=".$tb_diary_arr['diary_id'].">".$tb_diary_arr['createtime']."</option>";
					}
				echo "</select>",
			"</label>",
			"<label>工作进度",
				"<select name='job_status' style='width:15%' class='selectfont'>";
		$tb_job_status_sql = "SELECT * FROM `tb_job_status` WHERE 1";
		$tb_job_status_result = mysqli_query($this->conn, $tb_job_status_sql);
		while($tb_job_status_arr=mysqli_fetch_assoc($tb_job_status_result)){
                                        echo "<option value=".$tb_job_status_arr['job_status_id'].">".$tb_job_status_arr['job_status_content']."</option>";
		}
                                  echo "</select>",
			"</label>",
			"<label>完成日期 <input type='text' id='calendar1' style='width:15%' class='calendarFocus' name='job_deadtime' placeholder='格式：2022-11-11'></input></label>",
			"<br>",
			"<label>备注<input type='text' style='width:80%'name='job_remarks' size='90'></input></label>",
						"</fieldset>";
	}
	public function addStandardJob(){//增加标准工作表单
		echo "<fieldset>",
			"<legend style='border:1px'>添加工作</legend>",
				"<label>工作内容<input type='text' style='width:80%' name='job_content' size='90'></input></label>",
				"<br>",
				"<label>工作项目";
				$standard_option = array("table"=>"tb_standard_jobs","key"=>"standard_job_type","value"=>0,"option_id"=>"standard_job_id","option_value"=>"standard_job_content");
				$standard_json = json_encode($standard_option);
				echo "<select name='job_type' style='width:20%'  class='selectfont'onchange=check(this.options[options.selectedIndex].value,'standard_job_content',$standard_json)>";
					echo "<option selected='selected' disabled='disabled' style='display: none' value=''></option>";
					$tb_standard_job_sql = "SELECT * FROM `tb_standard_job_type` WHERE 1";
					$tb_standard_job_result = mysqli_query($this->conn, $tb_standard_job_sql);
					while($tb_standard_job_arr=mysqli_fetch_assoc($tb_standard_job_result)){
                                        	echo "<option value=".$tb_standard_job_arr['standard_job_type_id'].">".$tb_standard_job_arr['standard_job_type_name']."</option>";
					}
                       		echo "</select>",
				"</label>",
					"<select id='standard_job_content' style='width:50%'name='analysis_id' class='selectfont'>",
						"<option value='-1'>--请选择--</option>",
                                        "</select>",
				"<br>",
				"<label>系统";
					$area_option = array("table"=>"tb_area","key"=>"area_system","value"=>0,"option_id"=>"area_id","option_value"=>"area_content");
					$area_json = json_encode($area_option);
					echo "<select name='job_system' style='width:15%' id='sys' class='selectfont'onchange=check(this.options[options.selectedIndex].value,'area',$area_json)>";
						echo "<option selected='selected' disabled='disabled' style='display: none' value=''></option>";
						$tb_system_sql = "SELECT * FROM `tb_system` WHERE 1";
						$tb_system_result = mysqli_query($this->conn, $tb_system_sql);
						while($tb_system_arr=mysqli_fetch_assoc($tb_system_result)){
                                        		echo "<option value=".$tb_system_arr['system_id'].">".$tb_system_arr['system_content']."</option>";
						}
					echo "</select>",
				"</label>",
				"<label>负责人",
					"<select name='job_header' style='width:15%' class='selectfont'>",
						"<option selected='selected' disabled='disabled'  style='display: none' value=''></option>",
						$tb_user_sql = "SELECT * FROM `tb_user` WHERE 1";
						$tb_user_result = mysqli_query($this->conn, $tb_user_sql);
						while($tb_user_arr=mysqli_fetch_assoc($tb_user_result)){
                                        		echo "<option value=".$tb_user_arr['user_id'].">".$tb_user_arr['user_name']."</option>";
						}
                                       	echo "</select>",
				"</label>",
				"<label>工作成员<input type='text' style='width:15%' name='job_people' size='10' value=''></input></label>",
				"<br>",
				"<label>区域",
					"<select name='job_area' style='width:15%' id='area' class='selectfont'>",
						"<option value='-1'>--请选择--</option>",
					"</select>",
				"</label>",
				"<label>工作日期",
					"<select name='diary_id' style='width:15%' class='selectfont'>",
						"<option selected='selected' disabled='disabled' style='display: none' value=''></option>";
						$tb_diary_sql = "SELECT * FROM `tb_diary` WHERE 1 order by diary_id desc limit 0,90";
						$tb_diary_result = mysqli_query($this->conn, $tb_diary_sql);
						while($tb_diary_arr=mysqli_fetch_assoc($tb_diary_result)){
                                        					echo "<option value=".$tb_diary_arr['diary_id'].">".$tb_diary_arr['createtime']."</option>";
						}
                                        			echo "</select>",
							"</label>",
							"<label>工作进度",
								"<select name='job_status' style='width:15%' class='selectfont'>";
		$tb_job_status_sql = "SELECT * FROM `tb_job_status` WHERE 1";
		$tb_job_status_result = mysqli_query($this->conn, $tb_job_status_sql);
		while($tb_job_status_arr=mysqli_fetch_assoc($tb_job_status_result)){
                                        echo "<option value=".$tb_job_status_arr['job_status_id'].">".$tb_job_status_arr['job_status_content']."</option>";
		}
                                        			echo "</select>",
							"</label>",
			"<label>完成日期 <input type='text' id='calendar1' style='width:15%' class='calendarFocus' name='job_deadtime' placeholder='格式：2022-11-11'></input></label>",
							"<br>",
							"<label>备注<input type='text' style='width:80%'name='job_remarks' size='90'></input></label>",
							"</fieldset>";
	}
	public function reportSelect($quick,$type){//显示不同状态下的缺陷：quick=10:本周time，quick=20:所有日期，quick=30:下周，quick=40：本周id，quick=50：本月time,quick=60：本月id,quick=70：下月,type=0：预定的几种工作
		if ($quick==10){//下周：本周六到下周五
	if(date("w")==1){
			$first_day = strtotime("monday");
	}else{
			$first_day = strtotime("last monday");
		}
			$first_time = date("Y-m-d",$first_day);
			$begain=strtotime($first_time." - 2 day");
			$begain_time=date("Y-m-d",$begain);
			$end=strtotime($begain_time." + 6 day");
			$end_time=date("Y-m-d", $end);
			$this->tableHead = array("job_id"=>"编号","job_content"=>"内容","job_header_name"=>"负责人","job_deadtime"=>"完成日期","job_status"=>"状态","management"=>"管理","path"=>"./","action"=>"content");
			$this->sql = "SELECT tb_jobs.job_id,tb_jobs.job_content,(SELECT tb_user.user_name FROM tb_user WHERE tb_user.user_id=tb_jobs.job_header)AS job_header_name,job_deadtime,(SELECT tb_job_status.job_status_content FROM tb_job_status WHERE tb_job_status.job_status_id=tb_jobs.job_status)AS job_status FROM tb_jobs WHERE job_status != 3 AND ";
			$this->selectinfo['quick'] = "job_deadtime";
			$str1="(".$this->selectinfo['quick']." BETWEEN \"";
			$str1.= $begain_time;
			$str1.="\" AND \"";
			$str1.= $end_time;
			if($type){
				$str1.= "\") AND job_type = ";
				$str1.= $type;
			}else{
				/*******************************计划工作，重点工作，现场设备环保设备控制系统一场***************************/
				$str1.= "\") AND (job_type !=2) ";
			}
		}
		if ($quick==30){//下周：本周六到下周五
	if(date("w")==1){
			$first_day = strtotime("monday");
	}else{
			$first_day = strtotime("last monday");
		}
			$first_time = date("Y-m-d",$first_day);
			$begain=strtotime($first_time." + 5 day");
			$begain_time=date("Y-m-d",$begain);
			$end=strtotime($begain_time." + 6 day");
			$end_time=date("Y-m-d", $end);
			$this->tableHead = array("job_id"=>"编号","job_content"=>"内容","job_header_name"=>"负责人","job_deadtime"=>"完成日期","job_status"=>"状态","management"=>"管理","path"=>"./","action"=>"content");
			$this->sql = "SELECT tb_jobs.job_id,tb_jobs.job_content,(SELECT tb_user.user_name FROM tb_user WHERE tb_user.user_id=tb_jobs.job_header)AS job_header_name,job_deadtime,(SELECT tb_job_status.job_status_content FROM tb_job_status WHERE tb_job_status.job_status_id=tb_jobs.job_status)AS job_status FROM tb_jobs WHERE ";
			$this->selectinfo['quick'] = "job_deadtime";
			$str1="(".$this->selectinfo['quick']." BETWEEN \"";
			$str1.= $begain_time;
			$str1.="\" AND \"";
			$str1.= $end_time;
			if($type){
				$str1.= "\") AND job_type = ";
				$str1.= $type;
			}else{
				/*******************************计划工作，重点工作，现场设备环保设备控制系统一场***************************/
				$str1.= "\") AND (job_type =3 OR job_type =4 OR job_type=6 OR job_type=7 OR job_type=8 OR job_type=21) ";
			}
		}
		if ($quick==40){//本周：上周六至本周五
	if(date("w")==1){
			$first_day = strtotime("monday");
	}else{
			$first_day = strtotime("last monday");
		}
			$first_time = date("Y-m-d",$first_day);
			$begain=strtotime($first_time." - 2 day");
			$begain_time=date("Y-m-d",$begain);
			$end=strtotime($first_time." + 4 day");
			$end_time=date("Y-m-d", $end);
			if($end_time>date("Y-m-d")){
				$end_time=date("Y-m-d");
			}
			$sql = "SELECT * FROM `tb_diary` WHERE createtime='".$begain_time."'";
	$result = mysqli_query($this->conn, $sql);
	$diary_arr=mysqli_fetch_assoc($result);
	$begain_id = $diary_arr['diary_id'];
	$sql = "SELECT * FROM `tb_diary` WHERE createtime='".$end_time."'";
	$result = mysqli_query($this->conn, $sql);
	$diary_arr=mysqli_fetch_assoc($result);
	$end_id = $diary_arr['diary_id'];
		$this->tableHead = array("job_id"=>"编号","job_content"=>"内容","job_header_name"=>"负责人","jobs_diary_id"=>"更新日期","job_status"=>"状态","management"=>"管理","path"=>"./","action"=>"content");
		$this->sql = "SELECT tb_jobs.job_id,tb_jobs.job_content,(SELECT tb_user.user_name FROM tb_user WHERE tb_user.user_id=tb_jobs.job_header)AS job_header_name,(SELECT tb_job_status.job_status_content FROM tb_job_status WHERE tb_job_status.job_status_id=tb_jobs.job_status)AS job_status,(SELECT tb_diary.createtime FROM tb_diary WHERE tb_diary.diary_id=tb_jobs.diary_id)AS jobs_diary_id FROM tb_jobs WHERE ";
		$this->selectinfo['quick'] = "diary_id";
		$str1="(".$this->selectinfo['quick']." BETWEEN \"";
		$str1.= $begain_id;
		$str1.="\" AND \"";
		$str1.= $end_id;
		if($type){
		$str1.= "\") AND job_type = ";
		$str1.= $type;
		}else{
		/*******************************计划工作，重点工作，现场设备环保设备控制系统一场***************************/
		$str1.= "\") AND (job_type =3 OR job_type =4 OR job_type=6 OR job_type=7 OR job_type=8 OR job_type=21) ";
		}
	}
		if ($quick==20){//所有时间
		$this->tableHead = array("job_id"=>"编号","job_content"=>"内容","job_header_name"=>"负责人","jobs_diary_id"=>"更新日期","job_remarks"=>"完成情况","management"=>"管理","path"=>"./","action"=>"content");
		$this->sql = "SELECT tb_jobs.job_id,tb_jobs.job_content,(SELECT tb_user.user_name FROM tb_user WHERE tb_user.user_id=tb_jobs.job_header)AS job_header_name,(SELECT tb_job_status.job_status_content FROM tb_job_status WHERE tb_job_status.job_status_id=tb_jobs.job_status)AS job_status,(SELECT tb_diary.createtime FROM tb_diary WHERE tb_diary.diary_id=tb_jobs.diary_id)AS jobs_diary_id,job_remarks FROM tb_jobs WHERE ";
		$str1="job_type =".$type;
		}
		if ($quick==50){//本月time
	$begain_time = date('Y-m-01');
	$end_time = date('Y-m-t');
			$this->tableHead = array("job_id"=>"编号","job_content"=>"内容","job_header_name"=>"负责人","job_deadtime"=>"完成日期","job_status"=>"状态","management"=>"管理","path"=>"./","action"=>"content");
			$this->sql = "SELECT tb_jobs.job_id,tb_jobs.job_content,(SELECT tb_user.user_name FROM tb_user WHERE tb_user.user_id=tb_jobs.job_header)AS job_header_name,job_deadtime,(SELECT tb_job_status.job_status_content FROM tb_job_status WHERE tb_job_status.job_status_id=tb_jobs.job_status)AS job_status FROM tb_jobs WHERE job_status != 3 AND ";
			$this->selectinfo['quick'] = "job_deadtime";
			$str1="(".$this->selectinfo['quick']." BETWEEN \"";
			$str1.= $begain_time;
			$str1.="\" AND \"";
			$str1.= $end_time;
			if($type){
				$str1.= "\") AND job_type = ";
				$str1.= $type;
			}else{
				/*******************************计划工作，重点工作，现场设备环保设备控制系统一场***************************/
				$str1.= "\") AND (job_type !=2) ";
			}
		}
		if ($quick==60){//本周：上周六至本周五
	$begain_time = date('Y-m-01');
	$end_time = date('Y-m-t');
			if($end_time>date("Y-m-d")){
				$end_time=date("Y-m-d");
			}
			$sql = "SELECT * FROM `tb_diary` WHERE createtime='".$begain_time."'";
	$result = mysqli_query($this->conn, $sql);
	$diary_arr=mysqli_fetch_assoc($result);
	$begain_id = $diary_arr['diary_id'];
	$sql = "SELECT * FROM `tb_diary` WHERE createtime='".$end_time."'";
	$result = mysqli_query($this->conn, $sql);
	$diary_arr=mysqli_fetch_assoc($result);
	$end_id = $diary_arr['diary_id'];
		$this->tableHead = array("job_id"=>"编号","job_content"=>"内容","job_header_name"=>"负责人","jobs_diary_id"=>"更新日期","job_status"=>"状态","management"=>"管理","path"=>"./","action"=>"content");
		$this->sql = "SELECT tb_jobs.job_id,tb_jobs.job_content,(SELECT tb_user.user_name FROM tb_user WHERE tb_user.user_id=tb_jobs.job_header)AS job_header_name,(SELECT tb_job_status.job_status_content FROM tb_job_status WHERE tb_job_status.job_status_id=tb_jobs.job_status)AS job_status,(SELECT tb_diary.createtime FROM tb_diary WHERE tb_diary.diary_id=tb_jobs.diary_id)AS jobs_diary_id FROM tb_jobs WHERE ";
		$this->selectinfo['quick'] = "diary_id";
		$str1="(".$this->selectinfo['quick']." BETWEEN \"";
		$str1.= $begain_id;
		$str1.="\" AND \"";
		$str1.= $end_id;
		if($type){
		$str1.= "\") AND job_type = ";
		$str1.= $type;
		}else{
		/*******************************计划工作，重点工作，现场设备环保设备控制系统一场***************************/
		$str1.= "\") AND (job_type =3 OR job_type =4 OR job_type=6 OR job_type=7 OR job_type=8 OR job_type=21) ";
		}
	}
		if ($quick==70){//下周：本周六到下周五
			//$begain=strtotime(" + 1 Months");
			$firstday = date("Y-m-01");
			//$begain = date("Y-m-d",strtotime("$firstday +1 month"));
			$begain = strtotime("$firstday +1 month");
			//$begain=strtotime(" + 1 month",time());
			$begain_time=date("Y-m-01",$begain);
			$end_time=date("Y-m-t", $begain);
			$this->tableHead = array("job_id"=>"编号","job_content"=>"内容","job_header_name"=>"负责人","job_deadtime"=>"完成日期","job_status"=>"状态","management"=>"管理","path"=>"./","action"=>"content");
			$this->sql = "SELECT tb_jobs.job_id,tb_jobs.job_content,(SELECT tb_user.user_name FROM tb_user WHERE tb_user.user_id=tb_jobs.job_header)AS job_header_name,job_deadtime,(SELECT tb_job_status.job_status_content FROM tb_job_status WHERE tb_job_status.job_status_id=tb_jobs.job_status)AS job_status FROM tb_jobs WHERE ";
			$this->selectinfo['quick'] = "job_deadtime";
			$str1="(".$this->selectinfo['quick']." BETWEEN \"";
			$str1.= $begain_time;
			$str1.="\" AND \"";
			$str1.= $end_time;
			if($type){
				$str1.= "\") AND job_type = ";
				$str1.= $type;
			}else{
				/*******************************计划工作，重点工作，现场设备环保设备控制系统一场***************************/
				$str1.= "\") AND (job_type =3 OR job_type =4 OR job_type=6 OR job_type=7 OR job_type=8 OR job_type=21) ";
			}
		}
		$count_sql=$this->count_sql.$str1;
        	$re = mysqli_query($this->conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$num = $result[0];
		$this->num=$num;
		$sql = $this->sql.$str1.' order by '.$this->selectinfo['id'].' desc';
	//echo $sql;
		$result = mysqli_query($this->conn, $sql);
		$this->result=$result;
		$this->tbodyId = "quicktbodyId";
		$this->sqlId = "quicksqlId";
		$this->showTable();
		}

}
