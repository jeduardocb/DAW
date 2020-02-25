function validarAcceso(){
   
  let contra1 = document.getElementById("contra1").value;
  let contra2 = document.getElementById("contra2").value;
  let espacios = 0;
  let cont = 0;
  console.log("verificando");
	while (espacios != 1 && (cont < contra1.length)) {
		if (contra1.charAt(cont) == " "){
			espacios = 1;
    }
		cont++;
	}
   
  if (espacios == 1) {
   alert ("La contraseña no puede contener espacios en blanco");
   return false;
  }
   
  if (contra1.length == 0 ) {
   alert("Escribe algo en escrir contrasena");
  }
   if (contra2.length == 0) {
   alert("Escribe algo en escrir  verificar contrasena");
  }
   
   
  if (contra1 == contra2) {
   alert("Bienvenido");
  } else {
  alert("No son iguales las contrasenas");
  }

 }
// -------------------carrito------------------------------------------------------------------



