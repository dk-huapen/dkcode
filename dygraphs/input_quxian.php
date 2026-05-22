<script type="text/javascript"
  src="dygraph.js"></script>
<link rel="stylesheet" type="text/css"
  src="dygraph.css" />
</head>
<body>
<style>
	.dygraph-legend {text-align:right;} 
	.dygraph-legend > span.highlight {border:1px solid red;}
</style>
<table><tr><td>
<div id="graphdiv" style="width:1200px;height:400px;"></div>
</td><td valign=middle>
<div id="status" style="width:180px;height:200px;"></div>
</td></tr></table>
<fieldset>
<legend>左侧坐标点</legend>
<b>测点1:</b><input type="text" id="KKS1" value="" width="5"> <b>y1轴起点:</b><input type="text" id="yzero" value="0" width="5"><br>
<b>测点3:</b><input type="text" id="KKS3" value="" width="5"> <b>y1轴终点:</b><input type="text" id="yspan" value="10" width="5">
</fieldset>
<fieldset>
<legend>右侧坐标点</legend>
<b>测点2:</b><input type="text" id="KKS2" value="" width="5"><b>y2轴起点:</b><input type="text" id="y1zero" value="0" width="5"><br>
<b>测点4:</b><input type="text" id="KKS4" value="" width="5"><b>y2轴终点:</b><input type="text" id="y1span" value="500" width="5">
</fieldset>
<p><label><b>开始时间:</b></label><input type="datetime-local" id="begin_time" value="2024-07-27 15:00" width="5"><label><b>结束时间:</b></label><input type="datetime-local" id="end_time" value="2024-07-27 15:30" width="5"></p>

<p><button id="plot">查询</button></p>
<script type="text/javascript">
//10LBC10CP101_VALUE
//10LBD10CP101_VALUE
//10LBC10CT601_VALUE
//10LBD10CT601_VALUE
Dygraph.onDOMready(function onDOMready() {
var plotButton = document.getElementById("plot");
plot = function(){
	//alert("查询");
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
	//alert(x1);
var xmlObj;
	if(window.XMLHttpRequest){
		xmlObj=new XMLHttpRequest();
	}else if(window.ActiveXObject){
		xmlObj=new ActiveXObject("Microsoft.XMLHttp");
		
	}else{
		alert('wrong');
	}	   
	//var url="opcsql.php?x1=1&time="+new Date().getTime();
	var url="opcsql.php?KKS1="+KKS1+"&KKS2="+KKS2+"&KKS3="+KKS3+"&KKS4="+KKS4+"&begin_time="+begin_time+"&end_time="+end_time+"&time="+new Date().getTime();
	xmlObj.onreadystatechange=function(){
		if(this.readyState==4){
	//alert(this.responseText);
			jsJSON=JSON.parse(this.responseText);
		let d = new Array(jsJSON.length);
		for (let i=0;i<jsJSON.length;i++){
			d[i] = new Array(dianshu+1);
			for(let j=0;j<=dianshu;j++){
				d[i][j]=0;
			}
		}
		for(var k=0;k<jsJSON.length;k++)
		{
			d[k][0] = new Date(jsJSON[k][0]);
			for(var g=1;g <= dianshu;g++){
			d[k][g] = parseFloat(jsJSON[k][g]);
			//d[k][4] = parseFloat(jsJSON[k][4]);
			}
		}

	//labels = ["x",'测点1标尺值','测点2标尺值','测点3标尺值','测点4标尺值'];
	//series = {'测点2标尺值':{axis:'y2'},'测点4标尺值':{axis:'y2'}};
	//labels = ["x",'测点1标尺值','测点2标尺值','测点4标尺值'];
	//series = {'测点2标尺值':{axis:'y2'},'测点4标尺值':{axis:'y2'}};
  g = new Dygraph(

    document.getElementById("graphdiv"),d,
	  {
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

		//	y1label:'first',
		//	y2label:'second'
		  //showRangeSelector:true,下方的x轴区间移动
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


		//var jsJSON = <?php echo json_encode($outp) ?>;
}
  plotButton.onclick = plot;
  plot();
});
</script>
</body>
</html>
