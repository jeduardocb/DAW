function generarTabla(){
	var numero = prompt("dame un numero");
	var bandera = 1;
//function genera_tabla(numero) {
  // Obtener la referencia del elemento body
  var body = document.getElementsByTagName("body")[0];
 
  // Crea un elemento <table> y un elemento <tbody>
  var tabla   = document.createElement("table");
  var tblBody = document.createElement("tbody");
 
  // Crea las celdas
  for (let i = 1; i <= numero; i++) {
    // Crea las hileras de la tabla
    var hilera = document.createElement("tr");
 
    for (let j = 1; j <= 3; j++) {
      // Crea un elemento <td> y un nodo de texto, haz que el nodo de
      // texto sea el contenido de <td>, ubica el elemento <td> al final
      // de la hilera de la tabla
      var celda = document.createElement("td");
      if(bandera == 1){
      	var textoCelda = document.createTextNode(i);	
      }else if(bandera == 2){
      	var textoCelda = document.createTextNode(Math.pow(i, 2) );	
      }if(bandera == 3){
      	var textoCelda = document.createTextNode(Math.pow(i, 3) );	
      } 

      
      celda.appendChild(textoCelda);
      hilera.appendChild(celda);
      bandera++;
    }
 	bandera = 1;
    // agrega la hilera al final de la tabla (al final del elemento tblbody)
    tblBody.appendChild(hilera);
  }
 
  // posiciona el <tbody> debajo del elemento <table>
  tabla.appendChild(tblBody);
  // appends <table> into <body>
  body.appendChild(tabla);
  // modifica el atributo "border" de la tabla y lo fija a "2";
  tabla.setAttribute("border", "2");
//}

}


function sumaNumeros(){

	let inicial = new Date();
	let numero1 = Math.round(Math.random()*1000);
	let numero2 = Math.round(Math.random()*1000);
	let resultado = prompt("cuanto es la suma de " + numero1 + " + " + numero2);

	if(resultado == numero1 + numero2){
		alert("el resultado es correcto, tu tiempo fue: "+ (new Date - inicial) / 1000 + " segundos");
		
	}else{
		alert("el resultado es incorrecto, tu tiempo fue:  " +(new Date - inicial) / 1000+ " segundos");
	
	}


	

}

function contador(){
	let arreglo = new Array(100);
	let negativos=0;
	let ceros=0;
	let positivos = 0;
	let  numero = 0;

	for(let i=0;i <100 ;i++){
		numero = Math.floor(Math.random() * (100 - (-100)) + (-100))
		arreglo[i]= numero;
		if(numero<0){
			negativos++;
		}else if(numero>0){
			positivos++;
		}else{
			ceros++;
		}
	}
	
	document.write("los numeros negativos son " + negativos 
		+ "  los positivos son " +positivos +  "  los ceros son " + ceros);

} 
function promedios(){

//preguntar al profesor


}

function inverso(){
  var cadena = prompt("Dame numeros");
  while(isNaN(cadena)){
    cadena = prompt("Dame numeros");
  }
  var x = cadena.length;
  var cadenaInvertida = "";

  while (x>=0) {
    cadenaInvertida = cadenaInvertida + cadena.charAt(x);
    x--;
  }
  document.write(cadenaInvertida);
}
	
function libre(){
/*
var miAuto = new Object();
miAuto.marca = "Ford";
miAuto.modelo = "Mustang";
miAuto.año = 1969;
*/





	
}



/*

function Auto(marca, modelo, annio) {
  this.marca = marca;
  this.modelo = modelo;
  this.annio = annio;
}
*/