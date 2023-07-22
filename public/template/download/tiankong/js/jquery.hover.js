/**
 * [ xHover 榧犳爣浜嬩欢 ]
 * @param  {[type]} $ [description]
 * @return {[type]}   [description]
 */
(function($){
    $.fn.extend({
        xHover: function(opt){
            var def = $.extend({
                node: $('[d-hover="hover"]'),
                /**
                 * @type {str}
                 * 1: 榧犳爣缁忚繃鑷韩鍔犱笂class,榧犳爣绉诲嚭鑷韩鍘绘帀class [浠夸吉绫� hover]
                 * 2: 榧犳爣缁忚繃鐖剁骇鍔犱笂class,榧犳爣绉诲嚭鐖剁骇鍘绘帀class [浠夸笅鎷夎彍鍗昡
                 * 3: 榧犳爣缁忚繃鑷韩鍔犱笂class,鍚岀骇鍘绘帀class,榧犳爣绉诲嚭鏃犲姩浣� [浼哥缉鍒楄〃]
                 */
                type: 1,
                delay: 20,
                activeClass: 'hover'
            }, opt);

            var timer = null,
                clearTimer = function(){
                    if(timer) clearTimeout(timer);
                };

            def.node.each(function(){
                var self = $(this),
                    cls = def.activeClass,
                    type = def.type,
                    activeObj = (type == 1 || type == 3) ? self : self.parent();

                activeObj.bind('mouseover',function(){
                    clearTimer();
                    timer = setTimeout(function(){
                        activeObj.addClass(cls);
                        if(type == 3){
                            activeObj.siblings().removeClass(cls)
                        }
                    }, def.delay);
                }).bind('mouseleave',function(){
                    clearTimer();
                    if(type != 3){
                        activeObj.removeClass(cls);
                    }
                });
            });
        }
    });
})(jQuery);
