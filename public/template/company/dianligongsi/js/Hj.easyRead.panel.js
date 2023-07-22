// JavaScript Document
/*************************************************************************/
/*文件名称: Hj.easyRead.panel.js
/*文件版本: v1.0
/*文件描述: 显示 panel
/*
/************************************************************************/
Hj.easyRead.panel=function(){
		return new Object();
};

Hj.easyRead.panel.init=function(){
	//以下是参数设置
	Hj.easyRead.panel.boxId="panelControl"; //开关 ID-Box
	Hj.easyRead.panel.textId="panelControlText"; //开关 ID
	//Hj.easyRead.panel.closeText="开启显示"; //关闭状态提示
	//Hj.easyRead.panel.openText="关闭显示"; //开启状态提示
	//Hj.easyRead.panel.hotKeyOpen="Alt+P"; //快捷键 
	Hj.easyRead.panel.isOpened=false;
	
	//$("#"+Hj.easyRead.panel.boxId).css("display","block");
	//初始化按钮状态
	if(Hj.easyRead.panel.isOpened){
		$("#"+Hj.easyRead.panel.textId).click(function(e) {
			Hj.easyRead.panel.stopListen();
		});
		//$("#"+Hj.easyRead.panel.textId).text(Hj.easyRead.panel.openText);
		//$("#"+Hj.easyRead.panel.textId).attr("title",Hj.easyRead.panel.openText);
	}else{
		$("#"+Hj.easyRead.panel.textId).click(function(e) {
			Hj.easyRead.panel.startListen();
		});
		//$("#"+Hj.easyRead.panel.textId).text(Hj.easyRead.panel.closeText);
		//$("#"+Hj.easyRead.panel.textId).attr("title",Hj.easyRead.panel.closeText);
	}
	
	//快捷键注册
	/*jQuery.hotkeys.add(Hj.easyRead.panel.hotKeyOpen, function (){
		if(Hj.easyRead.panel.isOpened){
			Hj.easyRead.panel.stopListen();
		}else{
			Hj.easyRead.panel.startListen();
		}
	});*/
}

Hj.easyRead.panel.changepanel=function(e){
	$("#Hj-EasyRead-Pop-Title").css("top",($(window).height() + $(window).scrollTop()-126)+"px");
}

//图片及框架替换函数 将图片替换为文字。将框架内容抓取为文本。
var aAllAlt = new Array;
var aAlliframeText = new Array;
function changeImage() {
    var aAllImage = document.getElementsByTagName("img");
    //图片
    for (i = 0; i < aAllImage.length; i++) {
        aAllImage[i].setAttribute("src", "");      
    }
    newCount = aAllImage.length;
    //提取所有图片的alt值;存放到aAllAlt的数组中.
    for (i = 0; i < newCount; i++) {
        aAllAlt[i] = document.createTextNode(aAllImage[i].getAttribute("alt"));
    }
    //替换所有的img;
    for (i = 0; i < newCount; i++) {
        var eSpan = document.createElement("span");
        aAllImage[0].parentNode.replaceChild(eSpan, aAllImage[0]);
    }
    
    //无障碍工具条鼠标移入移出样式改变 by fangke
    $(".addwzawrap div").each(function(){
    	//$(this).attr("style","color:#0066cc; text-decoration:underline");
    	//$(this).attr("onmouseover", "this.style.color='#800080';");
    	//$(this).attr("onmouseout", "this.style.color='#0066cc';");
    	$(this).attr("style","text-decoration:underline");
    	//$(".addfzx_hover, .addvoice, .addvoice_hover, .adddebar, .adddebar_hover, .addhelp, .addhelp_hover").attr("style","none");
    	//$("#helpControlText").attr("style","text-decoration:underline");
    });
    $("#switch").attr("style","text-decoration:underline");
}

Hj.easyRead.panel.startListen=function(){
	if(Hj.easyRead.panel.isOpened){
		return;
	}
	//$("img").each(function(){
	//	$(this).fadeOut();
	//});
	
	if(bgcolorstate==1){
		$('a').css("color","white");	
	}
	
	changeImage();
	$('body').css("font-size","15px");
	$('div').css("width","100%");
	$('div').css("height","100%");
	$('div').css("background-image","");
	$('div').css("text-align","");
	$('ul').css("list-style","none");
	$("#panelControlText").html("退出纯文本通道");
	$("#lineControlText2").attr("style","display:none");
	$("#viewArrowH").remove();
	$("#viewArrowV").remove();
	document.getElementById ("panelControlText").setAttribute("title","退出纯文本通道");
	var aAllStyle = document.getElementsByTagName("link");
	for (i = 0; i < aAllStyle.length; i++) {
        aAllStyle[i].setAttribute("href", "");
        kqtrue = false;
    }
	
	$("#"+Hj.easyRead.panel.textId).unbind("click");
	$("#"+Hj.easyRead.panel.textId).click(function(e) {
        Hj.easyRead.panel.stopListen();
    });
	$(".nav .btn").attr("value","搜索");
	Hj.easyRead.panel.isOpened=true;
	//$("#Hj-EasyRead-Pop-Title").css("top",($(window).height() + $(window).scrollTop()-106)+"px");
	
	//try{e =new MouseEvent();Hj.easyRead.panel.changepanel(e);}catch(e){}
	
};
Hj.easyRead.panel.stopListen=function(){
	//$("img").each(function(){
	//	$(this).fadeIn();
	//});
	window.location.reload();
	/*$("#Hj-EasyRead-Pop-Title").remove();
	$(window).unbind("scroll",Hj.easyRead.panel.changepanel);
	$("#"+Hj.easyRead.panel.textId).text(Hj.easyRead.panel.closeText);
	$("#"+Hj.easyRead.panel.textId).attr("title",Hj.easyRead.panel.closeText);*/
	$("#"+Hj.easyRead.panel.textId).unbind("click");
	$("#"+Hj.easyRead.panel.textId).click(function(e) {
        Hj.easyRead.panel.startListen();
    });
	$(".nav .btn").attr("value","");
	Hj.easyRead.panel.isOpened=false;
};

//调用初始化， 可拿出来
$(document).ready(function(e) {
    Hj.easyRead.panel.init();
});
