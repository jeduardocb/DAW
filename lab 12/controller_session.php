<?php 
  session_start();

  include("_header.html");  
 $_SESSION["nombre"] = $_POST["nombre"];
  if( isset($_SESSION["nombre"])) {
  	  
  	 echo "<div>
        <h1>Bienvenido:". $_SESSION["nombre"]."</h1>
    </div>";
  	echo '<a href="controller_salir.php">Salir</a>';
  } else{
    echo "Por favor inicia sesión.";
  }
  

  include("_footer.html"); 
?> 