<!DOCTYPE html>
<html lang="en">
<?php 
    require_once "Core/controladorBase.php";
    require_once "Core/displayUser.php";        //DisplayUser abre una sesion

    //Verificar si hay una sesion activa
    if(isset($_SESSION['id']) && $_SESSION['id']){
        //Dependiendo del tipo de usuario se cargara un home diferente
        if(isset($_SESSION['rol']) && $_SESSION['rol']){
            switch($_SESSION['rol']){
                case "1":
                    header("Location:/Catalogo.php");
                break;
                case "2":
                    header("Location:/Blog.php");
                break;
                case "3":
                    include "Vistas/inicio.php";   
                    echo "<script>\n\tmain();\n\tmenuUsuario();\n</script>";
                break;
            }
        }
        
    }
    else{
        //Si no hay una sesion activa cargara el index por defecto
        include "Vistas/inicio.php";
        echo"<script>\n\tmain();\n\tmenuVisita();\n</script>";
    }
?>
</html>