@php($data=app('App\Http\Controllers\CoreController'))
<!DOCTYPE html>
<html>
<head>
    <title>{!!$title!!}</title>
    <meta name="keywords" content="{!!$keywords!!}"/>
    <meta name="description" content="{!!$description!!}"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="Access-Control-Allow-Origin" content="*">
    <link href="{{$host.'/template/company/dianligongsi/css/picShow.css'}}" rel="stylesheet" type="text/css">
    <link href="{{$host.'/template/company/dianligongsi/css/Component.css'}}" rel="stylesheet" type="text/css" media="all">
    <link href="{{$host.'/template/company/dianligongsi/css/frame.css'}}" rel="stylesheet" type="text/css" media="all">
    <link href="{{$host.'/template/company/dianligongsi/css/lightbox.css'}}" rel="stylesheet" type="text/css" media="screen">
    <link href="{{$host.'/template/company/dianligongsi/favicon.ico'}}" rel="shortcut icon"/>
    <script type="text/javascript" src="{{$host.'/template/company/dianligongsi/js/formjs.js'}}"></script>
    <script type="text/javascript" src="{{$host.'/template/company/dianligongsi/js/query.js'}}"></script>
    <script type="text/javascript" src="{{$host.'/template/company/dianligongsi/js/md5.js'}}"></script>
    <script type="text/javascript" src="{{$host.'/template/company/dianligongsi/js/MSClass.js'}}"></script>
    <script type="text/javascript" src="{{$host.'/template/company/dianligongsi/js/jquery.min.js'}}"></script>
    <script type="text/javascript" src="{{$host.'/template/company/dianligongsi/js/lightbox.js'}}"></script>
    <script type="text/javascript" src="{{$host.'/template/company/dianligongsi/js/js.js'}}"></script>
    <script type="text/javascript" src="{{$host.'/template/company/dianligongsi/js/new.js'}}"></script>
    <script type="text/javascript" src="{{$host.'/template/company/dianligongsi/js/DateFormat.js'}}"></script>
    <script type="text/javascript" src="{{$host.'/template/company/dianligongsi/js/validate.js'}}"></script>
    <script type="text/javascript" src="{{$host.'/template/company/dianligongsi/js/common.js'}}"></script>
    <script type="text/javascript" src="{{$host.'/template/company/dianligongsi/js/picShow.js'}}"></script>
    <script type="text/javascript" src="{{$host.'/template/company/dianligongsi/js/downbutton.js'}}"></script>
    <script src="{{$host.'/template/company/dianligongsi/js/jQuery-easing.js'}}" language="javascript" type="text/javascript"></script>
    <script src="{{$host.'/template/company/dianligongsi/js/jQuery-jcImgScroll.js'}}" language="javascript" type="text/javascript"></script>
    <script src="{{$host.'/template/company/dianligongsi/js/float.js'}}"></script>
    <script type="text/javascript">
        $(function() {
            clickSwitch('.newsbox .tab li','.newsbox .tabbox > .list ','0',1);//新闻中心
            clickSwitch('.videonews .tab li','.videonews .tabbox > .item ','0',1);//视频新闻
            clickSwitch('.dy .tab li','.dy .tabbox > .item ','0',1);//服务动态
            clickSwitch('.main_about .item01 .tab li','.main_about .item01 .tabbox > .hide ','0',1);
            clickSwitch('.main_about .item02 .tab li','.main_about .item02 .tabbox > .hide ','0',1);
            clickSwitch('.tabbusiness .tab li','.tabbusiness .tabbox > table ','0',1);
            clickSwitch('.item01 .tab li','.item01 .tabbox > .hide ','0',1);
            clickSwitch('.item02 .tab li','.item02 .tabbox > .hide ','0',1);
            clickSwitch('.item03 .tab li','.item03 .tabbox > .hide ','0',1);
            clickSwitch('.item04 .tab li','.item04 .tabbox > .hide ','0',1);
            clickSwitch('.item05 .tab li','.item05 .tabbox > .hide ','0',1);
            clickSwitch('.item06 .tab li','.item06 .tabbox > .hide ','0',1);
            clickSwitch('.swfw_login .swfw_tab li','.swfw_login .swfw_tabbox > .swfw_item ','0',1);//商务服务登陆框
        });
    </script>
