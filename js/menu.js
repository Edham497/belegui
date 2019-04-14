function $(id){
    return document.querySelector(id);
}

function show_hide(){
    var menu = $('.menu');
    if(menu.classList.contains('show')){
        $("#menubtn").style.background="transparent";
        $("#menubtn").style.color="black";
        menu.classList.remove('show');
        menu.classList.add('hide');
    }else{
        $("#menubtn").style.background="white";
        menu.classList.remove('hide');
        menu.classList.add('show');
    }
}

$("#menubtn").addEventListener('click',function(){
    show_hide();
});