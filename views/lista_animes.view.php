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
			$estado = (isset($_SESSION['estado'])) ? ($_SESSION['estado']) : false ;
			if($estado == 'registrado' && isset($_SESSION['usuario'])){
				//modal('Anime guardado exitosamente');
				echo '<script>alertify.success("Anime agregado :3")</script>';
			}elseif($estado == 'actualizado' && isset($_SESSION['usuario']) ){
				//modal('Anime actualizado exitosamente');
				echo '<script>alertify.success("Anime actualizado :3")</script>';
			}elseif($estado == 'eliminado' && isset($_SESSION['usuario'])){
				//modal('Anime eliminado exitosamente');
				echo '<script>alertify.success("Anime eliminado :(")</script>';
			}

			if(isset($_SESSION['estado'])){
				unset($_SESSION['estado']);
			}
		?>	
		<div class="row">
			<div class="col-12">
				<h1 class="text_align_center"><b>Lista Completa de Animes</b></h1>
			</div>
		</div>
		<br />
		<div class="row">
			<?php if($animes): ?>
				<?php foreach($animes as $anime): ?>
					<div class="col-<?php echo (12/$paginacion_config['animes_por_columna_moviles']);?> col-sm-<?php echo (12/$paginacion_config['animes_por_columna_pc']);?>">
						<a href="single_anime?id=<?php echo $anime['anime_id'];?>">
							<img style="border-radius: 10px;"class="centrar_imagen animes_lista" src="images/animes/<?php echo $anime['anime_imagen'];?>">
							<p class="text_align_center"><?php echo $anime['anime_nombre'];?></p>
						</a>
					</div>
				<?php endforeach; ?>
			<?php else: ?>
				<br/><br /><br /><br/><br /><br />
			<?php endif; ?>
		</div>		
	</div>
<?php if($animes): ?>
	<?php require 'paginacion.php'; ?>
<?php endif; ?>

<?php require 'footer.php'; ?>