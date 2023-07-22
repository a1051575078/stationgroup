    function checkMobile() {
        var pda_user_agent_list = new Array("2.0 MMP", "240320", "AvantGo", "BlackBerry", "Blazer",
                "Cellphone", "Danger", "DoCoMo", "Elaine/3.0", "EudoraWeb", "hiptop", "IEMobile", "KYOCERA/WX310K", "LG/U990",
                "MIDP-2.0", "MMEF20", "MOT-V", "NetFront", "Newt", "Nintendo Wii", "Nitro", "Nokia",
                "Opera Mini", "Opera Mobi",
                "Palm", "Playstation Portable", "portalmmm", "Proxinet", "ProxiNet",
                "SHARP-TQ-GX10", "Small", "SonyEricsson", "Symbian OS", "SymbianOS", "TS21i-10", "UP.Browser", "UP.Link",
                "Windows CE", "WinWAP", "Android", "iPhone", "iPod", "iPad", "Windows Phone", "HTC"/*, "GTB"*/);
        var pda_app_name_list = new Array("Microsoft Pocket Internet Explorer");
        var user_agent = navigator.userAgent.toString();
        for (var i = 0; i < pda_user_agent_list.length; i++) {
            if (user_agent.indexOf(pda_user_agent_list[i]) >= 0) {
                return true;
            }
        }
        var appName = navigator.appName.toString();
        for (var i = 0; i < pda_app_name_list.length; i++) {
            if (user_agent.indexOf(pda_app_name_list[i]) >= 0) {
                return true;
            }
        }
        return false;
    }
    //右侧商标轮播图
    var oUl = $(".tempWrap ul")[0];
    var Li = $(".picList li");//获取ul下的所有li
    oUl.innerHTML = oUl.innerHTML+oUl.innerHTML;//li下的内容相加
    if (checkMobile()) {
        //移动端
        $(".hd_prev").addClass("hd_prev_phone");
        $(".hd_next").addClass("hd_next_phone");
        $(".picList").addClass("picList_phone");
        $(".tempWrap").addClass("tempWrap_phone");
        var w=parseInt(parseInt($(".picList li").css("width")))
        oUl.style.width=w*2*Li.length+'px';
        $(".picList li").css("width","109px");
        $(".picList li").css("display","inline-block");
        var m=0;
        var phone_timer = setInterval(function(){
            m--;
             //如果左边横向滚动了长度一半之后,回到初始位置
             if(m<-w*Li.length){
                 m=0;
             }
             $(".picList").css("left",m);       
         },80);
         $(".hd_prev").click(function(){
            clearInterval(phone_timer);
            phone_timer = setInterval(function(){
                m--;
                if(m<-w*Li.length){
                    m=0;
                }
                $(".picList").css("left",m);       
            },80);
        }) 
        $(".hd_next").click(function(){
            clearInterval(phone_timer);
            phone_timer = setInterval(function(){
                m++;
                if(m==0){
                   m=-w*Li.length;
                }
                $(".picList").css("left",m); 
            },80);
        }) 
    }else if(!checkMobile()){
        //pc端
        var h=parseInt(parseInt($(".picList li").css("height")))
        //ul的高度等于每个li的高度乘以所有li的长度
        oUl.style.height=h*2*Li.length+'px';
        var h1 = -h*Li.length;
        var n=0;
        //调用方法
        var pic_timer = setInterval(function(){
           n--;
            //如果上边纵向滚动了长度一半之后,回到初始位置
            if(n<h1){
                n=0;
            }
            $(".picList").css("top",n);       
        },80);
        //鼠标指向的时候 暂停
        $(".picList").mouseenter(function(){
                clearInterval(pic_timer);
        })	
        $(".picList").mouseleave(function(){
            pic_timer = setInterval(function(){
                    n--;
                     if(n<h1){
                         n=0;
                     }
                     $(".picList").css("top",n);       
                 },80);       
        })
        // 上下箭头
        $(".hd_prev").mouseenter(function(){
                clearInterval(pic_timer);
            pic_timer = setInterval(function(){
                n--;
                 if(n<h1){
                     n=0;
                 }
                 $(".picList").css("top",n);       
             },80);
        }) 
        $(".hd_next").mouseenter(function(){
            clearInterval(pic_timer);
    
            pic_timer = setInterval(function(){
                n++;
                if(n==0){
                    n=h1;
                }
                $(".picList").css("top",n); 
             },80);
        })    
    }
