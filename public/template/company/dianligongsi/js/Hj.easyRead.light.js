// JavaScript Document
/*************************************************************************/
/*******************************************************************************
 * 文件名称: Hj.easyRead.light.js /*文件版本: v1.0 /*文件描述: 高对比度 light /* /
 ******************************************************************************/
Hj.easyRead.light = function() {
	return new Object();
};
var bgcolorstate = 0;
Hj.easyRead.light.init = function() {
	// 以下是参数设置
	Hj.easyRead.light.frontColor = "#FFF"; // 文字颜色 白色
	Hj.easyRead.light.blackColor = "#000"; // 背景颜色 黑色
	Hj.easyRead.light.blueColor = "#00F"; // 背景颜色 蓝色
	Hj.easyRead.light.historyColorControlTextId = "historyColorControlText"; // 原色
	Hj.easyRead.light.blackControlTextId = "blackControlText"; // 黑色
	Hj.easyRead.light.blueControlTextId = "blueControlText"; // 蓝色
	
	Hj.easyRead.light.isOpened = false;

	// 初始化按钮状态
	$("#" + Hj.easyRead.light.historyColorControlTextId).click(function(e) {
		bgcolorstate = 0;
		Hj.easyRead.light.closeLight();
	});

	$("#" + Hj.easyRead.light.blackControlTextId).click(function(e) {
		Hj.easyRead.light.openBlackLight();
	});
	$("#" + Hj.easyRead.light.blueControlTextId).click(function(e) {
		Hj.easyRead.light.openBlueLight();
	});
}

// 黑色高对比度

Hj.easyRead.light.openBlackLight = function() {
	bgcolorstate=1;
	// 创建线条
	if (Hj.easyRead.light.isOpened) {
		return;
	}
	// 高亮页面
	$("#" + Hj.easyRead.controlBox + " *").each(
			function(index, element) {
				$easyr = $("#easyread").find("*");
				$(this).not($easyr).css("background-color",
						Hj.easyRead.light.blackColor);
				$(this).not($easyr).css("color", Hj.easyRead.light.frontColor);
			})
	
	$("#" + Hj.easyRead.controlBox).each(function(index, element) {
		$(this).not(".nav").css("background-color", Hj.easyRead.light.blackColor);
		$(this).not(".nav").css("color", Hj.easyRead.light.frontColor);
	});

	// 找到包含背景图片的div，并将其设置为无效路径 by fangke
	$("div").each(
			function(index, element) {
				if ($(this).attr("style") != null
						&& $(this).attr("style").indexOf("jpg") > 0) {
					var imgurl = $(this).attr("style").replace("jpg", "noimg");
					$(this).attr("style", imgurl);
				}
			});
	
	//去除标题栏的对比度样式 by fangke
	$("h1").attr("style","none");
	$("h3").attr("style","none");
	$("h3 b").attr("style","none");
	
	//去除logo新加的对比度样式 by fangke
	$(".gwlogo,.gwlogo a,.gwlogo img").attr("style","none");
	$(".sflogo,.sflogo a,.sflogo img").attr("style","none");
	
	//去除各类导航菜单新加的对比度样式 by fangke
	$(".tab,.tab li").attr("style","none");
	$(".swfw_tab li").attr("style","none");	
	$(".header").attr("style","width: 960px");
	$(".header").find("*").attr("style","none");
	
	//去除互动中心的黑底样式避免背景图片被覆盖 by fangke
	$(".interactive").find("*").attr("style","none");
	
	//营业网点表头和按钮样式还原
	$(".zjyywdfy th").css("color","#545454");
	$(".zjyywdfy span").css("color","#545454");
	
	//去除所有按钮类加载样式
	$("input").attr("style","none");
	
	$(".outlets table .xx").attr("style","none");
	if(document.getElementById("panelControlText").getAttribute('title')=="退出纯文本通道"){
		$('a').css("color","white");
	}
};

// 蓝色高对比度
Hj.easyRead.light.openBlueLight = function() {
	bgcolorstate=1;
	// 创建线条
	if (Hj.easyRead.light.isOpened) {
		return;
	}

	// 高亮页面
	$("#" + Hj.easyRead.controlBox + " *").each(
			function(index, element) {
				$easyr = $("#easyread").find("*");
				$(this).not($easyr).css("background-color",
						Hj.easyRead.light.blueColor);
				$(this).not($easyr).css("color", Hj.easyRead.light.frontColor);
			});
	$("#" + Hj.easyRead.controlBox).each(function(index, element) {
		$(this).css("background-color", Hj.easyRead.light.blueColor);
		$(this).css("color", Hj.easyRead.light.frontColor);
//		$(".nav li a").css("background-image", "none");
	});
	// 找到包含背景图片的div，并将其设置为无效路径 by fangke
	$("div").each(
			function(index, element) {
				if ($(this).attr("style") != null
						&& $(this).attr("style").indexOf("jpg") > 0) {
					var imgurl = $(this).attr("style").replace("jpg", "noimg");
					$(this).attr("style", imgurl);
				}
			});
	
	//去除标题栏的对比度样式 by fangke
	$("h1").attr("style","none");
	$("h3").attr("style","none");
	$("h3 b").attr("style","none");
	
	//去除logo新加的对比度样式 by fangke
	$(".gwlogo,.gwlogo a,.gwlogo img").attr("style","none");
	$(".sflogo,.sflogo a,.sflogo img").attr("style","none");
	
	//去除各类导航菜单新加的对比度样式 by fangke
	$(".tab,.tab li").attr("style","none");
	$(".swfw_tab li").attr("style","none");	
	$(".header").attr("style","width: 960px");
	$(".header").find("*").attr("style","none");
	
	//去除互动中心的黑底样式避免背景图片被覆盖by fangke
	$(".interactive").find("*").attr("style","none");
	
	//营业网点表头和按钮样式还原
	$(".zjyywdfy th").css("color","#545454");
	$(".zjyywdfy span").css("color","#545454");

	//去除所有按钮类加载样式
	$("input").attr("style","none");
	
	$(".outlets table .xx").attr("style","none");
	
	if(document.getElementById("panelControlText").getAttribute('title')=="退出纯文本通道"){
		$('a').css("color","white");
	}
};

Hj.easyRead.light.closeLight = function() {
	// 高亮还原
	$("#" + Hj.easyRead.controlBox + " *").each(function(index, element) {
		$(this).css("background-color", "");
		$(this).css("color", "");
	});
	$("#" + Hj.easyRead.controlBox).each(function(index, element) {
		$(this).css("background-color", "");
		$(this).css("color", "");
		$(".nav li a").attr("style","");
	});

	// 找到背景图片的无效路径并改为正确路径 by fangke
	$("div").each(
			function(index, element) {
				if ($(this).attr("style") != null
						&& $(this).attr("style").indexOf("noimg") > 0) {
					var imgurl = $(this).attr("style").replace("noimg", "jpg");
					$(this).attr("style", imgurl);
				}
			});

};

// 调用初始化 ， 可拿出来
$(document).ready(function(e) {
	Hj.easyRead.light.init();
});