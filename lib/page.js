var xmlObj;
//Page()->xxPage()
function StandardJobPage(xhttp,xId,xjson){
	//alert("test");
			var tb=document.getElementById(xId);
			var trs=tb.getElementsByTagName('tr');
			for(var i=trs.length-1;i>=0;i--){
				//trs[i].removeNode(trs[i]); firefox浏览器不支持removeNode()
				trs[i].parentNode.removeChild(trs[i])
			}
	//alert(xhttp.responseText);
			myObj=JSON.parse(xhttp.responseText);
			for(x in myObj){
				var objtr=document.createElement('tr');
				objtr.setAttribute('bgcolor','#eeeeee');
				objtr.setAttribute('align','center');
				objtr.setAttribute('height','24');
				var id = myObj[x].standard_job_id;//这一行比较特殊，指定该表的id
				for (y in xjson){
					if(y!='management' && y!='action' && y!='path'){
					var objtd=document.createElement('td');
					objtd.innerHTML=myObj[x][y];
					objtr.appendChild(objtd);
					}else{
						if(xjson.management=='管理' && y=='management'){
							var objtd=document.createElement('td');
							text="<a href='"+xjson.path+"look_"+xjson.action+".php?id="+id+"'><img border=0 src='../../images/info.png' alt='查看'></a>";
							text+="<a href='"+xjson.path+"edit_"+xjson.action+".php?id="+id+"'><img border=0 src='../../images/edit.gif' alt='编辑'></a>";
							text+="<a href='"+xjson.path+"del_"+xjson.action+".php?id="+id+"'><img border=0 src='../../images/del.gif' alt='删除'></a>";
							objtd.innerHTML=text;
							objtr.appendChild(objtd);
						}
					}
				}
				tb.appendChild(objtr);
			}
}
function AnalysisPage(xhttp,xId,xjson){
	//alert("test");
			var tb=document.getElementById(xId);
			var trs=tb.getElementsByTagName('tr');
			for(var i=trs.length-1;i>=0;i--){
				//trs[i].removeNode(trs[i]); firefox浏览器不支持removeNode()
				trs[i].parentNode.removeChild(trs[i])
			}
	//alert(xhttp.responseText);
			myObj=JSON.parse(xhttp.responseText);
			for(x in myObj){
				var objtr=document.createElement('tr');
				objtr.setAttribute('bgcolor','#eeeeee');
				objtr.setAttribute('align','center');
				objtr.setAttribute('height','24');
				var id = myObj[x].analysis_id;//这一行比较特殊，指定该表的id
				for (y in xjson){
					if(y!='management' && y!='action' && y!='path'){
					var objtd=document.createElement('td');
					objtd.innerHTML=myObj[x][y];
					objtr.appendChild(objtd);
					}else{
						if(xjson.management=='管理' && y=='management'){
							var objtd=document.createElement('td');
							text="<a href='"+xjson.path+"look_"+xjson.action+".php?id="+id+"'><img border=0 src='../../images/info.png' alt='查看'></a>";
							text+="<a href='"+xjson.path+"edit_"+xjson.action+".php?id="+id+"'><img border=0 src='../../images/edit.gif' alt='编辑'></a>";
							text+="<a href='"+xjson.path+"del_"+xjson.action+".php?id="+id+"'><img border=0 src='../../images/del.gif' alt='删除'></a>";
							objtd.innerHTML=text;
							objtr.appendChild(objtd);
						}
					}
				}
				tb.appendChild(objtr);
			}
}
function GroupPage(xhttp,xId,xjson){
	//alert("test");
			var tb=document.getElementById(xId);
			var trs=tb.getElementsByTagName('tr');
			for(var i=trs.length-1;i>=0;i--){
				//trs[i].removeNode(trs[i]); firefox浏览器不支持removeNode()
				trs[i].parentNode.removeChild(trs[i])
			}
	//alert(xhttp.responseText);
			myObj=JSON.parse(xhttp.responseText);
			for(x in myObj){
				var objtr=document.createElement('tr');
				objtr.setAttribute('bgcolor','#eeeeee');
				objtr.setAttribute('align','center');
				objtr.setAttribute('height','24');
				var id = myObj[x].account_group_id;//这一行比较特殊，指定该表的id
				for (y in xjson){
					if(y!='management' && y!='action' && y!='path'){
					var objtd=document.createElement('td');
					objtd.innerHTML=myObj[x][y];
					objtr.appendChild(objtd);
					}else{
						if(xjson.management=='管理' && y=='management'){
							var objtd=document.createElement('td');
							text="<a href='"+xjson.path+"look_"+xjson.action+".php?id="+id+"'><img border=0 src='../../images/info.png' alt='查看'></a>";
							text+="<a href='"+xjson.path+"edit_"+xjson.action+".php?id="+id+"'><img border=0 src='../../images/edit.gif' alt='编辑'></a>";
							text+="<a href='"+xjson.path+"del_"+xjson.action+".php?id="+id+"'><img border=0 src='../../images/del.gif' alt='删除'></a>";
							objtd.innerHTML=text;
							objtr.appendChild(objtd);
						}
					}
				}
				tb.appendChild(objtr);
			}
}
function InventoryPage(xhttp,xId,xjson){
	//alert("test");
			var tb=document.getElementById(xId);
			var trs=tb.getElementsByTagName('tr');
			for(var i=trs.length-1;i>=0;i--){
				//trs[i].removeNode(trs[i]); firefox浏览器不支持removeNode()
				trs[i].parentNode.removeChild(trs[i])
			}
	//alert(xhttp.responseText);
			myObj=JSON.parse(xhttp.responseText);
			for(x in myObj){
				var objtr=document.createElement('tr');
				objtr.setAttribute('bgcolor','#eeeeee');
				objtr.setAttribute('align','center');
				objtr.setAttribute('height','24');
				var id = myObj[x].inventory_id;//这一行比较特殊，指定该表的id
				for (y in xjson){
					if(y!='management' && y!='action' && y!='path'){
					var objtd=document.createElement('td');
					objtd.innerHTML=myObj[x][y];
					objtr.appendChild(objtd);
					}else{
						if(xjson.management=='管理' && y=='management'){
							var objtd=document.createElement('td');
							text="<a href='"+xjson.path+"look_"+xjson.action+".php?id="+id+"'><img border=0 src='../../images/info.png' alt='查看'></a>";
							text+="<a href='"+xjson.path+"edit_"+xjson.action+".php?id="+id+"'><img border=0 src='../../images/edit.gif' alt='编辑'></a>";
							text+="<a href='"+xjson.path+"del_"+xjson.action+".php?id="+id+"'><img border=0 src='../../images/del.gif' alt='删除'></a>";
							objtd.innerHTML=text;
							objtr.appendChild(objtd);
						}
					}
				}
				tb.appendChild(objtr);
			}
}
function PurchasePage(xhttp,xId,xjson){
	//alert("test");
			var tb=document.getElementById(xId);
			var trs=tb.getElementsByTagName('tr');
			for(var i=trs.length-1;i>=0;i--){
				//trs[i].removeNode(trs[i]); firefox浏览器不支持removeNode()
				trs[i].parentNode.removeChild(trs[i])
			}
	//alert(xhttp.responseText);
			myObj=JSON.parse(xhttp.responseText);
			for(x in myObj){
				var objtr=document.createElement('tr');
				objtr.setAttribute('bgcolor','#eeeeee');
				objtr.setAttribute('align','center');
				objtr.setAttribute('height','24');
				var id = myObj[x].part_id;//这一行比较特殊，指定该表的id
				for (y in xjson){
					if(y!='management' && y!='action' && y!='path'){
					var objtd=document.createElement('td');
					objtd.innerHTML=myObj[x][y];
					objtr.appendChild(objtd);
					}else{
						if(xjson.management=='管理' && y=='management'){
							var objtd=document.createElement('td');
							text="<a href='"+xjson.path+"look_"+xjson.action+".php?id="+id+"'><img border=0 src='../../images/info.png' alt='查看'></a>";
							text+="<a href='"+xjson.path+"edit_"+xjson.action+".php?id="+id+"'><img border=0 src='../../images/edit.gif' alt='编辑'></a>";
							text+="<a href='"+xjson.path+"del_"+xjson.action+".php?id="+id+"'><img border=0 src='../../images/del.gif' alt='删除'></a>";
							objtd.innerHTML=text;
							objtr.appendChild(objtd);
						}
					}
				}
				tb.appendChild(objtr);
			}
}
function JobPage(xhttp,xId,xjson){
	//alert("test");
			var tb=document.getElementById(xId);
			var trs=tb.getElementsByTagName('tr');
			for(var i=trs.length-1;i>=0;i--){
				//trs[i].removeNode(trs[i]); firefox浏览器不支持removeNode()
				trs[i].parentNode.removeChild(trs[i])
			}
	//alert(xhttp.responseText);
			myObj=JSON.parse(xhttp.responseText);
			for(x in myObj){
				var objtr=document.createElement('tr');
				objtr.setAttribute('bgcolor','#eeeeee');
				objtr.setAttribute('align','center');
				objtr.setAttribute('height','24');
				var id = myObj[x].job_id;//这一行比较特殊，指定该表的id
				for (y in xjson){
					if(y!='management' && y!='action' && y!='path'){
					var objtd=document.createElement('td');
					objtd.innerHTML=myObj[x][y];
					objtr.appendChild(objtd);
					}else{
						if(xjson.management=='管理' && y=='management'){
							var objtd=document.createElement('td');
							text="<a href='"+xjson.path+"look_"+xjson.action+".php?id="+id+"'><img border=0 src='../../images/info.png' alt='查看'></a>";
							text+="<a href='"+xjson.path+"edit_"+xjson.action+".php?id="+id+"'><img border=0 src='../../images/edit.gif' alt='编辑'></a>";
							text+="<a href='"+xjson.path+"del_"+xjson.action+".php?id="+id+"'><img border=0 src='../../images/del.gif' alt='删除'></a>";
							objtd.innerHTML=text;
							objtr.appendChild(objtd);
						}
					}
				}
				tb.appendChild(objtr);
			}
}
function PointPage(xhttp,xId,xjson){
	//alert("test");
			var tb=document.getElementById(xId);
			var trs=tb.getElementsByTagName('tr');
			for(var i=trs.length-1;i>=0;i--){
				//trs[i].removeNode(trs[i]); firefox浏览器不支持removeNode()
				trs[i].parentNode.removeChild(trs[i])
			}
	//alert(xhttp.responseText);
			myObj=JSON.parse(xhttp.responseText);
			for(x in myObj){
				var objtr=document.createElement('tr');
				objtr.setAttribute('bgcolor','#eeeeee');
				objtr.setAttribute('align','center');
				objtr.setAttribute('height','24');
				var id = myObj[x].point_number;//这一行比较特殊，指定该表的id
				for (y in xjson){
					if(y!='management' && y!='action' && y!='path'){
					var objtd=document.createElement('td');
					objtd.innerHTML=myObj[x][y];
					objtr.appendChild(objtd);
					}else{
						if(xjson.management=='管理' && y=='management'){
							var objtd=document.createElement('td');
							text="<a href='"+xjson.path+"look_"+xjson.action+".php?id="+id+"'><img border=0 src='../../images/info.png' alt='查看'></a>";
							text+="<a href='"+xjson.path+"edit_"+xjson.action+".php?id="+id+"'><img border=0 src='../../images/edit.gif' alt='编辑'></a>";
							text+="<a href='"+xjson.path+"del_"+xjson.action+".php?id="+id+"'><img border=0 src='../../images/del.gif' alt='删除'></a>";
							objtd.innerHTML=text;
							objtr.appendChild(objtd);
						}
					}
				}
				tb.appendChild(objtr);
			}
}
function LedgerPage(xhttp,xId,xjson){
			var tb=document.getElementById(xId);
			var trs=tb.getElementsByTagName('tr');
			for(var i=trs.length-1;i>=0;i--){
				//trs[i].removeNode(trs[i]); firefox浏览器不支持removeNode()
				trs[i].parentNode.removeChild(trs[i])
			}
			myObj=JSON.parse(xhttp.responseText);
	//alert(xhttp.responseText);
			for(x in myObj){
				var objtr=document.createElement('tr');
				objtr.setAttribute('bgcolor','#eeeeee');
				objtr.setAttribute('align','center');
				objtr.setAttribute('height','24');
				var id = myObj[x].account_id;//这一行比较特殊，指定该表的id
				for (y in xjson){
					if(y!='management' && y!='action' && y!='path'){
					var objtd=document.createElement('td');
					objtd.innerHTML=myObj[x][y];
					objtr.appendChild(objtd);
					}else{
						if(xjson.management=='管理' && y=='management'){
							var objtd=document.createElement('td');
							text="<a href='"+xjson.path+"look_"+xjson.action+".php?id="+id+"'><img border=0 src='../../images/info.png' alt='查看'></a>";
							text+="<a href='"+xjson.path+"edit_"+xjson.action+".php?id="+id+"'><img border=0 src='../../images/edit.gif' alt='编辑'></a>";
							text+="<a href='"+xjson.path+"del_"+xjson.action+".php?id="+id+"'><img border=0 src='../../images/del.gif' alt='删除'></a>";
							objtd.innerHTML=text;
							objtr.appendChild(objtd);
						}
					}
				}
				tb.appendChild(objtr);
			}
}
function DocumentPage(xhttp,xId,xjson){
			var tb=document.getElementById(xId);
			var trs=tb.getElementsByTagName('tr');
			for(var i=trs.length-1;i>=0;i--){
				//trs[i].removeNode(trs[i]); firefox浏览器不支持removeNode()
				trs[i].parentNode.removeChild(trs[i])
			}
			myObj=JSON.parse(xhttp.responseText);
			for(x in myObj){
				var objtr=document.createElement('tr');
				objtr.setAttribute('bgcolor','#eeeeee');
				objtr.setAttribute('align','center');
				objtr.setAttribute('height','24');
				var id = myObj[x].instruction_id;//这一行比较特殊，指定该表的id
				for (y in xjson){
					if(y!='management' && y!='action' && y!='path'){
					var objtd=document.createElement('td');
					objtd.innerHTML=myObj[x][y];
					objtr.appendChild(objtd);
					}else{
						if(xjson.management=='管理' && y=='management'){
							var objtd=document.createElement('td');
							text="<a href='"+xjson.path+"look_"+xjson.action+".php?id="+id+"'><img border=0 src='../../images/info.png' alt='查看'></a>";
							text+="<a href='"+xjson.path+"edit_"+xjson.action+".php?id="+id+"'><img border=0 src='../../images/edit.gif' alt='编辑'></a>";
							text+="<a href='"+xjson.path+"del_"+xjson.action+".php?id="+id+"'><img border=0 src='../../images/del.gif' alt='删除'></a>";
							objtd.innerHTML=text;
							objtr.appendChild(objtd);
						}
					}
				}
				tb.appendChild(objtr);
			}
}
function goodsPage(xhttp,xId,xjson){
			var tb=document.getElementById(xId);
			var trs=tb.getElementsByTagName('tr');
			for(var i=trs.length-1;i>=0;i--){
				//trs[i].removeNode(trs[i]); firefox浏览器不支持removeNode()
				trs[i].parentNode.removeChild(trs[i])
			}
			myObj=JSON.parse(xhttp.responseText);
	//alert(xhttp.responseText);
			for(x in myObj){
				var objtr=document.createElement('tr');
				objtr.setAttribute('bgcolor','#eeeeee');
				objtr.setAttribute('align','center');
				objtr.setAttribute('height','24');
				var id = myObj[x].goods_id;//这一行比较特殊，指定该表的id
				for (y in xjson){
					if(y!='management' && y!='action' && y!='path'){
					var objtd=document.createElement('td');
					objtd.innerHTML=myObj[x][y];
					objtr.appendChild(objtd);
					}else{
						if(xjson.management=='管理' && y=='management'){
							var objtd=document.createElement('td');
							text="<a href='"+xjson.path+"look_"+xjson.action+".php?id="+id+"'><img border=0 src='../../images/info.png' alt='查看'></a>";
							text+="<a href='"+xjson.path+"edit_"+xjson.action+".php?id="+id+"'><img border=0 src='../../images/edit.gif' alt='编辑'></a>";
							text+="<a href='"+xjson.path+"del_"+xjson.action+".php?id="+id+"'><img border=0 src='../../images/del.gif' alt='删除'></a>";
							objtd.innerHTML=text;
							objtr.appendChild(objtd);
						}
					}
				}
				tb.appendChild(objtr);
			}
}
function workticketPage(xhttp,xId,xjson){
			var tb=document.getElementById(xId);
			var trs=tb.getElementsByTagName('tr');
			//alert("test");
			for(var i=trs.length-1;i>=0;i--){
				//trs[i].removeNode(trs[i]); firefox浏览器不支持removeNode()
				trs[i].parentNode.removeChild(trs[i])
			}
			myObj=JSON.parse(xhttp.responseText);
			for(x in myObj){
				var objtr=document.createElement('tr');
				objtr.setAttribute('bgcolor','#eeeeee');
				objtr.setAttribute('align','center');
				objtr.setAttribute('height','24');
				var id = myObj[x].work_ticket_id;//这一行比较特殊，指定该表的id
				for (y in xjson){
					if(y!='management' && y!='action' && y!='path'){
					var objtd=document.createElement('td');
					objtd.innerHTML=myObj[x][y];
					objtr.appendChild(objtd);
					}else{
						if(xjson.management=='管理' && y=='management'){
							var objtd=document.createElement('td');
							text="<a href='"+xjson.path+"look_"+xjson.action+".php?id="+id+"'><img border=0 src='../../images/info.png' alt='查看'></a>";
							text+="<a href='"+xjson.path+"edit_"+xjson.action+".php?id="+id+"'><img border=0 src='../../images/edit.gif' alt='编辑'></a>";
							text+="<a href='"+xjson.path+"del_"+xjson.action+".php?id="+id+"'><img border=0 src='../../images/del.gif' alt='删除'></a>";
							objtd.innerHTML=text;
							objtr.appendChild(objtd);
						}
					}
				}
				tb.appendChild(objtr);
			}
}
function defectPage(xhttp,xId,xjson){
			var tb=document.getElementById(xId);
			var trs=tb.getElementsByTagName('tr');
			for(var i=trs.length-1;i>=0;i--){
				//trs[i].removeNode(trs[i]); firefox浏览器不支持removeNode()
				trs[i].parentNode.removeChild(trs[i])
			}
			myObj=JSON.parse(xhttp.responseText);
			for(x in myObj){
				var objtr=document.createElement('tr');
				objtr.setAttribute('bgcolor','#eeeeee');
				objtr.setAttribute('align','center');
				objtr.setAttribute('height','24');
				var id = myObj[x].defect_id;//这一行比较特殊，指定该表的id
				for (y in xjson){
					if(y!='management' && y!='action' && y!='path'){
					var objtd=document.createElement('td');
					objtd.innerHTML=myObj[x][y];
					objtr.appendChild(objtd);
					}else{
						if(xjson.management=='管理' && y=='management'){
							var objtd=document.createElement('td');
							text="<a href='"+xjson.path+"look_"+xjson.action+".php?id="+id+"'><img border=0 src='../../images/info.png' alt='查看'></a>";
							text+="<a href='"+xjson.path+"edit_"+xjson.action+".php?id="+id+"'><img border=0 src='../../images/edit.gif' alt='编辑'></a>";
							text+="<a href='"+xjson.path+"del_"+xjson.action+".php?id="+id+"'><img border=0 src='../../images/del.gif' alt='删除'></a>";
							objtd.innerHTML=text;
							objtr.appendChild(objtd);
						}
					}
				}
				tb.appendChild(objtr);
}
}
function check(obj,info,jsonObj){
	//var xmlObj,jsonObj;
	var xmlObj;
	//jsonObj = {"table":"tb_area","key":"area_system","value":obj,"option_id":"area_id","option_value":"area_content"};
	jsonObj.value = obj;
	//alert(jsonObj);
	dbParam = JSON.stringify(jsonObj);
	if(window.XMLHttpRequest){
		xmlObj=new XMLHttpRequest();
	}else if(window.ActiveXObject){
		xmlObj=new ActiveXObject("Microsoft.XMLHttp");
		
	}else{
		alert('wrong');
	}	   
	//alert('test');


	var url = "../../lib/check.php?id="+dbParam+"&time="+new Date().getTime();
	xmlObj.onreadystatechange=function(){
		if(xmlObj.readyState == 4){
			myObj=JSON.parse(xmlObj.responseText);
			$(info).options.length  =  0;
			for(x in myObj){
				var opts = new Option(myObj[x][jsonObj.option_value],myObj[x][jsonObj.option_id]);	
				$(info).add(opts);
			}
		}
	}
	xmlObj.open('get',url,true);
	xmlObj.send(null);
	}

