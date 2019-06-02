<!DOCTYPE html>
<html lang="en">
<?php 
    require_once "Core/controladorBase.php";
    session_start();

    if(isset($_GET['status']) && $_GET['status']){
        switch($_GET['status']){
            case "error":{
                echo "<div class='superTostada show'>Usuario o contraseña incorrectos</div>";
                echo "<script>function tostada(){
                    var tostada = document.getElementById('superTostada');
                    if(document.body.contains(tostada))
                        setTimeout(function(){tostada.classList.remove('show');}, 4500);</script>";
            }break;
        }
    }
    
    if(isset($_SESSION['id']) && $_SESSION['id']){
        //Desmadre de la sesion ya iniciada
        header("Location:/");
    }
    else{
        include "Vistas/login.php";
        echo"<script>\n\tmain();\n\tmenuVisita();\n</script>";
    }
?>
</html>