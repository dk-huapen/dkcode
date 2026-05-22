function out_news(myID,result_id){
	var xmlhttp;
	var str;
	if(window.XMLHttpRequest){
		xmlhttp=new XMLHttpRequest();
	}else if(window.ActiveXObject){
		xmlhttp=new ActiveXObject("Microsoft.XMLHttp");
	}
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readyState == 4 && xmlhttp.status==200){
			//var str = xmlhttp.responseText;
	document.getElementById(result_id).innerHTML=xmlhttp.responseText;
		}
	}
	//xmlhttp.open("POST","../../lib/check_news.php",true);
	xmlhttp.open("POST","/dkcode/lib/check_news.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	str=document.getElementById(myID).value;
	xmlhttp.send("name="+str+"&ii=ii");
}

