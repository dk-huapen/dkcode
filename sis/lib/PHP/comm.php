
	<!--鼠标右键历史曲线窗口-->
    <div id="sishistory"class="history">
  	<div id="draghistory" class="historytop">
		<span class="close" onclick="closed('sishistory')">X</span>
  	</div>
  	<div class="historyDygraph">
<div id="graphdiv" style="width:800px;height:400px;"></div>

  	</div>
  	<div class="historyparam">
<p><label><b>开始时间:</b></label><input type="datetime-local" id="begin_time" value="" width="5"><label><b>结束时间:</b></label><input type="datetime-local" id="end_time" value="" width="5"><button id="plot">查询</button><button id="last">上一页</button><button id="next">下一页</button></p>
<p><b>KKS:</b><input type='text' id='kks' value='' width='5'><b>下限:</b><input type='text' id='yzero' value='' width='5'>
<b>上限:</b><input type='text' id='yspan' value='' width='5'></p>
			
  	</div>
    </div>
	<!--鼠标左键点击弹出窗口-->
    <div id="lookup"class="lookme">
  	<div id="draglookup" class="topheader">
		<span class="close" onclick="closed('lookup')">X</span>
  	</div>
  	<div class="container">
	    <p id="lookup_kks">KKS</p>
	    <p id="lookup_name">设备名称</p>
  	</div>
  	<div class="containerkks">
	    <span id="lookup_value">值</span>
	    <span>时间:</span>
	    <span id="lookup_time">值</span>
  	</div>
  	<div class="header">
		<a id= 'viewlink' href="" target="_blank" rel="noopener noreferrer"><img id = 'erweima' src=></img></a><!---点击二维码直接跳转至台账预览--->
		<span id="lookup_h">H</span>
	    <span id="lookup_hh">HH</span>
	    <span id="lookup_hhh">HHH</span>
  	</div>
    </div>
	<!--鼠标右键点击弹出窗口-->
	<div id="contextMenu" class="context-menu">
    		<div class="context-menu-item" onclick="count(global_count_id)">设备台账</div>
    		<div class="context-menu-item" onclick="showHistory(global_kks)">历史曲线</div>
    		<div class="context-menu-item" onclick="handleItemClick('剪切')">预留功能</div>
	</div>
	<!--Tip窗口-->
	<div id="vartip" class="context-menu">
    		<div id="tipKKS" class="context-menu-item">KKS码</div>
    		<div id="tipName" class="context-menu-item">设备名称</div>
    		<div class="context-menu-item" onclick="count(global_count_id)">设备台账</div>
	</div>
	<!--1秒刷新一次SIS画面参数-->
	<script> 
        drag("draglookup","lookup");
        	//drag("sishistory");//拖动查看窗口
        	drag("draghistory","sishistory");//拖动查看窗口
		updateValue(page);
		setInterval(updateValue,1000,page);
	</script>
