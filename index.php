<?php

require 'config/config.php';
require 'functions.php';
require 'views/header.php';

$conexion = conexion($bd_config);

if(!$conexion){
    header('Location: views/error.php');
}

$statement = $conexion->prepare("SELECT * FROM anime WHERE anime_estado = 1 ORDER BY anime_id DESC LIMIT 8");
$statement->execute();
$resultados = $statement->fetchAll(); 


$dia = dia_actual();

$animes_dia_actual = $conexion->prepare("SELECT * FROM anime WHERE anime_estado = 1 && anime_dia_capitulo_siguiente = :dia");
$animes_dia_actual->execute(
    array(
        ':dia' => $dia
    )
);

$resultados2 = $animes_dia_actual->fetchAll();

require 'views/index.view.php';

require 'views/footer.php';

$resultados = null;