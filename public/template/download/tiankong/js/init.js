/* eslint-disable */
var isNeeded = function(selectors){
    var selectors = (typeof selectors == 'string') ? [selectors] : selectors,
        isNeeded;
    for(var i=0;i<selectors.length;i++){
        var selector = selectors[i];
        if( $(selector).length > 0 ) {
            isNeeded = true;
            break;
        }
    };
    return isNeeded ;
};

var cookie = {
    set:function(name,value,expires,path,domain){
        if(typeof expires=="undefined"){
            expires=365;
        }
        expires=new Date(new Date().getTime()+1000*3600*24*expires);
        document.cookie=name+"="+escape(value)+((expires)?"; expires="+expires.toGMTString():"")+((path)?"; path="+path:"; path=/")+((domain)?";domain="+domain:"");

    },
    get:function(name){
        var arr=document.cookie.match(new RegExp("(^| )"+name+"=([^;]*)(;|$)"));
        if(arr!=null){
            return unescape(arr[2]);
        }
        return null;
    }
}

var dateFormat = function(format, times){
    var now = new Date(times);
    var o = {
        "M+" : now.getMonth()+1, //month
        "d+" : now.getDate(), //day
        "h+" : now.getHours(), //hour
        "m+" : now.getMinutes(), //minute
        "s+" : now.getSeconds(), //second
        "q+" : Math.floor((now.getMonth()+3)/3), //quarter
        "S" : now.getMilliseconds() //millisecond
    }
    if(/(y+)/.test(format)) {
        format = format.replace(RegExp.$1, (now.getFullYear()+"").substr(4 - RegExp.$1.length));
    }
    for(var k in o) {
        if(new RegExp("("+ k +")").test(format)) {
            format = format.replace(RegExp.$1, RegExp.$1.length==1 ? o[k] : ("00"+ o[k]).substr((""+ o[k]).length));
        }
    }
    return format;
}

/* ajax 鎻愪氦琛ㄥ崟 */
var ajaxSubmit = function(form, callback){
    var inp = $(form).find('input,select,textarea'),
        formData = {},
        url = $(form).attr('action'),
        postType = $(form).attr('method') || 'get';
    inp.each(function(){
        var type = $(this).prop('type'),
            name = $(this).attr('name');
        switch (type){
            case 'text':
            case 'password':
            case 'textarea':
            case 'file':
            default:
                formData[name] = $(this).val();
                break;
            case 'radio':
            case 'checkbox':
                formData[name] = $('input[name="' + name + '"]:checked').val();
                break;
            case 'select-one':
                formData[name] = $(this).find("option:selected").val();
                break;
            case 'select-multiple':
                formData[name] = $(this).find("option:selected").val();
                break;
        }
    });

    $.ajax({
        url: url,
        type: postType,
        data: formData,
        success: function(data){
            if(data == '' || data == undefined) return;
            callback(data);
        }
    });
}

var AddFavorite = function(sURL, sTitle){
    try{
        window.external.addFavorite(sURL, sTitle);
    }
    catch(e){
        try{
            window.sidebar.addPanel(sTitle, sURL, "");
        }
        catch(e){
            alert("鎮ㄧ殑娴忚鍣ㄦ殏涓嶆敮鎸侊紝鍔犲叆鏀惰棌澶辫触锛岃浣跨敤Ctrl+D杩涜娣诲姞锛�");
        }
    }
}
/* 妫€鏌ユ槸鍚﹀凡缁忕櫥褰� */
var _userID = '',
    _t = (new Date()/1),
    logined = false;
