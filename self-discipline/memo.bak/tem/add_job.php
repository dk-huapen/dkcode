<html>

<head>
<title>班组日志</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../diary_css/my_diary.css" />

        <script type="text/javascript" src="./ui/jq.js"></script>
        <script type="text/javascript"src="./ui/jquery.ui.core.js"></script>
        <script type="text/javascript" src="./ui/jquery.ui.datepicker.js"></script>
        <script type="text/javascript" src="./ui/jquery.ui.datepicker-zh-CN.js"></script>

<script>
$(function(){
//alert("jq引入成功");
        var start_opt = {
                showMonthAfterYear: true,// 月在年之后显示   
                changeMonth: true,// 允许选择月份   
                changeYear: true,//允许选择年份   
                dateFormat:'yy-mm-dd',//设置日期格式   
                showClearButton: true,//自定义的方法(1.7.2没有清除按钮）   
                clearText: '清除',//自定义的文本，在文档在有定义（js中）   
                closeText:'关闭',//只有showButtonPanel: true才会显示出来   
                duration: 'fast',
                showAnim:'fadeIn',
                showOn:'both',// 在输入框旁边显示按钮触发，默认为：focus。还可以设置为both   
                buttonImage: './css/images/calendar_add.png',//按钮图标   
                buttonImageOnly:true,//不把图标显示在按钮上，即去掉按钮   
                buttonText:'选择日期',
                showButtonPanel:true,
                showOtherMonths:true,
                onSelect:function(dateText,inst){//使结束时间大于开始时间
/**  
* 以下写法在IE中出现问题。  
* $('#expDate').datepicker('option', 'minDate', new Date(dateText.replace(/-/g,',')));  
* 时，在结束（过期时间）选择时，年会没有，而且控制会失效。通过调试，发现new Date(dateText.replace(/-/g,','))  
* 返回的结果是NaN。说明Date对象不能这么构造（但是Firefox可以）  
*/    
                var arys=new Array();
                var arys = dateText.split('-');
                $('#date_start').datepicker('option', 'minDate', new Date(arys[0],arys[1]-1,arys[2]));   
                }
        };
var end_opt = {
showMonthAfterYear:true, // 月在年之后显示   
changeMonth:true,// 允许选择月份   
changeYear:true,// 允许选择年份   
dateFormat:'yy-mm-dd',//设置日期格式   
showClearButton:true,//自定义的方法(1.7.2没有清除按钮）   
//clearText: '清除',// 自定义的文本，在文档在有定义（js中）   
closeText:'关闭',//只有showButtonPanel: true才会显示出来 
duration: 'fast',   
showAnim:'fadeIn',   
showOn:'both',//在输入框旁边显示按钮触发，默认为：focus。还可以设置为both
buttonImage: './css/images/calendar_add.png',//按钮图标
buttonImageOnly:true,//不把图标显示在按钮上，即去掉按钮
buttonText:'选择日期',
showButtonPanel:true,
showOtherMonths:true,
//appendText: '(yyyy-mm-dd)',
        onSelect:function(dateText,inst){
//var arys = new Array();
                var arys=new Array();
                var arys=dateText.split('-');
                $('#date_end').datepicker('option','maxDate',new Date(arys[0],arys[1]-1,arys[2]));
        }
};
$( "#date_start" ).datepicker(start_opt);
$( "#date_end" ).datepicker(end_opt);
})
</script>
<script type="text/javascript" src='ajax.js'></script>
	<script type="text/javascript">
	function check(obj,info){
	createXMLHttpRequest();
	var url = "check.php?id="+obj+"&time="+new Date().getTime();
	xmlHttp.onreadystatechange = function(){
		if(xmlHttp.readyState == 4){
			var str = xmlHttp.responseText;
			
			var arr = str.split('#');
			$(info).options.length  =  0;
			for(var i=0;i<arr.length;i++){
				var arr_1 = arr[i].split('@');
				var opts = new Option(arr_1[1],arr_1[0]);
				$(info).add(opts);
			}
		}
	}
	xmlHttp.open('get',url,true);
	xmlHttp.send(null);
	}
	function $(obj){
		return document.getElementById(obj);
	}
  </script>
</head>

<body >
<div id="wrapper">
<div id="header">
<a href="../index.html"><center>热控</center></a>
</div>
<?php include("../header/header.php")
?>
<div id="navsecond">
<div id="course">
<ul>
<li><a href='look.php?id=2018-07-04'>2018-07-04</a></li>
<li><a href='look.php?id=2018-07-05'>2018-07-05</a></li>
<li><a href='look.php?id=2018-07-06'>2018-07-06</a></li>
</ul>
</div>
</div>
<div id="maincontent">

