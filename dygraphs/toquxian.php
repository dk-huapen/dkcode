<script type="text/javascript"
  src="dygraph.js"></script>
<link rel="stylesheet" type="text/css"
  src="dygraph.css" />
</head>
<body>
<style>
	.dygraph-legend {text-align:right;} 
</style>
<table><tr><td>
<div id="graphdiv" style="width:1000px;height:400px;"></div>
</td><td valign=middle>
<div id="status" style="width:200px;height:200px;"></div>
</td></tr></table>
<p><b>测点1:</b><input type="text" id="KKS1" value="10LBC10CP101_VALUE" width="5"><b>起点:</b><input type="text" id="yzero" value="2" width="5"><b>终点:</b><input type="text" id="yspan" value="6" width="5"></p>
<p><b>测点2:</b><input type="text" id="KKS2" value="10LBC10CT601_VALUE" width="5"><b>起点:</b><input type="text" id="y1zero" value="230" width="5"><b>终点:</b><input type="text" id="y1span" value="240" width="5"></p>
<p><label><b>开始时间:</b></label><input type="datetime-local" id="begin_time" value="" width="5"><label><b>结束时间:</b></label><input type="datetime-local" id="end_time" value="" width="5"></p>

<p><button id="plot">查询</button></p>
<script type="text/javascript">
Dygraph.onDOMready(function onDOMready() {
var plotButton = document.getElementById("plot");
plot = function(){
	//alert("查询");
	var KKS1 = document.getElementById("KKS1").value;
	var KKS2 = document.getElementById("KKS2").value;
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
	var url="opcsql.php?KKS1="+KKS1+"&KKS2="+KKS2+"&begin_time="+begin_time+"&end_time="+end_time+"&time="+new Date().getTime();
	xmlObj.onreadystatechange=function(){
		if(this.readyState==4){
	alert(this.responseText);
			jsJSON=JSON.parse(this.responseText);
		let d = new Array(jsJSON.length);
		for (let i=0;i<jsJSON.length;i++){
			d[i] = new Array(3);
			for(let j=0;j<3;j++){
				d[i][j]=0;
			}
		}
		for(var k=0;k<jsJSON.length;k++)
		{
			d[k][0] = new Date(jsJSON[k][0]);
			d[k][1] = parseFloat(jsJSON[k][1]);
			d[k][2] = parseFloat(jsJSON[k][2]);
		}

  g = new Dygraph(

    document.getElementById("graphdiv"),d,
	  {
		  labelsDiv:document.getElementById('status'),//指定labels位置在DIV模块内
		  resizable:"both",//整个窗口缩放
		  rollPeriod:14,//曲线平滑度
		  title:'MySQL OPCdb',	//标题  
		  //labels:["x","A"],	//X
		  //labels:["x",KKS1,KKS2],	//X
		  labels:["x",KKS1,'lab'],	//X
		  series:{
		  'lab':{axis:'y2'}
		},
		  valueRange:[yzero,yspan],
		  axes:{
		  y2:{
		  valueRange:[y1zero,y1span]
		  //labelsKMB:true
		}
		}
		//	y1label:'first',
		//	y2label:'second'
		  //showRangeSelector:true,下方的x轴区间移动
	  }
  );
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
