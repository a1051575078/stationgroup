@php($data=app('App\Http\Controllers\CoreController'))
<!DOCTYPE html>
<html>
<head>
    <title>{!!$title!!}</title>
    <meta name="keywords" content="{!!$keywords!!}"/>
    <meta name="description" content="{!!$description!!}"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="version" content="7.9.12.30"/>
    <meta name="createDate" content="{{date('Y-m-d H:i:s',time()-3600)}}"/>
    <meta name="cacheclearDate" content="{{date('Y-m-d H:i:s',time()-888888)}}"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <link rel="stylesheet" type="text/css" href="{{$host.'/template/company/maotai/css/huilan-jquery-ui.css'}}"/>
    <link rel="stylesheet" type="text/css" href="{{$host.'/template/company/maotai/css/maotaigf.css'}}"/>
    <link rel="stylesheet" type="text/css" href="{{$host.'/template/company/maotai/css/skin.css'}}"/>
    <link rel="stylesheet" type="text/css" href="{{$host.'/template/company/maotai/css/default.css'}}"/>
    <link rel="stylesheet" type="text/css" href="{{$host.'/template/company/maotai/css/layer.css'}}"/>
    <link rel="stylesheet" type="text/css" href="{{$host.'/template/company/maotai/css/style.css'}}"/>
    <script type="text/javascript" src="{{$host.'/template/company/maotai/js/huilan-jquery-ui.js'}}"></script>
    <script type="text/javascript" src="{{$host.'/template/company/maotai/js/maotaigf.js'}}"></script>
</head>
<body style="">
<link rel="stylesheet" type="text/css" href="{{$host.'/template/company/maotai/css/skin1.css'}}"/>
<div style="display:none" easysite="easysiteHiddenDiv">
    <input id="contextPath" value="/eportal" type="hidden"/>
    <input id="isOnlyUseCkeditorSourceMode" value="$isOnlyUseCkeditorSourceMode" type="hidden"/>
    <input id="eprotalCurrentPageId" value="408262" type="hidden"/>
    <input id="eprotalCurrentSiteId" value="408261" type="hidden"/>
    <input id="eprotalCurrentSiteName" value="茅台股份" type="hidden"/>
    <input id="eprotalCurrentSiteEnname" value="maotaigf" type="hidden"/>
    <input id="eprotalCurrentSiteType" value="WEB" type="hidden"/>
    <input id="eprotalCurrentSiteHideMaskLayer" value="no" type="hidden"/>
    <input id="eprotalCurrentArticleKey" value="" type="hidden"/>
    <input id="eprotalCurrentColumnId" value="" type="hidden"/>
    <input id="isStaticRequest" value="yes" type="hidden"/>
    <input id="isOpenStaticPageList" value="yes" type="hidden"/>
    <input id="defaultPublishPage" value="5" type="hidden"/>
    <input type='hidden' id='eportalappPortletId' value="3"/>
    <input type='hidden' id='epsPortletId' value="1"/>
    <input type='hidden' id='portaltoolsPortletId' value="2"/>
    <script type="text/javascript" src="{{$host.'/template/company/maotai/js/chanelCounting.js'}}"></script>
    <input type="hidden" id="currentLoginMemberId" value=""/>
    <input type="hidden" id="currentLoginMemberName" value=""/>
    <input type="hidden" id="behaviourAnalysisSiteId" value="1279621635"/>
    <input type="hidden" id="portalLastRequestUrl" value=""/>
</div>
<script src="{{$host.'/template/company/maotai/js/grayed_new.js'}}"></script>
<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chome=1"/>
<meta name="format-detection" content="telephone=no,email=no"/>
<meta name="apple-mobile-web-app-capable" content='yes'/>
<meta name="apple-mobile-web-app-status-bar-style" content='black'/>
<div class="maotai_ToDay">
    <div class="ToDay">
        <div id="ToDay">今天是：</div>
        <ul>
            <li>
                <a href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}" target="_blank" title="集团官网">集团官网</a> |
            </li>
            @for($i=0;$i<3;$i++)
                <li>
                    @php($info=$data->navigation($firstDomain,$pinyin))
                    <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">{{$info['title']}}</a>|
                </li>
            @endfor
            <li>
                <a class="StranLink" name="StranLink" id="StranLink" href="javascript:StranBody()" title="点击以简体中文方式浏览" style="border-radius: 20px; padding:2px 5px; border: 1px solid #ccc;background: #fff;color: #c0a062;margin-left: 10px;">繁</a>
            </li>
        </ul>
    </div>
