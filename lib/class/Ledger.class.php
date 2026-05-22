<?php
					include_once("Table.class.php");
class Ledger extends dkTable{
	function __construct(){
		$this->conn = mysqli_connect(parent::host,parent::username,parent::password,parent::database);
		if(!$this->conn){
			die("数据库连接失败". mysqli_connect_error());
		}else { 
	//	echo"连接成功";
		}
		mysqli_query('set names utf8');
		$this->pagesize=10;
		$this->pageFunction = LedgerPage;
		//echo"test";
		$this->tableHead = array("account_id"=>"编号","equipment_kks"=>"KKS","equipment_name"=>"设备名称","goods_name"=>"设备信息","equipment_position"=>"安装位置","management"=>"管理","path"=>"./","action"=>"content");
		$this->selectinfo = array("table"=>"tb_account","id"=>"account_id","caption"=>"设备列表","status"=>"equipment_status","quick"=>"defect_find_time");
		$this->keyinfo = array("number"=>"equipment_kks","content"=>"equipment_name","remark"=>"equipment_remarks1");
		$this->sql = "SELECT tb_account.account_id,tb_account.equipment_kks,tb_account.equipment_name,(SELECT tb_goods.goods_name FROM tb_goods WHERE tb_goods.goods_id = tb_account.equipment_goods_id)AS goods_name,tb_account.equipment_position FROM tb_account WHERE ";
		$this->count_sql = "select count(*) from tb_account WHERE ";
	}
	public function retrievalBox(){//显示检索栏
	echo "<fieldset>",
		"<legend style='border:1px'>检索选择</legend>";
					$area_option = array("table"=>"tb_area","key"=>"area_system","value"=>0,"option_id"=>"area_id","option_value"=>"area_content");
					$area_json = json_encode($area_option);
		echo "<label><input type='checkbox' name='select_checkbox[equipment_system_id]' value='select_equipment_system_id'></input>系统</label>",
		"<select name='select_equipment_system_id' style='width:25%' id='sys' class='selectfont'onchange=check(this.options[options.selectedIndex].value,'seek_area',$area_json)>",
			"<option selected='selected' disabled='disabled'  style='display: none' value=''></option>";
			$tb_system_sql = "SELECT * FROM `tb_system` WHERE 1";
			$tb_system_result = mysqli_query($this->conn, $tb_system_sql);
			while($tb_system_arr=mysqli_fetch_assoc($tb_system_result)){
                       		echo "<option value=".$tb_system_arr['system_id'].">".$tb_system_arr['system_content']."</option>";
			}
		echo "</select>",
		"<label><input type='checkbox' name='select_checkbox[equipment_level]' value='select_equipment_level'></input>等级</label>",
		"<select name='select_equipment_level'style='width:20%' class='selectfont'>",
			"<option selected='selected' disabled='disabled'  style='display: none' value=''></option>";
			$tb_equipment_level_sql = "SELECT * FROM `tb_equipment_level` WHERE 1";
		$tb_equipment_level_result = mysqli_query($this->conn, $tb_equipment_level_sql);
		while($tb_equipment_level_arr=mysqli_fetch_assoc($tb_equipment_level_result)){
               			echo "<option value=".$tb_equipment_level_arr['equipment_level_id'].">".$tb_equipment_level_arr['equipment_level_name']."</option>";
		}
		echo "</select>",
		"<label><input type='checkbox' name='select_checkbox[equipment_goods_id]'value='select_equipment_goods_id'></input>一次备件</label>",
		"<select id='goods'name='select_equipment_goods_id'style='width:20%' class='selectfont'>",
			"<option selected='selected' disabled='disabled'  style='display: none' value=''></option>";
			$tb_account_goods_sql = "SELECT * FROM `tb_goods` WHERE 1";
			$tb_account_goods_result = mysqli_query($this->conn, $tb_account_goods_sql);
			while($tb_account_goods_arr=mysqli_fetch_assoc($tb_account_goods_result)){
               			echo "<option value=".$tb_account_goods_arr['goods_id'].">".$tb_account_goods_arr['goods_id']."</option>";
			}
		echo "</select><br>",
		"<label><input type='checkbox' name='select_checkbox[equipment_area_id]' value='select_equipment_area_id'></input>区域</label>",
		"<select id='seek_area' name='select_equipment_area_id'style='width:25%' class='selectfont'>",
			"<option value='-1'>--请选择--</option>",
                "</select>",
		"<label><input type='checkbox' name='select_checkbox[equipment_status]'value='select_equipment_status'></input>状态</label>",
		"<select name='select_equipment_status'style='width:20%' class='selectfont'>",
		"<option selected='selected' disabled='disabled' style='display: none' value=''></option>",
		$tb_account_status_sql = "SELECT * FROM `tb_account_status` WHERE 1";
		$tb_account_status_result = mysqli_query($this->conn, $tb_account_status_sql);
		while($tb_account_status_arr=mysqli_fetch_assoc($tb_account_status_result)){
               			echo "<option value=".$tb_account_status_arr['account_status_id'].">".$tb_account_status_arr['account_status_name']."</option>";
		}
		echo "</select>",
		"<label><input type='checkbox' name='select_checkbox[equipment_goods_id1]'value='select_equipment_goods_id1'></input>二次备件</label>",
		"<select id='goods1'name='select_equipment_goods_id1'style='width:20%' class='selectfont'>",
			"<option selected='selected' disabled='disabled'  style='display: none' value=''></option>",
			//从tb_account_goods数据库中取出所有区域信息,添加区域下拉列表
			$tb_account_goods_sql = "SELECT * FROM `tb_goods` WHERE 1";
			$tb_account_goods_result = mysqli_query($this->conn, $tb_account_goods_sql);
			while($tb_account_goods_arr=mysqli_fetch_assoc($tb_account_goods_result)){
               			echo "<option value=".$tb_account_goods_arr['goods_id'].">".$tb_account_goods_arr['goods_id']."</option>";
			}
		echo "</select><br>",
		"<label><input type='checkbox' name='select_checkbox_key' value='select_key'></input>关键字（含KKS编码）</label>",
		"<input type='text' name='select_key'style='width:50%' size='10' placeholder='KKS码/设备名称/关键字'></input>",
		"<input type='submit'style='width:100%' value='搜索'></input>",
"</fieldset>";
	}
	public function addLedger(){//生成新增缺陷表单
		echo "<fieldset>",
			"<legend style='border:1px'>新增设备基本信息</legend>",
			"<label>设备编码<input type='text'style='width:25%' name='equipment_kks' size='20' value=''></input></label>";
					$area_option = array("table"=>"tb_area","key"=>"area_system","value"=>0,"option_id"=>"area_id","option_value"=>"area_content");
					$area_json = json_encode($area_option);
			echo "<label>所属系统",
				"<select name='equipment_system_id'style='width:25%' id='sys' class='selectfont' onchange=check(this.options[options.selectedIndex].value,'area',$area_json)>";
					$tb_system_sql = "SELECT * FROM `tb_system` WHERE 1";
					$tb_system_result = mysqli_query($this->conn, $tb_system_sql);
					while($tb_system_arr=mysqli_fetch_assoc($tb_system_result)){
                                        		echo "<option value=".$tb_system_arr['system_id'].">".$tb_system_arr['system_content']."</option>";
					}
				echo "</select>",
			"</label>",
			"<label>信息<input type='text'style='width:20%' name='equipment_remarks' size='30' value=''></input></label>",
			"<br>",
			"<label>设备名称<input type='text'style='width:25%' name='equipment_name' size='20' value=''></input></label>",
			"<label>所属区域",
				"<select id='area'style='width:25%'name='equipment_area_id' class='selectfont'>";
					$tb_area_sql = "SELECT * FROM `tb_area` WHERE 1";
					$tb_area_result = mysqli_query($this->conn, $tb_area_sql);
					while($tb_area_arr=mysqli_fetch_assoc($tb_area_result)){
               						echo "<option value=".$tb_area_arr['area_id'].">".$tb_area_arr['area_content']."</option>";
					}
				echo "</select>",
			"</label>",
			"<label>位置<input type='text'style='width:20%' name='equipment_position' size='20' value=''></input></label>",
		"</fieldset>",
		"<fieldset>",
			"<legend style='border:1px'>号设备其他信息</legend>",
			"<label>一次备件编号",
				"<select id='goods'style='width:10%'name='equipment_goods_id' class='selectfont'onchange=\"check(this.options[options.selectedIndex].value,'goodsname')\">";
					$tb_account_goods_sql = "SELECT * FROM `tb_goods` WHERE 1";
					$tb_account_goods_result = mysqli_query($this->conn, $tb_account_goods_sql);
					while($tb_account_goods_arr=mysqli_fetch_assoc($tb_account_goods_result)){
               						echo "<option value=".$tb_account_goods_arr['goods_id'].">".$tb_account_goods_arr['goods_id']."</option>";
					}
				echo "</select>",
			"</label>",
			"<label>设备等级",
				"<select name='equipment_level'style='width:15%' class='selectfont'>";
					$tb_equipment_level_sql = "SELECT * FROM `tb_equipment_level` WHERE 1";
					$tb_equipment_level_result = mysqli_query($this->conn, $tb_equipment_level_sql);
					while($tb_equipment_level_arr=mysqli_fetch_assoc($tb_equipment_level_result)){
               						echo "<option value=".$tb_equipment_level_arr['equipment_level_id'].">".$tb_equipment_level_arr['equipment_level_name']."</option>";
					}
				echo "</select>",
			"</label>",
			"<label>检索关键字<input type='text'style='width:35%' name='equipment_remarks1' size='30' value=''></input></label>",
			"<br>",
			"<label>二次备件编号",
				"<select id='goods1'style='width:10%'name='equipment_goods_id1' class='selectfont'onchange=\"check(this.options[options.selectedIndex].value,'goodsname1')\">",
					$tb_account_goods1_sql = "SELECT * FROM `tb_goods` WHERE 1";
					$tb_account_goods1_result = mysqli_query($this->conn, $tb_account_goods1_sql);
					while($tb_account_goods1_arr=mysqli_fetch_assoc($tb_account_goods1_result)){
               						echo "<option value=".$tb_account_goods1_arr['goods_id'].">".$tb_account_goods1_arr['goods_id']."</option>";
					}
				echo "</select>",
			"</label>",
			"<label>设备状态",
				"<select name='equipment_status'style='width:15%' class='selectfont'>",
					$tb_account_status_sql = "SELECT * FROM `tb_account_status` WHERE 1";
					$tb_account_status_result = mysqli_query($this->conn, $tb_account_status_sql);
					while($tb_account_status_arr=mysqli_fetch_assoc($tb_account_status_result)){
               						echo "<option value=".$tb_account_status_arr['account_status_id'].">".$tb_account_status_arr['account_status_name']."</option>";
					}
				echo "</select>",
			"</label>",
		"</fieldset>",
		"<fieldset>",
			"<legend style='border:1px'>号设备日志</legend>",
			"<textarea style='width:100%' name ='equipment_logs' id='textarea'rows='5'></textarea>",
		"</fieldset>";
	}
	public function editLedger($ledgerId){//编辑台帐表单
		$tb_account_sql = 'SELECT * FROM tb_account WHERE account_id='.$ledgerId;
		$tb_account_result = mysqli_query($this->conn, $tb_account_sql);
		$tb_account_arr=mysqli_fetch_assoc($tb_account_result);
		echo "<fieldset id='fieldset1' disabled='true'>",
			"<legend style='border:1px'>".$tb_account_arr['account_id']."号设备基本信息<input onclick=\"lockBox(this,'fieldset1')\" type='button'value='🔓'></input></legend>",
			"<input type='hidden' name='account_id' value=".$tb_account_arr['account_id']."></input>",
			"<label>设备编码<input type='text'style='width:25%' name='equipment_kks' size='20' value=".$tb_account_arr['equipment_kks']."></input></label>";
					$area_option = array("table"=>"tb_area","key"=>"area_system","value"=>0,"option_id"=>"area_id","option_value"=>"area_content");
					$area_json = json_encode($area_option);
			echo "<label>所属系统",
				"<select name='equipment_system_id'style='width:25%' id='sys' class='selectfont' onchange=check(this.options[options.selectedIndex].value,'area',$area_json)>";
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
			"<label>信息<input type='text'style='width:20%' name='equipment_remarks' size='30' value=".$tb_account_arr['equipment_remarks']."></input></label>",
			"<br>",
			"<label>设备名称<input type='text'style='width:25%' name='equipment_name' size='20' value=".$tb_account_arr['equipment_name']."></input></label>",
			"<label>所属区域",
				"<select id='area'style='width:25%'name='equipment_area_id' class='selectfont'>";
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
			"<label>位置<input type='text'style='width:20%' name='equipment_position' size='20' value=".$tb_account_arr['equipment_position']."></input></label>",
		"</fieldset>",
		"<fieldset id='fieldset2' disabled='true'>",
			"<legend style='border:1px'>".$tb_account_arr['account_id']."号设备其他信息<input onclick=\"lockBox(this,'fieldset2')\" type='button'value='🔓'></legend>",
			"<label>一次备件编号",
				"<select id='goods'style='width:10%'name='equipment_goods_id' class='selectfont'onchange=\"check(this.options[options.selectedIndex].value,'goodsname')\">";
					$tb_account_goods_sql = "SELECT * FROM `tb_goods` WHERE 1";
					$tb_account_goods_result = mysqli_query($this->conn, $tb_account_goods_sql);
					while($tb_account_goods_arr=mysqli_fetch_assoc($tb_account_goods_result)){
						if($tb_account_goods_arr['goods_id']==$tb_account_arr['equipment_goods_id']){
                        				echo "<option value=".$tb_account_goods_arr['goods_id']." selected='selected'>".$tb_account_goods_arr['goods_id']."</option>";
						}else{
               						echo "<option value=".$tb_account_goods_arr['goods_id'].">".$tb_account_goods_arr['goods_id']."</option>";
						}
					}
				echo "</select>",
			"</label>",
			"<label>设备等级",
				"<select name='equipment_level'style='width:15%' class='selectfont'>";
					$tb_equipment_level_sql = "SELECT * FROM `tb_equipment_level` WHERE 1";
					$tb_equipment_level_result = mysqli_query($this->conn, $tb_equipment_level_sql);
					while($tb_equipment_level_arr=mysqli_fetch_assoc($tb_equipment_level_result)){
						if($tb_equipment_level_arr['equipment_level_id']==$tb_account_arr['equipment_level']){
               						echo "<option value=".$tb_equipment_level_arr['equipment_level_id']." selected='selected'>".$tb_equipment_level_arr['equipment_level_name']."</option>";
						}else{
               						echo "<option value=".$tb_equipment_level_arr['equipment_level_id'].">".$tb_equipment_level_arr['equipment_level_name']."</option>";
						}
					}
				echo "</select>",
			"</label>",
			"<label>检索关键字<input type='text'style='width:35%' name='equipment_remarks1' size='30' value=".$tb_account_arr['equipment_remarks1']."></input></label>",
			"<br>",
			"<label>二次备件编号",
				"<select id='goods1'style='width:10%'name='equipment_goods_id1' class='selectfont'onchange=\"check(this.options[options.selectedIndex].value,'goodsname1')\">",
					$tb_account_goods1_sql = "SELECT * FROM `tb_goods` WHERE 1";
					$tb_account_goods1_result = mysqli_query($this->conn, $tb_account_goods1_sql);
					while($tb_account_goods1_arr=mysqli_fetch_assoc($tb_account_goods1_result)){
						if($tb_account_goods1_arr['goods_id']==$tb_account_arr['equipment_goods_id1']){
                        				echo "<option value=".$tb_account_goods1_arr['goods_id']." selected='selected'>".$tb_account_goods1_arr['goods_id']."</option>";
						}else{
               						echo "<option value=".$tb_account_goods1_arr['goods_id'].">".$tb_account_goods1_arr['goods_id']."</option>";
						}
					}
				echo "</select>",
			"</label>",
			"<label>设备状态",
				"<select name='equipment_status'style='width:15%' class='selectfont'>",
					$tb_account_status_sql = "SELECT * FROM `tb_account_status` WHERE 1";
					$tb_account_status_result = mysqli_query($this->conn, $tb_account_status_sql);
					while($tb_account_status_arr=mysqli_fetch_assoc($tb_account_status_result)){
						if($tb_account_status_arr['account_status_id']==$tb_account_arr['equipment_status']){
                        				echo "<option value=".$tb_account_status_arr['account_status_id']." selected='selected'>".$tb_account_status_arr['account_status_name']."</option>";
						}else{
               						echo "<option value=".$tb_account_status_arr['account_status_id'].">".$tb_account_status_arr['account_status_name']."</option>";
						}
					}
				echo "</select>",
			"</label>",
		"</fieldset>",
		"<fieldset id='fieldset3'disabled='true'>",
			"<legend style='border:1px'>".$tb_account_arr['account_id']."号设备日志<input onclick=\"lockBox(this,'fieldset3')\" type='button'value='🔓'></input></legend>",
			"<textarea style='width:100%' name ='equipment_logs' id='textarea'rows='5'>".$tb_account_arr['equipment_logs']."</textarea>",
		"</fieldset>";
		return array($tb_account_arr['equipment_goods_id'],$tb_account_arr['equipment_goods_id1'],$tb_account_arr['equipment_kks'],$tb_account_arr['equipment_system_id']);
	}
	public function lookLedger($ledgerId){//编辑台帐表单
		$tb_account_sql = 'SELECT * FROM tb_account WHERE account_id='.$ledgerId;
		$tb_account_result = mysqli_query($this->conn, $tb_account_sql);
		$tb_account_arr=mysqli_fetch_assoc($tb_account_result);
		echo "<fieldset>",
			"<legend style='border:1px'>".$tb_account_arr['account_id']."号设备基本信息</legend>",
			"<label>设备编码<input type='text' readonly style='width:25%' size='20' value='".$tb_account_arr['equipment_kks']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>";
					$tb_area_sql = "SELECT * FROM `tb_area` WHERE area_id =".$tb_account_arr['equipment_area_id'];
					$tb_area_result = mysqli_query($this->conn, $tb_area_sql);
					$tb_area_arr=mysqli_fetch_assoc($tb_area_result);
			echo "<label>所属区域<input type='text' readonly style='width:25%' size='20' value='".$tb_area_arr['area_content']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>",
			"<label>信息<input type='text' readonly style='width:20%' size='30' value='".$tb_account_arr['equipment_remarks']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>",
			"<br>",
			"<label>设备名称<input type='text' readonly style='width:25%' size='20' value='".$tb_account_arr['equipment_name']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>";
					$tb_system_sql = "SELECT * FROM `tb_system` WHERE system_id=".$tb_account_arr['equipment_system_id'];
					$tb_system_result = mysqli_query($this->conn, $tb_system_sql);
					$tb_system_arr=mysqli_fetch_assoc($tb_system_result);
			echo "<label>所属系统<input type='text' readonly style='width:25%' size='20' value='".$tb_system_arr['system_content']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>",
			"<label>位置<input type='text' readonly style='width:20%' size='20' value='".$tb_account_arr['equipment_position']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>",
		"</fieldset>",
		"<fieldset>",
			"<legend style='border:1px'>".$tb_account_arr['account_id']."号设备其他信息</legend>";
			echo "<label>一次备件编号<input type='text' readonly style='width:10%' size='20' value='".$tb_account_arr['equipment_goods_id']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>";
					$tb_equipment_level_sql = "SELECT * FROM `tb_equipment_level` WHERE equipment_level_id=".$tb_account_arr['equipment_level'];
					$tb_equipment_level_result = mysqli_query($this->conn, $tb_equipment_level_sql);
					$tb_equipment_level_arr=mysqli_fetch_assoc($tb_equipment_level_result);
			echo "<label>设备等级<input type='text' readonly style='width:15%' size='20' value='".$tb_equipment_level_arr['equipment_level_name']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>",
			"<label>检索关键字<input type='text' readonly style='width:35%' size='30' value='".$tb_account_arr['equipment_remarks1']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>",
			"<br>",
			"<label>二次备件编号<input type='text' readonly style='width:10%' size='30' value='".$tb_account_arr['equipment_goods_id1']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>";
					$tb_account_status_sql = "SELECT * FROM `tb_account_status` WHERE account_status_id=".$tb_account_arr['equipment_status'];
					$tb_account_status_result = mysqli_query($this->conn, $tb_account_status_sql);
					$tb_account_status_arr=mysqli_fetch_assoc($tb_account_status_result);
			echo "<label>设备状态<input type='text' readonly style='width:10%' size='30' value='".$tb_account_status_arr['account_status_name']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>",
		"</fieldset>",
		"<fieldset>",
			"<legend style='border:1px'>".$tb_account_arr['account_id']."号设备日志</legend>",
			"<textarea style='width:100%' readonly rows='5'>".$tb_account_arr['equipment_logs']."</textarea>",
		"</fieldset>";
		return array($tb_account_arr['equipment_goods_id'],$tb_account_arr['equipment_goods_id1'],$tb_account_arr['equipment_kks']);
	}
	public function showStrId($strid){//显示指定备件str的清单以@间隔
		$this->tableHead = array("account_id"=>"编号","equipment_kks"=>"KKS","equipment_name"=>"设备名称","goods_name"=>"设备信息","equipment_position"=>"安装位置","management"=>"无","action"=>"content");
		$count_str = "select count(*) from tb_account where account_id= ";
		$sql_str = "SELECT tb_account.account_id,tb_account.equipment_kks,tb_account.equipment_name,(SELECT tb_goods.goods_name FROM tb_goods WHERE tb_goods.goods_id = tb_account.equipment_goods_id)AS goods_name,tb_account.equipment_position FROM tb_account WHERE account_id= ";
			$group_arr=explode('@',$strid);
			for($x=0;$x<count($group_arr);$x++){
				$str.=$group_arr[$x];
				$str.= " OR account_id= ";
			}
			$str=chop($str," OR account_id= ");
			$sql_str.=$str;
			$count_str.=$str;

		$count_sql = $count_str;
        	$re = mysqli_query($this->conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$num = $result[0];
		$this->num=$num;
		//$str = $this->sql."goods_id=".$id;;
		$sql = $sql_str.' order by '.$this->selectinfo['id'].' asc limit 0,'.$this->pagesize;
		//echo $sql;
        	$result = mysqli_query($this->conn,$sql);
		$this->result = $result;
		$pageSql = $sql_str.' order by '.$this->selectinfo['id'].' asc limit ';
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
	public function showtiaoStatus($status){//显示不同状态下的缺陷：0-已处理，1-未处理，2-延期缺陷
		$this->sql = "SELECT tb_account.account_id,tb_account.equipment_kks,tb_account.equipment_name,(SELECT tb_goods.goods_name FROM tb_goods WHERE tb_goods.goods_id = tb_account.equipment_goods_id)AS goods_name,tb_account.equipment_position FROM tb_account WHERE equipment_system_id = 20 AND ";
		$this->count_sql = "select count(*) from tb_account WHERE equipment_system_id = 20 AND ";
		$this->showStatus($status);


	}
	function __destruct(){
		//mysql_close($this->conn);
//		print "销毁";
	}
}
