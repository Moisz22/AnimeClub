<?php 
require 'config/config.php';
require 'functions.php';

$conexion = conexion($bd_config);

$animes = animes_eliminados($conexion);

?>
<div class="container">
	<div class="table-responsive">
		<table class="table table-hover table-dark">
			<thead>
				<tr>
					<th class="text_align_center">Anime</th>
					<th class="text_align_center">Valoración</th>
					<th class="text_align_center">Estado Tv</th>
					<th class="text_align_center">Estado Vista</th>
					<th class="text_align_center">Restaurar</th>
					<th class="text_align_center">Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($animes as $anime): ?>
					<tr>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
