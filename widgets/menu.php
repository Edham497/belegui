<?php
    function getMenu($esp){
        echo "<div class='menu hide'>
                <div class='title a_fuego'>Belegui</div>
                <ul>
                    <a href='".$esp."Vistas/Login/index.php'><li class='item'>Iniciar Sesión</li></a>
                    <!--<a href='".$esp."Controladores/Usuarios/closeSession.php'><li class='item'>Cerrar Sesión</li></a>-->
                </ul>
            </div>";
        echo "<script src='".$esp."js/menu.js' onload='main()'></script>";
    }
?>