<?php
    error_reporting(E_ALL);
	ini_set('display_errors', '1');
    
    require_once '../ADO/Conexion.php';
    session_start();
    if(!$_SESSION['id'])
        {
            echo "No hay sesion";
            //header("Location:../Vistas/Home/home.php");
        }
    else
    {   
        $con = Conexion::getConn();
        
        //$texto = $_POST['texto'];
        //$img = $_FILES['imagen']['name'];
        //$id = $_SESSION['id'];

        $ruta = "../Imagenes Productos/".$_FILES['imagen']['name'];
        move_uploaded_file($_FILES['imagen']['tmp_name'],$ruta);
        $query = "INSERT INTO publicaciones(publicacion,fecha_publicacion,imagen,idUsuario)VALUES (:pub,NOW(),:img,:id)";  
        $statement = $con->prepare($query);
        $statement->bindParam(":pub",$_POST['texto']);
        $statement->bindParam(":img",$_FILES['imagen']['name']);
        $statement->bindParam(":id",$_SESSION['id']);
        $statement->execute();
    }

    header("Location: ../Blog.php")
?>