/*
 *	soChange 1.2 - simple gallery with jQuery
 *	made by bujichong 2009-11-27
 *	作者：不羁虫  2009-11-27
 * http://hi.baidu.com/bujichong/
 *	欢迎交流转载，但请尊重作者劳动成果，标明插件来源及作者
 */

(function(c){c.fn.soChange=function(d){return new a(this,d)};var b={thumbObj:null,botLast:null,botNext:null,thumbNowClass:"now",slideTime:1000,autoChange:true,clickFalse:true,overStop:true,changeTime:5000,delayTime:300};c.soChangeLong=function(p,i){this.options=c.extend({},b,i||{});var q=c(p);var r=this.options;var d;var t=q.size();var k=0;var n;var h;var l;q.hide();q.eq(0).show();function j(){if(k!=n){if(r.thumbObj!=null){c(r.thumbObj).removeClass(r.thumbNowClass).eq(n).addClass(r.thumbNowClass)}if(r.slideTime<=0){q.eq(k).hide();q.eq(n).show()}else{q.eq(k).fadeOut(r.slideTime);q.eq(n).fadeIn(r.slideTime)}k=n;if(r.autoChange==true){clearInterval(h);h=setInterval(s,r.changeTime)}}}function g(){if(r.clickFalse==true){return false}}function s(){n=(k+1)%t;j()}if(r.thumbObj!=null){d=c(r.thumbObj);d.removeClass(r.thumbNowClass).eq(0).addClass(r.thumbNowClass);d.click(function(){n=d.index(c(this));j();g()});d.mouseenter(function(){n=d.index(c(this));l=setTimeout(j,r.delayTime)});d.mouseleave(function(){clearTimeout(l)})}if(r.botNext!=null){var f=c(r.botNext);f.click(function(){s();return false})}if(r.botLast!=null){var m=c(r.botLast);m.click(function(){n=(k+t-1)%t;j();return false})}if(r.autoChange==true){h=setInterval(s,r.changeTime);if(r.overStop==true){q.mouseenter(function(){clearInterval(h)});q.mouseleave(function(){h=setInterval(s,r.changeTime)})}}};var a=c.soChangeLong})(jQuery);
