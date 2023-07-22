@extends('template.company.yiqingkonggu.layout')
@php($data=app('App\Http\Controllers\CoreController'))
@section('content')
    <ul class="right1_3ul">
        @for($i=0;$i<7;$i++)
            @php($info=$data->content($firstDomain,$pinyin))
            <li>
                <a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                <span>[{{date('Y-m-d',strtotime('-'.$i.' day'))}}]</span>
            </li>
        @endfor
    </ul>
    </div>
    <div class="page">
        <ul class="pagelist">
            <li class="cr">1</li>
            @for($i=2;$i<8;$i++)
                <li>
                    @php($info=$data->navigation($firstDomain,$pinyin))
                    <a href="{{$info['url']}}" title="第{{$i}}页">{{$i}}</a>
                </li>
            @endfor
            <li class="next">
                @php($info=$data->navigation($firstDomain,$pinyin))
                <a href="{{$info['url']}}" aria-label="Next" title="第8页">&gt;</a>
            </li>
            @php($page=mt_rand(20,999))
            <li class="last">
                @php($info=$data->navigation($firstDomain,$pinyin))
                <a href="{{$info['url']}}" title="末页">末页</a>
            </li>
            <li>
                <span class="pageinfo">共<strong>{{$page}}</strong>页<strong>{{$page*7}}</strong>条</span>
            </li>
        </ul>
    </div>
    </div>
    </div>
    <div class="right1_4"></div>
    </div>
    <div class="clear"></div>
    </div>
@endsection
