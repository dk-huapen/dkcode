<html>

<head>
<title>2024年7月份碳核查测点历史数据查询</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../../diary_css/my_diary.css" />
<script type="text/javascript"src="../../lib/dygraph.js"></script>
<link rel="stylesheet" type="text/css"src="../../diary_css/dygraph.css" />
</head>
		<script type="text/javascript">
			function check(table,info){
				//动态创建数据库列名select列表
				dbParam = table;
				if(window.XMLHttpRequest){
					xmlObj=new XMLHttpRequest();
				}else if(window.ActiveXObject){
					xmlObj=new ActiveXObject("Microsoft.XMLHttp");
				}else{
					alert('wrong');
				}
				var url = "check.php?id="+dbParam+"&time="+new Date().getTime();
				xmlObj.onreadystatechange=function(){
					if(xmlObj.readyState == 4){
						//如果从服务器读取列成功则创建select下拉列表
						//alert(xmlObj.responseText);
						myObj=JSON.parse(xmlObj.responseText);
						$(info).options.length  =  0;
						for(x in myObj){
							var opts = new Option(myObj[x]['column_comment'],myObj[x]['column_name']);	
							$(info).add(opts);
						}
					}
				}
				xmlObj.open('get',url,true);
				xmlObj.send(null);
			}
			function $(obj){
				//获取指定元素的ID，动态创建select列表用
				return document.getElementById(obj);
			}
		</script>

