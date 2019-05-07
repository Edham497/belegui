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
    <div class="slider">
        <div class="slides">
            <?php
            for($i = 0; $i<12; $i++){
                echo "<div class='slide'>Slide " . ($i+1) . "</div>";
            } 
            ?>
        </div>
    </div>
    </div>
</body>

<footer>
    Footer
</footer>
<script src="js/slider.js"></script>
</html>