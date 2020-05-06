<?php  
	function conectar_bd(){
		/*$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "parque";*/
        $servername = "mysql1008.mochahost.com";
		$username = "dawbdorg_1704641";
		$password = "1704641";
		$dbname = "dawbdorg_A01704641";
		$con = mysqli_connect($servername,$username,$password,$dbname);
      
		if(!$con){
			die("conexion fallida" .mysqli_connect_error());
		}
		return $con;
	}

	function desconectar_bd($mysql){
		mysqli_close($mysql);
	}


      //Crea un select con los datos de una consulta
  //@param $id: Campo en una tabla que contiene el id
  //@param $columna_descripcion: Columna de una tabla con una descripción
  //@param $tabla: La tabla a consultar en la bd
  function crear_select($id, $columna_descripcion, $tabla, $seleccion=0) {
    $conexion_bd = conectar_bd();  
      
      
    $resultado = '<div class="input-field"><select name="'.$tabla.'" id="'.$tabla.'"><option value="" disabled selected>Selecciona una opción</option>';
    
            
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

  function insertar_incidente($lugar , $tipo) {
    $conexion_bd = conectar_bd();
      
    //Prepara la consulta
    $dml = 'INSERT INTO tiene (id_lugar,id_tipo) VALUES (?,?) ';
   
    if ( !($statement = $conexion_bd->prepare($dml)) ) {
        die("Error: (" . $conexion_bd->errno . ") " . $conexion_bd->error);
        return 0;
    }
      
    //Unir los parámetros de la función con los parámetros de la consulta   
    //El primer argumento de bind_param es el formato de cada parámetro
    if (!$statement->bind_param("ii",$lugar , $tipo)) {
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

    function consultar_estados($idLugar=''){
        $conexion_bd = conectar_bd();
        $resultado = '<td>';
        
     
        $consulta = 'select T.nombre as nombreE, Ti.fecha as fecha from tipo as T , tiene as Ti where Ti.id_tipo =T.id and Ti.id_lugar ='.$idLugar .'';
       
        $resultados = $conexion_bd->query($consulta);
        while ($row = mysqli_fetch_array($resultados, MYSQLI_BOTH)) {
          $resultado .= ''.$row ['nombreE'] .'('.$row['fecha'] .')<br>' ;
        }
      
       // echo $consulta;
        return $resultado;
    }

   function consultar_incidentes($lugar=""){
        $conexion_bd = conectar_bd();
       
       $resultado=
        "<table class='highlight'>
            <thead>
                <tr>
                    <th>Lugar</th>
                    <th>Tipo</th>
                </tr>
            </thead>
            <tbody>";
       
           
           $consulta = 'select distinct L.id as idL,L.nombre as nombreL from tipo as T, lugar as L ,tiene as Ti where L.id=Ti.id_lugar and T.id = Ti.id_tipo  ';
       
        if ($lugar != "") {
            $consulta .= " AND Ti.id_lugar=".$lugar;
        }
       $consulta .= ' order by Ti.fecha';
       
       $resultados = $conexion_bd->query($consulta);
       
       while($row = mysqli_fetch_array( $resultados, MYSQLI_BOTH) ){
           $resultado .= '<tr>';
           $resultado .= '<td>'.$row['nombreL'].'</td>';
           $resultado .= consultar_estados($row['idL']);
           $resultado .= '<a class="waves-effect waves-light btn" href="controlador_registrar_estado.php?nombre='.$row['idL'].' " ><i class="material-icons  left">add</i>Registrar estado</a>';
           $resultado .=' </td>
           </tr>';
              
       } 
        $resultado .= '</tbody></table>';
        desconectar_bd($conexion_bd);
        return $resultado;
       
   }

     function insertar_estado($id_lugar,$id_estado){
        $conexion_bd = conectar_bd();
         
         //Prepara la consulta
         
        $dml = 'CALL agregaEstado  (?,?)';
        
        if ( !($statement = $conexion_bd->prepare($dml)) ) {
            die("Error: (" . $conexion_bd->errno . ") " . $conexion_bd->error);
            return 0;
        }

        //Unir los parámetros de la función con los parámetros de la consulta   
        //El primer argumento de bind_param es el formato de cada parámetro
        if (!$statement->bind_param("ii",$id_lugar,$id_estado)) {
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

    
   




?> 