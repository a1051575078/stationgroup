@php($data=app('App\Http\Controllers\CoreController'))
@extends('template.company.beijingqiche.layout')
@section('content')
    <div class="subcenter">
        <div class="xinwx_box">
            <div class="xinwx_boxt">
                <h1>
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">
                            {{$title}}
                        </font>
                    </font>
                </h1>
                <div class="in">
                    <p>
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">日期：{{date('Y年m月d日',time()-config('app.diy.posttime'))}}   &nbsp;&nbsp;&nbsp;&nbsp;</font>
                        </font>
                    </p>
                    <span>
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">分享给：</font>
                        </font>
                        <div class="bdsharebuttonbox bdshare-button-style2-16" data-bd-bind="1619348725382">
                            <a href="#" class="bds_more" data-cmd="more"></a>
                            <a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
                            <a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
                            <a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a>
                            <a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a>
                            <a href="#" class="bds_tqf" data-cmd="tqf" title="分享到腾讯朋友"></a>
                            <a href="#" class="bds_kaixin001" data-cmd="kaixin001" title="分享到开心网"></a>
                            <a href="#" class="bds_douban" data-cmd="douban" title="分享到豆瓣网"></a>
                            <a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
                        </div>
                        <script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"2","bdSize":"16"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
                    </span>
                </div>
            </div>
            <div class="xinwx_boxc">
                {!!$content!!}
            </div>
            <div class="xinwx_boxb after">
                @php($info=$data->content($firstDomain,$pinyin))
                <a href="{{$info['url']}}" class="prev" title="{{$info['title']}}">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">上一篇：{{$info['title']}}</font>
                    </font>
                </a>
                @php($info=$data->content($firstDomain,$pinyin))
                <a href="{{$info['url']}}" class="next" title="{{$info['title']}}">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">下一篇：{{$info['title']}}</font>
                    </font>
                </a>
            </div>
        </div>
    </div>
@endsection
