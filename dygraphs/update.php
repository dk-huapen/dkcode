  <head>
    <meta charset="UTF-8">
    <title>Live random data</title>

    <link rel="stylesheet" type="text/css" href="dygraph.css" />
    <script type="text/javascript" src="dygraph.js"></script>
  </head>
  <body>
<?php
		$conn = mysqli_connect("localhost","root","dk1314lich,forever!","opcdb");
		if(!$conn){
			die("连接失败". mysqli_connect_error());
		}else { 
		//echo"连接成功";
		}
		mysqli_query($conn, "set names utf8");
		$tb_last_sql = "SELECT * FROM ceshi WHERE 1 order by `id` desc limit 1";
		$tb_last_result = mysqli_query($conn, $tb_last_sql);
		$tb_last_arr=mysqli_fetch_assoc($tb_last_result);
			$last_value = $tb_last_arr['VALUE'];
			$last_time = $tb_last_arr['HTIME'];
			echo "时间：<p id ='ltime'>".$last_time."</p>";
			echo "数值：<p id ='lvalue'>".$last_value."</p>";
?>
    <h3 style="width:800px; text-align: center;">Live random data</h3>

    <div id="div_g" style="width:800px; height:400px;"></div>

    <script type="text/javascript"><!--//--><![CDATA[//><!--
    Dygraph.onDOMready(function onDOMready() {
var xmlObj;
	if(window.XMLHttpRequest){
		xmlObj=new XMLHttpRequest();
	}else if(window.ActiveXObject){
		xmlObj=new ActiveXObject("Microsoft.XMLHttp");
		
	}else{
		alert('wrong');
	}	   
	var url="opcupdate.php?time="+new Date().getTime();
      var data = [];
      var lasttime = new Date();
      var t = <?php echo $last_value ?>;
      var lastvalue = parseFloat(t);
        data.push([lasttime,lastvalue]);

      g = new Dygraph(document.getElementById("div_g"), data,
                          {
                            drawPoints: true,
                            showRoller: true,
                            valueRange: [0.0, 100],
                            labels: ['Time', 'Random']
                          });
      intvl = setInterval(function() {
	xmlObj.onreadystatechange=function(){
		if(this.readyState==4){
			jsJSON=JSON.parse(this.responseText);
			var x = new Date(jsJSON[0][0]);
			var y = jsJSON[0][1];
			document.getElementById("ltime").innerHTML = jsJSON[0][0];
			document.getElementById("lvalue").innerHTML = y;

        data.push([x, y]);
		}
	}
	xmlObj.open('get',url);
	xmlObj.send();
        g.updateOptions( { 'file': data } );
      }, 2000);
    });
    //--><!]]></script>

  </body>
