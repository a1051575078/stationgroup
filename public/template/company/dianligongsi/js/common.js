function openWin(name,url,v_width,v_height) 
{ 
	var name=name;
	var url= url;
	var v_width =v_width;
	var v_height = v_height;
	var v_left = (window.screen.availWidth - v_width) / 2;
	var v_top = (window.screen.availHeight - v_height) / 2;
	var para = "top=" + v_top + ",left=" + v_left + ",width=" + v_width +",height=" + v_height + ",alwaysRaised=yes,scrollbars=yes,resizable=no,status=yes,toolbar=no,menubar=no,titlebar=no"; 
	window.open(url, name, para); 

//showModalDialog
	//showModelessDialog(url,window1,"status:false;dialogWidth:"+v_width+"px;dialogHeight:"+v_height+"px;edge:Raised;center: Yes; help: No; resizable: yes; status: No");
}
//获得checkbox或者option类型的表单域的内容
function getOptionVal(fieldName){
	var opts1=document.getElementsByName(fieldName)
	if(opts1!=null){
		for(i=0;i<opts1.length;i++){
			if(opts1[i].checked){
				//alert(opts1(i))
				return opts1[i].value;
			}
		}
	}else{
		return "";
	}
	return "";
}

//设置checkbox或者option类型的表单域
function setOptionVal(fieldName,fieldValue){
	var opts1=document.getElementsByName(fieldName)
	var i;
	if(opts1!=null){
		for(i=0;i<opts1.length;i++){
			if(opts1[i].value==fieldValue){
				opts1[i].checked=true;
				return true;
			}
		}
	}else{
		return false;
	}
	return false;
}
//清除checkbox或者option类型的表单域内容
function clearOptionVal(fieldName){
	var opts1=document.getElementsByName(fieldName)
	var i;
	if(opts1!=null){
		for(i=0;i<opts1.length;i++){
			opts1[i].checked=false;
		}
		return true;
	}else{
		return false;
	}
	return false;
}

function showDialogInner(id,width,height){
	$("#"+id).dialog({
		autoOpen: false,
		bgiframe: false,
		closeOnEscape: true,
		draggable: true,
		width: width,
		height: height,
		hide: 'clip',
		show: 'clip',
		modal: true,
		resizable: true
	}).dialog("open");
}
function showDialogOuter(id,title,url,width,height,type){
	if (type == 'iframe') {
		$("#"+id).remove();
		var iframeWidth=width-30;
		var iframeHeight=height-30;
		var divContent="<div id='"+id+"' title='"+title+"' style='width:"+iframeWidth+"px;height:"+iframeHeight+"px'><iframe id='iframe-"+id+"' src='"+url+"' frameborder='0' style='visibility:inherit;width:100%;height:100%;'></iframe></div>";
		$(document.body).append(divContent);
		$("#"+id).dialog({
			autoOpen: false,
			bgiframe: false,
			closeOnEscape: true,
			draggable: true,
			width: width,
			height: height,
			hide: 'clip',
			show: 'clip',
			modal: true,
			resizable: true
		}).dialog("open");
		//$("#"+id).dialog("open");
	}else if (type == 'ajax') {
		$("#"+id).remove();
		var divContent="<div id='"+id+"' title='"+title+"'></div>";
		$(document.body).append(divContent);
		$("#"+id).dialog({
			autoOpen: false,
			bgiframe: false,
			closeOnEscape: true,
			draggable: true,
			width: width,
			height: height,
			hide: 'clip',
			show: 'clip',
			modal: true,
			resizable: true
		}).load(url, function() {
			$(this).dialog("open");
		});
	}
}

function Dialog(obj){
	if(!obj.id){
		alert("错误的Dialog ID！");
		return;
	}
	this.id=obj.id;
	this.type=obj.type?obj.type:"iframe";
	this.win=obj.win;
	this.width=obj.width?obj.width:400;
	this.height=obj.height?obj.height:200;
	this.title=obj.title?obj.title:"对话框";
	this.url=obj.url?obj.url:"#";
	this.message=obj.message?obj.message:"";
	this.resizable=obj.resizable?obj.resizable:false;
	this.buttons=obj.buttons?obj.buttons:{};
	this.beforeclose=obj.beforeclose?obj.beforeclose:function(event, ui) {return true;}
	this.close=obj.close?obj.close:function(event, ui) {return true;}
	window.top.$("#"+this.id).remove();
	if(this.type!="inline"){
		var iframeWidth=this.width-30;
		var iframeHeight=this.height-30;
		var divContent="<div id='"+this.id+"'></div>";
		$(window.top.document.body).append(divContent);
	}
	//window.top.$("#"+this.id).hide();
	window.top.$("#"+this.id).dialog({
			title: this.title,
			autoOpen: false,
			bgiframe: false,
			closeOnEscape: true,
			draggable: true,
			width: this.width,
			height: this.height,
			hide1: 'clip',
			show1: 'clip',
			modal: true,
			resizable: this.resizable,
			buttons:this.buttons,
			beforeclose:this.beforeclose,
			close:this.close
		});
}

Dialog.prototype.showWindow = function() {
}

Dialog.prototype.show = function(){
	if(this.type=="iframe"){
		window.top.$("#"+this.id).html("<iframe id='iframe_"+this.id+"' name='iframe_"+this.id+"' src='"+this.url+"' frameborder='0' style='visibility:inherit;width:100%;height:100%;'></iframe>");
	}else if(this.type=="ajax"){
		window.top.$("#"+this.id).load(this.url);
	}else if(this.type=="alert"){
		window.top.$("#"+this.id).html(this.message);
	}
	window.top.$('#'+this.id).dialog('open');
};
Dialog.prototype.close = function() {
};
Dialog.close = function(a) {
};
Dialog.getInstance = function(c) {
/*
var a = $E.getTopLevelWindow();
var b = a.$("_DialogFrame_" + c);
if (!b) {
	return null
}
return b.DialogInstance
*/
};
Dialog.AlertNo = 0;
Dialog.alert = function(msg,func,w,h){
	msg=msg.replace(/\n/g,"<br>");
	var id="_DialogAlert"+Dialog.AlertNo++;
	var dialog=new Dialog({
		type:"alert",
		id:id,
		message:msg,
		title:"系统提示",
		width: w?w:300,
		height: h?h:120,
		buttons: {
			OK: function() {
				//$(this).dialog('close');
				//document.all.ddd.value="aaa";
				window.top.$("#"+id).dialog('close');
				if(func){
					func();
				}
			}
		}
	});
	dialog.show();
}
Dialog.confirm = function(b, o, n, l, d) {
}
Dialog.wait = function(c) {
	var a = [];
	Dialog.alert(c, null);
	Dialog.WaitID = setTimeout(Dialog.waitAction, 1000);
	var b = Dialog.getInstance("_DialogAlert" + (Dialog.AlertNo - 1));
	b.CancelButton.disable();
	b.CancelButton.onclick = function() {
	};
	Dialog.WaitSecondCount = 0
};
Dialog.waitAction = function() {
	var a = Dialog.getInstance("_DialogAlert" + (Dialog.AlertNo - 1));
	Dialog.WaitSecondCount++;
	a.CancelButton.value = "请等待(" + Dialog.WaitSecondCount + ")...";
	Dialog.WaitID = setTimeout(Dialog.waitAction, 1000)
}
