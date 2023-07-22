
(function () {

    if (window["Globalstech_js"]) {
        return;
    }
    if (typeof Globalstech === "undefined") {
        Globalstech = function () { };
    }
    // var WINDOWS = [];

    Globalstech.stopBubble = function (e) {
        //一般用在鼠标或键盘事件上
        if (e && e.stopPropagation) {
            //W3C取消冒泡事件
            e.stopPropagation();
        } else {
            //IE取消冒泡事件
            window.event.cancelBubble = true;
        }
    };

    Globalstech.ClosePopup = function (mid, refresh) {
        if (refresh != false && (refresh == undefined || refresh == "")) {
            refresh = true;
        }
        if (window.ClosePopupAllowRefresh) {
            refresh = true;
        }
        if (parent) {
            var iPopUp = parent.jQuery("#iPopUp");
            if (iPopUp.length > 0 && iPopUp.dialog) {
                iPopUp.dialog("close");
            }
            if (window.parent.OpenedWindow) {
                window.parent.OpenedWindow.refresh = refresh;
                window.parent.OpenedWindow.close();
                window.parent.OpenedWindow.isShow = false;
            }
        }
        return false;
    };

    Globalstech.ClosePopupAndRefreshPage = function () {
        if (parent) {
            if (window.parent.OpenedWindow) {
                window.parent.OpenedWindow.isShow = false;
                window.parent.OpenedWindow.close();
            }
            parent.location.href = parent.location.href;
        }
    };

    Globalstech.PopupSetSize = function (width, height) {
        var wnd = window.OpenedWindow;
        if (!wnd) {
            wnd = parent.window.OpenedWindow;
        }
        if (wnd) {
            wnd.setSize(width, height);
        }
    }
    //刷新父级模块
    Globalstech.RefreshParent = function (mid) {
        if (parent && mid) {
            var pModule = parent.window["Module" + mid];
            if (pModule) {
                //设置异步刷新的来源
                parent.$("#AjaxRefreshCommand" + mid).val(window["Module" + mid].options.uniqueName);
                //刷新模块
                pModule.refreshModule();
            }
        }
    }
    //刷新父级模块
    Globalstech.Refresh = function (mid, uniqueName, valid) {
        if (mid && (!window["OpenedWindow"] || OpenedWindow.refresh == undefined || OpenedWindow.refresh == true)) {
            var module = window["Module" + mid];
            if (module) {
                //设置异步刷新的来源
                //            $("#AjaxRefreshCommand" + mid).val(uniqueName);
                module.setAjaxRefreshCommand(uniqueName);

                //刷新模块
                module.refreshModule();


            }
        }
    }
    //弹窗
    Globalstech.ShowPopup = function (url, mid) {
        if (url.indexOf("popUp=true") == -1) {
            if (url && url.indexOf("?") == -1) {
                url += "?";
            } else {
                url += "&";
            }
            url += "popUp=true";
        }
        if (!window.OpenedWindow) {
            window.OpenedWindow = $find("Globalstech_Window");
            //弹窗
            if (window.OpenedWindow && mid) {
                window.OpenedWindow.add_beforeClose(function (sender, args) {
                    window.OpenedWindow.isShow = false;
                    var module = window["ChildModule" + mid];
                    if (module) {
                        try {
                            var form = $(".RadWindow iframe").get(0).contentWindow.document.forms[0];
                            if (module.options.validFormIsDirty) {//如果开启表单修改验证
                                if (Globalstech.formIsDirty(form)) {
                                    if (!confirm("对不起，页面数据已做修改，尚未保存，确定要刷新或离开本页面？")) {
                                        args.set_cancel(true);
                                        return false;
                                    }
                                }
                            }
                        } catch (e) {

                        }
                    }
                    if (window.OpenedWindow.refresh) {
                        if (module) {
                            window.Globalstech.Refresh(mid, module.options.uniqueName);
                        } else {
                            window.Globalstech.Refresh(mid, "");
                        }
                    }
                    //还原父页面的滚动条
                    if (window.parent) {
                        window.parent.$(document.body).css("overflow-y", "auto");
                    }
                });
            }
        }

        window.OpenedWindow.setUrl(url);
        var module = Globalstech.GetModule(mid);
        if (module) {
            var moduleOptions = module.options;
            if (moduleOptions.autosize) {
                window.OpenedWindow.setSize($(window).width() * 0.9, $(window).height() * 0.9);
            }
        }
        //如果页面url设置宽高
        var req = new Globalstech.QueryString(url);
        var w = req["w"];
        var h = req["h"];
        if (w && h) {
            window.OpenedWindow.setSize(parseInt(w), parseInt(h));
        }
        /*        if (window["PopupTitle"]) {
                    Globalstech.SetPopupTitle(window.PopupTitle);
                }*/
        window.OpenedWindow.show();
        window.OpenedWindow.isShow = true;
        if (window.parent && window.parent.OpenedWindow && window.parent != self) {
            var width = window.parent.OpenedWindow.get_width();
            var height = window.parent.OpenedWindow.get_height();
            window.OpenedWindow.setSize(width * 0.9, height * 0.9);
            window.OpenedWindow.center();
        }
        //屏蔽父页面的滚动条
        if (window.parent) {
            window.parent.$(document.body).css("overflow-y", "hidden");
        }
    }

    /*  Globalstech.SetPopupTitle = function (title) {
          if (window.OpenedWindow) {
              setTimeout(function () {
                  window.OpenedWindow.set_title(title);
              }, 50);
          }
      }
  */
    Globalstech.ShowPopupOnReady = function (url, mid) {
        if (window["Sys"]) {
            if (!Sys.WebForms.PageRequestManager.getInstance().get_isInAsyncPostBack()) {//仅在非异步刷新时加载窗口
                setTimeout(function () {
                    Globalstech.ShowPopup(url, mid);
                }, 50);
            }
        } else {
            $(function () {
                setTimeout(function () {
                    Globalstech.ShowPopup(url, mid);
                }, 50);
            });
        }
    }

    Globalstech.AjaxRequest = function (args) {
        var ajaxManager = Globalstech.GetAjaxManager();
        if (ajaxManager != null) {
            ajaxManager.ajaxRequest(args);
        }
    };

    Globalstech.AjaxRequestWithTarget = function (id, args) {
        var ajaxManager = Globalstech.GetAjaxManager();
        if (ajaxManager != null) {
            ajaxManager.ajaxRequestWithTarget(id, args);
        }
    };

    Globalstech.GetAjaxManager = function () {
        return $find("AjaxManager");
    };

    Globalstech.ToolBarClicking = function (gridClientId) {
        return function (sender, args) {
            var button = args.get_item();
            var value = button.get_value();
            var grid = $find(gridClientId);
            var attrs = button.get_attributes();

            switch (value) {
                case "Delete":
                    if (!confirmSelected("请选择要删除的项")) {
                        return;
                    }
                    var message = "是否删除选择中项?";
                    if (sender.findItemByValue("Restore")) {
                        message = "是否从回收站中彻底删除,注意此删除无法恢复?";
                    }
                    if (!confirm(message)) {
                        args.set_cancel(true);
                    }
                    break;
                case "Restore":
                    if (!confirmSelected("请选择要还原的项")) {
                        return;
                    }
                    if (!confirm("是还原除选择中项?")) {
                        args.set_cancel(true);
                    }
                    break;

            }
            if (window["ToolBarClicking"] && $.isFunction(window["ToolBarClicking"])) {
                if (!window["ToolBarClicking"](sender, args, grid)) {
                    args.set_cancel(true);
                    return;
                }
            }
            var verifyCheck = attrs.getAttribute("Verify-Check");
            var verifyCheckMessage = attrs.getAttribute("Verify-Check-Message");
            if (verifyCheck == "true") {
                if (!confirmSelected(verifyCheckMessage)) {
                    return;
                }
            }

            function confirmSelected(message) {
                if (grid && grid.get_selectedItems().length == 0) {
                    Globalstech.Tip.show({ text: message, type: "warning", maxCount: 1 });
                    args.set_cancel(true);
                    return false;
                }
                return true;
            }
        };
    };

    Globalstech.formIsDirty = function (form) {
        if (!form) {
            form = $("form").get(0);
        }
        if (!form) {
            return false;
        }
        for (var i = 0; i < form.elements.length; i++) {
            var element = form.elements[i];
            var type = element.type;
            if (type == "checkbox" || type == "radio") {
                if (element.checked != element.defaultChecked) {
                    return true;
                }
            } else if (type == "hidden" || type == "password" || type == "text" || type == "textarea") {
                if (element.value != element.defaultValue) {
                    return true;
                }
            } else if (type == "select-one" || type == "select-multiple") {
                for (var j = 0; j < element.options.length; j++) {
                    if (element.options[j].selected != element.options[j].defaultSelected) {
                        return true;
                    }
                }
            }
        }
        return false;
    };

    Globalstech.ModuleBase = function (options) {
        var that = this;
        this.options = options;
        this.cancelCloseWindow = false;
        //刷新模块
        this.refreshModule = function () {
            var button = $("#" + that.options.refreshButtonId);
            var href = button.attr("href");
            if (href) {
                var script = href.replace("javascript:", "");
                eval(script);
            }
        };
        //设置刷新命令
        this.setAjaxRefreshCommand = function (command) {
            $("#AjaxRefreshCommand" + that.options.mid).val(command);
        }
        //将当前对象设置到父页面中
        if (parent && parent != self) {
            parent.window["ChildModule" + this.options.mid] = this;
        }
    };

    Globalstech.GetModule = function (mid) {
        return window["Module" + mid];
    };

    Globalstech.HTMLEncode = function (html) { var temp = document.createElement("div"); (temp.textContent != null) ? (temp.textContent = html) : (temp.innerText = html); var output = temp.innerHTML; temp = null; return output; }

    Globalstech.HTMLDecode = function (text) { var temp = document.createElement("div"); temp.innerHTML = text; var output = temp.innerText || temp.textContent; temp = null; return output; }
    //
    Globalstech.QueryString = function (url) {
        // var url = location.search; //获取url中"?"符后的字串
        var theRequest = new Object();
        if (!url) {
            return theRequest;
        }
        var pathname = url.replace(/http:\/\/(.*?)\//ig, "");
        pathname = pathname.substring(1, pathname.length);
        pathname = pathname.replace(/\/Default\.aspx.*/ig, "");
        pathname = pathname.replace(/\/\//ig, "/");
        var items = pathname.split("/");
        for (var index = 0; index < (items.length / 2) ; index++) {
            var key = items[index * 2];
            var value = items[index * 2 + 1];
            theRequest[key] = value;
        }
        if (url.indexOf("?") != -1) {
            var str = url.split("?")[1];
            strs = str.split("&");
            for (var i = 0; i < strs.length; i++) {
                theRequest[strs[i].split("=")[0]] = unescape(strs[i].split("=")[1]);
            }
        }


        return theRequest;
    }

    if (parent && parent.window["PopupTitle"]) {
        if (parent.window.OpenedWindow) {
            setTimeout(function () {
                parent.window.OpenedWindow.set_title(parent.window["PopupTitle"]);
            }, 1);
        }
    }
    var validIntervalId;
    var groups = {}, defaultRules = {},
        defaultMessages = {};

    var validateOptions = {
        rules: defaultRules,
        messages: defaultMessages,
        errorElement: "label",
        ignore: ".ignore",
        onfocusout: function (element) {
            $(element).valid();
        },
        onkeyup: function (element, e) {
            //输入间隔内不验证
            if (validIntervalId) {
                clearTimeout(validIntervalId);
            }
            validIntervalId = setTimeout(function () {
                $(element).valid();
            }, 500);
        },
        success: function (label) {
            label.html("&nbsp;").addClass("valid");
        },
        errorPlacement: function (error, element) {

            if (element.data("tip") == true) {
                var offsetX = element.data("offsetx") || (element.width() + 25);
                var offsetY = element.data("offsety") || (element.height() / 2);
                error.css({
                    left: (element.position().left + offsetX) + "px",
                    top: (element.position().top + offsetY) + "px",
                    position: "absolute"
                });
            }
            var radDropDownList = element.closest(".RadDropDownList");
            if (radDropDownList.length > 0) {
                radDropDownList.after(error);
                return;
            }
            var radAsyncUpload = element.closest(".RadAsyncUpload");
            if (radAsyncUpload.length > 0) {
                radAsyncUpload.after(error);
                return;
            }
            // var id = element.attr("id");
            if (element.data("target-id")) {
                error.appendTo($("#" + element.data("target-id")));
            } else {
                var id = element.attr("name").replace(/\$/ig, "_");
                var parent;
                if (id == element.attr("id")) {
                    parent = element.parent();
                } else {
                    parent = $("#" + element.attr("id")).parent();
                }
                error.appendTo(parent);
            }

        },
        highlight: function (element, errorClass, validClass) {
            var id = element.name.replace(/\$/ig, "_");
            if (id == element.id) {
                if (element.type === "radio") {
                    this.findByName(element.name).addClass(errorClass).removeClass(validClass);
                } else {
                    $(element).addClass(errorClass).removeClass(validClass);
                }
            } else {
                $("#" + id).addClass(errorClass).removeClass(validClass);
            }
        },
        unhighlight: function (element, errorClass, validClass) {
            var id = element.name.replace(/\$/ig, "_");
            if (id == element.id) {
                if (element.type === "radio") {
                    this.findByName(element.name).removeClass(errorClass).addClass(validClass);
                } else {
                    $(element).removeClass(errorClass).addClass(validClass);
                }
            } else {
                $("#" + id).removeClass(errorClass).addClass(validClass);
            }
        }
    };

    Globalstech.AddValidators = function (formValidators) {
        var rules = {};
        var messages = {};

        function buildValidate(description, property) {
            if (!property || !description || !description.name) {
                return;
            }
            if (description[property]) {
                (rules[description.name])[property] = description[property];
            }
            var msgProperty = property + "_msg";
            if (description[msgProperty]) {
                (messages[description.name])[property] = description[msgProperty];;
            }
        }

        if (formValidators) {
            for (var index in formValidators) {
                var validateOption = formValidators[index];
                if (validateOption.group) { //如果设置了分组
                    if (!groups[validateOption.group]) {
                        var group = groups[validateOption.group] = {};
                        group.rules = {};
                        group.messages = {};
                        rules = group.rules;
                        messages = group.messages;
                    } else {
                        rules = groups[validateOption.group].rules;
                        messages = groups[validateOption.group].messages;
                    }
                } else {
                    rules = defaultRules;
                    messages = defaultMessages;
                }

                var name = validateOption.name;
                if (!rules[name]) {
                    rules[name] = {};
                }
                if (!messages[name]) {
                    messages[name] = {};
                }
                buildValidate(validateOption, "required");
                buildValidate(validateOption, "max");
                buildValidate(validateOption, "min");
                buildValidate(validateOption, "maxlength");
                buildValidate(validateOption, "minlength");
                buildValidate(validateOption, "equalTo");
                buildValidate(validateOption, "range");
                buildValidate(validateOption, "rangelength");
                //TODO 多个表达式
                if (validateOption.exp) {
                    if (validateOption.exp[0] == "^") {
                        buildValidate(validateOption, "exp");
                    } else {
                        rules[name][validateOption.exp] = validateOption.exp;
                        messages[name][validateOption.exp] = validateOption.exp_msg;
                    }
                }

                if (validateOption.remote) {
                    if (validateOption.remote_elementid) {
                        var id = validateOption.remote_elementid;
                        rules[name]["remote"] = {
                            url: validateOption.remote,
                            data: {
                                value: function () {
                                    return encodeURIComponent($("#" + id).val());
                                }
                            }
                        };
                    } else {
                        rules[name]["remote"] = validateOption.remote;
                    }
                    messages[name]["remote"] = validateOption.remote_msg;
                }

            }
        }

    }

    Globalstech.GetValidatorOptions = function (group) {
        if (!group) {
            group = Globalstech.CurrentValidatorGroup;
        }
        var groupInfo = groups[group];
        if (groupInfo) {
            validateOptions.rules = groupInfo.rules;
            validateOptions.messages = groupInfo.messages;
        }
        return validateOptions;
    }

    Globalstech.SetValidatorGroup = function (group) {
        var validator = Globalstech.GetValidatorOptions(group);
        $("form").data("validator", null).validate(validator);

    }

    window.Globalstech = Globalstech;

    Globalstech.Ajax = function (mid, root, service, method, data, type) {
        if (!$.ServicesFramework) {
            alert("Web API ServicesFramework 未初始化.");
            return {};
        }
        if (!type) {
            type = "GET";
        }
        var serviceFramework = $.ServicesFramework(mid);
        var path = serviceFramework.getServiceRoot(root) + service + '/';
        return $.ajax({
            type: type,
            url: path + method,
            beforeSend: serviceFramework.setModuleHeaders,
            data: data,
            cache: false
        });
    }
    Globalstech.Download = function (url) {
        Globalstech.Tip.show({ text: "正在下载文件,请稍等", type: "warning", position: "middle-center" });
        var downloader;
        downloader = document.getElementById("downloader");
        if (!downloader) {
            downloader = document.createElement("iframe");
            downloader.id = "downloader";
            downloader.style.display = "none";
            document.body.appendChild(downloader);
        }

        if (downloader) {
            downloader.src = url;
        }
    };
    window["Globalstech_js"] = true;
})();
//浮动提示框
(function () {
    var settings = {
        inEffect: { opacity: 'show' },	// in effect
        inEffectDuration: 600,				// in effect duration in miliseconds
        stayTime: 4000,				// 停留时间
        text: '',					//
        sticky: false,				// 是否不自动关闭
        type: 'info', 			// notice, warning, error, success
        position: 'top-full',        // 左上= top-left, 上中= top-center,右上=top-right,中左= middle-left,中= middle-center,中右= middle-right
        closeText: '',                 //关闭文本
        close: null,               // 关闭回调
        maxCount: 1
    };

    var wrap = {};
    Globalstech.Tip = {

        show: function (options) {
            if (parent && parent != self && top) {
                top.Globalstech.Tip.show(options);
                return;
            }

            var localSettings = $.extend({}, settings, options);
            var tipWrap, itemOuter, itemInner, itemClose, itemImage;
            if (!wrap[localSettings.position]) {
                wrap[localSettings.position] = $('<div></div>').addClass('tip-container').addClass('tip-position-' + localSettings.position).appendTo('body');
            }

            tipWrap = wrap[localSettings.position];

            if (localSettings.maxCount <= 1) {
                $(".tip-item", tipWrap).remove();
            } else {
                var count = tipWrap.children().length;
                if (count >= localSettings.maxCount) {
                    Globalstech.Tip.remove($(".tip-item", tipWrap).first(), localSettings);
                }
            }

            itemOuter = $('<div></div>').addClass('tip-item-wrapper');
            itemInner = $('<div></div>').hide().addClass('tip-item tip-type-' + localSettings.type);
            itemInner = itemInner.appendTo(tipWrap);
            itemInner = itemInner.html($('<span>')
                .append(localSettings.text))
                .animate(localSettings.inEffect, localSettings.inEffectDuration)
                .wrap(itemOuter);
            itemClose = $('<div></div>').addClass('tip-item-close').prependTo(itemInner).html(localSettings.closeText).click(function () {
                Globalstech.Tip.remove(itemInner, localSettings);
            });
            itemImage = $('<div></div>').addClass('tip-item-image').addClass('tip-item-image-' + localSettings.type).prependTo(itemInner);
            if (navigator.userAgent.match(/MSIE 6/i)) {
                tipWrap.css({ top: document.documentElement.scrollTop });
            }
            //重新计算居中
            if (localSettings.position == "middle-center") {
                var left = ($(document.body).width() - tipWrap.width()) / 2;
                tipWrap.css({ left: left + 100 });
            }

            if (!localSettings.sticky) {
                setTimeout(function () {
                    Globalstech.Tip.remove(itemInner, localSettings);
                }, localSettings.stayTime);
            }
        },

        remove: function (obj, options, fn) {
            obj.animate({ opacity: '0' }, 600, function () {
                obj.parent().animate({ height: '0px' }, 300, function () {
                    var parent = obj.parent();
                    (fn && fn());
                    parent.remove();

                });
            });
            if (options && options.close !== null) {
                options.close();
            }
        },

        notice: function (message, pos, time) {
            this.show({ text: message, type: "notice", position: pos || "middle-center", stayTime: time });
        }
        ,
        warning: function (message, pos, time) {
            this.show({ text: message, type: "warning", position: pos || "middle-center", stayTime: time });
        }
        ,
        error: function (message, pos, time) {
            this.show({ text: message, type: "error", position: pos || "middle-center", stayTime: time });
        }
        ,
        success: function (message, pos, time) {
            this.show({ text: message, type: "success", position: pos || "middle-center", stayTime: time });
        }

    };
    Globalstech.showTip = function (msg, type, pos, time) {
        Globalstech.Tip.show({ text: msg, type: type, position: pos, stayTime: time });
    }

    Globalstech.showError = function (msg, pos, time) {
        Globalstech.Tip.error(message, pos, time);
    }

    Globalstech.showWarning = function (msg, pos, time) {
        Globalstech.Tip.warning(msg, pos, time);
    }

    Globalstech.showSuccess = function (msg, pos, time) {
        Globalstech.Tip.success(msg, pos, time);
    }
    Globalstech.showNotice = function (msg, pos, time) {
        Globalstech.Tip.notice(msg, pos, time);
    }
})();

$(function () {

    var scrollTimeout = false;
    $(window).scroll(function () {
        if (window.OpenedWindow && window.OpenedWindow.isActive() && window.OpenedWindow.isShow) {
            if (scrollTimeout) {
                clearTimeout(scrollTimeout);
            }
            scrollTimeout = setTimeout(function () {
                window.OpenedWindow.center();
            }, 100);
        }
    });
    /*    $("span.dnnFormBinder").each(function () {
            var controlId = this.id.split('_')[0];
            $("[id*=_" + controlId + "]").after($(this));
        });*/

    $(document).on("keydown", "input.Search", function (e) {
        if (e.keyCode == 13) {
            var classes = $(this).closest(".DnnModule").attr("class").split(" ");
            var mid;
            if (/DnnModule-(\d+)/ig.test(classes[classes.length - 1])) {
                mid = RegExp.$1;
            }
            if (mid) {
                var module = Globalstech.GetModule(mid);
                module.setAjaxRefreshCommand("Serach");
                module.refreshModule();
                var that = this;
                setTimeout(function () {
                    that.focus();
                }, 500);
            }
            return false;
        } else if (e.keyCode == 27) {
            $("form").get(0).reset();
            return false;
        }

        return true;
    });

    $(document).on("click", "input[id*=cmdDelete]", function () {
        if (!confirm("是否删除当前数据项?")) {
            return false;
        }
        return true;
    });
    //刷新验证码功能
    $(document).on("click", "[data-refresh]", function () {
        if (this.tagName != "IMG") {
            return true;
        }
        var url = $(this).attr("src");
        var oldUrl = $(this).data("url");
        if (oldUrl) {
            url = oldUrl + "&r=" + Math.random();
        } else {
            $(this).data("url", url);
            url = url + "&r=" + Math.random();
        }
        $(this).attr("src", url);
    });

    if (location.href.indexOf("popUp=true") != -1 && location.href.indexOf("dnnprintmode") != -1) {
        Sys.WebForms.PageRequestManager.getInstance().add_beginRequest(function () {
            $(".dnnActions input[id*=cmdUpdate]").prop("disabled", true);
        });
        Sys.WebForms.PageRequestManager.getInstance().add_endRequest(function () {
            $(".dnnActions input[id*=cmdUpdate]").prop("disabled", false);
        });

    }
    //    //设置选项卡索引
    //    var request = Globalstech.QueryString(location.href);
    //
    //    setTimeout(function () {
    //        if (request["tabindex"]) {
    //            var tabIndex = parseInt(request["tabindex"]);
    //            $(".ui-tabs-nav li").eq(tabIndex).find("a").click();
    //        } else {
    //            if (!request["id"]) {
    //                $(".ui-tabs-nav li:first a").click();
    //            }
    //        }
    //    }, 200);


    GlobalstechRegisterValidator();
});

function GlobalstechRegisterValidator() {
    if (!$.validator) {
        setTimeout(function () {
            GlobalstechRegisterValidator();
        }, 50);
        return;
    }

    !function () { var a = { 11: "\u5317\u4eac", 12: "\u5929\u6d25", 13: "\u6cb3\u5317", 14: "\u5c71\u897f", 15: "\u5185\u8499\u53e4", 21: "\u8fbd\u5b81", 22: "\u5409\u6797", 23: "\u9ed1\u9f99\u6c5f", 31: "\u4e0a\u6d77", 32: "\u6c5f\u82cf", 33: "\u6d59\u6c5f", 34: "\u5b89\u5fbd", 35: "\u798f\u5efa", 36: "\u6c5f\u897f", 37: "\u5c71\u4e1c", 41: "\u6cb3\u5357", 42: "\u6e56\u5317", 43: "\u6e56\u5357", 44: "\u5e7f\u4e1c", 45: "\u5e7f\u897f", 46: "\u6d77\u5357", 50: "\u91cd\u5e86", 51: "\u56db\u5ddd", 52: "\u8d35\u5dde", 53: "\u4e91\u5357", 54: "\u897f\u85cf", 61: "\u9655\u897f", 62: "\u7518\u8083", 63: "\u9752\u6d77", 64: "\u5b81\u590f", 65: "\u65b0\u7586", 71: "\u53f0\u6e7e", 81: "\u9999\u6e2f", 82: "\u6fb3\u95e8", 91: "\u56fd\u5916" }; checkCard = function (a) { return "number" == typeof a && (a = a.toString()), "" === a ? !1 : isCardNo(a) === !1 ? !1 : checkProvince(a) === !1 ? !1 : checkBirthday(a) === !1 ? !1 : checkParity(a) === !1 ? !1 : !0 }, isCardNo = function (a) { var b = /(^\d{15}$)|(^\d{17}(\d|X)$)/; return b.test(a) === !1 ? !1 : !0 }, checkProvince = function (b) { var c = b.substr(0, 2); return void 0 == a[c] ? !1 : !0 }, checkBirthday = function (a) { var b = a.length; if ("15" == b) { var c = /^(\d{6})(\d{2})(\d{2})(\d{2})(\d{3})$/, d = a.match(c), e = d[2], f = d[3], g = d[4], h = new Date("19" + e + "/" + f + "/" + g); return verifyBirthday("19" + e, f, g, h) } if ("18" == b) { var i = /^(\d{6})(\d{4})(\d{2})(\d{2})(\d{3})([0-9]|X)$/, d = a.match(i), e = d[2], f = d[3], g = d[4], h = new Date(e + "/" + f + "/" + g); return verifyBirthday(e, f, g, h) } return !1 }, verifyBirthday = function (a, b, c, d) { var e = new Date, f = e.getFullYear(); if (d.getFullYear() == a && d.getMonth() + 1 == b && d.getDate() == c) { var g = f - a; return g >= 3 && 100 >= g ? !0 : !1 } return !1 }, checkParity = function (a) { a = changeFivteenToEighteen(a); var b = a.length; if ("18" == b) { var f, g, c = new Array(7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2), d = new Array("1", "0", "X", "9", "8", "7", "6", "5", "4", "3", "2"), e = 0; for (f = 0; 17 > f; f++) e += a.substr(f, 1) * c[f]; return g = d[e % 11], g == a.substr(17, 1) ? !0 : !1 } return !1 }, changeFivteenToEighteen = function (a) { if ("15" == a.length) { var e, b = new Array(7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2), c = new Array("1", "0", "X", "9", "8", "7", "6", "5", "4", "3", "2"), d = 0; for (a = a.substr(0, 6) + "19" + a.substr(6, a.length - 6), e = 0; 17 > e; e++) d += a.substr(e, 1) * b[e]; return a += c[d % 11] } return a }, window.IdentityCodeValid = checkCard }();

    $.validator.addMethod("int", function (value, element) {
        if (this.optional(element)) {
            return true;
        }
        return /^\d+$/.test(value);
    }, "无效的格式.");

    $.validator.addMethod("money", function (value, element) {
        if (this.optional(element)) {
            return true;
        }
        return /^[0-9]+(.[0-9]+)?$/.test(value);
    }, "无效金额.");
    //表达式
    $.validator.addMethod("exp", function (value, element, param) {
        if (this.optional(element)) {
            return true;
        }
        if (typeof param === "string") {
            param = new RegExp(param);
        }
        return param.test(value);
    }, "无效的格式.");
    //手机号码验证
    $.validator.addMethod("mobile", function (value, element) {
        var mobile = /^1[0-9]{10}$/;
        return this.optional(element) || mobile.test(value);
    }, "请正确填写您的手机号码");
    //手机号码验证
    $.validator.addMethod("tel", function (value, element) {
        var tel = /^\d{3,4}-?\d{7,9}$/;
        return this.optional(element) || tel.test(value);
    }, "请正确填写您的联系电话");
    //联系方式
    $.validator.addMethod("contact", function (value, element) {
        return this.optional(element) || /^\d{3,4}-?\d{7,9}$/g.test(value) || /^1\d{10}$/g.test(value);
    }, "请正确填写您的联系电话");

    $.validator.addMethod("idcard", function (value, element) {
        return this.optional(element) || IdentityCodeValid(value);
    }, "无效的身份证号");
    //
    $.validator.addMethod("zipcode", function (value, element) {
        return this.optional(element) || /^[0-9]{6}$/.test(value);
    }, "请正确填写您的邮政编码");

    $.validator.addMethod("htmlEmpty", function (value, element) {
        value = $.trim(unescape(value));
        if (value.length == 0) {
            return false;
        }
        value = value.replace(/\r|\n/ig, "");
        if (/^\s*(?:&nbsp;)*\s*$/.test(value)) {
            return false;
        }
        return this.optional(element) || (!(/^<([^>]*)>(?:\s*(?:&nbsp;)*\s*)*<\/\1>$/ig.test(value)));
    }, "编辑器内容不能为空");
    // 用户名验证
    $.validator.addMethod("userName", function (value, element) {
        return this.optional(element) || /^[\u4e00-\u9fa5a-zA-Z0-9]{1}$/.test(value);
    }, "只能包括中文字、英文字母、数字和下划线");

    $.validator.addMethod("raddropdown", function (value, element) {
        var telerikElement = $find(element.id.replace("_ClientState", ""));
        var selectedValue = telerikElement.get_selectedItem().get_value();
        return (selectedValue != null && selectedValue != "");
    }, "必须选择");

    $.validator.addMethod("dropdown", function (value, element) {
        return (value != 0 && value != "");
    }, "必须选择");

    $.validator.addMethod("fileupload", function (value, element) {
        if ((value && value != "") || $(element).closest(".RadAsyncUpload").find(".uploaded").length > 0) {
            return true;
        }
        return false;
    }, "必须上传一个文件");

    function fixTabs(validator) {
        var errorElement = $(validator.findLastActive() || validator.errorList.length && validator.errorList[0].element || []);
        if (errorElement.length > 0) {
            var $parent = $(errorElement).closest(".ui-tabs-panel");
            if ($parent.length > 0) {
                var tabId = $parent.attr("id");
                $parent.parent().find("a[href='#" + tabId + "']").click();
            }
        }
        if (typeof CKEDITOR != "undefined") {
            for (var name in CKEDITOR.instances) {
                var editor = CKEDITOR.instances[name];
                CKEDITOR.remove(editor);
            }
            CKEDITOR.replaceAll("editor");
        }
    }

    $.extend($.validator.messages, {
        required: "必须填写",
        remote: "请修正此栏位",
        email: "请输入有效的电子邮件",
        url: "请输入有效的网址",
        date: "请输入有效的日期",
        dateISO: "请输入有效的日期 (YYYY-MM-DD)",
        number: "请输入正确的数字",
        digits: "只可输入数字",
        creditcard: "请输入有效的信用卡号码",
        equalTo: "你的输入不相同",
        extension: "请输入有效的后缀",
        maxlength: $.validator.format("最多 {0} 个字"),
        minlength: $.validator.format("最少 {0} 个字"),
        rangelength: $.validator.format("请输入长度为 {0} 至 {1} 之间的字串"),
        range: $.validator.format("请输入 {0} 至 {1} 之间的数值"),
        max: $.validator.format("请输入不大于 {0} 的数值"),
        min: $.validator.format("请输入不小于 {0} 的数值")
    });

    var options = Globalstech.GetValidatorOptions();
    //验证
    if (window["Sys"]) {
        Sys.Application.add_load(function () {
            var form = $("form");
            var validator = form.validate(options);

            form.submit(function () {
                fixTabs(validator);
            });

            Sys.WebForms.PageRequestManager.getInstance().add_initializeRequest(function (sender, args) {

                var prm = Sys.WebForms.PageRequestManager.getInstance();
                var element = args.get_postBackElement();
                if ($(element).data("causesvalidation") != false) {
                    if (validator.cancelSubmit) {
                        validator.cancelSubmit = false;
                        return true;
                    }
                    if (validator.form()) {
                        if (validator.pendingRequest) {
                            validator.formSubmitted = true;
                            args.set_cancel(true);
                            prm.abortPostBack();
                            return false;
                        }
                        return true;
                    } else {
                        args.set_cancel(true);
                        prm.abortPostBack();
                        validator.focusInvalid();
                        fixTabs(validator);
                        return false;
                    }
                }
            });

        });

    } else {
        $("form").validate(options);
    }
    //验证指定分组
    $(document).on("click", "[data-group]", function () {
        var group = $(this).data("group");
        if (group) {
            Globalstech.SetValidatorGroup(group);
        }
    });
}
if (window["dnnModuleDragDrop"]) {
    window["dnnModuleDragDrop"] = function () {
        //fix bug
    };
}
//设置预览图
if ($.colorbox) {
    setTimeout(function () {
        $("a.img").colorbox();
    }, 500);
}
