<script type="text/javascript"
  src="dygraph.js"></script>
<link rel="stylesheet" type="text/css"
  src="dygraph.css" />
</head>
<body>
<style>
	.dygraph-legend {text-align:right;} 
</style>
<div id="graphdiv" style="width:800px;height:300px;"></div>
<?php
		$conn = mysqli_connect("localhost","root","dk1314lich,forever!","tanhecha");
		if(!$conn){
			die("连接失败". mysqli_connect_error());
		}else { 
		//echo"连接成功";
		}
		mysqli_query($conn, "set names utf8");
		$tb_defect_system_sql = "SELECT column_name,column_comment FROM information_schema.columns  WHERE table_name = '1turbine' and data_type = 'double'";
		echo "<label>测点1</label>";
		echo "<select id='KKS1'style='width:20%' class='selectfont'>",
		"<option value=''>--请选择--</option>";
		$tb_defect_system_result = mysqli_query($conn, $tb_defect_system_sql);
		while($tb_defect_system_arr=mysqli_fetch_assoc($tb_defect_system_result)){
                echo "<option value=".$tb_defect_system_arr['column_name'].">".$tb_defect_system_arr['column_comment']."</option>";
		}
                echo "</select>";
		echo "<label>测点2</label>";
		echo "<select id='KKS2'style='width:20%' class='selectfont'>",
		"<option value=''>--请选择--</option>";
		$tb_defect_system_result = mysqli_query($conn, $tb_defect_system_sql);
		while($tb_defect_system_arr=mysqli_fetch_assoc($tb_defect_system_result)){
                echo "<option value=".$tb_defect_system_arr['column_name'].">".$tb_defect_system_arr['column_comment']."</option>";
		}
                echo "</select>";
?>
<p<b>x range:</b><input type="text" id="begin_time" value="2024-07-27 15:00:00" width="5">to<input type="text" id="end_time" value="2024-07-27 15:30:00" width="5"></p>

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
		var scales = {
		"firsty":5,
		"secondy":250
		}
  g = new Dygraph(

    document.getElementById("graphdiv"),d,
	  {
		  resizable:"both",//整个窗口缩放
		  rollPeriod:14,//曲线平滑度
		  title:'MySQL OPCdb',	//标题  
		  //labels:["x","A"],	//X
		  //labels:["x",KKS1,KKS2],	//X
		  labels:["x",'firsty','secondy'],
		  xlabel:'time',
		  ylabel:'value',
		  axes:{
		  y:{
		  valueFormatter:function(y,opts,series_name){
			  var unscaled = scales[series_name];
			  return unscaled;
		  }
		}
		}
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
