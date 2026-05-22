<?php
					include_once("Table.class.php");
class Purchase extends dkTable{
	function __construct(){
		$this->conn = mysqli_connect(parent::host,parent::username,parent::password,parent::database);
		if(!$this->conn){
			die("数据库连接失败". mysqli_connect_error());
		}else { 
	//	echo"连接成功";
		}
		mysqli_query('set names utf8');
		$this->pagesize=10;
//		$this->flag=1;
		$this->pageFunction = PurchasePage;
		$this->tableHead = array("part_id"=>"序号","declare_serial"=>"计划编号","declare_name"=>"计划名称","goods_name"=>"物品名称","goods_modle"=>"型号","part_declare_number"=>"数量","part_system"=>"所属设备","part_remarks"=>"备注","part_status"=>"状态","management"=>"管理","path"=>"./","action"=>"content");
		$this->selectinfo = array("table"=>"purchase_list","id"=>"part_id","caption"=>"采购计划","status"=>"part_status","level"=>"part_level");
		$this->keyinfo = array("number"=>"goods_name","content"=>"part_system","remark"=>"part_remarks");
		$this->sql = 'select part_id,declare_serial,declare_name,goods_name,goods_modle,part_declare_number,part_system,part_remarks,(SELECT tb_part_status.part_status_name from tb_part_status where tb_part_status.part_status_id=purchase_list.part_status) AS part_status from purchase_list where ';
		$this->count_sql = 'select count(*) from purchase_list WHERE ';
	}
	public function showLevel($level){//显示不同状态下的缺陷：0-已处理，1-未处理，2-延期缺陷
		$count_sql = $this->count_sql.$this->selectinfo['level']." = ".$level;
        	$re = mysqli_query($this->conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$num = $result[0];
		$this->num=$num;
		$str = $this->sql.$this->selectinfo['level']." = ".$level;
		$sql = $str.' order by '.$this->selectinfo['id'].' desc limit 0,'.$this->pagesize;
        	$result = mysqli_query($this->conn,$sql);
		$this->result = $result;
		$pageSql = $str.' order by '.$this->selectinfo['id'].' desc limit ';
		$this->pageSql = $pageSql;
		$this->tbodyId = "leveltbodyId".$level;
		$this->sqlId = "levelsqlId".$level;
		$this->showTable();
		if($this->num > $this->pagesize){
			$json = json_encode($this->tableHead);
			//echo $json;
			$page_obj = new Page($this->num,$this->pagesize,$this->sqlId,$this->tbodyId,$this->pageFunction,$json);
			$page_obj->showPage();
		}

	}
	public function retrievalBox(){//显示检索栏
					echo "<fieldset>",
						"<legend style='border:1px'>检索栏</legend>",
						"<label>",
							"<input type='checkbox' name='select_checkbox[part_declare_serial]'value='select_part_declare_serial'></input>采购计划</label>",
								"<select name='select_part_declare_serial' style='width:30%'  class='selectfont'>",
									"<option selected='selected' disabled='disabled'style='display: none' value=''>未选择</option>";
									$tb_part_declare_sql = "SELECT * FROM `tb_part_declare` WHERE 1";
									$tb_part_declare_result = mysqli_query($this->conn, $tb_part_declare_sql);
									while($tb_part_declare_arr=mysqli_fetch_assoc($tb_part_declare_result)){
										echo "<option value=".$tb_part_declare_arr['part_declare_id'].">".$tb_part_declare_arr['part_declare_serial']."</option>";
									}
									echo "</select>",
						"<label>",
							"<input type='checkbox' name='select_checkbox[goods_id]'value='select_goods_id'></input>备件编号</label>",
							"<select id='goods'name='select_goods_id' style='width:10%' class='selectfont'>",
									"<option selected='selected' disabled='disabled'style='display: none' value=''>无</option>";
							$tb_inventory_sql = "SELECT * FROM `tb_goods` WHERE 1";
							$tb_inventory_result = mysqli_query($this->conn, $tb_inventory_sql);
							while($tb_inventory_arr=mysqli_fetch_assoc($tb_inventory_result)){
				echo "<option value=".$tb_inventory_arr['goods_id'].">".$tb_inventory_arr['goods_id']."</option>";
		}
		echo "</select>",
						"<label><input type='checkbox' name='select_checkbox[part_status]'value='select_part_status'></input>备件状态</label>",
								"<select name='select_part_status' style='width:15%' class='selectfont'>",
									"<option selected='selected' disabled='disabled'  style='display: none' value=''></option>";
									$tb_part_status_sql = "SELECT * FROM `tb_part_status` WHERE 1";
									$tb_part_status_result = mysqli_query($this->conn, $tb_part_status_sql);
									while($tb_part_status_arr=mysqli_fetch_assoc($tb_part_status_result)){
										echo "<option value=".$tb_part_status_arr['part_status_id'].">".$tb_part_status_arr['part_status_name']."</option>";
									}
                                				echo "</select>",
						"<br>",
			"<label><input type='checkbox' name='select_checkbox[group_id]'value='select_group_id'></input>小组</label>",
				"<select name='select_group_id'style='width:15%'  class='selectfont'>",
					"<option selected='selected' disabled='disabled'  style='display: none' value=''></option>";
						$tb_group_sql = "SELECT * FROM `tb_group` WHERE 1";
						$tb_group_result = mysqli_query($this->conn, $tb_group_sql);
						while($tb_group_arr=mysqli_fetch_assoc($tb_group_result)){
                						echo "<option value=".$tb_group_arr['group_id'].">".$tb_group_arr['group_name']."</option>";
						}
                			echo "</select>",
						"<label><input type='checkbox' name='select_checkbox_key' value='select_key'>关键字</label><input type='text'style='width:50%' name='select_key' size='10'></input>",
						"</fieldset>",
						"<br>",
						"<input type='submit' style='width:100%' value='搜索'></input>";
	}
	function purchase_list_wait($part_source){
		$this->tableHead = array("part_id"=>"序号","goods_name"=>"物品名称","goods_modle"=>"型号","part_declare_number"=>"数量","part_system"=>"所属设备","part_remarks"=>"备注","management"=>"管理","path"=>"./","action"=>"purchase_list_wait");
		$this->selectinfo = array("table"=>"tb_sparepart","id"=>"part_id","caption"=>"待采购清单","status"=>"part_status","level"=>"part_level");
	$count_sql = "select count(*) from tb_sparepart where part_source=".$part_source.' AND part_declare_number > 0';
        $re = mysqli_query($this->conn,$count_sql);
        $result = mysqli_fetch_row($re);
        $num = $result[0];
	$this->num=$num;
	$str = 'select tb_sparepart.part_id,(SELECT tb_goods.goods_name from tb_goods where tb_goods.goods_id=tb_sparepart.goods_id) AS goods_name,(SELECT tb_goods.goods_modle from tb_goods where tb_goods.goods_id=tb_sparepart.goods_id) AS goods_modle,(SELECT tb_goods.goods_main_parameters from tb_goods where tb_goods.goods_id=tb_sparepart.goods_id) AS goods_main_parameters,tb_sparepart.part_declare_number,tb_sparepart.part_system,tb_sparepart.part_need_time from tb_sparepart where part_source='.$part_source.' AND part_declare_number > 0 order by part_id desc limit ';
	$sql = $str.'0,'.$this->pagesize;
        $result = mysqli_query($this->conn,$sql);
	$this->result = $result;
	$pageSql = $str;
		$this->pageSql = $pageSql;
		$this->tbodyId = "tbodyId".$part_source;
		$this->sqlId = "sqlId".$part_source;
		$this->showTable();
		if($this->num > $this->pagesize){
			$json = json_encode($this->tableHead);
			//echo $json;
			$page_obj = new Page($this->num,$this->pagesize,$this->sqlId,$this->tbodyId,$this->pageFunction,$json);
			$page_obj->showPage();
		}
	}
	public function showGoodsId($id){//显示指定备件ID的采购清单
		$this->tableHead = array("part_id"=>"序号","declare_serial"=>"计划编号","declare_name"=>"计划名称","goods_name"=>"物品名称","goods_modle"=>"型号","part_declare_number"=>"数量","part_system"=>"所属设备","part_remarks"=>"备注","part_status"=>"状态","management"=>"无","path"=>"./","action"=>"content");
		//$this->flag = false;
		$count_sql = $this->count_sql."goods_id =".$id;
        	$re = mysqli_query($this->conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$num = $result[0];
		$this->num=$num;
		$str = $this->sql."goods_id=".$id;;
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
	public function editPurchase($id){//编辑采购物质表单
		$tb_sparepart_sql = 'SELECT * FROM purchase_list WHERE part_id='.$id;
		$tb_sparepart_result = mysqli_query($this->conn, $tb_sparepart_sql);
		$tb_sparepart_arr=mysqli_fetch_assoc($tb_sparepart_result);
	echo "<fieldset>",
	"<input type='hidden' name='part_id' size='3' value=".$id."></input>",
	"<legend style='border:1px'>".$tb_sparepart_arr['declare_name']."中".$tb_sparepart_arr['goods_id']."号备件采购信息编辑</legend>",
	"<label>用途<input type='text'style='width:30%' name='part_system' size='30' value=".$tb_sparepart_arr['part_system']."></input></label>",
	"<label>申报日期<input type='text'style='width:20%' name='part_declare_time' size='30' value=".$tb_sparepart_arr['part_declare_time']."></input></label>",
	"<label>申报数量<input type='text'style='width:15%' name='part_declare_number' size='5' value=".$tb_sparepart_arr['part_declare_number']."></input></label>",
		"<br>",
	"<label>备注<input type='text'style='width:30%' name='part_remarks' size='30' value=".$tb_sparepart_arr['part_remarks']."></input> </label>",
	"<label>到达日期<input type='text'style='width:20%' name='part_come_time' size='30' value=".$tb_sparepart_arr['part_come_time']."></input></label>",
	//"<label>需求日期<input type='text'style='width:20%' name='part_need_time' size='30' value=".$tb_sparepart_arr['part_need_time']."></input></label>",
	"<label>到达数量<input type='text' style='width:15%' name='part_come_number' size='5' value=".$tb_sparepart_arr['part_come_number']."></input></label>",
		"<br>",
	"<label>费用<input type='text'style='width:30%' name='part_price' size='30' value=".$tb_sparepart_arr['part_price']."></input></label>",
	"<label>验收日期<input type='text'style='width:20%' name='part_check_time' size='30' value=".$tb_sparepart_arr['part_check_time']."></input></label>",
	"<label>申报人",
		"<select name='part_declare_people'style='width:15%' class='selectfont'>",
		"<option selected='selected' disabled='disabled'  style='display: none' value=''></option>";
		$tb_user_sql = "SELECT * FROM `tb_user` WHERE 1";
		$tb_user_result = mysqli_query($this->conn, $tb_user_sql);
		while($tb_user_arr=mysqli_fetch_assoc($tb_user_result)){
			if($tb_user_arr['user_id']==$tb_sparepart_arr['part_declare_people']){
                		echo "<option value=".$tb_user_arr['user_id']." selected='selected'>".$tb_user_arr['user_name']."</option>";
		}else{
                		echo "<option value=".$tb_user_arr['user_id'].">".$tb_user_arr['user_name']."</option>";
			}
		}
                echo "</select>",
	"</label>",
	"<br>",
	"<label>状态",
		"<select name='part_status'style='width:30%' class='selectfont'>",
		"<option selected='selected' disabled='disabled' style='display: none' value=''></option>";
		$tb_part_status_sql = "SELECT * FROM `tb_part_status` WHERE 1";
		$tb_part_status_result = mysqli_query($this->conn, $tb_part_status_sql);
		while($tb_part_status_arr=mysqli_fetch_assoc($tb_part_status_result)){
			if($tb_part_status_arr['part_status_id']==$tb_sparepart_arr['part_status']){
                	echo "<option value=".$tb_part_status_arr['part_status_id']." selected='selected'>".$tb_part_status_arr['part_status_name']."</option>";
			}else{
                	echo "<option value=".$tb_part_status_arr['part_status_id'].">".$tb_part_status_arr['part_status_name']."</option>";
			}
		}
                                        echo "</select>",
	"</label>",
			"<label>所属小组",
				"<select name='group_id'style='width:20%'  class='selectfont'>",
					"<option selected='selected' disabled='disabled'  style='display: none' value=''></option>";
						$tb_group_sql = "SELECT * FROM `tb_group` WHERE 1";
						$tb_group_result = mysqli_query($this->conn, $tb_group_sql);
						while($tb_group_arr=mysqli_fetch_assoc($tb_group_result)){
							if($tb_group_arr['group_id']==$tb_sparepart_arr['group_id']){
                						echo "<option value=".$tb_group_arr['group_id']." selected='selected'>".$tb_group_arr['group_name']."</option>";
							}else{
                						echo "<option value=".$tb_group_arr['group_id'].">".$tb_group_arr['group_name']."</option>";
							}
						}
                			echo "</select>",
				"</label>",
	//"<label>验收日期<input type='text'style='width:20%' name='part_check_time' size='30' value=".$tb_sparepart_arr['part_check_time']."></input></label>",
	"<label>验收人",
		"<select name='part_check_people'style='width:15%' class='selectfont'>",
		"<option selected='selected' disabled='disabled' style='display: none' value=''></option>";
		$tb_user_sql = "SELECT * FROM `tb_user` WHERE 1";
		$tb_user_result = mysqli_query($this->conn, $tb_user_sql);
		while($tb_user_arr=mysqli_fetch_assoc($tb_user_result)){
			if($tb_user_arr['user_id']==$tb_sparepart_arr['part_check_people']){
                echo "<option value=".$tb_user_arr['user_id']." selected='selected'>".$tb_user_arr['user_name']."</option>";
		}else{
                echo "<option value=".$tb_user_arr['user_id'].">".$tb_user_arr['user_name']."</option>";
		}
		}	
                echo "</select>",
	"</label>",
	"<br>";
		if($tb_sparepart_arr['part_level']==1){
			echo "<input type='checkbox' name='part_level' value='1'checked='checked'>取消该备件催货标记";
		}else{
			echo "<input type='checkbox' name='part_level' value='1'>选中后将该备件标记为催货";
		}
	echo "</fieldset>";
		return $tb_sparepart_arr['goods_id'];
	}
	public function lookPurchase($id){//编辑采购物质表单
		$tb_sparepart_sql = 'SELECT * FROM purchase_list WHERE part_id='.$id;
		$tb_sparepart_result = mysqli_query($this->conn, $tb_sparepart_sql);
		$tb_sparepart_arr=mysqli_fetch_assoc($tb_sparepart_result);
	echo "<fieldset>",
	"<input type='hidden' name='part_id' size='3' value=".$id."></input>",
	"<legend style='border:1px'>".$tb_sparepart_arr['declare_name']."中".$tb_sparepart_arr['goods_id']."号备件采购信息编辑</legend>",
	"<label>用途<input type='text' readonly style='width:30%' name='part_system' size='30' value='".$tb_sparepart_arr['part_system']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>",
	"<label>申报日期<input type='text' readonly style='width:20%' name='part_declare_time' size='30' value='".$tb_sparepart_arr['part_declare_time']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>",
	"<label>申报数量<input type='text' readonly style='width:15%' name='part_declare_number' size='5' value='".$tb_sparepart_arr['part_declare_number']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>",
		"<br>",
	"<label>备注<input type='text' readonly style='width:30%' name='part_remarks' size='30' value='".$tb_sparepart_arr['part_remarks']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input> </label>",
	"<label>到达日期<input type='text' readonly style='width:20%' name='part_come_time' size='30' value='".$tb_sparepart_arr['part_come_time']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>",
	"<label>到达数量<input type='text' readonly style='width:15%' name='part_come_number' size='5' value='".$tb_sparepart_arr['part_come_number']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>",
		"<br>",
	"<label>费用<input type='text' readonly style='width:30%' name='part_price' size='30' value='".$tb_sparepart_arr['part_price']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>",
	"<label>验收日期<input type='text'style='width:20%' name='part_check_time' size='30' value='".$tb_sparepart_arr['part_check_time']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>";
		$tb_user_sql = "SELECT * FROM `tb_user` WHERE `user_id` = ".$tb_sparepart_arr['part_declare_people'];
		$tb_user_result = mysqli_query($this->conn, $tb_user_sql);
		$tb_user_arr=mysqli_fetch_assoc($tb_user_result);
	echo "<label>申报人<input type='text' readonly style='width:15%' size='30' value='".$tb_user_arr['user_name']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>",
	"<br>";
		$tb_part_status_sql = "SELECT * FROM `tb_part_status` WHERE `part_status_id` =".$tb_sparepart_arr['part_status'];
		$tb_part_status_result = mysqli_query($this->conn, $tb_part_status_sql);
		$tb_part_status_arr=mysqli_fetch_assoc($tb_part_status_result);
	echo "<label>状态<input type='text' readonly style='width:30%' size='30' value='".$tb_part_status_arr['part_status_name']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>";
						$tb_group_sql = "SELECT * FROM `tb_group` WHERE `group_id` =".$tb_sparepart_arr['group_id'];
						$tb_group_result = mysqli_query($this->conn, $tb_group_sql);
						$tb_group_arr=mysqli_fetch_assoc($tb_group_result);
	echo "<label>所属小组<input type='text'style='width:20%' name='part_check_time' size='30' value='".$tb_group_arr['group_name']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>";
		$tb_user_sql = "SELECT * FROM `tb_user` WHERE `user_id` =".$tb_sparepart_arr['part_check_people'];
		$tb_user_result = mysqli_query($this->conn, $tb_user_sql);
		$tb_user_arr=mysqli_fetch_assoc($tb_user_result);
	echo "<label>验收人<input type='text' readonly style='width:15%' size='30' value='".$tb_user_arr['user_name']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>",
	"<br>";
		if($tb_sparepart_arr['part_level']==1){
			echo "<input type='checkbox' disabled='disabled' name='part_level' value='1'checked='checked'>取消该备件催货标记";
		}else{
			echo "<input type='checkbox' disabled='disabled' readonly name='part_level' value='1'>选中后将该备件标记为催货";
		}
	echo "</fieldset>";
		return array($tb_sparepart_arr['goods_id'],$tb_sparepart_arr['part_status']);
	}
	public function edit_purchase_list_wait($id){//编辑待采购物质表单
		$tb_part_sql = 'SELECT * FROM tb_sparepart WHERE part_id='.$id;
		$tb_part_result = mysqli_query($this->conn, $tb_part_sql);
		$tb_part_arr=mysqli_fetch_assoc($tb_part_result);
		echo "<fieldset>",
			"<legend style='border:1px'>编辑预提报备件</legend>",
			"<input type='hidden' name='goods_id' size='3' value=".$tb_goods_arr['goods_id']."></input>",
			"<input type='hidden' name='part_id' size='3' value=".$tb_part_arr['part_id']."></input>",
			"<label>所属设备<input type='text'style='width:30%' name='part_system' size='30' value=".$tb_part_arr['part_system']."></input></label>",
			"<label>申报人",
			"<select name='part_declare_people'style='width:15%'class='selectfont'>";
				$tb_user_sql = "SELECT * FROM `tb_user` WHERE 1";
				$tb_user_result = mysqli_query($this->conn, $tb_user_sql);
				while($tb_user_arr=mysqli_fetch_assoc($tb_user_result)){
					if($tb_user_arr['user_id']==$tb_part_arr['part_declare_people']){
                				echo "<option value=".$tb_user_arr['user_id']." selected='selected'>".$tb_user_arr['user_name']."</option>";
					}else{
                				echo "<option value=".$tb_user_arr['user_id'].">".$tb_user_arr['user_name']."</option>";
					}
				}
                	echo "</select>",
		"</label>",
		"<label>申报数量<input type='text'style='width:15%' name='part_declare_number' size='5' value=".$tb_part_arr['part_declare_number']."></input></label>",
		"<br>",
		"<label>备注<input type='text'style='width:30%' name='part_remarks' size='30' value=".$tb_part_arr['part_remarks']."></input></label>",
	"</fieldset>";
	return $tb_part_arr['goods_id'];
	}
	public function look_purchase_list_wait($id){//查看待采购物质表单
		$tb_part_sql = 'SELECT * FROM tb_sparepart WHERE part_id='.$id;
		$tb_part_result = mysqli_query($this->conn, $tb_part_sql);
		$tb_part_arr=mysqli_fetch_assoc($tb_part_result);
		echo "<fieldset>",
			"<legend style='border:1px'>编辑预提报备件</legend>",
			"<input type='hidden' name='goods_id' size='3' value=".$tb_goods_arr['goods_id']."></input>",
			"<input type='hidden' name='part_id' size='3' value=".$id."></input>";
			echo "<label>所属设备<input type='text' readonly style='width:30%' name='part_system' size='30' value='".$tb_part_arr['part_system']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>";
				$tb_user_sql = "SELECT * FROM `tb_user` WHERE `user_id` =". $tb_part_arr['part_declare_people'];
				$tb_user_result = mysqli_query($this->conn, $tb_user_sql);
				$tb_user_arr=mysqli_fetch_assoc($tb_user_result);
				echo "<label>申报人";
				echo "<input type='text' readonly style='width:15%' size='30' value='".$tb_user_arr['user_name']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'/>";
		echo "</label>",
		"<label>申报数量<input type='text' readonly style='width:15%' name='part_declare_number' size='5' value=".$tb_part_arr['part_declare_number']." onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>",
		"<br>",
		"<label>备注<input type='text' readonly style='width:30%' name='part_remarks' size='30' value='".$tb_part_arr['part_remarks']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>",
	"</fieldset>";
	return $tb_part_arr['goods_id'];
	}
	public function purchase_in_check($id){//加入物资待采购单
		$tb_sparepart_sql = 'SELECT * FROM tb_sparepart WHERE part_id='.$id;
		$tb_sparepart_result = mysqli_query($this->conn, $tb_sparepart_sql);
		$tb_sparepart_arr=mysqli_fetch_assoc($tb_sparepart_result);
echo "<fieldset>",
	"<legend style='border:1px'>验收 &rarr;入大库表单</legend>",
"<input type='hidden' name='goods_id' size='3' value=".$tb_sparepart_arr['goods_id']."></input>",
"<input type='hidden' name='part_id' size='3' value=".$_GET['id']."></input>",
	"<label>入库日期<input type='text'style='width:20%' name='part_come_time' size='30' value=".$tb_sparepart_arr['part_come_time']."></input></label>",
	"<label>费用<input type='text'style='width:10%' name='part_price' size='30' value=".$tb_sparepart_arr['part_price']."></input></label>",
	"<label>验收人",
		"<select name='part_check_people'style='width:15%'class='selectfont'>",
		"<option selected='selected' disabled='disabled' style='display: none' value=''></option>";
		$tb_user_sql = "SELECT * FROM `tb_user` WHERE 1";
		$tb_user_result = mysqli_query($this->conn, $tb_user_sql);
		while($tb_user_arr=mysqli_fetch_assoc($tb_user_result)){
			if($tb_user_arr['user_id']==$tb_sparepart_arr['part_check_people']){
                		echo "<option value=".$tb_user_arr['user_id']." selected='selected'>".$tb_user_arr['user_name']."</option>";
			}else{
                		echo "<option value=".$tb_user_arr['user_id'].">".$tb_user_arr['user_name']."</option>";
			}
		}	
                echo "</select>",
		"</label>",
"<br>",
	"<label>所属设备<input type='text'style='width:20%' name='part_system' size='30' value=".$tb_sparepart_arr['part_system']."></input></label>",
	//"<label>入小库日期<input type='text'style='width:20%' name='part_check_time' size='30' value=".$tb_sparepart_arr['part_check_time']."></input></label>",
	"<label>数量<input type='text'style='width:10%' name='part_come_number' size='5' value=".$tb_sparepart_arr['part_come_number']."></input></label>",
	"<label>备注<input type='text'style='width:30%' name='part_remarks' size='30' value=".$tb_sparepart_arr['part_remarks']."></input></label>",
"</fieldset>";
	return $tb_sparepart_arr['goods_id'];
	}
	public function add_purchase_list_wait($id){//将ID=id的物品加入物资待采购单
echo "<fieldset>",
"<legend style='border:1px'>预提报备件</legend>",
"<input type='hidden' name='goods_id' size='3' value=".$id."></input>",
	"<label>所属设备<input type='text' style='width:30%'name='part_system' size='30' value=''></input></label>",
	"<label>申报人",
		"<select name='part_declare_people' style='width:15%' class='selectfont'>",
		"<option selected='selected' disabled='disabled' style='display: none' value=''></option>",
		$tb_user_sql = "SELECT * FROM `tb_user` WHERE 1";
		$tb_user_result = mysqli_query($this->conn, $tb_user_sql);
		while($tb_user_arr=mysqli_fetch_assoc($tb_user_result)){
                echo "<option value=".$tb_user_arr['user_id'].">".$tb_user_arr['user_name']."</option>";
		}
                echo "</select>",
"</label>",
	"<label>申报数量:<input type='text' style='width:15%'name='part_declare_number' size='5' value='-1'></input></label>",
	"<label>备注<input type='text' style='width:15%'name='part_remarks' size='30' value=''></input></label>",
"</fieldset>";
	}
	public function add_purchase_list($id){//加入物资采购单
		$tb_part_sql = 'SELECT * FROM tb_sparepart WHERE part_id='.$id;
		$tb_part_result = mysqli_query($this->conn, $tb_part_sql);
		$tb_part_arr=mysqli_fetch_assoc($tb_part_result);
echo "<fieldset>",
"<legend style='border:1px'>增加采购物资</legend>",
"<input type='hidden' name='part_id' size='3' value=".$id."></input>",
"<input type='hidden' name='goods_id' size='3' value=".$tb_goods_arr['goods_id']."></input>",
	"<label>计划编号",
		"<select name='part_declare_serial'style='width:20%' class='selectfont'>",
		"<option selected='selected' disabled='disabled' style='display: none' value=''></option>";
		$tb_part_declare_sql = "SELECT * FROM `tb_part_declare` WHERE 1";
		$tb_part_declare_result = mysqli_query($this->conn, $tb_part_declare_sql);
		while($tb_part_declare_arr=mysqli_fetch_assoc($tb_part_declare_result)){
                echo "<option value=".$tb_part_declare_arr['part_declare_id'].">".$tb_part_declare_arr['part_declare_serial']."</option>";
		}
                echo "</select>",
	"</label>",
	"<label>申报日期<input type='text'style='width:20%' name='part_declare_time' size='30' value='0000-00-00'></label>",
	"<label>所属设备<input type='text'style='width:20%' name='part_system' size='30' value=".$tb_part_arr['part_system']."></input></label>",
	"<label>申报人",
		"<select name='part_declare_people'style='width:15%' class='selectfont'>",
		"<option selected='selected' disabled='disabled' style='display: none' value=''></option>";
		$tb_user_sql = "SELECT * FROM `tb_user` WHERE 1";
		$tb_user_result = mysqli_query($this->conn, $tb_user_sql);
		while($tb_user_arr=mysqli_fetch_assoc($tb_user_result)){
			if($tb_user_arr['user_id']==$tb_part_arr['part_declare_people']){
                echo "<option value=".$tb_user_arr['user_id']." selected='selected'>".$tb_user_arr['user_name']."</option>";
			}else{
                echo "<option value=".$tb_user_arr['user_id'].">".$tb_user_arr['user_name']."</option>";
			}
		}
                echo "</select>",
	"</label>",
"<br>",
	"<label>计划名称<input type='text'style='width:20%' name='part_system' size='30' value='未选择'></label>",
	"<label>需求日期<input type='text'style='width:20%' name='part_need_time' size='30' value='0000-00-00'></input></label>",
	"<label>申报数量<input type='text'style='width:10%' name='part_declare_number' size='5' value=".$tb_part_arr['part_declare_number']."></input></label>",
	"<label>备注<input type='text'style='width:20%' name='part_remarks' size='30' value=".$tb_part_arr['part_remarks']."></input></label>",
"</fieldset>";
	return $tb_part_arr['goods_id'];
	}
}