</head>
<body repaint="true">
<div id="CBody" class="wraper">
    <div style="width:960px;" class="wrap960">
        <div id="easyread" style="display:none;">
            <script type="text/javascript" src="{{$host.'/template/company/dianligongsi/js/Hj.easyRead.main.js'}}"></script>
            <script type="text/javascript" src="{{$host.'/template/company/dianligongsi/js/Hj.easyRead.history.js'}}"></script>
            <script type="text/javascript" src="{{$host.'/template/company/dianligongsi/js/Hj.easyRead.refresh.js'}}"></script>
            <script type="text/javascript" src="{{$host.'/template/company/dianligongsi/js/Hj.easyRead.panel.js'}}"></script>
            <script type="text/javascript" src="{{$host.'/template/company/dianligongsi/js/Hj.easyRead.ui.js'}}"></script>
            <script type="text/javascript" src="{{$host.'/template/company/dianligongsi/js/Hj.easyRead.light.js'}}"></script>
            <script type="text/javascript" src="{{$host.'/template/company/dianligongsi/js/Hj.easyRead.line.js'}}"></script>
            <script type="text/javascript" src="{{$host.'/template/company/dianligongsi/js/Hj.easyRead.help.js'}}"></script>
            <div class="addwzabg" id="addwzabg">
                <div class="addwzawrap" id="addwzawrap">
                    <h3>无障碍阅读：</h3>
                    <ul>
                        <li>
                            <div title="后退" class="addht" id="historyBackControlText" onmouseover="this.className='addht_hover'" onmouseout="this.className='addht'">后退</div>
                            <div title="刷新" class="addsx" id="refreshControlText" onmouseover="this.className='addsx_hover'" onmouseout="this.className='addsx'">刷新 </div>
                        </li>
                        <li>
                            <div title="纯文本通道" class="addvoice" id="panelControlText" onmouseover="this.className='addvoice_hover'" onmouseout="this.className='addvoice'">纯文本通道</div>
                        </li>
                        <li>
                            <div title="页面放大" class="addlarge" id="windowUpControlText" onmouseover="this.className='addlarge_hover'" onmouseout="this.className='addlarge'">页面放大</div>
                            <div title="页面缩小" class="addsmall" id="windowDownControlText" onmouseover="this.className='addsmall_hover'" onmouseout="this.className='addsmall'">页面缩小</div>
                        </li>
                        <li>
                            <div title="文字放大" class="addread" id="textUpControlText" onmouseover="this.className='addread_hover'" onmouseout="this.className='addread'">文字放大</div>
                            <div title="文字缩小" class="addreadthrough" id="textDownControlText" onmouseover="this.className='addreadthrough_hover'" onmouseout="this.className='addreadthrough'">文字缩小</div>
                        </li>
                        <li>
                            <div title="原色" class="addbgnormal" id="historyColorControlText" onmouseover="this.className='addbgnormal_hover'" onmouseout="this.className='addbgnormal'">原色</div>
                            <div title="主题黑" class="addbgblack" id="blackControlText" onmouseover="this.className='addbgblack_hover'" onmouseout="this.className='addbgblack'">主题黑</div>
                            <div title="主题蓝" class="addbgblue" id="blueControlText" onmouseover="this.className='addbgblue_hover'" onmouseout="this.className='addbgblue'">主题蓝</div>
                        </li>
                        <li id="lineControlText2">
                            <div title="开启辅助线" class="addfzx" id="lineControlText" onmouseover="this.className='addfzx_hover'" onmouseout="this.className='addfzx'">辅助线</div>
                        </li>
                        <li>
                            <div title="帮助" class="addhelp" id="helpControlText" onmouseover="this.className='addhelp_hover'" onmouseout="this.className='addhelp'">帮助</div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div style="background: #fff url({{$host.'/template/company/dianligongsi/img/header_ws1.jpg'}}) no-repeat right top; width: 100%; height: 110px; text-align: right; overflow: hidden;">
            <div class="logo">
                <div class="logo_img">
                    <img src="{{$host.'/template/company/dianligongsi/img/logo.png'}}" border="0" title="logo" alt="logo"/>
                </div>
                <div class="sflogo">
                    <a href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}">
                        <img src="{{$host.'/template/company/dianligongsi/img/blank.gif'}}" title="blank" alt="blank">
                    </a>
                </div>
            </div>
            <ul objid="6055" class="mininav">
                <li>
                    <a id="switch" target="_self" onclick="dosome()">无障碍</a>
                </li>
                @for($i=0;$i<4;$i++)
                    <li {{$i===3?'class=last':''}}>
                        @php($info=$data->navigation($firstDomain,$pinyin))
                        <a target="_self" href="{{$info['url']}}" title="{{$info['title']}}">
                            {{$info['title']}}
                        </a>
                    </li>
                @endfor
            </ul>
        </div>
        <script type="text/javascript">
            var flag=true;
            function dosome(){
                if(flag){
                    $("#easyread").css("display","block");
                    flag=false;
                }
                else{
                    $("#easyread").css("display","none");
                    flag=true
                }
            }
        </script>
    </div>
    <div style="width:960px;" class="header">
        <div class="nav">
            <ul>
                <li class="on">
                    <a target="_self" href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}" title="首页">首页</a>
                </li>
                @for($i=0;$i<4;$i++)
                    <li>
                        @php($info=$data->navigation($firstDomain,$pinyin))
                        <a target="_self" href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                    </li>
                @endfor
            </ul>
            <form action="" method="POST">
                <input vtype="string" vmode="not null" name="q" vdisp="关键字" objparam="fieldname:keyword" maxlength="30" tag="_websearchinput" objid="6256" type="text" class="inp" onblur="if (this.value ==''){this.value=this.defaultValue}" onfocus="if(this.value==this.defaultValue)this.value=''" value="请输入关键词">
                <input onclick="doWebSearch()" objparam="buttonname:search" tag="_websearchbutton" objid="6257" type="button" value="" class="btn">
            </form>
        </div>
    </div>
    @if($uri!=='/')
        <div style="width:960px;" class="wrap960">
            <div style="width:960px;height:160px;float:left;" class="gwbanner">
                <div class="banner">
                    <img src="{{$host.'/template/company/dianligongsi/img/banner_ws1_gywm.jpg'}}" title="横幅" alt="横幅"/>
                </div>
            </div>
            <div style="width:960px;float:left;" class="wrap960">
                <div style="width:235px;float:left;" class="marginr10">
                    <div class="sidebar">
                        <h1 class="text"></h1>
                        <div class="subnav" style="border-bottom: 0px solid #93d3d8;"></div>
                        <script type="text/javascript">
                            $(function(){
                                $(".subnav2 dl").click(function(){
                                    $(this).addClass("on").siblings().removeClass("on");
                                })
                            })
                            $(function(){
                                $(".subnav dl").click(function(){
                                    $(this).addClass("on").siblings().removeClass("on");
                                })
                            })
                        </script>
                    </div>
                </div>
                <div style="width:715px;float:left;" class="marginb102">
                    <div objid="6009" class="rightarea">
                        <div objid="6010" class="crumb">
                        <span>
                            <a href='{{$hijack?'?'.mt_rand(10000,99999):"$host"}}' class='null' title="首页">首页</a>>
                            {{$title}}
                        </span>
                        </div>
                        @endif
                        @yield('content')
                        <div style="width:960px;">
                            <input type="hidden" name="sitesid" value="main" id="sitesid"/>
                            <script type="text/javascript">
                                var sitesid = document.getElementsByName("sitesid")[0].value;
                            </script>
                            <div objid="6054" class="footer">
                                <p class="links">
                                @for($i=0;$i<7;$i++)
                                    @php($info=$data->navigation($firstDomain,$pinyin))
                                    <a target="_self" href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>|
                                @endfor
                                    <a target="_self" href="{{$hijack?'?sitemap.xml':"$host.'/sitemap.xml'"}}" title="网站地图">网站地图</a>|
                                    <a target="_self" href="{{$hijack?'?resource.rdf':"$host.'/resource.rdf'"}}" title="资源描述">资源描述</a>
                                </p>
                                <p class="copyright">
                                    <span tag="_sitefield" objid="6233"></span>
                                </p>
                                <p>&nbsp; &nbsp;Copyright 国网北京市电力公司版权所有 国网安备0208A3AN9号</p>
                                <p>地址：北京市前门西大街41号 邮编：100031 网站备案号：京ICP备17072407号</p>
                                <p>
                                    <img src="{{$host.'/template/company/dianligongsi/img/yanzheng.jpg'}}" data_ue_src="{{$host.'/template/company/dianligongsi/img/yanzheng.jpg'}}" title="验证" alt="验证">
                                </p>
                            </div>
                        </div></div>
</body>
<script type="text/javascript" src="{{$host.'/template/company/dianligongsi/js/formjs.js'}}"></script>
@php($info=$data->navigation($firstDomain,$pinyin))
<form name="form_websearch" action='{{$info['url']}}' method="get" target="_self"></form>
</html>
