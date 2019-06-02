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
        

        $ruta = "../Imagenes Productos/".$_FILES['imagen']['name'];
        move_uploaded_file($_FILES['imagen']['tmp_name'],$ruta);
        $query = "INSERT INTO productos
        (nombre,descripcion,precio,color,imagen,fecha_insertado,idCategoria) 
        VALUES (:nom,:descripcion,:precio,:color,:img,NOW(),:idcat)";  
        $statement = $con->prepare($query);
        $statement->bindParam(":nom",$_POST['nombre']);
        $statement->bindParam(":descripcion",$_POST['texto']);
        $statement->bindParam(":precio",$_POST['precio']);
        $statement->bindParam(":color",$_POST['color']);
        $statement->bindParam(":img",$_FILES['imagen']['name']);
        $statement->bindParam(":idcat",$_POST['cat']);
        $statement->execute();
    }

    header("Location:/Catalogo.php")
?>