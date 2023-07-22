@extends('template.company.dianligongsi.layout')
@php($data=app('App\Http\Controllers\CoreController'))
@section('content')
    <ul objparam="titlenum:25,pagesize:20" tag="_columninfolist" objid="6016" class="list">
        @for($i=0;$i<10;$i++)
            <li>
                @php($info=$data->content($firstDomain,$pinyin))
                <a target="_self" href="{{$info['url']}}" title="{{$info['title']}}">
                    {{$info['title']}}
                </a>
                <span>{{date('Y-m-d',strtotime('-'.$i.' day'))}}</span>
            </li>
        @endfor
    </ul>
    <div class='pagenav'>
        <form name='fsmformvalue' action='?' method='post'>
            <span id='pagenavpagecount'>分<b>1</b>页</span>
            <span id='pagenavcurrpage'>当前&nbsp;第<b>1</b>页</span>
            <span class='pagenavnav1'>首页</span>
            <span class='pagenavnav1'>上一页</span>
            <span class='pagenavnav1'>下一页</span>
            <span class='pagenavnav1'>末页</span>
            <span class='pagenavgo'>
                                <input class='pagenavbtngo' type='button' value='GO' onclick="var __page_=parseInt(document.all.page.value);var __actionurl_=document.all.__actionURL.value;var __total_=document.all.__totalpage.value;__page_=(isNaN(__page_)?1:__page_);__page_=(__page_<1?1:__page_);__page_=(__page_>__total_?__total_:__page_);var __tourl_=__actionurl_.replace(999999,__page_);window.location=__tourl_;"/>
                                <input type='text' name='page' value='1' class='pagenavpage'/>页
                            </span>
            <input type='hidden' name='__totalpage' value='1'/>
            @php($info=$data->navigation($firstDomain,$pinyin))
            <input type='hidden' name='__actionURL' value='{{$info['url']}}'/>
        </form>
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection
