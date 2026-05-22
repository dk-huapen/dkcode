		var global_count_id;//传递选中元素的count_id
		var global_kks;//传递选中元素的kks
		function updateValue(page) {//动态刷新SIS画面参数时AJAX前端响应
  			if (window.XMLHttpRequest) {
    				// code for IE7+, Firefox, Chrome, Opera, Safari
    				xmlhttp=new XMLHttpRequest();
  			} else { // code for IE6, IE5
    				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  			}
  			xmlhttp.onreadystatechange=function() {
    				if (this.readyState==4 && this.status==200) {
     					// document.getElementById("txtHint").innerHTML=this.responseText;
		   			//alert(this.responseText);
					myObj = JSON.parse(this.responseText);
		    			for(i=0;i<myObj.length;i++){
							test["_"+myObj[i].kks].value = myObj[i].value;
							test["_"+myObj[i].kks].updatetime = myObj[i].updatetime;
						if(test["_"+myObj[i].kks].flag==0){//判断是否为开关量，开关量是变色，模拟量是显示
							if(parseFloat(myObj[i].value) > parseFloat(test["_"+myObj[i].kks].HHH) || parseFloat(myObj[i].value) < parseFloat(test["_"+myObj[i].kks].LLL)){//颜色报警,此处类型为string，需转化成float进行比较，否则乱。。
      								document.getElementById(myObj[i].kks).style.fill="red";
							//alert(typeof(myObj[i].value));
							//alert(test["_"+myObj[i].kks].HHH);
							//alert(test["_"+myObj[i].kks].LLL);
							}else{
								if(parseFloat(myObj[i].value) >parseFloat(test["_"+myObj[i].kks].HH) || parseFloat(myObj[i].value) <parseFloat(test["_"+myObj[i].kks].LL)){//颜色报警
      									document.getElementById(myObj[i].kks).style.fill="green";
								}else{
									if(parseFloat(myObj[i].value) >parseFloat(test["_"+myObj[i].kks].H) || parseFloat(myObj[i].value) <parseFloat(test["_"+myObj[i].kks].L)){//颜色报警
      										document.getElementById(myObj[i].kks).style.fill="yellow";
									}else{
      										document.getElementById(myObj[i].kks).style.fill="black";
										//alert("black");
									}

								}
							}
      							document.getElementById(myObj[i].kks).innerHTML=myObj[i].value + test["_"+myObj[i].kks].unit;

						}
						if(test["_"+myObj[i].kks].flag==1){//判断是否为开关量，开关量是变色，模拟量是显示
							if(test["_"+myObj[i].kks].LLL < 40){//LLL=0为普通变色
								if(test["_"+myObj[i].kks].HHH == 1){//LLL=0为普通变色
									if(myObj[i].value==1){
      										document.getElementById(myObj[i].kks).style.fill="green";
									}else{
      										document.getElementById(myObj[i].kks).style.fill="red";
									}
								}else{
									if(myObj[i].value==1){
      										document.getElementById(myObj[i].kks).style.fill="red";
									}else{
      										document.getElementById(myObj[i].kks).style.fill="green";
									}
								}
							}
							if(test["_"+myObj[i].kks].LLL==40){//LLL=40为M/A切换
								if(myObj[i].value==1){
      									document.getElementById(myObj[i].kks).innerHTML="A";
								}else{
      									document.getElementById(myObj[i].kks).innerHTML="M";
								}
							}
							if(test["_"+myObj[i].kks].LLL==41){//LLL=40为投入切除
								if(myObj[i].value==0){
      									document.getElementById(myObj[i].kks).style.fill="green";
      									document.getElementById(myObj[i].kks).innerHTML="已投入";
								}
								if(myObj[i].value==1){
      									document.getElementById(myObj[i].kks).style.fill="red";
      									document.getElementById(myObj[i].kks).innerHTML="已切除";
								}
							}
							if(test["_"+myObj[i].kks].LLL==50){//LLL=50为启动允许条件,width=350，height=25
								if(myObj[i].value==1){
      									document.getElementById(myObj[i].kks).style.stroke="green";
								}
							}
							if(test["_"+myObj[i].kks].LLL==60){//LLL=60为跳闸条件,width=350，height=25
								if(myObj[i].value==1){
      									document.getElementById(myObj[i].kks).style.stroke="red";
								}
							}
							if(test["_"+myObj[i].kks].LLL==65){//LLL=60为跳闸条件,width=300，height=50
								if(myObj[i].value==1){
      									document.getElementById(myObj[i].kks).style.stroke="red";
								}
							}
						}
						if(test["_"+myObj[i].kks].flag==2){//判断是否为开关量，开关量是变色，模拟量是显示
							if(myObj[i].value==0){
      								document.getElementById(myObj[i].kks).style.fill="purple";
							}
							if(myObj[i].value==1){
      								document.getElementById(myObj[i].kks).style.fill="green";
							}
							if(myObj[i].value==2){
      								document.getElementById(myObj[i].kks).style.fill="red";
							}
							if(myObj[i].value==3){
      								document.getElementById(myObj[i].kks).style.fill="yellow";
							}
						}
					//alert(test.myObj[i].kks.HH);
					//alert(test._40HSA40CQ105.HH);
			    		}
    				}
  			}
  			//xmlhttp.open("GET","updateValueSql.php?q="+page,true);
  			xmlhttp.open("GET","/dkcode/dkcode/sis/updateValueRedis.php?q="+page,true);
  			xmlhttp.send();
		}
		function mUp(count_id,kks){//鼠标右键点击响应
			//alert("up");
			if(event.button == 2){
            			var menu = document.getElementById('contextMenu');
            			menu.style.display = 'block';
            			menu.style.left = `${event.pageX}px`;
            			menu.style.top = `${event.pageY}px`;
	   			global_count_id = count_id;
	   			global_kks = kks;
			}
		}
    		function count(count_id) {
			//alert(count_id);
		    	//window.open("http://dklovelich.iok.la/dkcode/taizhang/equipment_account/look_content.php?id="+count_id)
		    	window.open("/dkcode/dkcode/taizhang/equipment_account/look_content.php?id="+count_id)
		    	//window.open("/dkcode/taizhang/ba.html")
		    	//window.open("/dkcode/sis/view.php?id="+count_id);
        		document.getElementById('contextMenu').style.display = 'none'; // 点击菜单项后隐藏菜单
	    	}
    		function closed(str) {
        		document.getElementById(str).style.display = 'none'; // 点击页面其他地方隐藏菜单
	    	}
		function mOver(kks,name){//Tip实现,暂时不用，手机上他与click冲突，覆盖了click
            		//var menu = document.getElementById('vartip');
            		//menu.style.display = 'block';
            		//menu.style.left = `${event.pageX}px`;
            		//menu.style.top = `${event.pageY}px`;
            		//document.getElementById('tipKKS').innerHTML=kks;
            		//document.getElementById('tipName').innerHTML=name;
		    	//window.open("/dkcode/sis/view.php?id="+count_id);
		}
		function mOut(){
			document.getElementById("vartip").style.display="none"
		}
		window.onload = function(){
           		//去掉默认的contextmenu事件，否则会和右键事件同时出现。
           		document.oncontextmenu = function(e){
               		e.preventDefault();
           		}
		}
    		document.addEventListener('click', function () {
        		document.getElementById('contextMenu').style.display = 'none'; // 点击页面其他地方隐藏菜单
    		});

        function drag(dragobj,obj) {
            if (typeof obj == "string") {
                var dragobj = document.getElementById(dragobj);
                var obj = document.getElementById(obj);
                obj.orig_index = obj.style.zIndex; //设置当前对象永远显示在最上层
            }
            dragobj.onmousedown = function (a) {//鼠标按下
                this.style.cursor = "move"; //设置鼠标样式
                this.style.zIndex = 1000;
                var d = document;
                if (!a) a = window.event; //按下时创建一个事件
                var x = a.clientX - document.body.scrollLeft - obj.offsetLeft; //x=鼠标相对于网页的x坐标-网页被卷去的宽-待移动对象的左外边距
                var y = a.clientY - document.body.scrollTop - obj.offsetTop; //y=鼠标相对于网页的y左边-网页被卷去的高-待移动对象的左上边距
                d.onmousemove = function (a) {//鼠标移动
                    if (!a) a = window.event; //移动时创建一个事件
                    obj.style.left = a.clientX + document.body.scrollLeft - x;
                    obj.style.top = a.clientY + document.body.scrollTop - y;
                }
                d.onmouseup = function () {//鼠标放开
                    document.onmousemove = null;
                    document.onmouseup = null;
                    dragobj.style.cursor = "normal"; //设置放开的样式
                    dragobj.style.zIndex = dragobj.orig_index;
                }
            }
        }

		function click(str,id){//鼠标左键点击响应
            			var look = document.getElementById('lookup');
            			look.style.display = 'block';
            			look.style.left = `${event.pageX}px`;
            			look.style.top = `${event.pageY}px`;
				document.getElementById('lookup_kks').innerHTML=str;
				document.getElementById('lookup_name').innerHTML=test["_"+str].name;
				document.getElementById('lookup_time').innerHTML=test["_"+str].updatetime;
				document.getElementById('lookup_value').innerHTML=test["_"+str].value + test["_"+str].unit;
				document.getElementById('lookup_hhh').innerHTML="HHH:"+test["_"+str].HHH;

				document.getElementById('viewlink').href = "/dkcode/dkcode/sis/view.php?id=" + id;
str = "https://223.8.123.140:9443/dkcode/dkcode/taizhang/equipment_account/look_content.php?id=" + id;
  			if (window.XMLHttpRequest) {
    				// code for IE7+, Firefox, Chrome, Opera, Safari
    				xmlhttp=new XMLHttpRequest();
  			} else { // code for IE6, IE5
    				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  			}
  			xmlhttp.onreadystatechange=function() {
    				if (this.readyState==4 && this.status==200) {
					document.getElementById('erweima').src='data:image/png;base64,'+this.responseText;
			    		}
  			}
  			xmlhttp.open("GET","/dkcode/dkcode/lib/QRPagerSis.php?id="+str,true);
  			xmlhttp.send();
		}
