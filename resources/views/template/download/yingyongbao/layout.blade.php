@php($data=app('App\Http\Controllers\CoreController'))
<!doctype html>
<html>
<head>
    <title>{!!$title!!}</title>
    <meta name="keywords" content="{!!$keywords!!}"/>
    <meta name="description" content="{!!$description!!}"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta itemprop="image" content="{{$host.'/template/download/yingyongbao/img/96.png'}}"/>
    <link rel="icon" href="{{$host.'/template/download/yingyongbao/favicon.ico'}}" type="image/x-icon"/>
    <link rel="stylesheet" type="text/css" href="{{$host.'/template/download/yingyongbao/css/sjqqapi.css'}}"/>
    <link href="{{$host.'/template/download/yingyongbao/css/indexLess-v1.css'}}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{$host.'/template/download/yingyongbao/css/categoryLess-v1.css'}}"/>
    <link rel="stylesheet" type="text/css" href="{{$host.'/template/download/yingyongbao/css/detailsLess-v1.css'}}"/>
    <style type="text/css">
        .com-menu-list-box .com-borderR{position:relative;}
        .com-new{width:24px; height:15px; display:inline-block; position:absolute; top:22px; margin:0; left:104px; background: url({{$host.'/template/download/yingyongbao/img/new-icon.png'}}) 0 0 no-repeat}
        .det-othinfo-pbox .det-othinfo-plist::-webkit-scrollbar, .m_download::-webkit-scrollbar,.scroll-style::-webkit-scrollbar,.giftPop::-webkit-scrollbar{ width: 9px; height: 9px;}
        .det-othinfo-pbox .det-othinfo-plist::-webkit-scrollbar-button:vertical, .det-othinfo-pbox .det-othinfo-plist::-webkit-scrollbar-button:horizontal,.m_download::-webkit-scrollbar-button:vertical,.scroll-style::-webkit-scrollbar-button:vertical,.giftPop::-webkit-scrollbar-button:vertical { display: none;}
        .det-othinfo-pbox .det-othinfo-plist::-webkit-scrollbar-track-piece,.m_download::-webkit-scrollbar-track-piece,.scroll-style::-webkit-scrollbar-track-piece,.giftPop::-webkit-scrollbar-track-piece{ background: #f0f0f0;}
        .det-othinfo-pbox .det-othinfo-plist::-webkit-scrollbar-thumb:vertical, .det-othinfo-pbox .det-othinfo-plist::-webkit-scrollbar-thumb:horizontal,.m_download::-webkit-scrollbar-thumb:vertical,.scroll-style::-webkit-scrollbar-thumb:vertical,.giftPop::-webkit-scrollbar-thumb:vertical { background-color: #b0b0b0; border-radius: 5px;}
        .det-othinfo-pbox .det-othinfo-plist::-webkit-scrollbar-thumb:vertical, .det-othinfo-pbox .det-othinfo-plist::-webkit-scrollbar-thumb:horizontal:hover,.m_download::-webkit-scrollbar-thumb:vertical:hover,.scroll-style::-webkit-scrollbar-thumb:vertical:hover,.giftPop::-webkit-scrollbar-thumb:vertical:hover { background-color: #999;}
        .det-othinfo-pbox{cursor: default; position: relative; padding-bottom: 4px;}
        .det-othinfo-pbox .det-othinfo-plist{display: none;}
        .det-othinfo-pbox:hover .det-othinfo-plist{display: block; position: absolute; top: 20px; left: 0;}
        .det-othinfo-pbox .det-othinfo-pre{background: url({{$host.'/template/download/yingyongbao/img/premission-icon.png'}}) no-repeat 0 1px; padding-left: 15px; width: 260px;}
        .det-othinfo-pbox:hover .det-othinfo-pre{color: #3375d6; background-position: 0 -84px; }
        .det-othinfo-pbox .det-othinfo-plist{ background: #fff; max-height: 250px; overflow-y:auto; border:1px #a2a2a2 solid; padding-bottom: 8px; color: #666; width: 168px;}
        .det-othinfo-pbox .det-othinfo-plist li{line-height: 20px; padding:0 12px;}
        .det-othinfo-pbox .det-othinfo-plist .t{color: #333; background: #eeeeee; height: 33px; line-height: 33px; padding-left: 13px; border-bottom: 1px #dbdbdb solid; margin-bottom: 6px;}
        .det-othinfo-pbox .det-othinfo-plist .l{float: left;}
        .det-othinfo-pbox .det-othinfo-plist .r{float: left; margin-left: 2px; width: 125px; word-break:break-word;}
        .det-ins-btn-box{margin-right: 0;}
        .det-ins-qrcode-box{float: right; width: 90px; margin:25px 18px 0 23px; text-align: center;}
        .det-ins-qrcode-box img{width: 80px; height: 80px; padding: 0; vertical-align: top;}
        .det-ins-qrcode-box .desc{color: #ababab; font-size: 12px; text-align: center; line-height: 16px;}
        .com-header-logo-link{background: url({{$host.'/template/download/yingyongbao/img/bde5244f582c085b7efb8ad2d831c4b1.png'}})!important;width: 161px!important;}
    </style>
    <!--[if lt IE 9]>
    <script type="text/javascript">
      var html5Tags=['header' ,'footer','article','nav' ,'section','aside'];
      for(var i=0;i<html5Tags.length;i++){
          document.createElement(html5Tags[i]);
      }
    </script>
    <![endif]-->
    <script async="" src="{{$host.'/template/download/yingyongbao/js/tcss.ping.https.js'}}"></script>
    <script charset="utf-8" async="" src="{{$host.'/template/download/yingyongbao/js/jquery-seajs.js'}}"></script>
    <script charset="utf-8" async="" src="{{$host.'/template/download/yingyongbao/js/index.js'}}"></script>
</head>
<body>
<div class="com-header">
    <div class="com-header-center-container">
        <a class="com-header-logo-link" id="J_logo" href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}" title="首页"></a>
        <ul class="com-menu-list-box">
            <li>
                <a {!!$uri==='/'?'class="com-menu-btn selected""':'class="com-menu-btn"'!!} id="J_index" href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}" title="首页">首页</a>
            </li>
            <li>
                @php($info=$data->navigation($firstDomain,$pinyin))
                <a {!!$uri!=='/'?'class="com-menu-btn selected""':'class="com-menu-btn"'!!}  href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                <i class="com-hot"></i>
            </li>
            <li>
                @php($info=$data->navigation($firstDomain,$pinyin))
                <a class="com-menu-btn"  href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">{{$info['title']}}</a>
            </li>
            <li class="com-borderR">
                @php($info=$data->navigation($firstDomain,$pinyin))
                <a class="com-menu-btn"  href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">{{$info['title']}}</a>
                <i class="com-hot com-new"></i>
            </li>
        </ul>
        <div class="clear"></div>
    </div>
</div>
<div class="com-nav">
    <div class="com-nav-center-container">
        <ul class="com-nav-list-box">
            @php($info=$data->navigation($firstDomain,$pinyin))
            <li><a {!!$uri==='/'?'class="com-nav-btn selected"':'class="com-nav-btn"'!!} href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a></li>
            @php($info=$data->navigation($firstDomain,$pinyin))
            <li><a {!!$uri!=='/'?'class="com-nav-btn selected"':'class="com-nav-btn"'!!}class="com-nav-btn" href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a></li>
            @php($info=$data->navigation($firstDomain,$pinyin))
            <li class="last"><a class="com-nav-btn " href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a></li>
        </ul>
        <div class="search">
            @php($info=$data->navigation($firstDomain,$pinyin))
            <form id="J_SearchForm" role="search" action="{{$info['url']}}" method="get">
                <label for="kw">
                    <input id="J_MainInput" autocomplete="off" class="search-input" type="text" value="搜索应用或游戏..." size="20" name="kw"/>
                    <input id="J_SearchBtn" type="submit" value="" class="icon-search"/>
                </label>
            </form>
            <div id="J_HotSearch" class="hot-search" data-loaded="false">
                <div class="hot-search-box">
                    <span class="hot-search-title">热门搜索</span>
                    <ul id="J_HotSearchList" class="hot-search-list"></ul>
                </div>
            </div>
            <div id="J_SearchAssociate" class="search-associate">
                <div class="hot-associate-box">
                    <ul id="J_AssociateList" class="associate-list"></ul>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
@yield('content')
<div class="com-footer" style="margin-top:50px;">
    <div class="com-footer-top-box clearfix">
        <div class="com-footer-top-item">
            <h3>合作和帮助</h3>
            @for($i=0;$i<4;$i++)
                @php($info=$data->navigation($firstDomain,$pinyin))
                <p><a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">{{$info['title']}}</a></p>
            @endfor
        </div>
        <div class="com-footer-top-item">
            <h3>产品动态</h3>
            @for($i=0;$i<3;$i++)
                @php($info=$data->navigation($firstDomain,$pinyin))
                <p><a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">{{$info['title']}}</a></p>
            @endfor
        </div>
        <div class="com-footer-top-item">
            <div class="erwm"></div>
            <h3>联系我们</h3>
            <p class="com-footer-contus">QQ    群：242141286</p>
            <p class="com-footer-contus">官方微博：
                @php($info=$data->navigation($firstDomain,$pinyin))
                <a class="qqweibo" target="_blank" href="{{$info['url']}}" title="{{$info['title']}}"></a>
                @php($info=$data->navigation($firstDomain,$pinyin))
                <a class="xinlaweibo" href="{{$info['url']}}" target="_blank" title="{{$info['title']}}"></a>
            </p>
            <p>微信公众账号：应用宝</p>
        </div>
    </div>
    <div class="keywords" style="text-align:center; color:#989898; margin-top:30px;">腾讯手机应用市场{{date('Y',time())}}   |   腾讯手机应用宝{{date('Y',time())}}</div>
    <div class="office-info" style="text-align:center; line-height:50px; margin-top:20px;">深圳市腾讯计算机系统有限公司</div>
    <div class="com-footer-center-container" style="padding-top:20px;">
        @for($i=0;$i<7;$i++)
            @php($info=$data->navigation($firstDomain,$pinyin))
            <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">{{$info['title']}}</a>|
        @endfor
        <a href="{{$hijack?'?sitemap.xml':"$host.'/sitemap.xml'"}}" target="_blank" title="网站地图">网站地图</a>|
        <a href="{{$hijack?'?resource.rdf':"$host.'/resource.rdf'"}}" target="_blank" title="资源描述">资源描述</a>
        <div>Copyright © 2012 - {{date('Y',time())}} Tencent. All Rights Reserved.</div>
        <div class="security clearfix" style="width: 500px;_width:370px;*width: 370px;margin: auto; margin-top: 30px;">
            <p style="display: inline-block;margin-left: 30px;_display:inline;*display: inline;font-size: 12px;line-height: 20px;">
                    <span class="fl"  style="float: left;padding: 3px;">
                        <a href="" style="padding: 0px;" target="_blank" rel="nofollow" title="深圳网络警察报警平台">
                            <img width="44" height="50" border="0" alt="深圳网络警察报警平台" title="深圳网络警察报警平台" src="{{$host.'/template/download/yingyongbao/img/police.png'}}"/>
                        </a>
                    </span>
                <span class="fr" style="float: left;padding: 10px 3px 0;width: 72px;">
                        <a href="" style="color: #fff;padding: 0;" target="_blank" rel="nofollow" title="深圳网络警察报警平台">深圳网络警<br>察报警平台</a>
                    </span>
            </p>
            <p style="display: inline-block;margin-left: 30px;_display:inline;*display: inline;font-size: 12px;line-height: 20px;">
                    <span class="fl" style="float: left;padding: 3px;">
                        <a href="" target="_blank" style="padding: 0px;" rel="nofollow" title="公共信息安全网络监察">
                            <img width="41" height="49" border="0" alt="公共信息安全网络监察" title="公共信息安全网络监察" src="{{$host.'/template/download/yingyongbao/img/security.png'}}"/>
                        </a>
                    </span>
                <span class="fr" style="float: left;padding: 10px 3px 0;width: 72px;">
                        <a href="" target="_blank" style="color: #fff;padding: 0;" rel="nofollow" title="公共信息安全网络监察">公共信息安<br>全网络监察</a>
                    </span>
            </p>
            <p style="display: inline-block;margin-left: 30px;_display:inline;*display: inline;font-size: 12px;line-height: 20px;">
                    <span class="fl" style="float: left;padding: 3px;">
                        <a href="" style="padding: 0px;" target="_blank" rel="nofollow" title="中国互联网协会认证标志">
                            <img width="48" height="48" border="0" alt="中国互联网协会认证标志" title="中国互联网协会认证标志" src="{{$host.'/template/download/yingyongbao/img/anva-c.png'}}"/>
                        </a>
                    </span>
            </p>
            <p style="display: inline-block;margin-left: 30px;_display:inline;*display: inline;font-size: 12px;line-height: 20px;">
                    <span class="fl" style="float: left;padding: 3px;">
                        <a href="" style="padding: 0px;" target="_blank" rel="nofollow" title="中国互联网协会认证标志">
                            <img width="48" height="48" border="0" alt="中国互联网协会认证标志" title="中国互联网协会认证标志" src="{{$host.'/template/download/yingyongbao/img/anva-e.png'}}"/>
                        </a>
                    </span>
            </p>
        </div>
    </div>
</div>
<script>
    //PC版本号
    pcversion = "5.8.2.5300"
</script>
<script type="text/javascript" src="{{$host.'/template/download/yingyongbao/js/jquery.js'}}"></script>
<script language="javascript" src="{{$host.'/template/download/yingyongbao/js/tvp.player_v2_jq.js'}}" charset="utf-8"></script>
<script type="text/javascript" src="{{$host.'/template/download/yingyongbao/js/common1216-v1.js'}}"></script>
<script type="text/javascript" src="{{$host.'/template/download/yingyongbao/js/index1231.js'}}"></script>
<script type="text/javascript">
    //点击播放视频
    $("#J_index-new-video").on("click",function(){
        $(".mask").show().height($(document).height());
        $(".video").show();
        $("#J_video").createTVP({
            video:{vid:"x0158xz40kj"},
            width:619,
            height:381
        });
    });
</script>
<script type="text/javascript" src="{{$host.'/template/download/yingyongbao/js/tcssx.js'}}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.J_cmd[data-stat]').on('click', function(){
            var $this = $(this);

            if(typeof pgvSendClick==='function'){
                pgvSendClick({hottag:'index.click.'+$this.data('stat')});
            }
        });
    });
</script>
</body>
</html>

