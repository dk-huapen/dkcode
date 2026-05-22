<?php
	function purchase_list_wait($conn,$part_source){
	$sql = "select count(*) from tb_sparepart where part_source=".$part_source.' AND part_declare_number > 0';
        $re = mysqli_query($conn,$sql);
        $result = mysqli_fetch_row($re);
        $num = $result[0];
        $pagesize=20;
        $pageend =ceil($num/$pagesize);
        $page = 1;
        $offset = 0;
	$purchase_sql = 'select tb_sparepart.part_id,(SELECT tb_goods.goods_name from tb_goods where tb_goods.goods_id=tb_sparepart.goods_id) AS goods_name,(SELECT tb_goods.goods_modle from tb_goods where tb_goods.goods_id=tb_sparepart.goods_id) AS goods_modle,(SELECT tb_goods.goods_main_parameters from tb_goods where tb_goods.goods_id=tb_sparepart.goods_id) AS goods_main_parameters,tb_sparepart.part_declare_number,tb_sparepart.part_system,tb_sparepart.part_need_time from tb_sparepart where part_source='.$part_source.' AND part_declare_number > 0 order by part_id desc limit ';
//***********************************************************************
//从tb_jobs数据库取出所有工作清单
	$tb_purchase_sql = $purchase_sql.$offset.",".$pagesize;
//	echo $tb_purchase_sql;
	$tb_purchase_result = mysqli_query($conn, $tb_purchase_sql);
	echo "<div id='purchase_sql' style='display: none;'>".$purchase_sql."</div>";
	echo "<table class='list'>";
	echo "<caption>本次搜索结果共".$num."项!</caption>";
	echo "<tr height='30px'><th>序号</th><th>名称</th><th>规格型号</th><th>主要参数</th><th>数量</th><th>所属设备</th><th>需求日期</th><th>管理</th><th>操作</th></tr>";
	echo "<tbody id='purchase_tbs'>";
	while($tb_purchase_arr=mysqli_fetch_assoc($tb_purchase_result)){
	echo "<tr bgcolor='#eeeeee'align='center' height='24'>";
	echo "<td width='5%'>".$tb_purchase_arr['part_id']."</td>";
	echo "<td width='10%'>".$tb_purchase_arr['goods_name']."</td>";
	echo "<td width='10%'>".$tb_purchase_arr['goods_modle']."</td>";
	echo "<td width='10%'>".$tb_purchase_arr['goods_main_parameters']."</td>";
	echo "<td width='5%'>".$tb_purchase_arr['part_declare_number']."</td>";
	echo "<td width='5%'>".$tb_purchase_arr['part_system']."</td>";
	echo "<td width='10%'>".$tb_purchase_arr['part_need_time']."</td>";
        echo "<td width='10%'><a href='record/look_part.php?id=".$tb_purchase_arr['part_id']."'><img border=0 src='../images/info.png' alt='查看'></a><a href='record/edit_purchase_list_wait.php?id=".$tb_purchase_arr['part_id']."'><img border=0 src='../images/edit.gif' alt='编辑'></a><a href='record/del_part.php?id=".$tb_purchase_arr['part_id']."'><img border=0 src='../images/del.gif' alt='删除'></a><br></td>";
        echo "<td width='15%'><a href='record/add_purchase_list.php?id=".$tb_purchase_arr['part_id']."'><img border=0 src='../images/nfo.png' alt='申报'></a> </td>";
	echo "</tr>";
	}
	echo "</tbody>";
	echo "</table>";
	echo "<div id='page'>";
	echo "<center>";
echo "第<input id='purchase_page_first'size='1' value=1>页/共<input id='purchase_page_end' size='1' value=".$pageend.">页/每页<input id='purchase_pagesize' size='1'value=".$pagesize.">项&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";
	echo "<a href='javascript:void(0)' onclick=purchase_goPage('head','purchase_tbs','purchase_sql','purchase_page_first','purchase_page_end','purchase_pagesize')>首页</a>";
        echo "<a href='javascript:void(0)' onclick=purchase_goPage('front','purchase_tbs','purchase_sql','purchase_page_first','purchase_page_end','purchase_pagesize')>上一页</a>";
	echo "<a href='javascript:void(0)' onclick=purchase_goPage('next','purchase_tbs','purchase_sql','purchase_page_first','purchase_page_end','purchase_pagesize')>下一页</a>";
        echo "<a href='javascript:void(0)' onclick=purchase_goPage('end','purchase_tbs','purchase_sql','purchase_page_first','purchase_page_end','purchase_pagesize')>尾页</a>";
echo "</center>";
  echo "</div>";
	}
	function purchase_list_check($conn,$part_source){
	$sql = "select count(*) from tb_sparepart where part_source=".$part_source.' AND part_declare_number > 0';
        $re = mysqli_query($conn,$sql);
        $result = mysqli_fetch_row($re);
        $num = $result[0];
        $pagesize=20;
        $pageend =ceil($num/$pagesize);
        $page = 1;
        $offset = 0;
	$purchase_sql = 'select tb_sparepart.part_id,(SELECT tb_goods.goods_name from tb_goods where tb_goods.goods_id=tb_sparepart.goods_id) AS goods_name,(SELECT tb_goods.goods_modle from tb_goods where tb_goods.goods_id=tb_sparepart.goods_id) AS goods_modle,(SELECT tb_goods.goods_main_parameters from tb_goods where tb_goods.goods_id=tb_sparepart.goods_id) AS goods_main_parameters,tb_sparepart.part_declare_number,tb_sparepart.part_system,tb_sparepart.part_need_time from tb_sparepart where part_source='.$part_source.' AND part_declare_number > 0 order by part_id desc limit ';
//***********************************************************************
//从tb_jobs数据库取出所有工作清单
	$tb_purchase_sql = $purchase_sql.$offset.",".$pagesize;
//	echo $tb_purchase_sql;
	$tb_purchase_result = mysqli_query($conn, $tb_purchase_sql);
	echo "<div id='purchase_sql' style='display: none;'>".$purchase_sql."</div>";
	echo "<table align='center' border='0' cellpadding=0 cellspacing=1 bgcolor='#cccccc' width='1500px'>";
	echo "<caption>搜索结果统计</caption>";
	echo "<tr>";
	echo "<td align='center'> 本次搜索结果共".$num."项!</td>";
	echo "</tr>";
	echo "</table>";
	echo "<table align='center' border='0' cellpadding=0 cellspacing=1 bgcolor='#cccccc' width='1500px'>";
	echo "<caption>搜索结果列表</caption>";
	echo "<tr height='30px'><th>序号</th><th>名称</th><th>规格型号</th><th>主要参数</th><th>数量</th><th>所属设备</th><th>需求日期</th><th>管理</th><th>操作</th></tr>";
	echo "<tbody id='purchase_tbs'>";
	while($tb_purchase_arr=mysqli_fetch_assoc($tb_purchase_result)){
	echo "<tr bgcolor='#eeeeee'align='center' height='24'>";
	echo "<td width='5%'>".$tb_purchase_arr['part_id']."</td>";
	echo "<td width='10%'>".$tb_purchase_arr['goods_name']."</td>";
	echo "<td width='10%'>".$tb_purchase_arr['goods_modle']."</td>";
	echo "<td width='10%'>".$tb_purchase_arr['goods_main_parameters']."</td>";
	echo "<td width='5%'>".$tb_purchase_arr['part_declare_number']."</td>";
	echo "<td width='5%'>".$tb_purchase_arr['part_system']."</td>";
	echo "<td width='10%'>".$tb_purchase_arr['part_need_time']."</td>";
        echo "<td width='10%'><a href='look_part.php?id=".$tb_purchase_arr['goods_id']."'><img border=0 src='../../images/info.png' alt='查看'></a><a href='edit_purchase_check.php?id=".$tb_purchase_arr['part_id']."'><img border=0 src='../../images/edit.gif' alt='编辑'></a><a href='del_part.php?id=".$tb_purchase_arr['part_id']."'><img border=0 src='../../images/del.gif' alt='删除'></a><br></td>";
        echo "<td width='15%'><a href='purchase_in_check.php?id=".$tb_purchase_arr['part_id']."'><img border=0 src='../../images/nfo.png' alt='验收'></a> </td>";
	echo "</tr>";
	}
	echo "</tbody>";
	echo "</table>";
	echo "<div id='page'>";
	echo "<center>";
echo "第<input id='purchase_page_first'size='1' value=1>页/共<input id='purchase_page_end' size='1' value=".$pageend.">页/每页<input id='purchase_pagesize' size='1'value=".$pagesize.">项&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";
	echo "<a href='javascript:void(0)' onclick=purchase_check_goPage('head','purchase_tbs','purchase_sql','purchase_page_first','purchase_page_end','purchase_pagesize')>首页</a>";
        echo "<a href='javascript:void(0)' onclick=purchase_check_goPage('front','purchase_tbs','purchase_sql','purchase_page_first','purchase_page_end','purchase_pagesize')>上一页</a>";
	echo "<a href='javascript:void(0)' onclick=purchase_check_goPage('next','purchase_tbs','purchase_sql','purchase_page_first','purchase_page_end','purchase_pagesize')>下一页</a>";
        echo "<a href='javascript:void(0)' onclick=purchase_check_goPage('end','purchase_tbs','purchase_sql','purchase_page_first','purchase_page_end','purchase_pagesize')>尾页</a>";
echo "</center>";
  echo "</div>";
	}
	function purchase_list_record($conn,$part_type_str,$part_source){
	$sql = "select count(*) from tb_sparepart where part_source=".$part_source;
        $re = mysqli_query($conn,$sql);
        $result = mysqli_fetch_row($re);
        $num = $result[0];
        $pagesize=10;
        $pageend =ceil($num/$pagesize);
        $page = 1;
        $offset = 0;
	$purchase_sql = 'select tb_sparepart.part_id,(SELECT tb_goods.goods_name from tb_goods where tb_goods.goods_id=tb_sparepart.goods_id) AS goods_name,(SELECT tb_goods.goods_modle from tb_goods where tb_goods.goods_id=tb_sparepart.goods_id) AS goods_modle,(SELECT tb_goods.goods_main_parameters from tb_goods where tb_goods.goods_id=tb_sparepart.goods_id) AS goods_main_parameters,tb_sparepart.part_declare_number,tb_sparepart.part_system,tb_sparepart.part_need_time from tb_sparepart where part_source='.$part_source.'  order by part_id desc limit ';
//***********************************************************************
//从tb_jobs数据库取出所有工作清单
	$tb_purchase_sql = $purchase_sql.$offset.",".$pagesize;
//	echo $tb_purchase_sql;
	$tb_purchase_result = mysqli_query($conn, $tb_purchase_sql);
	echo "<div id='".$part_type_str."_sql' style='display: none;'>".$purchase_sql."</div>";
	echo "<table class='list'>";
	echo "<caption>搜索结果列表共".$num."项</caption>";
	echo "<tr height='30px'><th>序号</th><th>名称</th><th>规格型号</th><th>主要参数</th><th>数量</th><th>所属设备</th><th>需求日期</th><th>管理</th></tr>";
	echo "<tbody id='".$part_type_str."_tbs'>";
	while($tb_purchase_arr=mysqli_fetch_assoc($tb_purchase_result)){
	echo "<tr bgcolor='#eeeeee'align='center' height='24'>";
	echo "<td width='5%'>".$tb_purchase_arr['part_id']."</td>";
	echo "<td width='10%'>".$tb_purchase_arr['goods_name']."</td>";
	echo "<td width='10%'>".$tb_purchase_arr['goods_modle']."</td>";
	echo "<td width='10%'>".$tb_purchase_arr['goods_main_parameters']."</td>";
	echo "<td width='5%'>".$tb_purchase_arr['part_declare_number']."</td>";
	echo "<td width='5%'>".$tb_purchase_arr['part_system']."</td>";
	echo "<td width='10%'>".$tb_purchase_arr['part_need_time']."</td>";
        echo "<td width='10%'><a href='look_part.php?id=".$tb_purchase_arr['goods_id']."'><img border=0 src='../../images/info.png' alt='查看'></a><a href='edit_purchase.php?id=".$tb_purchase_arr['part_id']."'><img border=0 src='../../images/edit.gif' alt='编辑'></a><a href='del_part.php?id=".$tb_purchase_arr['part_id']."'><img border=0 src='../../images/del.gif' alt='删除'></a><br></td>";
	echo "</tr>";
	}
	echo "</tbody>";
	echo "</table>";
	echo "<div id='page'>";
	echo "<center>";
echo "第<input id='".$part_type_str."_purchase_page_first'size='1' value=1>页/共<input id='".$part_type_str."_purchase_page_end' size='1' value=".$pageend.">页/每页<input id='".$part_type_str."_purchase_pagesize' size='1'value=".$pagesize.">项&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";
	echo "<a href='javascript:void(0)' onclick=purchase_record_goPage('head','".$part_type_str."_tbs','".$part_type_str."_sql','".$part_type_str."_purchase_page_first','".$part_type_str."_purchase_page_end','".$part_type_str."_purchase_pagesize')>首页</a>";
        echo "<a href='javascript:void(0)' onclick=purchase_record_goPage('front','".$part_type_str."_tbs','".$part_type_str."_sql','".$part_type_str."_purchase_page_first','".$part_type_str."_purchase_page_end','".$part_type_str."_purchase_pagesize')>上一页</a>";
	echo "<a href='javascript:void(0)' onclick=purchase_record_goPage('next','".$part_type_str."_tbs','".$part_type_str."_sql','".$part_type_str."_purchase_page_first','".$part_type_str."_purchase_page_end','".$part_type_str."_purchase_pagesize')>下一页</a>";
        echo "<a href='javascript:void(0)' onclick=purchase_record_goPage('end','".$part_type_str."_tbs','".$part_type_str."_sql','".$part_type_str."_purchase_page_first','".$part_type_str."_purchase_page_end','".$part_type_str."_purchase_pagesize')>尾页</a>";
echo "</center>";
  echo "</div>";
	}
?>
