$(document).ready(function() {

    //ToolTop
    menuHover($("#menu li>a"), $("#menu li p"), 200);
    //Navbar
    $("#Navbar").hover(function() {
        $("#ToolNav").addClass("ToolNavbar-hover");
    }, function() {
        $("#ToolNav").removeClass("ToolNavbar-hover");
    });
    //Navbar
    //Navbar
    $(".TopNav-MenuItem").hover(function() {
        var index = $(this).index();
        $("#Navbar").addClass("TopNav-showWrap-show");
        $(".menu-title").eq(index).addClass("current");
        $("#Navbar").css("overflow", "visible");
    }, function() {
        var index = $(this).index();
        $("#Navbar").removeClass("TopNav-showWrap-show");
        $(".menu-title").eq(index).removeClass("current");
        $("#Navbar").css("overflow", "hidden");
    });

    $('#left-hot li').mouseenter(listHover);
    $('#left-hot2 li').mouseenter(listHover);
    $('#left-hot3 li').mouseenter(listHover);
    $('#left-hot4 li').mouseenter(listHover);

    $(".mrnew span a:first").addClass("press");
    $(".mrnew span a").mouseover(function() {
        $(".mrnew span a").removeClass("press");
        $(this).addClass("press");
        $(".Everynews ul").eq($('.mrnew span a').index(this)).show().siblings().hide();
    });

    $(".hrank_tit span a:first").addClass("press");
    $(".hrank_tit span a").mouseover(function() {
        $(".hrank_tit span a").removeClass("press");
        $(this).addClass("press");
        $(".hrank_tit_body ul").eq($('.hrank_tit span a').index(this)).show().siblings().hide();
    });

    $(".friend_tit a:first").addClass("press");
    $(".friend_tit a").mouseover(function() {
        $(".friend_tit a").removeClass("press");
        $(this).addClass("press");
        $(".friend_tit_body div").eq($('.friend_tit a').index(this)).show().siblings().hide();
    });

    $(".hemtitr a:first").addClass("press");
    $(".hemtitr a").mouseover(function() {
        $(".hemtitr a").removeClass("press");
        $(this).addClass("press");
        $(".Happlist ul").eq($('.hemtitr a').index(this)).show().siblings().hide();
    });

    $(".pczxqh span a:first").addClass("active");
    $(".pczxqh span a").mouseover(function() {
        $(".pczxqh span a").removeClass("active");
        $(this).addClass("active");
        $(".pczxqh_con ul").eq($('.pczxqh span a').index(this)).show().siblings().hide();
    });

    $(".azzxqh span a:first").addClass("active");
    $(".azzxqh span a").mouseover(function() {
        $(".azzxqh span a").removeClass("active");
        $(this).addClass("active");
        $(".azzxqh_con ul").eq($('.azzxqh span a').index(this)).show().siblings().hide();
    });

    $(".ipzxqh span a:first").addClass("active");
    $(".ipzxqh span a").mouseover(function() {
        $(".ipzxqh span a").removeClass("active");
        $(this).addClass("active");
        $(".ipzxqh_con ul").eq($('.ipzxqh span a').index(this)).show().siblings().hide();
    });

    $(".sydnbqh li a:first").addClass("active");
    $(".sydnbqh li a").mouseover(function() {
        $(".sydnbqh li a").removeClass("active");
        $(this).addClass("active");
        $(".sydnbqh_con .gm_list").eq($('.sydnbqh li a').index(this)).show().siblings().hide();
    });

    $(".sjinqh li a:first").addClass("active");
    $(".sjinqh li a").mouseover(function() {
        $(".sjinqh li a").removeClass("active");
        $(this).addClass("active");
        $(".sjApplist>.sj_bd").eq($('.sjinqh li a').index(this)).show().siblings().hide();
    });

    $(".xgqqh span a:first").addClass("active");
    $(".xgqqh span a").mouseover(function() {
        $(".xgqqh span a").removeClass("active");
        $(this).addClass("active");
        $(".xgqqh_con ul").eq($('.xgqqh span a').index(this)).show().siblings().hide();
    });

    $(".yxgjqh span a:first").addClass("active");
    $(".yxgjqh span a").mouseover(function() {
        $(".yxgjqh span a").removeClass("active");
        $(this).addClass("active");
        $(".yxgjqh_con ul").eq($('.yxgjqh span a').index(this)).show().siblings().hide();
    });

    $(".Gx_d em").hover(function() {
        $('.bwxImg').show()
    }, function() {
        $('.bwxImg').hide();
    });
    $(".azphqh span:first").addClass("active");
    $(".azphqh span").mouseover(function() {
        $(".azphqh span").removeClass("active");
        $(this).addClass("active");
        $(".azphqh_con ul").eq($('.azphqh span').index(this)).show().siblings().hide();
    });
    $(".gameindexthreeqh li:first").addClass("active");
    $(".gameindexthreeqh li").mouseover(function() {
        $(".gameindexthreeqh li").removeClass("active");
        $(this).addClass("active");
        $(".gameindexthreeqh_con .span_box").eq($('.gameindexthreeqh li').index(this)).show().siblings().hide();
    });

    $('.update').click(function() {
        jQuery.ajax({
            url: '/tools/GetGameKey.ashx',
            type: 'get',
            dataType: 'html',
            success: function(data) {
                $('#hotkey').html(data);

            }
        });

    });

    //翻页
    (function() {
            if (!document.getElementById('js-page-jump'))
                return false;
            $('#js-page-jump').click(function() {
                var page = $.trim($(this).parent().find('input').val());
                var totalpage = $(this).attr('rev');
                if (!page || page == '') {
                    alert('请输入页码');
                    return false;
                }
                var _reg = /^[0-9]{1,20}$/;
                if (!_reg.test(page) || Number(page) < 1) {
                    alert('页码必须为正整数');
                    return false;
                }
                if (Number(page) > Number(totalpage)) {
                    alert('输入的数字大于总数:' + totalpage);
                    return false;
                }
                var ext = '.html';
                var elink = '_';
                if ($(this).attr('rel').indexOf(".aspx") > -1) {
                    ext = '';
                    elink = '';
                }
                if (Number(page) > 1) {
                    window.location.href = $(this).attr('rel') + elink + page + ext;

                } else {

                    window.location.href = $(this).attr('rel') + ext;
                }
            });
        }
    )();

});

