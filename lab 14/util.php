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
  function consultar_casos($nombre_Cancion="", $nombre_Genero="") {
    $conexion_bd = conectar_bd();  
    
    $resultado =  "<table><thead><tr><th>Nombre</th><th>Genero</th></tr></thead>";
    
    $consulta = 'Select nombre_Cancion, nombre_Genero From cancion ';
   if ($nombre_Cancion != "") {
        $consulta .= " AND nombre_Cancion=".$nombre_Cancion;
    }
    if ($nombre_Genero != "") {
        $consulta .= " AND nombre_Genero=".$nombre_Genero;
    } 
    $resultados = $conexion_bd->query($consulta);  
    while ($row = mysqli_fetch_array($resultados, MYSQLI_BOTH)) {
        $resultado .= "<tr>";
        $resultado .= "<td>".$row['nombre_Cancion']."</td>"; 
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
            
    $consulta = "SELECT $id, $columna_descripcion FROM $tabla";
    $resultados = $conexion_bd->query($consulta);
    while ($row = mysqli_fetch_array($resultados, MYSQLI_BOTH)) {
    	echo "<h5>jajaj</h5>";
       $resultado .= '<option value="'.$row["$id"].'">'.$row["$columna_descripcion"].'</option>';
    }
        
    desconectar_bd($conexion_bd);
    $resultado .=  '</select><label>'.$tabla.'...</label></div>';
    return $resultado;
  }
/*
  //@param $lugar: El lugar de donde proviene el caso
  //@param $estado: El estado de la infección del caso
  function consultar_casos($lugar="", $estado="") {
    $conexion_bd = conectar_bd();  
    
    $resultado =  "<table><thead><tr><th>Caso</th><th>Lugar</th><th>Estado actual</th><th>Fecha y hora</th></tr></thead>";
    
    $consulta = 'Select caso_id, L.nombre as L_nombre, E.nombre as E_nombre, T.created_at as T_created_at From Estado as E, Tiene as T, Lugar as L, caso as C WHERE E.id = T.estado_id AND C.id = T.caso_id AND C.lugar_id = L.id';
    if ($lugar != "") {
        $consulta .= " AND lugar_id=".$lugar;
    }
    if ($estado != "") {
        $consulta .= " AND estado_id=".$estado;
    }
      
    $resultados = $conexion_bd->query($consulta);  
    while ($row = mysqli_fetch_array($resultados, MYSQLI_BOTH)) {
        $resultado .= "<tr>";
        $resultado .= "<td>".$row['caso_id']."</td>"; //Se puede usar el índice de la consulta
        $resultado .= "<td>".$row['L_nombre']."</td>"; //o el nombre de la columna
        $resultado .= "<td>".$row['E_nombre']."</td>";
        $resultado .= "<td>".$row['T_created_at']."</td>";
        $resultado .= "</tr>";
    }
    
    mysqli_free_result($resultados); //Liberar la memoria
  
    desconectar_bd($conexion_bd);   
      
    $resultado .= "</tbody></table>";
    return $resultado;
  }
	/* //Consulta los casos de coronavirus
  //@param $lugar: El lugar de donde proviene el caso
  //@param $estado: El estado de la infección del caso
  function consultar_casos($lugar="", $estado="") {
    $conexion_bd = conectar_bd();  
    
    $resultado =  "<table><thead><tr><th>Caso</th><th>Lugar</th><th>Estado actual</th><th>Fecha y hora</th></tr></thead>";
    
    $consulta = 'Select caso_id, L.nombre as L_nombre, E.nombre as E_nombre, T.created_at as T_created_at From Estado as E, Tiene as T, Lugar as L, caso as C WHERE E.id = T.estado_id AND C.id = T.caso_id AND C.lugar_id = L.id';
    if ($lugar != "") {
        $consulta .= " AND lugar_id=".$lugar;
    }
    if ($estado != "") {
        $consulta .= " AND estado_id=".$estado;
    }
      
    $resultados = $conexion_bd->query($consulta);  
    while ($row = mysqli_fetch_array($resultados, MYSQLI_BOTH)) {
        $resultado .= "<tr>";
        $resultado .= "<td>".$row['caso_id']."</td>"; //Se puede usar el índice de la consulta
        $resultado .= "<td>".$row['L_nombre']."</td>"; //o el nombre de la columna
        $resultado .= "<td>".$row['E_nombre']."</td>";
        $resultado .= "<td>".$row['T_created_at']."</td>";
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
            
    $consulta = "SELECT $id, $columna_descripcion FROM $tabla";
    $resultados = $conexion_bd->query($consulta);
    while ($row = mysqli_fetch_array($resultados, MYSQLI_BOTH)) {
        $resultado .= '<option value="'.$row["$id"].'">'.$row["$columna_descripcion"].'</option>';
    }
        
    desconectar_bd($conexion_bd);
    $resultado .=  '</select><label>'.$tabla.'...</label></div>';
    return $resultado;
  }

  //función para insertar un registro de caso de coronavirus
  //@param lugar_id: id de la tabla lugar en la base de datos
  function insertar_caso($lugar_id) {
    $conexion_bd = conectar_bd();
      
    //Prepara la consulta
    $dml = 'INSERT INTO caso (lugar_id) VALUES (?)';
    if ( !($statement = $conexion_bd->prepare($dml)) ) {
        die("Error: (" . $conexion_bd->errno . ") " . $conexion_bd->error);
        return 0;
    }
      
    //Unir los parámetros de la función con los parámetros de la consulta   
    //El primer argumento de bind_param es el formato de cada parámetro
    if (!$statement->bind_param("i", $lugar_id)) {
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
*/




?> 