$(function(){
    /* 鍔犲叆鏀惰棌 */
    $('.j-add-fav').click(function(e){
        var url = location.href,
            title = document.title;
        AddFavorite("http://skycn.com", "澶╃┖涓嬭浇");
        return false;
    });
    /*娴忚鍣ㄨ繑鍥�*/
    $('.back').click(function(e){
        e.preventDefault();
        var href=decodeURIComponent(location.href);
        if(href.indexOf("from")==-1){
            var nowhref="http://skycn.com";
        }
        else{
            var nowhref=href.substring( href.indexOf("from")+5);
        }
        location.href=nowhref;
    });
    /* 鍏ㄧ珯閫氱敤鐧诲綍 */
    /*var instance = passport.pop.init({
         apiOpt: {
            staticPage: PHP_HOME+'/static/skycn/v3Jump.html',
            product: 'hao123',
            u: PHP_HOME,
            memberPass: true,
            safeFlag: 0
        },
        cache: false,
        tangram: true
    });

    $('.j_bd_comm_login').click(function(event){
        instance.show();
        event.preventDefault();
    });*/

    /* 鐐瑰嚮涓嬭浇缁熻 */
    /*$('[dlcount]').on('click', function(e){
        e.preventDefault();
        var dlData = $.trim($(this).attr('dlcount')).split('|'),
            _sid = dlData[0],
            _wid = dlData[1];
        $.get(PHP_HOME+'/index.php?ac=count&id='+_sid+'&webid='+_wid,function(){});
        window.open($(this).attr("href"));
        var nowurl=encodeURIComponent(window.location.href);
        window.location.href=PHP_HOME+"/index.php?ct=stat&ac=thanks&from="+nowurl;
    });*/
    /* 鎼滅储妗嗘枃瀛楁彁绀� */
    $.fn.xPlaceholder();

    /* 鎼滅储妗嗕笅鎷夋 */
    if(isNeeded('#j_search_form')){
        /* 鏂伴椈鏇存柊鏁伴噺 */
        var hotUrl = PHP_HOME+'/source/js/26.js?t='+new Date().getTime(),
            hotData = [];
        $.ajax(hotUrl, {
            dataType: 'text',
            success: function(data) {
                if(data == '') return;
                var num = 0;
                data = data.split(',');
                for(var i=0; i<data.length; i++){
                    if(data[i] != '') hotData.push(data[i]);
                    var numArr = data[i].split('|');
                    if(numArr[1] == 1) num++;
                }
                if(num==0){$('#j_auto_btn').find('.ico').hide();}
                $('#j_auto_btn').find('.ico').html(num);
            }
        });
        var _hotNew = cookie.get('__hotNewNum_');
        var nowTime = new Date().getTime(),
            lastTime = _hotNew == undefined ? nowTime - 3600000 : _hotNew;

        if(nowTime - lastTime >= 3600000){
            $('#j_auto_btn').find('.ico').show();
        }

        var key = $('#j_autocomplete'),
            form = $('#j_search_form');
        $.fn.xAutocomplete({
            node: key,
            source: "http://search.hao123.com/search.php?appkey=c8d46d341bea4fd5bff866a65ff8aea3&order=hits%20desc&page=0&limit=5",
            soft: "http://search.hao123.com/search.php?appkey=c8d46d341bea4fd5bff866a65ff8aea4&order=shows%20desc&page=0&limit=5",
            width: 350,
            fixed: {
                x: -1,
                y: 0
            },
            extBtn: $('#j_auto_btn'),
            extSource: hotData
        });
        form.submit(function(){
            if($.trim(key.val()) == ''){
                key.focus();
                return false;
            }else{
                tracker&&tracker.send({title:key.val(),page:'hao123-skycn-search',pageId:'hao123-skycn-search',type:'submit'});
            }
        });
    }

    /* 棣栭〉鐒︾偣鍥� */
    if(isNeeded('#j_idx_focus')){
        var obj = $('#j_idx_focus');
        $.fn.xTaber({
            content: obj,
            tab: obj,
            auto: true,
            style: 'left',
            prev: obj.find('.btn-prev'),
            next: obj.find('.btn-next')
        });
    }
    /* 宸﹁竟瀵艰埅 */
    /*if(isNeeded('#j_left_nav')){
        var nav = $('#j_left_nav');
        nav.find('.sub-menu').click(function(){
            if($(this).parent().hasClass('open')) return;
            nav.find('.item').removeClass('open');
            $(this).parent().addClass('open')
        });
    }*/

    if(isNeeded('#j_btn_bag')){
        var bagBtn = $('#j_btn_bag'),
            bagOk = $('#j_btn_ok'),
            bagNo = $('#j_btn_no'),
            btnPar = $('#j_btn_no').parent(),
            bagTxt = btnPar.find('.txt');
        var getCurBag = function(){
            var cur = $('#j_bag_tab').find('.current'),
                catid = cur.attr('catid'),
                bagList = $('#j_bag_con').find('[rel="'+catid+'"]');
            return bagList;
        }

        var countDlNum = function(){
            var obj = getCurBag();
            var num = obj.find('.ico-selected').length;
            return num;
        }

        $('#j_bag_con').find('.ico').on('click', function(e){
            if($(this).hasClass('ico-selected')){
                $(this).removeClass('ico-selected').addClass('ico-select');
            }
            else{
                $(this).removeClass('ico-select').addClass('ico-selected');
            }
            var num = countDlNum();
            bagTxt.find('i').html(num);
            e.preventDefault();
            e.stopPropagation();
        });

        bagBtn.click(function(e){
            var bagList = getCurBag();
            var num = countDlNum();
            bagList.addClass('soft-list-dls').siblings().removeClass('soft-list-dls');
            btnPar.find('.btn').show();
            $(this).hide();
            bagTxt.html('鎵归噺涓嬭浇<i>'+num+'</i>娆捐蒋浠�');
            e.preventDefault();
        });

        bagOk.click(function(e){
            // todo
            var obj = getCurBag(),
                selPos = obj.find('.ico-selected');
            if(selPos.length == 0){
                alert('鑷冲皯閫夋嫨涓€涓蒋浠讹紒');
                e.preventDefault();
                return;
            }
            selPos.each(function(){
                var singleDl = $(this).parents('li').find('.btn-soft-dl'),
                    url = singleDl.attr('href');
                if(url != undefined){
                    window.open(url, '_blank');
                }
            });

            e.preventDefault();
        });

        bagNo.click(function(e){
            var bagList = getCurBag();
            $('#j_bag_con').find('ul').removeClass('soft-list-dls');
            btnPar.find('.btn').hide();
            bagTxt.html('鍙€夋嫨澶氭杞欢涓€閿�');
            bagBtn.show();
            e.preventDefault();
        });
    }

    /* js浼被 */
    $.fn.xHover({
        node: $('.j-hover-1').find('li')
    });

    /* tab鍒囨崲 */
    $('.j-tab-comm').each(function(){
        var obj = $(this);
        $.fn.xTaber({
            content: obj,
            tab: obj,
            mouseEvent: 'click'
        });
    });

    /* 璇︽儏椤佃缁嗕粙缁� */
    if(isNeeded('#j_soft_desc')){
        var shorttxt = $('#j_soft_desc').find('.short-desc'),
            all = $('#j_soft_desc').find('.all-desc'),
            btn = $('#j_soft_desc').find('.short-btn');
        btn.click(function(e){
            shorttxt.hide();
            all.show();
            e.preventDefault();
        });
    }

    /* 璇︽儏椤佃瘎璁� */

    /*if(isNeeded('#j_cmt_form')){
        var cmtForm = $('#j_cmt_form'),
            cmtBtn = cmtForm.find('button'),
            cmtTxt = cmtForm.find('textarea');
        if(!logined){
            $('.login-tips').show();
            cmtBtn.attr('type', 'button').click(function(){
                alert('鎮ㄩ渶瑕佺櫥褰曞悗鎵嶅彲浠ョ暀瑷€锛岃鍏堢櫥褰曘€�');
            });
        }
        else{
            cmtForm.bind('submit', function(){
                if($.trim(cmtTxt.val()) == ''){
                    alert('璇峰～鍐欒瘎璁哄唴瀹�');
                    return false;
                }
                ajaxSubmit(cmtForm, function(data){
                    if(data == 1){
                        if(!$('#j_cmt_list').find('.cmt-list').length){
                            $('#j_cmt_list').html('<ul class="cmt-list"></ul>');
                        }
                        var name = cookie.get('username'),
                            face = cookie.get('user_face'),
                            con = cmtTxt.val(),
                            addtime = dateFormat('yyyy-MM-dd hh:mm:ss', new Date().getTime()),
                            newCmt = '<li><div class="avatar"><a href="#" class="pic"><img width="50" src="'+face+'" alt="'+name+'" /></a></div><div class="cmt-name"><a href="#" class="blue">'+name+'</a><span class="cmt-date">'+addtime+'</span></div><div class="cmt-con clearfix"><p>'+con+'</p></div></li>'
                        $('#j_cmt_list').find('.cmt-list').prepend(newCmt);
                        cmtTxt.val('');
                    }
                    else{
                        alert('鎿嶄綔鏈夎');
                    }
                });
                return false;
            });
        }
    }

    var diggCmt = function(obj, type, cid, wid){
        var url = PHP_HOME+'/index.php?ct=member&ac=digg&id='+cid+'&dt='+type+'&webid='+wid;
        var artid = $('#cmt_cid').val();
        var diggedArr = [];
        var digged = cookie.get('_cmtState');
        var inArr = false;
        if(digged == undefined){digged = '';}
        diggedArr = digged.split(',');
        for(var i = 0; i< diggedArr.length; i++){
            if(diggedArr[i] == artid){
                inArr = true;
                break;
            }
        }
        if(!inArr){
            $.get(url, function(data){
                var num = obj.find('.num');
                var old = parseInt(num.html());
                num.html(old+1);
                diggedArr.push(artid);
                cookie.set('_cmtState', diggedArr.join(','), 1);
            });
        }
        else{
            alert('瀵逛笉璧凤紝鎮ㄥ凡缁忚〃杩囨€佷簡');
        }

    }

    if(isNeeded('#j_cmt_list')){
        var cid = $('#cmt_cid').val(),
            webid = $('#web_id').val(),
            url = PHP_HOME+'/index.php?ct=member&ac=get_comment&cid='+cid+'&webid='+webid,
            page = 1,
            ii = 0,
            getComStr = function(data){
                var str = '<ul class="cmt-list">';
                var repayStr = '';
                for(var i in data){
                    var d = data[i];
                    if(d.status != 1) return;
                    if(d.childs != undefined){
                        for(var j=0;j<d.childs.length;j++){
                            repayStr += '<div class="cmt-reply"><p class="cmt-name"><span class="blue">'+d.childs[j].username+'</span></p><p>'+d.childs[j].content+'</p><i></i></div>';
                        }
                    }
                    str += '<li><div class="avatar"><span class="pic"><img width="50" src="'+d.user_face+'" alt="'+d.username+'" /></span></div><div class="cmt-name"><span class="blue">'+d.username+'</span><span class="cmt-date">'+d.addtime+'</span></div><div class="cmt-con clearfix"><p>'+d.content+'</p><span class="cmt-opt"><a href="#" class="blue" rel="btn_good" cid="'+d.id+'">椤�<i class="red">[<s class="num">'+d.good+'</s>]</i></a><a href="#" class="blue" rel="btn_bad" cid="'+d.id+'">韪�<i class="red">[<s class="num">'+d.bad+'</s>]</i></a><a href="#" rel="btn_reply" class="blue" cid="'+d.id+'">鍥炲</a></span></div>'+repayStr+'</li>';
                    ii++;
                }
                str += '</ul>';
                return str;
            }
        $.getJSON(url, function(data){
            if(data.length != 0){
                var strr = getComStr(data)
                $('#j_cmt_list').html(strr);
                if(ii < 9){
                    $('.btn-more-cmt').hide();
                }
                // 椤�
                $('[rel="btn_good"]').on('click',function(e){
                    if(logined){
                        var cid = $(this).attr('cid');
                        diggCmt($(this), 1, cid, webid);
                    }
                    else{
                        alert('鎮ㄩ渶瑕佺櫥褰曞悗鎵嶅彲浠ョ暀瑷€锛岃鍏堢櫥褰曘€�');
                    }
                    e.preventDefault();
                });

                // 韪�
                $('[rel="btn_bad"]').on('click',function(e){
                    if(logined){
                        var cid = $(this).attr('cid');
                        diggCmt($(this), 2, cid, webid);
                    }
                    else{
                        alert('鎮ㄩ渶瑕佺櫥褰曞悗鎵嶅彲浠ョ暀瑷€锛岃鍏堢櫥褰曘€�');
                    }
                    e.preventDefault();
                });
                // 鍥炲
                $('[rel="btn_reply"]').on('click',function(e){
                    if(logined){
                        var _slef = $(this),
                            cid = $(this).attr('cid'),
                            contentid = $('#cmt_cid').val(),
                            rePar = cid;
                        if($('.cmt-reply-box').get(0)){
                            $('.cmt-reply-box').remove();
                        }

                        if(_slef.attr('rel') == 'open'){
                            _slef.attr('rel', 'close');
                            e.preventDefault();
                            return;
                        }

                        _slef.parents('li').append('<div class="cmt-reply-box"><form name="replycmt" method="post" action="'+PHP_HOME+'/index.php?ct=member&ac=add_comment" id="j_reply_cmt"><div class="cmt-text"><textarea name="content" maxlength="200"></textarea></div><input type="hidden" name="contentid" value="'+contentid+'"><input type="hidden" name="dosubmit" value="1"><input type="hidden" name="pid" value="'+cid+'"><input type="hidden" name="webid" value="'+webid+'"><div class="cmt-btn"><button type="submit">鍙戣〃璇勮</button></div></form></div>');
                        // 鐘舵€佸垽鏂�
                        _slef.attr('rel', 'open');

                        var cmtReplyForm = $('#j_reply_cmt'),
                            cmtReTxt = cmtReplyForm.find('textarea');

                        cmtReplyForm.focus();

                        cmtReplyForm.on('submit', function(){
                            if($.trim(cmtReTxt.val()) == ''){
                                alert('璇峰～鍐欏洖澶嶅唴瀹�');
                                return false;
                            }
                            ajaxSubmit(cmtReplyForm, function(data){
                                if(data == 1){
                                    var name = cookie.get('username'),
                                        con = cmtReTxt.val(),
                                        newreCmt = '<div class="cmt-reply"><p class="cmt-name"><span class="blue">'+name+'</span></p><p>'+con+'</p><i></i></div>';
                                    _slef.parents('li').append(newreCmt);
                                    $('.cmt-reply-box').remove();
                                }
                                else{
                                    alert('鎿嶄綔鏈夎');
                                }
                            });
                            return false;
                        });
                    }
                    else{
                        alert('鎮ㄩ渶瑕佺櫥褰曞悗鎵嶅彲浠ョ暀瑷€锛岃鍏堢櫥褰曘€�');
                    }
                    e.preventDefault();
                });

            }
            else{
                $('#j_cmt_list').html('<div class="no-cmt">杩樻病鏈夌浉鍏宠瘎璁猴紝蹇潵鎶㈡矙鍙戝惂銆�</div>');
            }
        });

        if($('.btn-more-cmt').css('display') != 'none'){
            $('.btn-more-cmt').find('.btn').click(function(e){
                page = page+1;
                $.getJSON(url+'&page='+page, function(data){
                    if(data != 0){
                        var str2 = getComStr(data)
                        $('#j_cmt_list').append(str2);
                    }
                    else{
                        $('.btn-more-cmt').hide();
                    }
                });
                e.preventDefault();
            });
        }
    }*/
});