<body >
		<div class="header">
			<h1>热控班组管理平台</h1>
		</div>
		<div class="topnav">
			<?php include("../../lib/topnav/topnav.php") ?>
		</div>
		<div class="row">
			<div class="leftcolumn">
				<div class="card">
						<h3>历史曲线查询工具</h3>
						<p>该网页用来查询数据库历史曲线</p>
						<p>最多可以设置两个量程不同的y轴 </p>
						<p>可以用鼠标框选来放大区间曲线，双击恢复并自动设置最佳量程 </p>
						<p>可以拖拽曲线右下角三角放大或缩小整个曲线画面 </p>
						<p>单击选中的曲线可以锁定并高亮显示该条曲线，再次点击取消锁定 </p>
				</div>
				<div class="card">
		<style>
			.dygraph-legend {text-align:right;} 
			.dygraph-legend > span.highlight {border:1px solid red;}
		</style>
					<div id="graphdiv" style="width:1000px;height:400px;"></div>
				</div>
				<div class="card">
		<fieldset>
			<legend>左侧坐标点</legend>
			<?php
					$sysdb = $_GET['id'];
			//$conn = mysqli_connect("localhost","root","dk1314lich,forever!","july2024");
			$conn = mysqli_connect("localhost","root","dk1314lich,forever!",$sysdb);
			if(!$conn){
				die("连接失败". mysqli_connect_error());
			}else { 
				//echo"连接成功";
			}
			mysqli_query($conn, "set names utf8");
			$tb_column_sql = "SELECT column_name,column_comment FROM information_schema.columns  WHERE table_name = '1turbine' and data_type = 'double'";
			//$tb_table_column_sql = "SELECT table_name,table_comment FROM information_schema.tables  WHERE table_schema = 'july2024'";
			$tb_table_column_sql = "SELECT table_name,table_comment FROM information_schema.tables  WHERE table_schema = '".$sysdb."'";
			$tb_begin_HTime_sql = "SELECT `HTime` FROM 1turbine WHERE 1 order by `HTime` limit 1";
			$tb_HTime_result = mysqli_query($conn, $tb_begin_HTime_sql);
			$tb_HTime_arr=mysqli_fetch_assoc($tb_HTime_result);
			$begin_time = $tb_HTime_arr['HTime'];
			$tb_end_HTime_sql = "SELECT `HTime` FROM 1turbine WHERE 1 order by `HTime` desc limit 1";
			$tb_HTime_result = mysqli_query($conn, $tb_end_HTime_sql);
			$tb_HTime_arr=mysqli_fetch_assoc($tb_HTime_result);
			$end_time = $tb_HTime_arr['HTime'];
			echo "<label>测点1</label>";
			echo "<label>工艺系统</label>";
			echo "<select id='SYS1'style='width:20%' class='selectfont'onchange=check(this.options[options.selectedIndex].value,'KKS1')>",
				"<option value=''>--请选择--</option>";
				$tb_table_column_result = mysqli_query($conn, $tb_table_column_sql);
				while($tb_table_column_arr=mysqli_fetch_assoc($tb_table_column_result)){
                			echo "<option value=".$tb_table_column_arr['table_name'].">".$tb_table_column_arr['table_comment']."</option>";
				}
                	echo "</select>";
			echo "<select id='KKS1'style='width:20%' class='selectfont'>",
				"<option value=''>--请选择--</option>",
                	"</select>";
			echo "<b>y1轴起点:</b><input type='text' id='yzero' value='0' width='5'><br>";
			echo "<label>测点3</label>";
			echo "<label>工艺系统</label>";
			echo "<select id='SYS3'style='width:20%' class='selectfont'onchange=check(this.options[options.selectedIndex].value,'KKS3')>",
				"<option value=''>--请选择--</option>";
				$tb_table_column_result = mysqli_query($conn, $tb_table_column_sql);
				while($tb_table_column_arr=mysqli_fetch_assoc($tb_table_column_result)){
                			echo "<option value=".$tb_table_column_arr['table_name'].">".$tb_table_column_arr['table_comment']."</option>";
				}
                	echo "</select>";
			echo "<select id='KKS3'style='width:20%' class='selectfont'>",
				"<option value=''>--请选择--</option>",
                	"</select>";
			echo "<b>y1轴终点:</b><input type='text' id='yspan' value='10' width='5'>";
		echo "</fieldset>",
		"<fieldset>",
			"<legend>右侧坐标点</legend>";
			echo "<label>测点2</label>";
			echo "<label>工艺系统</label>";
			echo "<select id='SYS2'style='width:20%' class='selectfont'onchange=check(this.options[options.selectedIndex].value,'KKS2')>",
				"<option value=''>--请选择--</option>";
				$tb_table_column_result = mysqli_query($conn, $tb_table_column_sql);
				while($tb_table_column_arr=mysqli_fetch_assoc($tb_table_column_result)){
                			echo "<option value=".$tb_table_column_arr['table_name'].">".$tb_table_column_arr['table_comment']."</option>";
				}
                	echo "</select>";
			echo "<select id='KKS2'style='width:20%' class='selectfont'>",
				"<option value=''>--请选择--</option>",
                	"</select>";
			echo "<b>y2轴起点:</b><input type='text' id='y1zero' value='0' width='5'><br>";
			echo "<label>测点4</label>";
			echo "<label>工艺系统</label>";
			echo "<select id='SYS4'style='width:20%' class='selectfont'onchange=check(this.options[options.selectedIndex].value,'KKS4')>",
				"<option value=''>--请选择--</option>";
				$tb_table_column_result = mysqli_query($conn, $tb_table_column_sql);
				while($tb_table_column_arr=mysqli_fetch_assoc($tb_table_column_result)){
                			echo "<option value=".$tb_table_column_arr['table_name'].">".$tb_table_column_arr['table_comment']."</option>";
				}
                	echo "</select>";
			echo "<select id='KKS4'style='width:20%' class='selectfont'>",
				"<option value=''>--请选择--</option>",
                	"</select>";
			echo "<b>y2轴终点:</b><input type='text' id='y1span' value='500' width='5'>";
		echo "</fieldset>";
		echo "<fieldset>",
			//时间设置，查询，翻页画面
			"<legend>时间</legend>";
		echo "<input type='text'style='width:10%' id='SYSDB' value=".$sysdb."></input>";
		//$time1 = "2024-07-27 15:00";
		//$time2 = "2024-07-27 15:30";
			echo "数据库为";
			echo $begin_time;
			echo "到";
			echo $end_time;
			echo "的数据";
			?>
				<p><label><b>开始时间:</b></label><input type="datetime-local" id="begin_time" value="" width="5"><label><b>结束时间:</b></label><input type="datetime-local" id="end_time" value="" width="5"></p>
			<p><button id="plot">查询</button><button id="last">上一页</button><button id="next">下一页</button></p>
		</fieldset>
		<script type="text/javascript">
			plot = function(){
				//查询曲线函数
				var SYSDB = document.getElementById("SYSDB").value;
				var SYS1 = document.getElementById("SYS1").value;
				var SYS2 = document.getElementById("SYS2").value;
				var SYS3 = document.getElementById("SYS3").value;
				var SYS4 = document.getElementById("SYS4").value;
				var KKS1 = document.getElementById("KKS1").value;
				var KKS2 = document.getElementById("KKS2").value;
				var KKS3 = document.getElementById("KKS3").value;
				var KKS4 = document.getElementById("KKS4").value;
				var labels;
				var series;
				var dianshu;
				dianshu = 0;
				labels = ["x"];
				if(Boolean(KKS1)){
					//labels = ["x",'测点1标尺值','测点2标尺值'];
					labels.push('测点1标尺值');
					//series = {'测点2标尺值':{axis:'y2'}};
					dianshu = dianshu + 1;
				}
				if(Boolean(KKS2)){
					//labels = ["x",'测点1标尺值','测点2标尺值'];
					labels.push('测点2标尺值');
					series = {'测点2标尺值':{axis:'y2'}};
					dianshu = dianshu + 1;
				}
				if(Boolean(KKS3)){
					labels.push('测点3标尺值');
					//labels = ["x",'测点1标尺值','测点2标尺值','测点3标尺值'];
					//series = {'测点2标尺值':{axis:'y2'}};
					dianshu = dianshu + 1;
				}
				if(Boolean(KKS4)){
					labels.push('测点4标尺值');
					//labels = ["x",'测点1标尺值','测点2标尺值','测点3标尺值','测点4标尺值'];
					series = {'测点2标尺值':{axis:'y2'},'测点4标尺值':{axis:'y2'}};
					dianshu = dianshu + 1;
				}
				var begin_time = document.getElementById("begin_time").value;
				var end_time = document.getElementById("end_time").value;
				var yzero = document.getElementById("yzero").value;
				var yspan = document.getElementById("yspan").value;
				var y1zero = document.getElementById("y1zero").value;
				y1zero = Number(y1zero);
				var y1span = document.getElementById("y1span").value;
				y1span = Number(y1span);
				var xmlObj;
				if(window.XMLHttpRequest){
					xmlObj=new XMLHttpRequest();
				}else if(window.ActiveXObject){
					xmlObj=new ActiveXObject("Microsoft.XMLHttp");
				}else{
					alert('wrong');
				}	   
				//var url="opcsql.php?SYS1="+SYS1+"&SYS2="+SYS2+"&SYS3="+SYS3+"&SYS4="+SYS4+"&KKS1="+KKS1+"&KKS2="+KKS2+"&KKS3="+KKS3+"&KKS4="+KKS4+"&begin_time="+begin_time+"&end_time="+end_time+"&time="+new Date().getTime();
				var url="opcsql.php?SYSDB="+SYSDB+"&SYS1="+SYS1+"&SYS2="+SYS2+"&SYS3="+SYS3+"&SYS4="+SYS4+"&KKS1="+KKS1+"&KKS2="+KKS2+"&KKS3="+KKS3+"&KKS4="+KKS4+"&begin_time="+begin_time+"&end_time="+end_time+"&time="+new Date().getTime();
				xmlObj.onreadystatechange=function(){
					if(this.readyState==4){
						//alert(this.responseText);
						alert("查询成功！");
						jsJSON=JSON.parse(this.responseText);
						let d = new Array(jsJSON.length);
						for (let i=0;i<jsJSON.length;i++){
							d[i] = new Array(dianshu+1);
							for(let j=0;j<=dianshu;j++){
								d[i][j]=0;
							}
						}
						for(var k=0;k<jsJSON.length;k++){
							d[k][0] = new Date(jsJSON[k][0]);
							for(var g=1;g <= dianshu;g++){
								d[k][g] = parseFloat(jsJSON[k][g]);
							}
						}
  						g = new Dygraph(
    							document.getElementById("graphdiv"),d,{
		  						//labelsDiv:document.getElementById('status'),//指定labels位置在DIV模块内,使用DIV字体外圈无方框
		  						resizable:"both",//整个窗口缩放
		  						rollPeriod:14,//曲线平滑度
		  						title:'MySQL OPCdb',	//标题  
		  						labels:labels,
		  						stackedGraph:false,
		  						series:series,
		  						valueRange:[yzero,yspan],
		  						axes:{
		  							y2:{
		  								valueRange:[y1zero,y1span]
									}
								},
								highlightCircleSize:2,//选择曲线高亮显示
								strokeWidth:1,
								strokeBorderWidth:null,
								highlightSeriesOpts:{//标签名外的方框,配合dygraph-legend > span.highlight {border:1px solid red;}使用
									strokeWidth:3,
									strokeBorderWidth:1,
									highlightCircleSize:5
								}
	  						}
  						);
						var onclick = function(ev){
							if(g.isSeriesLocked()){
								g.clearSelection();
							}else{
								g.setSelection(g.getSelection(),g.getHighlightSeries(),true);
							}
						};
						g.updateOptions({clickCallback:onclick},true);//单击锁定选中曲线，再次单击解锁可以选择曲线
						g.setSelection(false,'s005');
					}
				}
				xmlObj.open('get',url);
				xmlObj.send();
			}
			last = function(){
				//翻页：上一页曲线查询
				var btime = new Date(document.getElementById("begin_time").value);
				var etime = new Date(document.getElementById("end_time").value);
				var b = btime.getTime();
				var e = etime.getTime();
				var c = e -b;
				var bb = b - c;
				var ee = e - c;
				var bbb = new Date(bb);
				var eee = new Date(ee);
				document.getElementById("begin_time").value = bbb.toLocaleString("sv-SE");
				document.getElementById("end_time").value = eee.toLocaleString("sv-SE");
				plot();
			}
			next = function(){
				//翻页：下一页曲线查询
				var btime = new Date(document.getElementById("begin_time").value);
				var etime = new Date(document.getElementById("end_time").value);
				var b = btime.getTime();
				var e = etime.getTime();
				var c = e -b;
				var bb = b + c;
				var ee = e + c;
				var bbb = new Date(bb);
				var eee = new Date(ee);
				document.getElementById("begin_time").value = bbb.toLocaleString("sv-SE");
				document.getElementById("end_time").value = eee.toLocaleString("sv-SE");
				plot();
			}
			Dygraph.onDOMready(function onDOMready() {
				//创建曲线
				var plotButton = document.getElementById("plot");
				var lastButton = document.getElementById("last");
				var nextButton = document.getElementById("next");
				plotButton.onclick = plot;
				nextButton.onclick = next;
				lastButton.onclick = last;
				plot();
			});
		</script>
				</div>
			</div>
			<div class="rightcolumn">
				<div class="card">
<ul class="right">
<li><a class="active"href="./boiler/first_boiler/first_boiler.php">#1锅炉逻辑</a></li>
<li><a href="./turbine/firstturbine/1_turbine.php">#1汽轮机逻辑</a></li>
<li><a href="./turbine/threeturbine/3_turbine.php">#3汽轮机逻辑</a></li>
<li><a href="./turbine/fourturbine/4_turbine.php">#4汽轮机逻辑</a></li>
</ul>
				</div>
				<div class="card">
					<h6>虚位已待</h6>	
				</div>
			</div>
		</div>
		<div class="footer">
			<?php include("../../lib/footer/footer.php")?>
		</div>
</body>
</html>
