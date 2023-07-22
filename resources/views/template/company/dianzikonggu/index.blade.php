@php($data=app('App\Http\Controllers\CoreController'))
@extends('template.company.dianzikonggu.layout')
@section('content')
    <div class="DB_tab25">
        <ul class="DB_bgSet">
            <li style="background:url(/template/company/dianzikonggu/img/W020191211421993949781.jpg) no-repeat center center;"></li>
            <li style="background:url(/template/company/dianzikonggu/img/W020191211421476391933.jpg) no-repeat center center;"></li>
            <li style="background:url(/template/company/dianzikonggu/img/W020200117440333574546.jpg) no-repeat center center;"></li>
            <li style="background:url(/template/company/dianzikonggu/img/W020191216546664772815.jpg) no-repeat center center;"></li>
            <li style="background:url(/template/company/dianzikonggu/img/W020191211425083759126.jpg) no-repeat center center;"></li>
            <li style="background:url(/template/company/dianzikonggu/img/W020191211425182659428.jpg) no-repeat center center;"></li>
        </ul>
        <ul class="DB_imgSet">
            <li onclick="javascript:window.location.href='#';"></li>
            <li onclick="javascript:window.location.href='#';"></li>
            <li onclick="javascript:window.location.href='#';"></li>
            <li onclick="javascript:window.location.href='#';"></li>
            <li onclick="javascript:window.location.href='#';"></li>
            <li onclick="javascript:window.location.href='#';"></li>
        </ul>
        <div class="DB_menuWrap">
            <ul class="DB_menuSet">
                <li>
                    <img src="{{$host.'/template/company/dianzikonggu/img/btn_off.png'}}" alt=""/>
                </li>
                <li>
                    <img src="{{$host.'/template/company/dianzikonggu/img/btn_off.png'}}" alt=""/>
                </li>
                <li>
                    <img src="{{$host.'/template/company/dianzikonggu/img/btn_off.png'}}" alt=""/>
                </li>
                <li>
                    <img src="{{$host.'/template/company/dianzikonggu/img/btn_off.png'}}" alt=""/>
                </li>
                <li>
                    <img src="{{$host.'/template/company/dianzikonggu/img/btn_off.png'}}" alt=""/>
                </li>
                <li>
                    <img src="{{$host.'/template/company/dianzikonggu/img/btn_off.png'}}" alt=""/>
                </li>
            </ul>
            <div class="DB_next">
                <img src="{{$host.'/template/company/dianzikonggu/img/nextArrow.png'}}" title="NEXT" alt="NEXT"/>
            </div>
            <div class="DB_prev">
                <img src="{{$host.'/template/company/dianzikonggu/img/prevArrow.png'}}" title="PREV" alt="PREV"/>
            </div>
        </div>
        <script type="text/javascript">
            $('.DB_tab25').DB_tabMotionBanner({
                key:'b28551',
                autoRollingTime:10000,
                bgSpeed:500,
                motion:{
                    DB_1_0:{left:-50,opacity:0,speed:1000,delay:300},
                    DB_1_1:{left:-50,opacity:0,speed:1000,delay:600},
                    DB_1_2:{left:-50,opacity:0,speed:1000,delay:900},
                    DB_1_3:{left:-50,opacity:0,speed:1000,delay:1200},
                    DB_2_1:{left:-50,opacity:0,speed:1000,delay:400},
                    DB_2_2:{left:-50,opacity:0,speed:1000,delay:800},
                    DB_2_3:{left:-50,opacity:0,speed:1000,delay:1200},
                    DB_2_4:{left:-50,opacity:0,speed:1000,delay:1600},
                    DB_3_1:{left:50,opacity:0,speed:1000,delay:500},
                    DB_3_2:{left:50,opacity:0,speed:1000,delay:1000},
                    DB_3_3:{left:50,opacity:0,speed:1000,delay:1500},
                    DB_4_1:{left:50,opacity:0,speed:1000,delay:500},
                    DB_4_2:{left:50,opacity:0,speed:1000,delay:1000},
                    DB_4_3:{left:50,opacity:0,speed:1000,delay:1500},
                    DB_5_1:{left:50,opacity:0,speed:1000,delay:500},
                    DB_5_2:{left:50,opacity:0,speed:1000,delay:1000},
                    DB_5_3:{left:50,opacity:0,speed:1000,delay:1500},
                    DB_6_1:{left:50,opacity:0,speed:1000,delay:500},
                    DB_6_2:{left:50,opacity:0,speed:1000,delay:1000},
                    DB_6_3:{left:50,opacity:0,speed:1000,delay:1500},
                    end:null
                }
            })
        </script>
    </div>
    <div class="index_news">
        <div class="news_all">
            <div align="center">
                @php($info=$data->navigation($firstDomain,$pinyin))
                <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">
                    <img src="{{$host.'/template/company/dianzikonggu/img/20190611.jpg'}}" title="{{$info['title']}}" alt="{{$info['title']}}"/>
                </a>
            </div>
            <div class="news_left">
                <div class="news_photo">
                    <div class="inform_title">
                        &nbsp;&nbsp;资讯中心
                        <span>INFORMATION CENTER</span>
                        <div class="inform_more">
                            @php($info=$data->navigation($firstDomain,$pinyin))
                            <a href='{{$info['url']}}' title="{{$info['title']}}">
                                <img src="{{$host.'/template/company/dianzikonggu/img/news_more.png'}}" title="{{$info['title']}}" alt="{{$info['title']}}"/>
                            </a>
                        </div>
                    </div>
                    <div id="owl" class="owl-carousel">
                        @php($img=['W020210416588134740752.jpg','W020210406312650193080.jpg','W020210317563509725063.jpg','W020210127526952229002.jpg','W020210118502848167439.jpg'])
                        @for($i=0;$i<5;$i++)
                            @php($info=$data->content($firstDomain,$pinyin))
                            <a class="item" href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">
                                <img src='{{$host.'/template/company/dianzikonggu/img/'.$img[$i]}}' width="650"/>
                                <b></b>
                                <span>{{$info['title']}}</span>
                            </a>
                        @endfor
                    </div>
                </div>
                <div class="company_info">
                    <ul>
                        @php($img=['W020161213532829762385.jpg','W020161213532828154149.jpg','W020161213532824788595.jpg','W020161213532821477784.jpg'])
                        @for($i=0;$i<4;$i++)
                            @php($info=$data->content($firstDomain,$pinyin))
                            <li class="company_info_l">
                                <a href='{{$info['url']}}' title="{{$info['title']}}">
                                    <b></b>
                                    <img src='{{$host.'/template/company/dianzikonggu/img/'.$img[$i]}}'/>
                                </a>
                            </li>
                        @endfor
                    </ul>
                </div>
            </div>
            <div class="news_right">
                <div class="company_news">
                    <div class="company_news_title">
                        &nbsp;&nbsp;公司新闻
                        <span>COMPANY NEWS</span>
                    </div>
                    <div class="news_more">
                        @php($info=$data->navigation($firstDomain,$pinyin))
                        <a href='{{$info['url']}}' title="{{$info['title']}}">
                            <img src="{{$host.'/template/company/dianzikonggu/img/news_more.png'}}" title="{{$info['title']}}" alt="{{$info['title']}}"/>
                        </a>
                    </div>
                    <ul>
                        @for($i=0;$i<9;$i++)
                            @php($info=$data->content($firstDomain,$pinyin))
                            <li>
                                <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">{{$info['title']}}</a>
                                <span>{{date('m.d',strtotime('-'.$i.' day'))}}</span>
                            </li>
                        @endfor
                    </ul>
                </div>
                <div class="industry_info">
                    <div class="industry_info_title">
                        &nbsp;&nbsp;行业信息
                        <span>INDUSTRY INFORMATION</span>
                    </div>
                    <div class="news_more">
                        @php($info=$data->navigation($firstDomain,$pinyin))
                        <a href='{{$info['url']}}' title="{{$info['title']}}">
                            <img src="{{$host.'/template/company/dianzikonggu/img/news_more.png'}}" title="{{$info['title']}}" alt="{{$info['title']}}"/>
                        </a>
                    </div>
                    <ul>
                        @for($i=0;$i<5;$i++)
                            @php($info=$data->content($firstDomain,$pinyin))
                            <li>
                                <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">{{$info['title']}}</a>
                                <span>{{date('m.d',strtotime('-'.$i.' day'))}}</span>
                            </li>
                        @endfor
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="product bg">
        <div class="titleline">
            <div class="plan">
                <div class="pro_title">
                    &emsp;产业平台&emsp;
                    <span>INDUSTRY PLATFORM</span>
                </div>
                <div class="pro_bg"></div>
                <div class="listmore">
                    @php($info=$data->navigation($firstDomain,$pinyin))
                    <a href='{{$info['url']}}' title="{{$info['title']}}">
                        <img src="{{$host.'/template/company/dianzikonggu/img/list_more.png'}}" title="{{$info['title']}}" alt="{{$info['title']}}"/>
                    </a>
                </div>
            </div>
        </div>
        <div class="plan">
            <div class="con or">
                @php($img=['W020161213526868289951.png','W020161213526867562539.png','W020161213526866790690.png','W020161213526865973360.png'])
                @for($i=0;$i<4;$i++)
                    <dl>
                        <dd>
                            @php($info=$data->navigation($firstDomain,$pinyin))
                            <a href='{{$info['url']}}' title="{{$info['title']}}">
                                <img src="{{$host.'/template/company/dianzikonggu/img/'.$img[$i]}}" title="{{$info['title']}}" alt="{{$info['title']}}"/>
                            </a>
                        </dd>
                        <dt>
                            <h2>
                                @php($info=$data->navigation($firstDomain,$pinyin))
                                <a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                            </h2>
                            <p>
                                @php($info=$data->navigation($firstDomain,$pinyin))
                                <a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                            </p>
                        </dt>
                    </dl>
                @endfor
            </div>
        </div>
    </div>
    <div class="product">
        <div class="titleline">
            <div class="plan">
                <div class="pro_title">
                    &emsp;企业影像&emsp;
                    <span>ENTERPRISE IMAGE</span>
                </div>
                <div class="pro_bg"></div>
                <div class="listmore">
                    @php($info=$data->navigation($firstDomain,$pinyin))
                    <a href="{{$info['url']}}" title="{{$info['title']}}">
                        <img src="{{$host.'/template/company/dianzikonggu/img/list_more.png'}}" title="{{$info['title']}}" alt="{{$info['title']}}"/>
                    </a>
                </div>
            </div>
        </div>
        <div class="slider">
            <div class="bd">
                <ul>
                    <li>
                        @php($img=['W020161213739215846473.jpg','W020161213739214252011.jpg','W020161213739212657098.jpg','W020161213739210782320.jpg','W020161213739209052538.jpg','W020161213739207306658.jpg','W020161213739205531148.jpg'])
                        @for($i=0;$i<7;$i++)
                            @php($info=$data->content($firstDomain,$pinyin))
                            <a target="_blank" href='{{$info['url']}}' title="{{$info['title']}}">
                                <img src='{{$host.'/template/company/dianzikonggu/img/'.$img[$i]}}'/>
                            </a>
                        @endfor
                    </li>
                    <li>
                        @php($img=['W020161213739203814052.jpg','W020161213739202222977.jpg','W020161213739200555292.jpg','W020161213739198971882.jpg','W020161213739197305466.jpg','W020161213739195711192.jpg','W020161213739194123008.jpg'])
                        @for($i=0;$i<7;$i++)
                            @php($info=$data->content($firstDomain,$pinyin))
                            <a target="_blank" href='{{$info['url']}}' title="{{$info['title']}}">
                                <img src='{{$host.'/template/company/dianzikonggu/img/'.$img[$i]}}'/>
                            </a>
                        @endfor
                    </li>
                    <li>
                        @php($img=['W020161213739192533919.jpg','W020161213739190896077.jpg','W020161213739189318388.jpg','W020161213739187708251.jpg','W020161213739186094101.jpg','W020161213739184456490.jpg','W020161213739182865840.jpg'])
                        @for($i=0;$i<7;$i++)
                            @php($info=$data->content($firstDomain,$pinyin))
                            <a target="_blank" href='{{$info['url']}}' title="{{$info['title']}}">
                                <img src='{{$host.'/template/company/dianzikonggu/img/'.$img[$i]}}'/>
                            </a>
                        @endfor
                    </li>
                    <li>
                        @php($img=['W020161213739181253027.jpg','W020161213739179635540.jpg','W020161213739177762938.jpg','W020161213739176037483.jpg','W020161213739174432165.jpg','W020161213739172797993.jpg','W020161213739171058657.jpg'])
                        @for($i=0;$i<7;$i++)
                            @php($info=$data->content($firstDomain,$pinyin))
                            <a target="_blank" href='{{$info['url']}}' title="{{$info['title']}}">
                                <img src='{{$host.'/template/company/dianzikonggu/img/'.$img[$i]}}'/>
                            </a>
                        @endfor
                    </li>
                    <li>
                        @php($img=['W020161213739169422970.jpg','W020161213739167797067.jpg','W020161213739166216465.jpg','W020161213739164355553.jpg','W020161213739162758922.jpg','W020161213739161120036.jpg','W020161213739159461772.jpg'])
                        @for($i=0;$i<7;$i++)
                            @php($info=$data->content($firstDomain,$pinyin))
                            <a target="_blank" href='{{$info['url']}}' title="{{$info['title']}}">
                                <img src='{{$host.'/template/company/dianzikonggu/img/'.$img[$i]}}'/>
                            </a>
                        @endfor
                    </li>
                </ul>
            </div>
            <div class="hd">
                <ul></ul>
            </div>
            <div class="pnBtn prev">
                <span class="blackBg"></span>
                <a class="arrow" href="javascript:void(0)"></a>
            </div>
            <div class="pnBtn next">
                <span class="blackBg"></span>
                <a class="arrow" href="javascript:void(0)"></a>
            </div>
        </div>
    </div>
    <div class="product bg">
        <div class="titleline">
            <div class="plan"><div class="pro_title">
                    &emsp;链接导航&emsp;
                    <span>LINK NAVIGATION</span>
                </div>
                <div class="pro_bg"></div>
                <div class="listmore">
                    @php($info=$data->navigation($firstDomain,$pinyin))
                    <a href="{{$info['url']}}" title="{{$info['title']}}">
                        <img src="{{$host.'/template/company/dianzikonggu/img/list_more.png'}}" title="{{$info['title']}}" alt="{{$info['title']}}"/>
                    </a>
                </div>
            </div>
        </div>
        <div class="links">
            <ul>
                @php($img=['W020161213594353004453.png','W020161213594352316581.png','W020161213594351667107.png','W020161213594351012019.png','W020161213594350307087.png','W020161213594349607390.png','W020161213594348234616.png','W020161213594347579649.png','W020170614359972742481.png','W020161213594346854159.png','W020161213594345955668.png','W020161213594345301809.png','W020170315507210172160.png','W020161213594343902433.png','W020161213594342626385.png'])
                @for($i=0;$i<15;$i++)
                    @php($info=$data->content($firstDomain,$pinyin))
                    <li>
                        <a href='{{$info['url']}}' target="_blank" title="{{$info['title']}}">
                            <img src='{{$host.'/template/company/dianzikonggu/img/'.$img[$i]}}' title="{{$info['title']}}" alt="{{$info['title']}}"/>
                            <span>{{$info['title']}}</span>
                        </a>
                    </li>
                @endfor
            </ul>
        </div>
        <div class="links linksm">
            <ul>
                @php($img=['W020161213594341807408.png','W020161213594341113583.png','W020161213594340443961.png','W020161213594339770684.png','W020161213594339079245.png','W020161213594338377934.png','W020161213594337696323.png','W020161213594337026560.png','W020161213594336374590.png','W020161213594335662962.png','W020161213594334990425.png','W020161213594334158358.png','W020161213594333484929.png','W020161213594332728304.png','W020161213594332023198.png','W020161213594331305010.png','W020161213594330637587.png','W020161213594329871414.png','W020161213594329079177.png'])
                @for($i=0;$i<15;$i++)
                    @php($info=$data->content($firstDomain,$pinyin))
                    <li>
                        <a href='{{$info['url']}}' target="_blank" title="{{$info['title']}}">
                            <img src='{{$host.'/template/company/dianzikonggu/img/'.$img[$i]}}' title="{{$info['title']}}" alt="{{$info['title']}}"/>
                            <span>{{$info['title']}}</span>
                        </a>
                    </li>
                @endfor
            </ul>
        </div>
        <div class="links_more xia">浏览更多链接 &or;</div>
        <div class="links_more shang">收回更多链接 &and;</div>
    </div>
@endsection