function Page(str,tbsId,sqlId,pageId,pageend,pagesize,pageFunction,tbJson){
	var xmlObj;
	if(window.XMLHttpRequest){
		xmlObj=new XMLHttpRequest();
	}else if(window.ActiveXObject){
		xmlObj=new ActiveXObject("Microsoft.XMLHttp");
		
	}else{
		alert('wrong');
	}	   
	switch(str){
		case "next":
		if(document.getElementById(pageId).innerHTML==pageend){
			window.alert("您已处于尾页");
			return;
		}else{
			str=++document.getElementById(pageId).innerHTML;
			page_check_sql = document.getElementById(sqlId).innerHTML + (str-1)*pagesize + ','+pagesize;
		//alert(page_check_sql);
		}
			break;
		case "front":
		if(document.getElementById(pageId).innerHTML==1){
			window.alert("您已处于首页");
			return;
		}else{
			str=--document.getElementById(pageId).innerHTML;
			page_check_sql = document.getElementById(sqlId).innerHTML + (str-1)*pagesize + ','+pagesize;
		}
			break;
		case "head":
			page_check_sql = document.getElementById(sqlId).innerHTML + 0 + ','+pagesize;
			document.getElementById(pageId).innerHTML=1;
			break;
		case "end":
			endpage=pageend-1;
			page_check_sql = document.getElementById(sqlId).innerHTML + endpage*pagesize + ','+pagesize;
			document.getElementById(pageId).innerHTML=pageend;
			//alert("尾页");
			break;
	}
	//alert(page_check_sql);
	var url="../../lib/page_server.php?sql="+page_check_sql+"&time="+new Date().getTime();
	xmlObj.onreadystatechange=function(){
	//	if(xmlObj.readyState==4){
		if(this.readyState==4){
			pageFunction(this,tbsId,tbJson);
			}

	}
	xmlObj.open('get',url);
	xmlObj.send();
}
function $(obj){
		return document.getElementById(obj);
	}
