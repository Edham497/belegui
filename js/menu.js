function $(id){
    return document.querySelector(id);
}
function redir(dir){
    location.href = dir;
}

function show_hide(){
    var menu = $('.menu');
    var boton = $("#btn_menu");
    if(menu.classList.contains('show')){
        $("body").style.overflow="inherit";
        boton.style.color="black";
        boton.innerHTML ="≡";
        menu.classList.remove('show');
        menu.classList.add('hide');
    }else{
        $("body").style.overflow="hidden";
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
    $(".menu").children[1].appendChild(boton);
}

function genericos(){
    createMenuItem("Catalogo","/");
    createMenuItem("Blog","/");
    
}

function menuVisita(){
    createMenuItem('Iniciar Sesion','/login.php');
    genericos();
}

function menuUsuario(){
    genericos();
    createMenuItem("Carrito","/");
    createMenuItem("Favoritos","/");
    createMenuItem("Perfil","/");
    createMenuItem("Cerrar Sesion","/Controladores/Usuarios/logout.php");
}
function menuAdmin(){
    genericos();
    createMenuItem("Usuarios del Sistema","/");
    createMenuItem("Reportes","/");
    createMenuItem("Configuracion","/");
    createMenuItem("Cerrar Sesion","/Controladores/Usuarios/logout.php");
}

function main(){
    $(".logo").addEventListener('click',function(){
        redir("/");
    });
    
    $("#btn_menu").addEventListener('click',function(){
        show_hide();
    });

    $("#m_btn_menu").addEventListener('click',function(){
        show_hide();
    });
    
    tostada();
}
