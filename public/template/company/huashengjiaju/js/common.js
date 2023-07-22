$(function () {
	$('#sliders > li').soChange({
		thumbObj:'#sliderthumbs > li',
		thumbNowClass:'current',
		changeTime: 4000
	});
	
	$('#sliderthumbsbg').css('opacity', .15);
	
	$('#N_item6, #webmap, #picUL img').hover(
		function () {
			$(this).addClass('current');
		}, function () {
			$(this).removeClass('current');
		}
	);
	
	jQuery.extend({
		FlashFont:function(obj){
			//$(obj).css("color",$(obj).css("color")=="#297eae"?"#f00":"#297eae");
			//$(obj).css("color",$(obj).css("color")=="rgb(41, 126, 174)"?"rgb(255, 0, 0)":"rgb(41, 126, 174)");
			$(obj).css("color",$(obj).css("color")=="red"?"black":"red");
		}
	});
	setInterval("$.FlashFont('#top > .tel')",750);
});
function addFavourite() {
	if (document.all) {
			window.external.addFavorite(document.URL,document.title);
	} else if (window.sidebar) {
		window.sidebar.addPanel(document.title,document.URL,"");
	}
}


//设为首页
function setHomepage() {
	if (document.all) {
		document.body.style.behavior='url(#default#homepage)';
		document.body.setHomePage(document.URL);
	}else if (window.sidebar) {
				if(window.netscape) {
			 try{
					netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");
			 }catch (e){
										alert( "该操作被浏览器拒绝，如果想启用该功能，请在地址栏内输入 about:config,然后将项 signed.applets.codebase_principal_support 值该为true" );
			 }
				}
		var prefs = Components.classes['@mozilla.org/preferences-service;1'].getService(Components. interfaces.nsIPrefBranch);
		prefs.setCharPref('browser.startup.homepage',document.URL);
		}
}