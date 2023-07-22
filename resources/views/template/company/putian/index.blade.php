@php($data=app('App\Http\Controllers\CoreController'))
@extends('template.company.putian.layout')
@section('content')
    <div id="dnn_ContentPane" class="banner">
        <div class="DnnModule DnnModule-DNN_HTML DnnModule-11766">
            <a id="11766" name="11766" class="module"></a>
            <div class="GoneContainer_without_title">
                <div id="dnn_ctr11766_ContentPane">
                    <div id="dnn_ctr11766_ModuleContent" class="DNNModuleContent ModDNNHTMLC">
                        <div id="dnn_ctr11766_HtmlModule_lblContent" class="Normal">
                            <div id="banner">
                                <ul class="pics">
                                    <li class="b1" style="display: block;background-image:url({{$host.'/template/company/putian/img/637538212059091579.jpg'}});">
                                        @php($info=$data->navigation($firstDomain,$pinyin))
                                        <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}"></a>
                                    </li>
                                    <li class="b2" style="background-image:url({{$host.'/template/company/putian/img/637502796909111115.jpg'}});"></li>
                                    <li class="b3" style="background-image:url({{$host.'/template/company/putian/img/637296261575275706.jpg'}});"></li>
                                    <li class="b4" style="background-image:url({{$host.'/template/company/putian/img/637296271099806998.jpg'}});">&nbsp;</li>
                                    <li class="b5" style="background-image:url({{$host.'/template/company/putian/img/637383508686335571.jpg'}});">
                                        @php($info=$data->navigation($firstDomain,$pinyin))
                                        <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}"></a>
                                    </li>
                                    <li class="b6" style="background-image:url({{$host.'/template/company/putian/img/636858200645212749.jpg'}});"></li>
                                </ul>
                                <div class="btns">
                                    <a class="prev" href="javascript:void(0);">
                                        <span class="off"></span>
                                        <span class="on"></span>
                                    </a>
                                    <a class="next" href="javascript:void(0);">
                                        <span class="off"></span>
                                        <span class="on"></span>
                                    </a>
                                </div>
                                <div class="g-wrap">
                                    <ul class="idxs">
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="dnn_otherPane" class="other">
        <div class="DnnModule DnnModule-GTModulesCMS DnnModule-4642">
            <a id="4642" name="4642" class="module"></a>
            <div class="GoneContainer_without_title">
                <div id="dnn_ctr4642_ContentPane">
                    <div id="dnn_ctr4642_ModuleContent" class="DNNModuleContent ModGTModulesCMSC">
                        <div>
                            <div id="divPortal" portalid="4642"></div>
                        </div>
                        <div id="Content-4642">
                            <div class="other-module">
                                <div class="other-module-con">
                                    @php($img=['637001066996543987.jpg','637001064960274476.jpg','637001049101387805.jpg'])
                                    @for($i=0;$i<3;$i++)
                                        @php($info=$data->navigation($firstDomain,$pinyin))
                                        <div class="other-item other-item{{$i+1}}">
                                            <div class="other-item-pic">
                                                <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">
                                                    <img border="0" alt="{{$info['title']}}" title="{{$info['title']}}" src="{{$host.'/template/company/putian/img/'.$img[$i]}}"/>
                                                </a>
                                            </div>
                                            <div class="otherall">
                                                <div class="other-item-title">
                                                    <a href="{{$info['url']}}" class="news-title" target="_blank" title="{{$info['title']}}">{{$info['title']}}</a>
                                                </div>
                                                <div class="other-item-sum"></div>
                                            </div>
                                        </div>
                                    @endfor
                                    <div class="classB"></div>
                                </div>
                            </div>
                            <style>
                                .other{height:302px;}
                                .other-item-sum{height:12px;}
                            </style>
                        </div>
                        <div id="Globalstech_AjaxLoadingPanel_4642" class="RadAjax RadAjax_Silk" style="display:none;">
                            <div class="raDiv"></div>
                            <div class="raColor raTransp"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-news">
        <div id="dnn_PicnewsPane" class="picnews">
            <div class="DnnModule DnnModule-GTModulesCMS DnnModule-4624">
                <a id="4624" name="4624" class="module"></a>
                <div class="GoneContainer_without_title">
                    <div id="dnn_ctr4624_ContentPane">
                        <div id="dnn_ctr4624_ModuleContent" class="DNNModuleContent ModGTModulesCMSC">
                            <div>
                                <div id="divPortal" portalid="4624"></div>
                            </div>
                            <div id="Content-4624">
                                <div class="pic-module">
                                    <div class="pic-module-title">新闻中心</div>
                                    <div class="pic-module-con">
                                        @php($img=['637538215488476306.jpg','637517687039447995.jpg'])
                                        @for($i=0;$i<2;$i++)
                                            @php($info=$data->content($firstDomain,$pinyin,$type))
                                            <div class="pic-item">
                                                <div class="pic-item-title">
                                                    <a href="{{$info['url']}}" class="news-title" target="_blank" title="{{$info['title']}}">{{$info['title']}}</a>
                                                </div>
                                                <div class="pic-item-pic">
                                                    <a href="javascript:;" target="_blank" title="{{$info['title']}}">
                                                        <img border="0" alt="{{$info['title']}}" src="{{$host.'/template/company/putian/img'.'/'.$img[$i]}}" title="{{$info['title']}}"/>
                                                    </a>
                                                </div>
                                                <div class="pic-item-outer">
                                                    <div class="pic-item-sum">
                                                        {{$info['article']}}
                                                    </div>
                                                    <div class="pic-item-date">
                                                        [{{date('m-d',strtotime('-'.$i.' day'))}}]
                                                    </div>
                                                </div>
                                                <div class="clearB"></div>
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                            <div id="Globalstech_AjaxLoadingPanel_4624" class="RadAjax RadAjax_Silk" style="display:none;">
                                <div class="raDiv"></div>
                                <div class="raColor raTransp"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="dnn_TextnewsPane" class="textnews"><div class="DnnModule DnnModule-DNN_HTML DnnModule-4625">
                <a id="4625" name="4625" class="module"></a>
                <div class="GoneContainer_without_title">
                    <div id="dnn_ctr4625_ContentPane">
                        <div id="dnn_ctr4625_ModuleContent" class="DNNModuleContent ModDNNHTMLC">
                            <div id="dnn_ctr4625_HtmlModule_lblContent" class="Normal">
                                <div class="i-tabs i-tabs-news">
                                    <div class="i-tabs-nav">
                                        <div class="i-tabs-items">
                                            <span class="i-tabs-item i-tabs-item-active" mid="4626">
                                                @php($info=$data->navigation($firstDomain,$pinyin))
                                                <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">{{$info['title']}}</a>
                                            </span>
                                            <span>|</span>
                                            <span class="i-tabs-item" mid="4627">
                                                @php($info=$data->navigation($firstDomain,$pinyin))
                                                <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">{{$info['title']}}</a>
                                            </span>
                                            <span>|</span>
                                            <span class="i-tabs-item" mid="11644">
                                                @php($info=$data->navigation($firstDomain,$pinyin))
                                                <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">{{$info['title']}}</a>
                                            </span>
                                            <span>|</span>
                                            <span class="i-tabs-item" mid="4630">
                                                @php($info=$data->navigation($firstDomain,$pinyin))
                                                <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">{{$info['title']}}</a>
                                            </span>
                                            <span>|</span>
                                            <span class="i-tabs-item" mid="4632">
                                                @php($info=$data->navigation($firstDomain,$pinyin))
                                                <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">{{$info['title']}}</a>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="i-tabs-container"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="DnnModule DnnModule-GTModulesCMS DnnModule-4626">
                <a id="4626" name="4626" class="module"></a>
                <div class="GoneContainer_without_title">
                    <div id="dnn_ctr4626_ContentPane">
                        <div id="dnn_ctr4626_ModuleContent" class="DNNModuleContent ModGTModulesCMSC">
                            <div>
                                <div id="divPortal" portalid="4626"></div>
                            </div>
                            <div id="Content-4626">
                                <div class="news-module">
                                    <div class="news-module-con">
                                        @for($i=0;$i<9;$i++)
                                            @php($info=$data->content($firstDomain,$pinyin))
                                            <div class="news-item">
                                                <div class="news-item-title">
                                                    <a href="{{$info['url']}}" class="news-title" target="_blank" title="{{$info['title']}}">{{$info['title']}}</a>
                                                </div>
                                                <div class="news-item-date">[{{date('m-d',strtotime('-'.$i.' day'))}}]</div>
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                            <div id="Globalstech_AjaxLoadingPanel_4626" class="RadAjax RadAjax_Silk" style="display:none;">
                                <div class="raDiv"></div>
                                <div class="raColor raTransp"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="DnnModule DnnModule-GTModulesCMS DnnModule-4627">
                <a id="4627" name="4627" class="module"></a>
                <div class="GoneContainer_without_title">
                    <div id="dnn_ctr4627_ContentPane">
                        <div id="dnn_ctr4627_ModuleContent" class="DNNModuleContent ModGTModulesCMSC">
                            <div>
                                <div id="divPortal" portalid="4627"></div>
                            </div>
                            <div id="Content-4627">
                                <div class="news-module">
                                    <div class="news-module-con">
                                        @for($i=0;$i<9;$i++)
                                            @php($info=$data->content($firstDomain,$pinyin))
                                            <div class="news-item">
                                                <div class="news-item-title">
                                                    <a href="{{$info['url']}}" class="news-title" target="_blank" title="{{$info['title']}}">{{$info['title']}}</a>
                                                </div>
                                                <div class="news-item-date">[{{date('m-d',strtotime('-'.$i.' day'))}}]</div>
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                            <div id="Globalstech_AjaxLoadingPanel_4627" class="RadAjax RadAjax_Silk" style="display:none;">
                                <div class="raDiv"></div>
                                <div class="raColor raTransp"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="DnnModule DnnModule-GTModulesCMS DnnModule-4630">
                <a id="4630" name="4630" class="module"></a>
                <div class="GoneContainer_without_title">
                    <div id="dnn_ctr4630_ContentPane">
                        <div id="dnn_ctr4630_ModuleContent" class="DNNModuleContent ModGTModulesCMSC">
                            <div>
                                <div id="divPortal" portalid="4630"></div>
                            </div>
                            <div id="Content-4630">
                                <div class="news-module">
                                    <div class="news-module-con">
                                        @for($i=0;$i<9;$i++)
                                            @php($info=$data->content($firstDomain,$pinyin))
                                            <div class="news-item">
                                                <div class="news-item-title">
                                                    <a href="{{$info['url']}}" class="news-title" target="_blank" title="{{$info['title']}}">{{$info['title']}}</a>
                                                </div>
                                                <div class="news-item-date">[{{date('m-d',strtotime('-'.$i.' day'))}}]</div>
                                                <div class="clearB"></div>
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                            <div id="Globalstech_AjaxLoadingPanel_4630" class="RadAjax RadAjax_Silk" style="display:none;">
                                <div class="raDiv"></div>
                                <div class="raColor raTransp"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="DnnModule DnnModule-GTModulesCMS DnnModule-4632">
                <a id="4632" name="4632" class="module"></a>
                <div class="GoneContainer_without_title">
                    <div id="dnn_ctr4632_ContentPane">
                        <div id="dnn_ctr4632_ModuleContent" class="DNNModuleContent ModGTModulesCMSC">
                            <div>
                                <div id="divPortal" portalid="4632"></div>
                            </div>
                            <div id="Content-4632">
                                <div class="news-module">
                                    <div class="news-module-con">
                                        @for($i=0;$i<9;$i++)
                                            @php($info=$data->content($firstDomain,$pinyin))
                                            <div class="news-item">
                                                <div class="news-item-title">
                                                    <a href="{{$info['url']}}" class="news-title" target="_blank" title="{{$info['title']}}">{{$info['title']}}</a>
                                                </div>
                                                <div class="news-item-date">[{{date('m-d',strtotime('-'.$i.' day'))}}]</div>
                                                <div class="clearB"></div>
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                            <div id="Globalstech_AjaxLoadingPanel_4632" class="RadAjax RadAjax_Silk" style="display:none;">
                                <div class="raDiv"></div>
                                <div class="raColor raTransp"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="DnnModule DnnModule-GTModulesCMS DnnModule-11644">
                <a id="11644" name="11644" class="module"></a>
                <div class="GoneContainer_without_title">
                    <div id="dnn_ctr11644_ContentPane">
                        <div id="dnn_ctr11644_ModuleContent" class="DNNModuleContent ModGTModulesCMSC">
                            <div>
                                <div id="divPortal" portalid="11644"></div>
                            </div>
                            <div id="Content-11644">
                                <div class="news-module">
                                    <div class="news-module-con">
                                        @for($i=0;$i<9;$i++)
                                            @php($info=$data->content($firstDomain,$pinyin))
                                            <div class="news-item">
                                                <div class="news-item-title">
                                                    <a href="{{$info['url']}}" class="news-title" target="_blank" title="{{$info['title']}}">{{$info['title']}}</a>
                                                </div>
                                                <div class="news-item-date">[{{date('m-d',strtotime('-'.$i.' day'))}}]</div>
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                            <div id="Globalstech_AjaxLoadingPanel_11644" class="RadAjax RadAjax_Silk" style="display:none;">
                                <div class="raDiv"></div>
                                <div class="raColor raTransp"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearB"></div>
    </div>
@endsection
