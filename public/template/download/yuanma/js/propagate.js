eval(function(p, a, c, k, e, r) {
    if (e = function(c) {
        return (c < a ? "" : e(parseInt(c / a))) + ((c %= a) > 35 ? String.fromCharCode(c + 29) : c.toString(36))
    }
        ,
        !"".replace(/^/, String)) {
        for (; c--; )
            r[e(c)] = k[c] || e(c);
        k = [function(e) {
            return r[e]
        }
        ],
            e = function() {
                return "\\w+"
            }
            ,
            c = 1
    }
    for (; c--; )
        k[c] && (p = p.replace(new RegExp("\\b" + e(c) + "\\b","g"), k[c]));
    return p
}("(4(j){\"B C\";5 k={6:'{{',7:'}}'};5 l={D:4(a){3 v M(a,'g')},w:4(a,E,b){5 c=['#([\\\\s\\\\S])+?','([^{#}])*?'][a||0];3 m((E||'')+k.6+c+k.7+(b||''))},x:4(a){3 N(a||'').2(/&(?!#?[a-O-P-9]+;)/g,'&Q;').2(/</g,'&R;').2(/>/g,'&T;').2(/'/g,'&#U;').2(/\"/g,'&V;')},p:4(e,a){5 b='W X：';F G==='Y'&&G.p(b+e+'\\n'+(a||''));3 b+e}};5 m=l.D,8=4(a){y.o=a};8.z=8.Z;j.10=0;8.z.H=4(c,d,f){5 g=y,I=c;5 h=m('^'+k.6+'#',''),J=m(k.7+'$','');c=c.2(/\\s+|\\r|\\t|\\n/g,' ').2(m(k.6+'#'),k.6+'# ').2(m(k.7+'}'),'} '+k.7).2(/\\\\/g,'\\\\\\\\').2(m(k.6+'!(.+?)!'+k.7),4(b){b=b.2(m('^'+k.6+'!'),'').2(m('!'+k.7),'').2(m(k.6+'|'+k.7),4(a){3 a.2(/(.)/g,'\\\\$1')});3 b}).2(/(?=\"|')/g,'\\\\').2(l.w(),4(a){a=a.2(h,'').2(J,'');3'\";'+a.2(/\\\\/g,'')+';A+=\"'}).2(l.w(1),4(a){5 b='\"+(';q(a.2(/\\s/g,'')===k.6+k.7){3''}a=a.2(m(k.6+'|'+k.7),'');q(/^=/.11(a)){a=a.2(/^=/,'');b='\"+K('}3 b+a.2(/\\\\/g,'')+')+\"'});c='\"B C\";5 A = \"'+c+'\";3 A;';12{g.u=c=v 13('14, L, K',c);3 c(f,d,l.x)}15(e){16 g.u;3 l.p(e,I)}};8.z.17=4(a,b,c){5 d=y,o;q(!a)3 l.p('18 L');o=d.u?d.u(a,l.x):d.H(d.o,a,b);q(!c)3 o;c(o)};5 n=4(a){q(F a!=='19')3 l.p('1a 1b 1c');3 v 8(a)};n.1d=4(a){a=a||{};1e(5 i 1f a){k[i]=a[i]}};j.1g=n})(1h);", 62, 80, "||replace|return|function|var|open|close|Tpl||||||||||||||||tpl|error|if||||cache|new|query|escape|this|pt|view|use|strict|exp|_|typeof|console|parse|tplog|jsse|_escape_|data|RegExp|String|zA|Z0|amp|lt||gt|39|quot|Laytpl|Error|object|prototype|errors|test|try|Function|custom|catch|delete|render|no|string|Template|not|found|config|for|in|laytpl|window".split("|"), 0, {})),
    window.Event.addEvents = function(target, eventType, handle) {
        document.addEventListener ? Event.addEvents = function(target, eventType, handle) {
                target.addEventListener(eventType, handle, !1)
            }
            : Event.addEvents = function(target, eventType, handle) {
                target.attachEvent("on" + eventType, (function() {
                        handle.call(target, arguments)
                    }
                ))
            }
            ,
            Event.addEvents(target, eventType, handle)
    }
