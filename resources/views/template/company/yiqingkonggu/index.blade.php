@php($data=app('App\Http\Controllers\CoreController'))
@extends('template.company.yiqingkonggu.layout')
@section('content')
    <div class="yq_center">
        <div class="yq_left">
            <div class="yq_title newscenter_tit">
                <h3 class="tit">新闻中心</h3>
                @php($info=$data->navigation($firstDomain,$pinyin))
                <a href="{{$info['url']}}" class="more" title="{{$info['title']}}"></a>
                <div class="clear"></div>
            </div>
            <div class="yq_left_a">
                <div class="yq_left_a01">
                    <div class="slide" id="lun2">
                        <div class="carouse">
                            @php($img=['7916a2e424564b05a278ff09620a977d.JPG','cce179a07b6b498a88e3570a3dcbf0b5.JPG','d181d47a7537424c9d4b1d92b4f76793.JPG','133b4c3d2dc541be8aae59eded7f4f78.JPG','045e2c221008493a96b98321c6c17a06.JPG','a9144dc63a4446f8a7bdf68f7dd4d3fc.JPG','7b49bd270e3a4e8fb0c314c2d5cb583d.jpg'])
                            @for($i=0;$i<7;$i++)
                                @php($info=$data->content($firstDomain,$pinyin))
                                <div class="slideItem">
                                    <a href="{{$info['url']}}" title="{{$info['title']}}">
                                        <img class="banner-img" src="{{$host.'/template/company/yiqingkonggu/img'.'/'.$img[$i]}}" alt="{{$info['title']}}" title="{{$info['title']}}"/>
                                        <p class="slidedetail">{{$info['title']}}</p>
                                    </a>
                                </div>
                            @endfor
                            <div class="dotList"></div>
                        </div>
                        <div class="arti-content"></div>
                    </div>
                </div>
                <div class="yq_left_a02">
                    <ul>
                        @for($i=0;$i<7;$i++)
                            @php($info=$data->content($firstDomain,$pinyin))
                            <li>
                                <a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                                <span>[{{date('Y-m-d',strtotime('-'.$i.' day'))}}]</span>
                            </li>
                        @endfor
                    </ul>
                </div>
            </div>
        </div>
        <div class="yq_right">
            <div class="yq_title pinpai_tit">
                <h3 class="tit">一轻品牌</h3>
                @php($info=$data->navigation($firstDomain,$pinyin))
                <a href="{{$info['url']}}" class="more" title="{{$info['title']}}"></a>
                <div class="clear"></div>
            </div>
            <div class="picMarquee-top">
                <a class="hd_prev"></a>
                <div class="tempWrap">
                    <ul class="picList">
                        @php($img=['8b96d0db5b1a4aec9eb08934a4aa6150.png','0db717289e3f4e6289b056c46e9f4bc6.png','608e7d61bd2e407b9603aae384ec0345.png','9cd7574789114b3688669aa124d1f001.png','1442f8f173a142c49afee5e7cc7da987.png','38611e9a5e1e4a90a4309103096a9e76.png','013507f7fbee45dcbe8d737425abf696.png','6cd06b4d2e704c12b89b1394b41a31d0.png'])
                        @for($i=0;$i<8;$i++)
                            @php($info=$data->content($firstDomain,$pinyin))
                            <li>
                                <div class="pic">
                                    <a href="{{$info['url']}}" title="{{$info['title']}}">
                                        <img src="{{$host.'/template/company/yiqingkonggu/img'.'/'.$img[$i]}}" width="109" height="77" title="{{$info['title']}}" alt="{{$info['title']}}"/>
                                    </a>
                                </div>
                            </li>
                        @endfor
                    </ul>
                </div>
                <a class="hd_next"></a>
            </div>
        </div>
    </div>
@endsection
