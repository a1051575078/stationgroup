// JavaScript Document
/*************************************************************************/
/*文件名称: Hj.easyRead.history.js
/*文件版本： v1.0
/*文件描述: 页面后退  history
/*
/************************************************************************/
Hj.easyRead.history=function(){
		return new Object();
};

Hj.easyRead.history.init=function(){
	//以下是参数设置
	Hj.easyRead.history.textBackIdBox="historyBackControl"; //开关 ID-Box
	Hj.easyRead.history.textBackId="historyBackControlText"; //开关 ID
	
	Hj.easyRead.history.isOpened=true;
	
	//初始化按钮状态 
	if(Hj.easyRead.history.isOpened){
		$("#"+Hj.easyRead.history.textBackId).click(function(e) {
			Hj.easyRead.history.back();
		});		
	}	
};

Hj.easyRead.history.back=function(){
	if(Hj.easyRead.history.isOpened){
		history.back();
	}
};

//调用初始化，可拿出来  
$(document).ready(function(e) {
    Hj.easyRead.history.init();
});