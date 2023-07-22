@php($data=app('App\Http\Controllers\CoreController'))
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312"/>
    <meta http-equiv="X-UA-Compatible" content="IE=7"/>
    <title>{!!$title!!}</title>
    <meta name="keywords" content="{!!$keywords!!}"/>
    <meta name="description" content="{!!$description!!}"/>
    <link href="{{$host.'/template/download/yuanma/css/download.css'}}" type="text/css" rel="stylesheet"/>
    <link href="{{$host.'/template/download/yuanma/css/topbar.css'}}" type="text/css" rel="Stylesheet"/>
    <link rel="shortcut icon" type="image/ico" href="{{$host.'/template/download/yuanma/favicon.ico'}}"/>
    <script type="text/javascript" src="{{$host.'/template/download/yuanma/js/jquery.js'}}"></script>
    <script type="text/javascript" src="{{$host.'/template/download/yuanma/js/main.js'}}"></script>
    <script class="CLASS42bc4e2f_b826_11e9_9ed0_18dbf2568723" src="{{$host.'/template/download/yuanma/js/propagate.js'}}"></script>
</head>
<body id="downchinaz">
<div class="toolbar">
    <div class="clearfix toolbar-inner">
        <div class="quicklink">
            <ul id="chinaz_website_links" class="accesslink">
                <li>
                    <a href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}">
                        <span>{!!$title!!}之家</span>
                    </a>
                </li>
                @php($info=$data->navigation($firstDomain,$pinyin))
                <li onmouseover="chinazTopBarMenu.create(this,'chinaz_website_menu_1');" onmouseout="chinazTopBarMenu.clear(this);">
                    <a class="item-expand" href="{{$info['url']}}" target="_blank">
                        <span>{{$info['title']}}</span>
                    </a>
                </li>
                @php($info=$data->navigation($firstDomain,$pinyin))
                <li onmouseover="chinazTopBarMenu.create(this,'chinaz_website_menu_2');" onmouseout="chinazTopBarMenu.clear(this);">
                    <a class="item-expand" href="{{$info['url']}}" target="_blank">
                        <span>{{$info['title']}}</span>
                    </a>
                </li>
                @for($i=0;$i<3;$i++)
                    @php($info=$data->navigation($firstDomain,$pinyin))
                    <li>
                        <a href="{{$info['url']}}" target="_blank">
                            <span>{{$info['title']}}</span>
                        </a>
                    </li>
                @endfor
            </ul>
            <div id="chinaz_website_menu_1" class="topbar-hiddencontents">
                @for($i=0;$i<7;$i++)
                    @php($info=$data->content($firstDomain,$pinyin))
                    <a href="{{$info['url']}}" target="_blank">{{$info['title']}}</a>
                @endfor
            </div>
            <div id="chinaz_website_menu_2" class="topbar-hiddencontents">
                @for($i=0;$i<6;$i++)
                    @php($info=$data->content($firstDomain,$pinyin))
                    <a href="{{$info['url']}}" target="_blank">{{$info['title']}}</a>
                @endfor
            </div>
        </div>
        <div id="chinaz_topbar"></div>
    </div>
</div>
<div class="wrapper">
    <div class="clearfix header">
        <div class="brand">
            <h1 class="logo">
                <a href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}">站长下载 {{$firstDomain}}</a>
            </h1>
        </div>
        <div class="adtext">
            @php($info=$data->navigation($firstDomain,$pinyin))
            <a href="{{$info['url']}}" target="_blank">
                <img src="{{$host.'/template/download/yuanma/img/tufu336.png'}}" border="0" width="280" height="60"/>
            </a>
        </div>
        <div class="banner banner-top">
            @php($info=$data->navigation($firstDomain,$pinyin))
            <a href="{{$info['url']}}" target="_blank">
                <img src="{{$host.'/template/download/yuanma/img/seojf.gif'}}" height="60" width="460"/>
            </a>
        </div>
    </div>
    <div class="nav">
        <div class="nav-inner">
            <div class="clearfix nav-inner">
                <ul class="navlist">
                    @for($i=0;$i<6;$i++)
                        @php($info=$data->navigation($firstDomain,$pinyin))
                        <li>
                            <a {{!$i?'class=current':''}} href="{{$info['url']}}" target="_blank"><span>{{$info['title']}}</span></a>
                        </li>
                    @endfor
                </ul>
                <div class="search">
                    @php($info=$data->navigation($firstDomain,$pinyin))
                    <form name="searchform" method="get" action="{{$info['url']}}">
                        <span class="textwrap">
                            <input type="text" id="key" onfocus="this.value='';this.style.color='#000';" class="text" value="请输入关键字"/>
                        </span>
                        <input type="submit" class="button" value="搜索"/>
                    </form>
                </div>
                <div class="navlink">
                    @for($i=0;$i<12;$i++)
                        @php($info=$data->content($firstDomain,$pinyin))
                        <a href="{{$info['url']}}" target="_blank">{{$info['title']}}</a>
                    @endfor
                </div>
                <p class="navpublish"></p>
            </div>
        </div>
    </div>
    <div class="banner banner-leaderboard">
        <div id="AD526a2349-1866-4317-a4c1-c42753659133" class="CLASS42bc4e2f_b826_11e9_9ed0_18dbf2568723">
            <ul class="content">
                <li class="current">
                    @php($info=$data->content($firstDomain,$pinyin))
                    <a href="{{$info['url']}}" target="_blank">
                        <img src="{{$host.'/template/download/yuanma/img/7c3744c0b93a66b89d782222ecb975be.gif'}}" width="980" height="50"/>
                    </a>
                </li>
            </ul>
        </div>
        <div id="ADc2219a01-9397-4277-98e2-a68ee7bfab6c" class="CLASS42bc4e2f_b826_11e9_9ed0_18dbf2568723">
            <ul class="content">
                <li class="current">
                    @php($info=$data->content($firstDomain,$pinyin))
                    <a href="{{$info['url']}}" target="_blank">
                        <img src="{{$host.'/template/download/yuanma/img/mifenlei.gif'}}" width="980" height="50"/>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    @if($uri!=='/')
        <div class="panel subnav">
            <div class="panel-head">
                <div class="inner">
                    您的位置: <a href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}">站长下载</a> &raquo;
                    @php($info=$data->content($firstDomain,$pinyin))
                    <a href="{{$info['url']}}">{!!$title!!}</a> &raquo;
                </div>
            </div>
    @endif
    @yield('content')
    <div class="footer">
        <p class="footer-nav">
            @for($i=0;$i<8;$i++)
                @php($info=$data->navigation($firstDomain,$pinyin))
                <a href="{{$info['url']}}" target="_blank">{{$info['title']}}</a> |
            @endfor
                <a href="{{$hijack?'?sitemap.xml':"$host.'/sitemap.xml'"}}" target="_blank" title="网站地图">网站地图</a>|
                <a href="{{$hijack?'?resource.rdf':"$host.'/resource.rdf'"}}" target="_blank" title="资源描述">资源描述</a>
        </p>
        <p>CopyRight 2002-{{date('Y',time())}} {!!$title!!}之家 {{$firstDomain}} ,All Rights Reserved </p>
        <p>闽ICP备08105208号 增值电信业务经营许可证闽B2-20070004号</p>
    </div>
</div>
</body>
</html>
