<?php
    error_reporting(E_ALL);
	ini_set('display_errors', '1');

    require_once '../ADO/Conexion.php';

    $con = Conexion::getConn();
    
    $ruta = "../Imagenes Productos/".$_FILES['imagen']['name'];
    move_uploaded_file($_FILES['imagen']['tmp_name'],$ruta);
    
    $query = "UPDATE productos SET nombre = :nom,  descripcion = :descp, 
                precio = :precio, color = :color,imagen = :img, fecha_insertado = NOW(), 
                idCategoria = :idC  WHERE idProductos = :idP";

    $statement = $con->prepare($query);
    $statement->bindParam(":nom",$_POST['nombre']);
    $statement->bindParam(":descp",$_POST['texto']);
    $statement->bindParam(":precio",$_POST['precio']);
    $statement->bindParam(":color",$_POST['color']);
    $statement->bindParam(":img",$_FILES['imagen']['name']);
    $statement->bindParam(":idC",$_POST['cat']);
    $statement->bindParam(":idP",$_GET['id']);
    
    $statement->execute();

    header("Location:/Catalogo.php");
?>