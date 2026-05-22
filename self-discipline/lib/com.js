//隐藏或显示模块ID=id的元素
	function showBox(id){
	var tbox=document.getElementById(id);
	tbox.style.display = tbox.style.display=="none"?"":"none";
		return;
	}

//隐藏或显示模块ID=id的图片
	function showImage(div_id,img_id,url){
		var tbox=document.getElementById(div_id);
	var timg=document.getElementById(img_id);
	var str= timg.src;
	if(str.indexOf(url)==-1){
	timg.src = url;
	//alert(timg.src);
	}
	tbox.style.display = tbox.style.display=="none"?"":"none";
	return;
	}

//禁用ID=id的元素
	function lockBox(obj,id){
	var tbox=document.getElementById(id);
	//tbox.disabled = tbox.disabled==true?false:true;
	if(tbox.disabled==true){
		tbox.disabled=false;
		obj.value="📔";
	}else{
		tbox.disabled=true;
		obj.value="🔓";
	}
		return;
	}

