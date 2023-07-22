@php($data=app('App\Http\Controllers\CoreController'))
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{!!$title!!}</title>
    <meta name="keywords" content="{!!$keywords!!}"/>
    <meta name="description" content="{!!$description!!}"/>
    <link rel="stylesheet" type="text/css" href="{{$host.'/template/download/yiqiba/css/nav.css'}}"/>
    <link href="{{$host.'/template/download/yiqiba/css/css.css'}}" rel="stylesheet" type="text/css"/>
    <link href="{{$host.'/template/download/yiqiba/css/public.css'}}" rel="stylesheet" type="text/css"/>
    <link href="{{$host.'/template/download/yiqiba/css/colorbox.css'}}" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="{{$host.'/template/download/yiqiba/js/jquery-1.7.2.min.js'}}"></script>
    <script type="text/javascript" src="{{$host.'/template/download/yiqiba/js/jquery.colorbox_new.js'}}"></script>
    <script type="text/javascript" src="{{$host.'/template/download/yiqiba/js/personal.js'}}"></script>
    <link href="{{$host.'/template/download/yiqiba/favicon.ico'}}" rel="shortcut icon"/>
</head>
<body>
<div class="wrap">
    <div class="head">
        <div class="logo">
            <a href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}" title="178游戏库">
                <img src="{{$host.'/template/download/yiqiba/img/logo.png'}}" class="ie6png" alt="178游戏库"/>
            </a>
        </div>
        <ul class="nav">
            <li class="current">
                <a href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}" onfocus=this.blur() class="index">首页</a>
            </li>
            <li class="">
                @php($info=$data->navigation($firstDomain,$pinyin))
                <a href="{{$info['url']}}" onfocus=this.blur() class="find">{{$info['title']}}</a>
            </li>
            <li class="">
                @php($info=$data->navigation($firstDomain,$pinyin))
                <a href="{{$info['url']}}" onfocus=this.blur() class="firm">{{$info['title']}}</a>
            </li>
            <li class="">
                @php($info=$data->navigation($firstDomain,$pinyin))
                <a href="{{$info['url']}}" onfocus=this.blur() class="my">{{$info['title']}}</a>
            </li>
        </ul>
        <div class="search fr">
            @php($info=$data->content($firstDomain,$pinyin))
            <form id="headSearchForm" name="headSearchForm" action="{{$info['url']}}" method="get" onSubmit="return doSearch(this);"/>
            <input name="s" type="text" class="txt" value="输入游戏名、厂商名" autocomplete="off" id="mySearch"/>
            <input type="button" value="搜索" class="btn" onclick="return doSearch(document.getElementById('headSearchForm'))" />
            <div id="headSearchTypes" class="options">
                <ul id="searchgame" style="display:none;"></ul>
                <ul id="searchcompany" class="no-border" style="display:none;"></ul>
            </div>
            </form>
        </div>
    </div>
    <style type="text/css">
        .sharebox { width:58px; margin:0; overflow:hidden; text-align:center; font:bolder 16px/18px Tahoma, Geneva, sans-serif; color:#989898; background:url({{$host.'/template/download/yiqiba/img/fx2.png'}}) 0 50px no-repeat !important;_background:url({{$host.'/template/download/yiqiba/img/fx2.gif'}}) 0 50px no-repeat !important;position: absolute;top:370px;left:50%;margin-left:-550px; height:247px; z-index:2147483647;}
        .sharebox .sharenum { color:#f2f2f2; background:url({{$host.'/template/download/yiqiba/img/fx1.png'}}) 0 0 no-repeat;_background:url({{$host.'/template/download/yiqiba/img/fx1.gif'}}) 0 0 no-repeat; height:54px; padding:0;}
        .sharebox .sharenum span { display:block; text-decoration:underline; padding-top:8px;}
        #bdshare { margin:0; padding:0 11px 6px !important;}
    </style>
    <div class="sharebox" id="fixbdshare">
        @php($info=$data->content($firstDomain,$pinyin))
        <a href="{{$info['url']}}" target="_self">
            <div class="sharenum">
                <span id="share-comment-total"></span>
            </div>
        </a>
        <div id="bdshare" class="bdshare_t bds_tools_32 get-codes-bdshare">
            <a class="bds_tsina" style="background:url({{$host.'/template/download/yiqiba/img/fx-sina.jpg'}}) no-repeat scroll 0 0 transparent !important;height: 37px; margin-top:2px;margin-left: 3px;display: block;float: left; text-indent: -100em;display:inline"></a>
            <a class="bds_tqq" style="background:url({{$host.'/template/download/yiqiba/img/fx-qq.jpg'}}) 0 0 no-repeat !important;height: 30px;margin-left: 3px;margin-top: 2px; display:inline"></a>
            <a class="bds_qzone" style="background:url({{$host.'/template/download/yiqiba/img/fx-z.jpg'}}) 0 0 no-repeat !important;height: 30px;margin-left: 3px;margin-top: 9px;display:inline"></a>
            <a class="bds_renren" style="background:url({{$host.'/template/download/yiqiba/img/fx-rr.jpg'}}) 0 0 no-repeat !important;height: 30px;margin-left: 3px;margin-top: 9px;display:inline"></a>
            <span class="bds_more" style="background:url({{$host.'/template/download/yiqiba/img/fx-more.jpg'}}) 0 8px no-repeat !important; height:38px; margin-left:3px; padding:0;display:inline"></span>
        </div>
        <script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=6491179"></script>
        <script type="text/javascript" id="bdshell_js"></script>
        <script type="text/javascript">
            var bds_config = {'snsKey':{'tsina':'3938048249','tqq':'8b5c8745ea364613adfda05c616d9abe'}};
            document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
        </script>
        <script type="text/javascript">
            (function(){
                var handle = null;
                var times = 0;
                var run = function() {
                    clearTimeout(handle);
                    if(times > 10) { return; }
                    var tweets_area = document.getElementById('tweets_area');
                    var comment_count = [];
                    if(tweets_area && tweets_area.contentWindow) {
                        if(document.getElementsByClassName) {
                            comment_count = tweets_area.contentWindow.document.getElementsByClassName('total-count');
                        } else {
                            var SPANs = document.getElementById('tweets_area').contentWindow.document.getElementsByTagName('span');
                            if(SPANs.length > 0) {
                                var oRegExp = new RegExp("(^|\\s)total-count(\\s|$)");
                                for(var i = 0; i < SPANs.length; i++) {
                                    if(oRegExp.test(SPANs[i].className)) {
                                        comment_count.push(SPANs[i]);
                                    }
                                }
                            }
                        }
                    }
                    if(comment_count.length > 0) {
                        document.getElementById('share-comment-total').innerHTML = comment_count[0].innerHTML.replace(/\((\d+)\)/, '$1');
                    } else {
                        times += 1;
                        handle = setTimeout(run, 500);
                    }
                };
                handle = setTimeout(run, 500);
            })();
            // ����
            (function(){
                var box = document.getElementById('fixbdshare');
                var default_offsetTop = box.offsetTop;
                var default_style_exp = 'position:'+box.style.position+';top:'+box.style.top;
                var move_top = 370;
                var get_scroll_top = null;
                var change_style = move_style_exp = null;
                if(window.innerWidth) {
                    get_scroll_top = function() {return window.pageYOffset;}
                    change_style = function(el, exp) {
                        el.setAttribute('style', exp);
                    }
                    move_style_exp = 'position:fixed;top:'+move_top+'px';
                } else if(document.documentElement && document.documentElement.clientWidth) {
                    get_scroll_top = function() {return document.documentElement.scrollTop;}
                    change_style = function(el, exp) {
                        el.style.cssText = exp;
                    }
                    move_style_exp = 'position:fixed;top:'+move_top+'px;_position:absolute;_top:expression(eval(document.documentElement.scrollTop+'+move_top+'))';
                } else if(document.body.clientWidth) {
                    get_scroll_top = function() {return document.body.scrollTop;}
                    change_style = function(el, exp) {
                        el.style.cssText = exp;
                    }
                    move_style_exp = 'position:fixed;top:'+move_top+'px;_position:absolute;_top:expression(eval(document.body.scrollTop+'+move_top+'))';
                } else {
                    return;
                }
                var fixed = false;
                var share_onscroll = function() {
                    var scroll_top = get_scroll_top();
                    if(scroll_top >= default_offsetTop - move_top) {
                        if(!fixed) {
                            change_style(box, move_style_exp);
                            fixed = true;
                        }
                    } else if(box.offsetTop != default_offsetTop) {
                        if(fixed) {
                            change_style(box, default_style_exp);
                            fixed = false;
                        }
                    }
                }
                var binded_onscroll = window.onscroll;
                if(binded_onscroll) {
                    window.onscroll = function() {
                        share_onscroll();
                        binded_onscroll();
                    }
                } else {
                    window.onscroll = share_onscroll;
                }
            })();
        </script>
    </div>
    @if($uri!=='/')
        <div class="container">
            <div class="position">
                <a href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}">178游戏库</a><span>&raquo;</span>{!!$title!!}找游戏
            </div>
    @endif
    @yield('content')
    <div id="feedback-box">
        @php($info=$data->navigation($firstDomain,$pinyin))
        <a href="{{$info['url']}}" target="_blank"> {{$info['title']}} </a>
        <a href="{{$hijack?'?sitemap.xml':"$host.'/sitemap.xml'"}}" target="_blank" title="网站地图">网站地图</a>
        <a href="{{$hijack?'?resource.rdf':"$host.'/resource.rdf'"}}" target="_blank" title="资源描述">资源描述</a>
    </div>
</body>
</html>
