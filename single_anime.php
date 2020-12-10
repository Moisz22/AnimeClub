<?php 


require 'config/config.php';
require 'functions.php';

require 'views/header.php';



$conexion = conexion($bd_config);

$id = (isset($_GET['id'])) ? (int)$_GET['id'] : false;

$anime = traer_anime_por_id($conexion, $id);

$generos = traer_genero_de_un_anime($conexion, $anime['anime_nombre']);

require 'views/single_anime.view.php';

require 'views/footer.php';

?>