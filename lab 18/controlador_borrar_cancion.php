
<?php 
 session_start();
 require_once("util.php"); 

  if(isset($_POST["cancion"])  ) {
      if (eliminar_cancion( $_POST["cancion"]  ) ) {
          echo "se registro el caso";
          $_SESSION["mensaje"] = "Se elimino el caso";
      } else {
          $_SESSION["warning"] = "Ocurrió un error al registrar el caso";
      }
  }
  header("location:index.php");
 ?>
