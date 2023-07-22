document.domain = "qq.com",
    $(function() {
        $("#J_index-rank-con").on("mouseover", "li", function() {
            $(this).closest(".J_appRankContainer").find(".app-rank-normal").css("display", "block"),
                $(this).closest(".J_appRankContainer").find(".app-rank-hover").css("display", "none"),
                $(this).find(".app-rank-normal").css("display", "none"),
                $(this).find(".app-rank-hover").css("display", "block")
        }),
            $("#J_index-tab").on("click", ".tab", function() {
                var e = $(this).data("container")
                    , t = $("#" + e)
                    , n = $("#" + e + "_Tmpl").html();
                return t.data("isset") === void 0 && (t.html(n),
                    t.data("isset", !0)),
                    $(".J_appContainer").css("display", "none"),
                    t.css("display", "block"),
                    $(".tab").attr("class", "tab"),
                    $(this).attr("class", "select tab"),
                    !1
            }),
            $("#J_index-tab-rank").on("click", ".rankapp", function() {
                var e = $(this).data("container")
                    , t = $("#" + e)
                    , n = $("#" + e + "_Tmpl").html();
                return t.data("isset") === void 0 && (t.html(n),
                    t.data("isset", !0)),
                    $(".J_appRankContainer").css("display", "none"),
                    t.css("display", "block"),
                    $(".rankapp").removeClass("rankselect"),
                    $(this).addClass("rankselect"),
                    !1
            })
    });
