<?php	
	require_once '../../ADO/Conexion.php';
	require_once '../../ADO/ADOUsuarios.php';

	session_start();
    // update table set col = value where

    //echo $_POST['nombre'];

    ADOUsuarios::updateUser($_SESSION['id'], $_POST['nick'], $_POST['nombre'], $_POST['app'], $_POST['apm'], $_POST['nt'], $_POST['sx'], $_POST['mail']);

    header("Location:/perfil.php");

    
?>