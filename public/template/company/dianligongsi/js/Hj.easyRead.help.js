// JavaScript Document
/*************************************************************************/
/*文件名称：Hj.easyRead.help.js
/*文件版本：1.0
/*文件描述：帮助文档 text
/*
/************************************************************************/
Hj.easyRead.help=function(){
		return new Object();
};

Hj.easyRead.help.init=function(){
	//以下是参数设置
	Hj.easyRead.help.textIdBox="helpControl"; //开关 ID-Box
	Hj.easyRead.help.textId="helpControlText"; //开关 ID	
	
	Hj.easyRead.help.isOpened=true;
	
	if(Hj.easyRead.help.isOpened){
		$("#"+Hj.easyRead.help.textId).click(function(e) {
			Hj.easyRead.help.openHelp();
		});
		//$("#"+Hj.easyRead.line.textId).text(Hj.easyRead.line.openText);
		//$("#"+Hj.easyRead.line.textId).attr("title",Hj.easyRead.line.openText);
	}	
};

Hj.easyRead.help.openHelp = function(e){
	//打开无障碍浏览的帮忙页面
	window.open("/component/html/easyread_help.html","无障碍阅读帮助页面");
};

//调用初始化， 可拿出来
$(document).ready(function(e) {
    Hj.easyRead.help.init();
});