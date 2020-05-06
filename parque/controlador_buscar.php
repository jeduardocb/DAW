

<?php
    session_start();
    require_once("model.php");
    $lugar = htmlspecialchars($_POST["lugar"] );

   // echo "lugar".$lugar;
    echo consultar_incidentes($lugar);
    
?>