<?php

	require_once '../../ADO/Conexion.php';
	require_once '../../ADO/ADOUsuarios.php';

	//$id = false
	
	//$nombre 			= $_POST['nombre'];
	//$apellido_paterno = $_POST['apellido_paterno'];
	//$apellido_materno = $_POST['apellido_materno'];
	//$fecha_nac        = $_POST['fecha_nac']; 
	//$genero           = $_POST['genero']; 
	//$telefono         = $_POST['telefono']; 
	//$email            = $_POST['email'];      
	//$pass             = $_POST['pass'];   
	//$passconfirm      = $_POST['passconfirm'];   
	//$imagen           = $_POST['imagen'];    

	//$mensaje = ADOUsuarios::insertUser($nombre, $apellido_paterno, $apellido_materno, $fecha_nac, $genero, $telefono, $email, $pass, $imagen);
	
	//Implementanto variable de Sesion
	$_SESSION['id'] = false;
	
	session_start();
	$_SESSION['nombre']				= $_POST['nombre'];
	$_SESSION['apellido_paterno']	= $_POST['apellido_paterno'];
	$_SESSION['apellido_materno']	= $_POST['apellido_materno'];
	$_SESSION['fecha_nac']			= $_POST['fecha_nac'];
	$_SESSION['genero']				= $_POST['genero'];
	$_SESSION['telefono']			= $_POST['telefono'];
	$_SESSION['email']				= $_POST['email'];
	$_SESSION['pass']				= $_POST['pass'];
	$_SESSION['passconfirm']		= $_POST['passconfirm'];
	$_SESSION['imagen']				= $_POST['imagen'];

	$_SESSION['id'] = ADOUsuarios::insertUser($_SESSION['nombre'], $_SESSION['apellido_paterno'], $_SESSION['apellido_materno'],  $_SESSION['email'], $_SESSION['pass']);

	if($_SESSION['id']) 
		header("Location:../../Vistas/Home/home.php");
	else 
		header("Location:../../Vistas/Login/?status=error")
?>