<?php require 'views/header.php';

if(!isset($_SESSION['usuario'])){
	header('Location: index');
	die();
}

?>
<div class="container">
	<div class="input-group mb-3">
	  <div class="input-group-prepend">
	    <label class="input-group-text" for="tablas_traer">Opciones</label>
	  </div>
	  <select class="custom-select" id="tablas_traer" name="tablas_traer">
	    <option selected>Elija...</option>
	    <option value="1">Animes borrados</option>
	    <option value="2">Reseñas borradas</option>
	  </select>
	</div>
</div>
<br />
<div id="tabla_dibujar"></div>
<br/>

<?php require 'views/footer.php';?>