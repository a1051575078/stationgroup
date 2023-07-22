@php($data=app('App\Http\Controllers\CoreController'))
@extends('template.company.wangwangjituan.layout')
@section('content')
    <div class="join">
        <div class="content">
            <div class="box1">
                <div class="box-new">
                    <div class="title">
                        <div class="tits">{{$title}}</div>
                        <div class="txt">
                            {!!$content!!}
                            <p>旺旺集团招商热线：021-61151191；</p>
                            <p>周一至周五 8:30-12:00 13:00-17:30，节假日除外。</p>
                        </div>
                    </div>
                    <div class="tableBox">
                        <div class="t2"><span>* </span>意向产品：</div>(点击以下图标了解产品详情)
                    </div>
                </div>
                <div class="img">
                    <img width="100%" src="{{$host.'/template/company/wangwangjituan/img/join_img.png'}}" title="背景图" alt="背景图">
                </div>
            </div>
            <div class="box2">
                <div class="tBox f-cb" id="ProBox">
                    @php($img=['mg.png','rp.png','yz.png','mt.png','ph.png','nt.png','rt.png','dg.png','hw.png','gb.png','gd.png','yl.png','mm.png','jiupin.png','bangde.png','laren.png','queen.png','fix.png','wl.png','bp.png','sz.png','ll.png','azz.png','bbmm.png'])
                    @for($i=0;$i<24;$i++)
                        @php($info=$data->navigation($firstDomain,$pinyin))
                        <div class="t">
                            <a href="{{$info['url']}}" ordinal="2" target="_blank" class="linkpc">
                                <img src="{{$host.'/template/company/wangwangjituan/img/'.$img[$i]}}" title="{{$info['title']}}" alt="{{$info['title']}}">
                            </a>
                            <div class="tits">
                                {{$info['title']}}
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
@endsection
