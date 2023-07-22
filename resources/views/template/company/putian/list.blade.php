@extends('template.company.putian.layout')
@php($data=app('App\Http\Controllers\CoreController'))
@section('content')
    <div id="dnn_ctr4666_ContentPane" class="second-content-ct">
        <div id="dnn_ctr4666_ModuleContent" class="DNNModuleContent ModGTModulesCMSC">
            <div>
                <div id="divPortal" portalid="4666"></div>
            </div>
            <div id="Content-4666">
                <div class="zgpt-news">
                    <div class="zgpt-news-content">
                        <div class="xwzx-pnews-item xwzx-pnews-item1 ">
                            <div class="xwzx-pnews-item-pic">
                                @php($info=$data->content($firstDomain,$pinyin,$type))
                                <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">
                                    <img border="0" alt="{{$info['title']}}" title="{{$info['title']}}" src="{{$host.'/template/company/putian/img/637546780506620872.jpg'}}"/>
                                </a>
                            </div>
                            <div class="xwzx-pnews-item-you">
                                <div class="xwzx-pnews-item-title clearfix">
                                    <a href="{{$info['url']}}" class="news-title" target="_blank" title="{{$info['title']}}">{{$info['title']}}</a>
                                </div>
                                <div class="xwzx-pnews-item-summary clearfix">
                                    {{$info['article']}}
                                    <a href="{{$info['url']}}">
                                        了解更多&gt;</a>
                                </div>
                            </div>
                        </div>
                        @for($i=2;$i<10;$i++)
                            @php($info=$data->content($firstDomain,$pinyin,$type))
                            <div class="xwzx-news-item xwzx-news-item{{$i}}">
                                <div class="xwzx-news-item-date">
                                    <p>{{date('d',strtotime('-'.($i-2).' day'))}}</p>
                                    {{date('Y.m',strtotime('-'.($i-2).' day'))}}
                                </div>
                                <div class="xwzx-news-item-you">
                                    <div class="xwzx-news-item-title">
                                        <a href="{{$info['url']}}" class="news-title" target="_blank" title="{{$info['title']}}">
                                            {{$info['title']}}
                                        </a>
                                    </div>
                                    <div class="xwzx-news-item-summary">
                                        {{$info['article']}}
                                    </div>
                                </div>
                            </div>
                        @endfor
                        <div class="clearB"></div>
                        <div class="i-pager">
                            <a href="javascript:void(0)" name="gopage" page="1" class="i-pager-item i-pager-item-active">
                                <span>1</span>
                            </a>
                            @for($i=2;$i<11;$i++)
                                @php($info=$data->content($firstDomain,$pinyin))
                                <a href="{{$info['url']}}" name="gopage" page="{{$i}}" class="i-pager-item" title="第{{$i}}页">
                                    <span>{{$i}}</span>
                                </a>
                            @endfor
                            @php($info=$data->content($firstDomain,$pinyin))
                            <a class="i-pager-next" name="gopage" href="{{$info['url']}}" page="2" title="下一页">
                                <span>下一页</span>
                            </a>
                            @php($info=$data->content($firstDomain,$pinyin))
                            @php($count=mt_rand(88,888))
                            <a class="i-pager-last" name="gopage" href="{{$info['url']}}" page="{{ceil($count/10)}}" title="末页">
                                <span>末页</span>
                            </a>
                            <span class="i-pager-info">
                                                    <span class="i-pager-current">第</span>
                                                    <span class="i-pager-info-c">1</span>
                                                    <span class="i-pager-info-p">/{{ceil($count/10)}}</span>
                                                    <span class="i-pager-info-t">总条数:{{$count}}</span>
                                                </span>
                        </div>
                    </div>
                </div>
            </div>
            <div id="Globalstech_AjaxLoadingPanel_4666" class="RadAjax RadAjax_Silk" style="display:none;">
                <div class="raDiv"></div>
                <div class="raColor raTransp"></div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <div class="clearB"></div>
    </div>
@endsection
