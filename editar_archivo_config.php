<?php
if(isset($_POST['animes_por_pagina']) && !empty($_POST['animes_por_pagina']) && isset($_POST['animes_por_columna_movil']) && !empty($_POST['animes_por_columna_movil']) && isset($_POST['animes_por_columna_pc']) && !empty($_POST['animes_por_columna_pc'])){

	$archivo = fopen('config/paginacion_config.txt', 'w');
	fputs($archivo, $_POST['animes_por_pagina']."\n" . $_POST['animes_por_columna_movil']."\n" . $_POST['animes_por_columna_pc']);
	fclose($archivo);
}
?>