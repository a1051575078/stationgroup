@php($data=app('App\Http\Controllers\CoreController'))
@extends('template.download.feifan.layout')
@section('content')
    <div class="warp clearfix">
        <div class="Amain_top pretive clearfix mt10 mb10 ml10 mr10">
            <div class="fl clearfix InfoLeft Asoft pl20">
                <div class="Asoftit">
                    <span class="Asoftimg">
                        <img src="{{$host.'/template/download/feifan/img/'.mt_rand(1,122).'.png'}}" alt=""/>
                    </span>
                    <h1>{!!$title!!}
                        <span class="bitty">邮件处理</span>
                    </h1>
                </div>
                <ul class="clearfix Asoft_ul clear mt10">
                    <li>
                        <span>软件等级：</span>
                        <img src="{{$host.'/template/download/feifan/img/5star.gif'}}" alt="5 stars."/>
                    </li>
                    <li>
                        <span>软件大小：</span><em itemprop="fileSize">{{mt_rand(1,99)}}.{{mt_rand(1,99)}} MB</em>
                    </li>
                    <li>
                        <span>支持语言：</span>
                        <em itemprop="inLanguage">简体中文</em>
                    </li>
                    <li>
                        <span>授权方式：</span>
                        <em itemprop="license">共享版</em>
                    </li>
                    <li>
                        <span>软件分类：</span>
                        <em class="blue" itemprop="license">
                            @php($info=$data->navigation($firstDomain,$pinyin))
                            <a href="{{$info['url']}}" target="_blank">{{$info['title']}}</a>/
                            @php($info=$data->navigation($firstDomain,$pinyin))
                            <a href="{{$info['url']}}" target="_blank">{{$info['title']}}</a>
                        </em>
                    </li>
                    <li>
                        <span>官网链接：
                            <em class="blue" itemprop="license">
                                <a href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}" target="_blank"></a>
                            </em>
                        </span>
                    </li>
                    <meta itemprop="applicationCategory" content="邮件处理"/>
                    <li>
                        <span>更新时间：</span>
                        <em itemprop="dateModified">{{date('Y-m-d H:i:s',time()-config('app.diy.posttime'))}}</em>
                    </li>
                    <li>
                        <span>运行环境：</span>
                        <em itemprop="operatingSystem">WinXp,Win2003,WinVista,Win 7</em>
                    </li>
                    <li>
                        <span>厂商：</span>
                        <em class="blue" itemprop="license"></em>
                    </li>
                </ul>
                <div class="Intab_top clearfix clear">
                    关 键 字：
                    @for($i=0;$i<3;$i++)
                        @php($info=$data->navigation($firstDomain,$pinyin))
                        <a href="{{$info['url']}}" target="_blank">{{$info['title']}}</a>
                    @endfor
                </div>
                <div class="Asoft_foot mt10">
                    <div class="shadu_soft">
                        @for($i=0;$i<6;$i++)
                            @php($info=$data->content($firstDomain,$pinyin))
                            <a href="{{$info['url']}}" target="_blank">
                                <img src="{{$host.'/template/download/feifan/img/'.($i+106).'.png'}}"/>
                            </a>
                        @endfor
                    </div>
                    <span class="i_dwon">
                        <a class="Gx_d" href="#down">
                            <i></i>
                            <p>本地下载</p>
                            <span>大小：({{mt_rand(1,99)}}.{{mt_rand(1,99)}} MB)</span>
                            <em class="wxImg_btn"></em>
                        </a>
                        <a class="ml10 Gs_d" href="#down">
                            <i></i>
                            高速下载
                            <span>需优先下载高速下载器</span>
                        </a>
                    </span>
                </div>
            </div>
            <div class="fr Amain_topleft mr20">
                <div style="">
                    <div style="width:0px;height:0px;">
                        @php($info=$data->navigation($firstDomain,$pinyin))
                        <a href="{{$info['url']}}">
                            <img style="width:300px;" src="{{$host.'/template/download/feifan/img/202007211654245f16ad40c6988.png'}}" alt=""/>
                        </a>
                    </div>
                </div>
            </div>
            <a name="jianjie"></a>
        </div>
        <div class="Awarp pretive clearfix clear mb10 ml10 mr10">
            <div class="WarpLeft clearfix fl">
                <div class="clearfix pretive clear Abder">
                    <div id="infloat" class=" Atab_list" style="position: absolute; top: 0px;">
                        <span class="">软件介绍</span>
                        <span class="">软件截图</span>
                        <span class="">软件专题</span>
                        <span class="">软件问答</span>
                        <span class="">相关文章</span>
                        <span class="">相关软件</span>
                        <span class="dicon cur" onclick="_hmt.push(['_trackEvent', '下载', '点击', '引导2'])"><i></i>下载地址</span>
                    </div>
                    <div class="qhbody pt10 clear">
                        <div class="Intab clearfix mt10">
                            <p>猜您喜欢:</p>
                            <div class="g_text">
                                <ul id="tags">
                                    @for($i=0;$i<5;$i++)
                                        @php($info=$data->content($firstDomain,$pinyin))
                                        <li><a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">{{$info['title']}}</a></li>
                                    @endfor
                                </ul>
                            </div>
                        </div>
                        <div id="conText" class="sjsbd">
                            <div id="rom_des">
                                {!!$content!!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix clear mt10">
                    <div class="Atitle">
                        <h3 class="fl" id="rjjt">软件截图</h3>
                        @php($info=$data->content($firstDomain,$pinyin))
                        <a class="install fr" href="{{$info['url']}}" target="_blank">
                            <i></i>查看安装过程
                        </a>
                    </div>
                    <div class="Abder Aimgbox pt20 pb20 clearfix clear">
                        <a href="{{$info['url']}}" target="_blank">
                            <img src="{{$host.'/template/download/feifan/img/2019032008484720.jpg'}}"/>
                        </a>
                        <a name="zhuanti"></a>
                    </div>
                </div>
                <div class="clearfix clear mt10">
                    <div class="Atitle" id="rjzt">
                        <ul class="fl Atit_li">
                            @for($i=0;$i<3;$i++)
                                @php($info=$data->navigation($firstDomain,$pinyin))
                                <li>
                                    <a class="" href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">{{$info['title']}}</a>
                                </li>
                            @endfor
                        </ul>
                    </div>
                    <div class="Abder dtj_box clearfix clear">
                        <div class="dtj_span">
                            <p class="w158">
                                @php($info=$data->content($firstDomain,$pinyin,$type))
                                <img src="{{$host.'/template/download/feifan/img/2016100708480912.jpg'}}" alt="{{$info['title']}}"/>
                            </p>
                            <p class="dtjs_txt">
                                <em>
                                    <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">{{$info['title']}}</a>
                                </em>
                                <span class="h50">{{$info['article']}}</span>
                            </p>
                        </div>
                        <ul class="dtj_ul clearfix">
                            @for($i=0;$i<4;$i++)
                                <li>
                                    <p class="w105">
                                        @php($info=$data->content($firstDomain,$pinyin,$type))
                                        <img src="{{$host.'/template/download/feifan/img/'.($i+112).'.png'}}" width="94" height="72" alt="{{$info['title']}}"/>
                                    </p>
                                    <p class="w200">
                                        <em>
                                            <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">
                                                {{$info['title']}}
                                            </a>
                                            <span>v{{mt_rand(1,99)}}.{{mt_rand(1,99)}}</span>
                                        </em>
                                        {{$info['article']}}
                                        <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">
                                            详情&gt;&gt;
                                        </a>
                                    </p>
                                </li>
                            @endfor
                        </ul>
                    </div>
                </div>
                <div class="clearfix clear mt10">
                    <div class=" fl wper49">
                        <div class="Atitle">
                            <h3 class="fl" id="rjzx">软件资讯</h3>
                            @php($info=$data->navigation($firstDomain,$pinyin))
                            <a class="more" target="_blank" href="{{$info['url']}}">更多&gt;</a>
                        </div>
                        <div class="top_down clear Abder">
                            <ul id="left-hot4" class="bgest">
                                @for($i=0;$i<6;$i++)
                                    <li class="extrude hover{{$i+1}}">
                                        <div class="icon hiden">
                                            <span class="dot">·</span>
                                            @php($info=$data->content($firstDomain,$pinyin,$type))
                                            <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">{{$info['title']}}</a>
                                        </div>
                                        <div class="name">
                                            <a class="w112" href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">
                                                <img src="{{$host.'/template/download/feifan/img/'.($i+116).'.png'}}" alt="{{$info['title']}}"/>
                                            </a>
                                        </div>
                                        <div class="ico_b_right">
                                            <div class="gdl">
                                                <h3>
                                                    <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">{{$info['title']}}</a>
                                                </h3>
                                                <p>{{$info['article']}}</p>
                                            </div>
                                        </div>
                                    </li>
                                @endfor
                            </ul>
                        </div>
                    </div>
                    <div class=" fr wper49">
                        <div class="Atitle">
                            <h3 class="fl">最新更新</h3>
                            @php($info=$data->navigation($firstDomain,$pinyin))
                            <a class="more" target="_blank" href="{{$info['url']}}">更多&gt;</a>
                        </div>
                        <div class="top_down clear Abder">
                            <ul id="left-hot4" class="update">
                                @for($i=0;$i<6;$i++)
                                    <li class="extrude hover{{$i+1}}">
                                        <div class="icon hiden">
                                            <span class="dot">·</span>
                                            @php($info=$data->content($firstDomain,$pinyin))
                                            <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">{{$info['title']}}</a>
                                        </div>
                                        <div class="name">
                                            <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">
                                                <img src="{{$host.'/template/download/feifan/img/122.png'}}" alt="{{$info['title']}}"/>
                                            </a>
                                        </div>
                                        <div class="ico_b_right">
                                            <div class="gdl">
                                                <h3>
                                                    <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">{{$info['title']}}</a>
                                                </h3>
                                                @php($info=$data->navigation($firstDomain,$pinyin))
                                                <span>软件分类：<a href="{{$info['url']}}" class="cat" target="_blank">[{{$info['title']}}]</a></span>
                                                <span>星级：<img src="{{$host.'/template/download/feifan/img/5star.gif'}}" alt="5 stars."></span>
                                                <span style="display:block">大小：{{mt_rand(1,99)}}.{{mt_rand(1,99)}}MB</span>
                                            </div>
                                        </div>
                                    </li>
                                @endfor
                            </ul>
                            <a name="ruanjian"></a>
                        </div>
                    </div>
                </div>
                <div class="clearfix clear mt10">
                    <div class="Atitle">
                        <h3 class="fl" id="xgrj">相关软件</h3>
                    </div>
                    <div class="sjApplist Abder clear clearfix pb12">
                        <ul>
                            @for($i=0;$i<6;$i++)
                                <li>
                                    @php($info=$data->content($firstDomain,$pinyin))
                                    <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">
                                        <img src="{{$host.'/template/download/feifan/img/'.mt_rand(1,122).'.png'}}"/>
                                    </a>
                                    <a class="rela" href="{{$info['url']}}" title="{{$info['title']}}" target="_blank">{{$info['title']}}</a>
                                </li>
                            @endfor
                        </ul>
                    </div>
                </div>
                <div class="clearfix clear mt10">
                    <div class="Atitle">
                        <a name="down"></a>
                        <h3 class="fl" id="xzdz">下载地址</h3>
                        <span class="Wrong fr">
                            @php($info=$data->navigation($firstDomain,$pinyin))
                            <a href="{{$info['url']}}" target="_blank">版权声明</a>|
                            @php($info=$data->navigation($firstDomain,$pinyin))
                            <a href="{{$info['url']}}">下载说明</a>
                        </span>
                    </div>
                    <div class="Abder clear clearfix pb12">
                        <div class="wper49 Adown_dbox fl clearfix">
                            <h4 class="Adown_v_title">高速下载</h4>
                            <ul class="clearfix Adown_v_gs">
                                @for($i=0;$i<4;$i++)
                                    <li>
                                        @php($info=$data->content($firstDomain,$pinyin))
                                        <a href="javascript:void(0);" onclick="openPackage(1162,{{$info['title']}},{{$info['url']}})">
                                            <i></i>电信高速下载
                                        </a>
                                    </li>
                                @endfor
                            </ul>
                            <div class="Adown_v_ttab">
                                <ul class="Adown_v_title">
                                    <li class="fl active">普通下载</li>
                                </ul>
                                <div>
                                    <ul class="clearfix Adown_v_pt active">
                                        @for($i=0;$i<6;$i++)
                                            <li>
                                                @php($info=$data->content($firstDomain,$pinyin))
                                                <a href="javascript:void(0);" onclick="openPackage(1162,{{$info['title']}},{{$info['url']}})">
                                                    <i></i>电信高速下载
                                                </a>
                                            </li>
                                        @endfor
                                    </ul>
                                </div>
                            </div>
                            <div class="clearfix mt10 DTip">
                                <i></i>下载安装、资源包有误、报错等问题向我们
                                @php($info=$data->navigation($firstDomain,$pinyin))
                                <a href="{{$info['url']}}">反馈</a>!
                            </div>
                        </div>
                        <div class="fr clearfix adowGright">
                            @for($i=0;$i<5;$i++)
                                <div class="fl">
                                    @php($info=$data->content($firstDomain,$pinyin))
                                    <a href="{{$info['url']}}" target="_blank">
                                        <img src="{{$host.'/template/download/feifan/img/'.mt_rand(1,122).'.png'}}" style="display: block; width: 100%;height: 100%;" alt=""/>
                                    </a>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
                <div class="clearfix clear mt10">
                    <div class="Atitle">
                        <h3 class="fl">厂商其他下载</h3>
                        <ul class="csmtabnav fl">
                            <li class="active">电脑版</li>
                            <li>安卓版</li>
                            <li>IOS版</li>
                            <li>MAC版</li>
                        </ul>
                    </div>
                </div>
                <div class="clear clearfix">
                    <div id="warn" class="warntip clear clearfix mb20">
                        <h3>注意事项</h3>
                        <p>
                            本站所有资源（含游戏）均是软件作者、开发商投稿，任何涉及商业盈利目的均不得使用，否则产生的一切后果将由您自己承担！本站将不对任何资源负法律责任，所有资源请在下载后24小时内删除。<br>
                            如侵犯了您的版权、商标等，请立刻联系我们并具体说明情况后，本站将尽快处理删除，联系
                            <img src='{{$host.'/template/download/feifan/img/qq.jpg'}}'/>
                            @php($info=$data->navigation($firstDomain,$pinyin))
                            （<a href="{{$info['url']}}" target="_blank"><font color="red">版权说明注意事项</font></a>）。若有关在线投稿、无法下载等问题，请与本站客服人员联系
                            <img src='{{$host.'/template/download/feifan/img/qq.jpg'}}'/>
                            ！<br>
                            用户可自行按线路选择相应的下载点，可以直接点击下载/另存为，若直接点击下载速度太慢，请尝试使用高速下载器。为确保下载的文件能正常使用，请使用
                            @php($info=$data->navigation($firstDomain,$pinyin))
                            <a href="{{$info['url']}}" target="_blank"><font color="red">WinRAR</font></a>最新版本解压本站软件。<br>
                            建议大家谨慎对待所下载的文件，大家在安装的时候务必留意每一步！关于
                            @php($info=$data->navigation($firstDomain,$pinyin))
                            <a href="{{$info['url']}}" target="_blank"><font color="red">360安全卫士</font></a>或
                            @php($info=$data->navigation($firstDomain,$pinyin))
                            <a href="{{$info['url']}}" target="_blank"><font color="red">QQ电脑管家</font></a>的有关提示，请自行注意选择操作。
                        </p>
                    </div>
                </div>
            </div>
            <div class="fr WarpRight clearfix">
                <div class="rmgjc">
                    <div class="rjc_title">
                        <h3>原创软件推荐</h3>
                    </div>
                    <div class="clearfix">
                        <ul class="l_yc">
                            @for($i=0;$i<6;$i++)
                                <li class="pic_j">
                                    @php($info=$data->content($firstDomain,$pinyin))
                                    <a target="_blank" href="{{$info['url']}}">
                                        <img width="140" height="90" border="0" src="{{$host.'/template/download/feifan/img/'.($i+70).'.png'}}">
                                    </a>
                                    <p>
                                        <a target="_blank" href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                                    </p>
                                </li>
                            @endfor
                        </ul>
                        <div class="yc_list">
                            <ul class="">
                                @for($i=0;$i<7;$i++)
                                    <li>
                                        @php($info=$data->content($firstDomain,$pinyin))
                                        <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">
                                            {{$info['title']}}
                                        </a>
                                    </li>
                                @endfor
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="top_down Arank_d clearfix Abder mt10">
                    <h2>
                        <span>本月下载排行榜</span>
                        @php($info=$data->navigation($firstDomain,$pinyin))
                        <a class="more" href="{{$info['url']}}">更多&gt;</a>
                    </h2>
                    <ul id="left-hot4" class="clear">
                        @for($i=0;$i<10;$i++)
                            <li class="extrude hover{{$i+1}}">
                                <div class="icon">
                                    <span class="rank">{{$i+1}}</span>
                                    @php($info=$data->content($firstDomain,$pinyin))
                                    <a href="{{$info['url']}}" title="{{$info['title']}}" target="_blank">{{$info['title']}}</a>
                                </div>
                                <div class="name">
                                    <a class="wh90" href="{{$info['url']}}" title="{{$info['title']}}" target="_blank">
                                        <img src="{{$host.'/template/download/feifan/img/'.mt_rand(1,122).'.png'}}" alt="{{$info['title']}}"/>
                                    </a>
                                </div>
                                <div class="ico_b_right">
                                    <div class="sales">
                                        <a class="xz_btn" href="{{$info['url']}}" title="{{$info['title']}}" target="_blank">立即下载</a></div>
                                    <div class="sales">大小：<span>{{mt_rand(1,99)}}.{{mt_rand(1,99)}}MB</span></div>
                                </div>
                            </li>
                        @endfor
                    </ul>
                </div>
                <div class="pretive clearfix">
                    <div class="clearfix" id="flgs" style="position: absolute; top: 0px;">
                        <div class="top_down w330 Arank_d clearfix Abder mt10 ">
                            <h2>
                                <span>更多分类</span>
                                @php($info=$data->navigation($firstDomain,$pinyin))
                                <a class="more" href="{{$info['url']}}">更多&gt;</a>
                            </h2>
                            <div class="classybox clearfix">
                                @for($i=0;$i<38;$i++)
                                    @php($info=$data->navigation($firstDomain,$pinyin))
                                    <a href="{{$info['url']}}">{{$info['title']}}</a>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
