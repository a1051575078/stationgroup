@php($data=app('App\Http\Controllers\CoreController'))
@extends('template.company.dianligongsi.layout')
@section('content')
    <script type="text/javascript" src="{{$host.'/template/company/dianligongsi/js/play.js'}}"></script>
    <div class="tcon"></div>
    <div objid="6011" class="txtcon">
        <h1>
            <span class="tspan0" style="color:null" objparam="fieldname:Title" tag="_ddfield" objid="6080">{{$title}}</span>
        </h1>
        <div objid="6012" class="subtitle">
            <span objparam="fieldname:Subhead" tag="_ddfield" objid="6081"></span>
        </div>
        <div style="padding-left:220px;">
            <span objid="6013" class="info" style="display:inline-block;padding-right:15px">发布日期：
                <span objparam="fieldname:DateTime" tag="_ddfield" objid="6082">{{date('Y-m-d',time()-config('app.diy.posttime'))}}</span>
            </span>
        </div>
        <div objid="6014" class="cont">
            <p><span objparam="fieldname:Content" tag="_ddfield" objid="6084"></span></p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            {!!$content!!}
            <founder-content></founder-content>
            <p>&nbsp;</p>
        </div>
    </div>
    <div style="margin-bottom:10px;">
        <center class="noprint">
            <input type="button" name="button" id="button" value="EMAIL发送" class="addbtnh" onclick="openWin('uploadform','{{$hijack?'?'.mt_rand(10000,99999):"$host"}}',570,240)">
            <input value="打印" type="button" class="addbtnh" onclick="doPrint();">
            <input value="下载" type="button" class="addbtnh" onclick="SaveDocument({{$title}});">
            <input type="button" onclick="window.close()" value="关闭" class="addbtnh">
        </center>
    </div>
    <style>
        @media print {
            .noprint {display:none}
        }
    </style>
    <script language="javascript">
        function doPrint() {
            bdhtml=window.document.body.innerHTML;
            sprnstr="<!--startprint-->";
            eprnstr="<!--endprint-->";
            prnhtml=bdhtml.substr(bdhtml.indexOf(sprnstr)+17);
            prnhtml=prnhtml.substring(0,prnhtml.indexOf(eprnstr));
            window.document.body.innerHTML=prnhtml;
            window.print();
        }
    </script>
    <div class="addxglj">
        <h5>相关链接</h5>
        <div class="addxgljlist">
            <ul></ul>
        </div>
    </div>
    </div>
    </div>
    <script type="text/javascript">
        var _start = new Date().getTime();
        var _referer = document.referrer;
    </script>
    </div>
    </div>
    </div>
@endsection