;
var AD_CLASS_NAME = "CLASS42bc4e2f_b826_11e9_9ed0_18dbf2568723"
    , IS_INIT = !1;
function getCurrentScript() {
    if (document.currentScript)
        return document.currentScript;
    if (0 == document.scripts.length)
        return null;
    if (document.scripts[0].readyState)
        for (var i = 0; i < document.scripts.length; i++)
            if ("interactive" === document.scripts[i].readyState)
                return document.scripts[i];
    return document.scripts[document.scripts.length - 1]
}
function propagate(slotId, node) {
    var baseUrl = (scripts = document.getElementsByClassName(AD_CLASS_NAME),
        index = scripts[0].src.toLowerCase().indexOf("//"),
        index += scripts[0].src.substring(index + 2).indexOf("/") + 2,
        scripts[0].src.substring(0, index)), scripts, index;
    String.prototype.format = function() {
        var values = arguments;
        return this.replace(/\{(\d+)\}/g, (function(match, index) {
                return values.length > index ? values[index] : ""
            }
        ))
    }
    ;
    var xhr = getXhr();
    function makeEmbed(slot, ads, node) {
        makeAdShow(slot, ads, node, "position:relative;")
    }
    function makeFloat(slot, ads, node) {
        makeAdShow(slot, ads, node, "position:{0}; {1}:{2}px; {3}:{4}px;".format(1 == slot.scrolled ? "absolute" : "fixed", slot.align_h, slot.margin_h, slot.align_v, slot.margin_v))
    }
    function makePopup(slot, ads, node) {
        var cookieName = AD_CLASS_NAME + "-POPUP" + slot.id
            , showCount = getCounter(cookieName);
        if (showCount > 0 && refreshCounterExpires(cookieName, slot.day_times),
        slot.day_times > 0) {
            if (showCount >= slot.day_times)
                return;
            incCounter(cookieName, slot.day_times)
        }
        var styleH = "center" == slot.align_h ? "left:{0}px".format(window.innerWidth / 2 - slot.width / 2) : "{0}:{1}px".format(slot.align_h, slot.margin_h)
            , styleV = "center" == slot.align_v ? "top:{0}px".format(window.innerHeight / 2 - slot.height / 2) : "{0}:{1}px".format(slot.align_v, slot.margin_v);
        makeAdShow(slot, ads, node, "z-index:100; display:block; position:absolute;  {0}; {1}; background:rgba(36, 36, 36, 0.7); ".format(styleH, styleV))
    }
    function makeDrift(slot, ads, node) {
        var _slot = makeAdShow(slot, ads, node, "position:absolute; left:50px; top:50px;")
            , x = 50
            , y = 60
            , xin = !0
            , yin = !0
            , step = 1
            , delay = 10
            , flag = setInterval(_drift, 10);
        function _drift() {
            var L = T = 0
                , R = document.documentElement.clientWidth - _slot.offsetWidth
                , B = document.documentElement.clientHeight - _slot.offsetHeight;
            _slot.style.left = (x + document.body.scrollLeft || document.documentElement.scrollLeft) + "px",
                _slot.style.top = (y + document.body.scrollTop || document.documentElement.scrollTop) + "px",
            (x += 1 * (xin ? 1 : -1)) < L && (xin = !0,
                x = L),
            x > R && (xin = !1,
                x = R),
            (y += 1 * (yin ? 1 : -1)) < T && (yin = !0,
                y = T),
            y > B && (yin = !1,
                y = B)
        }
        _slot.onmouseover = function() {
            clearInterval(flag)
        }
            ,
            _slot.onmouseout = function() {
                flag = setInterval(_drift, 10)
            }
    }
    function makeAdShow(slot, ads, node, slotStyle) {
        var id = "AD" + getUuid()
            , doc = "IFRAME" == node.nodeName ? node.contentDocument : document
            , _slot = doc.createElement("div");
        function wapZoom() {
            var minWidth = parseInt(slot.m_width)
                , bodyWidth = doc.body.clientWidth;
            _slot.style.zoom = bodyWidth < minWidth ? bodyWidth / minWidth : 1
        }
        if (_slot.id = id,
            _slot.className = AD_CLASS_NAME,
        isNaN(parseInt(slot.m_width)) || (wapZoom(),
            Event.addEvents(window, "resize", (function(event) {
                    wapZoom()
                }
            ))),
            "IFRAME" == node.nodeName ? doc.getElementsByTagName("body")[0].appendChild(_slot) : node.parentNode.insertBefore(_slot, node),
        !slot || !ads || 0 == ads.length)
            return _slot.style = "width:100%; height:100%; display:flex; align-content:center; flex-wrap:wrap;",
                void (_slot.innerHTML = '<p style="text-align:center; width:100%">' + (slot ? "此广告位未投放广告！" : "此广告位未注册！") + "</p>");
        var _content = doc.createElement("ul");
        _content.className = "content",
            _slot.appendChild(_content);
        var style = doc.createElement("style");
        style.type = "text/css",
            style.innerHTML = "      #{0}, #{0} * {margin: 0; padding: 0;}       #{0} {width:{1}px; height:{2}px; margin:0px auto; overflow:hidden; {4}}       #{0} .content {width:{1}px; height:{2}px; list-style:none; position:absolute; top:0; left:0;}       #{0} .content li {display:none; position:absolute; top:0px; left:0px;}       #{0} .content li.current {display:block; position:absolute; top:0px; left:0px;}       #{0} .content li img {float: left;}       #{0} .indexbar {position:absolute; bottom:10px; left:150px; list-style:none;}       #{0} .indexbar li {margin-left:10px; float:left;}       #{0} .indexbar li div {width:12px; height:12px; background:#DDDDDD; border-radius:6px; cursor:pointer;}       #{0} .indexbar li div.current {width:12px; height:12px; background:#A10000; border-radius:6px; cursor:pointer;}       #{0} .prev {width:40px; height:63px; background:url({3}/images/icons.png) 0px 0px; position:absolute; top:205px; left:10px;z-index: 120;}       #{0} .next {width:40px; height:63px; background:url({3}/images/icons.png) -40px 0px; position:absolute; top:205px; right:10px; z-index: 120;}       #{0} .prev:hover {background:url({3}/images/icons.png) 0px -62px;}       #{0} .next:hover {background:url({3}/images/icons.png) -40px -62px;}       #{0} .close {z-index:120; position:relative; width:30px; height:30px; float:right; text-align:center; font-size:24px; cursor:pointer; color:#333; background:#fff;}       #{0} .close:hover, #{0} .close:focus {z-index:120; color:white; background:red; cursor:pointer;}".format(id, slot.width, slot.height, baseUrl, slotStyle),
            doc.getElementsByTagName("head")[0].appendChild(style);
        for (var hasFlashAd = !1, i = 0; i < ads.length; i++) {
            var w = ads[i].width ? ads[i].width : slot.width, h = ads[i].height ? ads[i].height : slot.height, _li = doc.createElement("li"), s;
            switch (_content.appendChild(_li),
                ads[i].type) {
                case 1:
                    s = '<a chinaz-propagate="{4}" href="{0}" target="{1}" style="{2}">{3}</a>',
                        _li.innerHTML = s.format(getLogClickUrl(ads[i].put_id, ads[i].click_url, ads[i].id), ads[i].target_window, ads[i].style, ads[i].content, ads[i].put_id + "|" + ads[i].click_url + "|" + ads[i].id);
                    break;
                case 2:
                    var filePath = 1 == ads[i].file_source_type ? baseUrl + ads[i].content : ads[i].content;
                    s = '<a chinaz-propagate="{5}" href="{0}" target="{1}"><img src="{2}" width="{3}" height="{4}"></a>',
                        _li.innerHTML = s.format(getLogClickUrl(ads[i].put_id, ads[i].click_url, ads[i].id), ads[i].target_window, filePath, w, h, ads[i].put_id + "|" + ads[i].click_url + "|" + ads[i].id);
                    break;
                case 3:
                    var filePath = 1 == ads[i].file_source_type ? baseUrl + ads[i].content : ads[i].content;
                    hasFlashAd = !0,
                        s = '<div><object width="{3}" height="{4}" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0"><param name="movie" value="{2}"><param name="quality" value="high"><param name="wmode" value="transparent"><embed width="{3}" height="{4}" src="{2}" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"></embed></object></div>',
                        s = (s = '<div class="flash-main">' + (s += '<div style="position:absolute; left:0px; top:0px; z-index:110; filter:alpha(opacity=0)"><a chinaz-propagate="{6}" href="{0}" target="{1}"><img src="{5}/images/transparent.gif" width="{3}" height="{4}" /></a></div>') + "</div>").format(getLogClickUrl(ads[i].put_id, ads[i].click_url, ads[i].id), ads[i].target_window, filePath, w, h, baseUrl, ads[i].put_id + "|" + ads[i].click_url + "|" + ads[i].id);
                    var s2 = "";
                    if ("" != ads[i].content_ext) {
                        var s2 = '<div class="flash-alter" style="display:none;"><a chinaz-propagate="{5}" href="{0}" target="{1}"><img data-src="{2}" width="{3}" height="{4}"></a></div>'
                            , filePath2 = 1 == ads[i].file_source_type ? baseUrl + ads[i].content_ext : ads[i].content_ext;
                        s2 = s2.format(getLogClickUrl(ads[i].put_id, ads[i].click_url, ads[i].id), ads[i].target_window, filePath2, w, h, ads[i].put_id + "|" + ads[i].click_url + "|" + ads[i].id)
                    }
                    _li.innerHTML = '<div class="flash">' + s + s2 + "</div>";
                    break;
                case 4:
                    var _iframe;
                    (_iframe = doc.createElement("iframe")).width = String(w),
                        _iframe.height = String(h),
                        _iframe.frameBorder = _iframe.marginWidth = _iframe.marginHeight = "0",
                        _iframe.scrolling = "no",
                        _li.appendChild(_iframe);
                    var r = ads[i].content, es = JSON.parse(ads[i].content_ext), d;
                    (d = _iframe.contentDocument).write('<div class="page"><script>window.Event.addEvents=function(c,a,b){if(document.addEventListener){Event.addEvents=function(f,d,e){f.addEventListener(d,e,false)}}else{Event.addEvents=function(f,d,e){f.attachEvent("on"+d,function(){e.call(f,arguments)})}}Event.addEvents(c,a,b)};function getPropagateLinkDom(c,d){if(d===undefined){d=document}var b=c;var a=null;while(b!==d&&a==null){if(b.nodeName.toLowerCase()=="a"){a=b;break}b=b.parentNode}return a}Event.addEvents(window,"click",function(a){var b=getPropagateLinkDom(a.target,document.body);if(b!=null){window.parent.postMessage({chinazPropagate:"' + ads[i].put_id + '|"+b.href+"|' + ads[i].id + '"},"*")}});<\/script>' + r + "</div>");
                    var demo = d.getElementById("demo")
                        , view = d.getElementById("view");
                    laytpl(demo.innerHTML).render(es, {
                        baseUrl: baseUrl,
                        getLogClickUrl: getLogClickUrl,
                        put_id: ads[i].put_id,
                        ad_id: ads[i].id
                    }, (function(html) {
                            view.innerHTML = html
                        }
                    )),
                        demo.parentNode.removeChild(demo),
                        d.close();
                    break;
                case 5:
                    var _iframe, d;
                    (_iframe = doc.createElement("iframe")).width = String(w),
                        _iframe.height = String(h),
                        _iframe.frameBorder = _iframe.marginWidth = _iframe.marginHeight = "0",
                        _iframe.scrolling = "no",
                        _li.appendChild(_iframe),
                        (d = _iframe.contentDocument).write("<div>" + ads[i].content + "</div>"),
                        d.close()
            }
        }
        hasFlashAd && initFlash(_slot);
        var _ads = _content.children;
        if (_ads[0].classList.add("current"),
        ads.length > 1) {
            var _indexbar = doc.createElement("ul");
            _indexbar.className = "indexbar",
                _slot.appendChild(_indexbar),
                s = "";
            for (var i = 0; i < ads.length; i++)
                s += "<li><div></div></li>";
            _indexbar.innerHTML = s;
            var _indexs = _indexbar.getElementsByTagName("div");
            _indexs[0].classList.add("current");
            var _prev = doc.createElement("div");
            _prev.className = "prev",
                _slot.appendChild(_prev);
            var _next = doc.createElement("div");
            _next.className = "next",
                _slot.appendChild(_next)
        }
        if (1 == slot.closable) {
            var _close = doc.createElement("span");
            _close.className = "close",
                _close.innerHTML = "&times;",
                _close.onclick = closeShow,
                _slot.appendChild(_close)
        }
        return _ads.length > 1 && setRotate(slot, _content, _ads, _indexs, _prev, _next),
        0 != slot.stay_time && setInterval(closeShow, 1e3 * slot.stay_time),
            _slot;
        function closeShow() {
            _slot.style.display = "none"
        }
    }
    function initFlash(node) {
        var flashEnabled = getCookie("flashEnabled");
        if (flashChecker().f ? "1" != flashEnabled && setCookie("flashEnabled", flashEnabled = "1") : applyAlter(node),
        "" == flashEnabled)
            setCookie("flashEnabled", flashEnabled = "?"),
                window.location.href = "http://get.adobe.com/cn/flashplayer/";
        else if ("?" == flashEnabled) {
            var timer = setInterval(checkFlashEnabled(), 1e3);
            function checkFlashEnabled() {
                flashChecker().f && (clearInterval(timer),
                    setCookie("flashEnabled", "1"),
                    applyMain(node))
            }
            setTimeout((function() {
                    clearInterval(timer),
                        timer = setInterval(checkFlashEnabled(), 3e3)
                }
            ), 5e3)
        }
        function applyMain(node) {
            for (var list = node.ownerDocument.querySelectorAll(".{0} .flash".format(AD_CLASS_NAME)), i = 0; i < list.length; i++)
                for (var nodes = list[i].childNodes, j = 0; j < nodes.length; j++)
                    nodes[j].style.display = "flash-main" == nodes[j].className ? "block" : "none"
        }
        function applyAlter(node) {
            for (var list = node.querySelectorAll(".{0} .flash-alter img".format(AD_CLASS_NAME)), i = 0; i < list.length; i++)
                list[i].src = list[i].getAttribute("data-src");
            list = node.ownerDocument.querySelectorAll(".{0} .flash".format(AD_CLASS_NAME));
            for (var i = 0; i < list.length; i++)
                for (var nodes = list[i].childNodes, j = 0; j < nodes.length; j++)
                    nodes[j].style.display = "flash-main" == nodes[j].className && 2 == nodes.length ? "none" : "block"
        }
    }
    function setRotate(slot, _content, _ads, _indexs, _prev, _next) {
        var current = 0;
        _indexs[0].classList.add("current");
        for (var i = 0; i < _indexs.length; i++)
            _indexs[i].index = i,
                _indexs[i].onmouseover = function() {
                    current != this.index && (current = this.index,
                        rotate())
                }
            ;
        _prev.onclick = function() {
            -1 == --current && (current = _indexs.length - 1),
                rotate()
        }
            ,
            _next.onclick = function() {
                ++current == _indexs.length && (current = 0),
                    rotate()
            }
        ;
        var rotateTimer = setInterval(_next.onclick, 1e3 * slot.rotate_interval);
        function rotate() {
            for (var i = 0; i < _ads.length; i++)
                _ads[i].classList.remove("current"),
                    _indexs[i].classList.remove("current");
            _ads[current].style.opacity = 0,
                _ads[current].style.filter = "alpha(opacity=0)",
                _ads[current].classList.add("current"),
                _indexs[current].classList.add("current"),
                fadeIn(_ads[current])
        }
        _content.onmouseover = function() {
            clearInterval(rotateTimer)
        }
            ,
            _content.onmouseout = function() {
                rotateTimer = setInterval(_next.onclick, 1e3 * slot.rotate_interval)
            }
    }
    function logShow(ads) {
        for (var ad_ids = new Array, put_ids = new Array, i = 0, len = ads.length; i < len; i++)
            put_ids[i] = ads[i].put_id,
                ad_ids[i] = ads[i].id;
        var data = JSON.stringify({
            fromUrl: document.URL,
            putIds: JSON.stringify(put_ids),
            adIds: JSON.stringify(ad_ids)
        })
            , xhr = getXhr();
        xhr.open("POST", "{0}/show/log".format(baseUrl), !0),
            xhr.setRequestHeader("content-type", "application/json"),
            xhr.send(data)
    }
    function getLogClickUrl(putId, clickUrl, ad_id) {
        return clickUrl
    }
    function fadeIn(obj) {
        var alpha = 0;
        clearInterval(timer);
        var timer = setInterval((function() {
                alpha++,
                    obj.style.opacity = alpha / 100,
                    obj.style.filter = "alpha(opacity=" + alpha + ")",
                100 == alpha && clearInterval(timer)
            }
        ), 10)
    }
    function fadeOut(obj) {
        var alpha = 100 * obj.style.opacity;
        clearInterval(timer);
        var timer = setInterval((function() {
                alpha--,
                    obj.style.opacity = alpha / 100,
                    obj.style.filter = "alpha(opacity=" + alpha + ")",
                0 == alpha && clearInterval(timer)
            }
        ), 10)
    }
    function getXhr() {
        var xmlhttp;
        return (xmlhttp = window.XMLHttpRequest ? new XMLHttpRequest : new ActiveXObject("Microsoft.XMLHTTP")).withCredentials = !0,
            xmlhttp
    }
    function getUuid() {
        var d = (new Date).getTime(), uuid;
        return "xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx".replace(/[xy]/g, (function(c) {
                var r = (d + 16 * Math.random()) % 16 | 0;
                return d = Math.floor(d / 16),
                    ("x" == c ? r : 3 & r | 8).toString(16)
            }
        ))
    }
    function getCounter(cname) {
        var value = getCookie(cname);
        return "" != value ? (value = JSON.parse(value),
            Number(value.count)) : 0
    }
    function incCounter(cname, dtimes) {
        if (0 != dtimes) {
            var exdate, value = getCookie(cname);
            if ("" == value) {
                var exdays = dtimes >= 1 ? 1 : 1 / dtimes;
                (exdate = new Date).setTime(exdate.getTime() + 24 * exdays * 60 * 60 * 1e3),
                    value = {
                        count: 1,
                        expires: exdate
                    }
            } else
                (value = JSON.parse(value)).count = Number(value.count) + 1,
                    exdate = new Date(value.expires);
            setCookie(cname, JSON.stringify(value), exdate)
        }
    }
    function refreshCounterExpires(cname, dtimes) {
        var exdate = new Date;
        if (dtimes > 0) {
            var exdays = dtimes >= 1 ? 1 : 1 / dtimes;
            exdate.setTime(exdate.getTime() + 24 * exdays * 60 * 60 * 1e3)
        }
        var value = getCookie(cname), exdate_old;
        "" != value && (value = JSON.parse(value),
        exdate < new Date(value.expires) && (value.expires = exdate,
            setCookie(cname, JSON.stringify(value), exdate)))
    }
    function setCookie(cname, cvalue, exdate) {
        var expires = exdate ? "; expires=" + exdate.toUTCString() : "";
        document.cookie = cname + "=" + encodeURIComponent(cvalue) + expires
    }
    function getCookie(cname) {
        for (var name = cname + "=", ca = document.cookie.split(";"), i = 0; i < ca.length; i++) {
            var c = ca[i].trim();
            if (0 == c.indexOf(name))
                return decodeURIComponent(c.substring(name.length, c.length))
        }
        return ""
    }
    function flashChecker() {
        var hasFlash = 0, flashVersion = 0, swf, swf;
        if (document.all)
            (swf = new ActiveXObject("ShockwaveFlash.ShockwaveFlash")) && (hasFlash = 1,
                VSwf = swf.GetVariable("$version"),
                flashVersion = parseInt(VSwf.split(" ")[1].split(",")[0]));
        else if (navigator.plugins && navigator.plugins.length > 0 && (swf = navigator.plugins["Shockwave Flash"])) {
            hasFlash = 1;
            for (var words = swf.description.split(" "), i = 0; i < words.length; ++i)
                isNaN(parseInt(words[i])) || (flashVersion = parseInt(words[i]))
        }
        return {
            f: hasFlash,
            v: flashVersion
        }
    }
    function getPropagateLinkDom(el, parentSelector) {
        void 0 === parentSelector && (parentSelector = document);
        for (var parent = el, result = null; parent !== parentSelector && null == result; ) {
            if ("a" == parent.nodeName.toLowerCase() && null != parent.getAttribute("chinaz-propagate")) {
                result = parent;
                break
            }
            if (!(parent = parent.parentNode)) {
                result = null;
                break
            }
        }
        return result
    }
    xhr.onreadystatechange = function() {
        if (4 == xhr.readyState && 200 == xhr.status) {
            var data = JSON.parse(xhr.responseText)
                , slot = data.data.slot
                , ads = data.data.ads;
            switch (slot.type) {
                case 1:
                    makeEmbed(slot, ads, node);
                    break;
                case 2:
                    makeFloat(slot, ads, node);
                    break;
                case 3:
                    makePopup(slot, ads, node);
                    break;
                case 4:
                    makeDrift(slot, ads, node)
            }
        }
    }
        ,
        xhr.open("GET", "{0}/slot/callback?id={1}&fromUrl={2}".format(baseUrl, slotId, document.URL), !0),
        xhr.send(),
    IS_INIT || (IS_INIT = !0,
        Event.addEvents(window, "click", (function(event) {
                var linkDom = getPropagateLinkDom(event.target, document.body);
                if (null != linkDom)
                    if ("1" != linkDom["jump-allowed"]) {
                        var data = linkDom.getAttribute("chinaz-propagate").split("|");
                        if (data.length) {
                            event.preventDefault();
                            var xhr = getXhr();
                            xhr.onreadystatechange = function() {
                                1 == xhr.readyState && (linkDom["jump-allowed"] = "1",
                                    linkDom.click())
                            }
                                ,
                                xhr.open("GET", "{0}/click/logv2?putId={1}&adId={2}&clickUrl={3}&fromUrl={4}".format(baseUrl, data[0], data[2], encodeURIComponent(linkDom.getAttribute("href")), encodeURIComponent(document.URL)), !0),
                                xhr.send()
                        }
                    } else
                        linkDom["jump-allowed"] = "0"
            }
        )),
        Event.addEvents(window, "message", (function(event) {
                if (event.data.chinazPropagate) {
                    var data = event.data.chinazPropagate.split("|");
                    if (data.length) {
                        event.preventDefault();
                        var xhr = getXhr();
                        xhr.open("GET", "{0}/click/logv2?putId={1}&adId={2}&clickUrl={3}&fromUrl={4}".format(baseUrl, data[0], data[2], encodeURIComponent(data[1]), encodeURIComponent(document.URL)), !0),
                            xhr.send()
                    }
                }
            }
        )))
}
