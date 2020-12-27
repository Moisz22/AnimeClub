<?php 
require 'config/config.php';
require 'functions.php';

$conexion = conexion($bd_config);

$animes = animes_eliminados($conexion);

?>
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Foto</th>
					<th>Restaurar</th>
					<th>Eliminar</th>

				</tr>
			</thead>
			<tbody>
				<?php foreach($animes as $anime): ?>
					<tr>
						<td><?php echo $anime['anime_nombre'];?></td>
						<td><img class="animes_lista" src="images/animes/<?php echo $anime['anime_imagen'];?>" alt="<?php echo $anime['anime_nombre'];?>"></td>
						<input type="hidden" name="hola" value="<?php echo $anime['anime_banner'];?>">
						<td><button value="<?php echo $anime['anime_id'];?>" style="margin-right: 5px;" class="btn btn-warning fa fa-arrow-up" onclick="confirmar_retorno()" id="retorno_registro"></button></td>
						<td><button value="<?php echo $anime['anime_id'];?>" onclick="confirmar_eliminacion()" class="btn btn-danger fa fa-trash" id="eliminacion_permanente"></button></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
