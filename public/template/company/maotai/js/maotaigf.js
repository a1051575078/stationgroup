$(function(){
//banner链接判断
 $(".bds li a").each(function(){
     var bannerA=$(this).attr('href');
      if(bannerA == ""){
      //   console.log(1111)
       $(this).attr("href","javascript:void(0)");
        $(this).attr("target","_self");
     }
  })
//移动端导航、搜索
$(".phoneNav").click(function(){
	$(".index_nav").animate({"left": "0"},300);
     $(".phoneX").animate({"left": "65%"},300);
$('html,body').css({"overflow":"hidden","position":"fixed","top":"0","left":"0"})

});

$(".phoneX").click(function(){
	$(".index_nav").animate({"left": "-100%"},300);
      $(".phoneX").animate({"left": "-65%"},300);
$('html,body').css({"overflow":"auto","position":"static"})

});
var f = 0;
$(".one").click(function(event) {
                 event?event.stopPropagation():event.cancelBubble = true;
		$(".select").slideUp()
		$(this).find(".select").slideToggle();
	})
if($(window).width() < 768) {
  $(".ul a").click(function(){
        $(".ul").hide();
  })
}

//搜索
$(".sea").click(function(){
        $(".searBox ").fadeIn(500);
   $(".sea").fadeOut(500);
   $(".Ul").fadeOut(500);
 $(".hbinput").focus();
})
$(".searImg").click(function(){
        $(".searBox ").fadeOut(500);
   $(".sea").fadeIn(500);
   $(".Ul").fadeIn(500);

})
//加id
$('.Ul >li').each(function(index, item){
    $(item).attr('id', 'id' + index);
});

$("#id6>a").attr("target","_blank");
//加id
$('.select>li').each(function(index, item){
    $(item).attr('id', 'ida' + index);
});
$("#ida18>a").attr("target","_blank");
$("#ida20>a").attr("target","_blank");
$("#ida21>a").attr("target","_blank");
$("#ida26>a").attr("target","_blank");

//---------------------------------------------------------------
})