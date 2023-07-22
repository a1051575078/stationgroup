@php($data=app('App\Http\Controllers\CoreController'))
@extends('template.company.dianzikonggu.layout')
@section('content')
    <div class="about_jieshao">
        <div class="tri_cont">
            <div class="content-line">
                <h1>{{$title}}</h1>
                <p class="content_infor">
                    <span>发布时间：{{date('Y-m-d H:i:s',time()-config('app.diy.posttime'))}}</span>
                </p>
            </div>
            <div class="newslist">
                <p>
                <div class=TRS_Editor>
                    <p align="justify">{!!$content!!}</p>
                    <br-interchange-newline></br-interchange-newline>
                </div>
                </p>
                <div class="content_nr">
                    <span style='float:right;'>
                        <span>
                            <b>下一篇：</b>
                        </span>
                        @php($info=$data->content($firstDomain,$pinyin))
                        <A href="{{$info['url']}}" Title="{{$info['title']}}">{{$info['title']}}</A>
                    </span>
                </div>
            </div>
        </div>
    </div>
@endsection
