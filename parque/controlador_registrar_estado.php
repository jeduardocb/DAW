    <?php
    session_start();
    require_once("model.php");
    $idn= htmlspecialchars($_GET["nombre"]);
 
    $titulo = "Registra un nuevo estado de ".$idn;
    
    
    include("_header.html");
    include("_formEstado.html");
    
    include("_footer.html");

?>