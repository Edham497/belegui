<?php 
require_once 'ADO/Conexion.php';
require_once 'ADO/ADOUsuarios.php';
require_once 'Modelos/Usuario.php';

session_start();

if(isset($_SESSION['id']) && $_SESSION['id'])
    Usuario::getUserComp(ADOUsuarios::getUserInfo($_SESSION['id']));
else
    Usuario::getDefaultUserComp();
?>