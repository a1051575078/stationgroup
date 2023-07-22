/* eslint-disable*/
var ad1 = $('.leftad');
var ad2 = $('.rightad');
var ad3 = $('.downadfix');
var ad4 = $('.admiddle');
var ad5 = $('.adtop');
var adimg1 = ad1.find('img');
var adimg2 = ad2.find('img');
var adimg3 = ad3.find('img');
var adimg4 = ad4.find('img');
var adimg5 = ad5.find('img');
if(adimg1.data("pic") != "" && adimg1){
    adimg1.attr('src', adimg1.data("pic"));
    ad1.show();
}
if(adimg2.data("pic") != "" && adimg2){
    adimg2.attr('src', adimg2.data("pic"));
    ad2.show();
}
if(adimg3.data("pic") != "" && adimg3){
    adimg3.attr('src', adimg3.data("pic"));
    if (adimg3.data("col") != "") {
        ad3.css('background', adimg3.data("col"));
    }
    ad3.show();
}
if(adimg4.data("pic") != "" && adimg4){
    adimg4.attr('src', adimg4.data("pic"));
    ad4.show();
}
if(adimg5.data("pic") != "" && adimg5){
    adimg5.attr('src', adimg5.data("pic"));
    ad5.show();
}
ad1.find('.adclosed').click(function () {
    ad1.hide();
    return false;
});
ad2.find('.adclosed').click(function () {
    ad2.hide();
    return false;
});
ad3.find('.adclosed').click(function () {
    ad3.hide();
    return false;
});
