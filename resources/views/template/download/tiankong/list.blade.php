@extends('template.download.tiankong.layout')
@php($data=app('App\Http\Controllers\CoreController'))
@section('content')
    <div class="lay-790 fr">
        <div class="list-rec-box" monkey="betterapps">
            <div class="list-rec-title"></div>
            <ul class="soft-list clearfix">
                @for($i=0;$i<8;$i++)
                    @php($info=$data->content($firstDomain,$pinyin))
                    <li>
                        <a href="{{$info['url']}}" class="pic" target="_blank" title="{{$info['title']}}">
                            <img src="{{$host.'/template/download/tiankong/img'.'/'.($i+1).'.png'}}" alt="{{$info['title']}}" title="{{$info['title']}}"/>
                        </a>
                        <a href="{{$info['url']}}" class="name blue" title="{{$info['title']}}">{{$info['title']}}</a>
                    </li>
                @endfor
            </ul>
        </div>
        <div class="tab-style-3 mt10">
            <ul class="tab-3">
                @for($i=0;$i<6;$i++)
                    @php($info=$data->navigation($firstDomain,$pinyin))
                    <li {{!$i?'class=current':''}}>
                        <a href="{{$info['url']}}" class="blue" title="{{$info['title']}}">{{$info['title']}}
                            @if(!$i)
                            （{{mt_rand(100,9999)}}）
                            @endif
                        </a>
                        <i></i>
                    </li>
                @endfor
            </ul>
            <div class="ext-input">
                @for($i=0;$i<3;$i++)
                    @php($info=$data->navigation($firstDomain,$pinyin))
                    <label class="white">
                        <input name="weburl" type="radio" {{!$i?'checked=""':''}} onclick="location.href='{{$info['url']}}'"/>{{$info['title']}}
                    </label>
                @endfor
            </div>
        </div>
        <div class="main-list-con" monkey="appslist">
            <ul class="main-list">
                @for($i=0;$i<10;$i++)
                    @php($info=$data->content($firstDomain,$pinyin,$type))
                    <li>
                        <div class="list-pic">
                            <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">
                                <img src="{{$host.'/template/download/tiankong/img'.'/'.($i+9).'.png'}}" alt="{{$info['title']}}" title="{{$info['title']}}"/>
                            </a>
                        </div>
                        <div class="list-con">
                            <p class="s-title">
                                <a target="_blank" class="s-name blue" href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                                <span class="star-range b-range"><i class="in" style="width:{{mt_rand(0,100)}}%;"></i></span>
                                <span class="star-socre"><i>{{mt_rand(0,9)}}</i> 分</span>
                            </p>
                            <p class="s-desc">{{$info['article']}}</p>
                            <div class="s-ext">
                            <span class="item">评论：
                                <a href="{{$info['url']}}" target="_blank" class="blue">{{mt_rand(0,99)}}</a>条
                            </span>
                                <span class="item">大小：{{mt_rand(0,99)}}.{{mt_rand(0,99)}} MB</span>
                            </div>
                            <a href="{{$info['url']}}" class="soft-list-dl" dlcount="17131|2" monkey="downsoft" title="{{$info['title']}}">高速下载</a>
                        </div>
                    </li>
                @endfor
            </ul>
            <div class="list-page">
                <div class="list-gotop">
                    <a href="#" class="blue">返回顶部↑</a>
                </div>
                <div class="page-num">
                    <span class="nextprev">上一页</span>
                    <span class="current">1</span>
                    @for($i=2;$i<9;$i++)
                        @php($info=$data->navigation($firstDomain,$pinyin))
                        <a href="{{$info['url']}}" title="第{{$i}}页">{{$i}}</a>
                    @endfor
                    <span class="ext">…</span>
                    @php($rand=mt_rand(20,99))
                    @for($i=0;$i<2;$i++)
                        @php($info=$data->navigation($firstDomain,$pinyin))
                        <a href="{{$info['url']}}" title="第{{$rand+$i}}页">{{$rand+$i}}</a>
                    @endfor
                    @php($info=$data->navigation($firstDomain,$pinyin))
                    <a href="{{$info['url']}}" class="nextprev" title="下一页"> 下一页</a>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
