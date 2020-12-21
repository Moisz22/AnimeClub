<?php
session_start();
require 'config/config.php';
require 'functions.php';

$conexion = conexion($bd_config);

if(!$conexion){
	header('Location:error.php');
}

	$usuario = $_POST['usuario'];
	$password = $_POST['password'];

	$statement = $conexion->prepare("SELECT * FROM usuarios WHERE username=:username && password=:password LIMIT 1");
	$statement->execute(array(
		':username' => $usuario,
		':password' => $password
	)
	);
	$resultado = $statement->fetchAll();

	if($resultado){
		
		$_SESSION['usuario'] = $resultado['username'];
	}elseif(!$resultado){
		echo 'alertify.error("Usuario o contraseña incorrectos");';
	}

?>

