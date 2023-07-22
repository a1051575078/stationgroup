@php($data=app('App\Http\Controllers\CoreController'))
@extends('template.download.yiqiba.layout')
@section('content')
    <div class="fl content">
        <div class="con-box">
            <div class="con-box-border">
                <div class="whit-box">
                    <h3>
                        @php($info=$data->content($firstDomain,$pinyin))
                        <a class="fr more" href="{{$info['url']}}">&raquo;&nbsp;按首字母查找</a>游戏大全
                    </h3>
                    <ul class="high-search">
                        <li>
                            <label>游戏类型：</label>
                            <p>
                                @for($i=0;$i<5;$i++)
                                    @php($info=$data->navigation($firstDomain,$pinyin))
                                    <a href="{{$info['url']}}" {{!$i?'class=current':''}}>{{$info['title']}}</a>
                                @endfor
                            </p>
                        </li>
                        <li>
                            <label>游戏模式：</label>
                            <p>
                                @for($i=0;$i<27;$i++)
                                    @php($info=$data->navigation($firstDomain,$pinyin))
                                    <a href="{{$info['url']}}" {{!$i?'class=current':''}}>{{$info['title']}}</a>
                                @endfor
                            </p>
                        </li>
                        <li>
                            <label>游戏题材：</label>
                            <p>
                                @for($i=0;$i<27;$i++)
                                    @php($info=$data->navigation($firstDomain,$pinyin))
                                    <a href="{{$info['url']}}" {{!$i?'class=current':''}}>{{$info['title']}}</a>
                                @endfor
                            </p>
                        </li>
                        <li>
                            <label>游戏画面：</label>
                            <p>
                                @for($i=0;$i<6;$i++)
                                    @php($info=$data->navigation($firstDomain,$pinyin))
                                    <a href="{{$info['url']}}" {{!$i?'class=current':''}}>{{$info['title']}}</a>
                                @endfor
                            </p>
                        </li>
                        <li>
                            <label>开发地区：</label>
                            <p>
                                @for($i=0;$i<6;$i++)
                                    @php($info=$data->navigation($firstDomain,$pinyin))
                                    <a href="{{$info['url']}}" {{!$i?'class=current':''}}>{{$info['title']}}</a>
                                @endfor
                            </p>
                        </li>
                    </ul>
                    <div class="findGame">
                        <div class="t con-t">
                            <div class="newSort fr">
                                排序方式：<span class="c-red">评分</span>
                                @for($i=0;$i<3;$i++)
                                    @php($info=$data->content($firstDomain,$pinyin))
                                    <span><a href="{{$info['url']}}">{{$info['title']}}</a></span>
                                @endfor
                            </div>
                        </div>
                        <ul class="findList">
                            @for($i=0;$i<17;$i++)
                                <li>
                                    <dl class="clearfix">
                                        <dt>
                                            @php($info=$data->content($firstDomain,$pinyin))
                                            <a href="{{$info['url']}}" class="pic100" title="{{$info['title']}}">
                                                <img src="{{$host.'/template/download/yiqiba/img/'.($i+28).'.jpg'}}"/>
                                            </a>
                                        </dt>
                                        <dd class="mid">
                                            <div class="gname">
                                                <p>
                                                    <a href="{{$info['url']}}">{{$info['title']}}</a>
                                                    @php($info=$data->content($firstDomain,$pinyin))
                                                    <a href="{{$info['url']}}" title="发号" target = "_blank"></a>
                                                </p>
                                            </div>
                                            <p>开发:
                                                @php($info=$data->navigation($firstDomain,$pinyin))
                                                <a href="{{$info['url']}}">{{$info['title']}}</a>&nbsp;&nbsp;
                                                @php($info=$data->content($firstDomain,$pinyin))
                                                <a href="{{$info['url']}}" target = "_blank">游戏图片</a>({{mt_rand(1,99)}})&nbsp;&nbsp;&nbsp;&nbsp;
                                                @php($info=$data->content($firstDomain,$pinyin))
                                                <a href="{{$info['url']}}" target = "_blank">游戏视频</a>({{mt_rand(1,99)}})
                                            </p>
                                            <p>角色扮演 / {{mt_rand(2,3)}}D</p>
                                            <p class="t-indent">
                                                @php($info=$data->content($firstDomain,$pinyin,$type))
                                                <a href="{{$info['url']}}" target = "_blank">{{$info['article']}}</a>
                                            </p>
                                        </dd>
                                        <dd class="r fr">
                                            <p class="score">
                                                <span class="c-red">{{mt_rand(1,9)}}.{{mt_rand(1,9)}}</span>
                                            </p>
                                            <p>
                                                <span class="c-red">{{mt_rand(10000,99999)}}</span>人想玩&nbsp;&nbsp;<span class="c-red">{{mt_rand(10000,99999)}}</span>人玩过
                                            </p>
                                            @php($info=$data->navigation($firstDomain,$pinyin))
                                            <p>[<a href="{{$info['url']}}">更多</a>]</p>
                                        </dd>
                                    </dl>
                                </li>
                            @endfor
                        </ul>
                        <div class="pagination clearfix">
                            <div class="pagination">&nbsp;
                                @php($info=$data->content($firstDomain,$pinyin))
                                <a href="{{$info['url']}}" class="number current">1</a>&nbsp;
                                @for($i=0;$i<2;$i++)
                                    @php($info=$data->content($firstDomain,$pinyin))
                                    <a class="number" href="{{$info['url']}}">{{$i+2}}</a>&nbsp;
                                @endfor
                                @php($info=$data->content($firstDomain,$pinyin))
                                <a class="number" href="{{$info['url']}}">...</a>&nbsp;
                                @php($info=$data->content($firstDomain,$pinyin))
                                <a class="number" href="{{$info['url']}}">后页&gt;</a>&nbsp;&nbsp;
                                @php($info=$data->content($firstDomain,$pinyin))
                                <a class="number" href="{{$info['url']}}">尾页&raquo;</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="fr side">
        <div class="side-box" id = "v_activity_box">
            <div class="side-box-border">
                <div class="t">相关活动</div>
                <div class="ulike3">
                    <ul id = "v_side_activity">
                        <li class="pic" id = "v_act_pic">
                            @php($info=$data->content($firstDomain,$pinyin))
                            <a href="{{$info['url']}}" title="{{$info['title']}}" target="_blank">
                                <img width="960" height="70" border="0" src="{{$host.'/template/download/yiqiba/img/1355363908-7167.jpg'}}"/>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="side-box">
            <div class="side-box-border blueBox">
                <h2>
                    @php($info=$data->navigation($firstDomain,$pinyin))
                    <a href="{{$info['url']}}" class="fr more">更多…</a>最受欢迎的游戏
                </h2>
                <ol class="toplist">
                    @for($i=0;$i<10;$i++)
                        <li>
                            <span class="fl num topnum">{{$i+1}}</span>
                            @php($info=$data->content($firstDomain,$pinyin))
                            <a href="{{$info['url']}}" class="fl name">{{$info['title']}}</a>
                            <span class="fr score c-red">{{mt_rand(0,9)}}.{{mt_rand(0,9)}}</span>
                            <div class="cl"></div>
                        </li>
                    @endfor
                </ol>
                <div class="cl"></div>
            </div>
        </div>
        <div class="side-box">
            <div class="side-box-border blueBox">
                <h2>
                    @php($info=$data->navigation($firstDomain,$pinyin))
                    <a href="{{$info['url']}}" class="fr more">更多…</a>最受期待的游戏
                </h2>
                <ol class="toplist">
                    @for($i=0;$i<10;$i++)
                        <li>
                            <span class="fl num topnum">{{$i+1}}</span>
                            @php($info=$data->content($firstDomain,$pinyin))
                            <a href="{{$info['url']}}" class="fl name">{{$info['title']}}</a>
                            <span class="fr"><span class="score c-red">{{mt_rand(10000,99999)}}</span>人想玩</span>
                            <div class="cl"></div>
                        </li>
                    @endfor
                </ol>
                <div class="cl"></div>
            </div>
        </div>
        <div class="side-box">
            <div class="side-box-border clearfix L1">
                <div class="t">
                    @php($info=$data->navigation($firstDomain,$pinyin))
                    <a href="{{$info['url']}}" class="fr more" onclick="change_like();">换一换</a>猜你喜欢
                </div>
                <div class="ulike2">
                    <ul class="clearfix" id="guess_game">
                        @for($i=0;$i<4;$i++)
                            <li>
                                @php($info=$data->content($firstDomain,$pinyin))
                                <a href="{{$info['url']}}" target="_blank" class="pic90">
                                    <img src="{{$host.'/template/download/yiqiba/img/'.mt_rand(1,44).'.jpg'}}"/></a>
                                <a href="{{$info['url']}}" target="_blank" class="name">{{$info['title']}}</a>
                            </li>
                        @endfor
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="cl"></div>
    </div>
@endsection
