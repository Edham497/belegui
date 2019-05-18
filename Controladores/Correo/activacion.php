<?php
    error_reporting(E_ALL);
	ini_set('display_errors', '1');
    require_once '../../ADO/Conexion.php';
    require_once '../../ADO/ADOUsuarios.php';

    $id = $_GET['id'];
    
    $confirmacion = ADOUsuarios::confirmEmail($id);
    if($confirmacion)
        header("Location:/");
    else
        echo "<p> ERROR </p>";
?>
