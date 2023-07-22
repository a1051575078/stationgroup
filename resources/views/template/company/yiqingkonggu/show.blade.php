@php($data=app('App\Http\Controllers\CoreController'))
@extends('template.company.yiqingkonggu.layout')
@section('content')
    <div class="right_6">
        <div class="right_8">
            <div class="right_8title">{{$title}}</div>
            <div class="right_8title" style="font-size:14px;"></div>
            <div class="right_8title1">发布时间：{{date('Y-m-d H:i:s',time()-config('app.diy.posttime'))}}</div>
        </div>
        <div class="right_6_text2">
            {!!$content!!}
            <div class="context">
                <ul>
                    <li>
                        上一篇 ：
                        @php($info=$data->content($firstDomain,$pinyin))
                        <a href="{{$info['url']}}" class="nextnews" title="{{$info['title']}}">{{$info['title']}}</a>
                    </li>
                    <li>
                        下一篇 ：
                        @php($info=$data->content($firstDomain,$pinyin))
                        <a href="{{$info['url']}}" class="nextnews" title="{{$info['title']}}">{{$info['title']}}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    <div class="right1_4"></div>
    </div>
    <div class="clear"></div>
    </div>
@endsection
