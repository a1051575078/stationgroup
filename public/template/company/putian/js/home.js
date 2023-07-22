$(function(){
    var href=window.location.href;
//console.log(href);
    if(href=="http://www.poteviogroup.com/"){
        $("#icp").text("京ICP备19033118号-1");
        $("#icpn").text("中国普天信息产业集团有限公司 版权所有©2019");
        document.title="中国普天信息产业集团有限公司";
    }else if(href=="http://www.potevio.com/"){
        $("#icp").text("京ICP备18049026号-1");
        $("#icpn").text("中国普天信息产业股份有限公司 版权所有©2019");
        document.title="中国普天信息产业股份有限公司";
    }



    $(".f426x240").responsiveSlides({
        auto: true,
        pager: true,
        nav: true,
        speed: 700
    });



    $(".top").click(function(){

        $('body,html').animate({scrollTop:0},500);
        return false;
    });

    $(".DnnModule-4626").attr("style", "display:block");




})
