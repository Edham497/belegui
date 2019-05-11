<?php
    error_reporting(E_ALL);
	ini_set('display_errors', '1');
    
    require_once '../ADO/Conexion.php';
    session_start();
    if(!$_SESSION['id'])
        header("Location:../Vistas/Home/home.php");
    else
    {   
        $con = Conexion::getConn();
        
        $ruta = "../images/".$_FILES['imagen']['name'];
        move_uploaded_file($_FILES['imagen']['tmp_name'],$ruta);
        $statement = $con->prepare("UPDATE usuarios SET imagen = :img WHERE idUsuarios = :id");
        $statement->bindParam(":img",$ruta);
        $statement->bindParam(":id",$_SESSION['id']);
        $statement->execute();
    }
    ?>

    <label for="">EXITO!</label>
    <form action="../Vistas/Home/home.php">
        <input type="submit" value="return">
    </form>
    <?php
?>