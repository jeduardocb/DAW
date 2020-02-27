function validarAcceso(){
  //recuperar datos de contrasena 1 y la 2 
  let contra1 = document.getElementById("contra1").value;
  let contra2 = document.getElementById("contra2").value;
  let espacios = 0;
  let cont = 0;
  let mayuscula = false;
  let numeros =false;
  let largo =false;
  console.log("verificando");
  //verificar letra por letra si hay espacios, si hay mayusculas y si hay numeros, y tambien mayusculas
	while (espacios != 1 && (cont < contra1.length)) {
		let letra=contra1.charAt(cont);
    if (contra1.charAt(cont) == " "){
			espacios = 1;
    }
    if (letra == letra.toUpperCase()){
      mayuscula =true;
    }
    console.log("es "+isNaN(letra));
    if (!isNaN(letra)){
      numeros =true;
    }
    
		cont++;
	}
   //si hay espacios alertas
  if (espacios == 1) {
   alert ("La contraseña no puede contener espacios en blanco");
  }
  //poner en rojo si no hay mayusculas
  if(!mayuscula){
    document.getElementById("mayuscula").style.color = "red";
  }  else{

    document.getElementById("mayuscula").style.color = "black";
 
  }
  //si no hay un numero colorear
  if(!numeros){
    document.getElementById("numero").style.color = "red";
  } else{
    document.getElementById("numero").style.color = "black";

  }

  //si es menor que 8 colorear en rojo
  if (contra2.length < 8 && contra1.length < 8  ){
   document.getElementById("caracteres").style.color = "red";
  }else{
    document.getElementById("caracteres").style.color = "black";
    largo =true;
    
  } 
  //si no ha escrito nada escribir algo, mandar alerta
  if (contra1.length == 0 ) {
   alert("Escribe algo en escrir contrasena");
  }
  if (contra2.length == 0) {
   alert("Escribe algo en escrir  verificar contrasena");
  }
  
   
   //verificar si todo esta correcto
  if (contra1 == contra2 && largo && mayuscula && numeros) {
   alert("Bienvenido");
  document.getElementById("caracteres").style.color = "black";
  document.getElementById("mayuscula").style.color = "black";
  document.getElementById("numero").style.color = "black";
   
  } else if (contra1.length != 0 && contra2.length != 0 && (contra1 != contra2 )){
  alert("No son iguales las contrasenas");
  }

 }
// -------------------carrito------------------------------------------------------------------

//variables globales
var agregado = 0;
var total = 0;

//agregar chamarra a tabla
function agregar_chamarra(){
  total += 500;
  let iva = 500.0*.16;
  document.getElementById("tabla").innerHTML +='<tbody><td>Chamarra</td><td>$500 </td><td>$'+ iva +'</td> </tbody>';
  actualizar_total();
  
}

//agregar sudadera a tabla
function agregar_sudadera(){
  total += 400;
  let iva = 400.0*.16;
  document.getElementById("tabla").innerHTML +='<tbody><td>Sudadera</td><td>$400 </td><td>$'+ iva +'</td> </tbody>';
  actualizar_total();
  
}
//agregar chaleco a tabla
function agregar_chaleco(){
  total += 300;
  let iva = 300.0*.16;
  document.getElementById("tabla").innerHTML +='<tbody><td>Chaleco</td><td>$300 </td><td>$'+ iva +'</td> </tbody>';
  actualizar_total();
  
}
//actualizar la tabla
function actualizar_total(){

  document.getElementById("total").innerHTML=total;
 
}



function verificar(){
  let aciertos =0;
  //verificar si las preguntas son correctas y si lo son aumentar aciertos
  if(1910 == document.getElementById("revolucion").value){
    aciertos++;
  }
  if(10 == document.getElementById("multiplicacion").value){
    aciertos++;
  }
  if("cer" == document.getElementById("silaba").value){
    aciertos++;
  }
  if(5 == document.getElementById("manzanas").value){
    aciertos++;
  }
  if(32 == document.getElementById("estados").value){
    aciertos++;
  }

  //alertas de aciertos
  if(aciertos== 5){
    alert("Felicidades Acertaste Todas las preguntas");  
  }else{
    alert("Tuviste "+aciertos + " aciertos");
  }
  
}