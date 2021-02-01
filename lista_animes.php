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
	$linea1 = (int)str_replace('animes por pagina=','',fgets($archivo));
	$linea2 = (int)str_replace('animes por columna en moviles=','',fgets($archivo));
	$linea3 = (int)str_replace('animes por columna en pc=','',fgets($archivo));
}else{
	$archivo = fopen('config/paginacion_config.txt', 'w+b');
	fputs($archivo, "animes por pagina=24\nanimes por columna en moviles=3\nanimes por columna en pc=6");
	$linea1 = 24;
	$linea1 = 3;
	$linea1 = 6;
}
fclose($archivo);

if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['b'])){
	$b = limpiarDatos(filter_var($_GET['b'], FILTER_SANITIZE_STRING));
	$animes = traer_todos_los_animes($conexion, $linea1, $b);

}elseif($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['g'])){
	$g = limpiarDatos(filter_var($_GET['g'], FILTER_SANITIZE_STRING));
	$animes = traer_animes_por_genero($conexion, $linea1, $g);
	
} else{
		$animes = traer_todos_los_animes($conexion, $linea1);
}


if(!$animes && isset($_GET['b']) && !empty($_GET['b'])){
	$mensaje .= '<h3>No hay resultados para la búsqueda de: ' . $b .'</h3>';
}elseif($animes && isset($_GET['b']) && !empty($_GET['b'])){
	$mensaje .= '<h3>Aquí están los resultados para la búsqueda de: ' . $b .'</h3>';
}

$total_animes_activos = total_animes($conexion);

require 'views/lista_animes.view.php';

?>