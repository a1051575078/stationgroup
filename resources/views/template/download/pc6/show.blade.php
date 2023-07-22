@php($data=app('App\Http\Controllers\CoreController'))
@extends('template.download.pc6.layout')
@section('content')
    <link href="{{$host.'/template/download/pc6/css/azdown.min.css'}}" type="text/css" rel="stylesheet"/>
    <dl id="mbody">
        <dt id="fast-nav" class="seat">您的位置：
            <a href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}" title="首页">首页</a>  →
            @php($banben='v'.mt_rand(0,9).mt_rand(0,9).mt_rand(0,9))
            {{$title}} {{$banben}}
        </dt>
        <dd id="dinfo" sid="658533" cid="592" off="0" tort="0">
            <p id="dico">
                @php($rand=sprintf("%03d",(mt_rand(20,250))))
                <img src="{{$host.'/template/download/pc6/img/'.$rand.'.png'}}" alt="{{$title}}" title="{{$title}}"><span></span>
            </p>
            <h1>{{$title}}</h1>
            <p id="fkey">{{$title}}</p>
            <ul id="dbtns">
                <li id="azbtn"><b>安卓版下载</b><i></i>
                    <p><img src="{{$host.'/template/download/pc6/img/pic.png'}}" alt="二维码" title="二维码"/>手机扫描下载</p>
                </li>
                <li id="pgbtn">
                    @php($info=$data->navigation($firstDomain,$pinyin))
                    <a target="_blank" href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a><i></i>
                    <p><img alt="二维码" src="{{$host.'/template/download/pc6/img/pic.png'}}" title="二维码"/>手机扫描下载</p>
                </li>
                <li id="pcbtn">
                    @php($info=$data->navigation($firstDomain,$pinyin))
                    <a target="_blank" href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                </li>
            </ul>
            <ul class="aztop">
                <li id="showding"><em class="showDinNum">{{mt_rand(100,999)}}</em></li>
                <li id="showcai"><em class="showDinNum">{{mt_rand(100,999)}}</em></li>
            </ul>
            <p class="base">
                @php($info=$data->navigation($firstDomain,$pinyin))
                <i>类型：<a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a></i>
                <i>版本：{{$banben}}</i>
                <i>大小：{{mt_rand(10,99)}}.{{mt_rand(10,99)}}M</i>
                <i>更新：{{date('Y-m-d H:i',time()-config('app.diy.posttime'))}}</i>
                <i>语言：简体</i>
                <i>等级：<span class="lstar6"></span></i>
                <i class="isbn">版号：<span>ISBN 978-7-498-06474-5</span></i>
                <i class="website">官网：<span>{{$firstDomain}}</span></i>
                <i class="system">作者：<s title="{{$anthor}}">{{$anthor}}</s></i>
                @php($info=$data->navigation($firstDomain,$pinyin))
                <i>厂商：<a href="{{$info['url']}}" target="_blank" title="{{$title}}">{{$title}}</a></i>
            </p>
            <dl class="xgtag">
                <dt>相关标签</dt>
                <dd>
                    @for($i=0;$i<6;$i++)
                        @php($info=$data->navigation($firstDomain,$pinyin))
                        <a href="{{$info['url']}}" target="_blank" class="c{{$i+1}}" title="{{$info['title']}}">{{$info['title']}}</a>
                    @endfor
                </dd>
            </dl>
            <dl class="ilist company">
                <dt>
                    @php($info=$data->navigation($firstDomain,$pinyin))
                    <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">{{$info['title']}}</a>同厂商app
                </dt>
                <dd>
                    @for($i=0;$i<8;$i++)
                        @php($info=$data->content($firstDomain,$pinyin))
                        @php($rand=sprintf("%03d",mt_rand(20,250)))
                        <p>
                            <a href="{{$info['url']}}" title="{{$info['title']}}">
                                <img src="{{$host.'/template/download/pc6/img'.'/'.$rand.'.png'}}" alt="{{$info['title']}}" title="{{$info['title']}}"/>
                                <i>{{$info['title']}}</i>
                            </a>
                            <span>{{mt_rand(0,9)}}.{{mt_rand(0,99)}}G</span>
                            @php($info=$data->navigation($firstDomain,$pinyin))
                            <span>{{$info['title']}}</span>
                        </p>
                    @endfor
                </dd>
            </dl>
            <dl class="ilist">
                <dt>推荐软件</dt>
                <dd>
                    @for($i=0;$i<8;$i++)
                        @php($info=$data->content($firstDomain,$pinyin))
                        @php($rand=sprintf("%03d",mt_rand(20,250)))
                        <p>
                            <a href="{{$info['url']}}" title="{{$info['title']}}">
                                <img src="{{$host.'/template/download/pc6/img'.'/'.$rand.'.png'}}" alt="{{$info['title']}}" title="{{$info['title']}}"/><i>{{$info['title']}}</i>
                            </a>
                            <span>{{mt_rand(0,9)}}.{{mt_rand(0,99)}}G</span>
                            <span>v{{mt_rand(0,9)}}.{{mt_rand(0,9)}}.{{mt_rand(0,9)}}</span>
                        </p>
                    @endfor
                </dd>
            </dl>
        </dd>
        <dd id="dcont">
            <dl id="main" class="detail-wrap">
                <dt class="tab" style="height: 54px;">
                    <p class="tablist has6">
                        <span class="cur">游戏介绍</span>
                        <span>相关视频</span>
                        <span>相关文章</span>
                        <span>评论<i>{{mt_rand(0,999)}}</i></span>
                        <span id="qkdown">下载地址</span>
                    </p>
                </dt>
                <dd id="picShow">
                    <div class="pic-srcoll2">
                        <ul id="imageShots">
                            @for($i=0;$i<5;$i++)
                                @php($info=$data->content($firstDomain,$pinyin))
                                @php($rand=sprintf("%03d",mt_rand(251,296)))
                                <li class="shutu">
                                    <img src="{{$host.'/template/download/pc6/img'.'/'.$rand.'.png'}}" data-lightbox="lightbox-img" alt="{{$info['title']}}" title="{{$info['title']}}"/>
                                </li>
                            @endfor
                        </ul>
                    </div>
                    <em class="hScrollPane_leftarrow" data-target="#imageShots" style="display: none;">&lt;</em>
                    <em class="hScrollPane_rightarrow" data-target="#imageShots" style="display: none;">&gt;</em>
                </dd>
                <dd id="soft-info">
                    <div class="intro-txt f-mode" style="height: 1080px;">
                        @php($info=$data->navigation($firstDomain,$pinyin))
                        <p>　　{{$title}}是一款刺激的<a href="{{$info['url']}}" title="{{$info['title']}}" target="_blank">{{$info['title']}}</a>应用，{{$title}}画面华丽真实，还有各种炫酷的服装造型供玩家选择，{{$title}}上与队友一起震撼开战。</p>
                        <p style="text-align:center;">
                            @for($i=0;$i<2;$i++)
                                @php($rand=sprintf("%03d",mt_rand(251,296)))
                                <img src="{{$host.'/template/download/pc6/img'.'/'.$rand.'.png'}}" alt="{{$title}}" width="300" height="500" border="0" vspace="0" title="{{$title}}" style="width: 300px; height: 500px;"/>
                            @endfor
                        </p>
                        <p class="introTit">app介绍</p>
                        <p>　　{{$title}}是一款腾讯推出的第一人称视角app</p>
                        {!!$content!!}
                    </div>
                    <span class="moreBtn">查看全部内容</span>
                </dd>
                <dd class="enjoy-box">
                    <p class="introTit">精品推荐</p>
                    <p class="enjoy clearfix">
                        @for($i=0;$i<6;$i++)
                            @php($info=$data->content($firstDomain,$pinyin))
                            @php($rand=sprintf("%03d",mt_rand(20,250)))
                            <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">
                                <img src="{{$host.'/template/download/pc6/img'.'/'.$rand.'.png'}}" title="{{$info['title']}}" alt="{{$info['title']}}"/>{{$info['title']}}
                            </a>
                        @endfor
                    </p>
                </dd>
                <dd class="xgbb">
                    <p class="introTit">{{$title}}相关版本</p>
                    <ul>
                        <li>
                            <a href="{{$info['url']}}" class="seem" target="_blank" title="{{$info['title']}}">查看详情</a>
                            <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">{{$title}}黄金岛体验服 v{{mt_rand(0,9)}}.{{mt_rand(0,99)}}.{{mt_rand(0,99)}}</a>
                            <span class="lstar{{mt_rand(0,5)}}"></span>
                            <i>{{mt_rand(0,9)}}.{{mt_rand(0,99)}}G</i>
                        </li>
                    </ul>
                </dd>
                <dd class="dptd">
                    <p class="introTit">{{$title}}多平台下载</p>
                    <p class="dtab">
                        <span class="cur">Android版</span>
                        <span>iPhone版</span>
                        <span>PC版</span>
                    </p>
                    <ul class="addlist">
                        <li class="address-wrap azaddr on">
                            <s>Android版</s>
                            @php($info=$data->content($firstDomain,$pinyin))
                            <a href="{{$info['url']}}" id="658533" class="xq" title="{{$info['title']}}"></a>
                            <h3><a href="{{$info['url']}}" id="658533" target="_blank" class="xq nohover" style="cursor: default;" title="{{$info['title']}}">{{$info['title']}} v{{mt_rand(0,9)}}.{{mt_rand(0,9)}}.{{mt_rand(0,9)}}</a></h3>
                            <ul class="ul_Address">
                                <li class="address_like">
                                    <a href="{{$info['url']}}" onmousedown="softCountNew(658533,903599)">官方地址</a>
                                </li>
                            </ul>
                        </li>
                        <li class="address-wrap">
                            <s>iPhone版</s>
                            @php($info=$data->content($firstDomain,$pinyin))
                            <a href="{{$info['url']}}" id="665149" class="xq" title="{{$info['title']}}"></a>
                            <h3><a href="{{$info['url']}}" id="665149" target="_blank" class="xq" title="{{$info['title']}}">{{$info['title']}} v{{mt_rand(0,9)}}.{{mt_rand(0,9)}}.{{mt_rand(0,9)}}</a></h3>
                            <ul class="ul_Address">
                                <li class="address_like">
                                    <a href="{{$info['url']}}" onmousedown="softCountNew(665149,903662)">官方地址</a>
                                </li>
                            </ul>
                        </li>
                        <li class="address-wrap">
                            <s>PC版</s>
                            @php($info=$data->content($firstDomain,$pinyin))
                            <a href="{{$info['url']}}" id="665146" class="xq" title="{{$info['title']}}"></a>
                            <h3><a href="{{$info['url']}}" id="665146" target="_blank" class="xq" title="{{$info['title']}}">{{$info['title']}} v{{mt_rand(0,9)}}.{{mt_rand(0,9)}}.{{mt_rand(0,9)}}</a></h3>
                            <ul class="ul_Address">
                                <li class="address_like">
                                    <a href="{{$info['url']}}" onmousedown="softCountNew(665146,946605)">官方地址</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </dd>
                <dd id="xgsp"><p class="introTit">{{$title}}相关视频</p>
                    <div class="sp-wrap">
                        <ul class="clearfix" style="width: 3675px;">
                            <li>
                                @php($info=$data->content($firstDomain,$pinyin))
                                <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">
                                    <img src="{{$host.'/template/download/pc6/img/1.jpeg'}}" title="{{$info['title']}}" alt="{{$info['title']}}"/>
                                    <s></s><i></i>
                                    <span>{{$title}}怎么设置操作</span>
                                </a>
                            </li>
                            <li>
                                @php($info=$data->content($firstDomain,$pinyin))
                                <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">
                                    <img src="{{$host.'/template/download/pc6/img/2.jpeg'}}" title="{{$info['title']}}" alt="{{$info['title']}}"/>
                                    <s></s><i></i>
                                    <span>{{$title}}怎么改性别</span>
                                </a>
                            </li>
                            <li>
                                @php($info=$data->content($firstDomain,$pinyin))
                                <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">
                                    <img src="{{$host.'/template/download/pc6/img/3.jpeg'}}" title="{{$info['title']}}" alt="{{$info['title']}}"/>
                                    <s></s><i></i>
                                    <span>{{$title}}语音包在哪里设置</span>
                                </a>
                            </li>
                            <li>
                                @php($info=$data->content($firstDomain,$pinyin))
                                <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">
                                    <img src="{{$host.'/template/download/pc6/img/4.jpeg'}}" title="{{$info['title']}}" alt="{{$info['title']}}"/>
                                    <s></s><i></i>
                                    <span>{{$title}}怎么换衣服</span>
                                </a>
                            </li>
                            <li>
                                @php($info=$data->content($firstDomain,$pinyin))
                                <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">
                                    <img src="{{$host.'/template/download/pc6/img/5.jpeg'}}" title="{{$info['title']}}" alt="{{$info['title']}}"/>
                                    <s></s><i></i>
                                    <span>{{$title}}怎么换头像不跟微信一样的</span>
                                </a>
                            </li>
                            <li>
                                @php($info=$data->content($firstDomain,$pinyin))
                                <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">
                                    <img src="{{$host.'/template/download/pc6/img/6.jpeg'}}" title="{{$info['title']}}" alt="{{$info['title']}}"/>
                                    <s></s><i></i>
                                    <span>手机{{$title}}怎么删除好友</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <s class="prev">&lt;</s><s class="next">&gt;</s></dd>
                <dd class="xgwz">
                    <p class="introTit">{{$title}}相关文章</p>
                    <ul>
                        @for($i=0;$i<10;$i++)
                            @php($info=$data->content($firstDomain,$pinyin))
                            <li><a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a></li>
                        @endfor
                    </ul>
                </dd>
                <dd id="comment" cmty="0">
                    <p class="introTit">
                        @php($info=$data->content($firstDomain,$pinyin))
                        <a href="{{$info['url']}}" target="_blank" class="seeAll" title="查看所有">查看所有
                            <span id="cmtNum">{{mt_rand(10,88)}}</span>条评论&gt;
                        </a>网友评论
                    </p>
                    <div id="comment-list">
                        <dl class="ahead">
                            <dt>
                                @php($info=$data->content($firstDomain,$pinyin,$type))
                                <img src="{{$host.'/template/download/pc6/img/cmthead1.png'}}" title="{{$info['title']}}" alt="{{$info['title']}}"/>
                                <span><i>第  1 楼 </i>
                                    <b> 上海有线通 {{$title}}网友</b>
                                </span>
                                <em>发表于: {{date('Y/m/d H:i:s',time()-888)}}  </em>
                            </dt>
                            <dd>{{$info['article']}}
                                <p id="1526672">
                                    <a href="javascript:">支持
                                        <em>
                                            (</em><span>{{mt_rand(0,99)}}</span><em>)
                                        </em>
                                    </a>
                                    <a href="" class="glBtn">盖楼(回复)</a>
                                </p>
                            </dd>
                        </dl>
                    </div>
                    <div id="comment-form">
                        @php($info=$data->navigation($firstDomain,$pinyin))
                        <form action="{{$info['url']}}" method="get" id="cmtForm">
                            <fieldset>
                                <legend>发表评论</legend>
                                <input name="SoftID" type="hidden" id="softID" value="658533"/>
                                <input name="CommentTpye" type="hidden" value="0"/>
                                <input name="Action" type="hidden" value="2"/>
                                <p id="userName-wrap">
                                    <input name="UserName" type="text" id="userName" class="input-bg grey9" maxlength="10" value="{{$title}}网友"/>(您的评论需要经过审核才能显示)
                                </p>
                                <p><textarea name="content" id="cmtMsg" class="input-bor">我来说两句...</textarea></p>
                                <p><button type="submit" class="btn-submit button btnOrg fr" id="subCmt">提交评论</button></p>
                            </fieldset>
                        </form>
                    </div>
                </dd>
            </dl>
        </dd>
        <dd id="dside">
            <dl id="recom">
                <dt><span>换一换</span>相关游戏</dt>
                <dd>
                    @for($i=0;$i<6;$i++)
                        @php($info=$data->content($firstDomain,$pinyin))
                        @php($san=sprintf("%03d",$i+297))
                        <a href="{{$info['url']}}" title="{{$info['title']}}">
                            <img src="{{$host.'/template/download/pc6/img'.'/'.$san.'.png'}}" title="{{$info['title']}}" alt="{{$info['title']}}"/>
                            <i>{{$info['title']}}</i>
                        </a>
                    @endfor
                </dd>
            </dl>
            <dl class="kbox">
                <dt>
                    @php($info=$data->navigation($firstDomain,$pinyin))
                    <a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                    手机{{$title}}大全
                </dt>
                <dd>
                    @for($i=0;$i<6;$i++)
                        @php($info=$data->content($firstDomain,$pinyin))
                        @php($rand=sprintf("%03d",mt_rand(20,250)))
                        <a href="{{$info['url']}}" title="{{$info['title']}}">
                            <img src="{{$host.'/template/download/pc6/img'.'/'.$rand.'.png'}}" title="{{$info['title']}}" alt="{{$info['title']}}"/>
                            <i>{{$info['title']}}</i>
                        </a>
                    @endfor
                </dd>
            </dl>
            <dl class="kbox">
                <dt>
                    @php($info=$data->navigation($firstDomain,$pinyin))
                    <a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                    组队app
                </dt>
                <dd>
                    @for($i=0;$i<6;$i++)
                        @php($info=$data->content($firstDomain,$pinyin))
                        @php($rand=sprintf("%03d",mt_rand(20,250)))
                        <a href="{{$info['url']}}" title="{{$info['title']}}">
                            <img src="{{$host.'/template/download/pc6/img'.'/'.$rand.'.png'}}" title="{{$info['title']}}" alt="{{$info['title']}}"/>
                            <i>{{$info['title']}}</i>
                        </a>
                    @endfor
                </dd>
            </dl>
            <dl class="kbox">
                <dt>
                    @php($info=$data->navigation($firstDomain,$pinyin))
                    <a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                    竞技app
                </dt>
                <dd>
                    @for($i=0;$i<6;$i++)
                        @php($info=$data->content($firstDomain,$pinyin))
                        @php($rand=sprintf("%03d",mt_rand(20,250)))
                        <a href="{{$info['url']}}" title="{{$info['title']}}">
                            <img src="{{$host.'/template/download/pc6/img'.'/'.$rand.'.png'}}" title="{{$info['title']}}" alt="{{$info['title']}}"/>
                            <i>{{$info['title']}}</i>
                        </a>
                    @endfor
                </dd>
            </dl>
            <dl class="ilist">
                <dt>下载排行</dt>
                <dd>
                    @for($i=0;$i<8;$i++)
                        @php($info=$data->content($firstDomain,$pinyin))
                        @php($rand=sprintf("%03d",mt_rand(297,320)))
                        <p>
                            <a href="{{$info['url']}}" title="{{$info['title']}}">
                                <img src="{{$host.'/template/download/pc6/img'.'/'.$rand.'.png'}}" title="{{$info['title']}}" alt="{{$info['title']}}"/>
                                <i>{{$info['title']}}</i>
                            </a>
                            <span>{{mt_rand(0,9)}}.{{mt_rand(0,99)}}G</span>
                            <span>v{{mt_rand(0,9)}}.{{mt_rand(0,9)}}.{{mt_rand(0,9)}}</span>
                        </p>
                    @endfor
                </dd>
            </dl>
        </dd>
    </dl>
@endsection
