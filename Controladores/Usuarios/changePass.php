<?php
    error_reporting(E_ALL);
	ini_set('display_errors', '1');
	require_once '../../ADO/Conexion.php';
    require_once '../../ADO/ADOUsuarios.php';
    
    session_start();

    $_SESSION['email']				= $_POST['email'];
	$_SESSION['pass']				= $_POST['pass'];
    $_SESSION['passconfirm']		= $_POST['passconfirm'];
    
    header("Location: ../Correo/changePassCorreo.php");
?>