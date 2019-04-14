<?php
    function getMenu($esp){
        echo "<div class='menu hide'>
                <div class='title'>
                    Menu Mamalon
                </div>
                <ul>
                    <a href='".$esp."Vistas/Login/index.php'><li class='item'>Login/Registro</li></a>
                    <li class='item'>Item mamalon 2</li>
                    <li class='item'>Item mamalon 3</li>
                    <li class='item'>Item mamalon 4</li>
                </ul>
            </div>";
        echo "<script src='".$esp."js/menu.js'></script>";
    }
?>