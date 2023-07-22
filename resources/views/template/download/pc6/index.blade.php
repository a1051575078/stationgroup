@php($data=app('App\Http\Controllers\CoreController'))
@extends('template.download.pc6.layout')
@section('content')
    <dl id="page">
        <dt id="inRec">
            <ul id="ppShow">
                @for($i=0;$i<10;$i++)
                    @php($info=$data->content($firstDomain,$pinyin))
                    <li>
                        <a href="{{$info['url']}}" title="{{$info['title']}}">
                            <img src="{{$host.'/template/download/pc6/img'.'/'.($i+1).'.png'}}" alt="{{$info['title']}}" title="{{$info['title']}}"/>{{$info['title']}}
                        </a>
                    </li>
                @endfor
            </ul>
            @php($cycle=[12,13,12,12])
            @for($i=0;$i<4;$i++)
                <p>
                    <b>
                        @php($info=$data->navigation($firstDomain,$pinyin))
                        <a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                    </b>
                    <span>
                        @for($j=0;$j<$cycle[$i];$j++)
                            @php($info=$data->content($firstDomain,$pinyin))
                            <a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                        @endfor
                    </span>
                </p>
            @endfor
        </dt>
        <dd id="mainBody">
            <dl id="focus" class="main-box">
                <dt id="commend">
                    <div id="fpic" class="imgshow">
                        <ul>
                            @php($img=['16f5f153cf965eb5.jpeg','16f5ed9fad61e0c7.jpeg','7ef606e7cfc8addb.jpeg','16f605d43a538eab.jpeg','16f6010d08517f25.jpeg'])
                            @for($i=0;$i<5;$i++)
                                @php($info=$data->navigation($firstDomain,$pinyin))
                                <li>
                                    <a href="{{$info['url']}}" title="{{$info['title']}}">
                                        <img src="{{$host.'/template/download/pc6/img/'.$img[$i]}}" title="{{$info['title']}}" alt="{{$info['title']}}"/><s></s>
                                        <strong class="sp">{{$info['title']}}</strong>
                                        <i class="times">00:{{mt_rand(10,59)}}</i>
                                    </a>
                                </li>
                            @endfor
                        </ul>
                    </div>
                    <dl class="rebox">
                        <dt>新品首发</dt>
                        <dd class="clearfix">
                            @for($i=0;$i<8;$i++)
                                @php($info=$data->content($firstDomain,$pinyin))
                                <p>
                                    <a href="{{$info['url']}}" title="{{$info['title']}}">
                                        <img src="{{$host.'/template/download/pc6/img'.'/'.($i+11).'.png'}}" alt="{{$info['title']}}" title="{{$info['title']}}"/>
                                    </a>
                                    <span>
                                        <a href="{{$info['url']}}">{{$info['title']}}</a>
                                        <i>大小：{{mt_rand(0,99)}}M</i>
                                        @php($info=$data->navigation($firstDomain,$pinyin))
                                        <i>类别：<a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a></i>
                                    </span>
                                </p>
                            @endfor
                        </dd>
                    </dl>
                </dt>
                <dd id="soft-news">
                    <dl id="read-hot">
                        <dt>
                            @for($i=0;$i<6;$i++)
                                @php($info=$data->navigation($firstDomain,$pinyin))
                                <span {{$i===0?'class=cur':''}}>
                                    <a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                                </span>
                            @endfor
                        </dt>
                        <dd class="on">
                            @php($cycle=[6,6,7])
                            @php($num=1)
                            @for($i=0;$i<3;$i++)
                                <ul>
                                    @for($j=0;$j<$cycle[$i];$j++)
                                        @php($san=sprintf("%03d",$num++))
                                        <li>
                                            <i><font color=red>{{date('Y-m-d',strtotime('-'.$j.' day'))}}</font></i>
                                            @php($info=$data->navigation($firstDomain,$pinyin))
                                            <a href="{{$info['url']}}" class="cname" title="{{$info['title']}}">【{{$info['title']}}】</a>
                                            @php($info=$data->content($firstDomain,$pinyin))
                                            <a href="{{$info['url']}}" title="{{$info['title']}}">
                                                <img src="{{$host.'/template/download/pc6/img'.'/'.$san.'.png'}}" title="{{$info['title']}}" alt="{{$info['title']}}"/>{{$info['title']}}
                                            </a>
                                        </li>
                                    @endfor
                                </ul>
                            @endfor
                        </dd>
                    </dl>
                    <dl id="focus-side">
                        <dt>
                            @php($info=$data->navigation($firstDomain,$pinyin))
                            <a href="{{$info['url']}}" class="azsc" title="{{$info['title']}}">
                                <img src="{{$host.'/template/download/pc6/img/fbrj.png'}}" alt="{{$info['title']}}" title="{{$info['title']}}"/>
                            </a>
                        </dt>
                        <dd id="zxzx">
                            <h3>
                                @php($info=$data->navigation($firstDomain,$pinyin))
                                <a href="{{$info['url']}}" title="{{$info['title']}}">更多></a>{{$info['title']}}
                            </h3>
                            <p>
                                @for($i=0;$i<3;$i++)
                                    @php($info=$data->content($firstDomain,$pinyin))
                                    <a href="{{$info['url']}}" title="{{$info['title']}}">
                                        <img src="{{$host.'/template/download/pc6/img'.'/'.($i+19).'.png'}}" alt="{{$info['title']}}" title="{{$info['title']}}"/>{{$info['title']}}
                                    </a>
                                @endfor
                            </p>
                        </dd>
                        <dd id="kclb" class="clearfix">
                            <p class="tNav">
                                <span class="cur">
                                    @php($info=$data->navigation($firstDomain,$pinyin))
                                    <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">{{$info['title']}}</a>
                                </span>
                                <span>
                                    @php($info=$data->navigation($firstDomain,$pinyin))
                                    <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">{{$info['title']}}</a>
                                </span>
                            </p>
                            <div class="kaice on">
                                <span class="tit"><i class="name">游戏名称</i><i>游戏类别</i><i>开测时间</i></span>
                                @for($i=0;$i<10;$i++)
                                    @php($san=sprintf("%03d",($i+20)))
                                    <p>
                                        <em>{{date('m-d',strtotime('-'.$i.' day'))}}</em>
                                        @php($info=$data->navigation($firstDomain,$pinyin))
                                        <i class="cname">{{$info['title']}}</i>
                                        @php($info=$data->content($firstDomain,$pinyin))
                                        <a href="{{$info['url']}}" class="img" title="{{$info['title']}}">
                                            <img src="{{$host.'/template/download/pc6/img'.'/'.$san.'.png'}}" title="{{$info['title']}}" alt="{{$info['title']}}"/>
                                            <b>{{$info['title']}}</b>
                                        </a>
                                        <i class="btn">
                                            <a class="btn" href="{{$info['url']}}" target="_blank">下载</a>
                                            <span class="kctx-btn">开测提醒</span>
                                        </i>
                                    </p>
                                @endfor
                                <div class="kctx">
                                    <p><span>X</span>
                                        <b>开测提醒</b>
                                    </p>
                                    <p class="ewm">
                                        <img src="{{$host.'/template/download/pc6/img/syewm.jpg'}}" title="二维码" alt="二维码"/>请用手机扫描二维码关注{{$title}}手游网公众号<br>以便及时接收<em>活动</em>、<em>礼包</em>、<em>开测</em>和<em>开放下载</em>的提醒！</p>
                                </div>
                            </div>
                            <div class="lbao">
                            <span class="tit">
                                <i class="name">礼包名称</i><i>领取地址</i>
                            </span>
                                @for($i=0;$i<11;$i++)
                                    @php($info=$data->content($firstDomain,$pinyin))
                                    @php($san=sprintf("%03d",($i+27)))
                                    <p>
                                        <a href="{{$info['url']}}" class="lblq" title="{{$info['title']}}">领取</a>
                                        <a href="{{$info['url']}}" title="{{$info['title']}}">
                                            <img src="{{$host.'/template/download/pc6/img'.'/'.$san.'.png'}}" title="{{$info['title']}}" alt="{{$info['title']}}"/>
                                            <b>{{$info['title']}}</b>
                                        </a>
                                    </p>
                                @endfor
                            </div>
                        </dd>
                    </dl>
                </dd>
            </dl>
            <dl id="fav-box">
                <dt class="hd"><p class="z1"></p><p class="z2"></p><p class="z3"></p><p class="z4"></p><p class="z5"></p>
                    <ul>
                        <li class="pc cur" id="a1">
                            <p><span>电脑必备</span><em></em></p>
                            <i>
                                @for($i=0;$i<3;$i++)
                                    @php($info=$data->navigation($firstDomain,$pinyin))
                                    <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">{{$info['title']}}</a>
                                @endfor
                            </i>
                            <s></s>
                        </li>
                        <li class="az" id="a2">
                            <p><span>手机必备</span><em></em></p>
                            <i>
                                @for($i=0;$i<3;$i++)
                                    @php($info=$data->navigation($firstDomain,$pinyin))
                                    <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">{{$info['title']}}</a>
                                @endfor
                            </i>
                            <s></s>
                        </li>
                        <li class="ios" id="a3">
                            <p><span>Mac必备</span><em></em></p>
                            <i>
                                @for($i=0;$i<3;$i++)
                                    @php($info=$data->navigation($firstDomain,$pinyin))
                                    <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">{{$info['title']}}</a>
                                @endfor
                            </i>
                            <s></s>
                        </li>
                        <li class="tv" id="a4">
                            <p><span>手游必备</span><em></em></p>
                            <i>
                                @for($i=0;$i<3;$i++)
                                    @php($info=$data->navigation($firstDomain,$pinyin))
                                    <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">{{$info['title']}}</a>
                                @endfor
                            </i>
                            <s></s>
                        </li>
                    </ul>
                </dt>
                <dd id="fav-soft" class="main-box on">
                    <div id="soft-rank" class="sidebar rank">
                        <ul class="tabTitle">
                            <li onclick="onSelect(this,'tabRank')" class="tab_2">下载周排行</li>
                            <li onclick="onSelect(this,'tabRank')" class="tab_1">下载总排行</li>
                        </ul>
                        <ul class="tabContent" id="tabRank_0">
                            @for($i=0;$i<12;$i++)
                                @php($info=$data->content($firstDomain,$pinyin))
                                @php($san=sprintf("%03d",($i+38)))
                                <li>
                                    <a href="{{$info['url']}}"  title="{{$info['title']}}" class="txt">{{$info['title']}}</a>
                                    <p>
                                        <a href="{{$info['url']}}" class="img" title="{{$info['title']}}">
                                            <img class="lazy" data-original="{{$host.'/template/download/pc6/img'.'/'.$san.'.png'}}" title="{{$info['title']}}" alt="{{$info['title']}}"/>
                                        </a>
                                        <span><i>{{mt_rand(0,9)}}.{{mt_rand(0,9)}}M /<s class="star{{mt_rand(0,5)}}"></s></i>
                                    <a href="{{$info['url']}}" title="{{$info['title']}}">下载</a>
                                </span>
                                    </p>
                                </li>
                            @endfor
                        </ul>
                        <ul class="tabContent" id="tabRank_1" style="display:none;">
                            @for($i=0;$i<12;$i++)
                                @php($info=$data->content($firstDomain,$pinyin))
                                @php($san=sprintf("%03d",($i+48)))
                                <li>
                                    <a href="{{$info['url']}}" title="{{$info['title']}}" class="txt">{{$info['title']}}</a>
                                    <p>
                                        <a href="{{$info['url']}}" class="img" title="{{$info['title']}}">
                                            <img class="lazy" data-original="{{$host.'/template/download/pc6/img'.'/'.$san.'.png'}}" title="{{$info['title']}}" alt="{{$info['title']}}"/>
                                        </a>
                                        <span><i>{{mt_rand(0,9)}}.{{mt_rand(0,9)}}M /<s class="star{{mt_rand(0,5)}}"></s></i>
                                    <a href="{{$info['url']}}" title="{{$info['title']}}">下载</a>
                                </span>
                                    </p>
                                </li>
                            @endfor
                        </ul>
                    </div>
                    <div class="favorites">
                        @for($i=0;$i<15;$i++)
                            <dl>
                                @php($info=$data->navigation($firstDomain,$pinyin))
                                <dt><a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a></dt>
                                @for($j=0;$j<4;$j++)
                                    @php($info=$data->content($firstDomain,$pinyin))
                                    <dd><a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a></dd>
                                @endfor
                            </dl>
                        @endfor
                    </div>
                </dd>
                <dd id="fav-az" class="main-box">
                    <div id="soft-rank2" class="sidebar rank">
                        <ul class="tabTitle">
                            <li onclick="onSelect(this,'tabRank2')" class="tab_2">下载周排行</li>
                            <li onclick="onSelect(this,'tabRank2')" class="tab_1">下载总排行</li>
                        </ul>
                        <ul class="tabContent" id="tabRank2_0">
                            @for($i=0;$i<12;$i++)
                                @php($info=$data->content($firstDomain,$pinyin))
                                @php($san=sprintf("%03d",($i+60)))
                                <li>
                                    <a href="{{$info['url']}}" title="{{$info['title']}}" class="txt">{{$info['title']}}</a>
                                    <p>
                                        <a href="{{$info['url']}}" class="img" title="{{$info['title']}}">
                                            <img class="lazy" data-original="{{$host.'/template/download/pc6/img'.'/'.$san.'.png'}}" title="{{$info['title']}}" alt="{{$info['title']}}"/>
                                        </a>
                                        <span><i>{{mt_rand(0,9)}}.{{mt_rand(0,9)}}M /<s class="star{{mt_rand(0,5)}}"></s></i>
                                        <a href="{{$info['url']}}" title="{{$info['title']}}">下载</a>
                                    </span>
                                    </p>
                                </li>
                            @endfor
                        </ul>
                        <ul class="tabContent" id="tabRank2_1" style="display:none;">
                            @for($i=0;$i<12;$i++)
                                @php($info=$data->content($firstDomain,$pinyin))
                                @php($san=sprintf("%03d",($i+71)))
                                <li>
                                    <a href="{{$info['url']}}" title="{{$info['title']}}" class="txt">{{$info['title']}}</a>
                                    <p>
                                        <a href="{{$info['url']}}" class="img" title="{{$info['title']}}">
                                            <img class="lazy" data-original="{{$host.'/template/download/pc6/img'.'/'.$san.'.png'}}" title="{{$info['title']}}" alt="{{$info['title']}}"/>
                                        </a>
                                        <span><i>{{mt_rand(0,9)}}.{{mt_rand(0,9)}}M /<s class="star{{mt_rand(0,5)}}"></s></i>
                                        <a href="{{$info['url']}}" title="{{$info['title']}}">下载</a>
                                    </span>
                                    </p>
                                </li>
                            @endfor
                        </ul>
                    </div>
                    <div class="favorites">
                        @for($i=0;$i<15;$i++)
                            <dl>
                                @php($info=$data->navigation($firstDomain,$pinyin))
                                <dt><a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a></dt>
                                @for($j=0;$j<4;$j++)
                                    @php($info=$data->content($firstDomain,$pinyin))
                                    <dd><a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a></dd>
                                @endfor
                            </dl>
                        @endfor
                    </div>
                </dd>
                <dd id="fav-ios" class="main-box">
                    <div id="soft-rank3" class="sidebar rank">
                        <ul class="tabTitle">
                            <li onclick="onSelect(this,'tabRank3')" class="tab_2">下载周排行</li>
                            <li onclick="onSelect(this,'tabRank3')" class="tab_1">下载总排行</li>
                        </ul>
                        <ul class="tabContent" id="tabRank3_0">
                            @for($i=0;$i<12;$i++)
                                @php($info=$data->content($firstDomain,$pinyin))
                                @php($san=sprintf("%03d",($i+83)))
                                <li>
                                    <a href="{{$info['url']}}" title="{{$info['title']}}" class="txt">{{$info['title']}}</a>
                                    <p>
                                        <a href="{{$info['url']}}" class="img" title="{{$info['title']}}">
                                            <img class="lazy" data-original="{{$host.'/template/download/pc6/img'.'/'.$san.'.png'}}" title="{{$info['title']}}" alt="{{$info['title']}}"/>
                                        </a>
                                        <span><i>{{mt_rand(0,9)}}.{{mt_rand(0,9)}}M /<s class="star{{mt_rand(0,5)}}"></s></i>
                                        <a href="{{$info['url']}}" title="{{$info['title']}}">下载</a>
                                    </span>
                                    </p>
                                </li>
                            @endfor
                        </ul>
                        <ul class="tabContent" id="tabRank3_1" style="display:none;">
                            @for($i=0;$i<12;$i++)
                                @php($info=$data->content($firstDomain,$pinyin))
                                @php($san=sprintf("%03d",($i+92)))
                                <li>
                                    <a href="{{$info['url']}}" title="{{$info['title']}}" class="txt">{{$info['title']}}</a>
                                    <p>
                                        <a href="{{$info['url']}}" class="img" title="{{$info['title']}}">
                                            <img class="lazy" data-original="{{$host.'/template/download/pc6/img'.'/'.$san.'.png'}}" title="{{$info['title']}}" alt="{{$info['title']}}"/>
                                        </a>
                                        <span><i>{{mt_rand(0,9)}}.{{mt_rand(0,9)}}M /<s class="star{{mt_rand(0,5)}}"></s></i>
                                        <a href="{{$info['url']}}" title="{{$info['title']}}">下载</a>
                                    </span>
                                    </p>
                                </li>
                            @endfor
                        </ul>
                    </div>
                    <div class="favorites">
                        @for($i=0;$i<15;$i++)
                            <dl>
                                @php($info=$data->navigation($firstDomain,$pinyin))
                                <dt><a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a></dt>
                                @for($j=0;$j<4;$j++)
                                    @php($info=$data->content($firstDomain,$pinyin))
                                    <dd><a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a></dd>
                                @endfor
                            </dl>
                        @endfor
                    </div>
                </dd>
                <dd id="fav-tv" class="main-box">
                    <div id="soft-rank4" class="sidebar rank">
                        <ul class="tabTitle">
                            <li onclick="onSelect(this,'tabRank4')" class="tab_2">下载周排行</li>
                            <li onclick="onSelect(this,'tabRank4')" class="tab_1">下载总排行</li>
                        </ul>
                        <ul class="tabContent" id="tabRank4_0">
                            @for($i=0;$i<12;$i++)
                                @php($info=$data->content($firstDomain,$pinyin))
                                @php($san=sprintf("%03d",($i+104)))
                                <li>
                                    <a href="{{$info['url']}}" title="{{$info['title']}}" class="txt">{{$info['title']}}</a>
                                    <p>
                                        <a href="{{$info['url']}}" class="img" title="{{$info['title']}}">
                                            <img class="lazy" data-original="{{$host.'/template/download/pc6/img'.'/'.$san.'.png'}}" title="{{$info['title']}}" alt="{{$info['title']}}"/>
                                        </a>
                                        <span><i>{{mt_rand(0,9)}}.{{mt_rand(0,9)}}M /<s class="star{{mt_rand(0,5)}}"></s></i>
                                        <a href="{{$info['url']}}" title="{{$info['title']}}">下载</a>
                                    </span>
                                    </p>
                                </li>
                            @endfor
                        </ul>
                        <ul class="tabContent" id="tabRank4_1" style="display:none;">
                            @for($i=0;$i<12;$i++)
                                @php($info=$data->content($firstDomain,$pinyin))
                                @php($san=sprintf("%03d",($i+115)))
                                <li>
                                    <a href="{{$info['url']}}" title="{{$info['title']}}" class="txt">{{$info['title']}}</a>
                                    <p>
                                        <a href="{{$info['url']}}" class="img" title="{{$info['title']}}">
                                            <img class="lazy" data-original="{{$host.'/template/download/pc6/img'.'/'.$san.'.png'}}" title="{{$info['title']}}" alt="{{$info['title']}}"/>
                                        </a>
                                        <span><i>{{mt_rand(0,9)}}.{{mt_rand(0,9)}}M /<s class="star{{mt_rand(0,5)}}"></s></i>
                                        <a href="{{$info['url']}}" title="{{$info['title']}}">下载</a>
                                    </span>
                                    </p>
                                </li>
                            @endfor
                        </ul>
                    </div>
                    <div class="favorites">
                        @for($i=0;$i<15;$i++)
                            <dl>
                                @php($info=$data->navigation($firstDomain,$pinyin))
                                <dt><a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a></dt>
                                @for($j=0;$j<4;$j++)
                                    @php($info=$data->content($firstDomain,$pinyin))
                                    <dd><a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a></dd>
                                @endfor
                            </dl>
                        @endfor
                    </div>
                </dd>
            </dl>
        </dd>
        <dd id="container">
            <div id="azsoft" class="main-box cmbox">
                <div class="title">
                    <h3><b>安卓</b>Android</h3>
                    <span><i class="cur">摄影摄像</i>/<i>社交聊天</i>/<i>网络购物</i>/<i>生活服务</i>/<i>金融理财</i></span>
                </div>
                <div class="content clearfix on">
                    <div class="rank inrank">
                        <h4>本月热门摄影摄像软件</h4>
                        <ul class="tabContent">
                            @for($i=0;$i<9;$i++)
                                @php($info=$data->content($firstDomain,$pinyin))
                                @php($san=sprintf("%03d",($i+126)))
                                <li>
                                    <a href="{{$info['url']}}" title="{{$info['title']}}" class="txt">{{$info['title']}}</a>
                                    <p>
                                        <a href="{{$info['url']}}" class="img" title="{{$info['title']}}">
                                            <img class="lazy" data-original="{{$host.'/template/download/pc6/img'.'/'.$san.'.png'}}" title="{{$info['title']}}" alt="{{$info['title']}}"/>
                                        </a>
                                        <span><i>{{mt_rand(0,9)}}.{{mt_rand(0,9)}}M /<s class="star{{mt_rand(0,5)}}"></s></i>
                                        <a href="{{$info['url']}}" title="{{$info['title']}}">下载</a>
                                    </span>
                                    </p>
                                </li>
                            @endfor
                        </ul>
                    </div>
                    <div class="main-box2">
                        <ul class="corner clearfix">
                            @for($i=0;$i<18;$i++)
                                @php($info=$data->content($firstDomain,$pinyin))
                                @php($san=sprintf("%03d",($i+135)))
                                <li>
                                    <a href="{{$info['url']}}" title="{{$info['title']}}">
                                        <img class="lazy" data-original="{{$host.'/template/download/pc6/img'.'/'.$san.'.png'}}" width="75" height="75" title="{{$info['title']}}" alt="{{$info['title']}}"/>
                                    </a>
                                    <p>
                                        <a href="{{$info['url']}}">{{$info['title']}}</a>
                                    </p>
                                    <p class="lb">摄影摄像</p>
                                </li>
                            @endfor
                        </ul>
                    </div>
                    <p class="ctr">
                        @php($info=$data->navigation($firstDomain,$pinyin))
                        <a class="more" href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                        <span>
                            @for($i=0;$i<3;$i++)
                                @php($info=$data->navigation($firstDomain,$pinyin))
                                <a href="{{$info['url']}}" tagret="_blank" title="{{$info['title']}}">{{$info['title']}}</a>
                            @endfor
                        </span>
                    </p>
                </div>
                <div class="content clearfix">
                    <div class="rank inrank">
                        <h4>本月热门社交聊天软件</h4>
                        <ul class="tabContent">
                            @for($i=0;$i<9;$i++)
                                @php($info=$data->content($firstDomain,$pinyin))
                                @php($san=sprintf("%03d",($i+151)))
                                <li>
                                    <a href="{{$info['url']}}" title="{{$info['title']}}" class="txt">{{$info['title']}}</a>
                                    <p>
                                        <a href="{{$info['url']}}" class="img" title="{{$info['title']}}">
                                            <img class="lazy" data-original="{{$host.'/template/download/pc6/img'.'/'.$san.'.png'}}" title="{{$info['title']}}" alt="{{$info['title']}}"/>
                                        </a>
                                        <span><i>{{mt_rand(0,9)}}.{{mt_rand(0,9)}}M /<s class="star{{mt_rand(0,5)}}"></s></i>
                                        <a href="{{$info['url']}}" title="{{$info['title']}}">下载</a>
                                    </span>
                                    </p>
                                </li>
                            @endfor
                        </ul>
                    </div>
                    <div class="main-box2">
                        <ul class="corner clearfix">
                            @for($i=0;$i<18;$i++)
                                @php($info=$data->content($firstDomain,$pinyin))
                                @php($san=sprintf("%03d",($i+157)))
                                <li>
                                    <a href="{{$info['url']}}" title="{{$info['title']}}">
                                        <img class="lazy" data-original="{{$host.'/template/download/pc6/img'.'/'.$san.'.png'}}" width="75" height="75" title="{{$info['title']}}" alt="{{$info['title']}}"/>
                                    </a>
                                    <p>
                                        <a href="{{$info['url']}}">{{$info['title']}}</a>
                                    </p>
                                    <p class="lb">社交聊天</p>
                                </li>
                            @endfor
                        </ul>
                    </div>
                    <p class="ctr">
                        @php($info=$data->navigation($firstDomain,$pinyin))
                        <a class="more" href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                        <span>
                            @for($i=0;$i<3;$i++)
                                @php($info=$data->navigation($firstDomain,$pinyin))
                                <a href="{{$info['url']}}" tagret="_blank" title="{{$info['title']}}">{{$info['title']}}</a>
                            @endfor
                        </span>
                    </p>
                </div>
                <div class="content clearfix">
                    <div class="rank inrank">
                        <h4>本月热门网络购物软件</h4>
                        <ul class="tabContent">
                            @for($i=0;$i<9;$i++)
                                @php($info=$data->content($firstDomain,$pinyin))
                                @php($san=sprintf("%03d",($i+175)))
                                <li>
                                    <a href="{{$info['url']}}" title="{{$info['title']}}" class="txt">{{$info['title']}}</a>
                                    <p>
                                        <a href="{{$info['url']}}" class="img" title="{{$info['title']}}">
                                            <img class="lazy" data-original="{{$host.'/template/download/pc6/img'.'/'.$san.'.png'}}" title="{{$info['title']}}" alt="{{$info['title']}}"/>
                                        </a>
                                        <span><i>{{mt_rand(0,9)}}.{{mt_rand(0,9)}}M /<s class="star{{mt_rand(0,5)}}"></s></i>
                                        <a href="{{$info['url']}}" title="{{$info['title']}}">下载</a>
                                    </span>
                                    </p>
                                </li>
                            @endfor
                        </ul>
                    </div>
                    <div class="main-box2">
                        <ul class="corner clearfix">
                            @for($i=0;$i<18;$i++)
                                @php($info=$data->content($firstDomain,$pinyin))
                                @php($san=sprintf("%03d",($i+182)))
                                <li>
                                    <a href="{{$info['url']}}" title="{{$info['title']}}">
                                        <img class="lazy" data-original="{{$host.'/template/download/pc6/img'.'/'.$san.'.png'}}" width="75" height="75" title="{{$info['title']}}" alt="{{$info['title']}}"/>
                                    </a>
                                    <p>
                                        <a href="{{$info['url']}}">{{$info['title']}}</a>
                                    </p>
                                    <p class="lb">网络购物</p>
                                </li>
                            @endfor
                        </ul>
                    </div>
                    <p class="ctr">
                        @php($info=$data->navigation($firstDomain,$pinyin))
                        <a class="more" href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                        <span>
                            @for($i=0;$i<3;$i++)
                                @php($info=$data->navigation($firstDomain,$pinyin))
                                <a href="{{$info['url']}}" tagret="_blank" title="{{$info['title']}}">{{$info['title']}}</a>
                            @endfor
                        </span>
                    </p>
                </div>
                <div class="content clearfix">
                    <div class="rank inrank">
                        <h4>本月热门生活服务软件</h4>
                        <ul class="tabContent">
                            @for($i=0;$i<9;$i++)
                                @php($info=$data->content($firstDomain,$pinyin))
                                @php($san=sprintf("%03d",($i+200)))
                                <li>
                                    <a href="{{$info['url']}}" title="{{$info['title']}}" class="txt">{{$info['title']}}</a>
                                    <p>
                                        <a href="{{$info['url']}}" class="img" title="{{$info['title']}}">
                                            <img class="lazy" data-original="{{$host.'/template/download/pc6/img'.'/'.$san.'.png'}}" title="{{$info['title']}}" alt="{{$info['title']}}"/>
                                        </a>
                                        <span><i>{{mt_rand(0,9)}}.{{mt_rand(0,9)}}M /<s class="star{{mt_rand(0,5)}}"></s></i>
                                        <a href="{{$info['url']}}" title="{{$info['title']}}">下载</a>
                                    </span>
                                    </p>
                                </li>
                            @endfor
                        </ul>
                    </div>
                    <div class="main-box2">
                        <ul class="corner clearfix">
                            @for($i=0;$i<18;$i++)
                                @php($info=$data->content($firstDomain,$pinyin))
                                @php($san=sprintf("%03d",($i+209)))
                                <li>
                                    <a href="{{$info['url']}}" title="{{$info['title']}}">
                                        <img class="lazy" data-original="{{$host.'/template/download/pc6/img'.'/'.$san.'.png'}}" width="75" height="75" title="{{$info['title']}}" alt="{{$info['title']}}"/>
                                    </a>
                                    <p>
                                        <a href="{{$info['url']}}">{{$info['title']}}</a>
                                    </p>
                                    <p class="lb">生活服务</p>
                                </li>
                            @endfor
                        </ul>
                    </div>
                    <p class="ctr">
                        @php($info=$data->navigation($firstDomain,$pinyin))
                        <a class="more" href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                        <span>
                            @for($i=0;$i<3;$i++)
                                @php($info=$data->navigation($firstDomain,$pinyin))
                                <a href="{{$info['url']}}" tagret="_blank" title="{{$info['title']}}">{{$info['title']}}</a>
                            @endfor
                        </span>
                    </p>
                </div>
                <div class="content clearfix">
                    <div class="rank inrank">
                        <h4>本月热门金融理财软件</h4>
                        <ul class="tabContent">
                            @for($i=0;$i<9;$i++)
                                @php($info=$data->content($firstDomain,$pinyin))
                                @php($san=sprintf("%03d",($i+227)))
                                <li>
                                    <a href="{{$info['url']}}" title="{{$info['title']}}" class="txt">{{$info['title']}}</a>
                                    <p>
                                        <a href="{{$info['url']}}" class="img" title="{{$info['title']}}">
                                            <img class="lazy" data-original="{{$host.'/template/download/pc6/img'.'/'.$san.'.png'}}" title="{{$info['title']}}" alt="{{$info['title']}}"/>
                                        </a>
                                        <span><i>{{mt_rand(0,9)}}.{{mt_rand(0,9)}}M /<s class="star{{mt_rand(0,5)}}"></s></i>
                                        <a href="{{$info['url']}}" title="{{$info['title']}}">下载</a>
                                    </span>
                                    </p>
                                </li>
                            @endfor
                        </ul>
                    </div>
                    <div class="main-box2">
                        <ul class="corner clearfix">
                            <ul class="corner clearfix">
                                @for($i=0;$i<17;$i++)
                                    @php($info=$data->content($firstDomain,$pinyin))
                                    @php($san=sprintf("%03d",($i+234)))
                                    <li>
                                        <a href="{{$info['url']}}" title="{{$info['title']}}">
                                            <img class="lazy" data-original="{{$host.'/template/download/pc6/img'.'/'.$san.'.png'}}" width="75" height="75" title="{{$info['title']}}" alt="{{$info['title']}}"/>
                                        </a>
                                        <p>
                                            <a href="{{$info['url']}}">{{$info['title']}}</a>
                                        </p>
                                        <p class="lb">金融理财</p>
                                    </li>
                                @endfor
                            </ul>
                        </ul>
                    </div>
                    <p class="ctr">
                        @php($info=$data->navigation($firstDomain,$pinyin))
                        <a class="more" href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                        <span>
                            @for($i=0;$i<3;$i++)
                                @php($info=$data->navigation($firstDomain,$pinyin))
                                <a href="{{$info['url']}}" tagret="_blank" title="{{$info['title']}}">{{$info['title']}}</a>
                            @endfor
                        </span>
                    </p>
                </div>
            </div>
            {{--<div id="friendlink" class="main-box">
                <div class="content">
                    <div class="title font14-bold"><b>友情链接</b></div>
                    <ul>
                        @for($i=0;$i<73;$i++)
                            @php($info=$data->content($firstDomain,$pinyin))
                            <li>
                                <a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                            </li>
                        @endfor
                    </ul>
                </div>
            </div>--}}
        </dd>
    </dl>
@endsection
