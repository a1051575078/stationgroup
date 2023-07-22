@php($data=app('App\Http\Controllers\CoreController'))
@extends('template.company.fuyejituan.layout')
@section('content')
    <div class="banner por">
        <div class="scroll-box">
            <ul class="js-imgUl">
                <li class="js-imgLi">
                    <div class="img">
                        <img src="{{$host.'/template/company/fuyejituan/img/home.jpg'}}" title="home" alt="home"/>
                    </div>
                </li>
                <li class="js-imgLi">
                    <div class="img">
                        <img src="{{$host.'/template/company/fuyejituan/img/home1.jpg'}}" title="home1" alt="home1"/>
                    </div>
                </li>
            </ul>
        </div>
        <div class="index-news poa">
            <div class="txtScroll-top f-cb por">
                <div class="news-tit fl">NEWS</div>
                <div class="bd fl">
                    <ul class="infoList">
                        @for($i=0;$i<9;$i++)
                            @php($info=$data->content($firstDomain,$pinyin))
                            <li>
                                <a href="{{$info['url']}}" title="{{$info['title']}}" target="_blank">{{$info['title']}}</a>
                                <span class="date">{{date('Y-m-d',strtotime('-'.$i.' day'))}}</span>
                            </li>
                        @endfor
                    </ul>
                </div>
                <div class="hd poa">
                    <a class="next fr"></a>
                    <a class="prev fl"></a>
                </div>
            </div>
        </div>
    </div>
@endsection
