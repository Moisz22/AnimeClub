<?php

session_start();

require 'config/config.php';
require 'functions.php';

$conexion = conexion($bd_config);

if(!$conexion){

	header('Location: error.php');

}

if(!isset($_SESSION['usuario'])){

	header('Location: index.php');
	die();
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$id = limpiarDatos($_POST['anime_id']);
	$id = filter_var($id, FILTER_VALIDATE_INT);

	if($id !== false && !empty($id)){
		eliminar_anime_por_id($conexion, $id);
		$_SESSION['estado'] = 'eliminado';
		header('Location: lista_animes.php');
	}

}

?>