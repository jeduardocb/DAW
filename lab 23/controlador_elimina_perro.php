<?php
    session_start();
    require_once "util.php";

    $perro = check($_POST,"idperro");
    $result = eliminar_perro($perro);
    echo $result;
?>
