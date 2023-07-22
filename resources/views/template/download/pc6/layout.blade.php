@php($data=app('App\Http\Controllers\CoreController'))
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>{!!$title!!}</title>
    <meta name="keywords" content="{!!$keywords!!}"/>
    <meta name="description" content="{!!$description!!}"/>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <meta http-equiv="Cache-Control" content="no-transform"/>
    <meta http-equiv="mobile-agent" content="format=xhtml; url=m.{{$firstDomain}}"/>
    <meta http-equiv="mobile-agent" content="format=html5; url=m.{{$firstDomain}}"/>
    <link href="{{$host.'/template/download/pc6/css/home.min.css'}}" type="text/css" rel="stylesheet"/>
    <link href="{{$host.'/template/download/pc6/css/yxlist.min.css'}}" type="text/css" rel="stylesheet"/>
    <link href="{{$host.'/template/download/pc6/favicon.ico'}}" rel="shortcut icon"/>
    <base target="_blank"/>
</head>
<body>
<p id="topNavC">
    <span id="topNav">
        <strong>{{$title}}：安全、高速、放心的专业下载站！</strong>
        <i>
            <a href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}" title="pc6首页">pc6首页</a>|
            @for($i=0;$i<6;$i++)
                @php($info=$data->navigation($firstDomain,$pinyin))
                <a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>|
            @endfor
            @php($info=$data->navigation($firstDomain,$pinyin))
            <a href="{{$info['url']}}" class="red" title="{{$info['title']}}">{{$info['title']}}</a>
        </i>
    </span>
</p>
<div id="topbanner"></div>
<dl id="header">
    <dt>
        <a href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}" id="logo" title="logo">
            <img src="{{$host.'/template/download/pc6/img/logo.png'}}" width="150" height="50" alt="PC6软件下载" title="PC6软件下载"/>
        </a>
        <div id="search">
            @php($info=$data->navigation($firstDomain,$pinyin))
            <form action="{{$info['url']}}" method="get" target="_blank" class="bdcs-search-form" id="bdcs-search-form">
                <input type="hidden" name="s" value="12026392560237532321"/>
                <input type="hidden" name="entry" value="1"/>
                <input type="hidden" name="ie" value="gbk"/>
                <input type="text" name="q" class="bdcs-search-form-input" id="bdcs-search-form-input" placeholder="" autocomplete="off"/>
                <input type="submit" class="bdcs-search-form-submit " id="bdcs-search-form-submit" value="搜索"/>
            </form>
            <p class="bdcs-hot" style="width:534px;">
                @for($i=0;$i<6;$i++)
                    @php($info=$data->content($firstDomain,$pinyin))
                    <a href="{{$info['url']}}" title="{{$info['title']}}" class="bdcs-hot-item red" target="_blank">{{$info['title']}}</a>
                @endfor
            </p>
        </div>
    </dt>
    <dd>
        <ul id="nav">
            <li class="clearfix">
                <a href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}" class="nav-cur" target="_self" title="首页">首页</a>
                @for($i=0;$i<5;$i++)
                    @php($info=$data->navigation($firstDomain,$pinyin))
                    <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">{{$info['title']}}</a>
                @endfor
            </li>
        </ul>
    </dd>
</dl>
@yield('content')
<div id="footer">
    <div class="bottomText greena">
        @for($i=0;$i<8;$i++)
            @php($info=$data->navigation($firstDomain,$pinyin))
            <a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a> ｜
        @endfor
        <a href="{{$hijack?'?sitemap.xml':"$host.'/sitemap.xml'"}}" title="网站地图">网站地图</a> |
        <a href="{{$hijack?'?resource.rdf':"$host.'/resource.rdf'"}}" title="资源描述">资源描述</a>
    </div>
    <p>
        备案编号:湘ICP备16001275号-10
        <img src="{{$host.'/template/download/pc6/img/ga.png'}}" style="position:relative;top:4px;margin-right:5px;" title="备案" alt="备案"/>湘公网安备 43010302000229号
    </p>
    <p>增值电信业务经营许可证： 湘B2-20160047
        <a target="_blank" href="{{$host.'/template/download/pc6/img/16f5d79b7540f43f.jpeg'}}" style="margin:0;" title="互联网文化经营单位">
            <img width="20px" src="{{$host.'/template/download/pc6/img/wenhuajingying.png'}}" style="position:relative;top:4px;margin-right:5px;" title="互联网文化经营单位" alt="互联网文化经营单位"/>互联网文化经营单位
        </a>
    </p>
</div>
<script type="text/javascript" charset="UTF-8" src="{{$host.'/template/download/pc6/js/index.min.js'}}"></script>
</body>
</html>

