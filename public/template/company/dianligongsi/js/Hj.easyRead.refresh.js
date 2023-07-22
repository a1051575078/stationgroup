// JavaScript Document
/*************************************************************************/
/*文件名称: Hj.easyRead.refresh.js
/*文件版本： v1.0
/*文件描述: 页面刷新 refresh
/*
/************************************************************************/
Hj.easyRead.refresh=function(){
		return new Object();
};

Hj.easyRead.refresh.init=function(){
	//以下是参数设置
	Hj.easyRead.refresh.textIdBox="refreshControl"; //开关 ID-Box
	Hj.easyRead.refresh.textId="refreshControlText"; //开关 ID
	Hj.easyRead.refresh.Text="刷新"; //
	Hj.easyRead.refresh.hotKeyOpen="Ctrl+R"; //快捷键
	Hj.easyRead.refresh.isOpened=true;
	
	//初始化按钮状态 
	if(Hj.easyRead.refresh.isOpened){
		$("#"+Hj.easyRead.refresh.textId).click(function(e) {
			Hj.easyRead.refresh.refresh();
		});
		//$("#easyread").css("display","block");
		
		//$("#"+Hj.easyRead.refresh.textIdBox).css("display","none");
		
		
		//$("#easyread").css("display","block");
		//$("#"+Hj.easyRead.refresh.textId).attr("title",Hj.easyRead.refresh.Text);
	}
	
	//快捷键设置
	/*jQuery.hotkeys.add(Hj.easyRead.refresh.hotKeyOpen, function (){
		if(Hj.easyRead.refresh.isOpened){
			Hj.easyRead.refresh.refresh();
		}
	});*/
}

Hj.easyRead.refresh.refresh=function(){
	if(Hj.easyRead.refresh.isOpened){
		
		document.location.href=document.location.href;
		
			
		
	}
};

//调用初始化，可拿出来  
$(document).ready(function(e) {
    Hj.easyRead.refresh.init();
});