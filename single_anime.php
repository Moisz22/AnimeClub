<?php 

require 'views/header.php';

require 'config/config.php';
require 'functions.php';

$conexion = conexion($bd_config);

$anime = traer_anime_por_id($conexion, 1);

require 'views/single_anime.view.php';

require 'views/footer.php';

?>