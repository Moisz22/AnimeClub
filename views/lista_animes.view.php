<?php require 'views/header.php'; ?>
	<br />
	<div class="container">
		<div class="row">
			<?php if(isset($_SESSION['usuario'])):?>
			<div class="col-8 col-sm-10"></div>
			<div class="col-2 col-sm-1">
				<button class="btn btn-success" onclick="location.href='registrar_anime'" title="registrar anime"><i class="fa fa-plus-square"></i></button>
			</div>	
			<div class="col-2 col-sm-1">
				<button class="btn btn-info" title="configuración de la página" data-toggle="modal" data-target="#modal_config_paginacion"><i class="fa fa-cog"></i></button>
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

  			<!-- Modal -->
	  		<div class="modal" id="modal_config_paginacion" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
	    		<div class="modal-dialog modal-dialog-centered">
	      			<!-- Modal content-->
	      			<div class="modal-content">
	        			<div class="modal-header">
	        				<p class="modal-title text_align_center"><b>Configuraciones</b></p>
				        	<button type="button" class="btn btn-danger" data-dismiss="modal">&times;</button>
	        			</div>
	        			<div class="modal-body">
	        				<div class="container">
	        					<div class="row">
	        						<div class="col-md-6 col-6">
				        				<label><b>Animes por página</b></label>
				        			</div>

				        			<div class="col-md-6 col-6">
				        				<input value="<?php echo $linea1;?>" type="text" class="form-control input-sm" id="animes_por_pagina" name="animes_por_pagina">
				        			</div>
				        		</div>
				        		<br />
				        		<div class="row">
				        			<div class="col-md-6 col-6">
				        				<label><b>Animes por columna movil</b></label>
				        			</div>
				        			<div class="col-md-6 col-6">
				        				<input value="<?php echo $linea2;?>" type="text" class="form-control input-sm" id="animes_por_columna_movil" name="animes_por_columna_movil">
				        			</div>
				        		</div>
				        		<br />
				        		<div class="row">
				        			<div class="col-sm-6 col-6">
				        				<label><b>Animes por columna pc</b></label>
				        			</div>
				        			<div class="col-sm-6 col-6">
				        				<input value="<?php echo $linea3;?>" type="text" class="form-control input-sm" id="animes_por_columna_pc" name="animes_por_columna_pc">
				        			</div>
				        		</div>
		        			</div>
	        			</div>
	        		
	        			<div class="modal-footer">
	        				<button type="button" id="enviar_config" class="btn btn-success">Aplicar</button>
	          				<button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
	        			</div>
	        		</div>
	      		</div>
	      
	    	</div>


		<div class="row">
			<div class="col-12">
				<h1 class="text_align_center"><b>Lista Completa de Animes</b></h1>
			</div>
		</div>
		<br />
		<div class="row">
			<?php if($animes): ?>
				<?php foreach($animes as $anime): ?>
					<div class="col-<?php echo (12/$linea2);?> col-sm-<?php echo (12/$linea3);?>">
						<div class="todos_animes">
						<a href="single_anime?id=<?php echo $anime['anime_id'];?>">
							<img class="centrar_imagen animes_lista" src="images/animes/<?php echo $anime['anime_imagen'];?>">
							<p class="text_align_center"><?php echo $anime['anime_nombre'];?></p>
						</a>
						</div>
					</div>
				<?php endforeach; ?>
			<?php else: ?>
				<br/><br /><br /><br/><br /><br />
			<?php endif; ?>
		</div>		
	
<?php if($animes): ?>
	<?php require 'paginacion.php'; ?>
<?php endif; ?>
</div>

<?php require 'footer.php'; ?>