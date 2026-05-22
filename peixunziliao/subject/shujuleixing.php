
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
						<h2><center>数据类型和程序结构</center></h2>
<h3>一、数据类型</h3>
我们常见的数据相关概念有：int,real,string,常量，变量。
<h4>PLC主要包含以下数据类型</h4>
<ul>
	<li>与实际输入/输出信号相关的输入/输出映象区</li>
		<ul>
			<li>I： 数字量输入（DI）</li>
			<li>Q： 数字量输出（DO）</li>
			<li>AI： 模拟量输入</li>
			<li>AQ：模拟量输出</li>
		</ul>
	<li>内部数据存储区</li>
		<ul>
			<li>V：变量存储区，可以按位、字节、字或双字来存取V 区数据</li>
			<li>M：位存储区，可以按位、字节、字或双字来存取M区数据</li>
			<li>T：定时器存储区，用于时间累计，分辨率分为1ms、10ms、100ms三种</li>
			<li>C：计数器存储区，用于累计其输入端脉冲电平由低到高的次数。CPU提供了三种类 型的计数器：一种只能增计数；一种只能减计数；另外一种既可 以增计数，又可以减计数。</li>
		</ul>
	<li>字、字节、双字</li>
		<ul>
			<li>VB表示V存储区的一个字节Byte，可用于存放短整型数据。8位</li>
			<li>VW表示V存储区的一个字Word，可用于存放整型数据。16位</li>
			<li>VD表示V存储区的两个字Double Word，可用于存放双整型和浮点数数据。32位</li>
			<li>VB200 存取V内存地址字节200——字节</li>
			<li>VW200 存取V内存地址字节200和201——字</li>
			<li>VD200 存取V内存地址字节200、201、202和203——双字</li>
		</ul>
</ul>
<h4>S7-200 Smart的存储区可以分为两大类：</h4>
<ul>
	<li>输入/输出映像区/存储区包括：</li>
		<ul>	
    			<li>数字量输入映像区（DI，process-image input）；    #范围：I0.0-I37.7</li>
    			<li>数字量输出映像区（DO，process-image output）； #范围：Q0.0-Q37.7</li>
    			<li>模拟量输入存储区（AI）；                     #范围：AIW0-AIW110 </li>
    			<li>模拟量输出存储区（AO）；                      #范围：AQW0-AQW110</li>
		</ul>
<li>内部存储区的类别比较多，包括：</li>
	<ul>
    		<li>变量存储区（V，Variable memory）；     #主要用于数据存储，跟西门子300 的DB块一样</li>
    		<li>标志存储区（M，Flag memory）；          #M区主要用于逻辑中间变量，利于编程。也可以存位，但是容量小。 M0.0-M37.7</li>
    		<li>定时器（T，Timer）；                              #T0-255  (常用T37开始）</li>
    		<li>计数器（C，Counter）；                          #C0-C255</li>
    		<li>高速计数器（HC，high speed counter）；</li>
    		<li>累加器（Accumulator）；</li>
    		<li>特殊存储器（SM，special memory）；</li>
    		<li>局部存储区（L，Local memory）；</li>
    		<li>顺序控制继电器存储区（Sequence Control Relay）。</li>
	</ul>
</ul>
		<img src="image/shuju1.JPG"width="100%"/>
<h4>S7-200 Smart的数据类型：</h4>
		<img src="image/shuju2.png"width="80%"/><br>
32位数据类型，一般每4个为间隔。如MD0,MD3.<br>
16位数据类型，一般每2个为间隔。如MW0,MW1.<br>
因为：
MD0=MW0(高位)+MW2(地位)=MB0+MB1+MB2+MB3=(M0.7-M0.0)+(M1.7-M1.0)+(M2.7-M2.0)+(M3.7-M3.0)<br>
MD4=MW4(高位)+MW6(地位)=MB4+MB5+MB6+MB7=(M4.7-M4.0)+(M5.7-M5.0)+(M6.7-M6.0)+(M7.7-M7.0)<br>
这样保证没有交叉引用，不能出现错误。
<br>
<h3>二、程序结构</h3><br>
<ul>
<li>顺序结构：从程序开始，到程序结束。</li>
<li>分支结构：在顺序结构基础上，根据条件进行选择执行方向。</li>
<li>循环结构：在顺序结构基础上，根据条件进行多次执行相同的或相似的代码。</li>
</ul>




						
				</div>
			</div>
			<div class="rightcolumn">
				<div class="card">
					<ul class="right">
						<li><a  href="plc.php">Smart200 PLC</a></li>
						<li><a class="active" href="#">数据类型</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="footer">
			<?php include("../../lib/footer/footer.php")?>
		</div>
</body>
</html>
