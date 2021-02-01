<?php

session_start();
require 'config/config.php';
require 'functions.php';

$errores = [];

if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$usuario = limpiarDatos($_POST['user']);
	$password = limpiarDatos($_POST['password']);

	$password = hash('sha512', $password);

	$conexion = conexion($bd_config);

	if(!$conexion){
		header('Location: error');
	}

	$statement = $conexion->prepare('SELECT * FROM usuario WHERE username=:username AND password=:password');
	$statement->execute(array(

		':username' => $usuario,
		':password' => $password

	));

	$resultados = $statement->fetch();

	if($resultados !== false){
		$_SESSION['usuario'] = $usuario;
		header('Location:lista_animes');
	}else{
		array_push($errores, 'Usuario o contraseña no validos');
	}
}

require 'views/login.view.php';

?>