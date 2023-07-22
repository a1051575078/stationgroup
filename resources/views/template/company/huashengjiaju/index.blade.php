@php($data=app('App\Http\Controllers\CoreController'))
@extends('template.company.huashengjiaju.layout')
@section('content')
    <div id="wrapper">
        <div id="mainBody">
            <div class="zuo">
                <div class="zuot">
                    <div class="zuot_y">
                        @php($info=$data->navigation($firstDomain,$pinyin))
                        <a href="{{$info['url']}}" title="{{$info['title']}}">
                            <img src="{{$host.'/template/company/huashengjiaju/img/bj3.jpg'}}" width="36" height="11" title="{{$info['title']}}" alt="{{$info['title']}}"/>
                        </a>
                    </div>
                </div>
                <div class="zuok">
                    <p>　&nbsp;
                        <span style="font-size: xx-small">&nbsp;&nbsp;&nbsp; {{$title}}是一家集设计，生产与销售于一体的规模化大型中高档办公家具企业。</span>
                        <span style="font-size: x-small"><span style="font-family: 宋体">
                            {{$title}}主要生产实木油漆类、板式屏风类、软体类三大系列产品，以良好的供货能力和稳定的质量在业界和市场赢得上佳口碑。三大系列产品齐头并进，形成了业内首屈一指的办公家具综合配套实力体系，建立了覆盖全国各省市的的营销网点。公司自创办之初即以&ldquo;高起点、高标准、严要求&rdquo;为投资定位，倡导创造办公文化，致力于改善办公环境，让办公超越办公，至今已发展成为国内</span>
                    </span>
                        <span style="font-size: x-small">
                        <span style="font-family: 宋体">优秀的办公家具生产基地。</span>
                    </span>
                        <span style="font-size: x-small">
                        <span style="font-family: 宋体">未来的华盛公司，坚持稳健经营、持续发展的方针，致力于&ldquo;打造综合配套实力</span>
                    </span>
                        <span style="font-size: x-small">
                        <span style="font-family: 宋体">较强的办公家具企业&rdquo;，从而实现&ldquo;创铸名牌、服务社会&rdquo;的企业理念。</span>
                    </span>
                    </p>
                    <p>
                    <span style="font-size: x-small">
                        <span style="font-family: 宋体">&nbsp;</span>
                    </span>
                        <span style="font-size: x-small">&nbsp;</span>
                    </p>
                </div>
                <div class="zuod"></div>
            </div>
            <div class="zhong">
                <div class="zhongt">
                    <div class="zuot_y">
                        @php($info=$data->navigation($firstDomain,$pinyin))
                        <a href="{{$info['url']}}" title="{{$info['title']}}">
                            <img src="{{$host.'/template/company/huashengjiaju/img/bj3.jpg'}}" width="36" height="11" title="{{$info['title']}}" alt="{{$info['title']}}"/>
                        </a>
                    </div>
                </div>
                <div class="zhongk">
                    <ul id="picUL">
                        <script language="JavaScript">
                            var flag=false;
                            function AXImg(ximg){
                                var image=new Image();
                                var iwidth = 180; //图片宽度
                                var iheight = 140; //图片高度
                                image.src=ximg.src;
                                if(image.width>0 && image.height>0){
                                    flag=true;
                                    if(image.width/image.height>= iwidth/iheight){
                                        if(image.width>iwidth){
                                            ximg.width=iwidth;
                                            ximg.height=(image.height*iwidth)/image.width;
                                        }else{
                                            ximg.width=image.width;
                                            ximg.height=image.height;
                                        }
                                        ximg.alt=image.width+"×"+image.height;
                                    }
                                    else{
                                        if(image.height>iheight){
                                            ximg.height=iheight;
                                            ximg.width=(image.width*iheight)/image.height;
                                        }else{
                                            ximg.width=image.width;
                                            ximg.height=image.height;
                                        }
                                        ximg.alt=image.width+"×"+image.height;
                                    }
                                }
                            }
                        </script>
                        <div id="demo" style=" width:430px; overflow:hidden;">
                            <table align="left" cellpadding="0" cellspacing="0" border="0" width="100%">
                                <tbody>
                                <tr>
                                    <td id=demo1 valign=top>
                                        <div style="width:1600px;">
                                            @php($img=['201708311521313.jpg','201708311521247.jpg','201708311521183.jpg','201708311521129.jpg','201708311521060.jpg','201708311520245.jpg','201708311520172.jpg','201708311520085.png'])
                                            @for($i=0;$i<8;$i++)
                                                @php($info=$data->content($firstDomain,$pinyin))
                                                <div class="picture">
                                                    <div class="picture1">
                                                        <a href="{{$info['url']}}" title="{{$info['title']}}">
                                                            <img src="{{$host.'/template/company/huashengjiaju/img'.'/'.$img[$i]}}" alt="{{$info['title']}}" title="{{$info['title']}}" onload="AXImg(this)"/>
                                                        </a>
                                                    </div>
                                                    <div class="picture2">
                                                        <a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                                                    </div>
                                                </div>
                                            @endfor
                                        </div>
                                    </td>
                                    <td id="demo2" valign="top">
                                        <div style="width:1600px;">
                                            @php($img=['201708311521313.jpg','201708311521247.jpg','201708311521183.jpg','201708311521129.jpg','201708311521060.jpg','201708311520245.jpg','201708311520172.jpg','201708311520085.png'])
                                            @for($i=0;$i<8;$i++)
                                                @php($info=$data->content($firstDomain,$pinyin))
                                                <div class="picture">
                                                    <div class="picture1">
                                                        <a href="{{$info['url']}}" title="{{$info['title']}}">
                                                            <img src="{{$host.'/template/company/huashengjiaju/img'.'/'.$img[$i]}}" alt="{{$info['title']}}" title="{{$info['title']}}" onload="AXImg(this)"/>
                                                        </a>
                                                    </div>
                                                    <div class="picture2">
                                                        <a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                                                    </div>
                                                </div>
                                            @endfor
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </ul>
                    <script language="javascript">
                        var speed=30;
                        var demo=document.getElementById('demo');
                        var demo1=document.getElementById('demo1');
                        var demo2=document.getElementById('demo2');
                        demo2.innerHTML=demo1.innerHTML;
                        function Marquee(){
                            if(demo2.offsetWidth-demo.scrollLeft<=0) {
                                demo.scrollLeft-=demo1.offsetWidth;
                            }
                            else{demo.scrollLeft++;}
                        }
                        var MyMar=setInterval(Marquee,speed);
                        demo.onmouseover=function(){
                            clearInterval(MyMar)
                        }
                        demo.onmouseout=function(){
                            MyMar=setInterval(Marquee,speed)
                        }
                    </script>
                </div>
                <div class="zhongd"></div>
            </div>
            <div class="you">
                <div class="yout">
                    <div class="zuot_y">
                        @php($info=$data->navigation($firstDomain,$pinyin))
                        <a href="{{$info['url']}}" title="{{$info['title']}}">
                            <img src="{{$host.'/template/company/huashengjiaju/img/bj3.jpg'}}" width="36" height="11" title="{{$info['title']}}" alt="{{$info['title']}}"/>
                        </a>
                    </div>
                </div>
                <div class="youk">
                    <script type="text/javascript">
                        var pic_width=211; //图片宽度
                        var pic_height=167; //图片高度
                        var button_pos=4; //按扭位置 1左 2右 3上 4下
                        var stop_time=3000; //图片停留时间(1000为1秒钟)
                        var show_text=0; //是否显示文字标签 1显示 0不显示
                        var txtcolor="000000"; //文字色
                        var bgcolor="DDDDDD"; //背景色
                        var imag=new Array();
                        var link=new Array();
                        var text=new Array();
                        imag[1]="images/01.jpg";
                        link[1]="";
                        text[1]="标题 1";
                        imag[2]="images/02.jpg";
                        link[2]="";
                        text[2]="标题 2";
                        imag[3]="images/03.jpg";
                        link[3]="";
                        text[3]="标题 3";
                        imag[4]="images/04.jpg";
                        link[4]="";
                        text[4]="标题 4";
                        var swf_height=show_text==1?pic_height+20:pic_height;
                        var pics="", links="", texts="";
                        for(var i=1; i<imag.length; i++){
                            pics=pics+("|"+imag[i]);
                            links=links+("|"+link[i]);
                            texts=texts+("|"+text[i]);
                        }
                        pics=pics.substring(1);
                        links=links.substring(1);
                        texts=texts.substring(1);
                        document.write('<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cabversion=6,0,0,0" width="'+ pic_width +'" height="'+ swf_height +'">');
                        document.write('<param name="movie" value="flash/focus.swf">');
                        document.write('<param name="quality" value="high"><param name="wmode" value="opaque">');
                        document.write('<param name="FlashVars" value="pics='+pics+'&links='+links+'&texts='+texts+'&pic_width='+pic_width+'&pic_height='+pic_height+'&show_text='+show_text+'&txtcolor='+txtcolor+'&bgcolor='+bgcolor+'&button_pos='+button_pos+'&stop_time='+stop_time+'">');
                        document.write('<embed src="flash/focus.swf" FlashVars="pics='+pics+'&links='+links+'&texts='+texts+'&pic_width='+pic_width+'&pic_height='+pic_height+'&show_text='+show_text+'&txtcolor='+txtcolor+'&bgcolor='+bgcolor+'&button_pos='+button_pos+'&stop_time='+stop_time+'" quality="high" width="'+ pic_width +'" height="'+ swf_height +'" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />');
                        document.write('</object>');
                    </script>
                    <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cabversion=6,0,0,0" width="211" height="167">
                        <param name="movie" value="flash/focus.swf">
                        <param name="quality" value="high">
                        <param name="wmode" value="opaque">
                        <param name="FlashVars" value="pics=images/01.jpg|images/02.jpg|images/03.jpg|images/04.jpg&amp;links=|||&amp;texts=标题 1|标题 2|标题 3|标题 4&amp;pic_width=211&amp;pic_height=167&amp;show_text=0&amp;txtcolor=000000&amp;bgcolor=DDDDDD&amp;button_pos=4&amp;stop_time=3000">
                    </object>
                </div>
                <div class="youd"></div>
            </div>
        </div>
    </div>
@endsection
