var wow = new WOW({
    boxClass: 'wow',
    animateClass: 'animated',
    offset:200,
    mobile: false,
    live: true
});
wow.init();
$(function(){
    $('.ser').on('click',function(){
        $('.search-alert').addClass('active');
    })
    $('.search-alert .close').on('click',function(){
        $('.search-alert').removeClass('active');
    })
    $(".footer-links").hover(function(){
        if($(".links-list").css("display") == "block"){
            $(".links-list").stop(false,true).slideUp(300);
        }else{
            $(".links-list").stop(false,true).slideDown(300);
        };
    });
    $(window).scroll(function(){
        var flag="+";
        if ($(window).scrollTop() > 0) {
            var k2 = $(window).scrollTop()/2;
            k2<0?flag=" -":" +";
            $(".ad .bgimg.pcitem").css("background-position-y","calc(50% "+ flag + " " + Math.abs(k2) +"px)");
        }else{
            $(".ad .bgimg.pcitem").css("background-position-y","50%");
        }
    })
});
