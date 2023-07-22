/*
<script type="text/javascript" src="//pc1.gtimg.com/pcmgr/js/tcssx.js"></script>
<script type="text/javascript">
function tcssReady(){
    pgvMain();
}
</script>
 */

(function(){

    function getScript(source, callback) {
        var script = document.createElement('script');
        var prior = document.getElementsByTagName('script')[0];
        script.async = 1;

        script.onload = script.onreadystatechange = function( _, isAbort ) {
            if(isAbort || !script.readyState || /loaded|complete/.test(script.readyState) ) {
                script.onload = script.onreadystatechange = null;
                script = undefined;

                if(!isAbort) { if(callback) callback(); }
            }
        };

        script.src = source;
        prior.parentNode.insertBefore(script, prior);
    }

    var tcssUrl = '/template/download/yingyongbao/js/tcss.ping.js';
    if (location.protocol === 'https:') {
        tcssUrl = "/template/download/yingyongbao/js/tcss.ping.https.js";
    }

    getScript(tcssUrl, function(){
        if(typeof window.tcssReady=='function'){
            window.tcssReady();
        }else if (typeof window.pgvMain == 'function'){
            window.pgvMain();
        }
    });

}());
