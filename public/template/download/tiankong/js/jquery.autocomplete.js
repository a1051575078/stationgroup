/* eslint-disable */
!
    function($) {
        $.extend($.fn, {
            xAutocomplete: function(opts) {
                opts = $.extend({},
                    {
                        node: null,
                        delay: 0,
                        param: null,
                        source: null,
                        soft: null,
                        onchange: null,
                        onselect: null,
                        width: null,
                        fixed: {
                            x: 0,
                            y: 0
                        },
                        extSource: ["绀轰緥"],
                        extBtn: null
                    },
                    opts);
                var keys = {
                        RETURN: 13,
                        BACKSPACE: 8,
                        SPACE: 32,
                        UP: 38,
                        DOWN: 40,
                        ESC: 27
                    },
                    self = this,
                    cacheData = {},
                    currentData = [],
                    lastKeyPress = null,
                    lastSelectedValue = null,
                    active = !1,
                    local = $.isArray(opts.source),
                    local_soft = $.isArray(opts.soft),
                    mouseInSelect = !1,
                    timeOutActive = null,
                    format = null,
                    lastProcessValue = null,
                    menuContainer = null,
                    menuContainer_school = null,
                    node = opts.node,
                    delay = opts.delay,
                    extBtn = opts.extBtn,
                    extEvent = !1,
                    init = function() {
                        node.bind("keydownEvent",
                            function(e, t) {
                                _keydownEvent.apply(self, [t])
                            }).bind("blurEvent",
                            function() {
                                _blurEvent.apply(self)
                            }).attr("autocomplete", "off"),
                            node.keyup(function(e) {
                                node.trigger("keydownEvent", [e])
                            }).blur(function() {
                                node.trigger("blurEvent")
                            }),
                        null != extBtn && extBtn.bind("click",
                            function(e) {
                                $(this).find(".ico").hide();
                                var t = (new Date).getTime();
                                cookie.set("__hotNewNum_", t),
                                    extEvent = !0,
                                    active ? _blurEvent() : (activeAutoComplete(), $(this).addClass("hot-act")),
                                    e.preventDefault(),
                                    e.stopPropagation()
                            }),
                            $("body").bind("click", _blurEvent)
                    },
                    dealData = function(e) {
                        return e
                    },
                    isResult = function(e) {
                        return e ? e.length: void 0
                    },
                    destroy = function() {
                        node.unbind("keydownEvent").unbind("blurEvent").removeAttr("autocomplete")
                    },
                    _keydownEvent = function(e) {
                        switch (extEvent = !1, lastKeyPress = e.keyCode) {
                            case keys.UP:
                                e.preventDefault(),
                                active && focusPrev();
                                break;
                            case keys.DOWN:
                                e.preventDefault(),
                                    active ? focusNext() : activeAutoComplete();
                                break;
                            case keys.RETURN:
                                if (e.preventDefault(), active) return selectCurrent(),
                                    !1;
                                break;
                            case keys.ESC:
                                e.preventDefault(),
                                active && finish();
                                break;
                            default:
                                activeAutoComplete()
                        }
                    },
                    _blurEvent = function() {
                        mouseInSelect || (finish(), extBtn.removeClass("hot-act"))
                    },
                    activeAutoComplete = function() {
                        timeOutActive && clearTimeout(timeOutActive),
                            delay && !local ? timeOutActive = setTimeout(function() {
                                    activeNow()
                                },
                                delay) : activeNow()
                    },
                    activeNow = function() {
                        var e = $.trim(node.val());
                        e != lastSelectedValue && (lastProcessValue = e),
                            getData(e)
                    },
                    finish = function() {
                        active = !1,
                        menuContainer && menuContainer.hide()
                    },
                    getData = function(value) {
                        if ("string" == typeof opts.source) if (extEvent) parseData(opts.extSource);
                        else {
                            var sendData = {},
                                name = opts.param ? opts.param: node.attr("name");
                            sendData[name] = lastProcessValue,
                                $.ajax({
                                    url: opts.source,
                                    data: sendData,
                                    type: "GET",
                                    dataType: "jsonp",
                                    success: function(r) {
                                        "0" != r.total && r.matches.length ? (r = r.matches, currentData = eval(r), setCache(value, r), parseData(currentData), $(".auto_soft1").show().css("height", ""), $(".auto_soft1").find("h2").css("height", $(".auto_soft1").height()), $(".auto_soft1").css("border-bottom", "1px solid #817f82")) : ($(".auto_soft1").css("border-bottom", "none"), $(".auto_soft1").hide())
                                    }
                                })
                        }
                    },
                    filterData = function(e, t) {
                        var a = [];
                        return $.each(e,
                            function(e, o) {
                                var n = new RegExp(t, "gi");
                                o.label ? (n.test(o.label) || n.test(o.value)) && a.push(o) : n.test(o) && a.push(o)
                            }),
                            a
                    },
                    parseData = function(e) {
                        if (isResult(e)) {
                            active = !0,
                                createDom();
                            var e = dealData(e);
                            renderMenu1(e, lastProcessValue),
                                position()
                        } else finish()
                    },
                    parseSchoolData = function(e) {
                        if (isResult(e)) {
                            active = !0,
                                createSchoolDom();
                            var e = dealData(e);
                            renderMenu2(e, lastProcessValue)
                        } else finish()
                    },
                    createDom = function() {
                        if (!menuContainer) {
                            var e = $("<div/>").addClass("autocomplete-container"),
                                t = $("<div/>").addClass("auto_soft1 clearfix"),
                                a = $("<h2/>").addClass("suto_soft_h2"),
                                o = $("<ul/>");
                            menuContainer = e,
                                menuContainer.append(t),
                                t.append(a),
                                a.html("杞欢"),
                                t.append(o),
                                menuContainer.appendTo(document.body),
                                o.delegate("li", "mouseover",
                                    function() {
                                        $(this).addClass("autocomplete-hover").siblings().removeClass("autocomplete-hover"),
                                            mouseInSelect = !0;
                                        $("li.autocomplete-hover", menuContainer).data("value")
                                    }).delegate("li", "mouseout",
                                    function() {
                                        $(this).removeClass("autocomplete-hover"),
                                            mouseInSelect = !1
                                    }).delegate("li", "click",
                                    function() {
                                        lastSelectValue = $(this).data("value"),
                                            mouseInSelect = !1,
                                            finish(),
                                            node.val(lastSelectValue).focus(),
                                            $(node).parents("form").submit()
                                    }),
                                menuContainer.click(function() {
                                    return ! 1
                                })
                        }
                    },
                    createSchoolDom = function() {
                        menuContainer_school || (school_div = $("<div/>").addClass("auto_soft2 clearfix"), common_h = $("<h2/>").addClass("suto_soft_h2 none"), ul = $("<ul/>").addClass("none"), school_div.append(common_h), common_h.html("鏁欑▼"), school_div.append(ul), school_div.appendTo($(".autocomplete-container")), menuContainer_school = !0, ul.delegate("li", "mouseover",
                            function() {
                                $(this).addClass("autocomplete-hover").siblings().removeClass("autocomplete-hover"),
                                    mouseInSelect = !0;
                                $("li.autocomplete-hover", menuContainer).data("value")
                            }).delegate("li", "mouseout",
                            function() {
                                $(this).removeClass("autocomplete-hover"),
                                    mouseInSelect = !1
                            }).delegate("li", "click",
                            function() {
                                lastSelectValue = $(this).data("value"),
                                    mouseInSelect = !1,
                                    finish(),
                                    node.val(lastSelectValue).focus(),
                                    $(node).parents("form").submit()
                            }))
                    },
                    renderMenu1 = function(e, t) {
                        var a = $(".auto_soft1").find("ul");
                        a.empty(),
                            $.each(e,
                                function(e, o) {
                                    if (extEvent) {
                                        var n = o.split("|")[0],
                                            l = o.split("|")[1],
                                            s = $("<li/>").data("value", n);
                                        s.html('<i class="auto-raq auto-' + (e + 1) + '">' + (e + 1) + '</i><i class="auto-key">' + n + '</i><i class="isnew-' + l + '"></i>')
                                    } else {
                                        var s = $("<li/>").data("value", o.attrs.title);
                                        o.attrs.title = o.attrs.title.replace(t, '<b class="imp">' + t + "</b>"),
                                            s.html('<a href="/soft/appid/' + o.id + '.html" target="_blank">' + o.attrs.title + "</a>")
                                    }
                                    a.append(s),
                                        a.find("a").click(function(e) {
                                            e.stopPropagation()
                                        })
                                }),
                            $(".auto_soft1").height(a.height()),
                            $(".auto_soft1").find("h2").height(a.height()),
                            menuContainer.show()
                    },
                    renderMenu2 = function(e, t) {
                        var a = $(".auto_soft2").find("ul");
                        a.empty(),
                            $.each(e,
                                function(e, o) {
                                    if (extEvent) {
                                        var n = o.split("|")[0],
                                            l = o.split("|")[1],
                                            s = $("<li/>").data("value", n);
                                        s.html('<i class="auto-raq auto-' + (e + 1) + '">' + (e + 1) + '</i><i class="auto-key">' + n + '</i><i class="isnew-' + l + '"></i>')
                                    } else {
                                        var i = "";
                                        i = o.attrs.cateid > 4 ? "/school/view/": "/school/view/l_";
                                        var s = $("<li/>").data("value", o.attrs.title);
                                        o.attrs.title = o.attrs.title.replace(t, '<b class="imp">' + t + "</b>"),
                                            s.html('<a href="' + i + o.id + '.html" target="_blank">' + o.attrs.title + "</a>")
                                    }
                                    a.append(s),
                                        a.find("a").click(function(e) {
                                            e.stopPropagation()
                                        }),
                                        $(".auto_soft2").height(a.height()),
                                        $(".auto_soft2").find("h2").height(a.height())
                                })
                    },
                    position = function() {
                        menuContainer.css("position", "absolute");
                        var e = node.offset(),
                            t = node.outerHeight(),
                            a = node.width();
                        null != opts.width && (a = opts.width),
                            menuContainer.css({
                                top: e.top + t + opts.fixed.y,
                                left: e.left + opts.fixed.x,
                                width: a
                            })
                    },
                    getCache = function(e) {
                        return cacheData[e]
                    },
                    setCache = function(e, t) {
                        cacheData.length && cacheData.length > 10 && (cacheData = {},
                            cacheData.length = 0),
                            cacheData[e] = t,
                            cacheData.length++
                    },
                    focus = function(e) {
                        var t = $("li", menuContainer),
                            a = !1;
                        if (t.length) {
                            for (var o = 0; o < t.length; o++) if (t.eq(o).hasClass("autocomplete-hover")) return selectItem(o + e),
                                void(a = !0);
                            a || selectItem(0)
                        }
                    },
                    focusNext = function() {
                        focus(1)
                    },
                    focusPrev = function() {
                        focus( - 1)
                    },
                    selectItem = function(e) {
                        var t = $("li", menuContainer);
                        e = 0 > e ? t.length - 1 : e,
                            e = e == t.length ? 0 : e,
                            t.removeClass("autocomplete-hover"),
                            t.eq(e).addClass("autocomplete-hover");
                        var a = $("li.autocomplete-hover", menuContainer).data("value");
                        node.val(a),
                        lastSelectedValue && !lastSelectedValue != a && opts.onchange && opts.onchange(a),
                            lastSelectedValue = a
                    },
                    selectCurrent = function() {
                        var e = $("li.autocomplete-hover", menuContainer).data("value");
                        lastSelectValue = e,
                        opts.onselect && onselect(e),
                            finish()
                    };
                init()
            }
        })
    } (jQuery);
