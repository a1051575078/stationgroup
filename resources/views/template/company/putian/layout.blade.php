@php($data=app('App\Http\Controllers\CoreController'))
<!DOCTYPE html>
<html lang="zh-CN">
<head id="Head">
    <title>{!!$title!!}</title>
    <meta id="MetaKeywords" name="keywords" content="{!!$keywords!!}"/>
    <meta id="MetaDescription" name="description" content="{!!$description!!}"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta content="text/javascript" http-equiv="Content-Script-Type"/>
    <meta content="text/css" http-equiv="Content-Style-Type"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta id="MetaCopyright" name="COPYRIGHT" content="Copyright 2021 by GLobalstech Corporation"/>
    <meta id="MetaAuthor" name="AUTHOR" content="中国普天信息产业集团有限公司"/>
    <meta name="RESOURCE-TYPE" content="DOCUMENT"/>
    <meta name="DISTRIBUTION" content="GLOBAL"/>
    <meta id="MetaRobots" name="ROBOTS" content="INDEX, FOLLOW"/>
    <meta name="REVISIT-AFTER" content="1 DAYS"/>
    <meta name="RATING" content="GENERAL"/>
    <meta http-equiv="PAGE-ENTER" content="RevealTrans(Duration=0,Transition=1)"/>
    <meta http-equiv="X-UA-Compatible" content="edge"/>
    <meta name="renderer" content="webkit|ie-comp|ie-stand"/>
    <meta name="viewport" content="width=1220"/>
    <style id="StylePlaceholder" type="text/css"></style>
    <link href="{{$host.'/template/company/putian/css/default.css'}}" type="text/css" rel="stylesheet"/>
    <link href="{{$host.'/template/company/putian/css/module1.css'}}" type="text/css" rel="stylesheet"/>
    <link href="{{$host.'/template/company/putian/css/module2.css'}}" type="text/css" rel="stylesheet"/>
    <link href="{{$host.'/template/company/putian/css/demo1-home.css'}}" type="text/css" rel="stylesheet"/>
    <link href="{{$host.'/template/company/putian/css/budong.css'}}" type="text/css" rel="stylesheet"/>
    <link href="{{$host.'/template/company/putian/css/portal.css'}}" type="text/css" rel="stylesheet"/>
    <link href="{{$host.'/template/company/putian/css/slider.css'}}" rel="stylesheet" type="text/css"/>
    <link href="{{$host.'/template/company/putian/css/Globalstech.css'}}" type="text/css" rel="stylesheet"/>
    <link href="{{$host.'/template/company/putian/css/Nav.css'}}" type="text/css" rel="stylesheet"/>
    <link href="{{$host.'/template/company/putian/css/second-menu.css'}}" type="text/css" rel="stylesheet"/>
    <link href="{{$host.'/template/company/putian/css/second-tent.css'}}" type="text/css" rel="stylesheet"/>
    <link href="{{$host.'/template/company/putian/css/demo1-second.css'}}" type="text/css" rel="stylesheet"/>
    <link href="{{$host.'/template/company/putian/favicon.ico'}}" rel="shortcut icon"/>
    <script src="{{$host.'/template/company/putian/js/jquery.min.js'}}" type="text/javascript"></script>
    <script src="{{$host.'/template/company/putian/js/jquery-ui.min.js'}}" type="text/javascript"></script>
<!--[if lt IE 9]>
    　　<script src="{{$host.'/template/company/putian/js/respond.js'}}"></script>
    　　<script src="{{$host.'/template/company/putian/js/html5shiv.min.js'}}"></script>
    <![endif]-->
