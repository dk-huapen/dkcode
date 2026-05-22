<?php
					include_once("Table.class.php");
class StandardJob extends dkTable{
	function __construct(){
		$this->conn = mysqli_connect(parent::host,parent::username,parent::password,parent::database);
		if(!$this->conn){
			die("数据库连接失败". mysqli_connect_error());
		}else { 
	//	echo"连接成功";
		}
		mysqli_query('set names utf8');
		$this->pagesize=10;
		$this->pageFunction = StandardJobPage;
		$this->tableHead = array("standard_job_id"=>"编号","standard_job_equipment_name"=>"设备名称","standard_job_content"=>"工作内容","management"=>"管理","path"=>"./","action"=>"content");
		$this->selectinfo = array("table"=>"tb_standard_jobs","id"=>"standard_job_id","caption"=>"标准工作项目","status"=>"standard_job_type","quick"=>"defect_find_time");
		$this->keyinfo = array("number"=>"standard_job_equipment_name","content"=>"standard_job_content","remark"=>"standard_job_require");
		$this->count_sql = "select count(*) from tb_standard_jobs where ";
		$this->sql = "SELECT standard_job_id,standard_job_equipment_name,standard_job_content FROM tb_standard_jobs where ";
	}
	public function retrievalBox(){
		echo "<fieldset>",
			"<legend style='border:1px'>检索栏</legend>";
			echo "<label><input type='checkbox' name='select_checkbox[standard_job_device]' value='select_standard_job_device'>装置</label>",
			"<select name='select_standard_job_device' style='width:15%' class='selectfont'>",
				"<option selected='selected' disabled='disabled' style='display: none' value=''></option>";
				$tb_standard_job_device_sql = "SELECT * FROM `tb_standard_job_device` WHERE 1";
				$tb_standard_job_device_result = mysqli_query($this->conn, $tb_standard_job_device_sql);
				while($tb_standard_job_device_arr=mysqli_fetch_assoc($tb_standard_job_device_result)){
                        		echo "<option value=".$tb_standard_job_device_arr['standard_job_device_id'].">".$tb_standard_job_device_arr['standard_job_device_name']."</option>";
				}
			echo "</select>";
			echo "<label><input type='checkbox' name='select_checkbox[standard_job_system]' value='select_standard_job_system'>系统</label>",
			"<select name='select_standard_job_system' style='width:15%' class='selectfont'>",
				"<option selected='selected' disabled='disabled' style='display: none' value=''></option>";
				$tb_standard_job_system_sql = "SELECT * FROM `tb_standard_job_system` WHERE 1";
				$tb_standard_job_system_result = mysqli_query($this->conn, $tb_standard_job_system_sql);
				while($tb_standard_job_system_arr=mysqli_fetch_assoc($tb_standard_job_system_result)){
                        		echo "<option value=".$tb_standard_job_system_arr['standard_job_system_id'].">".$tb_standard_job_system_arr['standard_job_system_name']."</option>";
				}
			echo "</select>";
			echo "<label><input type='checkbox' name='select_checkbox[standard_job_type]' value='select_standard_job_type'>类型</label>",
			"<select name='select_standard_job_type' style='width:15%' class='selectfont'>",
				"<option selected='selected' disabled='disabled' style='display: none' value=''></option>";
				$tb_standard_job_type_sql = "SELECT * FROM `tb_standard_job_type` WHERE 1";
				$tb_standard_job_type_result = mysqli_query($this->conn, $tb_standard_job_type_sql);
				while($tb_standard_job_type_arr=mysqli_fetch_assoc($tb_standard_job_type_result)){
                        		echo "<option value=".$tb_standard_job_type_arr['standard_job_type_id'].">".$tb_standard_job_type_arr['standard_job_type_name']."</option>";
				}	
			echo "</select>",
			"<label><input type='checkbox' name='select_checkbox_key' value='select_key'>关键字</label><input type='text'style='width:20%' name='select_key' size='10'placeholder='名称/内容/备注'></input>",
		"<fieldset>";
	}
	public function editStandardJob($id){//查看Id为id的分析报告表单
		$tb_standard_job_sql = 'SELECT standard_job_id,standard_job_device,standard_job_system,standard_job_type,standard_job_cycle,standard_job_cycle_unit,standard_job_equipment_name,standard_job_content,standard_job_require,standard_job_arry,standard_group_arry,standard_job_remarks FROM tb_standard_jobs where standard_job_id='.$id;
		$tb_standard_job_result = mysqli_query($this->conn, $tb_standard_job_sql);
		$tb_standard_job_arr=mysqli_fetch_assoc($tb_standard_job_result);
		echo "<fieldset>",
			"<legend style='border:1px'>号设备基本信息</legend>",
			"<input type='hidden' name='standard_job_id' size='3' value=".$tb_standard_job_arr['standard_job_id']."></input>",
			"<label>装置",
				"<select name='standard_job_device' style='width:15%' class='selectfont'>",
					"<option selected='selected' disabled='disabled' style='display: none' value=''></option>",
					$tb_standard_job_device_sql = "SELECT * FROM `tb_standard_job_device` WHERE 1";
					$tb_standard_job_device_result = mysqli_query($this->conn, $tb_standard_job_device_sql);
					while($tb_standard_job_device_arr=mysqli_fetch_assoc($tb_standard_job_device_result)){
						if($tb_standard_job_device_arr['standard_job_device_id']==$tb_standard_job_arr['standard_job_device']){
                        				echo "<option value=".$tb_standard_job_device_arr['standard_job_device_id']." selected='selected'>".$tb_standard_job_device_arr['standard_job_device_name']."</option>";
						}else{
                        				echo "<option value=".$tb_standard_job_device_arr['standard_job_device_id'].">".$tb_standard_job_device_arr['standard_job_device_name']."</option>";
						}
					}
				echo "</select>",
			"</label>",
			"<label>设备名称<input type='text'style='width:30%' name='standard_job_equipment_name' size='3' value=".$tb_standard_job_arr['standard_job_equipment_name']."></input></label>",
			"<label>备注<input type='text' style='width:20%' name='standard_job_remarks' size='30' value=".$tb_standard_job_arr['standard_job_remarks']."></input></label>",
			"<label>周期<input type='text' style='width:10%'name='standard_job_cycle' size='3' value=".$tb_standard_job_arr['standard_job_cycle']."></input></label>",
			"<br>",
			"<label>系统",
				"<select name='standard_job_system' style='width:15%' class='selectfont'>",
					"<option selected='selected' disabled='disabled' style='display: none' value=''></option>";
					$tb_standard_job_system_sql = "SELECT * FROM `tb_standard_job_system` WHERE 1";
					$tb_standard_job_system_result = mysqli_query($this->conn, $tb_standard_job_system_sql);
					while($tb_standard_job_system_arr=mysqli_fetch_assoc($tb_standard_job_system_result)){
						if($tb_standard_job_system_arr['standard_job_system_id']==$tb_standard_job_arr['standard_job_system']){
                        				echo "<option value=".$tb_standard_job_system_arr['standard_job_system_id']." selected='selected'>".$tb_standard_job_system_arr['standard_job_system_name']."</option>";
						}else{
                        				echo "<option value=".$tb_standard_job_system_arr['standard_job_system_id'].">".$tb_standard_job_system_arr['standard_job_system_name']."</option>";
						}
					}
				echo "</select>",
			"</label>",
			"<label>工作内容<input type='text' style='width:55%' name='standard_job_content' size='30' value=".$tb_standard_job_arr['standard_job_content']."></input></label>",
			"<label>单位<input type='text'style='width:10%' name='standard_job_cycle_unit' size='5' value=".$tb_standard_job_arr['standard_job_cycle_unit']."></input></label>",
			"<br>",
			"<label>类型",
				"<select name='standard_job_type' style='width:15%' class='selectfont'>",
					"<option selected='selected' disabled='disabled' style='display: none' value=''></option>",
						$tb_standard_job_type_sql = "SELECT * FROM `tb_standard_job_type` WHERE 1";
						$tb_standard_job_type_result = mysqli_query($this->conn, $tb_standard_job_type_sql);
						while($tb_standard_job_type_arr=mysqli_fetch_assoc($tb_standard_job_type_result)){
							if($tb_standard_job_type_arr['standard_job_type_id']==$tb_standard_job_arr['standard_job_type']){
                        					echo "<option value=".$tb_standard_job_type_arr['standard_job_type_id']." selected='selected'>".$tb_standard_job_type_arr['standard_job_type_name']."</option>";
							}else{
                        					echo "<option value=".$tb_standard_job_type_arr['standard_job_type_id'].">".$tb_standard_job_type_arr['standard_job_type_name']."</option>";
							}
						}
				echo "</select>",
			"</label>",
			"<label>设备列表<input type='text' style='width:20%' name='standard_job_arry' size='30' value=".$tb_standard_job_arr['standard_job_arry']."></input></label>",
			"<label>设备组列表<input type='text' style='width:20%' name='standard_group_arry' size='30' value=".$tb_standard_job_arr['standard_group_arry']."></input</label>",
		"</fieldset>",
		"<fieldset>",
			"<legend style='border:1px'>质量标准和要求</legend>", 
			"<textarea rows='5' style='width:100%' name='standard_job_require'>".$tb_standard_job_arr['standard_job_require']."</textarea>",
		"</fieldset>";
		return array($tb_standard_job_arr['standard_job_arry'],$tb_standard_job_arr['standard_group_arry']);
	}
	public function lookStandardJob($id){//查看Id为id的分析报告表单
		$tb_standard_job_sql = 'SELECT standard_job_id,standard_job_device,standard_job_system,standard_job_type,standard_job_cycle,standard_job_cycle_unit,standard_job_equipment_name,standard_job_content,standard_job_require,standard_job_arry,standard_group_arry,standard_job_remarks FROM tb_standard_jobs where standard_job_id='.$id;
		$tb_standard_job_result = mysqli_query($this->conn, $tb_standard_job_sql);
		$tb_standard_job_arr=mysqli_fetch_assoc($tb_standard_job_result);
		echo "<fieldset>",
			"<legend style='border:1px'>号设备基本信息</legend>",
			"<input type='hidden' name='standare_job_id' size='3' value=".$tb_standard_job_arr['standard_job_id']."></input>";
					$tb_standard_job_device_sql = "SELECT * FROM `tb_standard_job_device` WHERE standard_job_device_id =".$tb_standard_job_arr['standard_job_device'];
					$tb_standard_job_device_result = mysqli_query($this->conn, $tb_standard_job_device_sql);
					$tb_standard_job_device_arr=mysqli_fetch_assoc($tb_standard_job_device_result);
			echo "<label>装置<input type='text'readonly style='width:15%' value='".$tb_standard_job_device_arr['standard_job_device_name']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>",
			"<label>设备名称<input type='text' readonly style='width:30%' value='".$tb_standard_job_arr['standard_job_equipment_name']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>",
			"<label>备注<input type='text' readonly style='width:20%' value='".$tb_standard_job_arr['standard_job_remarks']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>",
			"<label>周期<input type='text' readonly style='width:10%' value='".$tb_standard_job_arr['standard_job_cycle']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>",
			"<br>";
					$tb_standard_job_system_sql = "SELECT * FROM `tb_standard_job_system` WHERE standard_job_system_id =".$tb_standard_job_arr['standard_job_system'];
					$tb_standard_job_system_result = mysqli_query($this->conn, $tb_standard_job_system_sql);
					$tb_standard_job_system_arr=mysqli_fetch_assoc($tb_standard_job_system_result);
			echo "<label>系统<input type='text' readonly style='width:15%' value='".$tb_standard_job_system_arr['standard_job_system_name']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>",
			"<label>工作内容<input type='text' readonly style='width:55%' name='standard_job_content' size='30' value='".$tb_standard_job_arr['standard_job_content']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>",
			"<label>单位<input type='text' readonly style='width:10%' name='standard_job_cycle_unit' size='5' value='".$tb_standard_job_arr['standard_job_cycle_unit']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>",
			"<br>";
						$tb_standard_job_type_sql = "SELECT * FROM `tb_standard_job_type` WHERE standard_job_type_id =".$tb_standard_job_arr['standard_job_type'];
						$tb_standard_job_type_result = mysqli_query($this->conn, $tb_standard_job_type_sql);
						$tb_standard_job_type_arr=mysqli_fetch_assoc($tb_standard_job_type_result);
			echo "<label>类型<input type='text' readonly style='width:15%' value='".$tb_standard_job_type_arr['standard_job_type_name']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>",
			"<label>设备列表<input type='text'readonly style='width:20%' value='".$tb_standard_job_arr['standard_job_arry']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>",
			"<label>设备组列表<input type='text'readonly style='width:20%' value='".$tb_standard_job_arr['standard_group_arry']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input</label>",
		"</fieldset>",
		"<fieldset>",
			"<legend style='border:1px'>质量标准和要求</legend>", 
			"<textarea rows='5' style='width:100%' name='standard_job_require'>".$tb_standard_job_arr['standard_job_require']."</textarea>",
		"</fieldset>";
		return array($tb_standard_job_arr['standard_job_arry'],$tb_standard_job_arr['standard_group_arry']);
	}
}