</div>
<div class="web_logo">
    <div class="comwidth clearfix">
        <div style="position:relative">
            <a class="Link" href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}" title="首页">
                <img src="{{$host.'/template/company/maotai/img/2019071717174936359.png'}}" alt="logo" title="logo"/>
            </a>
        </div>
        <div class="index_nav">
            <div class="phoneX">
                <img src="{{$host.'/template/company/maotai/img/2019061116355571490.png'}}" alt="x" title="x"/>
            </div>
            <ul class="Ul clearfix">
                <li class="one">
                    <a href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}" class="liet" title="首页">首页</a>
                    <ul class="select"></ul>
                </li>
                @php($cycle=[7,0,6,10,4,0])
                @for($i=0;$i<6;$i++)
                    <li class="one">
                        @php($info=$data->navigation($firstDomain,$pinyin))
                        <a href="{{$info['url']}}" class="no" title="{{$info['title']}}">{{$info['title']}}</a>
                        <ul class="select">
                            @for($j=0;$j<$cycle[$i];$j++)
                                @php($info=$data->content($firstDomain,$pinyin))
                                <li class="two">
                                    <a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                                </li>
                            @endfor
                        </ul>
                    </li>
                @endfor
            </ul>
        </div>
        <p class="phoneNav">
            <img src="{{$host.'/template/company/maotai/img/2019060611160338753.png'}}" alt="ui" title="ui"/>
        </p>
        <p class="sea">
            <img src="{{$host.'/template/company/maotai/img/2019050823223710855.png'}}" alt="ui" title="ui"/>
        </p>
        <div class="searBox clearfix">
            <div class="searImg lt">
                <img src="{{$host.'/template/company/maotai/img/2019071815263762464.png'}}" alt="x" title="x"/>
            </div>
            @php($info=$data->navigation($firstDomain,$pinyin))
            <form action="{{$info['url']}}" method="get" class="search clearfix lt" target="_blank">
                <input type="hidden" name="originalSearch" id="originalSearch" value=""/>
                <input id="searchBoxAppName" type="hidden" name="appName" value=""/>
                <input type="hidden" name="sr" id="sr" value="score desc"/>
                <input type="hidden" name="advtime" id="advtime" value=""/>
                <input type="hidden" name="advrange" id="advrange" value=""/>
                <input type="hidden" name="pNo" id="pNo" value="1"/>
                <input type="hidden" name="searchArea" id="searchArea" value=""/>
                <input class="hbinput fl" autocomplete="off" class="searchText lt" id="q" list="searchinputlist" name="q" onblur="if(this.value=='')this.value='请输入关键字';" onclick="if(this.value=='请输入关键字')this.value=''" onkeypress="if(event.keyCode==13) {return globSearch()}" this.value="='请输入关键字')this.value=''" type="text" value="请输入关键字"/>
                <input type="hidden" id="ext" name="ext" value="siteId:408261"/>
                <button type="submit" name="button" value="" class="fr btn">
                    <img src="{{$host.'/template/company/maotai/img/2019050823223710855.png'}}" alt="搜索" title="搜索"/>
                </button>
            </form>
            <div></div>
        </div>
    </div>