function btngoUrl(Eid, path, pagecount) //转到某一页
{
    var i = GetValue(Eid);
    if (Num(i)) {
        if (i == 0) {
            alert("请输入大于0的数字！");
            return false;
        }
        if (Number(i) > Number(pagecount)) {
            alert("您输入的页数大于总页数，请输入小于" + (Number(pagecount) + 1) + "的数字！");
            return false;
        }else {
            window.location.href = path;
        }
    }
    return false;
}

function btnAspxGoUrl(Eid, path, pagecount) //转到某一页
{
    var i = GetValue(Eid);
    if (Num(i)) {
        if (i == 0) {
            alert("请输入大于0的数字！");
            return false;
        }
        if (Number(i) > Number(pagecount)) {
            alert("您输入的页数大于总页数，请输入小于" + (Number(pagecount) + 1) + "的数字！");
            return false;
        } else {
            location.href = path + "&page=" + i;
        }
    }
    return false;
}

function GetValue(Eid) //取TextBox控件的值
{
    var e = document.getElementById(Eid);
    return e.value;
}
function Num(i) //只能填写数字
{
    if (i.search(/^[0-9]+$/) == -1) {
        alert("请填写整数！");
        return false;
    }
    return true;
}
//updown
jQuery(document).ready(function($) {
    $body = (window.opera) ? (document.compatMode == "CSS1Compat" ? $("html") : $("body")) : $("html,body");
    $("#shang,#gtop").click(function() {
        $body.animate({
            scrollTop: 0
        }, 400)
    });
    $("#xia").mouseover(function() {
        dn()
    }).mouseout(function() {
        clearTimeout(fq)
    }).click(function() {
        $body.animate({
            scrollTop: $(document).height()
        }, 400)
    });
    $("#comt").click(function() {
        $body.animate({
            scrollTop: $("#comments").offset().top
        }, 400)
    });
});
function up() {
    $wd = $(window);
    $wd.scrollTop($wd.scrollTop() - 1);
    fq = setTimeout("up()", 50)
}
;function dn() {
    $wd = $(window);
    $wd.scrollTop($wd.scrollTop() + 1);
    fq = setTimeout("dn()", 50)
}
;function listHover() {
    $(this).addClass('hover1').siblings().removeClass('hover1');
}
function menuHover(menuObj, menuItem, timer, fn) {
    var hoverTimer, outTimer;
    menuObj.hover(function() {
        var _this = $(this);
        clearTimeout(outTimer);
        hoverTimer = setTimeout(function() {
            menuItem.hide();
            _this.nextAll().show();
        }, timer);
    }, function() {
        var _this = $(this);
        clearTimeout(hoverTimer);
        outTimer = setTimeout(function() {
            _this.nextAll('.downMenuShow').hide();
        }, timer);
    });
    menuItem.hover(function() {
        var _this = $(this);
        clearTimeout(outTimer);
        hoverTimer = setTimeout(function() {
            _this.show();
        }, timer);
    }, function() {
        var _this = $(this);
        clearTimeout(hoverTimer);
        outTimer = setTimeout(function() {
            _this.hide();
        }, timer);
    });
    if (fn) {
        menuItem.children().click(function() {
            fn(this);
        });
    }
}
;
function showtype(type) {
    var softip = document.getElementById("softip");
    softip.className = "b" + type;
}

