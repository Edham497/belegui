<?php

    //Llamadas de widgets desde desde el controlador
    /*require_once "../../widgets/head.php";
    require_once "../../widgets/header.php";
    require_once "../../widgets/menu.php";*/

    //para llamar a los widgets solo hay que mandarle las carpetas de salida ("../");
    //Si esta en el index principal se manda una cadena vacia o nula;
    function prepararComponentes($path){
        //Llamadas de widgets desde desde el controlador
        require_once $path."widgets/head.php";
        require_once $path."widgets/header.php";
        require_once $path."widgets/menu.php";
        getHead($path);
        
        if(isset($path)){
            session_start();
            getHeader($_SESSION['nombre']);
        }else getHeader($path);
        
        getMenu($path);
    }

    //require_once "../../widgets/head.php";
    //getHead("../../");
    //require_once "../../widgets/header.php";
    //session_start();
    //getHeader($_SESSION['nombre']);
    //require_once "../../widgets/menu.php";
    //getMenu("../../");

?>