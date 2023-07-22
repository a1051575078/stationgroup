function autoImg(box, speed, number, fadeIn, lCenter, vCenter, auto) {
	/*轮播图片*/
	var index = 0;
	var adTimer;
	/*最外层盒子*/
	var wrapBox = $(box);
	/*图片列表外层盒子*/
	var imgUl = $('.js-imgUl', wrapBox);
	/*图片外层盒子*/
	var imgLi = $('.js-imgLi', imgUl);


	/*图片个数*/
	var len = imgLi.length;

	/*轮播左右按钮*/
	var leftBtn = $('.js-left', wrapBox);
	var rightBtn = $('.js-right', wrapBox);

	/*轮播分页按钮盒子*/
	var pointUl = $('.js-point', wrapBox);
	/*轮播分页按钮*/
	var pointLi = $('li', pointUl);

	if (number > 1) {
		if (len <= number) {
			leftBtn.hide();
			rightBtn.hide();
		}
	} else if (number == 1) {
		if (len == number) {
			leftBtn.hide();
			rightBtn.hide();
			pointUl.hide();
		}
	}
	/*按钮居中*/
	if (lCenter) {
		pointUl.css({
			'margin-left': '-' + pointLi.length * pointLi.outerWidth(true) / 2 + 'px'
		});
	}

	if (vCenter) {
		pointUl.css({
			'margin-top': '-' + pointLi.length * pointLi.outerHeight(true) / 2 + 'px'
		});
	}


	/*鼠标hover分页按钮触发*/
	pointLi.hover(function() {
		index = $(this).index();
		showImg(index);
	});
	/*鼠标移入移出触发*/

	if (!fadeIn) {
		imgUl.width(len * imgLi.eq(0).outerWidth(true));
	} else {
		imgLi.eq(0).addClass('cur').css({
			'z-index': '51',
			opacity: 1
		});
	}

	if (auto) {
//		wrapBox.hover(function() {
//			// clearInterval(adTimer);
//		}, function() {
//			adTimer = setInterval(function() {
//				index++;
//				if (index === Math.ceil(len / number)) {
//					index = 0;
//				}
//				showImg(index);
//				return (index);
//			}, speed);
//		}).trigger("mouseleave");
		
		adTimer = setInterval(function() {
			index++;
			if (index === Math.ceil(len / number)) {
				index = 0;
			}
			showImg(index);
			return (index);
		}, speed);
		
	} else {
		showImg(index);
	}
	/*点击左侧按钮*/
	leftBtn.click(function() {
		index--;
		if (index < 0) {
			/*如果能不整除*/
			if (len % number !== 0) {
				index = Math.floor(len / number);
			} else {
				/*如果能整除*/
				index = Math.floor(len / number) - 1;
			}
		}
		showImg(index);
	});
	/*点击右侧按钮*/
	rightBtn.click(function() {
		index++;
		if (index === Math.ceil(len / number)) {
			index = 0;
		}
		showImg(index);
	});

	touch.on($(wrapBox), "swiperight", function(){
		index--;
		if (index < 0) {
			if (len % number !== 0) {
				index = Math.floor(len / number);
			} else {
				index = Math.floor(len / number) - 1;
			}
		}
		showImg(index);
	});

	touch.on($(wrapBox), "swipeleft", function(){
		index++;
		if (index === Math.ceil(len / number)) {
			index = 0;
		}
		showImg(index);
	});

	function showImg(_index) {
		/*计算图片列表外层盒子宽度*/
		if (!fadeIn) {
			imgUl.width(len * imgLi.eq(0).outerWidth(true));
		}
		if (fadeIn) {
			imgLi.css('z-index', '50').stop(true, false).animate({
					'opacity': 0
				}, 1500).removeClass("cur")
				.eq(_index).addClass("cur").css('z-index', '51').stop(true, false).animate({
					'opacity': 1
				}, 1500);
			pointLi.eq(_index).addClass('cur')
				.siblings().removeClass('cur');
		} else {
			/*如果个数不能整除且滚动到最后一屏*/
			if (_index === Math.floor(len / number) && len % number !== 0) {
				var _w = imgLi.eq(0).outerWidth(true);
				imgUl.stop(false, true).animate({
					'margin-left': '-' + _w * (len % number + (_index - 1) * number) + 'px'
				});
				pointLi.eq(_index).addClass('cur')
					.siblings().removeClass('cur');
			} else {
				/*如果能整除*/
				var _w = imgLi.eq(0).outerWidth(true);
				imgUl.stop(false, true).animate({
					'margin-left': '-' + _w * _index * number + 'px'
				});
				pointLi.eq(_index).addClass('cur')
					.siblings().removeClass('cur');
			}
		}
	}
}



