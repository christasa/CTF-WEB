$(document).ready(function(){
    var cookie=document.cookie;
    var userAgent = navigator.userAgent;
    var isOpera = userAgent.indexOf("Opera") > -1;
    if (userAgent.indexOf("Firefox") > -1){
        if (cookie.search(/PHPSESSID/) != -1 && cookie.search(/auth/) == -1 ){
            $("#login").show();
            $("#register").show();
        }
        else{
            $("#logout").show();
            $("#upload").show();
            $("#download").show();
        }
    }
    else{
        if (cookie == "" || cookie == "deleted"){
            $("#login").show();
            $("#register").show();
        }
        else{
            $("#logout").show();
            $("#upload").show();
            $("#download").show();
        }
    }
});
