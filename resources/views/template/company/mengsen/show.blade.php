@php($data=app('App\Http\Controllers\CoreController'))
@extends('template.company.mengsen.layout')
@section('content1')
    <div class="right_body">
        <div class="InfoTitle">
            <h1>{{$title}}</h1>
        </div>
        <div class="info_from_wrap">
            <b>来源：</b>
            <a href="" target="_blank" title="{{$media}}">{{$media}}</a>&nbsp;
            <b>日期：</b>{{date('Y-m-d H:i:s',time()-config('app.diy.posttime'))}}&nbsp;
            <b>点击：</b>{{mt_rand(1001,9999)}}&nbsp;
            <b>属于：</b>
            <a href="" target="_blank" title="{{$anthor}}">{{$anthor}}</a>
        </div>
        <div class="InfoContent">
            {!!$content!!}
        </div>
        <div class="info_previous_next_wrap">
            <div class="Previous">
                <b>上一新闻：</b>
                @php($info=$data->content($firstDomain,$pinyin))
                <a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
            </div>
            <div class="Next">
                <b>下一新闻：</b>
                @php($info=$data->content($firstDomain,$pinyin))
                <a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
            </div>
        </div>
    </div>
    <div class="right_bottom"></div>
    </div>
    <div class="clear"></div>
    </div>
@endsection
