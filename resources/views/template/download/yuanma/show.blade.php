@php($data=app('App\Http\Controllers\CoreController'))
@extends('template.download.yuanma.layout')
@section('content')
    <div class="panel-foot">
        <div></div>
    </div>
    </div>
    <div class="panel panel-box-gray">
        <div class="panel-head">
            <div class="inner">
                <h1 class="title">{!!$title!!}</h1>
                <p class="extra">
                    @php($info=$data->content($firstDomain,$pinyin))
                    <a href="{{$info['url']}}" class="jumpto" title="{{$info['title']}}">跳转至下载链接</a>
                </p>
            </div>
        </div>
        <div class="panel-body">
            <div class="software-summary">
                <div class="image">
                    <span>
                        @php($info=$data->content($firstDomain,$pinyin,$type))
                        <a href="{{$info['url']}}" title="{{$info['title']}}">
                            <img src="{{$host.'/template/download/yuanma/img/'.mt_rand(1,10).'.png'}}" alt="{{$info['title']}}"/>
                        </a>
                    </span>
                </div>
                <ul class="clearfix software-infolist">
                    <li>
                        <strong>软件作者:</strong>
                        <span class="author">{{$info['anthor']}}</span>
                    </li>
                    <li class="right monials"></li>
                    <li><strong>软件大小:</strong> {{mt_rand(1,99)}}.{{mt_rand(1,99)}}MB </li>
                    @php($info=$data->navigation($firstDomain,$pinyin))
                    <li class="right"><strong>软件类别:</strong> 国产软件 | <em><a href="{{$info['url']}}">{{$info['title']}}</a></em> </li>
                    <li><strong>软件语言:</strong> 简体中文 </li>
                    <li class="right"><strong>运行环境:</strong> PHP/Mysql  </li>
                    <li><strong>软件评级:</strong> <img src="{{$host.'/template/download/yuanma/img/3star.gif'}}" alt="3星级"/></li>
                    <li class="right"><strong>更新时间:</strong> {{date('Y-m-d H:i:s',time()-config('app.diy.posttime'))}} </li>
                    <li><strong>软件授权:</strong> <em>免费版</em> </li>
                    <li class="right"><strong>插件情况:</strong> <img src="{{$host.'/template/download/yuanma/img/plugin1.gif'}}" alt=""/></li>
                    <li>
                        <strong>相关链接:</strong>
                        @php($info=$data->content($firstDomain,$pinyin))
                        <a href='{{$info['url']}}' title='{{$info['title']}}' target='_blank'>Home Page</a>
                    </li>
                    <li class="right">
                        <strong>演示地址:</strong>
                        <a href='{{$info['url']}}' title='{{$info['title']}}' target='_blank'>Demo Url</a>
                    </li>
                </ul>
            </div>
            <div class="software-ad-img">
                @php($info=$data->content($firstDomain,$pinyin))
                <a href="{{$info['url']}}" target="_blank">
                    <img src="{{$host.'/template/download/yuanma/img/8c26178c573c2318ed670b24d8c2b5c9.jpg'}}" width="230" height="165" border="0"/>
                </a>
            </div>
            <div class="clearfix software-action">
                <p class="vote">
                    <a href="javascript:;" onclick="dprate('soft','1','38901');" class="support" id="rate1">支持(<span id="rate1value">{{mt_rand(1,999)}}</span>)</a><a href="javascript:;" class="oppose" id="rate2" onclick="dprate('soft','2','38901');">反对(<span id="rate2value">{{mt_rand(1,999)}}</span>)</a>
                </p>
                <p class="adctions">
                    <span class="button btn-read">
                        <span class="inner">
                            @php($info=$data->content($firstDomain,$pinyin))
                            <a href="{{$info['url']}}" class='addFavorites' title="{{$info['title']}}">加入收藏夹 </a>
                        </span>
                    </span>
                    <span class="button btn-favorite">
                        <span class="inner">
                            @php($info=$data->content($firstDomain,$pinyin))
                            <a href="javascript:;" onclick="openDialog('{{$info['url']}}',function(r){
                                document.getElementById('wen_collections').innerHTML='('+r+')';  })" title="{{$info['title']}}">收藏订阅
                                <em id="wen_collections">({{mt_rand(1,999)}})</em>
                            </a>
                        </span>
                    </span>
                    <span class="button btn-discuss">
                        <span class="inner">
                            @php($info=$data->content($firstDomain,$pinyin))
                            <a target="_blank" href="{{$info['url']}}">发起讨论</a>
                        </span>
                    </span>
                    <span class="button btn-violation">
                        <span class="inner">
                            @php($info=$data->content($firstDomain,$pinyin))
                            <a href="javascript:;" onclick="openDialog('{{$info['url']}}')" title="{{$info['title']}}">违规举报</a>
                        </span>
                    </span>
                    <span class="button btn-share">
                        <span class="inner">
                            @php($info=$data->content($firstDomain,$pinyin))
                            <a href="javascript:;" onclick="openDialog('{{$info['url']}}')" title="">好友分享</a>
                        </span>
                    </span>
                </p>
            </div>
        </div>
        <div class="panel-foot">
            <div></div>
        </div>
    </div>
    <div class="clearfix layout-detail-cols2 cols2">
        <div class="col1">
            <div class="panel panel-box-gray">
                <div class="panel-head">
                    <div class="inner">
                        <h3 class="title">软件介绍</h3>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="software-intro">
                        <div>{!!$content!!}</div>
                    </div>
                    <div class="text_tag">
                        <h5>Tags：
                            <b><em>{!!$title!!}源码</em></b> &nbsp;
                            <b><em>{!!$title!!}系统源码</em></b> &nbsp;
                            <b><em>多用户{!!$title!!}系统源码</em></b> &nbsp;
                            <b><em>DSMa</em></b> &nbsp;
                        </h5>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="panel-foot">
                    <div></div>
                </div>
            </div>
            <div class="panel panel-box-gray">
                <div class="panel-head">
                    <div class="inner">
                        <h3 class="title">页面截图展示</h3>
                    </div>
                </div>
                <div class="panel-body">
                    <span class="turnleft" id="screenshot_left">上一张</span>
                    <div class="software-image" id="software_screenshot">
                        <div class="clearfix image-inner" id="software_screenshot_inner">
                            @for($i=0;$i<4;$i++)
                                @php($info=$data->content($firstDomain,$pinyin))
                                <a target=_blank href='{{$info['url']}}'>
                                    <img src='{{$host.'/template/download/yuanma/img/'.mt_rand(1,10).'.png'}}'/>&nbsp;
                                </a>
                            @endfor
                        </div>
                    </div>
                    <span class="turnright" id="screenshot_right">下一张</span>
                </div>
                <div class="panel-foot">
                    <div></div>
                </div>
            </div>
            <div class="b_g_guang">
                <div class="bai_g">
                    <script>propagate('s1715190599835726', getCurrentScript())</script>
                </div>
                <div class="gu_g">
                    <script>propagate('s1715190612394986', getCurrentScript())</script>
                </div>
            </div>
            <div class="panel panel-box-gray" id="down">
                <div class="panel-head">
                    <div class="inner">
                        <h3 class="title">
                            <a name="down" title="{!!$title!!}"></a>{!!$title!!} <em>已被下载
                                <span id="allhits" name="allhits">
                                    {{mt_rand(999,9999)}}
                                </span>次
                            </em>
                        </h3>
                    </div></div>
                <div class="panel-body">
                    <ul class="software-download">
                        @for($i=0;$i<7;$i++)
                            <li>
                                @php($info=$data->content($firstDomain,$pinyin))
                                <a href='{{$info['url']}}' target='_blank'  title="{{$info['title']}}">
                                    <em class="icon">.</em>
                                    <span class="title">{{$info['title']}}</span>
                                    @php($info=$data->navigation($firstDomain,$pinyin))
                                    <em>[{{$info['title']}}]</em>
                                </a>
                            </li>
                        @endfor
                    </ul>
                    <div class="download-ad-img">
                        <script>propagate('s1715190927480079', getCurrentScript())</script>
                    </div>
                </div>
                <div class="panel-foot">
                    <div></div>
                </div>
            </div>
        </div>
        <div class="col2">
            <div class="bai_r panel"></div>
            <div class="toprecommend">
                <ul class="tabber">
                    <li>
                        <a href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}" class="current">热门源码推荐</a>
                    </li>
                    <li>
                        <a href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}">热门软件推荐</a>
                    </li>
                </ul>
                <div class="toprecommend-list">
                    <ul style="display: block;">
                        @for($i=0;$i<8;$i++)
                            <li>
                                @php($info=$data->content($firstDomain,$pinyin,$type))
                                <a href="{{$info['url']}}" target="_blank">
                                    <img src="{{$host.'/template/download/yuanma/img/'.mt_rand(5,53).'.gif'}}">
                                    <strong>{{$info['title']}}</strong>
                                    {{$info['article']}}
                                </a>
                            </li>
                        @endfor
                    </ul>
                    <ul style="display: none;">
                        @for($i=0;$i<8;$i++)
                            <li>
                                @php($info=$data->content($firstDomain,$pinyin,$type))
                                <a href="{{$info['url']}}" target="_blank">
                                    <img src="{{$host.'/template/download/yuanma/img/'.mt_rand(5,53).'.gif'}}">
                                    <strong>{{$info['title']}}</strong>
                                    {{$info['article']}}
                                </a>
                            </li>
                        @endfor
                    </ul>
                </div>
            </div>
            <div class="panel panel-aside-green">
                <div class="panel-head"><div class="inner">
                        <h3 class="title">本类月下载排行</h3>
                        <p class="extra">
                            @php($info=$data->navigation($firstDomain,$pinyin))
                            <a href="{{$info['url']}}" class="more">更多 &raquo;</a>
                        </p>
                    </div>
                </div>
                <div class="panel-body">
                    <ul class="toprank">
                        @for($i=0;$i<10;$i++)
                            <li>
                                <em class="t-{{$i+1}}"></em>
                                @php($info=$data->content($firstDomain,$pinyin))
                                <a href="{{$info['url']}}" title="{{$info['title']}}" target="_blank">{{$info['title']}}</a>
                            </li>
                        @endfor
                    </ul>
                </div>
                <div class="panel-foot">
                    <div></div>
                </div>
            </div>
            <div class="ym_tag">
                <div class="title">热门资源推荐</div>
                <div class="list">
                    @for($i=0;$i<10;$i++)
                        @php($info=$data->navigation($firstDomain,$pinyin))
                        <a {{mt_rand(1,100)%2?'style=color:#'.mt_rand(100000,999999):''}} href="{{$info['url']}}">{{$info['title']}}</a>
                    @endfor
                </div>
            </div>
        </div>
    </div>
@endsection
