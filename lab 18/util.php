<?php  
	function conectar_bd(){
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "musica";
		$con = mysqli_connect($servername,$username,$password,$dbname);
		if(!$con){
			die("conexion fallida" .mysqli_connect_error());
		}
		return $con;
	}

	function desconectar_bd($mysql){
		mysqli_close($mysql);
	}
//@param $lugar: El lugar de donde proviene el caso
  //@param $estado: El estado de la infección del caso
  function consultar_casos($id_Autor="", $nombre_Genero="") {
    $conexion_bd = conectar_bd();  
    
    $resultado =  "<table><thead><tr><th>Numero de cancion</th><th>Nombre</th><th>Autor</th><th>Genero</th></tr></thead>";
    
    $consulta = 'Select id_Cancion,nombre_Cancion, nombre_Genero,a.nombre
     From cancion as c,autor as a 
     where c.id_Autor=a.id_Autor';
   if ($id_Autor != "") {
        $consulta .= " AND c.id_Autor=".$id_Autor;
        //echo "<br>la consulta es:".$consulta;
    }
    if ($nombre_Genero != "") {
        $consulta .= " AND c.nombre_Genero='".$nombre_Genero ."'";
        //echo "<br>la consulta es:".$consulta;
    } 
    $resultados = $conexion_bd->query($consulta);  
    while ($row = mysqli_fetch_array($resultados, MYSQLI_BOTH)) {
        $resultado .= "<tr>";
        $resultado .= "<td>".$row['id_Cancion']."</td>"; 
        $resultado .= "<td>".$row['nombre_Cancion']."</td>";
        $resultado .= "<td>".$row['nombre']."</td>";  
        $resultado .= "<td>".$row['nombre_Genero']."</td>"; 
       
        $resultado .= "</tr>";
    }
    
    mysqli_free_result($resultados); //Liberar la memoria
  
    desconectar_bd($conexion_bd);   
      
    $resultado .= "</tbody></table>";
    return $resultado;
  }

      //Crea un select con los datos de una consulta
  //@param $id: Campo en una tabla que contiene el id
  //@param $columna_descripcion: Columna de una tabla con una descripción
  //@param $tabla: La tabla a consultar en la bd
  function crear_select($id, $columna_descripcion, $tabla) {
    $conexion_bd = conectar_bd();  
      
    $resultado = '<div class="input-field"><select name="'.$tabla.'"><option value="" disabled selected>Selecciona una opción</option>';
            
    $consulta = "SELECT $id  , $columna_descripcion  FROM $tabla";
    $resultados = $conexion_bd->query($consulta);
    while ($row = mysqli_fetch_array($resultados, MYSQLI_BOTH)) {
       $resultado .= '<option value="'.$row["$id"].'">'.$row["$columna_descripcion"].'</option>';
    }
        
    desconectar_bd($conexion_bd);
    $resultado .=  '</select><label>'.$tabla.'...</label></div>';
    return $resultado;
  }




  //función para insertar un registro de caso de musica
  //@param nombre_Cancion: nombre de la cancion 
  //@param nombre_Genero: id de la tabla genero en la bd 
  //@param id_Autor: id del autor de la tabla autor en la bd 

  function insertar_cancion($nombre_Cancion,$nombre_Genero,$id_Autor) {
    $conexion_bd = conectar_bd();
      
    //Prepara la consulta
    $dml = 'INSERT INTO cancion (nombre_Cancion,nombre_Genero,id_Autor) VALUES (?,?,?)';
    if ( !($statement = $conexion_bd->prepare($dml)) ) {
        die("Error: (" . $conexion_bd->errno . ") " . $conexion_bd->error);
        return 0;
    }
      
    //Unir los parámetros de la función con los parámetros de la consulta   
    //El primer argumento de bind_param es el formato de cada parámetro
    if (!$statement->bind_param("ssi",$nombre_Cancion,$nombre_Genero,$id_Autor)) {
        die("Error en vinculación: (" . $statement->errno . ") " . $statement->error);
        return 0;
    }
      
    //Executar la consulta
    if (!$statement->execute()) {
      die("Error en ejecución: (" . $statement->errno . ") " . $statement->error);
        return 0;
    }

    desconectar_bd($conexion_bd);
      return 1;
  }


   //función para eliminar una cancion de musica 
  //@param id_Cancion: id del cancion que se va a editar
  function eliminar_cancion($id_Cancion) {
    $conexion_bd = conectar_bd();
      
    //Prepara la consulta
    $dml = 'DELETE FROM cancion  WHERE id_Cancion=(?)';
    if ( !($statement = $conexion_bd->prepare($dml)) ) {
        die("Error: (" . $conexion_bd->errno . ") " . $conexion_bd->error);
        return 0;
    }
      
    //Unir los parámetros de la función con los parámetros de la consulta   
    //El primer argumento de bind_param es el formato de cada parámetro
    if (!$statement->bind_param("i", $id_Cancion)) {
        die("Error en vinculación: (" . $statement->errno . ") " . $statement->error);
        return 0;
    }
      
    //Executar la consulta
    if (!$statement->execute()) {
      die("Error en ejecución: (" . $statement->errno . ") " . $statement->error);
        return 0;
    }

    desconectar_bd($conexion_bd);
      return 1;
  }


   //función para eliminar una cancion de musica 
  //@param id_Cancion: id del cancion que se va a editar
  function editar_Cancion($nombre,$id_Cancion) {
    $conexion_bd = conectar_bd();
      
    //Prepara la consulta
    $dml = 'UPDATE cancion SET nombre_Cancion=(?) WHERE id_Cancion=(?)';
    if ( !($statement = $conexion_bd->prepare($dml)) ) {
        die("Error: (" . $conexion_bd->errno . ") " . $conexion_bd->error);
        return 0;
    }
      
    //Unir los parámetros de la función con los parámetros de la consulta   
    //El primer argumento de bind_param es el formato de cada parámetro
    if (!$statement->bind_param("si",$nombre,$id_Cancion)) {
        die("Error en vinculación: (" . $statement->errno . ") " . $statement->error);
        return 0;
    }
      
    echo $dml;
    //Executar la consulta
    if (!$statement->execute()) {
      die("Error en ejecución: (" . $statement->errno . ") " . $statement->error);
        return 0;
    }

    desconectar_bd($conexion_bd);
      return 1;
  }

?> 