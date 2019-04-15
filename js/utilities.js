function $(id){
  return document.querySelector(id);
}
//anti clickjacking, evita que sobrepongan una pagina maliciosa
if(top!=window)
{
  top.location=window.location;
}

window.onload = function() {
  // Carga completa
  $('#carga').style.display = "none";
}