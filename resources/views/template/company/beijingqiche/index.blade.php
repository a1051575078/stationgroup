@php($data=app('App\Http\Controllers\CoreController'))
@extends('template.company.beijingqiche.layout')
@section('content')
    <div class="index_banner">
        <div class="index_bannerin">
            <div class="fullSlide">
                <div class="bd">
                    <ul>
                        @php($img=['20201229132856_30235.jpg','20201028154542_73101.jpg','20201028174826_82777.jpg','20200806141749_25074.jpg','20200811111245_25670.jpg'])
                        @for($i=0;$i<5;$i++)
                            <li>
                                @php($info=$data->navigation($firstDomain,$pinyin))
                                <a href="{{$info['url']}}" title="{{$info['title']}}" target="_target">
                                    <img src="{{$host.'/template/company/beijingqiche/img/'.$img[$i]}}" class="enet_hk_cn_url" title="{{$info['title']}}" alt="{{$info['title']}}"/>
                                </a>
                            </li>
                        @endfor
                    </ul>
                </div>
                <span class="prev"></span>
                <span class="next"></span>
                <span class="pageState"></span>
            </div>
        </div>
    </div>
    <div class="index_one">
        <div class="index_title">
            <h1>企业动态</h1>
            <h2></h2>
            <h3>Company News</h3>
            @php($info=$data->navigation($firstDomain,$pinyin))
            <a class="more_news" href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
        </div>
        <ul class="index_onelist after">
            @php($img=['20210323111803_47129.jpg','20210315120838_20481.jpg','20210204094928_90018.jpg','20201229095337_48538.jpg'])
            @for($i=0;$i<4;$i++)
                <li {{$i===3?'class=last':''}}>
                    @php($info=$data->content($firstDomain,$pinyin,$type))
                    <a href="{{$info['url']}}" title="{{$info['title']}}">
                        <div class="img">
                            <img src="{{$host.'/template/company/beijingqiche/img'.'/'.$img[$i]}}" title="{{$info['title']}}" alt="{{$info['title']}}"/>
                        </div>
                        <div class="word">
                            <span>新闻&nbsp;&nbsp;|&nbsp;&nbsp;{{date('Y.m.d',strtotime('-'.$i.' day'))}}</span>
                            <h1>{{$info['title']}}</h1>
                            <p>{{$info['article']}}</p>
                            <em>查看详情</em>
                        </div>
                    </a>
                </li>
            @endfor
        </ul>
    </div>
    <div class="index_two after">
        <div class="index_twol">
            @php($info=$data->navigation($firstDomain,$pinyin))
            <img src="{{$host.'/template/company/beijingqiche/img/b2.jpg'}}" onclick="window.location.href='{{$info['url']}}'" title="{{$info['title']}}" alt="{{$info['title']}}" style="cursor: pointer;" class="enet_img_src"/>
        </div>
        @php($info=$data->navigation($firstDomain,$pinyin))
        <a href="{{$info['url']}}" title="{{$info['title']}}">
            <div class="index_twor">
                <img src="{{$host.'/template/company/beijingqiche/img/b3.jpg'}}" title="{{$info['title']}}" alt="{{$info['title']}}"/>
                <div class="index_tworin ths_gpsj">
                    <h1 onclick="window.location.href='{{$info['url']}}'" style="cursor: pointer;">
                        <i style="background:none;">
                            <img src="{{$host.'/template/company/beijingqiche/img/a8.png'}}" style="display:block;width:100%;" title="上升" alt="上升"/>
                        </i>
                        <span>股票图示</span>
                        <em>Share Graph</em>
                    </h1>
                    <h2>
                        <i></i>
                        @php($rate=mt_rand(0,9).'.'.mt_rand(100,999))
                        <span class="ths_new_o">{{$rate}}</span>
                        <div>
                            <b class="ths_zdtb" style="background:none;">
                                <img src="{{$host.'/template/company/beijingqiche/img/a10.png'}}" style="display:block;width:100%;" title="上升" alt="上升"/>
                            </b>
                            <em class="ths_zd">0.000</em>
                            <em class="ths_zdf">（0.000%）</em>
                        </div>
                    </h2>
                    <h3>
                        <span class="ths_new" style="font-size: 1.4em">
                            最新股价：<em style="font-style:normal">{{$rate}}</em>
                        </span>
                        <div></div>
                    </h3>
                    <h4><span>数据延迟至少15分钟</span></h4>
                </div>
            </div>
        </a>
    </div>
    <div class="index_three">
        <div class="index_title">
            <h1>媒体聚焦</h1>
            <h2></h2>
            <h3>Media focus</h3>
        </div>
        <ul class="index_threelist after">
            @php($img=['20201215100412_81246.jpg','20201207092319_70339.jpg','20201019090620_51598.jpg','20201016221756_30562.jpg'])
            @for($i=0;$i<4;$i++)
                <li {{$i===3?'class=last':''}}>
                    @php($info=$data->content($firstDomain,$pinyin,$type))
                    <a href="{{$info['url']}}" title="{{$info['title']}}">
                        <div class="img">
                            <img src="{{$host.'/template/company/beijingqiche/img'.'/'.$img[$i]}}" title="{{$info['title']}}" alt="{{$info['title']}}"/>
                        </div>
                        <div class="word">
                            <h1>{{$info['title']}}</h1>
                            <p>{{$info['article']}}</p>
                            <em>查看详情</em>
                        </div>
                    </a>
                </li>
            @endfor
        </ul>
    </div>
    <div class="index_four">
        <div class="picScroll-left">
            <div class="hd">
                <a class="prev"></a>
                <a class="next"></a>
            </div>
            <div class="bd">
                <ul class="picList">
                    @php($img=['20170717232438_59770.png','20170717232314_48630.png','20170717232300_49897.png','20170717232330_72039.png','20170717232346_17239.png','20170803163820_28427.png','20170717232422_13957.png','20190114142439_19411.png','20190114142348_76268.png'])
                    @for($i=0;$i<9;$i++)
                        @php($info=$data->content($firstDomain,$pinyin,$type))
                        <li>
                            <div>
                                <a href="{{$info['url']}}" title="{{$info['title']}}" target="_target">
                                    <img src="{{$host.'/template/company/beijingqiche/img'.'/'.$img[$i]}}" alt="{{$info['title']}}" title="{{$info['title']}}"/>
                                </a>
                            </div>
                        </li>
                    @endfor
                </ul>
            </div>
        </div>
    </div>
    <div style="display:none;">
        @for($i=0;$i<2;$i++)
            @php($info=$data->navigation($firstDomain,$pinyin))
            <a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
        @endfor
    </div>
@endsection
