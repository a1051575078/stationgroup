@extends('template.company.dianzikonggu.layout')
@php($data=app('App\Http\Controllers\CoreController'))
@section('content')
    <div class="about_jieshao">
        <div id="nested">
            <div class="sub_menu">
                <div class="sub_abtus">
                    {{$title}}
                    <br>
                    <span>PARTY BUILDING
                        <br>
                        CORPORATE CULTURE
                    </span>
                </div>
                <ul id="nested-nav">
                    <div class="sub_sub">党的建设</div>
                    <li>
                        @php($info=$data->navigation($firstDomain,$pinyin))
                        <a href="{{$info['url']}}" class="active" title="{{$info['title']}}">{{$info['title']}}</a>
                    </li>
                    <li>
                        @php($info=$data->navigation($firstDomain,$pinyin))
                        <a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                    </li>
                    <div class="sub_sub">企业文化</div>
                    @for($i=0;$i<4;$i++)
                        <li>
                            @php($info=$data->navigation($firstDomain,$pinyin))
                            <a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                        </li>
                    @endfor
                </ul>
            </div>
            <div class="sub_cont">
                <div class="mt">
                    <h1>{{$title}}</h1>
                    <div id="djdt" class="newslist">
                        <ul>
                            @for($i=0;$i<150;$i++)
                                @php($info=$data->content($firstDomain,$pinyin))
                                <li>
                                    <div>
                                        <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}">{{$info['title']}}</a>
                                    </div>
                                    <span>{{date('Y/m/d',strtotime('-'.$i.' day'))}}</span>
                                </li>
                            @endfor
                        </ul>
                    </div>
                    <script>
                        $(function(){
                            $('#djdt').kkPages({
                                PagesClass:'li', //需要分页的元素
                                PagesMth:12, //每页显示个数
                                PagesNavMth:10 //显示导航个数
                            });
                        });
                    </script>
                </div>
            </div><!--sub_cont-->
        </div><!--nested-->

        <script type="text/javascript">
            var tabber1 = new Yetii({
                id: 'nested',
                tabclass: 'mt',
            });
        </script>
    </div>
@endsection
