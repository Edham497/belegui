<!DOCTYPE html>
<html>
    
<?php
    require_once "Controladores/widgets/widgetRequires.php";
    prepararComponentes(null);
    session_start();
    if(!isset($_SESSION['nombre']))
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
        <link rel="stylesheet" href="css/contenedorImagenes.css">
        <div class="publicacion">
            <div class="title">Publicacion #1</div>
            <div class="cuerpo row sa fixFlow">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempore tenetur eius non magnam amet ad aperiam aliquid harum officiis! Dolorem ipsam voluptate veritatis quo dolor, pariatur repudiandae voluptatibus provident facilis.</p>
                <div class="marco" id ="cont1">
                    <div class="imagenGrande" id ="c1">
                        <img src="#" alt="  ">
                    </div>
                    <div class="imagenes">
                        <div class="imagen">
                            <img src="img/img.jpg" alt="">
                        </div>
                        <?php
                            for($i = 0,$j=2; $i < 8; $i++){
                                echo "<div class='imagen'>
                                    <img src='img/img".$j.".jpg' alt=''>
                                </div>";
                                $j = ($j<5)?($j+1):2;
                            }
                        ?>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="publicacion dark">
            <div class="title">Publicacion #2   </div>
            <div class="cuerpo row sa fixFlow">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempore tenetur eius non magnam amet ad aperiam aliquid harum officiis! Dolorem ipsam voluptate veritatis quo dolor, pariatur repudiandae voluptatibus provident facilis.</p>
                <div class="marco" id ="cont2">
                    <div class="imagenGrande" id="c2">
                        <img src="#" alt="  ">
                    </div>
                    <div class="imagenes">
                        <div class="imagen">
                            <img src="img/img.jpg" alt="">
                        </div>
                        <?php
                            for($i = 0,$j=2; $i < 8; $i++){
                                echo "<div class='imagen'>
                                    <img src='img/img".$j.".jpg' alt=''>
                                </div>";
                                $j = ($j<5)?($j+1):2;
                            }
                        ?>
                        
                    </div>
                </div>
            </div>
        </div>
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
<script src="js/utilities.js"></script>
<script src="js/slider.js"></script>
</html>