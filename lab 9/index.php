<?php 
	include("_header.html");  
	include("_body.html");  
	echo "<hr>";
	 
	function Sacar_Promedio($array ){
		//phpinfo();
		
		//print_r($array);
		$longitud = count($array);
		$total=0;
		for($i=0; $i<$longitud; $i++){
		  $total+=$array[$i];
	     }
	     
	     return $total/$longitud;
	}
	echo "Una función que reciba un arreglo de números y devuelva su promedio <br>";
	echo "el promedio es ".Sacar_Promedio(array(1,2,3,4,5));
	echo "<br>el promedio es ".Sacar_Promedio(array(5,5,5,5,5));
	echo "<hr>";
	    
	function Sacar_Mediana($array){
		
		sort($array);
		//print_r($array);
		
		$longitud = count($array);

		if($longitud % 2 == 0){
			//si es par
			//sumar los numeros de en medio y dividir entre dos
            $sumaMedios = $array[$longitud/2] + $array[$longitud/2 - 1]; 
            $mediana = $sumaMedios / 2; 

        } else {
        	//si es impar
            $mediana = $array[$longitud/2];
        }
        
        return $mediana;
	}
	echo "Una función que reciba un arreglo de números y devuelva su mediana <br>";
		
	echo "la mediana es ".Sacar_Mediana(array(6,5,5,4,1,5,8,9,9,1));
	echo "<br>la mediana es ".Sacar_Mediana(array(10,26,31,9,5));
	echo "<hr>";


	function Sacar_Varios($array){

		
		echo "<ol>";


		echo "<li>El primedio es ".Sacar_Promedio($array)."</li>";
		echo "<li>La mediana es ".Sacar_Mediana($array)."</li>";

		echo "<li>";
		echo "Arreglo[";
		$longitud = count($array);
		for($i=0; $i<$longitud; $i++){
			if($i==$longitud-1){
				echo  $array[$i];		
			}else {
				echo  $array[$i].",";	
			}
		  
	     }
	     echo "] </li>";

	    echo "<li>";
		echo "Ordenado de menor a mayor arreglo[";
		sort($array);
		for($i=0; $i<$longitud; $i++){
		  if($i==$longitud-1){
				echo  $array[$i];		
			}else {
				echo  $array[$i].",";	
			}
	     }
	     echo "]</li>";

	    echo "<li>";
		echo "Ordenado de mayor a menor arreglo[";
		rsort($array);
		for($i=0; $i<$longitud; $i++){
			 if($i==$longitud-1){
				echo  $array[$i];		
			}else {
				echo  $array[$i].",";	
			}
	     }
	     echo "]</li> </ol>";

	}

	echo "Una función que reciba un arreglo de números y muestre la lista de números, y como ítems de una lista html muestre el promedio, la mediana, y el arreglo ordenado de menor a mayor, y posteriormente de mayor a menor <br>";
	Sacar_Varios(array(6,5,5,4,1,5,8,15,9,12));
	Sacar_Varios(array(10,26,31,9,5));
	echo "<hr>";

	function Generar_Tabla($numero){
		$bandera=1;
		echo "<table border=1 class='striped' >";
		for($i=1; $i<$numero; $i++){
			 echo "<tr>";
			    echo "<td>".$i."</td>";

			    echo "<td>".$i*$i."</td>";

			    echo "<td>".$i*$i*$i."</td>";

			  echo "</tr>";
		  
	     }
	     echo "</table> <br>";

	}

	echo "Una función que imprima una tabla html, que muestre los cuadrados y cubos de 1 hasta un número n<br><br>";
	Generar_Tabla(15);
	Generar_Tabla(5);



	include("_footer.html"); 



 ?>