function dprate(value, entryid) {
    var sPostdata = "";
    sPostdata = 'SoftID=' + entryid + '&RateValue=' + value
    jQuery.ajax({
        url: 'http://count.crsky.com/tools/rate.ashx',
        async: false,
        type: 'get',
        dataType: 'jsonp',
        data: sPostdata,
        jsonp: "callbackparam",
        //服务端用于接收callback调用的function名的参数
        jsonpCallback: "success_jsonpCallback",
        //callback的function名称
        success: function(data) {
            if (data[0].type == "true") {
                jQuery("#rate1img").css('width', data[0].rate1);
                jQuery("#rate2img").css('width', data[0].rate2);
                jQuery("#rate1bai").text(data[0].bai1);
                jQuery("#rate2bai").text(data[0].bai2);
                jQuery("#rate1num").text(data[0].num1);
                jQuery("#rate2num").text(data[0].num2);
            }
            ratecallback(data[0].type);
        }
    });
}
function ratecallback(value) {
    switch (value) {
        case "true":
            alert("感谢您的评价!");
            break;
        case "invalidvalue":
            alert("抱歉,出现错误,请刷新页面后再试!");
            break;
        case "repeated":
            alert("您已经评价过了,请不要重复提交!");
            break;
        default:
            alert("网络错误!我们会尽快修复,抱歉!");
    }
    document.getElementById("rate1").onclick = "";
    document.getElementById("rate2").onclick = "";
}
function Scroll(obj, h, s) {
    if (obj == undefined) {
        return false;
    }
    var h = h || 56;
    var s = s || 1.2;
    var obj = typeof (obj) == "string" ? document.getElementById(obj) : obj;
    var status = obj.getAttribute("status") == null;
    var oh = parseInt(obj.offsetHeight);
    obj.style.height = oh;
    obj.style.display = "block";
    obj.style.overflow = "hidden";
    if (obj.getAttribute("oldHeight") == null) {
        obj.setAttribute("oldHeight", oh);
    } else {
        var oldH = Math.ceil(obj.getAttribute("oldHeight"));
    }
    var reSet = function() {
        if (status) {
            if (oh < h) {
                oh = Math.ceil(h - (h - oh) / s);
                obj.style.height = oh + "px";
            } else {
                obj.setAttribute("status", false);
                window.clearInterval(IntervalId);
            }
        } else {
            obj.style.height = oldH + "px";
            obj.removeAttribute("status");
            window.clearInterval(IntervalId);
        }
    }
    var IntervalId = window.setInterval(reSet, 10);
    return status;
}
var Crsky_ContentPlius = new function() {}
;
Crsky_ContentPlius = {
    des_div_height: 628,
    isshowall: false,
    Init: function() {
        if ($("#rom_des").height() > this.des_div_height) {
            this.HideAllDes();
            $("#rom_des_showall").show();
        } else {
            $("#rom_des_showall").hide();
        }
    },
    ShowAllDes: function() {
        $("#rom_des").height("auto");
        $("#rom_des_showall").html("收起");
        this.isshowall = true;
    },
    HideAllDes: function() {
        $("#rom_des").height(this.des_div_height);
        $("#rom_des_showall").html("显示全部");
        this.isshowall = false;
    }

};
$(function() {
    /* Crsky_ContentPlius.Init();
    $("#rom_des_showall").click(function () {
        if (Crsky_ContentPlius.isshowall) {
            Crsky_ContentPlius.HideAllDes();
        }
        else {
            Crsky_ContentPlius.ShowAllDes();
        }
    });*/
    function HomeScroll(a, b) {
        function g() {
            var g = $(window).scrollLeft()
                , h = $(window).scrollTop()
                , i = $(document).height()
                , j = $(window).height()
                , k = c.height()
                , l = d.height()
                , m = k > l ? f : e
                , n = k > l ? d : c
                , o = k > l ? c.offset().left + c.outerWidth(!0) - g : d.offset().left - c.outerWidth(!0) - g
                , p = k > l ? l : k
                , q = k > l ? k : l
                , r = parseInt(q - j) - parseInt(p - j);
            $(a + "," + b).removeAttr("style"),
                j > i || p > q || m > h || p - j + m >= h ? n.removeAttr("style") : j > p && h - m >= r || p > j && h - m >= q - j ? n.attr("style", "margin-top:" + r + "px;") : n.attr("style", "_margin-top:" + (h - m) + "px;position:fixed;left:" + o + "px;" + (j > p ? "top" : "bottom") + ":0;")
        }
        if ($(a).length > 0 && $(b).length > 0) {
            var c = $(a)
                , d = $(b)
                , e = c.offset().top
                , f = d.offset().top;
            $(window).resize(g).scroll(g).trigger("resize")
        }
    }
    if ($('.jspage').length) {
        HomeScroll(".jsleft", ".jsright");
    }
});
