<?php
    session_start();
    require_once("model.php");  
    $idn = htmlspecialchars($_POST["id"]);
   
    $estado = htmlspecialchars($_POST["tipo"]);
        echo "este es el nombre".$idn ;
        echo  "<br>este es el estado".$estado;

      if(isset($_POST["tipo"]) && isset($_POST["id"])  ) {
          if (insertar_estado($idn , $estado))  {
              $_SESSION["mensaje"] = "Se registró el caso";
          } else {
              $_SESSION["warning"] = "Ocurrió un error al registrar el caso";
          }
      }

      header("location:index.php");
?>