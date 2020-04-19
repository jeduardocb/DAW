<?php
session_start();

require_once("util.php");

$id_Autor = htmlspecialchars($_GET["id_Autor"]);
$nombre_Genero = htmlspecialchars($_GET["nombre_Genero"]);

//echo "autor".$id_Autor ."genero".$nombre_Genero;

echo consultar_casos($id_Autor,$nombre_Genero);
?>