<h2><center>添加工作<center></h2>
<div id="add_job">
<center>工作明细</center>
<form action="insert_job.php" method="post">
<table align='' border='0' cellpadding=0 cellspacing=1 bgcolor="#cccccc" width='550px'>
<tr><td align='left'>系统:</td><td>
<select name='job_system' id="sys" width='500' class='selectfont'onchange="check(this.options[options.selectedIndex].value,'area')">
<option selected="selected" disabled="disabled"  style='display: none' value=''></option>
<?php
//连接数据库
		include_once('conn.php');
//从tb_user数据库中取出所有用户信息,添加工作负责人下拉列表
		$tb_system_sql = "SELECT * FROM `tb_system` WHERE 1";
		$tb_system_result = mysqli_query($conn, $tb_system_sql);
		while($tb_system_arr=mysqli_fetch_assoc($tb_system_result)){
?>
                                        <option value="<?php echo $tb_system_arr['system_id'];?>"><?php echo $tb_system_arr['system_content'];?></option>
<?php
}
?>
</select>
</td></tr>
<tr><td align='left'>工作区域:</td><td>
<select name='job_area' id='area' width='500' class='selectfont'>
<option value='-1'>--请选择--</option>
</select>
</td></tr>
<tr><td align='left'>工作内容:</td><td><input type="text" name="job_content" size="30"/></td></tr>
<tr><td align='left'>工作负责人:</td><td>
<select name='job_header' width='500' class='selectfont'>
<option selected="selected" disabled="disabled"  style='display: none' value=''></option>
<?php
//连接数据库
//		include_once('conn.php');
//从tb_user数据库中取出所有用户信息,添加工作负责人下拉列表
		$tb_user_sql = "SELECT * FROM `tb_user` WHERE 1";
		$tb_user_result = mysqli_query($conn, $tb_user_sql);
		while($tb_user_arr=mysqli_fetch_assoc($tb_user_result)){
?>
                                        <option value="<?php echo $tb_user_arr['user_id'];?>"><?php echo $tb_user_arr['user_name'];?></option>
<?php
}
?>
                                        </select>
</td></tr>
<tr><td align='left'>工作成员:</td><td><input type="text" name="job_people" size="30"/></td></tr>
<tr><td align='left'>工作进度:</td><td>
<select name='job_status' width='500' class='selectfont'>
                                        <option value='未开工'>未开工</option>
                                        <option value='进行中'>进行中</option>
                                        <option value='已完成'>已完成</option>
                                        </select>
</td></tr>
<tr><td align='left'>工作详细:</td><td><textarea cols="35" rows="5" name="job_notes"></textarea></td></tr>
<tr><td align='left'>工作类型:</td><td>
<select name='job_type' width='500' class='selectfont'>
                                        <option value='0'>重点工作</option>
                                        <option value='1'>定期工作</option>
                                        <option value='2'>其他工作</option>
                                        <option value='3'>配合工作</option>
                                        </select>
</td></tr>
<tr><td align='left'>工作日期:</td><td>
<select name='diary_id' width='500' class='selectfont'>
<option selected="selected" disabled="disabled"  style='display: none' value=''></option>
<?php
//从tb_diary数据库中取出所有日志列表,添加日期下拉列表，*只有创建过日志日期
		$tb_diary_sql = "SELECT * FROM `tb_diary` WHERE 1";
		$tb_diary_result = mysqli_query($conn, $tb_diary_sql);
		while($tb_diary_arr=mysqli_fetch_assoc($tb_diary_result)){
?>
                                        <option value="<?php echo $tb_diary_arr['diary_id'];?>"><?php echo $tb_diary_arr['createtime'];?></option>
<?php
}
	mysqli_close($conn);
?>
                                        </select>
</td></tr>
<tr><td align='left'>计划完成日期:</td><td>
<input type="text" name="job_deadline" id="date_start" >
</td></tr>
<td colspan="2" align="center">
                                        <input type="submit" value="保存"/>&nbsp;&nbsp;&nbsp;
                                        <input type="reset" value="清空"/>
                                </td>

</table>
</form>
</div>

</div>
<div id="sidebar">
<ul>
<li>待定</li>
<li>预流</li>
</ul>
</div>
<div id="footer">
纯属个人娱乐
</div>
</div>


</body>
</html>
