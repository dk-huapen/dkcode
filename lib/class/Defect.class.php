<?php
					include_once("Table.class.php");
class Defect extends dkTable{
	function __construct(){
		$this->conn = mysqli_connect(parent::host,parent::username,parent::password,parent::database);
		if(!$this->conn){
			die("数据库连接失败". mysqli_connect_error());
		}else { 
	//	echo"连接成功";
		}
		mysqli_query('set names utf8');
		$this->pagesize=10;
		$this->pageFunction = defectPage;
		$this->tableHead = array("defect_id"=>"编号","defect_specialty"=>"等级","defect_cotent"=>"缺陷内容","defect_find_time"=>"发现时间","defect_result"=>"结果","defect_clear_time"=>"消缺时间","defect_clear_people"=>"消缺人","defect_check_people"=>"验收人","management"=>"管理","path"=>"./","action"=>"content");
		$this->selectinfo = array("table"=>"tb_defect","id"=>"defect_id","caption"=>"缺陷列表","status"=>"defect_result","quick"=>"defect_find_time");
		$this->keyinfo = array("number"=>"defect_id","content"=>"defect_cotent","remark"=>"defect_remarks");
		$this->sql = "SELECT tb_defect.analysis_id,tb_defect.defect_id,tb_defect.defect_specialty,tb_defect.defect_cotent,tb_defect.defect_find_time,(SELECT tb_defect_status.defect_status_name FROM tb_defect_status WHERE tb_defect.defect_result = tb_defect_status.defect_status_id)AS defect_result,tb_defect.defect_clear_time,(SELECT tb_user.user_name FROM tb_user WHERE tb_defect.defect_clear_people = tb_user.user_id)AS defect_clear_people,tb_defect.defect_check_people FROM tb_defect WHERE ";
		$this->count_sql = 'select count(*) from tb_defect WHERE ';
	}
	public function retrievalBox(){//显示缺陷的检索栏
	echo "<fieldset>",
		"<legend style='border:1px'>检索选择</legend>",
		"<label><input type='checkbox' name='select_checkbox[defect_system]'value='select_defect_system'>所属系统</label>",
		"<select name='select_defect_system'style='width:20%' class='selectfont'>",
		"<option value='0'>--请选择--</option>";
//从tb_user数据库中取出所有用户信息,添加工作负责人下拉列表
		$tb_defect_system_sql = "SELECT * FROM `tb_system` WHERE 1";
		$tb_defect_system_result = mysqli_query($this->conn, $tb_defect_system_sql);
		while($tb_defect_system_arr=mysqli_fetch_assoc($tb_defect_system_result)){
                echo "<option value=".$tb_defect_system_arr['system_id'].">".$tb_defect_system_arr['system_content']."</option>";
		}
                echo "</select>",
		"<label><input type='checkbox' name='select_checkbox[defect_type]'value='select_defect_type'>缺陷类别</label>",
			"<select name='select_defect_type'style='width:20%' class='selectfont'>",
			"<option value='0'>--请选择--</option>";
//从tb_user数据库中取出所有用户信息,添加工作负责人下拉列表
		$tb_defect_type_sql = "SELECT * FROM `tb_defect_type` WHERE 1";
		$tb_defect_type_result = mysqli_query($this->conn, $tb_defect_type_sql);
		while($tb_defect_type_arr=mysqli_fetch_assoc($tb_defect_type_result)){
                echo "<option value=".$tb_defect_type_arr['defect_type_id'].">".$tb_defect_type_arr['defect_type_name']."</option>";
		}
                echo "</select>",
		"<label><input type='checkbox' name='select_checkbox[defect_clear_people]'value='select_defect_clear_people'/>消缺人</label>",
		"<select name='select_defect_clear_people'style='width:20%' class='selectfont'>",
		"<option selected='selected' disabled='disabled'style='display:none' value=''></option>";
//从tb_user数据库中取出所有用户信息,添加工作负责人下拉列表
		$tb_user_sql = "SELECT * FROM `tb_user` WHERE 1";
		$tb_user_result = mysqli_query($this->conn, $tb_user_sql);
		while($tb_user_arr=mysqli_fetch_assoc($tb_user_result)){
			echo "<option value=".$tb_user_arr['user_id'].">".$tb_user_arr['user_name']."</option>";
		}
                echo "</select>",
		"<br>",
		"<label><input type='checkbox' name='select_checkbox[defect_result]' value='select_defect_result'>处理结果</label>",
		"<select name='select_defect_result'style='width:20%' class='selectfont'>",
		"<option selected='selected' disabled='disabled'  style='display: none' value=''></option>";
//从tb_user数据库中取出所有用户信息,添加工作负责人下拉列表
		$tb_defect_status_sql = "SELECT * FROM `tb_defect_status` WHERE 1";
		$tb_defect_status_result = mysqli_query($this->conn, $tb_defect_status_sql);
		while($tb_defect_status_arr=mysqli_fetch_assoc($tb_defect_status_result)){
                echo "<option value=".$tb_defect_status_arr['defect_status_id'].">".$tb_defect_status_arr['defect_status_name']."</option>";
		}
                echo "</select>",
		"<label><input type='checkbox' name='select_checkbox[analysis_id]'value='select_analysis_id'/>缺陷分析</label>",
		"<select name='select_analysis_id'style='width:20%' class='selectfont'>",
		"<option value='0'>--请选择--</option>",
//从tb_user数据库中取出所有用户信息,添加工作负责人下拉列表
		$tb_defect_type_sql = "SELECT * FROM `tb_analysis` WHERE 1";
		$tb_defect_type_result = mysqli_query($this->conn, $tb_defect_type_sql);
		while($tb_defect_type_arr=mysqli_fetch_assoc($tb_defect_type_result)){
                echo "<option value=".$tb_defect_type_arr['analysis_id'].">".$tb_defect_type_arr['analysis_id']."</option>";
		}
                echo "</select>",
		"<label><input type='checkbox' name='select_checkbox_key' value='select_key'>关键字</label><input type='text'style='width:20%' name='select_key' size='10'/>",
		"<br>",
                 "<input type='submit'style='width:100%' value='搜索'/>",
	"</fieldset>";
	}
	public function addDefect($defectId){//生成新增缺陷表单
	echo "<fieldset>",
	"<legend style='border:1px'>新增缺陷基本信息</legend>",
	"<label>缺陷编号<input type='text'style='width:8%' name='defect_id' size='10' value=''/></label>",
	"<label>缺陷内容<input type='text'style='width:45%' name='defect_cotent' size='30' value=''/></label>",
	"<label>发现人<input type='text'style='width:12%' name='defect_people_find' size='8' value=''/></label>",
	"<br>",
	"<label>缺陷等级<input type='text'style='width:8%' name='defect_specialty' size='10' value='3'/></label>",
	"<label>发现时间<input type='text'style='width:25%' name='defect_find_time' size='16' value=''/></label>",
	"<label>确认人<input type='text'style='width:12%' name='defect_people_act' size='8' value=''/></label>",
	"<label>验收人<input type='text'style='width:12%' name='defect_check_people' size='5' value=''/></label>",
	"</fieldset>",
	"<fieldset>",
	"<legend style='border:1px'>新增缺陷基本信息</legend>";
					$area_option = array("table"=>"tb_area","key"=>"area_system","value"=>0,"option_id"=>"area_id","option_value"=>"area_content");
					$area_json = json_encode($area_option);
	echo "<label>所属系统",
		"<select name='defect_system' style='width:20%'class='selectfont'onchange=check(this.options[options.selectedIndex].value,'area',$area_json)>",
		"<option value='0'>--请选择--</option>";
//从tb_user数据库中取出所有用户信息,添加工作负责人下拉列表
		$tb_defect_system_sql = "SELECT * FROM `tb_system` WHERE 1";
		$tb_defect_system_result = mysqli_query($this->conn, $tb_defect_system_sql);
		while($tb_defect_system_arr=mysqli_fetch_assoc($tb_defect_system_result)){
                echo "<option value=".$tb_defect_system_arr['system_id'].">".$tb_defect_system_arr['system_content']."</option>";
		}
                echo "</select>",
	"</label>",
	"<label>工作区域",
		"<select id='area'name='defect_area'style='width:20%' class='selectfont'>",
			"<option value='-1'>--请选择--</option>",
            	"</select>",
	"</label>",
	 "<textarea rows='7' name='defect_remarks'style='width:100%'>".$tb_defect_arr['defect_remarks']."现象：&#10&#10处理过程：&#10&#10处理结果:&#10&#10</textarea>",
	"<br>",
	"</fieldset>";
	}
	public function lookDefect($defectId){//生成编辑缺陷表单
		$tb_defect_sql = 'SELECT * FROM tb_defect WHERE defect_id='.$defectId;
		$tb_defect_result = mysqli_query($this->conn, $tb_defect_sql);
		$tb_defect_arr=mysqli_fetch_assoc($tb_defect_result);
		echo "<fieldset>";
		echo "<legend style='border:1px'>".$tb_account_arr['account_id']."号缺陷基本信息 </legend>";
		echo "<label>缺陷编号<input type='text'readonly style='width:8%' size='10' value='".$tb_defect_arr['defect_id']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>";
		echo "<label>缺陷内容<input type='text' readonly style='width:45%'size='30'value='".$tb_defect_arr['defect_cotent']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>";
		echo "<label>发现人<input type='text' readonly style='width:12%' size='8' value='".$tb_defect_arr['defect_people_find']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>";
		echo "<br>";
		echo "<label>缺陷等级<input type='text' readonly style='width:8%' size='10' value='".$tb_defect_arr['defect_specialty']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>";
		echo "<label>发现时间<input type='text' readonly style='width:25%' size='16' value='".$tb_defect_arr['defect_find_time']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>";
		echo "<label>确认人<input type='text' readonly style='width:12%' size='8' value='".$tb_defect_arr['defect_people_act']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>";
		echo "<label>验收人<input type='text' readonly style='width:12%' size='5' value='".$tb_defect_arr['defect_check_people']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>";
		echo "</fieldset>";
		echo "<fieldset>";
		echo "<legend style='border:1px'>".$tb_account_arr['account_id']."号缺陷基本信息 </legend>";
		$tb_defect_system_sql = "SELECT * FROM `tb_system` WHERE system_id =".$tb_defect_arr['defect_system'];
		$tb_defect_system_result = mysqli_query($this->conn, $tb_defect_system_sql);
		$tb_defect_system_arr=mysqli_fetch_assoc($tb_defect_system_result);
		echo "<label>所属系统<input type='text' readonly style='width:20%' size='5' value='".$tb_defect_system_arr['system_content']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>";
		$tb_defect_type_sql = "SELECT * FROM `tb_defect_type` WHERE defect_type_id =".$tb_defect_arr['defect_type'];
		$tb_defect_type_result = mysqli_query($this->conn, $tb_defect_type_sql);
		$tb_defect_type_arr=mysqli_fetch_assoc($tb_defect_type_result);
		echo "<label>缺陷类别<input type='text' readonly style='width:20%' size='5' value='".$tb_defect_type_arr['defect_type_name']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>";
		$tb_user_sql = "SELECT * FROM `tb_user` WHERE user_id =".$tb_defect_arr['defect_clear_people'];
		$tb_user_result = mysqli_query($this->conn, $tb_user_sql);
		$tb_user_arr=mysqli_fetch_assoc($tb_user_result);
		echo "<label>负责人<input type='text' readonly style='width:15%' size='5' value='".$tb_user_arr['user_name']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>";
		echo "<label>缺陷分析<input type='text' readonly style='width:10%' size='5' value='".$tb_defect_arr['analysis_id']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>",
		"<br>";
		$tb_area_sql = "SELECT * FROM `tb_area` WHERE area_id =".$tb_defect_arr['defect_area'];
		$tb_area_result = mysqli_query($this->conn, $tb_area_sql);
		$tb_area_arr=mysqli_fetch_assoc($tb_area_result);
		echo "<label>工作区域<input type='text' readonly style='width:20%' size='5' value='".$tb_area_arr['area_content']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>";
		$tb_defect_status_sql = "SELECT * FROM `tb_defect_status` WHERE defect_status_id =".$tb_defect_arr['defect_result'];
		$tb_defect_status_result = mysqli_query($this->conn, $tb_defect_status_sql);
		$tb_defect_status_arr=mysqli_fetch_assoc($tb_defect_status_result);
		echo "<label>处理结果<input type='text' readonly style='width:20%' size='5' value='".$tb_defect_status_arr['defect_status_name']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>";
		echo "<label>消缺时间<input type='text' readonly style='width:25%' size='16' value='".$tb_defect_arr['defect_clear_time']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>";
		echo "<br>";
		$tb_diary_sql = "SELECT * FROM `tb_diary` WHERE diary_id =".$tb_defect_arr['diary_id'];
		$tb_diary_result = mysqli_query($this->conn, $tb_diary_sql);
		$tb_diary_arr=mysqli_fetch_assoc($tb_diary_result);
		echo "<label>工作日期<input type='text' readonly style='width:20%' size='5' value='".$tb_diary_arr['createtime']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>";
		echo "<label>关联设备<input type='text' readonly style='width:20%' size='5' value='".$tb_defect_arr['job_account_id']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>";
		echo "<label>延期时间<input type='text' readonly style='width:25%' size='16' value='".$tb_defect_arr['defect_delay_time']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input>";
		echo "</label>";
		echo "</fieldset>";
		echo "<fieldset>";
		echo "<legend style='border:1px'>".$tb_account_arr['account_id']."号缺陷处理日志 </legend>";
		echo "<textarea readonly rows='7' style='width:100%' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'>".$tb_defect_arr['defect_remarks']."</textarea>";
		echo "</fieldset>";
		return $tb_defect_arr['analysis_id'];
		}
	public function editDefect($defectId){//生成编辑缺陷表单
		$tb_defect_sql = 'SELECT * FROM tb_defect WHERE defect_id='.$defectId;
		$tb_defect_result = mysqli_query($this->conn, $tb_defect_sql);
		$tb_defect_arr=mysqli_fetch_assoc($tb_defect_result);
		echo "<fieldset id='fieldset1' disabled='true'>";
		echo "<legend style='border:1px'>".$tb_account_arr['account_id']."号缺陷基本信息 <input onclick=\"lockBox(this,'fieldset1')\" type='button'value='🔓'/></legend>";
		echo "<label>缺陷编号<input type='text'style='width:8%' name='defect_id' size='10' value=".$tb_defect_arr['defect_id']."></input></label>";
		echo "<label>缺陷内容<input type='text'style='width:45%'name='defect_cotent'size='30'value='".$tb_defect_arr['defect_cotent']."'></input></label>";
		echo "<label>发现人<input type='text'style='width:12%' name='defect_people_find' size='8' value=".$tb_defect_arr['defect_people_find']."></input></label>";
		echo "<br>";
		echo "<label>缺陷等级<input type='text'style='width:8%' name='defect_specialty' size='10' value=".$tb_defect_arr['defect_specialty']."></label>";
		echo "<label>发现时间<input type='datetime-local'style='width:25%' name='defect_find_time' size='16' value='".$tb_defect_arr['defect_find_time']."'></label>";
		echo "<label>确认人<input type='text'style='width:12%' name='defect_people_act' size='8' value=".$tb_defect_arr['defect_people_act']."></label>";
		echo "<label>验收人<input type='text'style='width:12%' name='defect_check_people' size='5' value=".$tb_defect_arr['defect_check_people']."></label>";
		echo "</fieldset>";
		echo "<fieldset id='fieldset2' disabled='true'>";
		echo "<legend style='border:1px'>".$tb_account_arr['account_id']."号缺陷基本信息 <input onclick=\"lockBox(this,'fieldset2')\" type='button'value='🔓'/></legend>";
					$area_option = array("table"=>"tb_area","key"=>"area_system","value"=>0,"option_id"=>"area_id","option_value"=>"area_content");
					$area_json = json_encode($area_option);
		echo "<label>所属系统";
		echo "<select name='defect_system' style='width:20%'class='selectfont'onchange=check(this.options[options.selectedIndex].value,'area',$area_json)>";
		echo "<option value='0'>--请选择--</option>";
		$tb_defect_system_sql = "SELECT * FROM `tb_system` WHERE 1";
		$tb_defect_system_result = mysqli_query($this->conn, $tb_defect_system_sql);
		while($tb_defect_system_arr=mysqli_fetch_assoc($tb_defect_system_result)){
			if($tb_defect_system_arr['system_id']==$tb_defect_arr['defect_system']){
                		echo "<option value=".$tb_defect_system_arr['system_id']." selected='selected'>".$tb_defect_system_arr['system_content']."</option>";
			}else{
                		echo "<option value=".$tb_defect_system_arr['system_id'].">".$tb_defect_system_arr['system_content']."</option>";
			}
		}
                echo "</select>";
		echo "</label>";
		echo "<label>缺陷类别";
		echo "<select name='defect_type'style='width:15%' class='selectfont'>";
		echo "<option value='0'>--请选择--</option>";
		$tb_defect_type_sql = "SELECT * FROM `tb_defect_type` WHERE 1";
		$tb_defect_type_result = mysqli_query($this->conn, $tb_defect_type_sql);
		while($tb_defect_type_arr=mysqli_fetch_assoc($tb_defect_type_result)){
			if($tb_defect_type_arr['defect_type_id']==$tb_defect_arr['defect_type']){
                		echo "<option value=".$tb_defect_type_arr['defect_type_id']." selected='selected'>".$tb_defect_type_arr['defect_type_name']."</option>";
			}else{
                		echo "<option value=".$tb_defect_type_arr['defect_type_id'].">".$tb_defect_type_arr['defect_type_name']."</option>";
			}
		}
                echo "</select>";
		echo "</label>";
		echo "<label>负责人";
		echo "<select name='defect_clear_people'style='width:15%' class='selectfont'>";
		$tb_user_sql = "SELECT * FROM `tb_user` WHERE 1";
		$tb_user_result = mysqli_query($this->conn, $tb_user_sql);
		while($tb_user_arr=mysqli_fetch_assoc($tb_user_result)){
			if($tb_user_arr['user_id']==$tb_defect_arr['defect_clear_people']){
                		echo "<option value=".$tb_user_arr['user_id']." selected='selected'>".$tb_user_arr['user_name']."</option>";
			}else{
                		echo "<option value=".$tb_user_arr['user_id'].">".$tb_user_arr['user_name']."</option>";
			}
		}
                echo "</select>",
		"</label>",
		"<label>缺陷分析",
			"<select name='analysis_id'style='width:7%' class='selectfont'>",
				"<option selected='selected' disabled='disabled' style='display: none' value=''></option>";
				$tb_analysis_sql = "SELECT * FROM `tb_analysis` WHERE 1";
				$tb_analysis_result = mysqli_query($this->conn, $tb_analysis_sql);
				while($tb_analysis_arr=mysqli_fetch_assoc($tb_analysis_result)){
					if($tb_analysis_arr['analysis_id']==$tb_defect_arr['analysis_id']){
                				echo "<option value=".$tb_analysis_arr['analysis_id']." selected='selected'>".$tb_analysis_arr['analysis_id']."</option>";
					}else{
                				echo "<option value=".$tb_analysis_arr['analysis_id'].">".$tb_analysis_arr['analysis_id']."</option>";
					}
				}
                	echo "</select>",
		"</label>",
		"<br>",
		"<label>工作区域",
		"<select id='area'name='defect_area'style='width:20%' class='selectfont'>",
		"<option selected='selected' disabled='disabled'  style='display: none' value=''></option>";
		$tb_area_sql = "SELECT * FROM `tb_area` WHERE 1";
		$tb_area_result = mysqli_query($this->conn, $tb_area_sql);
		while($tb_area_arr=mysqli_fetch_assoc($tb_area_result)){
			if($tb_area_arr['area_id']==$tb_defect_arr['defect_area']){
                        	echo "<option value=".$tb_area_arr['area_id']." selected='selected'>".$tb_area_arr['area_content']."</option>";
			}else{
                               echo "<option value=".$tb_area_arr['area_id'].">".$tb_area_arr['area_content']."</option>";
			}
		}
		echo "</select>";
		echo "</label>";
		echo "<label>处理结果";
		echo "<select name='defect_result'style='width:15%' class='selectfont'>";
		echo "<option selected='selected' disabled='disabled'  style='display: none' value=''></option>";
		$tb_defect_status_sql = "SELECT * FROM `tb_defect_status` WHERE 1";
		$tb_defect_status_result = mysqli_query($this->conn, $tb_defect_status_sql);
		while($tb_defect_status_arr=mysqli_fetch_assoc($tb_defect_status_result)){
			if($tb_defect_status_arr['defect_status_id']==$tb_defect_arr['defect_result']){
                		echo "<option value=".$tb_defect_status_arr['defect_status_id']." selected='selected'>".$tb_defect_status_arr['defect_status_name']."</option>";
			}else{
                		echo "<option value=".$tb_defect_status_arr['defect_status_id'].">".$tb_defect_status_arr['defect_status_name']."</option>";
			}
		}
                echo "</select>";
		echo "</label>";
	//	echo "<label>消缺时间<input type='text'style='width:25%' name='defect_clear_time' size='16' value='".$tb_defect_arr['defect_clear_time']."'></input></label>";
		echo "<label>消缺时间<input type='datetime-local'style='width:25%' name='defect_clear_time' size='16' value='".$tb_defect_arr['defect_clear_time']."'></input></label>";
		echo "<br>";
		echo "<label>工作日期";
		echo "<select name='diary_id'style='width:20%' class='selectfont'>";
		echo "<option value='0'>--未开始--</option>";
		$tb_diary_sql = "SELECT * FROM `tb_diary` WHERE 1 order by diary_id desc limit 0,200";//下拉列表显示倒数天数
		$tb_diary_result = mysqli_query($this->conn, $tb_diary_sql);
		while($tb_diary_arr=mysqli_fetch_assoc($tb_diary_result)){
			if($tb_diary_arr['diary_id']==$tb_defect_arr['diary_id']){
               			echo "<option value=".$tb_diary_arr['diary_id']." selected='selected'>".$tb_diary_arr['createtime']."</option>";
			}else{
                       		echo "<option value=".$tb_diary_arr['diary_id'].">".$tb_diary_arr['createtime']."</option>";
			}
		}
               	echo "</select>";
		echo "</label>";
		echo "<label>关联设备";
		echo "<select name='job_account_id'style='width:15%' class='selectfont'>";
		echo "<option selected='selected' disabled='disabled'  style='display: none' value=''></option>";
		$tb_account_sql = "SELECT account_id,equipment_kks FROM tb_account WHERE 1";
		$tb_account_result = mysqli_query($this->conn, $tb_account_sql);
		while($tb_account_arr=mysqli_fetch_assoc($tb_account_result)){
			if($tb_account_arr['account_id']==$tb_defect_arr['job_account_id']){
                		echo "<option value=".$tb_account_arr['account_id']." selected='selected'>".$tb_account_arr['account_id']."</option>";
			}
			else{
                       		echo "<option value=".$tb_account_arr['account_id'].">".$tb_account_arr['account_id']."</option>";
			}
		}
              	echo "</select>";
		echo "</label>";
		echo "<label>延期时间<input type='text'style='width:25%' name='defect_delay_time' size='16' value='".$tb_defect_arr['defect_delay_time']."'></input>";
		echo "</label>";
		echo "</fieldset>";
		echo "<fieldset id='fieldset3' disabled='true'>";
		echo "<legend style='border:1px'>".$tb_account_arr['account_id']."号缺陷处理日志 <input onclick=\"lockBox(this,'fieldset3')\" type='button'value='🔓'/></legend>";
		echo "<textarea rows='7' name='defect_remarks'style='width:100%'>".$tb_defect_arr['defect_remarks']."</textarea>";
		echo "</fieldset>";
		return $tb_defect_arr['analysis_id'];
		}
	public function showLedger($LedgerId){//显示Id为LedgerId的缺陷记录
		$this->tableHead = array("defect_id"=>"编号","defect_specialty"=>"等级","defect_cotent"=>"缺陷内容","defect_find_time"=>"发现时间","defect_result"=>"结果","defect_clear_time"=>"消缺时间","defect_clear_people"=>"消缺人","defect_check_people"=>"验收人","management"=>"无","action"=>"content");
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
	public function showDiary($diaryId){//显示Id为LedgerId的缺陷记录
		$this->tableHead = array("defect_id"=>"编号","defect_cotent"=>"缺陷内容","defect_find_time"=>"发现时间","defect_clear_people"=>"消缺人","defect_result"=>"结果","management"=>"管理","path"=>"../../quexian/defect/","action"=>"content");
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
			echo "目前无新增缺陷！";
		}
		if($this->num > $this->pagesize){
			$json = json_encode($this->tableHead);
			//echo $json;
			$page_obj = new Page($this->num,$this->pagesize,$this->sqlId,$this->tbodyId,$this->pageFunction,$json);
			$page_obj->showPage();
		}

	}
	public function quickSelect($quick){//显示不同状态下的缺陷：0-已处理，1-未处理，2-延期缺陷
		if ($quick==10){//当天
			$end_time=date("Y-m-d H:i:s");
			$today=strtotime("today");
			$begain_time=date("Y-m-d 00:00:00", $today);
		}
		if ($quick==20){//昨天
			$today=strtotime("today");
			$end_time=date("Y-m-d 00:00:00",$today);
			$yesterday=strtotime("yesterday");
			$begain_time=date("Y-m-d 00:00:00", $yesterday);
		}
		if ($quick==30){//本周：上周六到今天
	if(date("w")==1){
			$first_day = strtotime("monday");
	}else{
			$first_day = strtotime("last monday");
		}
			$first_time = date("Y-m-d",$first_day);
			$begain=strtotime($first_time." - 3 day");
			$begain_time=date("Y-m-d 00:00:00",$begain);
			$end=strtotime($begain_time." + 6 day");
			$end_time=date("Y-m-d 23:59:59", $end);

		}
		if ($quick==40){//上周：上上周五至上周五
	if(date("w")==1){
			$first_day = strtotime("monday");
	}else{
			$first_day = strtotime("last monday");
		}
			$first_time = date("Y-m-d",$first_day);
			$begain=strtotime($first_time." - 10 day");
			$begain_time=date("Y-m-d 00:00:00",$begain);
			$end=strtotime($begain_time." + 6 day");
			$end_time=date("Y-m-d 23:59:59", $end);

		}
		if ($quick==50){//本月：上月到现在
			$end_time=date("Y-m-d H:i:s");
			$month=strtotime("last month");
			$begain_time=date("Y-m-d 00:00:00",mktime(0, 0 , 0,date("m"),1,date("Y")));
		}
		if ($quick==60){//上月：上上月到上月
			$begain_time=date("Y-m-d H:i:s",mktime(0, 0 , 0,date("m")-1,1,date("Y")));
			$end_time=date("Y-m-d H:i:s",mktime(23,59,59,date("m") ,0,date("Y")));
		}
		$str1="(".$this->selectinfo['quick']." BETWEEN \"";
		$str1.= $begain_time;
		$str1.="\" AND \"";
		$str1.= $end_time;
		$str1.= "\")";
		$count_sql=$this->count_sql.$str1;
		////echo $count_sql;
        	$re = mysqli_query($this->conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$num = $result[0];
		$this->num=$num;
		$sql = $this->sql.$str1.' order by '.$this->selectinfo['id'].' desc limit 0,'.$this->pagesize;
		//echo $sql;
		$result = mysqli_query($this->conn, $sql);
		$this->result=$result;
		$pageSql = $this->sql.$str1.' order by '.$this->selectinfo['id'].' desc limit ';
		$this->pageSql = $pageSql;
		$this->tbodyId = "quicktbodyId";
		$this->sqlId = "quicksqlId";
		$this->showTable();
		if($this->num > $this->pagesize){
			$json = json_encode($this->tableHead);
			$page_obj = new Page($this->num,$this->pagesize,$this->sqlId,$this->tbodyId,$this->pageFunction,$json);
			$page_obj->showPage();
		}

	}

	public function reportDefect($flag){//查看Id为id的分析报告表单
	if(date("w")==1){
			$first_day = strtotime("monday");
	}else{
			$first_day = strtotime("last monday");
		}
			$first_time = date("Y-m-d",$first_day);
			$begain=strtotime($first_time." - 3 day");
			$begain_time=date("Y-m-d 00:00:00",$begain);
			$end=strtotime($begain_time." + 6 day");
			$end_time=date("Y-m-d  23:59:59", $end);
		$count_sql = $this->count_sql."defect_find_time between '".$begain_time."' and '".$end_time."'";
		//echo $count_sql;
        	$re = mysqli_query($this->conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$num = $result[0];
		$count_sql = $this->count_sql."defect_specialty=1 and (defect_find_time between '".$begain_time."' and '".$end_time."')";
			//echo $count_sql;
        	$re = mysqli_query($this->conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$num1 = $result[0];
		$count_sql = $this->count_sql."defect_specialty=2 and (defect_find_time between '".$begain_time."' and '".$end_time."')";
			//echo $count_sql;
        	$re = mysqli_query($this->conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$num2 = $result[0];
		$count_sql = $this->count_sql."defect_specialty=3 and (defect_find_time between '".$begain_time."' and '".$end_time."')";
			//echo $count_sql;
        	$re = mysqli_query($this->conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$num3 = $result[0];
		$count_sql = $this->count_sql."defect_specialty=4 and (defect_find_time between '".$begain_time."' and '".$end_time."')";
			//echo $count_sql;
        	$re = mysqli_query($this->conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$num4 = $result[0];
		$count_sql = $this->count_sql."defect_result=7 and (defect_find_time between '".$begain_time."' and '".$end_time."')";
			//echo $count_sql;
        	$re = mysqli_query($this->conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$num5 = $result[0];
		$count_sql = $this->count_sql."defect_result=2 and (defect_find_time between '".$begain_time."' and '".$end_time."')";
			//echo $count_sql;
        	$re = mysqli_query($this->conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$num6 = $result[0];
		$num7=round($num5/$num,4)*100;
		$count_sql = $this->count_sql."(defect_system=1 or defect_system=2 or defect_system=3 or defect_system=4) and (defect_find_time between '".$begain_time."' and '".$end_time."')";
			//echo $count_sql;
        	$re = mysqli_query($this->conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$num8 = $result[0];
		$count_sql = $this->count_sql."(defect_system=5 or defect_system=6 or defect_system=7 or defect_system=8 or defect_system=9 or defect_system=11) and (defect_find_time between '".$begain_time."' and '".$end_time."')";
			//echo $count_sql;
        	$re = mysqli_query($this->conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$num9 = $result[0];
		$count_sql = $this->count_sql."defect_system=10 and (defect_find_time between '".$begain_time."' and '".$end_time."')";
			//echo $count_sql;
        	$re = mysqli_query($this->conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$num10 = $result[0];
		$count_sql = $this->count_sql."(defect_system=12 or defect_system=13) and (defect_find_time between '".$begain_time."' and '".$end_time."')";
			//echo $count_sql;
        	$re = mysqli_query($this->conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$num11 = $result[0];
		$count_sql = $this->count_sql."defect_type=6 and (defect_find_time between '".$begain_time."' and '".$end_time."')";
			//echo $count_sql;
        	$re = mysqli_query($this->conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$num12 = $result[0];
		$count_sql = $this->count_sql."defect_type=8 and (defect_find_time between '".$begain_time."' and '".$end_time."')";
			//echo $count_sql;
        	$re = mysqli_query($this->conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$num13 = $result[0];
		echo "本周共计发生缺陷".$num."条，其中一类缺陷".$num1."条，二类缺陷".$num2."条，三类缺陷".$num3."条，四类缺陷".$num4."条，已消除".$num5."条，延期缺陷".$num6."条，消缺率".$num7."%。锅炉发生缺陷".$num8."条 ，汽机及管网发生缺陷".$num9."条，DCS系统发生缺陷".$num10."条，外围发生缺陷".$num11."条。其中测点跳变或显示不准类缺陷".$num12."条，阀门类缺陷".$num13."条。";
		$this->quickSelect(30);
	}
	function __destruct(){
		//mysql_close($this->conn);
//		print "销毁";
	}

}
?>
