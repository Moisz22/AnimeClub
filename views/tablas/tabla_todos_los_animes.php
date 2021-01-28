<?php 
require '../../config/config.php';
require '../../functions.php';

$conexion = conexion($bd_config);

if(!$conexion){
	header('index');
	die();
}



//aquí se traen todos los animes de la bd
$statement = $conexion->prepare('SELECT * FROM anime');
$statement->execute();
$animes = $statement->fetchAll();

?>
<div class="container">
	<div class="table-responsive">
		<table class="table table-hover table-dark">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nombre</th>
					<th>Foto</th>
					<th>Banner</th>
					<th>Estado Tv</th>
					<th>Estado Vista</th>
					<th>Estado</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($animes as $anime): ?>

					<?php 
					//poniendo los datos de cada anime en una variable para que estén al momento de editar
					$datos=$anime['anime_nombre']."||".
						   $anime['anime_actualidad']."||".
						   $anime['anime_sinopsis']."||".
						   $anime['anime_estado']."||".
						   $anime['anime_cantidad_capitulos']."||".
						   $anime['anime_id']; 

					?>
					<tr>
						<td><?php echo $anime['anime_id'];?></td>
						<td><?php echo $anime['anime_nombre'];?></td>
						<td><img class="animes_lista centrar_imagen" src="images/animes/<?php echo $anime['anime_imagen'];?>" alt="<?php echo $anime['anime_nombre'];?>"></td>
						<td><img style="height: 150px; width: 170px; border-radius: 10px;" class="centrar_imagen" src="images/banner/<?php echo $anime['anime_banner'];?>" alt="<?php echo $anime['anime_banner'];?>"></td>
						<td><?php echo $anime['anime_actualidad'];?></td>
						<td><?php echo $anime['anime_estado_vista'];?></td>
						<td><?php echo $anime['anime_estado'];?></td>
						<td><button onclick="mostrar_datos_completos_anime('<?php echo $datos;?>')" class="btn btn-warning fa fa-pencil"></button></td>
						<td><button class="btn btn-danger fa fa-trash"></button></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<?php 
	require '../../paginacion_tablas.php'; ?>
</div>


<div class="modal fade" id="modal_editar_anime" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar anime</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <button aria-hidden="true" class="btn btn-danger" data-dismiss="modal">&times;</button>
        </button>
      </div>
      <div class="modal-body">
      	<div class="container-fluid">
      		<div class="row">
      			<input class="form-control col-md-8 col-8" type="hidden" id="anime_id_mostrar">
      		</div>
      		<div class="row">
      			<label class="col-md-4 col-4">Nombre: </label><input class="form-control col-md-8 col-8" type="text" id="anime_nombre_mostrar">
      		</div>
      		<br />
      		<div class="row">
      			<label class="col-md-4 col-4">Actualidad: </label><input class="form-control col-md-8 col-8" type="text" id="anime_actualidad_mostrar">
      		</div>
      		<br />
      		<div class="row">
      			<label class="col-md-4 col-4">Capitulos:</label><input class="form-control col-md-8 col-8" type="number" id="anime_cantidad_capitulos_mostrar"></input>
      		</div>
      		<br />
      		<div class="row">
      			<label class="col-md-4 col-4">Sinopsis: </label><textarea class="form-control col-md-8 col-8" type="text" id="anime_sinopsis_mostrar"></textarea>
      		</div>
      		<br />
      		<div class="row">
      			<label class="col-md-4 col-4">Estado: </label><input class="form-control col-md-8 col-8" type="number" id="anime_estado_mostrar"></input>
      		</div>
      		<br />
      	</div>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="guardar_datos_completos_anime()" class="btn btn-warning">Actualizar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
	
	function mostrar_datos_completos_anime(datos){

      d=datos.split('||');

      $("#anime_nombre_mostrar").val(d[0]);
      $("#anime_actualidad_mostrar").val(d[1]);
      $("#anime_sinopsis_mostrar").val(d[2]);
      $("#anime_estado_mostrar").val(d[3]);
      $("#anime_cantidad_capitulos_mostrar").val(d[4]);
      $("#anime_id_mostrar").val(d[5]);
      $("#modal_editar_anime").modal('show');
  }
</script>

