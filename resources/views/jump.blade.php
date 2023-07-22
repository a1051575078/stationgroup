<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!--<iframe src="{ {$jump}}" style="position:fixed; top:0; left:0; bottom:0; right:0; width:100%; height:100%; border:none; margin:0; padding:0; overflow:hidden; z-index:999999;"></iframe>-->
    {{--<meta name="viewport" content="width=device-width, initial-scale=1">--}}
    {{--<meta charset="utf-8">--}}
    <style>
        .container {
            display: flex;
            flex-direction:column;
            align-items: center;
            height: 350px;
            margin: auto;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
        }
    </style>
</head>
<body>
<script type="text/javascript">
    @for($i=0;$i<count($js);$i++)
    setTimeout(function(){
        {!!$js[$i]!!}
    },{{$i*2000}});
    @endfor
</script>
<div class="container">

    <h1></h1>
</div>
{{--360自动推送--}}
<script>
    (function(){
        var src = "https://s.ssl.qhres2.com/ssl/ab77b6ea7f3fbf79.js";
        document.write('<script src="' + src + '" id="sozz"><\/script>');
    })();
</script>
{{--百度自动推送--}}
<script>
    (function(){
        var bp = document.createElement('script');
        var curProtocol = window.location.protocol.split(':')[0];
        if (curProtocol === 'https'){
            bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';
        }
        else{
            bp.src = 'http://push.zhanzhang.baidu.com/push.js';
        }
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(bp, s);
    })();
</script>
{{--字节自动推送--}}
<script>
    (function(){
        var el = document.createElement("script");
        el.src = "https://lf1-cdn-tos.bytegoofy.com/goofy/ttzz/push.js?efd24c9b12c3b8387739117557539e09089dc82379e02a8982aad917456a8fa5fd5c4a3974f9cd3eeb674bde712b4782cc4f323247d55c2ed2efd47b7c83521adc648ee828d46e7d3689a9c59fd080f6";
        el.id = "ttzz";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(el, s);
    })(window)
</script>
</body>
</html>

