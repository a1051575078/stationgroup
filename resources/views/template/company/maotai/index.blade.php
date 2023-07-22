@php($data=app('App\Http\Controllers\CoreController'))
@extends('template.company.maotai.layout')
@section('content')
    <div class="mtgf_banner column" id="mtgf_banner" name="banner" runat="server">
        <div class="portlet" id="9480dea8d01643dea024b48497d0f335" pagemoduleid="5dccf54b90af41dca76f696e15750bce">
            <div align="left" class="portlet-header">
                <span id="menu"></span>
                <div id="submenu9480dea8d01643dea024b48497d0f335" class="shadow dn">
                    <ul class="float_list_ul"></ul>
                </div>
            </div>
            <div>
                <div id="slideBox" class="slideBox" opentype="page">
                    <div class="bds">
                        <ul>
                            @php($img=['2019121709303463672.jpg','2019081211391629186.jpg','2019071717335028991.jpg','2019071717325513031.jpg'])
                            @for($i=0;$i<4;$i++)
                                @php($info=$data->content($firstDomain,$pinyin))
                                <li>
                                    <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">
                                        <img src="{{$host.'/template/company/maotai/img'.'/'.$img[$i]}}" border="0" title="{{$info['title']}}" alt="{{$info['title']}}"/>
                                    </a>
                                </li>
                            @endfor
                        </ul>
                    </div>
                    <div class="hd">
                        <ul></ul>
                    </div>
                    <a class="prev" href="javascript:void(0)"></a>
                    <a class="next" href="javascript:void(0)"></a>
                </div>
                <script type="text/javascript">
                    jQuery("#slideBox").slide({titCell:".hd ul",mainCell:".bds ul",autoPlay:true,effect:"leftLoop",interTime:5000, delayTime:1000,autoPage:true});
                    jQuery(".fullSlide").slide({titCell:".hd", mainCell:".bd", effect:"fold",  autoPlay:true, autoPage:true, trigger:"mouseover",interTime:5000, delayTime:1000});
                </script>
            </div>
        </div>
    </div>
    <div class="mtgf_gg column" id="mtgf_gg" name="通知公告" runat="server">
        <div class="portlet" id="ae9dc9f9c75148869f19a27eaf8ee3bd" pagemoduleid="146645775d9447c6ba6cbe41eb4bfeb3">
            <div align="left" class="portlet-header">
                <span id="menu"></span>
                <div id="submenuae9dc9f9c75148869f19a27eaf8ee3bd" class="shadow dn">
                    <ul class="float_list_ul"></ul>
                </div>
            </div>
            <div>
                <div class="txtScroll-left clearfix" opentype="page">
                    <div class="txtScroll-content">
                        <p class="tgLogo lt">公示公告：</p>
                        <div class="bd lt">
                            <ul class="infoList clearfix">
                                @for($i=0;$i<10;$i++)
                                    @php($info=$data->content($firstDomain,$pinyin))
                                    <li>
                                        <a href="{{$info['url']}}" onclick="void(0)" target="_blank" title="{{$info['title']}}" istitle="true">
                                            {{$info['title']}}
                                        </a>
                                        <span class="dates">[{{date('Y-m-d',strtotime('-'.$i.' day'))}}]</span>
                                    </li>
                                @endfor
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="maotai_content">
        <div class="bti">
            <div class="bti_content">
                @php($info=$data->navigation($firstDomain,$pinyin))
                <a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
            </div>
        </div>
        <div class="maotai_content_nr">
            <div class="mtgf_xwgg">
                <div class="mtgf_xwlb column" id="mtgf_xwlb" name="新闻动态" runat="server">
                    <div class="portlet" id="8c3cd3665f704bd4ad6ea293cfa39828" pagemoduleid="0ed881460556425c8b5ca80da20a6d20">
                        <div align="left" class="portlet-header">
                            <span id="menu"></span>
                            <div id="submenu8c3cd3665f704bd4ad6ea293cfa39828" class="shadow dn">
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
                                                    <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">
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
                <div class="mtgf_xwdt column" id="mtgf_xwdt" name="通知公告" runat="server">
                    <div class="portlet" id="cb761c109a02495493ee2d8dac978b7f" pagemoduleid="bef2572f02484efda4f9c346d64e738e">
                        <div align="left" class="portlet-header">
                            <span id="menu"></span>
                            <div id="submenucb761c109a02495493ee2d8dac978b7f" class="shadow dn">
                                <ul class="float_list_ul"></ul>
                            </div>
                        </div>
                        <div>
                            <div class="mt_xw_nr" opentype="page">
                                <ul class="mt_xw">
                                    @for($i=0;$i<7;$i++)
                                        @php($info=$data->content($firstDomain,$pinyin))
                                        <li>
                                            <i></i>
                                            <a href="{{$info['url']}}" onclick="void(0)" target="_blank" title="{{$info['title']}}" istitle="true">
                                                {{$info['title']}}
                                            </a>
                                            <span>{{date('Y-m-d',strtotime('-'.$i.' day'))}}</span>
                                        </li>
                                    @endfor
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mtgf_zt column" id="mtgf_zt" name="专题" runat="server">
                <div class="portlet" id="56e55400df174bf4a604c03387d102af" pagemoduleid="b3164fc58d474f4eb4362f477fb47878">
                    <div align="left" class="portlet-header">
                        <span id="menu"></span>
                        <div id="submenu56e55400df174bf4a604c03387d102af" class="shadow dn">
                            <ul class="float_list_ul"></ul>
                        </div>
                    </div>
                    <div>
                        <div class="div_img" opentype="page">
                            @php($info=$data->navigation($firstDomain,$pinyin))
                            <a class="showZT" href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">
                                <img src="{{$host.'/template/company/maotai/img/2019071209270763703.png'}}" border="0" alt="{{$info['title']}}" title="{{$info['title']}}"/>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bgc_c">
                <div class="bti">
                    <div class="bti_content">
                        @php($info=$data->navigation($firstDomain,$pinyin))
                        <a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                    </div>
                </div>
                <div class="mtgf_cpzx column" id="mtgf_cpzx" name="产品中心" runat="server">
                    <div class="portlet" id="fb6eb37a459d4c8cbf3d1177c12ab842" pagemoduleid="18edc5d577bb4d06aa08f564f1e4db51">
                        <div align="left" class="portlet-header">
                            <span id="menu"></span>
                            <div id="submenufb6eb37a459d4c8cbf3d1177c12ab842" class="shadow dn">
                                <ul class="float_list_ul"></ul>
                            </div>
                        </div>
                        <div>
                            <ul class="kjTab clearfix">
                                <li class="on">
                                    <a href="javascript:void(0)">贵州茅台酒</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" style="margin-left:40px;">其他酱香系列</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="portlet" id="2eefb26eb1034ba38350de2e005e9207" pagemoduleid="bd5f199faa634431b65d2017a20b92de">
                        <div align="left" class="portlet-header">
                            <span id="menu"></span>
                            <div id="submenu2eefb26eb1034ba38350de2e005e9207" class="shadow dn">
                                <ul class="float_list_ul"></ul>
                            </div>
                        </div>
                        <div>
                            <div class="kjfw clearfix kjbox" style="display:block;" opentype="page">
                                <div class="kjfw-L lt"></div>
                                <div class="kjfw-C lt">
                                    <div class="kjfw-ul">
                                        @php($img=['2019081215032087040.jpg','2019072316065762425.png','2019072311155819835.png','2019072311245268897.png'])
                                        @php($species=['贵州茅台酒（新飞天500ml）','贵州茅台酒（生肖戊戌狗年）','贵州茅台酒（生肖乙亥猪年）','贵州茅台酒（生肖丁酉鸡年）'])
                                        @for($i=0;$i<4;$i++)
                                            @php($info=$data->content($firstDomain,$pinyin))
                                            @if($i===0)
                                                @php($jiu='茅台酒')
                                            @else
                                                @php($jiu='茅台酒 贵州 生肖')
                                            @endif
                                            <div class="holder notactive">
                                        <span class="kjfw-ul_img">
                                            <img src="{{$host.'/template/company/maotai/img'.'/'.$img[$i]}}" border="0" alt="{{$species[$i]}}" title="{{$species[$i]}}"/>
                                        </span>
                                                <span class="kjfw-morekjfw-more">
                                            <a href="{{$info['url']}}" target="_blank" title="{{$species[$i]}}">详情</a>
                                        </span>
                                                <span class="kjfw_tit">
                                            <a href="{{$info['url']}}" onclick="void(0)" target="_blank" title="{{$species[$i]}}" istitle="true">
                                                {{$species[$i]}}
                                            </a>
                                        </span>
                                                <div class="textnr">
                                            <span class="kjfw_titt">
                                                <a href="{{$info['url']}}" onclick="void(0)" target="_blank" title="{{$species[$i]}}" istitle="true">
                                                    {{$species[$i]}}
                                                </a>
                                            </span>
                                                    <span class="kjfw_ext123">酱香型 | 53 | 500</span>
                                                    <span class="kjfw_ext4">{{$jiu}}</span>
                                                </div>
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                                <div class="kjfw-R lt"></div>
                            </div>
                        </div>
                    </div>
                    <div class="portlet" id="8d38b4f479674c54aeaa857bc4d5e060" pagemoduleid="dc458b9dd9084a37b01d8adad0f61e11">
                        <div align="left" class="portlet-header">
                            <span id="menu"></span>
                            <div id="submenu8d38b4f479674c54aeaa857bc4d5e060" class="shadow dn">
                                <ul class="float_list_ul"></ul>
                            </div>
                        </div>
                        <div>
                            <div class="kjfw clearfix kjbox" style="display:none;" opentype="page">
                                <div class="kjfw-L lt"></div>
                                <div class="kjfw-C lt">
                                    <div class="kjfw-ul">
                                        @php($img=['2020040715454486919.png','2020040715134056102.jpg','2020040715094174432.jpg','2020040715030024051.jpg','2020040714560315114.jpg','2020040714473186265.jpg','2020040714260614742.jpg','2020040716254465188.jpg','2020040714150592957.jpg','2020040713564258130.jpg'])
                                        @php($species=['华茅酒（53度500ml）','财富酒（龙）','财富酒（贵宾珍藏）','财富酒（贵宾典藏）','高尔夫（大师级）','汉酱酒（135BC）','汉酱酒（铂金蓝）','仁酒（丹青殊荣）','仁酒（和天下）','茅台王子酒（黑金）'])
                                        @for($i=0;$i<10;$i++)
                                            @php($info=$data->content($firstDomain,$pinyin))
                                            <div class="holder notactive">
                                        <span class="kjfw-ul_img">
                                            <img src="{{$host.'/template/company/maotai/img'.'/'.$img[$i]}}" border="0" alt="{{$species[$i]}}" title="{{$species[$i]}}"/>
                                        </span>
                                                <span class="kjfw-morekjfw-more">
                                                <a href="{{$info['url']}}" target="_blank" title="{{$species[$i]}}">详情</a>
                                            </span>
                                                <span class="kjfw_tit">
                                                <a href="{{$info['url']}}" onclick="void(0)" target="_blank" title="{{$species[$i]}}" istitle="true">
                                                    {{$species[$i]}}
                                                </a>
                                            </span>
                                                <div class="textnr">
                                            <span class="kjfw_titt">
                                                <a href="{{$info['url']}}" onclick="void(0)" target="_blank" title="{{$species[$i]}}" istitle="true">
                                                    {{$species[$i]}}
                                                </a>
                                            </span>
                                                    <span class="kjfw_ext123">酱香型 | 53 | 500</span>
                                                    <span class="kjfw_ext4"></span>
                                                </div>
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                                <div class="kjfw-R lt"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bti">
                <div class="bti_content">
                    @php($info=$data->navigation($firstDomain,$pinyin))
                    <a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                </div>
            </div>
            <div class="mtgf_fw column" id="mtgf_fw" name="服务中心" runat="server">
                <div class="portlet" id="03419ff33c8943d2be35bfd7590cddf9" pagemoduleid="9147e2881c154d5c95512a9363a6669d">
                    <div align="left" class="portlet-header">
                        <span id="menu"></span>
                        <div id="submenu03419ff33c8943d2be35bfd7590cddf9" class="shadow dn">
                            <ul class="float_list_ul"></ul>
                        </div>
                    </div>
                    <div>
                        <div class="mt_fwzx">
                            <ul class="fwzxa_list">
                                @php($img1=['2019052315150853837.png','2019052315152334613.png','2019052315162884896.png','2019091616010857917.png','2019052315154460735.png','2019052315160720978.png','2019052315293244415.png','2019052315294411897.png','2019052315301113013.png','2019052315302657556.png'])
                                @php($img2=['2019052315313395720.png','2019052315314528987.png','2019052315315681434.png','2019091616011586570.png','2019052315320795065.png','2019052315322653960.png','2019052315324175392.png','2019052315330776876.png','2019052315333437557.png','2019052315334877334.png'])
                                @php($txt=['打假维权','防伪溯源','在线咨询','投诉举报','国内经销商','物流查询','海外经销商','在线招聘','业务服务','开票信息'])
                                @for($i=0;$i<10;$i++)
                                    @php($info=$data->content($firstDomain,$pinyin))
                                    <li>
                                        <a href="{{$info['url']}}" target="_parent" title="{{$txt[$i]}}">
                                            <img class="nor" src="{{$host.'/template/company/maotai/img'.'/'.$img1[$i]}}" alt="" title=""/>
                                            <img src="{{$host.'/template/company/maotai/img'.'/'.$img2[$i]}}" alt="" class="hov" title=""/>
                                            <p>{{$txt[$i]}}</p>
                                        </a>
                                    </li>
                                @endfor
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bgc_c">
                <div class="bti">
                    <div class="bti_content">
                        @php($info=$data->navigation($firstDomain,$pinyin))
                        <a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                    </div>
                </div>
                <div class="mtgf_yw column" id="mtgf_yw" name="投资者关系" runat="server">
                    <div class="portlet" id="4e2799f456f3492ba340d7a64a7f459e" pagemoduleid="f2ef594c90c741a5985eb0914a6f60f3">
                        <div align="left" class="portlet-header">
                            <span id="menu"></span>
                            <div id="submenu4e2799f456f3492ba340d7a64a7f459e" class="shadow dn">
                                <ul class="float_list_ul"></ul>
                            </div>
                        </div>
                        <div>
                            <ul class="xinwenListBox" opentype="page">
                                @for($i=0;$i<3;$i++)
                                    @php($info=$data->content($firstDomain,$pinyin))
                                    <li class="clearfix">
                                        <div class="zuo">
                                            <span class="ri"> </span>
                                            <span class="yearAndMonth">{{date('Y-m-d',strtotime('-'.$i.' day'))}}</span>
                                        </div>
                                        <div class="rightt">
                                            <div class="biaoti">
                                                <a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                                            </div>
                                            <div class="summaryy"></div>
                                        </div>
                                        <div class="bottomm">
                                            <a href="{{$info['url']}}" title="{{$info['title']}}">查看详细 </a>
                                        </div>
                                    </li>
                                @endfor
                            </ul>
                            <script type="text/javascript">
                                //<![CDATA[
                                jQuery(function(){
                                    for(t=0;t<jQuery(".xinwenListBox > li").length;t++){
                                        var dateText = jQuery(".xinwenListBox > li").eq(t).find(".yearAndMonth").text();
                                        jQuery(".xinwenListBox > li").eq(t).find(".yearAndMonth").html(dateText.split("-")[0]);
                                        jQuery(".xinwenListBox > li").eq(t).find(".ri").html(dateText.split("-")[1]+'/'+dateText.split("-")[2]);
                                    }
                                })
                                //]]>
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
