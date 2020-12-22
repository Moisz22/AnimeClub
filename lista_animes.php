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


/*
	guardar las 3 lineas del archivo de configuracion para mostrar al abrir el modal
	si fila no existe, se procede a crearlos por defecto van a tener los numeros 24, 3 y 6
*/	

if(file_exists('config/paginacion_config.txt')){
	$archivo = fopen('config/paginacion_config.txt', 'r');
	$linea1 = fgets($archivo);
	$linea2 = fgets($archivo);
	$linea3 = fgets($archivo);
}else{
	$archivo = fopen('config/paginacion_config.txt', 'w+b');
	fputs($archivo, "24\n3\n6\n\nEl primer valor indica la cantidad de animes por página, el segundo valor indica la cantidad de animes por fila en moviles y el tercero indica la cantidad de animes por fila en pc");
	$linea1 = 24;
	$linea2 = 3;
	$linea3 = 6;
}
fclose($archivo);

if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['b'])){
	$b = limpiarDatos(filter_var($_GET['b'], FILTER_SANITIZE_STRING));
	$animes = traer_todos_los_animes($conexion, $linea1, $b);

} else{
		$animes = traer_todos_los_animes($conexion, $linea1);
}


if(!$animes && isset($_GET['b']) && !empty($_GET['b'])){
	$mensaje .= '<h3>No hay resultados para la búsqueda de: ' . $b .'</h3>';
}elseif($animes && isset($_GET['b']) && !empty($_GET['b'])){
	$mensaje .= '<h3>Aquí están los resultados para la búsqueda de: ' . $b .'</h3>';
}

require 'views/lista_animes.view.php';
?>