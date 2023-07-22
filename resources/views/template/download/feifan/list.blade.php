@php($data=app('App\Http\Controllers\CoreController'))
@extends('template.download.feifan.layout')
@section('content')
    <div class="warp clearfix">
        <div class="usually mt10 mb10 ml10 mr10">
            <div class="l_rzt_title pr12">
                <h3>
                    <em>热门</em>专题
                </h3>
                @php($info=$data->navigation($firstDomain,$pinyin))
                <a class="more" target="_blank" href="{{$info['url']}}">更多&gt;</a>
            </div>
            <ul class="l_rzt_list clearfix">
                @for($i=0;$i<18;$i++)
                    <li>
                        @php($info=$data->content($firstDomain,$pinyin))
                        <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">{{$info['title']}}</a>
                    </li>
                @endfor
            </ul>
        </div>
    </div>
    <div class="warp clearfix">
        <div class="Awarp pretive clearfix clear mb10 ml10 mr10">
            <div class="WarpLeft clearfix fl">
                <div class="l_tile clearfix">
                    <h3>
                        <em>网络软件</em>
                    </h3>
                    <div class="l_rtile">
                        <ul>
                            @for($i=0;$i<4;$i++)
                                <li>
                                    @php($info=$data->navigation($firstDomain,$pinyin))
                                    <a href="{{$info['url']}}" {{!$i?'class=active':''}}>
                                        <span>{{$info['title']}}</span>
                                    </a>
                                </li>
                            @endfor
                        </ul>
                    </div>
                </div>
                <div class="pretive clearfix">
                    <div style="height:82px"></div>
                    <div id="flofund" class="key_tip clearfix" style="position: absolute; top: 0px;">
                        <div style="background:#FFF; overflow:auto">
                            <div class="kt_w700">
                                <div id="text" class="hid_key">
                                    <ul class="kttip_list">
                                        <button onclick="Scroll('text', 116, 1.2)">展开</button>
                                        @for($i=0;$i<32;$i++)
                                            <li>
                                                @php($info=$data->content($firstDomain,$pinyin))
                                                <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">{{$info['title']}}</a>
                                            </li>
                                        @endfor
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix clear applist pt12">
                    @for($i=0;$i<10;$i++)
                        <div class="entry">
                            <h3 class="entry-title">
                                @php($info=$data->content($firstDomain,$pinyin,$type))
                                <a href="{{$info['url']}}" target="_blank">{{$info['title']}}</a>
                                <img src="{{$host.'/template/download/feifan/img/5star.gif'}}" alt="5 stars."/>
                                <span class="huis" style="text-align:right"><b class="time">更新时间：</b>
                                <span class="color">{{date('Y-m-d',strtotime("-$i day"))}}</span>
                            </span>
                            </h3>
                            <div class="left">
                                <p class="stand">
                                    <a href="{{$info['url']}}" preview="{{$host.'/template/download/feifan/img/'.($i+96).'.png'}}" target="_blank">
                                        <img src="{{$host.'/template/download/feifan/img/'.($i+96).'.png'}}"/>
                                    </a>
                                </p>
                                <p>
                                    <a href="{{$info['url']}}" target="_blank" class="fangdaj">缩略图</a>
                                    <a href="{{$info['url']}}" target="_blank" class="az">安装过程</a>
                                </p>
                            </div>
                            <div class="right">
                                <div class="entry-one">
                                    <span>
                                        <b>语言：</b>简体中文
                                    </span>
                                    <span>
                                        <b>性质：</b>国产软件
                                    </span>
                                    <span>
                                        <b>软件大小：</b>{{mt_rand(1,99)}}.{{mt_rand(1,99)}}MB
                                    </span>
                                </div>
                                <div class="entry-summary">
                                    {{$info['article']}}
                                </div>
                                <div class="entry-meta">
                                    <span class="huis">免费版</span> | <span class="green">不详</span>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
                <div class="pagination clearfix clear">
                    <a  class="backpage grey">上一页</a>
                    @for($i=0;$i<4;$i++)
                        @php($info=$data->content($firstDomain,$pinyin))
                        <a href="{{$info['url']}}" {{!$i?'class=active':''}}>
                            <b>{{$i+1}}</b>
                        </a>
                    @endfor
                    @php($info=$data->content($firstDomain,$pinyin))
                    <a href="{{$info['url']}}"class="shenlue">...</a>
                    @php($info=$data->content($firstDomain,$pinyin))
                    <a href="{{$info['url']}}">
                        <b>{{mt_rand(88,888)}}</b>
                    </a>
                    @php($info=$data->content($firstDomain,$pinyin))
                    <a href="{{$info['url']}}"  class="nextpage">下一页</a>
                    第 <input name="tbpage" id="tbpage" type="text" onkeydown="if(event.keyCode==13){event.keyCode=9; document.getElementById('btngo').click();}" size="1"> 页
                    @php($info=$data->content($firstDomain,$pinyin))
                    <input type="submit" id="btngo" onclick="return btngoUrl('tbpage','{{$info['url']}}','888')" value="跳转">
                </div>
            </div>
            <div class="fr WarpRight clearfix">
                <div class="sgle_class l_class">
                    <h3>软件分类</h3>
                    <div class="clearfix">
                        <ul>
                            @for($i=0;$i<38;$i++)
                                @php($info=$data->navigation($firstDomain,$pinyin))
                                <li>
                                    <a href="{{$info['url']}}">{{$info['title']}}</a><em>({{mt_rand(1,9999)}})</em>
                                </li>
                            @endfor
                        </ul>
                    </div>
                </div>
                <div class="rmgjc mt10">
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
                <div class="rmgjc l_ph mt10">
                    <div class="gzq_title pl12 pr12">
                        <h3>本月下载排行</h3>
                    </div>
                    <div class="l_ph_list clearfix pt12">
                        <ul class="">
                            @for($i=0;$i<10;$i++)
                                <li>
                                    <em {{$i<2?'class=active':''}}>{{$i+1}}</em>
                                    @php($info=$data->content($firstDomain,$pinyin))
                                    <a href="{{$info['url']}}" title="{{$info['title']}}" target="_blank">{{$info['title']}}</a>
                                </li>
                            @endfor
                        </ul>
                    </div>
                </div>
                <div class="top_down Arank_d clearfix Abder mt10">
                    <h2>
                        <span>热门标签</span>
                        @php($info=$data->navigation($firstDomain,$pinyin))
                        <a class="more" href="{{$info['url']}}">更多&gt;</a>
                    </h2>
                    <div class="Tablist clearfix">
                        @for($i=0;$i<15;$i++)
                            @php($info=$data->content($firstDomain,$pinyin))
                            <a href="{{$info['url']}}" target="_blank">{{$info['title']}}</a>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
