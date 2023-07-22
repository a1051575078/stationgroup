@php($data=app('App\Http\Controllers\CoreController'))
<!DOCTYPE html>
<html>
<head>
    <title>{!!$title!!}</title>
    <meta name="keywords" content="{!!$keywords!!}"/>
    <meta name="description" content="{!!$description!!}"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="renderer" content="webkit"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no"/>
    <link rel="stylesheet" type="text/css" href="{{$host.'/template/company/beijingqiche/css/public.css'}}"/>
    <link rel="stylesheet" type="text/css" href="{{$host.'/template/company/beijingqiche/css/index.css'}}"/>
    <link rel="stylesheet" type="text/css" href="{{$host.'/template/company/beijingqiche/css/chejiezixun.css'}}"/>
    <link rel="stylesheet" type="text/css" href="{{$host.'/template/company/beijingqiche/css/xinwen_xiangqing.css'}}">
    <link href="{{$host.'/template/company/beijingqiche/favicon.ico'}}" rel="shortcut icon"/>
    <script type="text/javascript" src="{{$host.'/template/company/beijingqiche/js/jquery-1.11.0.min.js'}}"></script>
    <script>
        var JF_cn="ft"+self.location.hostname.toString().replace(/\./g,"");
        var _is_cn_zh = getCookie(JF_cn);
        var aja_lang = _is_cn_zh||0;
        $(function(){
            if(aja_lang == 1){
                $(".enet_img_src").each(function(){
                    var HK_src = $(this).attr('hk-src')||$(this).attr('src');
                    $(this).attr("src",HK_src);
                });
                $(".enet_banner_back_url").each(function(){
                    var hk_back_url = $(this).attr('back_hk_url')||'';
                    if(hk_back_url){
                        $(this).css("background-image","url("+hk_back_url+")");
                    }
                });
            }
        })
    </script>
</head>
<body>
<!--[if lt IE 9]>
<script src="{{$host.'/template/company/beijingqiche/js/html5shiv.min.js'}}"></script>
<script src="{{$host.'/template/company/beijingqiche/js/respond.min.js'}}"></script>
<![endif]-->
<!-- 公共头部 -->
<div class="pub_top">
    <a href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}" title="logo">
        <img src="{{$host.'/template/company/beijingqiche/img/a1.png'}}" class="logo" title="logo" alt="logo"/>
    </a>
    <div class="pub_search">
        <div class="left">
            @php($info=$data->navigation($firstDomain,$pinyin))
            <form action="{{$info['url']}}" method="get" id="sub_button">
                <input type="button" onclick="if($('#sub_key').val() == ''){alert('请输入搜索内容');}else{$('#sub_button').submit()};"/>
                <input type="text" placeholder="搜索" value="" name="keywords" id="sub_key"/>
            </form>
        </div>
        <div class="right">
            @php($info=$data->navigation($firstDomain,$pinyin))
            <a href="{{$info['url']}}" name="gb2big5" id="gb2big5" title="{{$info['title']}}">{{$info['title']}}</a>
            @php($info=$data->navigation($firstDomain,$pinyin))
            <a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
        </div>
    </div>
    <div class="pub_nav">
        <i></i>
        <ul class="after">
            <li>
                <a href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}" title="首页">首页</a>
            </li>
            @php($cycle=[5,4,4,6,3])
            @for($i=0;$i<5;$i++)
                <li>
                    @php($info=$data->navigation($firstDomain,$pinyin))
                    <a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                    <dl>
                        @for($j=0;$j<$cycle[$i];$j++)
                            @php($info=$data->content($firstDomain,$pinyin))
                            <a href="{{$info['url']}}" target=""></a>
                            <dd>
                                <a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                            </dd>
                        @endfor
                    </dl>
                </li>
            @endfor
            <li>
                @php($info=$data->navigation($firstDomain,$pinyin))
                <a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
            </li>
        </ul>
    </div>
</div>
@if($uri!=='/')
    <div class="neibanner">
        <div class="img enet_banner_back_url" style="background-image: url({{$host.'/template/company/beijingqiche/img/20170727163110_23398.png'}})"></div>
    </div>
    <div class="pub_mianbao">
        <div class="pub_mianbaoin">
            <div class="left">
                <i>
                    <a class="home_url" href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}" title="首页"></a>
                </i>
                <span>
                    {{$title}}
                </span>
            </div>
            <ul class="right">
                <li class="on">
                    <a href="" title="{{$title}}">{{$title}}</a>
                </li>
                @for($i=0;$i<3;$i++)
                    <li>
                        @php($info=$data->navigation($firstDomain,$pinyin))
                        <a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                    </li>
                @endfor
            </ul>
        </div>
    </div>
@endif
@yield('content')
<!-- 公共底部 -->
<div class="pub_footer">
    <div class="pub_footerin">
        <div class="left">
            <img src="{{$host.'/template/company/beijingqiche/img/20170718105558_72297.jpg'}}" title="微信" alt="微信"/>
            <img src="{{$host.'/template/company/beijingqiche/img/20170717220315_84088.png'}}" title="微博" alt="微博"/>
            <p class="a">扫描关注公众号</p>
            <p class="b">扫描关注微博</p>
        </div>
        <div class="right">
            <h1>
                <span>销售热线</span>
                <em>400-810-8100</em>
                <span style="margin-left:20px;">合规举报热线</span>
                <em>010-56636006</em>
            </h1>
            <ul>
                <li>
                    <a href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}" title="首页">首页</a>
                </li>
                @for($i=0;$i<6;$i++)
                    <li>
                        @php($info=$data->navigation($firstDomain,$pinyin))
                        <a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                    </li>
                @endfor
            </ul>
            <h2>
				<span>© 北京汽车股份有限公司 版权所有 京ICP备14056995号-1  </span>
                @for($i=0;$i<2;$i++)
                    @php($info=$data->navigation($firstDomain,$pinyin))
                    <a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                @endfor
                <a href="{{$hijack?'?sitemap.xml':"$host.'/sitemap.xml'"}}" title="网站地图">网站地图</a>
                <a href="{{$hijack?'?resource.rdf':"$host.'/resource.rdf'"}}" title="资源描述">资源描述</a>
            </h2>
        </div>
    </div>
</div>
<div class="pub_btn">
    <div class="box box1">
        <i></i>
        <span>电话</span>
        <div class="in">400-810-8100</div>
    </div>
    <div class="box box2">
        <i></i>
        <span>二维码</span>
        <div class="in">
            <img src="{{$host.'/template/company/beijingqiche/img/20170729152656_62234.png'}}" title="二维码" alt="二维码"/>
            <p>扫描进入手机版</p>
        </div>
    </div>
    <div class="box box3">
        @php($info=$data->navigation($firstDomain,$pinyin))
        <a href="{{$info['url']}}" title="{{$info['title']}}">
            <i></i>
            <span>{{$info['title']}}</span>
        </a>
    </div>
    <div class="box box4">
        <i></i>
    </div>
</div>
<script type="text/javascript" src="{{$host.'/template/company/beijingqiche/js/public.js'}}"></script>
<script type="text/javascript" src="{{$host.'/template/company/beijingqiche/js/jquery.SuperSlide.2.1.1.js'}}"></script>
</body>
</html>
