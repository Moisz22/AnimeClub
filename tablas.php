<?php require 'views/header.php';

if(!isset($_SESSION['usuario'])){
	header('Location: index');
	die();
}

?>
<div class="container">
	<div class="input-group mb-3">
	  <div class="input-group-prepend">
	    <label class="input-group-text" for="tablas_bd">Opciones</label>
	  </div>
	  <select class="custom-select" id="tablas_bd" name="tablas_bd">
	    <option selected>Elija...</option>
	    <option value="1">Animes</option>
	    <option value="2">Reseñas</option>
	    <option value="3">Generos</option>
	  </select>
	</div>
</div>
<br />
<div id="tablas_traer_todas"></div>
<br/>

<?php require 'views/footer.php';?>