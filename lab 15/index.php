<?php 
  	session_start();
    require_once("util.php");  
 	include("_header.html"); 
 	include("_form.html"); 
 	echo "<br>";
 	include("_botones.html"); 


	  if (isset($_POST["autor"])) {
	      $autor = htmlspecialchars($_POST["autor"]);
	      //echo $_POST["autor"];
	  } else {
	      $autor = "";
	  }

	 if (isset($_POST["genero"])) {
	      $nombre_Genero = htmlspecialchars($_POST["genero"]);
	      //echo $_POST["genero"];
	  } else {
	      $nombre_Genero = "";
	  }

	echo consultar_casos($autor,$nombre_Genero);
	include("_preguntas.html"); 
	include("_footer.html"); 

?>




