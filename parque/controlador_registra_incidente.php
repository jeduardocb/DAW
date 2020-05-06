<?php
    session_start();
    require_once("model.php"); 
    $titulo = "Registra un nuevo caso";
    include("_header.html");
    include("_formIncidente.html");
    include("_footer.html");

?>