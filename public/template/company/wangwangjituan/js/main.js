$(function(){
    $(window).scroll(function () {
        if($(window).width()>1024){
            if(!$('.headerBox').hasClass('on')){
                if ($(window).scrollTop() > 100) {
                    $('.header').addClass('on');
                } else {
                    $('.header').removeClass('on');
                }
            }
            
        }
    }); 


    $('.navClick').click(function(){
        if ($(this).hasClass('on')) {
            $(this).removeClass('on');
            $('.header .nav').fadeOut(200);
            // $('body,html').css('overflow','auto');
        } else{
            $(this).addClass('on');
            $('.header .nav').fadeIn(200);
            // $('body,html').css('overflow','hidden');
        };
    });

    $('.aboutNavM .tits').click(function(){
        if($(this).hasClass('on')){
            $(this).removeClass('on').next('ul').slideUp();
        }else{
            $(this).addClass('on').next('ul').slideDown();
        }
    });

    $('.messageTabsM .tits').click(function(){
        if($(this).hasClass('on')){
            $(this).removeClass('on').next('ul').slideUp();
        }else{
            $(this).addClass('on').next('ul').slideDown();
        }
    });

    $(document).click(function(e){
        if((!$(e.target).parents().hasClass('js-noclick')&&!$(e.target).hasClass('js-noclick'))){
            $(".js-noclick ul").slideUp();
            $(".js-noclick .tits").removeClass('on');
        }
    });

    $(window).scroll(function(){
        $(".js-noclick ul").slideUp();
        $(".js-noclick .tits").removeClass('on');
    });


    $('.header .mnav .box .boxLeft a').hover(function(){
        if(!$(this).hasClass('on')){
            $(this).addClass('on').siblings().removeClass();
            $('.header .mnav .box .boxRight dl').eq($(this).index()).fadeIn(200).siblings().hide();
        }
    })

 	$('.return-top,.returnTop').click(function(){
		$('body,html').animate({
            scrollTop: 0
        }, 800);
	})

    var animateDH = $(".animation");
    // if(animateDH.length>0){
    //     animateDH.each(function(i) {
    //         var s=$(this).attr('data-data-wow-delay');
    //         if(s!=null){

    //         }
    //     })
    // }
    $(window).bind('scroll load',function(){
        var pmw=window.innerWidth,
            pmh=window.innerHeight;
        var scrollTop = $(window).scrollTop()+pmh;
        if(animateDH.length>0){
            animateDH.each(function(i) {
                var animateTop = $(this).offset().top+60;
                if (scrollTop > animateTop) {
                    $(this).addClass("srcospcur");
                }else{
                    $(this).removeClass("srcospcur");
                }
            });
        }
    });
    $('.search-box').click(function(){
        if(!$(this).hasClass('on')){
            $(this).addClass('on');
        }
    });


    $('.xfLeft').click(function(){
        if(!$('.footerxf').hasClass('on')){
            $('.footerxf').addClass('on');
        }else{
            $('.footerxf').removeClass('on');
        }
    })
})