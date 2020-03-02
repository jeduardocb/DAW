//cada segundo se ejecuta setalign
setInterval(setAlign, 1000);
 //cambiar de color el titulo del documento y tambien cambiar el alineado cada segundo
function setAlign() {
  let titulo = document.getElementById("titulo");
  titulo.style.backgroundColor = titulo.style.backgroundColor == "blue" ? "red" : "blue";
  titulo.style.textAlign  = titulo.style.textAlign  == "left" ? "right" : "left";
  
}
//cuando se haga un mouseover alertar y poner un timeout para que cambie a negro



function hacer_over(){
  let preguntas=document.getElementById("preguntas");
  let hola=document.getElementById("hola");

  let imagen=document.getElementById("imagen1");
  imagen.width= 200;
  imagen.height= 100;
  hola.width= 200;
  hola.height= 100;
  hola.style.visibility = "visible";
  preguntas.style.textDecoration = "line-through";

  alert("El logo tanto el texto cambiaran de forma y en 3 segundos volvera a la normalidad");
  setTimeout(function(){
    preguntas.style.textDecoration = "none";
    imagen.width= 100;
    imagen.height= 50;
    hola.style.visibility = "hidden";
   }, 3000);
  
}

/*--------------drag and drop -----------*/
function allowDrop(ev) {
  ev.preventDefault();
}

function drag(ev) {
  ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
  ev.preventDefault();
  var data = ev.dataTransfer.getData("text");
  ev.target.appendChild(document.getElementById(data));
}