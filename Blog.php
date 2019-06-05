<!DOCTYPE html>
<html lang="en">
<?php 
    require_once "Core/controladorBase.php";
    require_once "Core/displayUser.php";
    
   
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
    }
    else{
        //Si no hay una sesion activa cargara el index por defecto
        require_once 'Modelos/Usuario.php';
        Usuario::getDefaultUserComp();
        include "Vistas/User/blog.php";
        echo"<script>\n\tmain();\n\tmenuVisita();\n</script>";
    }
?>
</html>