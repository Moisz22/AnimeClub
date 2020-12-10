<?php

$total_paginas = paginacion($conexion, $paginacion_config['animes_por_pagina']);
require 'views/paginacion.view.php';

?>