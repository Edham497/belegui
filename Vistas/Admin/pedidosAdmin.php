
<body>
    <div class="main col sc fixFlow">
        <h1 style="flex:0; padding-bottom:25px">Pedidos generales</h1>
        <div class="container">
            <table>
                <td>
                    <div class="desc">Usuario</div>
                </td>
                <td>
                    <div class="desc">Nombre del producto</div>
                </td>
                <td>
                    <div class="desc">Fecha del pedido</div>
                </td>
                <td>
                    <div class="desc">Eliminar</div>
                </td>
            </table>
            <div class="container">
            <?php
            require_once 'ADO/Conexion.php';
            require_once 'ADO/ADOPedidos.php';
            require_once 'ADO/ADOUsuarios.php';
            require_once 'Modelos/Usuario.php';
                Usuario::getUserComp(ADOUsuarios::getUserInfo($_SESSION['id']));
                Usuario::getUsersPedidos(ADOPedidos::getUsersPedidos());
            ?>
            </div>
        </div>
    </div>
</body>