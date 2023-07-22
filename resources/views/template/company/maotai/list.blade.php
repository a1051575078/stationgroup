@extends('template.company.maotai.layout')
@php($data=app('App\Http\Controllers\CoreController'))
@section('content')
    <div class="conRig rt">
        <div class="newsTop column" name="顶部" id="newsTop" runat="server">
            <div class="portlet" id="d7d2ce0aeebe4354995f3c38ea312205" pagemoduleid="69c4c2def6a14c4dbbe74c7dcf1a6a9a">
                <div align="left" class="portlet-header">
                    <span id="menu"></span>
                    <div id="submenud7d2ce0aeebe4354995f3c38ea312205" class="shadow dn">
                        <ul class="float_list_ul"></ul>
                    </div>
                </div>
                <div>
                    <div class="jdxwB clearfix" opentype="page">
                        <div class="jdTit lt">
                            <p>公告公示</p>
                        </div>
                        <div class="bd lt clearfix">
                            <ul class="jdList">
                                @for($i=0;$i<3;$i++)
                                    @php($info=$data->content($firstDomain,$pinyin))
                                    <li class="clearfix">
                                        <i></i>
                                        <a href="{{$info['url']}}" onclick="void(0)" target="_blank" title="{{$info['title']}}" istitle="true">
                                            {{$info['title']}}
                                        </a>
                                        <span>{{date('m-d',strtotime('-'.$i.' day'))}}</span>
                                    </li>
                                @endfor
                            </ul>
                        </div>
                    </div>
                    <script type="text/javascript">
                        jQuery(".jdxwB").slide({mainCell:".bd ul",autoPlay:true,effect:"topMarquee",vis:3,interTime:150});
                    </script>
                </div>
            </div>
        </div>
        <div class="newsWrap clearfix">
            <div class="newsLeft lt column" name="左边" id="newsLeft" runat="server">
                <div class="portlet" id="3ba87672af994a64a87cf8217c466a59" pagemoduleid="b103a9ac959d41a6a0704135614d8785">
                    <div align="left" class="portlet-header">
                        <span id="menu"></span>
                        <div id="submenu3ba87672af994a64a87cf8217c466a59" class="shadow dn">
                            <ul class="float_list_ul"></ul>
                        </div>
                    </div>
                    <div>
                        <div class="newsBox" opentype="page">
                            <div class="HB">
                                <ul class="autoPlay clearfix">
                                    @php($img=['2021042608354912836.jpg','2021042514104385687.jpg','2021042509282867070.jpg'])
                                    @for($i=0;$i<3;$i++)
                                        @php($info=$data->content($firstDomain,$pinyin))
                                        <li>
                                            <p class="Image">
                                                <a href="{{$info['url']}}" target="_blank">
                                                    <img src="{{$host.'/template/company/maotai/img'.'/'.$img[$i]}}" border="0" alt="{{$info['title']}}" title="{{$info['title']}}"/>
                                                </a>
                                            </p>
                                            <p class="Title">
                                                <a href="{{$info['url']}}" onclick="void(0)" target="_blank" title="{{$info['title']}}" istitle="true">
                                                    {{$info['title']}}...
                                                </a>
                                            </p>
                                        </li>
                                    @endfor
                                </ul>
                            </div>
                            <div class="PLAYbtn">
                                <ul></ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="newsRight rt column" name="右边" id="newsRight" runat="server">
                <div class="portlet" id="cbab6755ee454655b6684daa94749bc4" pagemoduleid="3d9e81dce0594bda90cef3a0bfaba063">
                    <div align="left" class="portlet-header">
                        <span id="menu"></span>
                        <div id="submenucbab6755ee454655b6684daa94749bc4" class="shadow dn">
                            <ul class="float_list_ul"></ul>
                        </div>
                    </div>
                    <div>
                        <ul class="Tab4 clearfix">
                            <li class="on">
                                <a href="javascript:void(0)">公司新闻</a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">媒体聚焦</a>
                            </li>
                        </ul>
                        <script>
                            $(".Tab4 li").mouseenter(function() {
                                $(this).addClass("on").siblings().removeClass("on");
                                var index = $(this).index();
                                $(".tabBox4").hide().eq(index).show();
                            })
                        </script>
                    </div>
                </div>
                <div class="portlet" id="2e68048d4d17479abf66ac07d0c4d436" pagemoduleid="5f36e842c8854214ad9fbdd9cc962d86">
                    <div align="left" class="portlet-header">
                        <span id="menu"></span>
                        <div id="submenu2e68048d4d17479abf66ac07d0c4d436" class="shadow dn">
                            <ul class="float_list_ul"></ul>
                        </div>
                    </div>
                    <div>
                        <div class="company1 tabBox4" style="display:block;" opentype="page">
                            <ul class="companyList">
                                @for($i=0;$i<6;$i++)
                                    @php($info=$data->content($firstDomain,$pinyin))
                                    <li class="clearfix">
                                        <i></i>
                                        <a href="{{$info['url']}}" onclick="void(0)" target="_blank" title="{{$info['title']}}" istitle="true">
                                            {{$info['title']}}...
                                        </a>
                                        <span>{{date('m-d',strtotime('-'.$i.' day'))}}</span>
                                    </li>
                                @endfor
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="portlet" id="613dacd83d1e4985b02f0dedbaa506b8" pagemoduleid="f46c526bf291401696c65559a0acb653">
                    <div align="left" class="portlet-header">
                        <span id="menu"></span>
                        <div id="submenu613dacd83d1e4985b02f0dedbaa506b8" class="shadow dn">
                            <ul class="float_list_ul"></ul>
                        </div>
                    </div>
                    <div>
                        <div class="company1 tabBox4" opentype="page">
                            <ul class="companyList">
                                @for($i=0;$i<6;$i++)
                                    @php($info=$data->content($firstDomain,$pinyin))
                                    <li class="clearfix">
                                        <i></i>
                                        <a href="{{$info['url']}}" onclick="void(0)" target="_blank" title="{{$info['title']}}" istitle="true">
                                            {{$info['title']}}...
                                        </a>
                                        <span>{{date('m-d',strtotime('-'.$i.' day'))}}</span>
                                    </li>
                                @endfor
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="newsWrap clearfix">
            <div class="newsLeft lt column" name="左边1" id="newsLeft1" runat="server">
                <div class="portlet" id="4a4c2b184c30409b8c495802e5f3dadb" pagemoduleid="231bb65a9d084720b7a497dbe919baf3">
                    <div align="left" class="portlet-header">
                        <span id="menu"></span>
                        <div id="submenu4a4c2b184c30409b8c495802e5f3dadb" class="shadow dn">
                            <ul class="float_list_ul"></ul>
                        </div>
                    </div>
                    <div>
                        <div class="ghdtList" opentype="page">
                            <p class="tzgls clearfix"> <span class="name lt">
                                                    <span>招聘公告</span>
                                                </span>
                                @php($info=$data->navigation($firstDomain,$pinyin))
                                <a href="{{$info['url']}}" class="rt" title="{{$info['title']}}">{{$info['title']}}</a>
                            </p>
                            <ul class="maolist">
                                @for($i=0;$i<5;$i++)
                                    @php($info=$data->content($firstDomain,$pinyin))
                                    <li class="clearfix">
                                        <i></i>
                                        <a href="{{$info['url']}}" onclick="void(0)" target="_blank" title="{{$info['title']}}" istitle="true">
                                            {{$info['title']}}...
                                        </a>
                                        <span>{{date('m-d',strtotime('-'.$i.' day'))}}</span>
                                    </li>
                                @endfor
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="newsRight rt column" name="右边1" id="newsRight1" runat="server">
                <div class="portlet" id="cac6e2c4e3cb43798c9bc79a4976e863" pagemoduleid="bec93845256b469dbce0a60c1e983bff">
                    <div align="left" class="portlet-header">
                        <span id="menu"></span>
                        <div id="submenucac6e2c4e3cb43798c9bc79a4976e863" class="shadow dn">
                            <ul class="float_list_ul"></ul>
                        </div>
                    </div>
                    <div>
                        <div class="ghdtList ghdtList-schd" opentype="page">
                            <p class="tzgls clearfix"> <span class="name lt">
                                                    <span>市场活动</span>
                                                </span>
                                @php($info=$data->navigation($firstDomain,$pinyin))
                                <a href="{{$info['url']}}" class="rt" title="{{$info['title']}}">{{$info['title']}}</a>
                            </p>
                            <ul class="maolist">
                                @for($i=0;$i<5;$i++)
                                    @php($info=$data->content($firstDomain,$pinyin))
                                    <li class="clearfix">
                                        <i></i>
                                        <a href="{{$info['url']}}" onclick="void(0)" target="_blank" title="{{$info['title']}}" istitle="true">
                                            {{$info['title']}}...
                                        </a>
                                        <span>{{date('m-d',strtotime('-'.$i.' day'))}}</span>
                                    </li>
                                @endfor
                            </ul>
                        </div>
                        <style>
                            .ghdtList-schd{width:95%;margin-left:5%;}
                        </style>
                    </div>
                </div>
            </div>
        </div>
        <div class="newsBottom column" name="底部" id="newsBottom" runat="server">
            <div class="portlet" id="f7b187fc1fb949de80749ec56ac76cc3" pagemoduleid="1ba12b6d169c480f920f2236c3114751">
                <div align="left" class="portlet-header">
                    <span id="menu"></span>
                    <div id="submenuf7b187fc1fb949de80749ec56ac76cc3" class="shadow dn">
                        <ul class="float_list_ul"></ul>
                    </div>
                </div>
                <div>
                    <div class="ghdtList" opentype="page">
                        <p class="tzgls clearfix">
                                            <span class="name lt">
                                                <span>招标采购</span>
                                            </span>
                            @php($info=$data->navigation($firstDomain,$pinyin))
                            <a href="{{$info['url']}}" class="rt" title="{{$info['title']}}">{{$info['title']}}</a>
                        </p>
                        <ul class="maolist maolist-zbcg clearfix">
                            @for($i=0;$i<8;$i++)
                                @php($info=$data->content($firstDomain,$pinyin))
                                <li class="clearfix">
                                    <i></i>
                                    <a href="{{$info['url']}}" onclick="void(0)" target="_blank" title="{{$info['title']}}" istitle="true">
                                        {{$info['title']}}...
                                    </a>
                                    <span>{{date('m-d',strtotime('-'.$i.' day'))}}</span>
                                </li>
                            @endfor
                            <div class="xian"></div>
                        </ul>
                    </div>
                    <style>
                        .maolist-zbcg{position: relative;}
                        .maolist-zbcg li{width:50%;float:left;}
                        .maolist-zbcg .xian{width:1px;position: absolute;height: 100%;top: 0;left: 50%;background: #eee;}
                    </style>
                </div>
            </div>
        </div>
        <div class="newsBottom column" name="底部1" id="newsBottom1" runat="server"></div>
    </div>
    </div>
    </div>
    </div>
@endsection
