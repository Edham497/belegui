<!DOCTYPE html>
<html lang="en">

<!--<head>
    <?php include "../../assets/head.html";?>
    <?php include "../../widgets/header.php";?>
    <?php include "../../widgets/menu.php";?>
</head>-->


<?php 
    require_once "../../widgets/head.php";
    getHead("../../");
    require_once "../../widgets/header.php";
    session_start();
    getHeader($_SESSION['nombre']);
?>
<body>
    <div class="main fixFlow">
        <div class="titulo fs25">Cuenta</div>
        <div class="txt_box mw500">
            <div class="titulo mt25">Listado de Pedidos</div>
            <div class="hint">Parece que no has realizado pedidos.</div>
            <input type="text" placeholder="No. Pedido ej: AB-1452">
        </div>
        <div class="txt_box mw500">
            <div class="titulo mt25">Direcciones de envio</div>
            <div class="row fixFlow">
                <input type="text" placeholder="Buscar Direccion">
                <input id="menuBTN" type="button" class="boton" value="Administrar Direcciones">
            </div>

        </div>
    </div>
    <footer>Footer</footer>
</body>
</html>