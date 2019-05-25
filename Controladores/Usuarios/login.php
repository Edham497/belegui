<?php	
	require_once '../../ADO/Conexion.php';
	require_once '../../ADO/ADOUsuarios.php';

	session_start();
	$_SESSION['mensaje'] = false;

	$_SESSION['correo'] = $_POST['correo'];      
	$_SESSION['contraseña'] = $_POST['contraseña']; 

	$row = ADOUsuarios::getUser($_SESSION['correo'], $_SESSION['contraseña']);
	$_SESSION['id'] = $row['idUsuarios'];

	if($_SESSION['id']){
		header("Location:/");
		//Esto es para pruebas, aqui hay que obtener el rol
		$_SESSION['rol'] = $row['idRol'];
	}
	else{
		session_destroy();
		header("Location:/login.php?status=error");
	}
?>