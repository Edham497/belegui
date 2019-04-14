<?php

	require_once '../../ADO/Conexion.php';
	require_once '../../ADO/ADOUsuarios.php';

	$id = false;

	$nombre = $_POST['nombre'];
	$apellido_paterno = $_POST['apellido_paterno'];  
	$apellido_materno = $_POST['apellido_materno'];
	//$fecha_nac        = $_POST['fecha_nac']; 
	//$genero           = $_POST['genero']; 
	//$telefono         = $_POST['telefono']; 
	$email            = $_POST['email'];      
	$pass             = $_POST['pass'];   
	$passconfirm      = $_POST['passconfirm'];   
	//$imagen           = $_POST['imagen'];    

	//$mensaje = ADOUsuarios::insertUser($nombre, $apellido_paterno, $apellido_materno, $fecha_nac, $genero, $telefono, $email, $pass, $imagen);

	$id = ADOUsuarios::insertUser($nombre, $apellido_paterno, $apellido_materno,  $email, $pass);

	if($id)
		header("Location:../../Vistas/Home/home.php?nombre=" . $nombre);

?>