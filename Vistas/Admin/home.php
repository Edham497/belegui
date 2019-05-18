<body>
    <div class="main col sc fixFlow">
        <h1>CU07 | Usuarios del Sistema</h1>
        <br>
        <div class="container">
            <div class="descripcion">
                <div class="desc">Rol</div>
                <div class="desc">Nombre y Correo</div>
                <div class="desc">Eliminar</div>
            </div>
        </div>
        <div class="container">
        <?php
            require_once 'ADO/Conexion.php';
            require_once 'ADO/ADOUsuarios.php';
            require_once 'Modelos/Usuario.php';
            Usuario::getUserComp(ADOUsuarios::getUserInfo($_SESSION['id']));
            Usuario::getUsers(ADOUsuarios::getUsers());
            for($i =0; $i < 50; $i++)
                Usuario::getUser(ADOUsuarios::getUserInfo($_SESSION['id']));
        ?>
        </div>
    </div>
    <script>
        main();
        menuAdmin();
    </script>
</body>