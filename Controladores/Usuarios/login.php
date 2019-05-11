<?php	
	require_once '../../ADO/Conexion.php';
	require_once '../../ADO/ADOUsuarios.php';

	session_start();
	$_SESSION['mensaje'] = false;

	$_SESSION['correo'] = $_POST['correo'];      
	$_SESSION['contraseña'] = $_POST['contraseña'];  

	$_SESSION['nombre'] = ADOUsuarios::getUser($_SESSION['correo'], $_SESSION['contraseña']);
	$_SESSION['id'] = ADOUsuarios::getId($_SESSION['correo'], $_SESSION['contraseña']);

	if($_SESSION['nombre'])
		header("Location:../../Vistas/Home/home.php");
	else{
		session_destroy();
		header("Location:../../Vistas/Login/?status=error");
	}
?>