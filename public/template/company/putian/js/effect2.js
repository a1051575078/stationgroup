jQuery(function (A){
    A(".i-tabs").each(function (){
        var B=A(this);
        var D=A(".i-tabs-container",B);
        var C=B.attr("event")||"mouseover";
        var E=A(".i-tabs-item",this);
        E.each(function (K,I){
            var L=A(this);
            if(K==0){
                L.addClass("i-tabs-item-active")
            }var G=null;
            var H=null;
            var F=L.attr("mid");
            var J=L.attr("eid");
            if(!!F){
                H=A("a[name="+F+"]");
                if(H.size()==1){
                    G=H.parent(".DnnModule");
                }
            }else {
                if(!!J){
                    G=A("#"+J)
                }
            }if(G==null){
                return
            }D.append(G.addClass("i-tabs-content"));
            if(K>0){
                G.hide()
            }else{
                if(K==0){A(G).show()}
            }L.bind(C,function (){
                E.removeClass("i-tabs-item-active");
                L.addClass("i-tabs-item-active");
                A(".i-tabs-content",B).hide();
                A(G).show()
            })
        })
    });

    A(".i-news").each(function (){
        var K=A(this);
        var M=parseInt(K.attr("pagesize"))||3;
        var E=1;
        var L=K.attr("effect")||"show";
        var D=K.attr("event")||"click";
        var S=K.attr("auto")=="true"?false:true;
        var R=parseInt(K.attr("timeout"))||6;
        var F=K.attr("hs")||".i-news-item";
        var I=A(".i-news-item",K);
        var H=I.size();
        var O=A(".i-news-page",K);
        var G=A(".i-news-page-pre",K);
        var T=A(".i-news-page-next",K);
        var P=Math.ceil(H/M);
        var J=A(".i-news-item-container",K);
        var B=A(".i-news-page-container",K);
        if(J.size()==1){
            J.append(I)
        }if(B.size()==1){
            B.append(A(".i-news-page-pre,.i-news-page,.i-news-page-next",K))
        }I.filter(":odd").addClass("i-news-item-alt");
        O.filter(":odd").addClass("i-news-page-alt");
        var Q=function (){
            if(E==1){
                G.addClass("i-news-page-pre-disable")
            }else {
                G.removeClass("i-news-page-pre-disable")
            }if(E==P){
                T.addClass("i-news-page-next-disable")
            }else {
                T.removeClass("i-news-page-next-disable")
            }O.removeClass("i-news-page-active");
            O.eq(E-1).addClass("i-news-page-active");
            var V=(E-1)*M;
            var U=V+M;
            I.each(function (X,W){
                if(X>=V&&X<U){
                    if(L=="show"){
                        A(this).show()
                    }else {
                        A(this).fadeIn()
                    }A(this).addClass("i-news-item-active")
                }else {
                    A(this).hide();
                    A(this).removeClass("i-news-item-active")
                }
            })
        };
        G.bind(D,function (){
            if(E>1){
                E--;
                Q()
            }
        });
        T.bind(D,function (){
            if(E<P){
                E++;
                Q()
            }
        });
        O.bind(D,function (){
            E=parseInt(A(this).attr("page"));
            if(!E){
                E=A.inArray(this,O.get())+1
            }Q()
        });
        var N=function (){
            E++;
            if(E>P){
                E=1
            }Q()
        };
        var C=null;
        if(S){
            C=setInterval(N,1000*R)
        }A(".i-news-item,.i-news-page,.i-news-page-pre,.i-news-page-next",K).hover(function (){
            if(C){
                clearInterval(C)
            }
        },function (){
            if(S){
                C=setInterval(N,1000*R)
            }
        });
        Q()
    })
});
