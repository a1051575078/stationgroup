@php($data=app('App\Http\Controllers\CoreController'))
@extends('template.company.fuyejituan.layout')
@section('content')
    <div class="fbanenr">
        <img src="{{$host.'/template/company/fuyejituan/img/pic.jpg'}}" title="pic" alt="pic"/>
        <div class="text">
            <div class="ad-tit">{{$title}}</div>
            <div class="ad-entit gotham-bold">{!!implode('',$pinyin->convert($title,PINYIN_NO_TONE))!!}</div>
        </div>
    </div>
    <div class="ownership">
        <div class="w1190 ownershipinfo f-cb">
            <div class="tit">
                <h2>{{$title}}</h2>
            </div>
            <div class="demo-info">
                {!!$content!!}
            </div>
        </div>
    </div>
@endsection
