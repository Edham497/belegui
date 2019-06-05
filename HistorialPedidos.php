<!DOCTYPE html>
<html lang="en">
<?php 
    require_once "Core/controladorBase.php";
    session_start();
    //Verificar si hay una sesion activa
    if(isset($_SESSION['id']) && $_SESSION['id']){
        //Dependiendo del tipo de usuario se cargara un home diferente
        if(isset($_SESSION['rol']) && $_SESSION['rol']){
            if($_SESSION['rol'] == "3"){
                //echo "<div class='main col cc'>Todo chido</div>";
                include "Vistas/User/historial.php";
                echo "<script>\n\tmain();\n\tmenuUsuario();\n</script>";
            }
            //redirecciones
            else{
                //mostrar 403(Forbidden)
                include "assets/403.htm";
                //echo "<div class='main col cc'>sin permisos</div>";
                switch($_SESSION['rol']){
                    case "1":echo "<script>\n\tmain();\n\tmenuAdmin();\n</script>";break;
                    case "2":echo "<script>\n\tmain();\n\tmenuDesigner();\n</script>";break;
                }
            }
        }
        
    }
    //Si no puede estar buscando un perfil
    else{
        include "assets/401.htm";
        echo "<script>\n\tmain();\n\tmenuVisita();\n</script>";
    }
?>
</html>