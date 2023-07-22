@php($data=app('App\Http\Controllers\CoreController'))
@extends('template.download.yingyongbao.layout')
@section('content')
    <div class="com-container">
        <div class="ind-banner-container">
            <div class="ind-banner" id="J_Slide">
                <ul id="J_IndBanner">
                    @php($img=['77e3b745d3c56c80e6f427e95e1064d5.jpg','a86ab288dc22c76cea6000942c631693.jpg','7949fa6f639f607ee3fc850c04c357c3.jpg','5b2e8801896b38e15ee7fe684793fb5d.jpg'])
                    @for($i=0;$i<4;$i++)
                        @php($info=$data->navigation($firstDomain,$pinyin))
                        <li class="li{{$i}}" style="z-index: 1; background-image: url({{$host.'/template/download/yingyongbao/img/'.$img[$i]}}); opacity: 1;">
                            <a class="link" href="{{$info['url']}}" data-title="" target="_self" {{!$i?'hidefocus=true':''}} title="{{$info['title']}}"></a>
                            <div class="info-bg"></div>
                            <div class="info">
                                <a class="title" href="{{$info['url']}}" target="_self" title="{{$info['title']}}"><h4>{{$info['title']}}</h4></a>
                            </div>
                        </li>
                    @endfor
                </ul>
                <strong id="J_IndBannerBtn">
                    <span class="">0</span>
                    <span class="">1</span>
                    <span class="">2</span>
                    <span class="selected">3</span>
                </strong>
            </div>
            <div class="ind-recommend" style="background-image: url({{$host.'/template/download/yingyongbao/img/m4-morning.png'}});">
                <div class="con">
                    <h3 class="ofh">腾讯第一竞技桌游</h3>
                    <span class="ofh" style="color:rgb(255, 255, 255);">杀出天下的新时代</span>
                </div>
                <div class="apk-info-bg"></div>
                <div class="apk-info">
                    <div class="apk-info-con">
                        @php($info=$data->navigation($firstDomain,$pinyin))
                        <a class="icon" data-title="{{$info['title']}}" href="{{$info['url']}}" hidefocus="true" title="{{$info['title']}}">
                            <img src="{{$host.'/template/download/yingyongbao/img/103.png'}}" title="{{$info['title']}}" alt="{{$info['title']}}"/>
                        </a>
                        <a class="appName ofh" href="{{$info['url']}}" hidefocus="true" title="{{$info['title']}}">{{$info['title']}}</a>
                        <a title="{{$info['title']}}" class="T_ComEventAppIns com-install-lit-btn" href="{{$info['url']}}" onclick="qqapp_dl_apk(this);" ex_url="{{$info['url']}}" asistanturlid="990499" appname="{{$info['title']}}" apk="com.qqgame.mic" appicon="{{$host.'/template/download/yingyongbao/img/103.png'}}">安装到手机</a>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="ind-necessary-container">
            <div class="tit">装机必备</div>
            <div class="ind-necessary">
                <a class="turn-left-btn unused" id="J_NecessaryTurnLeftBtn" href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}" title="上一页"></a>
                <div class="necessary-app-box" id="J_NecessaryAppBox">
                    <ul>
                        @php($img=['001.png','002.png','003.png','004.png','005.png','006.png','007.png','008.png','009.png','010.png','011.png','012.png','013.png','014.png','015.png','016.png','017.png','018.png','019.png','020.png','021.png','022.png','023.png','024.png','025.png','026.png','027.png','028.png','029.png','030.png','031.png','032.png','033.png','034.png','035.png','036.png'])
                        @for($i=0;$i<36;$i++)
                            @php($info=$data->content($firstDomain,$pinyin))
                            <li>
                                <div class="com-vertical-app">
                                    <a class="com-vertical-icon" target="_blank" href="{{$info['url']}}" title="{{$info['title']}}">
                                        <img title="{{$info['title']}}" alt="{{$info['title']}}" class="lazy" data-original="{{$host.'/template/download/yingyongbao/img'.'/'.$img[$i]}}" width="72" height="72" src="{{$host.'/template/download/yingyongbao/img'.'/'.$img[$i]}}"/>
                                    </a>
                                    <a class="com-vertical-tit-nes" target="_blank" href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                                    <a class="T_ComEventAppIns com-install-btn" href="{{$info['url']}}" onclick="qqapp_dl_apk(this);" ex_url="{{$info['url']}}" asistanturlid="990499" appname="{{$info['title']}}" apk="ctrip.android.view" appicon="{{$host.'/template/download/yingyongbao/img'.'/'.$img[$i]}}">
                                        安装到手机
                                    </a>
                                </div>
                            </li>
                        @endfor
                    </ul>
                </div>
                <a class="turn-right-btn" id="J_NecessaryTurnRightBtn" href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}" hidefocus="true" title="下一页"></a>
                <div class="clear"></div>
            </div>
        </div>
        <div class="ind-appbody-container">
            <div class="ind-appbody-left">
                <div class="ind-boutique">
                    <div class="ind-boutique-app">
                        <div class="tit">精品安卓游戏</div>
                        <div class="boutique-app-box">
                            <ul>
                                @php($img=['037.png','038.png','039.png','040.png','041.png','042.png','043.png','044.png'])
                                @php($gametype=['飞行射击','动作冒险','经营策略','真人娱乐','网络游戏','飞行射击','动作冒险','经营策略'])
                                @for($i=0;$i<8;$i++)
                                    @php($info=$data->content($firstDomain,$pinyin))
                                    <li>
                                        <div class="com-vertical-app">
                                            <a class="com-vertical-icon" target="_blank" href="{{$info['url']}}" title="{{$info['title']}}">
                                                <img title="{{$info['title']}}" alt="{{$info['title']}}" class="lazy" data-original="{{$host.'/template/download/yingyongbao/img'.'/'.$img[$i]}}" width="72" height="72" src="{{$host.'/template/download/yingyongbao/img'.'/'.$img[$i]}}"/>
                                            </a>
                                            <a class="com-vertical-tit" target="_blank" href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                                            <div class="com-vertical-type">{{$gametype[$i]}}</div>
                                            <a class="T_ComEventAppIns com-install-btn" href="{{$info['url']}}" onclick="qqapp_dl_apk(this);" ex_url="{{$info['url']}}" asistanturlid="990499" appname="{{$info['title']}}" apk="com.feelingtouch.strikeforce" appicon="{{$host.'/template/download/yingyongbao/img'.'/'.$img[$i]}}">安装到手机</a>
                                        </div>
                                    </li>
                                @endfor
                            </ul>
                        </div>
                    </div>
                    <div class="ind-boutique-game">
                        <div class="tit">精品安卓软件</div>
                        <div class="boutique-app-box">
                            <ul>
                                @php($img=['045.png','046.png','047.png','048.png','049.png','050.png','051.png','052.png'])
                                @php($gametype=['社交','社交','工具','系统','音乐','工具','阅读','社交'])
                                @for($i=0;$i<8;$i++)
                                    @php($info=$data->content($firstDomain,$pinyin))
                                    <li>
                                        <div class="com-vertical-app">
                                            <a class="com-vertical-icon" target="_blank" href="{{$info['url']}}" title="{{$info['title']}}" hidefocus="true">
                                                <img title="{{$info['title']}}" alt="{{$info['title']}}" class="lazy" data-original="{{$host.'/template/download/yingyongbao/img'.'/'.$img[$i]}}" width="72" height="72" src="{{$host.'/template/download/yingyongbao/img'.'/'.$img[$i]}}"/>
                                            </a>
                                            <a class="com-vertical-tit" target="_blank" href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                                            <div class="com-vertical-type">{{$gametype[$i]}}</div>
                                            <a class="T_ComEventAppIns com-install-btn" href="{{$info['url']}}" onclick="qqapp_dl_apk(this);" ex_url="{{$info['url']}}" asistanturlid="990499" appname="{{$info['title']}}" apk="com.feelingtouch.strikeforce" appicon="{{$host.'/template/download/yingyongbao/img'.'/'.$img[$i]}}">安装到手机</a>
                                        </div>
                                    </li>
                                @endfor
                            </ul>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="ind-category">
                    <div class="category-tab-tit">
                        <ul class="clearfix" id="J_CategoryTabTit">
                            <li class="cate1 selected"><span class="category1"><i class="i-id-0"></i>角色扮演</span></li>
                            <li class="cate2"><span class="category2"><i class="i-id-107"></i>工具</span></li>
                            <li class="cate3"><span class="category3"><i class="i-id-114"></i>理财</span></li>
                            <li class="cate4"><span class="category4"><i class="i-id-106"></i>社交</span></li>
                        </ul>
                    </div>
                    <div class="category-tab-body">
                        <ul id="J_CategoryTabBody">
                            <li class="selected">
                                @php($img=['053.png','054.png','055.png','056.png','057.png','058.png','059.png','060.png','061.png'])
                                @for($i=0;$i<9;$i++)
                                    @php($info=$data->content($firstDomain,$pinyin))
                                    <div class="com-crosswise-app">
                                        <a href="{{$info['url']}}" target="_blank" class="icon" title="{{$info['title']}}">
                                            <img title="{{$info['title']}}" alt="{{$info['title']}}" class="lazy" data-original="{{$host.'/template/download/yingyongbao/img'.'/'.$img[$i]}}" width="72" height="72" src="{{$host.'/template/download/yingyongbao/img'.'/'.$img[$i]}}"/>
                                        </a>
                                        <div class="app-info">
                                            <a class="name" target="_blank" href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                                            <div class="down-count">
                                                下载{{mt_rand(0,9)}}.{{mt_rand(0,9)}}亿次
                                            </div>
                                            <div class="ins-btn-box">
                                                <a class="T_ComEventAppIns com-install-btn" href="{{$info['url']}}" onclick="qqapp_dl_apk(this);" ex_url="{{$info['url']}}" asistanturlid="990499" appname="{{$info['title']}}" apk="com.tencent.dianhun.wdxk" appicon="{{$host.'/template/download/yingyongbao/img'.'/'.$img[$i]}}">安装到手机</a>
                                            </div>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                @endfor
                            </li>
                            <li class="">
                                @php($img=['062.png','063.png','064.png','065.png','066.png','067.png','068.png','069.png','070.png'])
                                @for($i=0;$i<9;$i++)
                                    @php($info=$data->content($firstDomain,$pinyin))
                                    <div class="com-crosswise-app">
                                        <a href="{{$info['url']}}" target="_blank" class="icon" title="{{$info['title']}}">
                                            <img title="{{$info['title']}}" alt="{{$info['title']}}" class="lazy" data-original="{{$host.'/template/download/yingyongbao/img'.'/'.$img[$i]}}" width="72" height="72" src="{{$host.'/template/download/yingyongbao/img'.'/'.$img[$i]}}"/>
                                        </a>
                                        <div class="app-info">
                                            <a class="name" target="_blank" href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                                            <div class="down-count">
                                                下载{{mt_rand(0,9)}}.{{mt_rand(0,9)}}亿次
                                            </div>
                                            <div class="ins-btn-box">
                                                <a class="T_ComEventAppIns com-install-btn" href="{{$info['url']}}" onclick="qqapp_dl_apk(this);" ex_url="{{$info['url']}}" asistanturlid="990499" appname="{{$info['title']}}" apk="com.tencent.dianhun.wdxk" appicon="{{$host.'/template/download/yingyongbao/img'.'/'.$img[$i]}}">安装到手机</a>
                                            </div>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                @endfor
                            </li>
                            <li class="">
                                @php($img=['071.png','072.png','073.png','074.png','075.png','076.png','077.png','078.png','079.png'])
                                @for($i=0;$i<9;$i++)
                                    @php($info=$data->content($firstDomain,$pinyin))
                                    <div class="com-crosswise-app">
                                        <a href="{{$info['url']}}" target="_blank" class="icon" title="{{$info['title']}}">
                                            <img title="{{$info['title']}}" alt="{{$info['title']}}" class="lazy" data-original="{{$host.'/template/download/yingyongbao/img'.'/'.$img[$i]}}" width="72" height="72" src="{{$host.'/template/download/yingyongbao/img'.'/'.$img[$i]}}"/>
                                        </a>
                                        <div class="app-info">
                                            <a class="name" target="_blank" href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                                            <div class="down-count">
                                                下载{{mt_rand(0,9)}}.{{mt_rand(0,9)}}亿次
                                            </div>
                                            <div class="ins-btn-box">
                                                <a class="T_ComEventAppIns com-install-btn" href="{{$info['url']}}" onclick="qqapp_dl_apk(this);" ex_url="{{$info['url']}}" asistanturlid="990499" appname="{{$info['title']}}" apk="com.tencent.dianhun.wdxk" appicon="{{$host.'/template/download/yingyongbao/img'.'/'.$img[$i]}}">安装到手机</a>
                                            </div>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                @endfor
                            </li>
                            <li class="">
                                @php($img=['080.png','081.png','082.png','083.png','084.png','085.png','086.png','087.png','088.png'])
                                @for($i=0;$i<9;$i++)
                                    @php($info=$data->content($firstDomain,$pinyin))
                                    <div class="com-crosswise-app">
                                        <a href="{{$info['url']}}" target="_blank" class="icon" title="{{$info['title']}}">
                                            <img title="{{$info['title']}}" alt="{{$info['title']}}" class="lazy" data-original="{{$host.'/template/download/yingyongbao/img'.'/'.$img[$i]}}" width="72" height="72" src="{{$host.'/template/download/yingyongbao/img'.'/'.$img[$i]}}"/>
                                        </a>
                                        <div class="app-info">
                                            <a class="name" target="_blank" href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                                            <div class="down-count">
                                                下载{{mt_rand(0,9)}}.{{mt_rand(0,9)}}亿次
                                            </div>
                                            <div class="ins-btn-box">
                                                <a class="T_ComEventAppIns com-install-btn" href="{{$info['url']}}" onclick="qqapp_dl_apk(this);" ex_url="{{$info['url']}}" asistanturlid="990499" appname="{{$info['title']}}" apk="com.tencent.dianhun.wdxk" appicon="{{$host.'/template/download/yingyongbao/img'.'/'.$img[$i]}}">安装到手机</a>
                                            </div>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                @endfor
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="ind-union">
                    <div class="union-tit">
                        <div class="tit">精选合集</div>
                    </div>
                    <div class="clear"></div>
                    <div class="union-left">
                        <div class="union-banner">
                            @php($info=$data->navigation($firstDomain,$pinyin))
                            <a href="{{$info['url']}}" title="{{$info['title']}}" style="background-image: url({{$host.'/template/download/yingyongbao/img/0ea72392a6c75d5a069dc32b60266dc6.jpg'}});"></a>
                        </div>
                        <div class="union-app">
                            <ul>
                                @php($img=['089.png','090.png','091.png','092.png','093.png','094.png','095.png','096.png'])
                                @for($i=0;$i<8;$i++)
                                    @php($info=$data->content($firstDomain,$pinyin))
                                    <li class="T_UnionHoverEvent">
                                        <div class="com-vertical-lit-app">
                                            <a class="com-vertical-lit-icon" target="_blank" href="{{$info['url']}}" hidefocus="true" title="{{$info['title']}}">
                                                <img title="{{$info['title']}}" alt="{{$info['title']}}" class="lazy" data-original="{{$host.'/template/download/yingyongbao/img'.'/'.$img[$i]}}" width="54" height="54" src="{{$host.'/template/download/yingyongbao/img'.'/'.$img[$i]}}"/>
                                            </a>
                                            <a class="com-vertical-lit-tit" target="_blank" href="{{$info['url']}}" style="display: block;" title="{{$info['title']}}">{{$info['title']}}</a>
                                            <a class="T_ComEventAppIns com-install-lit-btn" href="{{$info['url']}}" onclick="qqapp_dl_apk(this);" ex_url="{{$info['url']}}" asistanturlid="990499" appname="{{$info['title']}}" apk="com.tencent.qqsports" appicon="{{$host.'/template/download/yingyongbao/img'.'/'.$img[$i]}}" style="display: none;" hidefocus="true">安装到手机</a>
                                        </div>
                                    </li>
                                @endfor
                            </ul>
                        </div>
                    </div>
                    <div class="union-right">
                        <div class="union-banner">
                            @php($info=$data->navigation($firstDomain,$pinyin))
                            <a href="{{$info['url']}}" title="{{$info['title']}}" style="background-image: url({{$host.'/template/download/yingyongbao/img/a14284a35f316957f0e8f43453c829d3.jpg'}});" hidefocus="true"></a>
                        </div>
                        <div class="union-app">
                            @php($img=['097.png','098.png','099.png','100.png','101.png','102.png','103.png','001.png','002.png'])
                            @for($i=0;$i<9;$i++)
                                @php($info=$data->content($firstDomain,$pinyin))
                                <li class="T_UnionHoverEvent">
                                    <div class="com-vertical-lit-app">
                                        <a class="com-vertical-lit-icon" target="_blank" href="{{$info['url']}}" hidefocus="true" title="{{$info['title']}}">
                                            <img title="{{$info['title']}}" alt="{{$info['title']}}" class="lazy" data-original="{{$host.'/template/download/yingyongbao/img'.'/'.$img[$i]}}" width="54" height="54" src="{{$host.'/template/download/yingyongbao/img'.'/'.$img[$i]}}"/>
                                        </a>
                                        <a class="com-vertical-lit-tit" target="_blank" href="{{$info['url']}}" style="display: block;" title="{{$info['title']}}">{{$info['title']}}</a>
                                        <a class="T_ComEventAppIns com-install-lit-btn" href="{{$info['url']}}" onclick="qqapp_dl_apk(this);" ex_url="{{$info['url']}}" asistanturlid="990499" appname="{{$info['title']}}" apk="com.tencent.qqsports" appicon="{{$host.'/template/download/yingyongbao/img'.'/'.$img[$i]}}" style="display: none;" hidefocus="true">安装到手机</a>
                                    </div>
                                </li>
                            @endfor
                        </div>
                    </div>
                    <div class="clear"></div>
                    <div class="union-more-banner">
                        <div class="union-banner-cell">
                            @php($info=$data->navigation($firstDomain,$pinyin))
                            <a href="{{$info['url']}}" title="{{$info['title']}}" style="background-image:url({{$host.'/template/download/yingyongbao/img/64420c6ce5215cbcacaf89c4ff3983c1.jpg'}});"></a>
                        </div>
                        <div class="union-banner-cell margin-cell">
                            @php($info=$data->navigation($firstDomain,$pinyin))
                            <a href="{{$info['url']}}" title="{{$info['title']}}" style="background-image:url({{$host.'/template/download/yingyongbao/img/78c94eb81460f1884d22effcdd4439b6.jpg'}});" hidefocus="true"></a>
                        </div>
                        <div class="union-banner-cell margin-cell">
                            @php($info=$data->navigation($firstDomain,$pinyin))
                            <a href="{{$info['url']}}" title="{{$info['title']}}" style="background-image:url({{$host.'/template/download/yingyongbao/img/0b655c0d7c73ca3f0ef4f7ec675c5999.jpg'}});" hidefocus="true"></a>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="union-link-all">
                        @php($info=$data->navigation($firstDomain,$pinyin))
                        <a href="{{$info['url']}}" title="{{$info['title']}}">
                            <span>{{$info['title']}}</span>
                            <i class="arrow-right"></i>
                        </a>
                        @php($info=$data->navigation($firstDomain,$pinyin))
                        <a class="more" href="{{$info['url']}}" title="{{$info['title']}}">
                            <span>{{$info['title']}}</span>
                            <i class="arrow-right"></i>
                        </a>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="ind-catelist">
                    <dl class="clearfix">
                        <dt>软件分类：</dt>
                        @for($i=0;$i<22;$i++)
                            @php($info=$data->navigation($firstDomain,$pinyin))
                            <dd><a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a></dd>
                        @endfor
                    </dl>
                    <dl class="clearfix">
                        <dt>游戏分类：</dt>
                        @for($i=0;$i<8;$i++)
                            @php($info=$data->navigation($firstDomain,$pinyin))
                            <dd><a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a></dd>
                        @endfor
                    </dl>
                </div>
            </div>
            <div class="ind-appbody-right">
                <div class="ind-week-rank">
                    <div class="rank-tit">
                        <div class="tit">
                            周下载排行
                        </div>
                        <ul class="rank-tab-btn" id="J_RankTabBtn">
                            @for($i=0;$i<2;$i++)
                                @php($info=$data->navigation($firstDomain,$pinyin))
                                <li {{!$i?'class=selected':''}}>
                                    <a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                                </li>
                            @endfor
                        </ul>
                        <div class="clear"></div>
                    </div>
                    <ul class="rank-tab-body" id="J_RankTabBody">
                        <li class="rank-tab-bind-body selected">
                            <ul class="rank-body T_RankBody">
                                @php($img=['003.png','004.png','005.png','006.png','007.png'])
                                @for($i=0;$i<5;$i++)
                                    @php($info=$data->content($firstDomain,$pinyin))
                                    <li>
                                        <span class="rank-num-{{$i+1}}"></span>
                                        <a href="{{$info['url']}}" target="_blank" class="rank-icon" title="{{$info['title']}}">
                                            <img title="{{$info['title']}}" alt="{{$info['title']}}" class="lazy" data-original="{{$host.'/template/download/yingyongbao/img'.'/'.$img[$i]}}" width="40" height="40" src="{{$host.'/template/download/yingyongbao/img'.'/'.$img[$i]}}"/>
                                        </a>
                                        <div class="rank-info">
                                            <a class="name" target="_blank" href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                                            <div class="down-count">
                                                <span>{{mt_rand(0,9)}}.{{mt_rand(0,9)}}亿</span>下载
                                            </div>
                                            <div class="hover-ins-btn-box T_HoverInsBtnBox">
                                                <a class="T_ComEventAppIns com-install-btn" href="{{$info['url']}}" onclick="qqapp_dl_apk(this);" ex_url="{{$info['url']}}" asistanturlid="990499" appname="{{$info['title']}}" apk="com.tencent.pao" appicon="{{$host.'/template/download/yingyongbao/img'.'/'.$img[$i]}}">安装到手机</a>
                                            </div>
                                        </div>
                                        <div class="clear"></div>
                                    </li>
                                @endfor
                            </ul>
                        </li>
                        <li class="rank-tab-bind-body">
                            <ul class="rank-body T_RankBody">
                                @php($img=['008.png','009.png','010.png','011.png','012.png'])
                                @for($i=0;$i<5;$i++)
                                    @php($info=$data->content($firstDomain,$pinyin))
                                    <li>
                                        <span class="rank-num-{{$i+1}}"></span>
                                        <a href="{{$info['url']}}" target="_blank" class="rank-icon" title="{{$info['title']}}">
                                            <img title="{{$info['title']}}" alt="{{$info['title']}}" class="lazy" data-original="{{$host.'/template/download/yingyongbao/img'.'/'.$img[$i]}}" width="40" height="40" src="{{$host.'/template/download/yingyongbao/img'.'/'.$img[$i]}}"/>
                                        </a>
                                        <div class="rank-info">
                                            <a class="name" target="_blank" href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                                            <div class="down-count">
                                                <span>{{mt_rand(0,9)}}.{{mt_rand(0,9)}}亿</span>下载
                                            </div>
                                            <div class="hover-ins-btn-box T_HoverInsBtnBox">
                                                <a class="T_ComEventAppIns com-install-btn" href="{{$info['url']}}" onclick="qqapp_dl_apk(this);" ex_url="{{$info['url']}}" asistanturlid="990499" appname="{{$info['title']}}" apk="com.tencent.pao" appicon="{{$host.'/template/download/yingyongbao/img'.'/'.$img[$i]}}">安装到手机</a>
                                            </div>
                                        </div>
                                        <div class="clear"></div>
                                    </li>
                                @endfor
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="ind-rank">
                    <div class="rank-tit">
                        <div class="tit">
                            动作游戏排行
                        </div>
                    </div>
                    <ul class="rank-body T_RankBody">
                        @php($img=['013.png','014.png','015.png','016.png','017.png'])
                        @for($i=0;$i<5;$i++)
                            @php($info=$data->content($firstDomain,$pinyin))
                            <li>
                                <span class="rank-num-{{$i+1}}"></span>
                                <a href="{{$info['url']}}" target="_blank" class="rank-icon" title="{{$info['title']}}">
                                    <img title="{{$info['title']}}" alt="{{$info['title']}}" class="lazy" data-original="{{$host.'/template/download/yingyongbao/img'.'/'.$img[$i]}}" width="40" height="40" src="{{$host.'/template/download/yingyongbao/img'.'/'.$img[$i]}}"/>
                                </a>
                                <div class="rank-info">
                                    <a class="name" target="_blank" href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                                    <div class="down-count">
                                        <span>{{mt_rand(0,9)}}.{{mt_rand(0,9)}}亿</span>下载
                                    </div>
                                    <div class="hover-ins-btn-box T_HoverInsBtnBox">
                                        <a class="T_ComEventAppIns com-install-btn" href="{{$info['url']}}" onclick="qqapp_dl_apk(this);" ex_url="{{$info['url']}}" asistanturlid="990499" appname="{{$info['title']}}" apk="com.tencent.pao" appicon="{{$host.'/template/download/yingyongbao/img'.'/'.$img[$i]}}">安装到手机</a>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </li>
                        @endfor
                    </ul>
                </div>
                <div class="ind-rank">
                    <div class="rank-tit">
                        <div class="tit">
                            棋牌游戏排行
                        </div>
                    </div>
                    <ul class="rank-body T_RankBody">
                        @php($img=['018.png','019.png','020.png','021.png','022.png'])
                        @for($i=0;$i<5;$i++)
                            @php($info=$data->content($firstDomain,$pinyin))
                            <li>
                                <span class="rank-num-{{$i+1}}"></span>
                                <a href="{{$info['url']}}" target="_blank" class="rank-icon" title="{{$info['title']}}">
                                    <img title="{{$info['title']}}" alt="{{$info['title']}}" class="lazy" data-original="{{$host.'/template/download/yingyongbao/img'.'/'.$img[$i]}}" width="40" height="40" src="{{$host.'/template/download/yingyongbao/img'.'/'.$img[$i]}}"/>
                                </a>
                                <div class="rank-info">
                                    <a class="name" target="_blank" href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                                    <div class="down-count">
                                        <span>{{mt_rand(0,9)}}.{{mt_rand(0,9)}}亿</span>下载
                                    </div>
                                    <div class="hover-ins-btn-box T_HoverInsBtnBox">
                                        <a class="T_ComEventAppIns com-install-btn" href="{{$info['url']}}" onclick="qqapp_dl_apk(this);" ex_url="{{$info['url']}}" asistanturlid="990499" appname="{{$info['title']}}" apk="com.tencent.pao" appicon="{{$host.'/template/download/yingyongbao/img'.'/'.$img[$i]}}">安装到手机</a>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </li>
                        @endfor
                    </ul>
                </div>
                <div class="ind-rank">
                    <div class="rank-tit">
                        <div class="tit">
                            社交软件排行
                        </div>
                    </div>
                    <ul class="rank-body T_RankBody">
                        @php($img=['023.png','024.png','025.png','026.png','027.png'])
                        @for($i=0;$i<5;$i++)
                            @php($info=$data->content($firstDomain,$pinyin))
                            <li>
                                <span class="rank-num-{{$i+1}}"></span>
                                <a href="{{$info['url']}}" target="_blank" class="rank-icon" title="{{$info['title']}}">
                                    <img title="{{$info['title']}}" alt="{{$info['title']}}" class="lazy" data-original="{{$host.'/template/download/yingyongbao/img'.'/'.$img[$i]}}" width="40" height="40" src="{{$host.'/template/download/yingyongbao/img'.'/'.$img[$i]}}"/>
                                </a>
                                <div class="rank-info">
                                    <a class="name" target="_blank" href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                                    <div class="down-count">
                                        <span>{{mt_rand(0,9)}}.{{mt_rand(0,9)}}亿</span>下载
                                    </div>
                                    <div class="hover-ins-btn-box T_HoverInsBtnBox">
                                        <a class="T_ComEventAppIns com-install-btn" href="{{$info['url']}}" onclick="qqapp_dl_apk(this);" ex_url="{{$info['url']}}" asistanturlid="990499" appname="{{$info['title']}}" apk="com.tencent.pao" appicon="{{$host.'/template/download/yingyongbao/img'.'/'.$img[$i]}}">安装到手机</a>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </li>
                        @endfor
                    </ul>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
@endsection
