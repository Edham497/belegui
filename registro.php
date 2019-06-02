<!DOCTYPE html>
<html lang="en">
<?php 
    require_once "Core/controladorBase.php";
    session_start();
    
    if(isset($_SESSION['id']) && $_SESSION['id']){
        //Desmadre de la sesion ya iniciada
        header("Location:/");
    }
    else{
        include "Vistas/registro.php";
        echo"<script>\n\tmain();\n\tmenuVisita();\n</script>";
    }
?>
</html>