@extends('template.company.fuyejituan.layout')
@php($data=app('App\Http\Controllers\CoreController'))
@section('content')
    <div class="fbanenr">
        <img src="{{$host.'/template/company/fuyejituan/img/list.jpg'}}" alt="list" title="list"/>
        <div class="text">
            <div class="ad-tit">{{$title}}</div>
            <div class="ad-entit gotham-bold">{!!implode('',$pinyin->convert($title,PINYIN_NO_TONE))!!}</div>
        </div>
    </div>
    <div class="mbx">
        <div class="w1190 f-cb">
            <div class="mbx-left fl">
                <span>首页</span>
                <i></i>
                <span>{{$title}}</span>
            </div>
            <div class="mbx-right fr">
                <a class="cur" href="">{{$title}}</a>
                @php($info=$data->navigation($firstDomain,$pinyin))
                <a href="{{$info['url']}}">{{$info['title']}}</a>
            </div>
        </div>
    </div>
    <div class="news">
        <div class="w1190 f-cb">
            <ul class="ovh">
                @php($year=date('Y',time()))
                @for($i=0;$i<7;$i++)
                    <li class="f-cb">
                        @php($info=$data->content($firstDomain,$pinyin,$type))
                        <a href="{{$info['url']}}" title="{{$info['title']}}">
                            <div class="img fl sf-img">
                                <img src=" " alt="" title=""/>
                            </div>
                            <div class="date fl">
                                <h2>{{date('m-d',strtotime('-'.$i.' day'))}}</h2>
                                <p>{{$year}}</p>
                            </div>
                            <div class="txt fl">
                                <h2>{{$info['title']}}</h2>
                                <p>{{$info['article']}}</p>
                            </div>
                        </a>
                    </li>
                @endfor
            </ul>
            <div class="page">
                <div class="pagination">
                    <a class="active" href="" title="第一页">1</a>
                    @php($info=$data->navigation($firstDomain,$pinyin))
                    <a class="page_num" href="{{$info['url']}}" title="第二页">2</a>
                    @php($info=$data->navigation($firstDomain,$pinyin))
                    <a class="page_num" href="{{$info['url']}}" title="第三页">3</a>
                    @php($info=$data->navigation($firstDomain,$pinyin))
                    <a class="next" href="{{$info['url']}}" title="下一页"></a>
                </div>
            </div>
        </div>
    </div>
@endsection
