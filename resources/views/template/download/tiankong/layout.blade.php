@php($data=app('App\Http\Controllers\CoreController'))
<!DOCTYPE html>
<html>
<head>
    <title>{!!$title!!}</title>
    <meta name="keywords" content="{!!$keywords!!}"/>
    <meta name="description" content="{!!$description!!}"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" type="text/css" href="{{$host.'/template/download/tiankong/css/base.css'}}"/>
    <link rel="stylesheet" type="text/css" href="{{$host.'/template/download/tiankong/css/list.css'}}"/>
    <link rel="stylesheet" type="text/css" href="{{$host.'/template/download/tiankong/css/bdsstyle.css'}}"/>
    <link rel="stylesheet" type="text/css" href="{{$host.'/template/download/tiankong/css/detail.css'}}"/>
</head>
<body>
<div class="container">
    <div class="top-bar">
        <div class="row">
            <p class="welcome"><i class="ico-msg"></i>软件下载，软件应用，就到天空软件下载站~</p>
            <p class="user-tools">
                <a href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}" target="_blank" title="提交应用">提交应用</a>
                <s>|</s>
                <a class="item j-add-fav" href="#" title="收藏本页">收藏本页</a>
            </p>
        </div>
    </div>
    <div class="header">
        <div class="logo fl">
            <a href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}" title="天空软件下载">
                <img src="{{$host.'/template/download/tiankong/img/logo.png'}}" alt="天空软件下载" title="天空软件下载"/>
            </a>
        </div>
        <div class="search-form">
            @php($info=$data->navigation($firstDomain,$pinyin))
            <form action="{{$info['url']}}" method="get" id="j_search_form">
                <div class="key-form">
                    <input type="text" class="key" name="key" inptips="输入软件名称，例如：QQ" value="" id="j_autocomplete"/>
                    <button type="submit" class="btn">软件搜索</button>
                    <span class="ico hot-btn" id="j_auto_btn">
                        <i class="ico hot-num">0</i>
                    </span>
                </div>
            </form>
            <div id="hot-words">
                <span>搜索热词：</span>
                @for($i=0;$i<3;$i++)
                    @php($info=$data->content($firstDomain,$pinyin))
                    <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">{{$info['title']}}</a>
                @endfor
            </div>
        </div>
    </div>
    <link rel="stylesheet" type="text/css" href="{{$host.'/template/download/tiankong/css/index.css'}}"/>
    <div class="main-nav">
        <ul class="menu clearfix">
            @for($i=0;$i<4;$i++)
                @php($info=$data->navigation($firstDomain,$pinyin))
                <li {{!$i?'class=current':''}}>
                    <a href="{{$info['url']}}" title="{{$info['title']}}">
                        <i class="ico-pc"></i>{{$info['title']}}
                    </a>
                </li>
            @endfor
        </ul>
        <div class="nav-ext">
            <a href="/" target="_blank" title="提交应用">提交应用</a>
            @php($info=$data->content($firstDomain,$pinyin))
            <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">
                <span>{{$info['title']}}</span>
            </a>
        </div>
    </div>
    <div class="row main-row mt10" monkey="skycn-index">
        <div class="lay-160 fl">
            <div class="left-nav" id="j_left_nav" monkey="category">
                <ul class="left-cat">
                    <li class="item open">
                        <strong class="sub-menu">
                            <i class="ico ico-all"></i>所有分类
                            <i class="ico ico-arr"></i>
                        </strong>
                        <ul class="child-cat">
                            @for($i=0;$i<21;$i++)
                                @php($info=$data->navigation($firstDomain,$pinyin))
                                <li class="sub">
                                    <a href="{{$info['url']}}" {{!$i?'class=red':''}} {{!$i?'target=_self':''}} title="{{$info['title']}}">
                                        <i class="fst">·</i>{{$info['title']}}
                                        @if($i)
                                            <i class="ext">({{mt_rand(0,9999)}})</i>
                                        @endif
                                    </a>
                                </li>
                            @endfor
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        @yield('content')
        <div class="footer">
            <p>
            @for($i=0;$i<4;$i++)
                @php($info=$data->navigation($firstDomain,$pinyin))
                <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">{{$info['title']}}</a>&nbsp;<s>|</s>&nbsp;
            @endfor
                <a href="{{$hijack?'?sitemap.xml':"$host.'/sitemap.xml'"}}" target="_blank" title="网站地图">网站地图</a>&nbsp;<s>|</s>&nbsp;
                <a href="{{$hijack?'?resource.rdf':"$host.'/resource.rdf'"}}" target="_blank" title="资源描述">资源描述</a>
            </p>
            <p>Copyright © 1998-{{date('Y',time())}} {{$firstDomain}} All Rights Reserved</p>
            <p>京ICP证060522号 &nbsp;京网文[2016]0627-032号</p>
        </div>
        <div class="adfix leftad">
            <a href="#" class="adclosed" title="关闭">×</a>
            <a target="_blank" href="#">
                <img src="" alt="" data-pic="">
            </a>
        </div>
        <div class="adfix rightad">
            <a href="#" class="adclosed" title="关闭">×</a>
            <a target="_blank" href="#">
                <img src="" alt="" data-pic="">
            </a>
        </div>
        <div class="downadfix">
            <div class="downadcontent">
                <a href="#" class="adclosed" title="关闭"></a>
                <a href="">
                    <img src="" alt="" data-pic="" data-col="">
                </a>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{$host.'/template/download/tiankong/js/jquery-1.9.1.min.js'}}"></script>
    <script type="text/javascript" src="{{$host.'/template/download/tiankong/js/ad.js'}}"></script>
    <script type="text/javascript" src="{{$host.'/template/download/tiankong/js/jquery.taber.js'}}"></script>
    <script type="text/javascript" src="{{$host.'/template/download/tiankong/js/jquery.hover.js'}}"></script>
    <script type="text/javascript" src="{{$host.'/template/download/tiankong/js/jquery.autocomplete.js'}}"></script>
    <script type="text/javascript" src="{{$host.'/template/download/tiankong/js/jquery.placeholder.js'}}"></script>
<!--[if lt IE 7]>
<script type="text/javascript" src="{{$host.'/template/download/tiankong/js/DD_belatedPNG.js'}}"></script>
<script type="text/javascript">
    $(function(){
        DD_belatedPNG.fix(".header .logo");
    });
</script>
<![endif]-->
    <script type="text/javascript" src="{{$host.'/template/download/tiankong/js/init.js'}}"></script>
</body>
</html>

