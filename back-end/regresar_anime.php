<?php
require '../config/config.php';
require '../functions.php';

session_start();

$conexion = conexion($bd_config);

if(!$conexion){
	header('Location:error');
	die();
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){

	if(isset($_SESSION['usuario'])){
	
		$anime_id = $_POST['anime_id'];

		$statement = $conexion->prepare("UPDATE anime SET anime_estado=1 WHERE anime_id=:anime_id");
		$statement->execute(array(
			':anime_id' => $anime_id
			)
		);

	}

	//rowcount cuenta las filas que fueron afectadas por un insert, delete o update
	$num_filas_afectadas = $statement->rowCount();
	//en el caso de que se actualice correctamente enviará la respuesta a ajax con 1
	if($num_filas_afectadas > 0){
		echo 1;	
	}else{
		echo 0;
	}

}

$conexion = null;
