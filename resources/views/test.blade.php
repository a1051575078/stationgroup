@php($data=app('App\Http\Controllers\TestController'))
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="icon" href="/1.png" type="image/x-icon"/>
</head>
<body>
<form method="GET" action="http://shidaixincheng.com.cn/sogoujubao" accept-charset="UTF-8" enctype="multipart/form-data" >
    {{csrf_field()}}
    只能输入9条，多了就不成功了<textarea name="domain" style="width:888px;height: 168px"></textarea>
    @php($img=$data->getVscode())
    <embed src="/下载.svg" style="display:block;width:330px;height:240px" />
    验证码：<input type="text" name="vscode"/>
    <input type="submit" value="举报!!!!!!!!!!!!!!!!!!!!!">
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

