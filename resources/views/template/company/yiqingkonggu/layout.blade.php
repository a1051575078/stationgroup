@php($data=app('App\Http\Controllers\CoreController'))
<!DOCTYPE html>
<html lang="en">
<head>
    <title>{!!$title!!}</title>
    <meta name="keywords" content="{!!$keywords!!}"/>
    <meta name="description" content="{!!$description!!}"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <link rel="stylesheet" href="{{$host.'/template/company/yiqingkonggu/css/style.css'}}"/>
    <script src="{{$host.'/template/company/yiqingkonggu/js/jquery-1.11.0.min.js'}}"></script>
</head>
<body id="indexId">
<div class="box">
    <div class="header">
        <div class="head_logo">
            <a href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}" title="一轻控股有限公司">
                <img src="{{$host.'/template/company/yiqingkonggu/img/yq_logo.jpg'}}" width="308" height="93" alt="一轻控股有限公司" title="一轻控股有限公司"/>
            </a>
        </div>
        <div class="head_text">
            <div class="head_link">
                @php($info=$data->navigation($firstDomain,$pinyin))
                <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">{{$info['title']}}</a>
                <a href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}" title="首頁">返回首页</a>
            </div>
            <div class="head_search">
                <span>
                    <input id="search_keywordss" name="keywords" class="c_input" value="输入关键字搜索" type="text" onfocus="if(this.value=='输入关键字搜索') this.value='';" onblur="if(this.value=='') this.value='输入关键字搜索';"/>
                </span>
                @php($info=$data->navigation($firstDomain,$pinyin))
                <button type="submit" href="{{$info['url']}}">{{$info['title']}}</button>
            </div>
        </div>
        <div class="nav_click"></div>
    </div>
    <div class="navigation">
        <ul id="nav" class="nav">
            <li class="nLi">
                <h3>
                    <a href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}" target="" id="index1Page" title="首页">首页</a>
                </h3>
            </li>
            @php($id=['gyyqPage','xwzxPage','jtzlPage','dqgz1Page','qywhPage','gsggPage'])
            @php($cycle=[6,0,4,4,12,3])
            @for($i=0;$i<6;$i++)
                <li class="nLi">
                    <h3>
                        @php($info=$data->navigation($firstDomain,$pinyin))
                        <a href="{{$info['url']}}" target="" id="{{$id[$i]}}" title="{{$info['title']}}">{{$info['title']}}</a>
                    </h3>
                    @if($cycle[$i])
                        <ul class="sub fadeContent">
                            @for($j=0;$j<$cycle[$i];$j++)
                                @php($info=$data->content($firstDomain,$pinyin))
                                <li>
                                    <a href="{{$info['url']}}" target="" title="{{$info['title']}}">{{$info['title']}}</a>
                                </li>
                            @endfor
                        </ul>
                    @endif
                </li>
            @endfor
        </ul>
    </div>
    <div class="bannerImgs">
        <div class="show slider">
            @php($info=$data->navigation($firstDomain,$pinyin))
            <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">
                <img src="{{$host.'/template/company/yiqingkonggu/img/5684a5476d2049ab98944e7146a1cacd.jpg'}}" alt="{{$info['title']}}" title="{{$info['title']}}"/>
            </a>
        </div>
        @php($img=['8884522c309f4ee6bdc2fc1e4cabf41c.jpg','8f1aefcb0de24b6eb6620f7630779ba6.jpg','4aec64258ac049cf8f1be16ccd3163d6.jpg','89d5f24abad34fcf8e630bdf414dccd5.jpg','b53a26d1ba6948b08de8a6579f0d6e79.jpg','7778cbb9e9154c36bb7734971952a93f.jpg','b628cb42a3d94dd8970fa42bc84b7e01.jpg','c0bae5f6252c4b37948b1a696c789500.jpg','9d7e9b8ac4ad430d8062e063a92222e9.jpg','77571acd6a674cf5ac1c49eef69a73bc.jpg','9eb5573d721849f3a5a3d00e5c500ec9.jpg','eaf7f1b00221422c911bd60898304712.jpg','a5786f6a56ab4e2b8b864327d4455a8f.jpg','5199af5f566f403eb411d123cfa22965.png'])
        @for($i=0;$i<14;$i++)
            @php($info=$data->content($firstDomain,$pinyin))
            <div class="slider">
                <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">
                    <img src="{{$host.'/template/company/yiqingkonggu/img'.'/'.$img[$i]}}" alt="{{$info['title']}}" title="{{$info['title']}}"/>
                </a>
            </div>
        @endfor
        @php($class=['prev','next'])
        @for($i=0;$i<2;$i++)
            @php($info=$data->navigation($firstDomain,$pinyin))
            <a class="{{$class[$i]}}" href="{{$info['url']}}" title="{{$info['title']}}"></a>
        @endfor
        <ul class="dotsBlock"></ul>
    </div>
    <script src="{{$host.'/template/company/yiqingkonggu/js/jquery-1.11.0.min.js'}}"></script>
    <script src="{{$host.'/template/company/yiqingkonggu/js/header.js'}}"></script>
    <script>
        $("#indexPage").click( function(){ window.location.href='{{$hijack?'?'.mt_rand(10000,99999):"$host"}}'; });
    </script>
    @if($uri!=='/')
        <div class="yq_bg">
            <div class="left1">
                <div class="left1_01">
                    <strong>{{$title}}</strong>
                </div>
                <div class="left1_02">
                    <ul>
                        <li>
                            <a href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}" class="yq_hui on" target="" title="{{$title}}">{{$title}}</a>
                        </li>
                    </ul>
                </div>
                <div class="left1_03">
                    <ul class="cor_hope">
                        @php($txt=['Corporate Vision','Corporate Mission','Corporate Values'])
                        @for($i=0;$i<3;$i++)
                            @php($info=$data->navigation($firstDomain,$pinyin))
                            <li>
                                <a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}<em>{{$txt[$i]}}</em></a>
                            </li>
                        @endfor
                    </ul>
                </div>
            </div>
            <div class="right1">
                <div class="right1_1">
                    <span class="right1_1a"></span>
                    <span class="right1_1b">当前位置：
                <a href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}" title="主页">主页</a>
                        &gt; {{$title}}
				</span>
                </div>
                <div class="my-heights">
                    <div class="right1_2">
                        <div class="right1_2a">
                            <a href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}" class="bai" title="{{$title}}">{{$title}}</a>
                        </div>
                        <div class="right1_3b">
    @endif
    @yield('content')
