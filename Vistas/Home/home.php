<!DOCTYPE html>
<html>
<?php 
    session_start();
    if(!$_SESSION['nombre']){
        header("Location:../Login/index.php");
        session_destroy();
    } 
    require_once "../../Controladores/widgets/widgetRequires.php";
    prepararComponentes("../../");
?>
<body>
    <div class="main fixFlow">
        <?php 
        require_once '../../ADO/Conexion.php';
        require_once '../../ADO/ADOUsuarios.php';
            ADOUsuarios::getUsers();
        ?>
    </div>
        <!--<div class="titulo fs25">Cuenta</div>
        <div class="txt_box mw500">
            <div class="titulo mt25">Listado de Pedidos</div>
            <div class="hint">Parece que no has realizado pedidos.</div>
            <input type="text" placeholder="No. Pedido ej: AB-1452">
        </div>
        <div class="txt_box mw500">
            <div class="titulo mt25">Direcciones de envio</div>
            <div class="row fixFlow">
                <input type="text" placeholder="Buscar Direccion">
                <button type="submit" class="boton top-bottom">Direcciones</button>
            </div>
        </div>-->
        <!-- Pare cierre de sesion... 
        <button type="submit" class="boton top-bottom" onclick="redir('')">Cerrar Session</button>-->
    </div>
    <footer>Footer</footer>
    <script>
        var boton = document.createElement("li");
        boton.className = "item";
        boton.appendChild(document.createTextNode("Cerrar Sesión"));
        boton.addEventListener('click',function(){
            redir("../../Controladores/Usuarios/closeSession.php");
        });
        document.querySelector('.menu').children[1].appendChild(boton);
    </script>
</body>
</html>