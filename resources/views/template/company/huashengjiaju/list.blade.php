@extends('template.company.huashengjiaju.layout')
@php($data=app('App\Http\Controllers\CoreController'))
@section('content1')
    <div id="mainContent">
        <div class="content">
            <table class="newsList">
                <tbody>
                @for($i=0;$i<10;$i++)
                    @php($info=$data->content($firstDomain,$pinyin))
                    <tr>
                        <td class="middot">&nbsp;</td>
                        <td>
                            <a href="{{$info['url']}}" title="{{$info['title']}}">{{$info['title']}}</a>
                        </td>
                        <td class="date">{{date('Y-m-d',strtotime('-'.$i.' day'))}}</td>
                    </tr>
                @endfor
                </tbody>
            </table>
            @php($count=mt_rand(12,888))
            <div id="page">共<strong>{{$count}}</strong>条纪录，当前第<strong>1/{{ceil($count/10)}}</strong>页，每页<strong>10</strong>条纪录　
                <span style="color:#666">首页</span>　
                <span style="color:#666">上一页</span>　
                <span style="color:#666">下一页</span>　
                <span style="color:#666">末页</span>
                <script type="text/javascript">
                    function gourl(){
                        var x=document.getElementById("GoPage").value;
                        window.location.href="{{$firstDomain}}"+x;
                    }
                    $(function(){
                        $("#GoPage").val("1");
                    });
                </script>
                　转到第
                <select name="page" id="GoPage" onchange="gourl()">
                    @for($i=0;$i<ceil($count/10);$i++)
                        @php($info=$data->content($firstDomain,$pinyin))
                        <option value="{{$i}}">{{$i}}</option>
                    @endfor
                </select>页
            </div>
        </div>
@endsection
