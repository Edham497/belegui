<body>
    <div class="main col sc fixFlow">
        <h1 style="flex:0">Usuarios del Sistema</h1>
        <div class="container">
            <div class="descripcion">
                <div class="desc">Rol</div>
                <div class="desc">Nombre y Correo</div>
                <div class="desc">Editar</div>
            </div>
        </div>
        <div class="container">
        <?php
            require_once 'ADO/Conexion.php';
            require_once 'ADO/ADOUsuarios.php';
            require_once 'Modelos/Usuario.php';
            Usuario::getUsers(ADOUsuarios::getUsers());
        ?>
        </div>
    </div>
</body>