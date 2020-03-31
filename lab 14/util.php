<?php  
	function conectDb(){
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "dbname";

		$con = mysqli_connect($servername,$username,$password,$dbname);
		if(!$con){
			die("conexion fallida" .mysqli_connect_error());
		}
		return $con;
	}

	function closeDb($mysql){
		mysqli_close($mysql);
	}

	/*ejemplo
	function getFruits(){
		$conn = connectDb();
		$sql ="SELECT name,units,quantity,price,country FROM Fruit"
		$result = mysqli_query($conn,$sql);
		closeDb($conn);
		return $result;
	}Mejorar la aplicación que hicimos en clase
	Aplicar lo que vimos en la sesión en su proyecto y ponerlo en su repositorio personal
	Hacer otra mini aplicación.*/


	



?> 