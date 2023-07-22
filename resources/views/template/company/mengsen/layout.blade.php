@php($data=app('App\Http\Controllers\CoreController'))
<!DOCTYPE html>
<html>
<head>
    <title>{!!$title!!}</title>
    <meta name="keywords" content="{!!$keywords!!}"/>
    <meta name="description" content="{!!$description!!}"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="author" content="{{$firstDomain}}"/>
    <link href="{{$host.'/template/company/mengsen/css/style.css'}}" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="{{$host.'/template/company/mengsen/js/jquery-1.7.2.min.js'}}"></script>
    <script type="text/javascript" src="{{$host.'/template/company/mengsen/js/common.js'}}"></script>
    <script type="text/javascript" src="{{$host.'/template/company/mengsen/js/jquery.SuperSlide.js'}}"></script>
</head>
<body class="body_index">
<div id="logo_main">
    <div id="logo">
        <div class="WebLogo">
            <a href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}" target="_self" title="首页">
                <img  src="{{$host.'/template/company/mengsen/img/1484637777.png'}}" title="首页" alt="首页"/>
            </a>
        </div>
        <div class="search">
            @php($info=$data->navigation($firstDomain,$pinyin))
            <form name="frmInfoSearch" method="get" action="{{$info['url']}}">
                <input name="Keywords" class="search_text" type="text" value="" maxlength="50"/>
                <input class="search_btn"  name="submit" type="submit" value=""/>
                <input type="hidden" name="__hash__" value="e251273eb74a8ee3f661a7af00915af1_6c31742f309a8cb5c10d122d6ff7d663"/>
            </form>
        </div>
    </div>
</div>
<div id="navigation_main">
    <div id="navigation">
        <ul class="navigationlist">
            <li>
                <a href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}" target="_self" class="current" title="网站首页">网站首页</a>
            </li>
            @for($i=0;$i<8;$i++)
                <li>
                    @php($info=$data->navigation($firstDomain,$pinyin))
                    <a href="{{$info['url']}}" target="_self" title="{{$info['title']}}">{{$info['title']}}</a>
                </li>
            @endfor
        </ul>
    </div>
</div>
<div id="banner_main">
    <div id="banner">
        <ul class="bannerlist">
            <li style="background:;">
                <img src="{{$host.'/template/company/mengsen/img/1484638953.jpg'}}" alt="横幅" title="横幅"/>
            </li>
            <li style="background:;">
                <img src="{{$host.'/template/company/mengsen/img/1484647738.jpg'}}" alt="横幅" title="横幅"/>
            </li>
        </ul>
    </div>
    <div class="hd">
        <ul></ul>
    </div>
</div>
<script>
    if( $(".bannerlist li").length > 0 ){
        $('#banner_main').slide({ titCell:'.hd ul', mainCell:'#banner ul', autoPlay:true, autoPage:true, delayTime:500, effect:'left'});
        $(window).resize(function() {  CenterBanner(); });
        $(document).ready(function(e) { CenterBanner(); });
    }else{
        $("#banner_main").hide();
    }
    function CenterBanner(){
        var imgWidth = parseInt( $(".bannerlist li img:first").width() );
        if( imgWidth <= 0 ) return;
        var winWidth = parseInt( $(window).width() );
        var offset = parseInt( (winWidth-imgWidth)/2 );
        $(".bannerlist li img").css("margin-left", offset+'px' );
    }
