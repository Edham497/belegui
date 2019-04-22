<!DOCTYPE html>
<html>
    
<?php
    require_once "Controladores/widgets/widgetRequires.php";
    prepararComponentes(null);
    session_start();
    if(!$_SESSION['nombre'])
        echo "<script>menuVisita();</script>";
    else
        header("Location:Vistas/Home/home.php");

    //Llamadas sustituidas por un controlador
    /*require_once "widgets/head.php";
    getHead("");
    require_once "widgets/header.php";
    getHeader(null);
    require_once "widgets/menu.php";
    getMenu("");*/
?>

<body>
    <div class="main">
        
    </div>
</body>

<footer>
    Footer
</footer>
</html>