<html>
	<head>
		<?php include("header.php") ?>
<script>
function myFunction(str) {
  	var x = document.getElementById(str);
	if(isNaN(x.value)){
		alert("输入有误，请输入数字！");
		x.value=0.0;
		return false;
	}else{
		return true;
	}
	
}
function check(){
  	var D = parseFloat(document.getElementById("D").value);
  	var L1 = parseFloat(document.getElementById("L1").value);
  	var L2 = parseFloat(document.getElementById("L2").value);
  	var A1 = parseFloat(document.getElementById("A1").value);
  	var B1 = parseFloat(document.getElementById("B1").value);
  	var C1 = parseFloat(document.getElementById("C1").value);
  	var A2 = parseFloat(document.getElementById("A2").value);
  	var B2 = parseFloat(document.getElementById("B2").value);
  	var C2 = parseFloat(document.getElementById("C2").value);
  	var A3 = parseFloat(document.getElementById("A3").value);
  	var B3 = parseFloat(document.getElementById("B3").value);
  	var C3 = parseFloat(document.getElementById("C3").value);
  	var A4 = parseFloat(document.getElementById("A4").value);
  	var B4 = parseFloat(document.getElementById("B4").value);
  	var C4 = parseFloat(document.getElementById("C4").value);
	var a13 = (A1-A3)/2;
	var a24 = (A2-A4)/2;
	var b24 = (B2+C4-C2-B4)/2;
	var b13 = (B1+C3-C1-B3)/2;

	alert(b24);
	if(a13>=0){
  		document.getElementById("A13").innerHTML = "上外圈:"+Math.abs(a13).toFixed(3);
	}else{
  		document.getElementById("A13").innerHTML = "下外圈:"+Math.abs(a13).toFixed(3);
	}
	if(a24>=0){
  		document.getElementById("A24").innerHTML = "左外圈:"+Math.abs(a24).toFixed(3);
	}else{
  		document.getElementById("A24").innerHTML = "右外圈:"+Math.abs(a24).toFixed(3);
	}
	if(b24>=0){
  		document.getElementById("B24").innerHTML = "上张口:"+Math.abs(b24).toFixed(3);
	}else{
  		document.getElementById("B24").innerHTML = "下张口:"+Math.abs(b24).toFixed(3);
	}
	if(b13>=0){
  		document.getElementById("B13").innerHTML = "左张口:"+Math.abs(b13).toFixed(3);
	}else{
  		document.getElementById("B13").innerHTML = "右张口:"+Math.abs(b13).toFixed(3);
	}
	if(Math.abs(b24)<0.05){
		b24=0;
	}
	if(Math.abs(b13)<0.05){
		b13=0;
	}
	var q = L1/D*b24+a13;
	var h = (L1+L2)/D*b24+a13;
	var l = L1/D*b13+a24;
	var r = (L1+L2)/D*b13+a24;
  	document.getElementById("Q").innerHTML = "前地脚:"+q.toFixed(3);
  	document.getElementById("H").innerHTML = "后地脚:"+h.toFixed(3);
  	document.getElementById("L").innerHTML = "左移位:"+l.toFixed(3);
  	document.getElementById("R").innerHTML = "右移位:"+r.toFixed(3);

}
</script>
	</head>
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
					<h2><center>缺陷登记<center></h2>
	<label>DD:</label><input type="text" value=0 id="D" onblur="myFunction(this.id)">
	<label>L1:</label><input type="text" value=0 id="L1" onblur="myFunction(this.id)">
	<label>L2:</label><input type="text" value=0 id="L2" onblur="myFunction(this.id)">
	<br>
	<label>A1:</label><input type="text" value=0 id="A1" onblur="myFunction(this.id)">
	<label>B1:</label><input type="text" value=0 id="B1" onblur="myFunction(this.id)">
	<label>C1:</label><input type="text" value=0 id="C1" onblur="myFunction(this.id)">
	<br>

	<label>A2:</label><input type="text" value=0 id="A2" onblur="myFunction(this.id)">
	<label>B2:</label><input type="text" value=0 id="B2" onblur="myFunction(this.id)">
	<label>C2:</label><input type="text" value=0 id="C2" onblur="myFunction(this.id)">
	<br>

	<label>A3:</label><input type="text" value=0 id="A3" onblur="myFunction(this.id)">
	<label>B3:</label><input type="text" value=0 id="B3" onblur="myFunction(this.id)">
	<label>C3:</label><input type="text" value=0 id="C3" onblur="myFunction(this.id)">
	<br>
	<label>A4:</label><input type="text" value=0 id="A4" onblur="myFunction(this.id)">
	<label>B4:</label><input type="text" value=0 id="B4" onblur="myFunction(this.id)">
	<label>C4:</label><input type="text" value=0 id="C4" onblur="myFunction(this.id)">
	<br>
	<span id="A13">上下外圈</span>
	<span id="A24">左右外圈</span>
	<span id="B24">上下张口</span>
	<span id="B13">左右张口</span>
	<br>
	<span id="Q">前地脚</span>
	<span id="H">后地脚</span>
	<span id="L">左移位</span>
	<span id="R">左移位</span>
	<br>
	<input type="reset">
	<input type="button" value="计算结果！" onclick="check()"></input>



<p>当离开输入字段时，会触发一个函数，将输入文本转换为大写。</p>


				</div>
			</div>
			<div class="rightcolumn">
				<div class="card">
					<?php include("../../sidebar/ShowQRCode.php") ?>
				</div>
				<div class="card">
					<ul class="right">
						<li><a href="quick_select_defect.php?id=10">当天缺陷</a></li>
						<li><a href="quick_select_defect.php?id=20">昨天缺陷</a></li>
						<li><a href="quick_select_defect.php?id=30">本周缺陷</a></li>
						<li><a href="quick_select_defect.php?id=40">上周缺陷</a></li>
						<li><a href="quick_select_defect.php?id=50">本月缺陷</a></li>
						<li><a href="quick_select_defect.php?id=60">上月缺陷</a></li>
						<li><a href="add_defect.php">新增缺陷</a></li>
					</ul>
				<div class="card">
					<?php include("../../sidebar/quick_index.php") ?>
				</div>
				</div>
				<div class="card">
				<!--最新通知-->
					<?php include("../../sidebar/notice.php")?>
				</div>
				<div class="card">
				<!--最新资讯-->
					<?php include("../../sidebar/news.php")?>
				</div>
			</div>
		</div>
		<div class="footer">
			<?php include("../../lib/footer/footer.php")?>
		</div>
	</body>
</html>
