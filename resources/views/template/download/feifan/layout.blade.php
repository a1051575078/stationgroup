@php($data=app('App\Http\Controllers\CoreController'))
<!DOCTYPE html>
<html>
<head>
    <title>{!!$title!!}</title>
    <meta name="keywords" content="{!!$keywords!!}"/>
    <meta name="description" content="{!!$description!!}"/>
    <meta charset="utf-8"/>
    <link rel="shortcut icon" type="image/x-icon" href="{{$host.'/template/download/feifan/favicon.ico'}}"/>
    <link href="{{$host.'/template/download/feifan/css/game.css'}}" type="text/css" rel="stylesheet"/>
    <link href="{{$host.'/template/download/feifan/css/adown.css'}}" type="text/css" rel="stylesheet"/>
    <script src="{{$host.'/template/download/feifan/js/jquery-1.3.2.min.js'}}" type="text/jscript" language="javascript"></script>
    <script src="{{$host.'/template/download/feifan/js/jq-public1.js'}}" type="text/jscript" language="javascript"></script>
</head>
<body>
<div class="topnav">
    <div class="warp">
	<span class="fl topnav_left">
        <a href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}" title="{!!$title!!}首页" target="_blank">{!!$title!!}首页</a>|
        @for($i=0;$i<5;$i++)
            @php($info=$data->navigation($firstDomain,$pinyin))
            <a href="{{$info['url']}}" title="{{$info['title']}}" target="_blank">{{$info['title']}}</a>|
        @endfor
        @php($info=$data->navigation($firstDomain,$pinyin))
        <a href="{{$info['url']}}" title="{{$info['title']}}" target="_blank">{{$info['title']}}</a>
    </span>
        <span class="fr Rtop">
            <div id="userlogin"></div>
        </span>
    </div>
</div>
<div class="header">
    <div class="warp">
        <div class="logo fl">
            <a href="/">
                <img src="{{$host.'/template/download/feifan/img/logo.png'}}" width="183" height="67" alt="logo" title="logo"/>
            </a>
        </div>
        <div id="seach" class="fr">
            <div class="hot">
                @for($i=0;$i<4;$i++)
                    @php($info=$data->content($firstDomain,$pinyin))
                    <a {{$i%2===0?'class=yellow':''}} href="{{$info['url']}}" title="{{$info['title']}}" target="_blank">{{$info['title']}}</a>|
                @endfor
                @php($info=$data->content($firstDomain,$pinyin))
                    <a href="{{$info['url']}}" title="{{$info['title']}}" target="_blank">{{$info['title']}}</a>
            </div>
            <form action="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}" target="_blank">
                <input class="search_form_input" id="search_form_input" placeholder="" autocomplete="off" type="text">
                <input class="search_form_submit" id="search_form_submit" value="搜索" type="submit">
            </form>
        </div>
    </div>
</div>
<div style="overflow: hidden;" class="TopNav-showWrap" id="Navbar">
    <div class="TopNav-layout">
        <div class="TopNav-menu line">
            <div class="TopNav-content container">
                <div class="TopNav-Centbox">
                    <div class="TopNav-MenuItem TopNav-MenuItem-index"><a class="menu-title Mhlight" href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}">首页</a></div>
                    <div class="TopNav-MenuItem TopNav-MenuItemThree">
                        @php($info=$data->navigation($firstDomain,$pinyin))
                        <a class="menu-title" href="{{$info['url']}}">{{$info['title']}}</a>
                        <div class="MenuItemCent leftbor">
                            <ul class="MenuItem-SubList">
                                @for($i=0;$i<13;$i++)
                                    @php($info=$data->content($firstDomain,$pinyin))
                                    <li class="SubItem-wp">
                                        <a class="TNMI-SubItem" href="{{$info['url']}}" target="_blank">{{$info['title']}}</a>
                                    </li>
                                @endfor
                            </ul>
                        </div>
                    </div>
                    <div class="TopNav-MenuItem TopNav-MenuItemOne">
                        @php($info=$data->navigation($firstDomain,$pinyin))
                        <a class="menu-title " href="{{$info['url']}}">{{$info['title']}}</a>
                        <div class="MenuItemCent" >
                            <ul class="MenuItem-SubList">
                                @for($i=0;$i<2;$i++)
                                    @php($info=$data->content($firstDomain,$pinyin))
                                    <li class="SubItem-wp">
                                        <a class="TNMI-SubItem" href="{{$info['url']}}" target="_blank">{{$info['title']}}</a>
                                    </li>
                                @endfor
                            </ul>
                        </div>
                    </div>
                    <div class="TopNav-MenuItem TopNav-MenuItemOne">
                        @php($info=$data->navigation($firstDomain,$pinyin))
                        <a class="menu-title " href="{{$info['url']}}">{{$info['title']}}</a>
                        <div class="MenuItemCent">
                            <ul class="MenuItem-SubList">
                                @for($i=0;$i<2;$i++)
                                    @php($info=$data->content($firstDomain,$pinyin))
                                    <li class="SubItem-wp">
                                        <a class="TNMI-SubItem" href="{{$info['url']}}" target="_blank">{{$info['title']}}</a>
                                    </li>
                                @endfor
                            </ul>
                        </div>
                    </div>
                    <div class="TopNav-MenuItem TopNav-MenuItemtwo">
                        @php($info=$data->navigation($firstDomain,$pinyin))
                        <a class="menu-title " href="{{$info['url']}}">{{$info['title']}}</a>
                        <div class="MenuItemCent" style=" padding-left:0;">
                            <ul class="MenuItem-SubList">
                                @for($i=0;$i<5;$i++)
                                    @php($info=$data->content($firstDomain,$pinyin))
                                    <li class="SubItem-wp">
                                        <a class="TNMI-SubItem" href="{{$info['url']}}" target="_blank">{{$info['title']}}</a>
                                    </li>
                                @endfor
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@if($uri!=='/')
    <div class="seat">您当前位置：
        <a href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}">下载首页</a>
        →
        {!!$title!!}
    </div>
@endif
@yield('content')
<div class="footer clearfix bg">
    <p class="sitelinks">
        @for($i=0;$i<7;$i++)
            @php($info=$data->navigation($firstDomain,$pinyin))
            <a href="{{$info['url']}}">{{$info['title']}}</a> |
        @endfor
            <a href="{{$hijack?'?sitemap.xml':"$host.'/sitemap.xml'"}}" title="网站地图">网站地图</a> |
            <a href="{{$hijack?'?resource.rdf':"$host.'/resource.rdf'"}}" title="资源描述">资源描述</a>
    </p>
    <p class="copyright">
        {!!$title!!}软件站({!!$title!!}) 版权所有 Copyright(C) 1999-{{date('Y',time())}} {{$firstDomain}} All Rights Reserved.
        <a rel="nofollow" href="https://beian.miit.gov.cn/" target="_blank">浙ICP备20024796号-1</a>
    </p>
</div>
</body>
</html>
