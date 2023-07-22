@php($data=app('App\Http\Controllers\CoreController'))
@extends('template.company.putian.layout')
@section('content')
    <div id="dnn_ctr4663_ContentPane" class="second-content-ct">
        <div id="dnn_ctr4663_ModuleContent" class="DNNModuleContent ModGTModulesCMSC">
            <div>
                <div id="divPortal" portalid="4663"></div>
            </div>
            <input type="hidden" name="dnn$ctr4663$List$ctl01$hfPortalID" id="hfPortalID" value="0"/>
            <div>
                <div id="divPortal" portalid="0"></div>
            </div>
            <input type="hidden" name="dnn$ctr4663$List$ctl01$hfmId" id="hfmId" value="4666"/>
            <input type="hidden" name="dnn$ctr4663$List$ctl01$hfArticleId" id="hfArticleId" value="17485"/>
            <link rel="stylesheet" type="text/css" href="{{$host.'/template/company/putian/css/article.css'}}"/>
            <div class="Gnews-detail">
                <div class="detail-titles">
                    <h1 id="Title">{{$title}}</h1>
                </div>
                <div class="detail-infos">
                    <span class="text">来源：{{$media}}</span>
                    <span class="text">作者：{{$anthor}}</span>
                    <span class="text">时间：</span>
                    <span id="PublishTime">{{date('Y-m-d',time()-config('app.diy.posttime'))}}</span>
                </div>
                <div class="detail-content" id="article_content">
                    <div id="Content">
                        {!!$content!!}
                    </div>
                    <div class="clearB"></div>
                </div>
                <div class="related-news">
                    <div id="RelativeNews" showrows="5" showtime="true" target="_blank"></div>
                    <div id="PreviousNews">上一条:
                        @php($info=$data->content($firstDomain,$pinyin))
                        <a href="{{$info['url']}}" class="nextclass" target="_blank" title="{{$info['title']}}">
                            <span>{{$info['title']}}</span>
                        </a>
                    </div>
                    <div id="NextNews">下一条:
                        @php($info=$data->content($firstDomain,$pinyin))
                        <a href="{{$info['url']}}" class="nextclass" target="_blank" title="{{$info['title']}}">
                            <span>{{$info['title']}}</span>
                        </a>
                    </div>
                </div>
            </div>
            <div id="Globalstech_AjaxLoadingPanel_4663" class="RadAjax RadAjax_Silk" style="display:none;">
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
