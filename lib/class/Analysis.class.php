<?php
					include_once("Table.class.php");
class Analysis extends dkTable{
	function __construct(){
		$this->conn = mysqli_connect(parent::host,parent::username,parent::password,parent::database);
		if(!$this->conn){
			die("数据库连接失败". mysqli_connect_error());
		}else { 
	//	echo"连接成功";
		}
		mysqli_query('set names utf8');
		$this->pagesize=10;
		$this->pageFunction = AnalysisPage;
		$this->tableHead = array("analysis_id"=>"编号","analysis_content"=>"内容","analysis_header"=>"工作负责人","analysis_status"=>"状态","management"=>"管理","path"=>"./","action"=>"content");
		$this->selectinfo = array("table"=>"tb_analysis","id"=>"analysis_id","caption"=>"分析报告","status"=>"analysis_status","quick"=>"defect_find_time");
		$this->keyinfo = array("number"=>"analysis_process","content"=>"analysis_content","remark"=>"analysis_remarks");
		$this->count_sql = "select count(*) from tb_analysis where ";
		$this->sql = "SELECT tb_analysis.analysis_id,tb_analysis.analysis_content,(SELECT tb_user.user_name FROM tb_user WHERE tb_analysis.analysis_header = tb_user.user_id)AS analysis_header,(SELECT tb_job_status.job_status_content FROM tb_job_status WHERE tb_analysis.analysis_status = tb_job_status.job_status_id)AS analysis_status FROM tb_analysis where ";
	}
	public function retrievalBox(){
		echo "<fieldset>",
			"<legend style='border:1px'>检索选择</legend>",
			"<label><input type='checkbox' name='select_checkbox[analysis_header]'value='select_analysis_header'></input>负责人</label>",
			"<select name='select_analysis_header' style='width:20%' class='selectfont'>",
				"<option selected='selected' disabled='disabled'style='display: none' value=''></option>";
					$tb_user_sql = "SELECT * FROM `tb_user` WHERE 1";
					$tb_user_result = mysqli_query($this->conn, $tb_user_sql);
					while($tb_user_arr=mysqli_fetch_assoc($tb_user_result)){
                                       		echo "<option value=".$tb_user_arr['user_id'].">".$tb_user_arr['user_name']."</option>";
					}
               		echo "</select>",
			"<label><input type='checkbox' name='select_checkbox[analysis_status]'value='select_analysis_status'></input>状态</label>",
			"<select name='select_analysis_status' style='width:20%' class='selectfont'>",
				"<option selected='selected' disabled='disabled'style='display: none' value=''></option>";
					$tb_user_sql = "SELECT * FROM `tb_job_status` WHERE 1";
					$tb_user_result = mysqli_query($this->conn, $tb_user_sql);
					while($tb_user_arr=mysqli_fetch_assoc($tb_user_result)){
                                     		echo "<option value=".$tb_user_arr['job_status_id'].">".$tb_user_arr['job_status_content']."</option>";
					}
               		echo "</select>";
			echo "<label><input type='checkbox' name='select_checkbox_key' value='select_key'>关键字</label><input type='text'style='width:20%' name='select_key' size='10'placeholder='内容/过程/备注'></input>",
		"<fieldset>";
	}
	public function lookAnalysis($id){//查看Id为id的分析报告表单
		$tb_analysis_sql = 'SELECT tb_analysis.analysis_id,tb_analysis.analysis_content,(SELECT tb_user.user_name FROM tb_user WHERE tb_analysis.analysis_header = tb_user.user_id)AS analysis_header,tb_analysis.analysis_process,tb_analysis.analysis_reason,tb_analysis.analysis_result,tb_analysis.analysis_remarks FROM tb_analysis WHERE analysis_id='.$id;
		$tb_analysis_result = mysqli_query($this->conn, $tb_analysis_sql);
		$tb_analysis_arr_buf=mysqli_fetch_assoc($tb_analysis_result);
		echo "<fieldset>",
			"<legend style='border:1px'>".$tb_analysis_arr_buf['analysis_id']."号缺陷分析</legend>",
			"<center><label><h3>".$tb_analysis_arr_buf['analysis_content']."</h3></label></center>",
			"<center><label>".$tb_analysis_arr_buf['analysis_header']."</label></center>",
			"<fieldset>",
				"<legend style='border:1px'>现象与处理过程</legend>",
				"<textarea style='width:100%' rows='7'readonly onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'>".$tb_analysis_arr_buf['analysis_process']."</textarea>",
			"</fieldset>",
			"<fieldset>",
				"<legend style='border:1px'>原因分析</legend>",
				"<textarea style='width:100%'rows='7'readonly onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'>".$tb_analysis_arr_buf['analysis_reason']."</textarea>",
			"</fieldset>",
			"<fieldset>",
				"<legend style='border:1px'>防范措施</legend>",
				"<textarea style='width:100%'rows='7'readonly onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'>".$tb_analysis_arr_buf['analysis_result']."</textarea>",
			"</fieldset>",
			"<fieldset>",
				"<legend style='border:1px'>备注</legend>",
				"<textarea style='width:100%'rows='7'readonly onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'>".$tb_analysis_arr_buf['analysis_remarks']."</textarea>",
			"</fieldset>",
		"</fieldset>";
	}
	public function editAnalysis($id){//编辑Id为id的分析报告表单
		$tb_analysis_sql = 'SELECT tb_analysis.analysis_id,tb_analysis.analysis_content,analysis_header,analysis_status,tb_analysis.analysis_process,tb_analysis.analysis_reason,tb_analysis.analysis_result,tb_analysis.analysis_remarks FROM tb_analysis WHERE analysis_id='.$id;
		$tb_analysis_result = mysqli_query($this->conn, $tb_analysis_sql);
		$tb_analysis_arr_buf=mysqli_fetch_assoc($tb_analysis_result);
		echo "<fieldset>",
			"<legend style='border:1px'>".$tb_analysis_arr_buf['analysis_id']."号缺陷分析</legend>",
			"<input type='hidden' name='analysis_id' size='3' value=".$tb_analysis_arr_buf['analysis_id']."></input>",
			"<label>标题<input type='text'style='width:70%' name='analysis_content' size='30' value=".$tb_analysis_arr_buf['analysis_content']."></input></label>",
			"<br>",
			"<label>负责人",
				"<select name='analysis_header' style='width:15%' class='selectfont'>",
					"<option selected='selected' disabled='disabled' style='display: none' value=''></option>",
					$tb_user_sql = "SELECT * FROM `tb_user` WHERE 1";
					$tb_user_result = mysqli_query($this->conn, $tb_user_sql);
					while($tb_user_arr=mysqli_fetch_assoc($tb_user_result)){
						if($tb_user_arr['user_id']==$tb_analysis_arr_buf['analysis_header']){
                                       			echo "<option value=".$tb_user_arr['user_id']." selected='selected'>".$tb_user_arr['user_name']."</option>";
						}else{
                                       			echo "<option value=".$tb_user_arr['user_id'].">".$tb_user_arr['user_name']."</option>";
						}
					}
                            	echo "</select>",
			"</label>",
			"<label>状态",
				"<select name='analysis_status' style='width:15%' class='selectfont'>",
					"<option selected='selected' disabled='disabled' style='display: none' value=''></option>",
					$tb_user_sql = "SELECT * FROM `tb_job_status` WHERE 1";
					$tb_user_result = mysqli_query($this->conn, $tb_user_sql);
					while($tb_user_arr=mysqli_fetch_assoc($tb_user_result)){
						if($tb_user_arr['job_status_id']==$tb_analysis_arr_buf['analysis_status']){
                                       			echo "<option value=".$tb_user_arr['job_status_id']." selected='selected'>".$tb_user_arr['job_status_content']."</option>";
						}else{
                                       			echo "<option value=".$tb_user_arr['job_status_id'].">".$tb_user_arr['job_status_content']."</option>";
						}
					}
                            	echo "</select>",
			"</label>",
			"<fieldset>",
				"<legend style='border:1px'>现象与处理过程</legend>",
				"<textarea rows='7' name='analysis_process'style='width:100%'>".$tb_analysis_arr_buf['analysis_process']."</textarea>",
			"</fieldset>",
			"<fieldset>",
				"<legend style='border:1px'>原因分析</legend>",
				"<textarea rows='7' name='analysis_reason'style='width:100%'>".$tb_analysis_arr_buf['analysis_reason']."</textarea>",
			"</fieldset>",
			"<fieldset>",
				"<legend style='border:1px'>防范措施</legend>",
				"<textarea rows='7' name='analysis_result'style='width:100%'>".$tb_analysis_arr_buf['analysis_result']."</textarea>",
			"</fieldset>",
			"<fieldset>",
				"<legend style='border:1px'>备注</legend>",
				"<textarea rows='7' name='analysis_remarks'style='width:100%'>".$tb_analysis_arr_buf['analysis_remarks']."</textarea>",
			"</fieldset>",
		"</fieldset>";
	}
	public function addAnalysis(){//编辑Id为id的分析报告表单
		echo "<fieldset>",
			"<legend style='border:1px'>新增分析报告</legend>",
			"<input type='hidden' name='analysis_id' size='3' value=".$tb_analysis_arr_buf['analysis_id']."></input>",
			"<label>标题<input type='text'style='width:70%' name='analysis_content' size='30' value=".$tb_analysis_arr_buf['analysis_content']."></input></label>",
			"<br>",
			"<label>负责人",
				"<select name='analysis_header' style='width:15%' class='selectfont'>",
					"<option selected='selected' disabled='disabled' style='display: none' value=''></option>",
					$tb_user_sql = "SELECT * FROM `tb_user` WHERE 1";
					$tb_user_result = mysqli_query($this->conn, $tb_user_sql);
					while($tb_user_arr=mysqli_fetch_assoc($tb_user_result)){
						if($tb_user_arr['user_id']==$tb_analysis_arr_buf['analysis_header']){
                                       			echo "<option value=".$tb_user_arr['user_id']." selected='selected'>".$tb_user_arr['user_name']."</option>";
						}else{
                                       			echo "<option value=".$tb_user_arr['user_id'].">".$tb_user_arr['user_name']."</option>";
						}
					}
                            	echo "</select>",
			"</label>",
			"<label>状态",
				"<select name='analysis_status' style='width:15%' class='selectfont'>",
					"<option selected='selected' disabled='disabled' style='display: none' value=''></option>",
					$tb_user_sql = "SELECT * FROM `tb_job_status` WHERE 1";
					$tb_user_result = mysqli_query($this->conn, $tb_user_sql);
					while($tb_user_arr=mysqli_fetch_assoc($tb_user_result)){
						if($tb_user_arr['job_status_id']==$tb_analysis_arr_buf['analysis_status']){
                                       			echo "<option value=".$tb_user_arr['job_status_id']." selected='selected'>".$tb_user_arr['job_status_content']."</option>";
						}else{
                                       			echo "<option value=".$tb_user_arr['job_status_id'].">".$tb_user_arr['job_status_content']."</option>";
						}
					}
                            	echo "</select>",
			"</label>",
			"<fieldset>",
				"<legend style='border:1px'>现象与处理过程</legend>",
				"<textarea rows='7' name='analysis_process'style='width:100%'>".$tb_analysis_arr_buf['analysis_process']."</textarea>",
			"</fieldset>",
			"<fieldset>",
				"<legend style='border:1px'>原因分析</legend>",
				"<textarea rows='7' name='analysis_reason'style='width:100%'>".$tb_analysis_arr_buf['analysis_reason']."</textarea>",
			"</fieldset>",
			"<fieldset>",
				"<legend style='border:1px'>防范措施</legend>",
				"<textarea rows='7' name='analysis_result'style='width:100%'>".$tb_analysis_arr_buf['analysis_result']."</textarea>",
			"</fieldset>",
			"<fieldset>",
				"<legend style='border:1px'>备注</legend>",
				"<textarea rows='7' name='analysis_remarks'style='width:100%'>".$tb_analysis_arr_buf['analysis_remarks']."</textarea>",
			"</fieldset>",
		"</fieldset>";
	}
	public function reportAnalysis($flag){//查看Id为id的分析报告表单
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
			//echo $sql;
	$result = mysqli_query($this->conn, $sql);
	$diary_arr=mysqli_fetch_assoc($result);
	$begain_id = $diary_arr['diary_id'];
	$sql = "SELECT * FROM `tb_diary` WHERE createtime='".$end_time."'";
	$result = mysqli_query($this->conn, $sql);
	$diary_arr=mysqli_fetch_assoc($result);
	$end_id = $diary_arr['diary_id'];
		$tb_analysis_sql = 'SELECT tb_analysis.analysis_id,tb_analysis.analysis_content,(SELECT tb_user.user_name FROM tb_user WHERE tb_analysis.analysis_header = tb_user.user_id)AS analysis_header,tb_analysis.analysis_process,tb_analysis.analysis_reason,tb_analysis.analysis_result,tb_analysis.analysis_remarks FROM tb_analysis WHERE diary_id between '.$begain_id.' and '.$end_id;
	//echo $tb_analysis_sql;
		$tb_analysis_result = mysqli_query($this->conn, $tb_analysis_sql);
		while($tb_analysis_arr_buf=mysqli_fetch_assoc($tb_analysis_result)){
		echo "<fieldset>",
			"<legend style='border:1px'>".$tb_analysis_arr_buf['analysis_id']."号缺陷分析</legend>",
			"<center><label><h3>".$tb_analysis_arr_buf['analysis_content']."</h3></label></center>",
			"<center><label>".$tb_analysis_arr_buf['analysis_header']."</label></center>",
			"<fieldset>",
				"<legend style='border:1px'>现象与处理过程</legend>",
				"<textarea style='width:100%' rows='7'readonly onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'>".$tb_analysis_arr_buf['analysis_process']."</textarea>",
			"</fieldset>",
			"<fieldset>",
				"<legend style='border:1px'>原因分析</legend>",
				"<textarea style='width:100%'rows='7'readonly onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'>".$tb_analysis_arr_buf['analysis_reason']."</textarea>",
			"</fieldset>",
			"<fieldset>",
				"<legend style='border:1px'>防范措施</legend>",
				"<textarea style='width:100%'rows='7'readonly onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'>".$tb_analysis_arr_buf['analysis_result']."</textarea>",
			"</fieldset>",
			"<fieldset>",
				"<legend style='border:1px'>备注</legend>",
				"<textarea style='width:100%'rows='7'readonly onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'>".$tb_analysis_arr_buf['analysis_remarks']."</textarea>",
			"</fieldset>",
		"</fieldset>";
	}
	}
}
