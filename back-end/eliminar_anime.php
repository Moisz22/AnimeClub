<?php

session_start();

require '../config/config.php';
require '../functions.php';

$conexion = conexion($bd_config);

if(!$conexion){

	header('Location: error');

}

if($_SERVER['REQUEST_METHOD'] == 'POST'){

	if(isset($_SESSION['usuario'])){

		$id = limpiarDatos($_POST['anime_id']);
		$id = filter_var($id, FILTER_VALIDATE_INT);

		if($id !== false && !empty($id)){
			eliminar_anime_por_id($conexion, $id);
			$_SESSION['estado'] = 'eliminado';
			header('Location: ../lista_animes');
		}

	}

}