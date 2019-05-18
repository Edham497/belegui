
<div class="main col sc">
    <form action="Controladores/Usuarios/login.php" class="formulario" method="post">
        <div class="titulo">Iniciar Sesión</div>
        <p class="hint">Inicia sesion con tu correo, usuario o numero de telefono. <br> Si aun no tienes cuenta <a href="/registro.php" style="color:inherit;">Registrate</a></p>
        <div class="txt_box">
            <input type="text" placeholder="Correo, Usuario o Numero de telefono"name="correo" required>
        </div>
        <div class="txt_box">
            <input type="password" placeholder="Contraseña" name="contraseña"required>
            <a href="#" class="fPass">¿Olvido su contraseña?</a>
        </div>
        <button type="submit" class="boton centerV">Iniciar Sesión</button>
    </form>
</div>

