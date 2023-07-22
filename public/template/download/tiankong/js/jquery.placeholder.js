/**
 * [ HTML5 Placeholder ]
 * 鏉ユ簮 http://the.deerchao.net/PlaceHolder
 */
(function($){
    $.extend($.fn,{
        xPlaceholder: function(opt){
            var def = {
                color: '#888', //鏍囩棰滆壊
                cls: 'placeholder-label', //鏍囩鐨凜lassName
                lr_padding: 5, // 鏍囩鐨勮竟璺�
                selector: 'input[inptips], textarea[inptips]' //閫夋嫨鍣�
            };

            $.extend(def,opt);

            // 妫€娴嬫祻瑙堝櫒鐨勬敮鎸�
            var browserSupported = function(){
                return this._supported !== undefined ?
                    this._supported :
                    (this._supported = !!('placeholder' in $('<input type="text">')[0]) );
            }

            var init = function(def){
                var calcPositionCss = function(target){
                    var op = $(target).offsetParent().offset();
                    var ot = $(target).offset();

                    return {
                        top: ot.top - op.top + ($(target).outerHeight() - $(target).height()) /2 - 8,
                        left: ot.left - op.left + 0,
                        width: $(target).width() - def.lr_padding
                    };
                }
                return $(def.selector).each(function(){
                    var $this = $(this);

                    if( $this.data('placeholder') ) {
                        var $ol = $this.data('placeholder');
                        $ol.css(calcPositionCss($this));
                        return true;
                    }

                    var possible_line_height = {};
                    if( !$this.is('textarea') && $this.css('height') != 'auto'){
                        possible_line_height = { lineHeight: $this.css('height'), whiteSpace: 'nowrap' };
                    }

                    var ol = $('<label />')
                        .text($this.attr('inptips'))
                        .addClass(def.cls)
                        .css($.extend({
                            position:'absolute',
                            color: def.color,
                            cursor: 'text',
                            paddingTop: $this.css('padding-top'),
                            paddingLeft: $this.css('padding-left'),
                            zIndex: 99
                        }, possible_line_height))
                        .css(calcPositionCss(this))
                        .attr('for', this.id)
                        .data('target',$this)
                        .click(function(){
                            $(this).data('target').focus();
                        })
                        .insertBefore(this);

                    $this.data('placeholder',ol).bind('focus', function(){
                        ol.hide();
                    }).bind('blur', function(){
                        ol[$this.val().length ? 'hide' : 'show']();
                    }).trigger('blur');

                    $(window).resize(function() {
                        var $target = ol.data('target')
                        ol.css(calcPositionCss($target))
                    });
                });
            }
            //!browserSupported() && init(def);
            init(def);
        }
    });
})(jQuery);
