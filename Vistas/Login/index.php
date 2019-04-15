<!DOCTYPE html>
<html>
<?php
    session_start();
    if($_SESSION['nombre']) 
        header("Location:../Home/home.php");
    else
        session_destroy();

    require_once "../../Controladores/widgets/widgetRequires.php";
    prepararComponentes("../../");
    

    /*require_once "../../widgets/head.php";
    getHead("../../");
    require_once "../../widgets/header.php";
    getHeader(null);
    require_once "../../widgets/menu.php";
    getMenu("../../");*/
?>
<body>
    <div class="main row sc fixFlow">
        <form action="../../Controladores/Usuarios/login.php" class="formulario" method="post">
            <div class="titulo">Iniciar Sesión</div>
            <p class="hint">Inicia sesion con tu correo, usuario o numero de telefono</p>
            <div class="txt_box">
                <input type="text" placeholder="Correo" name="correo">
            </div>
            <div class="txt_box">
                <input type="password" placeholder="Contraseña" name="contraseña">
                <a href="#">¿Olvido su contraseña?</a>
            </div>
            <input type="submit" class="boton" value="Iniciar Sesion">
        </form>
        <hr>
        <form action="../../Controladores/Usuarios/signup.php" class="formulario" method="post">
            <div class="titulo">Registrate</div>
            <p class="hint">Registrate para poder acceder a todas las funciones de la pagina</p>
            <div class="txt_box">
                <input type="text" placeholder="Nombre(s)" name="nombre">
            </div>
            <div class="txt_box">
                <input type="text" placeholder="Apellido Paterno" name="apellido_paterno">
            </div>

            <div class="txt_box">
                <input type="text" placeholder="Apellido Materno" name="apellido_materno">
            </div>

            <div class="txt_box">
                <input type="text" placeholder="Correo" name="email">
            </div>
            <div class="txt_box">
                <input type="password" placeholder="Contraseña" name="pass">
            </div>
            <div class="txt_box">
                <input type="password" placeholder="Confirmar contraseña" name="passconfirm">
            </div>
            <input type="submit" class="boton" value="Terminar Registro">
        </form>
    </div>
    <footer>Footer</footer>
</body>
</html>