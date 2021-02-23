<?php
require '../config/config.php';
require '../functions.php';

session_start();

$anime_nombre =  strtolower($_POST['anime_nombre']);
$conexion = conexion($bd_config);

$comprobacion = $conexion->prepare("SELECT * FROM anime WHERE lower(anime_nombre)=:anime_nombre");
$comprobacion->execute(
    array(
        ':anime_nombre' => $anime_nombre
    )
);
$resultado1 = $comprobacion->fetchAll();
$conexion = null;
$comprobacion = null;

if($resultado1 != false){

    echo 1;

}else{

    echo 0;
}