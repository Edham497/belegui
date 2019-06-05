
<body>
    <div class="main">
        <div class="perfil">
            <div class="grid">
                <div class="tituloPagina">Perfil</div>
                <button id="btn1" class="editbtn">Editar Informacion</button>
            </div>
            <div class="contenido">
                <div class="imagenPerfil">
                    <?php
                    if($user['imagen'])
                        echo "<img src='../img/".$user['imagen']."' style='width: 100%'>"
                    ?>
                    
                </div>
                <form action="Controladores/Usuarios/modificarPerfil.php" method="post">
                    <div class="info">
                        <label class="label" for="nick">NickName</label>
                        <input type="text" id="nick" name="nick" class="editInfo off" value="<?php echo $user['nickname'] ?>" disabled>
                        <label class="label" for ="nombre">Nombre(s)</label>
                        <input type="text" id="nombre" name="nombre" class="editInfo off" value="<?php echo $user['nombre'] ?>" disabled>
                        <label class="label" for="app">Ap. Paterno</label>
                        <input type="text" id="app" name="app" class="editInfo off" value="<?php echo $user['apellido_paterno'] ?>" disabled>
                        <label class="label" for="apm">Ap. Materno</label>
                        <input type="text" id="apm" name="apm" class="editInfo off" value="<?php echo $user['apellido_materno'] ?>" disabled>
                        <label class="label" for="nt">No. Telefono</label>
                        <input type="text" id="nt" name="nt" class="editInfo off" value="<?php echo $user['telefono'] ?>" disabled>
                        <label class="label" for="sx">Genero</label>
                        <input type="text" id="genero" name="genero" class="editInfo off" value="<?php echo $user['genero'] ?>" disabled>
                        <label class="label" for="mail">Correo</label>
                        <input type="text" id="mail" name="mail" class="editInfo off" value="<?php echo $user['email'] ?>" disabled>
                    </div>
                    <div id="botones">

                    </div>
                </form>

            </div>
        </div>
    </div>
    <script src="js/perfil.js"></script>
<style>
.main{
    padding: 25px;
    padding-top:50px;
    flex-grow: 1;
    flex-shrink: 1;
    flex-basis: 0%;
    -webkit-box-flex: 1;
}
.perfil{
    display: flex;
    flex-direction: column;
    flex: 1;
}
.perfil .grid{
    padding:20px;
    margin: 15px auto;
    display:flex;
    justify-content: space-around;
    max-width: 800px;
    width: 100%;
}
.tituloPagina{
    text-align: center;
    font-size: 2em;
}

.editbtn{
    background:white;
    padding:5px 10px;
    text-transform: uppercase;
    border-radius: 5px;
    transition: .15s ease-in-out;
    cursor: pointer;
}

.contenido{
    margin: 0 auto;
    width: 100%;
    min-width: 250px;
    max-width: 750px;
    background: white;
    position: relative;

}
.imagenPerfil{
    position: relative;
    top: 0;
    left: 0;
    min-width:300px;
    width:100%;
    max-width: 450px;
    height: 250px;
    background: rgb(61, 61, 61);
    display:flex;
    align-items:center;
}
#botones{
    display: grid;
    grid-template-columns: auto;
    grid-template-rows: 25px 25px;
    grid-gap: 25px;
    padding: 0;
    height:0;
}
.botonSimple{
    display:flex;
    justify-content:center;
    align-items:center;
    opacity: 0;
    margin: 0 auto;
    width: 100%;
    max-width: 450px;
    height: 35px;
    border: solid 1px #222326;
    border-radius: 5px;
    transition: .15s ease-in-out;
    cursor: pointer;
    transition: .5s;
}
.imagenPerfil button:hover, .botonSimple:hover{
    background: #222326;
    color:white;
}

.info{
    display: grid;
    grid-template-columns: 120px auto;
    grid-auto-rows: 25px;
    grid-gap: 10px;
    justify-content:center;
    position: absolute;
    right: 0;
    top: 0;
    width: calc(100% - 500px);
    font-size: 22px !important;
}
.info >label, .editInfo{
    font-size: 16px !important;
}

.editInfo{
    border: none;
    padding: 5px;
    border-radius: 5px;
    border:none !important;
}

footer{
    background: #1f64b3;
    padding: 50px 20px;
    width: 100%;
    color:white;
}

.on{
    border: solid 1px #666 !important;
    background: #f3f3f3;
}
.off{
    border:solid 1px white;
    background: var(--gb_lgray);
}

@media (max-width: 800px){
    .perfil .grid,
    .contenido{
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .info{
        width: 100%;
        padding: 5px;
        padding-top: 25px !important;
        position: initial;
    }
    .contenido form{
        width: 100%;
    }
}
    </style>
</body>