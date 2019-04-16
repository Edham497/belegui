function $(id){
    return document.querySelector(id);
}
function redir(dir){
    location.href = dir;
}
function show_hide(){
    var menu = $('.menu');
    var boton = $("#menubtn");
    if(menu.classList.contains('show')){
        boton.style.background="transparent";
        boton.style.color="black";
        boton.innerHTML ="Menu";
        menu.classList.remove('show');
        menu.classList.add('hide');
    }else{
        boton.style.background="white";
        setTimeout(function(){boton.innerHTML ="X";},250);
        menu.classList.remove('hide');
        menu.classList.add('show');
    }
}

$("#menubtn").addEventListener('click',function(){
    show_hide();
});

$(".logo").addEventListener('click',function(){
    redir("/");
});