
<?php 
 session_start();
 require_once("util.php"); 

  if (isset($_POST["nombre"])) {
        $_POST["nombre"] = htmlspecialchars($_POST["nombre"]);
        
   } 
    if (isset($_POST["cancion"])) {
        $_POST["cancion"] = htmlspecialchars($_POST["cancion"]);
        
   } 


  if(isset($_POST["nombre"]) &&  isset($_POST["cancion"])) {
      if (editar_Cancion($_POST["nombre"], $_POST["cancion"] ) ) {
          echo "se edito el caso";
          $_SESSION["mensaje"] = "Se edito el caso";
      } else {
          $_SESSION["warning"] = "Ocurrió un error al registrar el caso";
      }
  }


  header("location:index.php");
 ?>
