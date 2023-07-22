@php($data=app('App\Http\Controllers\CoreController'))
<!DOCTYPE html>
<html>
<head>
    <title>{!!$title!!}</title>
    <meta name="keywords" content="{!!$keywords!!}"/>
    <meta name="description" content="{!!$description!!}"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no,minimal-ui">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <meta name="format-detection" content="telephone=no">
    <meta content="email=no" name="format-detection">
    <link href="{{$host.'/template/company/dianzikonggu/css/common.css'}}" rel="stylesheet" type="text/css">
    <link href="{{$host.'/template/company/dianzikonggu/css/top.css'}}" media="screen" rel="stylesheet" type="text/css">
    <link href="{{$host.'/template/company/dianzikonggu/css/index.css'}}" media="screen" rel="stylesheet" type="text/css">
    <link href="{{$host.'/template/company/dianzikonggu/css/index_style.css'}}" rel="stylesheet">
    <link href="{{$host.'/template/company/dianzikonggu/css/sub_common.css'}}" rel="stylesheet" type="text/css" />
    <link href="{{$host.'/template/company/dianzikonggu/css/style.css'}}" media="screen" rel="stylesheet" type="text/css" />
    <link href="{{$host.'/template/company/dianzikonggu/css/page.css'}}" media="screen" rel="stylesheet" type="text/css" />
    <link href="{{$host.'/template/company/dianzikonggu/css/baguettebox.min.css'}}" rel="stylesheet" type="text/css">
    <link href="{{$host.'/template/company/dianzikonggu/css/picbox.css'}}" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="{{$host.'/template/company/dianzikonggu/js/jquery-1.8.2.min.js'}}"></script>
    <script type="text/javascript" src="{{$host.'/template/company/dianzikonggu/js/common.js'}}"></script>
    <script type="text/javascript" src='{{$host.'/template/company/dianzikonggu/js/qrcode.js'}}'></script>
    <script type='text/javascript' src="{{$host.'/template/company/dianzikonggu/js/bootstrap.js'}}"></script>
    <script type="text/javascript" src="{{$host.'/template/company/dianzikonggu/js/bootstrap-collapse.js'}}"></script>
    <script type='text/javascript' src="{{$host.'/template/company/dianzikonggu/js/jquery.bootstrap-autohidingnavbar.js'}}"></script>
    <script type="text/javascript" src="{{$host.'/template/company/dianzikonggu/js/jquery.DB_tabMotionBanner.min.js'}}"></script>
    <script type="text/javascript" src="{{$host.'/template/company/dianzikonggu/js/jquery.royalslider.min.js'}}"></script>
    <script type="text/javascript" src="{{$host.'/template/company/dianzikonggu/js/owl.carousel.js'}}"></script>
    <script type="text/javascript" src="{{$host.'/template/company/dianzikonggu/js/superslide.2.1.js'}}"></script>
    <script type='text/javascript' src="{{$host.'/template/company/dianzikonggu/js/jquery.kkPages.js'}}"></script>
    <script type='text/javascript' src="{{$host.'/template/company/dianzikonggu/js/baguettebox.min.js'}}"></script>
    <script type='text/javascript' src="{{$host.'/template/company/dianzikonggu/js/picbox.js'}}"></script>
</head>
<body>
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}">BEHC</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-left">
                <li class="active">
                    <a class="home" href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}" title="首页">首 页</a>
                </li>
                @for($i=0;$i<6;$i++)
                    <li>
                        @php($info=$data->navigation($firstDomain,$pinyin))
                        <a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                    </li>
                @endfor
            </ul>
        </div>
    </div>
</div>
<script type="text/javascript">
    $("div.navbar-fixed-top").autoHidingNavbar();
</script>
<div class="about_box"></div>
@yield('content')
<div class="main_foot">
    <div class="foot">
        <div class="foot_logo">
            <img src="{{$host.'/template/company/dianzikonggu/img/foot_logo_new.png'}}" title="控股有限责任公司" alt="控股有限责任公司"/>
        </div>
    </div>
</div>
<div class="foot_copyright">
    <div class="foot_c">
        <p>
            版权所有 © Copyright 北京电子控股有限责任公司   京ICP备14037209号-2   京公网安备110401000088
            <span>
                @for($i=0;$i<2;$i++)
                    @php($info=$data->navigation($firstDomain,$pinyin))
                    <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">{{$info['title']}}</a>|
                @endfor
                <a href="{{$hijack?'?sitemap.xml':"$host.'/sitemap.xml'"}}" target="_blank" title="网站地图">网站地图</a>|
                <a href="{{$hijack?'?resource.rdf':"$host.'/resource.rdf'"}}" target="_blank" title="资源描述">资源描述</a>
            </span>
        </p>
    </div>
</div>
<script type="text/javascript">
    $("div.navbar-fixed-top").autoHidingNavbar();
    jQuery(document).ready(function($) {
        $('#full-width-slider').royalSlider({
            arrowsNav: true,
            loop: true,
            keyboardNavEnabled: true,
            controlsInside: false,
            imageScaleMode: 'fill',
            arrowsNavAutoHide: false,
            autoScaleSlider: true,
            autoScaleSliderWidth: 960,
            autoScaleSliderHeight:360,
            controlNavigation: 'bullets',
            thumbsFitInViewport: false,
            navigateByClick: true,
            startSlideId: 0,
            autoPlay:true,
            transitionType:'move',
            globalCaption: true,
            deeplinking: {
                enabled: true,
                change: false
            },
            imgWidth: 1980,
            imgHeight:500
        });
    });
</script>
<script type="text/javascript">
    $(function(){
        $('#owl').owlCarousel({
            items: 1,
            navigation: true,
            navigationText: ["上一个","下一个"],
            autoPlay: true,
            stopOnHover: true
        }).hover(function(){
            $('.owl-buttons').show();
        }, function(){
            $('.owl-buttons').hide();
        });
    });
</script>
<script type="text/javascript">
    jQuery(".slider .bd li").first().before( jQuery(".slider .bd li").last() );
    jQuery(".slider").hover(function(){
        jQuery(this).find(".arrow").stop(true,true).fadeIn(300)
    },function(){
        jQuery(this).find(".arrow").fadeOut(300) });
    jQuery(".slider").slide(
        { titCell:".hd ul", mainCell:".bd ul", effect:"leftLoop",autoPlay:true, vis:3,autoPage:true, trigger:"click"}
    );
</script>
<script type="text/javascript">
    $(document).ready(function(){
        var flag=1;
        $("div.shang").hide();
        $("div.links_more").click(function(){
            $("div.linksm").slideToggle("slow");
            if(flag==1){
                $("div.xia").hide();
                $("div.shang").show();
                flag=0;
            }
            else if(flag==0){
                $("div.xia").show();
                $("div.shang").hide();
                flag=1;
            }
        })
    });
</script>
<script id="_trs_ta_js" src="{{$host.'/template/company/dianzikonggu/js/ta.js'}}" async="async" defer="defer"></script>
</body>
</html>
