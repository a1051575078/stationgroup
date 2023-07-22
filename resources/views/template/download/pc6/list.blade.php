@extends('template.download.pc6.layout')
@php($data=app('App\Http\Controllers\CoreController'))
@section('content')
    <div id="container" class="w1200 mt20 clearfix">
        <div class="right fr">
            <div id="main" class="border">
                <div class="hd">
                    <p><a href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}" title="首页">首页</a> &gt; <span>列表</span></p><i>共有<font>({{mt_rand(1000,9999)}})</font>款软件</i>
                </div>
                <div style="height: 50px;line-height: 50px;font-size: 15px;border-bottom: 1px solid #ddd;">
                    @php($info=$data->navigation($firstDomain,$pinyin))
                    <a href="{{$info['url']}}" class="active" title="{{$info['title']}}">{{$info['title']}}</a>
                    @for($i=0;$i<4;$i++)
                        @php($info=$data->navigation($firstDomain,$pinyin))
                        <a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                    @endfor
                </div>
                <ul class="img-list" style="width:100%;height:100%">
                    @for($i=0;$i<36;$i++)
                        @php($info=$data->content($firstDomain,$pinyin))
                        <li>
                            <a href="{{$info['url']}}" title="{{$info['title']}}">
                                <img src="{{$host.'/template/download/pc6/img'.'/'.($i+251).'.png'}}" alt="{{$info['title']}}" title="{{$info['title']}}"/>{{$info['title']}}
                            </a>
                            <span>更新：<font color="red">{{date('Y-m-d',strtotime('-'.$i.' day'))}}</font></span>
                        </li>
                    @endfor
                </ul>
                <div class="tspage">
                    <style>
                        .tspage { font-size:13px; background-color: #f2f2f2; clear:both;  height:25px; overflow:hidden;  line-height:25px; padding:0 5px; text-align:right;}
                        .tspage i { font-style:normal;}
                        .tspage a {color:#000; text-decoration:none; padding:0 3px;}
                        .tspage a:hover { text-decoration:underline;}
                        .tspage .tsp_count {float:left;}
                        .tsp_count i { color:#f00;}
                        .tspage b {color:#f00;}
                    </style>
                    @php($randcount=mt_rand(1000,9999))
                    <div class="tsp_count">共:<i>{{$randcount}}</i>条 页次:<b>1</b>/{{ceil($randcount/36)}} 每页:<i>36</i></div>
                    <div class="tsp_nav">
                        <i>首页</i> <i>上一页</i> <b> 1 </b>
                        @for($i=0;$i<5;$i++)
                            @php($info=$data->navigation($firstDomain,$pinyin))
                            <a href="{{$info['url']}}" title="第{{$i+1}}页">第{{$i+1}}页</a>
                        @endfor
                        @php($info=$data->navigation($firstDomain,$pinyin))
                        <a href="{{$info['url']}}" class="tsp_next" title="下一页"><i>下一页</i></a>
                        @php($info=$data->navigation($firstDomain,$pinyin))
                        <a href="{{$info['url']}}" class="tsp_end" title="尾页"><i>尾页</i></a>
                        <select class="tsp_change" id="tsp_change" onchange="javascript:window.location.href=this.options[this.selectedIndex].value" name="select">
                            <script language="JavaScript">
                                //var url="/{$pages}.html";
                                @php($info=$data->navigation($firstDomain,$pinyin))
                                var url="{{$info['url']}}"
                                for(var iPage = 1; iPage < {{ceil($randcount/36)+1}}; iPage++)  {
                                    document.write ("<option value=\""+url.replace("{$pages}",iPage)+"\"");
                                    if (iPage == 1)
                                        document.write (" selected");
                                    else
                                        document.write ("");
                                    document.write (">第"+iPage+"页</option>");
                                }
                            </script>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="left fl">
            <div id="yxk" class="yxk">
                <div class="hd">
                    <h3>{{$title}}</h3>
                </div>
                @php($cycle=[0,9,0,2,9])
                @for($i=0;$i<5;$i++)
                    @php($info=$data->navigation($firstDomain,$pinyin))
                    <div class="cBox">
                        <p><a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}<font>({{mt_rand(1000,99999)}}款)</font></a></p>
                        @if($cycle[$i])
                        <ul>
                            @for($j=0;$j<$cycle[$i];$j++)
                                <li><a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>({{mt_rand(1000,9999)}})</li>
                            @endfor
                        </ul>
                        @endif
                    </div>
                @endfor
            </div>
            <div id="dph" class="dph border mt20">
                <div class="hd"><h3>角色扮演排行榜</h3></div>
                <p class="tab-nav"><span class="cur">周</span>/<span>月</span></p>
                <ul class="on">
                    @for($i=0;$i<10;$i++)
                        @php($info=$data->content($firstDomain,$pinyin,$type))
                        <li class="">
                            <em class="orgNum">{{$i+1}}</em><s>{{mt_rand(100,999)}}.{{mt_rand(0,9)}}M</s>
                            <a href="{{$info['url']}}" title="{{$info['title']}}">
                                <img src="{{$host.'/template/download/pc6/img'.'/'.($i+287).'.png'}}" title="{{$info['title']}}" alt="{{$info['title']}}"/>
                                <span>{{$info['title']}}</span>
                            </a>
                            <p>{{$info['article']}}</p>
                        </li>
                    @endfor
                </ul>
                <ul>
                    @for($i=0;$i<10;$i++)
                        @php($info=$data->content($firstDomain,$pinyin,$type))
                        <li class="">
                            <em class="orgNum">{{$i+1}}</em><s>{{mt_rand(100,999)}}.{{mt_rand(0,9)}}M</s>
                            <a href="{{$info['url']}}" title="{{$info['title']}}">
                                <img src="{{$host.'/template/download/pc6/img'.'/'.($i+287).'.png'}}" title="{{$info['title']}}" alt="{{$info['title']}}"/>
                                <span>{{$info['title']}}</span>
                            </a>
                            <p>{{$info['article']}}</p>
                        </li>
                    @endfor
                </ul>
            </div>
            <div id="tags" class="tags border mt20">
                <div class="hd"><h3>热门标签</h3></div>
                <ul>
                    @for($i=0;$i<20;$i++)
                        @php($info=$data->content($firstDomain,$pinyin,$type))
                        <li class="c{{$i+1}}"><a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">{{$info['title']}}</a></li>
                    @endfor
                </ul>
            </div>
        </div>
    </div>
@endsection
