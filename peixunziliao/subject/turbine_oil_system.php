
<html>
<head>
<title>培训资料</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../../diary_css/my_diary.css" />
</head>

<body >
		<div class="header"> <h1>热控班组管理平台</h1> </div>
		<div class="topnav">
			<?php include("../../lib/topnav/topnav2.php") ?>
		</div>
		<div class="row">
			<div class="leftcolumn">
				<div class="card">
						<h2>专题学习</h2>
<h3>高调油动机</h3>
高调油动机由油缸、控制油路块、电液转换器、位移传感器、卸荷阀等组成。<br>
<img src="image/gaotiaomen1.png"height="60%"/>
<img src="image/gaotiaomen2.png"height="60%"/>
<img src="image/gaotiaomen_xianchang.jpg"height="60%"/>
<br>
控制系统给伺服放大器一个阀位指令信号，此信号与位移传感器反馈给伺服放大器的当前阀位信号作比较，伺服放大器将此差值经运算放大后发送给电液转换器，由电液转换器控制油的流动方向从而控制阀门运行于某个位置。当控制系统发出快关指令时，遮断控制模块卸掉安全油，高压油迅速通过一只卸荷阀进入油缸下腔，油缸上腔的油迅速从另外一只卸荷阀排至回油，从而油动机迅速关闭。
<br>
<img src="image/gaotiaomen_yuanli.png"width="50%"/>
<br>
控制系统实现
<br>
<img src="image/sifuka.jpg"width="80%"/>
<img src="image/gaotiaomen_jiexian2.png"width="25%"/>
<img src="image/gaotiaomen_jiexian1.png"/>
<h3>遮断控制模块</h3>
遮断控制模块由顺序阀、电磁阀、液动换向阀等组成。<br>
<img src="image/opc1.png"width="30%"/>
<img src="image/opc2.png"width="30%"/>
<img src="image/opc_xianchang.jpg"width="30%"/>
<br>
遮断控制模块，压力油经节流孔后形成安全油，控制油动机的卸荷阀处于关闭状态，当电气遮断信号送到电磁阀，或者透平安全油降到设计值隔膜阀打开时，都可以将安全油卸掉，从而控制油动机快速关闭。遮断控制模块还设有3个安全油压力低压力开关。
<br>
<img src="image/opc_yuanli.png"width="30%"/><br>
控制系统实现
<br>
<img src="image/opc_jiexian1.png"width="30%"/>
<img src="image/opc_jiexian2.png"width="30%"/>
<img src="image/opc_jiexian3.png"width="30%"/>
<img src="image/opc_jiexian4.png"width="30%"/>
<h3>隔膜阀</h3>
<img src="image/gemofa.png"width="40%"/>
<img src="image/gemofa_yuanli.png"width="40%"/>
<h3>AST模块</h3>
<img src="image/ast.png"width="30%"/>
<img src="image/ast_xianchang.jpg"width="50%"/>
<img src="image/ast_yuanli.png"width="50%"/>
<h3>磁力断路油门</h3>

						
				</div>
			</div>
			<div class="rightcolumn">
				<div class="card">
					<ul class="right">
						<li><a href="technology.php">技术培训</a></li>
						<li><a href="safety.php">安全培训</a></li>
						<li><a class="active"href="nengshou.php">我的培训</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="footer">
			<?php include("../../lib/footer/footer.php")?>
		</div>
</body>
</html>
