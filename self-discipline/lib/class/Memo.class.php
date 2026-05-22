<?php
					include_once("Table.class.php");
class Memo extends dkTable{

	function __construct(){
		$this->conn = mysqli_connect('localhost','root','dk1314lich,forever!','db_huapen');
		if(!$this->conn){
			die("数据库连接失败". mysqli_connect_error());
		}else { 
		//echo"连接成功";
		}
		mysqli_query('set names utf8');
		$this->pagesize=10;
		$this->pageFunction = goodsPage;
		$this->tableHead = array("memo_id"=>"序号","memo_content"=>"内容","memo_status"=>"状态","memo_update_time"=>"更新时间","management"=>"管理","action"=>"content");
		$this->selectinfo = array("table"=>"tb_memo","id"=>"memo_id","caption"=>"备忘清单","status"=>"memo_type","quick"=>"work_begain_time");
		$this->keyinfo = array("number"=>"memo_details","content"=>"memo_content","remark"=>"memo_remarks");
		//$this->sql = "select tb_goods.goods_id,tb_goods.goods_name,tb_goods.goods_modle,tb_goods.goods_main_parameters from tb_goods where ";
		$this->sql = "select memo_id,memo_content,(select tb_status.status_content from tb_status where tb_status.status_id=memo_status)as memo_status,memo_update_time from tb_memo where ";
		$this->count_sql = "select count(*) from tb_memo where ";
		//$josn = json_encode($this->tableHead);
		//echo $josn;
	}
	public function retrievalBox(){//显示缺陷的检索栏
	}
	public function editMemo($id){//生成编辑缺陷表单
		$tb_memo_sql = 'SELECT * FROM tb_memo WHERE memo_id = '.$id;
		$tb_memo_result = mysqli_query($this->conn, $tb_memo_sql);
		$tb_memo_arr=mysqli_fetch_assoc($tb_memo_result);
		echo "<fieldset>",
			"<legend style='border:1px'>编辑".$tb_memo_arr['memo_id']."号备忘表单</legend>",
			"<input type='hidden' name='memo_id' size='3' value=".$tb_memo_arr['memo_id']."></input>",
			"<fieldset>",
				"<legend style='border:1px'>编辑备忘基本信息</legend>",
				"<label>备忘内容<input type='text'style='width:30%'name='memo_content' size='30' value='".$tb_memo_arr['memo_content']."'></input></label>",
			"<label>备忘进度",
				"<select name='memo_status'style='width:10%' class='selectfont'>",
					"<option selected='selected' disabled='disabled'  style='display: none' value=''></option>";
					$tb_status_sql = "SELECT * FROM `tb_status` WHERE 1";
					$tb_status_result = mysqli_query($this->conn, $tb_status_sql);
					while($tb_status_arr=mysqli_fetch_assoc($tb_status_result)){
						if($tb_status_arr['status_id']==$tb_memo_arr['memo_status']){
                    					echo "<option value=".$tb_status_arr['status_id']." selected='selected'>".$tb_status_arr['status_content']."</option>";
						}else{
                    					echo "<option value=".$tb_status_arr['status_id'].">".$tb_status_arr['status_content']."</option>";
						}
					}
                		echo "</select>",
			"<label>备忘类型",
				"<select name='memo_type'style='width:10%' class='selectfont'>",
					"<option selected='selected' disabled='disabled'  style='display: none' value=''></option>";
					$tb_type_sql = "SELECT * FROM `tb_type` WHERE 1";
					$tb_type_result = mysqli_query($this->conn, $tb_type_sql);
					while($tb_type_arr=mysqli_fetch_assoc($tb_type_result)){
						if($tb_type_arr['type_id']==$tb_memo_arr['memo_type']){
                       					echo "<option value=".$tb_type_arr['type_id']." selected='selected'>".$tb_type_arr['type_content']."</option>";
						}else{
                       					echo "<option value=".$tb_type_arr['type_id'].">".$tb_type_arr['type_content']."</option>";
						}
					}
                		echo "</select>",
				"<label>备注<input type='text'style='width:20%'name='memo_remarks' size='30' value='".$tb_memo_arr['memo_remarks']."'></input></label>",
		"</fieldset>",
		"<fieldset>",
			"<legend style='border:1px'>新增备忘详细</legend>",
			"<textarea style='width:100%'rows='10' name='memo_details'>".$tb_memo_arr['memo_details']."</textarea>",
		"</fieldset>",
	"</fieldset>";
	}
	public function lookGoods($goodsId){//查看缺陷表单
		if($goodsId>0){
			//echo $goodsId;
		$tb_goods_sql = "SELECT * FROM `tb_goods` WHERE `goods_id`=".$goodsId;
		$tb_goods_result = mysqli_query($this->conn, $tb_goods_sql);
		$tb_goods_arr=mysqli_fetch_assoc($tb_goods_result);
	echo '<fieldset>';
	echo "<legend style='border:1px'>".$tb_goods_arr['goods_id']."号备件</legend>";
	echo "<fieldset>";
	echo "<legend style='border:1px'>".$tb_goods_arr['goods_id']."号备件信息</legend>";
	echo "<input type='hidden' name='goods_id' value=".$tb_goods_arr['goods_id']."/>";
	echo "<label>";
	echo "物品名称<input type='text' readonly style='width:30%' size='30' value='".$tb_goods_arr['goods_name']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'/>";
	echo "</label>";
	echo "<label>";
	echo "相关备件<input type='text' readonly style='width:15%' size='30' value='".$tb_goods_arr['goods_childs']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black' />";
	echo "</label>";
	echo "<label>物品种类";
//从tb_user数据库中取出所有用户信息,添加工作负责人下拉列表
	//	$tb_goods_category_sql = "SELECT * FROM `tb_goods_category` WHERE 1";
		$tb_goods_category_sql = "SELECT * FROM `tb_goods_category` WHERE `goods_category_id` =". $tb_goods_arr['goods_category'];
		$tb_goods_category_result = mysqli_query($this->conn, $tb_goods_category_sql);
		$tb_goods_category_arr=mysqli_fetch_assoc($tb_goods_category_result);
	echo "<input type='text' readonly style='width:20%' size='30' value='".$tb_goods_category_arr['goods_category_name']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'/>";
	echo '</label>';
	echo '<br>';
	echo '<label>';
	echo "物品型号<input type='text' readonly style='width:30%' value='".$tb_goods_arr['goods_modle']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black' />";
	echo "</label>";
	echo "<label>";
	echo "相关资料<input type='text' readonly style='width:15%' value='".$tb_goods_arr['goods_remarks']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black' />";
	echo "</label>";
	echo "<label>物品类型";
//从tb_user数据库中取出所有用户信息,添加工作负责人下拉列表
		$tb_goods_type_sql = "SELECT * FROM `tb_goods_type` WHERE `goods_type_id`=".$tb_goods_arr['goods_type'];
		$tb_goods_type_result = mysqli_query($this->conn, $tb_goods_type_sql);
		$tb_goods_type_arr=mysqli_fetch_assoc($tb_goods_type_result);
		echo "<input type='text' readonly style='width:20%' size='30' value='".$tb_goods_type_arr['goods_type_name']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black' />";
	echo '</label>';
	echo '<br>';
	echo '<label>';
	echo "物品厂家<input type='text' readonly style='width:30%'  size='30' value='".$tb_goods_arr['goods_manufacturers']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black' />";
	echo '</label>';
	echo '<label>';
	echo "备件价格<input type='text' readonly style='width:15%' size='30' value='".$tb_goods_arr['goods_price']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black' />";
	echo '</label>';
	echo '<label>';
	echo "主要参数<input type='text' readonly style='width:20%' size='30' value='".$tb_goods_arr['goods_main_parameters']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black' />";
	echo '</label>';
	echo '</fieldset>';
	echo "<fieldset style='width:100%'>";
	echo "<legend style='border:1px'>".$tb_goods_arr['goods_id']."号备件具体技术参数和用途</legend>";
	echo "<textarea style='width:50%' rows='5' readonly onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'>".$tb_goods_arr['goods_parameters']."</textarea>";
	echo "<textarea style='width:45%'rows='5' readonly onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black' >".$tb_goods_arr['goods_use']."</textarea>";
	echo "</fieldset>";
	echo "</fieldset>";
		}
						return array($tb_goods_arr['goods_childs'],$tb_goods_arr['goods_remarks']);
	}
	public function addMemo(){//生成新增备件表单
	echo "<fieldset>",
		"<legend style='border:1px'>添加新的备忘</legend>",
		"<fieldset>",
			"<legend style='border:1px'>新增备忘基本信息</legend>",
			"<label>备忘内容<input type='text'style='width:30%'name='memo_content' size='30' value=''></input></label>",
			"<label>备忘进度",
				"<select name='memo_status'style='width:10%' class='selectfont'>",
					"<option selected='selected' disabled='disabled'  style='display: none' value=''></option>";
					$tb_status_sql = "SELECT * FROM `tb_status` WHERE 1";
					$tb_status_result = mysqli_query($this->conn, $tb_status_sql);
					while($tb_status_arr=mysqli_fetch_assoc($tb_status_result)){
                    				echo "<option value=".$tb_status_arr['status_id'].">".$tb_status_arr['status_content']."</option>";
					}
                		echo "</select>",
			"<label>备忘类型",
				"<select name='memo_type'style='width:10%' class='selectfont'>",
					"<option selected='selected' disabled='disabled'  style='display: none' value=''></option>";
					$tb_type_sql = "SELECT * FROM `tb_type` WHERE 1";
					$tb_type_result = mysqli_query($this->conn, $tb_type_sql);
					while($tb_type_arr=mysqli_fetch_assoc($tb_type_result)){
                       				echo "<option value=".$tb_type_arr['type_id'].">".$tb_type_arr['type_content']."</option>";
					}
                		echo "</select>",
			"<label>备注<input type='text'style='width:20%'name='memo_remarks' size='30' value=''></input></label>",
		"</fieldset>",
		"<fieldset>",
			"<legend style='border:1px'>新增备忘详细</legend>",
			"<textarea style='width:100%'rows='5' name='memo_details'></textarea>",
		"</fieldset>",
	"</fieldset>";
	}
}
?>

