@extends('template.company.beijingqiche.layout')
@php($data=app('App\Http\Controllers\CoreController'))
@section('content')
    <div class="subcenter">
        <ul class="newclist">
            @php($img=['20210323111803_47129.jpg','20210315120838_20481.jpg','20210204094928_90018.jpg','20201229095337_48538.jpg'])
            @for($i=0;$i<4;$i++)
                <li>
                    @php($info=$data->content($firstDomain,$pinyin,$type))
                    <a href="{{$info['url']}}" title="{{$info['title']}}">
                        <div class="img">
                            <img src="{{$host.'/template/company/beijingqiche/img'.'/'.$img[$i]}}" title="{{$info['title']}}" alt="{{$info['title']}}"/>
                        </div>
                        <div class="word">
                            <h1>{{$info['title']}}<i>&nbsp;</i></h1>
                            <span>{{date('Y.m.d',strtotime('-'.$i.' day'))}}
                                <b>置顶</b>
                            </span>
                            <p>{{$info['article']}}</p>
                        </div>
                    </a>
                </li>
            @endfor
        </ul>
        <div class="pub_fan">
            <a href="">上一页</a>
            <a href="" class="on">1</a>
            @for($i=2;$i<7;$i++)
                @php($info=$data->navigation($firstDomain,$pinyin))
                <a href="{{$info['url']}}" title="第{{$i}}页">{{$i}}</a>
            @endfor
            @php($info=$data->navigation($firstDomain,$pinyin))
            <a href="{{$info['url']}}" title="下一页">下一页</a>
            @php($info=$data->navigation($firstDomain,$pinyin))
            <a href="{{$info['url']}}" title="尾页">尾页</a>
        </div>
    </div>
@endsection
