
var gb2big5_Obj=document.getElementById("gb2big5")
if (gb2big5_Obj){
	var JF_cn="ft"+self.location.hostname.toString().replace(/\./g,"")
	var BodyIsFt=getCookie(JF_cn)
	if(BodyIsFt!="1")BodyIsFt=Default_isFT
	with(gb2big5_Obj){
		if(typeof(document.all)!="object"){ //非IE浏览器
			href="javascript:e_lang_text();location.reload();"
			//href="javascript:StranBody();location.reload();"
		}else{
			href="#";
			onclick= new Function("e_lang_text();location.reload();return false")
			// onclick= new Function("StranBody();location.reload();return false")
		}
		//title=StranText("点击以繁体中文方式浏览",1,1)
		//innerHTML=StranText(innerHTML,1,1)
	}
	if(BodyIsFt=="1"){
		StranBody();
		//setTimeout("StranBody()",StranIt_Delay)
	}
}
function e_lang_text(){
	var JF_cn="ft"+self.location.hostname.toString().replace(/\./g,"")
	var BodyIsFt=getCookie(JF_cn)
	if(BodyIsFt!="1"){
		setCookie(JF_cn,'1');
	}else{
		setCookie(JF_cn,'0');
	}
}
/*

By  鱼 2017-06-05
QQ  594074555

*/

// 导航效果
	$(".pub_nav i").click(function(){
		$(this).toggleClass("on")
		$(this).next('ul').toggleClass("slider");
	});

// 右侧功能栏
	$(function(){
		if($(document).scrollTop()>400){
			$('.pub_btn').fadeIn();
		}
	})
	$(window).scroll(function(){
        if($(this).scrollTop() > 400){
        	$('.pub_btn').fadeIn();
        }else{
            $('.pub_btn').fadeOut();
        };
    });
	$('.pub_btn div.box4').click(function(){
	    $("html, body").animate({ scrollTop: 0 }, 750);
	});
	var flag = 5;
	$('.pub_btn div.box1').click(function(){
		if (flag) {
			$(this).addClass("on");
		    flag = 0;
		}else{
			flag = 5;
			$(this).removeClass("on");
		}
		$('.pub_btn div.box2').removeClass("on");
		$(this).find("div.in").click(function(){
			$(this).parent().removeClass("on");
		})
	});
	var flag2 = 5;
	$('.pub_btn div.box2').click(function(){
		if (flag2) {
			$(this).addClass("on");
		    flag2 = 0;
		}else{
			flag2 = 5;
			$(this).removeClass("on");
		}
		$('.pub_btn div.box1').removeClass("on");
		$(this).find("div.in").click(function(){
			$(this).parent().removeClass("on")
		})
	});



	/*// 窗口缩小改变网址
	function Internet_(){
		var width_ = $(window).width();
		if (width_<765) {
			self.location='/wap.html';
		}
	}
	Internet_();
	$(window).resize(function(){
		Internet_();
	})*/
