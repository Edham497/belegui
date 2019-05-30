function $(id){
  return document.querySelector(id);
}
//anti clickjacking, evita que sobrepongan una pagina maliciosa
/*if(top!=window)
{
  top.location=window.location;
}*/
/*window.onload = function() {
  // Carga completa
  $('#carga').style.display = "none";
}*/
/*
  set, get, remove attribute
  
  <img src="null"></img>
  .setAttribute("src","img/img.jpg");
  .getAttribute("src");
  .removeAttribute("src");
*/
//Verifica si un elemento existe en la pagina
/*function isInPage(node) {
  return (node === document.body) ? false : document.body.contains(node);
}*/
/*var header = $("header");
var sticky = header.offsetTop;
window.onscroll = ()=>{
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
    $("#menubtn").style.marginTop = "15px";
  } else {
    header.classList.remove("sticky");
    $("#menubtn").style.marginTop = "36px";
  }
}*/
class contenedor {
  constructor(cont) {
    /*var imagenes = $(".imagenes").children;
    var imagenPrincipal = $(".imagenGrande");*/
    this.imagenPrincipal = cont.children[0];
    this.imagenes = cont.children[1].children;
  }

  init = function () {
    this.imagenPrincipal.children[0].setAttribute("src", this.imagenes[0].children[0].getAttribute("src"));
    for (var i = 0; i < this.imagenes.length; i++) {
      this.añadirListener(this.imagenes[i], i);
    }
  }
  switchImg = (e) => {
      this.imagenPrincipal.children[0].setAttribute("src", this.imagenes[e].children[0].getAttribute("src"));
      //imagenPrincipal.children[0].setAttribute("src", "democlass");
  }
  añadirListener = (e, i) => {
    e.addEventListener("click", () => {
      this.switchImg(i);
    });
  }
  
}

var f = new contenedor($("#cont1"));
var gdf =new contenedor($("#cont2"));
f.init();
gdf.init();
