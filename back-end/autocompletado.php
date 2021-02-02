<?php

require '../config/config.php';
require '../functions.php';

$conexion = conexion($bd_config);

$html = '';
$key = $_POST['b'];

$results = $conexion->query(
    'SELECT * FROM anime 
    WHERE anime_nombre LIKE "'.strip_tags($key).'%"
     && anime_estado = 1 ORDER BY anime_nombre DESC LIMIT 0,5'
);

$results = $results->fetchAll();

if ($results) {
    foreach ($results as $result) {                
        $html .= '<div><a class="suggest-element" data="'.utf8_encode($result['anime_nombre']).'" id="' .$result['anime_id'].'"> '.utf8_encode($result['anime_nombre']).'</a></div>';
    }
}
echo $html;
?>
