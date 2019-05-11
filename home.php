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
            //session_start();
            //ADOUsuarios::getUser($_SESSION['email'],$_SESSION['pass']);
            
        ?>

        <tr>
            <td>
                <form action = "../../Imagenes/subir.php" method = "post" enctype = "multipart/form-data">
                    subir imagen:<input type = "file" name = "imagen">
                    <input type="submit" value="subir">
                </form>
            </td>
            <td>
                <form action = "../../Imagenes/mostrar.php" method = "post" enctype = "multipart/form-data">
                    <input type="submit" value="mostrar">
                </form>
            </td>
            <td>
                <form action="../Usuarios/perfil.php" method="post" enctype="multipart/form-data">
                    <input type="submit" value="perfil">
                </form>
            </td>
        </tr>
        
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
    <footer>Footer</footer>
    <script>
        createMenuItem("<?php session_start();echo $_SESSION['nombre'];?>","/");
        menuUsuario();
    </script>
</body>
</html>