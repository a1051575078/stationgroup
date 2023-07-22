@php($data=app('App\Http\Controllers\CoreController'))
@extends('template.download.tiankong.layout')
@section('content')
    <div class="lay-790 fr">
        <div class="deta-page">
            <a href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}" class="blue" title="天空下载">天空下载</a>
            <i class="fst">&gt;</i>
            @php($info=$data->navigation($firstDomain,$pinyin))
            <a class="blue" target="_self" href="{{$info['url']}}" title="{{$info['title']}}"> {{$info['title']}} </a>
            <i class="fst">&gt;</i> {{$title}}
        </div>
        <div class="main-detail-box" monkey="soft-info">
            <div class="soft-info clearfix">
                <div class="soft-pic clearfix">
                    <div class="pic-item">
                        <img src="{{$host.'/template/download/tiankong/img/20130816145353520dcc8194779.jpg'}}" alt="{{$title}}" title="{{$title}}"/>
                        <i></i>
                    </div>
                    <div class="pic-text-box clearfix">
                        <div class="soft-title">
                            <h1 class="blue">{{$title}}</h1>
                        </div>
                        <div class="soft-desc">
                            <span class="til" style="display:none;">软件介绍：</span>
                            <p id="j_soft_desc">
                                @php($info=$data->content($firstDomain,$pinyin,$type))
                                <span class="short-desc">{{$info['article']}}<a href="#" class="blue short-btn">[详细介绍]</a></span>
                                <span class="all-desc" style="display:none;">{{$title}}覆盖量最大的全能播放器，千万量级全网视频内容，本地全格式播放，全协议（http、ftp、BT、电驴等）支持的边下边播。依托迅雷强大下载技术，传承迅雷看看高清播放品质，使您能够完全流畅地享受高清影视内容。从此您的电脑只需一款播放器。丰富的影片库在线流畅点播服务兼容主流影视媒体格式文件的本地播放自动在线下载影片字幕自动记录上次关闭播放器时的文件位置自动提示影片更新播放影片时对于播放器显示在屏幕最前端的配置项自动添加相似文件到播放列表设置播放完毕后自动关机设置对于播放记录支持多种记录、清除方式设置功能快捷键设置</span>
                            </p>
                        </div>
                        <div class="soft-share">
                            <div class="soft-share-bar">
                                <div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare">
                                    <span class="bds_more">分享到：</span>
                                    <a class="bds_tsina" title="分享到新浪微博" href="#"></a>
                                    <a class="bds_qzone" title="分享到QQ空间" href="#"></a>
                                    <a class="bds_baidu" title="分享到百度搜藏" href="#"></a>
                                    <a class="bds_tqq" title="分享到腾讯微博" href="#"></a>
                                    <a class="bds_renren" title="分享到人人网" href="#"></a>
                                    <a class="bds_hi" title="分享到百度空间" href="#"></a>
                                    <a class="bds_t163" title="分享到网易微博" href="#"></a>
                                    <a class="bds_tieba" title="分享到百度贴吧" href="#"></a>
                                    <a class="bds_qq" title="分享到QQ收藏" href="#"></a>
                                    <a class="bds_copy" title="分享到复制网址" href="#"></a>
                                    @php($count=mt_rand(0,999))
                                    <a class="shareCount" href="#" title="累计分享{{$count}}次">{{$count}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="soft-dl-button  soft-dl-nobr">
                        <a target="_blank" href="{{$info['url']}}" dlcount="17131|2" class="dl-btn" monkey="downsoft" title="{{$title}}">
                            <em title="{{$title}}">
                                立即下载
                            </em>
                        </a>
                    </div>
                </div>
                <div class="soft-text shoujicode">
                    <ul class="soft-info-list">
                        <li>
                            <div class="item"><span class="t_title">大小：</span>{{mt_rand(0,99)}}.{{mt_rand(0,99)}} MB</div>
                            <div class="item"><span class="t_title">版本：</span>{{mt_rand(0,9)}}.{{mt_rand(0,9)}}.{{mt_rand(0,999)}}.{{mt_rand(0,9999)}}</div>
                        </li>
                        <li>
                            <div class="item"><span class="t_title">更新：</span>{{date('Y-m-d',time())}}</div>
                            <div class="item"><span class="t_title">系统位数：</span>64位</div>
                        </li>
                        <li>
                            <div class="item"><span class="t_title">评论：</span><span class="blue">{{mt_rand(0,99)}}</span>条</div>
                            <div class="item"><span class="t_title">语言：</span>中文</div>
                        </li>
                        <li>
                            <div class="item"><span class="t_title">授权：</span>免费软件</div>
                            <div class="item" style="width:64%;"><span class="t_title">适合系统：</span>win10/win8/win7/vista/winxp</div>
                        </li>
                    </ul>
                    <div class="shoujidown">
                        <div class="title">扫描下载</div>
                        <img src="{{$host.'/template/download/tiankong/img/1c1b096a6c3506b35ba9714e2a53dd93.png'}}" alt="{{$title}}" width="166" height="166" title="{{$title}}"/>
                        @php($info=$data->navigation($firstDomain,$pinyin))
                        <a href="{{$info['url']}}" monkey="shoujixiazai" class="shoujibtndown" target="_blank" title="{{$info['title']}}">{{$info['title']}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
