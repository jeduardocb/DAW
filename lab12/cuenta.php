<?php 
	require_once("util.php");

  if ( !(isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["correo"])
	&& isset($_POST["nombre_usuario"]) && isset($_POST["descripcion"]) 
 	&& isset($_POST["password"]) && isset($_POST["edad"]) )) {
    die();
  }


	//$imagen = "images/" . $_FILES["imagen"]["name"];
 // $imagen = htmlspecialchars($_POST["imagen"]);
  $nombre = htmlspecialchars($_POST["nombre"]);
  $apellido = htmlspecialchars($_POST["apellido"]);
  $correo = htmlspecialchars($_POST["correo"]);
  $nombre_usuario = htmlspecialchars($_POST["nombre_usuario"]);
  $descripcion = htmlspecialchars($_POST["descripcion"]);
  $password = htmlspecialchars($_POST["password"]);
  $edad = htmlspecialchars($_POST["edad"]);

  include("_header.html");  

  enviar($nombre_usuario,$descripcion,$edad,$nombre);

  include("_footer.html"); 








 ?>