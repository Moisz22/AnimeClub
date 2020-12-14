<?php require 'header.php'; ?>
	<br />
	<div class="container">
		<div class="row">
			<div class="col-6 col-sm-9"></div>
			<div class="col-6 col-sm-3">
				<div class="inner-addon right-addon">
  					<i class="glyphicon fa fa-search"></i>
  					<input type="text" class="form-control" placeholder="Buscar" />
				</div>
			</div>
		</div>
		<br />
		<div class="row">
			<div class="col-12">
				<h1 class="text_align_center"><b>Lista Completa de Animes</b></h1>
			</div>
		</div>
		<br />
		<div class="row">
			<?php foreach($animes as $anime): ?>
				<div class="col-<?php echo (12/$paginacion_config['animes_por_columna_moviles']);?> col-sm-<?php echo (12/$paginacion_config['animes_por_columna_pc']);?>">
					<a href="single_anime.php?id=<?php echo $anime['anime_id'];?>">
						<img class="centrar_imagen animes_lista" src="images/animes/<?php echo $anime['anime_imagen'];?>">
						<p class="text_align_center"><?php echo $anime['anime_nombre'];?></p>
					</a>
				</div>
			<?php endforeach; ?>
		</div>		
	</div>
<?php require 'paginacion.php'; ?>

<?php require 'footer.php'; ?>