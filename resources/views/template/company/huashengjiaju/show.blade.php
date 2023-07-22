@php($data=app('App\Http\Controllers\CoreController'))
@extends('template.company.huashengjiaju.layout')
@section('content1')
    <div id="mainContent">
        <div id="breadcrumb">
            您的位置 &gt; <a href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}" title="网站首页">网站首页</a> &gt;
            <strong>{{$title}}</strong>
        </div>
        <div class="content">
            <h3>{{$title}}</h3>
            <div class="centerText">[ 时间：{{date('Y-m-d',time()-config('app.diy.posttime'))}} 点击：{{mt_rand(1000,9999)}} ]</div>
            {!!$content!!}
            <p>&nbsp;</p>
            @php($info=$data->content($firstDomain,$pinyin))
            <li>上一篇：<a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a></li>
            @php($info=$data->content($firstDomain,$pinyin))
            <li>下一篇：<a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a></li>
        </div>
@endsection
