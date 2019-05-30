<body>
    <div class="main col sc fixFlow">
        <h1>Home</h1>
        <h3>User</h3>
        <?php
            require_once 'ADO/Conexion.php';
            require_once 'ADO/ADOUsuarios.php';
            require_once 'Modelos/Usuario.php';
            
            Usuario::getUserComp(ADOUsuarios::getUserInfo($_SESSION['id']));
            Usuario::getUser(ADOUsuarios::getUserInfo($_SESSION['id']));
        ?>
    </div>
    <script>
        main();
        menuUsuario();
    </script>
</body>