<?php 
  	session_start();
    require_once("util.php");  
 	include("_header.html"); 
 	
 	include("_form.html"); 

	  if (isset($_POST["nombre_Cancion"])) {
	      $nombre_Cancion = htmlspecialchars($_POST["nombre_Cancion"]);
	  } else {
	      $nombre_Cancion = "";
	  }

	 if (isset($_POST["nombre_Genero"])) {
	      $nombre_Genero = htmlspecialchars($_POST["nombre_Genero"]);
	  } else {
	      $nombre_Genero = "";
	  }

	echo consultar_casos($nombre_Cancion,$nombre_Genero);
	include("_preguntas.html"); 
	include("_footer.html"); 

?>