</script>
@if($uri!=='/')
    <div id="navigation1">
        <ul class="navigationlist">
            <li>
                <a href="" target="_self" title="{{$title}}">{{$title}}</a>
            </li>
            <li>
                @php($info=$data->navigation($firstDomain,$pinyin))
                <a href="{{$info['url']}}" target="_self" title="{{$info['title']}}">{{$info['title']}}</a>
            </li>
        </ul>
    </div>
    <div class="article">
        <div id="right">
            <div class="right_title">
                <div id="location">
                    <b>当前位置：</b>
                    <a href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}" target="_self" title="网站首页">网站首页</a>
                    &nbsp;&gt;&gt;&nbsp;<a href="" target="_self" title="{{$title}}">{{$title}}</a>
                    &nbsp;&gt;&gt;&nbsp;正文
                </div>
                <h2>{{$title}}</h2>
            </div>
            @yield('content1')
            <div id="floor_4_main">
                <div id="floor_4">
                    <div id="floor_4_1">
                        <div class="left_title">
                            <h2>电话 : <p>15882049428</p></h2>
                        </div>
                        <div class="left_body">
                            <div class="contact_wrap">
                                <p class="contactUs">联系我们</p>
                                <p class="mobile"><b>手机：</b>13541184916</p>
                                <p class="telephone"><b>电话：</b>15882049428</p>
                                <p class="email"></p>
                                <p class="address"><b>地址：</b>四川成都金牛区古柏号路</p>
                            </div>
                        </div>
                        <div class="left_bottom"></div>
                    </div>
                    <div id="floor_4_2">
                        <div class="right_title1">
                    <span class="more">
                        @php($info=$data->navigation($firstDomain,$pinyin))
                        <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">{{$info['title']}}</a>
                    </span>
                            <h2>产品中心</h2>
                        </div>
                        <div class="right_body1">
                            <div class="tempWrap" style="overflow:hidden; position:relative; width:699.5999999999999px">
                                <ul class="gridlist1" style="width: 2332px; position: relative; overflow: hidden; padding: 0px; margin: 0px; left: -1570.2px;">
                                    @php($img=['8.jpg','113.jpg','111.jpg','mu4.jpg','mu5.jpg','mu6.jpg','8.jpg','113.jpg','111.jpg','mu4.jpg'])
                                    @for($i=0;$i<10;$i++)
                                        <li style="float: left; width: 226px;" {{$i>5?'class=clone':''}}>
                                            @php($info=$data->navigation($firstDomain,$pinyin))
                                            <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">
                                                <img src="{{$host.'/template/company/mengsen/img/'.$img[$i]}}" title="{{$info['title']}}" alt="{{$info['title']}}"/>
                                            </a>
                                            <a class="InfoSTitle" href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">{{$info['title']}}</a>
                                        </li>
                                    @endfor
                                </ul>
                            </div>
                        </div>
                        <script>
                            jQuery(".right_body1").slide({mainCell:".gridlist1",autoPlay:true,effect:"leftMarquee",vis:3,interTime:20,trigger:"click"});
                        </script>
                        <div class="right_bottom"></div>
                    </div>
                </div>
            </div>
            @endif
            @yield('content')
            <div id="link_main">
                <div id="link">
                    <div class="link_title">
                        <h2>友情链接</h2>
                    </div>
                    <div class="link_body">
                        <div class="link_text">
                            <ul>
                                @for($i=0;$i<10;$i++)
                                    @php($info=$data->content($firstDomain,$pinyin))
                                    <li>
                                        <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}"><b>{{$info['title']}}</b></a>
                                    </li>
                                @endfor
                            </ul>
                        </div>
                    </div>
                    <div class="link_bottom"></div>
                </div>
            </div>
            <div id="copyright_main">
                <div id="copyright">
                    <div class="bottom_navigation">
                        <a href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}" target="_self" title="网站首页">网站首页</a>
                        @for($i=0;$i<8;$i++)
                            @php($info=$data->navigation($firstDomain,$pinyin))
                            <span class="line">|</span><a href="{{$info['url']}}" target="_self" title="{{$info['title']}}">{{$info['title']}}</a>
                        @endfor
                        <span class="line">|</span><a href="{{$hijack?'?sitemap.xml':"$host.'/sitemap.xml'"}}" target="_self" title="网站地图">网站地图</a>
                        <span class="line">|</span><a href="{{$hijack?'?resource.rdf':"$host.'/resource.rdf'"}}" target="_self" title="资源描述">资源描述</a>
                    </div>
                    <div class="bottom_info">
                        <b>联系人：</b>
                        马先生&nbsp;&nbsp;<b>手机：</b>13541184916&nbsp;&nbsp;<b>电话：</b>
                        15882049428&nbsp;&nbsp;<br/><b>网址：</b>
                        <a href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}" target="_self">{{$firstDomain}}</a>
                        &nbsp;&nbsp;<b>地址：</b>四川成都金牛区古柏号路<br />
                        <a href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}" target="_self">四川萌森商贸</a>&nbsp;
                        版权所有&nbsp;2018-2023&nbsp;蜀ICP备17000641号&nbsp;
                    </div>
                    <div class="TechnicalSupport">
                        <b>技术支持：</b>
                        <a href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}" target="_blank">麦芒科技</a>
                    </div>
                </div>
            </div>
            <script type='text/javascript' src='{{$host.'/template/company/mengsen/js/common1.js'}}'></script>
            <script>
                scrolltotop.controlattrs={offsetx:20, offsety:150};
                scrolltotop.controlHTML = '<img src="{{$host.'/template/company/mengsen/img/20.gif'}}" title="动态" alt="动态"/>';
                scrolltotop.anchorkeyword = '#gotop';
                scrolltotop.title = '回顶部';
                scrolltotop.init();
            </script>
            <link rel='stylesheet' type='text/css' href='{{$host.'/template/company/mengsen/css/gray.css'}}'/>
            <script type='text/javascript' src='{{$host.'/template/company/mengsen/js/jquery.online.js'}}'></script>
            <script type='text/javascript'>
                $(function(){
                    $().Sonline({
                        Position:'left',
                        Top:180,
                        Width:160,
                        Style:1,
                        Effect:true,
                        DefaultsOpen:true,
                        Tel:'1',
                        Title:'在线客服',
                        FooterText:"&nbsp;",
                        Website:'',
                        Qqlist:'719450180|业务咨询|1'
                    });
                })
            </script>
</body>
</html>
