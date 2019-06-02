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
    contenedorBotones = document.getElementById("botones");
    contenedorBotones.innerHTML = "";
    contenedorBotones.style.padding = "25px 0";
    contenedorBotones.style.height = "inherit";
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
        contenedorBotones.style.padding = "0";
    contenedorBotones.style.height = "0";
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