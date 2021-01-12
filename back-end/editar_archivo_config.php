<?php
if(isset($_POST['animes_por_pagina']) && !empty($_POST['animes_por_pagina']) && isset($_POST['animes_por_columna_movil']) && !empty($_POST['animes_por_columna_movil']) && isset($_POST['animes_por_columna_pc']) && !empty($_POST['animes_por_columna_pc'])){

	$archivo = fopen('../config/paginacion_config.txt', 'w');
	fputs($archivo, 'animes por pagina=' . $_POST['animes_por_pagina']."\n" . 'animes por columna en moviles=' . $_POST['animes_por_columna_movil']."\n" . 'animes por columna en pc=' .$_POST['animes_por_columna_pc']);
	fclose($archivo);
	echo 1;
}
?>