</head>
<body id="Body">
<form method="post" action="/" id="Form" enctype="multipart/form-data">
    <div class="aspNetHidden">
        <input type="hidden" name="StylesheetManager_TSSM" id="StylesheetManager_TSSM" value=""/>
        <input type="hidden" name="ScriptManager_TSM" id="ScriptManager_TSM" value=""/>
        <input type="hidden" name="__EVENTTARGET" id="__EVENTTARGET" value=""/>
        <input type="hidden" name="__EVENTARGUMENT" id="__EVENTARGUMENT" value=""/>
        <input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="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">
    </div>
    <script type="text/javascript">
        var theForm = document.forms['Form'];
        if (!theForm) {
            theForm = document.Form;
        }
        function __doPostBack(eventTarget, eventArgument) {
            if (!theForm.onsubmit || (theForm.onsubmit() != false)) {
                theForm.__EVENTTARGET.value = eventTarget;
                theForm.__EVENTARGUMENT.value = eventArgument;
                theForm.submit();
            }
        }
    </script>
    <script src="{{$host.'/template/company/putian/js/default.js'}}" type="text/javascript"></script>
    <script type="text/javascript">
        var __cultureInfo = {"name":"zh-CN","numberFormat": {"CurrencyDecimalDigits":2,"CurrencyDecimalSeparator":".","IsReadOnly":false,"CurrencyGroupSizes":[3],"NumberGroupSizes":[3],"PercentGroupSizes":[3],"CurrencyGroupSeparator":",","CurrencySymbol":"¥","NaNSymbol":"非数字","CurrencyNegativePattern":2,"NumberNegativePattern":1,"PercentPositivePattern":1,"PercentNegativePattern":1,"NegativeInfinitySymbol":"负无穷大","NegativeSign":"-","NumberDecimalDigits":2,"NumberDecimalSeparator":".","NumberGroupSeparator":",","CurrencyPositivePattern":0,"PositiveInfinitySymbol":"正无穷大","PositiveSign":"+","PercentDecimalDigits":2,"PercentDecimalSeparator":".","PercentGroupSeparator":",","PercentSymbol":"%","PerMilleSymbol":"‰","NativeDigits":["0","1","2","3","4","5","6","7","8","9"],"DigitSubstitution":1},"dateTimeFormat":{"AMDesignator":"上午","Calendar":{"MinSupportedDateTime":"\/Date(-62135596800000)\/","MaxSupportedDateTime":"\/Date(253402271999999)\/","AlgorithmType":1,"CalendarType":1,"Eras":[1],"TwoDigitYearMax":2029,"IsReadOnly":false},"DateSeparator":"/","FirstDayOfWeek":1,"CalendarWeekRule":0,"FullDateTimePattern":"yyyy\u0027年\u0027M\u0027月\u0027d\u0027日\u0027 H:mm:ss","LongDatePattern":"yyyy\u0027年\u0027M\u0027月\u0027d\u0027日\u0027","LongTimePattern":"H:mm:ss","MonthDayPattern":"M\u0027月\u0027d\u0027日\u0027","PMDesignator":"下午","RFC1123Pattern":"ddd, dd MMM yyyy HH\u0027:\u0027mm\u0027:\u0027ss \u0027GMT\u0027","ShortDatePattern":"yyyy/M/d","ShortTimePattern":"H:mm","SortableDateTimePattern":"yyyy\u0027-\u0027MM\u0027-\u0027dd\u0027T\u0027HH\u0027:\u0027mm\u0027:\u0027ss","TimeSeparator":":","UniversalSortableDateTimePattern":"yyyy\u0027-\u0027MM\u0027-\u0027dd HH\u0027:\u0027mm\u0027:\u0027ss\u0027Z\u0027","YearMonthPattern":"yyyy\u0027年\u0027M\u0027月\u0027","AbbreviatedDayNames":["周日","周一","周二","周三","周四","周五","周六"],"ShortestDayNames":["日","一","二","三","四","五","六"],"DayNames":["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],"AbbreviatedMonthNames":["1月","2月","3月","4月","5月","6月","7月","8月","9月","10月","11月","12月",""],"MonthNames":["一月","二月","三月","四月","五月","六月","七月","八月","九月","十月","十一月","十二月",""],"IsReadOnly":false,"NativeCalendarName":"公历","AbbreviatedMonthGenitiveNames":["1月","2月","3月","4月","5月","6月","7月","8月","9月","10月","11月","12月",""],"MonthGenitiveNames":["一月","二月","三月","四月","五月","六月","七月","八月","九月","十月","十一月","十二月",""]},"eras":[1,"公元",null,0]};
    </script>
    <script src="{{$host.'/template/company/putian/js/default1.js'}}" type="text/javascript"></script>
    <div class="aspNetHidden">
        <input type="hidden" name="__VIEWSTATEGENERATOR" id="__VIEWSTATEGENERATOR" value="CA0B0334"/>
        <input type="hidden" name="__VIEWSTATEENCRYPTED" id="__VIEWSTATEENCRYPTED" value=""/>
    </div>
    <script type="text/javascript">
        Sys.WebForms.PageRequestManager._initialize('ScriptManager', 'Form', [], [], [], 90, '');
    </script>
    <script src="{{$host.'/template/company/putian/js/dnn.modalpopup.js'}}" type="text/javascript"></script>
    <script src="{{$host.'/template/company/putian/js/Globalstech1.js'}}" type="text/javascript"></script>
    <script src="{{$host.'/template/company/putian/js/dnncore.js'}}" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="{{$host.'/template/company/putian/css/Menu.css'}}"/>
    <div class="pt-body">
        <div class="header">
            <div class="header-con">
                <div class="header-logo">
                    <a id="dnn_zhdLOGO_hypLogo" title="中国普天信息产业集团有限公司" href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}">
                        <img id="dnn_zhdLOGO_imgLogo" src="{{$host.'/template/company/putian/img/ptlogo.png'}}" title="中国普天信息产业集团有限公司" alt="中国普天信息产业集团有限公司" style="border-width:0px;"/>
                    </a>
                </div>
                <div class="header-menu">
                    <div id="dnn_menuPane">
                        <div class="DnnModule DnnModule-DNN_HTML DnnModule-4621">
                            <a id="4621" name="4621" class="module"></a>
                            <div class="GoneContainer_without_title">
                                <div id="dnn_ctr4621_ContentPane">
                                    <div id="dnn_ctr4621_ModuleContent" class="DNNModuleContent ModDNNHTMLC">
                                        <div id="dnn_ctr4621_HtmlModule_lblContent" class="Normal">
                                            <div class="menu-top">
                                                <div class="yy" onmouseout="this.className='yy'" onmouseover="this.className='yythis'">中文
                                                    <ul>
                                                        <li>中文</li>
                                                        <li>
                                                            <a href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}" target="_blank" title="英文">英文</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="wzq">
                                                    <a href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}" title="普天网">普天网</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="navmenu-container" id="gone_menu">
                        <ul class="navmenu">
                            <li class="level-0 active breadcrumb-0 level-0-first">
                                <a href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}" class="level-0" target="" title="首页">
                                    <span>首页</span>
                                </a>
                            </li>
                            @for($i=0;$i<7;$i++)
                                <li class="level-0">
                                    @php($info=$data->navigation($firstDomain,$pinyin))
                                    <a href="{{$info['url']}}" class="level-0" target="" title="{{$info['title']}}">
                                        <span>{{$info['title']}}</span>
                                    </a>
                                </li>
                            @endfor
                        </ul>
                    </div>
                    <script type="text/javascript">
                        (function($){
                            $().ready(function(){
                                $("#gone_menu li").hover(function(e){
                                    $(this).addClass("hover");
                                    var subMenu = $(this).children("div.sub");
                                    subMenu.show();
                                    if(subMenu.length > 0){
                                        var inum=subMenu.children("ul.sub").children("li").size();
                                        isum=0;
                                        for(var i=0;i<(inum%2==0?inum/2:(inum+1)/2);i++){
                                        }
                                    }
                                    e.stopPropagation();
                                },function(){
                                    $(">ul", $(this)).hide();
                                    $(this).removeClass("hover");
                                });
                            });
                            $("li.level-0").each(function(i){
                                $(this).children("div.sub").addClass("div-sub-"+i);
                                $(this).find("ul.sub").addClass("navitem-"+i);
                            })
                            $(".navmenu li.level-0").last().prev().addClass("nobg");
                        })(jQuery);
                    </script>
                </div>
                <div id="dnn_ssPane" class="header-other">
                    <div class="DnnModule DnnModule-DNN_HTML DnnModule-4622">
                        <a id="4622" name="4622" class="module"></a>
                        <div class="GoneContainer_without_title">
                            <div id="dnn_ctr4622_ContentPane">
                                <div id="dnn_ctr4622_ModuleContent" class="DNNModuleContent ModDNNHTMLC">
                                    <div id="dnn_ctr4622_HtmlModule_lblContent" class="Normal">
                                        <div>
                                            @php($info=$data->navigation($firstDomain,$pinyin))
                                            <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">
                                                <img src="{{$host.'/template/company/putian/img/636776170644871164.jpg'}}" style="border:0" title="{{$info['title']}}" alt="{{$info['title']}}"/>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearB"></div>
            </div>
        </div>
        @if($uri!=='/')
            <div id="dnn_ContentPane" class="banner">
                <div class="DnnModule DnnModule-DNN_HTML DnnModule-4660">
                    <a id="4660" name="4660" class="module"></a>
                    <div class="GoneContainer_without_title">
                        <div id="dnn_ctr4660_ContentPane">
                            <div id="dnn_ctr4660_ModuleContent" class="DNNModuleContent ModDNNHTMLC">
                                <div id="dnn_ctr4660_HtmlModule_lblContent" class="Normal">
                                    <div class="xxzx-banner"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content">
                <div id="dnn_LeftPane" class="content-left">
                    <div class="DnnModule DnnModule-GlobalStechRazorMenu DnnModule-4661">
                        <a id="4661" name="4661" class="module"></a>
                        <div class="second-menu">
                            <div class="second-menu-title">
                                <span id="dnn_ctr4661_zhdTITLE_titleLabel" class="Head">{{$title}}</span>
                            </div>
                            <div id="dnn_ctr4661_ContentPane" class="second-menu-ct">
                                <div id="dnn_ctr4661_ModuleContent" class="DNNModuleContent ModGlobalStechRazorMenuC">
                                    <div class="accordion-3-container">
                                        <ul class="accordion-3">
                                            <li class="level-0 level-0-first index-0-0 breadcrumb" tid="1275" name="{{$title}}">
                                                @php($info=$data->content($firstDomain,$pinyin))
                                                <a href="{{$info['url']}}" class="hasChildren" title="{{$info['title']}}">
                                                    <span>{{$info['title']}}</span>
                                                </a>
                                                <div class="sub sub-0">
                                                    <ul class="sub sub-0">
                                                        @php($info=$data->content($firstDomain,$pinyin))
                                                        <li class="level-1 level-1-first index-1-0 active breadcrumb" tid="1276" name="{{$info['title']}}">
                                                            <a href="{{$info['url']}}" title="{{$info['title']}}">
                                                                <span>{{$info['title']}}</span>
                                                            </a>
                                                        </li>
                                                        @php($info=$data->content($firstDomain,$pinyin))
                                                        <li class="level-1 level-1-last index-1-1" tid="1277" name="{{$info['title']}}">
                                                            <a href="{{$info['url']}}" title="{{$info['title']}}">
                                                                <span>{{$info['title']}}</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                            @for($i=0;$i<5;$i++)
                                                @php($info=$data->content($firstDomain,$pinyin))
                                                <li class="level-0 index-0-{{$i}}" tid="4320" name="{{$info['title']}}">
                                                    <a href="{{$info['url']}}" title="{{$info['title']}}">
                                                        <span>{{$info['title']}}</span>
                                                    </a>
                                                </li>
                                            @endfor
                                        </ul>
                                    </div>
                                    <div id="Globalstech_AjaxLoadingPanel_4661" class="RadAjax RadAjax_Silk" style="display:none;">
                                        <div class="raDiv"></div>
                                        <div class="raColor raTransp"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="second-menu-bottom"></div>
                        </div>
                    </div>
                </div>
                <div class="content-right">
                    <div class="content-path">当前位置：
                        <a href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}" title="首页">首页</a> &gt;
                        <span id="dnn_zhdBREADCRUMB_lblBreadCrumb">
                            {{$title}}
                        </span>
                    </div>
                    <div id="dnn_RightPane" class="right-bottom">
                        <div class="DnnModule DnnModule-GTModulesCMS DnnModule-4666">
                            <a id="4666" name="4666" class="module"></a>
                            <div class="second-content">
                                <div class="second-content-title">
                                    <span id="dnn_ctr4666_zhdTITLE_titleLabel" class="Head">{{$title}}</span>
                                </div>
                                @endif
                                @yield('content')
                                <div class="footermenu">
                                    <div id="dnn_FootermenuPane" class="footermenu-con">
                                        <div class="DnnModule DnnModule-DNN_HTML DnnModule-4643">
                                            <a id="4643" name="4643" class="module"></a>
                                            <div class="GoneContainer_without_title">
                                                <div id="dnn_ctr4643_ContentPane">
                                                    <div id="dnn_ctr4643_ModuleContent" class="DNNModuleContent ModDNNHTMLC">
                                                        <div id="dnn_ctr4643_HtmlModule_lblContent" class="Normal">
                                                            <div class="footerlist">
                                                                <ul>
                                                                    <li class="fma">服务导航：</li>
                                                                    @php($img=['fmb','fmd','fme','fmf','fmg'])
                                                                    @for($i=0;$i<5;$i++)
                                                                        @php($info=$data->navigation($firstDomain,$pinyin))
                                                                        <li class="{{$img[$i]}}">
                                                                            <a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                                                                        </li>
                                                                        <li class="fmshu">|</li>
                                                                    @endfor
                                                                    <li class="fmh">
                                                                        <a href="{{$hijack?'?sitemap.xml':"$host.'/sitemap.xml'"}}" title="网站地图">网站地图</a>
                                                                    </li>
                                                                    <li class="fmshu">|</li>
                                                                    <li class="fmh">
                                                                        <a href="{{$hijack?'?resource.rdf':"$host.'/resource.rdf'"}}" title="资源描述">资源描述</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="top">TOP</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <div id="dnn_FooterPane" class="footer-con">
                                        <div class="DnnModule DnnModule-DNN_HTML DnnModule-4644">
                                            <a id="4644" name="4644" class="module"></a>
                                            <div class="GoneContainer_without_title">
                                                <div id="dnn_ctr4644_ContentPane">
                                                    <div id="dnn_ctr4644_ModuleContent" class="DNNModuleContent ModDNNHTMLC">
                                                        <div id="dnn_ctr4644_HtmlModule_lblContent" class="Normal">
                                                            <div class="ftall">
                                                                <div class="ftlogo">
                                                                    <p>
                                                                        <img src="{{$host.'/template/company/putian/img/636776297884718867.png'}}" style="border:0" title="logo" alt="logo"/>
                                                                    </p>
                                                                </div>
                                                                <div class="fm">
                                                                    <div class="fmbottom">
                                                                        <ul>
                                                                            <li id="icpn" style="margin-right:40px;">中国普天信息产业集团有限公司 版权所有&copy;2019</li>
                                                                            <li>
                                                                                <a href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}" id="icp" style="color:#c5cce2" target="_blank">京ICP备19033118号-1</a>
                                                                                京公网安备 110401400114
                                                                            </li>
                                                                            <li style="margin-right:40px;">地址：北京市海淀区海淀北二街6号</li>
                                                                            <li>邮政编码：100080</li>
                                                                            <li style="margin-right: 40px;">技术支持：中国普天信息产业集团有限公司信息化办公室</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <div class="yqlj">
                                                                    <div class="yqljt">友情链接</div>
                                                                    <div class="yqljcd">
                                                                        <select onchange="window.open(this.options[this.selectedIndex].value)">
                                                                            <option value="#">友情链接：</option>
                                                                            @for($i=0;$i<12;$i++)
                                                                                @php($info=$data->content($firstDomain,$pinyin))
                                                                                <div class="news-item">
                                                                                    <div class="news-item-title">
                                                                                        <a href="{{$info['url']}}" class="news-title" target="_blank" title="{{$info['title']}}">{{$info['title']}}</a>
                                                                                    </div>
                                                                                    <div class="news-item-date">[{{date('m-d',strtotime('-'.$i.' day'))}}]</div>
                                                                                </div>
                                                                                <option target="_blank" value="{{$info['url']}}">--{{$info['title']}}--</option>
                                                                            @endfor
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="DnnModule DnnModule-DNN_HTML DnnModule-5568">
                                            <a id="5568" name="5568" class="module"></a>
                                            <div class="GoneContainer_without_title">
                                                <div id="dnn_ctr5568_ContentPane">
                                                    <div id="dnn_ctr5568_ModuleContent" class="DNNModuleContent ModDNNHTMLC">
                                                        <div id="dnn_ctr5568_HtmlModule_lblContent" class="Normal">
                                                            <p>
                                                                <style type="text/css">#gg1{
                                                                        Z-INDEX: 999;
                                                                        display:none;
                                                                    }
                                                                </style>
                                                                <script type="text/javascript">
                                                                    //公共脚本文件 main.js
                                                                    function addEvent(obj,evtType,func,cap){
                                                                        cap=cap||false;
                                                                        if(obj.addEventListener){
                                                                            obj.addEventListener(evtType,func,cap);
                                                                            return true;
                                                                        }else if(obj.attachEvent){
                                                                            if(cap){
                                                                                obj.setCapture();
                                                                                return true;
                                                                            }else{
                                                                                return obj.attachEvent("on" + evtType,func);
                                                                            }
                                                                        }else{
                                                                            return false;
                                                                        }
                                                                    }
                                                                    function removeEvent(obj,evtType,func,cap){
                                                                        cap=cap||false;
                                                                        if(obj.removeEventListener){
                                                                            obj.removeEventListener(evtType,func,cap);
                                                                            return true;
                                                                        }else if(obj.detachEvent){
                                                                            if(cap){
                                                                                obj.releaseCapture();
                                                                                return true;
                                                                            }else{
                                                                                return obj.detachEvent("on" + evtType,func);
                                                                            }
                                                                        }else{
                                                                            return false;
                                                                        }
                                                                    }
                                                                    function getPageScroll(){
                                                                        var xScroll,yScroll;
                                                                        if (self.pageXOffset) {
                                                                            xScroll = self.pageXOffset;
                                                                        } else if (document.documentElement && document.documentElement.scrollLeft){
                                                                            xScroll = document.documentElement.scrollLeft;
                                                                        } else if (document.body) {
                                                                            xScroll = document.body.scrollLeft;
                                                                        }
                                                                        if (self.pageYOffset) {
                                                                            yScroll = self.pageYOffset;
                                                                        } else if (document.documentElement && document.documentElement.scrollTop){
                                                                            yScroll = document.documentElement.scrollTop;
                                                                        } else if (document.body) {
                                                                            yScroll = document.body.scrollTop;
                                                                        }
                                                                        arrayPageScroll = new Array(xScroll,yScroll);
                                                                        return arrayPageScroll;
                                                                    }
                                                                    function GetPageSize(){
                                                                        var xScroll, yScroll;
                                                                        if (window.innerHeight && window.scrollMaxY) {
                                                                            xScroll = document.body.scrollWidth;
                                                                            yScroll = window.innerHeight + window.scrollMaxY;
                                                                        } else if (document.body.scrollHeight > document.body.offsetHeight){
                                                                            xScroll = document.body.scrollWidth;
                                                                            yScroll = document.body.scrollHeight;
                                                                        } else {
                                                                            xScroll = document.body.offsetWidth;
                                                                            yScroll = document.body.offsetHeight;
                                                                        }
                                                                        var windowWidth, windowHeight;
                                                                        if (self.innerHeight) {
                                                                            windowWidth = self.innerWidth;
                                                                            windowHeight = self.innerHeight;
                                                                        } else if (document.documentElement && document.documentElement.clientHeight) {
                                                                            windowWidth = document.documentElement.clientWidth;
                                                                            windowHeight = document.documentElement.clientHeight;
                                                                        } else if (document.body) {
                                                                            windowWidth = document.body.clientWidth;
                                                                            windowHeight = document.body.clientHeight;
                                                                        }
                                                                        if(yScroll < windowHeight){
                                                                            pageHeight = windowHeight;
                                                                        } else {
                                                                            pageHeight = yScroll;
                                                                        }
                                                                        if(xScroll < windowWidth){
                                                                            pageWidth = windowWidth;
                                                                        } else {
                                                                            pageWidth = xScroll;
                                                                        }
                                                                        arrayPageSize = new Array(pageWidth,pageHeight,windowWidth,windowHeight)
                                                                        return arrayPageSize;
                                                                    }
                                                                    var AdMoveConfig=new Object();
                                                                    AdMoveConfig.IsInitialized=false;
                                                                    AdMoveConfig.AdCount=0;
                                                                    AdMoveConfig.ScrollX=0;
                                                                    AdMoveConfig.ScrollY=0;
                                                                    AdMoveConfig.MoveWidth=0;
                                                                    AdMoveConfig.MoveHeight=0;
                                                                    AdMoveConfig.Resize=function(){
                                                                        var winsize=GetPageSize();
                                                                        AdMoveConfig.MoveWidth=winsize[2];
                                                                        AdMoveConfig.MoveHeight=winsize[3];
                                                                        AdMoveConfig.Scroll();
                                                                    }
                                                                    AdMoveConfig.Scroll=function(){
                                                                        var winscroll=getPageScroll();
                                                                        AdMoveConfig.ScrollX=winscroll[0];
                                                                        AdMoveConfig.ScrollY=winscroll[1];
                                                                    }
                                                                    addEvent(window,"resize",AdMoveConfig.Resize);
                                                                    addEvent(window,"scroll",AdMoveConfig.Scroll);
                                                                    function AdMove(id,addCloseButton){
                                                                        if(!AdMoveConfig.IsInitialized){
                                                                            AdMoveConfig.Resize();
                                                                            AdMoveConfig.IsInitialized=true;
                                                                        }
                                                                        AdMoveConfig.AdCount++;
                                                                        var obj=document.getElementById(id);
                                                                        obj.style.position="absolute";
                                                                        var W=AdMoveConfig.MoveWidth-obj.offsetWidth;
                                                                        var H=AdMoveConfig.MoveHeight-obj.offsetHeight;
                                                                        var x = W*Math.random(),y = H*Math.random();
                                                                        var rad=(Math.random()+1)*Math.PI/6;
                                                                        var kx=Math.sin(rad),ky=Math.cos(rad);
                                                                        var dirx = (Math.random()<0.5?1:-1), diry = (Math.random()<0.5?1:-1);
                                                                        var step = 1;
                                                                        var interval;
                                                                        if(addCloseButton){
                                                                            var closebtn=document.createElement("div");
                                                                            obj.appendChild(closebtn);
                                                                            closebtn.style.position="absolute";
                                                                            closebtn.style.top="1px";
                                                                            closebtn.style.right=0;
                                                                            closebtn.style.width="36px";
                                                                            closebtn.style.height="18px";
                                                                            closebtn.style.borderStyle="solid";
                                                                            closebtn.style.borderWidth="0px";
                                                                            closebtn.style.borderColor="#ccc";
                                                                            closebtn.style.fontSize="12px";
                                                                            closebtn.style.color="#fff";
                                                                            closebtn.style.cursor="pointer";
                                                                            closebtn.style.fontWeight="bold";
                                                                            closebtn.innerHTML="关闭";
                                                                            closebtn.onclick=function(){
                                                                                obj.style.display="none";
                                                                                clearInterval(interval);
                                                                                closebtn.onclick=null;
                                                                                obj.onmouseover=null;
                                                                                obj.onmouseout=null;
                                                                                obj.MoveHandler=null;
                                                                                AdMoveConfig.AdCount--;
                                                                                if(AdMoveConfig.AdCount<=0){
                                                                                    removeEvent(window,"resize",AdMoveConfig.Resize);
                                                                                    removeEvent(window,"scroll",AdMoveConfig.Scroll);
                                                                                    AdMoveConfig.Resize=null;
                                                                                    AdMoveConfig.Scroll=null;
                                                                                    AdMoveConfig=null;
                                                                                }
                                                                            }
                                                                        }
                                                                        obj.MoveHandler=function(){
                                                                            obj.style.left = (x + AdMoveConfig.ScrollX) + "px";
                                                                            obj.style.top = (y + AdMoveConfig.ScrollY) + "px";
                                                                            rad=(Math.random()+1)*Math.PI/6;
                                                                            W=AdMoveConfig.MoveWidth-obj.offsetWidth;
                                                                            H=AdMoveConfig.MoveHeight-obj.offsetHeight;
                                                                            x = x + step*kx*dirx;
                                                                            if (x < 0){dirx = 1;x = 0;kx=Math.sin(rad);ky=Math.cos(rad);}
                                                                            if (x > W){dirx = -1;x = W;kx=Math.sin(rad);ky=Math.cos(rad);}
                                                                            y = y + step*ky*diry;
                                                                            if (y < 0){diry = 1;y = 0;kx=Math.sin(rad);ky=Math.cos(rad);}
                                                                            if (y > H){diry = -1;y = H;kx=Math.sin(rad);ky=Math.cos(rad);}
                                                                        }
                                                                        this.SetLocation=function(vx,vy){x=vx;y=vy;}
                                                                        this.SetDirection=function(vx,vy){dirx=vx;diry=vy;}
                                                                        this.Run=function(){
                                                                            var delay = 20;
                                                                            interval=setInterval(obj.MoveHandler,delay);
                                                                            obj.onmouseover=function(){clearInterval(interval);}
                                                                            obj.onmouseout=function(){interval=setInterval(obj.MoveHandler, delay);}
                                                                        }
                                                                    }
                                                                </script>
                                                            </p>
                                                            <div id="gg1">
                                                                @php($info=$data->navigation($firstDomain,$pinyin))
                                                                <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">
                                                                    <img alt="{{$info['title']}}" title="{{$info['title']}}" border="0" src="{{$host.'/template/company/putian/img/637053647269459114.jpg'}}" style="width:300px;"/>
                                                                </a>
                                                            </div>
                                                            <script type="text/javascript">
                                                                var ad1=new AdMove("gg1",true);
                                                                ad1.Run();
                                                            </script>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="DnnModule DnnModule-DNN_HTML DnnModule-8390">
                                            <a id="8390" name="8390" class="module"></a>
                                            <div class="GoneContainer_without_title">
                                                <div id="dnn_ctr8390_ContentPane">
                                                    <div id="dnn_ctr8390_ModuleContent" class="DNNModuleContent ModDNNHTMLC">
                                                        <div id="dnn_ctr8390_HtmlModule_lblContent" class="Normal"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script src="{{$host.'/template/company/putian/js/home.js'}}"></script>
                            <script src="{{$host.'/template/company/putian/js/scroll.js'}}"></script>
                            <script src="{{$host.'/template/company/putian/js/effect2.js'}}"></script>
                            <script src="{{$host.'/template/company/putian/js/banner.js'}}"></script>
                            <script src="{{$host.'/template/company/putian/js/banner1.js'}}"></script>
                            <input name="ScrollTop" type="hidden" id="ScrollTop">
                            <input name="__dnnVariable" type="hidden" id="__dnnVariable" autocomplete="off">
                            <script type="text/javascript">
                                ;(function() {
                                    function loadHandler() {
                                        var hf = $get('StylesheetManager_TSSM');
                                        if (!hf._RSSM_init) { hf._RSSM_init = true; hf.value = ''; }
                                        hf.value += ';Telerik.Web.UI, Version=2013.2.717.40, Culture=neutral, PublicKeyToken=121fae78165ba3d4:zh-CN:dae8717e-3810-4050-96d3-31018e70c6e4:45085116;Telerik.Web.UI.Skins, Version=2013.2.717.40, Culture=neutral, PublicKeyToken=121fae78165ba3d4:zh-CN:98d23577-27ad-4f20-8a16-623848846194:c5e84dda';
                                        Sys.Application.remove_load(loadHandler);
                                    };
                                    Sys.Application.add_load(loadHandler);
                                })();Sys.Application.add_init(function() {
                                    $create(Telerik.Web.UI.RadAjaxLoadingPanel, {"initialDelayTime":200,"isSticky":false,"minDisplayTime":500,"skin":"Silk","uniqueID":"dnn$ctr4642$List$Globalstech_AjaxLoadingPanel_4642","zIndex":90000}, null, null, $get("Globalstech_AjaxLoadingPanel_4642"));
                                });
                                Sys.Application.add_init(function() {
                                    $create(Telerik.Web.UI.RadAjaxLoadingPanel, {"initialDelayTime":200,"isSticky":false,"minDisplayTime":500,"skin":"Silk","uniqueID":"dnn$ctr4624$List$Globalstech_AjaxLoadingPanel_4624","zIndex":90000}, null, null, $get("Globalstech_AjaxLoadingPanel_4624"));
                                });
                                Sys.Application.add_init(function() {
                                    $create(Telerik.Web.UI.RadAjaxLoadingPanel, {"initialDelayTime":200,"isSticky":false,"minDisplayTime":500,"skin":"Silk","uniqueID":"dnn$ctr4626$List$Globalstech_AjaxLoadingPanel_4626","zIndex":90000}, null, null, $get("Globalstech_AjaxLoadingPanel_4626"));
                                });
                                Sys.Application.add_init(function() {
                                    $create(Telerik.Web.UI.RadAjaxLoadingPanel, {"initialDelayTime":200,"isSticky":false,"minDisplayTime":500,"skin":"Silk","uniqueID":"dnn$ctr4627$List$Globalstech_AjaxLoadingPanel_4627","zIndex":90000}, null, null, $get("Globalstech_AjaxLoadingPanel_4627"));
                                });
                                Sys.Application.add_init(function() {
                                    $create(Telerik.Web.UI.RadAjaxLoadingPanel, {"initialDelayTime":200,"isSticky":false,"minDisplayTime":500,"skin":"Silk","uniqueID":"dnn$ctr4630$List$Globalstech_AjaxLoadingPanel_4630","zIndex":90000}, null, null, $get("Globalstech_AjaxLoadingPanel_4630"));
                                });
                                Sys.Application.add_init(function() {
                                    $create(Telerik.Web.UI.RadAjaxLoadingPanel, {"initialDelayTime":200,"isSticky":false,"minDisplayTime":500,"skin":"Silk","uniqueID":"dnn$ctr4632$List$Globalstech_AjaxLoadingPanel_4632","zIndex":90000}, null, null, $get("Globalstech_AjaxLoadingPanel_4632"));
                                });
                                Sys.Application.add_init(function() {
                                    $create(Telerik.Web.UI.RadAjaxLoadingPanel, {"initialDelayTime":200,"isSticky":false,"minDisplayTime":500,"skin":"Silk","uniqueID":"dnn$ctr11644$List$Globalstech_AjaxLoadingPanel_11644","zIndex":90000}, null, null, $get("Globalstech_AjaxLoadingPanel_11644"));
                                });
                            </script>
</form>
<div id='i-action-content' portalid='0'></div>
</body>
</html>
