window.onload=function(){

    $("#nav li").mouseenter(function(){
            var that=$(this);
            that.children("ul").slideDown();
        })
    $("#nav li").mouseleave(
      function(){
          var that=$(this);
          that.children("ul").hide();
      }
  )
    // 移动导航条
    $("#nav li").click(function(){
        var that=$(this);
        that.siblings().removeClass("on");
        that.children("ul").removeClass("fadeContent");
    })
    $(".nav_click").click(function(){
        //点击的时候判断下当前页面，给相应的栏目加上on;
        $(".navigation").fadeToggle();
    })
    //轮播图
    var l=$(".slider").length;
    // 根据图片数量添加焦点指示标
    var html='';
    for(var i=1;i<=l;i++){
        html+='<li class="dots">'+i+'</li>'
    }
    $(".dotsBlock").html(html);
    $(".dotsBlock li:first-child").addClass("dots_active");
    function fn(){
        var n=parseInt($("ul li.dots_active").html())
        $(".dots").each(function(i,elem){
            var num=i+1;
            if(num==n){
                    $(this).removeClass("dots_active");
                if(num==l){
                    $("li.dots:first-child").addClass("dots_active");
                }else{
                    $(this).next().addClass("dots_active")
                }
            }
        })
        $(".slider").each(function(i,elem){
            var num=i+1;
            if(num==n){
                    $(".slider").removeClass("show");
                if(num==l){
                    $(".slider:first-child").addClass("show");
                }else{
                    $(this).next().addClass("show");
                }
            }
        })
    }
    var timer=setInterval(fn,5000);
    $(".dots").mouseenter(function(){
        var n=$(this).html();
        $(".dots").removeClass("dots_active")
        $(".dots").each(function(i,elem){
            if(n==(i+1)){
                $(this).addClass("dots_active");
            }
        })
        $(".slider").removeClass("show");
        var left1=-parseInt($(".slider img").css('width'));
        $(".slider").each(function(i,elem){
            if(n==(i+1)){
                $(this).addClass("show");
            }
        })

    })
    $(".prev").click(function(){
        var dot=$(".dots_active");
        var n=parseInt(dot.html()) ;
        var show=$(".show");
        if(n>=2){
            dot.removeClass("dots_active");
            dot.prev().addClass("dots_active");
            show.removeClass("show");
            show.prev().addClass("show");
        }
        if(n == 1){
          dot.removeClass("dots_active");
          $(".dotsBlock li:last-child").addClass("dots_active");
          show.removeClass("show");
          $("div.slider:nth-child("+l+")").addClass("show");
        }

    })
    $(".next").click(function(){
        var dot=$(".dots_active");
        var n=parseInt(dot.html()) ;
        var show=$(".show");
        if(n<=l-1){
            dot.removeClass("dots_active");
            dot.next().addClass("dots_active");
            show.removeClass("show");
            show.next().addClass("show");
        }
        if(n == l){
            dot.removeClass("dots_active");
            $(".dotsBlock li:first-child").addClass("dots_active");
            show.removeClass("show");
            $("div.slider:nth-child(1)").addClass("show");
        }
    })
    $(".bannerImgs").mouseenter(function(){
        clearInterval(timer);
    })
    $(".bannerImgs").mouseleave(function(){
        timer=setInterval(fn,5000);
    })
    // 所属部门点击效果
    $(".right_3_li").click(function(){
        var that=$(this);
        that.toggleClass("right_3a_bg1");
        that.next().toggleClass("fadeContent");
        that.parent().siblings().children(".right_3_li").removeClass("right_3a_bg1");
        that.parent().siblings().children("ul").addClass("fadeContent");
    })
    // 移动端二级导航条
    $(".left1_01").click(function(){
        var that=$(this);
        that.next().toggleClass("openSubnav");
    })
    // 取消移动端导航条点击事件
    // 搜索功能
    $('.head_search button').off('click').on('click', function () {
      var keyword = $("#search_keywordss").val();
      if (keyword.replace(/(^\s*)|(\s*$)/g, "") == "") {
          alert("搜索关键词不能为空")
          return;
      };
      keyword = keyword.replace(/<[^>]+>|&[^>]+;/g, "")
      window.open("http://www.bjyq.com.cn/ksearch/kgsearch/cindex1.html?val="+ encodeURIComponent(keyword));
    });
    $("#search_keywordss").keydown(function (e) {
        if (e.keyCode == 13) {
            $('.head_search button').click();
        };
    });
    $(".foot_2 a").first().attr("href","https://beian.miit.gov.cn/");
    // 返回顶部
    $('#backtop').on('click',move);
    function move() {
        $('html,body').animate({
            scrollTop: 0
        },800);
    }
    $(this.document).ready(function(){
        $(document).scroll(function(){
            var res=$(window).scrollTop();
            if(res>250){
                $('#backtop').removeClass("fadeContent");
                $('#backtop').css("background-color","#E9E9E9");
                $('#backtop').mouseenter(function(){
                    $(this).css("background-color","#ff8900");
                })
                $('#backtop').mouseleave(function(){
                    $(this).css("background-color","#E9E9E9");
                })
            }else{
                $('#backtop').addClass("fadeContent");
            }
        })
    })
}
