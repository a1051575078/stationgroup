define("assets/js/app/page/index", ["../common/molo", "../inc/jquerySlide", "../inc/loadImage", "../common/animate", "../common/webBehaviour", "../util/molo", "../common/searchAssociate"], function(a) {
    function b() {
        function a() {
            if (k > 0) {
                f.off("click", a);
                var b = parseInt(e.css("margin-left"));
                k--,
                    e.animate({
                        marginLeft: b + i + "px"
                    }, 400, "swing", function() {
                        f.on("click", a)
                    }),
                    c(1)
            }
        }
        function b() {
            if (j > k) {
                g.off("click", b);
                var a = parseInt(e.css("margin-left"));
                k++,
                    e.animate({
                        marginLeft: a - i + "px"
                    }, 400, "swing", function() {
                        g.on("click", b)
                    }),
                    c(0)
            }
        }
        function c(a) {
            0 == k ? f.addClass("unused") : k == j && g.addClass("unused"),
                1 == a ? g.removeClass("unused") : f.removeClass("unused")
        }
        var d = $("#J_NecessaryAppBox")
            , e = d.find("ul")
            , f = $("#J_NecessaryTurnLeftBtn")
            , g = $("#J_NecessaryTurnRightBtn")
            , h = e.find("li").length * e.find("li").width()
            , i = d.width()
            , j = parseInt(h / i)
            , k = 0;
        f.on("click", a),
            g.on("click", b)
    }
    function c() {
        var a = $("#J_RankTabBtn li")
            , b = $("#J_RankTabBody .rank-tab-bind-body");
        a.on("mouseenter", function() {
            a.removeClass("selected"),
                $(a[$(this).index()]).addClass("selected"),
                b.removeClass("selected"),
                $(b[$(this).index()]).addClass("selected")
        })
    }
    function d() {
        var a = $(".T_RankBody").find("li");
        a.on("mouseenter", function() {
            $(this).find(".T_HoverInsBtnBox").css("display", "block")
        }).on("mouseleave", function() {
            $(this).find(".T_HoverInsBtnBox").css("display", "none")
        })
    }
    function e() {
        var a = $("#J_CategoryTabTit li")
            , b = $("#J_CategoryTabBody li");
        a.on("mouseenter", function() {
            a.removeClass("selected"),
                $(a[$(this).index()]).addClass("selected"),
                b.removeClass("selected"),
                $(b[$(this).index()]).addClass("selected")
        })
    }
    function f() {
        var a = $(".T_UnionHoverEvent");
        a.on("mouseenter", function() {
            $(this).find(".com-vertical-lit-tit").css("display", "none"),
                $(this).find(".T_ComEventAppIns").css("display", "block")
        }).on("mouseleave", function() {
            $(this).find(".T_ComEventAppIns").css("display", "none"),
                $(this).find(".com-vertical-lit-tit").css("display", "block")
        })
    }
    var g = (a("../common/molo"),
        a("../inc/jquerySlide"),
        a("../common/animate"))
        , h = a("../common/webBehaviour")
        , i = a("../common/searchAssociate");
    $(document).ready(function() {
        var a = new i;
        a.init();
        for (var j = $("img.lazy"), k = 0, l = j.length; l > k; k++) {
            var m = $(j[k]).data("original");
            $(j[k]).attr("src", m)
        }
        new g({
            rt: "#return",
            bottom: 60,
            time: 500
        });
        b(),
            c(),
            d(),
            e(),
            f();
        var n = $("#J_Slide");
        n.slide();
        var o = new h;
        o.init(),
            o.apkPostNew({})
    })
}),
    define("assets/js/app/common/molo", [], function(a, b, c) {
        function d(a) {
            g && alert(a)
        }
        $.ML = $.ML || {
            version: "v1.0.0"
        },
            $.extend($.ML, {
                gConst: {
                    urlPre: MOLO.urlPre,
                    bodyMinWidth: 950,
                    bodyMaxWidth: 1170,
                    invalidImgSrcArr: ["10.148.144.180"]
                },
                gMsg: {},
                util: {
                    CurentTime: function() {
                        var a = new Date
                            , b = a.getFullYear()
                            , c = a.getMonth() + 1
                            , d = a.getDate()
                            , e = a.getHours()
                            , f = a.getMinutes()
                            , g = b + "-";
                        return 10 > c && (g += "0"),
                            g += c + "-",
                        10 > d && (g += "0"),
                            g += d + " ",
                        10 > e && (g += "0"),
                            g += e + ":",
                        10 > f && (g += "0"),
                            g += f
                    },
                    getCookie: function(a) {
                        for (var b = document.cookie.split("; "), c = 0, d = b.length; d > c; c++) {
                            var e = b[c].split("=");
                            if (e[0] == a)
                                return decodeURIComponent(e[1])
                        }
                    }
                }
            }),
            function() {
                try {
                    var a = navigator.userAgent.toLowerCase()
                        , b = null
                        , c = 0;
                    if (b = a.match(/msie ([\d.]+)/),
                        c = b ? parseInt(b[1], 10) : 0,
                    6 == c)
                        try {
                            document.execCommand("BackgroundImageCache", !1, !0)
                        } catch (d) {}
                } catch (d) {}
            }();
        var e = function() {
            return window.addEventListener ? function(a, b, c, d) {
                    a.addEventListener(b, c, d)
                }
                : function(a, b, c) {
                    a.attachEvent("on" + b, c)
                }
        }()
            , f = function() {
            return window.addEventListener ? function(a, b, c, d) {
                    a.removeEventListener(b, c, d)
                }
                : function(a, b, c) {
                    a.detachEvent("on" + b, c)
                }
        }();
        window.printLog = function(a) {
            try {
                console.log(a)
            } catch (b) {}
        }
        ;
        var g = !0;
        $("#J_Log")[0] && $("#J_Log").on("click", function() {}),
            $(document).on("mouseover", "a", function() {
                $(this).attr("hidefocus", !0)
            }),
            c.exports = {
                addEvent: e,
                removeEvent: f,
                eTrace: d
            }
    }),
    define("assets/js/app/inc/jquerySlide", ["assets/js/app/inc/loadImage"], function(a) {
        function b(a, b) {
            var c = (a.find(b.children),
                e(a, b));
            d(a, b, c)
        }
        function c(a, b, d) {
            var e = a.find(b.children);
            return $.fn.slide.vars.timerAnim && clearTimeout($.fn.slide.vars.timerAnim),
                $.fn.slide.vars.tmpOpacity <= 0 ? ($.fn.slide.vars.tmpOpacity = $.fn.slide.vars.defOpacity,
                    e.eq($.fn.slide.vars.index).css({
                        "z-index": "-1",
                        opacity: $.fn.slide.vars.defOpacity
                    }),
                    void ($.fn.slide.vars.index = d)) : ($.fn.slide.vars.tmpOpacity > 0 && ($.fn.slide.vars.tmpOpacity = $.fn.slide.vars.tmpOpacity - $.fn.slide.vars.animStep,
                    e.eq($.fn.slide.vars.index).css({
                        opacity: $.fn.slide.vars.tmpOpacity
                    })),
                    void ($.fn.slide.vars.timerAnim = setTimeout(function() {
                        c(a, b, d)
                    }, 50)))
        }
        function d(a, b, d) {
            if ($.fn.slide.vars.index != d) {
                var e = a.find(b.children)
                    , f = $(b.slideBarCon).find(b.barChildren)
                    , g = e.eq($.fn.slide.vars.index)
                    , h = e.eq(d);
                e.css({
                    "z-index": "0"
                }),
                    g.css({
                        "z-index": "2"
                    }),
                    h.css({
                        "z-index": "1"
                    }),
                    f.attr("class", " "),
                    f.eq(d).attr("class", "selected"),
                    c(a, b, d);
                var j = h.data("original");
                "undefined" != typeof j && "" != j && i.loadImg(j, function() {
                    h.css("backgroundImage", "url(" + this.src + ")").data("original", "")
                })
            }
        }
        function e(a, b) {
            var c = a.find(b.children);
            return $.fn.slide.vars.index >= c.length - 1 ? 0 : $.fn.slide.vars.index + 1
        }
        function f(a, c) {
            a.find(c.children).length;
            c.auto = setInterval(function() {
                b(a, c)
            }, c.speed)
        }
        function g(a, b) {
            clearInterval(b.auto)
        }
        function h(a, b) {
            var c = a.find(b.children)
                , e = $(b.slideBarCon).find(b.barChildren);
            e.on("mouseover", function() {
                g(a, b),
                    d(a, b, $(b.slideBarCon).find(b.barChildren).index(this))
            }),
                a.on("mouseover", function() {
                    g(a, b)
                }).on("mouseout", function() {
                    f(a, b)
                }),
                c.eq($.fn.slide.vars.index).css({
                    "z-index": "2"
                }),
            e.length > 0 && f(a, b)
        }
        var i = a("assets/js/app/inc/loadImage");
        $.fn.slide = function(a) {
            var b = $.extend({}, $.fn.slide.defaults, a);
            return this.each(function() {
                var a = $(this);
                h(a, b)
            })
        }
            ,
            $.fn.slide.vars = {
                index: 0,
                timerAnim: null,
                auto: null,
                tmpOpacity: 1,
                defOpacity: 1,
                animStep: .1
            },
            $.fn.slide.defaults = {
                speed: 6e3,
                defOpacity: 1,
                children: "li",
                slideBarCon: "strong",
                barChildren: "span"
            }
    }),
    define("assets/js/app/inc/loadImage", [], function(a, b, c) {
        function d(a, b) {
            var c = new Image
                , d = !1;
            c.onload = function() {
                d = !0
            }
                ,
                c.src = a,
                setTimeout(function() {
                    d ? b && b.call(c) : setTimeout(arguments.callee, 100)
                }, 0)
        }
        function e(a, b) {
            a.complete || "loading" == a.readyState || "complete" == a.readyState ? b(a) : a.onload = function() {
                b(a)
            }
        }
        function f(a, b) {
            var c = new Image
                , d = !1;
            c.onload = function() {
                d = !0
            }
                ,
                c.src = a,
            (c.complete || "loaded" == c.readyState || "complete" == c.readyState) && (d = !0),
                setTimeout(function() {
                    d ? b(c) : setTimeout(arguments.callee, 10)
                }, 0)
        }
        c.exports = {
            imgLoadOver: e,
            loadImg: d,
            detLoadImg: f
        }
    }),
    define("assets/js/app/common/animate", [], function(a, b, c) {
        function d(a) {
            e = a.rt,
                f = a.bottom,
                g = a.time,
                $(e + " a").click(function() {
                    return h ? !1 : (h = !0,
                        $("html,body").animate({
                            scrollTop: 0
                        }, g, "easeOutExpo", function() {
                            h = !1
                        }),
                        !1)
                });
            var b = $(window).height();
            $.browser.msie && "6.0" == $.browser.version && $(window).scroll(function() {
                var a = $(window).scrollTop();
                $(e).css({
                    top: a + b - $(e).height() - f + "px"
                })
            }),
                $(window).scroll(function() {
                    var a = $(window).scrollTop();
                    $(e).css(a > 0 ? {
                        display: "block"
                    } : {
                        display: "none"
                    })
                })
        }
        jQuery.extend(jQuery.easing, {
            easeOutExpo: function(a, b, c, d, e) {
                return b == e ? c + d : d * (-Math.pow(2, -10 * b / e) + 1) + c
            }
        });
        var e, f, g, h = !1;
        c.exports = d
    }),
    define("assets/js/app/common/webBehaviour", ["assets/js/app/util/molo"], function(a, b, c) {
        var d = (a("assets/js/app/util/molo"),
                function() {
                    this.opts = {},
                        this.conf = function() {
                            var a = {
                                agentPreUrl: "http://agent.sj.qq.com/",
                                aid: "myappWebBehaviour",
                                sessionID: $.ML.util.getCookie("session_uuid"),
                                post: null,
                                classID: 1,
                                pageName: MOLO.pageKey
                            }
                                , b = $.extend(!0, a, this.opts);
                            return b
                        }
                }
        );
        d.prototype.pvuvPostInit = function() {
            var a = this
                , b = a.conf();
            a.reportItem({
                targetType: "show",
                targetObj: "pageShow",
                pageName: b.pageName
            })
        }
            ,
            d.prototype.apkPostNew = function(a) {
                var b = this;
                $(document).on("click", ".com-install-btn,.com-install-lit-btn,.det-ins-btn,.installBtn", function() {
                    var c = $(this)
                        , d = "btn_install"
                        , e = c.attr("apk")
                        , f = c.attr("appname");
                    defaultsParamJson = {
                        targetType: d,
                        targetObj: e,
                        mark: f
                    },
                        dataJson = $.extend(!0, {}, defaultsParamJson, a),
                        b.reportItem(dataJson)
                })
            }
            ,
            d.prototype.apkDownload = function(a) {
                var b = this;
                $(document).on("click", ".det-down-btn", function(c) {
                    var d = $(this)
                        , e = "btn_download"
                        , f = d.attr("apk")
                        , g = d.attr("appname");
                    defaultsParamJson = {
                        targetType: e,
                        targetObj: f,
                        mark: g,
                        theEvent: c
                    },
                        dataJson = $.extend(!0, {}, defaultsParamJson, a),
                        b.reportItem(dataJson)
                })
            }
            ,
            d.prototype.getPostParamJson = function(a) {
                var b = this
                    , c = b.conf()
                    , d = {
                    post: {},
                    show: {}
                };
                return d.post.sessionID = c.sessionID || "null",
                    d.post.pageName = c.pageName || "null",
                    d.post.modName = a.modName || "null",
                    d.post.targetType = a.targetType || "null",
                    d.post.targetObj = a.targetObj || "null",
                    d.post.mark = a.mark || "null",
                    d.show.sessionID = "（0）sessionID:" + d.post.sessionID,
                    d.show.pageName = "（1）pageName:" + d.post.pageName,
                    d.show.modName = "（2）modName:" + d.post.modName,
                    d.show.targetType = "（3）targetType:" + d.post.targetType,
                    d.show.targetObj = "（4）targetObj:" + d.post.targetObj,
                    d.show.mark = "（5）mark:" + d.post.mark,
                    d
            }
            ,
            d.prototype.jointParam = function(a) {
                var b = this
                    , c = (b.conf(),
                    a)
                    , d = "";
                for (var e in c)
                    d += "	" + c[e];
                return d
            }
            ,
            d.prototype.reportItem = function(a) {
                var b = this
                    , c = b.conf()
                    , d = ""
                    , e = ""
                    , f = b.getPostParamJson(a)
                    , g = f.post
                    , h = $.extend(!0, {}, g, a);
                switch (c.aid) {
                    case "myappWebBehaviour":
                        d = this.jointParam(f.post),
                            e = this.jointParam(f.show)
                }
                printLog("webpost:" + e);
                var i = new Image;
                i.src = c.agentPreUrl + "behaviour.do?aid=" + c.aid + "&post=" + encodeURIComponent(d) + "&t=" + (new Date).getTime(),
                (h.callback || "function" == typeof h.callback) && h.callback(),
                "btn_download" == h.targetType
            }
            ,
            d.prototype.init = function() {
                {
                    var a = this;
                    a.conf()
                }
                a.pvuvPostInit()
            }
            ,
            c.exports = d
    }),
    define("assets/js/app/util/molo", [], function(a, b, c) {
        function d(a) {
            g && alert(a)
        }
        $.ML = $.ML || {
            version: "v1.0.0"
        },
            $.extend($.ML, {
                gConst: {
                    urlPre: MOLO.urlPre,
                    bodyMinWidth: 950,
                    bodyMaxWidth: 1170,
                    invalidImgSrcArr: ["10.148.144.180"]
                },
                gMsg: {},
                util: {
                    CurentTime: function() {
                        var a = new Date
                            , b = a.getFullYear()
                            , c = a.getMonth() + 1
                            , d = a.getDate()
                            , e = a.getHours()
                            , f = a.getMinutes()
                            , g = b + "-";
                        return 10 > c && (g += "0"),
                            g += c + "-",
                        10 > d && (g += "0"),
                            g += d + " ",
                        10 > e && (g += "0"),
                            g += e + ":",
                        10 > f && (g += "0"),
                            g += f
                    },
                    isIE6: function() {
                        return window.ActiveXObject && !window.XMLHttpRequest ? !0 : !1
                    },
                    getSearchArray: function() {
                        var a = window.location.search.substring(1).split("&");
                        return a
                    },
                    getSearchByName: function(a) {
                        for (var b, c, d = $.ML.util.getSearchArray(), e = 0; e < d.length; e++)
                            b = d[e].split("=")[0],
                            b == a && (c = d[e].split("=")[1]);
                        return c
                    },
                    getCookie: function(a) {
                        for (var b = document.cookie.split("; "), c = 0, d = b.length; d > c; c++) {
                            var e = b[c].split("=");
                            if (e[0] == a)
                                return decodeURIComponent(e[1])
                        }
                    }
                }
            }),
            function() {
                try {
                    var a = navigator.userAgent.toLowerCase()
                        , b = null
                        , c = 0;
                    if (b = a.match(/msie ([\d.]+)/),
                        c = b ? parseInt(b[1], 10) : 0,
                    6 == c)
                        try {
                            document.execCommand("BackgroundImageCache", !1, !0)
                        } catch (d) {}
                } catch (d) {}
            }();
        var e = function() {
            return window.addEventListener ? function(a, b, c, d) {
                    a.addEventListener(b, c, d)
                }
                : function(a, b, c) {
                    a.attachEvent("on" + b, c)
                }
        }()
            , f = function() {
            return window.addEventListener ? function(a, b, c, d) {
                    a.removeEventListener(b, c, d)
                }
                : function(a, b, c) {
                    a.detachEvent("on" + b, c)
                }
        }();
        window.printLog = function(a) {
            try {
                console.log(a)
            } catch (b) {}
        }
        ;
        var g = !0;
        $("#J_Log")[0] && $("#J_Log").on("click", function() {}),
            $(document).on("mouseover", "a", function() {
                $(this).attr("hidefocus", !0)
            }),
            c.exports = {
                addEvent: e,
                removeEvent: f,
                eTrace: d
            }
    }),
    define("assets/js/app/common/searchAssociate", ["assets/js/app/util/molo"], function(a, b, c) {
        var d = (a("assets/js/app/util/molo"),
                function() {
                    this.options = {
                        $Search_Input: $("#J_MainInput"),
                        $SearchAss_Box: $("#J_SearchAssociate"),
                        $SearchHot_Box: $("#J_HotSearch"),
                        $SearchAss_List: $("#J_AssociateList"),
                        $SearchHot_List: $("#J_HotSearchList"),
                        $Search_Btn: $("#J_SearchBtn"),
                        $Search_Form: $("#J_SearchForm"),
                        getAssDataCallBack: null,
                        isShowDataList: !0,
                        delayTime: 100,
                        defaultText: "搜索应用或游戏..."
                    },
                        this.conf = function() {
                            var a = this
                                , b = {
                                configUrl: {
                                    hotWords: "/myapp/getSearchHotWords.htm",
                                    associate: "/myapp/getSearchSuggest.htm"
                                }
                            }
                                , c = $.extend(!0, b, a.options);
                            return c
                        }
                }
        );
        d.prototype.isGetHotSearch = !1,
            d.prototype.searchKeyWords = "undefined" == decodeURIComponent($.ML.util.getSearchByName("kw")) ? "" : decodeURIComponent($.ML.util.getSearchByName("kw")),
            d.prototype.init = function() {
                var a = this
                    , b = a.conf();
                d.prototype.searchKeyWords && a.setInputText(d.prototype.searchKeyWords),
                    a.setNoneSelected(),
                    $(document).on("click", ".T_HotWordsCtrl", function() {
                        a.setInputText($(this).find("a").html()),
                            a.inputSubmit()
                    }),
                    $(document).on("click", "#J_SearchBtn", function() {
                        var c = b.$Search_Input.val();
                        return c != b.defaultText && a.inputSubmit(),
                            !1
                    }),
                    b.$SearchAss_List.on("mouseenter", "li", function() {
                        $this = $(this),
                            a.selectedByIndex($this.index())
                    }).on("click", "li", function() {
                        a.isSelected() && (b.$Search_Input.val($(this).find("a").html()),
                            a.inputSubmit())
                    }),
                    b.$Search_Input.on("keyup", function(c) {
                        var d = $(this).val()
                            , e = c.keyCode;
                        switch (e) {
                            case 38:
                                return a.keyUpSelected(),
                                    !1;
                            case 40:
                                return a.keyDownSelected(),
                                    !1;
                            case 13:
                                return a.isSelected() ? a.keyEnterSelected() : a.inputSubmit(),
                                    !1;
                            case 27:
                                return a.hideDataList(),
                                    !1
                        }
                        "" != d && null != $(this) ? (a.setSearchAssData(d),
                            a.hideHotSearch(),
                            a.showAssDataList()) : (b.$SearchAss_List.html(""),
                            a.inputTextClear(),
                            a.setNoneSelected(),
                            a.hideAssDataList(),
                            a.showHotSearch())
                    }).on("keydown", function(b) {
                        var c = ($(this).val(),
                            b.keyCode);
                        switch (c) {
                            case 13:
                                return a.isSelected() ? a.keyEnterSelected() : a.inputSubmit(),
                                    !1
                        }
                    }).on("blur", function() {
                        var c = $(this).val();
                        "" == c || c == b.defaultText ? (a.inputTextBack(),
                            a.hideHotSearch()) : a.hideAssDataList()
                    }).on("focus", function() {
                        var c = $(this).val();
                        c == b.defaultText ? (a.inputTextClear(),
                            a.showHotSearch()) : d.prototype.searchKeyWords && d.prototype.searchKeyWords == c && (a.inputTextClear(),
                            a.showHotSearch())
                    })
            }
            ,
            d.prototype.showHotSearch = function() {
                var a = this
                    , b = a.conf();
                b.$SearchHot_Box.css("display", "block"),
                    a.setHotSearch()
            }
            ,
            d.prototype.hideHotSearch = function() {
                var a = this
                    , b = a.conf();
                setTimeout(function() {
                    b.$SearchHot_Box.css("display", "none")
                }, 200)
            }
            ,
            d.prototype.setHotSearch = function() {
                if (!d.prototype.isGetHotSearch) {
                    var a = this
                        , b = a.conf();
                    $.ajax({
                        type: "get",
                        url: b.configUrl.hotWords,
                        dataType: "json",
                        success: function(a) {
                            for (var c = a.obj, e = a.obj.length >= 10 ? 10 : a.obj.length, f = "", g = 0; e > g; g++)
                                f += "<li class='T_HotWordsCtrl'>",
                                    f += "<a>",
                                    f += c[g],
                                    f += "</a>",
                                    f += "</li>";
                            b.$SearchHot_List.append(f),
                                d.prototype.isGetHotSearch = !0
                        },
                        error: function() {}
                    })
                }
            }
            ,
            d.prototype.inputTextClear = function() {
                {
                    var a = this;
                    a.conf()
                }
                a.setInputText("")
            }
            ,
            d.prototype.inputTextBack = function() {
                var a = this
                    , b = a.conf();
                a.setInputText(b.defaultText)
            }
            ,
            d.prototype.inputSubmit = function(a) {
                var b = this
                    , c = b.conf()
                    , a = a;
                a || (a = encodeURIComponent(c.$Search_Input.val())),
                    window.location.href = "../myapp/search.htm?kw=" + a
            }
            ,
            d.prototype.setInputText = function(a) {
                var b = this
                    , c = b.conf();
                c.$Search_Input.val(a)
            }
            ,
            d.prototype.setSearchAssData = function(a) {
                var b, c = this, d = c.conf(), e = c.getLastKeyWord();
                e == a ? c.showAssDataList() : (clearTimeout(b),
                    b = setTimeout(function() {
                        $.ajax({
                            type: "get",
                            url: d.configUrl.associate,
                            data: "kw=" + a,
                            dataType: "json",
                            success: function(b) {
                                c.setLastKeyWord(a),
                                    c.setNoneSelected(),
                                    c.putSearchAssData(b),
                                "function" == typeof d.getDataCallBack && d.getDataCallBack(b)
                            },
                            error: function() {}
                        })
                    }, d.delayTime))
            }
            ,
            d.prototype.putSearchAssData = function(a) {
                {
                    var b = this
                        , c = b.conf()
                        , d = ""
                        , e = a.obj.keywords
                        , f = e.length;
                    c.$Search_Input.val()
                }
                if (f > 0) {
                    b.emptyAssData();
                    for (var g = 0; f > g; g++)
                        d += "<li>",
                            d += "<a>",
                            d += e[g],
                            d += "</a>",
                            d += "</li>";
                    c.$SearchAss_List.append(d),
                        b.showAssDataList()
                } else
                    b.hideAssDataList()
            }
            ,
            d.prototype.setLastKeyWord = function(a) {
                var b = this
                    , c = b.conf();
                c.$SearchAss_List.data("seakeyword", a)
            }
            ,
            d.prototype.getLastKeyWord = function() {
                var a = this
                    , b = a.conf();
                return b.$SearchAss_List.data("seakeyword")
            }
            ,
            d.prototype.emptyAssData = function() {
                var a = this
                    , b = a.conf();
                b.$SearchAss_List.empty()
            }
            ,
            d.prototype.showAssDataList = function() {
                var a = this
                    , b = a.conf();
                b.$SearchAss_Box.css("display", "block")
            }
            ,
            d.prototype.hideAssDataList = function() {
                var a = this
                    , b = a.conf();
                setTimeout(function() {
                    b.$SearchAss_Box.css("display", "none")
                }, 200)
            }
            ,
            d.prototype.keyUpSelected = function() {
                var a = this
                    , b = a.conf()
                    , c = b.$SearchAss_List.find("li").length
                    , d = a.getSelectedIndex() - 1 < 0 ? c - 1 : a.getSelectedIndex() - 1;
                a.selectedByIndex(a.isSelected() ? d : c - 1)
            }
            ,
            d.prototype.keyDownSelected = function() {
                var a = this
                    , b = a.conf()
                    , c = b.$SearchAss_List.find("li").length
                    , d = a.getSelectedIndex() + 1 > c - 1 ? 0 : a.getSelectedIndex() + 1;
                a.selectedByIndex(a.isSelected() ? d : 0)
            }
            ,
            d.prototype.keyEnterSelected = function() {
                var a = this
                    , b = a.conf();
                b.$SearchAss_List.find("li:eq(" + a.getSelectedIndex() + ")").trigger("click"),
                    a.inputSubmit()
            }
            ,
            d.prototype.getSelectedIndex = function() {
                var a = this
                    , b = a.conf();
                return b.$SearchAss_List.data("selindex")
            }
            ,
            d.prototype.selectedByIndex = function(a) {
                var b = this
                    , c = b.conf();
                c.$SearchAss_List.find("li").removeClass("selected"),
                    c.$SearchAss_List.find("li:eq(" + a + ")").addClass("selected"),
                    b.setSelectedIndex(a)
            }
            ,
            d.prototype.setSelectedIndex = function(a) {
                var b = this
                    , c = b.conf();
                c.$SearchAss_List.data("selindex", a)
            }
            ,
            d.prototype.setNoneSelected = function() {
                {
                    var a = this;
                    a.conf()
                }
                a.setSelectedIndex(-1)
            }
            ,
            d.prototype.isSelected = function() {
                {
                    var a = this;
                    a.conf()
                }
                return -1 == a.getSelectedIndex() ? !1 : !0
            }
            ,
            d.prototype.isEnterCanSubmit = function() {
                var a = this
                    , b = a.conf();
                return b.$SearchAss_List.is(":visible") && a.isSelected()
            }
            ,
            d.prototype.setInputPutinType = function() {
                var a = this
                    , b = a.conf();
                b.$ComSearchBox.hasClass("com-search-box-putin") || b.$ComSearchBox.addClass("com-search-box-putin")
            }
            ,
            d.prototype.setInputDefaultType = function() {
                var a = this
                    , b = a.conf();
                b.$ComSearchBox.hasClass("com-search-box-putin") && b.$ComSearchBox.removeClass("com-search-box-putin")
            }
            ,
            c.exports = d
    });
