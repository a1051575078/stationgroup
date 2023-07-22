@php($data=app('App\Http\Controllers\CoreController'))
@extends('template.company.wangwangjituan.layout')
@section('content')
    <div class="index">
        <div class="list swiper-container">
            <ul class="swiper-wrapper">
                @php($img=['hd1.jpg','hd2.jpg','hd3.jpg','hd4.jpg','hd5.jpg'])
                @for($i=0;$i<5;$i++)
                    @php($info=$data->navigation($firstDomain,$pinyin))
                    <li class="bgc swiper-slide">
                        <a href="{{$info['url']}}" title="{{$info['title']}}">
                            <img width="100%" src='{{$host.'/template/company/wangwangjituan/img/hd1.jpg'}}' title="{{$info['title']}}" alt="{{$info['title']}}"/>
                            <div class="img bgc" style="background-image: url({{$host.'/template/company/wangwangjituan/img/'.$img[$i]}});"></div>
                        </a>
                    </li>
                @endfor
            </ul>
            <div class="con">
                <div class="table">
                    <div class="table-cell">
                        <div class="tabs">
                            @php($img=['index_icon5.png','yanjing.jpg','jdlogo.png','tmlogo.png','index_icon1.png'])
                            @for($i=0;$i<5;$i++)
                                @php($info=$data->navigation($firstDomain,$pinyin))
                                <div class="a">
                                    <div class="icon">
                                        <a href="{{$info['url']}}" title="{{$info['title']}}">
                                            <img width="100%" src="{{$host.'/template/company/wangwangjituan/img/'.$img[$i]}}" title="{{$info['title']}}" alt="{{$info['title']}}"/>
                                        </a>
                                    </div>
                                    <p>
                                        <a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                                    </p>
                                </div>
                                <span>&nbsp;</span>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
            <div class="btns"></div>
        </div>
        <div class="nav f-cb">
            @for($i=0;$i<4;$i++)
                @php($info=$data->navigation($firstDomain,$pinyin))
                <a href="{{$info['url']}}" title="{{$info['title']}}">
                    <div class="tits">
                        <span>{{$info['title']}}</span>
                    </div>
                </a>
            @endfor
        </div>
        <div class="navM f-cb">
            @php($img=['v1.jpg','v2.jpg','v3.jpg','v4.jpg'])
            @for($i=0;$i<4;$i++)
                @php($info=$data->navigation($firstDomain,$pinyin))
                <a href="{{$info['url']}}" title="{{$info['title']}}">
                    <img width="100%" src="{{$host.'/template/company/wangwangjituan/img/'.$img[$i]}}" title="{{$info['title']}}" alt="{{$info['title']}}"/>
                    <div class="tttt">
                        <div class="t">{{$info['title']}}</div>
                        <div class="line"></div>
                    </div>
                </a>
            @endfor
        </div>
    </div>
@endsection
