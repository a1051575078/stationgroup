@php($data=app('App\Http\Controllers\CoreController'))
@extends('template.download.yiqiba.layout')
@section('content')
    <link type="text/css" rel="stylesheet" href="{{$host.'/template/download/yiqiba/css/add.css'}}"></link>
    <div class="fl content">
        <div class="con-box">
            <div class="con-box-border">
                <h1>
                    {!!$title!!} <span>{!!implode('',$pinyin->convert($title,PINYIN_NO_TONE))!!}</span>
                </h1>
                <div class="whit-box">
                    <div class="game-box">
                        <div class="goods clearfix">
                            <dl>
                                <dt>
                                    <span class="pic150">
                                        <img src="{{$host.'/template/download/yiqiba/img/'.mt_rand(1,44).'.jpg'}}" width="150" height="200"/>
                                    </span>
                                </dt>
                                <dd >
                                    @php($info=$data->content($firstDomain,$pinyin))
                                    <p>类型：<a href="{{$info['url']}}">{{$info['title']}}</a></p>
                                    @php($info=$data->content($firstDomain,$pinyin))
                                    <p>产地：<a href="{{$info['url']}}">{{$info['title']}}</a></p>
                                    @php($info=$data->content($firstDomain,$pinyin))
                                    <p>开发：<a href="{{$info['url']}}">{{$info['title']}}</a></p>
                                    @php($info=$data->content($firstDomain,$pinyin))
                                    <p>模式：<a href="{{$info['url']}}">{{$info['title']}}</a></p>
                                    @php($info=$data->content($firstDomain,$pinyin))
                                    <p>题材：<a href="{{$info['url']}}">{{$info['title']}}</a></p>
                                    @php($info=$data->content($firstDomain,$pinyin))
                                    <p>画面：<a href="{{$info['url']}}">{{$info['title']}}</a></p>
                                    @php($info=$data->content($firstDomain,$pinyin))
                                    <p>收费：<a href="{{$info['url']}}">{{$info['title']}}</a></p>
                                </dd>
                                <dd class="score-area">
                                    <ul class="blink">
                                        <li>
                                            @php($info=$data->content($firstDomain,$pinyin))
                                            <a target="_blank" href="{{$info['url']}}">下载</a>
                                        </li>
                                        <li>
                                            @php($info=$data->content($firstDomain,$pinyin))
                                            <a href="{{$info['url']}}" target="_blank">专区</a>
                                        </li>
                                        <li id="v_send_li">
                                            @php($info=$data->content($firstDomain,$pinyin))
                                            <a href="{{$info['url']}}">发号</a>
                                        </li>
                                    </ul>
                                    <div class="bigStar">
                                        <span class="score c-red">{{mt_rand(0,9)}}.{{mt_rand(0,9)}}</span>
                                        <span class="ie6png bstar bstar-four"></span>
                                    </div>
                                    <p><span class="c-red">{{mt_rand(10000,99999)}}</span>人想玩 <span class="c-red">{{mt_rand(10000,99999)}}</span>人评价</p>
                                    <div class="btn-area clearfix" style="margin-left:30px;">
                                        @php($info=$data->content($firstDomain,$pinyin))
                                        <a id="twanna" class="btn-org fl collect0" href="{{$info['url']}}">想&nbsp;玩</a>
                                        <p id="rank_p">
                                            <span class="rank_text">评分：</span>
                                            <span id="rank" class="rank_new">
                                                <img class="collect_new" id="star1" src="{{$host.'/template/download/yiqiba/img/passive_star.gif'}}" onclick="doScore(this.id);">
                                                <img class="collect_new" id="star2" src="{{$host.'/template/download/yiqiba/img/passive_star.gif'}}" onclick="doScore(this.id);">
                                                <img class="collect_new" id="star3" src="{{$host.'/template/download/yiqiba/img/passive_star.gif'}}" onclick="doScore(this.id);">
                                                <img class="collect_new" id="star4" src="{{$host.'/template/download/yiqiba/img/passive_star.gif'}}" onclick="doScore(this.id);">
                                                <img class="collect_new" id="star5" src="{{$host.'/template/download/yiqiba/img/passive_star.gif'}}" onclick="doScore(this.id);">
                                                <span style="margin-left:3px;"></span>
                                            </span>
                                        </p>
                                    </div>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
                <div class="whit-box" >
                    <div class="gameState">
                        <table id="operation_state_id">
                            <thead>
                            <tr class="b-grey">
                                <th width="120">地区</th>
                                <th width="250">开始时间</th>
                                <th width="250">运营状态</th>
                                <th width="250">运营商</th>
                                <th width="180">官方网站</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>大陆</td>
                                <td>无</td>
                                <td>等待测试</td>
                                @php($info=$data->content($firstDomain,$pinyin,$type))
                                <td><a href="{{$info['url']}}" target="_blank">{{$info['anthor']}}</a></td>
                                @php($info=$data->content($firstDomain,$pinyin))
                                <td><a href="{{$info['url']}}" target="_blank">官网</a></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="wide-box">
                    <div class="resource-box">
                        <div class="ulike3">
                            <div class="resource">
                                <dl></dl>
                            </div>
                        </div>
                        <div class="cl"></div>
                    </div>
                </div>
                <div class="whit-box">
                    <div class="game-box">
                        <div class="t con-t" >
                            <span class="fr sort">
                                @php($info=$data->content($firstDomain,$pinyin))
                                <a target="_blank" href="{{$info['url']}}">查看全部</a>
                            </span>
                            实际游戏画面展示
                        </div>
                        <div class="photo-img" >
                            <input type="hidden" id="images_id" value="72417">
                            <div class="shareBox">
                                支持键盘翻页←左&nbsp;&nbsp;右→<a class="scan" href="{{$host.'/template/download/yiqiba/img/1486606020-5120.jpg'}}" id="scan" title="查看原图"  target="_blank">查看原图</a>
                                <div class="sharebtn">
                                    <script type="text/javascript" id="bdshare_js" data="type=tools" ></script>
                                    <script type="text/javascript" id="bdshell_js"></script>
                                    <script type="text/javascript">
                                        document.getElementById("bdshell_js").src = "http://share.baidu.com/static/js/shell_v2.js?cdnversion=" + new Date().getHours();
                                    </script>
                                </div>
                            </div>
                            @php($info=$data->content($firstDomain,$pinyin))
                            <a href="{{$info['url']}}" id = "game_img_a" style="outline:none;">
                                <div class="img" style="width:670px; margin-bottom:10px; text-align:center;">
                                    <img src="{{$host.'/template/download/yiqiba/img/1486606020-5120.jpg'}}" id="game_img_show" width='550px;'/>
                                </div>
                            </a>
                            <span class="wait-notic ie6png" style="display:none;" id="img_load_tips"><b>图片加载中，请稍候！</b></span>
                        </div>
                        <div class="t con-t">
                            <span class="fr sort" style="display:none;">
                                @php($info=$data->content($firstDomain,$pinyin))
                                <a href="{{$info['url']}}">查看全部</a>
                            </span>
                            最新图集<small>（{{mt_rand(1,99)}}）</small>
                        </div>
                        <ul class="pic-box clearfix">
                            @for($i=0;$i<2;$i++)
                                <li>
                                    <div class="pic-border">
                                        @php($info=$data->content($firstDomain,$pinyin))
                                        <a href="{{$info['url']}}" target="_blank">
                                            <div class="pic100_new">
                                                <img src="{{$host.'/template/download/yiqiba/img/'.mt_rand(1,44).'.jpg'}}"/>
                                            </div>
                                            <span class="pic-count"></span>
                                            <span class="count-word">共{{mt_rand(1,9)}}张</span>
                                        </a>
                                    </div>
                                    <p class="name">
                                        @php($info=$data->content($firstDomain,$pinyin))
                                        <a href="{{$info['url']}}" class="name" target="_blank">{{$info['title']}}</a>
                                    </p>
                                </li>
                            @endfor
                        </ul>
                        <div class="t con-t">游戏介绍</div>
                        <div class="intro-area">
                            <div id="short_summary">{!!$content!!}</div>
                            <div id="all_summary" style="display:none"><p>{!!$content!!}</p></div>
                            <span class="unfold">
                                @php($info=$data->content($firstDomain,$pinyin))
                                <a id="unfold_summary" href="{{$info['url']}}">展开全部</a>
                            </span>
                        </div>
                        <div class="t con-t"> 你感觉{!!$title!!}好玩吗？</div>
                        <div class="use-tags">
                            <div class="addTags">
                                <ul class="clearfix">
                                    <ul style="z-index:100">
                                        <li>
                                            @php($info=$data->content($firstDomain,$pinyin))
                                            <a id="11817" class="color0" onclick="return false;" href="{{$info['url']}}" value="25" target="_blank">不多于15个汉字</a>
                                            <span id="tip_11817" class="pop-com-no tips addTags_new" style="display:none;border-radius:2px 2px 2px 2px;font-size:12px;padding:6px;position:absolute;z-index:999;border:1px solid #FF0000;color:#FF0000;background:none repeat scroll 0 0 #FFFFFF;">已有{{mt_rand(1,99)}}人评论此观点</span>
                                        </li>
                                    </ul>
                                </ul>
                            </div>
                            <div class="add-tags">共有{{mt_rand(1,99)}}人发表观点，请选择或输入您的观点：
                                <input class="txt" type="text" value="不多于15个汉字" name="tag" id="textTag" style="color: #8A8585;"/>
                                <input class="btn-org" type="button" value="发表" />
                                <div class="pop-add-yes" style="display:none">添加成功,感谢您的参与！</div>
                                <div class="pop-add-no" style="display:none"></div>
                            </div>
                            <input type="hidden" name="game_id" value="9262">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="fr side">
        <div class="md-newgameinfo">
            <div class="mark mark09">{{mt_rand(0,5)}}.{{mt_rand(0,9)}}</div>
            <div class="hd">
                <div class="pic">
                    <img src="{{$host.'/template/download/yiqiba/img/'.mt_rand(1,44).'.jpg'}}"/>
                </div>
                <div class="info">
                    <p class="name">
                        @php($info=$data->content($firstDomain,$pinyin,$type))
                        <a href="{{$info['url']}}">{!!$title!!}</a>
                    </p>
                    <p class="intr"><span>类型：</span>{{$info['anthor']}}&nbsp;</p>
                    <p class="btn">
                        @php($info=$data->content($firstDomain,$pinyin))
                        <a href="{{$info['url']}}">专区</a>
                        @php($info=$data->content($firstDomain,$pinyin))
                        <a class="red" href="{{$info['url']}}">发号</a>
                    </p>
                </div>
            </div>
            <div class="bd btn-lg">
                <div class="btn android">
                    <i class="ico"></i>
                    <span class="name">安卓下载</span>
                    <i class="codeico"></i>
                    <div class="codeitem">
                        <div class="cont">
                            <div class="code">
                                <img src="{{$host.'/template/download/yiqiba/img/'.mt_rand(1,44).'.jpg'}}"/>
                            </div>
                            @php($info=$data->content($firstDomain,$pinyin))
                            <div class="link"><a href="{{$info['url']}}">点击手动下载</a></div>
                        </div>
                    </div>
                </div>
                <div class="btn ios">
                    <i class="ico"></i>
                    <span class="name">iOS下载</span>
                    <i class="codeico"></i>
                    <div class="codeitem">
                        <div class="cont">
                            <div class="code">
                                <img src="{{$host.'/template/download/yiqiba/img/'.mt_rand(1,44).'.jpg'}}"/>
                            </div>
                            @php($info=$data->content($firstDomain,$pinyin))
                            <div class="link"><a href="{{$info['url']}}">点击手动下载</a></div>
                        </div>
                    </div>
                </div>
                @php($info=$data->content($firstDomain,$pinyin))
                <a class="btn pc" href="{{$info['url']}}">
                    <i class="ico"></i>
                    <span class="name">安卓模拟器</span>
                </a>
            </div>
        </div>
        <div class="side-box" id = "v_activity_box">
            <div class="side-box-border">
                <div class="t">相关活动</div>
                <div class="ulike3">
                    <ul id = "v_side_activity">
                        <li class="pic" id = "v_act_pic">
                            @php($info=$data->content($firstDomain,$pinyin))
                            <a href="{{$info['url']}}" title="{{$info['title']}}" target="_blank">
                                <img src="{{$host.'/template/download/yiqiba/img/'.mt_rand(1,44).'.jpg'}}"/>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="side-box" id="card-box">
            <div class="side-box-border" id="r-card-div">
                <div class="t">
                    @php($info=$data->navigation($firstDomain,$pinyin))
                    <a href="{{$info['url']}}" class="fr more">更多…</a>
                    相关发号
                </div>
                <div class="r-card r-news">
                    <ul id='r-card'></ul>
                </div>
                <div class="cl"></div>
            </div>
        </div>
        <div class="side-box">
            <div class="side-box-border" id="r-news-div">
                <div class="t">
                    @php($info=$data->navigation($firstDomain,$pinyin))
                    <a href="{{$info['url']}}" class="fr more">更多…</a>相关新闻
                </div>
                <div class="r-news">
                    <ul id='r-news'>
                        @for($i=0;$i<10;$i++)
                            <li>
                                @php($info=$data->content($firstDomain,$pinyin))
                                <a href="{{$info['url']}}" title="{{$info['title']}}" target = "_blank">{{$info['title']}}</a>
                            </li>
                        @endfor
                    </ul>
                </div>
                <div class="cl"></div>
            </div>
        </div>
        <div class="side-box">
            <div class="side-box-border" id="r-news-div">
                <div class="t">
                    @php($info=$data->navigation($firstDomain,$pinyin))
                    <a href="{{$info['url']}}" target="_blank" class="fr more">更多…</a>新游资讯
                </div>
                <div class="cl"></div>
            </div>
        </div>
        <div class="side-box">
            <div class="side-box-border">
                <div class="t">
                    游戏粉丝
                </div>
                <div class="fans">
                    <ul>
                        @for($i=0;$i<4;$i++)
                            <li>
                                <div class="fans-l">
                                    @php($info=$data->content($firstDomain,$pinyin))
                                    <a target="_blank" href="{{$info['url']}}">
                                        <img src="{{$host.'/template/download/yiqiba/img/'.mt_rand(1,44).'.jpg'}}"/>
                                    </a>
                                </div>
                                <div class="fans-r">
                                    <p><a target="_blank" href="{{$info['url']}}">{{$info['title']}}</a></p>
                                    <p>想玩</p>
                                </div>
                            </li>
                        @endfor
                    </ul>
                </div>
                <div class="cl"></div>
            </div>
        </div>
        <div class="side-box">
            <div class="side-box-border clearfix">
                <div class="t">
                    @php($info=$data->content($firstDomain,$pinyin))
                    <a href="{{$info['url']}}" class="fr more" onclick="change_like();">换一换</a>猜你喜欢
                </div>
                <div class="ulike2">
                    <ul class="clearfix" id="guess_game">
                        @for($i=0;$i<4;$i++)
                            <li>
                                @php($info=$data->content($firstDomain,$pinyin))
                                <a href="{{$info['url']}}" target="_blank" class="pic90">
                                    <img src="{{$host.'/template/download/yiqiba/img/'.mt_rand(1,44).'.jpg'}}"/></a>
                                <a href="{{$info['url']}}" target="_blank" class="name">{{$info['title']}}</a>
                            </li>
                        @endfor
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="cl"></div>
    </div>
@endsection
