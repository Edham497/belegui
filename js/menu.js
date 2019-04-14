function $(id){
    return document.querySelector(id);
}

function show_hide(){
    var menu = $('.menu');
    if(menu.classList.contains('show')){
        $("body").style.overflow ="visible";
        $(".main").style.filter = "blur(0px)";
        $("header").style.filter = "blur(0px)";
        menu.classList.remove('show');
        menu.classList.add('hide');
    }else{
        $("body").style.overflow = "hidden";
        $(".main").style.filter = "blur(5px)";
        $("header").style.filter = "blur(5px)";
        menu.classList.remove('hide');
        menu.classList.add('show');
    }
}

$("#menubtn").addEventListener('click',function(){
    show_hide();
});
$("#cerrar").addEventListener('click',function(){
    show_hide();
});