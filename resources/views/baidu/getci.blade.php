<!DOCTYPE html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
</head>
<body>
<form method="GET" action="/baidugetci" accept-charset="UTF-8" enctype="multipart/form-data">
    {{csrf_field()}}
    <textarea name="ciyu" style="width:888px;height: 168px"></textarea>
    <input type="submit" value="挖词">
</form>
</body>
</html>
