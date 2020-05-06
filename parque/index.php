<?php
    session_start();
    require_once("model.php");
    $titulo= "Pagina principal";
    include("_header.html");

    include("_formBuscar.html");

    include("_boton.html");

    if (isset($_POST["lugar"])) {
          $lugar = htmlspecialchars($_POST["lugar"]);
      } else {
          $lugar = "";
      }
    
    echo '<div id="resultados_consulta">';  
    echo consultar_incidentes($lugar);
    echo '</div>';
    include("_footer.html");


?>
 