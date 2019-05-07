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

//Esta funcion primero verifica si existe el elemento tostada, luego hace lo que debe
function tostada(){
    var tostada = $(".superTostada");
    if(document.body.contains(tostada))
    setTimeout(function(){tostada.classList.remove("show");}, 4500);
}

function createMenuItem(titulo, accion){
    var boton = document.createElement("li");
    boton.className = "item";
    boton.appendChild(new Text(titulo));
    boton.addEventListener("click",function(){
        redir(accion);
    });
    document.querySelector(".menu").children[1].appendChild(boton);
}

function menuVisita(){
    createMenuItem('Iniciar Sesion','Vistas/Login/index.php');
    genericos();
}

function menuUsuario(){
    genericos();
    createMenuItem("Cerrar Sesion","../../Controladores/Usuarios/closeSession.php");
}

function genericos(){
    createMenuItem("Catalogo","/");
    createMenuItem("Blog","/");
    createMenuItem("Acerca de","/");
}

function main(){
    $(".logo").addEventListener('click',function(){
        redir("/");
    });
    
    $("#menubtn").addEventListener('click',function(){
        show_hide();
    });
    
    tostada();
}