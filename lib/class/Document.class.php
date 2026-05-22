<?php
					include_once("Table.class.php");
class Document extends dkTable{
	function __construct(){
		$this->conn = mysqli_connect(parent::host,parent::username,parent::password,parent::database);
		if(!$this->conn){
			die("数据库连接失败". mysqli_connect_error());
		}else { 
		//echo"连接成功";
		}
		mysqli_query('set names utf8');
		$this->pagesize=10;
		$this->pageFunction = DocumentPage;
		$this->tableHead = array("instruction_id"=>"序号","instruction_name"=>"内容","management"=>"管理","path"=>"./","action"=>"content");
		$this->selectinfo = array("table"=>"tb_instruction","id"=>"instruction_id","caption"=>"资料列表","status"=>"instruction_system","quick"=>"work_begain_time","type"=>"instruction_type");
		$this->keyinfo = array("number"=>"instruction_system","content"=>"instruction_dir","remark"=>"instruction_remarks");
		$this->sql = "SELECT instruction_id,instruction_name,instruction_dir FROM tb_instruction where ";
		$this->count_sql = "select count(*) from tb_instruction where ";
	}
	public function retrievalBox(){//显示缺陷的检索栏
	echo "<fieldset>",
		"<legend style='border:1px'>检索选择</legend>",
		"<label><input type='checkbox'name='select_checkbox[instruction_system]'value='select_instruction_system'>系统</label>",
		"<select name='select_instruction_system' id='sys'style='width:20%' class='selectfont'>",
			"<option selected='selected' disabled='disabled'  style='display: none' value=''></option>";
				$tb_system_sql = "SELECT * FROM `tb_instruction_system` WHERE 1";
				$tb_system_result = mysqli_query($this->conn, $tb_system_sql);
				while($tb_system_arr=mysqli_fetch_assoc($tb_system_result)){
					echo "<option value=".$tb_system_arr['instruction_system_id'].">".$tb_system_arr['instruction_system_name']."</option>";
				}
		echo "</select>";
		echo "<label><input type='checkbox' name='select_checkbox[instruction_type]' value='select_instruction_type'>资料类型</label>",
		"<select name='select_instruction_type'style='width:20%' class='selectfont'>",
		"<option selected='selected' disabled='disabled'style='display: none' value=''></option>";
			$tb_type_sql = "SELECT * FROM `tb_instruction_type` WHERE 1";
			$tb_type_result = mysqli_query($this->conn, $tb_type_sql);
			while($tb_type_arr=mysqli_fetch_assoc($tb_type_result)){
				echo "<option value=".$tb_type_arr['instruction_type_id'].">".$tb_type_arr['instruction_type_name']."</option>";
			}
		echo "</select>",
		"<label><input type='checkbox' name='select_checkbox_key' value='select_key'>关键字(含KKS)</label>",
		"<input type='text'style='width:20%' name='select_key' size='10'></input>",
	"</fieldset>",
                                        "<input type='submit'style='width:100%' value='搜索'></input>";
	}
	public function addDocument(){//显示缺陷的检索栏
		echo "<fieldset>",
			"<legend style='border:1px'>检索选择</legend>",
			"<label>文档名称<input type='text'style='width:30%' name='instruction_name' size='30' value=''></input></label>",
			"<label>所属系统",
				"<select name='instruction_system'style='width:20%'class='selectfont'>",
					"<option selected='selected' disabled='disabled'style='display: none' value=''></option>";
					$tb_instruction_device_sql = "SELECT * FROM `tb_instruction_system` WHERE 1";
					$tb_instruction_device_result = mysqli_query($this->conn, $tb_instruction_device_sql);
					while($tb_instruction_device_arr=mysqli_fetch_assoc($tb_instruction_device_result)){
                        			echo "<option value=".$tb_instruction_device_arr['instruction_system_id'].">".$tb_instruction_device_arr['instruction_system_name']."</option>";
					}
				echo "</select>",
			"<label>资料类型",
				"<select name='instruction_type' style='width:20%' class='selectfont'>",
					"<option selected='selected' disabled='disabled'  style='display: none' value=''></option>";
					$tb_instruction_device_sql = "SELECT * FROM `tb_instruction_type` WHERE 1";
					$tb_instruction_device_result = mysqli_query($this->conn, $tb_instruction_device_sql);
					while($tb_instruction_device_arr=mysqli_fetch_assoc($tb_instruction_device_result)){
                        			echo "<option value=".$tb_instruction_device_arr['instruction_type_id'].">".$tb_instruction_device_arr['instruction_type_name']."</option>";
					}
				echo "</select>",
				"<br>",
			"<label>资料路径<input type='text' name='instruction_dir'style='width:60%' size='50' value=''></input></label>",
			"<label>备注<input type='text'style='width:20%' name='instruction_remarks' size='40' value=''></input></label>",
		"</fieldset>";
	}
	public function editDocument($Id){//显示缺陷的检索栏
		$tb_instruction_sql = 'SELECT instruction_id,instruction_name,instruction_system,instruction_type,instruction_remarks,instruction_dir FROM tb_instruction where instruction_id='.$Id;
		$tb_instruction_result = mysqli_query($this->conn, $tb_instruction_sql);
		$tb_instruction_arr=mysqli_fetch_assoc($tb_instruction_result);
		echo "<fieldset>",
			"<legend style='border:1px'>编辑".$tb_instruction_arr['instruction_id']."号文档</legend>",
			"<input type='hidden' name='instruction_id' size='2' value=".$tb_instruction_arr['instruction_id']."></input>",
			"<label>文档名称<input type='text'style='width:30%' name='instruction_name' size='30' value='".$tb_instruction_arr['instruction_name']."'></input></label>",
			"<label>所属系统",
				"<select name='instruction_system'style='width:20%' class='selectfont'>",
					"<option selected='selected' disabled='disabled'style='display: none' value=''></option>",
					$tb_instruction_device_sql = "SELECT * FROM `tb_instruction_system` WHERE 1";
					$tb_instruction_device_result = mysqli_query($this->conn, $tb_instruction_device_sql);
					while($tb_instruction_device_arr=mysqli_fetch_assoc($tb_instruction_device_result)){
						if($tb_instruction_device_arr['instruction_system_id']==$tb_instruction_arr['instruction_system']){
                        				echo "<option value=".$tb_instruction_device_arr['instruction_system_id']." selected='selected'>".$tb_instruction_device_arr['instruction_system_name']."</option>";
						}else{
                        				echo "<option value=".$tb_instruction_device_arr['instruction_system_id'].">".$tb_instruction_device_arr['instruction_system_name']."</option>";
						}
					}
				echo "</select>",
			"</label>",
			"<label>资料类型",
				"<select name='instruction_type' style='width:20%' class='selectfont'>",
					"<option selected='selected' disabled='disabled'style='display: none' value=''></option>",
					$tb_instruction_device_sql = "SELECT * FROM `tb_instruction_type` WHERE 1";
					$tb_instruction_device_result = mysqli_query($this->conn, $tb_instruction_device_sql);
					while($tb_instruction_device_arr=mysqli_fetch_assoc($tb_instruction_device_result)){
						if($tb_instruction_device_arr['instruction_type_id']==$tb_instruction_arr['instruction_type']){
                        				echo "<option value=".$tb_instruction_device_arr['instruction_type_id']." selected='selected'>".$tb_instruction_device_arr['instruction_type_name']."</option>";
						}else{
                        				echo "<option value=".$tb_instruction_device_arr['instruction_type_id'].">".$tb_instruction_device_arr['instruction_type_name']."</option>";
						}
					}
				echo "</select>",
				"<br>",
			"</label>",
			"<label>资料路径<input type='text' style='width:60%'name='instruction_dir' size='50' value='".$tb_instruction_arr['instruction_dir']."'></input>",
			"<label>备注<input type='text' style='width:20%'name='instruction_remarks' size='40' value=".$tb_instruction_arr['instruction_remarks']."></input>",
		"</fieldset>";
	}
	public function lookDocument($Id){//显示缺陷的检索栏
		$tb_instruction_sql = 'SELECT instruction_id,instruction_name,instruction_system,instruction_type,instruction_remarks,instruction_dir FROM tb_instruction where instruction_id='.$Id;
		$tb_instruction_result = mysqli_query($this->conn, $tb_instruction_sql);
		$tb_instruction_arr=mysqli_fetch_assoc($tb_instruction_result);
		echo "<fieldset>",
			"<legend style='border:1px'>编辑".$tb_instruction_arr['instruction_id']."号文档</legend>",
			"<label>文档名称<input type='text' readonly style='width:50%' name='instruction_name' size='30' value='".$tb_instruction_arr['instruction_name']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>",
			"<label>备注<input type='text'readonly style='width:20%'name='instruction_remarks' size='40' value='".$tb_instruction_arr['instruction_remarks']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>",
			"<br>",
			"<label>资料路径<input type='text' style='width:80%'name='instruction_dir' size='50' value='".$tb_instruction_arr['instruction_dir']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>",
		"</fieldset>";
		return $tb_instruction_arr['instruction_dir'];
	}
	public function lookDir($Id){//显示缺陷的检索栏
		$tb_instruction_sql = 'SELECT instruction_id,instruction_name,instruction_system,instruction_type,instruction_remarks,instruction_dir,instruction_title,instruction_promo,imagepath FROM tb_instruction where instruction_id='.$Id;
		$tb_instruction_result = mysqli_query($this->conn, $tb_instruction_sql);
		$tb_instruction_arr=mysqli_fetch_assoc($tb_instruction_result);
		//return $tb_instruction_arr['instruction_dir'];
		return array($tb_instruction_arr['instruction_name'],$tb_instruction_arr['instruction_dir'],$tb_instruction_arr['instruction_title'],$tb_instruction_arr['instruction_promo'],$tb_instruction_arr['imagepath']);
	}
	public function showId($documentId){//查看缺陷表单
		/*
		$IdStr;
						$arr=explode('@',$arry_id);
						for($x=0;$x<count($arr);$x++){
							//lookgoods($conn,$arr[$x]);
							//$goods_obj->lookGoods($arr[$x]);
							$IdStr = $IdStr.$this->selectinfo['id'].'='.$arr[$x].'OR';
						}
						$IdStr = chop($IdStr,'OR');
		 */
		if($documentId==0){
			$count_sql = $this->count_sql." 1";
        		$re = mysqli_query($this->conn,$count_sql);
        		$result = mysqli_fetch_row($re);
        		$num = $result[0];
			$this->num=$num;
			$str = $this->sql." 1";
		}else{
			$count_sql = $this->count_sql.$this->selectinfo['id']." = ".$documentId;
        		$re = mysqli_query($this->conn,$count_sql);
        		$result = mysqli_fetch_row($re);
        		$num = $result[0];
			$this->num=$num;
			$str = $this->sql.$this->selectinfo['id']." = ".$documentId;
		}
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
	public function showStrId($strid){//显示指定备件str的清单以@间隔
		$this->tableHead = array("instruction_id"=>"序号","instruction_name"=>"内容","management"=>"无","action"=>"content");
		$count_str = "select count(*) from tb_instruction where instruction_id= ";
		$sql_str = "SELECT instruction_id,instruction_name,instruction_dir FROM tb_instruction where instruction_id= ";
			$group_arr=explode('@',$strid);
			for($x=0;$x<count($group_arr);$x++){
				$str.=$group_arr[$x];
				$str.= " OR instruction_id= ";
			}
			$str=chop($str," OR instruction_id= ");
			$sql_str.=$str;
			$count_str.=$str;

		$count_sql = $count_str;
        	$re = mysqli_query($this->conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$num = $result[0];
		$this->num=$num;
		//$str = $this->sql."goods_id=".$id;;
		$sql = $sql_str.' order by '.$this->selectinfo['id'].' asc limit 0,'.$this->pagesize;
        	$result = mysqli_query($this->conn,$sql);
		$this->result = $result;
		$pageSql = $str.' order by '.$this->selectinfo['id'].' asc limit ';
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
	public function showType($status){//显示不同状态下的缺陷：0-已处理，1-未处理，2-延期缺陷
		$count_sql = $this->count_sql.$this->selectinfo['type']." = ".$status;
        	$re = mysqli_query($this->conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$num = $result[0];
		$this->num=$num;
		$str = $this->sql.$this->selectinfo['type']." = ".$status;
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
}
