@php($data=app('App\Http\Controllers\CoreController'))
<!DOCTYPE html>
<html>
<head>
    <title>{!!$title!!}</title>
    <meta name="keywords" content="{!!$keywords!!}"/>
    <meta name="description" content="{!!$description!!}"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="format-detection" content="telephone=no"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <link rel="icon" href="{{$host.'/template/company/wangwangjituan/favicon.ico'}}" type="image/x-icon"/>
    <link href="{{$host.'/template/company/wangwangjituan/css/reset.css'}}" rel="stylesheet" type="text/css"/>
    <link href="{{$host.'/template/company/wangwangjituan/css/style.css'}}" rel="stylesheet" type="text/css"/>
    <link href="{{$host.'/template/company/wangwangjituan/css/search.css'}}" rel="stylesheet" type="text/css"/>
    <link href="{{$host.'/template/company/wangwangjituan/css/swiper.min.css'}}" rel="stylesheet" type="text/css"/>
    <script src="{{$host.'/template/company/wangwangjituan/js/swiper.min.js'}}" type="text/javascript"></script>
    <script src="{{$host.'/template/company/wangwangjituan/js/layer.js'}}" type="text/javascript"></script>
    <script src="{{$host.'/template/company/wangwangjituan/js/jquery-1.8.2.min.js'}}" type="text/javascript"></script>
    <script src="{{$host.'/template/company/wangwangjituan/js/respond.min.js'}}" type="text/javascript"></script>
</head>
<body class="">
<div class="main">
    <div class="headerBox"></div>
    <div class="head">
        <div class="headerTop">
            <div class="w1440 f-cb">
                @php($img=['bd.png','lr.png','zd.png','wp.jpg','jlb.png','bbjd.png','jd.png','bbtm.png','tm.png'])
                @for($i=0;$i<9;$i++)
                    @php($info=$data->navigation($firstDomain,$pinyin))
                    <a href="{{$info['url']}}" target="_blank" class="a1" title="{{$info['title']}}" style="background-image: url({{$host.'/template/company/wangwangjituan/img/'.$img[$i]}});">{{$info['title']}}</a>
                @endfor
            </div>
        </div>
        <div class="header">
            <div class="w1440 f-cb">
                <a href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}" class="logo" title="logo">
                    <img width="100%" src="{{$host.'/template/company/wangwangjituan/img/logo.png'}}" title="logo" alt="logo"/>
                </a>
                @php($info=$data->navigation($firstDomain,$pinyin))
                <a href="{{$info['url']}}" class="search" title="{{$info['title']}}"></a>
                <div class="nav">
                    <ul class="f-cb">
                        <li>
                            <a href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}" class="tits" title="首页">首页</a>
                        </li>
                        @php($cycle=[13,5,3,0,8,3,4,7])
                        @for($i=0;$i<8;$i++)
                            @php($info=$data->navigation($firstDomain,$pinyin))
                            <li>
                                <a href="{{$info['url']}}" class="tits" title="{{$info['title']}}">{{$info['title']}}</a>
                                @if($cycle[$i])
                                    <dl class="f-cb">
                                        @for($j=0;$j<$cycle[$i];$j++)
                                            @php($info=$data->content($firstDomain,$pinyin))
                                            <dd>
                                                <a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                                            </dd>
                                        @endfor
                                    </dl>
                                @endif
                            </li>
                        @endfor
                        <li class="m">
                            @php($info=$data->navigation($firstDomain,$pinyin))
                            <a href="{{$info['url']}}" class="tits" title="{{$info['title']}}">{{$info['title']}}</a>
                            <dl class="f-cb">
                                @for($i=0;$i<9;$i++)
                                    @php($info=$data->navigation($firstDomain,$pinyin))
                                    <dd>
                                        <a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                                    </dd>
                                @endfor
                            </dl>
                        </li>
                        <li>
                            @php($info=$data->navigation($firstDomain,$pinyin))
                            <a href="{{$info['url']}}" class="tits" title="{{$info['title']}}">{{$info['title']}}</a>
                            <dl class="f-cb">
                                @for($i=0;$i<4;$i++)
                                    @php($info=$data->navigation($firstDomain,$pinyin))
                                    <dd>
                                        <a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                                    </dd>
                                @endfor
                            </dl>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @if($uri!=='/')
    <div class="home">
        <div class="w1200">
            <a href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}" title="首页">首页</a> >
            <i>{{$title}}</i>
        </div>
    </div>
    <div class="banner">
        <img width="100%" src="{{$host.'/template/company/wangwangjituan/img/banner.jpg'}}" title="banner" alt="banner"/>
    </div>
    @endif
    @yield('content')
    <div class="footerIndex">
        <div class="footer f-cb">
            <div class="p">
                @php($info=$data->navigation($firstDomain,$pinyin))
                <a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                <em>©上海旺旺食品集团有限公司 <a href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}" target="_blank" title="备案">沪ICP备10203374号</a></em>
                <a href="{{$hijack?'?sitemap.xml':"$host.'/sitemap.xml'"}}" target="_blank" title="网站地图">网站地图</a>
                <a href="{{$hijack?'?resource.rdf':"$host.'/resource.rdf'"}}" target="_blank" title="资源描述">资源描述</a>
            </div>
            <div class="t f-cb">
                <a href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}" class="a1" target="_blank" title="工信部">工信部</a>
                <a href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}" class="a2" target="_blank" title="上海工商">上海工商</a>
            </div>
        </div>
    </div>
</div>
<script src="{{$host.'/template/company/wangwangjituan/js/main.js'}}" type="text/javascript"></script>
<script type="text/javascript">
    $(function () {
        $('.header ul li').eq(0).addClass('on');
        var swiper = new Swiper('.swiper-container', {
            centeredSlides: true,
            loop: true,
            speed: 1000,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.index .btns',
                clickable: true,
            },
        });
    })
</script>
</body>
</html>
