<?php 

function enviar($nombre_usuario,$descripcion,$edad,$nombre) {
  if ($edad < 18) {
  	include("_menores.html");
  } else {
  	include("_mayores.html");
  }
  
}
  

?> 