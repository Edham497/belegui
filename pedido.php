<!DOCTYPE html>
<html lang="en">
<?php
    require_once "Core/controladorBase.php";
    //session_start();
    
    //DisplayUser abre una sesion
    require_once "Core/displayUser.php";

    //Verificar si hay una sesion activa
    if(isset($_SESSION['id']) && $_SESSION['id']){
        //Dependiendo del tipo de usuario se cargara un home diferente
        if(isset($_SESSION['rol']) && $_SESSION['rol']){
            switch($_SESSION['rol'])
            {
                case "5":{
                    echo "<script>\n\tmain();\n\tmenuAdmin();\n</script>";
                }break;
                case "2":{
                    echo "<script>\n\tmain();\n\tmenuDesigner();\n</script>";
                }break;
                case "3":{
                    echo "<script>\n\tmain();\n\tmenuUsuario();\n</script>";
                }break;
                default: {
                    include "assets/403.htm";
                }
                break;
            }
        }
        else{
            //En caso de que no tenga tipo de usuario o un error dentro de la sesion lo mandara al 404, donde tendra que cerrar la sesion
            include "assets/403.htm";
            echo "<script>\n\tmain();\n\tmenuVisita();\n</script>";
        }
    }
    else{
        include "assets/401.htm";
        echo"<script>\n\tmain();\n\tmenuVisita();\n</script>";
    }
?>

<!-- Modificar esto -->
<link href="css/carrito.css" rel="stylesheet">     
    <div class="main col cc" >
        <?php
            require_once 'ADO/mostrarPedido.php';
        ?>
        <div class="blank"></div>
    </div>
</html>


