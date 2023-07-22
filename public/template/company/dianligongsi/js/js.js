//2020-4-1 增加首页专题图片两张。
$(document).ready(function (){
	if($('.sitenav').length>0){
		var img_h=130;//图片高度px
		var img_1="/template/company/dianligongsi/img/20200405.jpg";//图片1路径
		var url_1="#here";//链接地址1

		var html_1='<div style="position:absolute; height:'+img_h+'px; left:50%; top:377px; margin:0 0 0 -480px;"><a href="'+url_1+'"><img style="float:left; display:block;" src="'+img_1+'" width="960" height="'+img_h+'" /></a></div>';
		$('.announcement').parent().after('<div style="height:'+img_h+'px; padding:0 0 10px;"></div>');
		$('.justmarginb10').after('<div style="height:'+img_h+'px; padding:0 0 10px;"></div>');
		$('body').append(html_1);
	}
});

// 选项卡
function clickSwitch(btn,layer,index,mode) {
	$(btn).eq(index).addClass('current');//默认
	$(layer).eq(index).show();//默认
	if(mode){$(btn).mouseover(Switch);}else {$(btn).click(Switch);}
	function Switch() {var index = $(btn).index(this);$(this).addClass('current').siblings().removeClass('current');$(layer).eq(index).show().siblings().hide();}
}
