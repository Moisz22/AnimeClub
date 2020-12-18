<?php 
session_start();

require 'config/config.php';
require 'functions.php';

$conexion = conexion($bd_config);
$mensaje = '';

if(!$conexion){
	header('Location:error.php');
	die();
}



if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['b'])){
	$b = limpiarDatos(filter_var($_GET['b'], FILTER_SANITIZE_STRING));
	$animes = traer_todos_los_animes($conexion, $paginacion_config['animes_por_pagina'], $b);

} else{
	/*

		si esta seteado como usuario va a salir una columna extra para agregar anime, para que no se descuadre la paginación se resta - 1 a la cantidad de animes requeridos por página

	*/
	if(isset($_SESSION['usuario'])){

		$animes = traer_todos_los_animes($conexion, $paginacion_config['animes_por_pagina']-1);

	}else{

		$animes = traer_todos_los_animes($conexion, $paginacion_config['animes_por_pagina']);

	}
}

if(!$animes && isset($_GET['b']) && !empty($_GET['b'])){
	$mensaje .= '<h3>No hay resultados para la búsqueda de: ' . $b .'</h3>';
}elseif($animes && isset($_GET['b']) && !empty($_GET['b'])){
	$mensaje .= '<h3>Aquí están los resultados para la búsqueda de: ' . $b .'</h3>';
}

require 'views/lista_animes.view.php';
?>