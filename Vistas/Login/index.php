<!DOCTYPE html>
<html>
<?php
    session_start();
    if(isset($_SESSION['nombre'])&&$_SESSION['nombre']) 
        header("Location:../Home/home.php");
    else
        session_destroy();

    require_once "../../Controladores/widgets/widgetRequires.php";
    prepararComponentes("../../");
?>
<body>
    <div class="main row sc fixFlow">
        <form action="../../Controladores/Usuarios/login.php" class="formulario" method="post">
            <div class="titulo">Iniciar Sesión</div>
            <p class="hint">Inicia sesion con tu correo, usuario o numero de telefono</p>
            <div class="txt_box">
                <input type="text" placeholder="Correo" name="correo" required>
            </div>
            <div class="txt_box">
                <input type="password" placeholder="Contraseña" name="contraseña"required>
                <a href="#" class="fPass">¿Olvido su contraseña?</a>
            </div>
            <button type="submit" class="boton top-bottom">Enviar formulario</button>
        </form>
        <hr>
        <form action="../../Controladores/Usuarios/signup.php" class="formulario" method="post">
            <div class="titulo">Registrate</div>
            <p class="hint">Registrate para poder acceder a todas las funciones de la pagina</p>
            <div class="txt_box">
                <input type="text" placeholder="Nombre(s)" name="nombre" required>
            </div>
            <div class="txt_box">
                <input type="text" placeholder="Apellido Paterno" name="apellido_paterno" required>
            </div>

            <div class="txt_box">
                <input type="text" placeholder="Apellido Materno" name="apellido_materno" required>
            </div>

            <div class="txt_box">
                <input type="text" placeholder="Correo" name="email" required>
            </div>
            <div class="txt_box">
                <input type="password" placeholder="Contraseña" name="pass" required>
            </div>
            <div class="txt_box">
                <input type="password" placeholder="Confirmar contraseña" name="passconfirm" required>
            </div>
            <button type="submit" class="boton centerV">Enviar formulario</button>
        </form>
    </div>
    <footer>Footer</footer>
</body>
</html>