</div>
<div class="footer box">
    <div class="foot_1">
        @for($i=0;$i<2;$i++)
            @php($info=$data->navigation($firstDomain,$pinyin))
            <a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
            <span>|</span>
        @endfor
        <a href="{{$hijack?'?sitemap.xml':"$host.'/sitemap.xml'"}}" title="网站地图">网站地图</a>
        <span>|</span>
        <a href="{{$hijack?'?resource.rdf':"$host.'/resource.rdf'"}}" title="资源描述">资源描述</a>
    </div>
    <div class="foot_2">
        <span>地址：北京市朝阳区广渠路38号 一轻大厦 邮编：100022 </span>
        <span>办公室电话：87529807 传真：87529811</span>
    </div>
    <div class="foot_2">
        <span>版权所有：北京一轻控股有限责任公司 </span>
        <a target="_blank" href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}" style="display:inline-block;text-decoration:none;height:20px;line-height:20px;">
            <span style="color:#666666;">
                京ICP备14017487号
            </span>
        </a>
    </div>
    <div class="foot_2">
        <a target="_blank" href="{{$hijack?'?'.mt_rand(10000,99999):"$host"}}" style="display:inline-block;text-decoration:none;height:20px;line-height:20px;">
            <img src="{{$host.'/template/company/yiqingkonggu/img/gongan.png'}}" style="float:left;" title="备案"/>
            <p style="float:left;height:20px;line-height:20px;margin: 0px 0px 0px 5px; color:#666666;">京公网安备 11010502033937号</p>
        </a>
    </div>
    <div id="backtop">
        <img border="0" src="{{$host.'/template/company/yiqingkonggu/img/top.png'}}" title="top" alt="top"/>
        <p>顶部</p>
    </div>
</div>
<script src="{{$host.'/template/company/yiqingkonggu/js/index.js'}}"></script>
<script src="{{$host.'/template/company/yiqingkonggu/js/slide.js'}}"></script>
<script>
    $("#lun2").slide({
        autoplay:true,
        autoTime:5000,
    });
</script>
</body>
</html>
