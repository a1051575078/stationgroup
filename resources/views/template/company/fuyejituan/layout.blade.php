@php($data=app('App\Http\Controllers\CoreController'))
<!DOCTYPE html>
<html>
<head>
    <title>{!!$title!!}</title>
    <meta name="keywords" content="{!!$keywords!!}"/>
    <meta name="description" content="{!!$description!!}"/>
    <meta name="author" content="{{$firstDomain}}"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="content-language" content="zh-CN"/>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1"/>
    <meta name="applicable-device" content="pc,mobile"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black"/>
    <meta name="format-detection" content="telephone=no"/>
    <meta name="renderer" content="webkit"/>
    <link rel="stylesheet" href="{{$host.'/template/company/fuyejituan/css/reset.css'}}" type="text/css" media="screen"/>
    <link rel="stylesheet" href="{{$host.'/template/company/fuyejituan/css/style.css'}}" type="text/css" media="screen"/>
    <link rel="stylesheet" href="{{$host.'/template/company/fuyejituan/css/sfstyle.css'}}" type="text/css" media="screen"/>
    <link rel="stylesheet" href="{{$host.'/template/company/fuyejituan/css/jquery.fancybox.css'}}" type="text/css" media="screen"/>
    <link rel="stylesheet" href="{{$host.'/template/company/fuyejituan/css/animate.css'}}" type="text/css" media="screen"/>
    <script src="{{$host.'/template/company/fuyejituan/js/jquery-1.11.3.js'}}" type="text/javascript"></script>
    <script src="{{$host.'/template/company/fuyejituan/js/jquery.easing.1.3.js'}}" type="text/javascript"></script>
    <script src="{{$host.'/template/company/fuyejituan/js/jquery.transit.js'}}" type="text/javascript"></script>
    <script src="{{$host.'/template/company/fuyejituan/js/html5.min.js'}}" type="text/javascript"></script>
    <script src="{{$host.'/template/company/fuyejituan/js/bocfe.js'}}" type="text/javascript"></script>
    <script src="{{$host.'/template/company/fuyejituan/js/wow.min.js'}}" type="text/javascript"></script>
    <script src="{{$host.'/template/company/fuyejituan/js/touch.js'}}" type="text/javascript"></script>
    <link href="{{$host.'/template/company/fuyejituan/favicon.ico'}}" rel="shortcut icon"/>
</head>
<body>
<header class="f-cb">
    <a href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}" class="logo fl">
        <img src="{{$host.'/template/company/fuyejituan/img/logo.png'}}" alt="logo" title="logo"/>
    </a>
    <nav class="fl">
        <ul>
            @php($cycle=[6,7,6,4,2,3])
            @for($i=0;$i<6;$i++)
                <li>
                    @php($info=$data->navigation($firstDomain,$pinyin))
                    <div class="line poa"></div>
                    <a class="tit" href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                    <div class="son poa">
                        @for($j=0;$j<$cycle[$i];$j++)
                            @php($info=$data->content($firstDomain,$pinyin))
                            <a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                        @endfor
                    </div>
                </li>
            @endfor
        </ul>
    </nav>
    <div class="ser fr"></div>
    <div class="lang fr">
        @for($i=0;$i<2;$i++)
            @php($info=$data->navigation($firstDomain,$pinyin))
            <a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
        @endfor
    </div>
    <!-- 搜索 -->
    <div class="search-alert">
        <span class="close"></span>
        <div class="cent-form">
            @php($info=$data->navigation($firstDomain,$pinyin))
            <form action="{{$info['url']}}" method="GET" id="pro-ser-frm">
                <input class="fl tex" type="text" value="" name="keywords" placeholder="请输入新闻关键字"/>
                <input class="fr sub-butn gotham-bold" type="submit" value="ENTER"/>
            </form>
        </div>
    </div>
</header>
<div class="head-bg"></div>
@yield('content')
<footer>
    <div class="foot-main">
        <div class="w1190 f-cb">
            <div class="foot-nav fl">
                <ul>
                    @php($cycle=[6,7,4,2,2])
                    @for($i=0;$i<5;$i++)
                        <li>
                            @php($info=$data->navigation($firstDomain,$pinyin))
                            <a class="tit" href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                            @for($j=0;$j<$cycle[$i];$j++)
                                @php($info=$data->content($firstDomain,$pinyin))
                                <a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                            @endfor
                        </li>
                    @endfor
                </ul>
            </div>
            <div class="foot-right fr">
                <div class="footer-links por">
                    <p>权属公司</p>
                    <div class="links-list poa">
                        @for($i=0;$i<6;$i++)
                            @php($info=$data->content($firstDomain,$pinyin))
                            <a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="foot-bot">
        <div class="w1190 f-cb">
            <img src="{{$host.'/template/company/fuyejituan/img/gongan.png'}}" title="备案logo" alt="备案logo"/>
            浙公网安备33018302000260号
            浙ICP备10052903号-2
            @php($info=$data->navigation($firstDomain,$pinyin))
            <a href="{{$info['url']}}">{{$info['title']}}</a>|<a href="{{$hijack?'?sitemap.xml':"$host.'/sitemap.xml'"}}">网站地图</a>|<a href="{{$hijack?'?resource.rdf':"$host.'/resource.rdf'"}}" title="资源描述">资源描述</a>
        </div>
    </div>
</footer>
<script src="{{$host.'/template/company/fuyejituan/js/banner.js'}}" type="text/javascript"></script>
<script src="{{$host.'/template/company/fuyejituan/js/main.js'}}" type="text/javascript"></script>
<script src="{{$host.'/template/company/fuyejituan/js/jquery.SuperSlide.2.1.1.js'}}" type="text/javascript"></script>
<script>
    $(function(){
        function bannerheight(){
            var imgh = $(".banner .scroll-box ul li").find(".img").find("img").height();
            $(".banner").css("height",imgh + 'px');
        }
        bannerheight();
        $(window).resize(function () {
            bannerheight();
        });
        autoImg('.scroll-box', 10000, 1, true, true, false, true);
        $(".txtScroll-top").slide({titCell:".hd ul",mainCell:".bd ul",autoPage:true,effect:"topLoop",autoPlay:true,vis:1});
    })
</script>
</body>
</html>
