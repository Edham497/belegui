<!DOCTYPE html>
<html lang="en">
<?php 
    require_once "Core/controladorBase.php";
    session_start();
   
    //Verificar si hay una sesion activa
    if(isset($_SESSION['id']) && $_SESSION['id']){
        //Dependiendo del tipo de usuario se cargara un home diferente
        if(isset($_SESSION['rol']) && $_SESSION['rol']){
            
            switch($_SESSION['rol'])
            {
                case "1":{
                    include "Vistas/Admin/blog.php";
                    echo "<script>\n\tmain();\n\tmenuAdmin();\n</script>";
                }break;
                case "2":{
                    include "Vistas/Admin/blog.php";
                    echo "<script>\n\tmain();\n\tmenuDesigner();\n</script>";
                }break;
                case "3":{    
                    include "Vistas/User/blog.php";
                    echo "<script>\n\tmain();\n\tmenuUsuario();\n</script>";
                }break;
            }
        }
        else{
            //En caso de que no tenga tipo de usuario o un error dentro de la sesion lo mandara al 404, donde tendra que cerrar la sesion
            include "assets/404.php";
            echo "<script>\n\tmain();\n\tmenuUsuario();\n</script>";
        }
        
    }
    else{
        //Si no hay una sesion activa cargara el index por defecto
        require_once 'Modelos/Usuario.php';
        //Usuario::getDefaultUserComp();
        include "Vistas/User/blog.php";
        echo"<script>\n\tmain();\n\tmenuVisita();\n</script>";
    }
?>
</html>