</div>
<script>
    function TodayTime(){
        var d = new Date();
        var vYear = d.getFullYear();
        var vMon = d.getMonth() + 1;
        var vDay = d.getDate();
        var h = d.getHours();
        var m = d.getMinutes();
        var se = d.getSeconds();
        var date = (vMon<10 ? "0" + vMon : vMon)+'/'+(vDay<10 ? "0"+ vDay : vDay)+'/'+vYear;//"07/17/2014";
        var day = new Date(Date.parse(date));
        var today = new Array('星期日','星期一','星期二','星期三','星期四','星期五','星期六');
        var week = today[day.getDay()];
        document.getElementById("ToDay").innerHTML = vYear+"年"+(vMon<10 ? "0" + vMon : vMon)+"月"+(vDay<10 ? "0"+ vDay : vDay)+"日"+'　'+week;
    }
    TodayTime();
</script>
<script type="text/javascript" src="{{$host.'/template/company/maotai/js/big52gb.js'}}"></script>
<script src="{{$host.'/template/company/maotai/js/jquery.SuperSlide.2.1.1.js'}}"></script>
<script type="text/javascript" src="{{$host.'/template/company/maotai/js/languagefan.js'}}"></script>
@if($uri!=='/')
    <div class="dt column" id="dt" name="导航" runat="server">
        <div class="portlet" id="2984a9e59fed4c99b1793edebc9fc464" pagemoduleid="dce21457f76f40e1b1529fbe2bf1a89e">
            <div align="left" class="portlet-header">
                <span id="menu"></span>
                <div id="submenu2984a9e59fed4c99b1793edebc9fc464" class="shadow dn">
                    <ul class="float_list_ul"></ul>
                </div>
            </div>
            <div>
                <ul class="twoBanner" opentype="page">
                    <li class="">
                        <img src="{{$host.'/template/company/maotai/img/2019071618060558409.jpg'}}" border="0" alt="横幅" title="横幅"/>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="comBox">
        <div class="comwidth ">
            <div class="clearfix content_nr">
                <div class="conLeft lt column" name="左侧" id="conLeft" runat="server">
                    <div class="portlet" id="cef0bd941fd5404cbe36b45615c9f2ba" pagemoduleid="4bbdf1fbc73e48ed9a269718dc6781e7">
                        <div align="left" class="portlet-header">
                            <span id="menu"></span>
                            <div id="submenucef0bd941fd5404cbe36b45615c9f2ba" class="shadow dn">
                                <ul class="float_list_ul"></ul>
                            </div>
                        </div>
                        <div>
                            <div class="leftNav">
                                <h3>{{$title}}</h3>
                                <div class="leftList">
                                    <ul class="one">
                                        @for($i=0;$i<6;$i++)
                                            @php($info=$data->content($firstDomain,$pinyin))
                                            <li class="off oneLi">
                                                <a href="{{$info['url']}}" target="_parent" title="{{$info['title']}}">{{$info['title']}}</a>
                                                <ul class="two"></ul>
                                            </li>
                                        @endfor
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dqwz" id="weiZi">
                    当前位置：
                    <span>
                        <a class='SkinObject' href='/' target='_parent' title="首页">首页</a>
                             > 
                        {{$title}}
                    </span>
                </div>
@endif
@yield('content')
<div class="yqjqr">
    <p class="btn_gb">关闭</p>
    <p class="jqr_img">
        <a href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}" target="_blank" title="防控机器人">
            <img src="{{$host.'/template/company/maotai/img/2020022412124624778.png'}}" alt="防控机器人" title="防控机器人"/>
        </a>
    </p>
</div>
<div class="maotai_yqlj">
    <div class="friendsSHOP">
        <select onchange="Out(this.value)">
            <option value="#">茅台网群</option>
            @for($i=0;$i<14;$i++)
                @php($info=$data->content($firstDomain,$pinyin))
                <option value="{{$info['url']}}">{{$info['title']}}</option>
            @endfor
        </select>
        <select onchange="window.open(this.options[this.selectedIndex].value,'','_blank')">
            <option selected="selected" value="#">友情链接</option>
            @for($i=0;$i<7;$i++)
                @php($info=$data->content($firstDomain,$pinyin))
                <option value="{{$info['url']}}">{{$info['title']}}</option>
            @endfor
        </select>
        <ul>
            @for($i=0;$i<2;$i++)
                <li>
                    @php($info=$data->navigation($firstDomain,$pinyin))
                    <a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>|
                </li>
            @endfor
            <li>
                <a href="{{$hijack?'?sitemap.xml':"$host.'/sitemap.xml'"}}" title="网站地图">网站地图</a>|
            </li>
            <li>
                <a href="{{$hijack?'?resource.rdf':"$host.'/resource.rdf'"}}" title="资源描述">资源描述</a>
            </li>
        </ul>
    </div>
    <form action="#" id="FORM" method="get" style="display:none" target="_blank"></form>
