
<div class="main col sc">
    <form action="../Controladores/Usuarios/changePass.php" class="formulario" method="post">
        <div class="titulo">Cambio de Contraseña</div>
        <div class="txt_box">
            <input type="text" placeholder="Correo" name="email"required>
        </div>
        <div class="txt_box">
            <input type="password" placeholder="Contraseña" name="pass"required>
        </div>
        <div class="txt_box">
            <input type="password" placeholder="Confirmar Contraseña" name="passconfirm"required>
        </div>
        <button type="submit" class="boton centerV">Confirmar</button>
    </form>
</div>