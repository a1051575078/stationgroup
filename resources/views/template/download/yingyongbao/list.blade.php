@extends('template.download.yingyongbao.layout')
@php($data=app('App\Http\Controllers\CoreController'))
@section('content')
    <div class="category-wrapper clearfix" orgame="1" cateid="0">
        <div class="nav-menu" style="position: fixed; top: 140px;">
            <ul class="menu">
                <li>
                    @php($info=$data->navigation($firstDomain,$pinyin))
                    <a href="{{$info['url']}}" title="{{$info['title']}}">
                        <i class="menu-icon-app"></i>{{$info['title']}}
                    </a>
                    <ul class="menu-junior" data-modname="cates" data-count="22">
                        @php($info=$data->navigation($firstDomain,$pinyin))
                        <li><a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a></li>
                        @php($num=[10,122,102,110,103,108,115,106,101,119,104,114])
                        @for($i=0;$i<12;$i++)
                            @php($info=$data->navigation($firstDomain,$pinyin))
                            <li id="cate--{{$num[$i]}}"><a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a></li>
                        @endfor
                        @php($num=[117,107,112,118,111,109,105,100,113,116])
                        @for($i=0;$i<10;$i++)
                            @php($info=$data->navigation($firstDomain,$pinyin))
                            <li id="cate-{{$num[$i]}}" style="position:absolute;visibility:hidden;"><a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a></li>
                        @endfor
                        <li class="toggle more">
                            @php($info=$data->navigation($firstDomain,$pinyin))
                            <a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}<i class="arrow-icon"></i></a>
                        </li>
                        <li class="fix-margin"></li>
                    </ul>
                </li>
                <li>
                    @php($info=$data->navigation($firstDomain,$pinyin))
                    <a href="{{$info['url']}}" title="{{$info['title']}}"><i class="menu-icon-collection"></i>{{$info['title']}}</a>
                </li>
                <li></li>
            </ul>
            <div></div>
            <div id="J_NavLabel" style="top:44px" data="-1" class="nav-label">
                <span></span>
            </div>
        </div>
        <div class="main">
            <ul class="app-list clearfix" data-placeholderimg="{{$host.'/template/download/yingyongbao/img/placeHolderImg.gif'}}">
                @for($i=0;$i<103;$i++)
                    @php($info=$data->content($firstDomain,$pinyin))
                    <li>
                        <div class="app-info clearfix">
                            <a href="{{$info['url']}}" target="_blank" class="app-info-icon">
                                <img alt="{{$info['title']}}" title="{{$info['title']}}" data-original="{{$host.'/template/download/yingyongbao/img/'.sprintf("%03d",$i+1).'.png'}}" style="background-image: url({{$host.'/template/download/yingyongbao/img/placeHolderImg.gif'}}); display: block;" width="64" height="64" src="{{$host.'/template/download/yingyongbao/img/'.sprintf("%03d",$i+1).'.png'}}"/>
                            </a>
                            <div class="app-info-desc">
                                <a href="{{$info['url']}}" target="_blank" class="name ofh" title="{{$info['title']}}">{{$info['title']}}</a>
                                <span class="size">{{mt_rand(0,999)}}.{{mt_rand(0,9)}}M</span>
                                <span class="download">
                                下载{{mt_rand(0,99)}}亿次
                            </span>
                                <a title="{{$info['title']}}" class="com-install-btn" href="{{$info['url']}}" onclick="qqapp_dl_apk(this);" ex_url="{{$info['url']}}" asistanturlid="990499" appname="{{$info['title']}}" appicon="{{$host.'/template/download/yingyongbao/img/'.sprintf("%03d",$i+1).'.png'}}" apk="com.tencent.mobileqq">安装到手机</a>
                            </div>
                        </div>
                    </li>
                @endfor
            </ul>
            <div id="anchor" class="clear"></div>
            <div class="load-more">
                <div class="loading" style="display: none;"></div>
                <div class="load-more-btn" style="display: block;">去搜索更多</div>
            </div>
        </div>
    </div>
@endsection