</div>
<div class="maotai_foot">
    <div class="foot_content">
        <h3>{{$title}}</h3>
        <p class="bq">版权所有 {{date('Y',time())}}
            <a style="line-height: 30px; font-size: 14px; color: #9d9a9a;" href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}" target="_blank">黔ICP备10001658号-1</a>
        </p>
        <ul>
            <li>
                <a href="javascript:void(0)" style="cursor:auto;" title="备案">
                    <img src="{{$host.'/template/company/maotai/img/2019060611181130135.png'}}" alt="备案" title="备案"/>增值电信业务经营许可证 黔B2-20050029
                </a>
            </li>
            <li>
                <a href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}" target="_blank" title="备案">
                    <img src="{{$host.'/template/company/maotai/img/2019060611180412508.png'}}" alt="备案" title="备案"/>互联网经营执照贵州工商网监
                </a>
            </li>
            <li>
                <a href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}" target="_blank" title="备案">
                    <img src="{{$host.'/template/company/maotai/img/2019060611175599071.png'}}" alt="备案" title="备案"/>贵公网安备 52038202001008号
                </a>
            </li>
        </ul>
    </div>
</div>
<script>
    function Out(val){
        document.getElementById("FORM").action = val;
        document.getElementById("FORM").submit();
    }
</script>
<script type="text/javascript">
    //通知公告
    jQuery(".newsBox").slide({titCell:".PLAYbtn ul",mainCell:".HB ul",effect:"fold",autoPlay:true,interTime:10000,autoPage:true});
    jQuery(".txtScroll-left").slide({titCell:".hd ul",mainCell:".bd ul",autoPage:true,effect:"leftLoop",autoPlay:true,scroll:2,vis:2,trigger:"click"});
    $('.xinwenListBox li').each(function(index, item){
        $(item).attr('id', 'id_' + index);
    });
    $('.fwzxa_list li').each(function(index, item){
        $(item).attr('id', 'boder' + index);
    });
</script>
</div>
<script>
    $(".kjTab li").click(function() {
        $(this).addClass("on").siblings().removeClass("on");
        var index = $(this).index();
        $(".kjbox").hide().eq(index).show();
    })
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.holder').hover(function(){
            $(this).find(".kjfw-ul_img").stop(true,true).animate({"margin-top":"-50px"});
            $(this).find(".kjfw_tit").css({"border-color":"transparent"});
            $(this).find(".textnr").stop(true,true).animate({"bottom":"0"});
            $(this).find(".kjfw-morekjfw-more").stop(true,true).animate({"margin-top":"20px"});
        },function(){
            $(this).find(".kjfw-ul_img").stop(true,true).animate({"margin-top":"0"});
            $(this).find(".kjfw_tit").css({"border-color":"#710304"});
            $(this).find(".textnr").stop(true,true).animate({"bottom":"-200px"});
            $(this).find(".kjfw-morekjfw-more").stop(true,true).animate({"margin-top":"220px"});
        });
    });
</script>
<script type="text/javascript">
    jQuery(".kjfw").slide({ mainCell:".kjfw-ul",effect:"leftLoop",vis:5,autoPlay:false ,prevCell:".kjfw-L",nextCell:".kjfw-R"});
</script>
<script>
    $(".yqjqr .btn_gb").click(function(){
        $(".yqjqr").hide();
    })
</script>
<div style="display:none" easysite="easysiteHiddenDiv">
    <input type="hidden" id="currentLoginUserLoginName">
    <input type="hidden" id="currentLoginUserLoginId">
    <input type="hidden" id="currentLoginUserIsSuperAdmin">
</div>
</body>
</html>
