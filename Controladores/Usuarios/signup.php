<?php
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
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
	//$_SESSION['fecha_nac']			= $_POST['fecha_nac'];
	//$_SESSION['genero']				= $_POST['genero'];
	$_SESSION['nickname']			= $_POST['nickname'];
	$_SESSION['telefono']			= $_POST['telefono'];
	$_SESSION['email']				= $_POST['email'];
	$_SESSION['pass']				= $_POST['pass'];
	$_SESSION['passconfirm']		= $_POST['passconfirm'];
	//$_SESSION['imagen']				= $_POST['imagen'];
	
	//VARIABLE QUE ME CONTROLA EL ESTATUS
	$tipoError="";
	try{
		//AL INGRESAR EL EMAIL DUPLICADO LANZA UN ERROR
		$_SESSION['id'] = ADOUsuarios::insertUser($_SESSION['nombre'], 
												  $_SESSION['apellido_paterno'], 
												  $_SESSION['apellido_materno'],
												  $_SESSION['nickname'],
												  $_SESSION['telefono'],
												  $_SESSION['email'], 
												  $_SESSION['pass']);
												  //$_SESSION['imagen']);
	}catch(PDOException $e){
		session_destroy();
		//DEFINE QUE ESTATUS ES PARA LANZAR UN MENSAJE
		$tipoError="alreadyExist";
		header("Location:../../Vistas/Login/?status=".$tipoError."");
	}
	if($_SESSION['id']) 
		header("Location:../../Vistas/Home/home.php");
	else{
		//EN CASO DE QUE SE HAYA PODIDO INSERTAR SE LANZARA EL OTRO MENSAJE
		if($tipoError==="")
			$tipoError="error";
		header("Location:../../Vistas/Login/?status=".$tipoError."");
	}
?>