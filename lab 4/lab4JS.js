function generarTabla(){
	var numero = prompt("dame un numero");
   while(isNaN(numero)){
    numero = prompt("Dame numeros");
  }

	var bandera = 1;

  var body = document.getElementsByTagName("body")[0];
 
  var tabla   = document.createElement("table");
  var tblBody = document.createElement("tbody");
 
  for (let i = 1; i <= numero; i++) {
   
    var filas = document.createElement("tr");
 
    for (let j = 1; j <= 3; j++) {
      var celda = document.createElement("td");
      if(bandera == 1){
      	var textoCelda = document.createTextNode(i);	
      }else if(bandera == 2){
      	var textoCelda = document.createTextNode(Math.pow(i, 2) );	
      }if(bandera == 3){
      	var textoCelda = document.createTextNode(Math.pow(i, 3) );	
      } 
      celda.appendChild(textoCelda);
      filas.appendChild(celda);
      bandera++;
    }
  	bandera = 1;
    
    tblBody.appendChild(filas);
  }
 
  tabla.appendChild(tblBody);
  body.appendChild(tabla);
  
  tabla.setAttribute("border", "3");

  console.log("capturado");

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


	
  console.log("capturado");

}

function generarArreglo(){
  let arreglo = new Array(100);
  let  numero = 0;

  for(let i=0;i <100 ;i++){
    numero = Math.floor(Math.random() * (100 - (-100)) + (-100));
    arreglo[i]= numero;
  }
  return arreglo;
}

function contador(arreglo=generarArreglo()){
	
	let negativos=0;
	let ceros=0;
	let positivos = 0;
	let  numero = 0;

	for(let i=0;i <100 ;i++){
		numero=arreglo[i];
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



function promedios(matriz){

  let arregloPromedio =  [0,0,0,0];

  for(let i = 0; i < 4; i++){
    for( let j = 0; j < 4; j++){

      arregloPromedio[i] = arregloPromedio[i]+ matriz[i][j];
    }
    arregloPromedio[i] =arregloPromedio[i] / 4;
  }


    document.write("posicion 0 =" + Math.floor(arregloPromedio[0]));
    document.write("  posicion 1 =" + Math.floor(arregloPromedio[1]));
    document.write("  posicion 2 =" + Math.floor(arregloPromedio[2]));
    document.write("  posicion 3 =" + Math.floor(arregloPromedio[3]));

  


}

function pedirNumero(){
var cadena = prompt("Dame numeros");
  while(isNaN(cadena)){
    cadena = prompt("Dame numeros");
  }
  return cadena;
}
function inverso(cadena = pedirNumero()){
  
  var x = cadena.length;
  var cadenaInvertida = "";

  while (x>=0) {
    cadenaInvertida = cadenaInvertida + cadena.charAt(x);
    x--;
  }
  document.write(cadenaInvertida);
}
	

 function Paciente(nombre,edad,peso){
    this.nombre=nombre;
    this.edad=edad;
    this.peso=peso;
  } 
function libre(){
  let nombrecapturado = document.getElementById("nombre").value;
  let edadcapturado = document.getElementById("edad").value;
  let pesocapturado = document.getElementById("peso").value;
  
  nuevoPaciente = new Paciente(nombrecapturado,edadcapturado,pesocapturado); 
  
 agregarPaciente(nuevoPaciente);
}

 
  function agregarPaciente(nuevo){
  let datosPacientes = []; 
  datosPacientes.push(nuevo);
  
  console.log(datosPacientes);

  document.getElementById("tabla").innerHTML +='<tbody><td>'+ nuevo.nombre +'</td><td>'+nuevo.edad+'</td><td>'+nuevo.peso +'</td> </tbody>';
  
  }





//codigo para darne una idea de los objetos
/*
var miAuto = new Object();
miAuto.marca = "Ford";
miAuto.modelo = "Mustang";
miAuto.año = 1969;
*/

/*

function Auto(marca, modelo, annio) {
  this.marca = marca;
  this.modelo = modelo;
  this.annio = annio;
}
*/