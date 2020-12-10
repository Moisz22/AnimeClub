<?php

require 'config/config.php';
require 'functions.php';

$conexion = conexion($bd_config);

print_r($conexion);

$animes = traer_todos_los_animes($conexion);

print_r($animes);
