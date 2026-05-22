<?php
					include_once("Table.class.php");
class Group extends dkTable{
	function __construct(){
		$this->conn = mysqli_connect(parent::host,parent::username,parent::password,parent::database);
		if(!$this->conn){
			die("数据库连接失败". mysqli_connect_error());
		}else { 
	//	echo"连接成功";
		}
		mysqli_query('set names utf8');
		$this->pagesize=10;
		$this->pageFunction = GroupPage;
		$this->tableHead = array("account_group_id"=>"编号","equipment_group_kks"=>"KKS","equipment_group_name"=>"设备名称","equipment_group_position"=>"安装位置","management"=>"管理","path"=>"./","action"=>"content");
		$this->selectinfo = array("table"=>"tb_account_group","id"=>"account_group_id","caption"=>"设备组列表","status"=>"equipment_group_type","quick"=>"defect_find_time");
		$this->keyinfo = array("number"=>"equipment_group_kks","content"=>"equipment_group_name","remark"=>"equipment_group_position");
		$this->sql = "SELECT tb_account_group.account_group_id,tb_account_group.equipment_group_kks,tb_account_group.equipment_group_name,tb_account_group.equipment_group_position FROM tb_account_group where ";
		$this->count_sql = "select count(*) from tb_account_group where ";
	}
	public function retrievalBox(){//显示检索栏
	echo "<fieldset>",
		"<legend style='border:1px'>检索选择</legend>";
					$area_option = array("table"=>"tb_area","key"=>"area_system","value"=>0,"option_id"=>"area_id","option_value"=>"area_content");
					$area_json = json_encode($area_option);
		echo "<label><input type='checkbox' name='select_checkbox[equipment_system_id]' value='select_equipment_system_id'></input>系统</label>",
		"<select name='select_equipment_system_id'style='width:30%' id='sys' class='selectfont'onchange=check(this.options[options.selectedIndex].value,'seek_area',$area_json)>",
			"<option selected='selected' disabled='disabled' style='display: none' value=''></option>",
		$tb_system_sql = "SELECT * FROM `tb_system` WHERE 1";
		$tb_system_result = mysqli_query($this->conn, $tb_system_sql);
		while($tb_system_arr=mysqli_fetch_assoc($tb_system_result)){
                                        echo "<option value=".$tb_system_arr['system_id'].">".$tb_system_arr['system_content']."</option>";
}
					echo "</select>",
		"<label><input type='checkbox' name='select_checkbox[equipment_group_type]'value='select_equipment_group_type'></input>设备类型</label>",
		"<select name='select_equipment_group_type'style='width:17%' class='selectfont'>",
		"<option selected='selected' disabled='disabled'style='display: none' value=''></option>";
		$tb_account_type_sql = "SELECT * FROM `tb_account_type` WHERE 1";
		$tb_account_type_result = mysqli_query($this->conn, $tb_account_type_sql);
		while($tb_account_type_arr=mysqli_fetch_assoc($tb_account_type_result)){
				echo "<option value=".$tb_account_type_arr['account_type_id'].">".$tb_account_type_arr['account_type_name']."</option>";
		}
		echo "</select>",
		"<label><input type='checkbox' name='select_checkbox[equipment_group_status]'value='select_equipment_group_status'></input>设备状态</label>",
		"<select name='select_equipment_group_status'style='width:15%' class='selectfont'>",
		"<option selected='selected' disabled='disabled'  style='display: none' value=''></option>",
		$tb_account_status_sql = "SELECT * FROM `tb_account_status` WHERE 1";
		$tb_account_status_result = mysqli_query($this->conn, $tb_account_status_sql);
		while($tb_account_status_arr=mysqli_fetch_assoc($tb_account_status_result)){
               			echo "<option value=".$tb_account_status_arr['account_status_id'].">".$tb_account_status_arr['account_status_name']."</option>";
		}
		echo "</select>",
		"<br>",
		"<label><input type='checkbox' name='select_checkbox[equipment_area_id]' value='select_equipment_area_id'></input>区域</label>",
		"<select id='seek_area' name='select_equipment_area_id'style='width:30%' class='selectfont'>",
			"<option value='-1'>--请选择--</option>",
                "</select>",
		"<label><input type='checkbox' name='select_checkbox_key' value='select_key'></input>关键字</label>",
		"<input type='text'style='width:30%' name='select_key' size='10'></input>",
                                        "<input type='submit'style='width:100%' value='搜索'></input>",
	"</fieldset>";
	}
	public function addGroup(){//生成新增缺陷表单
		echo "<fieldset>",
	"<legend style='border:1px'>新增设备组基本信息</legend>",
	"<label>设备组编码<input type='text'style='width:20%' name='equipment_group_kks' value=''></input></label>";
					$area_option = array("table"=>"tb_area","key"=>"area_system","value"=>0,"option_id"=>"area_id","option_value"=>"area_content");
					$area_json = json_encode($area_option);
	echo "<label>所属系统",
		"<select name='equipment_system_id'style='width:25%' id='sys' class='selectfont' onchange=check(this.options[options.selectedIndex].value,'area',$area_json)>",
		"<option selected='selected' disabled='disabled' style='display: none' value=''></option>";
			$tb_system_sql = "SELECT * FROM `tb_system` WHERE 1";
			$tb_system_result = mysqli_query($this->conn, $tb_system_sql);
			while($tb_system_arr=mysqli_fetch_assoc($tb_system_result)){
                                        echo "<option value=".$tb_system_arr['system_id'].">".$tb_system_arr['system_content']."</option>";
			}
		echo "</select>",
	"</label>",
		"<label>安装位置<input type='text'style='width:20%' name='equipment_group_position' size='20' value=''></input></label>",
"<br>",
	"<label>设备组名称<input type='text' style='width:20%' name='equipment_group_name' size='20' value=''></input></label>",
	"<label>所属区域",
		"<select id='area' style='width:25%' name='equipment_area_id' class='selectfont'>",
		"<option selected='selected' disabled='disabled' style='display: none' value=''></option>";
		$tb_area_sql = "SELECT * FROM `tb_area` WHERE 1";
		$tb_area_result = mysqli_query($this->conn, $tb_area_sql);
		while($tb_area_arr=mysqli_fetch_assoc($tb_area_result)){
               			echo "<option value=".$tb_area_arr['area_id'].">".$tb_area_arr['area_content']."</option>";
		}
		echo "</select>",
	"</label>",
	"<label>设备清单<input type='text' style='width:20%' name='equipment_group_arry' size='20' value=''></input> </label>",
	"</fieldset>",
	"<fieldset>",
		"<legend style='border:1px'>设备其他信息</legend>",
	"<label>设备状态",
		"<select name='equipment_group_status'style='width:20%' width='5' class='selectfont'>",
		"<option selected='selected' disabled='disabled' style='display: none' value=''></option>";
		$tb_account_status_sql = "SELECT * FROM `tb_account_status` WHERE 1";
		$tb_account_status_result = mysqli_query($this->conn, $tb_account_status_sql);
		while($tb_account_status_arr=mysqli_fetch_assoc($tb_account_status_result)){
               			echo "<option value=".$tb_account_status_arr['account_status_id'].">".$tb_account_status_arr['account_status_name']."</option>";
		}
		echo "</select>",
	"</label>",
		"<label>状态详细<input type='text' style='width:20%' name='equipment_group_remarks1' size='30' value=''></input></label>",
"<br>",
		"<label>图纸清单<input type='text'style='width:20%' name='equipment_group_design_id' size='20' value=''></input></label>",
		"<label>备件清单<input type='text'style='width:20%' name='equipment_goods_arry' size='20' value=''></input></label>",
	"</fieldset>",
	"<fieldset>",
		"<legend style='border:1px'>设备组日志</legend>",
	"<textarea style='width:100%' name='equipment_group_remarks' rows='5'></textarea>",
	"</fieldset>";
	}
	public function editGroup($id){//生成新增缺陷表单
		$tb_account_sql = 'SELECT * FROM tb_account_group WHERE account_group_id='.$id;
		$tb_account_result = mysqli_query($this->conn, $tb_account_sql);
		$tb_account_arr=mysqli_fetch_assoc($tb_account_result);
	echo "<fieldset id='fieldset1' disabled='true'>",
	"<legend style='border:1px'>".$tb_account_arr['account_group_id']."号设备组基本信息<input onclick=\"lockBox(this,'fieldset1')\" type='button'value='🔓'></input></legend>",
	"<input type='hidden' name='account_group_id' value=".$tb_account_arr['account_group_id']."></input>",
	"<label>设备组编码<input type='text'style='width:20%' name='equipment_group_kks' value=".$tb_account_arr['equipment_group_kks']."></input></label>";
					$area_option = array("table"=>"tb_area","key"=>"area_system","value"=>0,"option_id"=>"area_id","option_value"=>"area_content");
					$area_json = json_encode($area_option);
	echo "<label>所属系统",
		"<select name='equipment_system_id'style='width:25%' id='sys' class='selectfont' onchange=check(this.options[options.selectedIndex].value,'area',$area_json)>",
		"<option selected='selected' disabled='disabled' style='display: none' value=''></option>";
			$tb_system_sql = "SELECT * FROM `tb_system` WHERE 1";
			$tb_system_result = mysqli_query($this->conn, $tb_system_sql);
			while($tb_system_arr=mysqli_fetch_assoc($tb_system_result)){
				if($tb_system_arr['system_id']==$tb_account_arr['equipment_system_id']){
                             		echo "<option value=".$tb_system_arr['system_id']." selected='selected'>".$tb_system_arr['system_content']."</option>";
				}else{
                                        echo "<option value=".$tb_system_arr['system_id'].">".$tb_system_arr['system_content']."</option>";
				}
			}
		echo "</select>",
	"</label>",
		"<label>安装位置<input type='text'style='width:20%' name='equipment_group_position' size='20' value=".$tb_account_arr['equipment_group_position']."></input></label>",
"<br>",
	"<label>设备组名称<input type='text' style='width:20%' name='equipment_group_name' size='20' value=".$tb_account_arr['equipment_group_name']."></input></label>",
	"<label>所属区域",
		"<select id='area' style='width:25%' name='equipment_area_id' class='selectfont'>",
		"<option selected='selected' disabled='disabled' style='display: none' value=''></option>";
		$tb_area_sql = "SELECT * FROM `tb_area` WHERE 1";
		$tb_area_result = mysqli_query($this->conn, $tb_area_sql);
		while($tb_area_arr=mysqli_fetch_assoc($tb_area_result)){
			if($tb_area_arr['area_id']==$tb_account_arr['equipment_area_id']){
                        	echo "<option value=".$tb_area_arr['area_id']." selected='selected'>".$tb_area_arr['area_content']."</option>";
			}else{
               			echo "<option value=".$tb_area_arr['area_id'].">".$tb_area_arr['area_content']."</option>";
			}
		}
		echo "</select>",
	"</label>",
	"<label>设备清单<input type='text' style='width:20%' name='equipment_group_arry' size='20' value=".$tb_account_arr['equipment_group_arry']."></input> </label>",
	"</fieldset>",
	"<fieldset id='fieldset2' disabled='true'>",
		"<legend style='border:1px'>".$tb_account_arr['account_group_id']."号设备其他信息<input onclick=\"lockBox(this,'fieldset2')\" type='button'value='🔓'></legend>",
	"<label>设备状态",
		"<select name='equipment_group_status'style='width:20%' width='5' class='selectfont'>",
		"<option selected='selected' disabled='disabled' style='display: none' value=''></option>";
		$tb_account_status_sql = "SELECT * FROM `tb_account_status` WHERE 1";
		$tb_account_status_result = mysqli_query($this->conn, $tb_account_status_sql);
		while($tb_account_status_arr=mysqli_fetch_assoc($tb_account_status_result)){
			if($tb_account_status_arr['account_status_id']==$tb_account_arr['equipment_group_status']){
                        	echo "<option value=".$tb_account_status_arr['account_status_id']." selected='selected'>".$tb_account_status_arr['account_status_name']."</option>";
			}else{
               			echo "<option value=".$tb_account_status_arr['account_status_id'].">".$tb_account_status_arr['account_status_name']."</option>";
			}
		}
		echo "</select>",
	"</label>",
		"<label>状态详细<input type='text' style='width:20%' name='equipment_group_remarks1' size='30' value=".$tb_account_arr['equipment_group_remarks1']."></input></label>",
"<br>",
		"<label>图纸清单<input type='text'style='width:20%' name='equipment_group_design_id' size='20' value=".$tb_account_arr['equipment_group_design_id']."></input></label>",
		"<label>备件清单<input type='text'style='width:20%' name='equipment_goods_arry' size='20' value=".$tb_account_arr['equipment_goods_arry']."></input></label>",
	"</fieldset>",
	"<fieldset id='fieldset3'disabled='true'>",
		"<legend style='border:1px'>".$tb_account_arr['account_group_id']."号设备组日志<input onclick=\"lockBox(this,'fieldset3')\" type='button'value='🔓'></legend>",
	"<textarea style='width:100%' name='equipment_group_remarks' rows='5'>".$tb_account_arr['equipment_group_remarks']."</textarea>",
	"</fieldset>";
		return array($tb_account_arr['equipment_goods_arry'],$tb_account_arr['equipment_group_arry'],$tb_account_arr['equipment_group_design_id']);
	}
	public function lookGroup($id){//生成新增缺陷表单
		$tb_account_sql = 'SELECT * FROM tb_account_group WHERE account_group_id='.$id;
		$tb_account_result = mysqli_query($this->conn, $tb_account_sql);
		$tb_account_arr=mysqli_fetch_assoc($tb_account_result);
	echo "<fieldset>",
	"<legend style='border:1px'>".$tb_account_arr['account_group_id']."号设备组基本信息</legend>",
	"<input type='hidden' name='account_group_id' value=".$tb_account_arr['account_group_id']."></input>",
	"<label>设备组编码<input type='text' readonly style='width:20%' value='".$tb_account_arr['equipment_group_kks']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>";
			$tb_system_sql = "SELECT * FROM `tb_system` WHERE system_id =".$tb_account_arr['equipment_system_id'];
			$tb_system_result = mysqli_query($this->conn, $tb_system_sql);
			$tb_system_arr=mysqli_fetch_assoc($tb_system_result);
	echo "<label>所属系统<input type='text' readonly style='width:25%' value='".$tb_system_arr['system_content']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>",
		"<label>安装位置<input type='text' readonly style='width:20%' name='equipment_group_position' size='20' value='".$tb_account_arr['equipment_group_position']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>",
"<br>",
	"<label>设备组名称<input type='text' readonly style='width:20%' name='equipment_group_name' size='20' value='".$tb_account_arr['equipment_group_name']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>";
		$tb_area_sql = "SELECT * FROM `tb_area` WHERE area_id =".$tb_account_arr['equipment_area_id'];
		$tb_area_result = mysqli_query($this->conn, $tb_area_sql);
		$tb_area_arr=mysqli_fetch_assoc($tb_area_result);
	echo "<label>所属区域<input type='text' readonly style='width:25%'  size='20' value='".$tb_area_arr['area_content']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>",
	"<label>设备清单<input type='text' readonly style='width:20%' name='equipment_group_arry' size='20' value='".$tb_account_arr['equipment_group_arry']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input> </label>",
	"</fieldset>",
	"<fieldset>",
		"<legend style='border:1px'>".$tb_account_arr['account_group_id']."号设备其他信息</legend>";
		$tb_account_status_sql = "SELECT * FROM `tb_account_status` WHERE account_status_id = ".$tb_account_arr['equipment_group_status'];
		$tb_account_status_result = mysqli_query($this->conn, $tb_account_status_sql);
		$tb_account_status_arr=mysqli_fetch_assoc($tb_account_status_result);
	echo "<label>设备状态<input type='text' readonly style='width:20%' name='equipment_group_arry' size='20' value='".$tb_account_status_arr['account_status_name']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input> </label>",
		"<label>状态详细<input type='text' readonly style='width:20%' name='equipment_group_remarks1' size='30' value='".$tb_account_arr['equipment_group_remarks1']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>",
"<br>",
		"<label>图纸清单<input type='text' readonly style='width:20%' name='equipment_group_design_id' size='20' value='".$tb_account_arr['equipment_group_design_id']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>",
		"<label>备件清单<input type='text' readonly style='width:20%' name='equipment_goods_arry' size='20' value='".$tb_account_arr['equipment_goods_arry']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>",
	"</fieldset>",
	"<fieldset>",
		"<legend style='border:1px'>".$tb_account_arr['account_group_id']."号设备组日志</legend>",
	"<textarea style='width:100%' readonly name='equipment_group_remarks' rows='5' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'>".$tb_account_arr['equipment_group_remarks']."</textarea>",
	"</fieldset>";
		return array($tb_account_arr['equipment_goods_arry'],$tb_account_arr['equipment_group_arry'],$tb_account_arr['equipment_group_design_id']);
	}
	function __destruct(){
		//mysql_close($this->conn);
//		print "销毁";
	}
}

