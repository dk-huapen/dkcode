<?php
					include_once("Table.class.php");
class Inventory extends dkTable{
	function __construct(){
		$this->conn = mysqli_connect(parent::host,parent::username,parent::password,parent::database);
		if(!$this->conn){
			die("数据库连接失败". mysqli_connect_error());
		}else { 
	//	echo"连接成功";
		}
		mysqli_query('set names utf8');
		$this->pagesize=10;
		$this->pageFunction = InventoryPage;
		$this->tableHead = array("inventory_id"=>"编号","goods_name"=>"名称","goods_modle"=>"型号","inventory_number"=>"数量","inventory_remarks"=>"备注","management"=>"管理","path"=>"./","action"=>"content");
		$this->selectinfo = array("table"=>"inventory_now","id"=>"inventory_id","caption"=>"库存清单","status"=>"inventory_status","quick"=>"defect_find_time");
		$this->keyinfo = array("number"=>"goods_name","content"=>"inventory_position","remark"=>"inventory_remarks");
		$this->sql = "select inventory_id,goods_name,goods_modle,inventory_number,inventory_remarks from inventory_now where ";
		$this->count_sql = "select count(*) from inventory_now where ";
	}
	public function retrievalBox(){//显示检索栏
		echo "<fieldset>",
			"<legend style='border:1px'>检索栏</legend>",
			"<label><input type='checkbox' name='select_checkbox[goods_id]'value='select_goods_id'></input>备件编号</label>",
				"<select id='goods'name='select_goods_id' style='width:10%' class='selectfont'>",
					"<option selected='selected' disabled='disabled'style='display: none' value=''>未选择</option>";
					$tb_inventory_sql = "SELECT * FROM `tb_goods` WHERE 1";
					$tb_inventory_result = mysqli_query($this->conn, $tb_inventory_sql);
					while($tb_inventory_arr=mysqli_fetch_assoc($tb_inventory_result)){
						echo "<option value=".$tb_inventory_arr['goods_id'].">".$tb_inventory_arr['goods_id']."</option>";
					}
				echo "</select>",
			"<label><input type='checkbox' name='select_checkbox[inventory_status]'value='select_inventory_status'></input>状态</label>",
				"<select id='status'name='select_inventory_status' style='width:10%' class='selectfont'>",
					"<option selected='selected' disabled='disabled'style='display: none' value=''>未选择</option>";
					$tb_inventory_sql = "SELECT * FROM `tb_inventory_status` WHERE 1";
					$tb_inventory_result = mysqli_query($this->conn, $tb_inventory_sql);
					while($tb_inventory_arr=mysqli_fetch_assoc($tb_inventory_result)){
						echo "<option value=".$tb_inventory_arr['inventory_status_id'].">".$tb_inventory_arr['inventory_status_name']."</option>";
					}
				echo "</select>",
			"<label><input type='checkbox' name='select_checkbox[group_id]'value='select_group_id'></input>小组</label>",
				"<select name='select_group_id'style='width:15%'  class='selectfont'>",
					"<option selected='selected' disabled='disabled'  style='display: none' value=''></option>";
						$tb_group_sql = "SELECT * FROM `tb_group` WHERE 1";
						$tb_group_result = mysqli_query($this->conn, $tb_group_sql);
						while($tb_group_arr=mysqli_fetch_assoc($tb_group_result)){
                						echo "<option value=".$tb_group_arr['group_id'].">".$tb_group_arr['group_name']."</option>";
						}
                			echo "</select>",
						"<label><input type='checkbox' name='select_checkbox_key' value='select_key'>关键字</label><input type='text'style='width:25%' name='select_key' size='10'placeholder='名称/备注/位置'></input>",
						"</fieldset>",
						"<br>",
						"<input type='submit' style='width:100%' value='搜索'></input>";
	}
	public function showGoodsId($id){//显示指定备件ID的库存清单
		$this->tableHead = array("inventory_id"=>"编号","goods_name"=>"名称","goods_modle"=>"型号","inventory_number"=>"数量","inventory_remarks"=>"备注","management"=>"无","action"=>"content");
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
	public function editInventory($id){//生成编辑库存表单
						$tb_inventory_sql = 'SELECT * FROM inventory_now WHERE inventory_id='.$id;
						$tb_inventory_result = mysqli_query($this->conn, $tb_inventory_sql);
						$tb_inventory_arr=mysqli_fetch_assoc($tb_inventory_result);
		echo "<fieldset>",
	"<input type='hidden' name='inventory_id' size='3' value=".$id."></input>",
			"<legend style='border:1px'>编辑".$_GET['id']."号库存表单信息</legend>",
			"<label>数量<input type='text'style='width:10%' name='inventory_number' size='30' value=".$tb_inventory_arr['inventory_number']."></input></label>",
			"<label>位置<input type='text'style='width:30%' name='inventory_position' size='30' value=".$tb_inventory_arr['inventory_position']."></input></label>";
					$tb_status_sql = "SELECT * FROM `tb_inventory_status` WHERE `inventory_status_id` =".$tb_inventory_arr['inventory_status'];
					$tb_status_result = mysqli_query($this->conn, $tb_status_sql);
					$tb_status_arr=mysqli_fetch_assoc($tb_status_result);
	echo "<label>库房<input type='text' readonly style='width:15%' size='30' value='".$tb_status_arr['inventory_status_name']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>",
			"<br>",
			"<label>价格<input type='text'style='width:10%' name='inventory_price' size='30' value=".$tb_inventory_arr['inventory_price']."></input></label>",
			"<label>备注<input type='text'style='width:30%' name='inventory_remarks' size='30' value=".$tb_inventory_arr['inventory_remarks']."></input></label>",
			"<label>小组",
				"<select name='group_id'style='width:15%'  class='selectfont'>",
					"<option selected='selected' disabled='disabled'  style='display: none' value=''></option>";
						$tb_group_sql = "SELECT * FROM `tb_group` WHERE 1";
						$tb_group_result = mysqli_query($this->conn, $tb_group_sql);
						while($tb_group_arr=mysqli_fetch_assoc($tb_group_result)){
							if($tb_group_arr['group_id']==$tb_inventory_arr['group_id']){
                						echo "<option value=".$tb_group_arr['group_id']." selected='selected'>".$tb_group_arr['group_name']."</option>";
							}else{
                						echo "<option value=".$tb_group_arr['group_id'].">".$tb_group_arr['group_name']."</option>";
							}
						}
                			echo "</select>",
				"</label>",
		"</fieldset>";
						return $tb_inventory_arr['goods_id'];
	}
	public function lookInventory($id){//生成编辑库存表单
						$tb_inventory_sql = 'SELECT * FROM inventory_now WHERE inventory_id='.$id;
						$tb_inventory_result = mysqli_query($this->conn, $tb_inventory_sql);
						$tb_inventory_arr=mysqli_fetch_assoc($tb_inventory_result);
		echo "<fieldset>",
			"<legend style='border:1px'>编辑".$_GET['id']."号库存表单信息</legend>",
			"<label>库存数量<input type='text' readonly style='width:30%' name='inventory_number' size='30' value='".$tb_inventory_arr['inventory_number']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>",
			"<label>备注<input type='text' readonly style='width:30%' name='inventory_remarks' size='30' value='".$tb_inventory_arr['inventory_remarks']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>",
			"<br>",
			"<label>存放位置<input type='text' readonly style='width:30%' name='inventory_position' size='30' value='".$tb_inventory_arr['inventory_position']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>";
					$tb_status_sql = "SELECT * FROM `tb_inventory_status` WHERE `inventory_status_id` =".$tb_inventory_arr['inventory_status'];
					$tb_status_result = mysqli_query($this->conn, $tb_status_sql);
					$tb_status_arr=mysqli_fetch_assoc($tb_status_result);
	echo "<label>库房<input type='text' readonly style='width:15%' size='30' value='".$tb_status_arr['inventory_status_name']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>",
		"</fieldset>";
						//echo $tb_inventory_arr['inventory_status'];
						return array($tb_inventory_arr['goods_id'],$tb_inventory_arr['inventory_status']);
	}
	public function storeOut($id){//生成小库第id号库存出库表单,小库->使用
		$tb_inventory_sql = 'SELECT * FROM tb_inventory WHERE inventory_id='.$id;
		$tb_inventory_result = mysqli_query($this->conn, $tb_inventory_sql);
		$tb_inventory_arr=mysqli_fetch_assoc($tb_inventory_result);
	echo "<fieldset>",
	"<input type='hidden' name='inventory_id' size='3' value=".$id."></input>",
"<input type='hidden' name='goods_id' size='3' value=".$tb_inventory_arr['goods_id']."></input>",
"<legend style='border:1px'>".$id."号库存的".$tb_inventory_arr['goods_id']."号备件小库 &rarr; 使用</legend>",
	"<label>所属设备<input type='text'style='width:20%' name='part_system' size='30' value=".$tb_sparepart_arr['part_system']."></input></label>",
	"<label>出库日期<input type='text'style='width:20%' name='part_come_time' size='30' value=''></input></label>",
	"<label>出库人",
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
	"<label>用途<input type='text'style='width:30%' name='part_remarks' size='30' value=".$tb_sparepart_arr['part_remarks']."></input></label>",
	"<label>出库数量<input type='text'style='width:10%' name='part_declare_number' size='5' value=".$tb_sparepart_arr['part_declare_number']."></input></label>",
	"</fieldset>";
						return $tb_inventory_arr['goods_id'];
	}
	public function storeIn($id){//生成大库第id号库存出库表单大库->小库
		$tb_inventory_sql = 'SELECT * FROM tb_inventory WHERE inventory_id='.$id;
		$tb_inventory_result = mysqli_query($this->conn, $tb_inventory_sql);
		$tb_inventory_arr=mysqli_fetch_assoc($tb_inventory_result);
	echo "<fieldset>",
	"<input type='hidden' name='inventory_id' size='3' value=".$id."></input>",
"<input type='hidden' name='goods_id' size='3' value=".$tb_inventory_arr['goods_id']."></input>",
	"<legend style='border:1px'>".$id."号库存的".$tb_inventory_arr['goods_id']."号备件大库 &rarr; 小库</legend>",
	"<label>费用<input type='text'style='width:10%' name='part_price' size='30' value=".$tb_inventory_arr['part_price']."></input></label>",
	"<label>入库人",
		"<select name='part_check_people'style='width:15%' class='selectfont'>",
		"<option selected='selected' disabled='disabled'  style='display: none' value=''></option>";
		$tb_user_sql = "SELECT * FROM `tb_user` WHERE 1";
		$tb_user_result = mysqli_query($this->conn, $tb_user_sql);
		while($tb_user_arr=mysqli_fetch_assoc($tb_user_result)){
			if($tb_user_arr['user_id']==$tb_inventory_arr['part_check_people']){
                echo "<option value=".$tb_user_arr['user_id']." selected='selected'>".$tb_user_arr['user_name']."</option>";
		}else{
                echo "<option value=".$tb_user_arr['user_id'].">".$tb_user_arr['user_name']."</option>";
		}
		}	
                echo "</select>";
	echo "</label>",
	"<label>所属设备<input type='text'style='width:20%' name='part_system' size='30' value=".$tb_inventory_arr['part_system']."></input></label>",
	"<label>入小库日期<input type='text'style='width:20%' name='part_check_time' size='30' value=".$tb_inventory_arr['part_check_time']."></input></label>",
	"<label>入库数量<input type='text'style='width:10%' name='part_come_number' size='5' value=".$tb_inventory_arr['part_come_number']."></input></label>",
	"<label>备注<input type='text'style='width:20%' name='part_remarks' size='30' value=".$tb_inventory_arr['part_remarks']."></input></label>",
	"</fieldset>";
						return $tb_inventory_arr['goods_id'];
	}
}

