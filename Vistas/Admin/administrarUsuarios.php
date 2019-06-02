<body>
    <div class="main">
        <div class="perfil">
            <div class="tituloPagina">Modificar Perfil</div>
            <div class="contenido">
                <div class="imagenPerfil">
                    <img src="" alt="">
                    <button id="btn1">Mod</button>
                </div>
                <form action="Controladores/Usuarios/modificarPerfil.php" method="post">
                    <div class="info">
                        
                        <?php
                        require_once 'ADO/Conexion.php';
                        require_once 'ADO/ADOUsuarios.php';
                        require_once 'Modelos/Usuario.php';
                        
                        Usuario::getUserComp(ADOUsuarios::getUserInfo($_SESSION['id']));
                        $user = ADOUsuarios::getUserInfo($_GET['id']);
                        ?>
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
                        <label class="label" for="sx">Sexo</label>
                        <input type="text" id="sx" name="sx" class="editInfo off" value="<?php echo $user['genero'] ?>" disabled>
                        <label class="label" for="mail">Correo</label>
                        <input type="text" id="mail" name="mail" class="editInfo off" value="<?php echo $user['email'] ?>" disabled>
                    </div>
                    <div id="botones">

                    </div>
                </form>

            </div>
        </div>
    </div>

    <script>

        var elementos = document.getElementsByClassName("editInfo");
        function switchState(){
            for(let i = 0; i < elementos.length; i++){
                if(elementos[i].classList.contains("on")){
                    elementos[i].classList.replace("on", "off");
                    elementos[i].disabled = true;
                }
                else{
                    elementos[i].classList.replace("off", "on");
                    elementos[i].disabled = false;
                }
            }
        }

        document.getElementById("btn1").addEventListener("click", function(){
            switchState();
            agregarControles();
            this.disabled = true;
        });

        function agregarControles(){
            var contenedorBotones = document.getElementById("botones");
            contenedorBotones.innerHTML = "";
            var submit = document.createElement("input");
            submit.className="botonSimple";
            submit.type = "submit";
            submit.value = "Guardar Cambios";
            contenedorBotones.appendChild(submit);
            submit = document.createElement("div");
            submit.type = "";
            submit.className="botonSimple";
            submit.innerHTML = "Cancelar";
            submit.addEventListener("click", function(){
                turnOff();
                switchState();
                document.getElementById("btn1").disabled = false;
            });
            contenedorBotones.appendChild(submit);
            turnOn();
            
        }

        function turnOn(){
            botones = document.getElementsByClassName("botonSimple");
            setTimeout(function(){
                for(var i = 0; i < botones.length; i++){
                    botones[i].style.opacity = 1;
                }
            },250);
        }
        function turnOff(){
            botones = document.getElementsByClassName("botonSimple");
            for(var i = 0; i < botones.length; i++)
                    botones[i].style.opacity = 0;
            
            setTimeout(function(){
                for(var i = 0; i < botones.length; i++){
                    botones[i].style.display = "none";
                }
            },250);
        }

    </script>
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

.tituloPagina{
    max-width: 800px;
    width: 100%;
    text-align: center;
    font-size: 2em;
    padding-bottom: 15px;
    background: #f3f3f3;
    /*box-shadow: 0px 8px 5px -8px  rgb(0, 0, 0);*/
    margin: 15px auto;
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
    width: 350px;
    height: 250px;
    background: rgb(61, 61, 61);
}
.imagenPerfil button{
    position: absolute;
    border: none;
    right: 0;
    width: 35px;
    height: 35px;
    margin: 10px;
    border-radius: 5px;
    transition: .15s ease-in-out;
    cursor: pointer;
}
#botones{
    display: grid;
    grid-template-columns: auto;
    grid-template-rows: 25px 25px;
    grid-gap: 25px;
    padding: 25px 0;
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
    grid-template-columns: auto 60%;
    grid-auto-rows: 25px;
    grid-gap: 10px;
    position: absolute;
    right: 0;
    top: 0;
    padding: 1em 1.5em !important;
    width: calc(100% - 350px);
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

@media (max-width: 720px){
    .contenido{
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .imagenPerfil{
        width: 300px;
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