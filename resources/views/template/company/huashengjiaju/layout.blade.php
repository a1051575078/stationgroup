@php($data=app('App\Http\Controllers\CoreController'))
<!DOCTYPE html>
<html>
<head>
    <title>{!!$title!!}</title>
    <meta name="keywords" content="{!!$keywords!!}"/>
    <meta name="description" content="{!!$description!!}"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="{{$host.'/template/company/huashengjiaju/css/reset.css'}}" rel="stylesheet"/>
    <link href="{{$host.'/template/company/huashengjiaju/css/common.css'}}" rel="stylesheet"/>
    @if($uri==='/')
    <link href="{{$host.'/template/company/huashengjiaju/css/index.css'}}" rel="stylesheet"/>
    @else
    <link href="{{$host.'/template/company/huashengjiaju/css/content.css'}}" rel="stylesheet"/>
    @endif
    <link href="{{$host.'/template/company/huashengjiaju/css/skin.css'}}" rel="stylesheet"/>
    <script type="text/javascript" src="{{$host.'/template/company/huashengjiaju/js/jquery.js'}}"></script>
    <script type="text/javascript" src="{{$host.'/template/company/huashengjiaju/js/img.js'}}"></script>
</head>
<body id="P_item1">
<div id="header">
    <div id="top">
        <div id="utility">
            <a href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}" title="中文版">中文版</a>
            @php($info=$data->navigation($firstDomain,$pinyin))
            <a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
        </div>
    </div>
    <div id="nav">
        <ul>
            <li id="N_item1">
                <a href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}" title="首页">首页</a>
            </li>
            @for($i=0;$i<6;$i++)
                <li id="N_item{{$i+2}}">
                    @php($info=$data->navigation($firstDomain,$pinyin))
                    <a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                </li>
            @endfor
        </ul>
    </div>
</div>
<div id="slidershow">
    <script type="text/javascript" src="{{$host.'/template/company/huashengjiaju/js/jquery-1.8.0.min.js'}}"></script>
    <script type="text/javascript" src="{{$host.'/template/company/huashengjiaju/js/jquery.jslides.js'}}"></script>
    <div id="full-screen-slider">
        <ul id="slides">
            <li style="background:url({{$host.'/template/company/huashengjiaju/img/201309240519453.jpg'}}) no-repeat center top">
                <a href="#" target="_blank" title="义乌华盛办公家具有限公司">义乌华盛办公家具有限公司</a>
            </li>
            <li style="background:url({{$host.'/template/company/huashengjiaju/img/201309240519528.jpg'}}) no-repeat center top">
                <a href="#" target="_blank" title="义乌华盛办公家具有限公司">义乌华盛办公家具有限公司</a>
            </li>
            <li style="background:url({{$host.'/template/company/huashengjiaju/img/201309240519590.jpg'}}) no-repeat center top">
                <a href="#" target="_blank" title="义乌华盛办公家具有限公司">义乌华盛办公家具有限公司</a>
            </li>
        </ul>
    </div>
</div>
@if($uri!=='/')
    <div id="wrapper">
        <div id="mainBody">
            <div class="biank">
                <div class="biankt">
                    <div class="biankt_z">{{$title}}</div>
                    <div id="breadcrumb">您的位置 &gt;
                        <a href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}" title="网站首页">网站首页</a> &gt;
                        <strong>{{$title}}</strong>
                    </div>
                </div>
                @yield('content1')
                <div class="clear"></div>
            </div>
            <div class="biankd"></div>
        </div>
        <script src="{{$host.'/template/company/huashengjiaju/js/jquery.min.js'}}" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $(".navs ul li").hover(function(){
                    $(this).addClass("hover_bg");
                    $(this).children("div").show();
                },function(){
                    $(this).removeClass("hover_bg");
                    $(this).children("div").hide();
                })

            })
        </script>
        <div class="zuo">
            <div class="zuot"></div>
            <div class="zuok">
                <div class="navs">
                    <ul>
                        @for($i=0;$i<4;$i++)
                            <li>
                                @php($info=$data->navigation($firstDomain,$pinyin))
                                <a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                            </li>
                        @endfor
                        <li>
                            @php($info=$data->navigation($firstDomain,$pinyin))
                            <a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                            <div class="Secon_Dary">
                                <p>
                                    @for($i=0;$i<6;$i++)
                                        @php($info=$data->content($firstDomain,$pinyin))
                                        <a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                                    @endfor
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="zuod"></div>
            <div class="zuot1"></div>
            <div class="zuok1">
                义乌办公家具|义乌办公家具厂家|义乌洽谈桌厂家|义乌华盛家具<br>
                电话：0579-85220302<br>
                联系人：方先生<br>
                手机：13777906859<br>
                邮箱：260823225@qq.com<br>
                地址：义乌童店二区家具专业街47栋
            </div>
            <div class="zuod1"></div>
        </div>
        <div class="clear"></div>
    </div>
    </div>
@endif
@yield('content')
<div id="footer">
    <div class="dibu">
        版权所有：义乌办公家具|义乌办公家具厂家|义乌洽谈桌厂家|义乌华盛家具　电话：0579-85220302　联系人：方先生　手机：13777906859　地址：义乌童店二区家具专业街47栋&nbsp;
        ICP备案号：浙ICP备13024866号-1
        <a href="{{$hijack?'?sitemap.xml':"$host.'/sitemap.xml'"}}" target="_blank" title="网站地图">网站地图</a>
        <a href="{{$hijack?'?resource.rdf':"$host.'/resource.rdf'"}}" target="_blank" title="资源描述">资源描述</a>
        <br>
        网页设计：激石信息技术　
    </div>
</div>
<script src="{{$host.'/template/company/huashengjiaju/js/jquery.soChange.js'}}" type="text/javascript" charset="utf-8"></script>
<script src="{{$host.'/template/company/huashengjiaju/js/common.js'}}" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" charset="utf-8">
    var urlroot = "./templates/company/huashengjiaju/img/";
    kfguin="260823225";
    ws="{{$firstDomain}}";
    companyname="网站欢迎您！";
    welcomeword="您好，请问有什么可以帮您？";
    type="3";
</script>
<script src="{{$host.'/template/company/huashengjiaju/js/jquery.marquee.js'}}" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
    $(function () {
        $('#news > .content > table').soChange({
            thumbObj:'#news > .header > h2',
            thumbNowClass:'current',
            slideTime: 0,
            autoChange: false
        });
        $('#news > .header > a').soChange({
            thumbObj:'#news > .header > h2',
            thumbNowClass:'current',
            slideTime: 0,
            autoChange: false
        });
        $("#productsZone > .wrapper").marquee({
            speed: 30,
            step: 1,
            direction: 'left',
            pause: 0
        });
    });
</script>
</body>
</html>
