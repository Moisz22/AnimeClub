<?php
require 'config/config.php';
require 'functions.php';

$conexion = conexion($bd_config);
if(!$conexion){
	header('Location:error');
	die();
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$reseña_id = $_POST['reseña_id'];

	$statement = $conexion->prepare("DELETE FROM resenia WHERE resenia_estado=0 && resenia_id=:resenia_id");
	$statement->execute(array(
		':resenia_id' => $reseña_id
		)
	);

	//rowcount cuenta las filas que fueron afectadas por un insert, delete o update
	$num_filas_afectadas = $statement->rowCount();
	//en el caso de que se actualice correctamente enviará la respuesta a ajax con 1
	if($num_filas_afectadas > 0){
		echo 1;	
	}

}

?>