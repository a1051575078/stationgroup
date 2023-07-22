@extends('template.company.wangwangjituan.layout')
@php($data=app('App\Http\Controllers\CoreController'))
@php($yearMonth=date('Y.m',time()))
@section('content')
    <div class="aboutNav" id="box">
        <a href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}" class="on" title="{{$title}}">{{$title}}</a>
        @for($i=0;$i<3;$i++)
            @php($info=$data->content($firstDomain,$pinyin))
            <a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
        @endfor
    </div>
    <div class="aboutNavM js-noclick">
        <div class="tits f-cb">
            <span>{{$title}}</span>
            <i></i>
        </div>
        <ul>
            @for($i=0;$i<4;$i++)
                @php($info=$data->content($firstDomain,$pinyin))
                <li>
                    <a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                </li>
            @endfor
        </ul>
    </div>
    <div class="procurement">
        <div class="w1100">
            <ul>
                @for($i=0;$i<10;$i++)
                    <li>
                        @php($info=$data->content($firstDomain,$pinyin))
                        <a href="{{$info['url']}}" title="{{$info['title']}}" class="f-cb">
                            <div class="time">
                                <span>{{date('d',strtotime('-'.$i.' day'))}}</span>
                                <i>{{$yearMonth}}</i>
                            </div>
                            <div class="tits">{{$info['title']}}</div>
                        </a>
                    </li>
                @endfor
            </ul>
            <div id="pgServer" class="page">
                <a class="p" class="p" disabled="disabled" style="margin-right:5px;">
                    上一页
                </a>
                <span class="active" style="margin-right:5px;">1</span>
                @for($i=0;$i<4;$i++)
                    @php($info=$data->navigation($firstDomain,$pinyin))
                    <a href="{{$info['url']}}" style="margin-right:5px;" title="第{{$i+2}}页">{{$i+2}}</a>
                @endfor
                @php($info=$data->navigation($firstDomain,$pinyin))
                <a class="p" class="p" href="{{$info['url']}}" style="margin-right:5px;" title="下一页">
                    下一页
                </a>
            </div>
        </div>
    </div>
@endsection
