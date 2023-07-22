@php($data=app('App\Http\Controllers\CoreController'))
@extends('template.download.tiankong.layout')
@section('content')
    <div class="lay-790 fr">
        <div class="s-row clearfix">
            <div class="idx-focus" id="j_idx_focus" monkey="idxfocus">
                <div class="idx-foc-tmp">
                    <ul class="focus-pic" rel="xtaberItems">
                        @php($img=['201907101352075d257d0754560.jpg','s_560_230_201812121807335c10dde52c2d6.jpg','s_560_230_201812132043395c1253fbaa5ec.jpg','201801171804475a5f1fbf56c1a.jpg','6c7db277919c65209501f45e850605c1.jpg','aee7d08364407aabfd56eedf577b6be0.jpg'])
                        @for($i=0;$i<6;$i++)
                            @php($info=$data->navigation($firstDomain,$pinyin))
                            <li class="xtaber-item">
                                <a href="{{$info['url']}}" class="white" target="_blank" title="{{$info['title']}}">
                                    <img src="{{$host.'/template/download/tiankong/img/'.$img[$i]}}" alt="{{$info['title']}}" title="{{$info['title']}}"/>
                                    <span class="txt">{{$info['title']}}</span>
                                    <i class="bg"></i>
                                </a>
                            </li>
                        @endfor
                    </ul>
                </div>
                <ul rel="xtaberTabs" class="xtaber-tabs">
                    <li rel="xtaberTabItem" class="current"><a href="javascript:void(0);" title="街机欢乐捕鱼"><img src="{{$host.'/template/download/tiankong/img/201907101352075d257d0754560.jpg'}}" alt="街机欢乐捕鱼" title="街机欢乐捕鱼"/></a><i></i></li>
                    <li rel="xtaberTabItem" ><a href="javascript:void(0);" title="翻翻乐"><img src="{{$host.'/template/download/tiankong/img/s_560_230_201812121807335c10dde52c2d6.jpg'}}" alt="翻翻乐" title="翻翻乐"/></a><i></i></li>
                    <li rel="xtaberTabItem" ><a href="javascript:void(0);" title="爱豆show"><img src="{{$host.'/template/download/tiankong/img/s_560_230_201812132043395c1253fbaa5ec.jpg'}}" alt="爱豆show" title="爱豆show"/></a><i></i></li>
                    <li rel="xtaberTabItem" ><a href="javascript:void(0);" title="百度浏览器hao123专版"><img src="{{$host.'/template/download/tiankong/img/201801171804475a5f1fbf56c1a.jpg'}}" alt="百度浏览器hao123专版" title="百度浏览器hao123专版"/></a><i></i></li>
                    <li rel="xtaberTabItem" ><a href="javascript:void(0);" title="字体管家"><img src="{{$host.'/template/download/tiankong/img/6c7db277919c65209501f45e850605c1.jpg'}}" alt="字体管家" title="字体管家"/></a><i></i></li>
                    <li rel="xtaberTabItem" ><a href="javascript:void(0);" title="chrome浏览器"><img src="{{$host.'/template/download/tiankong/img/aee7d08364407aabfd56eedf577b6be0.jpg'}}" alt="chrome浏览器" title="chrome浏览器"/></a><i></i></li>
                </ul>
                <a href="javascript:;" class="btn-prev"></a>
                <a href="javascript:;" class="btn-next"></a>
            </div>
            <div class="idx-rec" monkey="todayrec">
                <div class="rec-soft-new">
                    <div class="rec-soft-h"><h5>精选推荐</h5></div>
                    <ul>
                        @php($img=['201712231314085a3de6205f108.jpg','201812121755185c10db061dcc1.jpg'])
                        @for($i=0;$i<2;$i++)
                            @php($info=$data->navigation($firstDomain,$pinyin))
                            <li>
                                <a class="rec-soft-img" href="{{$info['url']}}" target="_blank"  title="{{$info['title']}}">
                                    <img src="{{$host.'/template/download/tiankong/img/'.$img[$i]}}" alt="{{$info['title']}}" title="{{$info['title']}}"/>
                                </a>
                            </li>
                        @endfor
                    </ul>
                </div>
            </div>
        </div>
        <div class="s-row clearfix mt10">
            <div class="rec-soft-box j-tab-comm" monkey="installapps">
                <div class="main-mark">
                    <ul class="tab-style-1 clearfix" rel="xtaberTabs" id="j_bag_tab">
                        <li rel="xtaberTabItem" class="current" catid="1">装机必备<i></i></li>
                        <li rel="xtaberTabItem" catid="2">安卓必备<i></i></li>
                        <li rel="xtaberTabItem" catid="3">IOS必备<i></i></li>
                    </ul>
                    <p class="mark-ext">
                        <span class="txt">可选择多款软件一键</span>
                        @php($info=$data->navigation($firstDomain,$pinyin))
                        <a href="{{$info['url']}}" class="btn btn-bag" id="j_btn_bag">{{$info['title']}}</a>
                        <a href="#" style="display:none;" class="btn btn-ok" id="j_btn_ok">确定</a>
                        <a href="#" style="display:none;" class="btn btn-no" id="j_btn_no">取消</a>
                    </p>
                </div>
                <div class="rec-con-box" rel="xtaberItems" id="j_bag_con">
                    <ul class="soft-list xtaber-item j-hover-1" rel="1">
                        @for($i=0;$i<24;$i++)
                            @php($info=$data->content($firstDomain,$pinyin))
                            <li>
                                <a href="{{$info['url']}}" class="pic" target="_blank" title="{{$info['title']}}">
                                    <img src="{{$host.'/template/download/tiankong/img'.'/'.($i+1).'.png'}}" alt="{{$info['title']}}" title="{{$info['title']}}"/>
                                    <i class="ico ico-selected"></i>
                                </a>
                                <a href="{{$info['url']}}" class="name">{{$info['title']}}</a>
                                <a href="{{$info['url']}}" target="_blank" class="btn-soft-dl" title="{{$info['title']}}" monkey="downsoft">下载</a>
                            </li>
                        @endfor
                    </ul>
                </div>
            </div>
            <div class="soft-top-box j-tab-comm" monkey="downtop">
                <div class="sub-mark">
                    <span class="mark h4 imp">下载排行</span>
                    <ul rel="xtaberTabs" class="tab-style-2 clearfix">
                        <li rel="xtaberTabItem" class="current">电脑</li>
                        <li rel="xtaberTabItem">安卓</li>
                        <li rel="xtaberTabItem">IOS</li>
                    </ul>
                </div>
                <div class="soft-top-wrap" rel="xtaberItems">
                    <ul class="soft-top-list xtaber-item">
                        @for($i=0;$i<3;$i++)
                            @php($info=$data->content($firstDomain,$pinyin))
                            <li class="mix">
                                <i class="num num-{{$i+1}}"></i>
                                <div class="top-pic">
                                    <a href="{{$info['url']}}" target="_blank">
                                        <img src="{{$host.'/template/download/tiankong/img'.'/'.($i+25).'.png'}}" width="40" alt="{{$info['title']}}" title="{{$info['title']}}"/>
                                    </a>
                                </div>
                                <div class="top-txt">
                                    <a href="{{$info['url']}}" class="name" target="_blank">{{$info['title']}}</a>
                                    <span class="star-range"><i class="in" style="width:{{mt_rand(0,100)}}%;"></i></span>
                                </div>
                                <a href="{{$info['url']}}" target="_blank" class="btn-soft-dl" title="{{$info['title']}}" monkey="downsoft">下载</a>
                            </li>
                        @endfor
                        @for($i=0;$i<9;$i++)
                            @php($info=$data->content($firstDomain,$pinyin))
                            <li class="single">
                                <i class="num num-{{$i+4}}"></i>
                                <a href="{{$info['url']}}" class="s-name" target="_blank" title="{{$info['title']}}">{{$info['title']}}</a>
                                <span class="star-range"><i class="in" style="width:{{mt_rand(0,100)}}%;"></i></span>
                            </li>
                        @endfor
                    </ul>
                </div>
            </div>
        </div>
        <div class="new-rec-box mt10 j-tab-comm" monkey="newapps">
            <div class="sub-mark">
                <span class="mark h4 imp">最新推荐软件</span>
                <ul class="tab-style-2 clearfix" rel="xtaberTabs">
                    <li rel="xtaberTabItem" class="current">电脑软件</li>
                    <li rel="xtaberTabItem">安卓软件</li>
                    <li rel="xtaberTabItem">IOS软件</li>
                </ul>
                <p class="mark-ext">
                    @php($info=$data->navigation($firstDomain,$pinyin))
                    <a href="{{$info['url']}}" target="_blank" class="ext fst" title="{{$info['title']}}">{{$info['title']}}</a>
                </p>
            </div>
            <div class="new-rec-soft" rel="xtaberItems">
                <ul class="soft-list xtaber-item clearfix">
                    @for($i=0;$i<18;$i++)
                        @php($info=$data->content($firstDomain,$pinyin))
                        <li>
                            <a href="{{$info['url']}}" class="pic" target="_blank" title="{{$info['title']}}">
                                <img src="{{$host.'/template/download/tiankong/img'.'/'.($i+28).'.png'}}" alt="{{$info['title']}}" title="{{$info['title']}}"/>
                            </a>
                            <a href="{{$info['url']}}" class="name">{{$info['title']}}</a>
                        </li>
                    @endfor
                </ul>
            </div>
        </div>

        <div class="used-box mt10 j-tab-comm" monkey="activeapps">
            <div class="main-mark">
                <span class="mark h4">常用推荐</span>
                <ul class="tab-style-2 clearfix" rel="xtaberTabs">
                    <li rel="xtaberTabItem" class="current">电脑软件</li>
                    <li rel="xtaberTabItem">安卓软件</li>
                    <li rel="xtaberTabItem">IOS软件</li>
                </ul>
                <p class="mark-ext">
                    @php($info=$data->navigation($firstDomain,$pinyin))
                    <a href="{{$info['url']}}" target="_blank" class="white fst" title="{{$info['title']}}">{{$info['title']}}</a>
                </p>
            </div>
            <div class="used-soft" rel="xtaberItems">
                <div class="used-items xtaber-item">
                    <div class="used-item">
                        <div class="used-name">视频软件</div>
                        <ul class="soft-list clearfix">
                            @for($i=0;$i<4;$i++)
                                @php($info=$data->content($firstDomain,$pinyin))
                                <li>
                                    <a href="{{$info['url']}}" class="pic" target="_blank" title="{{$info['title']}}">
                                        <img src="{{$host.'/template/download/tiankong/img'.'/'.($i+46).'.png'}}" alt="{{$info['title']}}" title="{{$info['title']}}" width="48" height="48"/>
                                    </a>
                                    <a href="{{$info['url']}}" class="name">{{$info['title']}}</a>
                                </li>
                            @endfor
                        </ul>
                    </div>
                    <div class="used-item">
                        <div class="used-name">聊天工具</div>
                        <ul class="soft-list clearfix">
                            @for($i=0;$i<4;$i++)
                                @php($info=$data->content($firstDomain,$pinyin))
                                <li>
                                    <a href="{{$info['url']}}" class="pic" target="_blank" title="{{$info['title']}}">
                                        <img src="{{$host.'/template/download/tiankong/img'.'/'.($i+50).'.png'}}" alt="{{$info['title']}}" title="{{$info['title']}}" width="48" height="48"/>
                                    </a>
                                    <a href="{{$info['url']}}" class="name">{{$info['title']}}</a>
                                </li>
                            @endfor
                        </ul>
                    </div>
                    <div class="used-item">
                        <div class="used-name">浏览器</div>
                        <ul class="soft-list clearfix">
                            @for($i=0;$i<4;$i++)
                                @php($info=$data->content($firstDomain,$pinyin))
                                <li>
                                    <a href="{{$info['url']}}" class="pic" target="_blank" title="{{$info['title']}}">
                                        <img src="{{$host.'/template/download/tiankong/img'.'/'.($i+54).'.png'}}" alt="{{$info['title']}}" title="{{$info['title']}}" width="48" height="48"/>
                                    </a>
                                    <a href="{{$info['url']}}" class="name">{{$info['title']}}</a>
                                </li>
                            @endfor
                        </ul>
                    </div>
                    <div class="used-item">
                        <div class="used-name">输入法</div>
                        <ul class="soft-list clearfix">
                            @for($i=0;$i<4;$i++)
                                @php($info=$data->content($firstDomain,$pinyin))
                                <li>
                                    <a href="{{$info['url']}}" class="pic" target="_blank" title="{{$info['title']}}">
                                        <img src="{{$host.'/template/download/tiankong/img'.'/'.($i+58).'.png'}}" alt="{{$info['title']}}" title="{{$info['title']}}" width="48" height="48"/>
                                    </a>
                                    <a href="{{$info['url']}}" class="name">{{$info['title']}}</a>
                                </li>
                            @endfor
                        </ul>
                    </div>
                    <div class="used-item">
                        <div class="used-name">手机数码</div>
                        <ul class="soft-list clearfix">
                            @for($i=0;$i<4;$i++)
                                @php($info=$data->content($firstDomain,$pinyin))
                                <li>
                                    <a href="{{$info['url']}}" class="pic" target="_blank" title="{{$info['title']}}">
                                        <img src="{{$host.'/template/download/tiankong/img'.'/'.($i+62).'.png'}}" alt="{{$info['title']}}" title="{{$info['title']}}" width="48" height="48"/>
                                    </a>
                                    <a href="{{$info['url']}}" class="name">{{$info['title']}}</a>
                                </li>
                            @endfor
                        </ul>
                    </div>
                    <div class="used-item">
                        <div class="used-name">音乐软件</div>
                        <ul class="soft-list clearfix">
                            @for($i=0;$i<4;$i++)
                                @php($info=$data->content($firstDomain,$pinyin))
                                <li>
                                    <a href="{{$info['url']}}" class="pic" target="_blank" title="{{$info['title']}}">
                                        <img src="{{$host.'/template/download/tiankong/img'.'/'.($i+66).'.png'}}" alt="{{$info['title']}}" title="{{$info['title']}}" width="48" height="48"/>
                                    </a>
                                    <a href="{{$info['url']}}" class="name">{{$info['title']}}</a>
                                </li>
                            @endfor
                        </ul>
                    </div>
                    <div class="used-item">
                        <div class="used-name">安全杀毒</div>
                        <ul class="soft-list clearfix">
                            @for($i=0;$i<4;$i++)
                                @php($info=$data->content($firstDomain,$pinyin))
                                <li>
                                    <a href="{{$info['url']}}" class="pic" target="_blank" title="{{$info['title']}}">
                                        <img src="{{$host.'/template/download/tiankong/img'.'/'.($i+70).'.png'}}" alt="{{$info['title']}}" title="{{$info['title']}}" width="48" height="48"/>
                                    </a>
                                    <a href="{{$info['url']}}" class="name">{{$info['title']}}</a>
                                </li>
                            @endfor
                        </ul>
                    </div>
                    <div class="used-item">
                        <div class="used-name">系统工具</div>
                        <ul class="soft-list clearfix">
                            @for($i=0;$i<4;$i++)
                                @php($info=$data->content($firstDomain,$pinyin))
                                <li>
                                    <a href="{{$info['url']}}" class="pic" target="_blank" title="{{$info['title']}}">
                                        <img src="{{$host.'/template/download/tiankong/img'.'/'.($i+74).'.png'}}" alt="{{$info['title']}}" title="{{$info['title']}}" width="48" height="48"/>
                                    </a>
                                    <a href="{{$info['url']}}" class="name">{{$info['title']}}</a>
                                </li>
                            @endfor
                        </ul>
                    </div>
                    <div class="used-item">
                        <div class="used-name">下载工具</div>
                        <ul class="soft-list clearfix">
                            @for($i=0;$i<4;$i++)
                                @php($info=$data->content($firstDomain,$pinyin))
                                <li>
                                    <a href="{{$info['url']}}" class="pic" target="_blank" title="{{$info['title']}}">
                                        <img src="{{$host.'/template/download/tiankong/img'.'/'.($i+76).'.png'}}" alt="{{$info['title']}}" title="{{$info['title']}}" width="48" height="48"/>
                                    </a>
                                    <a href="{{$info['url']}}" class="name">{{$info['title']}}</a>
                                </li>
                            @endfor
                        </ul>
                    </div>
                    <div class="used-item">

                        <div class="used-name">办公软件</div>
                        <ul class="soft-list clearfix">
                            @for($i=0;$i<4;$i++)
                                @php($info=$data->content($firstDomain,$pinyin))
                                <li>
                                    <a href="{{$info['url']}}" class="pic" target="_blank" title="{{$info['title']}}">
                                        <img src="{{$host.'/template/download/tiankong/img'.'/'.($i+1).'.png'}}" alt="{{$info['title']}}" title="{{$info['title']}}" width="48" height="48"/>
                                    </a>
                                    <a href="{{$info['url']}}" class="name">{{$info['title']}}</a>
                                </li>
                            @endfor
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="row par-row mt10" monkey="skycn-friend">
        <div class="til">合作伙伴</div>
        <ul class="par-list clearfix">
            @for($i=0;$i<8;$i++)
                @php($info=$data->content($firstDomain,$pinyin))
                <li>
                    <a href="{{$info['url']}}" class="c666" target="_blank" title="{{$info['title']}}">{{$info['title']}}</a>
                </li>
            @endfor
        </ul>
    </div>
@endsection
