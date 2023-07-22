// JavaScript Document
$(document).ready(function(){
    $(".nav li").click(function(){
        $(".nav li").removeClass("current");
        $(this).addClass("current");
    });
    $(".related-tip a").click(function(){
        $(this).addClass("current").siblings().removeClass("current");
        var contag=$(this).html();
        $(".letter").html(contag);
    });
    $(".testNav a").mouseover(function(){
        $(this).addClass("current").siblings().removeClass("current");
    });

    $(".options li").hover(function(){
        $(".options li").removeClass("current");
        $(this).addClass("current");
    });
    $(".fans ul li").hover(function(){
        $(this).find(".tail").toggle();
    });

    $(".bigStar").hover(function(){
        $(this).find(".notice").show();
    },function(){$(this).find(".notice").hide();
    });
    $(".gameState tbody tr:odd").css("background","#f6f6f6");
    $(".firm-box .list li:odd").css("background","#fff");
    $(".name-list tr:even").css("background","#F9F9F9")

    $(".newSort a").click(function(){
        $(this).addClass("current").siblings().removeClass("current");
    });
    $(".sort-l-nav a").click(function(){
        $(this).addClass("current").siblings().removeClass("current");
    });

})
