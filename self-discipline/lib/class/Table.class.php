<?php
					include_once("Page.class.php");
class dkTable {
	protected $conn;
	protected $result;
	protected $num;
	protected $pagesize;
	protected $pageSql;
	protected $tbodyId;
	protected $sqlId;
	protected $pageFunction;
	protected $tableHead;//表格结构
	protected $selectinfo;//列表关键信息：数据库表名，排序关键id
	protected $keyinfo;//关键字搜索包含的项目
	protected $sql;
	protected $countsql;

	protected function showTable(){//显示表格
		echo "<div id='".$this->sqlId."' style='display:none'>".$this->pageSql."</div>";
		echo "<table class='list'>";
		echo "<caption><h3>".$this->selectinfo['caption']."</h3></caption>";
		$th = "<thead><tr height = '30px'>";
		foreach($this->tableHead as $x=>$x_value){
			if($x_value=="无" || $x=="action"){
				continue;
			}
			$th.="<th>";
			$th.=$x_value;
			$th.="</th>";
		}
		//$th.="<th>管理</th></thead>";
		$th.="</thead>";
		echo $th;
		$countTh = count($this->tableHead)-1;
		echo "<tfoot><tr><td colspan='".$countTh."'><center>总共".$this->num."项！</center></td></tr></tfoot>";
		echo "<tbody id='".$this->tbodyId."'>";
		while($row=mysqli_fetch_assoc($this->result)){
			echo "<tr bgcolor='#eeeeee'align='center' height='24'>";
			$td='';
		foreach($this->tableHead as $x=>$x_value){
			if($x_value!="管理" && $x_value!="无" && $x!="action"){
			$td.="<td>";
			$td.=$row[$x];
			$td.="</td>";
			}
		}
			echo $td;
			if($this->tableHead['management']=="管理"){
        		echo "<td width='5%'><a href='look_".$this->tableHead['action'].".php?id=".$row[$this->selectinfo['id']]."'><img border=0 src='../../images/info.png' alt='查看'></a> <a href='edit_".$this->tableHead['action'].".php?id=".$row[$this->selectinfo['id']]."'><img border=0 src='../../images/edit.gif' alt='编辑'></a><a href='".$this->tableHead['action'].".php?id=".$row[$this->selectinfo['id']]."'><img border=0 src='../../images/del.gif' alt='删除'></a></td>";
			}

			echo "</tr>";
		}
		echo "</tbody>";
		echo "</table>";
	}
	public function showStatus($status){//显示不同状态下的缺陷：0-已处理，1-未处理，2-延期缺陷
		$count_sql = $this->count_sql.$this->selectinfo['status']." = ".$status;
        	$re = mysqli_query($this->conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$num = $result[0];
		$this->num=$num;
		$str = $this->sql.$this->selectinfo['status']." = ".$status;
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
		if ($quick==30){//本周：上周五到今天
			$lastweek=strtotime("last Friday");
			$begain_time=date("Y-m-d 00:00:00",$lastweek);
			$end_time=date("Y-m-d H:i:s");
		}
		if ($quick==40){//上周：上上周五至上周五
			$lastweek=strtotime("last Friday");
			$end_time=date("Y-m-d H:i:s",$lastweek);
			$lastlastweek=strtotime("-2 week Thursday");
			$begain_time=date("Y-m-d 00:00:00", $lastlastweek);
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
		//echo $count_sql;
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
	public function retrievalResult(){//检索栏检索结果
	$select_defect_str = $this->sql;
	$count_str = $this->count_sql;
	$str=' ';
	$str1=' order by '.$this->selectinfo['id'].' desc limit 0,'.$this->pagesize;
	//************************************************************************************
	$arr=$_POST['select_checkbox'];
	foreach($arr as $key=>$value){
		if($_POST[$value]==0){//为0时选择所有项
			$str.= $key.'!='.$_POST[$value];
		}else{
			$str.= $key.'='.$_POST[$value];
		}
		$str.=" AND ";
	}
	if ($_POST['select_checkbox_key']=="select_key"){
		$str.= "(".$this->keyinfo['content']." LIKE ";
		$str.= "\"%".$_POST['select_key']."%\")";
		$str.= " OR (".$this->keyinfo['number']." LIKE ";
		$str.= "\"%".$_POST['select_key']."%\")";
		$str.= " OR (".$this->keyinfo['remark']." LIKE ";
		$str.= "\"%".$_POST['select_key']."%\"".')';

		$tb_defect_sql=$select_defect_str.$str;
		$tb_count_sql=$count_str.$str;
	}else{
			$str=chop($str," AND ");
			$tb_defect_sql=$select_defect_str.$str;
			$tb_count_sql=$count_str.$str;
	}
	//************************************************************
        $re = mysqli_query($this->conn,$tb_count_sql);
        $result = mysqli_fetch_row($re);
        $num = $result[0];
	$this->num=$num;
	$sql = $tb_defect_sql.$str1;
	//echo $sql;
	$result = mysqli_query($this->conn, $sql);
	$this->result=$result;
	$pageSql=$tb_defect_sql.' order by '.$this->selectinfo['id'].' desc limit ';
		$this->pageSql = $pageSql;
	//echo $this->pageSql;
		$this->tbodyId = "tbodyId";
		$this->sqlId = "sqlId";
		$this->showTable();
		if($this->num > $this->pagesize){
			$json = json_encode($this->tableHead);
			$page_obj = new Page($this->num,$this->pagesize,$this->sqlId,$this->tbodyId,$this->pageFunction,$json);
			$page_obj->showPage();
		}
	}

}
?>

