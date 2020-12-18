<?php require 'views/header.php'; ?>
	<br />
	<div class="container">
		<div class="row">
			<div class="col-10 col-sm-11"></div>
				<?php if(isset($_SESSION['usuario'])):?>	
				<div class="col-2 col-sm-1">
					<i class="btn btn-primary fa fa-cog" title="configuración de la página"></i>
				</div>
			<?php endif; ?>
		</div>
		<br />
		<div class="row">
			<div class="col-6 col-sm-9"></div>
			<div class="col-6 col-sm-3">
				<div class="inner-addon right-addon">
					<form id="formulario_busqueda" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="GET">
						<a onclick="formulario_busqueda.submit();" href="#" title="buscar"><i class="glyphicon fa fa-search"></i></a>
	  					<input type="text" name="b" id="b" class="form-control" placeholder="Buscar"/>
	  				</form>
	  				<div id="suggestions"></div>
				</div>
			</div>
		</div>
		<br />

		<?php
			$estado = (isset($_GET['estado'])) ? ($_GET['estado']) : false ;
			$estado = limpiarDatos($estado);
			if($estado == 'registrado' && isset($_SESSION['usuario'])){
				modal('Anime guardado exitosamente');
			}elseif($estado && isset($_SESSION['usuario']) == 'actualizado'){
				modal('Anime actualizado exitosamente');
			}elseif($estado && isset($_SESSION['usuario']) == 'eliminado'){
				modal('Anime eliminado exitosamente');
			}
		?>
			 
		
		<div class="row">
			<div class="col-12">
				<h1 class="text_align_center"><b>Lista Completa de Animes</b></h1>
			</div>
		</div>
		<br />
		<div class="row">
			<?php if(isset($_SESSION['usuario'])&& pagina_actual() == 1): ?>
				<div class="text-center col-<?php echo (12/$paginacion_config['animes_por_columna_moviles']);?> col-sm-<?php echo (12/$paginacion_config['animes_por_columna_pc']);?>">
					<a href="registrar_anime.php">
						<i class="fa fa-plus-circle" style="padding-top: 40px; font-size: 60px;"></i>
						<p class="text_align_center" style="padding-top: 50px;">Añadir</p>
					</a>
				</div>
			<?php endif; ?>
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