function plot(){
//查询曲线函数
	var begin_time = document.getElementById("begin_time").value;
	var end_time = document.getElementById("end_time").value;
	var kks = document.getElementById("kks").value;
	var yzero = document.getElementById("yzero").value;
	var yspan = document.getElementById("yspan").value;
//			alert(kks);
	var xmlObj;
	if(window.XMLHttpRequest){
		xmlObj=new XMLHttpRequest();
	}else if(window.ActiveXObject){
		xmlObj=new ActiveXObject("Microsoft.XMLHttp");
	}else{
		alert('wrong');
	}	   
	var url="/dkcode/dkcode/sis/historySql.php?kks="+kks+"&begin_time="+begin_time+"&end_time="+end_time+"&time="+new Date().getTime();
	xmlObj.onreadystatechange=function(){
		if(this.readyState==4){
//		alert(this.responseText);
//			alert("查询成功！");
			jsJSON=JSON.parse(this.responseText);
			let d = new Array(jsJSON.length);
			for (let i=0;i<jsJSON.length;i++){
				d[i] = new Array(2);
				d[i][0]=0;
				d[i][1]=0;
			}
			for(var k=0;k<jsJSON.length;k++){
				d[k][0] = new Date(jsJSON[k][0]);
				for(var g=1;g <= 1;g++){
					d[k][g] = parseFloat(jsJSON[k][g]);
				}
			}
  		g = new Dygraph(
	  document.getElementById("graphdiv"),d,{
		resizable:"both",//整个窗口缩放:sp
		rollPeriod:1,//曲线平滑度,不能大太，太大容易失真
		title:'MySQL OPCdb',	//标题  
		labels:["date","test2"],
		stackedGraph:false,
		//series:series,
		valueRange:[yzero,yspan],
		highlightCircleSize:2,//选择曲线高亮显示
		strokeWidth:1,
		strokeBorderWidth:null,
		highlightSeriesOpts:{//标签名外的方框,配合dygraph-legend > span.highlight {border:1px solid red;}使用
			strokeWidth:3,
			strokeBorderWidth:1,
			highlightCircleSize:5
		}
			});
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
    		function showHistory(kks) {
        		//document.getElementById('sishistory').style.display = 'block'; 
        		var historydiv = document.getElementById('sishistory'); 
        		historydiv.style.display = 'block';
            		historydiv.style.left = `${event.pageX}px`;
            		historydiv.style.top = `${event.pageY}px`;
			//var begin_time = '2025-03-17 21:01:01';
			//var end_time = '2025-03-17 21:02:05';
			var endtime = new Date();
			var btime = endtime.getTime() - 6000;
			var begintime = new Date(btime);
			var historykks=kks;
			var begin_time = begintime.toLocaleString("sv-SE");
			var end_time = endtime.toLocaleString("sv-SE");
			document.getElementById('begin_time').value = begin_time; // 点击菜单项后隐藏菜单
        		document.getElementById('end_time').value = end_time; // 点击菜单项后隐藏菜单
        		document.getElementById('kks').value = historykks; // 点击菜单项后隐藏菜单
			Dygraph.onDOMready(function onDOMready() {
				var plotButton = document.getElementById("plot");
				var lastButton = document.getElementById("last");
				var nextButton = document.getElementById("next");
				plotButton.onclick = plot;
				nextButton.onclick = next;
				lastButton.onclick = last;
				plot();
			});
	    	}
