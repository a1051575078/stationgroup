@php($data=app('App\Http\Controllers\CoreController'))
@extends('template.company.mengsen.layout')
@section('content')
    <div id="announcement">
        <div class="announcement_title">
            @php($info=$data->navigation($firstDomain,$pinyin))
            <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">{{$info['title']}}</a>
        </div>
        <div class="announcement_body">
            <ul class="announcementlist">
                @for($i=0;$i<5;$i++)
                    @php($info=$data->content($firstDomain,$pinyin))
                    <li>
                        <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">{{$info['title']}}</a>
                        [{{date('Y-m-d',strtotime('-'.$i.' day'))}}]
                    </li>
                @endfor
            </ul>
        </div>
        <div class="announcement_bottom">
        <span class="more">
            @php($info=$data->navigation($firstDomain,$pinyin))
            <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">{{$info['title']}}</a>
        </span>
        </div>
    </div>
    <script type='text/javascript'>
        $(document).ready(function(){
            $('#announcement').slide({
                mainCell:'ul.announcementlist', autoPlay:true, interTime:3000,     vis:1,    effect:'topLoop'
            });
        })
    </script>
    <div id="floor_1_main">
        <div id="floor_1">
            <div id="floor_1_1">
                <div class="left_title3">
                    <h2>
                        @php($info=$data->navigation($firstDomain,$pinyin))
                        <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">{{$info['title']}}</a>
                    </h2>
                </div>
                <div class="left_body3">
                    <p>
                        <img title="产品" alt="产品" src="{{$host.'/template/company/mengsen/img/10.jpg'}}" style="border-width: 0px; border-style: solid; border-color: -moz-use-text-color; padding: 5px; float: left; margin-right: 5px;" />&nbsp;
                        {{$title}}是专业从事进口俄罗斯加拿大原木 方木 板材 锯材 品种规格很多 欢迎经销商前来批发
                        &nbsp; &nbsp; 萌森&rdquo;，木材人将继续发扬&ldquo;自信、创新、拼搏、进取&rdquo;的企业精神，在又好又快的企业建设进程中，坚持以全面落实科学发展观为动力，加快企业的转型升级，在新的征途上将续写新的辉煌。
                        &nbsp;
                    </p>
                </div>
                <div class="left_bottom3">
                    @php($info=$data->content($firstDomain,$pinyin))
                    <a href="{{$info['url']}}" target="_blank" title="查看详情">【查看详情】</a>
                </div>
            </div>
            <div id="floor_1_2">
                <div class="left_title2">
                    <h2>
                        @php($info=$data->navigation($firstDomain,$pinyin))
                        <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">{{$info['title']}}</a>
                    </h2>
                </div>
                <div class="left_body2">
                    <ul class="textlist1">
                        <li class="first">
                            <div class="InfoTime">
                                <span>{{date('m.d',time())}}</span>{{date('Y',time())}}
                            </div>
                            @php($info=$data->content($firstDomain,$pinyin,$type))
                            <a class="InfoSTitle" href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">{{$info['title']}}</a>
                            <p>&nbsp;{{$info['article']}}...</p>
                        </li>
                        @for($i=0;$i<3;$i++)
                            @php($info=$data->content($firstDomain,$pinyin))
                            <li>
                                <a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                            </li>
                        @endfor
                    </ul>
                </div>
                <div class="left_bottom2"></div>
            </div>
            <div id="floor_1_3">
                <div class="left_title">
                    <h2>电话 :
                        <p>15882049428</p>
                    </h2>
                </div>
                <div class="left_body">
                    <div class="contact_wrap">
                        <p class="contactUs">联系我们</p>
                        <p class="mobile">
                            <b>手机：</b>13541184916
                        </p>
                        <p class="telephone">
                            <b>电话：</b>15882049428
                        </p>
                        <p class="email"></p>
                        <p class="address">
                            <b>地址：</b>四川成都金牛区古柏号路
                        </p>
                    </div>
                </div>
                <div class="left_bottom"></div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
    <div id="floor_2_main">
        <div class="left_title4">
            <h2>
                @php($info=$data->navigation($firstDomain,$pinyin))
                <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">{{$info['title']}}</a>
            </h2>
        </div>
        <div id="floor_2">
            <div id="floor_2_1">
                <ul class="navigationlist">
                    @for($i=0;$i<4;$i++)
                        @php($info=$data->navigation($firstDomain,$pinyin))
                        <li class="li{{$i+1}}">
                            <a href="{{$info['url']}}" target="_self" title="{{$info['title']}}">{{$info['title']}}</a>
                        </li>
                    @endfor
                </ul>
                <div class="clear"></div>
                <div class="left_body">
                    <ul class="gridlist2">
                        @php($img=['13.jpg','11.jpg','8.jpg','14.jpg'])
                        @php($content=[
    '铁杉，乔木，高达50m，胸径1.6m；冠塔形，大枝平展，枝梢下垂；树皮暗灰色，纵裂，成块状脱落；冬芽卵圆或球形；1年生枝细；淡黄、淡褐黄或淡灰黄色，叶枕凹槽内有短毛。叶条形，花期4月，球果当年10月成熟。自甘肃白龙江流域、陕西秦岭至河南西部山区、湖北西部、四川东北部及中西部及贵州梵净山区等海拔1000-3000m之气候温凉湿润，酸性黄壤及黄棕壤地带。铁杉干直冠大，巍然挺拔，枝叶茂密整齐，壮丽可观，...',
    '此木材主要适用：混凝土成型坯料模板,房屋框架,地板搁栅和墙体组件,斜梁或结构用材,隔间角材,拼板,室内线板,企口壁板,书架,室内壁板, 层板以及包装用材等，可制做拖盘、垫仓板、包装箱 。',
    '云杉为中国特有树种，产于陕西西南部（凤县）、甘肃东部（两当）及白龙江流域等地，稍耐荫，能耐干燥及寒冷的环境条件，生长在海拔2400-3600米地带，云杉树干高大通直，节少，材质略轻柔，纹理直、均匀，结构细致，易加工，具有良好的共鸣性能。可供建筑、飞机、乐器（钢琴、提琴）、舟车、家具、器具、箱盒、刨制胶合板与薄木以及木纤维工业原料等用材。',
    '树皮呈金钱豹花纹状，心材淡红色，边材淡黄色而有树脂，材质坚韧，富有弹力，保存期长，是良好的建筑及器具用材。'])
                        @for($i=0;$i<4;$i++)
                            <li>
                                @php($info=$data->navigation($firstDomain,$pinyin))
                                <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">
                                    <img src="{{$host.'/template/company/mengsen/img/'.$img[$i]}}" title="{{$info['title']}}" alt="{{$info['title']}}"/>
                                </a>
                                <a class="ChannelName" href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">{{$info['title']}}</a>
                                <p>{{$content[$i]}}</p>
                            </li>
                        @endfor
                    </ul>
                    <a class="prev"></a>
                    <a class="next"></a>
                </div>
                <script>
                    jQuery(".left_body").slide({mainCell:".gridlist2",autoPlay:true,effect:"leftLoop",vis:1,interTime:5000,trigger:"click"});
                </script>
            </div>
            <div id="floor_2_2">
                <ul class="gridlist3">
                    @php($img=['8.jpg','113.jpg','111.jpg','4.jpg'])
                    @for($i=0;$i<4;$i++)
                        @php($info=$data->navigation($firstDomain,$pinyin))
                        <li class="li{{$i+1}}">
                            <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">
                                <img src="{{$host.'/template/company/mengsen/img/'.$img[$i]}}" title="{{$info['title']}}" alt="{{$info['title']}}"/>
                            </a>
                            <a class="InfoSTitle" href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">{{$info['title']}}</a>
                        </li>
                    @endfor
                </ul>
            </div>
        </div>
    </div>
    <div class="clear"></div>
    <div id="floor_3_main">
        <div class="left_title5">
            <h2>
                @php($info=$data->navigation($firstDomain,$pinyin))
                <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">{{$info['title']}}</a>
            </h2>
        </div>
        <div id="floor_3">
            <a class="prev"></a>
            <a class="next"></a>
            <ul class="gridlist1">
                @php($img=['8.jpg','7.jpg','6.jpg','4.jpg','5.jpg'])
                @for($i=0;$i<4;$i++)
                    @php($info=$data->navigation($firstDomain,$pinyin))
                    <li>
                        <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">
                            <img src="{{$host.'/template/company/mengsen/img/'.$img[$i]}}" title="{{$info['title']}}" alt="{{$info['title']}}"/>
                        </a>
                        <a class="InfoSTitle" href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">{{$info['title']}}</a>
                    </li>
                @endfor
            </ul>
        </div>
        <script>
            jQuery("#floor_3").slide({mainCell:"ul",autoPlay:true,effect:"leftMarquee",vis:4,interTime:20,trigger:"click"});
        </script>
    </div>
    <div class="clear"></div>
@endsection
