@php($data=app('App\Http\Controllers\CoreController'))
@extends('template.download.yiqiba.layout')
@section('content')
    <script type="text/javascript" src="{{$host.'/template/download/yiqiba/js/scrollpic.js'}}"></script>
    <div class="index-nav">
        <div class="index-main">
            <div class="fl wl">
                <h2>
                    @php($info=$data->content($firstDomain,$pinyin))
                    <a href="{{$info['url']}}">网络游戏</a>
                </h2>
                <ul>
                    @for($i=0;$i<4;$i++)
                        <li class="index{{$i+1}}">
                            @for($j=0;$j<8;$j++)
                                @php($info=$data->navigation($firstDomain,$pinyin))
                                <a href="{{$info['url']}}">{{$info['title']}}</a>
                            @endfor
                        </li>
                    @endfor
                </ul>
            </div>
            <div class="fr wy">
                <h2>
                    @php($info=$data->content($firstDomain,$pinyin))
                    <a href="{{$info['url']}}">网页游戏</a>
                </h2>
                <ul>
                    <li class="index7">
                        @for($i=0;$i<6;$i++)
                            @php($info=$data->navigation($firstDomain,$pinyin))
                            <a href="{{$info['url']}}">{{$info['title']}}</a>
                        @endfor
                    </li>
                </ul>
            </div>
            <div class="cl"></div>
        </div>
    </div>
    <div class="main">
        <div class="clearfix">
            <div class="fl content">
                <div class="redBox">
                    <h2>
                        最新推荐游戏
                        <div class="btnCtrl">
                            @for($i=0;$i<3;$i++)
                                @php($info=$data->content($firstDomain,$pinyin))
                                <a href="{{$info['url']}}" onmouseover="easytabs('1', '{{$i+1}}');" onfocus="easytabs('1', '{{$i+1}}');" onclick="return false;"  title="" id="tablink{{$i+1}}"></a>
                            @endfor
                        </div>
                    </h2>
                    @for($i=0;$i<3;$i++)
                        <div class="scrollBox" id="tabcontent{{$i+1}}">
                            <ul>
                                @for($j=0;$j<3;$j++)
                                    <li>
                                        @php($info=$data->content($firstDomain,$pinyin))
                                        <img alt="{{$info['title']}}" src="{{$host.'/template/download/yiqiba/img/'.($i*3+($j+1)).'.jpg'}}"/>
                                        <a class="cover ie6png" href="{{$info['url']}}" title="{{$info['title']}}">
                                            <span class="score">{{mt_rand(1,9)}}.{{mt_rand(1,9)}}</span>
                                            <span class="gname">{{$info['title']}}</span>
                                        </a>
                                        <p><em>{{mt_rand(888,9999)}}</em>人想玩</p>
                                    </li>
                                @endfor
                            </ul>
                        </div>
                    @endfor
                </div>
            </div>
            <div class="fr side">
                <div class="redBox">
                    <h2>游戏推荐榜</h2>
                    <ol class="toplist nobg">
                        @for($i=0;$i<10;$i++)
                            <li>
                                <span class="fl num topnum">{{$i+1}}</span>
                                @php($info=$data->content($firstDomain,$pinyin))
                                <a href="{{$info['url']}}" class="fl name" title="{{$info['title']}}">{{$info['title']}}</a>
                                @php($info=$data->content($firstDomain,$pinyin))
                                <a href="{{$info['url']}}" class="fr c-999">视频</a>
                                @php($info=$data->content($firstDomain,$pinyin))
                                <a href="{{$info['url']}}" class="fr c-black">截图</a>
                                <div class="cl"></div>
                            </li>
                        @endfor
                    </ol>
                </div>
            </div>
        </div>
        <div class="clearfix">
            <div class="fl content">
                <div class="blueBox">
                    <h2>
                        @php($info=$data->navigation($firstDomain,$pinyin))
                        <a href="{{$info['url']}}" class="more">更多</a>最新网络游戏
                    </h2>
                    <ul class="con-list">
                        @for($i=0;$i<6;$i++)
                            <li>
                                <dl class="clearfix">
                                    <dt>
                                        @php($info=$data->content($firstDomain,$pinyin))
                                        <a href="{{$info['url']}}" class="pic100">
                                            <img src="{{$host.'/template/download/yiqiba/img/'.($i+10).'.jpg'}}" title="{{$info['title']}}">
                                        </a>
                                    </dt>
                                    <dd>
                                        <p><a href="{{$info['url']}}" class="name c-red" title="{{$info['title']}}">{{$info['title']}}</a></p>
                                        @php($navigation=$data->navigation($firstDomain,$pinyin))
                                        <p>模式：<a href="{{$navigation['url']}}">{{$navigation['title']}}</a></p>
                                        @php($navigation=$data->navigation($firstDomain,$pinyin))
                                        <p>开发：<a href="{{$navigation['url']}}" title="{{$navigation['title']}}">{{$navigation['title']}}</a></p>
                                        @php($navigation=$data->navigation($firstDomain,$pinyin))
                                        <p>产地：<a href="{{$navigation['url']}}">{{$navigation['title']}}</a></p>
                                        @php($navigation=$data->navigation($firstDomain,$pinyin))
                                        <p>画面：<a href="{{$navigation['url']}}">{{mt_rand(2,3)}}D</a></p>
                                    </dd>
                                </dl>
                            </li>
                        @endfor
                    </ul>
                </div>
            </div>
            <div class="fr side">
                <div class="blueBox">
                    <h2>
                        最新测试网游
                        <div class="testNav">
                            @for($i=0;$i<3;$i++)
                                @php($info=$data->navigation($firstDomain,$pinyin))
                                <a href="{{$info['url']}}" target="_blank">{{$info['title']}}</a>
                            @endfor
                        </div>
                    </h2>
                    <div id="testtime" class="toplist" style="padding:0;">
                        <table>
                            <thead>
                            <th width="50">时间</th>
                            <th width="110">游戏名称</th>
                            <th width="50">状态</th>
                            <th width="40">发号</th>
                            </thead>
                            <tbody>
                            @for($i=0;$i<10;$i++)
                                <tr>
                                    <td class="time">{{date('m-d',strtotime("+$i day"))}}</td>
                                    <td class="name">
                                        @php($info=$data->content($firstDomain,$pinyin))
                                        <a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                                    </td>
                                    <td class="test">测试</td>
                                    @php($num=mt_rand(1000,9999))
                                    <td id="test_{{$num}}" class="fahao">
                                        <a id="{{$num}}" href="{{$info['url']}}" style="color:#{{mt_rand(100000,999999)}};" target="_blank">{{$num}}</a>
                                    </td>
                                </tr>
                            @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix">
            <div class="fl content">
                <div class="blueBox">
                    <h2>
                        @php($info=$data->navigation($firstDomain,$pinyin))
                        <a href="{{$info['url']}}" class="more">更多</a>最新手机游戏
                    </h2>
                    <ul class="con-list">
                        @for($i=0;$i<6;$i++)
                            <li>
                                <dl class="clearfix">
                                    <dt>
                                        @php($info=$data->content($firstDomain,$pinyin))
                                        <a href="{{$info['url']}}" class="pic100">
                                            <img src="{{$host.'/template/download/yiqiba/img/'.($i+16).'.jpg'}}" title="{{$info['title']}}">
                                        </a>
                                    </dt>
                                    <dd>
                                        <p><a href="{{$info['url']}}" class="name c-red" title="{{$info['title']}}">{{$info['title']}}</a></p>
                                        @php($navigation=$data->navigation($firstDomain,$pinyin))
                                        <p>模式：<a href="{{$navigation['url']}}">{{$navigation['title']}}</a></p>
                                        @php($navigation=$data->navigation($firstDomain,$pinyin))
                                        <p>开发：<a href="{{$navigation['url']}}" title="{{$navigation['title']}}">{{$navigation['title']}}</a></p>
                                        @php($navigation=$data->navigation($firstDomain,$pinyin))
                                        <p>产地：<a href="{{$navigation['url']}}">{{$navigation['title']}}</a></p>
                                        @php($navigation=$data->navigation($firstDomain,$pinyin))
                                        <p>画面：<a href="{{$navigation['url']}}">{{mt_rand(2,3)}}D</a></p>
                                    </dd>
                                </dl>
                            </li>
                        @endfor
                    </ul>
                </div>
            </div>
            <div class="fr side">
                <div class="blueBox">
                    <h2>
                        @php($info=$data->navigation($firstDomain,$pinyin))
                        <a href="{{$info['url']}}" class="more"></a>热门游戏排行
                    </h2>
                    <ol class="toplist">
                        @for($i=0;$i<10;$i++)
                            <li class="clearfix">
                                <span class="fl num topnum">{{$i+1}}</span>
                                @php($info=$data->content($firstDomain,$pinyin))
                                <a href="{{$info['url']}}" class="fl name" title="{{$info['title']}}">{{$info['title']}}</a>
                                <span class="fr"><span class="score c-red">{{mt_rand(1000,9999)}}</span>个印象</span>
                            </li>
                        @endfor
                    </ol>
                </div>
            </div>
        </div>
        <div class="clearfix">
            <div class="fl content">
                <div class="blueBox">
                    <h2>
                        @php($info=$data->navigation($firstDomain,$pinyin))
                        <a href="{{$info['url']}}" class="more">更多</a>最新网页游戏
                    </h2>
                    <ul class="con-list">
                        @for($i=0;$i<6;$i++)
                            <li>
                                <dl class="clearfix">
                                    <dt>
                                        @php($info=$data->content($firstDomain,$pinyin))
                                        <a href="{{$info['url']}}" class="pic100">
                                            <img src="{{$host.'/template/download/yiqiba/img/'.($i+22).'.jpg'}}" title="{{$info['title']}}">
                                        </a>
                                    </dt>
                                    <dd>
                                        <p><a href="{{$info['url']}}" class="name c-red" title="{{$info['title']}}">{{$info['title']}}</a></p>
                                        @php($navigation=$data->navigation($firstDomain,$pinyin))
                                        <p>模式：<a href="{{$navigation['url']}}">{{$navigation['title']}}</a></p>
                                        @php($navigation=$data->navigation($firstDomain,$pinyin))
                                        <p>开发：<a href="{{$navigation['url']}}" title="{{$navigation['title']}}">{{$navigation['title']}}</a></p>
                                        @php($navigation=$data->navigation($firstDomain,$pinyin))
                                        <p>产地：<a href="{{$navigation['url']}}">{{$navigation['title']}}</a></p>
                                        @php($navigation=$data->navigation($firstDomain,$pinyin))
                                        <p>画面：<a href="{{$navigation['url']}}">{{mt_rand(2,3)}}D</a></p>
                                    </dd>
                                </dl>
                            </li>
                        @endfor
                    </ul>
                </div>
            </div>
            <div class="fr side">
                <div class="blueBox">
                    <h2>
                        @php($info=$data->navigation($firstDomain,$pinyin))
                        <a href="{{$info['url']}}" class="more">更多</a>期待网游排行
                    </h2>
                    <ol class="toplist">
                        @for($i=0;$i<10;$i++)
                            <li class="clearfix">
                                <span class="fl num topnum">{{$i+1}}</span>
                                @php($info=$data->content($firstDomain,$pinyin))
                                <a href="{{$info['url']}}" class="fl name" title="{{$info['title']}}">{{$info['title']}}</a>
                                <span class="fr"><span class="score c-red">{{mt_rand(1000,9999)}}</span>人想玩</span>
                            </li>
                        @endfor
                    </ol>
                </div>
            </div>
        </div>
        <div class="friendLink">
            <div class="blueBox">
                <h2>友情链接</h2>
                <div class="linklist"></div>
            </div>
        </div>
    </div>
@endsection
