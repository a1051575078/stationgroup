@php($data=app('App\Http\Controllers\SllToolController'))
    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="Pragma" content="no-cache"/>
    <meta http-equiv="Cache-Control" content="no-cache"/>
    <meta http-equiv="Expires" content="0"/>
</head>
<body>
@php($data->getVscode())
<form method="GET" action="/360sitemap" accept-charset="UTF-8" enctype="multipart/form-data" >
    {{csrf_field()}}
    <textarea name="domain" style="width:888px;height: 168px"></textarea>
    <img src="/下载.png?{{time()}}"/>
    验证码：<input type="text" name="vscode"/>
    <input type="submit" value="加地图">
</form>
{{--<form method="GET" action="http://shidaixincheng.com.cn/test" accept-charset="UTF-8" enctype="multipart/form-data" >
    {{csrf_field()}}
    <textarea name="ciyu"></textarea>
    <input type="submit" value="查询">
    <input type="checkbox" value="查询" name="KuaizhaoDelete[webAdr][]">
    <input type="checkbox" value="查询" name="KuaizhaoDelete[webAdr][]">
    <input type="checkbox" value="查询" name="KuaizhaoDelete[webAdr][]">
    <input type="checkbox" value="查询" name="KuaizhaoDelete[webAdr][]">
    <input type="checkbox" value="查询" name="KuaizhaoDelete[webAdr][]">
    <input type="checkbox" value="查询" name="KuaizhaoDelete[webAdr][]">
    <input type="checkbox" value="查询" name="KuaizhaoDelete[webAdr][]">
    <input type="checkbox" value="查询" name="KuaizhaoDelete[webAdr][]">
    <input type="checkbox" value="查询" name="KuaizhaoDelete[webAdr][]">
    <input type="checkbox" value="查询" name="KuaizhaoDelete[webAdr][]">
    <input type="checkbox" value="查询" name="KuaizhaoDelete[webAdr][]">
</form>--}}
</body>
</html>

