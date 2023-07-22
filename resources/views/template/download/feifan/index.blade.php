@php($data=app('App\Http\Controllers\CoreController'))
@extends('template.download.feifan.layout')
@section('content')
    <div class="warp clearfix">
        <div class="Hme_top mt10 mb20">
            <span>热门推荐：</span>
            @for($i=0;$i<11;$i++)
                @php($info=$data->content($firstDomain,$pinyin))
                <a class="black" target="_blank" href="{{$info['url']}}">{{$info['title']}}</a>
            @endfor
        </div>
        <div class="clearfix pretive mb20">
            <div class="WarpLeft fl clearfix">
                <div class="clearfix onefloor clear">
                    <div class="Everytj wper40 fl">
                        <div class="hem_box pretive mr20">
                            <i class="ehot"></i>
                            <div class="hme_tit">
                                <h3 class="fl pl46">每周推荐</h3>
                                <span class="fr tit_span">
                                更新：PC软件<em>{{mt_rand(100,999)}}</em>个, 手机软件<em>{{mt_rand(100,999)}}</em>个
                            </span>
                            </div>
                            <div class="clearfix Everytlist mt12">
                                <ul>
                                    @for($i=0;$i<7;$i++)
                                        @php($info=$data->content($firstDomain,$pinyin))
                                        <li>
                                            <a target="_blank" href="{{$info['url']}}" class="etimg">
                                                <img src="{{$host.'/template/download/feifan/img/'.($i+1).'.png'}}"/>
                                            </a>
                                            <div class="everytxt">
                                                <a target="_blank" href="{{$info['url']}}">{{$info['title']}}</a>
                                                <p>
                                                    @for($j=0;$j<3;$j++)
                                                        @php($info=$data->content($firstDomain,$pinyin))
                                                        <a target="_blank" href="{{$info['url']}}">[{{$info['title']}}]</a>
                                                    @endfor
                                                </p>
                                            </div>
                                        </li>
                                    @endfor
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="Everytj wper60 fl">
                        <div class="hem_box">
                            <div class="hme_tit mrnew">
                                <h3 class="fl">每日更新</h3>
                                <span class="fr tspan_a">
                                <a class="press" href="javascript:void(0);">
                                    <i class="hpc"></i>软件
                                </a>
                                <a href="javascript:void(0);">
                                    <i class="happ"></i>APP
                                </a>
                            </span>
                            </div>
                            <div class="clearfix Everynews">
                                <ul>
                                    @for($i=0;$i<15;$i++)
                                        <li>
                                        <span>
                                            @php($info=$data->navigation($firstDomain,$pinyin))
                                            <a class="cate" target="_blank" href="{{$info['url']}}">[{{$info['title']}}]</a>
                                            @php($info=$data->content($firstDomain,$pinyin))
                                            <a target="_blank" href="{{$info['url']}}">{{$info['title']}}</a>
                                        </span>
                                            <font>{{date('m-d',strtotime("-$i day"))}}</font>
                                        </li>
                                    @endfor
                                </ul>
                                <ul class="yc">
                                    @for($i=0;$i<15;$i++)
                                        <li>
                                        <span>
                                            @php($info=$data->navigation($firstDomain,$pinyin))
                                            <a class="cate" target="_blank" href="{{$info['url']}}">[{{$info['title']}}]</a>
                                            @php($info=$data->content($firstDomain,$pinyin))
                                            <a target="_blank" href="{{$info['url']}}">{{$info['title']}}</a>
                                        </span>
                                            <font>{{date('m-d',strtotime("-$i day"))}}</font>
                                        </li>
                                    @endfor
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix twofloor mt20 clear">
                    <div class=" fl wper50">
                        <div class="hem_box mr20">
                            <div class="twofl_tit">
                                <h3 class="fl">软件资讯</h3>
                                @php($info=$data->navigation($firstDomain,$pinyin))
                                <a class="more" target="_blank" href="{{$info['url']}}">更多&gt;</a>
                            </div>
                            <div class="top_down clear">
                                <ul id="left-hot4" class="twoflr_box">
                                    @for($i=0;$i<10;$i++)
                                        <li class="extrude hover{{$i+1}}">
                                            <div class="icon hiden">
                                                <span class="dot">·</span>
                                                @php($info=$data->content($firstDomain,$pinyin,$type))
                                                <a href="{{$info['url']}}" target="_blank">{{$info['title']}}</a>
                                            </div>
                                            <div class="name">
                                                <a class="" href="{{$info['url']}}" target="_blank">
                                                    <img src="{{$host.'/template/download/feifan/img/'.($i+8).'.png'}}"/>
                                                </a>
                                            </div>
                                            <div class="ico_b_right">
                                                <div class="gdl">
                                                    <h3>
                                                        <a href="{{$info['url']}}" target="_blank">{{$info['title']}}</a>
                                                    </h3>
                                                    <p>{{$info['article']}}</p>
                                                </div>
                                            </div>
                                        </li>
                                    @endfor
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class=" fl wper50">
                        <div class="hem_box">
                            <div class="twofl_tit">
                                <h3 class="fl">游戏攻略</h3>
                                @php($info=$data->navigation($firstDomain,$pinyin))
                                <a class="more" target="_blank" href="{{$info['url']}}">更多&gt;</a>
                            </div>
                            <div class="top_down clear">
                                <ul id="left-hot4" class="twoflr_box">
                                    @for($i=0;$i<10;$i++)
                                        <li class="extrude hover{{$i+1}}">
                                            <div class="icon hiden">
                                                <span class="dot">·</span>
                                                @php($info=$data->content($firstDomain,$pinyin,$type))
                                                <a href="{{$info['url']}}" target="_blank">{{$info['title']}}</a>
                                            </div>
                                            <div class="name">
                                                <a class="" href="{{$info['url']}}" target="_blank">
                                                    <img src="{{$host.'/template/download/feifan/img/'.($i+18).'.png'}}"/>
                                                </a>
                                            </div>
                                            <div class="ico_b_right">
                                                <div class="gdl">
                                                    <h3>
                                                        <a href="{{$info['url']}}" target="_blank">{{$info['title']}}</a>
                                                    </h3>
                                                    <p>{{$info['article']}}</p>
                                                </div>
                                            </div>
                                        </li>
                                    @endfor
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix threefloor clear">
                    <div class="threebox">
                        @for($i=0;$i<21;$i++)
                            <dl>
                                <dt>
                                    @php($info=$data->navigation($firstDomain,$pinyin))
                                    <a href="{{$info['url']}}" target="_blank">{{$info['title']}}</a>
                                </dt>
                                <dd>
                                    <ul>
                                        @for($j=0;$j<3;$j++)
                                            <li>
                                                @php($info=$data->content($firstDomain,$pinyin))
                                                <a href="{{$info['url']}}" target="_blank">{{$info['title']}}</a>
                                            </li>
                                        @endfor
                                    </ul>
                                </dd>
                            </dl>
                        @endfor
                    </div>
                </div>
                <div class="clearfix fourfloor mt12">
                    <div class="hem_box">
                        <div class="twofl_tit">
                            <h3 class="fl">手机必备</h3>
                            <span class="fr hemtitr">
                            @php($info=$data->navigation($firstDomain,$pinyin))
                            <a class="press" href="{{$info['url']}}">{{$info['title']}}</a>|
                            @php($info=$data->navigation($firstDomain,$pinyin))
                            <a href="{{$info['url']}}">{{$info['title']}}</a>
                        </span>
                        </div>
                        <div class="Happlist">
                            <ul class="clearfix">
                                @for($i=0;$i<21;$i++)
                                    <li>
                                        @php($info=$data->content($firstDomain,$pinyin))
                                        <a class="Happimg" href="{{$info['url']}}" target="_blank">
                                            <img src="{{$host.'/template/download/feifan/img/'.($i+28).'.png'}}"/>
                                        </a>
                                        <p>
                                            <a href="{{$info['url']}}" target="_blank" >{{$info['title']}}</a>
                                        </p>
                                    </li>
                                @endfor
                            </ul>
                            <ul class="clearfix yc">
                                @for($i=0;$i<21;$i++)
                                    <li>
                                        @php($info=$data->content($firstDomain,$pinyin))
                                        <a class="Happimg" href="{{$info['url']}}" target="_blank">
                                            <img src="{{$host.'/template/download/feifan/img/'.($i+49).'.png'}}"/>
                                        </a>
                                        <p>
                                            <a href="{{$info['url']}}" target="_blank" >{{$info['title']}}</a>
                                        </p>
                                    </li>
                                @endfor
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="WarpRight fr">
                <div class="HmeTopright">
                    <div class="hme_tit">
                        <h3 class="fl">热门推荐</h3>
                    </div>
                    <div  class="Hemfocus">
                        <div  class="fPic">
                            <div class="fcon" style="display: block;">
                                @php($info=$data->content($firstDomain,$pinyin))
                                <a href="{{$info['url']}}" target="_blank">
                                    <img src="{{$host.'/template/download/feifan/img/guanggao.jpg'}}" style="opacity: 1;">
                                </a>
                                <span class="shadow">
                                <a href="{{$info['url']}}" target="_blank">{{$info['title']}}
                                </a>
                            </span>
                            </div>
                        </div>
                    </div>
                    <div class="HemTopList">
                        <ul>
                            @for($i=0;$i<18;$i++)
                                <li>
                                    <em>·</em>
                                    @php($info=$data->content($firstDomain,$pinyin))
                                    <a href="{{$info['url']}}" target="_blank">{{$info['title']}}</a>
                                </li>
                            @endfor
                        </ul>
                    </div>
                </div>
                <div class="rmgjc mt20">
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
                <div class="top_down Hemrank clearfix Abder mt20">
                    <div class="hme_tit hrank_tit ml14 mr10">
                        <h3 class="fl">月排行榜</h3>
                        <span class="fr tspan_a">
                        <a class="press" href="javascript:void(0);">PC</a>
                        <a href="javascript:void(0);">手机</a>
                    </span>
                    </div>
                    <div class="hrank_tit_body">
                        <ul id="left-hot4" class="clear">
                            @for($i=0;$i<10;$i++)
                                <li class="extrude hover{{$i+1}}">
                                    <div class="icon">
                                        <span class="rank">{{$i+1}}</span>
                                        @php($info=$data->content($firstDomain,$pinyin))
                                        <a href="{{$info['url']}}" target="_blank">{{$info['title']}}</a>
                                    </div>
                                    <div class="name">
                                        <a class="wh90" href="{{$info['url']}}" target="_blank">
                                            <img src="{{$host.'/template/download/feifan/img/'.($i+76).'.png'}}"/>
                                        </a>
                                    </div>
                                    <div class="ico_b_right">
                                        <div class="sales">
                                            <a class="xz_btn" href="{{$info['url']}}" target="_blank">立即下载</a>
                                        </div>
                                        <div class="sales">大小：<span>{{mt_rand(1,99)}}.{{mt_rand(1,99)}} MB</span></div>
                                    </div>
                                </li>
                            @endfor
                        </ul>
                        <ul id="left-hot4" class="clear yc">
                            @for($i=0;$i<10;$i++)
                                <li class="extrude hover{{$i+1}}">
                                    <div class="icon">
                                        <span class="rank">{{$i+1}}</span>
                                        @php($info=$data->content($firstDomain,$pinyin))
                                        <a href="{{$info['url']}}" target="_blank">{{$info['title']}}</a>
                                    </div>
                                    <div class="name">
                                        <a class="wh90" href="{{$info['url']}}" target="_blank">
                                            <img src="{{$host.'/template/download/feifan/img/'.($i+86).'.png'}}"/>
                                        </a>
                                    </div>
                                    <div class="ico_b_right">
                                        <div class="sales">
                                            <a class="xz_btn" href="{{$info['url']}}" target="_blank">立即下载</a>
                                        </div>
                                        <div class="sales">大小：<span>{{mt_rand(1,99)}}.{{mt_rand(1,99)}} MB</span></div>
                                    </div>
                                </li>
                            @endfor
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix friendbox mb20 clear">
            <div class="friend_tit">
                <h3 class="fl">
                    @php($info=$data->navigation($firstDomain,$pinyin))
                    <a class="press" href="{{$info['url']}}">{{$info['title']}}</a>
                </h3>
                <span class="friendr fr">友链合作
                <em>
                    <img src='{{$host.'/template/download/feifan/img/qq.jpg'}}'/>
                </em>
                @php($info=$data->content($firstDomain,$pinyin))
                <a href="{{$info['url']}}" target="_blank">{{$info['title']}}</a>
            </span>
            </div>
            <div class="friend_tit_body">
                <div class="friend clear">
                    @for($i=0;$i<19;$i++)
                        @php($info=$data->navigation($firstDomain,$pinyin))
                        <a href="{{$info['url']}}" title="{{$info['title']}}" target="_blank">{{$info['title']}}</a>
                    @endfor
                </div>
            </div>
        </div>
    </div>
@endsection
