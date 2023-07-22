@php($data=app('App\Http\Controllers\CoreController'))
@extends('template.company.dianligongsi.layout')
@section('content')
    <div style="width:960px;" class="wrap960">
        <div style="width:960px;" class="wrap960">
            <div style="width:740px;float:left;" class="marginr10">
                <div style="width:740px;" class="indexbanner">
                    <div class="banner">
                        @php($info=$data->navigation($firstDomain,$pinyin))
                        <a target="_self" href="{{$info['url']}}" title="{{$info['title']}}">
                            <img src="{{$host.'/template/company/dianligongsi/img/xuexi.jpg'}}" title="{{$info['title']}}" alt="{{$info['title']}}">
                        </a>
                    </div>
                </div>
                <div style="width:740px;" class="marginb102">
                    <div objparam="" tag="" objid="6009" class="announcement">
                        <h3>通知公告：</h3>
                        <ul objparam="columnname:通知公告,titlenum:15,columnid:7,pagesize:2,buttontype:auto" tag="_normalinfolist" objid="6053">
                            @for($i=0;$i<2;$i++)
                                <li>
                                    @php($info=$data->content($firstDomain,$pinyin))
                                    <a target="_self" href="{{$info['url']}}" title="{{$info['title']}}">
                                        {{$info['title']}}
                                    </a>
                                    <span>[{{date('Y-m-d',strtotime('-'.$i.' day'))}}]</span>
                                </li>
                            @endfor
                                @php($info=$data->navigation($firstDomain,$pinyin))
                                <a target="_self" href="{{$info['url']}}" class="more" title="{{$info['title']}}"></a>
                        </ul>
                    </div>
                </div>
                <div style="width:738px;height:246px;" class="marginb10">
                    <div class="newsbox">
                        <div class="title">
                            <h3>新闻中心</h3>
                            @php($info=$data->navigation($firstDomain,$pinyin))
                            <a target="_self" tag="_column" href="{{$info['url']}}" class="more" title="{{$info['title']}}"></a>
                        </div>
                        <div class="cont">
                            <div tag="_normalinfolist_manual" class="imgtxt">
                                @php($info=$data->navigation($firstDomain,$pinyin))
                                <a target="_self" tag="_normalinfoalink1" href="{{$info['url']}}" title="{{$info['title']}}">
                                    <img tag="_normalinfopic" src="{{$host.'/template/company/dianligongsi/img/weiwen.jpg'}}" title="{{$info['title']}}" alt="{{$info['title']}}"/>
                                </a>
                                <span>
                                    @php($info=$data->content($firstDomain,$pinyin))
                                    <a target="_self" tag="_normalinfoalink" href="{{$info['url']}}" title="{{$info['title']}}">
                                        {{$info['title']}}
                                    </a>
                                </span>
                            </div>
                            <div class="listbox">
                                <div class="tab">
                                    <li class="current">公司要闻</li>
                                    <li>总部动态</li>
                                </div>
                                <div class="tabbox">
                                    <ul tag="_normalinfolist" class="list">
                                        @for($i=0;$i<7;$i++)
                                            <li>
                                                @php($info=$data->content($firstDomain,$pinyin))
                                                <a target="_self" href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                                                <span>{{date('Y-m-d',strtotime('-'.$i.' day'))}}</span>
                                            </li>
                                        @endfor
                                    </ul>
                                    <ul tag="_normalinfolist" class="list">
                                        @for($i=0;$i<7;$i++)
                                            <li>
                                                @php($info=$data->content($firstDomain,$pinyin))
                                                <a target="_self" href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                                                <span>{{date('Y-m-d',strtotime('-'.$i.' day'))}}</span>
                                            </li>
                                        @endfor
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="width:740px;" class="overflowh">
                    <div style="width:235px;float:left;" class="marginr10">
                        <div style="width:233px;height:227px;" class="marginb10">
                            <div class="zjlmrd">
                                <div class="item">
                                    <div objid="6016" class="addtitlelarge">
                                        <h3 style="width:64px;">
                                            <b>媒体聚焦</b>
                                        </h3>
                                    </div>
                                    <div class="cont">
                                        <div class="imgtxt">
                                            @php($info=$data->content($firstDomain,$pinyin,$type))
                                            <span>
                                                {{$info['article']}}
                                                <a class="more" target="_self" href="{{$info['url']}}" title="{{$info['title']}}">【详细】</a>
                                            </span>
                                        </div>
                                        <ul class="list">
                                            @for($i=0;$i<7;$i++)
                                                <li>
                                                    @php($info=$data->content($firstDomain,$pinyin))
                                                    <span>{{date('Y-m-d',strtotime('-'.$i.' day'))}}</span>
                                                    <a target="_self" href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                                                </li>
                                            @endfor
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="width:233px;height:230px;" class="marginb10">
                            <div class="science3">
                                <div class="title">
                                    <h3>互动中心</h3>
                                </div>
                                <ul>
                                    @for($i=0;$i<4;$i++)
                                        <li>
                                            @php($info=$data->navigation($firstDomain,$pinyin))
                                            <a tag="_column" target="_self" href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                                        </li>
                                    @endfor
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div style="width:495px;float:left;">
                        <div style="width:495px;height:229px;" class="marginb102">
                            <div class="zjlmrd">
                                <div class="item">
                                    <div objid="6016" class="addtitlelarge">
                                        <h3 style="width:64px;">
                                            <b>党建动态</b>
                                        </h3>
                                        @php($info=$data->navigation($firstDomain,$pinyin))
                                        <a objparam="columnname:总部动态,columnid:9" tag="_column" objid="6075" href="{{$info['url']}}" class="more" title="{{$info['title']}}">{{$info['title']}}</a>
                                    </div>
                                    <div class="cont">
                                        <div class="imgtxt">
                                            @php($info=$data->content($firstDomain,$pinyin,$type))
                                            <span>
                                                {{$info['article']}}
                                                <a class="more" target="_self" href="{{$info['url']}}" title="{{$info['title']}}">【详细】</a>
                                            </span>
                                        </div>
                                        <ul class="list">
                                            @for($i=0;$i<4;$i++)
                                                <li>
                                                    @php($info=$data->content($firstDomain,$pinyin))
                                                    <span>{{date('Y-m-d',strtotime('-'.$i.' day'))}}</span>
                                                    <a target="_self" href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                                                </li>
                                            @endfor
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="width:493px;height:230px;" class="marginb10">
                            <div class="noelectricity2">
                                <input type="hidden" name="electricityheight" value="230" id="electricityheight">
                                <div class="title">
                                    <h3>
                                        停电公告
                                    </h3>
                                    @php($info=$data->navigation($firstDomain,$pinyin))
                                    <a target="_blank" href="{{$info['url']}}" class="more" title="{{$info['title']}}">{{$info['title']}}</a>
                                </div>
                                <div class="cont2">
                                    <marquee behavior="scroll" scrollamount="3" direction="up" height="230" onmousemove="this.stop()" onmouseout="this.start()">
                                        <div></div>
                                    </marquee>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div style="width:210px;float:left;">
                <div style="width:210px;height:210px;" class="justmarginb10">
                    <div class="customer_service2">
                        <div class="title">
                            <h3>服务热线</h3>
                        </div>
                        <ul>
                            <li>
                                @php($info=$data->navigation($firstDomain,$pinyin))
                                <a target="_blank" href="{{$info['url']}}" title="{{$info['title']}}">
                                    <img src="{{$host.'/template/company/dianligongsi/img/yingyeting.jpg'}}" width="207" height="74" title="{{$info['title']}}" alt="{{$info['title']}}"/>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="addwxbg">
                        <ul>
                            <li class="addwx">
                                <div class="addewm">
                                    <img src="{{$host.'/template/company/dianligongsi/img/wx.png'}}" width="158" height="158" title="微信二维码" alt="微信二维码">
                                </div>
                                <img src="{{$host.'/template/company/dianligongsi/img/wx.png'}}" width="66" height="66" class="smallpic" title="微信二维码" alt="微信二维码">
                                <br>
                                北京电力微信
                            </li>
                            <li class="addwx2">
                                <div class="addewm2">
                                    <img src="{{$host.'/template/company/dianligongsi/img/wb.png'}}" width="158" height="158" title="微博" alt="微博">
                                </div>
                                <img src="{{$host.'/template/company/dianligongsi/img/wb.png'}}" width="66" height="66" class="smallpic" title="微博" alt="微博">
                                <br>
                                北京电力微博
                            </li>
                        </ul>
                    </div>
                    <script type="text/javascript">
                        $(document).ready(function(){
                            $(".addewm").hide();
                            $(".addwx").hover(function(){
                                $(".addewm").toggle();
                            });
                        });
                        $(document).ready(function(){
                            $(".addewm2").hide();
                            $(".addwx2").hover(function(){
                                $(".addewm2").toggle();
                            });
                        });
                    </script>
                </div>
                <div style="width:208px;height:246px;" class="marginb10">
                    <div class="topic">
                        <div class="title">
                            <h3>专题专栏</h3>
                        </div>
                        <div class="cont">
                            <div class="imgtxt">
                                <ul>
                                    @php($info=$data->navigation($firstDomain,$pinyin))
                                    <a target="_self" href="{{$info['url']}}" title="{{$info['title']}}">
                                        <img src="{{$host.'/template/company/dianligongsi/img/youhua.jpg'}}" title="{{$info['title']}}" alt="{{$info['title']}}">
                                    </a>
                                </ul>
                            </div>
                            @for($i=0;$i<4;$i++)
                                <ul>
                                    <li>
                                        @php($info=$data->content($firstDomain,$pinyin))
                                        <a target="_blank" href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                                    </li>
                                </ul>
                            @endfor
                        </div>
                    </div>
                </div>
                <div style="width:210px;" class="margin102">
                    <div class="banner">
                        @php($info=$data->navigation($firstDomain,$pinyin))
                        <a target="_self" href="{{$info['url']}}" title="{{$info['title']}}">
                            <img src="{{$host.'/template/company/dianligongsi/img/jiandu.jpg'}}" title="{{$info['title']}}" alt="{{$info['title']}}">
                        </a>
                    </div>
                </div>
                <div style="width:208px;" class="marginb10">
                    <script type="text/javascript">
                        $(function() {
                            clickSwitch('.swgktopic .swgk_tab li','.swgktopic .swgk_tabbox > .swgk_cont ','0',1);//商务服务和信息公开
                        });
                    </script>
                    <div class="swgktopic">
                        <ul class="swgk_tab">
                            <li>商务服务</li>
                            <li>信息公开</li>
                        </ul>
                        <div class="swgk_tabbox">
                            <div class="swgk_cont">
                                <ul>
                                    @php($img=['dzsw.jpg','dljy.jpg','ztb.jpg'])
                                    @for($i=0;$i<3;$i++)
                                        <li>
                                            @php($info=$data->navigation($firstDomain,$pinyin))
                                            <a target="_blank" href="{{$info['url']}}" title="{{$info['title']}}">
                                                <img src="{{$host.'/template/company/dianligongsi/img/'.$img[$i]}}" title="{{$info['title']}}" alt="{{$info['title']}}"/>
                                            </a>
                                        </li>
                                    @endfor
                                </ul>
                            </div>
                            <div class="swgk_cont">
                                <ul>
                                    @php($img=['public.png','xinxi.png','nianbao.png','huanjing.jpg'])
                                    @for($i=0;$i<4;$i++)
                                        <li>
                                            @php($info=$data->navigation($firstDomain,$pinyin))
                                            <a target="_blank" href="{{$info['url']}}" title="{{$info['title']}}">
                                                <img src="{{$host.'/template/company/dianligongsi/img/'.$img[$i]}}" title="{{$info['title']}}" alt="{{$info['title']}}"/>
                                            </a>
                                        </li>
                                    @endfor
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="width:960px;">
            <form class="sitenav">
                <span objid="6231" class="l"></span>
                <span objid="6232" class="r"></span>
                <label>站点导航</label>
                <select onchange="window.open(this.options[this.selectedIndex].value)">
                    <option value='' selected="">国际电力公司链接</option>
                    @for($i=0;$i<9;$i++)
                        @php($info=$data->content($firstDomain,$pinyin))
                        <option value='{{$info['url']}}'>{{$info['title']}}</option>
                    @endfor
                </select>
                <select onchange="window.open(this.options[this.selectedIndex].value)">
                    <option value='' selected="">相关网站链接</option>
                    @for($i=0;$i<12;$i++)
                        @php($info=$data->content($firstDomain,$pinyin))
                        <option value='{{$info['url']}}'>{{$info['title']}}</option>
                    @endfor
                </select>
                <select onchange="window.open(this.options[this.selectedIndex].value)">
                    <option value='' selected="">兄弟单位链接</option>
                    @for($i=0;$i<29;$i++)
                        @php($info=$data->content($firstDomain,$pinyin))
                        <option value='{{$info['url']}}'>{{$info['title']}}</option>
                    @endfor
                </select>
            </form>
        </div>
    </div>
@endsection
