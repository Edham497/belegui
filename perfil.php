<!DOCTYPE html>
<html lang="en">
<?php 
    require_once "Core/controladorBase.php";
    
    session_start();
    //Verificar si hay una sesion activa
    if(isset($_SESSION['id']) && $_SESSION['id']){
        //Dependiendo del tipo de usuario se cargara un home diferente
        if(isset($_SESSION['rol']) && $_SESSION['rol']){
            include "Vistas/perfil.php";
            switch($_SESSION['rol'])
            {
                case "1":
                echo "<script>\n\tmain();\n\tmenuAdmin();\n</script>";
                 break;
                 case "2":
                echo "<script>\n\tmain();\n\tmenuDesigner();\n</script>";
                 break;
                 case "3":
                echo "<script>\n\tmain();\n\tmenuUsuario();\n</script>";
                 break;
                case "1": echo "<script>\n\tmain();\n\tmenuAdmin();\n</script>"; break;
                case "2": case "3": echo "<script>\n\tmain();\n\tmenuUsuario();\n</script>"; break;
                default: {
                    include "assets/404.php";
                }
                break;
            }}
        else{
            //En caso de que no tenga tipo de usuario o un error dentro de la sesion lo mandara al 404, donde tendra que cerrar la sesion
            include "assets/404.php";
            echo "<script>\n\tmain();\n\tmenuInvitado();\n</script>";
        }
        
    }
    //Si no puede estar buscando un perfil
    else{
        //si hay un id en el header
        if(isset($_GET['id']) && $_GET['id']){
            //mostrar el perfil con detalles limitados
        }
        else{
            //Si no mandar el error
            include "assets/404.php";
            echo "<script>\n\tmain();\n\tmenuInvitado();\n</script>";
            include "Vistas/perfil.php";
            echo "<script>\n\tmain();\n\tmenuUsuario();\n</script>";
        }
    }
?>
</html>