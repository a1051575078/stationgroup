@php($data=app('App\Http\Controllers\CoreController'))
@extends('template.company.maotai.layout')
@section('content')
    <div class="conRig rt column" name="右侧" id="conse" runat="server">
        <div class="portlet" id="0a603c3e096743a9a614148f4a242d18" pagemoduleid="cf361ce58246427a9cf95267b3a9e823">
            <div align="left" class="portlet-header" style="display: none;">
                <span id="menu"></span>
                <div id="submenu0a603c3e096743a9a614148f4a242d18" class="shadow dn">
                    <ul class="float_list_ul"></ul>
                </div>
            </div>
            <div>
                <link rel="stylesheet" type="text/css" href="{{$host.'/template/company/maotai/css/cms.css'}}"/>
                <div class="breadCrumb" style="">
                    <div class="w1000">
                        当前位置：
                        <span>
                            <a class="SkinObject" href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}" target="_parent" title="首页">首页</a>&nbsp;&gt;&nbsp;
                            <a class="SkinObject" href="" target="_parent">{{$title}}</a>
                        </span>
                    </div>
                </div>
                <div class="detailBg">
                    <div class="artTit">
                        <h2>{{$title}}</h2>
                        <h4></h4>
                        <h4></h4>
                        <div class="writerWrap">
                            <p>发布时间：{{date('Y年m月d日'),time()-config('app.diy.posttime')}}</p>
                            <p>来源：{{$media}}</p>
                            <p>作者：{{$anthor}}</p>
                        </div>
                    </div>
                    <div class="obj_text">
                        <div class="obj_left">
                            <div class="bdsharebuttonbox bdshare-button-style0-16" data-bd-bind="1619502794454">
                                <span>分享至：</span>
                                <a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
                                <a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
                                <a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
                            </div>
                            <script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='/template/company/maotai/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
                        </div>
                        <div class="obj_right">
                    <span class="print" onclick="javascript:window.print()">
                        <img src="{{$host.'/template/company/maotai/img/dy.png'}}" title="打印" alt="打印"/>打印
                    </span>
                            <span class="size">
                        <a class="big" onclick="big();">
                            <img src="{{$host.'/template/company/maotai/img/big.png'}}" title="变大" alt="变大"/>
                        </a>
                        <a class="midd" onclick="midd();">
                            <img src="{{$host.'/template/company/maotai/img/A_23.png'}}" title="中号" alt="中号"/>
                        </a>
                        <a class="small" onclick="small();">
                            <img src="{{$host.'/template/company/maotai/img/small.png'}}" title="小号" alt="小号"/>
                        </a>
                    </span>
                        </div>
                    </div>
                    <div class="content">
                        <p 0px="" microsoft="" style="font-size: 18px; text-align: justify">
                            <span style="font-size: 18px">
                                <span style="font-family: 宋体">
                                    {!!$content!!}
                                </span>
                            </span>
                        </p>
                    </div>
                    <div class="clearfix">
                        <div class="HITS lt">
                            浏览次数：<span articlecounts="yes">{{mt_rand(1001,9999)}}</span>
                        </div>
                        <div class="closeAn rt">
                            <a href="javascript:window.opener=null;window.open('','_self');window.close();">【关闭当前文章】</a>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                    function big() {
                        $(".content *").css({"fontSize":"20px","lineHeight":"36px"});
                    }
                    function midd() {
                        $(".content *").css({"fontSize":"16px","lineHeight":"26px"});
                    }
                    function small() {
                        $(".content *").css({"fontSize":"14px","lineHeight":"24px"});
                    }
                    $(".position span").html($(".breadCrumb .w1000 span").html())
                    $(function(){
                        var TexT = jQuery.trim($(".breadCrumb span a:last").text());
                        //console.log(TexT);
                        $(".leftNav .leftList .one .oneLi").each(function(){
                            if(jQuery.trim($(this).children("a").text()) == TexT){
                                $(this).addClass("yes");
                            }
                        })
                    })
                </script>
                <input type="hidden" id="articleKey" value="418144"/>
                <script type="text/javascript" src="{{$host.'/template/company/maotai/js/articleCounting.js'}}"></script>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
@endsection
