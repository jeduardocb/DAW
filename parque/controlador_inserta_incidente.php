<?php
  session_start();
  require_once("model.php");  

    $tipo = htmlspecialchars($_POST["tipo"]);
    $lugar = htmlspecialchars($_POST["lugar"]);

  if($_POST["tipo"] &&  $_POST["lugar"] ) {
      if (insertar_incidente( $lugar , $tipo))  {
          $_SESSION["mensaje"] = "Se registró el caso";
      } else {
          $_SESSION["warning"] = "Ocurrió un error al registrar el caso";
      }
  }

  header("location:index.php");
?>