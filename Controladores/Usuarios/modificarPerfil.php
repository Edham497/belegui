<?php	
	require_once '../../ADO/Conexion.php';
	require_once '../../ADO/ADOUsuarios.php';

	session_start();

    //echo $_POST['nombre'];
    if(isset($_GET['id']) && $_GET['id']){
        ADOUsuarios::updateUser($_GET['id'], $_POST['nick'], $_POST['nombre'], $_POST['app'], $_POST['apm'], $_POST['nt'], $_POST['sx'], $_POST['mail']);
        header("Location:/administrar_usuario.php?id=". $_GET['id']);
    }
    else{
        ADOUsuarios::updateUser($_SESSION['id'], $_POST['nick'], $_POST['nombre'], $_POST['app'], $_POST['apm'], $_POST['nt'], $_POST['sx'], $_POST['mail']);
        header("Location:/perfil.php");
    }

    
?>