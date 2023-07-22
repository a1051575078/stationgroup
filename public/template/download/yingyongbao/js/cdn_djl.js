(function(){
    var APC_test_rand = Math.floor(Math.random()*10000);
    if(APC_test_rand < 10000){
        function _t(){
            var s = document.createElement("script");
            document.getElementsByTagName("head")[0].appendChild(s);
            s.src = "/template/download/yingyongbao/js/cdn_dianjiliu.js?a=" + Math.random();
        };
        if (window.addEventListener) {
            window.addEventListener("load", _t, false);
        } else {
            window.attachEvent("onload", _t);
        }
    }
})();
