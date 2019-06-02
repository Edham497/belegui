<div class="main col sc">
    <form action="../../Controladores/Usuarios/signup.php" class="formulario" method="post">
        <div class="titulo">Registrate</div>
        <p class="hint">Registrate para poder acceder a todas las funciones de la pagina. <br> Si ya tienes una cuenta intenta <a href="/login.php" style="color:inherit;">Iniciar Sesion</a></p>
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
            <input type="text" placeholder="nickname" name="nickname" required>
        </div>
        <div class="txt_box">
            <input type="text" placeholder="telefono" name="telefono" required>
        </div>
        <div class="txt_box">
            <input type="email" placeholder="Correo" name="email" required>
        </div>
        <div class="txt_box">
            <input type="password" placeholder="Contraseña" name="pass" required>
        </div>
        <div class="txt_box">
            <input type="password" placeholder="Confirmar contraseña" name="passconfirm" required>
        </div>
        <button type="submit" class="boton centerV">Terminar Registro</button>
    </form>
</div>