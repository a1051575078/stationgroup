@php($data=app('App\Http\Controllers\CoreController'))
@extends('template.download.yuanma.layout')
@section('content')
    <div class="recommendsoft">
        <div class="inner">
            <div class="inner">
                <div class="clearfix recommendsoft-head">
                    <h3 class="title">精品源码广告推荐</h3>
                    <p class="extra">
                        @php($info=$data->navigation($firstDomain,$pinyin))
                        <a target="_blank" href="{{$info['url']}}">源码投稿/源码投诉/{{$info['title']}} QQ:168660455</a>
                    </p>
                </div>
                <div class="clearfix recommendsoft-list">
                    <ul>
                        @for($i=0;$i<4;$i++)
                            <li>
                                <p class="image">
                                    @php($info=$data->content($firstDomain,$pinyin,$type))
                                    <a href="{{$info['url']}}" target="_blank" rel="nofollow">
                                        <img src="{{$host.'/template/download/yuanma/img/'.($i+1).'.gif'}}" width="130" height="90">
                                        <strong>{{$info['title']}}</strong>
                                    </a>
                                </p>
                                <p class="intro">
                                    {{$info['article']}}
                                </p>
                            </li>
                        @endfor
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix layout-home-cols3">
        <div class="col1">
            <div class="toprecommend">
                <ul class="tabber">
                    <li>
                        <a href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}" class="current">热门源码广告</a>
                    </li>
                    <li>
                        <a href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}">热门软件广告</a>
                    </li>
                </ul>
                <div class="toprecommend-list">
                    <ul style="display: block;">
                        @for($i=0;$i<8;$i++)
                            <li>
                                @php($info=$data->content($firstDomain,$pinyin,$type))
                                <a href="{{$info['url']}}" target="_blank">
                                    <img src="{{$host.'/template/download/yuanma/img/'.mt_rand(5,53).'.gif'}}">
                                    <strong>{{$info['title']}}</strong>
                                    {{$info['article']}}
                                </a>
                            </li>
                        @endfor
                    </ul>
                    <ul style="display: none;">
                        @for($i=0;$i<8;$i++)
                            <li>
                                @php($info=$data->content($firstDomain,$pinyin,$type))
                                <a href="{{$info['url']}}" target="_blank">
                                    <img src="{{$host.'/template/download/yuanma/img/'.mt_rand(5,53).'.gif'}}">
                                    <strong>{{$info['title']}}</strong>
                                    {{$info['article']}}
                                </a>
                            </li>
                        @endfor
                    </ul>
                </div>
            </div>
        </div>
        <div class="col2">
            <div class="panel hslice leastdownload" id="downchinaz_leastdownload">
                <div class="panel-head">
                    <h3 class="title entry-title">最新下载</h3>
                    <p class="extra">
                        @php($info=$data->navigation($firstDomain,$pinyin))
                        <a href="{{$info['url']}}" target="_blank">最新源码</a>
                        @php($info=$data->navigation($firstDomain,$pinyin))
                        <a href="{{$info['url']}}" target="_blank">最新软件</a>
                    </p>
                </div>
                <div class="panel-body entry-content">
                    <div class="leastdownload-fixed">
                        @php($info=$data->navigation($firstDomain,$pinyin))
                        <a href="{{$info['url']}}" title="{{$info['title']}}" target="_blank">[付费] {{$info['title']}}</a>
                    </div>
                    <ul class="leastdownload-list">
                        @for($i=0;$i<8;$i++)
                            <li>
                                <span class="date">{{date('m-d',strtotime("-$i day"))}}</span>
                                @php($info=$data->navigation($firstDomain,$pinyin))
                                <a class="cate" href="{{$info['url']}}" target="_blank">[{{$info['title']}}]</a>
                                @php($info=$data->content($firstDomain,$pinyin))
                                <a class="title" href="{{$info['url']}}" title="{{$info['title']}}" target="_blank">{{$info['title']}}</a>
                            </li>
                        @endfor
                    </ul>
                    <div class="leastdownload-fixed leastdownload-border">
                        @php($info=$data->navigation($firstDomain,$pinyin))
                        <a href="{{$info['url']}}" title="{{$info['title']}}" target="_blank">[软件] {{$info['title']}}</a>
                    </div>
                    <ul class="leastdownload-list">
                        @for($i=0;$i<8;$i++)
                            <li>
                                <span class="date">{{date('m-d',strtotime("-$i day"))}}</span>
                                @php($info=$data->navigation($firstDomain,$pinyin))
                                <a class="cate" href="{{$info['url']}}" target="_blank">[{{$info['title']}}]</a>
                                @php($info=$data->content($firstDomain,$pinyin))
                                <a class="title" href="{{$info['url']}}" title="{{$info['title']}}" target="_blank">{{$info['title']}}</a>
                            </li>
                        @endfor
                    </ul>
                </div>
            </div>
        </div>
        <div class="col3">
            <div class="panel specialtopic">
                <div class="panel-head">
                    <h3 class="title">
                        @php($info=$data->navigation($firstDomain,$pinyin))
                        <a href="{{$info['url']}}" target="_blank">素材下载</a>
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="pic_text">
                        <div class="left">
                            @php($info=$data->content($firstDomain,$pinyin))
                            <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">
                                <img src="{{$host.'/template/download/yuanma/img/html5.jpg'}}" width="106" height="80" alt=""/>
                            </a>
                            <p>
                                <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">{{$info['title']}}</a>
                            </p>
                        </div>
                        <div class="left">
                            @php($info=$data->content($firstDomain,$pinyin))
                            <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">
                                <img src="{{$host.'/template/download/yuanma/img/css3.jpg'}}" width="106" height="80" alt=""/>
                            </a>
                            <p><a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">{{$info['title']}}</a></p>
                        </div>
                        <div style="clear:both"></div>
                    </div>
                    <div class="pic_word">
                        @for($i=0;$i<14;$i++)
                            @php($info=$data->content($firstDomain,$pinyin))
                            <a {{mt_rand(1,7)===7?'class=color01':''}} href="{{$info['url']}}" target="_blank">{{$info['title']}}</a>
                        @endfor
                    </div>
                    <div class="pic_list">
                        <ul>
                            @for($i=0;$i<8;$i++)
                                <li>
                                    @php($info=$data->navigation($firstDomain,$pinyin))
                                    [<a href="{{$info['url']}}" class="acate" target="_blank">{{$info['title']}}</a>]
                                    @php($info=$data->content($firstDomain,$pinyin))
                                    <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}"  class="p">
                                        {{$info['title']}}
                                    </a>
                                </li>
                            @endfor
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix layout-home-cols2">
        <div class="col1">
            <div class="panel hslice panel-box-red" id="downchinaz_asp">
                <div class="panel-head">
                    <div class="inner">
                        <h3 class="title entry-title">
                            @php($info=$data->navigation($firstDomain,$pinyin))
                            <a href="{{$info['url']}}" target="_blank">{{$info['title']}}</a>
                        </h3>
                    </div>
                </div>
                <div class="panel-body entry-content codeboard">
                    <div class="codeboard-main">
                        <dl class="clearfix codestick">
                            <dt class="title">
                                @php($info=$data->content($firstDomain,$pinyin,$type))
                                <a href="{{$info['url']}}" target="_blank">{{$info['title']}}</a>
                            </dt>
                            <dd class="image">
                                <img src="{{$host.'/template/download/yuanma/img/kesion72.png'}}" alt=""/>
                            </dd>
                            <dd class="intro">
                                {{$info['article']}}
                                <a href="{{$info['url']}}" target="_blank">详情&raquo;</a>
                            </dd>
                        </dl>
                        <ul class="codelist">
                            @for($i=0;$i<10;$i++)
                                <li>
                                    <span class="date">{{date('m-d',strtotime("-$i day"))}}</span>
                                    @php($info=$data->navigation($firstDomain,$pinyin))
                                    <a class="cate" href="{{$info['url']}}" target="_blank">[{{$info['title']}}]</a>
                                    @php($info=$data->content($firstDomain,$pinyin))
                                    <a class="title" href="{{$info['url']}}" title="{{$info['title']}}" target="_blank">{{$info['title']}}</a>
                                </li>
                            @endfor
                        </ul>
                    </div>
                    <div class="codeboard-aside">
                        <h3 class="title">热门asp源码</h3>
                        <ul class="hotlist">
                            @for($i=0;$i<10;$i++)
                                <li>
                                    @php($info=$data->content($firstDomain,$pinyin))
                                    <a href="{{$info['url']}}" target="_blank">{{$info['title']}}</a>
                                </li>
                            @endfor
                        </ul>
                    </div>
                    <div class="keywords">
                        <strong>热门关键字:</strong>
                        @for($i=0;$i<7;$i++)
                            @php($info=$data->navigation($firstDomain,$pinyin))
                            <a href="{{$info['url']}}" target="_blank">{{$info['title']}}</a>
                        @endfor
                    </div>
                </div>
                <div class="panel-foot">
                    <div></div>
                </div>
            </div>
        </div>
        <div class="col2">
            <div class="banner banner-halfbanner">
                @php($info=$data->content($firstDomain,$pinyin))
                <a href="{{$info['url']}}" target="_blank">
                    <img src="{{$host.'/template/download/yuanma/img/jz300.gif'}}" height="85" width="260">
                </a>
            </div>
            <div class="panel panel-aside-red">
                <div class="panel-head">
                    <div class="inner">
                        <h3 class="title">源码推荐下载</h3>
                    </div>
                </div>
                <div class="panel-body">
                    <ul class="softlist">
                        @for($i=0;$i<11;$i++)
                            @php($info=$data->content($firstDomain,$pinyin))
                            <li>
                                <a href="{{$info['url']}}" title="{{$info['title']}}" target="_blank">{{$info['title']}}</a>
                            </li>
                        @endfor
                    </ul>
                </div>
                <div class="panel-foot">
                    <div></div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix layout-home-cols2">
        <div class="col1">
            <div class="panel hslice panel-box-green" id="downchinaz_php">
                <div class="panel-head">
                    <div class="inner">
                        <h3 class="title entry-title">
                            @php($info=$data->navigation($firstDomain,$pinyin))
                            <a href="{{$info['url']}}" target="_blank">{{$info['title']}}</a>
                        </h3>
                    </div>
                </div>
                <div class="panel-body entry-content codeboard">
                    <div class="codeboard-main">
                        <dl class="clearfix codestick">
                            <dt class="title">
                                @php($info=$data->content($firstDomain,$pinyin,$type))
                                <a href="{{$info['url']}}">{{$info['title']}}</a>
                            </dt>
                            <dd class="image">
                                <img src="{{$host.'/template/download/yuanma/img/espcms.jpg'}}" alt=""/>
                            </dd>
                            <dd class="intro">
                                {{$info['article']}}
                                <a href="{{$info['url']}}">详情&raquo;</a>
                            </dd>
                        </dl>
                        <ul class="codelist">
                            @for($i=0;$i<9;$i++)
                                <li>
                                    <span class="date">{{date('m-d',strtotime("-$i day"))}}</span>
                                    @php($info=$data->navigation($firstDomain,$pinyin))
                                    <a class="cate" href="{{$info['url']}}" target="_blank">[{{$info['title']}}]</a>
                                    @php($info=$data->content($firstDomain,$pinyin))
                                    <a class="title" href="{{$info['url']}}" title="{{$info['title']}}" target="_blank">{{$info['title']}}</a>
                                </li>
                            @endfor
                        </ul>
                    </div>
                    <div class="codeboard-aside">
                        <h3 class="title">热门php源码</h3>
                        <ul class="hotlist">
                            @for($i=0;$i<8;$i++)
                                <li>
                                    @php($info=$data->content($firstDomain,$pinyin))
                                    <a href="{{$info['url']}}" target="_blank">{{$info['title']}}</a>
                                </li>
                            @endfor
                        </ul>
                    </div>
                    <div class="keywords">
                        <strong>热门关键字:</strong>
                        @for($i=0;$i<9;$i++)
                            @php($info=$data->navigation($firstDomain,$pinyin))
                            <a href="{{$info['url']}}" target="_blank">{{$info['title']}}</a>
                        @endfor
                    </div>
                </div>
                <div class="panel-foot">
                    <div></div>
                </div>
            </div>
        </div>
        <div class="col2">
            <div class="banner banner-halfbanner">
                @php($info=$data->content($firstDomain,$pinyin))
                <a href="{{$info['url']}}" target="_blank">
                    <img src="{{$host.'/template/download/yuanma/img/api_260.gif'}}" height="85" width="260"/>
                </a>
            </div>
            <div class="panel panel-aside-green">
                <div class="panel-head">
                    <div class="inner">
                        <h3 class="title">源码下载排行</h3>
                    </div>
                </div>
                <div class="panel-body">
                    <ul class="toprank">
                        @for($i=0;$i<10;$i++)
                            <li>
                                <em class="t-{{$i+1}}">{{$i+1}}</em>
                                @php($info=$data->content($firstDomain,$pinyin))
                                <a href="{{$info['url']}}" title="{{$info['title']}}" target="_blank">{{$info['title']}}</a>
                            </li>
                        @endfor
                    </ul>
                </div>
                <div class="panel-foot">
                    <div></div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix layout-home-cols2">
        <div class="col1">
            <div class="panel hslice panel-box-red" id="downchinaz_dotnet">
                <div class="panel-head">
                    <div class="inner">
                        <h3 class="title entry-title">
                            @php($info=$data->navigation($firstDomain,$pinyin))
                            <a href="{{$info['url']}}" target="_blank">{{$info['title']}}</a>
                        </h3>
                    </div>
                </div>
                <div class="panel-body entry-content codeboard">
                    <div class="codeboard-main">
                        <dl class="clearfix codestick">
                            <dt class="title">
                                @php($info=$data->content($firstDomain,$pinyin,$type))
                                <a href="{{$info['url']}}" target="_blank">{{$info['title']}}</a>
                            </dt>
                            <dd class="image">
                                <img src="{{$host.'/template/download/yuanma/img/xinyou2.jpg'}}" alt=""/>
                            </dd>
                            <dd class="intro">
                                {{$info['article']}}
                                <a href="{{$info['url']}}" target="_blank">详情&raquo;</a>
                            </dd>
                        </dl>
                        <ul class="codelist">
                            @for($i=0;$i<10;$i++)
                                <li>
                                    <span class="date">{{date('m-d',strtotime("-$i day"))}}</span>
                                    @php($info=$data->navigation($firstDomain,$pinyin))
                                    <a class="cate" href="{{$info['url']}}" target="_blank">[{{$info['title']}}]</a>
                                    @php($info=$data->content($firstDomain,$pinyin))
                                    <a class="title" href="{{$info['url']}}" title="{{$info['title']}}" target="_blank">{{$info['title']}}</a>
                                </li>
                            @endfor
                        </ul>
                    </div>
                    <div class="codeboard-aside">
                        <h3 class="title">热门.net源码</h3>
                        <ul class="hotlist">
                            @for($i=0;$i<12;$i++)
                                <li>
                                    @php($info=$data->content($firstDomain,$pinyin))
                                    <a href="{{$info['url']}}" target="_blank">{{$info['title']}}</a>
                                </li>
                            @endfor
                        </ul>
                    </div>
                    <div class="keywords">
                        <strong>热门关键字:</strong>
                        @for($i=0;$i<6;$i++)
                            @php($info=$data->navigation($firstDomain,$pinyin))
                            <a href="{{$info['url']}}" target="_blank">{{$info['title']}}</a>
                        @endfor
                    </div>
                </div>
                <div class="panel-foot">
                    <div></div>
                </div>
            </div>
        </div>
        <div class="col2">
            <div class="banner banner-halfbanner">
                @php($info=$data->content($firstDomain,$pinyin))
                <a href="{{$info['url']}}" target="_blank">
                    <img src="{{$host.'/template/download/yuanma/img/zj260.gif'}}" height="85" width="260"/>
                </a>
            </div>
            <div class="panel panel-aside-red">
                <div class="panel-head">
                    <div class="inner">
                        <h3 class="title">软件推荐下载</h3>
                    </div>
                </div>
                <div class="panel-body">
                    <ul class="softlist">
                        @for($i=0;$i<11;$i++)
                            @php($info=$data->content($firstDomain,$pinyin))
                            <li>
                                <a href="{{$info['url']}}" title="{{$info['title']}}" target="_blank">{{$info['title']}}</a>
                            </li>
                        @endfor
                    </ul>
                </div>
                <div class="panel-foot">
                    <div></div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix layout-home-cols2">
        <div class="col1">
            <div class="panel hslice panel-box-green" id="downchinaz_other">
                <div class="panel-head">
                    <div class="inner">
                        <h3 class="title entry-title">
                            @php($info=$data->navigation($firstDomain,$pinyin))
                            <a href="{{$info['url']}}" target="_blank">{{$info['title']}}</a>
                        </h3>
                    </div>
                </div>
                <div class="panel-body entry-content codeboard">
                    <div class="codeboard-main">
                        <dl class="clearfix codestick">
                            <dt class="title">
                                @php($info=$data->content($firstDomain,$pinyin,$type))
                                <a href="{{$info['url']}}" target="_blank">{{$info['title']}}</a>
                            </dt>
                            <dd class="image">
                                <img src="{{$host.'/template/download/yuanma/img/xheditor.gif'}}" alt=""/>
                            </dd>
                            <dd class="intro">
                                {{$info['article']}}
                                <a href="{{$info['url']}}" target="_blank">详情&raquo;</a>
                            </dd>
                        </dl>
                        <ul class="codelist">
                            @for($i=0;$i<9;$i++)
                                <li>
                                    <span class="date">{{date('m-d',strtotime("-$i day"))}}</span>
                                    @php($info=$data->navigation($firstDomain,$pinyin))
                                    <a class="cate" href="{{$info['url']}}" target="_blank">[{{$info['title']}}]</a>
                                    @php($info=$data->content($firstDomain,$pinyin))
                                    <a class="title" href="{{$info['url']}}" title="{{$info['title']}}" target="_blank">{{$info['title']}}</a>
                                </li>
                            @endfor
                        </ul>
                    </div>
                    <div class="codeboard-aside">
                        <h3 class="title">其它热门源码</h3>
                        <ul class="hotlist">
                            @for($i=0;$i<7;$i++)
                                <li>
                                    @php($info=$data->content($firstDomain,$pinyin))
                                    <a href="{{$info['url']}}" target="_blank">{{$info['title']}}</a>
                                </li>
                            @endfor
                        </ul>
                    </div>
                    <div class="keywords">
                        <strong>热门关键字:</strong>
                        @for($i=0;$i<8;$i++)
                            @php($info=$data->navigation($firstDomain,$pinyin))
                            <a href="{{$info['url']}}" target="_blank">{{$info['title']}}</a>
                        @endfor
                    </div>
                </div>
                <div class="panel-foot">
                    <div></div>
                </div>
            </div>
        </div>
        <div class="col2">
            <div class="banner banner-halfbanner">
                @php($info=$data->content($firstDomain,$pinyin))
                <a href="{{$info['url']}}" target="_blank">
                    <img src="{{$host.'/template/download/yuanma/img/top260.gif'}}" height="85" width="260"/>
                </a>
            </div>
            <div class="panel panel-aside-green">
                <div class="panel-head">
                    <div class="inner">
                        <h3 class="title">软件下载排行</h3>
                    </div>
                </div>
                <div class="panel-body">
                    <ul class="toprank">
                        @for($i=0;$i<10;$i++)
                            <li>
                                <em class="t-{{$i+1}}">{{$i+1}}</em>
                                @php($info=$data->content($firstDomain,$pinyin))
                                <a class="title" href="{{$info['url']}}" title="{{$info['title']}}" target="_blank">{{$info['title']}}</a>
                            </li>
                        @endfor
                    </ul>
                </div>
                <div class="panel-foot">
                    <div></div>
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-box-red commonsoft" id="downchinaz_commen">
        <div class="panel-head">
            <div class="inner">
                <h3 class="title">常用软件</h3>
            </div>
        </div>
        <div class="panel-body">
            @for($i=0;$i<8;$i++)
                <dl>
                    @php($info=$data->navigation($firstDomain,$pinyin))
                    <dt>{{$info['title']}}</dt>
                    @for($j=0;$j<5;$j++)
                        <dd>
                            <img alt="" src="{{$host.'/template/download/yuanma/img/'.(($j+14)+$i*5).'.gif'}}" />
                            @php($info=$data->content($firstDomain,$pinyin))
                            <a href="{{$info['url']}}" target="_blank">{{$info['title']}}</a>
                        </dd>
                    @endfor
                </dl>
            @endfor
        </div>
        <div class="panel-foot">
            <div></div>
        </div>
    </div>
    <div class="panel panel-box-green commoncode" id="downchinaz_code">
        <div class="panel-head">
            <div class="inner">
                <h3 class="title">源码系统程序</h3>
            </div>
        </div>
        <div class="panel-body">
            @for($i=0;$i<8;$i++)
                <dl>
                    @php($info=$data->navigation($firstDomain,$pinyin))
                    <dt>{{$info['title']}}</dt>
                    @for($j=0;$j<4;$j++)
                        <dd>
                            @php($info=$data->content($firstDomain,$pinyin))
                            <a href="{{$info['url']}}" target="_blank">{{$info['title']}}</a>
                        </dd>
                    @endfor
                </dl>
            @endfor
        </div>
        <div class="panel-foot">
            <div></div>
        </div>
    </div>
    <div class="links">
        <div class="links-logo">
            <div class="inner">
                <div class="clearfix inner">
                    @php($info=$data->navigation($firstDomain,$pinyin))
                    <a href="{{$info['url']}}" target="_blank">
                        <img alt="" width="88" height="31" src="{{$host.'/template/download/yuanma/img/chinaz.gif'}}"/>
                    </a>
                    @php($info=$data->navigation($firstDomain,$pinyin))
                    <a href="{{$info['url']}}" target="_blank">
                        <img alt="" width="88" height="31" src="{{$host.'/template/download/yuanma/img/sclogo.gif'}}"/>
                    </a>
                    @php($info=$data->navigation($firstDomain,$pinyin))
                    <a href="{{$info['url']}}" target="_blank">
                        <img alt="" width="88" height="31" src="{{$host.'/template/download/yuanma/img/crsky.gif'}}"/>
                    </a>
                    @php($info=$data->navigation($firstDomain,$pinyin))
                    <a href="{{$info['url']}}" target="_blank">
                        <img alt="" width="88" height="31" src="{{$host.'/template/download/yuanma/img/downg.gif'}}"/>
                    </a>
                </div>
            </div>
        </div>
        <div class="links-text">
            @for($i=0;$i<9;$i++)
                @php($info=$data->navigation($firstDomain,$pinyin))
                <a href="{{$info['url']}}" target="_blank">{{$info['title']}}</a> |
            @endfor
            @php($info=$data->navigation($firstDomain,$pinyin))
            <a href="{{$info['url']}}" target="_blank">{{$info['title']}}</a>
        </div>
    </div>
@endsection
