
<?php 
 session_start();
 require_once("util.php"); 
if (isset($_POST["autor"])) {
        $_POST["autor"] = htmlspecialchars($_POST["autor"]);
        echo $_POST["autor"];
   } 

  if (isset($_POST["genero"])) {
        $_POST["genero"]= htmlspecialchars($_POST["genero"]);
        echo $_POST["genero"];
   } 
  if (isset($_POST["nombre"])) {
        $_POST["nombre"]= htmlspecialchars($_POST["nombre"]);
        echo $_POST["nombre"];
   } 

  
 
  if(isset($_POST["genero"]) && isset($_POST["autor"]) && isset($_POST["nombre"]) ) {
      if (insertar_cancion($_POST["nombre"],$_POST["genero"], $_POST["autor"]  ) ) {
          echo "se registro el caso";
          $_SESSION["mensaje"] = "Se registró el caso";
      } else {
          $_SESSION["warning"] = "Ocurrió un error al registrar el caso";
      }
  }


  header("location:index.php");
 ?>
