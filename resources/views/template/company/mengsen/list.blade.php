@extends('template.company.mengsen.layout')
@php($data=app('App\Http\Controllers\CoreController'))
@section('content1')
    <div class="right_body">
        <ul class="textlist">
            @for($i=0;$i<6;$i++)
                @php($info=$data->content($firstDomain,$pinyin,$type))
                <li>
                    <a class="InfoSTitle" href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">{{$info['title']}}</a>
                    <p>{{$info['article']}}...</p>
                    <span class="InfoTime">{{date('Y-m-d',strtotime('-'.$i.' day'))}}</span>
                    <a class="viewDetail" href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">【查看详情】</a>
                </li>
            @endfor
        </ul>
    </div>
    <div class="right_bottom"></div>
    <div class="right_title">
                <span class="more">
                    @php($info=$data->navigation($firstDomain,$pinyin))
                    <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">{{$info['title']}}</a>
                </span>
        <h2>行业动态</h2>
    </div>
    <div class="right_body">
        <ul class="textlist">
            @for($i=0;$i<6;$i++)
                @php($info=$data->content($firstDomain,$pinyin,$type))
                <li>
                    <a class="InfoSTitle" href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">{{$info['title']}}</a>
                    <p>{{$info['article']}}...</p>
                    <span class="InfoTime">{{date('Y-m-d',strtotime('-'.$i.' day'))}}</span>
                    <a class="viewDetail" href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">【查看详情】</a>
                </li>
            @endfor
        </ul>
    </div>
    <div class="right_bottom"></div>
    </div>
    <div class="clear"></div>
    </div>
@endsection
