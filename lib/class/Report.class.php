<?php
					include_once("Table.class.php");
class Report extends dkTable{
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
		$this->tableHead = array("report_id"=>"编号","report_account_id"=>"内容","management"=>"管理","path"=>"./","action"=>"content");
		$this->selectinfo = array("table"=>"tb_FeederReport","id"=>"report_id","caption"=>"校验报告","status"=>"job_type","quick"=>"job_deadtime");
		$this->keyinfo = array("number"=>"job_notes","content"=>"job_content","remark"=>"job_remarks");
		$this->count_sql = "select count(*) from tb_FeederReport where ";
		$this->sql = "SELECT report_id,report_account_id FROM tb_FeederReport WHERE ";
	}
	/*
	public function addReport(){//显示Id为LedgerId的工作记录
	echo "<fieldset>",
		"<legend style='border:1px'>添加工作</legend>",
			"<label>皮带秤型号<input type='text'style='width:20%' name='report_TextColumn1' size='90'></input></label>",
			"<label>流量范围<input type='text'style='width:20%' name='report_NumberColumn1' size='90'></input></label>",
			"<br>",
			"<label>基本皮重<input type='text'style='width:20%' name='report_NumberColumn2' size='90'></input></label>",
			"<label>关联设备",
				"<select name='report_account_id' style='width:10%' class='selectfont'>",
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
						"</fieldset>";
	}
	 */
	public function lookReport($Id){//显示Id为LedgerId的工作记录
		//$tb_report_sql = 'SELECT report_id,report_account_id,report_TextColumn1,report_NumberColumn1,report_NumberColumn2 FROM tb_FeederReport where report_id='.$Id;
		$tb_report_sql = 'SELECT * FROM tb_FeederReport where report_id='.$Id;
		$tb_report_result = mysqli_query($this->conn, $tb_report_sql);
		$tb_report_arr=mysqli_fetch_assoc($tb_report_result);
		$flag = $tb_report_arr['flag'];
			echo "<input type='hidden' name='flag' size='2' value=".$tb_report_arr['flag']."></input>";
					$tb_account_sql = "SELECT equipment_kks,equipment_name FROM tb_account WHERE account_id =".$tb_report_arr['report_account_id'];
					$tb_account_result = mysqli_query($this->conn, $tb_account_sql);
					$tb_account_arr=mysqli_fetch_assoc($tb_account_result);
					switch($flag)
					{
					case 1: //给煤机皮带校验记录
	echo "<fieldset>",
		"<legend style='border:1px'>".$tb_account_arr['equipment_name']."（".$tb_account_arr['equipment_kks']."）校验记录</legend>",
			"<input type='hidden' name='report_id' size='2' value=".$tb_report_arr['report_id']."></input>",
			"<label>皮带秤型号<input type='text'style='width:15%' name='report_TextColumn1' value='".$tb_report_arr['report_TextColumn1']."'></input></label>",
			"<label>流量范围<input type='text'style='width:15%' name='report_TextColumn2' value='".$tb_report_arr['report_TextColumn2']."'></input></label>",
			"<br>",
	"<fieldset>",
		"<legend style='border:1px'>皮带秤参数</legend>",
			"<label>称重传感器灵敏度P03.03<input type='text'style='width:15%' name='report_NumberColumn1' value='".$tb_report_arr['report_NumberColumn1']."'></input>mV/V</label>",
			"<label>基本皮重P04.05<input type='text'style='width:15%' name='report_NumberColumn2' value='".$tb_report_arr['report_NumberColumn2']."'></input>kg/m</label>",
			"<br>",
			"<label>有效称量长度P03.05<input type='text'style='width:15%' name='report_NumberColumn3' value='".$tb_report_arr['report_NumberColumn3']."'></input>m</label>",
			"<label>调零皮重P04.04<input type='text'style='width:15%' name='report_NumberColumn4' value='".$tb_report_arr['report_NumberColumn4']."'></input>kg/m</label>",
			"<br>",
			"<label>标定重量P03.08<input type='text'style='width:15%' name='report_NumberColumn5' value='".$tb_report_arr['report_NumberColumn5']."'></input>kg</label>",
			"<label>总皮重P04.03<input type='text'style='width:15%' name='report_NumberColumn6' value='".$tb_report_arr['report_NumberColumn6']."'></input>kg/m</label>",
	"</fieldset>",
			"<br>",
			"<br>",
	"<fieldset>",
		"<legend style='border:1px'>校验参数</legend>",
			"<label>运行标定程序所需的皮带整圈数P03.01<input type='text'style='width:15%' name='report_NumberColumn8' value='".$tb_report_arr['report_NumberColumn8']."'></input></label>",
			"<label>校验后基本皮重P04.05<input type='text'style='width:15%' name='report_NumberColumn9' value='".$tb_report_arr['report_NumberColumn9']."'></input></label>",
			"<br>",
			"<label>皮带转一周的时间P03.02<input type='text'style='width:15%' name='report_NumberColumn10' value='".$tb_report_arr['report_NumberColumn10']."'></input></label>",
			"<label>校验后调零皮重P04.04<input type='text'style='width:15%' name='report_NumberColumn11' value='".$tb_report_arr['report_NumberColumn11']."'></input></label>",
			"<br>",
			"<label>皮带运行一周的累计测速脉冲总数P04.06<input type='text'style='width:15%' name='report_NumberColumn12' value='".$tb_report_arr['report_NumberColumn12']."'></input></label>",
			"<label>校验后总皮重P04.03<input type='text'style='width:15%' name='report_NumberColumn13' value='".$tb_report_arr['report_NumberColumn13']."'></input></label>",
			"<br>",
			"<label>原量程校正系数P04.02<input type='text'style='width:15%' name='report_NumberColumn14' value='".$tb_report_arr['report_NumberColumn14']."'></input></label>",
			"<label>量程校正系数P04.02<input type='text'style='width:15%' name='report_NumberColumn15' value='".$tb_report_arr['report_NumberColumn15']."'></input></label>",
	"</fieldset>",
	"<fieldset>",
		"<legend style='border:1px'>走码校验</legend>",
			"<label>零点校验<input type='text'style='width:50%' name='report_NumberColumn7' value='".$tb_report_arr['report_NumberColumn7']."'></input></label>",
			"<br>",
			"给定t/h&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp反馈t/h&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp转速m/s&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp变频HZ&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp备注",
			"<br>",
			"<label>&nbsp&nbsp&nbsp&nbsp&nbsp0&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn16' value='".$tb_report_arr['report_NumberColumn16']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn17' value='".$tb_report_arr['report_NumberColumn17']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn18' value='".$tb_report_arr['report_NumberColumn18']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_TextColumn3' value='".$tb_report_arr['report_TextColumn3']."'></input></label>",
			"<br>",
			"<label>&nbsp&nbsp&nbsp&nbsp&nbsp5&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn19' value='".$tb_report_arr['report_NumberColumn19']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn20' value='".$tb_report_arr['report_NumberColumn20']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn21' value='".$tb_report_arr['report_NumberColumn21']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_TextColumn4' value='".$tb_report_arr['report_TextColumn4']."'></input></label>",
			"<br>",
			"<label>&nbsp&nbsp&nbsp&nbsp10&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn22' value='".$tb_report_arr['report_NumberColumn22']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn23' value='".$tb_report_arr['report_NumberColumn23']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn24' value='".$tb_report_arr['report_NumberColumn24']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_TextColumn5' value='".$tb_report_arr['report_TextColumn5']."'></input></label>",
			"<br>",
			"<label>&nbsp&nbsp&nbsp&nbsp15&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn25' value='".$tb_report_arr['report_NumberColumn25']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn26' value='".$tb_report_arr['report_NumberColumn26']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn27' value='".$tb_report_arr['report_NumberColumn27']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_TextColumn6' value='".$tb_report_arr['report_TextColumn6']."'></input></label>",
			"<br>",
			"<label>&nbsp&nbsp&nbsp&nbsp20&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn28' value='".$tb_report_arr['report_NumberColumn28']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn29' value='".$tb_report_arr['report_NumberColumn29']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn30' value='".$tb_report_arr['report_NumberColumn30']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_TextColumn7' value='".$tb_report_arr['report_TextColumn7']."'></input></label>",
			"<br>",
			"<label>&nbsp&nbsp&nbsp&nbsp25&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn31' value='".$tb_report_arr['report_NumberColumn31']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn32' value='".$tb_report_arr['report_NumberColumn32']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn33' value='".$tb_report_arr['report_NumberColumn33']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_TextColumn8' value='".$tb_report_arr['report_TextColumn8']."'></input></label>",
			"<br>",
			"<label>&nbsp&nbsp&nbsp&nbsp20&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn34' value='".$tb_report_arr['report_NumberColumn34']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn35' value='".$tb_report_arr['report_NumberColumn35']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn36' value='".$tb_report_arr['report_NumberColumn36']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_TextColumn9' value='".$tb_report_arr['report_TextColumn9']."'></input></label>",
			"<br>",
			"<label>&nbsp&nbsp&nbsp&nbsp15&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn37' value='".$tb_report_arr['report_NumberColumn37']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn38' value='".$tb_report_arr['report_NumberColumn38']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn39' value='".$tb_report_arr['report_NumberColumn39']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_TextColumn10' value='".$tb_report_arr['report_TextColumn10']."'></input></label>",
			"<br>",
			"<label>&nbsp&nbsp&nbsp&nbsp10&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn40' value='".$tb_report_arr['report_NumberColumn40']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn41' value='".$tb_report_arr['report_NumberColumn41']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn42' value='".$tb_report_arr['report_NumberColumn42']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_TextColumn11' value='".$tb_report_arr['report_TextColumn11']."'></input></label>",
			"<br>",
			"<label>&nbsp&nbsp&nbsp&nbsp&nbsp5&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn43' value='".$tb_report_arr['report_NumberColumn43']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn44' value='".$tb_report_arr['report_NumberColumn44']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn45' value='".$tb_report_arr['report_NumberColumn45']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_TextColumn12' value='".$tb_report_arr['report_TextColumn12']."'></input></label>",
			"<br>",
			"<label>&nbsp&nbsp&nbsp&nbsp&nbsp0&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn46' value='".$tb_report_arr['report_NumberColumn46']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn47' value='".$tb_report_arr['report_NumberColumn47']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn48' value='".$tb_report_arr['report_NumberColumn48']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_TextColumn13' value='".$tb_report_arr['report_TextColumn13']."'></input></label>",
	"</fieldset>",
						"</fieldset>";
						break;
					case 2: //压力控制器校验报告
	echo "<fieldset>",
		"<legend style='border:1px'>".$tb_account_arr['equipment_name']."（".$tb_account_arr['equipment_kks']."）校验记录</legend>",
			"<input type='hidden' name='report_id' size='2' value=".$tb_report_arr['report_id']."></input>",
			"<label>设定点<input type='text'style='width:15%' name='report_NumberColumn1' value='".$tb_report_arr['report_NumberColumn1']."'></input></label>",
			"<label>单位<input type='text'style='width:15%' name='report_TextColumn1' value='".$tb_report_arr['report_TextColumn1']."'></input></label>",
			"<label>开关方向<input type='text'style='width:15%' name='report_TextColumn2' value='".$tb_report_arr['report_TextColumn2']."'></input></label>",
			"<label>外观检查<input type='text'style='width:15%' name='report_TextColumn3' value='".$tb_report_arr['report_TextColumn3']."'></input></label>",
			"<br>",
			"<label>上1<input type='text'style='width:15%' name='report_NumberColumn2' value='".$tb_report_arr['report_NumberColumn2']."'></input></label>",
			"<label>上2<input type='text'style='width:15%' name='report_NumberColumn3' value='".$tb_report_arr['report_NumberColumn3']."'></input></label>",
			"<label>上3<input type='text'style='width:15%' name='report_NumberColumn4' value='".$tb_report_arr['report_NumberColumn4']."'></input></label>",
			"<label>上平<input type='text'style='width:15%' name='report_NumberColumn5' value='".$tb_report_arr['report_NumberColumn5']."'></input></label>",
			"<br>",
			"<label>下1<input type='text'style='width:15%' name='report_NumberColumn6' value='".$tb_report_arr['report_NumberColumn6']."'></input></label>",
			"<label>下2<input type='text'style='width:15%' name='report_NumberColumn7' value='".$tb_report_arr['report_NumberColumn7']."'></input></label>",
			"<label>下3<input type='text'style='width:15%' name='report_NumberColumn8' value='".$tb_report_arr['report_NumberColumn8']."'></input></label>",
			"<label>下平<input type='text'style='width:15%' name='report_NumberColumn9' value='".$tb_report_arr['report_NumberColumn9']."'></input></label>",
			"<br>",
			"<label>上1<input type='text'style='width:15%' name='report_NumberColumn10' value='".$tb_report_arr['report_NumberColumn10']."'></input></label>",
			"<label>上2<input type='text'style='width:15%' name='report_NumberColumn11' value='".$tb_report_arr['report_NumberColumn11']."'></input></label>",
			"<label>上3<input type='text'style='width:15%' name='report_NumberColumn12' value='".$tb_report_arr['report_NumberColumn12']."'></input></label>",
			"<label>上平<input type='text'style='width:15%' name='report_NumberColumn13' value='".$tb_report_arr['report_NumberColumn13']."'></input></label>",
			"<br>",
			"<label>下1<input type='text'style='width:15%' name='report_NumberColumn14' value='".$tb_report_arr['report_NumberColumn14']."'></input></label>",
			"<label>下2<input type='text'style='width:15%' name='report_NumberColumn15' value='".$tb_report_arr['report_NumberColumn15']."'></input></label>",
			"<label>下3<input type='text'style='width:15%' name='report_NumberColumn16' value='".$tb_report_arr['report_NumberColumn16']."'></input></label>",
			"<label>下平<input type='text'style='width:15%' name='report_NumberColumn17' value='".$tb_report_arr['report_NumberColumn17']."'></input></label>",
			"<br>",
			"<label>设定点误差<input type='text'style='width:15%' name='report_NumberColumn18' value='".$tb_report_arr['report_NumberColumn18']."'></input></label>",
			"<label>重复性误差<input type='text'style='width:15%' name='report_NumberColumn19' value='".$tb_report_arr['report_NumberColumn19']."'></input></label>",
			"<input type='text'style='width:15%' name='report_NumberColumn20' value='".$tb_report_arr['report_NumberColumn20']."'></input>",
			"<label>切换差<input type='text'style='width:15%' name='report_NumberColumn21' value='".$tb_report_arr['report_NumberColumn21']."'></input></label>",
			"<br>",
			"<label>绝缘电阻<input type='text'style='width:15%' name='report_NumberColumn22' value='".$tb_report_arr['report_NumberColumn22']."'></input></label>",
			"<label>接点电阻<input type='text'style='width:15%' name='report_NumberColumn23' value='".$tb_report_arr['report_NumberColumn23']."'></input></label>";
	echo "</fieldset>";
						break;
					default:
						echo "无flag";
					}
	}
	public function LookLedgerReport($LedgerId){//显示Id为LedgerId的工作记录
		$tb_report_sql = 'SELECT * FROM tb_FeederReport where report_account_id='.$LedgerId;
		$tb_report_result = mysqli_query($this->conn, $tb_report_sql);
		$tb_report_arr=mysqli_fetch_assoc($tb_report_result);
		$flag = $tb_report_arr['flag'];
		echo "<input type='hidden' name='flag' size='2' value=".$tb_report_arr['flag']."></input>";
		$tb_account_sql = "SELECT equipment_kks,equipment_name FROM tb_account WHERE account_id =".$tb_report_arr['report_account_id'];
		$tb_account_result = mysqli_query($this->conn, $tb_account_sql);
		$tb_account_arr=mysqli_fetch_assoc($tb_account_result);
		switch($flag){
			case 1:
			echo "<fieldset>",
			"<legend style='border:1px'>".$tb_account_arr['equipment_name']."（".$tb_account_arr['equipment_kks']."）校验记录</legend>",
			"<input type='hidden' name='report_id' size='2' value=".$tb_report_arr['report_id']."></input>",
			"<label>皮带秤型号<input type='text' readonly style='width:25%' value='".$tb_report_arr['report_TextColumn1']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>",
			"<label>流量范围<input type='text' readonly style='width:15%' value='".$tb_report_arr['report_TextColumn2']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input></label>",
			"<br>",
	"<fieldset>",
		"<legend style='border:1px'>皮带秤参数</legend>",
			"<label>称重传感器灵敏度P03.03<input type='text' readonly style='width:15%' value='".$tb_report_arr['report_NumberColumn1']."' onmouseover=\"this.style.borderColor='black';this.style.backgroundColor='plum'\" onmouseout=\"this.style.borderColor='black';this.style.backgroundColor='#ffffff'\" style='border-width:1px;border-color=black'></input>mV/V</label>",
			"<label>基本皮重P04.05<input type='text'style='width:15%' name='report_NumberColumn2' value='".$tb_report_arr['report_NumberColumn2']."'></input>kg/m</label>",
			"<br>",
			"<label>有效称量长度P03.05<input type='text'style='width:15%' name='report_NumberColumn3' value='".$tb_report_arr['report_NumberColumn3']."'></input>m</label>",
			"<label>调零皮重P04.04<input type='text'style='width:15%' name='report_NumberColumn4' value='".$tb_report_arr['report_NumberColumn4']."'></input>kg/m</label>",
			"<br>",
			"<label>标定重量P03.08<input type='text'style='width:15%' name='report_NumberColumn5' value='".$tb_report_arr['report_NumberColumn5']."'></input>kg</label>",
			"<label>总皮重P04.03<input type='text'style='width:15%' name='report_NumberColumn6' value='".$tb_report_arr['report_NumberColumn6']."'></input>kg/m</label>",
	"</fieldset>",
			"<br>",
			"<br>",
	"<fieldset>",
		"<legend style='border:1px'>校验参数</legend>",
			"<label>运行标定程序所需的皮带整圈数P03.01<input type='text'style='width:15%' name='report_NumberColumn8' value='".$tb_report_arr['report_NumberColumn8']."'></input></label>",
			"<label>校验后基本皮重P04.05<input type='text'style='width:15%' name='report_NumberColumn9' value='".$tb_report_arr['report_NumberColumn9']."'></input></label>",
			"<br>",
			"<label>皮带转一周的时间P03.02<input type='text'style='width:15%' name='report_NumberColumn10' value='".$tb_report_arr['report_NumberColumn10']."'></input></label>",
			"<label>校验后调零皮重P04.04<input type='text'style='width:15%' name='report_NumberColumn11' value='".$tb_report_arr['report_NumberColumn11']."'></input></label>",
			"<br>",
			"<label>皮带运行一周的累计测速脉冲总数P04.06<input type='text'style='width:15%' name='report_NumberColumn12' value='".$tb_report_arr['report_NumberColumn12']."'></input></label>",
			"<label>校验后总皮重P04.03<input type='text'style='width:15%' name='report_NumberColumn13' value='".$tb_report_arr['report_NumberColumn13']."'></input></label>",
			"<br>",
			"<label>原量程校正系数P04.02<input type='text'style='width:15%' name='report_NumberColumn14' value='".$tb_report_arr['report_NumberColumn14']."'></input></label>",
			"<label>量程校正系数P04.02<input type='text'style='width:15%' name='report_NumberColumn15' value='".$tb_report_arr['report_NumberColumn15']."'></input></label>",
	"</fieldset>",
	"<fieldset>",
		"<legend style='border:1px'>走码校验</legend>",
			"<label>零点校验<input type='text'style='width:50%' name='report_NumberColumn7' value='".$tb_report_arr['report_NumberColumn7']."'></input></label>",
			"<br>",
			"给定t/h&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp反馈t/h&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp转速m/s&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp变频HZ&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp备注",
			"<br>",
			"<label>&nbsp&nbsp&nbsp&nbsp&nbsp0&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn16' value='".$tb_report_arr['report_NumberColumn16']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn17' value='".$tb_report_arr['report_NumberColumn17']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn18' value='".$tb_report_arr['report_NumberColumn18']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_TextColumn3' value='".$tb_report_arr['report_TextColumn3']."'></input></label>",
			"<br>",
			"<label>&nbsp&nbsp&nbsp&nbsp&nbsp5&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn19' value='".$tb_report_arr['report_NumberColumn19']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn20' value='".$tb_report_arr['report_NumberColumn20']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn21' value='".$tb_report_arr['report_NumberColumn21']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_TextColumn4' value='".$tb_report_arr['report_TextColumn4']."'></input></label>",
			"<br>",
			"<label>&nbsp&nbsp&nbsp&nbsp10&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn22' value='".$tb_report_arr['report_NumberColumn22']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn23' value='".$tb_report_arr['report_NumberColumn23']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn24' value='".$tb_report_arr['report_NumberColumn24']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_TextColumn5' value='".$tb_report_arr['report_TextColumn5']."'></input></label>",
			"<br>",
			"<label>&nbsp&nbsp&nbsp&nbsp15&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn25' value='".$tb_report_arr['report_NumberColumn25']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn26' value='".$tb_report_arr['report_NumberColumn26']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn27' value='".$tb_report_arr['report_NumberColumn27']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_TextColumn6' value='".$tb_report_arr['report_TextColumn6']."'></input></label>",
			"<br>",
			"<label>&nbsp&nbsp&nbsp&nbsp20&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn28' value='".$tb_report_arr['report_NumberColumn28']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn29' value='".$tb_report_arr['report_NumberColumn29']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn30' value='".$tb_report_arr['report_NumberColumn30']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_TextColumn7' value='".$tb_report_arr['report_TextColumn7']."'></input></label>",
			"<br>",
			"<label>&nbsp&nbsp&nbsp&nbsp25&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn31' value='".$tb_report_arr['report_NumberColumn31']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn32' value='".$tb_report_arr['report_NumberColumn32']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn33' value='".$tb_report_arr['report_NumberColumn33']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_TextColumn8' value='".$tb_report_arr['report_TextColumn8']."'></input></label>",
			"<br>",
			"<label>&nbsp&nbsp&nbsp&nbsp20&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn34' value='".$tb_report_arr['report_NumberColumn34']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn35' value='".$tb_report_arr['report_NumberColumn35']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn36' value='".$tb_report_arr['report_NumberColumn36']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_TextColumn9' value='".$tb_report_arr['report_TextColumn9']."'></input></label>",
			"<br>",
			"<label>&nbsp&nbsp&nbsp&nbsp15&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn37' value='".$tb_report_arr['report_NumberColumn37']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn38' value='".$tb_report_arr['report_NumberColumn38']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn39' value='".$tb_report_arr['report_NumberColumn39']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_TextColumn10' value='".$tb_report_arr['report_TextColumn10']."'></input></label>",
			"<br>",
			"<label>&nbsp&nbsp&nbsp&nbsp10&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn40' value='".$tb_report_arr['report_NumberColumn40']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn41' value='".$tb_report_arr['report_NumberColumn41']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn42' value='".$tb_report_arr['report_NumberColumn42']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_TextColumn11' value='".$tb_report_arr['report_TextColumn11']."'></input></label>",
			"<br>",
			"<label>&nbsp&nbsp&nbsp&nbsp&nbsp5&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn43' value='".$tb_report_arr['report_NumberColumn43']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn44' value='".$tb_report_arr['report_NumberColumn44']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn45' value='".$tb_report_arr['report_NumberColumn45']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_TextColumn12' value='".$tb_report_arr['report_TextColumn12']."'></input></label>",
			"<br>",
			"<label>&nbsp&nbsp&nbsp&nbsp&nbsp0&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn46' value='".$tb_report_arr['report_NumberColumn46']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn47' value='".$tb_report_arr['report_NumberColumn47']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn48' value='".$tb_report_arr['report_NumberColumn48']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_TextColumn13' value='".$tb_report_arr['report_TextColumn13']."'></input></label>",
	"</fieldset>",
						"</fieldset>";
						break;
					case 2:
	echo "<fieldset>",
		"<legend style='border:1px'>".$tb_account_arr['equipment_name']."（".$tb_account_arr['equipment_kks']."）校验记录</legend>",
			"<input type='hidden' name='report_id' size='2' value=".$tb_report_arr['report_id']."></input>",
			"<label>设定点<input type='text'style='width:15%' name='report_NumberColumn1' value='".$tb_report_arr['report_NumberColumn1']."'></input></label>",
			"<label>单位<input type='text'style='width:15%' name='report_TextColumn1' value='".$tb_report_arr['report_TextColumn1']."'></input></label>",
			"<label>开关方向<input type='text'style='width:15%' name='report_TextColumn2' value='".$tb_report_arr['report_TextColumn2']."'></input></label>",
			"<label>外观检查<input type='text'style='width:15%' name='report_TextColumn3' value='".$tb_report_arr['report_TextColumn3']."'></input></label>",
			"<br>",
			"<label>上1<input type='text'style='width:15%' name='report_NumberColumn2' value='".$tb_report_arr['report_NumberColumn2']."'></input></label>",
			"<label>上2<input type='text'style='width:15%' name='report_NumberColumn3' value='".$tb_report_arr['report_NumberColumn3']."'></input></label>",
			"<label>上3<input type='text'style='width:15%' name='report_NumberColumn4' value='".$tb_report_arr['report_NumberColumn4']."'></input></label>",
			"<label>上平<input type='text'style='width:15%' name='report_NumberColumn5' value='".$tb_report_arr['report_NumberColumn5']."'></input></label>",
			"<br>",
			"<label>下1<input type='text'style='width:15%' name='report_NumberColumn6' value='".$tb_report_arr['report_NumberColumn6']."'></input></label>",
			"<label>下2<input type='text'style='width:15%' name='report_NumberColumn7' value='".$tb_report_arr['report_NumberColumn7']."'></input></label>",
			"<label>下3<input type='text'style='width:15%' name='report_NumberColumn8' value='".$tb_report_arr['report_NumberColumn8']."'></input></label>",
			"<label>下平<input type='text'style='width:15%' name='report_NumberColumn9' value='".$tb_report_arr['report_NumberColumn9']."'></input></label>",
			"<br>",
			"<label>上1<input type='text'style='width:15%' name='report_NumberColumn10' value='".$tb_report_arr['report_NumberColumn10']."'></input></label>",
			"<label>上2<input type='text'style='width:15%' name='report_NumberColumn11' value='".$tb_report_arr['report_NumberColumn11']."'></input></label>",
			"<label>上3<input type='text'style='width:15%' name='report_NumberColumn12' value='".$tb_report_arr['report_NumberColumn12']."'></input></label>",
			"<label>上平<input type='text'style='width:15%' name='report_NumberColumn13' value='".$tb_report_arr['report_NumberColumn13']."'></input></label>",
			"<br>",
			"<label>下1<input type='text'style='width:15%' name='report_NumberColumn14' value='".$tb_report_arr['report_NumberColumn14']."'></input></label>",
			"<label>下2<input type='text'style='width:15%' name='report_NumberColumn15' value='".$tb_report_arr['report_NumberColumn15']."'></input></label>",
			"<label>下3<input type='text'style='width:15%' name='report_NumberColumn16' value='".$tb_report_arr['report_NumberColumn16']."'></input></label>",
			"<label>下平<input type='text'style='width:15%' name='report_NumberColumn17' value='".$tb_report_arr['report_NumberColumn17']."'></input></label>",
			"<br>",
			"<label>设定点误差<input type='text'style='width:15%' name='report_NumberColumn18' value='".$tb_report_arr['report_NumberColumn18']."'></input></label>",
			"<label>重复性误差<input type='text'style='width:15%' name='report_NumberColumn19' value='".$tb_report_arr['report_NumberColumn19']."'></input></label>",
			"<input type='text'style='width:15%' name='report_NumberColumn20' value='".$tb_report_arr['report_NumberColumn20']."'></input>",
			"<label>切换差<input type='text'style='width:15%' name='report_NumberColumn21' value='".$tb_report_arr['report_NumberColumn21']."'></input></label>",
			"<br>",
			"<label>绝缘电阻<input type='text'style='width:15%' name='report_NumberColumn22' value='".$tb_report_arr['report_NumberColumn22']."'></input></label>",
			"<label>接点电阻<input type='text'style='width:15%' name='report_NumberColumn23' value='".$tb_report_arr['report_NumberColumn23']."'></input></label>";
	echo "</fieldset>";
						break;
					case 3:
	echo "<fieldset>",
		"<legend style='border:1px'>".$tb_account_arr['equipment_name']."（".$tb_account_arr['equipment_kks']."）校验记录</legend>",
			"<input type='hidden' name='report_id' size='2' value=".$tb_report_arr['report_id']."></input>",
			"<fieldset>",
			"<legend style='border:1px'>参数</legend>",

			"<label>检查前粉尘<input type='text'style='width:15%' name='report_NumberColumn1' value='".$tb_report_arr['report_NumberColumn1']."'></input></label>",
			"<label>湿度<input type='text'style='width:15%' name='report_NumberColumn2' value='".$tb_report_arr['report_NumberColumn2']."'></input></label>",
			"<label>电流<input type='text'style='width:15%' name='report_NumberColumn3' value='".$tb_report_arr['report_NumberColumn3']."'></input></label>",
			"<label>流量<input type='text'style='width:10%' name='report_NumberColumn4' value='".$tb_report_arr['report_NumberColumn4']."'></input><input type='text'style='width:10%' name='report_NumberColumn5' value='".$tb_report_arr['report_NumberColumn5']."'></input><input type='text'style='width:10%' name='report_NumberColumn6' value='".$tb_report_arr['report_NumberColumn6']."'></input></label>",
			"<br>",
			"<label>检查后粉尘<input type='text'style='width:15%' name='report_NumberColumn37' value='".$tb_report_arr['report_NumberColumn37']."'></input></label>",
			"<label>湿度<input type='text'style='width:15%' name='report_NumberColumn38' value='".$tb_report_arr['report_NumberColumn38']."'></input></label>",
			"<label>电流<input type='text'style='width:15%' name='report_NumberColumn39' value='".$tb_report_arr['report_NumberColumn39']."'></input></label>",
			"<label>流量<input type='text'style='width:10%' name='report_NumberColumn40' value='".$tb_report_arr['report_NumberColumn40']."'></input><input type='text'style='width:10%' name='report_NumberColumn47' value='".$tb_report_arr['report_NumberColumn47']."'></input><input type='text'style='width:10%' name='report_NumberColumn48' value='".$tb_report_arr['report_NumberColumn48']."'></input></label>",
	"</fieldset>",
	"<fieldset>",
			"<legend style='border:1px'>设备概况</legend>",
			"<label>气源情况<input type='text'style='width:15%' name='report_TextColumn1' value='".$tb_report_arr['report_TextColumn1']."'></input></label>",
			"<label>取样管积水<input type='text'style='width:15%' name='report_TextColumn2' value='".$tb_report_arr['report_TextColumn2']."'></input></label>",
			"<label>系统报警<input type='text'style='width:15%' name='report_TextColumn3' value='".$tb_report_arr['report_TextColumn3']."'></input></label>",
			"<br>",
			"<label>零气压力<input type='text'style='width:15%' name='report_NumberColumn7' value='".$tb_report_arr['report_NumberColumn7']."'></input></label>",
			"<label>CDA压力<input type='text'style='width:15%' name='report_NumberColumn8' value='".$tb_report_arr['report_NumberColumn8']."'></input></label>",
			"<label>稀释气压力<input type='text'style='width:15%' name='report_NumberColumn9' value='".$tb_report_arr['report_NumberColumn9']."'></input></label>",
			"<label>储气罐压力<input type='text'style='width:15%' name='report_NumberColumn10' value='".$tb_report_arr['report_NumberColumn10']."'></input></label>",
			"</fieldset>",
			"<fieldset>",
			"<legend style='border:1px'>HEPA滤芯检查</legend>",
			"<label>散射表吹扫<input type='text'style='width:10%' name='report_NumberColumn11' value='".$tb_report_arr['report_NumberColumn11']."'></input>（".$tb_report_arr['report_NumberColumn21']."/26周）</label>",
			"<label>散射表排气<input type='text'style='width:10%' name='report_NumberColumn12' value='".$tb_report_arr['report_NumberColumn12']."'></input> (".$tb_report_arr['report_NumberColumn22']."/26周）</label>",
			"<label>样气流量<input type='text'style='width:10%' name='report_NumberColumn13' value='".$tb_report_arr['report_NumberColumn13']."'></input> （".$tb_report_arr['report_NumberColumn23']."/26周）</label>",
			"<br>",
			"<label>金属过滤芯<input type='text'style='width:10%' name='report_NumberColumn14' value='".$tb_report_arr['report_NumberColumn14']."'></input> （".$tb_report_arr['report_NumberColumn24']."/52周）</label>",
			"<label>高效过滤器<input type='text'style='width:10%' name='report_NumberColumn15' value='".$tb_report_arr['report_NumberColumn15']."'></input>（".$tb_report_arr['report_NumberColumn25']."/52周）</label>",
			"<label>旁路泵<input type='text'style='width:10%' name='report_NumberColumn18' value='".$tb_report_arr['report_NumberColumn18']."'></input> （".$tb_report_arr['report_NumberColumn28']."/52周）</label>",
			"</fieldset>",
			"<fieldset>",
			"<legend style='border:1px'>流量计比对/标定</legend>",
			"<label>旁路<input type='text'style='width:15%' name='report_NumberColumn34' value='".$tb_report_arr['report_NumberColumn34']."'></input></label>",
			"<label>样气<input type='text'style='width:15%' name='report_NumberColumn35' value='".$tb_report_arr['report_NumberColumn35']."'></input></label>",
			"<label>稀释<input type='text'style='width:15%' name='report_NumberColumn36' value='".$tb_report_arr['report_NumberColumn36']."'></input></label>",
			"<br>",
			"<label>旁路<input type='text'style='width:15%' name='report_NumberColumn44' value='".$tb_report_arr['report_NumberColumn44']."'></input></label>",
			"<label>样气<input type='text'style='width:15%' name='report_NumberColumn45' value='".$tb_report_arr['report_NumberColumn45']."'></input></label>",
			"<label>稀释<input type='text'style='width:15%' name='report_NumberColumn46' value='".$tb_report_arr['report_NumberColumn46']."'></input></label>",
			"<br>",
			"<label>比对/标定<input type='text'style='width:10%' name='report_NumberColumn16' value='".$tb_report_arr['report_NumberColumn16']."'></input><input type='text'style='width:5%' name='report_NumberColumn26' value='".$tb_report_arr['report_NumberColumn26']."'></input>周（4周）</label>",
			"</fieldset>",
			"<fieldset>",
			"<legend style='border:1px'>设备清理</legend>",
			"<label>旁路<input type='text'style='width:10%' name='report_NumberColumn20' value='".$tb_report_arr['report_NumberColumn20']."'></input><input type='text'style='width:5%' name='report_NumberColumn30' value='".$tb_report_arr['report_NumberColumn30']."'></input>周</label>",
			"<label>样气<input type='text'style='width:10%' name='report_NumberColumn31' value='".$tb_report_arr['report_NumberColumn31']."'></input><input type='text'style='width:5%' name='report_NumberColumn41' value='".$tb_report_arr['report_NumberColumn41']."'></input>周</label>",
			"<label>稀释<input type='text'style='width:10%' name='report_NumberColumn32' value='".$tb_report_arr['report_NumberColumn32']."'></input><input type='text'style='width:5%' name='report_NumberColumn42' value='".$tb_report_arr['report_NumberColumn42']."'></input>周</label>",
			"<br>",
			"<label>喷嘴<input type='text'style='width:10%' name='report_NumberColumn17' value='".$tb_report_arr['report_NumberColumn17']."'></input><input type='text'style='width:5%' name='report_NumberColumn27' value='".$tb_report_arr['report_NumberColumn27']."'></input>周（4周）</label>",
			"<label>稀释模块<input type='text'style='width:10%' name='report_NumberColumn19' value='".$tb_report_arr['report_NumberColumn19']."'></input><input type='text'style='width:5%' name='report_NumberColumn29' value='".$tb_report_arr['report_NumberColumn29']."'></input>周（12周）</label>",
			"<label>散射表<input type='text'style='width:10%' name='report_NumberColumn33' value='".$tb_report_arr['report_NumberColumn33']."'></input><input type='text'style='width:5%' name='report_NumberColumn43' value='".$tb_report_arr['report_NumberColumn43']."'></input>周（24周）</label>",
			"</fieldset>",
		"<fieldset>",
			"<legend style='border:1px'>检查记录</legend>",
			"<textarea style='width:100%' readonly rows='5'>".$tb_report_arr['report_NumberColumn1']."</textarea>",
		"</fieldset>";
	echo "</fieldset>";
						break;
					case 4:
	echo "<fieldset>",
		"<legend style='border:1px'>".$tb_account_arr['equipment_name']."（".$tb_account_arr['equipment_kks']."）校验记录</legend>",
			"<input type='hidden' name='report_id' size='2' value=".$tb_report_arr['report_id']."></input>",
			"<fieldset>",
			"<legend style='border:1px'>参数</legend>",

			"<label>检查前粉尘<input type='text'style='width:15%' name='report_NumberColumn1' value='".$tb_report_arr['report_NumberColumn1']."'></input></label>",
			"<label>湿度<input type='text'style='width:15%' name='report_NumberColumn2' value='".$tb_report_arr['report_NumberColumn2']."'></input></label>",
			"<label>电流<input type='text'style='width:15%' name='report_NumberColumn3' value='".$tb_report_arr['report_NumberColumn3']."'></input></label>",
			"<label>流量<input type='text'style='width:10%' name='report_NumberColumn4' value='".$tb_report_arr['report_NumberColumn4']."'></input><input type='text'style='width:10%' name='report_NumberColumn5' value='".$tb_report_arr['report_NumberColumn5']."'></input><input type='text'style='width:10%' name='report_NumberColumn6' value='".$tb_report_arr['report_NumberColumn6']."'></input></label>",
			"<br>",
			"<label>检查后粉尘<input type='text'style='width:15%' name='report_NumberColumn37' value='".$tb_report_arr['report_NumberColumn37']."'></input></label>",
			"<label>湿度<input type='text'style='width:15%' name='report_NumberColumn38' value='".$tb_report_arr['report_NumberColumn38']."'></input></label>",
			"<label>电流<input type='text'style='width:15%' name='report_NumberColumn39' value='".$tb_report_arr['report_NumberColumn39']."'></input></label>",
			"<label>流量<input type='text'style='width:10%' name='report_NumberColumn40' value='".$tb_report_arr['report_NumberColumn40']."'></input><input type='text'style='width:10%' name='report_NumberColumn47' value='".$tb_report_arr['report_NumberColumn47']."'></input><input type='text'style='width:10%' name='report_NumberColumn48' value='".$tb_report_arr['report_NumberColumn48']."'></input></label>",
	"</fieldset>",
	"<fieldset>",
			"<legend style='border:1px'>设备概况</legend>",
			"<label>气源情况<input type='text'style='width:15%' name='report_TextColumn1' value='".$tb_report_arr['report_TextColumn1']."'></input></label>",
			"<label>取样管积水<input type='text'style='width:15%' name='report_TextColumn2' value='".$tb_report_arr['report_TextColumn2']."'></input></label>",
			"<label>系统报警<input type='text'style='width:15%' name='report_TextColumn3' value='".$tb_report_arr['report_TextColumn3']."'></input></label>",
			"<br>",
			"<label>零气压力<input type='text'style='width:15%' name='report_NumberColumn7' value='".$tb_report_arr['report_NumberColumn7']."'></input></label>",
			"<label>CDA压力<input type='text'style='width:15%' name='report_NumberColumn8' value='".$tb_report_arr['report_NumberColumn8']."'></input></label>",
			"<label>稀释气压力<input type='text'style='width:15%' name='report_NumberColumn9' value='".$tb_report_arr['report_NumberColumn9']."'></input></label>",
			"<label>储气罐压力<input type='text'style='width:15%' name='report_NumberColumn10' value='".$tb_report_arr['report_NumberColumn10']."'></input></label>",
			"</fieldset>",
			"<fieldset>",
			"<legend style='border:1px'>HEPA滤芯检查</legend>",
			"<label>散射表吹扫<input type='text'style='width:10%' name='report_NumberColumn11' value='".$tb_report_arr['report_NumberColumn11']."'></input>（".$tb_report_arr['report_NumberColumn21']."/26周）</label>",
			"<label>散射表排气<input type='text'style='width:10%' name='report_NumberColumn12' value='".$tb_report_arr['report_NumberColumn12']."'></input> (".$tb_report_arr['report_NumberColumn22']."/26周）</label>",
			"<label>样气流量<input type='text'style='width:10%' name='report_NumberColumn13' value='".$tb_report_arr['report_NumberColumn13']."'></input> （".$tb_report_arr['report_NumberColumn23']."/26周）</label>",
			"<br>",
			"<label>金属过滤芯<input type='text'style='width:10%' name='report_NumberColumn14' value='".$tb_report_arr['report_NumberColumn14']."'></input> （".$tb_report_arr['report_NumberColumn24']."/52周）</label>",
			"<label>高效过滤器<input type='text'style='width:10%' name='report_NumberColumn15' value='".$tb_report_arr['report_NumberColumn15']."'></input>（".$tb_report_arr['report_NumberColumn25']."/52周）</label>",
			"<label>旁路泵<input type='text'style='width:10%' name='report_NumberColumn18' value='".$tb_report_arr['report_NumberColumn18']."'></input> （".$tb_report_arr['report_NumberColumn28']."/52周）</label>",
			"</fieldset>",
			"<fieldset>",
			"<legend style='border:1px'>流量计比对/标定</legend>",
			"<label>旁路<input type='text'style='width:15%' name='report_NumberColumn34' value='".$tb_report_arr['report_NumberColumn34']."'></input></label>",
			"<label>样气<input type='text'style='width:15%' name='report_NumberColumn35' value='".$tb_report_arr['report_NumberColumn35']."'></input></label>",
			"<label>稀释<input type='text'style='width:15%' name='report_NumberColumn36' value='".$tb_report_arr['report_NumberColumn36']."'></input></label>",
			"<br>",
			"<label>旁路<input type='text'style='width:15%' name='report_NumberColumn44' value='".$tb_report_arr['report_NumberColumn44']."'></input></label>",
			"<label>样气<input type='text'style='width:15%' name='report_NumberColumn45' value='".$tb_report_arr['report_NumberColumn45']."'></input></label>",
			"<label>稀释<input type='text'style='width:15%' name='report_NumberColumn46' value='".$tb_report_arr['report_NumberColumn46']."'></input></label>",
			"<br>",
			"<label>比对/标定<input type='text'style='width:10%' name='report_NumberColumn16' value='".$tb_report_arr['report_NumberColumn16']."'></input><input type='text'style='width:5%' name='report_NumberColumn26' value='".$tb_report_arr['report_NumberColumn26']."'></input>周（4周）</label>",
			"</fieldset>",
			"<fieldset>",
			"<legend style='border:1px'>设备清理</legend>",
			"<label>旁路<input type='text'style='width:10%' name='report_NumberColumn20' value='".$tb_report_arr['report_NumberColumn20']."'></input><input type='text'style='width:5%' name='report_NumberColumn30' value='".$tb_report_arr['report_NumberColumn30']."'></input>周</label>",
			"<label>样气<input type='text'style='width:10%' name='report_NumberColumn31' value='".$tb_report_arr['report_NumberColumn31']."'></input><input type='text'style='width:5%' name='report_NumberColumn41' value='".$tb_report_arr['report_NumberColumn41']."'></input>周</label>",
			"<label>稀释<input type='text'style='width:10%' name='report_NumberColumn32' value='".$tb_report_arr['report_NumberColumn32']."'></input><input type='text'style='width:5%' name='report_NumberColumn42' value='".$tb_report_arr['report_NumberColumn42']."'></input>周</label>",
			"<br>",
			"<label>喷嘴<input type='text'style='width:10%' name='report_NumberColumn17' value='".$tb_report_arr['report_NumberColumn17']."'></input><input type='text'style='width:5%' name='report_NumberColumn27' value='".$tb_report_arr['report_NumberColumn27']."'></input>周（4周）</label>",
			"<label>稀释模块<input type='text'style='width:10%' name='report_NumberColumn19' value='".$tb_report_arr['report_NumberColumn19']."'></input><input type='text'style='width:5%' name='report_NumberColumn29' value='".$tb_report_arr['report_NumberColumn29']."'></input>周（12周）</label>",
			"<label>散射表<input type='text'style='width:10%' name='report_NumberColumn33' value='".$tb_report_arr['report_NumberColumn33']."'></input><input type='text'style='width:5%' name='report_NumberColumn43' value='".$tb_report_arr['report_NumberColumn43']."'></input>周（24周）</label>",
			"</fieldset>",
		"<fieldset>",
			"<legend style='border:1px'>检查记录</legend>",
			"<textarea style='width:100%' readonly rows='5'>".$tb_report_arr['report_NumberColumn1']."</textarea>",
		"</fieldset>";
	echo "</fieldset>";
						break;
					default:
						echo "无flag";
					}
						return $tb_report_arr['report_id'];
	}
	public function editReport($Id){//显示Id为LedgerId的工作记录
		//$tb_report_sql = 'SELECT report_id,report_account_id,report_TextColumn1,report_NumberColumn1,report_NumberColumn2 FROM tb_FeederReport where report_id='.$Id;
		$tb_report_sql = 'SELECT * FROM tb_FeederReport where report_id='.$Id;
		$tb_report_result = mysqli_query($this->conn, $tb_report_sql);
		$tb_report_arr=mysqli_fetch_assoc($tb_report_result);
		$flag = $tb_report_arr['flag'];
		$calibra = $tb_report_arr['calibra'];
		$checkp = $tb_report_arr['checkp'];

			echo "<input type='hidden' name='flag' size='2' value=".$tb_report_arr['flag']."></input>";

					$tb_account_sql = "SELECT equipment_kks,equipment_name FROM tb_account WHERE account_id =".$tb_report_arr['report_account_id'];
					$tb_account_result = mysqli_query($this->conn, $tb_account_sql);
					$tb_account_arr=mysqli_fetch_assoc($tb_account_result);
					switch($flag)
					{
					case 1:
	echo "<fieldset>",
		"<legend style='border:1px'>".$tb_account_arr['equipment_name']."（".$tb_account_arr['equipment_kks']."）校验记录</legend>",
			"<input type='hidden' name='report_id' size='2' value=".$tb_report_arr['report_id']."></input>",
			"<label>皮带秤型号<input type='text'style='width:15%' name='report_TextColumn1' value='".$tb_report_arr['report_TextColumn1']."'></input></label>",
			"<label>流量范围<input type='text'style='width:15%' name='report_TextColumn2' value='".$tb_report_arr['report_TextColumn2']."'></input></label>",
			"<br>",
	"<fieldset>",
		"<legend style='border:1px'>皮带秤参数</legend>",
			"<label>称重传感器灵敏度P03.03<input type='text'style='width:15%' name='report_NumberColumn1' value='".$tb_report_arr['report_NumberColumn1']."'></input>mV/V</label>",
			"<label>基本皮重P04.05<input type='text'style='width:15%' name='report_NumberColumn2' value='".$tb_report_arr['report_NumberColumn2']."'></input>kg/m</label>",
			"<br>",
			"<label>有效称量长度P03.05<input type='text'style='width:15%' name='report_NumberColumn3' value='".$tb_report_arr['report_NumberColumn3']."'></input>m</label>",
			"<label>调零皮重P04.04<input type='text'style='width:15%' name='report_NumberColumn4' value='".$tb_report_arr['report_NumberColumn4']."'></input>kg/m</label>",
			"<br>",
			"<label>标定重量P03.08<input type='text'style='width:15%' name='report_NumberColumn5' value='".$tb_report_arr['report_NumberColumn5']."'></input>kg</label>",
			"<label>总皮重P04.03<input type='text'style='width:15%' name='report_NumberColumn6' value='".$tb_report_arr['report_NumberColumn6']."'></input>kg/m</label>",
	"</fieldset>",
			"<br>",
			"<br>",
	"<fieldset>",
		"<legend style='border:1px'>校验参数</legend>",
			"<label>运行标定程序所需的皮带整圈数P03.01<input type='text'style='width:15%' name='report_NumberColumn8' value='".$tb_report_arr['report_NumberColumn8']."'></input></label>",
			"<label>校验后基本皮重P04.05<input type='text'style='width:15%' name='report_NumberColumn9' value='".$tb_report_arr['report_NumberColumn9']."'></input></label>",
			"<br>",
			"<label>皮带转一周的时间P03.02<input type='text'style='width:15%' name='report_NumberColumn10' value='".$tb_report_arr['report_NumberColumn10']."'></input></label>",
			"<label>校验后调零皮重P04.04<input type='text'style='width:15%' name='report_NumberColumn11' value='".$tb_report_arr['report_NumberColumn11']."'></input></label>",
			"<br>",
			"<label>皮带运行一周的累计测速脉冲总数P04.06<input type='text'style='width:15%' name='report_NumberColumn12' value='".$tb_report_arr['report_NumberColumn12']."'></input></label>",
			"<label>校验后总皮重P04.03<input type='text'style='width:15%' name='report_NumberColumn13' value='".$tb_report_arr['report_NumberColumn13']."'></input></label>",
			"<br>",
			"<label>原量程校正系数P04.02<input type='text'style='width:15%' name='report_NumberColumn14' value='".$tb_report_arr['report_NumberColumn14']."'></input></label>",
			"<label>量程校正系数P04.02<input type='text'style='width:15%' name='report_NumberColumn15' value='".$tb_report_arr['report_NumberColumn15']."'></input></label>",
	"</fieldset>",
	"<fieldset>",
		"<legend style='border:1px'>走码校验</legend>",
			"<label>零点校验<input type='text'style='width:50%' name='report_NumberColumn7' value='".$tb_report_arr['report_NumberColumn7']."'></input></label>",
			"<br>",
			"给定t/h&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp反馈t/h&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp转速m/s&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp变频HZ&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp备注",
			"<br>",
			"<label>&nbsp&nbsp&nbsp&nbsp&nbsp0&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn16' value='".$tb_report_arr['report_NumberColumn16']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn17' value='".$tb_report_arr['report_NumberColumn17']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn18' value='".$tb_report_arr['report_NumberColumn18']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_TextColumn3' value='".$tb_report_arr['report_TextColumn3']."'></input></label>",
			"<br>",
			"<label>&nbsp&nbsp&nbsp&nbsp&nbsp5&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn19' value='".$tb_report_arr['report_NumberColumn19']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn20' value='".$tb_report_arr['report_NumberColumn20']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn21' value='".$tb_report_arr['report_NumberColumn21']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_TextColumn4' value='".$tb_report_arr['report_TextColumn4']."'></input></label>",
			"<br>",
			"<label>&nbsp&nbsp&nbsp&nbsp10&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn22' value='".$tb_report_arr['report_NumberColumn22']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn23' value='".$tb_report_arr['report_NumberColumn23']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn24' value='".$tb_report_arr['report_NumberColumn24']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_TextColumn5' value='".$tb_report_arr['report_TextColumn5']."'></input></label>",
			"<br>",
			"<label>&nbsp&nbsp&nbsp&nbsp15&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn25' value='".$tb_report_arr['report_NumberColumn25']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn26' value='".$tb_report_arr['report_NumberColumn26']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn27' value='".$tb_report_arr['report_NumberColumn27']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_TextColumn6' value='".$tb_report_arr['report_TextColumn6']."'></input></label>",
			"<br>",
			"<label>&nbsp&nbsp&nbsp&nbsp20&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn28' value='".$tb_report_arr['report_NumberColumn28']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn29' value='".$tb_report_arr['report_NumberColumn29']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn30' value='".$tb_report_arr['report_NumberColumn30']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_TextColumn7' value='".$tb_report_arr['report_TextColumn7']."'></input></label>",
			"<br>",
			"<label>&nbsp&nbsp&nbsp&nbsp25&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn31' value='".$tb_report_arr['report_NumberColumn31']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn32' value='".$tb_report_arr['report_NumberColumn32']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn33' value='".$tb_report_arr['report_NumberColumn33']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_TextColumn8' value='".$tb_report_arr['report_TextColumn8']."'></input></label>",
			"<br>",
			"<label>&nbsp&nbsp&nbsp&nbsp20&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn34' value='".$tb_report_arr['report_NumberColumn34']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn35' value='".$tb_report_arr['report_NumberColumn35']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn36' value='".$tb_report_arr['report_NumberColumn36']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_TextColumn9' value='".$tb_report_arr['report_TextColumn9']."'></input></label>",
			"<br>",
			"<label>&nbsp&nbsp&nbsp&nbsp15&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn37' value='".$tb_report_arr['report_NumberColumn37']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn38' value='".$tb_report_arr['report_NumberColumn38']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn39' value='".$tb_report_arr['report_NumberColumn39']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_TextColumn10' value='".$tb_report_arr['report_TextColumn10']."'></input></label>",
			"<br>",
			"<label>&nbsp&nbsp&nbsp&nbsp10&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn40' value='".$tb_report_arr['report_NumberColumn40']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn41' value='".$tb_report_arr['report_NumberColumn41']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn42' value='".$tb_report_arr['report_NumberColumn42']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_TextColumn11' value='".$tb_report_arr['report_TextColumn11']."'></input></label>",
			"<br>",
			"<label>&nbsp&nbsp&nbsp&nbsp&nbsp5&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn43' value='".$tb_report_arr['report_NumberColumn43']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn44' value='".$tb_report_arr['report_NumberColumn44']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn45' value='".$tb_report_arr['report_NumberColumn45']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_TextColumn12' value='".$tb_report_arr['report_TextColumn12']."'></input></label>",
			"<br>",
			"<label>&nbsp&nbsp&nbsp&nbsp&nbsp0&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn46' value='".$tb_report_arr['report_NumberColumn46']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn47' value='".$tb_report_arr['report_NumberColumn47']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_NumberColumn48' value='".$tb_report_arr['report_NumberColumn48']."'></input></label>",
			"<label>&nbsp&nbsp&nbsp&nbsp<input type='text'style='width:15%' name='report_TextColumn13' value='".$tb_report_arr['report_TextColumn13']."'></input></label>",
	"</fieldset>";
		echo"<label>校验人员",
		"<select name='calibra_people'style='width:15%' class='selectfont'>";
		$tb_user_sql = "SELECT * FROM `tb_user` WHERE 1";
		$tb_user_result = mysqli_query($this->conn, $tb_user_sql);
		while($tb_user_arr=mysqli_fetch_assoc($tb_user_result)){
			if($tb_user_arr['user_id']==$calibra){
                		echo "<option value=".$tb_user_arr['user_id']." selected='selected'>".$tb_user_arr['user_name']."</option>";
			}else{
                		echo "<option value=".$tb_user_arr['user_id'].">".$tb_user_arr['user_name']."</option>";
			}
		}
		echo "</select>",
			"</label>",
		"<label>核验人员",
		"<select name='check_people'style='width:15%' class='selectfont'>";
		$tb_user_sql = "SELECT * FROM `tb_user` WHERE 1";
		$tb_user_result = mysqli_query($this->conn, $tb_user_sql);
		while($tb_user_arr=mysqli_fetch_assoc($tb_user_result)){
			if($tb_user_arr['user_id']==$checkp){
                		echo "<option value=".$tb_user_arr['user_id']." selected='selected'>".$tb_user_arr['user_name']."</option>";
			}else{
                		echo "<option value=".$tb_user_arr['user_id'].">".$tb_user_arr['user_name']."</option>";
			}
		}
		echo "</select>",
			"</label>";
						echo "</fieldset>";
						break;
					case 2:
	echo "<fieldset>",
		"<legend style='border:1px'>".$tb_account_arr['equipment_name']."（".$tb_account_arr['equipment_kks']."）校验记录</legend>",
			"<input type='hidden' name='report_id' size='2' value=".$tb_report_arr['report_id']."></input>",
	"<fieldset>",
		"<legend style='border:1px'>设备信息</legend>",
			"<label>设定点值<input type='text'style='width:10%' name='report_NumberColumn1' value='".$tb_report_arr['report_NumberColumn1']."'></input></label>",
			"<label>压力单位<input type='text'style='width:10%' name='report_TextColumn1' value='".$tb_report_arr['report_TextColumn1']."'></input></label>",
			//"<label>开关方向<input type='text'style='width:10%' name='report_TextColumn2' value='".$tb_report_arr['report_TextColumn2']."'></input></label>",
			"<label>开关方向<select name='report_NumberColumn28' style='width:10%' class='selectfont'>";
			if($tb_report_arr['report_NumberColumn28'] == 0){
				echo "<option value=0 selected='selected'>上</option>";
				echo "<option value=1>下<option>";
			}else{
				echo "<option value=1 selected='selected'>下</option>";
				echo "<option value=0>上<option>";
			}
				echo "</select></label>",
			"<label>开关精度<input type='text'style='width:10%' name='report_NumberColumn24' value='".$tb_report_arr['report_NumberColumn24']."'></input></label>",
			"<br>",
			"<label>外观检查<input type='text'style='width:10%' name='report_TextColumn3' value='".$tb_report_arr['report_TextColumn3']."'></input></label>",
			"<label>环境温度<input type='text'style='width:10%' name='report_NumberColumn25' value='".$tb_report_arr['report_NumberColumn25']."'></input></label>",
			"<label>环境湿度<input type='text'style='width:10%' name='report_NumberColumn26' value='".$tb_report_arr['report_NumberColumn26']."'></input></label>",
			"<label>计算精度<input type='text'style='width:10%' name='xiaoshu' value='2'></input></label>",
			"<br>",
			"<label>校验前数据：（计算精度指计算结果小数点后位数，默认两位）",
	"</fieldset>",
			"<br>",
	"<fieldset>",
		"<legend style='border:1px'>校验前数据</legend>",
			"<br>",
			"<label>上1<input type='text'style='width:15%' name='report_NumberColumn2' value='".$tb_report_arr['report_NumberColumn2']."'></input></label>",
			"<label>上2<input type='text'style='width:15%' name='report_NumberColumn3' value='".$tb_report_arr['report_NumberColumn3']."'></input></label>",
			"<label>上3<input type='text'style='width:15%' name='report_NumberColumn4' value='".$tb_report_arr['report_NumberColumn4']."'></input></label>",
			//"<label>上平<input type='text'style='width:15%' name='report_NumberColumn5' value='".$tb_report_arr['report_NumberColumn5']."'></input></label>",
			"<br>",
			"<label>下1<input type='text'style='width:15%' name='report_NumberColumn6' value='".$tb_report_arr['report_NumberColumn6']."'></input></label>",
			"<label>下2<input type='text'style='width:15%' name='report_NumberColumn7' value='".$tb_report_arr['report_NumberColumn7']."'></input></label>",
			"<label>下3<input type='text'style='width:15%' name='report_NumberColumn8' value='".$tb_report_arr['report_NumberColumn8']."'></input></label>",
			//"<label>下平<input type='text'style='width:15%' name='report_NumberColumn9' value='".$tb_report_arr['report_NumberColumn9']."'></input></label>",
	"</fieldset>",
			"<br>",
	"<fieldset>",
		"<legend style='border:1px'>校验后数据</legend>",
			"<br>",
			"<label>上1<input type='text'style='width:15%' name='report_NumberColumn10' value='".$tb_report_arr['report_NumberColumn10']."'></input></label>",
			"<label>上2<input type='text'style='width:15%' name='report_NumberColumn11' value='".$tb_report_arr['report_NumberColumn11']."'></input></label>",
			"<label>上3<input type='text'style='width:15%' name='report_NumberColumn12' value='".$tb_report_arr['report_NumberColumn12']."'></input></label>",
			//"<label>上平<input type='text'style='width:15%' name='report_NumberColumn13' value='".$tb_report_arr['report_NumberColumn13']."'></input></label>",
			"<br>",
			"<label>下1<input type='text'style='width:15%' name='report_NumberColumn14' value='".$tb_report_arr['report_NumberColumn14']."'></input></label>",
			"<label>下2<input type='text'style='width:15%' name='report_NumberColumn15' value='".$tb_report_arr['report_NumberColumn15']."'></input></label>",
			"<label>下3<input type='text'style='width:15%' name='report_NumberColumn16' value='".$tb_report_arr['report_NumberColumn16']."'></input></label>",
			//"<label>下平<input type='text'style='width:15%' name='report_NumberColumn17' value='".$tb_report_arr['report_NumberColumn17']."'></input></label>",
	"</fieldset>",
			"<br>",
			//"<label>设定点误差<input type='text'style='width:15%' name='report_NumberColumn18' value='".$tb_report_arr['report_NumberColumn18']."'></input></label>",
			//"<label>重复性误差<input type='text'style='width:15%' name='report_NumberColumn19' value='".$tb_report_arr['report_NumberColumn19']."'></input></label>",
			//"<input type='text'style='width:15%' name='report_NumberColumn20' value='".$tb_report_arr['report_NumberColumn20']."'></input>",
			//"<label>切换差<input type='text'style='width:15%' name='report_NumberColumn21' value='".$tb_report_arr['report_NumberColumn21']."'></input></label>",
			//"<br>",
	"<fieldset>",
		"<legend style='border:1px'>绝缘测试</legend>",
			"<br>",
			"<label>绝缘电阻<input type='text'style='width:15%' name='report_NumberColumn22' value='".$tb_report_arr['report_NumberColumn22']."'></input></label>",
			"<label>接点电阻<input type='text'style='width:15%' name='report_NumberColumn23' value='".$tb_report_arr['report_NumberColumn23']."'></input></label>",
	"</fieldset>";
		echo"<label>校验人员",
		"<select name='calibra_people'style='width:15%' class='selectfont'>";
		$tb_user_sql = "SELECT * FROM `tb_user` WHERE 1";
		$tb_user_result = mysqli_query($this->conn, $tb_user_sql);
		while($tb_user_arr=mysqli_fetch_assoc($tb_user_result)){
			if($tb_user_arr['user_id']==$calibra){
                		echo "<option value=".$tb_user_arr['user_id']." selected='selected'>".$tb_user_arr['user_name']."</option>";
			}else{
                		echo "<option value=".$tb_user_arr['user_id'].">".$tb_user_arr['user_name']."</option>";
			}
		}
		echo "</select>",
			"</label>",
		"<label>核验人员",
		"<select name='check_people'style='width:15%' class='selectfont'>";
		$tb_user_sql = "SELECT * FROM `tb_user` WHERE 1";
		$tb_user_result = mysqli_query($this->conn, $tb_user_sql);
		while($tb_user_arr=mysqli_fetch_assoc($tb_user_result)){
			if($tb_user_arr['user_id']==$checkp){
                		echo "<option value=".$tb_user_arr['user_id']." selected='selected'>".$tb_user_arr['user_name']."</option>";
			}else{
                		echo "<option value=".$tb_user_arr['user_id'].">".$tb_user_arr['user_name']."</option>";
			}
		}
		echo "</select>",
			"</label>";
	echo "</fieldset>";
						break;
					case 3:
	echo "<fieldset>",
		"<legend style='border:1px'>".$tb_account_arr['equipment_name']."（".$tb_account_arr['equipment_kks']."）校验记录</legend>",
			"<input type='hidden' name='report_id' size='2' value=".$tb_report_arr['report_id']."></input>",
			"<input type='hidden' name='report_step' size='2' value=".$tb_report_arr['report_step']."></input>";
			echo "<fieldset>",
			"<legend style='border:1px'>参数</legend>",

			"<label>检查前粉尘<input type='text'style='width:15%' name='report_NumberColumn1' value='".$tb_report_arr['report_NumberColumn1']."'></input></label>",
			"<label>湿度<input type='text'style='width:15%' name='report_NumberColumn2' value='".$tb_report_arr['report_NumberColumn2']."'></input></label>",
			"<label>电流<input type='text'style='width:15%' name='report_NumberColumn3' value='".$tb_report_arr['report_NumberColumn3']."'></input></label>",
			"<label>流量<input type='text'style='width:10%' name='report_NumberColumn4' value='".$tb_report_arr['report_NumberColumn4']."'></input><input type='text'style='width:10%' name='report_NumberColumn5' value='".$tb_report_arr['report_NumberColumn5']."'></input><input type='text'style='width:10%' name='report_NumberColumn6' value='".$tb_report_arr['report_NumberColumn6']."'></input></label>";
			if($tb_report_arr['report_step'] > 4){

			echo "<br>",
			"<label>检查后粉尘<input type='text'style='width:15%' name='report_NumberColumn37' value='".$tb_report_arr['report_NumberColumn37']."'></input></label>",
			"<label>湿度<input type='text'style='width:15%' name='report_NumberColumn38' value='".$tb_report_arr['report_NumberColumn38']."'></input></label>",
			"<label>电流<input type='text'style='width:15%' name='report_NumberColumn39' value='".$tb_report_arr['report_NumberColumn39']."'></input></label>",
			"<label>流量<input type='text'style='width:10%' name='report_NumberColumn40' value='".$tb_report_arr['report_NumberColumn40']."'></input><input type='text'style='width:10%' name='report_NumberColumn47' value='".$tb_report_arr['report_NumberColumn47']."'></input><input type='text'style='width:10%' name='report_NumberColumn48' value='".$tb_report_arr['report_NumberColumn48']."'></input></label>";
			}
	echo "</fieldset>";
			if($tb_report_arr['report_step'] > 0){
	echo "<fieldset>",
			"<legend style='border:1px'>设备概况</legend>",
			"<label>气源情况<input type='text'style='width:15%' name='report_TextColumn1' value='".$tb_report_arr['report_TextColumn1']."'></input></label>",
			"<label>取样管积水<input type='text'style='width:15%' name='report_TextColumn2' value='".$tb_report_arr['report_TextColumn2']."'></input></label>",
			"<label>系统报警<input type='text'style='width:15%' name='report_TextColumn3' value='".$tb_report_arr['report_TextColumn3']."'></input></label>",
			"<br>",
			"<label>零气压力<input type='text'style='width:15%' name='report_NumberColumn7' value='".$tb_report_arr['report_NumberColumn7']."'></input></label>",
			"<label>CDA压力<input type='text'style='width:15%' name='report_NumberColumn8' value='".$tb_report_arr['report_NumberColumn8']."'></input></label>",
			"<label>稀释气压力<input type='text'style='width:15%' name='report_NumberColumn9' value='".$tb_report_arr['report_NumberColumn9']."'></input></label>",
			"<label>储气罐压力<input type='text'style='width:15%' name='report_NumberColumn10' value='".$tb_report_arr['report_NumberColumn10']."'></input></label>",
			"</fieldset>";
			}
			if($tb_report_arr['report_step'] > 1){
			echo "<fieldset>",
			"<legend style='border:1px'>HEPA滤芯检查</legend>",
			"<label>散射表吹扫<select name='report_NumberColumn11' style='width:10%' class='selectfont'>",
				"<option value=0 selected='selected'>检查正常</option>",
				"<option value=1>更换滤芯<option>",
				"</select>",
				"（".$tb_report_arr['report_NumberColumn21']."/26周）</label>",
				"<label>散射表出口<select name='report_NumberColumn12' style='width:10%' class='selectfont'>",
				"<option value=0 selected='selected'>检查正常</option>",
				"<option value=1>更换滤芯<option>",
				"</select>",
				"（".$tb_report_arr['report_NumberColumn22']."/26周）</label>",
				"<label>样气流量计<select name='report_NumberColumn13' style='width:10%' class='selectfont'>",
				"<option value=0 selected='selected'>检查正常</option>",
				"<option value=1>更换滤芯<option>",
				"</select>",
				"（".$tb_report_arr['report_NumberColumn23']."/26周）</label>",
			"<br>",
				"<label>高效过滤器<select name='report_NumberColumn15' style='width:10%' class='selectfont'>",
				"<option value=0 selected='selected'>检查正常</option>",
				"<option value=1>更换滤芯<option>",
				"</select>",
				"（".$tb_report_arr['report_NumberColumn25']."/52周）</label>",
			"<label>金属过滤器<select name='report_NumberColumn14' style='width:10%' class='selectfont'>",
				"<option value=0 selected='selected'>检查正常</option>",
				"<option value=1>更换滤芯<option>",
				"</select>",
				"（".$tb_report_arr['report_NumberColumn24']."/52周）</label>",
			"<label>旁路采样泵<select name='report_NumberColumn18' style='width:10%' class='selectfont'>",
				"<option value=0 selected='selected'>未检查</option>",
				"<option value=1>更换设备<option>",
				"</select>",
				"（".$tb_report_arr['report_NumberColumn28']."/52周）</label>",
			"</fieldset>";
			}
			if($tb_report_arr['report_step'] > 2){
			echo "<fieldset>",
			"<legend style='border:1px'>流量计比对/标定</legend>",
			"<label>旁路<input type='text'style='width:15%' name='report_NumberColumn34' value='".$tb_report_arr['report_NumberColumn34']."'></input></label>",
			"<label>样气<input type='text'style='width:15%' name='report_NumberColumn35' value='".$tb_report_arr['report_NumberColumn35']."'></input></label>",
			"<label>稀释<input type='text'style='width:15%' name='report_NumberColumn36' value='".$tb_report_arr['report_NumberColumn36']."'></input></label>",
			"<br>",
			"<label>旁路<input type='text'style='width:15%' name='report_NumberColumn44' value='".$tb_report_arr['report_NumberColumn44']."'></input></label>",
			"<label>样气<input type='text'style='width:15%' name='report_NumberColumn45' value='".$tb_report_arr['report_NumberColumn45']."'></input></label>",
			"<label>稀释<input type='text'style='width:15%' name='report_NumberColumn46' value='".$tb_report_arr['report_NumberColumn46']."'></input></label>",
			"<br>",
			"<label>比对/标定<select name='report_NumberColumn16' style='width:10%' class='selectfont'>",
				"<option value=0 selected='selected'>未检查</option>",
				"<option value=1>比对/标定<option>",
				"</select>",
				"（".$tb_report_arr['report_NumberColumn26']."/4周）</label>",
			"</fieldset>";
			}
			if($tb_report_arr['report_step'] > 3){
			echo "<fieldset>",
			"<legend style='border:1px'>设备清理</legend>",
			"<label>喷嘴<select name='report_NumberColumn17' style='width:10%' class='selectfont'>",
				"<option value=0 selected='selected'>未检查</option>",
				"<option value=1>清理<option>",
				"</select>",
				"（".$tb_report_arr['report_NumberColumn27']."/4周）</label>",
				"<label>稀释模块<select name='report_NumberColumn19' style='width:10%' class='selectfont'>",
				"<option value=0 selected='selected'>未检查</option>",
				"<option value=1>清理<option>",
				"</select>",
				"（".$tb_report_arr['report_NumberColumn29']."/12周）</label>",
				"<label>散射表<select name='report_NumberColumn33' style='width:10%' class='selectfont'>",
				"<option value=0 selected='selected'>未检查</option>",
				"<option value=1>清理<option>",
				"</select>",
				"（".$tb_report_arr['report_NumberColumn43']."/52周）</label>",
			"<br>",
			"<label>旁路流量计<select name='report_NumberColumn20' style='width:10%' class='selectfont'>",
				"<option value=0 selected='selected'>未检查</option>",
				"<option value=1>清理<option>",
				"</select>",
				"（".$tb_report_arr['report_NumberColumn30']."/26周）</label>",
			"<label>样气流量计<select name='report_NumberColumn31' style='width:10%' class='selectfont'>",
				"<option value=0 selected='selected'>未检查</option>",
				"<option value=1>清理<option>",
				"</select>",
				"（".$tb_report_arr['report_NumberColumn41']."/26周）</label>",
			"<label>稀释流量计<select name='report_NumberColumn32' style='width:10%' class='selectfont'>",
				"<option value=0 selected='selected'>未检查</option>",
				"<option value=1>清理<option>",
				"</select>",
				"（".$tb_report_arr['report_NumberColumn42']."/26周）</label>",
			"</fieldset>";
			}
			if($tb_report_arr['report_step'] > 4){
		echo"<label>校验人员",
		"<select name='calibra_people'style='width:15%' class='selectfont'>";
		$tb_user_sql = "SELECT * FROM `tb_user` WHERE 1";
		$tb_user_result = mysqli_query($this->conn, $tb_user_sql);
		while($tb_user_arr=mysqli_fetch_assoc($tb_user_result)){
			if($tb_user_arr['user_id']==$calibra){
                		echo "<option value=".$tb_user_arr['user_id']." selected='selected'>".$tb_user_arr['user_name']."</option>";
			}else{
                		echo "<option value=".$tb_user_arr['user_id'].">".$tb_user_arr['user_name']."</option>";
			}
		}
		echo "</select>",
			"</label>",
		"<label>核验人员",
		"<select name='check_people'style='width:15%' class='selectfont'>";
		$tb_user_sql = "SELECT * FROM `tb_user` WHERE 1";
		$tb_user_result = mysqli_query($this->conn, $tb_user_sql);
		while($tb_user_arr=mysqli_fetch_assoc($tb_user_result)){
			if($tb_user_arr['user_id']==$checkp){
                		echo "<option value=".$tb_user_arr['user_id']." selected='selected'>".$tb_user_arr['user_name']."</option>";
			}else{
                		echo "<option value=".$tb_user_arr['user_id'].">".$tb_user_arr['user_name']."</option>";
			}
		}
		echo "</select>",
			"</label>";
			}
	echo "</fieldset>";
						break;
					case 4:
	echo "<fieldset>",
		"<legend style='border:1px'>".$tb_account_arr['equipment_name']."（".$tb_account_arr['equipment_kks']."）校验记录</legend>",
			"<input type='hidden' name='report_id' size='2' value=".$tb_report_arr['report_id']."></input>",
			"<input type='hidden' name='report_step' size='2' value=".$tb_report_arr['report_step']."></input>";
			echo "<fieldset>",
			"<legend style='border:1px'>参数</legend>",

			"<label>检查前氧含量<input type='text'style='width:15%' name='report_NumberColumn3' value='".$tb_report_arr['report_NumberColumn3']."'></input></label>",
			"<label>湿度<input type='text'style='width:10%' name='report_NumberColumn4' value='".$tb_report_arr['report_NumberColumn4']."'></input>",
				"<label>温压流<input type='text'style='width:10%' name='report_NumberColumn5' value='".$tb_report_arr['report_NumberColumn5']."'></input><input type='text'style='width:10%' name='report_NumberColumn6' value='".$tb_report_arr['report_NumberColumn6']."'></input><input type='text'style='width:10%' name='report_NumberColumn7' value='".$tb_report_arr['report_NumberColumn7']."'></input></label>";
			if($tb_report_arr['report_step'] > 4){

			echo "<br>",
			"<label>检查后氧含量<input type='text'style='width:15%' name='report_NumberColumn48' value='".$tb_report_arr['report_NumberColumn48']."'></input></label>",
			"<label>湿度<input type='text'style='width:10%' name='report_NumberColumn10' value='".$tb_report_arr['report_NumberColumn10']."'></input></label>",
			"<label>温压流<input type='text'style='width:10%' name='report_NumberColumn38' value='".$tb_report_arr['report_NumberColumn38']."'></input><input type='text'style='width:10%' name='report_NumberColumn39' value='".$tb_report_arr['report_NumberColumn39']."'></input><input type='text'style='width:10%' name='report_NumberColumn40' value='".$tb_report_arr['report_NumberColumn40']."'></input></label>",

			"<br>",
			"<label>二氧化硫偏差<input type='text'style='width:15%' name='report_NumberColumn1' value='".$tb_report_arr['report_NumberColumn1']."'></input></label>",
			"<label>响应速度<input type='text'style='width:15%' name='report_TextColumn6' value='".$tb_report_arr['report_TextColumn6']."'></input></label>",
			"<label>氮氧化物偏差<input type='text'style='width:15%' name='report_NumberColumn2' value='".$tb_report_arr['report_NumberColumn2']."'></input></label>",
			"<label>响应速度<input type='text'style='width:15%' name='report_TextColumn7' value='".$tb_report_arr['report_TextColumn7']."'></input></label>";
			}
	echo "</fieldset>";
			if($tb_report_arr['report_step'] > 0){
	echo "<fieldset>",
			"<legend style='border:1px'>设备概况</legend>",
			"<label>气源情况<input type='text'style='width:15%' name='report_TextColumn1' value='".$tb_report_arr['report_TextColumn1']."'></input></label>",
			"<label>取样管积水<input type='text'style='width:15%' name='report_TextColumn2' value='".$tb_report_arr['report_TextColumn2']."'></input></label>",
			"<label>二氧化硫系统报警<input type='text'style='width:15%' name='report_TextColumn3' value='".$tb_report_arr['report_TextColumn3']."'></input></label>",
			"<br>",
			"<label>压缩空气压力<input type='text'style='width:15%' name='report_NumberColumn8' value='".$tb_report_arr['report_NumberColumn8']."'></input></label>",
			"<label>稀释气压力<input type='text'style='width:15%' name='report_NumberColumn9' value='".$tb_report_arr['report_NumberColumn9']."'></input></label>",
			"<label>氮氧化物系统报警<input type='text'style='width:15%' name='report_TextColumn4' value='".$tb_report_arr['report_TextColumn3']."'></input></label>",
			"</fieldset>";
			}
			if($tb_report_arr['report_step'] > 1){
			echo "<fieldset>",
			"<legend style='border:1px'>日常检查</legend>",
			"<label>湿度探头<select name='report_NumberColumn11' style='width:10%' class='selectfont'>",
				"<option value=0 selected='selected'>数据正常</option>",
				"<option value=1>重启吹扫<option>",
				"</select>",
				"（".$tb_report_arr['report_NumberColumn21']."/1周）</label>",
			"<label>探头滤芯<select name='report_NumberColumn12' style='width:10%' class='selectfont'>",
				"<option value=0 selected='selected'>数据正常</option>",
				"<option value=1>更换滤芯<option>",
				"</select>",
				"（".$tb_report_arr['report_NumberColumn22']."/26周）</label>",
			"<label>清理探杆<select name='report_NumberColumn13' style='width:10%' class='selectfont'>",
				"<option value=0 selected='selected'>数据正常</option>",
				"<option value=1>清理探杆<option>",
				"</select>",
				"（".$tb_report_arr['report_NumberColumn23']."/4周）</label>",
			"<br>",
			"<label>氧化锆滤芯<select name='report_NumberColumn32' style='width:10%' class='selectfont'>",
				"<option value=0 selected='selected'>数据正常</option>",
				"<option value=1>更换滤芯<option>",
				"</select>",
				"（".$tb_report_arr['report_NumberColumn42']."/12周）</label>",
			"<label>氧化锆探杆<select name='report_NumberColumn33' style='width:10%' class='selectfont'>",
				"<option value=0 selected='selected'>数据正常</option>",
				"<option value=1>清理探杆<option>",
				"</select>",
				"（".$tb_report_arr['report_NumberColumn43']."/26周）</label>",
			"<label>温压流探杆<select name='report_NumberColumn34' style='width:10%' class='selectfont'>",
				"<option value=0 selected='selected'>数据正常</option>",
				"<option value=1>清理探杆<option>",
				"</select>",
				"（".$tb_report_arr['report_NumberColumn44']."/26周）</label>",
			"</fieldset>";
			}
			if($tb_report_arr['report_step'] > 2){
			echo "<fieldset>",
			"<legend style='border:1px'>音速小孔维护</legend>",
			"<label>二氧化硫PMT电压<input type='text'style='width:15%' name='report_NumberColumn35' value='".$tb_report_arr['report_NumberColumn35']."'></input></label>",
			"<label>氮氧化物PMT电压<input type='text'style='width:15%' name='report_NumberColumn45' value='".$tb_report_arr['report_NumberColumn45']."'></input></label>",
			"<label>检查原因<input type='text'style='width:15%' name='report_TextColumn11' value='".$tb_report_arr['report_TextColumn11']."'></input></label>",
			"<br>",
				"<label>清理音速小孔<select name='report_NumberColumn14' style='width:10%' class='selectfont'>",
				"<option value=0 selected='selected'>数据正常</option>",
				"<option value=1>清理杂质<option>",
				"</select>",
				"（".$tb_report_arr['report_NumberColumn24']."/26周）</label>",
				"<label>更换音速小孔<select name='report_NumberColumn15' style='width:10%' class='selectfont'>",
				"<option value=0 selected='selected'>检查正常</option>",
				"<option value=1>更换设备<option>",
				"</select>",
				"（".$tb_report_arr['report_NumberColumn25']."/52周）</label>",
			"</fieldset>";
			}
			if($tb_report_arr['report_step'] > 3){
			echo "<fieldset>",
			"<legend style='border:1px'>二氧化硫采样泵维护</legend>",
			"<label>检查前流量<input type='text'style='width:15%' name='report_NumberColumn36' value='".$tb_report_arr['report_NumberColumn36']."'></input></label>",
			"<label>检查后流量<input type='text'style='width:15%' name='report_NumberColumn46' value='".$tb_report_arr['report_NumberColumn46']."'></input></label>",
			"<label>检查原因<input type='text'style='width:15%' name='report_TextColumn12' value='".$tb_report_arr['report_TextColumn12']."'></input></label>",
			"<br>",
			"<label>采样泵膜<select name='report_NumberColumn16' style='width:10%' class='selectfont'>",
				"<option value=0 selected='selected'>流量正常</option>",
				"<option value=1>更换泵膜<option>",
				"</select>",
				"（".$tb_report_arr['report_NumberColumn26']."/52周）</label>",
				"<label>采样泵轴承<select name='report_NumberColumn17' style='width:10%' class='selectfont'>",
				"<option value=0 selected='selected'>流量正常</option>",
				"<option value=1>更换轴承<option>",
				"</select>",
				"（".$tb_report_arr['report_NumberColumn27']."/52周）</label>",
				"<label>采样泵<select name='report_NumberColumn18' style='width:10%' class='selectfont'>",
				"<option value=0 selected='selected'>流量正常</option>",
				"<option value=1>更换设备<option>",
				"</select>",
				"（".$tb_report_arr['report_NumberColumn28']."/104周）</label>",
			"</fieldset>";
			echo "<fieldset>",
			"<legend style='border:1px'>氮氧化物采样泵维护</legend>",
			"<label>检查前流量<input type='text'style='width:15%' name='report_NumberColumn37' value='".$tb_report_arr['report_NumberColumn37']."'></input></label>",
			"<label>检查后流量<input type='text'style='width:15%' name='report_NumberColumn47' value='".$tb_report_arr['report_NumberColumn47']."'></input></label>",
			"<label>检查原因<input type='text'style='width:15%' name='report_TextColumn13' value='".$tb_report_arr['report_TextColumn13']."'></input></label>",
			"<br>",
			"<label>采样泵膜<select name='report_NumberColumn19' style='width:10%' class='selectfont'>",
				"<option value=0 selected='selected'>流量正常</option>",
				"<option value=1>更换泵膜<option>",
				"</select>",
				"（".$tb_report_arr['report_NumberColumn29']."/52周）</label>",
			"<label>采样泵轴承<select name='report_NumberColumn20' style='width:10%' class='selectfont'>",
				"<option value=0 selected='selected'>流量正常</option>",
				"<option value=1>更换轴承<option>",
				"</select>",
				"（".$tb_report_arr['report_NumberColumn30']."/52周）</label>",
			"<label>采样泵<select name='report_NumberColumn31' style='width:10%' class='selectfont'>",
				"<option value=0 selected='selected'>流量正常</option>",
				"<option value=1>更换设备<option>",
				"</select>",
				"（".$tb_report_arr['report_NumberColumn41']."/104周）</label>",
			"</fieldset>";
			}
			if($tb_report_arr['report_step'] > 4){
		echo"<label>校验人员",
		"<select name='calibra_people'style='width:15%' class='selectfont'>";
		$tb_user_sql = "SELECT * FROM `tb_user` WHERE 1";
		$tb_user_result = mysqli_query($this->conn, $tb_user_sql);
		while($tb_user_arr=mysqli_fetch_assoc($tb_user_result)){
			if($tb_user_arr['user_id']==$calibra){
                		echo "<option value=".$tb_user_arr['user_id']." selected='selected'>".$tb_user_arr['user_name']."</option>";
			}else{
                		echo "<option value=".$tb_user_arr['user_id'].">".$tb_user_arr['user_name']."</option>";
			}
		}
		echo "</select>",
			"</label>",
		"<label>核验人员",
		"<select name='check_people'style='width:15%' class='selectfont'>";
		$tb_user_sql = "SELECT * FROM `tb_user` WHERE 1";
		$tb_user_result = mysqli_query($this->conn, $tb_user_sql);
		while($tb_user_arr=mysqli_fetch_assoc($tb_user_result)){
			if($tb_user_arr['user_id']==$checkp){
                		echo "<option value=".$tb_user_arr['user_id']." selected='selected'>".$tb_user_arr['user_name']."</option>";
			}else{
                		echo "<option value=".$tb_user_arr['user_id'].">".$tb_user_arr['user_name']."</option>";
			}
		}
		echo "</select>",
			"</label>";
			}
	echo "</fieldset>";
						break;
					default:
						echo "无flag";
					}
	}
	public function showReport($documentId){//查看缺陷表单
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
		//echo $sql;
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
