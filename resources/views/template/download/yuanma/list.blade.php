@php($data=app('App\Http\Controllers\CoreController'))
@extends('template.download.yuanma.layout')
@section('content')
    <div class="panel-body">
        @for($i=0;$i<26;$i++)
            @php($info=$data->navigation($firstDomain,$pinyin))
            <a href="{{$info['url']}}">{{$info['title']}}</a>
        @endfor
    </div>
    <div class="panel-foot">
        <div></div>
    </div>
    </div>
    <div class="clearfix layout-list-cols2">
        <div class="col2">
            <div class="panel panel-box-gray">
                <div class="panel-head">
                    <div class="inner">
                        <h1 class="title">{!!$title!!}</h1>
                        <div class="extra orderby">
                            <span id="orderby_time">
                                @php($info=$data->content($firstDomain,$pinyin))
                                <a href="{{$info['url']}}" class="time"><em></em>按时间排序</a>
                            </span>
                            <span id="orderby_size">
                                @php($info=$data->content($firstDomain,$pinyin))
                                <a href="{{$info['url']}}" class="size"><em></em>按大小排序</a>
                            </span>
                            <span id="orderby_hits">
                                @php($info=$data->content($firstDomain,$pinyin))
                                <a href="{{$info['url']}}" class="popular"><em></em>按人气排序</a>
                            </span>
                        </div>
                        <script type="text/javascript">
                            if (window.location.href.indexOf("size_desc") != -1) {
                                document.getElementById("orderby_size").className += " current";
                            } else if (window.location.href.indexOf("hits_desc") != -1) {
                                document.getElementById("orderby_hits").className += " current";
                            } else {
                                document.getElementById("orderby_time").className += " current";
                            }
                        </script>
                    </div>
                </div>
                <div class="panel-body">
                    @for($i=0;$i<10;$i++)
                        <div class="clearfix software-item">
                            <span class="image">
                                @php($info=$data->content($firstDomain,$pinyin,$type))
                                <a href="{{$info['url']}}" title="{{$info['title']}}" target="_blank">
                                    <img alt="" src="{{$host.'/template/download/yuanma/img/'.($i+1).'.png'}}"/>
                                </a>
                            </span>
                            <h4 class="name">
                                <a href="{{$info['url']}}" class="url" title="{{$info['title']}}" target="_blank">
                                    {{$info['title']}}
                                </a>
                                <span class="date">日期:{{date('Y-m-d H:i:s',strtotime("-$i day"))}}</span>
                            </h4>
                            <p class="info">
                                @php($navigation=$data->navigation($firstDomain,$pinyin))
                                <a href="{{$navigation['url']}}" target="_blank"><em>{{$navigation['title']}}</em></a> | 免费版 | 大小:{{mt_rand(1,99)}}.{{mt_rand(1,99)}}MB | 环境:PHP/Mysql | 人气:{{mt_rand(99,99999)}}
                            </p>
                            <p class="dec">{{$info['article']}}</p>
                        </div>
                    @endfor
                    <div class="pagination">
                        <span class="stats">
                            页次:<strong>1</strong>/{{mt_rand(10,999)}}
                        </span>
                        <a href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}" class="first">首页</a>
                        @php($info=$data->content($firstDomain,$pinyin))
                        <a href="{{$info['url']}}" class="previous">上一页</a>
                        @for($i=0;$i<6;$i++)
                            @php($info=$data->content($firstDomain,$pinyin))
                            <a href="{{$info['url']}}">
                                <span {{!$i?'class=current':''}}>{{$i+1}}</span>
                            </a>
                        @endfor
                        @php($info=$data->content($firstDomain,$pinyin))
                        <a href="{{$info['url']}}" class="next">下一页</a>
                        @php($info=$data->content($firstDomain,$pinyin))
                        <a href="{{$info['url']}}" class="last">尾页</a>
                    </div>
                </div>
                <div class="panel-foot">
                    <div></div>
                </div>
            </div>
        </div>
        <div class="col1">
            <div class="toprecommend">
                <ul class="tabber">
                    <li>
                        <a href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}" class="current">热门源码推荐</a>
                    </li>
                    <li>
                        <a href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}">热门软件推荐</a>
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
            <div class="panel panel-aside-red">
                <div class="panel-head">
                    <div class="inner">
                        <h3 class="title">本类下载排行</h3>
                        <p class="extra">
                            @php($info=$data->navigation($firstDomain,$pinyin))
                            <a href="{{$info['url']}}">更多 &raquo;</a>
                        </p>
                    </div>
                </div>
                <div class="panel-body">
                    <ul class="toprank">
                        @for($i=0;$i<10;$i++)
                            <li>
                                <em class="t-{{$i+1}}"></em>
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
@endsection
