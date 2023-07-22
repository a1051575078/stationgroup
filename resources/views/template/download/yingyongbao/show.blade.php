@php($data=app('App\Http\Controllers\CoreController'))
@extends('template.download.yingyongbao.layout')
@section('content')
    <div class="com-container" id="J_DetDataContainer" flag="16469">
        <div class="det-main-container">
            <div class="det-ins-container J_Mod " data-modname="appInfo">
                <div class="det-icon">
                    @php($rand=sprintf("%03d",mt_rand(1,103)))
                    <img src="{{$host.'/template/download/yingyongbao/img/'.$rand.'.png'}}" title="{{$title}}" alt="{{$title}}"/>
                    <i class="icon-union-safe">315可信应用白名单</i>
                </div>
                <div class="det-ins-data">
                    <div class="det-name">
                        <div class="det-name-int">{{$title}}</div>
                        <div class="official-btn" id="J_GfHoverBtn" style="display: block;">
                            <div class="official-text">官方</div>
                            <div class=" official-hover-box">
                                <span class="out-corner">◆<span class="int-corner">◆</span></span>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="det-star-box">
                        <div class="com-star-5-D det-ins-star"></div>
                        <div class="com-blue-star-num">{{mt_rand(0,5)}}.{{mt_rand(0,9)}}分</div>
                        <a class="det-comment-num" href="#CommentList" id="J_DetCommentNum"></a>
                        <div class="clear"></div>
                    </div>
                    <div class="det-insnum-line">
                        <div class="det-ins-num">{{mt_rand(0,99)}}亿下载</div>
                        <div class="det-insnum-dot">·</div>
                        <div class="det-size">{{mt_rand(1,999)}}.{{mt_rand(0,9)}}M</div>
                        <div class="det-insnum-dot">·</div><div id="J_AdvBox" class="det-adv adv-btn">无广告</div>
                        <div class="det-type-box">
                            <div class="det-type-tit">分类：</div>
                            @php($info=$data->navigation($firstDomain,$pinyin))
                            <a href="{{$info['url']}}" class="det-type-link" id="J_DetCate" title="{{$info['title']}}">{{$info['title']}}</a>
                            <div class="clear"></div>
                            <i class="icon-union-safe">315可信应用白名单</i>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="det-ins-qrcode-box">
                    <div class="qrcode">
                        <img src="{{$host.'/template/download/yingyongbao/img/microQr.png'}}" title="微信扫一扫下载" alt="微信扫一扫下载"/>
                    </div>
                    <div class="desc">微信扫一扫下载</div>
                </div>
                <div class="det-ins-btn-box" style="position: relative;">
                    <a title="{{$title}}" class="det-ins-btn" href="" onclick="qqapp_dl_apk(this);" ex_url="" asistanturlid="990499" appname="{{$title}}" appicon="{{$host.'/template/download/yingyongbao/img/'.$rand.'.png'}}" apk="com.tencent.weishi"></a>
                    <a title="{{$title}}" class="det-down-btn" href="" data-apkurl="" appname="{{$title}}" apk="com.tencent.weishi"></a>
                </div>
                <div class="clear"></div>
            </div>
            <div class="det-pic-scroll-container" id="J_PicTurnContainer" style="height: 400px;">
                <div id="J_PicTurnHoverBox" class="pic-turn-hover-box">
                <span id="J_PicTurnHiddenBox" class="pic-turn-hidden-box" style="margin-top: -5px;">
                    <span id="J_PicTurnImgBox" class="pic-turn-img-box">
                    	<div class="pic-img-box">
                        	<img data-src="{{$host.'/template/download/yingyongbao/img/show1.jpg'}}" src="{{$host.'/template/download/yingyongbao/img/show1.jpg'}}" id="picInImgBoxImg0" height="400" width="240" style="display: block;"/>
                        </div>
                    	<div class="pic-img-box">
                        	<img data-src="{{$host.'/template/download/yingyongbao/img/show2.jpg'}}" src="{{$host.'/template/download/yingyongbao/img/show2.jpg'}}" id="picInImgBoxImg1" height="400" width="240" style="display: block;"/>
                        </div>
                    	<div class="pic-img-box">
                        	<img data-src="{{$host.'/template/download/yingyongbao/img/show3.jpg'}}" src="{{$host.'/template/download/yingyongbao/img/show3.jpg'}}" id="picInImgBoxImg2" height="400" width="240" style="display: block;"/>
                        </div>
                    	<div class="pic-img-box">
                        	<img data-src="{{$host.'/template/download/yingyongbao/img/show4.jpg'}}" src="{{$host.'/template/download/yingyongbao/img/show4.jpg'}}" id="picInImgBoxImg3" height="400" width="240" style="display: block;"/>
                        </div>
                    </span>
                </span>
                    <span id="J_PicTurnLeftBtn" class="pic-turn-left-btn" style="left: -10px;"></span>
                    <span id="J_PicTurnRightBtn" class="pic-turn-right-btn picTurnBtn" style="right: -54px;"></span>
                </div>
                <div class="det-pic-loading" id="J_DetPicLoading" style="display: none;"></div>
            </div>
            <div class="det-othinfo-container J_Mod" data-modname="appOthInfo">
                <div class="det-othinfo-tit">版本号：</div>
                <div class="det-othinfo-data">V{{mt_rand(0,9)}}.{{mt_rand(0,99)}}.{{mt_rand(0,9)}}.{{mt_rand(0,999)}}</div>
                <div class="det-othinfo-tit">更新时间：</div>
                <div class="det-othinfo-data" id="J_ApkPublishTime" data-apkpublishtime="1619627804">{{date('Y-m-d',time()-config('app.diy.posttime'))}}</div>
                <div class="det-othinfo-tit">开发商：</div>
                <div class="det-othinfo-data">{{$title}}</div>
                <div class="det-othinfo-data det-othinfo-pbox">
                    <div class="det-othinfo-pre">查看权限</div>
                    <ul class="det-othinfo-plist">
                        <li class="t">需要调用以下重要权限</li>
                        <li class="clearfix"><div class="l">-</div><div class="r">允许访问的帐户服务帐户列表</div></li>
                        <li class="clearfix"><div class="l">-</div><div class="r">允许程序写入同步设置</div></li>
                        <li class="clearfix"><div class="l">-</div><div class="r">允许应用程序读取同步设置</div></li>
                        <li class="clearfix"><div class="l">-</div><div class="r">允许应用程序创建一个使用类型的窗口 TYPE_SYSTEM_ALERT，所有其他应用程序的顶部只有极少数的应用程序应该使用此权限; 这些窗口用于与用户的系统级相互作用</div></li>
                        <li class="clearfix"><div class="l">-</div><div class="r">允许程序访问有关网络的信息</div></li>
                        <li class="clearfix"><div class="l">-</div><div class="r">允许应用程序连接到已配对的蓝牙设备</div></li>
                        <li class="clearfix"><div class="l">-</div><div class="r">允许应用程序打开网络套接字</div></li>
                        <li class="clearfix"><div class="l">-</div><div class="r">允许应用程序访问Wi-Fi网络的信息</div></li>
                        <li class="clearfix"><div class="l">-</div><div class="r">允许应用访问精确位置</div></li>
                        <li class="clearfix"><div class="l">-</div><div class="r">允许应用程序访问的大致位置</div></li>
                        <li class="clearfix"><div class="l">-</div><div class="r">需要能够访问摄像机装置</div></li>
                        <li class="clearfix"><div class="l">-</div><div class="r">允许应用程序录制音频</div></li>
                        <li class="clearfix"><div class="l">-</div><div class="r">允许应用程序写入到外部存储器</div></li>
                        <li class="clearfix"><div class="l">-</div><div class="r">允许只读到电话状态访问，包括该装置的电话号码，当前蜂窝网络信息，任何正在进行的呼叫的状态，并且任何一个列表 PhoneAccount的注册在设备上</div></li>
                        <li class="clearfix"><div class="l">-</div><div class="r">允许应用程序更改任务的Z顺序</div></li>
                        <li class="clearfix"><div class="l">-</div><div class="r">允许应用程序更改Wi-Fi连接状态</div></li>
                        <li class="clearfix"><div class="l">-</div><div class="r">允许应用程序改变网络连接状态</div></li>
                        <li class="clearfix"><div class="l">-</div><div class="r">允许应用程序从外部存储读取</div></li>
                        <li class="clearfix"><div class="l">-</div><div class="r">允许应用程序请求的安装包应用定位的API大于22必须按顺序使用持此权限ACTION_INSTALL_PACKAGE</div></li>
                        <li class="clearfix"><div class="l">-</div><div class="r">允许访问振动</div></li>
                        <li class="clearfix"><div class="l">-</div><div class="r">允许应用程序接收 ACTION_BOOT_COMPLETED系统启动完成后广播如果不要求此权限，您将不会在那个时候接收到广播虽然持有此权限没有任何安全问题，它可以通过增加花费的时间系统启动量，允许应用程序对用户体验造成负面影响有自己运行在用户不知道他们因此，必须明确声明你的这个设施的使用，使用户能看得到</div></li>
                        <li class="clearfix"><div class="l">-</div><div class="r">允许安装在发射器的快捷方式的应用程序</div></li>
                        <li class="clearfix"><div class="l">-</div><div class="r">允许应用程序卸载启动的快捷方式</div></li>
                        <li class="clearfix"><div class="l">-</div><div class="r">允许应用程序读取用户联系人数据</div></li>
                        <li class="clearfix"><div class="l">-</div><div class="r">允许应用程序修改全局音频设置</div></li>
                        <li class="clearfix"><div class="l">-</div><div class="r">允许应用程序禁用键盘锁，如果它是不安全的</div></li>
                        <li class="clearfix"><div class="l">-</div><div class="r">允许使用PowerManager WakeLocks让处理器进入休眠或屏幕变暗</div></li>
                        <li class="clearfix"><div class="l">-</div><div class="r">允许应用程序读取或写入系统设置</div></li>
                        <li class="clearfix"><div class="l">-</div><div class="r">允许安装和可移动存储卸载文件系统</div></li>
                        <li class="clearfix"><div class="l">-</div><div class="r">允许应用程序读取低级别的系统日志文件</div></li>
                        <li class="clearfix"><div class="l">-</div><div class="r">允许应用程序读取用户的日历数据</div></li>
                        <li class="clearfix"><div class="l">-</div><div class="r">允许应用程序写入用户的日历数据</div></li>
                        <li class="clearfix"><div class="l">-</div><div class="r">允许应用程序通过NFC进行I/O操作</div></li>
                        <li class="clearfix"><div class="l">-</div><div class="r">允许应用程序进入的Wi-Fi多播模式</div></li>
                        <li class="clearfix"><div class="l">-</div><div class="r">允许应用程序发现和配对蓝牙设备</div></li>
                    </ul>
                </div>
                <div class="clear"></div>
            </div>
            <div class="det-intro-container">
                <div class="det-intro-tit">应用信息</div>
                <div class="det-intro-text" id="J_DetAppDataInfo" style="height: 63px;">
                    <div class="det-app-data-info">
                        @php($info=$data->content($firstDomain,$pinyin,$type))
                        {{$title}}{{$info['article']}}
                    </div>
                    <div class="det-app-data-tit">更新内容：</div>
                    <div class="det-app-data-info">修复了部分已知问题</div>
                </div>
                <a class="det-intro-showmore" href="javascript:void(0)" id="J_DetIntroShowMore" style="display: block;" hidefocus="true">显示更多</a>
            </div>
            <div class="det-samedeve-apps-container J_Mod btn-install-cross" data-modname="appSameList">
                <div class="det-samedeve-tit">同一开发者</div>
                <ul class="det-samedeve-applist">
                    @for($i=0;$i<4;$i++)
                        @php($info=$data->content($firstDomain,$pinyin))
                        @php($rand=sprintf("%03d",mt_rand(1,103)))
                        <li class="det-samedeve-app-box">
                            <div class="app-icon">
                                <a href="{{$info['url']}}" target="_blank" data-title="{{$info['title']}}" class="icon" title="{{$info['title']}}">
                                    <img src="{{$host.'/template/download/yingyongbao/img/'.$rand.'.png'}}" title="{{$info['title']}}" alt="{{$info['title']}}"/>
                                </a>
                            </div>
                            <div class="app-right-data">
                                <a class="appName" href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">{{$info['title']}}</a>
                                <div class="down-times">{{mt_rand(0,99)}}亿下载</div>
                                <a title="{{$info['title']}}" class="T_ComEventAppIns com-install-btn" href="{{$info['url']}}" onclick="qqapp_dl_apk(this);" ex_url="{{$info['url']}}" asistanturlid="990499" appname="{{$info['title']}}" apk="com.tencent.mtt" appicon="{{$host.'/template/download/yingyongbao/img/'.$rand.'.png'}}">安装到手机</a>
                            </div>
                            <div class="clear"></div>
                        </li>
                    @endfor
                    <li class="clear"></li>
                </ul>
            </div>
            <div class="det-submit-container J_Mod" data-modname="commentInfo">
                <a name="CommentList" id="CommentList"></a>
                <div class="det-submit-tit">用户评论</div>
            </div>
            <div class="det-comment-list-container">
                <ul class="det-comment-list-box" id="J_DetShowCommentList"></ul>
                <a class="det-comment-show-more-btn" id="J_DetCommentShowMoreBtn" href="javascript:void(0)">查看更多评论</a>
            </div>
            <div class="det-submit-none" id="J_DetSubmitNone">暂无评论</div>
        </div>
    </div>
@endsection
