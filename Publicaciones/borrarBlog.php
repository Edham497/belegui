<?php
    error_reporting(E_ALL);
	ini_set('display_errors', '1');

    require_once '../ADO/Conexion.php';

    $con = Conexion::getConn();
    $statement = $con->prepare("DELETE FROM publicaciones WHERE idPublicaciones = :id");
    $statement->bindParam(":id",$_GET['id']);
    $statement->execute();

    header("Location:/Blog.php");
?>