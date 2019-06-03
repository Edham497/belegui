<!DOCTYPE html>
<html lang="en">
<?php 
    require_once "Core/controladorBase.php";
    require_once "Core/displayUser.php";

    //Verificar si hay una sesion activa
    if(isset($_SESSION['id']) && $_SESSION['id']){
        if(isset($_SESSION['rol']) && $_SESSION['rol'])
        {
            //Edicion del producto
            if($_SESSION['rol'] == "1"){
                //echo "<div class='main col cc'>Todo chido</div>";
                include "Vistas/Admin/nuevoProducto.php";
                echo "<script>\n\tmain();\n\tmenuAdmin();\n</script>";
            }
            //redirecciones
            else{
                //mostrar 403(Forbidden)
                include "assets/403.htm";
                echo "<div class='main col cc'>sin permisos</div>";
                
                switch($_SESSION['rol']){
                    case "2":
                        echo "<script>\n\tmain();\n\tmenuDesigner();\n</script>";
                        break;
                    case "3":
                        echo "<script>\n\tmain();\n\tmenuUsuario();\n</script>";
                        break;
                }
            }
            
        }
    }
    //mostrar 401(Unauthorized)
    else{
        include "assets/401.htm";
        echo "<script>\n\tmain();\n\tmenuVisita();\n</script>";
    }
?>
</html>